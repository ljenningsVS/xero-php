<?php

namespace XeroPHP_VS\Remote\Exception;

use XeroPHP_VS\Remote\Exception;
use XeroPHP_VS\Remote\Response;

class NotFoundException extends Exception
{
    protected $message = 'Resource Not Found';

    protected $code = Response::STATUS_NOT_FOUND;
}
