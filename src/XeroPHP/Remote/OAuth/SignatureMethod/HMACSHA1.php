<?php

namespace XeroPHP_VS\Remote\OAuth\SignatureMethod;

class HMACSHA1 implements SignatureMethodInterface
{
    public static function generateSignature(array $config, $sbs, $secret)
    {
        return base64_encode(hash_hmac('sha1', $sbs, $secret, true));
    }
}
