<?php

namespace App\Fixtures;

use App\Models\Contact;
use App\Models\Phones;

class ContactData
{
    /**
     * @return Contact[]
     */
    public static function getAllContacts(): array
    {
        return [
            11 => new Contact(11, "Mr.", "Mike", "Molina", "1975-10-21", "molina@mail.com"),
            12 => new Contact(12, "Mrs.", "MaryJane", "Smith", "1986-05-22", "mj@mail.com"),
        ];
    }
}