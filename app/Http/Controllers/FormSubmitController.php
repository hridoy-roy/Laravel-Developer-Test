<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class FormSubmitController extends Controller
{
    public function formShow()
    {
        $data = [
            'formData' => Question::with('option')->where('status', 1)->get(),
        ];
        return view('form-submit', $data);
    }
}
