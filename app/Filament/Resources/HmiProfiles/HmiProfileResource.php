<?php

namespace App\Filament\Resources\HmiProfiles;

use App\Filament\Resources\HmiProfiles\Pages\CreateHmiProfile;
use App\Filament\Resources\HmiProfiles\Pages\EditHmiProfile;
use App\Filament\Resources\HmiProfiles\Pages\ListHmiProfiles;
use App\Filament\Resources\HmiProfiles\Schemas\HmiProfileForm;
use App\Filament\Resources\HmiProfiles\Tables\HmiProfilesTable;
use App\Models\HmiProfile;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Schema as DatabaseSchema;
use UnitEnum;

class HmiProfileResource extends Resource
{
    protected static ?string $model = HmiProfile::class;

    protected static ?string $modelLabel = 'Data HMI';

    protected static ?string $pluralModelLabel = 'Data HMI';

    protected static ?string $navigationLabel = 'Data HMI';

    protected static string|UnitEnum|null $navigationGroup = 'Pengaturan';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice2;

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return HmiProfileForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HmiProfilesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListHmiProfiles::route('/'),
            'create' => CreateHmiProfile::route('/create'),
            'edit' => EditHmiProfile::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        if (! DatabaseSchema::hasTable((new HmiProfile())->getTable())) {
            return false;
        }

        return static::getModel()::query()->count() === 0;
    }
}
