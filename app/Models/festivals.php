<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class festivals extends Model
{
    use HasFactory;
    protected $table = 'festivals';
    protected $primaryKey = 'festival_id';
    protected $fillable = [
        'festival_id',
        'festival_naam',
        'festival_datum',
        'festival_locatie'
        ];



    public function busritten()
    {
        return $this->hasMany(busritten::class);
    }

    public function boekingen()
    {
        return $this->hasMany(boekingen::class, 'festival_id');
    }

    public function vipticket()
    {
        return $this->hasMany(vipticket::class);
    }

}
