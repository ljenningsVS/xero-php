<?php

namespace XeroPHP_VS\Remote\OAuth\SignatureMethod;

interface SignatureMethodInterface
{
    public static function generateSignature(array $config, $sbs, $secret);
}
