<?php

return [
    // Symfony Bundles
    \Symfony\Bundle\FrameworkBundle\FrameworkBundle::class => ['all' => true],
    \Symfony\Bundle\SecurityBundle\SecurityBundle::class => ['all' => true],
    \Symfony\Bundle\TwigBundle\TwigBundle::class => ['all' => true],
    \Symfony\Bundle\MonologBundle\MonologBundle::class => ['all' => true],
    \Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle::class => ['all' => true],
    \Doctrine\Bundle\DoctrineBundle\DoctrineBundle::class => ['all' => true],
    \Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle::class => ['all' => true],

    // Sonata Bundles
    \Sonata\CoreBundle\SonataCoreBundle::class => ['all' => true],
    \Sonata\BlockBundle\SonataBlockBundle::class => ['all' => true],
    \Knp\Bundle\MenuBundle\KnpMenuBundle::class => ['all' => true],
    \Sonata\DoctrineORMAdminBundle\SonataDoctrineORMAdminBundle::class => ['all' => true],
    \Sonata\AdminBundle\SonataAdminBundle::class => ['all' => true],

    // Doctrine Bundles
    \Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle::class => ['all' => true],
    \Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle::class => ['all' => true],

    // Fixtures Bundles
    \Nelmio\Alice\Bridge\Symfony\NelmioAliceBundle::class => ['test' => true],
    \Fidry\AliceDataFixtures\Bridge\Symfony\FidryAliceDataFixturesBundle::class => ['test' => true],
    \Hautelook\AliceBundle\HautelookAliceBundle::class => ['test' => true],

    // Testing
    \Liip\FunctionalTestBundle\LiipFunctionalTestBundle::class => ['test' => true],

    // Development Bundles
    \Sensio\Bundle\DistributionBundle\SensioDistributionBundle::class => ['dev' => true, 'test' => true],
    \Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle::class => ['dev' => true, 'test' => true],
    \Symfony\Bundle\DebugBundle\DebugBundle::class => ['dev' => true, 'test' => true],
    \Symfony\Bundle\WebProfilerBundle\WebProfilerBundle::class => ['dev' => true, 'test' => true],
];
