<?php

namespace devtranet\adminsystem\abstracts;

use Exception;

abstract class Core
{
    private array $config;

    protected function getConfig(string $path, ?string $default): string
    {
        if (isset($this->config) == false) {
            throw new Exception("Config has not been initialized");
        }
        $path = trim($path, '/ ');
        if ($path == '') {
            if ($default === null) {
                throw new Exception("Configuration item missing");
            }
            return $default;
        }
        $path = explode('/', $path);
        $data = $this->config;
        foreach($path as $key) {
            if ($key == '') {
                continue;
            }
            if (is_array($data) == false) {
                if ($default === null) {
                    throw new Exception("Configuration item missing");
                }
                return $default;
            }
            $data = $data[$key];
        }
        if (is_scalar($data) == false) {
            if ($default === null) {
                throw new Exception("Configuration item missing");
            }
            return $default;
        }
        $data = $data === false ? '0' : $data;
        $data = $data === true ? '1' : $data;
        return strval($data);
    }


/*

    public function getArrayDataByPath2(string $path, array $data): ?string
    {
        $value = $data;
        $path = str_replace('[', '/', $path);
        $path = str_replace(']','', $path);
        $path = explode('/', trim($path, '/ '));
        foreach($path as $key) {
            if ($key == '') {
                return null;
            }
            if (is_array($value) == false || array_key_exists($key, $value) == false) {
                return null;
            }
            $value = $value[$key];
        }
        $value = $value === true ? '1' : $value;
        $value = $value === false ? '0' : $value;
        $value = $value === null ? 'null' : $value;
        if (is_scalar($value) == false) {
            return null;
        }
        return $value;
    }

*/

    private function setConfigData(array $config): void
    {
        $this->config = $config;
    }
}