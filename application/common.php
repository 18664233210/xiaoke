<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
if(!function_exists('get_tree')){
    /*
    *数据格式化
    *$data array 被格式化的数据
    *$id int 指定寻找哪一个分类下的子分类
    *$lev int 层次
    */
    function get_tree($data,$id = 0,$lev = 0){
        static $list =[];//保存最终结果
        foreach($data as $value){
            if($value['parent_id'] == $id){
                $value['lev'] = $lev;
                $list[] = $value;
                get_tree($data,$value['id'],$lev+1);
            }
        }
        return $list;
    }
}
