<?php

class Captcha {
    
    const WIDTH = 100;
    const HEIGHT = 60;
    const FONT_SIZE = 16;
    const LENGTH = 4;
    const BG_LENGTH = 30;
    const FONT = 'F:\OpenServer\OSPanel\domains\Final\fonts\times.ttf';
    
    private static $letters = ['a', 'b', 'c', 'd', 'e', 'f', 'g', '1','2','3','4','5','6','7','8','9','x','y','z'];
    private static $colors = ['90', '110', '130', '150', '170', '190', '210'];
    
    public static function generate() {
        session_start();
        $src = imagecreatetruecolor(self::WIDTH, self::HEIGHT);
        $bg = imagecolorallocate($src, 255, 255, 255);
        imageFill($src, 0, 0, $bg);
        for ($i = 0; $i < self::BG_LENGTH; $i++) {
            $color = imagecolorallocatealpha($src, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255), 100);
            $letter = self::$letters[mt_rand(0, count(self::$letters) - 1)];
            $size = mt_rand(self::FONT_SIZE - 2, self::FONT_SIZE + 2);
            imagettftext($src, $size, mt_rand(0, 45), mt_rand(self::WIDTH * 0.1, self::WIDTH * 0.9),
            mt_rand(self::HEIGHT * 0.1, self::HEIGHT * 0.9), $color, self::FONT, $letter);
        }
        $code = '';
        for ($i = 0; $i < self::LENGTH; $i++) {
            $color = imagecolorallocatealpha($src, self::$colors[mt_rand(0, count(self::$colors) - 1)],
            self::$colors[mt_rand(0, count(self::$colors) - 1)],
            self::$colors[mt_rand(0, count(self::$colors) - 1)], mt_rand(20, 40));
            $letter = self::$letters[mt_rand(0, count(self::$letters) - 1)];
            $size = mt_rand(self::FONT_SIZE * 2 - 2, self::FONT_SIZE * 2 + 2);
            $x = ($i + 1) * self::FONT_SIZE  + mt_rand(1, 5);
            $y = self::HEIGHT * 2  / 3 + mt_rand(1, 5);
            $code .= $letter;
            imagettftext($src, $size, rand(0, 15), $x, $y, $color, self::FONT, $letter);
        }
        $_SESSION['code'] = $code;
        header('Content-type: image/gif');
        imagegif($src);
    }
    
    public static function check($code) {
        if (!session_id()) session_start();
        return $code === $_SESSION['code'];
    }
    
}
?>