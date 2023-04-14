<?php

namespace App\Http\Livewire\Admin;

use App\Models\BookService;
use Livewire\Component;
use Livewire\WithPagination;

class AdminBookServicesComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $bookservices = BookService::paginate(5);
        return view('livewire.admin.admin-book-services-component',['bookservices' => $bookservices])->layout('layouts.base');
    }
}
