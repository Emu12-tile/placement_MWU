<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class choice2 extends Model
{
    use HasFactory;

    protected $fillable = [
        'position',
        'position_type_id',
        'edu_level_id',
        'level_id',
        'jobcat2_id',
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
    public function jobcat2()
    {
        return $this->hasOne(jobcat2::class, 'id', 'jobcat2_id');
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
    public function edutype()
    {
        return $this->hasMany(Edutype::class, 'choice2_id', 'id');
    }
}
