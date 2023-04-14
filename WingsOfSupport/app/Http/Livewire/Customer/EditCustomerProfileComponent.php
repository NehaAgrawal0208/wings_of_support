<?php

namespace App\Http\Livewire\Customer;

use App\Models\Homeowner;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditCustomerProfileComponent extends Component
{
    use WithFileUploads;
    public $customer_id;
    public $image;
    public $newimage;
    public $address;

    public function mount()
    {
        $customer = Homeowner::where('user_id',Auth::user()->id)->first();
        $this->customer_id = $customer->id;
        $this->image = $customer->image;
        $this->address = $customer->address;
    }

    public function updateProfile()
    {
        $customer = Homeowner::where('user_id',Auth::user()->id)->first();
        if($this->newimage)
        {
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAs('homeowners',$imageName);
            $customer->image = $imageName;
        }

        $customer->address = $this->address;
        $customer->save();
        session()->flash('message','Profile has been updated Successfully!!');
        $this->reset('image','address');
    }
    public function render()
    {
        return view('livewire.customer.edit-customer-profile-component')->layout('layouts.base');
    }
}
