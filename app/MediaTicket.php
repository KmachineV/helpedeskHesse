<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaTicket extends Model
{

    public $table = 'MediaTicket';
    protected $fillable = [
        'url',
        'ticket_id'
    ];

    public function ticket()
    {
        return $this->belongsToMany(Ticket::class, 'ticket_id');
    }
}
