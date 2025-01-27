<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class boekingen extends Model
{
    use HasFactory;
    protected $primaryKey = 'klant_id';
    protected $table = 'boekingen';
    protected $fillable = [
        'boeking_id',
        'festival_id',
        'klant_id',
        'busrit_id'
    ];

    public function busritten()
    {
        $this->belongsTo(busritten::class, 'busrit_id');
    }

    public function festivals()
    {
        return $this->belongsTo(festivals::class, 'festival_id');
    }

    public function klant()
    {
       return $this->belongsTo(klant::class, 'klant_id');
    }

}
