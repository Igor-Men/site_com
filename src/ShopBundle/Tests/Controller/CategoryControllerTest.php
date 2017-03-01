<?php

namespace ShopBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CategoryControllerTest extends WebTestCase
{
    public function testCategory()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/category/{id}');
    }

}
