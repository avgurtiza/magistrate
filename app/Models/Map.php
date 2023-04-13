<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Map extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'world_id', 'name', 'description', 'recommended_player_count', 'rows', 'columns'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function world(): BelongsTo
    {
        return $this->belongsTo(World::class);
    }
}
