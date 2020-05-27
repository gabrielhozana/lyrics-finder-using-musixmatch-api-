<?php
    $r_link = "https://api.musixmatch.com/ws/1.1/";    
    $apikey = "apikey=6f326213f257fef638082b0f358ff637";       
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Directing Template">
    <meta name="keywords" content="Directing, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Find my Lyrics!</title>
    <link rel="icon" href="img/icon.png">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/barfiller.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <!-- <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="img/logo.png" alt=""></a>
                    </div>
                </div> -->
                <div class="col-lg-9 col-md-9">
                    <div class="header__nav">
                        <nav class="header__menu mobile-menu">
                            <ul>
                                <li class="active"><a href="./index.php">Home</a></li>
                                <li><a href="#">Genres</a></li>
                                <li><a href="#">Albums</a></li>
                                <li><a href="#">Categories</a></li>
                                <li><a href="#">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="#">About</a></li>
                                        <!-- <li><a href="./listing-details.html">Listing Details</a></li> -->
                                        <li><a href="#">Blog Details</a></li>
                                        <li><a href="#">Contact</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Blog</a></li>
                                <!-- <li><a href="#">Shop</a></li> -->
                            </ul>
                        </nav>
                        <!-- <div class="header__menu__right">
                            <a href="#" class="primary-btn"><i class="fa fa-plus"></i>Add Listing</a>
                            <a href="#" class="login-btn"><i class="fa fa-user"></i></a>
                        </div> -->
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero set-bg" data-setbg="img/hero/bg2.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero__text">
                        <div class="section-title">
                            <h2>Discover The Best Music Lyrics for You</h2>
                            <!-- <p>1.118.940.376 The best service package is waiting for you</p> -->
                        </div>
                        <div class="hero__search__form" id="searchArea">
                            <form action="index.php" method="get" name="cari">
                                <input type="text" name="pencarian" placeholder="Temukan Lirik Lagumu Disini!" style="width: 62.5%">
                                <div class="select__option">
                                    <select name="pilihan">
                                        <option id="artistLyric" value="lirik">Lirik Lagu</option>
                                        <option id="artistTitle" value="judul">Judul Lagu</option>
                                        <option id="artistSearch" value="penyanyi">Nama Penyanyi</option>
                                    </select>
                                </div>

                                <button type="submit" onclick="getLyrics()">Search Now</button>
                            </form>
                        </div>
                        <!-- <ul class="hero__categories__tags">
                            <li><a href="#"><img src="img/hero/cat-1.png" alt=""> Restaurent</a></li>
                            <li><a href="#"><img src="img/hero/cat-2.png" alt=""> Food & Drink</a></li>
                            <li><a href="#"><img src="img/hero/cat-3.png" alt=""> Shopping</a></li>
                            <li><a href="#"><img src="img/hero/cat-4.png" alt=""> Beauty</a></li>
                            <li><a href="#"><img src="img/hero/cat-5.png" alt=""> Hotels</a></li>
                            <li><a href="#"><img src="img/hero/cat-6.png" alt=""> All Categories</a></li>
                        </ul> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <div id="lyrics">
        
    <!-- Lyric Result Section Begin -->
    <?php
    if (isset($_GET['pencarian'])) {
    echo'
        <div class="newslatter" style="background-color: white;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="newslatter__text" id="header1">
    ';
                            if (isset($_GET['pencarian'])) {
                            echo'<h3>Search Result</h3>';
                            echo '<p><b>';
                                echo "For ";
                                print_r($_GET['pencarian']);
                            echo'</b></p>';
                            }
    echo'
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8">                                      
                    </div>
                </div>

                <div class="row" style="margin-top: 30px">
                    <div class="col-lg-2 col-md-2">                    
                    </div>
                    <div class="col-lg-10 col-md-10">
    ';
                        if (isset($_GET['pilihan'])) {

                            if ($_GET['pilihan'] == "penyanyi") {

                                $pencarian = $_GET['pencarian'];
                                $true_pencarian = preg_replace('/\s+/', '+', $pencarian);
                                $s_penyayi = "artist.search?q_artist={$true_pencarian}&page_size=1";
                                
                                $link = "{$r_link}{$s_penyayi}&{$apikey}";

                                $curl = curl_init();
                                // Set some options - we are passing in a useragent too here
                                curl_setopt_array($curl, [
                                    CURLOPT_RETURNTRANSFER => 1,
                                    CURLOPT_URL => $link,
                                    CURLOPT_USERAGENT => 'Mozilla'
                                    ]); 


                                // Send the request & save response to $resp
                                $resp = curl_exec($curl);
                                // Close request to clear up some resources
                                curl_close($curl);


                                $response = json_decode($resp, TRUE);

                               // echo "<pre>";
                                // print_r($response['message']['body']['artist_list'][0]['artist']['artist_name']);
                               // echo "</pre>";
                                if ($response['message']['header']['status_code'] == 200) {
                                    foreach ($response['message']['body']['artist_list'] as $hasil) {
                                        // echo "<pre>";
                                        // var_dump($hasil);
                                        // echo "</pre>";
                                        echo 
                                        '
                                            <a href="index.php?artist_id='.$hasil['artist']['artist_id'].'&artist_name='.$hasil['artist']['artist_name'].'" class="blog__sidebar__recent__item">
                                                <div class="blog__sidebar__recent__item__pic">
                                                    <img src="img/blog/people1.png" alt="">
                                                </div>
                                                <div class="blog__sidebar__recent__item__text">
                                                <span><i class=""></i> '.$hasil['artist']['artist_country'].'</span>
                                                <h6>'.$hasil['artist']['artist_name'].'</h6>
                                                <p><i class="" href="'.$hasil['artist']['artist_twitter_url'].'"></i></p>
                                                </div>
                                            </a>
                                        ';   
                                    }
                                } else {
                                    print_r("<h2>UH OH! kami tidak punya lirik lagu tersebut :(</h2>");
                                }          


                            } else if ($_GET['pilihan'] == "judul") {
                                
                                $pencarian = $_GET['pencarian'];
                                $true_pencarian = preg_replace('/\s+/', '+', $pencarian);


                                $s_judul = "track.search?q_track={$true_pencarian}&page=1&s_track_rating=desc";

                                $link = "{$r_link}{$s_judul}&{$apikey}";


                                $curl = curl_init();
                                // Set some options - we are passing in a useragent too here
                                curl_setopt_array($curl, [
                                    CURLOPT_RETURNTRANSFER => 1,
                                    CURLOPT_URL => $link,
                                    CURLOPT_USERAGENT => 'Microsoft Edge'
                                    ]); 


                                // Send the request & save response to $resp
                                $resp = curl_exec($curl);
                                // Close request to clear up some resources
                                curl_close($curl);

                                $response = json_decode($resp, TRUE);
                                // print_r($response['message']['body']['track_list']);

                                if ($response['message']['header']['status_code'] == 200) {
                                    foreach ($response['message']['body']['track_list'] as $hasil) {
                                        // echo "<pre>";
                                        // var_dump($hasil);
                                        // echo "</pre>";
                                        
                                        echo 
                                        '
                                            <a href="index.php?track_id='.$hasil['track']['track_id'].'&music='.$hasil['track']['track_name'].'" class="blog__sidebar__recent__item">
                                                <div style="display: none">
                                                    <p>'.$hasil['track']['track_id'].'</p>
                                                </div>
                                                <div class="blog__sidebar__recent__item__pic">
                                                    <img src="img/blog/albums2.jpg" alt="">
                                                </div>
                                                <div class="blog__sidebar__recent__item__text">
                                                <span><i class="fa fa-play-circle"></i> '.$hasil['track']['album_name'].'</span>
                                                <h6>'.$hasil['track']['artist_name'].'</h6>
                                                <p><i class="">'.$hasil['track']['track_name'].'</i></p>
                                                </div>
                                            </a>
                                        ';   
                                    }
                                } else {
                                    print_r("<h2>UH OH! kami tidak punya lirik lagu tersebut :(</h2>");
                                }                             
                            }else if ($_GET['pilihan'] == "lirik") {
                                
                                $pencarian = $_GET['pencarian'];
                                $true_pencarian = preg_replace('/\s+/', '+', $pencarian);


                                $s_judul = "matcher.lyrics.get?q_track={$true_pencarian}";

                                $link = "{$r_link}{$s_judul}&{$apikey}";


                                $curl = curl_init();
                                // Set some options - we are passing in a useragent too here
                                curl_setopt_array($curl, [
                                    CURLOPT_RETURNTRANSFER => 1,
                                    CURLOPT_URL => $link,
                                    CURLOPT_USERAGENT => 'Microsoft Edge'
                                    ]); 


                                // Send the request & save response to $resp
                                $resp = curl_exec($curl);
                                // Close request to clear up some resources
                                curl_close($curl);

                                $response = json_decode($resp, TRUE);

                                if ($response['message']['header']['status_code'] == 200) {
                                    echo "<pre>";
                                    print_r($response['message']['body']['lyrics']['lyrics_body']);
                                    echo "</pre>";
                                } else {
                                    print_r("<h2>UH OH! kami tidak punya lirik lagu tersebut :(</h2>");
                                }
                             
                            }
                        }
    echo'
                    </div>                
                </div>
            </div>
        </div>
    ';
    }if (isset($_GET['track_id'])) {
    echo'
        <div class="newslatter" style="background-color: white;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="newslatter__text">
    ';
                            if (isset($_GET['track_id'])) {
                            echo'<h3>Lyric Result</h3>';
                            echo '<p><b>';
                                echo "For ";
                                print_r($_GET['music']);
                            echo'</b></p>';
                            }
    echo'
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8">                                      
                    </div>
                </div>

                <div class="row" style="margin-top: 30px">
                    <div class="col-lg-2 col-md-2">                    
                    </div>
                    <div class="col-lg-10 col-md-10">
    ';

                        if (isset($_GET['track_id'])) {
                               
                            $track_id = $_GET['track_id'];
                            $true_track_id = preg_replace('/\s+/', '+', $track_id);


                            $s_track_id = "track.lyrics.get?track_id={$true_track_id}";

                            $link = "{$r_link}{$s_track_id}&{$apikey}";


                            $curl = curl_init();
                            // Set some options - we are passing in a useragent too here
                            curl_setopt_array($curl, [
                                CURLOPT_RETURNTRANSFER => 1,
                                CURLOPT_URL => $link,
                                CURLOPT_USERAGENT => 'Microsoft Edge'
                            ]); 


                            // Send the request & save response to $resp
                            $resp = curl_exec($curl);
                            // Close request to clear up some resources
                            curl_close($curl);

                            $response = json_decode($resp, TRUE);
                            // print_r($response['message']['body']['track_list']);

                            if ($response['message']['header']['status_code'] == 200) {
                                echo "<pre>";
                                print_r($response['message']['body']['lyrics']['lyrics_body']);
                                echo "</pre>";
                            } else {
                                print_r("<h2>UH OH! kami tidak punya lirik lagu tersebut :(</h2>");
                            }                                                         
                        }
    echo'
                    </div>                
                </div>
            </div>
        </div>
    ';
    }if (isset($_GET['artist_id'])) {
    echo'
        <div class="newslatter" style="background-color: white;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="newslatter__text">
    ';
                            if (isset($_GET['artist_id'])) {
                            echo'<h3>Album Result</h3>';
                            echo '<p><b>';
                                echo "For ";
                                print_r($_GET['artist_name']);
                            echo'</b></p>';
                            }
    echo'
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8">                                      
                    </div>
                </div>

                <div class="row" style="margin-top: 30px">
                    <div class="col-lg-2 col-md-2">                    
                    </div>
                    <div class="col-lg-10 col-md-10">
    ';

                        if (isset($_GET['artist_id'])) {
                               
                            $artist_id = $_GET['artist_id'];
                            $true_artist_id = preg_replace('/\s+/', '+', $artist_id);


                            $s_artist_id = "artist.albums.get?artist_id={$true_artist_id}&s_release_date=desc&g_album_name=5";

                            $link = "{$r_link}{$s_artist_id}&{$apikey}";


                            $curl = curl_init();
                            // Set some options - we are passing in a useragent too here
                            curl_setopt_array($curl, [
                                CURLOPT_RETURNTRANSFER => 1,
                                CURLOPT_URL => $link,
                                CURLOPT_USERAGENT => 'Microsoft Edge'
                            ]); 


                            // Send the request & save response to $resp
                            $resp = curl_exec($curl);
                            // Close request to clear up some resources
                            curl_close($curl);

                            $response = json_decode($resp, TRUE);
                            // print_r($response['message']['body']['track_list']);

                            if ($response['message']['header']['status_code'] == 200) {
                                foreach ($response['message']['body']['album_list'] as $hasil) {
                                    echo 
                                    '
                                        <a href="index.php?album_id='.$hasil['album']['album_id'].'&album='.$hasil['album']['album_name'].'" class="blog__sidebar__recent__item">
                                            <div style="display: none">
                                                <p>'.$hasil['album']['album_id'].'</p>
                                            </div>
                                            <div class="blog__sidebar__recent__item__pic">
                                                <img src="img/blog/albums2.jpg" alt="">
                                            </div>
                                            <div class="blog__sidebar__recent__item__text">
                                                <span><i class="fa fa-play-circle"></i> '.$hasil['album']['album_name'].'</span>
                                                <h6>'.$hasil['album']['artist_name'].'</h6>
                                                <p><i class="fa fa-date">'.$hasil['album']['album_release_date'].'</i></p>
                                            </div>
                                        </a>
                                    ';   
                                    }
                            } else {
                                print_r("<h2>UH OH! kami tidak punya lirik lagu tersebut :(</h2>");
                            }                                                         
                        }
    echo'
                    </div>                
                </div>
            </div>
        </div>
    ';
    }if (isset($_GET['album_id'])) {
    echo'
        <div class="newslatter" style="background-color: white;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="newslatter__text">
    ';
                            if (isset($_GET['album_id'])) {
                            echo'<h3>Music List Result</h3>';
                            echo '<p><b>';
                                echo "For ";
                                print_r($_GET['album']);
                            echo'</b></p>';
                            }
    echo'
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8">                                      
                    </div>
                </div>

                <div class="row" style="margin-top: 30px">
                    <div class="col-lg-2 col-md-2">                    
                    </div>
                    <div class="col-lg-10 col-md-10">
    ';

                        if (isset($_GET['album_id'])) {
                               
                            $album_id = $_GET['album_id'];
                            $true_album_id = preg_replace('/\s+/', '+', $album_id);


                            $s_album_id = "album.tracks.get?album_id={$true_album_id}&page=1&page_size=2";

                            $link = "{$r_link}{$s_album_id}&{$apikey}";


                            $curl = curl_init();
                            // Set some options - we are passing in a useragent too here
                            curl_setopt_array($curl, [
                                CURLOPT_RETURNTRANSFER => 1,
                                CURLOPT_URL => $link,
                                CURLOPT_USERAGENT => 'Microsoft Edge'
                            ]); 


                            // Send the request & save response to $resp
                            $resp = curl_exec($curl);
                            // Close request to clear up some resources
                            curl_close($curl);

                            $response = json_decode($resp, TRUE);
                            // print_r($response['message']['body']['track_list']);

                            if ($response['message']['header']['status_code'] == 200) {
                                foreach ($response['message']['body']['track_list'] as $hasil) {
                                    echo 
                                    '
                                        <a href="index.php?track_id='.$hasil['track']['track_id'].'&music='.$hasil['track']['track_name'].'" class="blog__sidebar__recent__item">
                                            <div style="display: none">
                                                <p>'.$hasil['track']['track_id'].'</p>
                                            </div>
                                            <div class="blog__sidebar__recent__item__pic">
                                                <img src="img/blog/albums2.jpg" alt="">
                                            </div>
                                            <div class="blog__sidebar__recent__item__text">
                                                <span><i class="fa fa-play-circle"></i> '.$hasil['track']['album_name'].'</span>
                                                <h6>'.$hasil['track']['track_name'].'</h6>
                                                <p><i class="">'.$hasil['track']['artist_name'].'</i></p>
                                            </div>
                                        </a>
                                    ';   
                                    }
                            } else {
                                print_r("<h2>UH OH! kami tidak punya lirik lagu tersebut :(</h2>");
                            }                                                         
                        }
    echo'
                    </div>                
                </div>
            </div>
        </div>
    ';
    }
    ?>

    <section class="newslatter">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="newslatter__text">
                        <h3>Subscribe Newsletter</h3>
                        <p>Subscribe to our newsletter and don’t miss anything</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <form action="#" class="newslatter__form">
                        <input type="text" placeholder="Your email">
                        <button type="submit">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Lyric Result Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer__about">
                        <!-- <div class="footer__about__logo">
                            <a href="./index.html"><img src="img/footer-logo.png" alt=""></a>
                        </div> -->
                        <p>Dibuat dengan sepenuh hati dengan dibantu kerjasama dengan anggota Kelompok 7 :)</p>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1 col-md-6">
                    <div class="footer__address">
                        <ul>
                            <li>
                                <span>Call Us:</span>
                                <p>(+12) 345-678-910</p>
                            </li>
                            <li>
                                <span>Email:</span>
                                <p>cyber.w1bu404@gmail.com</p>
                            </li>
                            <li>
                                <span>Fax:</span>
                                <p>(+12) 345-678-910</p>
                            </li>
                            <li>
                                <span>Connect Us:</span>
                                <div class="footer__social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-skype"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6">
                    <div class="footer__widget">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Support</a></li>
                            <li><a href="#">How it work</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Blog</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Sign In</a></li>
                            <li><a href="#">How it Work</a></li>
                            <li><a href="#">Advantages</a></li>
                            <li><a href="#">Direo App</a></li>
                            <li><a href="#">Packages</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p> Copyright &copy; 
                            <script>
                                document.write(new Date().getFullYear());
                            </script> 
                            All Rights Reserved & Made with <i class="fa fa-heart" aria-hidden="true"></i> in <b>Makassar</b> by Kelompok 7 | D4 Teknik Komputer dan Jaringan</p>
                        </div>
                        <div class="footer__copyright__links">
                            <div class="footer__copyright__text">
                                This template from <a href="https://colorlib.com" target="_blank"><b>Colorlib</b></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.barfiller.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript">
    
        function getLyrics(){

        var artistSearch = document.getElementById("artistSearch").value;
        document.getElementById("lyrics").textContent = "";
          $.ajax({
            type: "GET",
            data: {
                apikey:"6f326213f257fef638082b0f358ff637",
                q_artist: artistSearch,
                format:"jsonp",
                callback:"jsonp_callback"
            },
            url: "https://api.musixmatch.com/ws/1.1/track.search?q_artist=",
            dataType: "jsonp",
            jsonpCallback: 'jsonp_callback',
            contentType: 'application/json',
            success: function(data) {
                console.log(data); 
                console.log(data.message.body.track_list[''])
                console.log(data.message.body.track_list[''].track.lyrics_id)
                var rand = data.message.body.track_list[Math.floor(Math.random() * data.message.body.track_list.length)];
                console.log(rand.track.track_id)
                var thisTrack = (rand.track.track_id)
                var thisPic = rand.track.album_coverart_350x350;
                console.log(thisPic)

                var p = document.createElement("p");
                p.textContent = thisTrack;
                p.id = thisTrack;

                var img = document.createElement("img")
                img.setAttribute("src",thisPic)

                document.getElementById("lyrics").appendChild(p).style.opacity = 0;
                document.getElementById("lyrics").appendChild(img);
                document.getElementById("ghost").click();

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }    
          });
         };


         function getLyricsNow(){
            var trackId = document.getElementById("lyrics").textContent;
            console.log(trackId)
          $.ajax({
            type: "GET",
            data: {
                apikey:"6f326213f257fef638082b0f358ff637",
                q_track: trackId,
                format:"jsonp",
                callback:"jsonp_callback"
            },
            url: "https://api.musixmatch.com/ws/1.1/track.lyrics.get",
            dataType: "jsonp",
            jsonpCallback: 'jsonp_callback',
            contentType: 'application/json',
            success: function(data) {
               console.log(data); console.log(data.message.body.lyrics.lyrics_body); 
              var lyricsBody = data.message.body.lyrics.lyrics_body.split(/\s+/).slice(0,100).join(" ")+ "...";
               
                var j = document.createElement("p")
                j.textContent = lyricsBody
                document.getElementById("lyrics").appendChild(j)
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }    
          });
         };
    </script>
</body>
</html>
