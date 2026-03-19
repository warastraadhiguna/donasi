<?php

use App\Models\ContactMessage;
use App\Models\DonationDetail;
use App\Models\DonationProgram;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;

Route::get('/', function () {
    return view('home', [
        'featuredPrograms' => DonationProgram::query()
            ->withSum('verifiedDonationDetails', 'amount')
            ->featured()
            ->ordered()
            ->limit(3)
            ->get(),
    ]);
});

Route::post('/kontak', function (Request $request) {
    $validated = $request->validate([
        'first_name' => ['required', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'],
        'whatsapp' => ['required', 'string', 'max:255'],
        'message' => ['required', 'string', 'max:5000'],
    ]);

    ContactMessage::query()->create([
        'first_name' => $validated['first_name'],
        'last_name' => $validated['last_name'],
        'whatsapp' => $validated['whatsapp'],
        'email' => '',
        'message' => $validated['message'],
    ]);

    return redirect('/')
        ->withFragment('kontak')
        ->with('contact_submitted', 'Pesan kamu berhasil dikirim. Tim kami akan menindaklanjutinya secepat mungkin.');
})->name('contact.submit');

Route::get('/donasi', function () {
    $programs = DonationProgram::query()
        ->withSum('verifiedDonationDetails', 'amount')
        ->where('status', 'Aktif')
        ->ordered()
        ->get();

    $selectedProgram = old('program', request('program'));

    if (! $programs->contains(fn (DonationProgram $program) => $program->slug === $selectedProgram)) {
        $selectedProgram = null;
    }

    return view('donate', [
        'programs' => $programs,
        'selectedProgram' => $selectedProgram,
    ]);
})->name('donate.page');

Route::post('/donasi', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'program' => [
            'required',
            'string',
            Rule::exists('donation_programs', 'slug')->where(fn ($query) => $query->where('status', 'Aktif')),
        ],
        'amount' => ['required', 'string'],
        'donation_name' => ['required', 'string', 'max:255'],
        'donation_whatsapp' => ['required', 'string', 'max:255'],
        'payment_method' => ['required', Rule::in(['Transfer', 'QRIS'])],
        'payment_proof' => ['required', 'file', 'mimes:jpg,jpeg,png,webp,pdf', 'max:10240'],
    ], [
        'program.required' => 'Ruang donasi wajib dipilih.',
        'payment_method.required' => 'Metode pembayaran wajib dipilih.',
        'payment_proof.required' => 'Bukti pembayaran wajib diupload.',
    ]);

    $validator->after(function ($validator) use ($request): void {
        $amount = (int) preg_replace('/\D+/', '', (string) $request->input('amount'));

        if ($amount < 1) {
            $validator->errors()->add('amount', 'Nominal donasi harus lebih dari nol.');
        }
    });

    $validated = $validator->validate();

    $program = DonationProgram::query()
        ->where('slug', $validated['program'])
        ->where('status', 'Aktif')
        ->firstOrFail();

    $amount = (int) preg_replace('/\D+/', '', (string) $validated['amount']);
    $proofPath = $request->file('payment_proof')->store('donation-proofs', 'public');

    DonationDetail::query()->create([
        'donation_program_id' => $program->id,
        'donor_name' => $validated['donation_name'],
        'donor_whatsapp' => $validated['donation_whatsapp'],
        'amount' => $amount,
        'donated_at' => now()->toDateString(),
        'payment_method' => $validated['payment_method'],
        'payment_proof_path' => $proofPath,
        'input_source' => 'website',
        'note' => 'Dikirim dari landing page.',
        'is_verified' => false,
        'verified_at' => null,
        'verified_by' => null,
    ]);

    return redirect()
        ->route('donate.page', ['program' => $program->slug])
        ->with('donation_submitted', 'Data donasi berhasil dikirim. Tim admin akan memeriksa bukti pembayaran terlebih dahulu.');
});

Route::get('/galeri', function () {
    $programs = DonationProgram::query()->ordered()->get();

    $allGalleryItems = $programs
        ->flatMap(function (DonationProgram $program) {
            $data = $program->toViewData();

            return collect([[
                'type' => 'image',
                'src' => $data['hero_image'],
                'thumb' => $data['hero_image'],
                'poster' => $data['hero_image'],
            ]])
                ->merge(collect($data['gallery'])->map(function (mixed $item) use ($data): ?array {
                    if (is_string($item)) {
                        $extension = strtolower(pathinfo($item, PATHINFO_EXTENSION));

                        if (in_array($extension, ['mp4', 'webm', 'ogg'], true)) {
                            return [
                                'type' => 'video',
                                'src' => $item,
                                'thumb' => $data['hero_image'],
                                'poster' => $data['hero_image'],
                            ];
                        }

                        return [
                            'type' => 'image',
                            'src' => $item,
                            'thumb' => $item,
                            'poster' => $data['hero_image'],
                        ];
                    }

                    if (! is_array($item) || blank($item['src'] ?? null)) {
                        return null;
                    }

                    return [
                        'type' => $item['type'] ?? 'image',
                        'src' => $item['src'],
                        'thumb' => $item['thumb'] ?? ($item['poster'] ?? $item['src']),
                        'poster' => $item['poster'] ?? $data['hero_image'],
                    ];
                }))
                ->filter()
                ->unique(fn (array $item): string => ($item['type'] ?? 'image') . '|' . ($item['src'] ?? ''))
                ->values()
                ->map(function (array $item) use ($program): array {
                    return [
                        ...$item,
                        'program_title' => $program->title,
                        'program_slug' => $program->slug,
                        'program_summary' => $program->summary,
                        'categories' => collect($program->categories)->filter()->values()->all(),
                    ];
                });
        })
        ->values();

    $perPage = 12;
    $currentPage = LengthAwarePaginator::resolveCurrentPage();
    $galleryItems = new LengthAwarePaginator(
        $allGalleryItems->slice(($currentPage - 1) * $perPage, $perPage)->values(),
        $allGalleryItems->count(),
        $perPage,
        $currentPage,
        [
            'path' => request()->url(),
            'query' => request()->query(),
        ],
    );

    return view('gallery', [
        'galleryItems' => $galleryItems,
        'programCount' => $programs->count(),
        'photoCount' => $allGalleryItems->where('type', 'image')->count(),
        'videoCount' => $allGalleryItems->where('type', 'video')->count(),
    ]);
})->name('gallery');

Route::get('/ruang-donasi', function () {
    return view('ruang-donasi', [
        'programs' => DonationProgram::query()
            ->withSum('verifiedDonationDetails', 'amount')
            ->ordered()
            ->get(),
    ]);
});

Route::get('/ruang-donasi/{program:slug}', function (DonationProgram $program) {
    $program->loadSum('verifiedDonationDetails', 'amount');

    return view('program-detail', [
        'program' => $program->toViewData(),
    ]);
})->name('program.detail');
