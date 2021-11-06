<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Car extends Model
{
    use HasFactory;
    protected $fillable = ["name","manufactory","manufacturing_year","plate_number","color","image_path","status"];
    protected $appends = ["image_url"];

    public function reservations()
    {
        return $this->hasMany(Reservation::class , 'car_id');
    }
    public function getImageUrlAttribute()
    {
        return config('app.url').Storage::url('cars/'.$this->id.'/'.$this->image_path);
    }
}
