<?php /* Template Name: Instagram */ ?>

<?php //get_header(); ?>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Instagram Access Token</title>
  <meta name="description" content="Callback page for Instagram Access Token">
  <meta name="author" content="Ulysse Coates">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <script type="text/javascript">

  	//Post to instagram authorization 
  	function accessTokenRequest(params){

  		console.log('accessTokenRequest');

			var xhr = new XMLHttpRequest();
			xhr.open('POST', 'https://api.instagram.com/oauth/access_token');
			// xhr.setRequestHeader('Access-Control-Allow-Origin', '*');
			// xhr.setRequestHeader('Content-Type', 'application/json');
			xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			// xhr.setRequestHeader('Content-type', 'multipart/form-data');
			
			xhr.onload = function() {
			    if (xhr.status === 200) {
			        // var userInfo = JSON.parse(xhr.responseText);
			        console.log('success');
			        console.log(xhr.response);
			        var response = JSON.parse(xhr.response);
			        console.log('response',response);
			        document.querySelector('.access_token').innerHTML = response.access_token;
			        document.querySelector('.insta_success').style.display = 'block';
			    } else {
			    	console.log('error');
			      console.log(xhr.response);
			      document.querySelector('.insta_fail').style.display = 'block';
			    }
			};
			// 
			// console.log(JSON.stringify(params));
			// xhr.send(JSON.stringify(params));
 
			// console.log(); //fname=Henry&lname=Ford
			var urlParams = 'client_id'+'='+params.client_id+'&'+'client_secret'+'='+params.client_secret+'&'+'grant_type'+'='+'authorization_code'+'&'+'redirect_uri'+'='+'https://visual-legion.com/instagram-callback/'+'&'+'code'+'='+params.code;

			xhr.send(urlParams);
  	}

  	window.onload = function(){
  		var url = window.location.href;
	  	if (url.indexOf('#access_token=') != -1) {
	  		var substrStart = url.indexOf('#access_token=') + 14; // 
		  	var access_token = url.substring(substrStart);

		  	document.querySelector('.insta_success').style.display = 'block';
		  	// document.querySelector('.insta_fail').style.display = 'none';
		  	document.querySelector('.access_token').innerHTML = access_token;
		  	
	  	} else

	  	if (url.indexOf('?code=') != -1) {
	  		var substrStart = url.indexOf('?code=') + 6; // 
		  	var apiCode = url.substring(substrStart);
	  		
	  		console.log('COOOOODE', apiCode);
	  		var clientID = sessionStorage.getItem('clientID');
	  		var clientSecret = sessionStorage.getItem('clientSecret');
	  		var redirectURI = 'https://visual-legion.com/instagram-callback/';  

	  		var params = {
	  			client_id: clientID,
	  			client_secret: clientSecret,
	  			grant_type: 'authorization_code',
	  			redirect_uri: 'https://visual-legion.com/instagram-callback/',
	  			code: apiCode
	  		}



	  		accessTokenRequest(params);

	  	} 

	  	else {
	  		// Can use session storage because 1. it will be gone when browser is closed 2. this api doesn't let anyone do anything except get public photos... 3. delete after returning token
		  	var redirectURI = 'https://visual-legion.com/instagram-callback/'; 
		  	// var getCodeUrl = 'https://api.instagram.com/oauth/authorize/?client_id='+clientID+'&redirect_uri='+redirectURI+'&response_type=code';
	  		document.querySelector('.insta_form').style.display = 'block';
	  		document.querySelector(".insta_form form").addEventListener("submit", function(e){
				  e.preventDefault();
				  var clientID = document.querySelector('#client_id').value;
				  sessionStorage.setItem('clientID', clientID);
				  var clientSecret = document.querySelector('#client_secret').value;
				  sessionStorage.setItem('clientSecret', clientSecret);
				  var getCodeUrl = 'https://api.instagram.com/oauth/authorize/?client_id='+clientID+'&redirect_uri='+redirectURI+'&response_type=code';
				  window.location.href = getCodeUrl;
				});
	  	}
  	}

  	
  	

  	
  	
  </script>

  <style type="text/css">
  	body{
  		font-family:Roboto;
  	}
  	.insta-code-callback{
  		display: flex;
	    width: 100%;
	    height: 100%;
	    justify-content: center;
	    align-items: center;
	    padding: 40px;
	    flex-wrap: wrap;
	    box-sizing: border-box;
  	}
  	.insta_success{
  		text-align: center;
  	}
  	.insta_fail,.insta_form,.insta_success{
  		display: none;
  	}
  	.access_token{
  		background: #f7f7f7;
  		display: inline-block;
  		padding: 20px;
  	}

  </style>

</head>

<body>
<main class="insta-code-callback">
	<div class="insta_form">
		<h1> Hey, please input your Client ID so we can ask Instagram for an Access Token :) </h1>
		<p>Don't worry, not only will we not save your details, they only give access to your public photos.</p>
		<form action="/instagram-callback.php">
		  <label for="client_id">Client ID : </label>
		  <input type="text" id="client_id" name="client_id" placeholder="Client ID">
		  <label for="client_secret">Client Secret : </label>
		  <input type="text" id="client_secret" name="client_secret" placeholder="Client Secret">
		  <input type="submit" value="Submit">
		</form> 
	</div>
	<div class="insta_success">
		<h1> Yay, we've got an ACCESS TOKEN :)  </h1>
		<p> Now copy this access token and paste it in the VL Gutenberg Extra Blocks settings page or the VL Instagram Block settings page you requested the access token for! </p>
		<h2 class="access_token">{ access_token }</h2>
	</div>
	<div class="insta_fail">
		<h1> Oh oh, something went wrong. Please try again later. </h1>
	</div>
</main>
</body>

<?php //get_footer(); ?>

<script>
(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-120135411-1', 'tredny.com');
ga('send', 'pageview');
</script>
</html>