<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Question;

class QuestionList extends Component
{
    public $questionAdded;


    protected $listeners = ['questionAdded' => 'reloadData'];

    public function reloadData()
    {
        $this->reset();
    }

    public function deleteQuestion($id)
    {

        Question::find($id)->delete();
        $this->emit('questionAdded');
        session()->flash('message', 'Question successfully Deleted.');
    }


    public function render()
    {
        $data = [
            'questions' => Question::with('option')->get(),
        ];

        return view('livewire.question-list', $data);
    }
}
