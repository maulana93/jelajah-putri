<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Kontak extends CI_Controller {
public function __construct()
{
	parent::__construct();
	//get query
	$this->load->model(array('m_banner'),'',TRUE);
	$this->load->library(array('session','form_validation'));
	$this->load->helper('form');

	require APPPATH.'libraries/phpmailer/src/Exception.php';
	require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
	require APPPATH.'libraries/phpmailer/src/SMTP.php';
}
	public function index()
	{
		$data['title'] = 'Jelajah Putri - Hubungi Kami';
		$data['menu_active'] = 'kontak';
		$data['banner'] = $this->m_banner->listData();
		$this->load->view('kontak',$data);
	}
	public function send_mail() {
		if($this->input->post('kirim'))
		{
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$messages = $this->input->post('messages');

			// PHPMailer object
			$response = false;
			$mail = new PHPMailer();

			// SMTP configuration
			$mail->isSMTP();
			$mail->Host     = 'mail.jelajahputri.com';
			$mail->SMTPAuth = true;
			$mail->Username = 'info@jelajahputri.com'; // user email anda
			$mail->Password = 'Info@jelajah123'; // password email anda
			$mail->SMTPSecure = 'ssl';
			$mail->Port     = 465;

			$mail->setFrom('info@jelajahputri.com', $name.', Hubungi Kami'); // user email anda
			$mail->addReplyTo('info@jelajahputri.com', ''); //user email anda

			// Email subject
			$mail->Subject = 'Partnership'; //subject email

			// Add a recipient
			$mail->addAddress('maulanaciel@gmail.com'); //email tujuan pengiriman email

			// Set email format to HTML
			$mail->isHTML(true);

			// Email body content
			$mailContent = "<p>Hallo tim Jelajahputri, silahkan kontak partner berikut:</p>
			<table>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td>".$name."</td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td>".$email."</td>
				</tr>
				<tr>
					<td>Pesan</td>
					<td>:</td>
					<td>".$messages."</td>
				</tr>
			</table>
			<p>Terimakasih.</p>"; // isi email
			$mail->Body = $mailContent;

			// Send email
			if(!$mail->send()){
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			}else{
				echo 'Message has been sent';
			}
			
		}
    }
}
