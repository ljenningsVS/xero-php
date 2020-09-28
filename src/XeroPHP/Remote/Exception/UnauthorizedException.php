<?php

namespace XeroPHP_VS\Remote\Exception;

use XeroPHP_VS\Remote\Exception;
use XeroPHP_VS\Remote\Response;

class UnauthorizedException extends Exception
{
    protected $message = 'Invalid authorization credentials.';

    protected $code = Response::STATUS_UNAUTHORISED;
}
