<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		if($this->input->post('buttonLogin'))
		{

			if($this->session->userdata('captchaexist'))
			{
				$cap = $this->session->userdata('captcha');
				if($this->input->post('captchaField') != $cap['word'])
				{
					$data['message']="Invalid Captcha";
					$cap = $this->addcaptcha($this->randomword());
					$data['captcha']= $cap['image'];
					$data['captchaField']= "<tr>
						<td>Enter Captcha</td>
						<td><input name='captchaField' type='text' /></td>
						</tr>";
					$this->session->set_userdata('captchaexist', true);
					$this->session->set_userdata('captcha', $cap);
					$this->load->view('view_login',$data);
					return;


				}
			}


			$un = $this->input->post('username');
			$ps = $this->input->post('password');

			$this->load->model('loginmodel');
			$row = $this->loginmodel->verifyUser($un, $ps);


			if($row)
			{
				if($row['type'] == 'admin')
				{
					$this->session->set_userdata('loggedin', true);
					$this->session->set_userdata('captcha', false);
					$this->session->set_userdata('username', $un);
					$this->session->set_userdata('userid',$row['id']);
					$this->session->set_userdata('usertype',$row['type']);
					redirect('http://localhost:8082/ci226Bus/home', 'refresh');
				}
				else
				{
					$this->session->set_userdata('loggedin', true);
					$this->session->set_userdata('captcha', false);
					$this->session->set_userdata('username', $un);
					$this->session->set_userdata('userid',$row['id']);
					$this->session->set_userdata('usertype',$row['type']);
					redirect('http://localhost:8082/ci226Bus/home', 'refresh');
				}
			}
			else
			{
				$data['message'] = 'Invalid username or password';
				$cap = $this->addcaptcha($this->randomword());
				$data['captcha']= $cap['image'];
				$temp= $cap['word'];
				$data['captchaField']= "<tr>
						<td>Enter Captcha</td>
						<td><input id='captchaField' name='captchaField' type='text' /></td>
					</tr>";
				$this->session->set_userdata('captchaexist', true);
				$this->session->set_userdata('captcha', $cap);
				$this->load->view('view_login', $data);
			}
		}
		else
		{
			if($this->session->userdata('loggedin'))
			{
				redirect('http://localhost:8082/ci226Bus/home', 'refresh');
				return;
			}
			$data['message'] = '';
			$data['captcha']= "";
			$data['captchaField']= "" ;
			$this->load->view('view_login', $data);
		}
	}

	public function addcaptcha($word)
	{
			$config = array(
		    'word'	=> $word,
		    'img_path'	=> './captcha/',
		    'img_url'	=> './captcha/',
		    //'font_path'	=> './path/to/fonts/texb.ttf',
		    //'img_width'	=> '150',
		    //'img_height' => 30,
		    //'expiration' => 7200
		    );

		    $cap = create_captcha($config);
		    return $cap;
	}
	public function randomword($lenght=5)
	{
			$alldigit= "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
			$word = "" ;
			for($i= 0 ; $i <$lenght; $i++)
			{
				$word.= $alldigit[rand(0,61)];
			}
			return $word;
	}
}