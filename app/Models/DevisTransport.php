<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DevisTransport extends Model
{
    use HasFactory;

    protected $fillable = [
        'devis_id',
        'date',
        'destination',
        'vehicle_type',
        'price',
        'reference',
        'description'
    ];

    public function devis()
    {
        return $this->belongsTo(Devis::class);
    }
}