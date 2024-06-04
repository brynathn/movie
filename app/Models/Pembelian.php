<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pembelian extends Model
{
    protected $table = 'tbl_pembelian';
    protected $fillable = ['nik', 'nama', 'no_hp', 'jumlah', 'total_harga', 'id_show','poster'];

    public function show()
    {
        return $this->belongsTo(Show::class, 'id_show', 'id');
    }
}
