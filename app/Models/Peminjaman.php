<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjaman';
    protected $primarykey = 'id_peminjaman';
    public $timestaps = false;
    public $fillable = [
        'id','id_buku','id_jurusan','tgl_peminjam','tgl_kembali','status','tenggat'
    ];
}
