<?php
session_start();
//------------------------------
// Name: bx_helperfunctions_inc.php
// Version: 0.0.1
// Date: 01/20/13
//------------------------------

function f_writeheder(){
	$currentdatetime = date(DATE_RSS);
	echo "<html><head><title>BlackJack - Vegas Style</title></head><body>";
	echo "<p>Welcome to BlackJack on $currentdatetime</p>";
}

function f_writefooter(){
	echo "</body></html>";
	
}

function f_createform($formtype){
	switch ($formtype)
	{
		case "players";
			$_SESSION['action'] = "new";
			echo "<form method='POST' action='index.php'>Please enter in number of players: <input name='players' type='text' />";
			echo "<p><input name='Button1' type='button' value='Submit' /></p></form>";
			break;
		case "gameon";
			echo "<form method='POST' action='index.php'>";
			echo "<p><input name='Button1' type='button' value='new' /><input name='Button2' type='button' value='hit' /><input name='Button3' type='button' value='stay' /></p>";
			echo "<p>Place holder for dealer</p><p></p><p>Place holder for player</p>";
			echo "</form>";
			break;
	}
}

function f_sendemail(){
	echo "f_createform </br>";
}