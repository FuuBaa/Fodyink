<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_makanan', 'id_pemesan', 'jumlah', 'total_harga', 'alamat_pemesan', 'status'
    ];
}
