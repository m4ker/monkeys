# monkeys

这是monkeys本次开发参加hackathon 2015用的项目框架，采用laravel5.1。

请先确认本机环境是否满足laravel的运行环境。

检出之后请确认 storeage 目录有写入权限。

## 成员介绍

王默 makerwang#gmail.com

董红帅 663280439#qq.com

马莹 1977905246#qq.com

时晓冰 labsterx#gmail.com

刘潇 seanliu707#gmail.com

## laravel 简要入门

http://www.golaravel.com/laravel/docs/5.1

1. laravel 是一个高级框架，多数操作都有现成的命令，关于命令请参考 ./artisan list，查看命令帮助可以用命令 ./artisan help xxxx

2. 请先配置开发环境，主要配置文件在 /.env 中和 /config 目录中。

3. nginx 配置文件请参考 /nginx.conf

## controller的使用

1. 创建一个controller使用./artisan make:controller cname命令，会在app/Http/Controllers/里生成相应文件。

2. 想让action可访问需要配置app/Http/route.php

## model的使用

1. 使用model请先配置数据库 .env 和 config/database.php

2. 创建一个model可以使用 ./artisan make:model mname命令，会在app/下生成相应文件。

3. 在controller连接数据库需要先 use DB; 用法请参考 数据库小节。 

4. 使用ORM请参考 Eloquent ORM 小节。

## view 的使用

http://www.golaravel.com/laravel/docs/5.1/views/

## 项目简介

活动社交

标配 http://biaopei.org

组织者 / 组织机构 创建活动

参与者 登记 & 查看 参与同活动的人

有些来参加比赛的同学可能遇到了这样的问题：

    “有没团队缺前端？”

    “有没有前端来我们团队？”

    “有个妹子不错，要是有微信号就好了”

    ”想找几个志同道合的基友“

所以，就有了标配。

我们已经为hackathon2015创建了一个活动，欢迎大家扫码登记，让我们每一个人不再陌生。

## 应用场景

找队友

找工作

找员工

找对象

找到志同道合的伙伴

## 想象空间

解决报名的问题

微信授权

社交 群聊 留言

## 实例

黑客马拉松

hackathon2015_beijing

妹子，帅哥，IOS，PHP，Python，Android，前端，设计师，产品，硬件，C++，C，Ruby，Java，全栈，大叔