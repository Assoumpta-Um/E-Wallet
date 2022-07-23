<?php
session_start();
$error="";
function create_userid()
{
	$length = rand(4,20);
	$number = "";
	for ($i=0; $i <$length; $i++)
	{
		$new_rand= rand(0,9);
		$number = $number . $new_rand;
	}
	 return $number;
}

if ($_SERVER['REQUEST_METHOD'] == "POST")
 {
	// code...
	if (!$DB = new PDO("mysql:host=localhost;dbname=e-wallet", "root", ""))
	 {
		// code...
		die("could not connect to the database");
	}

	//save to database


  $arr['email'] = $_POST['email'];
  $arr['password']= hash('sha1', $_POST['password']);

   $query = ("select * from users where email= :email && password= :password limit 1 ");
  $stm = $DB->prepare($query);
  if($stm)
  {
     $check = $stm->execute($arr);
     if ($check) {
     	// code...
     	$data = $stm->fetchAll(PDO::FETCH_ASSOC);
     	if (is_array($data) && count($data) > 0) {
     		// code...
     		$_SESSION['myid'] == $data[0]['userid'];
     		$_SESSION['myname'] == $data[0]['fullname'];
     	}else{
     		$error = "wrong email or password";
     	}
     }
     
     if($error == "")
     {
      header("Location: dashboard.php");
      die;
     }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@1,500&display=swap" rel="stylesheet"> 
	<title></title>
</head>
<body>
	<style type="text/css">
		body{
			background-image: linear-gradient(to right top , #051937 , #011c47, #061d56 , #161c64, #291971);
		}
		.navbar{
			background-color: #452222;

		}

		.navbar a{
		color: white;

		}
		.manage{
			font-family: 'Kanit', sans-serif;
		}
	</style>

<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="wallethomepage.php">
      <header class="has-text-weight-semibold">E-WALLET</header>
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start" style="margin-left:110px ;">
      <a href="wallethomepage.php" class="navbar-item">
        Home
      </a>

    
      <a class="navbar-item">
        Services
      </a>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a href="deposit.php" class="button is-dark has-text-weight-semibold mr-6">
            <strong>Deposit</strong>
          </a>
          <a href="createpage.php" class="button has-text-weight-semibold is-dark">
            Sign Up 
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>

<section class="columns mt-6">
	<div class="hero column is-7-desktop">
		<div class="hero-body">
			<h1 class="is-size-1 has-text-weight-semibold has-text-white manage">Welcome to E-Wallet</h1>
			<p class="has-text-white">You can manage  Your Payment with Wallet</p>
			<div class="is=fles mt-6">
				<button class="button"><a href="createpage.php">Get Started</a></button>
				
			</div>
			
		</div>
		
	</div>
	<div class="column hero is-5-desktop mt-6">
		<div class="hero-body has-background-light">
			<h1 class="is-size-4 has-text-weight-semibold has-text-centered">Login to E-wallet!!</h1>
			<form class="field" method="post" action="" >
				<div class="second"></div>
				<input type="text" class="input is-size-5 mt-5 email" placeholder="email" name="email" required>
				<input type="password" class="input is-size-5 mt-5 password" placeholder="password" name="password" required>
				<button class="button
				btn has-text-weight-semibold is-fullwidth is-info is-size-6 mt-6">LOGIN</button>
				<label>If you don't have account, <a href="createpage.php">Sign up</a></label>
				
			</form>
			
		</div>
		
	</div>
	
</section>

</body>
</html>