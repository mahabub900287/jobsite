<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $table = 'user_addresses';
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(UserAddress::class);
    }
}
