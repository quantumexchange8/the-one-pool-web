<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'subtitle', 'description'];

    public function images()
    {
        return $this->hasMany(ServiceImage::class);
    }

    public function serviceSection()
    {
        return $this->hasMany(ServiceSection::class, 'service_id', 'id');
    }

    // public function serviceDetail()
    // {
    //     return $this->hasMany(ServiceDetail::class, 'service_id', 'id');
    // }
    
}