<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Question;

class QuestionCreate extends Component
{

    public $input = 1;

    public $title;
    public $option;
    public $ans;

    public function addOption()
    {
        $this->input++;
    }

    public function delete()
    {
        $this->input--;
    }

    protected function rules()
    {
        return [
            'title' => 'required',
            'option.*' => 'required',
            'ans.*' => 'required',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function submit()
    {
        $questionDetails = $this->validate();

        // Execution doesn't reach here if validation fails.
        dump($questionDetails);

        [$title, $options] = $this->separateOptionAndTitle($questionDetails);
        dd($title, $options);

        $questionData = Question::create($this->validate());
    }

    public function separateOptionAndTitle($validate)
    {
        dd($validate);
        
        // return  [$title, $options];
    }
    public function render()
    {
        return view('livewire.question-create');
    }
}
