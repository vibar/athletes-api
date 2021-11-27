<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NIFRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $nif = trim($value);
        $split = str_split($nif);
        $firstDigits = [1, 2, 3, 5, 6, 7, 8, 9];

        if (is_numeric($nif) && strlen($nif) == 9 && in_array($split[0], $firstDigits)) {

            $check = 0;

            for ($i = 0; $i < 8; $i++) {
                $check += $split[$i] * (10 - $i - 1);
            }

            $check = 11 - ($check % 11);
            $check = $check >= 10 ? 0 : $check;

            if ($check == $split[8]) {
                return true;
            }
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute is invalid NIF.';
    }
}
