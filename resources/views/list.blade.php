
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
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/css/agency.css" rel="stylesheet">

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
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" href="/"><img class="header-logo" src="/img/logo-white.png" /></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li>
                    <a class="page-scroll" href="#about">关于我们</a>
                </li>
                <li>
                    <a class="page-scroll" href="#contact">注册活动</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<section class="info_section">
    <div class="container">

        <h2 class="section-heading text-center">参会人列表</h2>
        <h3 class="text-muted text-center">{{ $channel->name }}</h3>
@if(!Cookie::get('userId_'.$channel->url))
        <div class="text-center" style="margin:20px">
            <a href="/event/{{ $channel->id }}/register" class="btn btn-xl text-center">注册</a>
        </div>
@else
        <div class="text-center" style="margin:20px">
            <a href="/event/{{ $channel->url }}" class="btn btn-xl text-center">列表</a>
            <a href="/event/suggest/{{ Cookie::get('userId') }}" class="btn btn-xl text-center">推荐</a>
        </div>
@endif
@foreach ($lists as $list)
        <div class="user-info">
            <table>
                <tr>
                    <td>
                        <div class="user-wrapper">
                            <img src="/img/user.png">
                        </div>
                        <div class="user-name">{{ $list->name }}</div>
                    </td>
                    <td class="user-info-wrapper">

                        <div>
                            <span class="user-info-icon"><i class="fa fa-user fa-lg"></i> :</span>
                            @foreach(explode(',',$list->tags) as $v)
                            <span class="user-tag">{{ $v }}</span>
                            @endforeach
                        </div>
                        <div>
                            <span class="user-info-icon"><i class="fa fa-search fa-lg"></i> :</span>
                            @foreach(explode(',',$list->find_tags) as $v)
                            <span class="user-tag">{{ $v }}</span>
                            @endforeach
                        </div>
                    </td>
                </tr>
            </table>
        </div>
@endforeach

    </div>
</section>


<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <span class="copyright">Copyright &copy; BiaoPei.org</span>
            </div>
        </div>
    </div>
</footer>


<!-- jQuery -->
<script src="/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="/js/jquery.easing.min.js"></script>
<script src="/js/classie.js"></script>

<!-- Custom Theme JavaScript -->


</body>

</html>
