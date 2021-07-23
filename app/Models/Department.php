<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Str;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
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
}
