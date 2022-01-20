<?php

class User {

    
function signup($post)
{
        // unset($_POST);
        $error = "";
        $user = false;
        //date
        $user['date'] = date("Y-m-d H:i:s");

        // validate the first name
        $user['first_name'] = $post['first_name'];
        if(isset($post['first_name']) && $post['first_name'] != ''){
            if(!preg_match("/^[a-z A-Z]*$/",$post['first_name'])) 
                {
                    $error .= 'please enter a valid first name <br>' ;
                }
        }else{
            $erro .="please enter a first name <br>";
        }

        // validate the last name
        $user['last_name'] = $post['last_name'];
        if(isset($post['last_name']) && $post['last_name'] != ''){
            if(!preg_match("/^[a-z A-Z]*$/",$post['last_name'])) 
                {
                    $error .= 'please enter a valid last name <br>' ;
                }
        }else{
            $erro .="please enter a last name <br>";
        }

        //validate the email
        $user['email'] = $post['email'];
        if(isset($post['email']) && $post['email'] != '')
        {
            if(!filter_var($post['email'], FILTER_VALIDATE_EMAIL)){
                $error .= "please enter a valid email <br>";
            }
        }else {
            $error .= "please enter email <br>";
        }

        //validate the possword
        $user['password'] = $post['password'];
        if(isset($post['password']) && isset($post['password']) && $post['password'] != "")
        {
            if(strlen($post['password']) < 7)
            {
                $error .= "password is short <br>";
            }
            if($post['password'] != $post['password2'])
            {
                $error .= "passwords doese not match <br>";
            }
        }else {
            $error .= "pleasse enter a password <br>";
        }
        $user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);

        $user['userid'] = get_random_string_max(60);
        if($error == ''){

            $this->upload($user);
        }else {
            return $error;
        }
}

public function login($post)
{
    $error = "";
    //collecting data;
    
    if(empty($post['email']))
    {
        $error .="Please enter an email <br>";
    }
    if(empty($post['password']))
    {
        $error .= "Please enter a password <br>";
    }
    if($error == "")
    {
        $user['email'] = $post['email'];
        //check if the user exists in the database;
        $DB = new Database();
        $query = "SELECT * FROM users WHERE email=:email";
        $user_data = $DB->read($query, $user);
        
     
            if(is_array($user_data))
            {
                $user_data = $user_data[0];
                if(password_verify($post['password'],$user_data->password))
                {
                    $_SESSION['userid'] = $user_data->userid;
                    $_SESSION['first_name'] = $user_data->first_name;
                    return true;
                }else {
                    $error .= "wrong password <br>";
                }
            }
            else {
                $error .= "wrong email <br>";
            }
        
    }
    return $error;
}
private function upload($user)
{
        // $fromEmail = "crazyboy@gmail.com";
        // $message = "this is a message";
        // $to = "nedjmonettari@gmail.com";
        // $subject = "sending an email";
        // $headers = "MIME-Version: 1.0" . "\r\n";
        // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        // $headers .= 'From: '.$fromEmail.'<'.$fromEmail.'>' . "\r\n".'Reply-To: '.$fromEmail."\r\n" . 'X-Mailer: PHP/' . phpversion();
        // $message = '<!doctype html>
        //         <html lang="en">
        //         <head>
        //             <meta charset="UTF-8">
        //             <meta name="viewport"
        //                 content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        //             <meta http-equiv="X-UA-Compatible" content="ie=edge">
        //             <title>Document</title>
        //         </head>
        //         <body>
        //         <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">'.$message.'</span>
        //             <div class="container">
        //             '.$message.'<br/>
        //                 Regards<br/>
        //             '.$fromEmail.'
        //             </div>
        //         </body>
        //         </html>';

        // $result = @mail($to, $subject, $message, $headers);

        // $mail = mail($to, $subject, $message, $headers);
        // if($mail){
        //     echo "email sent";die;
        // }else{
        //     echo "email doesn't sent";die;
        // }
        $DB = new Database();
        $query = "INSERT INTO users (userid, first_name, last_name, email, password, date) VALUES(:userid, :first_name, :last_name, :email, :password, :date)";
        $write = $DB->write($query, $user);
        if($write)
        {
            header("location: " . ROOT . "login");
        }
 }

 public function get_single_image($url_address)
 {
     $DB = new Database();
     $arr['userid'] = $_SESSION['userid'];
     $query = "SELECT * FROM images WHERE userid = :userid limit 1";
     $data = $DB->read($query, $arr);
     return $data[0];
 }


 public function is_logged_in()
 {
     if(isset($_SESSION['userid']) )
     {
         return true;
     }
     return false;
 }
}
