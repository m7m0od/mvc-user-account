<?php

namespace Route\Mvc\controllers;

use Route\Mvc\core\basecontroller;
use Route\Mvc\core\mail;
use Route\Mvc\models\UserModel;
use Route\Mvc\models\AddressModel;
use Rakit\Validation\Validator;


class authController extends basecontroller{

    // signUp View
    public function signUp(){
        session_start();
        if(isset($_SESSION['username']))
        {
            header('location:../../public/authController/profile');
        }else{
        $this->view("auth/sign");}
    }

    // signUp action
    public function signUpAction()
    {
        session_start();
        if(isset($_SESSION['username']))
        {
            header('location:../../public/authController/profile');
        }else{
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            { 
                // connection
               
                $newUser = new UserModel();
                $adress = new AddressModel();
                
                //check if exist 
                $uniqueUser = $newUser->find('username',$_POST['username']);

                if($uniqueUser > 0)
                {
                    echo "This user is already Exist";
                }else{
                
                    $validator = new Validator;

                    $validation = $validator->validate($_POST, [
                        'username' => 'required',
                        'email'    => 'required|email',
                        'address' => 'required',
                        'password' => 'required|min:6',
                        'confirm_password' => 'required|same:password',
                    ]);
                    
                    if ($validation->fails()) {
                        // handling errors
                        $errors = $validation->errors();
                        echo "<pre>";
                            print_r($errors->firstOfAll());
                        echo "</pre>";
                        exit;
                    } else {
                        $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
                        $data = [
                            'username' => $_POST['username'],
                            'email' => $_POST['email'],
                            'password' => sha1($_POST['password']),
                            'verify_code' => $verification_code,
                            'role_id' => 2,
                        ];
                        $newUser->create($data);
                        $user_id = $newUser->selectUserId($_POST['username']);
                        //multi address 
                        foreach($_POST['address'] as $adr)
                        {
                            $dataAdress = [
                                'address' => $adr,
                                'user_id' => $user_id['id'],
                            ];
                            $adress->create($dataAdress);
                        }
                    
                        // send verify
                        $mail = new mail();
                        $title = "Email verification";
                        $body = '<p style= "font-size:20px;" >Hi '.$_POST['username'].'! Your verification code is <b style="font-style: italic;font-size: 25px;">' . $verification_code . '</b></p>';
                        $mail->send($_POST['email'],$_POST['username'],$title,$body);

                        // Redirect
                        header('location:../../public/authController/verifyView');
                    }   
                }
            }
        }
    }

    // login View
    public function login(){
        session_start();
        if(isset($_SESSION['username']))
        {
            header('location:../../public/authController/profile');
        }else{
        $this->view("auth/login");}
    }

    // login action
    public function loginAction()
    {
        session_start();
        if(isset($_SESSION['username']))
        {
            header('location:../../public/authController/profile');
        }else{
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            { 
                $validator = new Validator;

                $validation = $validator->validate($_POST, [
                    'username' => 'required',
                    'password' => 'required|min:6',
                ]);
                
                if ($validation->fails()) {
                    // handling errors
                    $errors = $validation->errors();
                    echo "<pre>";
                        print_r($errors->firstOfAll());
                    echo "</pre>";
                    exit;
                } else {
                    $username = $_POST['username'];
                    $password = sha1($_POST['password']);
                
                    $ifExist = new UserModel();
                    $affectedRows = $ifExist->findLogin('username',$username,'password',$password);
                    $user = $ifExist->selectByData('username',$_POST['username']);

                    if($affectedRows > 0 && $user['email_verify_at'] != NULL )
                    {
                        $user = $ifExist->getUser($username,$password);
                        
                        $_SESSION['username']=$user['username'];
                        $_SESSION['role_id'] = $user['role_id'];
                        $_SESSION['user_id'] = $user['id'];

                        if($user['role_id']==1){
                            header('location:../../public/orderController/index');
                        }elseif($user['role_id']==2){
                            header('location:../../public/authController/profile');
                        }else{
                            $this->view("index");
                        }
                    }else{
                        echo "This is not Exist";   
                    }
                }
            }
        }
    }

    public function profile(){
        $this->view("users/userProfile");
    }

    // login View
    public function verifyView(){
        session_start();
        if(isset($_SESSION['username']))
        {
            header('location:../../public/authController/profile');
        }else{
            $this->view("auth/verify");
        }
    }

    public function verify()
    {
        session_start();
        if(isset($_SESSION['username']))
        {
            header('location:../../public/authController/profile');
        }else{
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $validator = new Validator;
                $validation = $validator->validate($_POST, ['verify_code' => 'required',]);
                
                if ($validation->fails()) {
                    // handling errors
                    $errors = $validation->errors();
                    echo "<pre>";
                        print_r($errors->firstOfAll());
                    echo "</pre>";
                    exit;
                } else {
                    
                    $userVerify = new UserModel();
                    $verify_code = $userVerify->selectByData('verify_code',$_POST['verify_code']);
            
                    if($verify_code['verify_code'] == $_POST['verify_code'] && $verify_code['email_verify_at'] == NULL)
                    {
                        $userVerify = new UserModel();
                        $id = $verify_code['id'];
                        $userVerify->updateUser(['email_verify_at' =>date("Y-m-d H:i:s")],$id);

                        $ob = new mail();
                        $title = "Welcome Email";
                        $body = '<p style= "font-size:20px;" >Hi '.$verify_code['username'].'! On behalf of our company, I would like to officially welcome you as a new customer of our business. We value your support and contribution to our business, and we trust that your experience with our business will bring you the utmost satisfaction.</p>';
                        $ob->send($verify_code['email'],$verify_code['username'],$title,$body);
    
                        // Redirect
                        header('location:../../public/authController/login');

                    }else{
                        // error message
                        header('location:../../public/home/index');
                    }
                }
            }
        }
    }

    // logOut action
    public function logOut(){
        session_start();
        if(isset($_SESSION['username'])){
            unset($_SESSION['username']);
            header("location:../../public/home/index");
            exit();
        }
     }
}