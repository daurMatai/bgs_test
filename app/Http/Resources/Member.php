<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property string $email
 * @property string $first_name
 * @property string $last_name
 */
class Member extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'email' => $this->email,
            'first_name' => $this->first_name,
            'last_name' =>$this->last_name,
        ];
    }
}
