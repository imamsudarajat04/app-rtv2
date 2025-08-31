<?php

if (! function_exists('formatToE164')) 
{
    function formatToE164($phone, $countryCode = '62')
    {
        $phone = preg_replace('/[^0-9]/', '', $phone);

        if (strpos($phone, '0') === 0) {
            $phone = $countryCode . substr($phone, 1);
        }

        return '+' . $phone;
    }
}