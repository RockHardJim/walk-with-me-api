<?php
namespace App\Http\Helpers;

//I am a lazy dude so no need for any fancy stuff lets use tried and tested hackzilla password gen package and we move angisho guys?
use Hackzilla\PasswordGenerator\Generator\ComputerPasswordGenerator;


class Misc{

    public static function generate_password(): string
    {
        $generator = new ComputerPasswordGenerator();

        $generator
            ->setOptionValue(ComputerPasswordGenerator::OPTION_UPPER_CASE, true)
            ->setOptionValue(ComputerPasswordGenerator::OPTION_LOWER_CASE, true)
            ->setOptionValue(ComputerPasswordGenerator::OPTION_NUMBERS, true)
            ->setOptionValue(ComputerPasswordGenerator::OPTION_SYMBOLS, false)
            ->setLength(5);

        return $generator->generatePassword();
    }
}
