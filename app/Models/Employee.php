<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Str;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use UsesUuid;
    // mengnonaktifkan incrementing
    public $incrementing = false;

    protected $fillable = [];
    protected $guarded = [];

    public function setNipAttribute($value)
    {
        $this->attributes['nip'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function hasPosition()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }

    public function getPositionAttribute()
    {
        if ($this->hasPosition) {
            return $this->hasPosition->name;
        }
    }
}
