<?php

/**
 * (c) BRS software - Tomasz Borys <t.borys@brs-software.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Brs\Zf\Console;

use Zend\Console\Adapter\AbstractAdapter;
use Brs\Zf\Console\Adapter\DevNull as DevNullConsole;
use Zend\Console\Adapter\AbstractAdapter as Console;

/**
 * @author Tomasz Borys <t.borys@brs-software.pl>
 */
interface ConsoleAwareInterface
{
    /**
     * @param Console $console
     */
    public function setConsole(Console $console);

    /**
     * @return Console;
     */
    public function getConsole();
}