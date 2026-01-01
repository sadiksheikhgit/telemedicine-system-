<?php

defined('ROOTPATH') OR exit('Access Denied! 403 Forbidden!'); // Prevent direct script access in controller route

class Home 
{
    use Controller;
    public function index()
    {
        $user = new User;
//        $arr['id'] = 1;
        $arr['name'] = "Shfiat Arman";
        $arr['email'] = "sa2@gmail.com";
        $arr['password'] = "12345";
//        $arr2['name'] = "arman";
//        $result = $model->where($arr);
//        $result = $model->insert($arr);
//        $result = $model->delete(13);
//        $result = $model->update(1, $arr);
        
//        $result = $user->insert($arr);
//        $result = $user->where(['id'=>16]);
        $result = $user->find_all();
//        show($result);
        // Load the home view
        $this->view('home');
    }

}
