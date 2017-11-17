# zend-di

Master: [![Build Status](https://travis-ci.org/lukanetconsult/zend-di.svg?branch=master)](https://travis-ci.org/lukanetconsult/zend-di)
Develop: [![Build Status](https://travis-ci.org/lukanetconsult/zend-di.svg?branch=develop)](https://travis-ci.org/lukanetconsult/zend-di)

## This Fork

This fork is there to provide PHP 5.6 support. If you are not able to adopt PHP 7.1 yet (which you should to asap), you can use this
to get ready for zend-di 3.x.

When you are ready for php 7.1, you can seamlessly switch to the official zend-di.

Install via composer:

```bash
composer config repositories.lukadi vcs https://github.com/lukanetconsult/zend-di.git
composer install luka/zend-di
```

Switch to official zend-di:

```bash
composer config --unset repo.lukadi
composer remove luka/zend-di
composer require zendframework/zend-di
```


## About

`Zend\Di` provides auto wiring to implement Inversion of Control (IoC) containers. IoC containers
are widely used to create object instances that have all dependencies resolved
and injected. Dependency Injection containers are one form of IoC – but not the
only form.

`Zend\Di` is designed to be simple, fast and reusable. It provides the following features:

* Constructor injection
* Autowiring:
  - Recursively through all dependencies
  - With configured type preferences
  - with configured injections
  - With injections passed in the create() call
* Code generators to create factories usable by other IoC containers like Zend\ServiceManager

It does __not__ provide:

* Setter, interface, property or any other injection method than constructor injection
* Support for factories
* Declaring shared/unshared instances
  - the injector always creates new instances
  - the default container always shares instances
* Support for variadic arguments in __construct

If you need these features combine it with another IoC container like [`Zend\ServiceManager`](https://docs.zendframework.com/zend-servicemanager/).


- File issues at https://github.com/lukanetconsult/zend-di/issues
- Documentation is at https://zendframework.github.io/zend-di/


