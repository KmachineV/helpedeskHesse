<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $fillable = [
        'name',
        'code',
        'commune_id',
        'province_id',
        'region_id',
        'endProject',
        'startProject',
        'endWarranty',
        'status'
    ];

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }
    public function commune()
    {
        return $this->belongsTo(Commune::class, 'commune_id');
    }

}
