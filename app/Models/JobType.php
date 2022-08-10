<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    use HasFactory;
    protected $guarded = ['job_types'];
    public function user()
    {
        return $this->belongsTo(JobApplycation::class,'user_id');
    }
}
