<?php
/**
 * Created by PhpStorm.
 * User: duognnhu
 * Date: 12/08/15
 * Time: 2:22 PM
 */

use

class CaptchaServiceProvider extends \App\Providers\AppServiceProvider {

    public function boot() {
        Route::get('captcha', "\CodeFury\CaptchaController@get_captcha_url");
    }
}