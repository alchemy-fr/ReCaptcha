<?php

namespace Neutron\Tests\ReCaptcha;

use Neutron\ReCaptcha\Response;
use PHPUnit\Framework\TestCase;

class ResponseTest extends TestCase
{
    /**
     * @dataProvider provideConstructorParameters
     */
    public function testConstruct($valid, $error = null)
    {
        $response = new Response($valid, $error);
        $this->assertEquals($valid, $response->isValid());
        $this->assertEquals($error, $response->getError());
    }

    public function provideConstructorParameters()
    {
        return array(
            array(true, null),
            array(false, null),
            array(true, 'This is an error message'),
            array(false, 'Ceci est un message d\'ééérreur'),
        );
    }
}
