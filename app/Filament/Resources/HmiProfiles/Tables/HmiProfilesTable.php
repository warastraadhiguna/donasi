<?php

namespace App\Filament\Resources\HmiProfiles\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class HmiProfilesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('organization_name')
                    ->label('Organisasi')
                    ->searchable(),
                TextColumn::make('contact_email')
                    ->label('Email')
                    ->searchable(),
                TextColumn::make('transfer_bank_name')
                    ->label('Bank Transfer'),
                TextColumn::make('updated_at')
                    ->label('Diubah')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                //
            ]);
    }
}
