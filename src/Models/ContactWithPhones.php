<?php

namespace App\Models;

class ContactWithPhones
{
    /**
     * @param Contact $contact
     * @param Phones[] $phones
     */
    public function __construct(private readonly Contact $contact, private readonly array $phones)
    {
    }

    public function getContact(): Contact
    {
        return $this->contact;
    }

    public function getPhones(): array
    {
        return $this->phones;
    }
}