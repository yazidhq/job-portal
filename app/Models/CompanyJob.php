<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyJob extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'type',
        'location',
        'skill_level',
        'salary',
        'thubmnail',
        'about',
        'is_open',
        'company_id',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function responsibilities()
    {
        return $this->hasMany(JobResponsibility::class);
    }

    public function qualifications()
    {
        return $this->hasMany(JobQualification::class);
    }

    public function candidates()
    {
        return $this->hasMany(JobCandidate::class);
    }
}
