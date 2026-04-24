<?php

namespace App\Filament\Resources\HmiProfiles\Pages;

use App\Filament\Resources\HmiProfiles\HmiProfileResource;
use App\Models\HmiProfile;
use Filament\Resources\Pages\ListRecords;

class ListHmiProfiles extends ListRecords
{
    protected static string $resource = HmiProfileResource::class;

    public function mount(): void
    {
        parent::mount();

        $profile = HmiProfile::query()->first();

        if ($profile === null) {
            return;
        }

        $this->redirect(static::getResource()::getUrl('edit', [
            'record' => $profile,
        ]));
    }
}
