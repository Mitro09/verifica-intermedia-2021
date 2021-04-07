<?php


class User {

    private $userID;
    private $firstName;
    private $lastName;
    private $birthday;
    private $email;


    public function getUserID(){
        return $this->userID;
    }

    public function setUserID($userID){
        $this->userID = $userID;
    }
    

    public function getFirstName(){
        return $this->firstName;
    }

    public function setFirstName($firstName){
        $this->firstName = $firstName;
    }


    public function getLastName(){
        return $this->lastName;
    }

    public function setLastName($lastName){
        $this->lastName = $lastName;
    }


    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getBirthday(){
        return $this->birthday;
    }

    public function setBirthday($birthday){
        $this->birthday = $birthday;
    }


    public function getAge(){
        $birthday = $this->birthday;
        $today = date("Y-m-d");
        $age = date_diff(date_create($birthday),date_create($today));
        return $age->format('%y');
    }

    public function isAdult(){
        $age = (int)$this->getAge();
        if($age >= 18){
            $result = "Maggiorenne";
            return $result;
        }
        else{
            $result = "Minorenne";
            return $result;
        }

    }

    public function sanitizeLastName(){
        $lastName = $this->getLastName();
        $lastNameLower = strtolower($lastName);
        $lastNameFirstUp = ucfirst($lastNameLower);
        return $lastNameFirstUp;
    }
}

