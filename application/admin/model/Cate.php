<?php
namespace app\admin\model;
use think\Model;

//分类模型
class Cate extends Common
{
    //获取分类数据
    public function getCateTree()
    {
        //查询所有分类数据
        $cate = $this -> all();
        //调用公共函数对数据格式化
        $list = get_tree($cate);
        return $list;
    }
    //删除数据
    public function remove($cate_id)
    {
        //判断是否存在子分类
        if($this -> get(['parent_id' => $cate_id])){
            //存在子分类
            $this->error='存在子分类不能直接删除！';
            return FALSE;
        }
        //直接删除
        $this->destroy($cate_id);
    }
}