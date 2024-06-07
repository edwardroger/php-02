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

    /**
     * List category
     *
     * @return void
     */
    public function list()
    {
        $query = "SELECT * FROM categories";
        $result = $this->db->select($query);

        return $result;
    }

    /**
     * Create category
     *
     * @param array $request
     * @return string
     */
    public function create(array $request = [])
    {
        $response = [];
        $categoryName = $request['category_name'];
        $description = $request['description'];
        $status = isset($request['status']) ? 1 : 0;
        //Validate
        if ($request['category_name'] == '') {
            $response['error']['category_name'] = 'Khong duoc bo trong ten danh muc';
        }

        $insertQuery = "INSERT INTO categories (name, status)
            VALUES('$categoryName', '$status')";
        $result = $this->db->insert($insertQuery);
        if ($result) {
            $response['response']['success'] = 'Tao moi danh muc thanh cong';
            return $response;
        }
        //Bài tập:
        // In ra màn hình message khi submit form create category
        $response['response']['error'] = 'Tao moi that bai';
        return $response;
    }

    /**
     * Undocumented function
     *
     * @param integer|null $id
     * @return array
     */
    public function destroy(?int $id)
    {
        $response = [];
        $query = "DELETE FROM categories WHERE id ='$id'";
        $result = $this->db->delete($query);
        if ($result) {
            $response['response']['success'] = 'Xoa danh muc thanh cong';
            return $response;
        }
        //Bài tập:
        // In ra màn hình message khi submit form create category
        $response['response']['error'] = 'Xoa that bai';
        return $response;
    }

    /**
     * Show category
     *
     * @param string $id
     * @return void
     */
    public function show(string $id = '')
    {
        $query = "SELECT * FROM categories WHERE id = '$id'";
        $result = $this->db->select($query);

        return $result->fetch_assoc();
    }

    /**
     * Update category
     *
     * @param array $request
     * @param string $id
     * @return void
     */
    public function update(array $request = [], string $id = '')
    {
        $name = $request['name'];
        $status = $request['status'];
        $query = "UPDATE categories SET name = '$name', status = '$status'
            WHERE id = '$id'";
    }
}