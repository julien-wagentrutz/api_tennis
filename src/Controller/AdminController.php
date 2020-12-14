<?php

namespace App\Controller;

use App\Entity\Tourney;
use App\Form\TourneyType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
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
		    'menu' => 'user',
		    'aside' => 'dashboard'
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
	public function adminTourneys(PaginatorInterface $paginator, Request $request): Response
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

		return $this->render('admin/tourney/index.html.twig', [
			'tourneys' => $tourneys,
			'menu' => 'user',
			'aside' => 'tourney'
		]);
	}

	/**
	 * @Route("/admin/tourneys/new", name="admin_tourneys_new", methods={"GET","POST"})
	 */
	public function adminNewTourneys(Request $request, EntityManagerInterface $em): Response
	{
		$tourney = new Tourney();
		$form = $this->createForm(TourneyType::class, $tourney);

		if ($request->isMethod('POST')) {
			$form->submit($request->request->get($form->getName()));

			if ($form->isSubmitted() && $form->isValid()) {
				$em->persist($tourney);
				$em->flush();
				return $this->redirectToRoute('admin_tourneys');
			}
		}

		return $this->render('admin/tourney/new.html.twig', [
			'form' => $form->createView(),
			'menu' => 'user',
			'aside' => 'tourney'
		]);
	}

	/**
	 * @Route("/admin/tourneys/{id}", name="admin_tourneys_show", methods={"GET","POST"})
	 */
	public function adminShowTourney(Request $request, EntityManagerInterface $em, $id): Response
	{
		$tourney = $em->getRepository(Tourney::class)->findOneBy(['id' =>$id]);

		return $this->render('admin/tourney/show.html.twig', [
			'tourney' => $tourney,
			'menu' => 'user',
			'aside' => 'tourney'
		]);
	}
}
