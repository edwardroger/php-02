<?php

class AuthController
{
    private $user;

    public function __construct()
    {
        $this->user = [
            'email' => 'admin@gmail.com',
            'password' => 'admin',
        ];
    }

    public function login($request)
    {
        return [
            'view' => 'login'
        ];
    }

    public function loginSubmit($request)
    {
        $email = $request['email'];
        $password = $request['password'];
        if (
            $email == $this->user['email']
            && $password == $this->user['password']
            ) {
            
            return [
                'view'      => 'login',
                'redirect'  => '/',
                'message'   => 'Login successfully',
            ];
        }

        return [
            'view'      => 'login',
            'message'   => 'Login failure',
        ];
    }

    // bài tập: 
    // Tạo hàm xử lý validate cho form login
}