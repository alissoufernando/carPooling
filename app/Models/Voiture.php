<?php

namespace App\Models;

use App\Models\User;
use App\Models\Trajet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Voiture extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function user ()
    {
        return $this->belongsTo(User::class);
    }
    public function trajets ()
    {
        return $this->hasMany(Trajet::class);
    }

}
