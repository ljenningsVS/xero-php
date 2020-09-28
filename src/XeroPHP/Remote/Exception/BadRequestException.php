<?php

namespace XeroPHP_VS\Remote\Exception;

use XeroPHP_VS\Remote\Exception;
use XeroPHP_VS\Remote\Response;

class BadRequestException extends Exception
{
    protected $message = 'Bad Request';

    protected $code = Response::STATUS_BAD_REQUEST;
}
