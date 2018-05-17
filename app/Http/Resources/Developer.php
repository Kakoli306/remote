<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Developer extends Resource
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
            'email' => $this->email,
            'language' => $this->getname(),
            'ProgrammingLanguage' => $this->getlanguage(),

        ];
    }
    public function with($request)
    {
        return [
            'version' => '2.0.0',
            'valid_as_of' => date('D, d M Y H:i:s'),
        ];
    }
}
