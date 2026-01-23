@php
    use App\Enums\State;

    $typeLabels = [
        'petani' => 'Petani',
        'penyuluh' => 'Penyuluh',
        'admin' => 'Admin',
        'kepala_dinas' => 'Kepala Dinas',
    ];

    $currentLabel = $typeLabels[$userType] ?? 'Pengguna';
@endphp

<div>
    <!-- Modal Form Pengguna -->
    <div class="modal fade" id="modal-form-pengguna" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title text-white">
                        @if ($currentState === State::CREATE)
                            Tambah {{ $currentLabel }}
                        @elseif ($currentState === State::UPDATE)
                            Perbarui {{ $currentLabel }}
                        @elseif ($currentState === State::SHOW)
                            Detail {{ $currentLabel }}
                        @endif
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    @isset($form->photo)
                        @if(is_string($form->photo) && $form->photo)
                            <div class="text-center mb-3">
                                <img class="img-md rounded-circle" src="{{ asset('storage/' . $form->photo) }}"
                                    alt="Preview Foto" width="150" height="150">
                            </div>
                        @endif
                    @endisset

                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input wire:model="form.nama" type="text" class="form-control" id="name"
                                placeholder="Masukkan nama"
                                @if ($currentState === State::SHOW) disabled @endif>
                            @error('form.nama') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input wire:model="form.email" type="email" class="form-control" id="email"
                                placeholder="Masukkan email"
                                @if ($currentState === State::SHOW) disabled @endif>
                            @error('form.email') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Telepon - only for petani, penyuluh, kepala_dinas --}}
                        @if (in_array($userType, ['petani', 'penyuluh', 'kepala_dinas']))
                        <div class="mb-3">
                            <label for="telepon" class="form-label">Telepon</label>
                            <input wire:model="form.telepon" type="text" class="form-control" id="telepon"
                                placeholder="Masukkan nomor telepon"
                                @if ($currentState === State::SHOW) disabled @endif>
                            @error('form.telepon') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        @endif

                        {{-- Tanggal Lahir - only for kepala_dinas --}}
                        @if ($userType === 'kepala_dinas')
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input wire:model="form.tanggal_lahir" type="date" class="form-control" id="tanggal_lahir"
                                @if ($currentState === State::SHOW) disabled @endif>
                            @error('form.tanggal_lahir') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        @endif

                        @if ($currentState !== State::SHOW)
                        <div class="mb-3">
                            <label for="password" class="form-label">Password {{ $currentState === State::UPDATE ? '(kosongkan jika tidak ingin mengubah)' : '' }}</label>
                            <input wire:model="form.password" type="password" class="form-control" id="password"
                                placeholder="Masukkan password">
                            @error('form.password') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        @endif

                        {{-- Kecamatan & Desa - only for petani and penyuluh --}}
                        @if (in_array($userType, ['petani', 'penyuluh']))
                        <div class="row">
                            <div class="col-6">
                                <!-- Kecamatan -->
                                <div class="mb-3">
                                    <label for="id_kecamatan" class="form-label">Kecamatan</label>
                                    <select wire:model.live="kecamatan" id="id_kecamatan" class="form-control"
                                        @if ($currentState === State::SHOW) disabled @endif>
                                        <option value="">Pilih Kecamatan</option>
                                        @foreach ($kecamatanList as $kec)
                                            <option value="{{ $kec->id_kecamatan }}">{{ $kec->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('form.id_kecamatan') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <!-- Desa -->
                                <div class="mb-3">
                                    <label for="id_desa" class="form-label">Desa</label>
                                    <select wire:model.live="form.id_desa" id="id_desa" class="form-control"
                                        @if ($currentState === State::SHOW) disabled @endif>
                                        <option value="">Pilih Desa</option>
                                        @foreach ($desaList as $desa)
                                            <option value="{{ $desa->id_desa }}">{{ $desa->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('form.id_desa') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                        </div>
                        @endif
                    </form>
                </div>

                <div class="modal-footer">
                    @if ($currentState === State::CREATE)
                        <button type="button" wire:click="save" class="btn btn-primary">Tambahkan</button>
                    @elseif ($currentState === State::UPDATE)
                        <button type="button" wire:click="save" class="btn btn-primary">Perbarui</button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Card DataTable -->
    <div class="card">
        <div class="card-header">
            <x-datatable.header icon="mdi-account" table="Pengguna" />
        </div>

        <div class="card-body">
            <!-- Tab Navigation -->
            <ul class="nav nav-tabs mb-3">
                <li class="nav-item">
                    <button class="nav-link {{ $userType === 'petani' ? 'active' : '' }}" wire:click="setUserType('petani')">
                        <i class="mdi mdi-account-group me-1"></i> Petani
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link {{ $userType === 'penyuluh' ? 'active' : '' }}" wire:click="setUserType('penyuluh')">
                        <i class="mdi mdi-account-tie me-1"></i> Penyuluh
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link {{ $userType === 'admin' ? 'active' : '' }}" wire:click="setUserType('admin')">
                        <i class="mdi mdi-shield-account me-1"></i> Admin
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link {{ $userType === 'kepala_dinas' ? 'active' : '' }}" wire:click="setUserType('kepala_dinas')">
                        <i class="mdi mdi-account-star me-1"></i> Kepala Dinas
                    </button>
                </li>
            </ul>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            @if (in_array($userType, ['petani', 'penyuluh', 'kepala_dinas']))
                            <th>Telepon</th>
                            @endif
                            <th>Foto</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($this->users as $item)
                            @php
                                $itemName = match($userType) {
                                    'admin' => $item->nama_admin,
                                    'kepala_dinas' => $item->nama_kepala_dinas,
                                    default => $item->nama,
                                };

                                $itemId = match($userType) {
                                    'penyuluh' => $item->id_penyuluh,
                                    'admin' => $item->id_admin,
                                    'kepala_dinas' => $item->id_kepala_dinas,
                                    default => $item->id_petani,
                                };
                            @endphp
                            <tr>
                                <td>{{ $itemName }}</td>
                                <td>{{ $item->email }}</td>
                                @if (in_array($userType, ['petani', 'penyuluh', 'kepala_dinas']))
                                <td>{{ $item->telepon ?? '-' }}</td>
                                @endif
                                <td>
                                    @if ($item->photo)
                                        <img src="{{ asset('storage/' . $item->photo) }}" alt="Foto Pengguna"
                                            style="width: 60px; height: 60px; border-radius: 8px; object-fit: cover;">
                                    @else
                                        <span class="text-muted">Tidak ada foto</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <x-datatable.actions :id="$itemId" />
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ in_array($userType, ['petani', 'penyuluh', 'kepala_dinas']) ? '5' : '4' }}" class="text-center text-muted py-3">
                                    Tidak ada data {{ $currentLabel }}.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <x-pagination :items="$this->users" />
            </div>
        </div>
    </div>
</div>
