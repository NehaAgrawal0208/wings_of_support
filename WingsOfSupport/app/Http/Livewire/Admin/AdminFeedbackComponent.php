<?php

namespace App\Http\Livewire\Admin;

use App\Models\Feedback;
use Livewire\Component;
use Livewire\WithPagination;
use PDF;

class AdminFeedbackComponent extends Component
{
    public function deleteFeedback($feedback_id)
    {
       $feedbacks = Feedback::find($feedback_id);
       $feedbacks->delete();
       session()->flash('message','contact has been deleted successfully!!');
    }

    use WithPagination;
    public function render()
    {
        $feedbacks = Feedback::paginate(5);
        return view('livewire.admin.admin-feedback-component',['feedbacks'=>$feedbacks])->layout('layouts.base');
    }


    public function createPDF()
    {
        $data = Feedback::all();
        view()->share('feedbacks',$data);
        $pdf = PDF::loadview('livewire.admin.feedback_pdf');
        return $pdf->download('feedback.pdf');
    }
}
