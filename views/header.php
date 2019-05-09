<html>
<head>
    <title>Dash TiTo</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" type="image/icon-x" href="<?= URL;?>public/img/dash_tito.png" />
    <link rel="stylesheet" type="text/css" href="<?= URL;?>public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= URL ?>public/css/bootstrap-toggle.min.css">
    <link rel="stylesheet" type="text/css" href="<?= URL;?>public/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?= URL;?>public/css/universal.css" />
    <link rel="stylesheet" type="text/css" href="<?= URL;?>public/pe-icon/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" type="text/css" href="<?= URL;?>public/pe-icon/css/helper.css" />
    <link rel="stylesheet" type="text/css" href="<?= URL;?>public/datepicker/datepicker.css">
    <link rel="stylesheet" type="text/css" href="<?= URL;?>public/ionicons-2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="<?= URL;?>public/css/style.css" />

    <script src="<?= URL;?>public/js/jquery.min.js"></script>
    <script src="<?= URL;?>public/js/bootstrap.min.js"></script>
    <script src="<?= URL ?>public/js/bootstrap-toggle.min.js"></script>
    <script src="<?=URL?>public/datepicker/bootstrap-datepicker.js"></script>
    <script src="<?= URL;?>public/bootstrap-datetimepicker/moment.min.js"></script>
    <script src="<?= URL;?>public/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script src="<?= URL;?>public/js/jquery-me.js"></script>
    <?php 
        if(empty($_SESSION['theme'])){
            $color['color'] = 'white';
            Session::setSession('theme', $color);            
            include('public/white_theme.php');
        } else {
            if($_SESSION['theme']['color'] == 'white'){
                include('public/white_theme.php');
            } else {
                include('public/dark_theme.php');
            }
        }
    ?>
    <script>
        var URL = "<?=URL?>";
        $(function(){
            datepicker();
            $('#theme').change(function(){
                var color = "<?= $_SESSION['theme']['color']?>";
                // alert(color); return false;
                if(color=='white'){
                    color = 'dark';
                } else {
                    color = 'white';   
                }
                $.post(URL+'index/theme',{'color':color})
                .done(function(returnData){
                    location.reload();
                })
                return false;
            })
        })
        function datepicker(){
            $('.datepicker').datepicker({
                format: "mm/dd/yyyy",
                endDate : new Date()
            });
            $('.datepicker1').datepicker({
                format: "yyyy-mm-dd",
                endDate : new Date()
            });
        }
    </script>
    <style>
        .android{
            position: fixed;
            bottom: -100;
            right: 0;
            z-index: 1;
        }
        .android:hover{
            bottom: -20;
            transition: .2s;
        }
    </style>
</head>
<?php
    $urlAuto = SERVERTYPE == 'local' ? 'http://'.DOMAIN.'/home/autoLoginDT?u='.$_SESSION['user']['username'].'&p='.password_hash($_SESSION['user']['password'],PASSWORD_DEFAULT) : 'https://'.SUBDOMAIN.'.'.DOMAIN.'/home/autoLoginDT?u='.$_SESSION['user']['username'].'&p='.password_hash($_SESSION['user']['password'],PASSWORD_DEFAULT);
?>
<body class="body">
    <nav class="navbar navbar-standard">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            <a class="navbar-brand" href="#"><img src="<?=URL?>public/img/dt.png"></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a style="padding-bottom: 15px; padding-top: 17px;">
                        <div class="onoffswitch">
                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="theme" <?= $_SESSION['theme']['color'] == 'white' ? 'checked' : ''?> >
                            <label class="onoffswitch-label" for="theme">
                                <span class="onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                        </div>
                    </a> 
                </li>
                <li><a style="font-family: HelveticaNeue; padding-bottom: 19px"><?= $_SESSION['user']['username'] ?></a> </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="pe-7s-user pe-2x"></i></a>
                    <ul class="dropdown-menu">

                        <li><a href="<?=$urlAuto?>" target="_blank">Dashsuccess</a></li>
                        <li><a href="<?=URL?>">Attendance</a></li>
                        <li><a href="<?=URL?>reports">Reports</a></li>
                        <li><a href="<?=URL?>user/logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
      </div>
    </nav>
    <div class="android">
        <h4 class="android-text" style="color: #5ca23e;padding-right: 20px;font-size: 13px; display:none ;font-family: RobotoThin; transform: rotate(-20deg);">DOWNLOAD ON MOBILE NOW!</h4>
        <img src="<?=URL?>public/img/android.png" align="right">
    </div>
    <div class="container-fluid">
        <div class="row" style="margin-top:30px;">
<script>
    $(".android").hover(function(){
        setTimeout(function(){
            $('.android-text').fadeIn();
        },500)
    }, function() {
        setTimeout(function(){
            $('.android-text').fadeOut();
        },100)
    });
</script>