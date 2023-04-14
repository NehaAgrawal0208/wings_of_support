<?php

namespace App\Http\Livewire\Admin;

use App\Models\ServiceProvider;
use Livewire\Component;
use Livewire\WithPagination;
use PDF;

class AdminServiceProvidersComponent extends Component
{
    public function deleteProvider($provider_id)
    {
        $providers = ServiceProvider::find($provider_id);
        $providers->delete();
        session()->flash('message','contact has been deleted successfully!!');
    }

    use WithPagination;

    public function render()
    {
        $providers = ServiceProvider::paginate(5);
        return view('livewire.admin.admin-service-providers-component',['providers'=>$providers])->layout('layouts.base');
    }

    public function createPDF()
    {
        $data = ServiceProvider::all();
        view()->share('providers',$data);
        $pdf = PDF::loadView('livewire.admin.service_providers_pdf');
        // return $pdf->stream();
        return $pdf->download('service_provider.pdf');
    }

}
