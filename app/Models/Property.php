<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = ['price', 'address', 'bedrooms', 'bathrooms', 'size', 'image_url', 'latitude', 'longitude'];
}
