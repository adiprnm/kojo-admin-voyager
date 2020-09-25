<?php

namespace App\Helper;

abstract class JobSheetHelper
{
    /**
     * Generate code
     *
     * @param string $batch
     * @return void
     */
    public static function generateCode(string $batch)
    {
        $code = "X{$batch}-{$batch}" . date("mY");

        return $code;
    }
}