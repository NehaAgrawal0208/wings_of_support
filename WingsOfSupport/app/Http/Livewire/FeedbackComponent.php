<?php

namespace App\Http\Livewire;
use App\Models\Feedback;
use App\Models\ServiceCategory;
use Livewire\Component;

class FeedbackComponent extends Component
{
    public $name;
    public $email;
    public $phone;
    public $service_category_id;
    public $feedback;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'service_category_id' => 'required',
            'feedback' => 'required',
        ]);
    }
    public function sendFeedback()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'service_category_id' => 'required',
            'feedback' => 'required',
        ]);

        $feedback = new Feedback();
        $feedback->name = $this->name;
        $feedback->email = $this->email;
        $feedback->phone = $this->phone;
        $feedback->service_category_id = $this->service_category_id;
        $feedback->feedback = $this->feedback;
        $feedback->save();
        session()->flash('message','Your feedback has been send successfully');
        $this->reset(['name','email','phone','service_category_id','feedback']);
    }
    public function render()
    {
        $categories = ServiceCategory::all();
        return view('livewire.feedback-component',['categories'=>$categories])->layout('layouts.base');
    }
}
