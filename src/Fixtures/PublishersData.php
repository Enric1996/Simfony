<?php

namespace App\Fixtures;

use App\Models\Publisher;

class PublishersData
{
    /**
     * @return Publisher[]
     */
    public static function getAllPublishers(): array
    {
        return [
            1 => new Publisher(
                1,
                "Clarion Books",
                "info@clarion. com"
            ),
            2 => new Publisher(
                2,
                "Scribner",
                "scribner@scr.com"
            ),
            4 => new Publisher(
                4,
                "Ecco",
                "ecco_info@ecco.com"
            )
        ];
    }
}