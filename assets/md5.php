<?php
/*
* Thanks to Robert Green for this script he wrote in python
* <a href="http://www.rbgrn.net/blog/2007/09/how-to-write-a-brute-force-password-cracker.html">http://www.rbgrn.net/blog/2007/09/how-to-write-a-brute-force-password-cracker.html</a>
* I took what we wrote and ported this to PHP
*
* This script was written for PHP 5, but should work with
* PHP 4 if the hash() function is replaced with md5() or something else
*/

#########################################################
/*                   Configuration                     */

@set_time_limit(0);

function getmicrotime() {
   list($usec, $sec) = explode(" ",microtime());
   return ((float)$usec + (float)$sec);
} 

$time_start = getmicrotime();


// this is the hash we are trying to crack
//define('HASH', '892ab763f02795bfa28354ef1d39059f'); // 098f6bcd4621d373cade4e832627b4f6

// algorithm of hash
// see <a href="http://php.net/hash_algos">http://php.net/hash_algos</a> for available algorithms
define('HASH_ALGO', 'md5');

// max length of password to try
define('PASSWORD_MAX_LENGTH', 15);


// available characters to try for password
// uncomment additional charsets for more complex passwords
$charset = 'abcdefghijklmnopqrstuvwxyz';
$charset .= '0123456789';
$charset .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$charset .= '~`!@#$%^&*()-_\/\'";:,.+=<>? ';
#########################################################
$charset_length = strlen($charset);

// If no arguments given present usage info
if ($_SERVER["argc"] < 1) {
  print "Usage: attack.php <hash>\n";
  exit;
}

// Get MD5 checksum from command line
$hash_password = $_SERVER["argv"][1];

function check($password)
{  
    global $hash_password, $time_start;
    
    if (hash(HASH_ALGO, $password) == $hash_password) {
        echo "\n\nFOUND MATCH, password: ".$password."\r\n";
        $time_end = getmicrotime();
        $time = $time_end - $time_start;
        echo "Found in " . $time . " seconds\n";
        exit;
    }
}


function recurse($width, $position, $base_string)
{
    global $charset, $charset_length;
     
    for ($i = 0; $i < $charset_length; ++$i) {
        
        if ($position  < $width - 1) {
            recurse($width, $position + 1, $base_string . $charset[$i]);
        }
        check($base_string . $charset[$i]);
    }
}

echo "Target hash: " . $hash_password . "\n";
for ($i = 1; $i < PASSWORD_MAX_LENGTH + 1; ++$i) {
        echo "\n" . "Checking passwords with length:" .$i;
        $time_check = getmicrotime();
        $time = $time_check - $time_start;
        echo "\n" . "Runtime: " . $time . " seconds";
        recurse($i, 0, '');
}

echo "Execution complete, no password found\r\n";


?>
