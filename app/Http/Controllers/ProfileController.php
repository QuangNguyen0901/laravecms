<?php
/**
 * Created by PhpStorm.
 * User: quangnguyen
 * Date: 2018/07/28
 * Time: 15:43
 */

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;


class ProfileController extends BaseController
{
    public function showProfile($name)
    {
        return view('profile')->with('name', $name);
    }
}