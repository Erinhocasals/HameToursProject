<?php

namespace App\Rules;

use App\Models\TeamInvitation;
use Illuminate\Contracts\Validation\Rule;

class CheckReferralCodeRule implements Rule
{
    public $invitation;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($invitation)
    {
        $this->invitation = $invitation;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($this->invitation->referral && (!$this->invitation->generic && $this->invitation->email != $value) )
            return false;

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Está intentando registrarse con un código de referido no válido.';
    }
}
