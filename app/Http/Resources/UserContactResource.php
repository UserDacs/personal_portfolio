<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserContactResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'address' => $this->address,
            'phone_number' => $this->phone_number,
            'emailaddress' => $this->emailaddress,
            'link_github' => $this->link_github,
            'link_personal_portfolio' => $this->link_personal_portfolio,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}