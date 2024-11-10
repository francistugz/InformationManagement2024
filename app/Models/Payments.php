<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;
    protected $table = 'payments';
    public $timestamps = true;

    protected $casts = [
        'amount' => 'float'
    ];

    protected $fillable = [
        'amount',
        'method'
    ];
}
