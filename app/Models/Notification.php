<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'title',
        'message',
        'devis_id',
        'partner_id', // NOUVEAU: Pour les candidatures partenaires
        'read',
        'read_at'
    ];

    protected $casts = [
        'read' => 'boolean',
        'read_at' => 'datetime'
    ];

    public function devis()
    {
        return $this->belongsTo(Devis::class);
    }

    // NOUVEAU: Relation avec les partenaires
    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

    public function markAsRead()
    {
        $this->update([
            'read' => true,
            'read_at' => now()
        ]);
    }
}