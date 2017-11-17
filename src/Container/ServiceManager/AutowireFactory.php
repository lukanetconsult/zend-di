<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Zend\Di\Container\ServiceManager;

use Interop\Container\ContainerInterface;
use Zend\Di\Container\AutowireFactory as DecoratedAutowireFactory;
use Zend\ServiceManager\Factory\AbstractFactoryInterface;


/**
 * @codeCoverageIgnore
 */
class AutowireFactory implements AbstractFactoryInterface
{
    private $factory;

    public function __construct()
    {
        $this->factory = new DecoratedAutowireFactory();
    }

    /**
     * {@inheritDoc}
     * @see \Zend\ServiceManager\Factory\AbstractFactoryInterface::canCreate()
     */
    public function canCreate(ContainerInterface $container, $requestedName)
    {
        return $this->factory->canCreate($container, $requestedName);
    }

    /**
     * {@inheritDoc}
     * @see \Zend\ServiceManager\Factory\FactoryInterface::__invoke()
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return $this->factory->create($container, $requestedName, $options);
    }
}
