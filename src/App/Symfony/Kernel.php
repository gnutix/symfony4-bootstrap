<?php declare(strict_types=1);

namespace App\Symfony;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Routing\RouteCollectionBuilder;

final class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    private const CONFIG_EXTENSIONS = '.yaml';

    /**
     * {@inheritdoc}
     */
    public function getProjectDir(): string
    {
        return dirname(__DIR__, 3);
    }

    /**
     * {@inheritDoc}
     */
    public function getCacheDir(): string
    {
        return (getenv('APP_VAR_DIR') ?: $this->getProjectDir().'/var').'/cache/'.$this->getEnvironment();
    }

    /**
     * {@inheritDoc}
     */
    public function getLogDir(): string
    {
        return (getenv('APP_VAR_DIR') ?: $this->getProjectDir().'/var').'/logs';
    }

    /**
     * @return string
     */
    private function getSessionDir(): string
    {
        return (getenv('APP_VAR_DIR') ?: $this->getProjectDir().'/var').'/sessions/'.$this->getEnvironment();
    }

    /**
     * @return string
     */
    private function getConfigDir(): string
    {
        return $this->getProjectDir().'/etc';
    }

    /**
     * {@inheritdoc}
     */
    public function registerBundles(): array
    {
        $bundles = [];

        /** @var array $bundlesConfiguration */
        /** @noinspection PhpIncludeInspection */
        $bundlesConfiguration = require $this->getConfigDir().'/bundles.php';

        foreach ($bundlesConfiguration as $class => $environments) {
            if (isset($environments['all']) || isset($environments[$this->getEnvironment()])) {
                $bundles[] = new $class();
            }
        }

        return $bundles;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureRoutes(RouteCollectionBuilder $routes): void
    {
        if (is_dir($this->getConfigDir().'/routing/')) {
            $routes->import($this->getConfigDir().'/routing/*'.self::CONFIG_EXTENSIONS, '/', 'glob');
        }
        if (is_dir($this->getConfigDir().'/routing/'.$this->getEnvironment())) {
            $routes->import(
                $this->getConfigDir().'/routing/'.$this->getEnvironment().'/**/*'.self::CONFIG_EXTENSIONS,
                '/',
                'glob'
            );
        }
        $routes->import($this->getConfigDir().'/routing'.self::CONFIG_EXTENSIONS, '/', 'glob');
    }

    /**
     * {@inheritdoc}
     * @param LoaderInterface|\Symfony\Component\Config\Loader\Loader $loader
     */
    protected function configureContainer(ContainerBuilder $c, LoaderInterface $loader): void
    {
        $c->setParameter('kernel.session_dir', $this->getSessionDir());

        $loader->import($this->getConfigDir().'/packages/*'.self::CONFIG_EXTENSIONS, 'glob');
        if (is_dir($this->getConfigDir().'/packages/'.$this->getEnvironment())) {
            $loader->import(
                $this->getConfigDir().'/packages/'.$this->getEnvironment().'/**/*'.self::CONFIG_EXTENSIONS,
                'glob'
            );
        }
        $loader->import($this->getConfigDir().'/local/*'.self::CONFIG_EXTENSIONS, 'glob');
        $loader->import($this->getConfigDir().'/container'.self::CONFIG_EXTENSIONS, 'glob');
    }
}
