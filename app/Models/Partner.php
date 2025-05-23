<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'activity',
        'contact_name',
        'position',
        'email',
        'phone',
        'location',
        'website',
        'partnership_type',
        'message',
        'status',
        'admin_notes',
        'contacted_at'
    ];

    protected $casts = [
        'contacted_at' => 'datetime'
    ];

    /**
     * Get the partnership type label
     */
    public function getPartnershipTypeLabel()
    {
        $types = [
            'transporteur' => 'Transporteur',
            'agent_commercial' => 'Agent commercial',
            'logistique' => 'Prestataire logistique',
            'distributeur' => 'Distributeur',
            'autre' => 'Autre'
        ];

        return $types[$this->partnership_type] ?? $this->partnership_type;
    }

    /**
     * Get the status label
     */
    public function getStatusLabel()
    {
        $statuses = [
            'pending' => 'En attente',
            'approved' => 'Approuvé',
            'rejected' => 'Rejeté'
        ];

        return $statuses[$this->status] ?? $this->status;
    }
}