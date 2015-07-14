<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<style>
		body{
			background-color: #eeeeee;
			margin: 0;
		}
		#outter{
			margin: 0;
			width: 100vw;
			height: 100vh;
			background-color: #eeeeee;
		}
		#wrapper{
			width: 400px;
			margin: 0 auto;
		}
		input{
			display: block;
			width: 200px;
			margin: 5px auto;
		}
		input[type=text], input[type=password]{
			outline-color: #E34D4E;
		}
		.tie{
			width: 60px;
			margin: 0 auto;
		}
		#tie-up{
			height: 160px;
		}
		#tie-down{
			height: 20px;
		}
		#real-tie{
			position: absolute;
			width: 60px;
			height: 180px;
			margin-left: 170px;
			background-color: #e34d4e;
			box-shadow: 0px 0px 10px gray;
		}
		#hole{
			width: 100px;
			height: 10px;
			background-color: rgba(136, 136, 136, 0.68);
			margin: 0 auto;
			border-radius: 10px;
		}
		#paper-container{
			height: 260px;
		}
		#container{
			background-color: white;
			border-radius: 8px;
			height: 380px;
			box-shadow: 0px 0px 10px #D2D2D2;
		}
		#form{
			width: 250px;
			margin: 50px auto;
		}
		#login-text{
			text-align: center;
			color: rgb(103, 103, 103);
			font-size: 2em;
			text-shadow: 0px 0px 5px rgb(169, 169, 169);
			margin-bottom: 50px;
		}
		p{
			 font-family:"Microsoft YaHei",微软雅黑,"MicrosoftJhengHei",华文细黑,STHeiti,MingLiu
		}
	</style>
</head>
<body>
	<div id="outter">
		<div id="wrapper">
			<div id="real-tie"></div>
			<div id="tie-up" class="tie"></div>
			<div id="container">
				<div id="tie-down" class="tie"></div>
				<div id="hole"></div>
				<form id="form" action="/check" method="post">
					<input type="hidden" name="" value="L6ZFx3es">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<p id="login-text">后台管理</p>
					<div class="input-group" style="margin-bottom: 10px; width: 250px;">
						<div class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
						<input class="form-control" type="text" name="user" id="" placeholder="用户名">
					</div>
					<div class="input-group" style="margin-bottom: 10px; width: 250px;">
						<div class="input-group-addon"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></div>
						<input class="form-control" type="password" name="pw" id="" placeholder="密码">
					</div>
					<input class="btn btn-primary" type="submit" value="登陆" style="margin-bottom: 10px; width: 250px;">
					@if (!empty($err))
					<div class="alert alert-danger" role="alert"><i class="glyphicon glyphicon-remove"></i> 用户名或密码错误</div>
					@endif
				</form>
			</div>
		</div>
	</div>

	<!-- 新 Bootstrap 核心 CSS 文件 -->
	<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css">

	<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
	<script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>

	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>