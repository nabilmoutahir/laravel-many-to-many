<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ["title", "content"];

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

    // FUNCTION TO GET TECHS LABELS
    public function getTechsText(){

        return implode(' - ', $this->technologies->pluck('label')->toArray());
    }
}
