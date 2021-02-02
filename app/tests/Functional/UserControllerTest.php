<?php

declare(strict_types=1);

namespace App\Tests\Functional;

use Doctrine\Common\DataFixtures\Purger\ORMPurger as DoctrineOrmPurger;
use Doctrine\Persistence\ManagerRegistry;
use GuzzleHttp\Client;
use Liip\TestFixturesBundle\Test\FixturesTrait;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserControllerTest extends KernelTestCase
{
    private ManagerRegistry $doctrine;
    
    use FixturesTrait;

    public function setUp(): void
    {
        self::bootKernel();

        $this->doctrine = self::$kernel->getContainer()->get('doctrine');
    }

    public function loadDb(): void
    {
        $this->loadFixtureFiles([
            __DIR__ . '../Unit/UserRepositoryTestFixtures.yml'
        ], false, null, 'doctrine', DoctrineOrmPurger::PURGE_MODE_TRUNCATE);
    }
    
    public function testFindAllUsers(): void
    {
        $client = new Client([
            'base_uri' => 'https://tekyn.localhost'
        ]);

        $response = $client->request('GET', '/user', [
            'verify' => false
        ]);

        $responseCode = $response->getStatusCode();

        $this->assertEquals(200, $responseCode);

        $this->tearDown();
    }

    public function tearDown(): void
    {
        $purger = new DoctrineOrmPurger($this->doctrine->getManager());
        $purger->purge();

        self::$kernel->shutdown();
    }
}
