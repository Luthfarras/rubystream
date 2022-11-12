<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayarans';
    protected $guarded = ['id'];

    public function token()
    {
        return $this->hasMany(Token::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
