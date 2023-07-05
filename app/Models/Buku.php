<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'buku';
    protected $primarykey = 'id_buku';
    public $timestaps = null;
    public $fillable = [
        'judul_buku','jenis_buku','pengarang'
    ];
}

