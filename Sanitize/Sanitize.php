<?php

namespace Sanitize;

abstract class Sanitize
{

    /** 
     * Removes special characters leaving only letters
     *     
     * @param String $str
     * @return String
     */
    static public function strReplace(String $str, String $replacement = ""): String
    {
        return trim(preg_replace("/[^A-Za-z]/", $replacement, $str));
    }
}
