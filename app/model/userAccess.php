<?php
    require 'app/model/database.php';
    require 'app/model/user.php';

    class UserAccess extends Database {
        public static function getAll() {
            $collection = array();
            $testcoll = array();
            $query = self::query('SELECT * FROM UTILISATEUR');

            foreach($query as $rows) {
                $collection[$rows['id_USER']] = new User($rows['id_USER'], $rows['username_USER'], $rows['password_USER'], $rows['mail_USER'], $rows['money_USER'], $rows['isAdmin_USER']);
            }

            return $collection;
        }

        public static function getUserByMail($mail) {
            $prepare = self::prepare('SELECT * FROM UTILISATEUR WHERE mail_USER = :mail', array(':mail' => $mail));
             
            return new User($prepare[0]['id_USER'], $prepare[0]['username_USER'], $prepare[0]['password_USER'], $prepare[0]['mail_USER'], $prepare[0]['money_USER'], $prepare[0]['isAdmin_USER']);
        }

        public static function getUserByMailAndPassword($mail, $password) {
            $prepare = self::prepare('SELECT * FROM UTILISATEUR WHERE mail_USER = :mail AND password_USER = :password', array(':mail' => $mail, ':password' => $password));

            if(!empty($prepare)) {
                return new User($prepare[0]['id_USER'], $prepare[0]['username_USER'], $prepare[0]['password_USER'], $prepare[0]['mail_USER'], $prepare[0]['money_USER'], $prepare[0]['isAdmin_USER']);
            }
        }

        public static function getUserByMailAndUsernamee($mail, $username) {
            $prepare = self::prepare('SELECT * FROM UTILISATEUR WHERE mail_USER = :mail AND username_USER = :username', array(':mail' => $mail, ':username' => $username));
            
            return new User($prepare[0]['id_USER'], $prepare[0]['username_USER'], $prepare[0]['password_USER'], $prepare[0]['mail_USER'], $prepare[0]['money_USER'], $prepare[0]['isAdmin_USER']);
        }

        public static function getUserByMailOrUsername($mail, $username) {
            $prepare = self::prepare('SELECT mail_USER, username_USER FROM UTILISATEUR WHERE mail_USER = :mail OR username_USER = :username', array(':mail' => $mail, ':username' => $username));
            $collection = array();

            if(!empty($prepare)) {
                $collection = array('mail_USER' => $prepare[0]['mail_USER'], 'username_USER' => $prepare[0]['username_USER']);
            }

            return $collection;
        }

        public static function registerUser($mail, $username, $password) {
            $prepare = self::request('INSERT INTO UTILISATEUR(username_USER, mail_USER, password_USER, money_USER, isAdmin_USER) VALUES (:username, :mail, :password, 15000, false)', array(':username' => $username, ':mail' => $mail, ':password' => $password));
        }
    }
//(`id_USER`, `username_USER`, `mail_USER`, `password_USER`, `money_USER`, `isAdmin_USER`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]')
?>