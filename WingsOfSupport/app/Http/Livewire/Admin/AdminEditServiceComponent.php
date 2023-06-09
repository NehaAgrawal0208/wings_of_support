<?php

namespace App\Http\Livewire\Admin;

use App\Models\Service;
use App\Models\ServiceCategory;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminEditServiceComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $tagline;
    public $service_category_id;

    public $image;
    public $thumbmail;
    public $description;

    public $newthumbmail;
    public $newimage;
    public $service_id;

    public $featured;

    public function mount($service_slug)
    {
        $service = Service::where('slug',$service_slug)->first();
        $this->service_id = $service->id;
        $this->name = $service->name;
        $this->slug = $service->slug;
        $this->tagline = $service->tagline;
        $this->service_category_id = $service->service_category_id;
        $this->featured = $service->featured;
        $this->image = $service->image;
        $this->thumbmail = $service->thumbmail;
        $this->description = $service->description;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name,'-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required',
            'tagline' => 'required',
            'service_category_id' => 'required',
            'description' => 'required',
        ]);
        if($this->newthumbmail)
        {
            $this->validateOnly($fields,[
                'newthumbmail' => 'required|mimes:png,jpg'
            ]);
        }

        if($this->newimage)
        {
            $this->validateOnly($fields,[
                'newimage' => 'required|mimes:png,jpg'
            ]);
        }
    }

    public function updateService()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'tagline' => 'required',
            'service_category_id' => 'required',
            'description' => 'required',
        ]);
        if($this->newthumbmail)
        {
            $this->validate([
                'newthumbmail' => 'required|mimes:png,jpg'
            ]);
        }

        if($this->newimage)
        {
            $this->validate([
                'newimage' => 'required|mimes:png,jpg'
            ]);
        }

        $service = Service::find($this->service_id);
        $service->name = $this->name;
        $service->slug = $this->slug;
        $service->tagline = $this->tagline;
        $service->service_category_id = $this->service_category_id;
        $service->featured = $this->featured;
        $service->description = $this->description;

        if($this->newthumbmail)
        {
            unlink('images/services/thumbnails'.'/'. $service->thumbmail);
            $imageName = Carbon::now()->timestamp. '.' . $this->newthumbmail->extension();
            $this->newthumbmail->storeAs('services/thumbnails',$imageName);
            $service->thumbmail = $imageName;
        }

        if($this->newimage)
        {
            unlink('images/services'.'/'. $service->image);
            $imageName2 = Carbon::now()->timestamp. '.' . $this->newimage->extension();
            $this->newimage->storeAs('services',$imageName2);
            $service->image = $imageName2;
        }

        $service->save();
        session()->flash('message','Service has been updated successfully!!');
        $this->reset('name','slug','tagline','service_category_id','featured','description');
    }
    public function render()
    {
        $categories = ServiceCategory::all();
        return view('livewire.admin.admin-edit-service-component',['categories' => $categories])->layout('layouts.base');
    }
}
