<pre>
<?php
//------------------------------
// Name: f_deckfucntions_inc.php
// Version: 0.0.1
// Date: 01/20/13
//------------------------------

// Helpful constants

define('CARDS', 52);
define('SUITS', 4);
define('CARDSUITS',13);

// Global debug flag, set to False before go-live
define('DEBUG2', False);

// Helpful formulas
// - Range of numbers per deck is equal to CARDS / SUITS
// - Final array length is equal to CARDS * $num_decks

// Call function to test in isolation
if (DEBUG2) 
{
	$builtdeck = f_deckbuilder(2, 1);
	var_dump($builtdeck);
}

//-----------------------------------------------------------------------------------------------//
//-----f_deckbuilder-----build an array of cards
// Parameters
// - #of decks to use
// - game type
// Return
// - the built deck as an array of cards in a pattern of [card number].[suit]
// - false if not abel to create the deck or an error occurs

function f_deckbuilder($num_decks, $game_type)
{
	$suits = array('h','s','d','c');
	$cards = range(1,13);
	$tempbuiltdeck = array();
	$GLOBALS['totalcards'] = CARDS * $num_decks;
	
	if (DEBUG2) 
	{
		echo "Number of Decks to use: $num_decks <br>";
		echo "Game Type to play: $game_type <br>";
		var_dump($suits);
		var_dump($cards);
	}
	
	$i = 0;
	while ($i < $GLOBALS['totalcards'])
	{
		foreach($suits as $suit)
		{
			$j = 1;
			while($j <= CARDSUITS)
			{
				$tempbuiltdeck[$i] = $j . '.' . $suit;
				$j++;
				$i++;
			}	
		}
	}
	return $tempbuiltdeck;
}

//-----------------------------------------------------------------------------------------------//
//-----f_decksort-----sort an array of cards a specified number of times, deck of cards is passed by reference
function f_decksort(&$builtdeck, $numbershuffles)
{
	// Shuffle the deck spcified number of times
	$i = 0;
	while ($i < $numbershuffles)
	{
		shuffle($builtdeck);
		$i++;
		
			echo "Shuffle deck pass $i <br>";
			var_dump($builtdeck);
	}
}

//-----------------------------------------------------------------------------------------------//
//-----f_choosecard----choose a card from an array of cards, and remove that value from the deck
function f_choosecard(&$builtdeck)
{
	$randomindex= rand(0,($GLOBALS['totalcards'] -1));
	$cardtoreturn = $builtdeck[$randomindex];
	unset ($builtdeck[$randomindex]);
	return $cardtoreturn ;
}

?>
</pre>
