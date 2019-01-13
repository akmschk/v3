<?php

namespace App\Services;

class Config
{
    public static function get($key)
    {
        global $System_Config;
        return $System_Config[$key];
    }

    public static function set($key, $value)
    {
        global $System_Config;
        $System_Config[$key] = $value;
    }

    public static function getPublicConfig()
    {
        return [
            "appName" => self::get("appName"),
            "version" => VERSION,
            "baseUrl" => self::get("baseUrl"),
            "checkinMin" => self::get("checkinMin"),
            "code_payback" => self::get("code_payback"),
            "checkinMax" => self::get("checkinMax"),
            "wecenter_url" => self::get("wecenter_url"),
            "enable_wecenter" => self::get("enable_wecenter"),
            "jump_delay" => self::get("jump_delay"),
            "enable_analytics_code" => self::get("enable_analytics_code"),
            "enable_donate" => self::get("enable_donate"),
            "enable_telegram" => self::get("enable_telegram")
        ];
    }

    public static function getDbConfig()
    {
        return [
            'driver'    => self::get('db_driver'),
            'host'      => self::get('db_host'),
            'database'  => self::get('db_database'),
            'username'  => self::get('db_username'),
            'password'  => self::get('db_password'),
            'charset'   => self::get('db_charset'),
            'collation' => self::get('db_collation'),
            'prefix'    => self::get('db_prefix')
        ];
    }

    public static function getRadiusDbConfig()
    {
        return [
            'driver'    => self::get('db_driver'),
            'host'      => self::get('radius_db_host'),
            'database'  => self::get('radius_db_database'),
            'username'  => self::get('radius_db_user'),
            'password'  => self::get('radius_db_password'),
            'charset'   => self::get('db_charset'),
            'collation' => self::get('db_collation')
        ];
    }

    public static function getWecenterDbConfig()
    {
        return [
            'driver'  => self::get('db_driver'),
            'host'  => self::get('wecenter_db_host'),
            'database'  => self::get('wecenter_db_database'),
            'username'  => self::get('wecenter_db_user'),
            'password'  => self::get('wecenter_db_password'),
            'charset'   => self::get('db_charset'),
            'collation' => self::get('db_collation')
        ];
    }

    public static function getSupportParam($type)
    {
        switch ($type) {
            case 'obfs':
                $list = array('simple_obfs_http');
                return $list;
            case 'protocol':
                $list = array('origin');
                return $list;
            case 'allow_none_protocol':
                $list = array('auth_chain_a', 'auth_chain_b');
                return $list;
            case 'relay_able_protocol':
                $list = array('auth_aes128_md5', 'auth_aes128_sha1', 'auth_chain_a', 'auth_chain_b');
                return $list;
            case 'ss_aead_method':
                $list = array('aes-256-gcm', 'chacha20-ietf-poly1305', 'xchacha20-ietf-poly1305');
                return $list;
            case 'ss_obfs':
                $list = array('simple_obfs_http', 'simple_obfs_http_compatible');
                return $list;
            default:
                $list = array('aes-256-gcm', 'chacha20-ietf-poly1305', 'xchacha20-ietf-poly1305');
                return $list;
        }
    }
}
