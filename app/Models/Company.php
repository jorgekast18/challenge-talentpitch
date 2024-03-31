<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
    ];

    /**
     * Define a many-to-many relationship for programs.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function programs()
    {
        return $this->belongsToMany(Program::class,
            'program_participants',
            'company_id',
            'program_id');
    }
}
