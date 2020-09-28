<?php

namespace XeroPHP_VS\Remote\Exception;

use XeroPHP_VS\Remote\Exception;
use XeroPHP_VS\Remote\Response;

class OrganisationOfflineException extends Exception
{
    protected $message = 'The organisation temporarily cannot be connected to.';

    protected $code = Response::STATUS_ORGANISATION_OFFLINE;
}
