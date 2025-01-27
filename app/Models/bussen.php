<?php

namespace App\Models;

use App\View\Components\chauffeur;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class bussen extends Model
{
    use HasFactory;
    protected $table = 'bussen';
    protected $fillable = ['bus_id', 'chauffeur_id', 'id', 'beschikbaar'];
    protected $primaryKey = 'bus_id';

    public function chauffeurs()
    {
//        return $this->hasOne(chauffeur::class, 'chauffeur_id', 'chauffeur_id'); verkeerd om, dat zorgde voor een error
        return $this->belongsTo(Chauffeurs::class, 'chauffeur_id', 'chauffeur_id');

    }

    public function busritten()
    {
        return $this->hasMany(busritten::class);
    }

}
