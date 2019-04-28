<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>HangmanOOP</title>
  </head>

<body>



<div class="container card border-dark mt-5 p-4">

	<h2>HangmanOOP</h2>

	
	<div>
		Mistery word: 
		<strong>
			<?php
				if ($showMisteryWord <= 2) {
					echo end($_SESSION['mask']); 
				}
			?>		
		</strong>
	</div>

	<div>
		Mistery word solved (testing purposes): <?php echo $staticWord; ?>
	</div>

	
	<div>
		Correct letters: 
		<?php
		
			if (isset($_SESSION['correctGuess'])) {
				showLettersFromArray($_SESSION['correctGuess']);
			}
		
		?>
	</div>
	
	<div>
		Wrong letters: 
		<?php
			if (isset($_SESSION['wrongGuess'])) {
				showLettersFromArray($_SESSION['wrongGuess']);
			} 
		?>
	</div>

	<div class="ml-0">
		<form method="POST">
			<input type="text" name="letterGuess" maxlength="1" placeholder="Your guess.">
			<input type="submit" name="submit">
		</form>
	</div>

	<div class="ml-0 mt-2">
		<form method="POST">	
			<input type="submit" name="Reset" value="reset">
		</form>
	</div>
</div>

<!--WINNING-->
<div class="container card border-dark p-4" <?php echo $winDisplay; ?> >
	<form method = "POST">
		<button name="Reset" value="reset"><h2>You won! Play again?</h2></button>
	</form>
</div>

<!--LOOSING-->
<div class="container card border-dark p-4" <?php echo $looseDisplay; ?> >
	<form method = "POST">
		<button name="Reset" value="reset"><h2>You loose! Play again?</h2></button>
	</form>
</div>





<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

<?php //require 'appTesting.php'; ?>
















