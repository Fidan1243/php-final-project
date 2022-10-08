<?php

require_once "../db.php";
require_once "../func.php";

$lang = isset($_GET["lang"]) ? $_GET["lang"] : (isset($_COOKIE['lang']) ? $_COOKIE['lang'] : 1);
setcookie('lang', $lang, time() + (86400 * 30), "/");
$page = isset($_GET["page"]) ? $_GET["page"] : getMainPage($lang, $conn);
include "header.php";
//checkLogin();
?>
<table>

    <td>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM `language` ORDER BY `name`");
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>
                            <td><a href="?lid=' . $row["id"] . '">' . $row["name"] . '</a></td>
                            <td>
                            <a onclick="ledit(' . $row["id"] . ',\'' . $row["name"] . '\');return false;"><i class="fa-regular fa-pen-to-square"></i></a>
                            <a href="?action=ldel&lid=' . $row["id"] . '"><i class="fa-regular fa-trash-can"></i></a>
                            </td>
                            </tr>';
        }
        ?>
        <tr>
            <form>
                <input type="hidden" id="laction" name="action" value="ladd" />
                <input type="hidden" id="lid" name="lid" value="<?= $lid ?>" />
                <td><input type="text" id="lname" name="lname" /></td>
                <td><input type="submit" value="Ok" /></td>
            </form>
        </tr>
    </td>
    <td>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM `category` WHERE `lang`=$lid ORDER BY `order`");
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr style="margin: 10px;">
                            <td><a href="?cid=' . $row["id"] . '&lid='.$lid.'">' . $row["name"] . '</a></td>
                            <td>
                            <a onclick="cedit(' . $row["id"] . ',\'' . $row["name"] . '\',\'' . $row["order"] . '\');return false;"><i class="fa-regular fa-pen-to-square"></i></a>
                            <a href="?action=cdel&cid=' . $row["id"] . '"><i class="fa-regular fa-trash-can"></i></a>
                            </td>
                            </tr>';
        }
        ?>
        <tr>
            <form>
                <input type="hidden" id="caction" name="action" value="cadd" />
                <input type="hidden" id="cid" name="cid" value="<?= $lid ?>" />
                <td><input type="text" id="cname" name="cname" /></td>
                <td><select name="lid">

                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM `language` ORDER BY `id`");
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
                        }
                        ?></td>
                </select>
                <td><input type="number" id="corder" name="corder" /></td>
                <td><input type="submit" value="Ok" /></td>
            </form>
    </td>
</table>
<hr />
<section class="news-list">
    <?php
    if($cid != ""){

        $_where = $cid != 34 && $cid != 33 ? "WHERE `category`=$cid" : "";
        
        $sql = "SELECT * from `news` $_where ORDER BY `date` DESC";
        $result = mysqli_query($conn, $sql);
        // "stats-like-active"
            echo '<div class="when" style="margin-bottom:5px;">
            <div class="when-date">
            <a href="../admin/news.add.php?cid='.$cid.'&lang='.$lid.'" class="date-day">ADD</a>
                            </div>
                            </div>';
        while ($row = mysqli_fetch_assoc($result)) {
            $like = $dislike = $active = ""; 
        echo '<div class="news-i"><a target="_blank" class="news-i-inner" href="../admin/news.php?newsid=' . $row["id"] . '&lang=' . $lang . '">
        <div class="news-i-img-container">
        <div class="news-i-img" style="background-image: url(../img/' . $row["img"] . ')"></div>
        </div>
        <div class="news-i-content" style="height: 125px;">
        <div class="when">
        <div class="when-date">
        <a href="?action=ndel&newsid='.$row["id"].'" class="date-day">X</a>
                        </div>
                        </div>
                        <div class="title">' . $row["title"] . '</div>
                        <div class="description"></div>
                    </div>
                    </a>
                </div>';
            }
            
        }
            
            ?>

</section>



</nav>

</div>
<footer></footer>

<script>
    const modal = document.getElementById("modal")

    function madd() {
        modal.style.display = "block"
    }

    function modalclose() {
        modal.style.display = "none"
    }

    function cedit(cid, cname, corder) {
        console.log(cid+"  "+ cname+"  "+corder);
        document.getElementById("caction").value = "cedit"
        document.getElementById("cid").value = cid
        document.getElementById("cname").value = cname
        document.getElementById("corder").value = corder
    }


    function ledit(lid, lname) {
        document.getElementById("laction").value = "ledit"
        document.getElementById("lid").value = lid
        document.getElementById("lname").value = lname
    }
</script>

<?php
include "footer.php";
?>