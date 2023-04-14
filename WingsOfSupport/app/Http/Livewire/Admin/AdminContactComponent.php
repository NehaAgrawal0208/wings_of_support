<?php

namespace App\Http\Livewire\Admin;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;
use PDF;

class AdminContactComponent extends Component
{
    public function deleteContact($contact_id)
    {
        $contacts = Contact::find($contact_id);
        $contacts->delete();
        session()->flash('message','contact has been deleted successfully!!');
    }

    use WithPagination;
    public function render()
    {
        $contacts = Contact::paginate(5);
        return view('livewire.admin.admin-contact-component',['contacts' => $contacts])->layout('layouts.base');
    }

    public function createPDF()
    {
        $data = Contact::all();
        view()->share('contacts',$data);
        $pdf = PDF::loadView('livewire.admin.contact_pdf');
        // return $pdf->stream();
        return $pdf->download('contact.pdf');
    }

}
