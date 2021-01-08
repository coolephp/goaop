# coole/goaop

> Bringing the goaop to Coole. - 将 goaop 集成到 Coole。

[![Tests](https://github.com/coolephp/goaop/workflows/Tests/badge.svg)](https://github.com/coolephp/goaop/actions)
[![Check & fix styling](https://github.com/coolephp/goaop/workflows/Check%20&%20fix%20styling/badge.svg)](https://github.com/coolephp/goaop/actions)
[![codecov](https://codecov.io/gh/coolephp/goaop/branch/main/graph/badge.svg?token=URGFAWS6S4)](https://codecov.io/gh/coolephp/goaop)
[![Latest Stable Version](https://poser.pugx.org/coolephp/goaop/v)](//packagist.org/packages/coolephp/goaop)
[![Total Downloads](https://poser.pugx.org/coolephp/goaop/downloads)](//packagist.org/packages/coolephp/goaop)
[![License](https://poser.pugx.org/coolephp/goaop/license)](//packagist.org/packages/coolephp/goaop)

## Requirement

* Coole >= 1.0

## Installation

``` bash
$ composer require coolephp/goaop -vvv
```

## Usage

### Configuration

1. Copy `goaop/config/goaop.php` to `coole-skeleton/config/goaop.php`.
2. Config `\Coole\Goaop\GoAopServiceProvider::class` service provider.

``` php
<?php

return [
    /*
     * App 名称
     */
    'name' => env('APP_NAME', 'Coole'),
    
    ...

    /*
     * 第三方服务
     */
    'providers' => [
        \Coole\Goaop\GoAopServiceProvider::class
    ],
    
    ...
];

```

3. Add a aspect configuration for `config/goaop.php`.

``` php
<?php

return [
    /*
     * AOP Debug Mode
     */
    'debug' => env('GOAOP_DEBUG', env('APP_DEBUG', false)),
    
    ...
    
    /*
     * Yours aspects
     */
    'aspects' => [
        \App\Aspect\LoggingServiceAspect::class,
    ],
];
```

### Create a class `app\Service\LoggingService`

``` php
<?php

namespace App\Service;

class LoggingService
{
    public static function logging()
    {
        return true;
    }
}
```

### Create a aspect `App\Aspect\LoggingServiceAspect`

``` php
<?php

namespace App\Aspect;

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
     * @Before("execution(public App\Service\LoggingService::logging(*))")
     */
    public function beforeMethodExecution(MethodInvocation $invocation)
    {
        file_put_contents(base_path('runtime/logging.log'), 'this is a before method testing.'.PHP_EOL, FILE_APPEND);
    }

    /**
     * Method that will be called after real method.
     *
     * @param MethodInvocation $invocation Invocation
     * @After("execution(public App\Service\LoggingService::logging(*))")
     */
    public function afterMethodExecution(MethodInvocation $invocation)
    {
        file_put_contents(base_path('runtime/logging.log'), 'this is a after method testing.'.PHP_EOL, FILE_APPEND);
    }
}
```

### Run `App\Service\LoggingService::logging()`

cat `runtime/logging.log`

``` bash
───────┬───────────────────────────────────────────────────────────────────
       │ File: runtime/logging.log
───────┼───────────────────────────────────────────────────────────────────
   1   │ this is a before method testing.
   2   │ this is a after method testing.
───────┴───────────────────────────────────────────────────────────────────
```

###

## Testing

``` bash
$ composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

* [guanguans](https://github.com/guanguans)
* [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
