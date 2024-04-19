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
        // $email = $request['email'];
        // $password = $request['password'];

        // if (
        //     $email == $this->user['email']
        //     && $password == $this->user['password']
        //     ) {
            
        //     return 'Login successful';
        // }

        // return 'Login failure';

        return 'login';
    }

    // bài tập: 
    // Tạo hàm xử lý validate cho form login
}