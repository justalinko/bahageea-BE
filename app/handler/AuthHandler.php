<?php

namespace Reiko\App;

/**
 * REIKO FRAMEWORK 
 *  
 * @package ReiKo Framework
 *
 * @author alinko <alinkokomansuby@gmail.com>
 * @author ReiYan <hariyantoriyan.hr@gmail.com>
 * @copyright (c) 2021 
 * 
 * @license MIT 
 * 
 */


use Reiko\Libraries\Handler;
use Reiko\Libraries\Request;
use Reiko\Libraries\Response;
use Reiko\Libraries\Security;


class AuthHandler extends Handler
{

    public function index()
    {
        // some code here.
    }

    public function login()
    {
        $email = Request::input('email');
        $password = Request::input('password');
        $validate = Security::make_validation([
            $email => 'validate_email',
            $password => 'validate_password'
        ]);
        if ($validate !== true) {
            Response::apiBuilder($validate, 'validation', false, true);
        }

        if (dbfun('Reiko\Users')->validateLogin($email, $password)) {
            Response::apiBuilder(['token' => dbfun('Reiko\Users')->updateToken(['email' => $email])], 'Success login');
        } else {
            Response::apiBuilder(['error' => 'Failed login'], 'Email or password wrong', false, true);
        }
    }

    public function register()
    {


        $name = Request::input('name');
        $email = Request::input('email');
        $password = Request::input('password');
        $repassword = Request::input('repeat_password');

        $validate = Security::make_validation([
            $email => 'validate_email',
            $password => 'validate_password'
        ]);
        if ($validate !== true) {
            Response::apiBuilder($validate, 'validation', false, true);
        }

        if ($password == $repassword) {
            $token = Security::generate_token();
            $create = dbfun('Reiko\Users')->create([
                'name' => $name,
                'email' => $email,
                'password' => Security::reiko_password($password),
                'remember_token' => $token
            ]);
            if ($create->is_error == false) {
                Response::apiBuilder(
                    ['token' => $token],
                    'Success register !'
                );
            } else {
                Response::apiBuilder(['error' => 'Failed register :('], $create->errors, false, true);
            }
        } else {

            return Response::apiBuilder(['error' => 'password doesn\'t match !'], 'password doesn\'t match !', false, true);
        }
    }
}
