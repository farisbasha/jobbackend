<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{

    public static $wrap = null;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = parent::toArray($request);
        $token = $request->bearerToken();
        if ($token) {
            $data['token'] = $token;
        } else {
            $this->tokens()->delete();
            $data['token'] = $this->createToken($this->email)->plainTextToken;
        }

        return $data;
    }
}
