<?php
namespace Entity;

class User
{

    private $id, $username, $email, $password, $role;



    /**
     * Get the value of idUser
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of idUser
     *
     * @return  self
     */ 
    public function setId($idUser)
    {
        $this->id = $idUser;

        return $this;
    }

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)):
       
            $this->email = $email;

        return $this;
        else:
                trigger_error('L\'email n\'est pas valide', E_USER_WARNING );
        endif;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {   
        if(strlen($password) >= 8){
        $mdp=password_hash($password, PASSWORD_DEFAULT);
        $this->password = $mdp;

        return $this;
        }else{

            echo 'Le mot de passe doit contenir un minimum de 8 caractères';
        }
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

}