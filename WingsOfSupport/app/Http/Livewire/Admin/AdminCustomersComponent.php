<?php

namespace App\Http\Livewire\Admin;

use App\Models\Homeowner;
use Livewire\Component;
use Livewire\WithPagination;
use PDF;

class AdminCustomersComponent extends Component
{
    public function deleteCustomer($customer_id)
    {
        $customers = Homeowner::find($customer_id);
        $customers->delete();
        session()->flash('message','contact has been deleted successfully!!');
    }

    use WithPagination;
    public function render()
    {
        $customers = Homeowner::paginate(5);
        return view('livewire.admin.admin-customers-component',['customers'=>$customers])->layout('layouts.base');
    }

    public function createPDF()
    {
        $data = Homeowner::all();
        view()->share('customers',$data);
        $pdf = PDF::loadView('livewire.admin.customer_pdf');
        // return $pdf->stream();
        return $pdf->download('customer.pdf');
    }
}
