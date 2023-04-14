<?php

namespace App\Http\Livewire\Provider;

use App\Models\BookService;
use App\Models\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ProviderBookServicesComponent extends Component
{
    use WithPagination;

    public function render()
    {

        $user_id = Auth::id();
        $service_provider_id = ServiceProvider::where('user_id',$user_id)->first();
        $bookservices = BookService::where('service_provider_id',$service_provider_id->id)->get();
        return view('livewire.provider.provider-book-services-component',['bookservices'=>$bookservices])->layout('layouts.base');
    }
}
