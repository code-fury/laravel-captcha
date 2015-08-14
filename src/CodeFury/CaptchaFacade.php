<?php
/**
 * Created by PhpStorm.
 * User: duongnhu
 * Date: 14/08/15
 * Time: 11:10 AM
 */
namespace CodeFury;

class CaptchaFacade extends Facade {
        protected static function getFacadeAccessor() {
            return 'captcha';
        }
}