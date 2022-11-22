<?php

namespace App\Controller;

use App\Service\MailerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home', methods: ['POST', 'GET'])]
    public function index(): JsonResponse
    {
        return new JsonResponse('posts');
    }

    #[Route('/', name: 'home')]
    public function post(MailerService $mailer): JsonResponse
    {
        $from = 'siteemail@gmail.com';

        // Envoie de mail à l'utilisateur
        $useremail = 'test2@gmail.com';

        $username = 'user';

        $user_email_sujet = 'Votre RDV avec Mickael Vieira';

        $user_email_template = 'mails/_user_mail.html.twig';

        $mailer->sendMail($from, $useremail, $user_email_sujet, $username, $user_email_template);

        // Envoie de mail à l'administrateur
        $adminemail = 'test2@gmail.com';

        $adminname = 'admin';

        $admin_email_sujet = 'Votre RDV avec Mickael Vieira';

        $admin_email_template = 'mails/_admin_mail.html.twig';

        $mailer->sendMail($from, $adminemail, $admin_email_sujet, $adminname, $admin_email_template);

        return new JsonResponse('posts');
    }
}
