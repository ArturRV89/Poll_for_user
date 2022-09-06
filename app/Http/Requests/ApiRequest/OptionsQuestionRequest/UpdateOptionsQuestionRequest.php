<?php

namespace App\Http\Requests\ApiRequest\OptionsQuestionRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOptionsQuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id' => 'integer',
            'description' => 'required',
            'question_id' => 'required|integer|exists:questions,id'
        ];

    }
}
