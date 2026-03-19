<?php

namespace App\Filament\Resources\DonationPrograms\RelationManagers;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;

class DonationDetailsRelationManager extends RelationManager
{
    protected static string $relationship = 'donationDetails';

    protected static ?string $title = 'Detail Keuangan';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('donor_name')
                    ->label('Nama Donatur')
                    ->required()
                    ->maxLength(255),
                TextInput::make('donor_whatsapp')
                    ->label('No WhatsApp')
                    ->tel()
                    ->maxLength(255),
                TextInput::make('amount')
                    ->label('Nominal Diterima')
                    ->numeric()
                    ->prefix('Rp')
                    ->minValue(1)
                    ->required(),
                DatePicker::make('donated_at')
                    ->label('Tanggal Donasi')
                    ->required(),
                Select::make('payment_method')
                    ->label('Metode Pembayaran')
                    ->options([
                        'Transfer' => 'Transfer',
                        'QRIS' => 'QRIS',
                        'Tunai' => 'Tunai',
                    ])
                    ->native(false),
                FileUpload::make('payment_proof_path')
                    ->label('Bukti Bayar')
                    ->disk('public')
                    ->directory('donation-proofs')
                    ->visibility('public')
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'application/pdf'])
                    ->maxSize(10240)
                    ->helperText('Opsional. Bisa gambar atau PDF.'),
                Textarea::make('note')
                    ->label('Catatan')
                    ->rows(3)
                    ->columnSpanFull(),
            ])
            ->columns(2);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                ViewColumn::make('donation_summary')
                    ->label('Informasi Donasi')
                    ->view('filament.tables.columns.donation-summary')
                    ->searchable(['donor_name', 'donor_whatsapp'])
                    ->sortable(false),
                TextColumn::make('input_source')
                    ->label('Sumber')
                    ->badge()
                    ->formatStateUsing(fn (?string $state): string => match ($state) {
                        'website' => 'Landing Page',
                        default => 'Admin',
                    }),
                IconColumn::make('is_verified')
                    ->label('Verifikasi')
                    ->boolean(),
                TextColumn::make('payment_proof_path')
                    ->label('Bukti')
                    ->formatStateUsing(fn (?string $state): string => filled($state) ? 'Ada bukti' : '-')
                    ->color(fn (?string $state): string => filled($state) ? 'primary' : 'gray'),
                TextColumn::make('donated_at')
                    ->label('Tanggal')
                    ->date()
                    ->sortable(),
                TextColumn::make('payment_method')
                    ->label('Metode')
                    ->badge(),
                TextColumn::make('verified_at')
                    ->label('Diverifikasi')
                    ->dateTime('d M Y H:i')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->headerActions([
                CreateAction::make()
                    ->mutateDataUsing(function (array $data): array {
                        $data['input_source'] = 'admin';
                        $data['is_verified'] = true;
                        $data['verified_at'] = now();
                        $data['verified_by'] = auth()->id();

                        return $data;
                    }),
            ])
            ->recordActions([
                Action::make('reviewProof')
                    ->label('Lihat Bukti')
                    ->icon('heroicon-o-eye')
                    ->color('primary')
                    ->visible(fn ($record): bool => filled($record->payment_proof_path) && ! $record->is_verified)
                    ->modalHeading('Tinjau Bukti Pembayaran')
                    ->modalSubmitActionLabel('Verifikasi')
                    ->modalCancelActionLabel('Tutup')
                    ->modalWidth('4xl')
                    ->modalContent(fn ($record): View => view('filament.modals.donation-proof', ['record' => $record]))
                    ->action(function ($record): void {
                        $record->update([
                            'is_verified' => true,
                            'verified_at' => now(),
                            'verified_by' => auth()->id(),
                        ]);
                    }),
                Action::make('viewProof')
                    ->label('Lihat Bukti')
                    ->icon('heroicon-o-eye')
                    ->color('gray')
                    ->visible(fn ($record): bool => filled($record->payment_proof_path) && (bool) $record->is_verified)
                    ->modalHeading('Bukti Pembayaran')
                    ->modalCancelActionLabel('Tutup')
                    ->modalSubmitAction(false)
                    ->modalWidth('4xl')
                    ->modalContent(fn ($record): View => view('filament.modals.donation-proof', ['record' => $record])),
                EditAction::make(),
                Action::make('verify')
                    ->label('Verifikasi')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->visible(fn ($record): bool => ! $record->is_verified && blank($record->payment_proof_path))
                    ->action(function ($record): void {
                        $record->update([
                            'is_verified' => true,
                            'verified_at' => now(),
                            'verified_by' => auth()->id(),
                        ]);
                    }),
                Action::make('unverify')
                    ->label('Batalkan Verifikasi')
                    ->icon('heroicon-o-arrow-uturn-left')
                    ->color('warning')
                    ->visible(fn ($record): bool => (bool) $record->is_verified)
                    ->action(function ($record): void {
                        $record->update([
                            'is_verified' => false,
                            'verified_at' => null,
                            'verified_by' => null,
                        ]);
                    }),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
