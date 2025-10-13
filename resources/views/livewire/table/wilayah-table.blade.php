@php
    use App\Enums\State;
@endphp

<div>
    <!-- Modal Form Wilayah -->
    <div class="modal fade" id="modal-form-wilayah" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title text-white">
                        @if ($currentState === State::CREATE)
                            Tambah Wilayah (Kecamatan)
                        @elseif ($currentState === State::UPDATE)
                            Perbarui Wilayah (Kecamatan)
                        @elseif ($currentState === State::SHOW)
                            Detail Wilayah (Kecamatan)
                        @endif
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
<form>
    <!-- Nama Kecamatan -->
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Kecamatan</label>
        <input wire:model="form.nama" type="text" class="form-control"
               id="nama" placeholder="Masukkan nama kecamatan"
               @if ($currentState === State::SHOW) disabled @endif>
        @error('form.nama')
            <small class="d-block mt-1 text-danger">{{ $message }}</small>
        @enderror
    </div>

    <!-- Daftar Desa -->
    <div class="mb-3">
        <label class="form-label">Daftar Desa</label>

        <!-- Input tambah desa -->
        @if ($currentState !== State::SHOW)
            <div class="input-group mb-2">
                <input type="text" wire:model="form.newDesa" class="form-control"
                       placeholder="Nama desa baru...">
                <button class="btn btn-outline-primary" type="button"
                        wire:click="addDesa">Tambah</button>
            </div>
            @error('form.newDesa')
                <small class="d-block mt-1 text-danger">{{ $message }}</small>
            @enderror
        @endif

        <!-- Tabel daftar desa -->
        <div class="table-responsive" style="max-height: 200px;">
            <table class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th>Nama Desa</th>
                        @if ($currentState !== State::SHOW)
                            <th class="text-end">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @isset($form->wilayah)

                    @forelse ($form->wilayah->desa as $desa)
                        <tr>
                            <td>{{ $desa->nama }}</td>
                            @if ($currentState !== State::SHOW)
                                <td class="text-end">
                                    <button type="button" class="btn btn-sm btn-danger"
                                            wire:click="removeDesa({{ $desa->id_desa }})">
                                        <i class="mdi mdi-delete"></i>
                                    </button>
                                </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-muted text-center py-2">
                                Belum ada desa terdaftar.
                            </td>
                        </tr>
                    @endforelse

                    @endisset
                </tbody>
            </table>
        </div>
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

    <!-- Card Daftar Wilayah -->
    <div class="card">
        <div class="card-header">
            <x-datatable.header icon="mdi-map-marker" table="Wilayah (Kecamatan)" />
        </div>

        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nama Kecamatan</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($this->wilayah as $item)
                            <tr>
                                <td>{{ $item->nama }}</td>
                                <td class="text-end">
                                    <x-datatable.actions :id="$item->id_kecamatan" />
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted py-3">
                                    Tidak ada data wilayah.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <x-pagination :items="$this->wilayah" />
            </div>
        </div>
    </div>
</div>
