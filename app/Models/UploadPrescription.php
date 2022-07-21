<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadPrescription extends Model
{
    protected $fillable =[
            'user_id',
            'pharmacy_id',
            'prescription_name',
            'prescription_image',
            'insurance_image',
            'latitude',
            'longitude',
            'street',
            'city',
            'state',
            'status'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function pharmacy(){
        return $this->belongsTo(Pharmacy::class,'pharmacy_id', 'id');
    }

    public function prescriptionpricing(){
        return $this->hasOne(PrescriptionPricing::class);
    }

    public function statuslog(){
        return $this->hasMany(StatusLog::class);
    }

    public function order(){
        return $this->hasOne(Order::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function contact()
    {
        return $this->hasMany(Contact::class);
    }

}
