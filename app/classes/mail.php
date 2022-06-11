<?php 

namespace App\classes;
use PHPMailer;

class mail
{
    protected $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer;
        $this->setUp();
    }

    public function setUp()
    {
        $this->mail->isSMTP();
        $this->mail->Mailer= 'smtp';
        $this->mail->SMTPAuth= true;
        $this->mail->SMTPSecure= 'tls';

        $this->mail->Host= $_ENV['SMTP_HOST'];
        $this->mail->Port= $_ENV['SMTP_PORT'];

        $envirment= $_ENV['APP_ENV'];
        if($envirment === 'local'){$this->mail->SMTPDebug= '';}

        //auth info
        $this->mail->Username= $_ENV['EMAIL_USERNAME'];
        $this->mail->Password=$_ENV['EMAIL_PASSWORD'];

        $this->mail->isHTML(true);
        $this->mail->SingleTo = true;

        //sender info
        $this->mail->from= $_ENV['ADMIN_EMAIL'];
        $this->mail->fromName= 'ACME Store';
    }

    public function send($data)
    {

        
        $this->mail->addAddress($data['to'],$data['name']);
        $this->mail->Subject = $data['subject'];
        $this->mail->Body= make($data['view'], array('data'=>$data['body']));
        return $this->mail->send();
    }
}