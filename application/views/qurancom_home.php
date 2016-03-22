<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>NATIONAL QURANIC (RECITATION) COMPETITION</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <link href="assets/css/bootstrap.css" rel='stylesheet' type='text/css'/>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Custom Theme files -->
    <link href="assets/css/style.css" rel='stylesheet' type='text/css'/>
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!--webfont-->
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="assets/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="assets/js/login.js"></script>
    <script src="assets/js/jquery.easydropdown.js"></script>
    <!------ Light Box ------>
    <link rel="stylesheet" href="assets/css/swipebox.css">
    <script src="assets/js/jquery.swipebox.min.js"></script>
    <script type="text/javascript">
        jQuery(function ($) {
            $(".swipebox").swipebox();
        });
    </script>
    <!------ Eng Light Box ------>
    <script src="assets/js/wow.min.js"></script>
    <link href="assets/css/animate.css" rel='stylesheet' type='text/css'/>
    <script>
        new WOW().init();
    </script>
    <link href="http://vjs.zencdn.net/4.12/video-js.css" rel="stylesheet">
    <style type="text/css">
        .vjs-default-skin .vjs-play-progress,
        .vjs-default-skin .vjs-volume-level {
            background-color: #fafafa
        }

        .vjs-default-skin .vjs-control-bar {
            font-size: 30%
        }
    </style>
    <script type="text/javascript" src="assets/js/myjs.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>


</head>
<body>

<?php //var_dump($videoPack[0]['video_id']); ?>
<script>

    $('.bs-example-modal-lg').on('shown.bs.modal', function () {
        $('#myInput').focus()
    })
</script>


<div class="header">
    <div class="col-sm-8 header-left">
        <div class="logo">
            <a href="#"><img src="assets/images/logo.png" alt=""/></a>
        </div>
        <div class="menu">
            <a class="toggleMenu" href="#"><img src="assets/images/nav.png" alt=""/></a>
            <ul class="nav" id="nav">
                <li><a href="#">Eligibility</a></li>
                <li><a href="#">Competition Rules</a></li>
                <li><a href="#">Competition Prizes </a></li>
                <div class="clearfix"></div>
            </ul>
            <script type="text/javascript" src="assets/js/responsive-nav.js"></script>
        </div>
        <!-- start search-->
        <div class="search-box" style="display:none">
            <div id="sb-search" class="sb-search">
                <form>
                    <input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search"
                           id="search">
                    <input class="sb-search-submit" type="submit" value="">
                    <span class="sb-icon-search"> </span>
                </form>
            </div>
        </div>
        <!----search-scripts---->
        <script src="assets/js/classie.js"></script>
        <script src="assets/js/uisearch.js"></script>
        <script>
            new UISearch(document.getElementById('sb-search'));
        </script>
        <!----//search-scripts---->
        <div class="clearfix"></div>
    </div>
    <div class="col-sm-4 header_right">
        <div id="loginContainer">
            <a href="#" id="loginButton" style="margin-right:10px"><img src="assets/images/login.png"><span>Login</span></a>
            <a href="#" id="registerButton" style="cursor: pointer;"><img src="assets/images/register.png"><span>Registration</span></a>
            <a href="<?php echo site_url('users/logout'); ?>" id="logoutButton" style="display: none"><img
                    src="assets/images/login.png"><span>Logout</span></a>

            <div id="loginBox">
                <form id="loginForm" action="<?php echo base_url('users/login'); ?>" method="post">

                    <fieldset id="body">

                        <fieldset>
                            <label for="email">Email Address</label>
                            <input type="text" name="email" id="email" required>
                        </fieldset>
                        <fieldset>
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" required>
                        </fieldset>
                        <input type="submit" id="login" value="Sign in">
                        <label for="checkbox"><input type="checkbox" id="checkbox"> <i>Remember me</i></label>
                    </fieldset>
                    <span><a href="#"> Forgot your password?</a>    </span>

                </form>
            </div>
            <div id="registerBox">
                <form id="registerForm" method="post" action="<?php echo base_url('users/register'); ?>">
                    <fieldset id="bodyR">

                        <fieldset>
                            <label for="fullname">Full Name</label>
                            <input type="text" name="fullname" id="fullname" required>
                        </fieldset>
                        <fieldset>
                            <label for="phoneno">Phone Number</label>
                            <input type="text" name="phoneno" id="phoneno" required>
                        </fieldset>
                        <fieldset><label for="email">Email Address</label>
                            <input type="text" name="email" id="email" required>
                        </fieldset>
                        <fieldset>
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" required>
                        </fieldset>
                        <fieldset>
                            <label for="password1">Password</label>
                            <input type="password" name="password1" id="password1" required>
                        </fieldset>
                        <fieldset>
                            <label for="password2">Confirm Password</label>
                            <input type="password" name="password2" id="password2" required>
                        </fieldset>
                        <input type="submit" id="register" value="Sign up">

                    </fieldset>

                </form>
            </div>
        </div>


    </div>
    <div class="clearfix"></div>
</div>


<div class="banner">

    <div class="myNotify" align="center">

        <?php



        if ($this->session->flashdata('file_success')) {
            echo " <h1><p class='text-success text-center'>" . $this->session->flashdata('file_success') . "</p></h1>";


        }
        if ($this->session->flashdata('file_error')) {
            echo " <h1><font color='red'><p>" . $this->session->flashdata('file_error') . "</p></font></h1>";


        }
        if ($this->session->flashdata('login_success')) {
            echo " <h1><p class='text-success text-center'>" . $this->session->flashdata('login_success') . "</p></h1>";


        }
        if ($this->session->flashdata('login_failed')) {
            echo " <h1><p class='text-danger text-center'>" . $this->session->flashdata('login_failed') . "</p></h1>";
        }

        if ($this->session->flashdata('registration_failed')) {
            echo " <h1><p class='text-danger text-center'>" . $this->session->flashdata('registration_failed') . "</p></h1>";
        }
        if ($this->session->flashdata('registration_success')) {
            echo " <h1><p class='text-success text-center'>" . $this->session->flashdata('registration_success') . "</p></h1>";


        }


        ?>

    </div>

    <div class="container_wrap">

        <div class="dropdown-buttons" style="display:none">
            <div class="dropdown-button">

            </div>
            <div class="dropdown-button" style="display:none">
                <select class="dropdown" tabindex="9" data-settings='{"wrapperClass":"flat"}'>
                    <option value="0">Education</option>
                    <option value="1">tempor</option>
                    <option value="2">congue</option>
                    <option value="3">mazim</option>
                    <option value="4">mutationem</option>
                    <option value="5">hendrerit</option>
                    <option value="5"></option>
                    <option value="5"></option>
                </select>
            </div>
        </div>

        <div id="_videoUpload" style="display:none">


            <h1>Upload Your Recitation Video</h1> <br>

            <?php echo form_open_multipart('users/upload'); ?>

            <div class="contact_btn">
                <input type="file" name="video" size="20" onclick="maxsizepop()"/>

                <label class="btn1 btn-2 btn-2g">
                    <input name="submit" type="submit" id="uploadsubmit" value="Upload">
                </label>

            </div>
            <input style="display:none" type="text" value="Keyword, name, date, ..." onfocus="this.value = '';"
                   onblur="if (this.value == '') {this.value = 'Keyword, name, date, ...';}">

            </form>
        </div>

        <div id="_videoUploadMsg">
            <br>

            <h1>Learn from islamic experts through videos</h1> <br> <br>

            <div class="myDisplay">
                <h1>Login into your account to upload your competition videos</h1>
            </div>
        </div>

        <div class="clearfix"></div>
    </div>
</div>
<div class="content_top">
    <div class="container">
        <div class="col-md-2 filter_grid" style="width:50px">
            <ul class="filter">
                <li><a href=""> <i class="icon2"> </i> </a></li>
            </ul>
        </div>
        <div class="col-md-8 bottom_nav">
            <div class="content_menu">
                <ul>
                    <li class="active"><a href="#">Recitation Versus : </a></li>
                    <li><a href="#">Surat Al-'An`am 6 : 1</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-4 content_dropdown1" style="display:none">
            <div class="content_dropdown">
                <select class="dropdown" tabindex="10" data-settings='{"wrapperClass":"metro"}'>
                    <option value="0">Dubai</option>
                    <option value="1">tempor</option>
                    <option value="2">congue</option>
                    <option value="3">mazim</option>
                    <option value="4">mutationem</option>
                    <option value="5">hendrerit</option>
                    <option value="5"></option>
                    <option value="5"></option>
                </select>
            </div>
            <div class="content_dropdown">
                <select class="dropdown" tabindex="10" data-settings='{"wrapperClass":"metro"}'>
                    <option value="0">Show Map</option>
                    <option value="1">tempor</option>
                    <option value="2">congue</option>
                    <option value="3">mazim</option>
                    <option value="4">mutationem</option>
                    <option value="5">hendrerit</option>
                    <option value="5"></option>
                    <option value="5"></option>
                </select>
            </div>
        </div>

    </div>
</div>


<div class="living_middle">
    <div class="container" style="pointer-events: none;">
        <div class="entertain_box wow fadeInLeft" data-wow-delay="0.4s">
            <?php

            foreach ($videoPack as $obj)
            {
             ?>
            <div class="col-md-3 grid_box video_wrap">

                        <video class="video-js vjs-default-skin" controls preload="auto" id="video1"
                               width="256" height="164"
                               poster="assets/images/logo.png" data-setup="{}">
                            <source src="<?php echo base_url() . 'video/' . $obj['video_url'] ?>" type='video/mp4'>
                            <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to
                                a
                                web
                                browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports
                                    HTML5
                                    video</a></p>
                        </video>
                        <div class="grid_box2 vid_ctrl" id="<?php echo $obj['video_id']; ?>">
                            <ul class="star1">
                                <h4 class="green"><?php echo $obj['username']; ?></h4>
            <li><a href="#"> <img id="myImage"
                                  src="assets/images/<?php echo $obj['rate'] . '.png'; ?>">(<?php echo $obj['raterstotal'] ?>)</a>
                <a href="#sam" data-serie-video="<?php echo base_url() . 'video/' . $obj['video_url']; ?>" data-serie-user="<?php echo $obj['username']; ?>"
                   data-serie-id="<?php echo $obj['video_id']; ?>"
                   onclick="pauseVid();
                   serieVideo=this.dataset.serieVideo;
                   document.getElementById('video').setAttribute('src', serieVideo);
                   serieUser=this.dataset.serieUser;
                   document.getElementById('user').innerHTML = serieUser;
                   serieId=this.dataset.serieId;
                   document.getElementById('videoIdInput').setAttribute('value', serieId); return true;"
                   data-toggle="modal" data-target="#sam">Full View </a>
            </li>
            </ul>
        </div>
    </div>
            <?php     }

            ?>
      <!-- END OF FOR COPIED HERE-->
            <div class="clearfix"></div>
        </div>

    </div>
</div>



<div class="modal fade bs-example-modal-lg" id="sam" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onmouseout="pauseVid()" onclick="pauseVid()"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="green" id="user"></h4>
            </div>

            <video class="video-js vjs-default-skin" controls preload="auto" id="video"
                   width="100%" height="500"
                   poster="assets/images/logo.png" data-setup="{}">
                <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to
                    a
                    web
                    browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports
                        HTML5
                        video</a></p>
            </video>
            <div class="grid_box2">
                <form id="idForm" action="#" method="post">

                    <ul class="star1">
                        <h4 class="green">Rate this Video </h4>

                        <li> 1<input type="checkbox" id="ratecheck1" name="ratecheck1" value="myvalue"/>
                            2<input type="checkbox" id="ratecheck2" name="ratecheck2"/>
                            3 <input type="checkbox" id="ratecheck3" name="ratecheck3"/>
                            4<input type="checkbox" id="ratecheck4" name="ratecheck4"/>
                            5<input type="checkbox" id="ratecheck5" name="ratecheck5"/>
                            <input type="hidden" name="videoId"  id="videoIdInput">
                            <button type="submit" onclick="rate()"  class="btn btn-primary">Rate</button>
                        </li>

                    </ul>
                </form>
            </div>


        </div>
    </div>
</div>

<div class="footer">
    <div class="container">
        <div class="footer_top" style="display:none">
            <h3>Subscribe to our newsletter</h3>

            <form>
		<span>
			<i><img src="assets/images/mail.png" alt=""></i>
		    <input type="text" value="Enter your email" onfocus="this.value = '';"
                   onblur="if (this.value == '') {this.value = 'Enter your email';}">
		    <label class="btn1 btn2 btn-2 btn-2g"> <input name="submit" type="submit" id="submit" value="Subscribe">
            </label>
		    <div class="clearfix"></div>
		</span>
            </form>
        </div>
        <div class="footer_grids">
            <div class="footer-grid">
                <h4>Ipsum Quis</h4>
                <ul class="list1">
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="#">Mirum est</a></li>
                    <li><a href="#">placerat facer</a></li>
                    <li><a href="#">claritatem</a></li>
                    <li><a href="#">sollemnes </a></li>
                </ul>
            </div>
            <div class="footer-grid">
                <h4>Quis Ipsum</h4>
                <ul class="list1">
                    <li><a href="#">placerat facer</a></li>
                    <li><a href="#">claritatem</a></li>
                    <li><a href="#">sollemnes </a></li>
                    <li><a href="#">Claritas</a></li>
                    <li><a href="#">Mirum est</a></li>
                </ul>
            </div>
            <div class="footer-grid last_grid">
                <h4>Follow Us</h4>
                <ul class="footer_social wow fadeInLeft" data-wow-delay="0.4s">
                    <li><a href=""> <i class="fb"> </i> </a></li>
                    <li><a href=""><i class="tw"> </i> </a></li>
                    <li><a href=""><i class="google"> </i> </a></li>
                    <li><a href=""><i class="u_tube"> </i> </a></li>
                </ul>

            </div>

        </div>
    </div>

    <?php
    $userData = $this->session->get_userdata();
    // var_dump($userData['status']);
    ?>
    <script>

        //Pause the video when the full video is clicked


      //  var vid= document.getElementById("video1");

        function pauseVid(){
           // alert('pauseVid');

          //  vid.pause();

            $('video').each(function () {
                this.pause();
            });
           // $("#video1").get(0).pause();
            // document.getElementById('video1').pause();

          /*  $('.video-thumbnail').on('click', function () {
                // Just go ahead and pause/reset all the video elements
                $('video').each(function () {
                    this.pause();
                    this.currentTime = 0;
                });

                $('#' + $(this).data('video-id')).get(0).play();
            });*/

        }


        if (<?php echo $userData['status']; ?> == 1)
        {
            jQuery('#_videoUpload').css('display', 'block');
            jQuery('#_videoUploadMsg').css('display', 'none');
            jQuery('#loginButton').css('display', 'none');
            jQuery('#logoutButton').css('display', 'inline');
            jQuery('#registerButton').css('display', 'none');
            jQuery('.container').css('pointer-events', 'auto')
            // $('.container').css('pointer-events', 'auto'); // this line and d above line are same in jQuery

        }
        else
        {
            jQuery('#_videoUpload').css('display', 'none');
            jQuery('#_videoUploadMsg').css('display', 'block');
            //   $(".container").children().unbind('click');
        }

    </script>


</div>
</body>
</html>