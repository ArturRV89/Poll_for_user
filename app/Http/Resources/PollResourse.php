<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PollResourse extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'date_start' => $this->date_start->format('d.m.Y'),
            'date_finish' => $this->date_finish->format('d.m.Y'),
            'questions' => QuestionResource::collection($this->questions),
        ];
    }
}
