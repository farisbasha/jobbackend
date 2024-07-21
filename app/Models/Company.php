<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'website', 'logo'];

    public function portalJobs()
    {
        return $this->hasMany(PortalJob::class);
    }
}
