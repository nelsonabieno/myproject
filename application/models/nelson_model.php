<?php
class nelson_model extends CI_Model
{
    public function get_data($userid){


//$resp=$this->db->num_rows();

     //   $resp=$this->db->get('users');
     //   $query = $this->db->query('SELECT * FROM USERS');
       $this->db->where('username',$userid);
           // 'password'=>$password

        $resp=$this->db->get('users');
      //  $resp = $query->num_rows();

      /*  foreach($resp as $object)
        {
            echo $resp->username;

        }*/
        return $resp->result();
      //  return $resp->result();

    }




    public function delete_users($id)
    {
        $this->db->where([
            'sn'=>$id ]);

        $this->db->delete('users');


    }












    public function create_users($data)

    {
      $finish=  $this->db->insert('users',$data);

      //  return $finish->result();


    }
    public function update_users($data)
    {
        $id=0;
        $this->db->where([
        'sn'=>$id
        ]);
        $this->db->update('users',$data);


    }



    public function login_users($username,$password)
    {
    $this->db->where('username',$username);
        $this->db->where('password',$password);
    $result =$this->db->get('users');
        if ($result->num_rows()==1)
        {

        return $result->row(0)->sn;
        }
        else
        {

            return false;
        }

    }


}


?>