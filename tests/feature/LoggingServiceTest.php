<?php

declare(strict_types=1);

/*
 * This file is part of the coolephp/goaop.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Coole\Goaop\Tests\feature;

use Coole\Goaop\Tests\feature\app\Service\LoggingService;
use PHPUnit\Framework\TestCase;

class LoggingServiceTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testLoggingAspect()
    {
        $this->assertTrue(LoggingService::logging());
        $this->assertFileExists(base_path('runtime/logging-before.log'));
        $this->assertFileExists(base_path('runtime/logging-after.log'));
    }
}
