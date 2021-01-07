<?php

/*
 * This file is part of the coolephp/goaop.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Coole\Goaop;

use Coole\Goaop\Kernel\AspectCooleKernel;
use Go\Core\AspectContainer;
use Go\Core\AspectKernel;
use Guanguans\Coole\Able\AfterRegisterAbleProviderInterface;
use Guanguans\Coole\Able\BeforeRegisterAbleProviderInterface;
use Guanguans\Coole\Able\BootAbleProviderInterface;
use Guanguans\Coole\App;
use Guanguans\Di\Container;
use Guanguans\Di\ServiceProviderInterface;

class GoAopServiceProvider implements ServiceProviderInterface, BeforeRegisterAbleProviderInterface, BootAbleProviderInterface, AfterRegisterAbleProviderInterface
{
    /**
     * {@inheritDoc}
     */
    public function beforeRegister(App $app)
    {
        $config = require __DIR__.'/../config/goaop.php';

        $app->addConfig(['goaop' => $config]);
    }

    /**
     * {@inheritDoc}
     */
    public function register(Container $app)
    {
        $app->singleton(AspectKernel::class, function (Container $app) {
            $aspectKernel = AspectCooleKernel::getInstance();
            $aspectKernel->init($app['config']['goaop']->toArray());

            return $aspectKernel;
        });

        $app->singleton(AspectContainer::class, function ($app) {
            /** @var AspectKernel $kernel */
            $kernel = $app->make(AspectKernel::class);

            return $kernel->getContainer();
        });
    }

    /**
     * {@inheritDoc}
     */
    public function afterRegister(App $app)
    {
        $this->boot($app);
    }

    /**
     * {@inheritDoc}
     */
    public function boot(App $app)
    {
        /** @var AspectContainer $aspectContainer */
        $aspectContainer = $app->make(AspectContainer::class);

        // register aspect
        foreach ($app['config']['goaop']['aspects'] as $aspect) {
            $aspectContainer->registerAspect($app->make($aspect));
        }
    }
}
