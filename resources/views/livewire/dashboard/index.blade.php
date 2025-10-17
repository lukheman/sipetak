@php
    use \App\Enums\Role;

    $role = getActiveUserRole();
@endphp

<div>

    @if($role === Role::ADMIN)
        <livewire:dashboard.admin-dashboard />
    @elseif($role === Role::KEPALADINAS)
        <livewire:dashboard.kepala-dinas-dashboard />
    @elseif($role === Role::PENYULUH)
        <livewire:dashboard.petugas-dashboard />
    @elseif($role === Role::PETANI)
        <livewire:dashboard.petani-dashboard />
    @endif

</div>
