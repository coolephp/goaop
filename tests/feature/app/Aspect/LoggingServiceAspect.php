<?php

declare(strict_types=1);

/*
 * This file is part of the coolephp/goaop.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Coole\Goaop\Tests\feature\app\Aspect;

use Go\Aop\Aspect;
use Go\Aop\Intercept\MethodInvocation;
use Go\Lang\Annotation\After;
use Go\Lang\Annotation\Before;

class LoggingServiceAspect implements Aspect
{
    /**
     * Method that will be called before real method.
     *
     * @param MethodInvocation $invocation Invocation
     * @Before("execution(public Coole\Goaop\Tests\feature\app\Service\LoggingService::logging(*))")
     */
    public function beforeMethodExecution(MethodInvocation $invocation)
    {
        file_put_contents(base_path('runtime/logging-before.log'), 'this is a before method testing.'.PHP_EOL, FILE_APPEND);
    }

    /**
     * Method that will be called after real method.
     *
     * @param MethodInvocation $invocation Invocation
     * @After("execution(public Coole\Goaop\Tests\feature\app\Service\LoggingService::logging(*))")
     */
    public function afterMethodExecution(MethodInvocation $invocation)
    {
        file_put_contents(base_path('runtime/logging-after.log'), 'this is a after method testing.'.PHP_EOL, FILE_APPEND);
    }
}
