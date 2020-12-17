<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * @Route("/", name="app")
     */
    public function index(): Response
    {
        return $this->render('app/index.html.twig', [
            'menu' => 'home',
        ]);
    }

	/**
	 * @Route("/doc", name="app_doc")
	 */
	public function documention(): Response
	{
		return $this->render('app/documentation/index.html.twig', [
			'menu' => 'documentation',
			'aside' => ''
		]);
	}
}
