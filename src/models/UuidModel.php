<?php
declare(strict_types = 1);

namespace FatalErrorOnline\Models;

class UuidModel
{
    /**
    * @return string return uuid
    */
    public static function generate() : string 
    {
	return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
    		mt_rand(0, 0xffff), mt_rand(0, 0xffff),
                mt_rand(0, 0xffff),
                mt_rand(0, 0x0fff) | 0x4000,
                mt_rand(0, 0x3fff) | 0x8000,
                mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }
}