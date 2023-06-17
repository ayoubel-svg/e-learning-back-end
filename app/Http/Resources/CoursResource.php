<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class CoursResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "description" => $this->description,
            "Duration" => $this->Duration,
            "Price" => $this->price,
            "language" => $this->language,
            "user_id" => Auth::user()->id,
            "image" => $this->image,
            "category" => $this->category,
            "tutor" => $this->user->name
        ];
    }
}
