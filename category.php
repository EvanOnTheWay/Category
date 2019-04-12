/**
 * 无限极分类
 * @param array $list
 * @param Int $pid
 * @return array
 */
function category(Array $list , Int $pid = 0) {
    $tree = array();
    foreach($list as $key => $val){
        if($val['parent_id'] == $pid){
            //获取当前$pid所有子类
            unset($list[$key]);
            if(! empty($list)){
                $child = $this->category($list,$val['id']);
                if(!empty($child)){
                    $val['_child'] = $child;
                }
            }
            $tree[]=$val;
        }
    }
    return $tree;
}
