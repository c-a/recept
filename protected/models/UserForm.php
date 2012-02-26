<?php

/**
 * UserForm class.
 * UserForm is the data structure for keeping
 * user form data. It is used by the 'create' action of 'UserController'.
 */
class UserForm extends CFormModel {

    public $username;
    public $email;
    public $password;
    public $password2;
    public $captcha;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            // all fields are required.
            array('username, email, password, password2, captcha', 'required'),
            array('email', 'email'),
            array('password2', 'compare', 'compareAttribute' => 'password', 'message' => 'Lösenord måste repeteras exakt'),
            array('username', 'unique', 'className'=>'User'),
            //array('captcha', 'captcha'),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'username' => 'Användarnamn',
            'email' => 'E-post',
            'password' => 'Lösenord',
            'password2' => 'Repetera lösenord',
            'captcha' => 'Verifikationskod',
        );
    }

    public function createUser() {
        $user = new User;

        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);

        return $user->save();
    }

}

