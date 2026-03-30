<?php

namespace App\Filament\Widgets;

use App\Models\DonationDetail;
use App\Models\DonationProgram;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DonationProgramStatsOverview extends StatsOverviewWidget
{
    protected ?string $heading = 'Ringkasan Ruang Donasi';

    protected ?string $description = 'Jumlah ruang donasi berdasarkan status yang tersimpan di admin.';

    protected function getStats(): array
    {
        $statusCounts = DonationProgram::query()
            ->selectRaw('status, COUNT(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status');

        $totalPrograms = (int) $statusCounts->sum();
        $activePrograms = (int) ($statusCounts['Aktif'] ?? 0);
        $completedPrograms = (int) ($statusCounts['Tercapai'] ?? 0);
        $finishedPrograms = (int) ($statusCounts['Selesai'] ?? 0);
        $pendingVerifications = DonationDetail::query()
            ->where('is_verified', false)
            ->count();

        return [
            Stat::make('Total Ruang Donasi', number_format($totalPrograms))
                ->description('Semua program yang tercatat')
                ->color('gray')
                ->icon(Heroicon::OutlinedSquares2x2),
            Stat::make('Aktif', number_format($activePrograms))
                ->description('Masih menerima donasi')
                ->color('success')
                ->icon(Heroicon::OutlinedBolt),
            Stat::make('Tercapai', number_format($completedPrograms))
                ->description('Target donasi sudah terpenuhi')
                ->color('info')
                ->icon(Heroicon::OutlinedCheckBadge),
            Stat::make('Selesai', number_format($finishedPrograms))
                ->description('Program sudah ditutup')
                ->color('warning')
                ->icon(Heroicon::OutlinedArchiveBox),
            Stat::make('Pembayaran Pending', number_format($pendingVerifications))
                ->description('Menunggu verifikasi admin')
                ->color('danger')
                ->icon(Heroicon::OutlinedClock),
        ];
    }
}
