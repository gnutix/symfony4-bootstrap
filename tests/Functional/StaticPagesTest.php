<?php declare(strict_types=1);

namespace Tests\Functional;

final class StaticPagesTest extends WebTestCase
{
    public function testHomepageExists(): void
    {
        $client = $this->makeClient();
        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Hello World', $crawler->filter('h1')->text());
    }
}
