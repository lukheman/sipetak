@php
    use App\Enums\Role;
    $activeRole = getActiveUserRole();
@endphp
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <x-nav-link
                href="{{ route('dashboard') }}"
                :active="request()->routeIs('dashboard')"
                icon="mdi-grid-large" >
            Dashboard
            </x-nav-link>

            <li class="nav-item nav-category">MENU UTAMA</li>

            {{-- ADMIN --}}

            @if ($activeRole === Role::ADMIN)

            <x-nav-link
                href="{{ route('pengguna') }}"
                :active="request()->routeIs('pengguna')"
                icon="mdi-leaf" >
                Pengguna
            </x-nav-link>

            <x-nav-link
                href="{{ route('penyebab-serangan-table') }}"
                :active="request()->routeIs('penyebab-serangan-table')"
                icon="mdi-leaf" >
                    Penyebab Serangan
            </x-nav-link>

            <x-nav-link
                href="{{ route('wilayah-table') }}"
                :active="request()->routeIs('wilayah-table')"
                icon="mdi-leaf" >
                Wilayah
            </x-nav-link>

            <x-nav-link
                href="{{ route('tanaman-table') }}"
                :active="request()->routeIs('tanaman-table')"
                icon="mdi-leaf" >
            Data Tanaman
            </x-nav-link>

            @endif

            {{-- PETANI --}}
            @if ($activeRole === Role::PETANI || $activeRole === Role::PENYULUH)
            <x-nav-link
                href="{{ route('laporan-serangan-table') }}"
                :active="request()->routeIs('laporan-serangan-table')"
                icon="mdi-leaf" >
                    Laporan Serangan
            </x-nav-link>
            @endif


            {{-- KEPALA DINAS --}}
            @if ($activeRole === Role::KEPALADINAS)
            <x-nav-link
                href="{{ route('laporan-serangan-table') }}"
                :active="request()->routeIs('laporan-serangan-table')"
                icon="mdi-leaf" >
                    Laporan Serangan
            </x-nav-link>
            @endif

          </ul>
        </nav>
