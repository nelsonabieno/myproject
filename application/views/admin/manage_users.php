<?php $this->load->view('admin/header'); ?>
<body>
<script>

$('#myModal').on('shown.bs.modal', function () {
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
                    <a href="<?php echo base_url('users/adminHome');?>">
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
                    <a href="<?php echo base_url('users/manageUsers');?>">
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
                    <a href="<?php echo base_url('users/manageVideos');?>">
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

<div class="main-content" >
<div class="wrap-content container" id="container">
<!-- start: FEATURED BOX LINKS -->
<div class="container-fluid container-fullw bg-white">
    <h1><strong><p class="success"> USERS</p></strong></h1>
    <a id='add' href='#'class='fa fa-user'></a> Users
    <div class="row">

        <?php  if ($this->session->flashdata('login_success')) {
            echo " <h1><p class='text-success text-center'>" . $this->session->flashdata('login_success') . "</p></h1>";


        }?>
        <?php  if ($this->session->flashdata('update_success')) {
            echo " <h1><p class='text-success text-center'>" . $this->session->flashdata('update_success'). "</p></h1>";


        }?>
        <?php  if ($this->session->flashdata('registration_success')) {
            echo " <h1><p class='text-success text-center'>" . $this->session->flashdata('registration_success') . "</p></h1>";


        }?>
        <?php

        if ($this->session->flashdata('registration_failed')) {
            echo " <h1><font color='red'><p class='text-center'>" . $this->session->flashdata('registration_failed') . "</p></font></h1>";


        }
        ?>


            <div class="panel panel-white no-radius text-center">
                <div class="panel-body">
                    <form id="myform2" action="adminEdit" method="post">
                        <div class="table-responsive">

                            <table class="table">
                                <tr> <td ><strong>#</strong> </td> <td colspan="3"><strong>FULLNAME</strong></td> <td colspan="2"><strong>PHONE NUMBER</strong></td> <td colspan="2"><strong>EMAIL</strong></td>  <td colspan="2"><strong>DATE ADDED</strong></td> <td colspan="2"><strong>USERNAME</strong></td> <td colspan="2"><strong>STATUS</strong></td>
                                    <td colspan="2"><strong>Approve</strong></td>  <td colspan="2"><strong>Edit</strong></td> <td colspan="2"><strong>Ban</strong></td> <td colspan="2"><strong>Delete</strong></td> </tr>


                                <?php foreach ($allUsers as $obj)
                                {
                                    echo"<tr>";

                                    echo "<td colspan=2>".$obj->id."</td>";
                                    echo "<td colspan=2>".$obj->fullname."</td>";
                                    echo "<td colspan=2>".$obj->phone_number."</td>";
                                    echo "<td colspan=2>".$obj->email."</td>";
                                    echo "<td colspan=2>".$obj->date_added."</td>";
                                    echo "<td colspan=2>".$obj->username."</td>";
                                    echo "<td colspan=2>".$obj->status."</td>";

                                    echo "<td colspan=2>".$obj->approve."</td>";
                                    echo "<td colspan=2>".$obj->edit."</td>";
                                    echo "<td colspan=2>".$obj->ban."</td>";

                                    echo "<td colspan=2>".$obj->delet."</td>";





                                    echo "<td colspan=2><a href='adminEdit?id=$obj->id;' class='fa fa-pencil'>Edit</a></td>";
                                    echo "<td colspan=2><a id='edit' href='adminEdit?id=$obj->id;'class='fa fa-thumbs-up'>Approve</a></td>";
                                    echo "<td colspan=2><a id='ban' href='adminEdit?id=$obj->id;'class='fa fa-ban'>Ban</a></td>";
                                    echo "<td colspan=2><a id='delete' href='adminEdit?id=$obj->id;'class='fa fa-remove'>Delete</a></td>";




                                    echo"</tr>";
                                    echo " <script>

                                  // alert('id = '+$obj->id);
                                    function getID(){
                                    var id =\"<?php echo $obj->id;?>\";
                                    alert('inside getID fn '+id.substring(10,13));


                                    }
                                    </script>";

                                }
                                echo "<td><a id='add' href='#'class='fa fa-user-plus'  data-toggle='modal' data-target='.bs-example-modal-sm'>Add User</a></td>";
                                ?>
                            </table>


                    </div>

                    </form>
                </div>
             </div>


    </div>
</div>
<!-- start: FOOTER -->


<!-- modal class starts-->

    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form id="idForm" action="<?php echo base_url('users/adminRegisterUser'); ?>" method="post">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"> New User </h4>
                </div>
                <div class="modal-body">


                        <table class="table-bordered">

                            <tr>  <td> USER ID</td><td><input type="text" id="id" name="id" value="<?php echo rand(0,1000);?>" readonly/> </td></tr>
                            <tr><td>  FULL NAME</td><td><input type="text" id="fullname" name="fullname"/></td></tr>
                            <tr>  <td>  E MAIL</td><td> <input type="text" id="email" name="email"/> </td></tr>
                            <tr>  <td> PHONE NO</td><td><input type="text" id="phoneno" name="phoneno"/> </td></tr>
                            <tr>  <td> DATE ADDED </td><td><input type="text" id="date" name="date" value="<?php echo date('d-m-Y');?>" readonly/> </td></tr>
                            <tr>  <td> USERNAME</td><td><input type="text" id="username" name="username"/></td></tr>
                            <tr> <td>  PASSWORD</td><td><input type="password" id="password" name="password" value=""/></td></tr>
                            <tr> <td> CONFIRM  PASSWORD</td><td><input type="password" id="password2" name="password2" value=""/></td></tr>

                        </table>


                </div>
                <div class="modal-footer">

                    <button type="submit" onclick="" class="btn btn-primary">Add </button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>


                </div>

                </form>

            </div>
        </div>
    </div>


    <!--modal class ends-->

<script>
    var j;

    function processID(j)
    {
        alert('in fn');
        alert(j);
        //alert('before process');

    }
</script>

<footer>
    <div class="footer-inner">
        <div class="pull-left">
            &copy; <span class="current-year"></span><span class="text-bold text-uppercase">  Qurancom 2016</span>. <span>All rights reserved</span>
        </div>
        <div class="pull-right">
            <span class="go-top"><i class="ti-angle-up"></i></span>
        </div>
    </div>
</footer>
<!-- end: FOOTER -->

</div>

</body>
</html>
