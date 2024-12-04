<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceImage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['service_id', 'image_path'];

    public function images()
    {
        return $this->hasMany(ServiceImage::class);
    }

}
