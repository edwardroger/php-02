<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../config/database.php');

class AuthController
{
    protected $db;

    /**
     * Hàm constructor được khởi tạo
     * khi class AuthController được gọi tới
     */
    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * Login function
     *
     * @param array $request
     * @return array
     */
    public function login(array $request = [])
    {
        $email = $request['email'];
        $passWord = $request['password'];
        $query = "SELECT * FROM users
            WHERE email = '$email'
            AND password = '$passWord'
            LIMIT 1";
        $result = $this->db->select($query);
        
        return $result->fetch_assoc();
    }
}