<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $fillable = [
        'position',
        'position_type_id',
        'edu_level_id',
        'level_id',
        'job_category_id',
        'experience',
        'edu_level',
        'education_type',
        'level',
        'category_id',
        'quantity'
    ];
    public function position_type()
    {
        return $this->hasOne(PositionType::class, 'id', 'position_type_id');
    }
    public function job_category()
    {
        return $this->hasOne(JobCategory::class, 'id', 'job_category_id');
    }
    public function edu_level()
    {
        return $this->hasOne(EduLevel::class, 'id', 'edu_level_id');
    }
    public function level()
    {
        return $this->hasOne(Level::class, 'id', 'level_id');
    }
    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    // public function edutype()
    // {
    //     return $this->hasMany(Edutype::class, 'position_id', 'id');
    // }

    public function forms()
    {
        return $this->hasMany(Form::class, 'position_id', 'id');
    }
}
