<?php

namespace App\Http\Requests\Page\Main;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class MedicalRequest extends FormRequest
{
    /**
     * Indicates if the validator should stop on the first rule failure.
     *
     * @var bool
     */
    protected $stopOnFirstFailure = false;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];

        switch($this->method())
        {
            case 'POST':
                $rules = [
                    'company' => ['required','numeric'],
                    'livestock_id' => ['required','string'],
                    'age' => ['required','max:255','string'],
                    'height' => ['required','numeric'],
                    'weight' => ['required','numeric'],
                    'status' => ['required','max:255','string'],
                    'date' => ['required'],
                    'note' => ['nullable','string']
                ];
                break;
            case 'PUT':
                $rules = [
                    'livestock_id' => ['required','string'],
                    'age' => ['required','max:255','string'],
                    'height' => ['required','numeric'],
                    'weight' => ['required','numeric'],
                    'status' => ['required','max:255','string'],
                    'date' => ['required'],
                    'note' => ['nullable','string']
                ];
                break;
            default: break;
        }

        return $rules;
    }
     
    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            // 
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            // 
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            // 
        ]);
    }

    /**
     * Custom error message for validation
     *
     * @return array
     */
    public function failedValidation(Validator $validator)
    {
        Toastr::error('Data gagal untuk dibuat', 'Medical');
    }
}