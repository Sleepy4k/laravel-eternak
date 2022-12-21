<?php

namespace App\Http\Resources\Main;

use Illuminate\Http\Resources\Json\JsonResource;

class MedicalResource extends JsonResource
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
            'report_id' => $this->id,
            'company_id' => $this->company,
            'livestock_id' => $this->livestock_id,
            'livestock_age' => $this->age,
            'livestock_weight' => $this->weight,
            'livestock_height' => $this->height,
            'livestock_status' => $this->status,
            'livestock_note' => $this->note,
            'report_date' => $this->date->format('d-m-Y'),
            'created_at' => $this->created_at->format('d-m-Y')
        ];
    }
}
