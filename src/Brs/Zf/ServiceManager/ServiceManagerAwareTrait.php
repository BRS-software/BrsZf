<?php

namespace Brs\Zf\ServiceManager;

use RuntimeException;
use Zend\ServiceManager\ServiceManager;
use Zend\ServiceManager\ServiceManagerAwareInterface;

trait ServiceManagerAwareTrait
{
    protected $__serviceManager;

    public function setServiceManager(ServiceManager $sm)
    {
        $this->__serviceManager = $sm;
        return $this;
    }

    public function getServiceManager()
    {
        if (null === $this->__serviceManager) {
            throw new RuntimeException('service manager not set');
        }
        return $this->__serviceManager;
    }

    public function getService($serviceName)
    {
        return $this->getServiceManager()->get($serviceName);
    }
}