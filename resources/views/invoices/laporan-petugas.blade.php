

<x-laporan.index>

    <x-laporan.navbar-download :pdf="$pdf" />

    <h5 class="report-title">Laporan Data {{ $label ?? ''}}</h5>

    <p class="report-date">Laporan {{ $label ?? ''}} - {{ date('d F Y')}}</p>

    <!-- Table -->
    <table id="petani">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Petugas</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Jabatan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $item)
                <tr>
                    <td class="center">{{ $loop->index + 1 }}</td>
                    <td>{{ $item->nama_petugas}}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->telepon }}</td>
                    <td>{{ $item->jabatan }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">
                        Tidak ada data petugas.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Total -->
    <div class="total">
        <p>Total {{ $label ?? 'data'}}: <strong>{{ $users->count() }}</strong></p>
    </div>

    <!-- Tanda Tangan -->
    <!-- <x-signature /> -->
</x-laporan.index>
