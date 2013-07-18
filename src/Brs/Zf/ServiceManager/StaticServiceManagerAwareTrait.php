<?php

namespace Brs\Zf\ServiceManager;

use LogicException;
use Zend\ServiceManager\ServiceManager;

trait StaticServiceManagerAwareTrait
{
    protected static $serviceManager;

    public static function setServiceManager(ServiceManager $sm)
    {
        self::$serviceManager = $sm;
    }

    public static function getServiceManager()
    {
        if (null === self::$serviceManager) {
            throw new LogicException('service manager not set');
        }
        return self::$serviceManager;
    }

    public static function getService($serviceName)
    {
        return self::getServiceManager()->get($serviceName);
    }
}