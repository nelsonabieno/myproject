<?php $this->load->view('admin/header'); ?>
<body>
<?php  if ($this->session->flashdata('update_failed')) {
    echo " <h1><p class='text-success text-center'>" . $this->session->flashdata('update_failed'). "</p></h1>";


}?>

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
                <h1><strong><p class="success"> EDIT USER</p></strong></h1>
                <a id='add' href='#'class='fa fa-pencil'> </a>Edit User
                <div class="row">
                    <?php  if ($this->session->set_flashdata('update_failed')) {
                        echo " <h1><p class='text-danger text-center'>" . $this->session->flashdata('update_failed'). "</p></h1>";


                    }?>
                    <div class="panel panel-white no-radius text-center">
                        <div class="panel-body">
                            <form id="myform" action="<?php echo base_url('users/updateUserRecord'); ?>" method="post">
                                <div class="table-responsive">

                                    <table class="table">
                                        <tr> <td ><strong>#</strong> </td> <td colspan="3"><strong>FULLNAME</strong></td> <td colspan="2"><strong>PHONE NUMBER</strong></td> <td colspan="2"><strong>EMAIL</strong></td>  <td colspan="2"><strong>DATE ADDED</strong></td> <td colspan="2"><strong>USERNAME</strong></td>  <td colspan="2"><strong>PASSWORD</strong></td> <td colspan="2"><strong>STATUS</strong></td>
                                            <td colspan="2"><strong>Approve</strong></td>  <td colspan="2"><strong>Edit</strong></td> <td colspan="2"><strong>Ban</strong></td> <td colspan="2"><strong>Delete</strong></td> </tr>


                                        <?php foreach ($getSpecificUser as $obj)
                                        {
                                            echo"<tr>";


                                            echo "<td colspan=2><input type='text' name='id' id='id' value='".$obj->id."' required readonly/></td>";
                                            echo "<td colspan=2><input type='text' name='fullname' id='fullname' value='".$obj->fullname."' required/></td>";


                                            echo "<td colspan=2><input type='text' name='phone_number' id='phone_number' value='".$obj->phone_number."' required/></td>";
                                            echo "<td colspan=2><input type='text' name='email'  id='email' value='".$obj->email."' required/></td>";
                                            echo "<td colspan=2><input type='text' name='date_added' id='date_added' value='".$obj->date_added."' required/></td>";
                                            echo "<td colspan=2><input type='text' name='username'  id='username' value='".$obj->username."' required/></td>";
                                            echo "<td colspan=2><input type='text' name='password'  id='password' value='".$obj->password."' required/></td>";
                                            echo "<td colspan=2><input type='text' name='status'  id='status' value='".$obj->status."' required/></td>";


                                            echo "<td colspan=2><input type='text' name='approve' id='date_added' value='".$obj->approve."' required/></td>";
                                            echo "<td colspan=2><input type='text' name='edit'  id='username' value='".$obj->edit."' required/></td>";
                                            echo "<td colspan=2><input type='text' name='ban'  id='password' value='".$obj->ban."' required/></td>";
                                            echo "<td colspan=2><input type='text' name='delet'  id='status' value='".$obj->delet."' required/></td>";





                                            echo"</tr>";



                                        }

                                        ?>

                                    </table>

                                </div>
                                <button type="submit" onclick="" class="btn btn-primary">UPDATE </button>

                            </form>
                        </div>
                    </div>


                </div>
            </div>
            <!-- start: FOOTER -->

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
                        &copy; <span class="current-year"></span><span class="text-bold text-uppercase"> Qurancom 2016</span>. <span>All rights reserved</span>
                    </div>
                    <div class="pull-right">
                        <span class="go-top"><i class="ti-angle-up"></i></span>
                    </div>
                </div>
            </footer>
            <!-- end: FOOTER -->

        </div>
        <!--        echo"<a href='updateUserRecord?id=$obj->id;'>
                                    <input type='submit' class='btn btn-primary'value='UPDATE'/>
                                </a>";<script>-->
        <!--            var getID;-->
        <!--            var h = getElementById('approve');-->
        <!--            function approve(getID){-->
        <!--               // alert('var h='+h);-->
        <!--                alert(getID);-->
        <!--            }-->
        <!--        </script>-->
</body>
</html>
