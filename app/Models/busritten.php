<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class busritten extends Model
{

    use HasFactory;

    protected $table = 'busritten';
    protected $primaryKey = 'busrit_id';
    protected $fillable = [
            'bus_id',
            'festival_id',
            'vertrekplaats_datum_tijd1',
            'vertrekplaats_datum_tijd2',
            'vertrekplaats_datum_tijd3',
            'klanten',
            'vol',
            'status',
            'opvolging',
            'voorbij',
            'chaufeur_id',
            'bschikbaar',
            'festival_naam',
            'festival_datum',
            'festival_locatie',
            'boeking_id',
            'klant_id'
        ];



    public function bussen()
    {
        return $this->belongsTo(bussen::class, 'bus_id', 'bus_id');
    }

    public function festivals()
    {
        return $this->belongsTo(festivals::class, 'festival_id');
    }

    public function boekingen()
    {
        return $this->belongsTo(boekingen::class, 'busrit_id');
    }



}
