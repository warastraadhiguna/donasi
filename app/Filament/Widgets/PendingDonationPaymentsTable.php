<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\DonationPrograms\DonationProgramResource;
use App\Models\DonationDetail;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;

class PendingDonationPaymentsTable extends TableWidget
{
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->heading('Pembayaran Belum Terverifikasi')
            ->description('Data pengirim pembayaran dari detail keuangan yang masih menunggu tinjauan admin.')
            ->query(
                DonationDetail::query()
                    ->with('donationProgram')
                    ->where('is_verified', false)
                    ->latest()
            )
            ->defaultPaginationPageOption(5)
            ->paginated([5, 10, 25])
            ->columns([
                TextColumn::make('donor_name')
                    ->label('Pengirim')
                    ->searchable(),
                TextColumn::make('donor_whatsapp')
                    ->label('WhatsApp')
                    ->formatStateUsing(fn (?string $state): string => filled($state) ? $state : '-')
                    ->searchable(),
                TextColumn::make('donationProgram.title')
                    ->label('Ruang Donasi')
                    ->url(fn (DonationDetail $record): string => DonationProgramResource::getUrl('edit', ['record' => $record->donationProgram]))
                    ->searchable(),
                TextColumn::make('amount')
                    ->label('Nominal')
                    ->money('IDR', locale: 'id')
                    ->sortable(),
                TextColumn::make('payment_method')
                    ->label('Metode')
                    ->badge()
                    ->formatStateUsing(fn (?string $state): string => filled($state) ? $state : '-'),
                TextColumn::make('payment_proof_path')
                    ->label('Bukti')
                    ->badge()
                    ->formatStateUsing(fn (?string $state): string => filled($state) ? 'Ada bukti' : 'Tanpa bukti')
                    ->color(fn (?string $state): string => filled($state) ? 'primary' : 'gray'),
                TextColumn::make('created_at')
                    ->label('Dikirim')
                    ->since()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->emptyStateHeading('Tidak ada pembayaran yang menunggu verifikasi')
            ->emptyStateDescription('Semua data pembayaran di detail keuangan sudah diverifikasi.')
            ->emptyStateIcon(Heroicon::OutlinedCheckCircle);
    }
}
