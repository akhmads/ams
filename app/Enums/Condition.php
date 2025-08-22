<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum Condition: string implements HasLabel, HasColor
{
    case Good = 'good';
    case Damage = 'damage';

    public function getLabel(): ?string
    {
        return $this->name;
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Good => 'success',
            self::Damage => 'danger',
        };
    }
}
