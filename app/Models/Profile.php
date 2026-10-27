<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name', 'intro', 'headline', 'bio', 'campus', 'study_program', 'organization', 'email', 'photo'];
}