<?php

declare(strict_types=1);

namespace App\Tests\Unit\Repository;

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
}
