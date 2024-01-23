<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    function user() {
        return $this->belongsTo(User::class);
    }
    function buku() {
        return $this->belongsTo(Buku::class);
    }
    function transaksi() {
        return $this->belongsTo(Transaksi::class);
    }
}
