<?php
	if(system('ls /sys/class/gpio | grep gpio4') != 'gpio4'){
		system('echo 4 > /sys/class/gpio/export');
	}
	$gpioStatus = system('cat /sys/class/gpio/gpio4/direction');
	if($gpioStatus != 'out'){
		system('echo out > /sys/class/gpio/gpio4/direction');
	}
	if($_POST['stateLight'] == 'ON'){
		system('echo 1 > /sys/class/gpio/gpio4/value');
	}else if($_POST['stateLight'] == 'OFF'){
		system('echo 0 > /sys/class/gpio/gpio4/value');
	}else if($_POST['stateLight'] == 'INVERTED'){
		$nowStatus = system('cat /sys/class/gpio/gpio4/value');
		if($nowStatus == 0){
			system('echo 1 > /sys/class/gpio/gpio4/value');
		}else{
			system('echo 0 > /sys/class/gpio/gpio4/value');
		}
	}
?>
<script>
	history.back();
</script>
