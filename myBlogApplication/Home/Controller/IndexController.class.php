<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        // echo 'a';exit;
    	//加载博客首页
    	$this->display('Index/index');
    }

    public function login(){


    	if(IS_POST){

    		$username = I('regName');

    		if( $username =='admin'){
    			$this->success('用户名已经被占用',U('Index/login'),5);
    		}
    	}else{
    		$this->display('Index/login');
    	}
    }
}
