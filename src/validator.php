<?php
/**
 * Created by PhpStorm.
 * User: duongnhu
 * Date: 13/08/15
 * Time: 11:16 PM
 */

$validator->extend(
    'captcha',
    function ($attribute, $value, $parameter) {
        return $value == session('captcha');
    }
);