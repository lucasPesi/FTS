<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class planners extends Model
{
    use HasFactory;

    protected $table = 'planners';
    protected $fillable = ['planner_id', 'id'];

    public function user()
    {
        return $this->belongsTo(User::class);  // de relatie wirdt gedfineerd.
    }
}
