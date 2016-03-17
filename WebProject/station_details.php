<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Hoerburger Reisen</title>
    <meta name="description" content="Hoerburger">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="img/favicon.png" />
    <!-- Bootstrap Anbindung -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>
    <?php include 'header.php';?>
    <div id="main_content_station">
        <label id="prev_diary" class="nav nav_left">&#x2039;</label>
        <div id="loader_container"></div>
        <span id="detail_content">
                <div id="text_info" class="trans">
                    <div class="centered" id="location"></div>
                    <div class="centered" id="time"></div>
                    <ul id="attribute_list"class="attribute">
                    </ul>
                </div>
                <div id="tabs_container" class="trans">   
                    <ul>
                        <li class="tabs selected"></li>
                        <li class="tabs"></li>
                        <li class="tabs"></li>
                    </ul>                 
                    <div id="map_content" class="tab_content">
                    </div>
                    <div id="pic_content" class="tab_content">
                        <h4>Secure Login</h4>
                    </div>
                    <div id="player_content" class="tab_content">
                        <h4>Online Support</h4>
                    </div>
                    
                </div>
                

                <div id="galleries">
                    <button id="backward_pic" class="backward"><i class="icon-angle-left"></i></button>
                    <button id="forward_pic" class="forward"><i class="icon-angle-right"></i></button>
                    <div id="picture_gallery" class="frame trans">
                        <span id="image_not_available" class="not_available_label">Für diese Station sind leider (noch) keine Bilder vorhanden.</span>
        <ul id="pic_gallery_content" class="slidee">
        </ul>
    </div>
    <button id="backward_audio" class="backward"><i class="icon-angle-left"></i></button>
    <button id="forward_audio" class="forward"><i class="icon-angle-right"></i></button>
    <div id="audio_gallery" class="frame trans">
        <span id="audio_not_available" class="not_available_label">Für diese Station ist leider (noch) kein Tonmaterial vorhanden.</span>
        <ul id="audio_gallery_content" class="slidee">
        </ul>
    </div>
    <button id="backward_vid" class="backward"><i class="icon-angle-left"></i></button>
    <button idid="forward_vid" class="forward"><i class="icon-angle-right"></i></button>
    <div id="video_gallery" class="frame trans">
        <span id="video_not_available" class="not_available_label">Für diese Station sind leider (noch) keine Videos vorhanden.</span>
        <ul id="vid_gallery_content" class="slidee">
        </ul>
    </div>
    </div>
    </span>
    </div>
    <label id="next_diary" class="nav nav_right">&#x203a;</label>
    <?php include 'footer.php';
        if (isset($_GET["station_id"])) {
            $station_id = $_GET["station_id"];
        }?>
    <script data-main="js/station_details" src="js/vendor/require.js"></script>
</body>

</html>
