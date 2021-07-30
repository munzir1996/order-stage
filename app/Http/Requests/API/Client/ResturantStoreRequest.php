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
            'authorization_image' => 'required',
            'commercial_register_image' => 'required',
            'resturant_image' => 'required',
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
            'type.required' => 'نوع المطعم مطلوب',
            'name_ar.required' => 'أسم المطعم مطلوب',
            'name_en.required' => 'أسم المطعم مطلوب',
            'branches_no.required' => 'عدد الفروع مطلوب',
            'manager_name.required' => 'اسم المدير المسؤول مطلوب',
            'manager_phone.required' => 'رقم جوال المدير المسؤول مطلوب',
            'email.required' => 'البريد الألكتروني مطلوب',
            'email.email' => 'يجب ان يكون من النوع البريد الألكتروني',
            'commercial_registration_no.required' => 'رقم السجل التجاري مطلوب',
            'tax_registration_no.required' => 'رقم السجل الضريبي',
            'bank_name.required' => 'اسم البنك المطلوب',
            'iban.required' => 'رقم الأيبان مطلوب',
            'services.required' => 'الخدمات مطلوبة',
            'first_period_start.required' => 'وقت عمل المطعم مطلوب',
            'first_period_end.required' => 'وقت عمل المطعم مطلوب',
            'second_period_start.required' => 'وقت عمل المطعم مطلوب',
            'second_period_end.required' => 'وقت عمل المطعم مطلوب',
            'longitude.required' => 'موقع المطعم مطلوب',
            'latitude.required' =>'موقع المطعم مطلوب',
            'description.required' => 'وصف موقع المطعم مطلوب',
            'category.required' => 'التصنيف الرئيسي للمطعم مطلوب',
            'resturant_subcategories.required' => 'التصنيف الفرعي للمطعم مطلوب',
            'accepted_payment_methods.required' => 'وسائل الدفع مطلوبة',
            'loyalty_points.required' => 'تعريف نقاط الولاء مطلوبة',
            'points.required_if' => 'نقاط الولاء مطلوبة',
            'amount.required_if' => 'المبلغ مطلوب',
            'authorization_image.required' => 'صورة التفويض مطلوبة',
            'commercial_register_image.required' => 'صورة السجل التجاري مطلوب',
            'resturant_image.required' => 'صورة المطعم مطلوبة',
        ];
    }
}
