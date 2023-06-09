<?php

namespace App\Http\Livewire\Admin;

use App\Models\Service;
use App\Models\ServiceCategory;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddServiceComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $tagline;
    public $service_category_id;

    public $image;
    public $thumbmail;
    public $description;


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
            'image' => 'required|mimes:png,jpg',
            'thumbmail' => 'required|mimes:png,jpg',
            'description' => 'required',
        ]);
    }
    public function createService()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'tagline' => 'required',
            'service_category_id' => 'required',
            'image' => 'required|mimes:png,jpg',
            'thumbmail' => 'required|mimes:png,jpg',
            'description' => 'required',
        ]);

        $service = new Service();
        $service->name = $this->name;
        $service->slug = $this->slug;
        $service->tagline = $this->tagline;
        $service->service_category_id = $this->service_category_id;
        $service->description = $this->description;

        $imageName = Carbon::now()->timestamp. '.' . $this->thumbmail->extension();
        $this->thumbmail->storeAs('services/thumbnails',$imageName);
        $service->thumbmail = $imageName;

        $imageName2 = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('services',$imageName2);
        $service->image = $imageName2;

        $service->save();
        session()->flash('message','Service has been added successfully!!');
        $this->reset('name','slug','tagline','service_category_id','description','thumbmail','image');
    }
    public function render()
    {
        $categories = ServiceCategory::all();
        return view('livewire.admin.admin-add-service-component',['categories'=>$categories])->layout('layouts.base');
    }
}
