<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Question;
use Illuminate\Support\Arr;

class QuestionCreate extends Component
{

    public $input = 0;

    public $title;
    public $status = true;
    public array $option = [];
    public array $ans = [];



    public function addOption()
    {
        $this->input++;
        $this->option[$this->input] = null;
        $this->ans[$this->input] = false;
    }

    public function delete($key)
    {
        if (isset($this->option[$key]))
            unset($this->option[$key]);
        if (isset($this->ans[$key]))
            unset($this->ans[$key]);
        $this->input--;
    }

    protected function rules()
    {
        return [
            'title' => 'required',
            'option.*' => 'required',
            'ans.*' => 'nullable',
            'status' => 'nullable',
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

        [$title, $options] = $this->separateOptionAndTitle($questionDetails);
        $questionData = Question::create($title);

        $questionData->option()->createMany($options);
        
    }

    public function separateOptionAndTitle($validate)
    {
        $title = Arr::only($validate, ['title']);
        $optionsData = Arr::only($validate, ['option', 'ans']);


        for ($i = 0; $i < count($optionsData['option']); $i++) {
            $options[] = [
                'option' => $optionsData['option'][$i],
                'is_ans' => $optionsData['ans'][$i]
            ];
        }

        return  [$title, $options];
    }


    public function render()
    {
        return view('livewire.question-create');
    }
}
