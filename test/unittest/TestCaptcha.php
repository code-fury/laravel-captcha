<?php
/**
 * Created by PhpStorm.
 * User: duongnhu
 * Date: 13/08/15
 * Time: 9:56 PM
 */

require_once("../../src/CodeFury/CaptchaGenerator.php");

$captcha = new CodeFury\CaptchaGenerator();
$text = $captcha->generate_captcha_text();
$captcha->create_image($text);