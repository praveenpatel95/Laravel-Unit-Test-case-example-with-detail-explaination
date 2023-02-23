<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;
    protected $fillable = ['name',  'slug', 'banner', 'banner_content'];
    public function getBannerAttribute($value){
        return asset('storage/'.$value);
    }
}
