<?php
define('ROOT_DIR', dirname(__FILE__));
define('ROOT_URL', substr($_SERVER['PHP_SELF'], 0, - (strlen($_SERVER['SCRIPT_FILENAME']) - strlen(ROOT_DIR))));
session_start();

include ROOT_DIR. '/../system/config.php';


$DB_con = db_connect();

$action = new Authentication($DB_con);

class Authentication
{
    private $db;

    private $customer;

    function __construct($DB_con)
    {
        $this->db = $DB_con;
    }

    public function login($username, $password)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM tbl_users WHERE username=:username LIMIT 1");
            $stmt->execute(array(':username' => $username));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() > 0) {
                if (password_verify($password, $row['password'])) {
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['firstname'] = $row['firstname'];
                    $_SESSION['middlename'] = $row['middlename'];
                    $_SESSION['lastname'] = $row['lastname'];
                    $_SESSION['declared'] = $row['password'];
                    $_SESSION['role'] = $row['role'];

                    $this->redirect('dashboard.php');
                }
                else {
                    return false;
                }

            } else {
                return false;
                //
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function loginCustomer($username, $password)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM tbl_customers WHERE username=:username LIMIT 1");
            $stmt->execute(array(':username' => $username));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() > 0) {
                if (password_verify($password, $row['password'])) {
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['firstname'] = $row['firstname'];
                    $_SESSION['middlename'] = $row['middlename'];
                    $_SESSION['lastname'] = $row['lastname'];
                    $_SESSION['declared'] = $row['password'];

                    $this->redirect('customers/');
                }
                else {
                    return false;
                }

            } else {
                return false;
                //
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function registerCustomer($data)
    {
        try {
            //

            db_insert('tbl_customers', [
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
            ]);

            return true;

        } catch (\Exception $e) {

            return false;
        }
    }

    public function is_loggedin()
    {
        if (isset($_SESSION['id'])) {
            return true;
        }
    }

    public function redirect($url)
    {
        header("Location: $url");
    }

    public function logout()
    {
        session_destroy();
        unset($_SESSION['id']);
        return true;
    }

}