<?php

/*
 * This file is part of the coolephp/goaop.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

use Guanguans\Coole\App;

require_once __DIR__.'/../vendor/autoload.php';

! defined('BASE_PATH') && define('BASE_PATH', __DIR__.'/feature');

new App(require base_path('config/app.php'));
