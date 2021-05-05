<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'description' => $this->description,
            'text' => $this->text,
            'user_id' => $this->user_id,
            'user' => $this->user,
            'replies' => ReplyResource::collection($this->replies),
        ];


    }
}
