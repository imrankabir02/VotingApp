<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ballot extends Model
{
    protected $fillable = ['voter_id', 'election_id', 'submitted_at'];

    public function voter()
    {
        return $this->belongsTo(User::class, 'voter_id');
    }

    public function election()
    {
        return $this->belongsTo(Election::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
