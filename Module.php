<?php

namespace LmcUserDoctrineMongoODM;

use Doctrine\ODM\MongoDB\Mapping\Driver\XmlDriver;
use LmcUser\Module as LmcUser;

class Module
{
    public function onBootstrap($e)
    {
        $app     = $e->getParam('application');
        $sm      = $app->getServiceManager();
        $options = $sm->get('lmcuser_module_options');

        // Add the default entity driver only if specified in configuration
        if ($options->getEnableDefaultEntities()) {
            $chain = $sm->get('doctrine.driver.odm_default');
            $chain->addDriver(new XmlDriver(__DIR__ . '/config/xml'), 'LmcUserDoctrineMongoODM\Document');
        }
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'aliases' => array(
                'lmcuser_doctrine_dm' => 'doctrine.documentmanager.odm_default',

            ),
            'factories' => array(
                'lmcuser_module_options' => function ($sm) {
                    $config = $sm->get('Config');
                    return new Options\ModuleOptions(isset($config['lmcuser']) ? $config['lmcuser'] : array());
                },
                'lmcuser_user_mapper' => function ($sm) {
                    return new \LmcUserDoctrineMongoODM\Mapper\UserMongoDB(
                        $sm->get('lmcuser_doctrine_dm'),
                        $sm->get('lmcuser_module_options')
                    );
                },
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}
