@props(['icon' => 'fa-plus', 'table'])

<div class="row">
    <div class="col-6">

        <x-datatable.search :table="$table"></x-datatable.search>

    </div>

    <div class="col-6 text-end">
        <!-- Tombol Modal Form Petani -->
        <button wire:click="add" class="btn btn-primary">
            <i class="mdi {{ $icon }}"></i>
            Tambah {{ $table }}
        </button>

    </div>

</div>
