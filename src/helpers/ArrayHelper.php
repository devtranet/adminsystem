<?php

namespace devtranet\adminsystem\helpers;

use Exception;

class ArrayHelper
{
    public static function GetBlockByPath(string $path, array $data): array
    {

    }

    public static function GetListByPath()
    {

    }

    public static function GetValueByPath(string $path, array $data, ?string $default = null): ?string
    {
        $value = self::getDataByPath($path, $data, $default);



        return $value;
    }


    public static function getDataByPath(string $path, array $data, mixed $default = null): mixed
    {
        $value = $data;
        $path = str_replace('[', '/', $path);
        $path = str_replace(']','', $path);
        $path = explode('/', trim($path, '/ '));
        foreach($path as $key) {
            if (trim($key) == '') {
                continue;
            }
            if (is_array($value) == false || array_key_exists($key, $value) == false) {
                return $default;
            }
            $value = $value[$key];
        }
        return $value;
    }



    /**
     * Gets data from an array using a xpath style string however it is a very simplified version of xpath. The return
     * value can be any data type that is stored in the array and if the path does not exist an exception is thrown.
     * @param string $path
     * @param array $data
     * @return mixed
     * @throws Exception
     */
    public static function GetDataByPath2(string $path, array $data): mixed
    {
        $value = $data;
        $path = str_replace('[', '/', $path);
        $path = str_replace(']','', $path);
        $path = explode('/', trim($path, '/ '));
        foreach($path as $key) {
            if (trim($key) == '') {
                continue;
            }
            if (is_array($value) == false || array_key_exists($key, $value) == false) {
                throw new Exception("The supplied path does not exist: ");
            }
            $value = $value[$key];
        }
        return $value;
    }
}