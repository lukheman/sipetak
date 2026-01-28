@php
    use App\Enums\State;
    use App\Models\PenyebabSerangan;
@endphp

<div>
    <!-- Modal Form Penyebab Serangan -->
    <div class="modal fade" id="modal-form-penyebab-serangan" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title fw-bold" id="penyebabSeranganModalLabel">
                        @if ($currentState === State::CREATE)
                            <i class="mdi mdi-plus-circle-outline me-2"></i>Tambah Penyebab Serangan
                        @elseif ($currentState === State::UPDATE)
                            <i class="mdi mdi-pencil-outline me-2"></i>Perbarui Penyebab Serangan
                        @elseif ($currentState === State::SHOW)
                            <i class="mdi mdi-file-document-outline me-2"></i>Detail Penyebab Serangan
                        @endif
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    @if ($currentState === State::SHOW)
                        <!-- Detail View -->
                        <div class="mb-3">
                            <p class="mb-1 text-muted">Nama Penyebab Serangan</p>
                            <h6>{{ $form->nama }}</h6>
                        </div>

                        <div class="mb-3">
                            <p class="mb-1 text-muted">Tipe</p>
                            <span class="badge bg-{{ $form->tipe === 'hama' ? 'warning text-dark' : 'danger' }}">
                                <i class="mdi mdi-{{ $form->tipe === 'hama' ? 'bug' : 'virus' }} me-1"></i>
                                {{ ucfirst($form->tipe) }}
                            </span>
                        </div>

                        <div class="mb-3">
                            <p class="mb-1 text-muted">Deskripsi</p>
                            <div class="border rounded p-3 bg-light">
                                {{ $form->deskripsi ?? 'Tidak ada deskripsi.' }}
                            </div>
                        </div>
                    @else
                        <!-- Create/Edit Form -->
                        <form wire:submit.prevent="save">
                            <!-- Nama -->
                            <div class="mb-3">
                                <label for="nama" class="form-label fw-semibold">Nama Penyebab Serangan</label>
                                <input wire:model="form.nama" type="text"
                                    class="form-control @error('form.nama') is-invalid @enderror" id="nama"
                                    placeholder="Masukkan nama penyebab serangan">
                                @error('form.nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Tipe -->
                            <div class="mb-3">
                                <label for="tipe" class="form-label fw-semibold">Tipe Penyebab</label>
                                <select wire:model="form.tipe" class="form-select @error('form.tipe') is-invalid @enderror"
                                    id="tipe">
                                    <option value="">-- Pilih Tipe --</option>
                                    @foreach (PenyebabSerangan::TIPE_OPTIONS as $value => $label)
                                        <option value="{{ $value }}">{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('form.tipe')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Deskripsi -->
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
                                <textarea wire:model="form.deskripsi"
                                    class="form-control @error('form.deskripsi') is-invalid @enderror" id="deskripsi"
                                    rows="4" placeholder="Jelaskan tentang penyebab serangan ini..."
                                    style="height: 150px;"></textarea>
                                @error('form.deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </form>
                    @endif
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="mdi mdi-close me-1"></i>Tutup
                    </button>
                    @if ($currentState === State::CREATE)
                        <button type="button" wire:click="save" class="btn btn-primary">
                            <i class="mdi mdi-content-save-outline me-1"></i>Tambahkan
                        </button>
                    @elseif ($currentState === State::UPDATE)
                        <button type="button" wire:click="save" class="btn btn-primary">
                            <i class="mdi mdi-content-save-outline me-1"></i>Perbarui
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Card Daftar Penyebab Serangan -->
    <div class="card">
        <div class="card-header">
            <x-datatable.header icon="mdi-bug" table="Penyebab Serangan" />
        </div>

        <div class="card-body">
            <!-- Tabs Filter: Semua | Hama | Penyakit -->
            <ul class="nav nav-tabs mb-3">
                <li class="nav-item">
                    <button wire:click="setActiveTab('all')"
                        class="nav-link {{ $activeTab === 'all' ? 'active' : '' }}">
                        <i class="mdi mdi-view-list me-1"></i>
                        Semua
                        <span class="badge bg-secondary ms-1">{{ $this->countAll }}</span>
                    </button>
                </li>
                <li class="nav-item">
                    <button wire:click="setActiveTab('hama')"
                        class="nav-link {{ $activeTab === 'hama' ? 'active' : '' }}">
                        <i class="mdi mdi-bug me-1"></i>
                        Hama
                        <span class="badge bg-warning text-dark ms-1">{{ $this->countHama }}</span>
                    </button>
                </li>
                <li class="nav-item">
                    <button wire:click="setActiveTab('penyakit')"
                        class="nav-link {{ $activeTab === 'penyakit' ? 'active' : '' }}">
                        <i class="mdi mdi-virus me-1"></i>
                        Penyakit
                        <span class="badge bg-danger ms-1">{{ $this->countPenyakit }}</span>
                    </button>
                </li>
            </ul>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nama Penyebab Serangan</th>
                            <th>Tipe</th>
                            <th>Deskripsi</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($this->penyebabSerangan as $item)
                            <tr>
                                <td>{{ $item->nama }}</td>
                                <td>
                                    @if ($item->isHama())
                                        <span class="badge bg-warning text-dark">
                                            <i class="mdi mdi-bug me-1"></i>Hama
                                        </span>
                                    @else
                                        <span class="badge bg-danger">
                                            <i class="mdi mdi-virus me-1"></i>Penyakit
                                        </span>
                                    @endif
                                </td>
                                <td>{{ Str::limit($item->deskripsi, 80, '...') }}</td>
                                <td class="text-end">
                                    <x-datatable.actions :id="$item->id" />
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-3">
                                    @if ($activeTab === 'all')
                                        Tidak ada data penyebab serangan.
                                    @elseif ($activeTab === 'hama')
                                        Tidak ada data hama.
                                    @else
                                        Tidak ada data penyakit.
                                    @endif
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <x-pagination :items="$this->penyebabSerangan" />
            </div>
        </div>
    </div>
</div>