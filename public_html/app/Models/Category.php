<?php

namespace App\Models;

use App\Models\Scopes\NotDeletedCatScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_delete',
    ];

    protected static function booted()
    {
        static::addGlobalScope(new NotDeletedCatScope());
    }

}
