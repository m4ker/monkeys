<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>标配</title>

    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/css/agency.css?<?php echo time();?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

<!-- Navigation -->
<nav class="navbar navbar-default navbar-shrink navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" href="/"><img class="header-logo" src="/img/logo-white.png"/></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li>
                    <a class="page-scroll" href="/">首页</a>
                </li>
                <li>
                    <a class="page-scroll" href="/#contact">创建活动</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<section class="info_section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2 class="section-heading text-center">登记信息</h2>

                <h3 class="text-muted text-center">{{ $name }}</h3>

                <div class="form-div">
                    <div class="text-muted">请填写您的个人信息:</div>

                    <form name="userRegister" method="POST" action="/event/<?php echo $url; ?>/register">

                        <div class="form-group">
                            <label for="name">姓名</label>
                            <input type="name" name="name" class="input-text form-control" placeholder="姓名">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">联系方式</label>
                            <input type="text" name="contact" class="input-text form-control" placeholder="微信/手机/邮箱">
                        </div>

                        <div class="checkbox">
                            <div class="tag-label-txt"><strong>我的标签：</strong></div>
                            <?php
                            foreach ($tags as $tag) {
                            ?>
                            <label class="tag-checkbox">
                                <input type="checkbox" value="<?php echo $tag; ?>" name="tags[]"
                                       class="input-checkbox"><?php echo $tag; ?>
                            </label>
                            <?php
                            }
                            ?>
                        </div>

                        <div class="checkbox">
                            <div class="tag-label-txt"><strong>我要找的人的标签：</strong></div>
                            <?php
                            foreach ($tags as $tag) {
                            ?>
                            <label class="tag-checkbox">
                                <input type="checkbox" value="<?php echo $tag; ?>" name="findTags[]"
                                       class="input-checkbox"><?php echo $tag; ?>
                            </label>
                            <?php
                            }
                            ?>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-xl">注 册</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="js/jquery.easing.min.js"></script>
<script src="js/classie.js"></script>

<!-- Custom Theme JavaScript -->


</body>

</html>
