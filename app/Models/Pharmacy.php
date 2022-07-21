<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    protected $fillable=[
        'pharmacy_name','email','password','location','phone', 'image', 'average_rating'
    ];

    public function prescription(){
        return $this->hasMany(UploadPrescription::class);
    }

    public function prescriptionpricing(){
        return $this->hasMany(PrescriptionPricing::class);
    }

    public function rating(){
        return $this->hasMany(Rating::class);
    }

    public function order(){
        return $this->hasMany(Order::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
