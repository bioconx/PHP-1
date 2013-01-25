<pre>
<?php
session_start();

include 'bx_deckfunctions_inc.php';
include 'bx_helperfunctions_inc.php';

// Global debug flag, set to False before go-live
define('DEBUG1', True);

// Call Function to Display Header
f_writeheder();

// Call Function to Display the input form
//-----Get the session variable that is set to the operation

if ( !isset($_SESSION['action']) ) 
	{
		$action = $_SESSION['action'];
		echo "Action: $action </br>";
		$players = $_POST['players'];
		echo "Players: $players </br>";
		f_createform("players");
	}
else 
	{
		$_SESSION['action'] = "new";
		$_POST['players'] = "2";
		
		$action = $_SESSION['action'];
		echo "Action: $action </br>";
		$players = $_POST['players'];
		echo "Players: $players </br>";
		$player = $_SESSION['player'];
		$count = $_SESSION['count'];
		f_createform("gameon");
	}

switch ($action){
	case "hit";
		echo "Action: $action <br>";
		// Draw card for the current players turn
		// Count
		$chosencard = f_choosecard($builtdeck);
		break;
	case "stay";
		echo "Action: $action <br>";
		// What to do next
		break;
	case "new";
		echo "Action: $action <br>";
		// Shuffle
		// Draw cards for all players, 2 each
		// Count what the 2 cards total
		$builtdeck = f_deckbuilder(2, 1);
		f_decksort($builtdeck,2);
		for ($i=0;$i<4;$i++)
		{
			$chosencard = f_choosecard($builtdeck);
			echo "<p>Card $i: $chosencard </p>";
		}
}
		
// Call Function to Display Header
f_writefooter();
?>
</pre>
