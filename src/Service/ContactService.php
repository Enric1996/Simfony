<?php

namespace App\Service;

use App\Fixtures\ContactData;
use App\Fixtures\PhonesData;
use App\Models\ContactWithPhones;

class ContactService
{
    public function getContactWithPhones(int $idContact): ?ContactWithPhones
    {
        //Recupero todos los contacts ( Esto deveria estar en una entidad y base de datos )
        $allContacts = ContactData::getAllContacts();

        //Al ser un id lo pones como indice y no tienes que iterar en un array.
        if (!array_key_exists($idContact, $allContacts)) {
            return null;
        }

        //Donde almacenar temporalmente todos los telefonos del contacto.
        $phones = [];

        //Recupero todos los phones ( Esto deveria estar en una entidad y base de datos )
        $allPhones = PhonesData::getAllPhones();

        foreach ($allPhones as $phone) {
            //Salida temprana.
            if ($phone->getIdContact() !== $idContact) {
                continue;
            }

            //Añado el dato.
            $phones[] = $phone;
        }

        //Devuelvo un modelo que poder usar ( NO ARRAY'S MULTIDIMENSIONALES )
        return new ContactWithPhones($allContacts[$idContact], $phones);
    }
}