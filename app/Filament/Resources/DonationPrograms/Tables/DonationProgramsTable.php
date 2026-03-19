<?php

namespace App\Filament\Resources\DonationPrograms\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DonationProgramsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('slug')
                    ->searchable()
                    ->copyable()
                    ->toggleable(),
                TextColumn::make('status')
                    ->badge()
                    ->searchable(),
                TextColumn::make('received_amount')
                    ->label('Terkumpul')
                    ->money('IDR', locale: 'id'),
                TextColumn::make('target_amount')
                    ->label('Target')
                    ->money('IDR', locale: 'id'),
                TextColumn::make('progress_percentage')
                    ->label('Progress')
                    ->suffix('%'),
                TextColumn::make('remaining_days_label')
                    ->label('Sisa Hari'),
                IconColumn::make('is_featured')
                    ->label('Home')
                    ->boolean(),
                TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->label('Diubah')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->modifyQueryUsing(fn ($query) => $query->withSum('donationDetails', 'amount'))
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
