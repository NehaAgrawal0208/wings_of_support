<?php

namespace App\Http\Livewire\Admin;

use App\Models\ServiceCategory;
use Livewire\Component;
use Livewire\WithPagination;

class AdminServiceCategoriesComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $scategories = ServiceCategory::paginate(10);
        return view('livewire.admin.admin-service-categories-component',['scategories'=>$scategories])->layout('layouts.base');
    }
}
