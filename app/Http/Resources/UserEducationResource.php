<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserEducationResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     */
    public function toArray($request): array
    {
        return $this->collection->map(function ($userEducation) {
            return [
                'id' => $userEducation->id,
                'user_id' => $userEducation->user_id,
                'schoolname' => $userEducation->schoolname,
                'schooladdress' => $userEducation->schooladdress,
                'course' => $userEducation->course,
                'major' => $userEducation->major,
                'year' => $userEducation->year,
                'thesis' => $userEducation->thesis,
                'created_at' => $userEducation->created_at,
                'updated_at' => $userEducation->updated_at,
            ];
        })->toArray();
    }
}
