<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class YoutubeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $embed = explode('&', $this->link);
        $embed = $embed[0];
        $embed = str_replace('watch?v=', 'embed/', $embed);

        return [
            'id' => $this->id,
            'title' => $this->title,
            'link' => $this->link,
            'embed' => $embed,
        ];
    }
}
