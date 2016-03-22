<?php
class users_model extends CI_Model
{
    public function  get_users()
    {
        $query = $this->db->get('registration');
        return $query->result();
    }

    public function login_users($email, $password)
    {
        $response = array(
            'status' => false
        );

        $this->db->where('email', $email);
        $this->db->where('password', md5($password));
        $result = $this->db->get('registration');
        if ($result->num_rows() === 1) {
            $response = $result->result_array();// result array will convert it from an object type to an array type
            $response['status'] = true;
        }

        return $response;
    }

    public function select_users(){


        //$query=$this->db->get('users'); //the users is the name of the table u are retrieving data from
        //return $query->result(); // this returns everything from d table as an array of objects where u will use a for each loop to access


        $query = $this->db->query("SELECT * from users");

        return $query->num_rows(); //gives me the number of fields
        return $query->num_fields(); //gives me the number of rows
    }

    public function  all_users() {

        $users = $this->db->get('registration');
        return $users;


        /* $query=$this->db->query('select *  from registration');
         $query->result();
        */
    }

    public function create_users($data){

        $this->db->insert('registration', $data);


    }

    public function update_users($data,$id) {
        $this->db->where([
            'username'=>$id
        ]);
        $this->db->update('registration',$data);

    }

    public function updateUsersVideo($data,$id)
    {
        $this->db->where(['id'=>$id]);
        $this->db->update('video',$data);

    }
    public function users_video($data){

        $this->db->insert('video',$data);
    }
    public function getVideo(){
        //$this->db->where('video_url',$t);
      $video=  $this->db->get('video');
        $videopack=$video->result(); // result array will convert it from an object type to an array type
        return $videopack;
    }


    public function toRateVideo($data)
    {
        $this->db->insert('rating',$data);
    }


    public function getVideoUploader()
    {
        $rp=  $this->db->query('SELECT * FROM video left join registration on video.id =registration.id where video.status=1 order by video.sn DESC LIMIT 8');
        return $rp->result_array();
       // var_dump($rp);
    }

    public function updateUserAvgRating($videoId,$data)
    {


       $this->db->where('video_id',$videoId);
        $this->db->update('video',$data);


    }
    public function avgRate($videoId)
    {

        $result=  $this->db->query("SELECT TRUNCATE (AVG(rate),0) AS UPS FROM `rating` WHERE video_id ='$videoId'");
        return $result->result();

    }
    public function getVideoRatersCount($videoId)
    {
        $rp=  $this->db->query("select count(video_id) AS ratersTotal  from rating where video_id='$videoId'");
        return $rp->result();
       // var_dump($rp);
        //  $this->db->where();
        //  $this->db->select('video');
    }

    public function adminUsers($email, $password)
    {
        $response = array(
            'status' => false
        );

        $this->db->where('username', $email);
        $this->db->where('password',$password);
        $result = $this->db->get('admin');
        if ($result->num_rows() === 1) {
            $response = $result->result_array();// result array will convert it from an object type to an array type
            $response['status'] = true;
        }

        return $response;
    }

    public function updateAdmin($data,$id) {
        $this->db->where([
            'username'=>$id
        ]);
        $this->db->update('admin',$data);

    }
    public function allAdmin(){

       $result= $this->db->get('admin');
       return $result->result();
    }
    public function allRecite()
    {

        $result= $this->db->get('recitation');
        return $result->result();
    }
    public function getAdminVideos()
    {
        $rp=  $this->db->query('SELECT * FROM video left join registration on video.id =registration.id order by video.sn DESC ');
        return $rp->result_array();
        // var_dump($rp);
    }
    public function getSpecificUser($id)
    {
        $this->db->where('id',$id);
      $rp=  $this->db->get('registration');
       // $rp=  $this->db->query('SELECT * FROM ');
        return $rp->result();
    }
    public function updateUserData($id,$userRecord)
    {
        $this->db->where('id',$id);
       $this->db->update('registration',$userRecord);


    }
    public function createAdmin($data){

        $this->db->insert('admin', $data);


    }
    public function createRecite($data){

        $this->db->insert('recitation', $data);


    }
    public function  getSpecificAdminData($id)
    {
        $this->db->where('id',$id);
        $rp=  $this->db->get('admin');

        return $rp->result();

    }
    public function updateAdminData($id,$userRecord)
    {
        $this->db->where('id',$id);
        $this->db->update('admin',$userRecord);


    }

    public function getSpecificReciteData($id)
    {
        $this->db->where('id',$id);
        $rp=  $this->db->get('recitation');

        return $rp->result();

    }


    public function updateReciteData($id,$userRecord)
    {
        $this->db->where('id',$id);
        $this->db->update('recitation',$userRecord);


    }

}