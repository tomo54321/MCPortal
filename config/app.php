<?php
/**
 * The main configuration file
 * 
 * @package MCPortal
 */

return [

    /**
     * Website Title
     * @var string
     */
    "title" => "My Server",

    /**
     * Server Logo Path / URL
     * Leave as null for text instead of image
     * @var string|null
     */
    "logo" => "https://hypixel.net/styles/hypixel-v2/images/header-logo.png",

    /**
     * Animate the logo?
     * @var boolean
     */
    "logoanimated" => true,

    /**
     * Background Image
     * Leave as null for no image
     * @var string|null
     */
    "bg" => "https://i.redd.it/y1lm9i7eai021.png",

    /**
     * Handy SEO settings
     * @var array
     */
    "seo" => [
        // Tags for Search engines
        "tags" => "My Server, Tags, Should Go, Here",
        // Brief description on your server
        "description" => "This is a description for my server that will show in Google / Bing etc."
    ],

    /**
     * Server Status config
     * Checkout the lang file for display text
     * @var array
     */
    "status" => [
        "enabled" => true, // Show the server status
        "api_url" => "https://api.mcsrvstat.us/2/{IP}", // Server Status API URL any other API will need to follow the same JSON pattern as the default (Code may need to be changed otherwise in server_status.php)
        "cache" => true, // Cache the ping result (This is strongly recommended to increase performace and you may be blocked from the api)
        "ip" => "hypixel.net", // Server IP to ping
        "port" => 25565, // Server Port to ping
        "click_to_copy" => true, // Allow the status to be clicked to copy the IP?
        "background_color" => "rgba(0,0,0,.5)", // Valid CSS color for background
    ],

    /**
     * Selection Icons (Recommended you have 4 but you can have as many or as little as you want)
     * Set the value to false to disable
     * @var array|boolean
     */
    "icons"=>[
        [
            "title" => "Forum", // Icons title
            "sub_text" => "Chat on our", // Text shown above the icons link (Simply remove this line to remove it)
            "image" => "https://placehold.it/150x150", // Icons image path
            "link" => "https://google.com", // Icons Link to
            "new_tab" => false // Open the link in a new tab?
        ],
        [
            "title" => "Store",
            "image" => "https://placehold.it/150x150",
            "link" => "https://google.com",
            "new_tab" => false
        ],
        [
            "title" => "Vote",
            "image" => "https://placehold.it/150x150",
            "link" => "https://google.com",
            "new_tab" => false
        ],
        [
            "title" => "Bans",
            "image" => "https://placehold.it/150x150",
            "link" => "https://google.com",
            "new_tab" => false
        ],
    ],

    /**
     * Google Analytics ID
     * Leave null to disable GA
     * @var string|null
     */
    "GoogleAnalytics" => null,

];