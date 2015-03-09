<?php
session_start();
if (isset($_POST['homework']) && isset($_SESSION['key'])) {
    $homework = $_POST['homework'];
    //把作业内容保存到 homework.txt 中
    file_put_contents('homework.txt', $homework);
    echo '<script>alert("提交成功，如内容无变化强制刷新即可。")</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>作业发布</title>
    <meta name="viewport" content="width=device-width,initial-scal=1">
    <link rel="stylesheet" type="text/css" href="http://cdn.bootcss.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <style>
        #key { padding-top: 100px;}
        body { background: #fff url(grid.png); }
    </style>
</head>
<body>
    <div class="container">
        <!--[if lt IE 10]>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>注意！</strong> 当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/">升级你的浏览器</a>.
        </div>
        <![endif]-->
        <form action="" method="post" class="row" id="key">
            <div class="form-group col-md-8 col-md-offset-2">
<?php
//设置访问密码
if (@$_POST['key'] == 123456 || isset($_SESSION['key'])) {
    $_SESSION['key'] = time();
    echo '<textarea class="form-control" rows="15" name="homework" id="work_detail" placeholder="请输入作业内容"></textarea>
        <br />
        <div class="pull-right">
            <button type="reset" class="btn btn-default" id="reset">清空</button>
            <button type="submit" class="btn btn-primary">提交</button>
        </div>';
} else {
    echo '<div class="input-group">
                        <input type="text" class="form-control" name="key" placeholder="请输入密码">
                        <div class="input-group-btn">
                        <button type="submit" class="btn btn-default">提交</button>
                    </div></div>';
}
?>
            </div>
        </form>
    </div>

<script type="text/javascript">
    $(function () {
        $("#work_detail").load('homework.txt');
        $("#reset").click(function () {
            $("#work_detail").text('');
        })
    });
</script>

</body>
</html>