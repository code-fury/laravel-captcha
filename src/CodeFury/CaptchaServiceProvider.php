<?php
/**
 * Created by PhpStorm.
 * User: duognnhu
 * Date: 12/08/15
 * Time: 2:22 PM
 */

namespace CodeFury;

use Illuminate\Routing;
use \Illuminate\Support;

class CaptchaServiceProvider extends ServiceProvider {

    public function register() {
        require_once("validator.php");
        $this->app->bind('captcha', function () {
            return new CaptchaHelper();
        });
    }

    public function boot() {
        Route::get('captcha/url', '\CodeFury\CaptchaController@get_captcha_url');
        Route::get('captcha/image', '\CodeFury\CaptchaController@get_captcha_image');
    }
}