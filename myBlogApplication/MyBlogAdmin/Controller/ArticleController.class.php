<?php
namespace MyBlogAdmin\Controller;
use Think\Controller;
class ArticleController extends CommenController {

	/**
	 * [index 文章列表]
	 * @return [type] [description]
	 */
	public function articleList(){

		$data = M('article')->select();
		$count = M('article')->count();	

		// dump($data);

		$this->assign('list',$data);
		$this->assign('count',$count);
		$this->display('Article/list');
	}

	/**
	 * [add 添加新文章]
	 */
	public function addArticle(){

		if(IS_POST){

			// dump($_POST);exit;
			$title   = I('post.title');
			$content = I('post.content');

			// 判断内容是否为空
			if(!empty($title) && !empty($content)){
				
				//组装数据	
				$data['title']   = $title;
				$data['content'] = $content;
				$data['addtime'] = time();

				//执行
				$addres = M('article')->data($data)->add();

				// echo M('article')->getLastSql();
				if($addres){
					$this->success('添加成功',U('Article/index'));
				}else{
					$this->error('添加失败');
				}

			}else{

				$this->error('文章不能为空');
			}
		}else{
			$this->display();
		}
		
	}

	/**
	 * [edit 编辑文章]
	 * @return [type] [description]
	 */
	public function edit(){

		$id = I('get.id');

		if(IS_POST){

			$data['title']   = I('post.title');
			$data['content'] = I('post.content');
			$data['addtime'] = time();

			M('article')->where("id=$id")->field($data)->save();
			// echo M('article')->getLastSql();
		}else{

			$data = M('article')->where("id=$id")->find();
			dump($data);
			$this->assign('title',$data['title']);
			$this->assign('content',$data['content']);
			$this->display();
		}
		
	}


	/**
	 * [del 删除文章]
	 * @return [type] [description]
	 */
	public function del(){

		$id = I('get.id');

		$data = M('article')->where("id=$id")->delete();

		if($data){
			
			$this->ajaxReturn($data);
		}
		
	}
}