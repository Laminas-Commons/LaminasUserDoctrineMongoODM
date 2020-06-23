<?php
return array(
    'doctrine' => array(
        'driver' => array(
            'lmcuser_document' => array(
                'class' => 'Doctrine\ODM\MongoDB\Mapping\Driver\XmlDriver',
                'paths' => [__DIR__ . '/xml']
            ),

            'odm_default' => array(
                'drivers' => array(
                    'LmcUserDoctrineMongoODM\Document'  => 'lmcuser_document'
                )
            )
        )
    ),
);
