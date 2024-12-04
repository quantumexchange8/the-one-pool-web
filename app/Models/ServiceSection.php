<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceSection extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['service_id', 'title'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function serviceDetail()
    {
        return $this->hasMany(ServiceDetail::class, 'section_id', 'id');
    }
}
