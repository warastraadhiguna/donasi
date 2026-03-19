<?php

namespace App\Filament\Resources\WebsiteContents;

use App\Filament\Resources\WebsiteContents\Pages\CreateWebsiteContent;
use App\Filament\Resources\WebsiteContents\Pages\EditWebsiteContent;
use App\Filament\Resources\WebsiteContents\Pages\ListWebsiteContents;
use App\Filament\Resources\WebsiteContents\Schemas\WebsiteContentForm;
use App\Filament\Resources\WebsiteContents\Tables\WebsiteContentsTable;
use App\Models\WebsiteContent;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Schema as DatabaseSchema;
use UnitEnum;

class WebsiteContentResource extends Resource
{
    protected static ?string $model = WebsiteContent::class;

    protected static ?string $modelLabel = 'Konten Website';

    protected static ?string $pluralModelLabel = 'Konten Website';

    protected static ?string $navigationLabel = 'Konten Website';

    protected static string|UnitEnum|null $navigationGroup = 'Pengaturan';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return WebsiteContentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WebsiteContentsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListWebsiteContents::route('/'),
            'create' => CreateWebsiteContent::route('/create'),
            'edit' => EditWebsiteContent::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        if (! DatabaseSchema::hasTable((new WebsiteContent())->getTable())) {
            return false;
        }

        return static::getModel()::query()->count() === 0;
    }
}
