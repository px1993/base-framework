<?php

/*
 * This file is part of PHP CS Fixer.
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Services;

use Twig_Environment;
use Twig_Loader_Filesystem;
use Exception;

class View
{
    private static $_view;

    public function __construct()
    {
        $loader      = new Twig_Loader_Filesystem(__DIR__ . '/../../views');
        $twig        = new Twig_Environment($loader);
        self::$_view = $twig;
    }

    /**
     * @param $templateFile
     * @param array $array
     * @throws Exception
     */
    public static function display($templateFile,$array = [])
    {
        if (!$templateFile){
            throw new Exception('缺少模板文件');
        }
        if (null === self::$_view){
            new static();
        }
        echo self::$_view->render($templateFile,$array);
    }
}
