<?php
require_once(dirname(__FILE__)."/../logic/fetchJSON.php");
class LogInUser{

    //properties
    private $email, $password; 
    public $userData, $usersDataFile;
    public $errors = array( 'email' => '', 'password' => '');
    
    function __construct($email, $password)
    {
        $this->userData = get_users();
        $this->email = strtolower(trim($email));
        $this->password = $password;
        $this->login();
    }

    private function login(){
        foreach($this->userData as $user){
            if($user['Email'] == $this->email){
                if(password_verify($this->password, $user['Password'])){
                    session_start();
                    $_SESSION['email'] = $this->email;

                    //------------test zone--------------

                    $_SESSION['fName'] = $user['First_Name'];
                    $_SESSION['lName'] = $user['Last_Name'];

                    //------------test zone--------------
                    header("location: dashboard.php");
                    exit();
                }
            }
        }

        return $this->errors['password'] = "Wrong username or password";
    }
    


    // getters
    public function getEmail()
    {
        return $this->email;
    }
}

?>