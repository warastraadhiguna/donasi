<?php

namespace App\Filament\Resources\WebsiteContents\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class WebsiteContentForm
{
    protected static function movementIconOptions(): array
    {
        return [
            'images/icons/hands.png' => 'Hands / Relawan',
            'images/icons/heart.png' => 'Heart / Program Sosial',
            'images/icons/receive.png' => 'Receive / Donasi',
            'images/icons/scholarship.png' => 'Scholarship / Kolaborasi',
        ];
    }

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Konten Website')
                    ->tabs([
                        Tab::make('Bagian Utama')
                            ->schema([
                                Section::make()
                                    ->schema([
                                        FileUpload::make('hero_background_image')
                                            ->label('Gambar Latar Utama')
                                            ->image()
                                            ->imageEditor()
                                            ->disk('public')
                                            ->directory('website-content/hero')
                                            ->visibility('public')
                                            ->helperText('Upload gambar untuk background bagian hero di halaman utama.')
                                            ->columnSpanFull(),
                                        TextInput::make('hero_eyebrow')->label('Teks Kecil di Atas Judul')->required(),
                                        Textarea::make('hero_title')->label('Judul Utama')->required()->rows(3)->columnSpanFull(),
                                        Textarea::make('hero_description')->label('Deskripsi Singkat')->required()->rows(4)->columnSpanFull(),
                                    ])
                                    ->columns(2),
                            ]),
                        Tab::make('Catatan Singkat')
                            ->schema([
                                Section::make()
                                    ->schema([
                                        TextInput::make('hero_note_1')->label('Catatan 1')->required(),
                                        TextInput::make('hero_note_2')->label('Catatan 2')->required(),
                                        TextInput::make('hero_note_3')->label('Catatan 3')->required(),
                                    ])
                                    ->columns(2),
                            ]),
                        Tab::make('Angka Dampak')
                            ->schema([
                                Section::make()
                                    ->schema([
                                        TextInput::make('impact_1_value')->label('Angka Dampak 1')->required(),
                                        Textarea::make('impact_1_text')->label('Keterangan Dampak 1')->required()->rows(3),
                                        TextInput::make('impact_2_value')->label('Angka Dampak 2')->required(),
                                        Textarea::make('impact_2_text')->label('Keterangan Dampak 2')->required()->rows(3),
                                        TextInput::make('impact_3_value')->label('Angka Dampak 3')->required(),
                                        Textarea::make('impact_3_text')->label('Keterangan Dampak 3')->required()->rows(3),
                                    ])
                                    ->columns(2),
                            ]),
                        Tab::make('Cara Ikut Bantu')
                            ->schema([
                                Section::make()
                                    ->schema([
                                        TextInput::make('movement_title')->label('Judul Bagian')->required()->columnSpanFull(),
                                        Repeater::make('movement_items')
                                            ->label('Daftar Pilihan')
                                            ->schema([
                                                TextInput::make('text')
                                                    ->label('Teks')
                                                    ->required(),
                                                Select::make('icon')
                                                    ->label('Ikon')
                                                    ->options(static::movementIconOptions())
                                                    ->native(false)
                                                    ->required(),
                                                TextInput::make('link')
                                                    ->label('Link Tujuan')
                                                    ->required()
                                                    ->helperText('Bisa isi path internal seperti /donasi, anchor seperti #program, atau URL penuh.')
                                                    ->columnSpanFull(),
                                            ])
                                            ->defaultItems(0)
                                            ->minItems(1)
                                            ->reorderable()
                                            ->collapsible()
                                            ->itemLabel(fn (array $state): ?string => filled($state['text'] ?? null) ? $state['text'] : 'Pilihan baru')
                                            ->columns(2)
                                            ->columnSpanFull(),
                                    ])
                                    ->columns(2),
                            ]),
                        Tab::make('Tentang HMI Peduli')
                            ->schema([
                                Section::make()
                                    ->schema([
                                        FileUpload::make('about_image')
                                            ->label('Foto Bagian Tentang')
                                            ->image()
                                            ->imageEditor()
                                            ->disk('public')
                                            ->directory('website-content/about')
                                            ->visibility('public')
                                            ->helperText('Upload foto yang tampil di sisi kiri bagian Tentang.')
                                            ->columnSpanFull(),
                                        TextInput::make('about_badge')->label('Label Kecil')->required(),
                                        Textarea::make('about_title')->label('Judul Bagian')->required()->rows(3)->columnSpanFull(),
                                        Textarea::make('about_description')->label('Deskripsi Utama')->required()->rows(4)->columnSpanFull(),
                                        TextInput::make('about_metric_1_value')->label('Angka Ringkasan 1')->required(),
                                        Textarea::make('about_metric_1_text')->label('Keterangan Ringkasan 1')->required()->rows(3),
                                        TextInput::make('about_metric_2_value')->label('Angka Ringkasan 2')->required(),
                                        Textarea::make('about_metric_2_text')->label('Keterangan Ringkasan 2')->required()->rows(3),
                                    ])
                                    ->columns(2),
                            ]),
                        Tab::make('Visi dan Misi')
                            ->schema([
                                Section::make()
                                    ->schema([
                                        TextInput::make('about_principle_title')->label('Judul Bagian')->required()->columnSpanFull(),
                                        Textarea::make('about_principle_1')->label('Visi')->required()->rows(3),
                                        Textarea::make('about_principle_2')->label('Misi')->required()->rows(3),
                                    ])
                                    ->columns(2),
                            ]),
                        Tab::make('Hubungi Kami')
                            ->schema([
                                Section::make()
                                    ->schema([
                                        TextInput::make('contact_form_title')->label('Judul Form')->required(),
                                        Textarea::make('contact_form_description')->label('Keterangan Form')->required()->rows(3)->columnSpanFull(),
                                    ])
                                    ->columns(2),
                            ]),
                    ])
                    ->columnSpanFull(),
            ])
            ->columns(1);
    }
}
