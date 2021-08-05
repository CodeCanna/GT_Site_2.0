<?php

namespace GreenThumb\php;

use Exception;
use mysqli;

class DBGTConnection extends mysqli
{
    /**
     * @param string $saucyPath the path to the secrets.json file (including filename!)
     */
    function __construct(string $saucyPath)
    {
        try {
            $saucyFile = dirname(__DIR__, 2) . '/' . $saucyPath;
            // Check if our secrets.json file exists
            if (! $saucyFile) {
                throw new Exception("Secret sauce not found Exitting...");
            }
            
            $sauceLadle = fopen($saucyFile, 'r');

            // The following if statment checks for the success of this line
            $saucyText = fread($sauceLadle, filesize($saucyFile)); // Get our text from secrets.json
            if (empty($saucyText) || $saucyText == NULL)
            {
                echo 'There was a problem reading sauce...';
            }

            $sauce = json_decode($saucyText);
             
            // Pass the sauce to the parent constructor
            parent::__construct($sauce->sauce->hostname, $sauce->sauce->username, $sauce->sauce->password, $sauce->sauce->database);
        } catch(Exception $e) {
            echo $e;
        }
    }

    public function checkConnection(): bool
    {
        return $isConnected = mysqli::ping() ? true : false;
    }
}