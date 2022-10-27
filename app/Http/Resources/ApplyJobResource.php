<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplyJobResource extends JsonResource
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
            'id' => $this->id,
            'user_id' => $this->user_id,
            'job_post_id' => $this->job_post_id,
            'cv_attachment' => asset('data/job_applies/' .$this->cv_attachment),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
