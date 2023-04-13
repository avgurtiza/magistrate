<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Game extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'description', 'recommended_player_count'];

    public function worlds(): BelongsToMany
    {
        return $this->belongsToMany(World::class, 'game_worlds');
    }

    public function maps() {

    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
