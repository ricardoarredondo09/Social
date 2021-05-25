<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StatusResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'body' => $this->body,
            'user_name' => $this->user->name,
            'user_avatar' => 'https://codahosted.io/docs/IZn3UNbEOU/blobs/bl-gn3EiJrUjd/31fe4b1bce7a206c58f7e89c75be122c1c38fb2c067ebe71b7d8ab98810ff5223c8cd31eaa69060a1d6945764e217b44561cb607140d4f3fc0412290eae8e9fdfb32d607144c0e5ddeb4ccacabc987df43d14b74f855a0842a7e14c195ecb29452a70664',
            'ago' => $this->created_at->diffForHumans(),
            'is_liked' => $this->isLiked(),
            'likes_count' => $this->likesCount(),

        ];
    }
}
