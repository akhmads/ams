<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum PostStatus: string implements HasLabel, HasColor
{
    case Draft = 'draft';
    case Published = 'published';

    public function getLabel(): ?string
    {
        return $this->name;
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Draft => 'gray',
            self::Published => 'success',
        };
    }
}
