<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCandidate extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'resume',
        'message',
        'is_hired',
        'candidate_id',
        'company_job_id',
    ];

    public function profile()
    {
        $this->belongsTo(User::class, 'candidate_id');
    }
    
    public function job()
    {
        $this->belongsTo(CompanyJob::class, 'company_job_id');
    }
}
