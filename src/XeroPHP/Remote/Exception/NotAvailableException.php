<?php

namespace XeroPHP_VS\Remote\Exception;

use XeroPHP_VS\Remote\Exception;
use XeroPHP_VS\Remote\Response;

class NotAvailableException extends Exception
{
    protected $message = 'API is currently unavailable.';

    protected $code = Response::STATUS_NOT_AVAILABLE;
}
