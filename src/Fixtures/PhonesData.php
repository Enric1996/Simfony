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
            new Phones(9, "664444666", "Work"),
            new Phones(9, "667889888", "Mobile"),
            new Phones(11, "666557744", "Mobile"),
            new Phones(11, "295667788", "Land line"),
            new Phones(13, "667889900", "Work"),
        ];
    }
}