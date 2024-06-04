<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Show extends Model
{
    protected $table = 'tbl_show';
    protected $primaryKey = 'id';
    protected $fillable = ['judul', 'tanggal', 'waktu', 'lokasi', 'poster', 'harga', 'stok', 'keterangan'];

    public function pembelian()
    {
        return $this->hasMany(Pembelian::class, 'id_show', 'id');
    }
}
