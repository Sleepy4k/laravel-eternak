<?php

namespace App\Http\Requests\Page\Setting;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class AccountRequest extends FormRequest
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

        switch ($this->method())
        {
            case 'POST': {
                $rules = [
                    'username' => ['required','max:255','unique:users','string'],
                    'email' => ['required','max:255','email:dns','unique:users'],
                    'company' => ['required','min:1','numeric'],
                    'whatsapp_number' => ['required','max:255','unique:users','string'],
                    'password' => ['required','min:8','max:255','same:confirm_password','string'],
                    'confirm_password' => ['required','min:8','max:255','string']
                ];
                break;
            }
            case 'PUT': {
                $rules = [
                    'username' => ['required','max:255','string'],
                    'email' => ['required','max:255','email:dns'],
                    'whatsapp_number' => ['required','max:255','string']
                ];
                break;
            }
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
        Toastr::error('Data gagal untuk dibuat', 'Account');
    }
}