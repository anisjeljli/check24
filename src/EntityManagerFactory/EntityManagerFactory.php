<?php

namespace  src\EntityManager;

use Psr\Container\ContainerInterface;
use Webmozart\Assert\Assert;
use Doctrine\ORM\EntityManager;


class EntityManagerFactory
{
    /**
     * Set Up & return Doctrine connection
     *
     * @param  ContainerInterface $container
     * @throws \RuntimeException
     * @return EntityManager
     */
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get('config');
        Assert::that($config)->keyExists('doctrine', "No Doctrine ORM Configuration Specified, check your 'config/autoload/database.local.php'");
        $paths = $config['doctrine']['paths'];
        $dbParams = $config['doctrine']['db_params'];
        $isDevMode = $config['doctrine']['is_dev_mode'];

        $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
        $config->setProxyDir("temp/proxies");
        $entityManager = EntityManager::create($dbParams, $config);

        /*
         * Enable native prepared statements
         */
        $pdo = $entityManager->getConnection()->getWrappedConnection();
        $pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);

        /*
         * Allow Doctrine to persist boolean types
         */
        \Doctrine\DBAL\Types\Type::overrideType('boolean', BooleanToIntType::class);
        return $entityManager;
    }

}
