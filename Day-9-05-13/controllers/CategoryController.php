<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../config/database.php');

class CategoryController
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

    public function list()
    {
        
    }

    /**
     * Create category
     *
     * @param array $request
     * @return string
     */
    public function create(array $request = [])
    {
        $categoryName = $request['category_name'];
        $description = $request['description'];
        $status = isset($request['status']) ? 1 : 0;
        //Validate

        $insertQuery = "INSERT INTO categories (name, status)
            VALUES('$categoryName', '$status')";
        $result = $this->db->insert($insertQuery);
        if ($result) {
            return 'Create success';
        }
        //Bài tập:
        // In ra màn hình message khi submit form create category
        return 'Create fail';
    }
}