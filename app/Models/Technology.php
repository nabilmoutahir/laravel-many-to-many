<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    // RELATION MANY TO MANY TECHNOòOGIES PROJECTS
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
