<?php

namespace XeroPHP_VS\Application;

use XeroPHP_VS\Application;
use XeroPHP_VS\Remote\OAuth\Client;

class PublicApplication extends Application
{
    protected static $_type_config_defaults = [
        'oauth' => [
            'signature_method' => Client::SIGNATURE_HMAC_SHA1,
        ],
    ];
}
