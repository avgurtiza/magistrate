<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TilesetService
{
    public function __construct(public string $name, public string $path)
    {

    }

    public function list(mixed $begins_with = null): Collection
    {
        $tiles = Cache::remember('tile-'.$this->name, today()->addMonth(), function () {
            $tiles = new Collection();

            $files = Storage::disk('tilesets')->files($this->path);

            foreach ($files as $file) {
                if ($file = trim($file)) {
                    $tiles->push(basename($file));
                }
            }

            return $tiles;
        });

        if ($begins_with) {
            return $tiles->filter(fn ($value) => Str::startsWith($value, $begins_with));
        }

        return $tiles;
    }

    public function getPath(string $tile): string
    {
        return $this->path.DIRECTORY_SEPARATOR.$this->tiles_folder.$tile;
    }
}
