<?php

namespace App\Http\Requests\API\Client\Auth;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class ClientAuthRegisterRequest extends FormRequest
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
     * If validator fails return the exception in json form
     * @param Validator $validator
     * @return array
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'phone' => 'required|unique:clients',
            'country' => 'required',
            'role' => 'required',
            'identity_no' => 'required',
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'الأسم مطلوب',
            'phone.required' => 'رقم الهاتف مطلوب',
            // 'phone.min' => 'يجب أن يكون رقم الهاتف 14 ارقام',
            // 'phone.max' => 'يجب أن يكون رقم الهاتف 14 ارقام',
            'phone.unique' => 'رقم الهاتف مستخدم بالفعل',
            'country.required' => 'البلاد مطلوبة',
            'role.required' => 'الصفة مطلوبة',
            'identity_no.required' => 'رقم الهوية مطلوب',
            // 'identity_no.min' => 'يجب أن يكون رقم الهوية 14 ارقام',
            // 'identity_no.max' => 'يجب أن يكون رقم الهوية 14 ارقام',
        ];
    }
}
