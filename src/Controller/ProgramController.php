<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class ProgramController extends AbstractController
{
    #[Route('/program', name: 'program_index')]
    public function index(): Response
    {
        return $this->render('program/index.html.twig', [
            'website' => 'Wild Series',
        ]);
    }

    #[Route('/program/{id}', requirements: ['page' => '\d+'], methods: ['GET'], name: 'program_id')]
    public function selectOneById($id = 1): Response
    {

        if (!is_numeric($id)) {
            throw new NotFoundHttpException('404 - Page not found');
        }
        return $this->render('program/show.html.twig', [
            'program_id' => 'Série n°' . $id,
        ]);
    }
}
