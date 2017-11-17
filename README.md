# zend-di

Master: [![Build Status](https://travis-ci.org/lukanetconsult/zend-di.svg?branch=master)](https://travis-ci.org/lukanetconsult/zend-di)
Develop: [![Build Status](https://travis-ci.org/lukanetconsult/zend-di.svg?branch=develop)](https://travis-ci.org/lukanetconsult/zend-di)

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


