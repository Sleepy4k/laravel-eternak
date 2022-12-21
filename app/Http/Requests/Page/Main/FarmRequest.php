<?php

namespace App\Http\Requests\Page\Main;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class FarmRequest extends FormRequest
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
                    'register_number' => ['nullable','max:255','string'],
                    'livestock_name' => ['required','max:255','string'],
                    'gender' => ['required','max:255','string'],
                    'racial' => ['required','max:255','string'],
                    'birthday' => ['required'],
                    'weight' => ['required','numeric'],
                    'lenght' => ['required','numeric'],
                    'height' => ['required','numeric'],
                    'register_number_father' => ['nullable','max:255','string'],
                    'register_number_mother' => ['nullable','max:255','string'],
                    'status' => ['nullable','max:255','string']
                ];
                break;
            case 'PUT':
                $rules = [
                    'livestock_name' => ['required','max:255','string'],
                    'gender' => ['required','max:255','string'],
                    'racial' => ['required','max:255','string'],
                    'birthday' => ['required'],
                    'weight' => ['required','numeric'],
                    'lenght' => ['required','numeric'],
                    'height' => ['required','numeric'],
                    'register_number_father' => ['max:255','string'],
                    'register_number_mother' => ['max:255','string'],
                    'status' => ['required','max:255','string']
                ];
                break;
            case 'PATCH':
                $rules = [
                    'import_file' => ['required','file','mimes:xlsx,csv']
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
     * Custom error response for validation.
     *
     * @return array
     */
    public function failedValidation(Validator $validator)
    {
        Toastr::error('Data gagal untuk dibuat', 'Farm');
    }
}