<?php

namespace App\Http\Resources\Main;

use Illuminate\Http\Resources\Json\JsonResource;

class FarmResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'company_id' => $this->company,
            'livestock_id' => $this->id,
            'livestock_register_number' => $this->register_number,
            'livestock_name' => $this->livestock_name,
            'livestock_gender' => $this->gender,
            'livestock_racial' => $this->racial,
            'livestock_birthday' => $this->birthday->format('d-m-Y'),
            'livestock_weight' => $this->weight,
            'livestock_height' => $this->height,
            'livestock_lenght' => $this->lenght,
            'livestock_status' => $this->status,
            'livestock_father_register_number' => $this->register_number_father,
            'livestock_mother_register_number' => $this->register_number_mother
        ];
    }
}
