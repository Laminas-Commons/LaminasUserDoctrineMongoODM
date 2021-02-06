>
> **IMPORTANT!**
> 
> This library is abandoned.  Please use [LM-Commons/LmcUser](https:www.github.com/lm-commons/lmcuserdoctrinemongoodm)

LmcUserDoctrineMongoODM
=======================

Introduction
------------
LmcUserDoctrineMongoODM is a MongoDb storage adapter for [LmcUser](https://github.com/Laminas-Commons/LmcUser). This module makes use of the Doctrine2 MongoDB ODM.

Installation
------------

### Composer

1. Install module   
Go to the [release tab](https://github.com/Laminas-Commons/LmcUserDoctrineMongoODM/releases) and make a note of the most recent version.
Run the following command from your application directory:
```php composer.phar require laminas-commons/lmc-user-doctrine-mongo-odm```
When asked for er version constraint, put in the version noted from the release tab.

2. Add ```DoctrineModule```, ```DoctrineMongoODMModule``` and ```LmcUserDoctrineMongoODM``` to ```config/application.config.php```

Options
------------

The following options are available:

- **enable_default_entities** - Boolean value, determines if the default User entity should be enabled. Set it to false in order to extend LmcUser\Entity\User with your own entity. Default is true.


Dependencies
------------

- [LmcUser](https://github.com/Laminas-Commons/LmcUser)
- [DoctrineModule](https://github.com/doctrine/DoctrineModule)
- [DoctrineMongoODMModule](https://github.com/doctrine/DoctrineMongoODMModule)
