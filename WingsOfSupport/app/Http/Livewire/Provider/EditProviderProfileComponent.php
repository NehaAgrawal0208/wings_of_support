<?php

namespace App\Http\Livewire\Provider;

use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServiceProvider;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProviderProfileComponent extends Component
{
    use WithFileUploads;
    public $service_provider_id;
    public $image;
    public $about;
    public $city;
    // public $service_category_id;
    public $service_id;
    public $service_location;
    public $newimage;
    public $charge;



    public function mount()
    {
        $provider = ServiceProvider::where('user_id',Auth::user()->id)->first();
        $this->service_provider_id = $provider->id;
        $this->image = $provider->image;
        $this->about = $provider->about;
        $this->city = $provider->city;
        // $this->service_category_id = $provider->service_category_id;
        $this->service_id = $provider->service_id;
        $this->service_location = $provider->service_location;
        $this->charge = $provider->charge;
    }

    public function updateProfile()
    {
        $provider = ServiceProvider::where('user_id',Auth::user()->id)->first();
        if($this->newimage)
        {
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAs('providers',$imageName);
            $provider->image = $imageName;
        }

        $provider->about = $this->about;
        $provider->city = $this->city;
        // $provider->service_category_id = $this->service_category_id;
        $provider->service_id = $this->service_id;
        $provider->service_location = $this->service_location;
        $provider->charge = $this->charge;
        $provider->save();
        session()->flash('message','Profile updated successfully!!');
        $this->reset('image','about','city','service_id','service_location','charge');
    }
    public function render()
    {
        // $scategories = ServiceCategory::all();
        $services = Service::all();
        return view('livewire.provider.edit-provider-profile-component',['services'=>$services])->layout('layouts.base');
    }
}
