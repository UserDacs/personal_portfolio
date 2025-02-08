<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserSkillResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'back_end' => $this->back_end,
            'front_end' => $this->front_end,
            'server_side' => $this->server_side,
            'years_experience' => $this->years_exp,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
