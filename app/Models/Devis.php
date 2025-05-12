<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devis extends Model
{
    use HasFactory;

    protected $table = 'devis';

    protected $fillable = [
        'user_id',
        'company_name',
        'contact_name',
        'email',
        'telephone',
        'address',
        'city',
        'postal_code',
        'ice',
        'reference',
        'status',
        'pdf_path',
        'special_requirements',
        'total_ht',
        'total_tva',
        'total_ttc',
        'tva_rate'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transports()
    {
        return $this->hasMany(DevisTransport::class);
    }
}