7ktest
======
根目录下几个文件：
建立7ktest数据库，在库中运行newest - 7ktest.sql文件
database.php拷贝到application/config文件夹下，并更改配置
config.php拷贝到application/config文件夹下，并更改配置
htaccess拷贝到根目录改名为.htaccess
开启Apache的url_rewrite module
根目录下创建uploads目录
打开http://localhost/7ktest


数据库说明
=======
ci_sessions		ci框架中cart内置方法使用的暂存session信息表
delivertask		印单送印任务信息表
document		用户上传的文件信息表
favorite		用户收藏的店铺，文档信息表
message			留言板留言信息表
printer 		打印店基本信息表
printer_meta	打印店业务，费用详细设置信息表
printtask		印单任务信息表
rating			用户对打印店，特色资料的评价信息表
reply			留言板回复信息表
specialdoc		特色资料的信息表
transaction		充值，消费信息表
user			用户基本信息表
