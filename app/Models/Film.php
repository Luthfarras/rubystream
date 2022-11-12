<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    protected $table = 'films';
    protected $guarded = ['submit'];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
    public function token()
    {
        return $this->hasOne(Token::class);
    }
}
