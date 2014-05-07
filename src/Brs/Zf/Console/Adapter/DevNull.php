<?php

/**
 * (c) BRS software - Tomasz Borys <t.borys@brs-software.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Brs\Zf\Console\Adapter;

use Zend\Console\Adapter\AbstractAdapter;

/**
 * @author Tomasz Borys <t.borys@brs-software.pl>
 * @version 1.0 2013-04-18
 */
class DevNull extends AbstractAdapter
{
    use AbstractTrait;

    public function write($text, $color = null, $bgColor = null)
    {
        // this is dev null ;)
    }
}