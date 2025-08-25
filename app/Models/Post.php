<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by','id')->withDefault();
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class,'updated_by','id')->withDefault();
    }

    protected static function booted(): void
    {
        static::creating(function (Model $model) {
            $model->created_by = auth()->user()->id;
            $model->updated_by = auth()->user()->id;
        });

        static::updating(function (Model $model) {
            $model->updated_by = auth()->user()->id;
        });
    }
}
