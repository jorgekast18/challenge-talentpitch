<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
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
        // Define the relationship between the User model and the Program model
        // using a many-to-many relationship through the 'program_user' pivot table.
        // The foreign keys are 'user_id' and 'program_id'.
        return $this->belongsToMany(Program::class,
            'program_participants',
            'user_id',
            'program_id');
    }
}
