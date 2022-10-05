<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MedicinResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            // 'data'=>collection($data);
        'id' => $this->id,
        'name' => $this->name,
        'price' => $this->related_to,
        'created_at' => $this->created_at,
        'updated_at' => $this->updated_at,
        ];
    }
}
