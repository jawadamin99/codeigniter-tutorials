<?php
class User_Model extends CI_Model
{
	public function __construct()
    {
		parent::__construct();
	}
	public function index()
	{
		
	}
	public function add_user($data)
	{
		$data['password'] = md5($data['password']);
		$result = $this->db->insert('users',$data);
		return $result;
	}
	
	public function verify_login($email,$password)
	{
		$where = array(
			'email' =>$email,
			'password' => md5($password),
			'acc_status' => 1
		);
		$this->db->where($where);
		$result = $this->db->get('users')->row();
		return $result;
	}
	public function get_user_details($userID)
	{
		$this->db->where('id',$userID);
		$result = $this->db->get('users')->row();
		return $result;
	}
	public function update_user_data($userID,$userdata)
	{
		$this->db->where('id',$userID);
		$result = $this->db->update('users',$userdata);
		return $result;
	}
	public function change_user_password($old_password,$new_password)
	{
		$userID = $this->session->userID;
		$this->db->where('id',$userID);
		$this->db->where('password',md5($old_password));
		$user = $this->db->get('users');
		
		if($user->num_rows() > 0)
		{
			$userdata['password'] = md5($new_password);
			$this->db->where('id',$userID);
			$this->db->update('users',$userdata);
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function get_uploaded_documents($userID)
	{
		$this->db->order_by('created_at','desc');
		$this->db->where('userID',$userID);
		$data = $this->db->get('uploaded_documents')->result();
		return $data;
	}
	public function add_trading_account($data)
	{
		$res = $this->db->insert('trading_accounts',$data);
		return $this->db->insert_id();
	}
	public function get_trading_accounts($userID)
	{
		$this->db->where('userID',$userID);
		$this->db->where('status','Y');
		return $this->db->get('trading_accounts')->result();
	}
}
?>