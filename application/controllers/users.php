<?php

class users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
//        $videoId=1859;
//        $ratersTotal=$this->users_model->getVideoRatersCount($videoId);
//        $finalTotal=$ratersTotal[0]->ratersTotal;
//        echo $finalTotal;
       // $videoId=1900;

       // $avgRate=$this->users_model->avgRate($videoId);
       // var_dump($avgRate[0]->UPS);
       // echo $avgRate[0]->UPS;


       $data['videoPack']= $this->users_model->getVideoUploader();
        $this->load->view('qurancom_home',$data );
        //$this->load->view('qurancom_home', array('error' => ' ' ));
    }

    public function logout()
    {


        $mt = $this->session->get_userdata();


        if ($mt['status'] == 1) {
            $this->session->sess_destroy(); // this will destroy the current session
            //$this->session->unset_userdata();

            $old_status = 0;
            $this->users_model->update_users(['status' => $old_status], $mt['username']);
            $this->users_model->updateUsersVideo(['status' => $old_status], $mt['id']);
            redirect(base_url());
            // $this->load->view('qurancom_home');
        }

    }

    public
    function redirect_login()
    {
        echo "<p class='text-success'>";


        if ($this->session->flashdata('login_success')):
            echo $this->session->flashdata('login_success');
        endif;
        echo "</p>";


    }

    public
    function  register()
    {


        $this->form_validation->set_rules('fullname', 'Fullname', 'min_length[3]|required|trim');
        $this->form_validation->set_rules('phoneno', 'Phone No', 'min_length[3]|required|trim');
        $this->form_validation->set_rules('email', 'Email', 'min_length[3]|required|trim');
        $this->form_validation->set_rules('username', 'Username', 'min_length[3]|required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'min_length[3]|required|trim');

        $this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required|min_length[3]|matches[password1]');
        if ($this->form_validation->run() == FALSE) {


            $this->session->set_flashdata('registration_failed', 'Invalid Registration Details! ');
            redirect('users');


        } else {
            $id = rand(0, 100);
            $status = 0;

            $date = date('d-m-Y');
            $data = array(
                'id' => $id,
                'fullname' => $this->input->post('fullname'),
                'phone_number' => $this->input->post('phoneno'),
                'email' => $this->input->post('email'),
                'date_added' => $date,
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password1')),
                'status' => $status,
                 'approve' => 0,
                'edit' => 0,
                'ban' => 0,
                'delet' => 0


            );

            $this->users_model->create_users($data);
            $this->session->set_flashdata('registration_success', 'Registration Successful !');

            redirect('users');
        }

    }

    public
    function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');


        if ($this->form_validation->run() == FALSE) {

            $data = array(
                'errors' => validation_errors()
            );


            redirect('/');
        } else {

            $email = $this->input->post('email');


            $password = $this->input->post('password');
            $result = $this->users_model->login_users($email, $password);

            if ($result['status']) // if a user is found i.e. if is true
            {
                $result = $result[0];
                $user_data = array(
                    'id' => $result['id'],
                    'email' => $result['email'],
                    'phone_number' => $result['phone_number'],
                    'date_added' => $result['date_added'],
                    'username' => $result['username'],
                    'status' => true,
                );
                // echo "the value of the status in controller " . $user_data['status'];
                $this->session->set_userdata($user_data); // the set_userdata() doesnt unset automatically which can b used to pass values across multiple pgs unlike d flashdata
                $this->session->set_flashdata('login_success', 'Hi, ' . strtoupper($user_data['username']) . ' you are now logged in');


                $login_status = 1;


                $this->users_model->update_users([
                    'status' => $login_status
                ], $result['username']);

               redirect('users');

                // $this->load->view('qurancom_home'); // this is showing d home but unstyled

            } else {
                $this->session->set_userdata();
                $this->session->set_flashdata('login_failed', 'Invalid Login Details! ');
                redirect('users');

            }
        }

    }

    function upload()
    {


        $config['upload_path'] = './video/';
        $config['allowed_types'] = 'avi|flv|wmv|mp3|mp4';
        $config['max_size'] = 33554432; //=32768kb= 32mb


        $this->load->library('upload', $config);


        if (!$this->upload->do_upload('video')) {

            $error = array('error' => $this->upload->display_errors());

            $this->session->set_flashdata('file_error', ' UPLOADING FILE FAILED !' . $error['error'] . ' Try Again ! ');


            redirect('users');


        } else {
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];


            $this->session->set_flashdata('file_success', 'File Successfully Uploaded');
            $packer = $this->session->get_userdata();
            $update_id = $packer['id'];
            $update_status = $packer['status'];
            $genVideoId=rand(1000,2000);

             //$userVideoRating=$this->getUserVideoRate();
            // echo $userVideoRating;
            $userVideoRating=0;

            $toVideoTbl = array(

                'id' => $packer['id'],
                'video_url' => $file_name,
                'video_id' =>$genVideoId,

                'status' => $packer['status'],
                'date_uploaded' => date('d-m-Y'),
                'rate'=>$userVideoRating
            );

            $this->users_model->users_video($toVideoTbl);

            $this->users_model->updateUsersVideo(['status' => $update_status], $update_id);
            $toRateVideo= array(
                'user_id'=>$packer['id'],
                'video_id'=>$genVideoId,
                'rate'=>$toVideoTbl['rate']

            );
            $this->users_model->toRateVideo($toRateVideo);
            redirect('users');

            //  $this->load->view('qurancom_home', $data);
        }

    }



    public function getVideoCount()
    {
        $rp=  $this->db->query('SELECT sum(sn) FROM video where id =73');
        var_dump($rp);
        //  $this->db->where();
        //  $this->db->select('video');
    }

   public function getUserVideoRate()
   {
       $result = false;

       if (isset($_POST['videoId'])) {
           $param = $_POST['videoId'];
           $param = explode('|', $param);
           $rate = $param[1];
           $videoId = $param[0];
             echo "videoIdfirst=". $videoId;
            // echo "rate=". $rate;


           $userData = $this->session->get_userdata();
           $userId= $userData['id'];
           $newRate=array(
               'rate'=>$rate,
               'video_id'=>$videoId,
               'user_id'=>$userId
           );
           echo "<script>"." alert(".$videoId.")</script>";
           $this->users_model->toRateVideo($newRate);

           $avgRate=$this->users_model->avgRate($videoId);
           $avg=$avgRate[0]->UPS;

           $ratersTotal=$this->users_model->getVideoRatersCount($videoId);
           $finalTotal=$ratersTotal[0]->ratersTotal;

           $mydata=array(
               'rate'=>$avg,
               'raterstotal'=>$finalTotal
           );
           $this->users_model->updateUserAvgRating($videoId,$mydata);

           ////////////////

       }

   }

public function adminLogin(){
   // echo "admin login here!";

   $this->load->view('admin/login_signin');
    $this->load->view('admin/footer');


}
   public function adminHome()
   {

       $this->load->view('admin/index');

   }
    public function confirmAdmin(){
        $this->form_validation->set_rules('username', 'Email', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');


        if ($this->form_validation->run() == FALSE) {

            $data = array(
                'errors' => validation_errors()
            );
            $this->session->set_flashdata('login_failed', 'Invalid Login Details! ');
            redirect('users/adminLogin');
           // redirect('/');
        } else {

            $user = $this->input->post('username');


            $pass = $this->input->post('password');
            $result = $this->users_model->adminUsers($user, $pass);

            if ($result['status']) // if a user is found i.e. if is true
            {
                $result = $result[0];
                $admin_data = array(
                    'id' => $result['id'],
                    'username' => $result['username'],
                    'fullname' => $result['fullname'],
                    'email' => $result['email'],
                    'phone' => $result['phone'],
                    'status' => true,
                );
                // echo "the value of the status in controller " . $user_data['status'];
                $this->session->set_userdata($admin_data); // the set_userdata() doesnt unset automatically which can b used to pass values across multiple pgs unlike d flashdata
                $this->session->set_flashdata('login_success', 'Hi, ' . strtoupper($admin_data['username']) . ' you are now logged in');


                $login_status = 1;


                $this->users_model->updateAdmin([
                    'status' => $login_status
                ], $result['username']);

                redirect('users/adminHome');

                // $this->load->view('qurancom_home'); // this is showing d home but unstyled

            } else {
                $this->session->set_userdata();
                $this->session->set_flashdata('login_failed', 'Invalid Login Details! ');
                redirect('users/adminLogin');

            }



    }


    }
    public function manageUsers(){

        $data['allUsers'] = $this->users_model->get_users();

        $this->load->view('admin/manage_users',$data);
    }



    public function manageVideos()
    {
        $data['allVideos'] = $this->users_model->getAdminVideos();

        $this->load->view('admin/manage_videos',$data);

    }
    public function manageAdmin(){

        $data['allAdmin'] = $this->users_model->allAdmin();

        $this->load->view('admin/manage_admin',$data);

    }

    public function manageRecite()
    {
        $data['allRecite'] = $this->users_model->allRecite();

        $this->load->view('admin/manage_recitation',$data);

    }
    public function adminEdit(){


       $bb= $_REQUEST['id'];
      //  $ff=$_GET['id']; // $_GET[] also works to fetch data passed through href

    $data['getSpecificUser']=  $this->users_model->getSpecificUser($bb);
        $this->load->view('admin/edit_users',$data);

}
    public function updateUserRecord()
    {
       // echo "in fn update user record";
        $id=$this->input->post('id');
      //  echo $id;
      //  echo $abc;
        //echo "<script> alert($abc)</script>";
       // $id=8;
        //$id= $_REQUEST['id'];
        $this->form_validation->set_rules('fullname', 'Fullname', 'min_length[3]|required|trim');
         $this->form_validation->set_rules('phone_number', 'Phone No', 'min_length[3]|required|trim');
         $this->form_validation->set_rules('email', 'Email', 'min_length[3]|required|trim');
         $this->form_validation->set_rules('username', 'Username', 'min_length[3]|required|trim');
         $this->form_validation->set_rules('password', 'Password', 'min_length[3]|required|trim');
         $this->form_validation->set_rules('date_added', 'Date', 'min_length[3]|required|trim');

        if ($this->form_validation->run() == FALSE) {

             $this->session->set_flashdata('update_failed', 'Invalid Update Details! ');
             $this->load->view('admin/edit_users');
            // redirect('users/');
        // redirect('users/manageUsers');

         } else {

            $data = array(
                'id' => $id,
                'fullname' => $this->input->post('fullname'),
                'phone_number' => $this->input->post('phone_number'),
                'email' => $this->input->post('email'),
                'date_added' => $this->input->post('date_added'),
                'username' => $this->input->post('username'),

                'status' => $this->input->post('status'),
                'approve' => $this->input->post('approve'),
                'edit' => $this->input->post('edit'),
                'ban' => $this->input->post('ban'),
                'delet' => $this->input->post('delet')

            );

             $this->users_model->updateUserData($id,$data);
            $this->session->set_flashdata('update_success', 'Update Successful !');
              redirect('users/manageUsers');
           // redirect('users/adminEdit');
       }

    }
    public function adminUpload()
    {


        $config['upload_path'] = './video/';
        $config['allowed_types'] = 'avi|flv|wmv|mp3|mp4';
        $config['max_size'] = 33554432; //=32768kb= 32mb


        $this->load->library('upload', $config);


        if (!$this->upload->do_upload('video')) {

            $error = array('error' => $this->upload->display_errors());

            $this->session->set_flashdata('file_error', ' UPLOADING FILE FAILED !' . $error['error'] . ' Try Again ! ');


            redirect('users/manageVideos');


        } else {
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];


            $this->session->set_flashdata('file_success', 'File Successfully Uploaded');
            $packer = $this->session->get_userdata();
            $update_id = $packer['id'];
            $update_status = $packer['status'];
            $genVideoId=rand(1000,2000);

            //$userVideoRating=$this->getUserVideoRate();
            // echo $userVideoRating;
            $userVideoRating=0;

            $toVideoTbl = array(

                'id' => $packer['id'],
                'video_url' => $file_name,
                'video_id' =>$genVideoId,

                'status' => $packer['status'],
                'date_uploaded' => date('d-m-Y'),
                'rate'=>$userVideoRating
            );

            $this->users_model->users_video($toVideoTbl);

            $this->users_model->updateUsersVideo(['status' => $update_status], $update_id);
            $toRateVideo= array(
                'user_id'=>$packer['id'],
                'video_id'=>$genVideoId,
                'rate'=>$toVideoTbl['rate']

            );
            $this->users_model->toRateVideo($toRateVideo);
            redirect('users/manageVideos');

            //  $this->load->view('qurancom_home', $data);
        }


    }


    public
    function  adminRegisterUser()
    {


        $this->form_validation->set_rules('fullname', 'Fullname', 'min_length[3]|required|trim');
        $this->form_validation->set_rules('phoneno', 'Phone No', 'min_length[3]|required|trim');
        $this->form_validation->set_rules('email', 'Email', 'min_length[3]|required|trim');
        $this->form_validation->set_rules('username', 'Username', 'min_length[3]|required|trim');
      //  $this->form_validation->set_rules('password1', 'Password', 'min_length[3]|required|trim');
      //  $this->form_validation->set_rules('date','Date','trim');
       // $this->form_validation->set_rules('id','Id','trim');
     //   $this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == FALSE) {


            $this->session->set_flashdata('registration_failed', 'Invalid Registration Details! ');
            redirect('users/manageUsers');

        } else {


        $id = rand(0, 100);
            $status = 0;

            //$date = date('d-m-Y');
            $data = array(
                'id' => $this->input->post('id'),
                'fullname' => $this->input->post('fullname'),
                'phone_number' => $this->input->post('phoneno'),
                'email' => $this->input->post('email'),
                'date_added' => $this->input->post('date'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password1')),
                'status' => $status,
                'approve' => 0,
                'edit' => 0,
                'ban' => 0,
                'delet' => 0

            );

            $this->users_model->create_users($data);
            $this->session->set_flashdata('registration_success', 'Registration Successful !');

            redirect('users/manageUsers');
       }

    }



    public
    function  adminRegisterAdmin()
    {


        $this->form_validation->set_rules('fullname', 'Fullname', 'min_length[3]|required|trim');
        $this->form_validation->set_rules('phoneno', 'Phone No', 'min_length[3]|required|trim');
        $this->form_validation->set_rules('email', 'Email', 'min_length[3]|required|trim');
        $this->form_validation->set_rules('username', 'Username', 'min_length[3]|required|trim');
        //  $this->form_validation->set_rules('password1', 'Password', 'min_length[3]|required|trim');
        //  $this->form_validation->set_rules('date','Date','trim');
        // $this->form_validation->set_rules('id','Id','trim');
        //   $this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == FALSE) {


            $this->session->set_flashdata('admin_failed', 'Invalid Admin Registration Details! ');
            redirect('users/manageAdmin');

        } else {


            $id = rand(0, 100);
            $status = 0;

            //$date = date('d-m-Y');
            $data = array(
                'id' => $this->input->post('id'),
                'fullname' => $this->input->post('fullname'),
                'phone' => $this->input->post('phoneno'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password1')),
                'status' => $status,
                'approve' => 0,
                'edit' => 0,
                'ban' => 0,
                'delet' => 0

            );

            $this->users_model->createAdmin($data);
            $this->session->set_flashdata('admin_success', 'Admin Successfully Registered !');

            redirect('users/manageAdmin');
        }

    }



    public
    function  adminAddRecite()
    {


        $this->form_validation->set_rules('id', 'ID', 'min_length[3]|required|trim');
        $this->form_validation->set_rules('recite', 'Recitation', 'min_length[3]|required|trim');


        if ($this->form_validation->run() == FALSE) {


            $this->session->set_flashdata('recite_failed', 'Invalid Recitation Details ! ');
            redirect('users/manageRecite');

        } else {


            $id = rand(0, 100);
            $status = 0;

            //$date = date('d-m-Y');
            $data = array(
                'id' => $this->input->post('id'),
                'recite' => $this->input->post('recite'),
                'approve' => 0,
                'edit' => 0,
                'ban' => 0,
                'delet' => 0

            );

            $this->users_model->createRecite($data);
            $this->session->set_flashdata('recite_success', 'Recitation Successfully Saved !');

            redirect('users/manageRecite');
        }

    }



    public function getSpecificAdminRecord(){

        $id= $_REQUEST['id'];
        //echo $id;
       // echo "<script> alert($id)</script>";
        $data['specificAdmin'] =  $this->users_model -> getSpecificAdminData($id);

        $this->load->view('admin/edit_admin',$data);


    }



    public function updateAdminRecord()
    {
        // echo "in fn update user record";
        $id=$this->input->post('id');
        //  echo $id;
        //  echo $abc;
        //echo "<script> alert($abc)</script>";
        // $id=8;
        //$id= $_REQUEST['id'];
        $this->form_validation->set_rules('fullname', 'Fullname', 'min_length[3]|required|trim');
        $this->form_validation->set_rules('phone_number', 'Phone No', 'min_length[3]|required|trim');
        $this->form_validation->set_rules('email', 'Email', 'min_length[3]|required|trim');
        $this->form_validation->set_rules('username', 'Username', 'min_length[3]|required|trim');
        $this->form_validation->set_rules('password', 'Password', 'min_length[3]|required|trim');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('update_failed', 'Invalid Update Details! ');
            $this->load->view('admin/edit_admin');
            // redirect('users/');
            // redirect('users/manageUsers');

        } else {

            $data = array(
                'id' => $id,
                'fullname' => $this->input->post('fullname'),
                'phone' => $this->input->post('phone_number'),
                'email' => $this->input->post('email'),

                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),

                'status' => $this->input->post('status'),
                'approve' => $this->input->post('approve'),
                'edit' => $this->input->post('edit'),
                'ban' => $this->input->post('ban'),
                'delet' => $this->input->post('delet')

            );

            $this->users_model->updateAdminData($id,$data);
            $this->session->set_flashdata('update_success', 'Update Successful !');
            redirect('users/manageAdmin');
            // redirect('users/adminEdit');
        }

    }

public function getSpecificRecite(){

    $id= $_REQUEST['id'];
    //echo $id;
    // echo "<script> alert($id)</script>";
    $data['specificRecite'] =  $this->users_model -> getSpecificReciteData($id);

    $this->load->view('admin/edit_recite',$data);

}


public function adminReciteEdit (){

    // echo "in fn update user record";
    $id=$this->input->post('id');
    //  echo $id;
    //  echo $abc;
    //echo "<script> alert($abc)</script>";
    // $id=8;
    //$id= $_REQUEST['id'];
    $this->form_validation->set_rules('recite', 'Recitation', 'min_length[3]|required|trim');


    if ($this->form_validation->run() == FALSE) {

        $this->session->set_flashdata('update_failed', 'Invalid Update Details! ');
        $this->load->view('admin/edit_recite');
        // redirect('users/');
        // redirect('users/manageUsers');

    } else {

        $data = array(
            'id' => $id,
            'recite' => $this->input->post('recite'),

            'approve' => $this->input->post('approve'),
            'edit' => $this->input->post('edit'),
            'ban' => $this->input->post('ban'),
            'delet' => $this->input->post('delet')

        );

        $this->users_model->updateReciteData($id,$data);
        $this->session->set_flashdata('update_success', 'Update Successful !');
        redirect('users/manageRecite');
        // redirect('users/adminEdit');
    }

}


}


