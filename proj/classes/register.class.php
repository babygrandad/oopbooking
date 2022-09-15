<?php

class RegisterUser
{

    //properties
    private $lName, $fName, $email, $password, $encPassword, $userData, $newUser, $usersDataFile;
    public $errors = array('name' => '', 'surname' => '', 'email' => '', 'password' => '', 'registration' => '');
    public $test;

    function __construct($fName, $lName, $email, $password, $userData, $usersDataFile)
    {
        $this->fName =  strtolower(trim($fName));
        $this->lName = strtolower(trim($lName));
        $this->email = strtolower(trim($email));
        $this->usersDataFile = $usersDataFile;
        $this->userData = $userData;
        $this->password = trim($password);
        $this->encPassword = password_hash($this->password, PASSWORD_DEFAULT);

        $this->newUser = [
            'First_Name' => $this->fName,
            'Last_Name' => $this->lName,
            'Email' => $this->email,
            'Password' => $this->encPassword,
        ];

        $this->checkNameField();
        $this->checkSurnameField();
        $this->checkEmailField();
        $this->checkPasswordField();
        $this->checkEmailExist();
        $this->commitUser();
    }

    private function checkNameField()
    {
        if (empty($this->fName)) {
            $this->errors['name'] = "A name is required.";
            return false;
        } else {
            return true;
        }
    }

    private function checkSurnameField()
    {
        if (empty($this->lName)) {
            $this->errors['surname'] = "A surname is required.";
            return false;
        } else {
            return true;
        }
    }

    private function checkEmailField()
    {
        if (empty($this->email)) {
            $this->errors['email'] = "An email address is required.";
            return false;
        } else if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "Please enter a valid email address.";
            return false;
        } else {
            return true;
        }
    }

    private function checkEmailExist()
    {
        foreach ($this->userData as $user) {
            if ($this->email == $user['Email']) {
                $this->errors['email'] = "This Email Address already exists ";
                return false;
            }
        }
        return true;
    }


    // thers a validate password block of code commented out that needs a regular expression
    private function checkPasswordField()
    {
        if (empty($this->password)) {
            $this->errors['password'] = "A password is required";
            return false;
        } else {
            return true;
        }
        // else{
        //     if($this->password){
        //         $this->errors['password'] = "Password must meet the following requirements:at least 8 char, at least 1 special char, at least 1 uppercase, at least 1 lowercase.";
        //     }
        // }
    }

    private function commitUser()
    {
        if ($this->checkNameField() && $this->checkSurnameField() && $this->checkEmailField() && $this->checkEmailExist() && $this->checkPasswordField() != false) {

            array_push($this->userData, $this->newUser);
            if (file_put_contents($this->usersDataFile, json_encode($this->userData, JSON_PRETTY_PRINT))) {
                $this->setSession();
            } else {

                return $this->error['registration'] = "Your registration was unsuccesful. Please try again";
            };
        }
    }

    private function setSession(){
        session_start();

        $_SESSION['fName'] = $this->fName;
        $_SESSION['lName'] = $this->lName;
        $_SESSION['email'] = $this->email;
        $this->resetFields();
        header('location: dashboard.php');
    }

    private function resetFields(){
        $this->fName = '';
        $this->lName = '';
        $this->email = '';
    }


    //getters
    public function getFname()
    {
        return $this->fName;
    }

    public function getLname()
    {
        return $this->lName;
    }

    public function getEmail()
    {
        return $this->email;
    }
}

?>