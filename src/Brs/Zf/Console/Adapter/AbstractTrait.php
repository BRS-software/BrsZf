<?php

/**
 * (c) BRS software - Tomasz Borys <t.borys@brs-software.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Brs\Zf\Console\Adapter;

use Zend\Console\Adapter\AbstractAdapter as ZfAbstractAdapter;
use Zend\Console\ColorInterface as Color;

/**
 * @author Tomasz Borys <t.borys@brs-software.pl>
 * @version 1.0 2013-04-18
 */
trait AbstractTrait
{
    public function writeLogLine($text)
    {
        $this->writeLine(call_user_func_array('sprintf', func_get_args()), Color::CYAN);
    }

    public function writeSuccessLine($text)
    {
        $this->writeLine(call_user_func_array('sprintf', func_get_args()), Color::GREEN);
    }

    public function writeWarningLine($text)
    {
        $this->writeLine(call_user_func_array('sprintf', func_get_args()), Color::YELLOW);
    }

    public function writeErrorLine($text)
    {
        $this->writeLine('ERROR: ' . call_user_func_array('sprintf', func_get_args()), Color::LIGHT_WHITE, Color::RED);
    }

    public function error($text = 'An error occurred')
    {
        $this->writeErrorLine(call_user_func_array('sprintf', func_get_args()));
        exit(1);
    }

}