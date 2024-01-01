<?php
define("NO",0);
define("YES",1);
include("config.php");

// HTTP/1.1
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);

// HTTP/1.0
header("Pragma: no-cache");

// Import Globals
import_request_variables("G");
?>

<HTML>
<HEAD>	
<TITLE>phpNMAP v0.12</TITLE></HEAD>
<BODY>

<?php
function check_ip($checkme,$MULTIPLE_HOSTS) {
	$checkme = strtolower($checkme);
	if ($MULTIPLE_HOSTS) {
		$hostregex = '/^(([0-9*-]{1,7}\.){3}[0-9*-]{1,7}|([0-9a-z_-]+\.)*([0-9a-z_-][0-9a-z_-]{0,61})?[0-9a-z]\.[a-z]{2,6})$/';
	} else {
		$hostregex = '/^(([0-9]{1,3}\.){3}[0-9]{1,3}|([0-9a-z_-]+\.)*([0-9a-z_-][0-9a-z_-]{0,61})?[0-9a-z]\.[a-z]{2,6})$/';
	}
	if (preg_match("$hostregex", $checkme) OR $checkme == "localhost") {
		return 1; 
	} else { 
		return 0;
	}
}

function check_portrange($checkme,$DEBUG) {
	$portrangeregex ='/^(T\:|U\:){0,1}[TU\:0-9-\,]+$/';
	if (preg_match("$portrangeregex",$checkme)) {
		return 1;
	} else {
		return 0;
	}
}

function check_randomhosts($checkme,$DEBUG) {
	$randomhostsregex = '/^([0-9])+$/';
	if (preg_match("$randomhostsregex",$checkme)) {
		return 1;
	} else {
		return 0;
	}
}

function check_decoys($checkme,$DEBUG) {
		$decoyregex = '/^((([0-9]{1,3}\.){3}[0-9]{1,3}|([0-9a-z_-]+\.)*([0-9a-z_-][0-9a-z_-]{0,61})?[0-9a-z]\.[a-z]{2,6}),)*$/';
		if (preg_match("$decoyregex",$checkme)) {
			return 1;
		} else {
			if ($DEBUG) echo "<BR><B>Error: check_decoy() failed.</B><BR>";
			return 0;
		}
}

function check_idlescan($checkme, $DEBUG) {
		$idlescanregex = '/^((([0-9]{1,3}\.){3}[0-9]{1,3}|([0-9a-z_-]+\.)*([0-9a-z_-][0-9a-z_-]{0,61})?[0-9a-z]\.[a-z]{2,6}),)*(:[0-9])*$/';
		if (preg_match("$idlescanregex",$checkme)) {
			return 1;
		} else {
			if ($DEBUG) echo "<BR><B>Error: check_idlescan() failed.</B>";
			return 0;
		}
}

if (isset($ip) OR isset($option8)) {
	if (check_ip($ip,$MULTIPLE_HOSTS) OR check_randomhosts($randomhosts)) {
		print str_repeat(' ',300);
		if($SUDO) $run.= $SUDO." ";
		$run.= $NMAP." ";	
		switch ($scantype) {
			case $scantype=='-sS ';
				$run.=$scantype;
				break;	
			case $scantype=='-sT ';
				$run.=$scantype;
				break;
			case $scantype=='-sF ';
				$run.=$scantype;
				break;
			case $scantype=='-sX ';
				$run.=$scantype;
				break;
			case $scantype=='-sN ';
				$run.=$scantype;
				break;
			case $scantype=='-sP ';
				$run.=$scantype;
				break;
			case $scantype=='-sO ';
				$run.=$scantype;
				break;
			case $scantype=='-sA ';
				$run.=$scantype;
				break;
			case $scantype=='-sW ';
				$run.=$scantype;
				break;
			case $scantype=='-sL ';
				$run.=$scantype;
				break;
			case $scantype=='-sI ';
				check_idlescan($idlescan,$DEBUG);
				if (isset($idlescan)) {
					$run.=$scantype.escapeshellarg($idlescan);
				} else {
					$run.=$scantype;
				}
				break;
		}
		if ($udpscan=='-sU ') $run.=$udpscan;
		if ($rpcscan=='-sR ') $run.=$rpcscan;
		if ($pingtype1=='-PB ') $run.=$pingtype1;
		if ($pingtype2=='-P0 ') $run.=$pingtype2;
		if ($pingtype3=='-PT ') $run.=$pingtype3;
		if ($pingtype4=='-PS ') $run.=$pingtype4;
		if ($pingtype5=='-PI ') $run.=$pingtype5;
		if ($pingtype6=='-PP ') $run.=$pingtype6;
		if ($pingtype7=='-PM ') $run.=$pingtype7;
		if ($option1 == '-O ') $run.= $option1;
		if ($option2 == '-I ') $run.= $option2;
		if ($option3 == '-f ') $run.= $option3;
		switch ($option4) {
			case $option4=='-v ';
				$run.=$pingtype;
				break;
			case $option4=='-v -v';
				$run.=$pingtype;
				$break;
		}
		if ($option5 == '-F ') $run.= $option5;
		switch ($option6) {
			case $option6=='-n ';
				$run.=$option6;
				break;
			case $option6=='-n ';
				$run.=$option6;
				break;
		}
		if ($option7 == '-p ') {
			if (check_portrange($portrange)) {
				$run.=escapeshellarg($option7.$portrange)." ";
			} else {
				echo "<BR><B>Invalid port range.</B>";
				exit();
			}
		}
		if ($option8 == '-iR ') {
			if (check_randomhosts($randomhosts)) {
				$run.=$option8.escapeshellarg($randomhosts)." ";
			} else {
				echo "<BR><B>Invalid number of random hosts.</B>";
				exit();
			}
		}
		if ($option9 == '-D ') {
			if (check_decoys($randomhosts)) {
				$run.=$option9.escapeshellarg($decoys)." ";
			} else {
				echo "<BR><B>Invalid decoy(s).</B>";
				exit();
			}
		}
		if ($option10 == '-r ') $run.= $option10;
		if ($option11 == '--packet_trace ') $run.=$option11; 
		switch ($timing) {
			case $timing=='-T Paranoid ';
				$run.=$timing;
				break;
			case $timing=='-T Sneaky ';
				$run.=$timing;
				break;
			case $timing=='-T Polite ';
				$run.=$timing;
				break;
			case $timing=='-T Normal ';
				$run.=$timing;
				break;
			case $timing=='-T Aggressive ';
				$run.=$timing;
				break;
			case $timing=='-T Insane ';
				$run.=$timing;
				break;
		}
		if ($SOURCE_ADDRESS != '') {
			$run.=" -S $SOURCEADDRESS";
		}
		if ($INTERFACE != '') {
			$run.=" -e $INTERFACE";
		}
		if ($SOUCE_PORT != '') {
			$run.=" -g $SOURCE_PORT";
		}
		$run.=escapeshellarg($ip);
		if ($DEBUG == YES) {
			$run.=" 2>&1";
			echo "<BR>Executing: $run <BR>";
		}
	 	
		// flush banner before long scan			
		print str_repeat(300, " "). "\n"; // some version of ie need this
		ob_flush();
		flush();

		exec($run,$output);
		if(count($output)!=0) {
			foreach ($output As $line) {
				echo "$line<BR>";
			}
		} else {
			echo "<BR><BR><B>ERROR: Enable DEBUG Mode to get more info</B>";
		}
	} else { 
		echo "<BR><BR><B>Invalid IP.</B>";
	}
	echo "<FORM METHOD=GET ACTION=$PHP_SELF>";
	echo "<BR><INPUT TYPE=Submit VALUE='New Scan'><BR>";
} else {
	echo <<<END
	<FORM METHOD=GET ACTION=$PHP_SELF>
	<INPUT TYPE=Submit VALUE='Scan'><INPUT TYPE=Reset VALUE='Default Options'>
	<B>&nbsp;&nbsp;&nbsp;&nbsp;TARGET
END;
	if ($MULTIPLE_HOSTS) echo "(S)";
	echo " > </B><INPUT NAME=ip TYPE=Text><BR>";
		
		for ($jj = 0; $jj < 47; $jj++) {
			echo "&nbsp;";
		}  
		if ($MULTIPLE_HOSTS) {
			$examplestr = " 10.10.*.*,";
		}
		
		echo <<<END1
		Example 10.10.50.1,$examplestr  www.microshaft.com, localhost<BR>
		<TABLE BORDER=1>
		<TR><TD><B>SCAN TYPE</B></TD><TD><B>PING OPTIONS</B></TD>
		<TD><B>GENERAL OPTIONS</B></TD>
		<TR><TD ROWSPAN=5>
		<INPUT NAME=scantype TYPE=Radio VALUE='-sS ' CHECKED><B>TCP SYN</B><BR>
		<INPUT NAME=scantype TYPE=Radio VALUE='-sT '>TCP Connect()<BR>
		<INPUT NAME=scantype TYPE=Radio VALUE='-sF '>Stealth FIN<BR>
		<INPUT NAME=scantype TYPE=Radio VALUE='-sX '>XMAS Tree<BR>
		<INPUT NAME=scantype TYPE=Radio VALUE='-sN '>Null<BR>
		<INPUT NAME=scantype TYPE=Radio VALUE='-sP '>Ping<B>*</B><BR>
		<INPUT NAME=scantype TYPE=Radio VALUE='-sO '>IP <B>*</B> <BR>
		<INPUT NAME=scantype TYPE=Radio VALUE='-sA '>ACK<BR>
		<INPUT NAME=scantype TYPE=Radio VALUE='-sW '>Window<BR>
		<INPUT NAME=scantype TYPE=Radio VALUE='-sL '>List <B>*</B><BR>
		<INPUT NAME=scantype TYPE=Radio VALUE='-sI '>Idle<B>*</B> - <INPUT NAME=idlescan TYPE=Textbox WIDTH=21><BR> 
		<INPUT NAME=scantype TYPE=Radio VALUE=''>None of the Above<BR>
		<INPUT NAME=udpscan TYPE=Checkbox VALUE='-sU '>UDP<BR>

		<INPUT NAME=rpcscan TYPE=Checkbox VALUE='-sR '>RPC<BR>
<FONT SIZE=1><B>* </B> Cannot be used with other scans.</FONT>
		<FONT SIZE=1><CENTER> For help with different options see<BR>
		the <A HREF="nmap_manpage.html">nmap manpage</A>.</CENTER></FONT>
		</TD>

		<TD ROWSPAN=1>
		<INPUT NAME=pingtype1 TYPE=Checkbox VALUE='-PB ' CHECKED><B>TCP + ICMP echo request</B><BR>
		<INPUT NAME=pingtype3 TYPE=Checkbox VALUE='-PT '>TCP<BR>
		<INPUT NAME=pingtype4 TYPE=Checkbox VALUE='-PS '>SYN<BR>
		<INPUT NAME=pingtype5 TYPE=Checkbox VALUE='-PI '>ICMP echo request<BR>
		<INPUT NAME=pingtype6 TYPE=Checkbox VALUE='-PP '>ICMP timestamp<BR>
		<INPUT NAME=pingtype7 TYPE=Checkbox VALUE='-PM '>ICMP netmask request<BR>
		<INPUT NAME=pingtype2 TYPE=Checkbox VALUE='-P0 '>Do NOT ping<BR>
		</TD>

		<TD rowspan=2>
		<INPUT NAME=option1 TYPE=Checkbox VALUE='-O ' CHECKED><B>OS Fingerprint</B><BR>
		<INPUT NAME=option5 TYPE=Checkbox VALUE='-F '>Fast scan<BR>
		<INPUT NAME=option2 TYPE=Checkbox VALUE='-I '>TCP reverse ident (TCP Connect() Only)<BR>
		<INPUT NAME=option3 TYPE=Checkbox VALUE='-f '>Fragmented ip packets (SYN,FIN,XMAS,NULL Only)<BR>
	<INPUT NAME=option7 TYPE=Checkbox VALUE='-p '>Port range -
	<B>&nbsp;</B>
	<INPUT NAME=portrange TYPE=Text><BR>
END1;

if ($MULTIPLE_HOSTS) echo "<INPUT NAME=option8 TYPE=Checkbox VALUE='-iR '>Scan <INPUT NAME=randomhosts TYPE=Text SIZE=5> random hosts.<BR>";

	echo <<<END2
	<INPUT NAME=option9 TYPE=Checkbox VALUE='-D '>Use decoys -&nbsp;<INPUT NAME=decoys TYPE=Text><BR>
	<INPUT NAME=option10 TYPE=Checkbox VALUE='-r '>Do NOT randomize port scan order<BR>
	<INPUT NAME=option11 TYPE=Checkbox VALUE='--packet_trace '>Show every packet sent or recieved<BR>
	</TD>
	</TR>
	<TR>
	<TD><B>TIMING OPTIONS</TD></TR><TR>
	</TD>
	
	<TD ROWSPAN=2>
	<INPUT NAME=timing TYPE=Radio VALUE='-T Paranoid '>Paranoid<BR>
	<INPUT NAME=timing TYPE=Radio VALUE='-T Sneaky '>Sneaky<BR>
	<INPUT NAME=timing TYPE=Radio VALUE='-T Polite '>Polite<BR>
	<INPUT NAME=timing TYPE=Radio VALUE='-T Normal ' CHECKED><B>Normal</B><BR>
	<INPUT NAME=timing TYPE=Radio VALUE='-T Aggressive '>Aggressive<BR>
	<INPUT NAME=timing TYPE=Radio VALUE='-T Insane '>Insane<BR>
        <TD ROWSPAN=1><INPUT NAME=option4 TYPE=Radio VALUE='' CHECKED><B>Standard Verbosity</B><BR>
	<INPUT NAME=option4 TYPE=Radio VALUE='-v '>Verbose Mode<BR>
	<INPUT NAME=option4 TYPE=Radio VALUE='-v -v '>Extra Verbose Mode<BR>
	</TD>
	</TR>
	<TR>
	<TD>
	<INPUT NAME=option6 TYPE=Radio VALUE='-n ' CHECKED><B>Do not resolve DNS</B><BR>
	<INPUT NAME=option6 TYPE=Radio VALUE='-R '>Resolve DNS<BR>
</TD></TR>
	 
	</TABLE>
 	<FONT SIZE=1>&copy 2003 dG Networks <A HREF="http://www.deathgrab.com">www.deathgrab.com</a></FONT>	
END2;
}	
?>
</BODY>
</HTML>
