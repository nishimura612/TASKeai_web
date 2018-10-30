<?php

	$gpioPortNum = '4';
	$gpioPort = 'gpio' . $gpioPortNum;

	$gpioMode = 'out';
	$gpioModeState = '/sys/class/gpio/gpio4/direction';
	$gpioState = '/sys/class/gpio/gpio4/value';

	// gpioPort の初期がされているかチェック
	if(system('ls /sys/class/gpio | grep ' . $gpioPort) != $gpioPort){
		system('echo '. $gpioPortNum .' > /sys/class/gpio/export'); // ないなら初期化
	}

	// gpioPort の動作モードチェック
	if(system('cat ' . $gpioModeState) != $gpioMode){
		system('echo ' . $gpioMode . ' > ' . $gpioModeState);
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
