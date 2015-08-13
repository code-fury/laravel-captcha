<?php
/**
 * Created by PhpStorm.
 * User: duognnhu
 * Date: 13/08/15
 * Time: 1:51 PM
 */

class CaptchaGenerator {

    private $width;
    private $height;
    private $dots_no = 500;
    private $captcha_string = "ABCDEFGHJKLMNOPQRSTUVWXYZabcdefghjklmnopqrstuvwxyz0123456789";
    private $image;
    private $captcha_length;

    public function __construct($params) {
        $default_opts = array([
            'width' => 250,
            'height' =>50,
            'captcha_length' => 5
        ]);
        $opts = array_replace($default_opts, $params);
        $this->width = $opts['width'];
        $this->height = $opts['height'];
        $this->captcha_length = $opts['captcha_length'];
    }

    public function create_image() {
        $this->image = imagecreatetruecolor($this->width, $this->height);

        $background_color = imagecolorallocate($this->image, 255, 255, 255);
        imagefilledrectangle($this->image, 0, 0, $this->width, $this->height, $background_color);
        $this->draw_dots();
        imagepng($this->image, "image.png");
    }

    public function draw_dots() {
        $pixel_color = imagecolorallocate($this->image, 0, 0, 200);
        for($i = 0; $i < $this->dots_no; $i++) {
            imagesetpixel($this->image, rand() % $this->width, rand() % $this->height, $pixel_color);
        }
    }

    public function generate_capthca_text() {
        $captcha = "";
        for($i = 0; $i < $captcha; $i++) {
            $captcha = $captcha.$this->captcha_string[rand(0, len($this->captcha_string))];
        }
        return $captcha;
    }

    public function draw_text($captcha) {
        for ($i = 0; $i < $this->captcha_length; $i++) {
            $letter = $captcha[rand(0, $this->captcha_length - 1)];
            imagestring($this->image, 5,  5 + ($i * 30), 20, $letter, $text_color);
        }
    }
}

$img = new \CaptchaGenerator(250, 50);
$img->create_image();