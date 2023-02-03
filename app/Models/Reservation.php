<?php

namespace App\Models;

use App\Models\Trajet;
use App\Models\Paiement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user ()
    {
        return $this->belongsTo(User::class);
    }
    public function paiment ()
    {
        return $this->belongsTo(Paiement::class);
    }
    public function trajet ()
    {
        return $this->belongsTo(Trajet::class);
    }
    
}
