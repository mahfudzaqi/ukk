<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_meja',
        'name',
        'pesanan'
    ];
    protected $table = 'pesanan';
    public $timestamps = false;
}
