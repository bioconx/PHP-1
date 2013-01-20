<pre>
<?php

include 'bx_deckfunctions_inc.php';

// Global debug flag, set to False before go-live
define('DEBUG1', True);

// Call Function to Build Deck
$builtdeck = f_deckbuilder(2, 1);

	if (DEBUG1) 
	{
		echo "Calling f_deckbuilder";
		var_dump($builtdeck);
	}
	
// Call Function to Sort Deck, by reference so the array of cards here is modified
f_decksort($builtdeck,2);
	
	if (DEBUG1)
	{
		echo "Calling f_decksort";
		var_dump($builtdeck);
	}

// Call Function to Choose a Card, by reference so the choosen card can be removed
$chosencard = f_choosecard($builtdeck);

	if (DEBUG1)
	{
		echo "Calling f_choosecard";
		var_dump($chosencard);
		echo "Show the array after choosing a card, the element should be missing";
		var_dump($builtdeck);
	}
	
?>
</pre>
