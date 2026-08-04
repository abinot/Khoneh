<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'business_type',
        'message',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'business_type' => 'string',
            'status' => 'string',
        ];
    }
}