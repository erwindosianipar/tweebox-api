<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
    <link rel="shortcut icon" href="//abs.twimg.com/favicons/twitter.ico" type="image/x-icon">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://unpkg.com/sweetalert@1.1.3/dist/sweetalert.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://unpkg.com/sweetalert@1.1.3/dist/sweetalert.min.js"></script>
	<style type="text/css" media="screen">
		.status{
			height: 130px!important;
			border-bottom: 3px solid #007bff;
		}
		.circle{
			border-radius: 20px!important;
		}
		.no-border{
			border-radius: 0px!important;
		}
	</style>

	<title>Send Tweet API — @erwindosianipar</title>
	<meta name="description" content="Erwindo Tweet API">
	<meta name="keyword" content="Erwindo Tweet API">
	<link rel="canonical" href="https://cicacode.com/api/tweet">
</head>
<body style="background: rgb(245, 248, 250)">
	<div class="container col-lg-6 col-sm-12 mt-4">
	<?php
	require_once "twitteroauth/autoload.php";
	use Abraham\TwitterOAuth\TwitterOAuth;

	if (isset($_POST['submit']))
	{
		if ($_POST['password'] === "YOUR_PASSWORD")
		{
			if ($_POST['status'] != "" && strlen($_POST['status']) <= 140)
			{
				define('CONSUMER_KEY', 'YOUR_CONSUMER_KEY');
				define('CONSUMER_SECRET', 'YOUR_CONSUMER_SECRET');
				define('ACCESS_TOKEN', 'YOUR_ACCESS_TOKEN');
				define('ACCESS_TOKEN_SECRET', 'YOUR_ACCESS_TOKEN_SECRET');

				$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
				
				$status = $_POST['status'];
				$post_tweets = $connection->post("statuses/update", ["status" => $status]);
				
				echo '<script>';
				echo '
				setTimeout(function(){
					swal({
						title: "Success!",
						text: "Tweet successfully posted!",
						type: "success"
					}, function(){
						window.location = "https://cicacode.com/api/twitter/";
					});
				}, 1000);';
				echo '</script>';
			}
			else
			{
				echo '<script>';
				echo '
				setTimeout(function(){
					swal({
						title: "Error!",
						text: "Tweets cannot be empty and maximal 140 character",
						type: "error"
					}, function(){
						window.location = "https://cicacode.com/api/twitter/";
					});
				}, 1000);';
				echo '</script>';
			}
		}
		else
		{
			echo '<script>';
			echo '
			setTimeout(function(){
				swal({
					title: "Error!",
					text: "The password you entered is incorrect!",
					type: "error"
				}, function(){
					window.location = "https://cicacode.com/api/twitter/";
				});
			}, 1000);';
			echo '</script>';
		}
	}
	else
	{
		echo '<form method="POST" accept-charset="utf-8">';
		echo '
			<div class="media">
				<img src="https://twitter.com/erwindosianipar/profile_image?size=normal" class="rounded-circle mr-2" alt="Erwindo Sianipar">
				<div class="media-body">
					<textarea name="status" placeholder="Tweet something" class="form-control mb-3 shadow-sm status no-border"></textarea>
					<input type="password" name="password" placeholder="Password" class="form-control mb-3 shadow-sm circle">
					<button type="submit" name="submit" class="btn btn-primary float-right circle"><i class="fa fa-twitter" ></i> Tweet!</button>
				</div>
			</div>
		';
		echo '</form>';
	}
	?>
	</div>
</body>
</html>
