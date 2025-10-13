@props(['href', 'active' => false, 'icon' => 'mdi-grid-large'])

@php
    $classes = $active ? 'nav-item active' : 'nav-item';
@endphp

<li {{ $attributes->class([$classes]) }}>
  <a class="nav-link" href="{{ $href }}">
    <i class="mdi {{ $icon }} menu-icon"></i>
    <span class="menu-title">{{ $slot }}</span>
  </a>
</li>
