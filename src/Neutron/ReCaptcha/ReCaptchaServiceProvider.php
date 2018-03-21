<?php

namespace Neutron\ReCaptcha;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Silex\Application;


class ReCaptchaServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['recaptcha.public-key'] = null;
        $app['recaptcha.private-key'] = null;

        $app['recaptcha'] = function (Application $app) {
           return ReCaptcha::create($app['recaptcha.public-key'], $app['recaptcha.private-key']);
        };
    }

    public function boot(Application $app)
    {
    }
}
