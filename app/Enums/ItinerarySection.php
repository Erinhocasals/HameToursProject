<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ItinerarySection extends Enum
{
    const Presentation =   0;
    const Itinerary =   1;
}
