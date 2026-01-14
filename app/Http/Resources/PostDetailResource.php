<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostDetailResource extends JsonResource
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
            'title' => $this->title,
            'category' => $this->category->name,
            'author' => [
                'author_name' => $this->author->name,
                'role' => $this->author->role->name
            ],
            'body' => $this->body,
            'created_at' => date_format($this->created_at, 'd/m/Y'),
            'image' => $this->image,

            // 'role' => $this->author_id->role
        ];
    }
}
