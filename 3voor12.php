<?php
	for ($dag = 1; $dag <= 15; $dag++)
	{
		$loopdate = time() - 60 * 60 * 24 * $dag;
		$loopyear = date('Y', $loopdate);
		$loopmonth = date('m', $loopdate);
		$loopday = date('d', $loopdate);

		if (date('N', $loopdate) < 5)
		{
			echo '<a href="';
			echo "http://download.omroep.nl/audiologging/r3/$loopyear/$loopmonth/$loopday/";
			echo "2200_0100_3voor12_radio_$loopyear$loopmonth$loopday.mp3";
			echo '">';
			echo date('l Y-m-d', $loopdate);
			echo '</a>';
			echo '<br>';
		}
	}
?>
