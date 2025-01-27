<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class klant extends Model
{
    use HasFactory;

    protected $primaryKey = 'klant_id';

    protected $table = 'klant';
    protected $fillable = ['klant_id', 'id', 'aantal_punten'];



    public function user()
    {
      return  $this->belongsTo(User::class, 'id');
    }

    public function boekingen(){
        return  $this->hasMany(boekingen::class);
    }

    public function vipticket()
    {
        return $this->hasMany(vipticket::class);
    }


}
