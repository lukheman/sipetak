@php
    use App\Enums\State;
    use App\Enums\Role;
    use App\Enums\StatusLaporan;
    $activeRole = getActiveUserRole();
@endphp

<div>

<!-- Modal Detail Laporan Serangan -->
<div wire:ignore.self class="modal fade" id="modal-detail-laporan-serangan" tabindex="-1" aria-labelledby="detailLaporanLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fw-bold" id="detailLaporanLabel">
                    <i class="mdi mdi-file-document-outline me-2"></i> Detail Laporan Serangan
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

    <div class="modal-body">
        @if ($selectedLaporan)
            <div class="row">
                <!-- Image Section -->
                @if ($selectedLaporan->tanaman->gambar)
                    <div class="col-lg-4 col-md-5 col-12 mb-3 mb-md-0">
                        <img
                            src="{{ asset('storage/' . $selectedLaporan->tanaman->gambar) }}"
                            alt="{{ $selectedLaporan->tanaman->nama_tanaman }}"
                            class="img-fluid rounded shadow-sm w-100"
                            style="max-height: 300px; object-fit: cover;"
                        >
                    </div>
                @else
                    <div class="col-lg-4 col-md-5 col-12 mb-3 mb-md-0 d-flex align-items-center justify-content-center">
                        <div class="text-center text-muted">
                            <i class="mdi mdi-image-off-outline fs-3 d-block mb-2"></i>
                            <span>Gambar tidak tersedia</span>
                        </div>
                    </div>
                @endif

                <!-- Information Section -->
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="row mb-3">
                        <div class="col-6">
                            <p class="mb-1 text-muted">Tanaman</p>
                            <h6>{{ $selectedLaporan->tanaman->nama_tanaman }}</h6>
                        </div>
                        <div class="col-6">
                            <p class="mb-1 text-muted">Pelapor</p>
                            <h6>{{ $selectedLaporan->user->nama }}</h6>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <p class="mb-1 text-muted">Tanggal Laporan</p>
                            <h6>{{ $selectedLaporan->created_at->format('d M Y') }}</h6>
                        </div>
                        <div class="col-6">
                            <p class="mb-1 text-muted">Status</p>
                            <span class="badge bg-{{ $selectedLaporan->status->getColor() }}">
                                {{ $selectedLaporan->status->getLabel() }}
                            </span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <p class="mb-1 text-muted">Deskripsi Tanaman</p>
                        <div class="border rounded p-3 bg-light">
                            {{ $selectedLaporan->tanaman->deskripsi ?? 'Tidak ada deskripsi tanaman.' }}
                        </div>
                    </div>

                    <div class="mb-3">
                        <p class="mb-1 text-muted">Deskripsi Laporan</p>
                        <div class="border rounded p-3 bg-light">
                            {{ $selectedLaporan->deskripsi }}
                        </div>
                    </div>

                    <div class="mb-3">
                        <p class="mb-1 text-muted">Penyebab Serangan</p>
                        @if ($selectedLaporan->penyebabSerangan->count())
                            <ul class="list-group list-group-flush">
                                @foreach ($selectedLaporan->penyebabSerangan as $penyebab)
                                    <li class="list-group-item">
                                        <i class="mdi mdi-bug-outline text-danger me-2"></i>
                                        {{ $penyebab->nama }}
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-muted fst-italic">Belum ada data penyebab.</p>
                        @endif
                    </div>

                    @if (getActiveUserRole() === Role::PETANI)
                        <div class="mb-3">
                            <p class="mb-1 text-muted">Penanganan</p>
                            <div class="border rounded p-3 bg-light">
                                {{ $selectedLaporan->penanganan->isi_penanganan ?? 'Tidak ada keterangan.' }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Form Penanganan -->
        @if ($currentState !== State::SHOW)

            <hr class="my-4">
            <form wire:submit.prevent="simpanPenanganan">
                <div class="mb-3">
                    <label for="penanganan" class="form-label fw-semibold">
                        Tambahkan Solusi / Penanganan
                    </label>
                    <textarea
                        id="penanganan"
                        rows="3"
                        class="form-control @error('form.penanganan') is-invalid @enderror"
                        placeholder="Tuliskan solusi atau tindakan penanganan..."
                        wire:model="form.penanganan"
                        style="height: 120px;"
                        @if (getActiveUserRole() === Role::PETANI )
        disabled

                        @endif
                    ></textarea>
                    @error('form.penanganan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="mdi mdi-send-circle-outline me-1"></i> Kirim Penanganan
                    </button>
                </div>
            </form>

        @endif
        @else
            <div class="text-center text-muted py-5">
                <i class="mdi mdi-file-search-outline fs-1 d-block mb-2"></i>
                <span>Pilih laporan untuk melihat detail.</span>
            </div>
        @endif
    </div>

        </div>
    </div>
</div>

<!-- Modal Cari Tanaman-->
<div class="modal fade" id="modal-form-search-tanaman" tabindex="-1" wire:ignore.self>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">
                    Tambah Laporan Serangan
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

<div class="modal-body">

    @isset($selectedTanaman)
        <!-- Tampilan ketika tanaman sudah dipilih -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="row g-0">
                <div class="col-md-4">
                    @if ($selectedTanaman->gambar)
                        <img
                            src="{{ asset('storage/' . $selectedTanaman->gambar) }}"
                            alt="{{ $selectedTanaman->nama_tanaman }}"
                            class="img-fluid rounded-start"
                            style="object-fit: cover; height: 200px; width: 100%;"
                        >
                    @else
                        <div class="d-flex align-items-center justify-content-center bg-light text-muted rounded-start"
                             style="height: 200px;">
                            <i class="mdi mdi-image-off-outline fs-1"></i>
                        </div>
                    @endif
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title fw-bold mb-2">{{ $selectedTanaman->nama_tanaman }}</h5>
                        @if ($selectedTanaman->deskripsi)
                            <p class="card-text text-muted mb-3">
                                {{ $selectedTanaman->deskripsi }}
                            </p>
                        @else
                            <p class="text-muted fst-italic">Belum ada deskripsi tanaman.</p>
                        @endif
                        <button wire:click="batalPilihTanaman" class="btn btn-outline-danger btn-sm">
                            <i class="mdi mdi-arrow-left"></i> Ganti Tanaman
                        </button>
                    </div>
                </div>
            </div>
        </div>
  <!-- Section: Penyebab Serangan -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-light fw-semibold">
                <i class="mdi mdi-bug-outline me-1"></i> Pilih Penyebab Serangan
            </div>
            <div class="card-body">
                @forelse ($this->penyebabSeranganList as $penyebab)
                    <div class="form-check mb-2 ms-3">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            value="{{ $penyebab->id }}"
                            id="penyebab-{{ $penyebab->id }}"
                            wire:model="selectedPenyebab"
                        >
                        <label class="form-check-label" for="penyebab-{{ $penyebab->id }}">
                            {{ $penyebab->nama }}
                        </label>
                    </div>
                @empty
                    <p class="text-muted fst-italic">Tidak ada data penyebab serangan.</p>
                @endforelse
            </div>
        </div>

        <!-- Form laporan serangan -->
        <form wire:submit.prevent="save">

            <div class="mb-3">
                <label for="deskripsi" class="form-label fw-semibold">Deskripsi Laporan</label>
                <textarea
                    id="deskripsi"
                    rows="3"
                    class="form-control textarea-custom @error('deskripsi') is-invalid @enderror"
                    placeholder="Jelaskan kondisi tanaman, gejala serangan, dll..."
                    wire:model="form.deskripsi"
                    style="height: 120px;"
                ></textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary">
                    <i class="mdi mdi-content-save-outline me-1"></i> Kirim Laporan Serangan
                </button>
            </div>
        </form>
    @else
        <!-- Pencarian Tanaman -->
        <div class="mb-4">
            <div class="input-group">
                <span class="input-group-text bg-primary text-white">
                    <i class="mdi mdi-magnify"></i>
                </span>
                <input
                    type="text"
                    id="search-tanaman"
                    class="form-control"
                    placeholder="Cari tanaman..."
                    wire:model.debounce.300ms="searchTanaman"
                >
            </div>
        </div>

        <!-- Daftar Tanaman -->
        <div class="row g-3">
            @forelse ($this->tanamanList as $item)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0 hover-card">
                        @if ($item->gambar)
                            <img
                                src="{{ asset('storage/' . $item->gambar) }}"
                                alt="{{ $item->nama_tanaman }}"
                                class="card-img-top rounded-top"
                                style="height: 180px; object-fit: cover;"
                            >
                        @else
                            <div
                                class="d-flex align-items-center justify-content-center bg-light text-muted rounded-top"
                                style="height: 180px;"
                            >
                                <i class="mdi mdi-image-off-outline fs-1"></i>
                            </div>
                        @endif

                        <div class="card-body text-center">
                            <h6 class="fw-bold mb-2">{{ $item->nama_tanaman }}</h6>
                            @if ($item->deskripsi)
                                <p class="text-muted small mb-0">
                                    {{ Str::limit($item->deskripsi, 60) }}
                                </p>
                            @else
                                <p class="text-muted small fst-italic">Belum ada deskripsi</p>
                            @endif
                        </div>

                        <div class="card-footer bg-white border-0 text-center">
                            <button
                                wire:click="pilihTanaman({{ $item->id }})"
                                class="btn btn-primary w-100"
                            >
                                <i class="mdi mdi-check-circle-outline me-1"></i> Pilih
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-5">
                    <i class="mdi mdi-leaf-off-outline fs-2 d-block mb-2"></i>
                    <span>Tidak ada tanaman ditemukan.</span>
                </div>
            @endforelse
        </div>
    @endisset

</div>

        </div>

    </div>
</div>

<!-- Table -->
<div class="card">
    <div class="card-header">
<div class="row">
    <div class="col-6">

        <x-datatable.search table="Laporan Serangan"></x-datatable.search>

    </div>

    <div class="col-6 text-end">

        @if ($activeRole === Role::PETANI)

        <!-- Tombol -->
        <button wire:click="add" class="btn btn-primary">
            <i class="mdi mdi-bug"></i>
            Tambah Laporan Serangan
        </button>

        @endif

    </div>

</div>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Tanggal</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th class="text-end">Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($this->laporanSerangan as $item)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal_laporan)->format('d/m/Y') }}</td>
                            <td>{{ Str::limit($item->deskripsi, 50) }}</td>
                            <td>
                                <span class="badge bg-{{ $item->status->getColor() }}">
                                    {{ $item->status->getLabel() }}
                                </span>
                            </td>

                            <td class="text-end">
        {{-- PETANI --}}
@if ($activeRole === Role::PETANI)

    <button wire:click="detail({{ $item->id }})" class="btn btn-info text-white">
        <i class="mdi mdi-eye"></i>
    </button>

    <button wire:click="delete({{ $item->id }})" class="btn btn-danger">
        <i class="mdi mdi-trash-can"></i>
    </button>

@elseif($activeRole === Role::PENYULUH)

        {{--

    <button wire:click="edit({{ $item->id }})" class="btn  btn-warning text-white">
        <i class="mdi mdi-pencil"></i>
    </button>
        --}}

    @if ($item->status === StatusLaporan::PENDING)

    <!-- button terima -->
    <button wire:click="terimaLaporan({{ $item->id }})" class="btn btn-primary text-white">
        <i class="mdi mdi-check"></i>
    </button>

    <!-- button tolak -->
    <button wire:click="tolakLaporan({{ $item->id }})" class="btn btn-danger text-white">
        <i class="mdi mdi-close"></i>
    </button>
    @elseif($item->status === StatusLaporan::IN_PROGRESS)

    <!-- button tangani -->
    <button wire:click="edit({{ $item->id }})" class="btn btn-success text-white">
        <i class="mdi mdi-sprout"></i>
    </button>

    <!-- button selesai -->
    <button wire:click="selesaiLaporan({{ $item->id }})" class="btn btn-primary text-white">
        <i class="mdi mdi-check-all"></i>
    </button>

    @elseif($item->status === StatusLaporan::REJECTED)

    <button wire:click="delete({{ $item->id }})" class="btn btn-danger">
        <i class="mdi mdi-trash-can"></i>
    </button>


    @endif

@elseif($activeRole == Role::KEPALADINAS)

<!-- link cetak -->
    <a href="{{ route('print-laporan.laporan-serangan-satu', $item->id) }}" target="_blank" class="btn btn-danger">
        <i class="mdi mdi-printer"></i> Cetak
    </a>


@endif

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-3">
                                Tidak ada laporan serangan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <x-pagination :items="$this->laporanSerangan" />
        </div>
    </div>
</div>
</div>
