<?php $this->load->view('admin/header'); ?>
<body>

<script>

    $('.bs-example-modal-lg').on('shown.bs.modal', function () {
        $('#myInput').focus()
    })
</script>
<div id="app">
<!-- sidebar -->
<div class="sidebar app-aside" id="sidebar">
    <div class="sidebar-container perfect-scrollbar">
        <nav>
            <!-- start: SEARCH FORM -->
            <div class="search-form">
                <a class="s-open" href="#">
                    <i class="ti-search"></i>
                </a>

                <form class="navbar-form" role="search">
                    <a class="s-remove" href="#" target=".navbar-form">
                        <i class="ti-close"></i>
                    </a>

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <button class="btn search-button" type="submit">
                            <i class="ti-search"></i>
                        </button>
                    </div>
                </form>
            </div>
            <!-- end: SEARCH FORM -->
            <!-- start: MAIN NAVIGATION MENU -->
            <div class="navbar-title">
                <span>Main Navigation</span>
            </div>
            <ul class="main-navigation-menu">
                <li class="active open">
                    <a href="<?php echo base_url('users/adminHome'); ?>">
                        <div class="item-content">
                            <div class="item-media">
                                <i class="ti-home"></i>
                            </div>
                            <div class="item-inner">
                                <span class="title"> Dashboard </span>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('users/manageUsers'); ?>">
                        <div class="item-content">
                            <div class="item-media">
                                <i class="ti-settings"></i>
                            </div>
                            <div class="item-inner">
                                <span class="title"> Users </span><i class="icon-arrow"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="">
                                <span class="title"> Manage Users </span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="">
                        <div class="item-content">
                            <div class="item-media">
                                <i class="ti-pencil-alt"></i>
                            </div>
                            <div class="item-inner">
                                <span class="title"> Videos </span><i class="icon-arrow"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="form_elements.html">
                                <span class="title">Manage Videos</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="<?php echo base_url('users/manageAdmin');?>">
                        <div class="item-content">
                            <div class="item-media">
                                <i class="ti-user"></i>
                            </div>
                            <div class="item-inner">
                                <span class="title"> Admin Management   </span><i class="icon-arrow"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="login_signin.php">
                                <span class="title"> Login Form </span>
                            </a>
                        </li>
                        <li>
                            <a href="login_registration.html">
                                <span class="title"> Registration Form </span>
                            </a>
                        </li>
                        <li>
                            <a href="login_forgot.php">
                                <span class="title"> Forgot Password Form </span>
                            </a>
                        </li>
                        <li>
                            <a href="login_lockscreen.html">
                                <span class="title">Lock Screen</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo base_url('users/manageRecite');?>">
                        <div class="item-content">
                            <div class="item-media">
                                <i class="ti-layers-alt"></i>
                            </div>
                            <div class="item-inner">
                                <span class="title"> Recitations </span><i class="icon-arrow"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="pages_user_profile.html">
                                <span class="title">Manage Recitations</span>
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>
            <!-- end: CORE FEATURES -->

        </nav>
    </div>
</div>
<div class="app-content">

    <div class="main-content">
        <div class="wrap-content container" id="container">
            <!-- start: FEATURED BOX LINKS -->
            <div class="container-fluid container-fullw bg-white">
                <h1><strong><p class="success"> VIDEOS</p></strong></h1>
                <?php  echo "<a id='add' href='#'class='fa fa-video-camera'>Videos</a>"; ?>
                <div class="row">
                    <?php
                    if ($this->session->flashdata('file_success')) {
                    echo " <h1><p class='text-success text-center'>" . $this->session->flashdata('file_success') . "</p></h1>";


                    }
                    if ($this->session->flashdata('file_error')) {
                    echo " <center><h1><font color='red'><p>" . $this->session->flashdata('file_error') . "</p></font></h1></center>";


                    }?>
                    <div class="living_middle">
                        <div class="container">
                            <div class="entertain_box wow fadeInLeft" data-wow-delay="0.4s">
                                <?php

                                foreach ($allVideos as $obj) {
                                    ?>
                                    <div class="col-md-3 grid_box video_wrap">
                                        <br/> <br/>
                                        <video class="video-js vjs-default-skin" controls preload="auto" id="video1"
                                               width="256" height="164"
                                               poster="<?php echo base_url('assets/images/logo.png')  ; ?>"
                                               data-setup="{}">
                                            <source src="<?php echo base_url().'video/'.$obj['video_url']; ?>"
                                                    type='video/mp4'>
                                            <p class="vjs-no-js">To view this video please enable JavaScript, and
                                                consider upgrading to
                                                a
                                                web
                                                browser that <a href="http://videojs.com/html5-video-support/"
                                                                target="_blank">supports
                                                    HTML5
                                                    video</a></p>
                                        </video>

                                        <div class="grid_box2 vid_ctrl" id="<?php echo $obj['video_id']; ?>">

                                            <h4 class="green"><?php echo strtoupper($obj['username']); ?></h4>
                                            <a href="#"> <img id="myImage" width="100px" height="20px"
                                                              src="<?php echo base_url() . 'assets/images/' . $obj['rate'] . '.png'; ?>">(<?php echo $obj['raterstotal'] ?>
                                                )</a>
                                            <a href="#sam"
                                               data-serie-video="<?php echo base_url() . 'video/' . $obj['video_url']; ?>"
                                               data-serie-user="<?php echo $obj['username']; ?>"
                                               data-serie-id="<?php echo $obj['video_id']; ?>"
                                               onclick="pauseVid();
                   serieVideo=this.dataset.serieVideo;
                   document.getElementById('video').setAttribute('src', serieVideo);
                   serieUser=this.dataset.serieUser;
                   document.getElementById('user').innerHTML = serieUser;
                   serieId=this.dataset.serieId;
                   document.getElementById('videoIdInput').setAttribute('value', serieId); return true;"
                                               data-toggle="modal" data-target="#sam">Full View </a>




                                        </div>
                                        <br>
                                        <a id='approve' onclick='getID()' class='fa fa-thumbs-up'>Approve</a>
                                        <a id='edit' href='#' class='fa fa-pencil'>Edit</a>
                                        <a id='ban' href='#' class='fa fa-ban'>Ban</a>
                                        <a id='delete' href='#' class='fa fa-remove'>Delete</a>

                                    </div>

                                <?php
                                }

                                ?>


                            </div>
                            <br/> <br/>
                        </div>

                    </div>
                    <br/> <br/>
                    <?php echo form_open_multipart('users/adminUpload'); ?>

                     <div id="grp">
                        <input type="file" name="video" size="20" onclick="maxsizepop()"/>


                            <input name="submit" class="btn btn-primary" type="submit" id="uploadsubmit" value="Upload Video">


                     </div>

                </div>
            </div>

        </div>

    </div>
</div>

<!-- modal class starts-->


<div class="modal fade bs-example-modal-lg" id="sam" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onmouseout="pauseVid()"
                        onclick="pauseVid()"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="green" id="user"></h4>
            </div>

            <video class="video-js vjs-default-skin" controls preload="auto" id="video"
                   width="100%" height="500"
                   poster="<?php echo base_url('assets/images/logo.png')  ; ?>" data-setup="{}">
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
                            <input type="hidden" name="videoId" id="videoIdInput">
                            <button type="submit" onclick="rate()" class="btn btn-primary">Rate</button>
                        </li>

                    </ul>
                </form>
            </div>


        </div>
    </div>
</div>

<!--modal class ends-->


<!-- end: FOOTER -->


<script>

    //Pause the video when the full video is clicked


    //  var vid= document.getElementById("video1");

    function pauseVid(){


        $('video').each(function () {
            this.pause();
        });


    }




</script>


</div>
</body>
</html>
