<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
<h2 class="form-signin-heading">Please sign in</h2>
<div class="loginmask"></div>

<div class="input">
  <div class="log">
    <div class="name">
        <input type="text" id="value_1" placeholder="Username" name="value_1" tabindex="1" class="form-control" placeholder="Username" required autofocus>
    </div>
    <div class="pwd">
        <input type="password" id="value_2" placeholder="Password" name="value_2" tabindex="2" class="form-control" placeholder="Password" required>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit" tabindex="3">Sign in</button>
    <div class="check"></div>
    <div class="tips"></div>
  </div>
</div>
        </div>
    </div>
  </div>

<script>

$(".input .log").bind("keyup",function(e){
	if(e.keyCode == 13){$('.log .btn').click();}
});


$('.log .btn').click(function(){
		if($('#value_1').val()!="" && $('#value_2').val()!=""){
			$('.log .submit').hide();
			$('.log .check').show();
			$('.log .tips').text('').hide();
			$.ajax({
				type:'POST',
				url:'/?m=user&a=onlogin',
				data:'value_1='+$('#value_1').val()+'&value_2='+$('#value_2').val(),
				success:function(msg){
					$('.log .submit').show();
					$('.log .check').hide();
		            if(msg == 1){
						$('.loginmask').fadeIn(500,function(){
							location.href = '/x';
						});
					}else{
						$('.log .tips').text('username or password error.').show();
					}
				}
			});
		}
	});
</script>

</body>
</html>
