<?php

namespace Route\Mvc\controllers;

use Route\Mvc\core\basecontroller;
use Route\Mvc\core\mail;
use Route\Mvc\models\OrderModel;
use Route\Mvc\models\UserModel;
use Rakit\Validation\Validator;

class orderController extends basecontroller{
    public function index()
    {
        session_start();
        if(isset($_SESSION['username']) && $_SESSION['role_id'] == 1)
        {
            $this->view("admin/dashboard"); 
        }else{
            header('location:../../public/home/index');
        }
    }

    public function orders()
    {
        session_start();
        if(isset($_SESSION['username']) && $_SESSION['role_id'] == 1)
        {
            $order = new OrderModel();
            $orders=  $order->getAllOrders();
            $this->view("admin/orders/orders",['orders' => $orders]); 
        }elseif(isset($_SESSION['username']) && $_SESSION['role_id'] == 2){
            header('location:../../public/orderController/currentOrders');
        }else{
            header('location:../../public/home/index');
        }
    }

    public function previousOrders()
    {
        session_start();
        if(isset($_SESSION['username']) && $_SESSION['role_id'] == 2)
        {
            $order = new OrderModel();
            $orders =  $order->getAllOrdersCond(2,$_SESSION['user_id']); 
            $this->view("users/orders",['orders' => $orders]); 
        }else{
            $this->view("auth/login");
        }  
    }

    public function currentOrders()
    {
        session_start();
        if(isset($_SESSION['username']) && $_SESSION['role_id'] == 2)
        {
            $order = new OrderModel();
            $orders =  $order->getAllOrdersTwoCond(0,1,$_SESSION['user_id']); 
            $this->view("users/orders",['orders' => $orders]); 
        }else{
            $this->view("auth/login");
        } 
    }


    public function cancelledOrders()
    {
        session_start();
        if(isset($_SESSION['username']) && $_SESSION['role_id'] == 2)
        {
            $order = new OrderModel();
            $orders =  $order->getAllOrdersCond(3,$_SESSION['user_id']); 
            $this->view("users/orders",['orders' => $orders]); 
        }else{
            $this->view("auth/login");
        }  
    }

    public function cancelReason()
    {
        session_start();
        if(isset($_SESSION['username']) && $_SESSION['role_id'] == 2)
        {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $validator = new Validator;

                $validation = $validator->validate($_POST, ['cancelReason' => 'required|min:10',]);
                
                if ($validation->fails()) {
                    // handling errors
                    $errors = $validation->errors();
                    echo "<pre>";
                        print_r($errors->firstOfAll());
                    echo "</pre>";
                    exit;
                } else {
                    $userOb = new UserModel();
                    $cancelReason = new OrderModel();
                    $user = $userOb->selectByData('id',$_POST['user_id']);
                    $id = $_POST['order_id'];
                    $cancelReason->updateOrder(['cancel_reason' =>$_POST['cancelReason'],"order_status" => 3],$id);
                    
                    $ob = new mail();
                    $title = "Order Cancelled";
                    $body = '<p style= "font-size:20px;" >Hi '.$_SESSION['username'].'! You Cancelled Your Order.</p>';
                    $ob->send($user['email'],$user['username'],$title,$body);

                    // Redirect
                    header('location:../../public/authController/login');
                }
        }}
        else{
            $this->view("auth/login");
        }
    }

    public function proceed()
    {
        session_start();
        if(isset($_SESSION['username']) && $_SESSION['role_id'] == 2)
        {
            $this->view("users/payment");
        }
        else{
            header('location:../../public/authController/login');
        }
    }
}