<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Zend\Di\Exception;

use DomainException;


class ClassNotFoundException extends DomainException implements ExceptionInterface
{
    /**
     * @param   string          $classname
     * @param   int             $code
     * @param   \Throwable|null $previous
     */
    public function __construct($classname, $code = null, $previous = null)
    {
        parent::__construct("The class '$classname' does not exist.", $code, $previous);
    }
}
