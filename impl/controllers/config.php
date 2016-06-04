<?php
/**
 * Created by PhpStorm.
 * User: donic
 * Date: 6/4/2016
 * Time: 12:20 AM
 */
$config = array("base_url" => "http://localhost.ciprian.ro/impl/hybridauth/",
    "providers" => array (
        "Google" => array (
            "enabled" => true,
            "keys"    => array ( "id" => "365758358483-a1n39iuhtamkjou01lk8q0d9a8vtq721.apps.googleusercontent.com", "secret" => "Vtl4tuDyf8CcRy8VlEW6JnUs" ),

        ),

        "Facebook" => array (
            "enabled" => true,
            "keys"    => array ( "id" => "1764033723834252", "secret" => "823e8ae98dc19c6b7aee9be879939e33" ),
            "scope" => "email, user_about_me, user_birthday, user_hometown"  //optional.
        ),

        "Twitter" => array (
            "enabled" => true,
            "includeEmail" => true,
            "keys"    => array ( "key" => "cyrq0GDcuDVXtB93c4BFv4kPA", "secret" => "Zy1l6M8p0ZY4s5DdgYYHDjTJLBGNnauFOqPSb7C216Wf45PUfp" )
        ),
    ),
    // if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
    "debug_mode" => false,
    "debug_file" => "debug.log",
);