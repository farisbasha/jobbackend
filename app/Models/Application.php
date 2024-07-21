<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = ['portal_job_id', 'user_id', 'cover_letter', 'resume'];

    public function portalJob()
    {
        return $this->belongsTo(PortalJob::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class); // Applicant
    }
}
