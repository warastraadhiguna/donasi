<div style="display: flex; flex-direction: column; gap: 4px; min-width: 170px;">
    <div style="font-size: 13px; font-weight: 700; color: #0f172a;">
        {{ $getRecord()->donor_name ?: '-' }}
    </div>
    <div style="font-size: 12px; color: #64748b;">
        {{ $getRecord()->donor_whatsapp ?: '-' }}
    </div>
    <div style="font-size: 12px; font-weight: 700; color: #ea004f;">
        Rp {{ number_format((int) $getRecord()->amount, 0, ',', '.') }}
    </div>
</div>
