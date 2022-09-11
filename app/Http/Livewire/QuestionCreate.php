<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Question;
use Illuminate\Support\Arr;

class QuestionCreate extends Component
{
    public $input = 0;
    public $questionId;
    public $title;
    public $mode;
    public $status = true;
    public array $option = [];
    public array $ans = [];
    public $data;
    // public Question $question;



    public function addOption()
    {
        $this->input++;
        $this->option[$this->input] = null;
        $this->ans[$this->input] = null;
    }

    public function delete($key)
    {
        if (isset($this->option[$key])) {
            unset($this->option[$key]);
            [$keys, $values] = Arr::divide($this->option);
            $this->option = $values;
        }

        if (isset($this->ans[$key])) {
            unset($this->ans[$key]);
            [$keys, $values] = Arr::divide($this->ans);
            $this->ans = $values;
        }


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
        $this->emit('questionAdded');
        session()->flash('message', 'Question successfully Saved.');
        $this->reset();
    }


    public function mount()
    {
        if ($this->data) {
            $this->questionId = $this->data->id;
            $this->title = $this->data->title;
            $this->status = $this->data->status;

            $options = $this->data->find($this->data->id)->option->toArray();
            $this->input = count($options) - 1;

            foreach ($options as $key => $value) {
                $this->option[$key] = $value['option'];
                $this->ans[$key] = $value['is_ans'];
            }
        }
    }

    public function separateOptionAndTitle($validate)
    {
        $title = Arr::only($validate, ['title', 'status']);
        $optionsData = Arr::only($validate, ['option', 'ans']);


        for ($i = 0; $i < count($optionsData['option']); $i++) {
            $options[] = [
                'option' => $optionsData['option'][$i],
                'is_ans' => isset($optionsData['ans'][$i]) ? 1 : 0,
            ];
        }

        return  [$title, $options];
    }


    public function update()
    {
        $questionDetailsUpdate = $this->validate();
        [$title, $options] = $this->separateOptionAndTitle($questionDetailsUpdate);
        $question = Question::find($this->questionId);

        $question->title = $title['title'];
        $question->status = $title['status'];
        $question->update();

        $question->option()->delete();
        $question->option()->createMany($options);
        $this->emit('questionAdded');
        session()->flash('message', 'Question successfully Updated.');
        return redirect()->route('question.create');
    }

    public function render()
    {
        return view('livewire.question-create');
    }
}
