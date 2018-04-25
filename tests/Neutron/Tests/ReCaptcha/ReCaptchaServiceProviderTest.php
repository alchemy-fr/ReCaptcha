<?php

namespace Neutron\Tests\ReCaptcha;

use PHPUnit\Framework\TestCase;
use Neutron\ReCaptcha\ReCaptchaServiceProvider;
use Silex\Application;

class ReCaptchaServiceProviderTest extends TestCase
{
    public function testServiceProvider()
    {
        $app = new Application();
        $app->register(new ReCaptchaServiceProvider(), array(
            'recaptcha.public-key'  => 'super-public-key',
            'recaptcha.private-key' => 'super-private-key',
        ));

        $this->assertInstanceOf('Neutron\ReCaptcha\ReCaptcha', $app['recaptcha']);
        $this->assertEquals('super-public-key', $app['recaptcha']->getPublicKey());
        $this->assertEquals($app['recaptcha'], $app['recaptcha']);
    }
}
