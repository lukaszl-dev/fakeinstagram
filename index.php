<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type='text/css' href="style.css">
    <title>FakeInstagram</title>

    <!--FontAwsome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
</head>
<body>
    <nav>
        <div class="content logo">Instagram</div>
        <div class="content">
            <input class="look" name='search' type="text" placeholder='Szukaj'>
            <i class="fa-solid fa-magnifying-glass"></i>
        </div>
        <div class="content">
            <div class="icons iconcontent">
                <i class="fa-solid fa-house"></i>
                <i class="fa-solid fa-paper-plane"></i>
                <i class="fa-solid fa-plus"></i>
                <i class="fa-solid fa-compass"></i>
                <i class="fa-regular fa-heart"></i>
                <i class="fa-solid fa-user"></i>
            </div>
        </div>
    </nav>
    <header>
        <div class="relations">
            <div class="relation"><img src="img/html-1.png" loading='lazy' alt="Relacja 1"></div>
            <div class="relation"><img src="img/html-1.png" loading='lazy' alt="Relacja 2"></div>
            <div class="relation"><img src="img/html-1.png" loading='lazy' alt="Relacja 3"></div>
            <div class="relation"><img src="img/html-1.png" loading='lazy' alt="Relacja 4"></div>
            <div class="relation"><img src="img/html-1.png" loading='lazy' alt="Relacja 5"></div>
        </div>
    </header>
    <?php
        $db = new mysqli('localhost', 'root', '', 'fakeinstagram');
        $sql = "SELECT * FROM posts  ORDER BY timestamp DESC";
        $result = $db->query($sql);
        while($row = $result->fetch_assoc()) {
            /* Convert date */
            $phpdate = strtotime($row["timestamp"]);
            $data = date("H:i d.m.Y", $phpdate);
            /* Write Article's */
            echo '<article> 
                <div class="box">
                    <div class="people">
                        <div class="people-img"><img src="img/html-1.png" loading="lazy" alt="Relacja 1"></div> 
                        <div class="people-title">'.$row['author'].'</div>
                        <div class="people-interact">...</div>
                    </div>
                    <div class="post-img">
                        <img src="'.$row["img"].'" loading="lazy" alt="Post">
                        <div class="post-interact">
                            <div class="interact-icons">
                                <i class="fa-solid fa-heart"></i>
                                <i class="fa-regular fa-comment"></i>
                                <i class="fa-solid fa-paper-plane"></i>
                            </div>
                            <div>
                                <p class="like">Lubi to '.$row["likes"].' użytkowników!</p>
                            </div>
                            <div>
                                <p class="titlet"><strong>'.$row["author"].':</strong> No to w drogę...</p>
                            </div> 
                            <div>
                                <p class="timep">'.$data.'</p>
                            </div>
                            <div> 
                                <p class="commentnumber"> Liczba komentarzy: ';
                            // Get number of comments 
                            $sql2 = "SELECT * FROM comments";
                            $resultt = $db->query($sql2);
                            $ilosc = 0;
                            while($row2 = $resultt->fetch_assoc()) {
                                if($row2['id'] == $row['id']){
                                    $ilosc = mysqli_num_rows($resultt);
                                    echo $ilosc;
                                }
                            }
                            echo '</div>
                            </div>
                        </div>
                        <div class="comment">
                            <div class="comment-emoji">
                                <i class="fa-regular fa-face-grin"></i>
                                <div class="comment-text">
                                    <input type="text" name="commenti" placeholder="Dodaj komentarz...">
                                </div>
                                <div class="comment-send">
                                    Opublikuj
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>';
        }
        $db -> close();
    ?>
    <article>
        <div class="box">
            <div class="people">
                <div class="people-img"><img src="img/html-1.png" loading='lazy' alt="Relacja 1"></div> 
                <div class="people-title">Łukasz Ligocki</div>
                <div class="people-interact">...</div>
            </div>
            <div class="post-img">
                <img src="img/html-1.png" loading='lazy' alt="Post">
                <div class="post-interact">
                    <div class="interact-icons">
                        <i class="fa-regular fa-heart"></i>
                        <i class="fa-regular fa-comment"></i>
                        <i class="fa-solid fa-paper-plane"></i>
                    </div>
                    <div>
                        <p class="like">Lubi to 10 użytkowników!</p>
                    </div>
                    <div>
                        <p class="titlet"><strong>Łukasz Ligocki:</strong> No to w drogę...</p>
                    </div> 
                    <div>
                        <p class="timep">10:19 02.05.2022</p>
                    </div>
                    <div> 
                        <p class="commentnumber"> Liczba komentarzy: 0
                    </div>
                </div>
                <div class="comment">
                    <div class="comment-emoji">
                        <i class="fa-regular fa-face-grin"></i>
                        <div class="comment-text">
                            <input type='text' name='commenti' placeholder='Dodaj komentarz...'>
                        </div>
                        <div class="comment-send">
                            Opublikuj
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
    <script src="script.js"></script>
</body>
</html> 