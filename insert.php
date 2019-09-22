<?




require 'sql_class.php';
require 'quizz_user_class.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	$q=mysql_escape_string($_POST['pergunta']);
	$f_p=mysql_escape_string($_POST['first']);
	$s_p=mysql_escape_string($_POST['second']);
	$t_p=mysql_escape_string($_POST['third']);
	$four_p=mysql_escape_string($_POST['four']);
	$d=$_POST['dificulty'];
	$c=mysql_escape_string($_POST['correct']);
	
	$add = new user();
	
	if($add->add_question($q,$f_p,$s_p,$t_p,$four_p,$d,$c) == true)
	{
echo "<p align='center'>One more</p>";		
		}
	
	
	}

?>



<!DOCTYPE>
<html>
<head>
<meta charset="iso-8859-15">
<title>Inserir Perguntas</title>
<link href='http://fonts.googleapis.com/css?family=Stint+Ultra+Expanded' rel='stylesheet' type='text/css'>
<style type="text/css">

#content{
	width: 800px;
	margin: 20px auto;
	font-family: 'Stint Ultra Expanded', cursive;
	border:2px black;
	border-radius:2em;
	box-shadow: 0px 0px 30px rgba(48, 50, 50, 0.85);
	}
form{
	padding: 20px 0 20px 0;
	
	}	
fieldset{
	margin-bottom: 10px;
	
	}


</style>

</head>
<body>

<div id="content">
<form method="POST">

<fieldset>
<legend>Insert Question:</legend>
<textarea type="text" style="width:100%;" name="pergunta" maxlength="100" required></textarea>
</fieldset>

<fieldset>
<legend>Insert possible answers:</legend>
<label>1) possible answer: </label><input type="text" name="first" required><br>
<label>2) possible answers:</label><input type="text" name="second" required><br>
<label>3) possible answers:</label><input type="text" name="third" required><br>
<label>4) possible answers:</label><input type="text" name="four" required><br>

</fieldset>
<fieldset>
<legend>Difficulty:</legend>
<select name="dificulty">
<option value="easy">easy</option>
<option value="midlle">midlle</option>
<option value="hard">hard</option>
</select>
</fieldset>

<fieldset>
<legend>Correct is:</legend>
<label>Resposta answer:</label><input type="text" name="correct" required>
</fieldset>

<p align="center">
<input type="submit" value="Introduzir"><input type="reset">
</p>

</form>

</div>

</body>

</html>