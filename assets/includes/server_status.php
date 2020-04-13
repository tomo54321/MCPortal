<?php

/**
 * Ping a Minecraft server
 * 
 * @package MCPortal
 */

/**
 * Get contents using curl as some web servers don't support file_get_contents for remote urls
 * 
 * @param string $url
 * @return string
 */
function curl_get_contents ($url)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);

    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
}

/**
 * Format the status text
 * 
 * @param array $cfg
 * @param array $lang
 * @param array $status
 * @return string
 */
function format_status($cfg = [], $lang = [], $status = []){
    $port = ($cfg["status"]["port"] == 25565 ? "" : ":".$cfg["status"]["port"]);
    if(!isset($status["online"]) || $status["online"] == false){
        $text = str_replace("{IP}", "<b>".$cfg["status"]["ip"].$port."</b>", htmlentities($lang["status"]["offline"]));
    }else{
        $text = str_replace("{IP}", "<b>".$cfg["status"]["ip"].$port."</b>", htmlentities($lang["status"]["online"]));
    }
    $text = str_replace("{PlayerCount}", "<b>".number_format($status["players"]["online"], 0)."</b>" , $text);
    return $text;
}

$port = ($cfg["status"]["port"] == 25565 ? "" : ":".$cfg["status"]["port"]);
$formatted_ip = $cfg["status"]["ip"].$port;
$full_ip = str_replace("{IP}", $formatted_ip, $cfg["status"]["api_url"]);
$cache_path = __DIR__."/../cache/server_status.json";

// Cache exists and is enabled in config.
if(file_exists($cache_path) && $cfg["status"]["cache"]){
    // Open Cache file
    $file = json_decode( file_get_contents($cache_path), true);

    // Cache isn't valid or is older than 5 mins?
    if(!isset($file["created_at"]) || $file["created_at"] < strtotime("-5 minutes")){
        $file = json_decode( curl_get_contents($full_ip), true );
        $file["created_at"] = time();
        $file["icon"] = null; // Remove the icon (if set) not worth saving it.

        // Save Cache
        $file_write = fopen($cache_path, 'w');
        fwrite($file_write, json_encode($file));
        fclose($file_write);
    }

    return $file;
}

// Cache doesn't exist or isn't enabled
$file = json_decode( curl_get_contents($full_ip), true );

// Cache is enabled but doesn't exist
if($cfg["status"]["cache"]){
    $file["created_at"] = time();// Set Create Time
    $file["icon"] = null; // Remove the icon (if set) not worth saving it.

    // Save Cache
    $file_write = fopen($cache_path, 'w');
    fwrite($file_write, json_encode($file));
    fclose($file_write);
}

return $file;
