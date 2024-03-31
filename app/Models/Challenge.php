<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
    ];

    /**
     * Get the programs associated with the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function programs()
    {
        return $this->belongsToMany(Program::class,
            'program_participants',
            'challenge_id',
            'program_id');
    }
}
