
<?php
session_start();
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
  <section class="columns">
  	<div class="card column is-4-desktop">
  		<header class="card-header"><div class="card-header-title">Personal Info</div></header>
  		
  	
  	<div class="card-content">
  		<p class="pb-4 has-text-weight-semibold" >FULLNAME</p>
  		<p class="pb-4 has-text-weight-semibold">EMAIL</p>
  		<p class="pb-4 has-text-weight-semibold">ACCOUNT BALANCE</p>
  		<p class="pb-4 has-text-weight-semibold">ACCOUNT NUMBER</p>
    
  		<form class="" action="logout.php">
  			<button class="is-small button is-info"><a href="wallethomepage.php">logout</a></button>
  		</form>
  		
  	</div>
    </div>
  	<div class="card column">
  		<header class="card-header"><div class="card-header-title">Transfer & Payment</div></header>
  		<div class="card-content">
  			<div class="columns">
  				<form action="" method="post" class="column">
  					<div class="first"></div>
  					<h1 class="second has-text-weight-semibold pl-6 pb-4 has-text-centered">Send Funds to Others</h1>
  					<label class="has-text-weight-bold">Reciever Account Number</label>
  					<input type="text" name="" class="input receive mt-4"><br>
  					<div class="field">
	<label class="is-normal">Amount to Send</label>
  <p class="control has-icons-left">
    <input class="input" type="text" placeholder="Amount to Send">
    <span class="icon is-small is-left">
      <i class="fa-solid fa-rwf-sign"></i>
    </span>
  </p>
</div>
<div class="complete"></div>
<button class="button is-dark is-fullwidth mt-5">Transfer</button>
  			</form>
  				
  			</div>
  			
  		</div>
  	</div>
  	
  </section>

</body>
</html>