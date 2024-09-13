<?php

namespace App\Helpers;

class PhoneNumberCountryDetector
{
    public static function handle(string $phone): ?string
    {
        $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
        $swissNumberProto = $phoneUtil->parse($phone);
        $geocoder = \libphonenumber\geocoding\PhoneNumberOfflineGeocoder::getInstance();
        return $geocoder->getDescriptionForNumber($swissNumberProto, 'ru');
    }
}
