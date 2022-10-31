<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;
    protected $table = 'tokens';
    protected $guarded = ['id'];

    public function film()
    {
        return $this->hasMany(Film::class);
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }
}
