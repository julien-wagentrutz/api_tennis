<?php

namespace App\Controller;

use App\Entity\Tourney;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

	/**
	 * @Route("/admin/players", name="admin_players", methods="GET")
	 */
	public function adminShowPlayers(): Response
	{

		return $this->render('admin/index.html.twig', [
			'controller_name' => 'AdminController',
		]);
	}

	/**
	 * @Route("/admin/tourneys", name="admin_tourneys", methods="GET")
	 */
	public function adminShowtourneys(PaginatorInterface $paginator, Request $request): Response
	{
		$datas = $this->getDoctrine()
			->getManager()
			->getRepository(Tourney::class)
			->findAll();

		$tourneys = $paginator->paginate(
			$datas,
			$request->query->getInt('page', 1),
			20
		);

		return $this->render('admin/index.html.twig', [
			'tourneys' => $tourneys,
		]);
	}
}
