<?php
namespace MyBlogAdmin\Controller;
use Think\Controller;
class IndexController extends CommenController {
	
    public function index(){
    	// echo 'this is firstpage';
    	$this->display('Index/index');

    }



}