<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    protected $fillable = ['title', 'start_date', 'end_date', 'is_published'];

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }

    public function ballots()
    {
        return $this->hasMany(Ballot::class);
    }

    public function results()
    {
        return $this->hasMany(ElectionResult::class);
    }
}
