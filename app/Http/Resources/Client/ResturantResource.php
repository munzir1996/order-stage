<?php

namespace App\Http\Resources\Client;

use Illuminate\Http\Resources\Json\JsonResource;

class ResturantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name_ar' => $this->name_ar,
            'name_en' => $this->name_en,
            'branches_no' => $this->branches_no,
            'manager_name' => $this->manager,
            'manager_phone' => $this->manager_phone,
            'email' => $this->email,
            'commercial_registration_no' => $this->commercial_registration_no,
            'tax_registration_no' => $this->tax_registration_no,
            'services' => $this->services,
            'category' => $this->category,
            'accepted_payment_methods' => $this->accepted_payment_methods,
            'loyalty_points' => $this->loyalty_points,
            // 'point' => $this->when(isset($this->point), $this->point),

            'resturant_subcategories' => $this->whenLoaded('resturantSubcategories'),
            'loyality_point' => $this->whenLoaded('loyalityPoint'),
            'bank' => $this->whenLoaded('bank'),
            'work_time' => $this->whenLoaded('workTime'),
            'location' => $this->whenLoaded('location'),
        ];
    }
}
