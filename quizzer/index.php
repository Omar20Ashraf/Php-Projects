<?php
include 'database.php';

//get total questions
$query="SELECT * FROM question";

//get result
$result=$co->query($query) or die($co->error . __LINE__);

$totla=$result->num_rows;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Php Quizer</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<header>
		<div class="container">
				<h1>Php Quizzer</h1>
		</div>
	</header>
	<main>
		<div class="container">
			<h2>Test Youe Php Knowledge</h2>
			<p>This is a multible choice quiz to test your php Knowledge</p>
			<ul>
				<li><strong>Number of question:</strong><?php echo $totla; ?></li>
				<li><strong>Type:</strong>Multiple Choice</li>
				<li><strong>Estimated Time:</strong><?php echo $totla * .5; ?> Minutes</li>
			</ul>
			<a href="question.php?n=1" class="start">Start Quiz</a>
		</div>			
	</main>
	<footer>
		<div class="container">
			Copyrigth &copy;2019 Php Quizzer
		</div>		
	</footer>

</body>
</html>