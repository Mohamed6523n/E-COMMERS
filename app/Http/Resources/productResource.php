<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class productResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "Product_id"=>$this->id,
            "name"=>$this->name,
            "desc"=>$this->desc,
            "priec"=>$this->priec,
            "quantity"=>$this->quantity,
           "image"=>asset("storage")."/".$this->image
        ];
    }
}
