<?php
/**
 * Created by PhpStorm.
 * User: wwt
 * Date: 2018/9/4
 * Time: 18:06
 */
$imgData = $_REQUEST['images'];
if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $imgData, $result)){
    $type = $result[2];
    $rand = rand(1000,9999);
    $new_file = 'uploads/'.$rand.'.'.$type;
    if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $imgData)))){
        echo json_encode(['code'=>1,'msg'=>'上传成功','data'=>['url'=>$new_file]]);

    }else{
        echo json_encode(['code'=>0,'msg'=>'上传失败']);
    }
    exit;
}

?>