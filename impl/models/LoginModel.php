<?php

class LoginModel extends Model
{

    function __construct()
    {
        parent::__construct();
        //echo "Login_Model <br>";
    }

    public function auth()
    {

        $stmt = $this->db->prepare("SELECT id_user FROM users 
		WHERE username = :user AND password= :pass");
        $stmt->execute([':user' => $_POST['username'], ':pass' => $_POST['password']]);
        $count = $stmt->rowCount();
        if ($count > 0)
            return true;
        else
            return false;

    }

    public function verifyUser($email)
    {

        $stmt = $this->db->prepare("SELECT rank FROM users where email = :email");
        $stmt->execute([':email' => $email]);
        if ($stmt->rowCount() > 0) {
            $rank = $stmt->fetch();
            return $rank;
        }
        return null;
    }

    public function registerUser($email, $name, $picture, $id)
    {
        $this->db->beginTransaction();
        try {
            $this->db->exec("INSERT INTO users(email,username,picture,id) VALUES('$email','$name','$picture','$id')");
            $this->db->commit();
        }
        catch(PDOException $e){
            $this->db->rollBack();
            echo $e->getMessage();
        }
    }

}