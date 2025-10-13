@php
    use App\Enums\State;
@endphp

<div>
    <!-- Modal Form Pengguna -->
    <div class="modal fade" id="modal-form-pengguna" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title text-white">
                        @if ($currentState === State::CREATE)
                            Tambah Pengguna
                        @elseif ($currentState === State::UPDATE)
                            Perbarui Pengguna
                        @elseif ($currentState === State::SHOW)
                            Detail Pengguna
                        @endif
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

    @isset($form->photo)

                            <div class="text-center mb-3">
                                <img class="img-md rounded-circle" src="{{ is_string($form->photo) ? asset('storage/' . $form->photo) : $form->photo->temporaryUrl() }}"
                                    alt="Preview Foto" width="150" height="150">
                            </div>

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

                        <div class="mb-3">
                            <label for="telepon" class="form-label">Telepon</label>
                            <input wire:model="form.telepon" type="text" class="form-control" id="telepon"
                                placeholder="Masukkan nomor telepon"
                                @if ($currentState === State::SHOW) disabled @endif>
                            @error('form.telepon') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="row">
    <div class="col-6">

                        <!-- Kecamatan -->
                        <div class="mb-3">
                            <label for="id_kecamatan" class="form-label">Kecamatan</label>
                            <select wire:model.live="kecamatan" id="id_kecamatan" class="form-control"
                                @if ($currentState === State::SHOW) disabled @endif>
                                <option value="">Pilih Kecamatan</option>
                                @foreach ($kecamatanList as $kecamatan)
                                    <option value="{{ $kecamatan->id_kecamatan }}">{{ $kecamatan->nama }}</option>
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


                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select wire:model="form.role" id="role" class="form-control"
                                @if ($currentState === State::SHOW) disabled @endif>
                                <option value="">Pilih Role</option>
                                @foreach (\App\Enums\Role::getOptions() as $role)
                                    <option value="{{ $role }}">{{ $role }}</option>
                                @endforeach
                            </select>
                            @error('form.role') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

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
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Foto</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($this->users as $item)
                            <tr>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <span class="badge badge-{{ $item->role->getColor() }}">
                                        {{ $item->role }}
                                    </span>
                                </td>
                                <td>
                                    @if ($item->photo)
                                        <img src="{{ asset('storage/' . $item->photo) }}" alt="Foto Pengguna"
                                            style="width: 60px; height: 60px; border-radius: 8px; object-fit: cover;">
                                    @else
                                        <span class="text-muted">Tidak ada foto</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <x-datatable.actions :id="$item->id" />
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-3">
                                    Tidak ada data pengguna.
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
