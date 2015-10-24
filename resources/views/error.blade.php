<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php echo $msg;?></title>
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <style>
        *{
            padding:0;
            margin:0;
        }
        body {
            font-size:1em;
            text-align:center;
        }
        #box {
            width:300px;
            margin:200px auto 0;
            padding:20px 0;
            background:#eee;
            text-align:center;
        }
        h1 {
            font-size:2em;
            margin-bottom:20px;
        }
    </style>
</head>
<body>
<div id="box">
    <h1><?php echo $msg;?></h1>
    <a href="javascript:history.go(-1);">返回</a>
</div>
</body>
</html>
