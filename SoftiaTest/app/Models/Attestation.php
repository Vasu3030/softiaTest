<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attestation extends Model
{
    use HasFactory;

    public function convention()
    {
        return $this->belongsTo(Convention::class);
    }
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }
}
