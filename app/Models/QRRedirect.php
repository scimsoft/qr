<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QRRedirect extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $casts = [
        'cost' => 'float'
    ];

    protected $fillable = [
        'soureURL',
        'destinyURL',
        'active',
        'user_id'
    ];
}
