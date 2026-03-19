<?php

namespace App\Filament\Resources\ContactMessages\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ContactMessageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Pengirim')
                    ->schema([
                        TextInput::make('first_name')
                            ->label('Nama Depan')
                            ->disabled(),
                        TextInput::make('last_name')
                            ->label('Nama Belakang')
                            ->disabled(),
                        TextInput::make('whatsapp')
                            ->label('No WhatsApp')
                            ->disabled()
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
                Section::make('Isi Pesan')
                    ->schema([
                        Textarea::make('message')
                            ->label('Pesan')
                            ->rows(6)
                            ->disabled()
                            ->columnSpanFull(),
                    ]),
                Section::make('Tindak Lanjut')
                    ->schema([
                        Toggle::make('is_read')
                            ->label('Sudah Ditindaklanjuti')
                            ->inline(false),
                        Textarea::make('handled_note')
                            ->label('Catatan Admin')
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),
            ])
            ->columns(1);
    }
}
