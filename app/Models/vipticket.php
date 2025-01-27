<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vipticket extends Model
{
        use HasFactory;

        protected $table = 'vipticket';
        protected $fillable = [
            'VIP_id',
            'klant_id',
            'festival_id'
        ];

    public function klant()
    {
        return $this->belongsTo(klant::class, 'klant_id');

        }

    public function festivals()
    {
        return $this->belongsTo(festivals::class, 'festival_id');
        }
}
