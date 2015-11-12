<?php

/**
 * (c) BRS software - Tomasz Borys <t.borys@brs-software.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Brs\Zf\Console\Prompt;

use Zend\Console\Exception;
use Zend\Console\ColorInterface as Color;
use Zend\Console\Prompt;

/**
 * @author Tomasz Borys (tobo) <t.borys@brs-software.pl>
 */
class Select extends Prompt\Select
{
    /**
     * Show a list of options and prompt the user to select one of them.
     *
     * @return string       Selected option
     */
    public function show()
    {
        $console = $this->getConsole();

        $console->writeLine($this->promptText);
        foreach ($this->options as $k => $v) {
            $console->writeLine('  ' . $k . ') ' . $v, Color::MAGENTA);
        }

        while (true) {
            $selectedKey = (new Prompt\Number('Enter key: '))->show();

            if (array_key_exists($selectedKey, $this->options)) {
                break;
            } else {
                $console->writeWarningLine('Key %s not exists in the list. Try again...', $selectedKey);
            }
        }
        return $selectedKey;
    }
}