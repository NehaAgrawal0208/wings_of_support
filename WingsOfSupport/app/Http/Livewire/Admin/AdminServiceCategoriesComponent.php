<?php

namespace App\Http\Livewire\Admin;

use App\Models\ServiceCategory;
use Livewire\Component;
use Livewire\WithPagination;

class AdminServiceCategoriesComponent extends Component
{
    use WithPagination;

    public function deleteServiceCategory($id)
    {
        $scategory = ServiceCategory::find($id);
        if($scategory->image)
        {
            unlink('images/categories'.'/'.$scategory->image);
        }
        $scategory->delete();
        session()->flash('message','Service Category has been deleted successfully!!');
    }
    public function render()
    {
        $scategories = ServiceCategory::paginate(5);
        return view('livewire.admin.admin-service-categories-component',['scategories'=>$scategories])->layout('layouts.base');
    }
}
