<?php

namespace App\Http\Requests\Api\Main;

use App\Traits\ApiRespons;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class FarmDataRequest extends FormRequest
{
    use ApiRespons;

    /**
     * Indicates if the validator should stop on the first rule failure.
     *
     * @var bool
     */
    protected $stopOnFirstFailure = false;

    /**
     * The URI that users should be redirected to if validation fails.
     *
     * @var string
     */
    // protected $redirect = '';

    /**
     * The route that users should be redirected to if validation fails.
     *
     * @var string
     */
    // protected $redirectRoute = '';

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
                    'type' => ['required','max:255','string'],
                    'livestock_name' => ['required','max:255','unique:farm_datas,livestock_name','string'],
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
            case 'PUT':
                $rules = [
                    'register_number' => ['required','max:255','string'],
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
        throw new HttpResponseException(
            $this->createResponse(500, 'Server Error',
                [
                    'error' => $validator->errors()
                ],
                [
                    route('api.login')
                ]
            )
        );
    }
}