<?php
/**
 * Created by PhpStorm.
 * User: duongnhu
 * Date: 14/08/15
 * Time: 11:15 AM
 */

namespace CodeFury;

class CaptchaHelper {

    public function __construct() {}

    public function get_html() {
        ?>
            <div class="captcha-container">
                <img src="/captcha/image" alt="captcha"/>
                <button class="captcha-refresh">Refresh</button>
                <button class="captcha-refresh">Speak</button>
            </div>
        <?
    }
}