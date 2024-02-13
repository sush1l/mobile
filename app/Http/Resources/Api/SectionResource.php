<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SectionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title ?? '',
            'files'=>FileResource::collection($this->whenLoaded('uploads')),
            $this->when(count($this->sections) > 0,[
                'sections'=>SectionResource::collection($this->sections?->load('sections','uploads'))
            ])
        ];
    }
}
