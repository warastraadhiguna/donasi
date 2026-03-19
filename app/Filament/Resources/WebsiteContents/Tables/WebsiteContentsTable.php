<?php

namespace App\Filament\Resources\WebsiteContents\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class WebsiteContentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('hero_title')
                    ->label('Hero')
                    ->limit(50),
                TextColumn::make('movement_title')
                    ->label('Judul Gerakan')
                    ->limit(40),
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
