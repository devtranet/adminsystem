<?php

namespace devtranet\adminsystem;

use devtranet\adminsystem\abstracts\Core;
use devtranet\adminsystem\helpers\ArrayHelper;

use devtranet\adminsystem\helpers\StringHelper;
use Exception;
use ReflectionClass;

class AdminSystem extends Core
{
    public function __construct(array $config)
    {
        try {
            $core_class_reflection = new ReflectionClass($this);
            $set_config_data_method_reflection = $core_class_reflection->getMethod('setConfigData');
            $set_config_data_method_reflection->setAccessible(true);
            $set_config_data_method_reflection->invokeArgs($this, [$config]);
            $set_config_data_method_reflection->setAccessible(false);
        } catch (Exception $exception) {
            print $exception->getMessage();
        }
    }

}