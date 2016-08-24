<?php

namespace App\Http\Controllers;

use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class SiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function login(Request $request)
    {
        $captcha = Session::get('__captcha');
        print_r($captcha);exit;

    }

    /**
     * 验证码
     */
    public function captcha()
    {
        $charset = 'abcdefkajkfjaljflk';
        $phrase = '';
        $chars = str_split($charset);

        for ($i = 0; $i < 4; $i++) {
            $phrase .= $chars[array_rand($chars)];
        }

        $builder = new CaptchaBuilder($phrase);
        $builder->setMaxBehindLines(1);
        $builder->setMaxFrontLines(1);
        $builder->setInterpolation(false);
        $builder->setDistortion(false);
        $builder->setInterpolation(true);
        $builder->build(100);
        $phrase = $builder->getPhrase();
        Session::set('__captcha', $phrase);
        header("Cache-control:no-cache, must-revalidate");
        header("Content-Type: image/jpeg");
        return $builder->output();
    }
    //
}