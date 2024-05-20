<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../config/database.php');
include_once($filepath . '/../config/session.php');

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
        $passWord = md5($request['password']);
        $query = "SELECT * FROM users
            WHERE email = '$email'
            AND password = '$passWord'
            LIMIT 1";
        $result = $this->db->select($query);
        if ($result) {
            $account = $result->fetch_assoc();
            Session::set('login', true);
            Session::set('email', $account['email']);
            Session::set('name', $account['username']);

            return 'Dang nhap thanh cong';
        }
        return 'Dang nhap that bai';
    }

    /**
     * Register function
     *
     * @param array $request
     * @return void
     */
    public function register(array $request = [])
    {
        $result = [];
        $email = $request['email'];
        $password = $request['password'];
        $confirmPassword = $request['confirm_password'];
        //Validate form
        if ($password !== $confirmPassword) {
            $result['errors']['confirm_password'] = '2 mat khau khong khop nhau.';
        }
        if ($email == '') {
            $result['errors']['email'] = 'Email khong duoc de trong';
        }
        if (strlen($email) > 50) {
            $result['errors']['email'] = 'Email vuot qua 50 ky tu';
        }
        if ($password == '') {
            $result['errors']['password'] = 'Password khong duoc bo trong';
        }
        $password = md5($password);
        $checkEmailQuery = "SELECT email FROM users WHERE email = '$email'";
        $checkResult = $this->db->select($checkEmailQuery);
        if ($checkResult) {
            $result['errors']['email'] = 'Email da ton tai';
        }
        if (isset($result['errors'])) {
            return $result;
        }
        $insertQuery = "INSERT INTO users (username, password, email)
            VALUES ('', '$password', '$email')";
        $resultQuery = $this->db->insert($insertQuery);
        if ($resultQuery) {
            $result['response'] = 'Insert thanh cong';
        } else {
            $return['response'] = 'Insert that bai';
        }

        return $result;
    }
}

//Bài tập:
// Tạo trang homepage
// Sau khi login thành công, chuyển trang về trang homepage.
// - Nếu đã tồn tại session login,
// user replace url trực tiếp về trang login
// => đẩy lại về trang homepage.