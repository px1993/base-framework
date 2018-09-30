<?php

/*
 * This file is part of PHP CS Fixer.
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Tools;

use Exception;

trait Config
{
    /**
     * @var array
     */
    private static $conf = [];

    /**
     * @param $configFullName
     *
     * @throws Exception
     *
     * @return mixed
     */
    public static function get($configFullName)
    {
        if (false === strpos($configFullName, '.')) {
            throw new Exception('配置文件格式不正确');
        }
        //获取配置文件名称和配置名称
        $configFileArray = explode('.', $configFullName);
        if (isset(self::$conf[$configFileArray[1]])) {
            return self::$conf[$configFileArray[1]];
        }
        //引入配置
        return self::includeConfigFile($configFileArray[0], $configFileArray[1]);
    }

    /**
     * 引入配置文件.
     *
     * @param $configFile
     * @param mixed $configKey
     * @throws Exception
     * @return bool
     */
    private static function includeConfigFile($configFile, $configKey)
    {
        $path = CONF_PATH . $configFile . '.php';
        if (file_exists($path)) {
            $conf = include $path .'';
            if (isset($conf[$configKey])) {
                self::$conf[$configKey] = $conf;
                return $conf[$configKey];
            }
            throw new Exception('不存在配置名称...' . $configKey);
        }
        throw new Exception('不存在配置文件...' . $configFile);
    }
}
