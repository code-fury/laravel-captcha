<?php
/**
 * Created by PhpStorm.
 * User: duognnhu
 * Date: 12/08/15
 * Time: 2:22 PM
 */

use \CodeFury\CaptchaGenerator;
use \Illuminate\Http\Response;

class CaptchaController extends \App\Http\Controllers\Controller {

    private $session_captcha = 'captcha';

    public function get_captcha_url(Request $request) {
        $generator = new \CodeFury\CaptchaGenerator();
        $captcha = $generator->generate_captcha_text();
        $request->session()->put($this->session_captcha, $captcha);
        $fname = tempnam("/tmp", "captcha")."png";
        $generator->create_image($captcha, $fname);
        return "/captcha?fname=".$fname;
    }

    public function get_captcha_image() {
        $fname = Input::get('fname');
        $content = file_get_contents($fname);
        $response = new Response($content, 200);
        $response->header('Content-Type', "image/png");
        return $response;
    }
}