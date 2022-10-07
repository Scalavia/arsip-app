<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    use HasFactory;

    protected $table = 'arsips';
    protected $fillable = ['nomor_surat', 'kategori', 'judul', 'nama_file'];
    protected $guard = [];
}
