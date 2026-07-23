<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class ProhibitedWords implements ValidationRule
{
    protected array $forbiddenWords = [
        'spam',
        'fake',
        'prohibited',
    ];

    /**
     * Run the validation rule.
     *
     * @param  Closure(string, ?string=): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        foreach ($this->forbiddenWords as $word) {
            if (stripos($value, $word) !== false) {
                $fail("El campo {$attribute} contiene palabras prohibidas");

                return;
            }
        }
    }
}
