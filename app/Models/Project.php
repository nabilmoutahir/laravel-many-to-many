<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ["title", "slug", "content"];

    // RELATION ONE TO MANY PROJECTS TYPE
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    // RELATION MANY TO MANY PROJECTS TECHNOLOGIES
    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }
}
