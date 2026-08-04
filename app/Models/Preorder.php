<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preorder extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'business_name',
        'plan',
        'message',
    ];

    protected function casts(): array
    {
        return [
            'plan' => 'string',
        ];
    }
}