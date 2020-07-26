<?php

namespace MadeITBelgium\VerifyEmail\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * MadeITBelgium VerifyEmail PHP Library.
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) 2020 Made I.T. (https://www.madeit.be)
 * @author     Tjebbe Lievens <tjebbe.lievens@madeit.be>
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-3.txt    LGPL
 */
class VerifyEmail extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'verifyemail';
    }
}