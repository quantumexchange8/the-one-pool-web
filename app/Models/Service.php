<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'subtitle', 'description', 'detailtitle', 'detaildescription'];

    protected $cast = [
        'details' => 'array',
    ];

    public function images()
    {
        return $this->hasMany(ServiceImage::class);
    }

}