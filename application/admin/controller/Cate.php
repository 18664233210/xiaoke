<?php
namespace app\admin\controller;
use think\Request;

//分类控制器

class Cate extends Common
{
    //分类添加
    public function add(Request $request)
    {
        $model = model('cate');
        if($request->isGet()){
            //查询所有分类数据
            $list = $model -> getCateTree();
            //为模板分配数据
            $this->assign('cate',$list);
            return $this->fetch();
        }
        //接收数据
        $postdata = input();
        //写入数据
        $res = $model -> isUpdate(false) -> save($postdata);
        if($res === false){
            $this->error('写入错误');
        }
        $this -> success('写入成功');
    }
    
    //删除
    public function remove()
    {
        //接收要被删除的分类ID
        $cate_id = input('id/d',0);
        //获取模型对象
        $model = model('Cate');
        //调用自定义方法删除
        $res = $model -> remove($cate_id);
        if($res === FALSE){
            $this -> error($model->getError());
        }
        
        $this->success('ok');
    }
    //编辑
    public function edit(Request $request)
    {
        $model = model('Cate');
        if($request->isGet()){
            //查询当前的分类数据
            $info = $model -> get(input('id'));
            $this -> assign('info',$info);
            //查询所有分类数据
            $list = $model -> getCateTree();
            $this -> assign('list',$list);
            return $this -> fetch();
        }
    }
    
}