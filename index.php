<?php
    //Include the configuration
    $cfg = include "config/app.php";
    //Include the languages
    $lang = include "config/lang.php";

    //Load in particle config
    $cfg["particles"] = include "config/particles.php";

    // If status is enabled then ping
    if($cfg["status"]["enabled"]){
        $status = include "assets/includes/server_status.php";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $cfg["title"]; ?></title>

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="assets/portal.css" rel="stylesheet">

    <meta name="description" content="<?php echo $cfg["seo"]["description"] ?? "This is {$cfg['title']} using MCPortals software, this description should be updated in the config file.";?>">
	<meta name="keywords" content="<?php echo $cfg["seo"]["tags"] ?? 'minecraft, minecraft server, mc server';?>">

    <?php if( !is_null($cfg["GoogleAnalytics"]) ): ?>
    <script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date(); a = s.createElement(o),
        m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; a.onload=function(){window.ga('create', '<?php echo $cfg["GoogleAnalytics"]; ?>', 'auto');}; m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
    </script>
    <?php endif; ?>

</head>

<body style='<?php if($cfg["bg"]){ echo "background-image:url( {$cfg["bg"]} );background-size:cover;background-position:center;"; }?>'>
    
    <div id="application">
        
        <div class="logo<?php if($cfg['logoanimated']){ echo ' animated'; }?>">
            <?php if(!is_null($cfg["logo"])): ?>
                <img src="<?php echo $cfg['logo']; ?>" alt="<?php echo $cfg['title']; ?>" class="logo"/>
            <?php else: ?>
                <h1><?php echo $cfg["title"]; ?></h1>
            <?php endif;?>
        </div>
        <?php if($cfg["status"]["enabled"]): ?>
            <button class="server-status" id="ip-button" style="background-color: <?php echo $cfg['status']['background_color']; ?>">
                <?php echo format_status($cfg, $lang, $status);?>
            </button>
        <?php endif; ?>

        <?php if( is_array($cfg["icons"]) ): ?>
            <div class="icons">
            <?php foreach($cfg["icons"] as $icn): ?>
                <a href="<?php echo $icn["link"]; ?>" <?php if($icn["new_tab"]): ?> target="_blank" rel="noreferrer" <?php endif; ?>>
                    <img src="<?php echo $icn["image"]; ?>" alt="<?php echo $icn["title"];?>" class="icon-link" />
                    <?php if(isset($icn["sub_text"])): ?>
                        <span class="icon-sub"><?php echo $icn["sub_text"];?></span>
                    <?php endif; ?>
                    <span class="icon-label<?php if(isset($icn["sub_text"])){ echo ' has-sub'; }?>"><?php echo $icn["title"]; ?></span>
                </a>
            <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>

    <?php if($cfg["particles"]["enabled"]):?>
        <div id="particles"></div>
    <?php endif; ?>

    <small class="copy-notice">&copy; <?php echo date("Y") . " " . $cfg["title"];?></small>

    <?php if($cfg["status"]["enabled"] && $cfg["status"]["click_to_copy"]): ?>
    <script>

        var btn = document.getElementById("ip-button");

        btn.addEventListener("click", function(e){
            var copy_text = document.createElement("textarea");
            var btn_prev_text = btn.innerText;

            copy_text.value = "<?php echo $formatted_ip;?>";

            //Stop scrolling to bottom on mobile
            copy_text.style.top = "0";
            copy_text.style.left = "0";
            copy_text.style.position = "fixed";

            document.body.appendChild(copy_text);
            copy_text.focus();
            copy_text.select();

            try{
                var success = document.execCommand("copy");
                btn.innerText = (success ? "The IP has been copied" : "Failed to copy IP");
            }catch (error) {
                btn.innerText = "Failed to copy IP";
                console.error("IP Copy error:", error);
            }

            document.body.removeChild(copy_text);
            setTimeout(function(){
                btn.innerText = btn_prev_text;
            }, 1500);

            e.preventDefault();
        });

    </script>
    <?php endif; ?>
    <?php if($cfg["particles"]["enabled"]):?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>
    <script>
        particlesJS.load("particles", '<?php echo $cfg["particles"]["json"];?>');
    </script>
    <?php endif; ?>

</body>
</html>