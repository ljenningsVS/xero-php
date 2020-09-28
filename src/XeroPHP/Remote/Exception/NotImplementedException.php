<?php

namespace XeroPHP_VS\Remote\Exception;

use XeroPHP_VS\Remote\Exception;
use XeroPHP_VS\Remote\Response;

class NotImplementedException extends Exception
{
    protected $message = 'The method you have called has not been implemented.';

    protected $code = Response::STATUS_INTERNAL_ERROR;
}
