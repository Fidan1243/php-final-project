<?php

require_once "../db.php";
require_once "../func.php";

$lang = isset($_GET["lang"]) ? $_GET["lang"] : 1;
$page = isset($_GET["page"]) ? $_GET["page"] : getMainPage($lang, $conn);
include "header.php";
$resultm = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `news` WHERE `id`=$newsid"));
$time = strtotime($resultm["date"]);
$newformat = date('d',$time);
$newformatm = date('M',$time);
?>
<div class="page-content">
    <div class="l-center">
        <div class="news-container">
            <form  method="POST" action="../admin/admin.php" enctype="multipart/form-data">
            <input type="hidden" id="laction" name="action" value="nedit" />
            <input type="hidden" id="newsid" name="newsid" value="<?=$newsid?>" />

                <article class="news">
                <input type="file" name="image" accept="image/*" />

                        <?php
                            if($resultm["img"] != '') {
                                echo '<div ><img class="img_edit" src="../img/'.$resultm["img"].'" alt="" />
                                <a href="?action=imgdel&newsid='.$newsid.'">×</a>
                                </div>';
                            }
                        ?>
                <input style="width: 80%;" name="ntitle" class="medium-up" value="<?=$resultm["title"]?>"/>
                <div>
                    <select name="cid" style="margin-bottom: 10px;">

                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM `category` WHERE `lang`=$lang ORDER BY `id`");
                        while ($row = mysqli_fetch_assoc($result)) {
                            $selected = $row["id"] == $resultm["category"] ? "selected" : "";
                            echo '<option value="' . $row["id"] . '" '.$selected.' >' . $row["name"] . '</option>';
                        }
                        ?></td>
                </select>
                <div class="news-inner">

                        <textarea name="ntext" id="textarea"><?=$resultm["text"]?></textarea>
                </div>
                <input type="submit" value="OK">
            </article>
            </form>
            
        </div>
    </div>
    
</div>
 
<script src="https://kit.fontawesome.com/30908b1d2e.js" crossorigin="anonymous"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({selector:'textarea'});</script>

<?php
include "footer.php";
?>