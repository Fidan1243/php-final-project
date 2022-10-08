<div class="page-content">
    <div class="l-center">
        
        <section class="news-list">
            <?php
                $_where_once = $lang ==1 ? "WHERE `category`<16" :"WHERE `category`>=16"; 
                $_where = $page != 34 && $page != 33 ? "AND `category`=$page" : "";

                $sql = "SELECT * from `news` $_where_once $_where ORDER BY `date` DESC";
                $result = mysqli_query($conn,$sql);
                // "stats-like-active"
                while ($row = mysqli_fetch_assoc($result)) {
                    $img_Url = $row["img"] != '' ? $row["img"] : 'default.jpg'; 
                    $like =$dislike=$active ="";
                    $time = strtotime($row["date"]);
                    $newformat = date('d',$time);
                    $newformatm = date('M',$time);
                    $format = 'H:i';
                    $date = DateTime::createFromFormat($format, $time);
                    isset($_COOKIE[$row["id"]])? ($_COOKIE[$row["id"]]=="like" ? $like = "stats-like-selected" : $dislike = "stats-like-selected" ) :$active = "stats-like-active";
                    echo '<div class="news-i"><a target="_blank" class="news-i-inner" href="../project/news.php?newsid='.$row["id"].'&lang='.$lang.'">
                    <div class="news-i-img-container">
                        <div class="news-i-img" style="background-image: url(img/'.$img_Url.')"></div>
                    </div>
                    <div class="news-i-content" style="height: 125px;">
                        <div class="when">
                            <div class="when-date">
                                <div class="date-day">'.$newformat.'&nbsp;</div>
                                <div class="date-month">'.$newformatm.'</div>
                                <div class="date-year">2022</div>
                            </div>
                            <div class="when-time">'.$date.'</div>
                        </div>
                        <div class="title">'.$row["title"].'</div>
                        <div class="description"></div>
                    </div>
                </a>
                <div class="stats">
                <a class="stats-i-container '.$active.' stats_likes '.$like.'" href="?newsid='.$row["id"].'&action=like"><div><span class="stats-i">'.$row["like_count"].'</span></div></a>
                <a class="stats-i-container '.$active.' stats_dislikes '.$dislike.'" href="?newsid='.$row["id"].'&action=dislike"><div><span class="stats-i">'.$row["dislike_count"].'</span></div></a>
                    <div class="stats-i-container stats_views"><span class="stats-i">'.$row["view_count"].'</span></div>
                </div>
            </div>';
                }

            
            ?>
            
        </section>
    </div>
</div>

</div>