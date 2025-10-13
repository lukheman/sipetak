@props(['id'])


    <button wire:click="detail({{ $id }})" class="btn btn-info text-white">
        <i class="mdi mdi-eye"></i>
    </button>

    <button wire:click="edit({{ $id }})" class="btn  btn-warning text-white">
        <i class="mdi mdi-pencil"></i>
    </button>

    <button wire:click="delete({{ $id }})" class="btn btn-danger">
        <i class="mdi mdi-trash-can"></i>
    </button>
