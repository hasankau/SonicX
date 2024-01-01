<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lib\Ping;
use App\Lib\LaravelNmap;
use App\Models\Website;


class LatencyScan extends Controller
{
    public function testLatency(){
        $ip =   $_SERVER['REMOTE_ADDR'];

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        //whether ip is from the proxy
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        //whether ip is from the remote address
        else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        // exec("ping -n 3 $ip", $output, $status);
        // print_r($output);


        $reachable_host = $ip;     
        $ping = new Ping($reachable_host);     
        $latency = $ping->ping('exec');     
        echo $latency;
        // .' ' .$ping->getIpAddress()

    }


    public function testLatencyURL(Request $request){
        $ip =   $request->get('url');

        $reachable_host = $request->get('url');     
        $ping = new Ping($reachable_host);     
        $latency = $ping->ping('exec');   
        
        
        $web = Website::where('url', '=', $request->get('url'))->first();
       
        if($web){
            $web->status = 'Scanned';
            $web->save();
        }
        

        echo $latency;

    }

    public function nmapLatency(){


    }


    public function testHostname(Request $request){
        $hostname = "";
        if($request->get('url')==""){
            $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);

        }else{
            $reachable_host = $request->get('url');     
        $ping = new Ping($reachable_host);     
        $hostname = $ping->getIpAddress();
        }
        echo $hostname;

    }

    public function testSpeed(){
        $kb=1024;
// echo "streaming $kb Kb...<!-";
flush();
$time = explode(" ",microtime());
$start = $time[0] + $time[1];
for($x=0;$x<$kb;$x++){
    str_pad('', 1024, '.');
    flush();
}
$time = explode(" ",microtime());
$finish = $time[0] + $time[1];
$deltat = $finish - $start;
echo round($kb / $deltat, 3)."Kb/s";

    }


    public function nmap(Request $request){

        $url =   $_SERVER['REMOTE_ADDR'];

        if($request->get('url')!=""){
            $url = $request->get('url');
            $web = Website::where('url', '=', $request->get('url'))->first();
       
        if($web){
            $web->status = 'Scanned';
            $web->save();
        }
        }

        $descriptorSpec = array(
            0 => array("pipe", "r"), // stdin is a pipe that the child will read from
            1 => array("pipe", "w"), // stdout is a pipe that the child will write to
            2 => array("file", "errors/errors.txt", "a") // stderr is a file to write to
         );
        
         $env = array('bypass_shell' => true);
         $process = proc_open("nmap -sn ".$url, $descriptorSpec, $pipes, "C:\\Program Files (x86)\\NMap", $env);
        
         if (is_resource($process))
         {
             fclose($pipes[0]);
         
             echo stream_get_contents($pipes[1]);
             fclose($pipes[1]);
         
             $return_value = proc_close($process);
         
             echo "<br /><br />Command Returned: $return_value\n";
         }

//         exec('nmap localhost', $output);
// var_dump( $output );
    }



    public function testSpeedOokla(){
//         exec('C:\Users\Admin\Downloads\ookla-speedtest-1.1.1-win64\speedtest.exe yes', $output);
// echo json_encode($output );

$a = popen('C:\ookla-speedtest-1.1.1-win64\speedtest.exe yes', 'r'); 
    
    while($b = fgets($a, 2048)) { 
        echo $b."<br>\n"; 
        ob_flush();flush(); 
    }

    pclose($a);


    }


    public function getNetstat(){
        $a = popen('netstat', 'r'); 
    
    while($b = fgets($a, 2048)) { 
        echo $b."<br>\n"; 
        ob_flush();flush(); 
    }

    pclose($a);
    }
    

    public function getNmapSecurity(Request $request){

        $url = $request->get('url');

        if($request->get('url')!=""){
            $url = $request->get('url');
            $web = Website::where('url', '=', $request->get('url'))->first();
       
        if($web){
            $web->status = 'Scanned';
            $web->save();
        }
        }

        $nmap_cmd = $request->get('cm');

        $descriptorSpec = array(
            0 => array("pipe", "r"), // stdin is a pipe that the child will read from
            1 => array("pipe", "w"), // stdout is a pipe that the child will write to
            2 => array("file", "errors/errors.txt", "a") // stderr is a file to write to
         );
        
         $env = array('bypass_shell' => true);
         $process = proc_open($nmap_cmd." ".$url, $descriptorSpec, $pipes, "C:\\Program Files (x86)\\NMap", $env);
        
         if (is_resource($process))
         {
             fclose($pipes[0]);
         
             echo stream_get_contents($pipes[1]);
             fclose($pipes[1]);
         
             $return_value = proc_close($process);
         
             echo "<br /><br />Command Returned: $return_value\n";
         }

//         exec('nmap localhost', $output);
// var_dump( $output );

    }


} 