<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chauffeurs extends Model
{
    use HasFactory;

    protected $table = 'chauffeurs';
    protected $fillable = ['chauffeur_id', 'id', 'bus_id'];
    protected $primaryKey = 'chauffeur_id';

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }

    public function bussen()
    {
//        return $this->belongsTo(bussen::class, 'chauffeur_id');
        return $this->hasOne(Bussen::class, 'chauffeur_id', 'chauffeur_id');

    }

}
