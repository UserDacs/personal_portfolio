<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'name' => $this->name,
            'url' => $this->url,
            'size' => $this->size,
            'created_at' => $this->created_at ? $this->created_at->format('M d, Y, h:ia') : null,
            'updated_at' => $this->updated_at ? $this->updated_at->format('M d, Y, h:ia') : null,
        ];
    }
}
