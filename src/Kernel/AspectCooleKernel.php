<?php

declare(strict_types=1);

/*
 * This file is part of the coolephp/goaop.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Coole\Goaop\Kernel;

use Go\Core\AspectContainer;
use Go\Core\AspectKernel;

class AspectCooleKernel extends AspectKernel
{
    /**
     * {@inheritDoc}
     */
    protected function configureAop(AspectContainer $container)
    {
    }
}
