<?php

namespace App\Filament\Resources\DonationPrograms;

use App\Filament\Resources\DonationPrograms\Pages\CreateDonationProgram;
use App\Filament\Resources\DonationPrograms\Pages\EditDonationProgram;
use App\Filament\Resources\DonationPrograms\Pages\ListDonationPrograms;
use App\Filament\Resources\DonationPrograms\RelationManagers\DonationDetailsRelationManager;
use App\Filament\Resources\DonationPrograms\Schemas\DonationProgramForm;
use App\Filament\Resources\DonationPrograms\Tables\DonationProgramsTable;
use App\Models\DonationProgram;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class DonationProgramResource extends Resource
{
    protected static ?string $model = DonationProgram::class;

    protected static ?string $modelLabel = 'Ruang Donasi';

    protected static ?string $pluralModelLabel = 'Ruang Donasi';

    protected static ?string $navigationLabel = 'Ruang Donasi';

    protected static string|UnitEnum|null $navigationGroup = 'Program';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedHeart;

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return DonationProgramForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DonationProgramsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            DonationDetailsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDonationPrograms::route('/'),
            'create' => CreateDonationProgram::route('/create'),
            'edit' => EditDonationProgram::route('/{record}/edit'),
        ];
    }
}
