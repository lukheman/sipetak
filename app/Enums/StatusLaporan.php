<?php

namespace App\Enums;

enum StatusLaporan: string
{
    case PENDING = 'Menunggu';
    case IN_PROGRESS = 'Sedang Diproses';
    case RESOLVED = 'Selesai';
    case REJECTED = 'Ditolak';

    public function getLabel(): ?string
    {
        return ucfirst($this->value);
    }

    public function getColor(): ?string
    {
        return match ($this) {
            self::PENDING => 'warning',
            self::IN_PROGRESS => 'primary',
            self::RESOLVED => 'success',
            self::REJECTED => 'danger',
            default => 'default'
        };
    }

    public static function values(): array
    {
        return array_map(fn ($case) => $case->value, self::cases());
    }
}
