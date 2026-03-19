<?php

namespace App\Filament\Resources\WebsiteContents\Pages;

use App\Filament\Resources\WebsiteContents\WebsiteContentResource;
use Filament\Resources\Pages\ListRecords;

class ListWebsiteContents extends ListRecords
{
    protected static string $resource = WebsiteContentResource::class;
}
