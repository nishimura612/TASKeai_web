<?php

	$gpioPortNum = '4';
	$gpioPort = 'gpio' . $gpioPortNum;

	$gpioMode = 'out';
	$gpioModeState = '/sys/class/gpio/gpio4/direction';
	$gpioState = '/sys/class/gpio/gpio4/value';

	// gpioPort の初期化がされているかチェック
	if(system('ls /sys/class/gpio | grep ' . $gpioPort) != $gpioPort){
		system('echo '. $gpioPortNum .' > /sys/class/gpio/export'); // 初期化
		print "\n$gpioPort initialize";
	}
	// gpioPort の動作モードチェック
	if(system('cat ' . $gpioModeState) != $gpioMode){
		system('echo ' . $gpioMode . ' > ' . $gpioModeState);
		print "\n$gpioPort set mode to $gpioMode";
	}
		
	// stateLightの値によって，gpioPortの出力を変える．
	if($_POST['stateLight'] == 'ON'){
		system('echo 1 > ' . $gpioState);
	}else if($_POST['stateLight'] == 'OFF'){
		system('echo 0 > ' . $gpioState);
	}else if($_POST['stateLight'] == 'INVERTED'){
		// gpioPortの状態を取得し，逆の状態をセットする．
		$nowStatus = system('cat ' . $gpioState);
		if($nowStatus == 0){
			system('echo 1 > ' . $gpioState);
		}else{
			system('echo 0 > ' . $gpioState);
		}
	}

	
?>
<script>
	history.back();
</script>
