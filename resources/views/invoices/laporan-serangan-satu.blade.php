<x-laporan>

<div class="text-center mb-4">
    <h2 style="margin-bottom: 0;">Laporan Analisis Serangan Hama & Tanaman</h2>
    <small style="color: #555;">Tanggal: {{ $laporan->created_at->format('d F Y') }}</small>
    <hr style="margin-top: 8px;">
</div>

<!-- Identitas Umum -->
<table style="margin-bottom: 20px;">
    <thead>
        <tr>
            <th colspan="2">Informasi Umum</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><b>Nama Tanaman</b></td>
            <td>{{ $laporan->tanaman->nama_tanaman }}</td>
        </tr>
        <tr>
            <td><b>Pelapor</b></td>
            <td>{{ $laporan->user->nama }}</td>
        </tr>
        <tr>
            <td><b>Status Laporan</b></td>
            <td>{{ $laporan->status->getLabel() }}</td>
        </tr>
        <tr>
            <td><b>Tanggal Dibuat</b></td>
            <td>{{ $laporan->created_at->format('d M Y') }}</td>
        </tr>
    </tbody>
</table>

<!-- Gambar Tanaman -->
@if ($laporan->tanaman->gambar)
<div style="text-align:center; margin-bottom: 20px;">
    <img src="{{ asset('storage/' . $laporan->tanaman->gambar) }}"
         alt="Gambar Tanaman"
         style="max-width: 400px; max-height: 300px; object-fit: cover; border-radius: 8px; border: 1px solid #ccc;">
    <p style="margin-top: 8px; color:#666; font-size: 10pt;"><i>{{ $laporan->tanaman->nama_tanaman }}</i></p>
</div>
@endif

<!-- Deskripsi -->
<table style="margin-bottom: 20px;">
    <thead>
        <tr>
            <th>Deskripsi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                {!! nl2br(e($laporan->tanaman->deskripsi ?? 'Tidak ada deskripsi tanaman.')) !!}
            </td>
        </tr>
        <tr>
            <td>
                <b>Deskripsi Laporan:</b><br>
                {!! nl2br(e($laporan->deskripsi)) !!}
            </td>
        </tr>
    </tbody>
</table>

<!-- Penyebab Serangan -->
<table style="margin-bottom: 20px;">
    <thead>
        <tr>
            <th colspan="2">Penyebab Serangan</th>
        </tr>
    </thead>
    <tbody>
        @if ($laporan->penyebabSerangan->count())
            @foreach ($laporan->penyebabSerangan as $index => $penyebab)
                <tr>
                    <td style="width: 5%; text-align: center;">{{ $index + 1 }}</td>
                    <td>{{ $penyebab->nama }}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="2" class="text-muted fst-italic" style="text-align:center;">Belum ada data penyebab.</td>
            </tr>
        @endif
    </tbody>
</table>

<!-- Penanganan -->
@if ($laporan->penanganan)
<table style="margin-bottom: 20px;">
    <thead>
        <tr>
            <th>Rekomendasi Penanganan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                {!! nl2br(e($laporan->penanganan->isi_penanganan ?? 'Tidak ada keterangan.')) !!}
            </td>
        </tr>
    </tbody>
</table>
@endif

<!-- Tanda Tangan -->
<div style="margin-top: 40px; text-align: right;">
    <p style="margin-bottom: 60px;">Disusun oleh,<br><b>Tim Analisis Serangan Hama & Penyakit</b></p>
    <p style="border-top: 1px solid #000; display:inline-block; padding-top:5px;">{{ $laporan->user->nama }}</p>
</div>
</x-laporan>
