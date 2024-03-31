<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
    ];

    /**
     * Get the users associated with the program.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        // Define the relationship between the Program model and the User model
        // using the program_participants pivot table.
        return $this->belongsToMany(User::class,
            'program_participants',
            'program_id',
            'user_id');
    }

    /**
     * get the challenges associated with the program
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function challenges()
    {
        return $this->belongsToMany(Challenge::class,
            'program_participants',
    'program_id',
    'challenge_id');
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class,
        'program_participants',
'program_id',
'company_id');
    }
}
