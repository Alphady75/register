<?php

namespace App\Service;

use App\Entity\Immobilier;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;

class MailerService {

	public function __construct(private MailerInterface $mailer){

	}

	public function sendMail($from, $to, $sujet, $username, $template){


		$email = (new TemplatedEmail())
			->from($from)
			->to($to)
			->subject($sujet)
			->htmlTemplate($template)
			->context([
				'username' => $username,
			])
		;

		return $this->mailer->send($email);
	}

}