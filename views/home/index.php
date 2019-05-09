<html>
<head>
	<title>Login</title>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	
	<link rel="icon" type="image/icon-x" href="<?= URL;?>public/img/dash_tito.png" />
	<link rel="stylesheet" type="text/css" href="<?= URL;?>public/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?= URL;?>public/css/style.css" />
	<link rel="stylesheet" type="text/css" href="<?= URL;?>public/pe-icon/css/pe-icon-7-stroke.css" />
	<link rel="stylesheet" type="text/css" href="<?= URL;?>public/pe-icon/css/helper.css" />
	<link rel="stylesheet" href="<?=URL?>public/toastr/toastr.min.css"/>
	
	<script src="<?= URL;?>public/js/jquery.min.js"></script>
	<script src="<?= URL;?>public/js/bootstrap.min.js"></script>
	<script src="<?= URL ?>public/toastr/toastr.min.js"></script>
	<script>
		var URL = "<?=URL?>";
	</script>

	<style>
		#usernameBox{
			position: absolute;
			width: 84%;
			/*padding-top: 20px;*/
		}
		#passwordBox{
			position: relative;
			top: 35px;
			opacity: -2;

		}
		.btn-login{
			display: none;
		}
        #toast-container div{
            border-radius: 0px!important;
        }
        #toast-container .toast-error{
            background-image: url('public/img/error.png')!important;

        }
        #toast-container .toast-success{
            background-image: url('public/img/success.png')!important;

        }
        .toast-message{
            text-align: right;
            width: 70%;
            float: right;
        }
	</style>
</head>
<body class="login-bg">
	<div class="container">
		<div class="row mt-100">
			<div class="col-lg-4 col-lg-offset-4">
				<form id="loginForm" class="form-login">
					<div class="panel panel-standard">
						<div class="panel-heading text-center">
							<div class="row mt-20">
								<img src="<?=URL?>public/img/dash_tito_full.png" width="60%">
							</div>
							<div class="row mt-15 login-header-text">
								<span>Login using your Dashsuccess account</span>
							</div>
						</div>
						<div class="panel-body">
							<div class="form-group mt-10">
								<input class="form-control" id="usernameBox" name="username" tabindex="1" type="text" placeholder="Username">
								<div id="passwordBox" class=" text-center">
									<span style="color: #578B4B">Welcome, </span> <span class="display-username"></span>!
									<input class="form-control mt-10" name="password" tabindex="3" type="password" placeholder="Password">
								</div>
							</div>
							<div class="form-group mt-30">
								<button class="btn btn-block btn-next" type="button" tabindex="2">Next</button>
								<button class="btn btn-block btn-login" type="submit" tabindex="4">Login</button>
							</div>

						</div>
					</div>
					<div class="login-footer">
						<div class="col-lg-6 text-left">
							<a class="btn-back"><i class="pe-7s-angle-left-circle"></i> Back</a>
						</div>
						<div class="col-lg-6 text-right">
							<!-- <a>Forgot Password?</a> -->
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script>
		$(function(){
			var loader = ' <i class="pe-7s-refresh-2 pe-lg pe-spin btnLoader"></i>';
			$('input[name=username]').keypress(function (e) {
				var key = e.which;
				if(key == 13){
					$('.btn-next').click();
					return false;  
				}
			});
			$('#loginForm').submit(function(){
				var form = $(this).serialize();
				var submit = $(this).find('button[type="submit"]');
				submit.prop('disabled',true);
				submit.append(loader);
				$.post(URL+'user/login', form)
				.done(function(returnData){
					if(returnData==1){
						location.reload();
					} else if(returnData==2) {
						submit.find('.btnLoader').remove();
						submit.prop('disabled',false);
						toastr.error('Wrong Password!');
					}
				})
				return false;
			})
			$(".btn-next").click(function(){
				$(this).append(loader);
				var that = $(this);
				var username = $('input[name=username]').val();
				that.prop("disabled",true);

				$.post(URL+'user/checkUser', {"username":username})
				.done(function(returnData){
					if(returnData=='yes'){
						$("#usernameBox").animate({opacity:'0'});
						setTimeout(function(){
							that.hide();
							that.find('.btnLoader').remove();
							$('.btn-login').show();
							$('.login-footer a').fadeIn();
							$('.display-username').html(username);
							$("#passwordBox").animate({opacity:'1',top:'0px'});
							$("input[name=password]").focus();
							$('.btn-next').prop("disabled",false);
						}, 500)
					} else if(returnData=='no') {
						that.find('.btnLoader').remove();
						that.prop("disabled",false);
						toastr.error('Invalid Username!');
					}
				})
			});
			$('.btn-back').click(function(){
				$("#passwordBox").animate({opacity:'0',top:'35px'});
				setTimeout(function(){
					$('.btn-login').hide();
					$('.btn-next').show();
					$('.login-footer a').fadeOut();
					$("#usernameBox").animate({opacity:'1'});
				}, 500)
			})
		});
	</script>
</body>
</html>