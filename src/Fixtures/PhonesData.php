<?php

namespace App\Fixtures;

use App\Models\Contact;
use App\Models\Phones;

class PhonesData
{
    /**
     * @return Phones[]
     */
    public static function getAllPhones(): array
    {
        return [
            new Phones(11, "666557744", "Mobile"),
            new Phones(12, "295667788", "Land line"),
        ];
    }
}