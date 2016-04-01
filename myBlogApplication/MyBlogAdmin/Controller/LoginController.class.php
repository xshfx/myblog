<?php
namespace MyBlogAdmin\Controller;
use Think\Controller;

class LoginController extends Controller {

	public function index(){
		$this->display('Login/login');
	}
	
	/**
	 * [login 登录验证]
	 * @return [type] [description]
	 */
    public function login(){

    	//判断是否点击登录
    	if($_POST){
    		
    		$name = I('post.name');
    		$pwd  = I('post.pwd');

    		$data = D('user')->check($name,$pwd);
    		
    		if($data){

    			// echo '<script>window.location.href=""</script>'
    			$this->error($data);
    			
    		}else{

    			
    			$this->success('登录成功',U('Index/index'));
    			
    		}

    	}else{

    		$this->display('Login/login');
    	}
    }

    public function logout(){

        session(null);
        $this->display('Login/login');
    }
}