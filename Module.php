<?php

/**
 * (c) BRS software - Tomasz Borys <t.borys@brs-software.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrsZf;

use Brs\Zf\Console\ConsoleAwareInterface;

/**
 * @author Tomasz Borys (tobo) <t.borys@brs-software.pl>
 */
class Module
{
    public function getServiceConfig()
    {
        return [
            'initializers' => [
                function($service, $sm) {
                    if ($service instanceof ConsoleAwareInterface) {
                        $service->setConsole($sm->get('console'));
                    }
                }
            ],
        ];
    }
}
