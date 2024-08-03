<?php

namespace App\Http\Resources\Book;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'           => $this->id,
            'google_id'    => $this->google_id,
            'title'        => $this->title,
            'description'  => $this->description,
            'original_url' => $this->original_url,
            'url'          => $this->url,
        ];
    }
}
