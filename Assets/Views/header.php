<?php
 	$lname = "foo";
	$fname = "fon";
	include("Assets/Tools/phphtml.php");
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" >
	<link rel="stylesheet" href="htps://cdn.datatables.net/buttons/1.6.3/css/buttons.dataTables.min.css" >

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

	<title><?=$headertitle?></title>
	<link href="Assets/Style/style.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


<div class="header" id="header">
	<div class="row">
		<div class="col-1">
			<img src='../ASSET/images/cfslsquaresmoll.jpg' height="80px">
		</div>
		<div class="col-10">
			<p style="font-size:30px;"> <?= $headertitle ?> </p>
			<p style="color:red"><?= $lname ." ".$fname ?> 

			<?php if($fname != ""): ?>
				<button class="btn btn-outline-dark"style="padding-top:5px; padding-bottom:2px;" onClick="window.location='index.php?mode=logout'"><strong>Logout</strong></button> </p> 
			<?php endif; ?>

		</div>
		<div class="col-1">
			<img src="../ASSET/images/globelang.gif" height="80px">
		</div>
	</div>
</div>
<div id="apicontent"></div>
<div class="main">

<script>

$(document).ready(function() {
	$('table.display').DataTable({ });
});
</script>

