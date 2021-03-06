<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
        'completed'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'completed' => 'boolean',
    ];

    /**
     * Creates a belongs to relationship to the user.
     *
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
