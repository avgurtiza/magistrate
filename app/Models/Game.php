<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'description', 'recommended_player_count'];

    public function worlds()
    {
        return $this->belongsToMany(World::class, 'game_worlds');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
