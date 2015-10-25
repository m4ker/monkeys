
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
    <link href="/css/agency.css?<?php echo time();?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="apple-touch-icon" href="/img/icon.png">
    
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

        <h2 class="section-heading text-center">{{ $channel->name }}</h2>
        <!--
        <h3 class="text-muted text-center">{{ $channel->name }}</h3>
        -->
@if(!Cookie::get('userId_'.$channel->url))
        <div class="text-center" style="margin:20px">
            <a href="/event/{{ $channel->url }}/register" class="btn btn-xl text-center">登记</a>
            <a id="btn-reload" class="btn btn-xl btn-narrow text-center"><i class="fa fa-refresh fa-lg"></i></a>
        </div>
@else
        <div class="text-center" style="margin:20px">
            <a href="/event/{{ $channel->url }}" id="btn-list" class="btn btn-xl text-center">全部</a>
            <a href="/event/suggest/{{ Cookie::get('userId_' . $channel->url) }}" id="btn-match" class="btn btn-xl btn-gray text-center">匹配</a>
            <a id="btn-reload" class="btn btn-xl btn-narrow text-center"><i class="fa fa-refresh fa-lg"></i></a>
        </div>
@endif
@foreach ($lists as $list)
        <div class="user-info {{ $list->class }}">
            <table>
                <tr>
                    <td>
                        <div class="user-wrapper">
                            <img src="/img/user.png">
                        </div>
                        <div class="user-name">{{ $list->name }}</div>
                    </td>
                    <td class="user-info-wrapper">

                    <table>
                        <tr>
                            <td style="white-space: nowrap">
                            <span class="user-info-icon"><i class="fa fa-user fa-lg"></i> :</span>
                            </td>
                            <td>
                            @foreach(explode(',',$list->tags) as $v)
                            <span class="user-tag">{{ $v }}</span>
                            @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td style="white-space: nowrap">
                            <span class="user-info-icon"><i class="fa fa-search fa-lg"></i> :</span>
                            </td>
                            <td>
                            @foreach(explode(',',$list->find_tags) as $v)
                                <span class="user-tag">{{ $v }}</span>
                            @endforeach
                            </td>
                        </tr>
                        <?php
                            if (strpos($list->contact, '@')!== false) {
                                $className = 'envelope-o';
                            } else if (is_numeric($list->contact) && strlen($list->contact) == 11) {
                                $className = 'mobile-phone';
                            } else {
                                $className = 'comments-o';
                            }
                        ?>
                        <tr>
                            <td style="white-space: nowrap">
                                <span class="user-info-icon"><i class="fa fa-{{ $className }} fa-lg"></i> :</span>
                            </td>
                            <td style="padding-left: 5px">
                            <?php if ($className == 'mobile-phone') {?>
                                <span><a href="tel:{{ $list->contact  }}">{{ $list->contact  }}</a></span>
                            <?php } else if ($className == 'envelope-o') { ?>
                            <span><a href="mailto:{{ $list->contact  }}">{{ $list->contact  }}</a></span>
                            <?php } else { ?>
                            <span>{{ $list->contact  }}</span>
                            <?php } ?>
                            </td>
                        </tr>

                    </table>
                    </td>
                </tr>
            </table>
        </div>
@endforeach

    </div>
</section>

<!-- jQuery -->
<script src="/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="/js/jquery.easing.min.js"></script>
<script src="/js/classie.js"></script>
<script src="/js/utils.js"></script>

<!-- Custom Theme JavaScript -->

<script>
    $(function() {

        if (localStorage.getItem('listType')) {
            var type = localStorage.getItem('listType');
            if (type == 'list') {
                clickList();
            }
            else if (type == 'match') {
                clickMatch();
            }
        }
        $('#btn-match').bind('click', function(event) {
            clickMatch();
            localStorage.setItem("listType", "match");             
            event.preventDefault();
        });
        $('#btn-list').bind('click', function(event) {
            // alert('hello');
            clickList();
            localStorage.setItem("listType", "list");             
            event.preventDefault();
        }); 
        $('#btn-reload').bind('click', function(event) {
            // alert('hello');
            location.reload();           
            event.preventDefault();
        });        
        function clickList () {
            var $btn = $('#btn-list');
            var $btn_other = $('#btn-match');
            $btn.removeClass('btn-gray');
            $btn.addClass('btn-green');
            $btn_other.removeClass('btn-green');
            $btn_other.addClass('btn-gray');
            $('.user-info').show();
        }
        function clickMatch () {
            var $btn = $('#btn-match');
            var $btn_other = $('#btn-list');
            $btn.removeClass('btn-gray');
            $btn.addClass('btn-green');
            $btn_other.removeClass('btn-green');
            $btn_other.addClass('btn-gray');            
            $('.user-info').hide();
            $('.user-matched').show();                         
        }

        var eventCode = '{{ $channel->url }}';
        var eventName = '{{ $channel->name }}';

        addMyEvent(eventCode, eventName);

    });
</script>

</body>

</html>
