<?php

namespace App\Filament\Resources\DonationPrograms\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;

class DonationProgramForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Data Ruang Donasi')
                    ->tabs([
                        Tab::make('Informasi Dasar')
                            ->schema([
                                Section::make()
                                    ->schema([
                                        TextInput::make('title')
                                            ->label('Judul')
                                            ->required()
                                            ->maxLength(255),
                                        Select::make('status')
                                            ->options([
                                                'Aktif' => 'Aktif',
                                                'Tercapai' => 'Tercapai',
                                                'Selesai' => 'Selesai',
                                            ])
                                            ->default('Aktif')
                                            ->required()
                                            ->native(false),
                                        TextInput::make('target_amount')
                                            ->label('Target Donasi')
                                            ->inputMode('numeric')
                                            ->formatStateUsing(fn ($state): ?string => filled($state)
                                                ? number_format((int) preg_replace('/\D+/', '', (string) $state), 0, ',', '.')
                                                : null)
                                            ->live(debounce: 300)
                                            ->afterStateUpdatedJs(<<<'JS'
                                                const digits = String($state ?? '').replace(/\D/g, '')
                                                const formatted = digits.replace(/\B(?=(\d{3})+(?!\d))/g, '.')

                                                if ($state !== formatted) {
                                                    $set('target_amount', formatted)
                                                }
                                            JS)
                                            ->stripCharacters('.')
                                            ->rule('integer')
                                            ->minValue(0)
                                            ->prefix('Rp')
                                            ->required(),
                                        DatePicker::make('start_date')
                                            ->label('Tanggal Mulai'),
                                        DatePicker::make('end_date')
                                            ->label('Tanggal Akhir'),
                                        TextInput::make('sort_order')
                                            ->label('Urutan Tampil')
                                            ->numeric()
                                            ->minValue(0)
                                            ->default(0)
                                            ->required(),
                                        Toggle::make('is_featured')
                                            ->label('Tampilkan di Home')
                                            ->inline(false),
                                    ])
                                    ->columns(3),
                            ]),
                        Tab::make('Konten Program')
                            ->schema([
                                Section::make()
                                    ->schema([
                                        Textarea::make('summary')
                                            ->label('Ringkasan Singkat')
                                            ->required()
                                            ->rows(3)
                                            ->columnSpanFull(),
                                        Textarea::make('lead')
                                            ->label('Lead / Pengantar')
                                            ->rows(4)
                                            ->columnSpanFull(),
                                        Textarea::make('quote')
                                            ->label('Quote')
                                            ->rows(3)
                                            ->columnSpanFull(),
                                        TagsInput::make('categories')
                                            ->label('Kategori')
                                            ->placeholder('Tambahkan kategori'),
                                        TagsInput::make('focus')
                                            ->label('Fokus Program')
                                            ->placeholder('Tambahkan fokus program'),
                                    ])
                                    ->columns(2),
                            ]),
                        Tab::make('Media')
                            ->schema([
                                Section::make()
                                    ->schema([
                                        FileUpload::make('hero_image')
                                            ->label('Gambar Utama')
                                            ->image()
                                            ->disk('public')
                                            ->directory('donation-programs/hero')
                                            ->visibility('public')
                                            ->maxSize(102400)
                                            ->imageEditor()
                                            ->helperText('Upload gambar utama ke storage publik.')
                                            ->required()
                                            ->columnSpanFull(),
                                        Repeater::make('gallery')
                                            ->label('Galeri')
                                            ->schema([
                                                Select::make('type')
                                                    ->label('Tipe')
                                                    ->options([
                                                        'image' => 'Gambar',
                                                        'video' => 'Video',
                                                    ])
                                                    ->default('image')
                                                    ->required(),
                                                FileUpload::make('src')
                                                    ->label('Source')
                                                    ->disk('public')
                                                    ->directory('donation-programs/gallery')
                                                    ->visibility('public')
                                                    ->maxSize(102400)
                                                    ->acceptedFileTypes([
                                                        'image/jpeg',
                                                        'image/png',
                                                        'image/webp',
                                                        'image/gif',
                                                        'video/mp4',
                                                        'video/webm',
                                                        'video/ogg',
                                                        'video/quicktime',
                                                    ])
                                                    ->helperText('Upload file gambar atau video.')
                                                    ->required(),
                                            ])
                                            ->columns(2)
                                            ->columnSpanFull(),
                                    ])
                                    ->columns(1),
                            ]),
                    ])
                    ->columnSpanFull(),
            ])
            ->columns(1);
    }
}
