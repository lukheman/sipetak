@php
    use App\Enums\State;
@endphp

<div>

<!-- Modal Form Tanaman -->
<div class="modal fade" id="modal-form-tanaman" tabindex="-1" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content ">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title text-white">
                    @if ($currentState === \App\Enums\State::CREATE)
                        Tambah Tanaman
                    @elseif ($currentState === \App\Enums\State::UPDATE)
                        Perbarui Tanaman
                    @elseif ($currentState === \App\Enums\State::SHOW)
                        Detail Tanaman
                    @endif
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="nama_tanaman" class="form-label">Nama Tanaman</label>
                        <input wire:model="form.nama_tanaman" type="text" class="form-control" id="nama_tanaman" placeholder="Masukkan nama tanaman" @if ($currentState === \App\Enums\State::SHOW) disabled @endif>
                        @error('form.nama_tanaman')
                            <small class="d-block mt-1 text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-3">

                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea wire:model="form.deskripsi" class="form-control" id="deskripsi" rows="10" @if ($currentState === \App\Enums\State::SHOW) disabled @endif></textarea>
                        @error('form.deskripsi')
                            <small class="d-block mt-1 text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Input Gambar Tanaman -->

                    @if ($currentState !==  \App\Enums\State::SHOW)

                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar Tanaman</label>
                        <input wire:model="form.gambar" type="file" class="form-control" id="gambar" @if ($currentState === \App\Enums\State::SHOW) disabled @endif>
                        @error('form.gambar')
                            <small class="d-block mt-1 text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    @endif


         @if ($form->gambar)
                <div class="text-center mb-3">
                    <img src="{{ is_string($form->gambar) ? asset('storage/' . $form->gambar) : $form->gambar->temporaryUrl() }}"
                         alt="Preview Gambar Tanaman"
                         class="img-fluid rounded"
                         style="max-height: 200px; object-fit: cover;">
                </div>
            @endif

                </form>
            </div>
            <div class="modal-footer">
                @if ($currentState === \App\Enums\State::CREATE)
                    <button type="button" wire:click="save" class="btn btn-primary">Tambahkan</button>
                @elseif ($currentState === \App\Enums\State::UPDATE)
                    <button type="button" wire:click="save" class="btn btn-primary">Perbarui</button>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="card">

    <div class="card-header">


    @if ($currentState !== State::LAPORAN)
    <x-datatable.header icon="mdi-leaf" table="Tanaman" />
    @elseif($currentState === State::LAPORAN)

    <div class="raw">
    <div class="col-6 float-end">
        <x-datatable.search table="Tanaman"></x-datatable.search>
    </div>
    </div>

    @endif


    </div>
    <div class="card-body">

        <div class="table-responsive">
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th>Nama Tanaman</th>
            <th>Gambar</th>
            <th class="text-end">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($this->tanaman as $item)
            <tr>
                <td>{{ $item->nama_tanaman }}</td>
                <td>
                    @if ($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Tanaman" style="width: 100px; height: auto;">
                    @else
                        <span class="text-muted">Tidak ada gambar</span>
                    @endif
                </td>
                <td class="text-end">
                    @if ($currentState !== State::LAPORAN)
                        <x-datatable.actions :id="$item->id" />
                    @else
                        <a href="{{ route('print-laporan.hasil-panen', ['idTanaman' => $item->id]) }}" class="btn btn-danger">
                            <i class="mdi mdi-printer"></i>
                        </a>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center text-muted py-3">
                    Tidak ada data tanaman.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
            <x-pagination :items="$this->tanaman" />
        </div>
    </div>

</div>
</div>
