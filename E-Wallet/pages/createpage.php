<?php
 session_start();
 $error= "";

 function create_userid()
 {
  $length = rand(4,20);
  $number="";
    for ($i=0; $i < $length; $i++) { 
    $new_rand =rand(0,9);
    $number = $number .$new_rand;
    }

  return $number;
 }
 if($_SERVER['REQUEST_METHOD']=="POST")
 {
  if (!$DB =new PDO("mysql:host=localhost;dbname=e-wallet","root","")) {
    die("could not connect to the database");
  }

  echo "<pre>";
  print_r($_POST);
  echo "/<pre>";

  $arr['userid'] =create_userid();
  $condition = true;

  while ($condition) {
     $query = "select id from users where userid = :userid limit 1";
  $stm = $DB->prepare($query);
  if($stm)
  {
     $check=$stm->execute($arr);
     if($check){
    $data = $stm->fetchAll(PDO::FETCH_ASSOC);
    if(is_array($data) && count($data) > 0){
      $arr ['userid'] = create_userid();
      // continue;
    }
    } 
  }
  $condition = false;
  }

  //save to databse
  $arr['fullname'] = $_POST['fullname'];
  $arr['email'] = $_POST['email'];
  $arr['password']= hash('sha1', $_POST['password']);
  $arr['confirmpassword']= hash('sha1', $_POST['confirmpassword']);
  $arr['wallet'] = "1000RWF";

   $query = "insert into users (userid,fullname,email,password,confirmpassword,wallet) values(:userid,:fullname,:email, :password,:confirmpassword,:wallet)";
  $stm = $DB->prepare($query);
  if($stm)
  {
     $check = $stm->execute($arr);
     if (!$check) 
     {
       $error = "could not save to database";
     }
     if($error == "")
     {
      header("Location: wallethomepage.php");
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@1,500&display=swap" rel="stylesheet"> 
	<title></title>
</head>
<body>

	<style type="text/css">
		.navbar{
			background-color: #011627;

		}
		.navbar a{
		color: white;

		}
		form{
			box-shadow: rgb(0, 0, 0, 0.25)0px 4px 12px;
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
          <a class="button has-text-weight-semibold is-dark">
            Sign Up 
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>

<form action="" method="post" class="column mt-6 is-offset-4 is-5-desktop">

	<h1 class="has-text-centered is-size-4 has-text-weight-semibold">CREATE A WALLET</h1>
  <?php
   if ($error!="") {
     echo "<br><span style='color:blue'>$error</span><br<br>";
   }
  ?>
	<i class="fa-solid fa-money-bill-transfer mt-6  column is-offset-4" style="font-size: 50px;"></i>

  <div class="field">
  <label class="is-normal">FULLNAME</label>
  <p class="control has-icons-left">
    <input class="input" type="text" name="fullname" placeholder="Fullname" required>
    <span class="icon is-small is-left">
      <i class="fas fa-check"></i>
    </span>
  </p>
</div>

	<div class="field MT-4">
		<label class="is-normal">EMAIL</label>
  <p class="control has-icons-left has-icons-right">
    <input class="input" type="email" name="email" placeholder="Email" required>
    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-check"></i>
    </span>
  </p>
</div>

<div class="field">
	<label class="is-normal">PASSWORD</label>
  <p class="control has-icons-left">
    <input class="input" type="password" name="password" placeholder="Password" required>
    <span class="icon is-small is-left">
      <i class="fas fa-lock"></i>
    </span>
  </p>
</div>
<div class="field">
	<label class="is-normal">CONFIRM PASSWORD</label>
  <p class="control has-icons-left">
    <input class="input" type="password" name="confirmpassword" placeholder="Confirm Password" required>
    <span class="icon is-small is-left">
      <i class="fas fa-lock"></i>
    </span>
  </p>
</div>
<button class="is-fullwidth button is-info has-text-weight-semibold mt-6">Create Account</button>
<h1 class="has-text-centered">Already have a Account? <a href="wallethomepage.php">Login</a></h1>
</form>


</body>
</html>