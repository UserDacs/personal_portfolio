<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserExperienceResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     */

    public function toArray($request): array
    {
        return $this->collection->map(function ($userExperience) {
            return [
                'id' => $userExperience->id,
                'user_id' => $userExperience->user_id,
                'role' => $userExperience->role,
                'companyname' => $userExperience->companyname,
                'address' => $userExperience->address,
                'description' => $userExperience->description,
                'year' => $userExperience->year,
                'created_at' => $userExperience->created_at,
                'updated_at' => $userExperience->updated_at,
            ];
        })->toArray();
    }
}
