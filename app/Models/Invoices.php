<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    use HasFactory;

    protected $table = 'invoices';
    public $timestamps = true;

    protected $casts = [
        'TotalDue' => 'float'
    ];

    protected $fillable = [
        'title',
        'DueDate',
        'Date',
        'TotalDue',
        'projectID',
        'clientID'
    ];
}
