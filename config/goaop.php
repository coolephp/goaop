<?php

declare(strict_types=1);

/*
 * This file is part of the coolephp/goaop.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

return [
    /*
     * AOP Debug Mode
     */
    'debug' => env('GOAOP_DEBUG', env('APP_DEBUG', false)),

    /*
     * Application Root Directory
     */
    'appDir' => base_path(),

    /*
     * AOP Cache Directory
     */
    'cacheDir' => env('GOAOP_CACHE_DIR', base_path('runtime/aspect')),

    /*
     * Cache File Mode
     */
    'cacheFileMode' => env('GOAOP_CACHE_PERMISSIONS', 511),

    /*
     *--------------------------------------------------------------------------
     * Miscellaneous AOP Engine Features
     *--------------------------------------------------------------------------
     *
     * This option should contain a bitmask of values defined in
     * \Go\Aop\Features enumeration:
     *
     * Support Options:
     *   1  - enables interception of system function.
     *   2  - enables interception of "new" operator in the source code.
     *   4  - enables interception of "include"/"require" operations
     *       in legacy code.
     *   64 - do not check the cache presence and assume that cache
     *       is already prepared
     *
     * <code>
     *   //
     *   // bitmask of 1 + 2 + 4 options.
     *   //
     *   'features' => 1 * 2 * 4,
     *
     * </code>
     *
     */
    'features' => env('GOAOP_FEATURES', 0),

    /*
     * Directories White List
     */
    'includePaths' => [
        base_path('app'),
    ],

    /*
     * Directories Black List
     */
    'excludePaths' => [
        // base_path('app/Exception'),
    ],

    /*
     * AOP Container
     */
    'containerClass' => \Go\Core\GoAspectContainer::class,

    /*
     * Yours aspects
     */
    'aspects' => [
    ],
];
