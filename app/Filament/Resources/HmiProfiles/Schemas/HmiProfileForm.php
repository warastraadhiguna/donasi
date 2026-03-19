<?php

namespace App\Filament\Resources\HmiProfiles\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class HmiProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Data HMI')
                    ->tabs([
                        Tab::make('Informasi Umum')
                            ->schema([
                                Section::make()
                                    ->schema([
                                        TextInput::make('organization_name')
                                            ->label('Nama Organisasi')
                                            ->required()
                                            ->maxLength(255),
                                        TextInput::make('header_tagline')
                                            ->label('Teks Header Atas')
                                            ->required()
                                            ->maxLength(255)
                                            ->columnSpanFull(),
                                        Textarea::make('footer_description')
                                            ->label('Deskripsi Footer')
                                            ->required()
                                            ->rows(3)
                                            ->columnSpanFull(),
                                    ])
                                    ->columns(2),
                            ]),
                        Tab::make('Kontak & Sosial')
                            ->schema([
                                Section::make()
                                    ->schema([
                                        TextInput::make('contact_email')
                                            ->label('Email Kontak')
                                            ->email()
                                            ->required(),
                                        TextInput::make('whatsapp_url')
                                            ->label('Link WhatsApp')
                                            ->url()
                                            ->helperText('Contoh: https://wa.me/62812xxxx'),
                                        TextInput::make('instagram_url')
                                            ->label('Link Instagram')
                                            ->url(),
                                        TextInput::make('facebook_url')
                                            ->label('Link Facebook')
                                            ->url(),
                                        TextInput::make('youtube_url')
                                            ->label('Link YouTube')
                                            ->url(),
                                        TextInput::make('contact_team_name')
                                            ->label('Nama Tim Kontak')
                                            ->required(),
                                        TextInput::make('contact_team_role')
                                            ->label('Subjudul Tim Kontak')
                                            ->required(),
                                        Textarea::make('contact_address')
                                            ->label('Info Wilayah / Jangkauan')
                                            ->rows(3)
                                            ->required()
                                            ->columnSpanFull(),
                                        Textarea::make('contact_support_text')
                                            ->label('Info Dukungan / Kolaborasi')
                                            ->rows(3)
                                            ->required()
                                            ->columnSpanFull(),
                                    ])
                                    ->columns(2),
                            ]),
                        Tab::make('Pembayaran')
                            ->schema([
                                Section::make()
                                    ->schema([
                                        TextInput::make('transfer_bank_name')
                                            ->label('Nama Bank')
                                            ->required(),
                                        TextInput::make('transfer_account_number')
                                            ->label('Nomor Rekening')
                                            ->required(),
                                        TextInput::make('transfer_account_holder')
                                            ->label('Nama Pemilik Rekening')
                                            ->required()
                                            ->columnSpanFull(),
                                        FileUpload::make('qris_image')
                                            ->label('QRIS')
                                            ->image()
                                            ->disk('public')
                                            ->directory('hmi/qris')
                                            ->visibility('public')
                                            ->maxSize(10240)
                                            ->helperText('Upload gambar QRIS. Jika dikosongkan, halaman donasi memakai dummy QR.')
                                            ->columnSpanFull(),
                                    ])
                                    ->columns(2),
                            ]),
                    ])
                    ->columnSpanFull(),
            ])
            ->columns(1);
    }
}
