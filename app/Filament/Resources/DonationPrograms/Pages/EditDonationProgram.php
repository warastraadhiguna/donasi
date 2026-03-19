<?php

namespace App\Filament\Resources\DonationPrograms\Pages;

use App\Filament\Resources\DonationPrograms\DonationProgramResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDonationProgram extends EditRecord
{
    protected static string $resource = DonationProgramResource::class;

    public function hasCombinedRelationManagerTabsWithContent(): bool
    {
        return true;
    }

    public function getContentTabLabel(): ?string
    {
        return 'Data Ruang Donasi';
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
