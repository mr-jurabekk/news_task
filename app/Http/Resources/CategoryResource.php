<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use function Carbon\this;

class CategoryResource extends JsonResource
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
                'name' => $this->name,
                'subcategories' => json_decode($this->subcategories, true),
                'description' => $this->description,
                'image' => $this->image,
                'slug' => $this->slug,
                'created_at' => date('g:i A m-d-Y', strtotime($this->created_at))

            ];
    }
}
