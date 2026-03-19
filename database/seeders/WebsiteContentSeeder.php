<?php

namespace Database\Seeders;

use App\Models\WebsiteContent;
use Illuminate\Database\Seeder;

class WebsiteContentSeeder extends Seeder
{
    public function run(): void
    {
        WebsiteContent::query()->updateOrCreate(
            ['id' => 1],
            (new WebsiteContent())->getAttributes(),
        );
    }
}
