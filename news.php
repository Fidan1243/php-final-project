<?php
require_once "db.php";
require_once "func.php";

$lang = isset($_GET["lang"]) ? $_GET["lang"] : 1;
$page = isset($_GET["page"]) ? $_GET["page"] : getMainPage($lang, $conn);
include "header.php";
$resultm = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `news` WHERE `id`=$newsid"));
$dislike = $like = "";
$selected_class = "stats-like-selected";
$like =isset($_COOKIE[$resultm["id"]]) ? ($_COOKIE[$resultm["id"]] != "like" ? $dislike= $selected_class: $like=$selected_class) : "";
$time = strtotime($resultm["date"]);
$newformat = date('d',$time);
$newformatm = date('F',$time);
    $resultm["view_count"] += 1;
    $sql = 'UPDATE `news` SET `view_count` = '.$resultm["view_count"].' WHERE `id`='.$newsid.'';
    mysqli_query($conn,$sql);
$img_Url = $resultm["img"] != '' ? $resultm["img"] : 'default.jpg'; 

?>
<div class="page-content">
    <div class="l-center">
        <div class="news-container">
            <article class="news">
                <div class="when" style="">
                    <div class="when-date">
                        <?php
                            echo '<div class="date-day">'.$newformat.'&nbsp;</div>
                            <div class="date-month">'.$newformatm.'</div>';
                        ?>
                    </div>
                </div><img alt="" width="620" height="413" class="news-img small-only" src="./img/<?=$img_Url?>"/>
                <div class="stats" style="">
                   <?php
                   echo'<a class="stats-i-container stats-like-active stats_likes '.$like.'" href="?newsid='.$resultm["id"].'&action=like"><div><span class="stats-i">'.$resultm["like_count"].'</span></div></a>
                   <a class="stats-i-container stats-like-active stats_dislikes '.$dislike.'" href="?newsid='.$resultm["id"].'&action=dislike"><div><span class="stats-i">'.$resultm["dislike_count"].'</span></div></a>'
                    ?>
                    <div class="stats-i-container stats_views"><span class="stats-i"><?=$resultm["view_count"]?></span></div>
                </div>
                <div class="article-counter" style="">




                </div>
                <div class="up-link up-link_visible" style="margin-bottom: 0px; left: 1122px;">yuxarı</div>
                <h1 class="medium-up"><?=$resultm["title"]?></h1><img alt="" class="news-img medium-up" src="../img/<?=$img_Url?>">
                <div class="actions-block">
                    <div class="dates-block">
                        <div class="date-block"><?php echo $newformat . " ".$newformatm?></div>
                    </div>
                    <div class="stats-i-container stats_views"><span class="stats-i"><?=$resultm["view_count"]?></span></div>
                    <div class="likes-block">
                    <?php
                   echo'<a class="stats-i-container stats-like-active stats_likes '.$like.'" href="?newsid='.$resultm["id"].'&action=like"><div><span class="stats-i">'.$resultm["like_count"].'</span></div></a>
                   <a class="stats-i-container stats-like-active stats_dislikes '.$dislike.'" href="?newsid='.$resultm["id"].'&action=dislike"><div><span class="stats-i">'.$resultm["dislike_count"].'</span></div></a>'
                    ?>
                    </div>
                    <div class="fonts-block">
                        <div class="resize resize_minus">
                            <div class="resize-inner"></div>
                        </div>
                        <div class="resize resize_plus">
                            <div class="resize-inner"></div>
                        </div>
                    </div>
                </div>
                <div class="news-inner">
                    <h1 class="small-only" style="font-size: 42px;"><?=$resultm["title"]?></h1>
                    <p style="font-size: 18px;"></p>
                    <div class="AdviadNativeVideo" style="max-width: 720px; font-size: 18px; position: relative; margin: auto; box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 85px inset; background-color: rgb(255, 255, 255);"></div>
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <?=$resultm["text"]?>
                </div>
            </article>
            
        </div>
    </div>
    
</div>
<?php
include "footer.php";
?>