<?php

namespace Database\Seeders;

use App\Models\WebsiteContent;
use Illuminate\Database\Seeder;

class WebsiteContentSeeder extends Seeder
{
    public function run(): void
    {
        $websiteContent = new WebsiteContent();
        $defaults = $websiteContent->getAttributes();
        $defaults['movement_items'] = $websiteContent->movement_items;

        WebsiteContent::query()->firstOrCreate(
            ['id' => 1],
            $defaults,
        );
    }
}
