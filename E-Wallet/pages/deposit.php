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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@1,500&display=swap" rel="stylesheet"> 
	<title></title>
</head>
<body>
	<form>
	<style type="text/css">
		.column{
			margin-top: 60px; 
		}
	</style>
	<div class="column is-offset-4 is-5-desktop">

<div class="field">
	<h2 class="has-text-centered is-size-4 has-text-weight-semibold pt-4">SEND MONEY</h2>
	<label class="has-text-weight-bold is-size-4">Amount</label>
  <p class="control has-icons-left has-icons-right">
    <input class="input" type="text" placeholder="Amount">
    <span class="icon is-small is-left">
     
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-check"></i>
    </span>
  </p>
</div>
<div class="field">
	<label class="has-text-weight-bold is-size-4">Account Number</label>
  <p class="control has-icons-left">
    <input class="input" type="password" placeholder="Password">
    <span class="icon is-small is-left">
      <i class="fas fa-lock"></i>
    </span>
  </p>

</div>
<button class="has-text-weight-bold button btn is-primary is-fullwidth mt-6 "><a href="dashboard.php">Send</a></button>
</div>
 </form>
</body>
</html>