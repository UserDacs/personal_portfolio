<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'email' => $this->email,
            'description' => $this->description,
            'coin_password' => $this->coin_password,
            'profile_image_path' => $this->profile_image_path,
            'type' => $this->type,
            'status' => $this->status,
        ];
    }
}
