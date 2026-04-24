<?php

namespace App\Filament\Resources\WebsiteContents\Pages;

use App\Filament\Resources\WebsiteContents\WebsiteContentResource;
use App\Models\WebsiteContent;
use Filament\Resources\Pages\ListRecords;

class ListWebsiteContents extends ListRecords
{
    protected static string $resource = WebsiteContentResource::class;

    public function mount(): void
    {
        parent::mount();

        $content = WebsiteContent::query()->first();

        if ($content === null) {
            return;
        }

        $this->redirect(static::getResource()::getUrl('edit', [
            'record' => $content,
        ]));
    }
}
