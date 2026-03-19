@php
    $sourceLabel = $record->input_source === 'website' ? 'Landing Page' : 'Admin';
    $sourceColor = $record->input_source === 'website' ? '#54bfd0' : '#ea004f';
    $verificationLabel = $record->is_verified ? 'Sudah Diverifikasi' : 'Menunggu Verifikasi';
    $verificationBg = $record->is_verified ? 'rgba(34, 197, 94, 0.12)' : 'rgba(234, 179, 8, 0.14)';
    $verificationColor = $record->is_verified ? '#15803d' : '#b45309';
@endphp

<div style="display: flex; flex-direction: column; gap: 20px;">
    <div style="border: 1px solid #e5e7eb; background: #ffffff; border-radius: 24px; padding: 16px;">
        @if ($record->payment_proof_is_image && $record->payment_proof_url)
            <img src="{{ $record->payment_proof_url }}" alt="Bukti bayar {{ $record->donor_name }}" style="display: block; width: 100%; border-radius: 18px;">
        @elseif ($record->payment_proof_is_pdf && $record->payment_proof_url)
            <iframe src="{{ $record->payment_proof_url }}" style="display: block; width: 100%; height: 560px; border: 1px solid #e5e7eb; border-radius: 18px;"></iframe>
        @elseif ($record->payment_proof_url)
            <a href="{{ $record->payment_proof_url }}" target="_blank" rel="noopener noreferrer" style="display: inline-flex; align-items: center; justify-content: center; padding: 14px 18px; border-radius: 14px; background: #f3f4f6; color: #111827; font-weight: 600; text-decoration: none;">
                Lihat file bukti bayar
            </a>
        @else
            <div style="padding: 18px; border-radius: 16px; background: #f9fafb; color: #6b7280; font-size: 14px;">
                Bukti bayar belum tersedia.
            </div>
        @endif
    </div>

    <div style="display: flex; flex-wrap: wrap; gap: 10px;">
        <span style="display: inline-flex; align-items: center; padding: 8px 14px; border-radius: 999px; background: {{ $verificationBg }}; color: {{ $verificationColor }}; font-size: 13px; font-weight: 700;">
            {{ $verificationLabel }}
        </span>
        <span style="display: inline-flex; align-items: center; padding: 8px 14px; border-radius: 999px; background: rgba(84, 191, 208, 0.12); color: {{ $sourceColor }}; font-size: 13px; font-weight: 700;">
            Sumber: {{ $sourceLabel }}
        </span>
        @if (filled($record->payment_method))
            <span style="display: inline-flex; align-items: center; padding: 8px 14px; border-radius: 999px; background: rgba(15, 23, 32, 0.06); color: #334155; font-size: 13px; font-weight: 700;">
                Metode: {{ $record->payment_method }}
            </span>
        @endif
    </div>

    <div style="border: 1px solid #e5e7eb; background: linear-gradient(180deg, #ffffff 0%, #f8fbfc 100%); border-radius: 24px; padding: 20px;">
        <div style="margin-bottom: 16px;">
            <div style="font-size: 20px; font-weight: 700; color: #0f172a;">Informasi Donasi</div>
            <div style="margin-top: 4px; font-size: 14px; color: #64748b;">Pastikan data dan bukti pembayaran sesuai sebelum melakukan verifikasi.</div>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 12px;">
            <div style="padding: 14px 16px; border-radius: 18px; border: 1px solid #e5e7eb; background: #ffffff;">
                <div style="margin-bottom: 6px; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; color: #94a3b8;">Donatur</div>
                <div style="font-size: 15px; font-weight: 600; line-height: 1.5; color: #0f172a;">{{ $record->donor_name ?: '-' }}</div>
            </div>

            <div style="padding: 14px 16px; border-radius: 18px; border: 1px solid #e5e7eb; background: #ffffff;">
                <div style="margin-bottom: 6px; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; color: #94a3b8;">WhatsApp</div>
                <div style="font-size: 15px; font-weight: 600; line-height: 1.5; color: #0f172a;">{{ $record->donor_whatsapp ?: '-' }}</div>
            </div>

            <div style="padding: 14px 16px; border-radius: 18px; border: 1px solid #e5e7eb; background: #ffffff;">
                <div style="margin-bottom: 6px; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; color: #94a3b8;">Nominal</div>
                <div style="font-size: 20px; font-weight: 800; line-height: 1.4; color: #ea004f;">Rp {{ number_format((int) $record->amount, 0, ',', '.') }}</div>
            </div>

            <div style="padding: 14px 16px; border-radius: 18px; border: 1px solid #e5e7eb; background: #ffffff;">
                <div style="margin-bottom: 6px; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; color: #94a3b8;">Tanggal Donasi</div>
                <div style="font-size: 15px; font-weight: 600; line-height: 1.5; color: #0f172a;">{{ $record->donated_at?->translatedFormat('d M Y') ?: '-' }}</div>
            </div>
        </div>

        @if (filled($record->note))
            <div style="margin-top: 16px; padding: 16px 18px; border-radius: 20px; background: rgba(84, 191, 208, 0.08); border: 1px solid rgba(84, 191, 208, 0.18);">
                <div style="margin-bottom: 6px; font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: uppercase; color: #0f766e;">Catatan</div>
                <div style="font-size: 14px; line-height: 1.7; color: #334155;">{{ $record->note }}</div>
            </div>
        @endif
    </div>
</div>
