# monkeys

这是4 monkeys本次开发用的项目框架，采用laravel5.1。

请先确认本机环境是否满足laravel的运行环境。

检出之后请确认 storeage 目录有写入权限。


## laravel 简要入门

http://www.golaravel.com/laravel/docs/5.1

1. laravel 是一个高级框架，多数操作都有现成的命令，关于命令请参考 ./artisan list，查看命令帮助可以用命令 ./artisan help xxxx

2. 请先配置开发环境，主要配置文件在 /.env 中和 /config 目录中。

3. nginx 配置文件请参考 /nginx.conf

## controller的使用

1. 创建一个controller使用./artisan make:controller cname命令，会在app/Http/Controllers/里生成相应文件。

2. 想让action可访问需要配置app/Http/route.php

## model的使用

1. 创建一个model可以使用 ./artisan make:model mname命令，会在app/下生成相应文件。

2. 在controller连接数据库需要先 use DB; 用法请参考 数据库小节。 

3. 使用ORM请参考 Eloquent ORM 小节。

## view 的使用

http://www.golaravel.com/laravel/docs/5.1/views/

