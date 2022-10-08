
<?php
$lid = 2;
$action = $sql = $lname = $newsid = $ntitle = $ntext = $nview = $nphoto = "";
$cid = $corder = $cname = '';
$img_add = '';
getRequests();
$path = '';
if(isset($_FILES["image"])&&getimagesize($_FILES["image"]["tmp_name"])) {
    $extarr = ["jpg", "png", "jpeg", "gif"];
    $dir = "../img/";
    $ext = strtolower(pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION)); 
    $id = uniqid();
    $path = $dir . $id . '.' . $ext;
    if($_FILES["image"]["size"] < 500000 && in_array($ext, $extarr))
       move_uploaded_file($_FILES["image"]["tmp_name"], $path);
       $path = $id. '.' . $ext;
}
switch ($action) {
    case 'nadd':
        if($path != ''){
            $img_add = ',`img`';
            $path = ", '$path'"; 

        }
        $sql = "INSERT INTO `news` (`title`, `text`, `view_count`,`like_count`,`dislike_count`,`category` $img_add) VALUES ('$ntitle', '$ntext', 0,0,0,$cid $path)";
        break;
    case 'ndel':
        $sql = "DELETE FROM `news` WHERE `id`=$newsid";
        break;
    case 'nedit':
        $path_pr = $path != '' ? ",`img`='$path'" : "";
        $sql = "UPDATE `news` SET `title`='$ntitle' $path_pr, `text`='$ntext',`category`='$cid' WHERE `id`=$newsid";
        break;
    case 'ledit':
        $sql = "UPDATE `language` SET `name`='$lname' WHERE `id`=$lid";
        break;
    case 'ldel':
        $sql = "DELETE FROM `language` WHERE `id`=$lid";
        break;
    case 'ladd':
        $sql = "INSERT INTO `language` (`name`) VALUES ('$lname')";
        break;
    case 'cadd':
        echo $lid . "  ". $cname . "  ". $corder;
        $sql = "INSERT INTO `category`(`lang`, `name`, `order`) VALUES ($lid,'$cname',$corder)";
        break;
    case 'cdel':
        $sql = "DELETE FROM `category` WHERE `id`=$cid";
        break;
    case 'cedit':
        $sql = "UPDATE `category` SET `order`=$corder, `name`='$cname' WHERE `id`=$cid";
        break;
    case 'imgdel':
            $sql = "UPDATE `news` SET `img`='' WHERE `id`=$newsid";
            break;
}
if($sql != '') mysqli_query($conn, $sql);

?>
<html lang="az" style="" class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers no-applicationcache svg inlinesvg smil svgclippaths no-touch svg">

<head>
    <title>Oxu.az - Azərbaycan Xəbərləri</title>
    <link href="https://cdn.oxu.az/assets/favicons/favicon-192x192-5bdc49357f9c1b6c217a03e27d71447afd40644f2bc0b8c180962a0a3dd77457.png" rel="apple-touch-icon" sizes="192x192">
    <link href="https://cdn.oxu.az/assets/favicons/favicon-192x192-5bdc49357f9c1b6c217a03e27d71447afd40644f2bc0b8c180962a0a3dd77457.png" rel="icon" sizes="192x192" type="image/png">
    <meta content="https://cdn.oxu.az/assets/browserconfig-8afb326a1dd375848ee9a08d37a52ba9fe9d8e66e46c9c6f3b93097c45ab0742.xml" name="msapplication-config">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta content="100000786574968" property="fb:admins">
    <meta content="100028792893697" property="fb:admins">
    <meta content="100003186094975" property="fb:admins">
    <meta content="421309791269484" property="fb:pages">
    <meta content="251840290344" property="fb:pages">
    <meta content="124961130953072" property="fb:pages">
    <meta content="422547091132218" property="fb:pages">
    <meta content="544768492255686" property="fb:pages">
    <meta content="251840290344" property="fb:pages">
    <meta content="237085196644930" property="fb:pages">
    <meta content="629752737786bcfc" name="yandex-verification">
    <meta content="600" http-equiv="refresh">
    <meta property="og:url" content="https://oxu.az/">
    <meta property="og:site_name" content="Oxu.Az">
    <meta property="og:title" content="Azərbaycan Xəbərləri">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://cdn.oxu.az/assets/oxu/logo_share-207c13a53fbe8209638ea3819fee198f4a33628f4516c37f0e671b92c6a97394.png">
    <meta property="fb:app_id" content="345015945604715">
    <link href="/feed" rel="alternate" type="application/atom+xml">
    <link rel="shortcut icon" type="image/x-icon" href="https://cdn.oxu.az/assets/oxu/favicon-be69a7e075f480d5feb0e455336bd049b79ebed51157a5919d2c46e975c6c1ad.ico">
    <link rel="stylesheet" media="screen" href="https://cdn.oxu.az/assets/application-9e82e11c3f98b92acef1cdeb8389ba2c9adb8ac083a9f49baa92f88d8e81ce1c.css">
    <link rel="stylesheet" media="print" href="https://cdn.oxu.az/assets/print-224a36cfa8ce35f9f7b06c5ad87e7ede79af167801c304d807989bc0f8e94a79.css">
    <link rel="stylesheet" media="screen" href="https://cdn.oxu.az/assets/fonts/woff-3cdfcfe2e7866a214d1fe149a2822cb6c0fc52e8551821de0a359d1f69dc26d5.css">
    <script src="https://connect.facebook.net/az_AZ/sdk.js?hash=e82a95341c39b9f63e01ff9650b4e225" async="" crossorigin="anonymous"></script>
    <script type="text/javascript" async="" src="https://d31qbv1cthcecs.cloudfront.net/atrk.js"></script>
    <script async="" src="https://mc.yandex.ru/metrika/tag.js"></script>
    <script async="" src="//www.google-analytics.com/analytics.js"></script>
    <script id="facebook-jssdk" src="https://connect.facebook.net/az_AZ/sdk.js" async=""></script>
    <script src="https://cdn.oxu.az/assets/application-742b79243f2b81732559c1c10f85dbbc94b5f6e7efda4e792b6b669fa7bef1de.js"></script>
    <script src="//platform.twitter.com/widgets.js" async="async"></script>
    <link href="https://cdn.oxu.az/xb.css?v3" rel="stylesheet" type="text/css">
    <script async="" defer="" data-website-id="bc430164-93a5-49d7-b371-8c4d2c0b5053" src="https://stat.pet/umami.js"></script>
    <script>
        window.digitalks = window.digitalks || new function() {
            var t = this;
            t._e = [], t._c = {}, t.config = function(c) {
                var i;
                t._c = c, t._c.script_id ? ((i = document.createElement("script")).src = "//data.digitalks.az/v1/scripts/" + t._c.script_id + "/track.js?&cb=" + Math.random(), i.async = !0, document.head.appendChild(i)) : console.error("digitalks: script_id cannot be empty!")
            };
            ["track", "identify"].forEach(function(c) {
                t[c] = function() {
                    t._e.push([c].concat(Array.prototype.slice.call(arguments, 0)))
                }
            })
        }
        digitalks.config({
            script_id: "8f1d610c-e801-48dd-8592-be5d215c5cf3",
            page_url: location.href,
            referrer: document.referrer
        })
    </script>
    <script src="//data.digitalks.az/v1/scripts/8f1d610c-e801-48dd-8592-be5d215c5cf3/track.js?&amp;cb=0.1857959837037897" async=""></script>
    <style type="text/css" data-fbcssmodules="css:fb.css.base css:fb.css.dialog css:fb.css.iframewidget css:fb.css.customer_chat_plugin_iframe">
        .img_edit{
            width: 20%;
            height: 20%;
        }
        textarea{
            width: 80%;
            height: 80%;
        }
        input{
            margin-bottom: 15px;
        }
        
        a{
            text-decoration: none !important;
            font-size: 10px;
        }
        .fb_hidden {
            position: absolute;
            top: -10000px;
            z-index: 10001
        }

        .fb_reposition {
            overflow: hidden;
            position: relative
        }

        .fb_invisible {
            display: none
        }

        .fb_reset {
            background: none;
            border: 0;
            border-spacing: 0;
            color: #000;
            cursor: auto;
            direction: ltr;
            font-family: "lucida grande", tahoma, verdana, arial, sans-serif;
            font-size: 11px;
            font-style: normal;
            font-variant: normal;
            font-weight: normal;
            letter-spacing: normal;
            line-height: 1;
            margin: 0;
            overflow: visible;
            padding: 0;
            text-align: left;
            text-decoration: none;
            text-indent: 0;
            text-shadow: none;
            text-transform: none;
            visibility: visible;
            white-space: normal;
            word-spacing: normal
        }

        .fb_reset>div {
            overflow: hidden
        }

        @keyframes fb_transform {
            from {
                opacity: 0;
                transform: scale(.95)
            }

            to {
                opacity: 1;
                transform: scale(1)
            }
        }

        .fb_animate {
            animation: fb_transform .3s forwards
        }

        .fb_hidden {
            position: absolute;
            top: -10000px;
            z-index: 10001
        }

        .fb_reposition {
            overflow: hidden;
            position: relative
        }

        .fb_invisible {
            display: none
        }

        .fb_reset {
            background: none;
            border: 0;
            border-spacing: 0;
            color: #000;
            cursor: auto;
            direction: ltr;
            font-family: "lucida grande", tahoma, verdana, arial, sans-serif;
            font-size: 11px;
            font-style: normal;
            font-variant: normal;
            font-weight: normal;
            letter-spacing: normal;
            line-height: 1;
            margin: 0;
            overflow: visible;
            padding: 0;
            text-align: left;
            text-decoration: none;
            text-indent: 0;
            text-shadow: none;
            text-transform: none;
            visibility: visible;
            white-space: normal;
            word-spacing: normal
        }

        .fb_reset>div {
            overflow: hidden
        }

        @keyframes fb_transform {
            from {
                opacity: 0;
                transform: scale(.95)
            }

            to {
                opacity: 1;
                transform: scale(1)
            }
        }

        .fb_animate {
            animation: fb_transform .3s forwards
        }

        .fb_dialog {
            background: rgba(82, 82, 82, .7);
            position: absolute;
            top: -10000px;
            z-index: 10001
        }

        .fb_dialog_advanced {
            border-radius: 8px;
            padding: 10px
        }

        .fb_dialog_content {
            background: #fff;
            color: #373737
        }

        .fb_dialog_close_icon {
            background: url(https://connect.facebook.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 0 transparent;
            cursor: pointer;
            display: block;
            height: 15px;
            position: absolute;
            right: 18px;
            top: 17px;
            width: 15px
        }

        .fb_dialog_mobile .fb_dialog_close_icon {
            left: 5px;
            right: auto;
            top: 5px
        }

        .fb_dialog_padding {
            background-color: transparent;
            position: absolute;
            width: 1px;
            z-index: -1
        }

        .fb_dialog_close_icon:hover {
            background: url(https://connect.facebook.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -15px transparent
        }

        .fb_dialog_close_icon:active {
            background: url(https://connect.facebook.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -30px transparent
        }

        .fb_dialog_iframe {
            line-height: 0
        }

        .fb_dialog_content .dialog_title {
            background: #6d84b4;
            border: 1px solid #365899;
            color: #fff;
            font-size: 14px;
            font-weight: bold;
            margin: 0
        }

        .fb_dialog_content .dialog_title>span {
            background: url(https://connect.facebook.net/rsrc.php/v3/yd/r/Cou7n-nqK52.gif) no-repeat 5px 50%;
            float: left;
            padding: 5px 0 7px 26px
        }

        body.fb_hidden {
            height: 100%;
            left: 0;
            margin: 0;
            overflow: visible;
            position: absolute;
            top: -10000px;
            transform: none;
            width: 100%
        }

        .fb_dialog.fb_dialog_mobile.loading {
            background: url(https://connect.facebook.net/rsrc.php/v3/ya/r/3rhSv5V8j3o.gif) white no-repeat 50% 50%;
            min-height: 100%;
            min-width: 100%;
            overflow: hidden;
            position: absolute;
            top: 0;
            z-index: 10001
        }

        .fb_dialog.fb_dialog_mobile.loading.centered {
            background: none;
            height: auto;
            min-height: initial;
            min-width: initial;
            width: auto
        }

        .fb_dialog.fb_dialog_mobile.loading.centered #fb_dialog_loader_spinner {
            width: 100%
        }

        .fb_dialog.fb_dialog_mobile.loading.centered .fb_dialog_content {
            background: none
        }

        .loading.centered #fb_dialog_loader_close {
            clear: both;
            color: #fff;
            display: block;
            font-size: 18px;
            padding-top: 20px
        }

        #fb-root #fb_dialog_ipad_overlay {
            background: rgba(0, 0, 0, .4);
            bottom: 0;
            left: 0;
            min-height: 100%;
            position: absolute;
            right: 0;
            top: 0;
            width: 100%;
            z-index: 10000
        }

        #fb-root #fb_dialog_ipad_overlay.hidden {
            display: none
        }

        .fb_dialog.fb_dialog_mobile.loading iframe {
            visibility: hidden
        }

        .fb_dialog_mobile .fb_dialog_iframe {
            position: sticky;
            top: 0
        }

        .fb_dialog_content .dialog_header {
            background: linear-gradient(from(#738aba), to(#2c4987));
            border-bottom: 1px solid;
            border-color: #043b87;
            box-shadow: white 0 1px 1px -1px inset;
            color: #fff;
            font: bold 14px Helvetica, sans-serif;
            text-overflow: ellipsis;
            text-shadow: rgba(0, 30, 84, .296875) 0 -1px 0;
            vertical-align: middle;
            white-space: nowrap
        }

        .fb_dialog_content .dialog_header table {
            height: 43px;
            width: 100%
        }

        .fb_dialog_content .dialog_header td.header_left {
            font-size: 12px;
            padding-left: 5px;
            vertical-align: middle;
            width: 60px
        }

        .fb_dialog_content .dialog_header td.header_right {
            font-size: 12px;
            padding-right: 5px;
            vertical-align: middle;
            width: 60px
        }

        .fb_dialog_content .touchable_button {
            background: linear-gradient(from(#4267B2), to(#2a4887));
            background-clip: padding-box;
            border: 1px solid #29487d;
            border-radius: 3px;
            display: inline-block;
            line-height: 18px;
            margin-top: 3px;
            max-width: 85px;
            padding: 4px 12px;
            position: relative
        }

        .fb_dialog_content .dialog_header .touchable_button input {
            background: none;
            border: none;
            color: #fff;
            font: bold 12px Helvetica, sans-serif;
            margin: 2px -12px;
            padding: 2px 6px 3px 6px;
            text-shadow: rgba(0, 30, 84, .296875) 0 -1px 0
        }

        .fb_dialog_content .dialog_header .header_center {
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            line-height: 18px;
            text-align: center;
            vertical-align: middle
        }

        .fb_dialog_content .dialog_content {
            background: url(https://connect.facebook.net/rsrc.php/v3/y9/r/jKEcVPZFk-2.gif) no-repeat 50% 50%;
            border: 1px solid #4a4a4a;
            border-bottom: 0;
            border-top: 0;
            height: 150px
        }

        .fb_dialog_content .dialog_footer {
            background: #f5f6f7;
            border: 1px solid #4a4a4a;
            border-top-color: #ccc;
            height: 40px
        }

        #fb_dialog_loader_close {
            float: left
        }

        .fb_dialog.fb_dialog_mobile .fb_dialog_close_icon {
            visibility: hidden
        }

        #fb_dialog_loader_spinner {
            animation: rotateSpinner 1.2s linear infinite;
            background-color: transparent;
            background-image: url(https://connect.facebook.net/rsrc.php/v3/yD/r/t-wz8gw1xG1.png);
            background-position: 50% 50%;
            background-repeat: no-repeat;
            height: 24px;
            width: 24px
        }

        @keyframes rotateSpinner {
            0% {
                transform: rotate(0deg)
            }

            100% {
                transform: rotate(360deg)
            }
        }

        .fb_iframe_widget {
            display: inline-block;
            position: relative
        }

        .fb_iframe_widget span {
            display: inline-block;
            position: relative;
            text-align: justify
        }

        .fb_iframe_widget iframe {
            position: absolute
        }

        .fb_iframe_widget_fluid_desktop,
        .fb_iframe_widget_fluid_desktop span,
        .fb_iframe_widget_fluid_desktop iframe {
            max-width: 100%
        }

        .fb_iframe_widget_fluid_desktop iframe {
            min-width: 220px;
            position: relative
        }

        .fb_iframe_widget_lift {
            z-index: 1
        }

        .fb_iframe_widget_fluid {
            display: inline
        }

        .fb_iframe_widget_fluid span {
            width: 100%
        }

        .fb_mpn_mobile_landing_page_slide_out {
            animation-duration: 200ms;
            animation-name: fb_mpn_landing_page_slide_out;
            transition-timing-function: ease-in
        }

        .fb_mpn_mobile_landing_page_slide_out_from_left {
            animation-duration: 200ms;
            animation-name: fb_mpn_landing_page_slide_out_from_left;
            transition-timing-function: ease-in
        }

        .fb_mpn_mobile_landing_page_slide_up {
            animation-duration: 500ms;
            animation-name: fb_mpn_landing_page_slide_up;
            transition-timing-function: ease-in
        }

        .fb_mpn_mobile_bounce_in {
            animation-duration: 300ms;
            animation-name: fb_mpn_bounce_in;
            transition-timing-function: ease-in
        }

        .fb_mpn_mobile_bounce_out {
            animation-duration: 300ms;
            animation-name: fb_mpn_bounce_out;
            transition-timing-function: ease-in
        }

        .fb_mpn_mobile_bounce_out_v2 {
            animation-duration: 300ms;
            animation-name: fb_mpn_fade_out;
            transition-timing-function: ease-in
        }

        .fb_customer_chat_bounce_in_v2 {
            animation-duration: 300ms;
            animation-name: fb_bounce_in_v2;
            transition-timing-function: ease-in
        }

        .fb_customer_chat_bounce_in_from_left {
            animation-duration: 300ms;
            animation-name: fb_bounce_in_from_left;
            transition-timing-function: ease-in
        }

        .fb_customer_chat_bounce_out_v2 {
            animation-duration: 300ms;
            animation-name: fb_bounce_out_v2;
            transition-timing-function: ease-in
        }

        .fb_customer_chat_bounce_out_from_left {
            animation-duration: 300ms;
            animation-name: fb_bounce_out_from_left;
            transition-timing-function: ease-in
        }

        .fb_invisible_flow {
            display: inherit;
            height: 0;
            overflow-x: hidden;
            width: 0
        }

        @keyframes fb_mpn_landing_page_slide_out {
            0% {
                margin: 0 12px;
                width: 100% - 24px
            }

            60% {
                border-radius: 18px
            }

            100% {
                border-radius: 50%;
                margin: 0 24px;
                width: 60px
            }
        }

        @keyframes fb_mpn_landing_page_slide_out_from_left {
            0% {
                left: 12px;
                width: 100% - 24px
            }

            60% {
                border-radius: 18px
            }

            100% {
                border-radius: 50%;
                left: 12px;
                width: 60px
            }
        }

        @keyframes fb_mpn_landing_page_slide_up {
            0% {
                bottom: 0;
                opacity: 0
            }

            100% {
                bottom: 24px;
                opacity: 1
            }
        }

        @keyframes fb_mpn_bounce_in {
            0% {
                opacity: .5;
                top: 100%
            }

            100% {
                opacity: 1;
                top: 0
            }
        }

        @keyframes fb_mpn_fade_out {
            0% {
                bottom: 30px;
                opacity: 1
            }

            100% {
                bottom: 0;
                opacity: 0
            }
        }

        @keyframes fb_mpn_bounce_out {
            0% {
                opacity: 1;
                top: 0
            }

            100% {
                opacity: .5;
                top: 100%
            }
        }

        @keyframes fb_bounce_in_v2 {
            0% {
                opacity: 0;
                transform: scale(0, 0);
                transform-origin: bottom right
            }

            50% {
                transform: scale(1.03, 1.03);
                transform-origin: bottom right
            }

            100% {
                opacity: 1;
                transform: scale(1, 1);
                transform-origin: bottom right
            }
        }

        @keyframes fb_bounce_in_from_left {
            0% {
                opacity: 0;
                transform: scale(0, 0);
                transform-origin: bottom left
            }

            50% {
                transform: scale(1.03, 1.03);
                transform-origin: bottom left
            }

            100% {
                opacity: 1;
                transform: scale(1, 1);
                transform-origin: bottom left
            }
        }

        @keyframes fb_bounce_out_v2 {
            0% {
                opacity: 1;
                transform: scale(1, 1);
                transform-origin: bottom right
            }

            100% {
                opacity: 0;
                transform: scale(0, 0);
                transform-origin: bottom right
            }
        }

        @keyframes fb_bounce_out_from_left {
            0% {
                opacity: 1;
                transform: scale(1, 1);
                transform-origin: bottom left
            }

            100% {
                opacity: 0;
                transform: scale(0, 0);
                transform-origin: bottom left
            }
        }

        @keyframes slideInFromBottom {
            0% {
                opacity: .1;
                transform: translateY(100%)
            }

            100% {
                opacity: 1;
                transform: translateY(0)
            }
        }

        @keyframes slideInFromBottomDelay {
            0% {
                opacity: 0;
                transform: translateY(100%)
            }

            97% {
                opacity: 0;
                transform: translateY(100%)
            }

            100% {
                opacity: 1;
                transform: translateY(0)
            }
        }
    </style>
</head>

<body class="body_fixed">
    <div class="body-inner">

        <header class="header">
            <div class="header-primary-holder"></div>
            <div class="header-primary">
                <div class="l-center">
                    <div class="header-side">
                        <?php
                        $ru_az = $lang == 1 ? "ru":"az";
                        $ru_az_num = $lang == 1 ? 2 : 1;
                        echo '<a class="lang-switcher lang-switcher_'.$ru_az.'" href="?lang='.$ru_az_num.'">'.$ru_az.'</a>'
                        
                        ?>
                    </div><a class="logo logo-oxu" href="./admin.php">oxu.az</a>
                    <div class="nav-toggle">Kateqoriyalar</div>
                </div>
            </div>
        </header>  