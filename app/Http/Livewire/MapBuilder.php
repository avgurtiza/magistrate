<?php

namespace App\Http\Livewire;

use App\Models\Map;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class MapBuilder extends Component
{
    use AuthorizesRequests;

    public Map $map;

    public function render()
    {
        return view('livewire.map-builder');
    }

    public function mount(Map $map) {
        $this->authorize('update', $map);

        $this->map = $map;
    }

    public function cell(int $row, int $column): void
    {
        logger("Editing cell $row,$column");
    }
}
