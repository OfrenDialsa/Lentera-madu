<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    protected $table = 'pengurus';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'jabatan', 'tanggalLahir','tempatLahir'];
    use HasFactory;
}