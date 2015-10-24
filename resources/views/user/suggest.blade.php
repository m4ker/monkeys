<!DOCTYPE html>
<html>
<head>
    <title>标配 is comming ... </title>
</head>
<body>
<div class="container">
    <div class="content">
        <?php
        foreach ($data as $user) {
            echo '<div class="title">用户名：' . $user['id'] . '，用户联系方式：' . $user['contact'] . '</div>';
        }
        ?>
    </div>
</div>
</body>
</html>
