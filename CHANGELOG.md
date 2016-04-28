# Changelog

All notable changes to this project will be documented in this file, in reverse chronological order by release.

## 3.0.0 - TBD

### Added

- A definition compiler which will utilize `RuntimeDefinition` for Consistency to compile.
- Setters without parameters will not be created by `RuntimeDefinition` (and therefore not accidentially called)
- `Zend\Di\ServiceLocator` now implements `Interop\Container\ContainerInterface` and utilizes the dependency injector to be completely exchangible
- `Zend\Di\Container` as implementation of `Interop\Container\ContainerInterface`
  * Provides the dependency injector as standalone container
  * Provides `build()` to be signature compatible with `Zend\ServiceManager\ServiceManager`
- `Zend\Di\DependencyInjectorInterface`
  * Provides instanciator to create new instances
  * Is used by `Zend\Di\ServiceLocator` and `Zend\Di\Container`
  * Utilizes `Zend\Di\Resolver\DependencyResolverInterface`
- Moved strategies to resolve method parameters to `Zend\Di\Resolver`
- PHP7 compatible introspection strategies
- Classes to wrap value and type injections
- Support for zend-component-installer
- An interface for the di configuration

### Deprecated

- Nothing

### Removed

- `get()` does no longer support a `$parameters` array, `newInstance()` still does
- Parameters passed to `newInstance()` will only be used for constructing the requested class and no longer be forwarded to nested instanciations.
- In `Zend\Di\Definition\BuilderDefinition`
  * Removed `createClassesFromArray()` - Obsolete since there is an array definition
- Removed `Zend\Di\Defintion\CompilerDefinition` in favour of the `Zend\Di\Definition\Compiler` implementation, which creates an array definition
- `InstanceManager` in favour of `Interop\Container\ContainerInterface`
- `Zend\Di\Di` is removed in favour of `Zend\Di\Container`
- Separated the definition from the configuration.

### Fixed

- Nothing


## 2.7.0 - TBD

### Added

- Nothing.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- Nothing.

## 2.6.2 - TBD

### Added

- Nothing.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- Nothing.

## 2.6.1 - 2016-04-25

### Added

- Adds all existing documentation and publishes it at
  https://zendframework.github.io/zend-di/

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- [#3](https://github.com/zendframework/zend-di/pull/3) fixes how
  `InstanceManager::sharedInstancesWithParams()` behaves when multiple calls are
  made with different sets of parameters (it should return different instances
  in that situation).

## 2.6.0 - 2016-02-23

### Added

- [#16](https://github.com/zendframework/zend-di/pull/16) adds container-interop
  as a dependency, and updates the `LocatorInterface` to extend
  `Interop\Container\ContainerInterface`. This required adding the following
  methods:
  - `Zend\Di\Di::has()`
  - `Zend\Di\ServiceLocator::has()`

### Deprecated

- Nothing.

### Removed

- [#15](https://github.com/zendframework/zend-di/pull/15) and
  [#16](https://github.com/zendframework/zend-di/pull/16) remove most
  development dependencies, as the functionality could be reproduced with
  generic test assets or PHP built-in classes. These include:
  - zend-config
  - zend-db
  - zend-filter
  - zend-log
  - zend-mvc
  - zend-view
  - zend-servicemanager

### Fixed

- [#16](https://github.com/zendframework/zend-di/pull/16) updates the try/catch
  block in `Zend\Di\Di::resolveMethodParameters()` to catch container-interop
  exceptions instead of the zend-servicemanager-specific exception class. Since
  all zend-servicemanager exceptions derive from container-interop, this
  provides more flexibility in using any container-interop implementation as a
  peering container.
