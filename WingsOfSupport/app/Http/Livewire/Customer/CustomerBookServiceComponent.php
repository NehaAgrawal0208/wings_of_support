<?php

namespace App\Http\Livewire\Customer;

use App\Models\BookService;
use App\Models\Service;
use App\Models\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CustomerBookServiceComponent extends Component
{

    public $service_id;
    public $service_provider_id;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'service_id' => 'required',
            'service_provider_id' => 'required',
        ]);
    }

    public function bookService()
    {
        $user = Auth::user();
        $this->validate([
            'service_id' => 'required',
            'service_provider_id' => 'required',
        ]);

        $bookservice = new BookService();
        $bookservice->service_id = $this->service_id;
        $bookservice->service_provider_id = $this->service_provider_id;
        $bookservice->user_id = $user->id;

        $bookservice->save();
        session()->flash('message','Service has been book successfully!!');
        $this->reset('service_id','service_provider_id');
    }
    public function render()
    {
        $services = Service::all();
        $providers = ServiceProvider::whereHas('service',function($query){
            $query->where('service_id',$this->service_id);
        })->get();
        return view('livewire.customer.customer-book-service-component',['services'=>$services,'providers'=>$providers])->layout('layouts.base');
    }
    
}
