@php
    use App\Enums\State;
@endphp

<div>
    <!-- Modal Form Penyebab Serangan -->
    <div class="modal fade" id="modal-form-penyebab-serangan" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title text-white">
                        @if ($currentState === State::CREATE)
                            Tambah Penyebab Serangan
                        @elseif ($currentState === State::UPDATE)
                            Perbarui Penyebab Serangan
                        @elseif ($currentState === State::SHOW)
                            Detail Penyebab Serangan
                        @endif
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form>
                        <!-- Nama -->
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Penyebab Serangan</label>
                            <input wire:model="form.nama" type="text" class="form-control"
                                   id="nama" placeholder="Masukkan nama penyebab serangan"
                                   @if ($currentState === State::SHOW) disabled @endif>
                            @error('form.nama')
                                <small class="d-block mt-1 text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea wire:model="form.deskripsi" class="form-control"
                                      id="deskripsi" rows="6"
                                      @if ($currentState === State::SHOW) disabled @endif
    style="height: 150px;"
    ></textarea>
                            @error('form.deskripsi')
                                <small class="d-block mt-1 text-danger">{{ $message }}</small>
                            @enderror
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

    <!-- Card Daftar Penyebab Serangan -->
    <div class="card">
        <div class="card-header">
            <x-datatable.header icon="mdi-bug" table="Penyebab Serangan" />
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nama Penyebab Serangan</th>
                            <th>Deskripsi</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($this->penyebabSerangan as $item)
                            <tr>
                                <td>{{ $item->nama }}</td>
                                <td>{{ Str::limit($item->deskripsi, 100, '...') }}</td>
                                <td class="text-end">
                                    <x-datatable.actions :id="$item->id" />
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted py-3">
                                    Tidak ada data penyebab serangan.
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
