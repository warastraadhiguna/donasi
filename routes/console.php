<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Models\DonationProgram;
use App\Services\SocialPreviewPublisher;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('preview:publish {slug? : Slug program yang ingin dipublish} {--all : Publish semua program}', function (): int {
    $publisher = app(SocialPreviewPublisher::class);

    if (! $publisher->isConfigured()) {
        $this->error('GitHub preview publishing is not configured. Please set GITHUB_PREVIEW_OWNER, GITHUB_PREVIEW_REPO, GITHUB_PREVIEW_TOKEN, and PREVIEW_BASE_URL.');

        return 1;
    }

    $slug = $this->argument('slug');

    $programs = DonationProgram::query()
        ->when($slug, fn ($query) => $query->where('slug', $slug))
        ->when(! $slug && ! $this->option('all'), fn ($query) => $query->where('status', 'Aktif'))
        ->ordered()
        ->get();

    if ($programs->isEmpty()) {
        $this->warn('No donation programs found.');

        return 0;
    }

    foreach ($programs as $program) {
        $result = $publisher->publish($program);

        $this->info($program->slug . ' -> ' . $result['url']);
    }

    return 0;
})->purpose('Publish donation program social preview pages to GitHub Pages.');
