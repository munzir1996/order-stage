<?php

namespace App\Http\Requests\API\Client;

use App\Models\Resturant;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class ResturantStoreRequest extends FormRequest
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
            'type' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
            'branches_no' => 'required',
            'manager_name' => 'required',
            'manager_phone' => 'required',
            'email' => 'required|email',
            'commercial_registration_no' => 'required',
            'tax_registration_no' => 'required',
            'bank_name' => 'required',
            'iban' => 'required',
            'services' => 'required',
            'first_period_start' => 'required',
            'first_period_end' => 'required',
            'second_period_start' => 'required',
            'second_period_end' => 'required',
            'longitude' => 'required',
            'latitude' =>'required',
            'description' => 'required',
            'category' => 'required',
            'resturant_subcategories' => 'required',
            'accepted_payment_methods' => 'required',
            'loyalty_points' => 'required',
            'points' => 'required_if:loyalty_points,'.Resturant::YES,
            'amount' => 'required_if:loyalty_points,'.Resturant::YES,
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
