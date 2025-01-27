<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rollen extends Model
{
        //
    use HasFactory;

    protected $fillable = ['naam'];
    protected $table = 'rollen';

    public function user()
    {
    return $this->hasMany(User::class);

        }
}


