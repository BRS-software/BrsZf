<?php

/**
 * (c) BRS software - Tomasz Borys <t.borys@brs-software.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Brs\Zf\Mvc\Service;

use stdClass;
use Zend\Console\Adapter\AdapterInterface;
use Zend\Console\Console;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * @author Tomasz Borys <t.borys@brs-software.pl>
 * @version 1.0 2013-04-18
 */
class ConsoleAdapterFactory implements FactoryInterface
{
    protected $defaultConsoleAdapter;
    protected $cliConsoleAdapter;

    public function __construct($defaultConsoleAdapter, $cliConsoleAdapter)
    {
        $this->defaultConsoleAdapter = $defaultConsoleAdapter;
        $this->cliConsoleAdapter = $cliConsoleAdapter;
    }

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        // First, check if we're actually in a Console environment
        if (Console::isConsole()) {
            $adapter = Console::getInstance($this->cliConsoleAdapter);
        } else {
            $adapter = Console::getInstance($this->defaultConsoleAdapter);
        }

        // check if we have a valid console adapter
        if (!$adapter instanceof AdapterInterface) {
            throw new \RuntimeException('invalid console adapter');
        }

        $config = $serviceLocator->get('Config');
        // Optionally, change Console charset
        if (!empty($config['console']) && !empty($config['console']['charset'])) {
            // use the charset supplied in application config
            $charset = $serviceLocator->get($config['console']['charset']);
            $adapter->setCharset($charset);
        }

        return $adapter;
    }
}
