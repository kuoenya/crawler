<html>
	<head>
		<title>cc</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	</head>
	<body>
		<div class="panel panel-default">
			<!-- Default panel contents -->
			<br>
			<div class="panel-heading"><center>Crawler _ World Population !</center></div>
			<br>
			<!-- Table -->
			<table class="table">
				<tr>
		    		<td>#.</td>	
		    		<td>country</td>
		    		<td>population</td>	
	    		</tr>

				<?php
					$url = 'https://www.worldometers.info/world-population/population-by-country/';
					$html = file_get_contents($url);
					$dom = new DOMDocument();
					@$dom->loadHTML($html); //@ = don't show error msg
					$dom->preserveWhiteSpace = false;
					$tables = $dom->getElementsByTagName('table');

					$count = 0;
					foreach ($tables as $table) {
						$tds = $table->getElementsByTagName('td');
						$i = 0;
						foreach ($tds as $td) {
							$i ++;
							switch($i){
								case 1:
									echo '<tr>';
									echo '<td>'.($count+1).'</td>';
									break;
								case 2:
									echo '<td>'.trim($td->nodeValue).'</td>';
									break;
								case 3:
									// echo '<td>'.str_replace(",", "",trim($td->nodeValue)).'</td>'.'<br>';
									echo '<td>'.str_replace(",", "",trim($td->nodeValue)).'</td>';
									echo '</tr>';
									break;
								default:break;
							}
								if($i % 12 == 0){
								$i = 0;
								$count++;
							}
						}
						if ($count == 233) {
							break;
						}
						
					}
				?>

			</table>
		</div>
	</body>
</html>



























