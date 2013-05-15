<?php

namespace Brs\Zf\Permissions\Acl;

use LogicException;
use Zend\Permissions\Acl\Acl as ZendAcl;

class Acl extends ZendAcl
{
    protected $currentRole;

    public function assert($privilege, $resource = null, $role = null)
    {
        if (! $this->hasPermission($privilege, $resource, $role)) {
            throw new PermissionException(
                'Current user hasn\'t enough permission'
            );
        }
    }

    public function hasPermission($privilege, $resource = null, $role = null)
    {
        if (null === )
    }
}

