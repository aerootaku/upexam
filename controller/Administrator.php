<?php
define('ROOT_DIR', dirname(__FILE__));
define('ROOT_URL', substr($_SERVER['PHP_SELF'], 0, - (strlen($_SERVER['SCRIPT_FILENAME']) - strlen(ROOT_DIR))));
session_start();

include ROOT_DIR. '/../system/config.php';


$DB_con = db_connect();

$customer = new Administrator($DB_con);

class Administrator
{
    private $db;

    function __construct($DB_con)
    {
        $this->db = $DB_con;
    }

    public function getCustomersTotal()
    {
        $total_customer = db_count_all('tbl_customers');

        return $total_customer;
    }

    public function getAllCustomers()
    {
        $total_customer = db_select('tbl_customers')->fetch();

        return $total_customer;
    }

    public function createCustomer($data)
    {

        try {
            //

            array(
                'customer_no' => rand_string(10),
                'username' => $data['username'],
                'password' => password_hash($data['password'], PASSWORD_DEFAULT),
                'firstname' => $data['firstname'],
                'middlename' => $data['middlename'],
                'lastname' => $data['lastname'],
                'birthdate' => $data['birthdate'],
                'age' => calculate_age($data['birthdate']),
                'gender' => $data['gender'],
                'address' => $data['address'],
                'email' => $data['email'],
                'contact' => $data['contact'],
                'zip_code' => $data['zip_code']
            );

            db_insert('tbl_customers', $data);

            $notification = array(
                'message' => 'customer created successfully',
                'type' => 'success',
            );

            return json_encode($notification);
        } catch (\Exception $e) {

            $notification = array(
                'message' => $e->getMessage(),
                'type' => 'danger',
            );

            return json_encode($notification);
        }
    }

    public function redirect($url)
    {
        header("Location: $url");
    }

}