<?php declare(strict_types=1);

namespace Tests\Functional;

use App\Symfony\Kernel;
use Liip\FunctionalTestBundle\Test\WebTestCase as BaseWebTestCase;

abstract class WebTestCase extends BaseWebTestCase
{
    /**
     * {@inheritdoc}
     */
    protected static function getKernelClass(): string
    {
        return Kernel::class;
    }
}
