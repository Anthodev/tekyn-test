<?php

declare(strict_types=1);

namespace App\Tests\Unit\Repository;

use App\Entity\User;
use Doctrine\Common\DataFixtures\Purger\ORMPurger as DoctrineOrmPurger;
use Doctrine\Persistence\ManagerRegistry;
use Liip\TestFixturesBundle\Test\FixturesTrait;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserRepositoryTest extends KernelTestCase
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
            __DIR__ . '/UserRepositoryTestFixtures.yml'
        ], false, null, 'doctrine', DoctrineOrmPurger::PURGE_MODE_TRUNCATE);
    }

    public function testFindAUser(): void
    {
        $this->loadDb();

        $user = $this->doctrine->getRepository(User::class)->find(1);

        $this->assertNotEmpty($user);
    }

    public function testVerifyAUserData(): void
    {
        $this->loadDb();

        $user = $this->doctrine->getRepository(User::class)->findOneBy(['lastName' => 'Tekyn']);

        $this->assertSame('Cyril', $user->getFirstName());
        $this->assertSame('Tekyn', $user->getLastName());
        $this->assertSame(30, $user->getAge());
        $this->assertSame('Paris', $user->getCity());
        $this->assertEquals(new \DateTime() instanceof \DateTime, $user->getCreatedAt() instanceof \DateTime);
        $this->assertEquals(new \DateTime() instanceof \DateTime, $user->getUpdatedAt() instanceof \DateTime);

        $this->tearDown();
    }

    public function tearDown(): void
    {
        $purger = new DoctrineOrmPurger($this->doctrine->getManager());
        $purger->purge();

        self::$kernel->shutdown();
    }
}
