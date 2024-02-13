<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DocumentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'fiscalYear' => FiscalYearResource::make($this->whenLoaded('fiscalYear')),
            'title' => $this->title ?? '',
            'publish_date' => $this->publish_date ?? '',
            'cover_page' => $this->cover_page ?? '',
            'sections' => SectionResource::collection($this->sections->load('sections','uploads'))
        ];
    }
}
