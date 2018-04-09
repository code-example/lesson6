<?php
	function debug($expression) {
		echo '<pre>';
		var_dump($expression);
		echo '</pre>';
	}
	function main_function(string $str) {
		$ini = parse_ini_file('php.ini', true, INI_SCANNER_NORMAL);
		$list = file("example.txt");

		$sym1 = $ini['first_rule']['symbol'];
		$sym2 = $ini['second_rule']['symbol'];
		$sym3 = $ini['third_rule']['symbol'];

		for($i = 0; $i < count($list); ++$i) {
			if(substr($list[$i], 0, strlen($sym1)) == $sym1) 
				if($ini['first_rule']['upper'] == 'false')
					$list[$i] = strtolower($list[$i]);
				else 
					$list[$i] = strtoupper($list[$i]);
			if(substr($list[$i], 0, strlen($sym2)) == $sym2)
				for($j = 0; $j < strlen($list[$i]); ++$j)
						if($ini['second_rule']['direction'] == '+')
							if($list[$i][$j] >= '0' and $list[$i][$j] < '9') 
								$list[$i][$j] = (int)$list[$i][$j] + 1;
							else if($list[$i][$j] == '9') $list[$i][$j] = '0'; 
						else if($ini['second_rule']['direction'] == '-')
							if($list[$i][$j] > '0' and $list[$i][$j] <= '9')
								$list[$i][$j] = (int)$list[$i][$j] - 1;
							else if($list[$i][$j] == '0') $list[$i][$j] = '9';
			if(substr($list[$i], 0, strlen($sym3)) == $sym3)
				$list[$i] = str_replace($ini['third_rule']['delete'], '', $list[$i]);
			echo $list[$i].'<br>';
		}
	}
	if(1 || isset($_POST['_area']))
		main_function($_POST['_area']);
	else include("index.html");
?>
