<?php

namespace App\Http\Livewire;

use App\Models\ServiceProvider;
use Livewire\Component;
use Livewire\WithPagination;

class ServiceProvidersComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $sproviders = ServiceProvider::paginate(5);
        return view('livewire.service-providers-component',['sproviders'=>$sproviders])->layout('layouts.base');
    }
}
