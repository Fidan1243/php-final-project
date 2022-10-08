<?php

require_once "../db.php";
require_once "../func.php";

$lang = isset($_GET["lang"]) ? $_GET["lang"] : 1;
$page = isset($_GET["page"]) ? $_GET["page"] : getMainPage($lang, $conn);
include "header.php";

?>
<div class="page-content">
    <div class="l-center">
        <div class="news-container">
        <form  method="POST" action="../admin/admin.php" enctype="multipart/form-data">
            <input type="hidden" id="laction" name="action" value="nadd" />

                <article class="news">
                    <input type="file" name="image" accept="image/*" />
                <input style="width: 80%;" name="ntitle" class="medium-up"/>
                <div>

                    <input class="stats_views" name="nview" />
                    <select name="cid">

                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM `category` WHERE `lang`=$lang ORDER BY `id`");
                        while ($row = mysqli_fetch_assoc($result)) {
                            if($row["order"] != 1){
                                echo '<option value="' . $row["id"] . '" '.$selected.' >' . $row["name"] . '</option>';
                            }
                        }
                        ?></td>
                </select>
                <div class="news-inner">

                        <textarea name="ntext" id="textarea"></textarea>
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