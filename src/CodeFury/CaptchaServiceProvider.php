<?php
/**
 * Created by PhpStorm.
 * User: duognnhu
 * Date: 12/08/15
 * Time: 2:22 PM
 */

use Illuminate\Routing;

class CaptchaServiceProvider extends \Illuminate\Support\ServiceProvider {

    public function register() {
        require_once("validator.php");
    }

    public function boot() {
        Route::get('captcha/url', '\CodeFury\CaptchaController@get_captcha_url');
        Route::get('captcha/image', '\CodeFury\CaptchaController@get_captcha_image');
    }
}