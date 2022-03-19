<?php

namespace devtranet\adminsystem\helpers;

class StringHelper
{
    /**
     * Returns a simple true or false value to signify if the input can be converted to a string. This method should not
     * return an error no mater what the circumstances. The allowNull flag will make the method return true if the input
     * is null, the useToStringMethods flag sets whether an attempt is made to convert an object to a string via the
     * toString magic method and finally the encodeArrays flag sets whether an array should be accepted. To get accurate
     * results the flags should be the same as any calls to convertToString.
     * @param mixed $input
     * @param bool $allowNull
     * @param bool $useToStringMethods
     * @param bool $encodeArrays
     * @return bool
     */
    public static function canInputBeConvertedToString(mixed $input, bool $allowNull = false, bool $useToStringMethods = false, bool $encodeArrays = false): bool
    {
        if ($input === null && $allowNull == true) {
            return true;
        }
        if (is_scalar($input) == false) {
            if ($useToStringMethods == true && is_object($input) == true && method_exists($input, '__toString') == true) {
                return true;
            }
            if (is_array($input) == true && $encodeArrays == true) {
                return true;
            }
            return false;
        }
        return true;
    }

    /**
     * Returns a string value based on the input variable or null on failure. This method should not return an error no
     * mater what the circumstances. The allowNull flag will make the method return true if the input is null, the
     * useToStringMethods flag sets whether an attempt is made to convert an object to a string via the toString magic
     * method and finally the encodeArrays flag sets whether an array should be accepted. To get accurate results the
     * flags should be the same as any calls to canInputBeConvertedToString.
     * @param mixed $input
     * @param bool $allowNull
     * @param bool $useToStringMethods
     * @param bool $encodeArrays
     * @return string|null
     */
    public static function convertToString(mixed $input, bool $allowNull = false, bool $useToStringMethods = false, bool $encodeArrays = false): ?string
    {
        if ($input === null && $allowNull == true) {
            return '';
        }
        if (is_scalar($input) == false) {
            if ($useToStringMethods == true && is_object($input) == true && method_exists($input, '__toString') == true) {
                return strval($input);
            }
            if (is_array($input) == true && $encodeArrays == true) {
                return json_encode($input);
            }
            return null;
        }
        if ($input === false) {
            return '0';
        }
        if ($input === true) {
            return '1';
        }
        return strval($input);
    }

}