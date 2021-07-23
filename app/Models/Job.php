<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Str;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use UsesUuid;
    // mengnonaktifkan incrementing
    public $incrementing = false;

    protected $fillable = [];
    protected $guarded = [];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function hasDepartment()
    {
        return $this->belongsTo(Department::class, 'departments_id');
    }

    public function getDepartmentAttribute()
    {
        if ($this->hasDepartment) {
            return $this->hasDepartment->name;
        }
    }
}
