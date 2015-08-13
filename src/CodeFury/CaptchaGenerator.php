<?php
/**
 * Created by PhpStorm.
 * User: duognnhu
 * Date: 13/08/15
 * Time: 1:51 PM
 */

namespace CodeFury;

class CaptchaGenerator {

    private $width;
    private $height;
    private $dots_no = 500;
    private $captcha_string = "ABCDEFGHJKLMNOPQRSTUVWXYZabcdefghjklmnopqrstuvwxyz0123456789";
    private $image;
    private $captcha_length;

    /**
     * @param array $params the options for generating image
     *        available options are:
     *             'width' => 250
     *             'height' => 50
     *             'captcha_length' => 5
     */
    public function __construct($params=array()) {
        $default_opts = [
            'width' => 250,
            'height' =>50,
            'captcha_length' => 5
        ];
        $opts = array_replace($default_opts, $params);
        $this->width = $opts['width'];
        $this->height = $opts['height'];
        $this->captcha_length = $opts['captcha_length'];
        $this->image = imagecreatetruecolor($this->width, $this->height);
    }

    public function create_image($captcha) {
        $background_color = imagecolorallocate($this->image, 255, 255, 255);
        imagefilledrectangle($this->image, 0, 0, $this->width, $this->height, $background_color);
        $this->draw_dots();
        $this->draw_text($captcha);
        imagepng($this->image, "image.png");
    }

    public function generate_captcha_text() {
        $captcha = "";
        for($i = 0; $i < $this->captcha_length; $i++) {
            $index = rand(0, strlen($this->captcha_string) - 1);
            $captcha = $captcha.$this->captcha_string[$index];
        }
        return $captcha;
    }

    private function draw_dots() {
        $pixel_color = imagecolorallocate($this->image, rand(0, 255), rand(0, 255), rand(0, 255));
        for($i = 0; $i < $this->dots_no; $i++) {
            imagesetpixel($this->image, rand(0, $this->width), rand(0, $this->height), $pixel_color);
        }
    }

    private function draw_text($captcha) {
        for ($i = 0; $i < $this->captcha_length; $i++) {
            $letter = $captcha[rand(0, $this->captcha_length - 1)];
            $text_color = imagecolorallocate($this->image, rand(0, 255), rand(0, 255), rand(0, 255));
            imagestring($this->image, 5,  5 + ($i * 50), rand(0, intval($this->height/2)), $letter, $text_color);
        }
    }
}
