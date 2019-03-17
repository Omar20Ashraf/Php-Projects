<?php
include 'database.php';
session_start();

//set question number
$number=(int) $_GET['n'];

//get the total question
$query="SELECT * FROM question";
$result=$co->query($query) or die($co->erroe.__LINE__);
$total=$result->num_rows;

//get the question
$query="SELECT * FROM question WHERE question_num = $number";

//get result
$result=$co->query($query) or die($co->error . __LINE__);

$question=$result->fetch_assoc();


//get the choices
$choices_query="SELECT * FROM choices WHERE question_number = $number";

//get results
$choices=$co->query($choices_query) or die($co->error . __LINE__);

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
			<div class="current"> 
				Question <?php echo $question['question_num']; ?>
				 of <?php echo $total; ?>
			</div>
			<p class="question">
				<?php echo $question['text']; ?>
			</p>
			<form method="post" action="process.php">
				<ul class="choices">
					<?php while($row=$choices->fetch_assoc()): ?>
						<li>
							<input type="radio" name="choice" value="<?php echo $row['id']; ?>"/>
								<?php echo $row['text']; ?>
						</li>
					<?php endwhile; ?>
				</ul>
				<input type="submit" name="submit" value="Submit">
				<input type="hidden" name="number" value="<?php echo $number ?>"/>
			</form>
		</div>			
	</main>
	<footer>
		<div class="container">
			Copyrigth &copy;2019 Php Quizzer
		</div>		
	</footer>

</body>
</html>