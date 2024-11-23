<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    protected $table = 'clients';
    public $timestamps = true;

    protected $fillable = [
        'clientID',
        'fname',
        'lname',
        'contactno',
        'client_tin',
        'client_email'
    ];
}
