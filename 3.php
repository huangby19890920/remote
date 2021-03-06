<?php

//连接localhost:27017
$conn = new Mongo();
//连接远程主机默认端口
$conn = new Mongo('test.com');
//连接远程主机22011端口
$conn = new Mongo('test.com:22011');
//MongoDB有用户名密码
$conn = new Mongo("mongodb://{$username}:{$password}@localhost")
//MongoDB有用户名密码并指定数据库blog
$conn = new Mongo("mongodb://{$username}:{$password}@localhost/blog");
//多个服务器
$conn = new Mongo("mongodb://localhost:27017,localhost:27018");
//选择数据库blog
echo "这是我再2016年3月3日14:41:16加的一样";
$db = $conn->blog;
//制定结果集（表名：users）
$collection = $db->users;
//新增
$user = array('name' => 'caleng', 'email' => 'admin#admin.com');
$collection->insert($user);
echo "这是我添加2016年3月3日15:01:52的一行 the third commit";
//修改
$newdata = array('$set' => array("email" => "test@test.com"));
$collection->update(array("name" => "caleng"), $newdata);
//删除
$collection->remove(array('name'=>'caleng'), array("justOne" => true));
//查找
$cursor = $collection->find();
var_dump($cursor);
//查找一条
$user = $collection->findOne(array('name' => 'caleng'), array('email'));
var_dump($user);
echo "这又是我加的一行";
//关闭数据库
$conn->close();
?>