<?php

namespace Acme\StoreBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testProducts()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/product/show/5');

        $this->assertTrue($crawler->filter('html:contains("Hinta: 19.99")')->count() > 0);
    }
}
