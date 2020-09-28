<?php

namespace XeroPHP_VS\Remote\Exception;

use XeroPHP_VS\Remote\Exception;
use XeroPHP_VS\Remote\Response;

class InternalErrorException extends Exception
{
    protected $message = 'An unhandled error with the Xero API. Contact the Xero API team if problems persist.';

    protected $code = Response::STATUS_INTERNAL_ERROR;
}
