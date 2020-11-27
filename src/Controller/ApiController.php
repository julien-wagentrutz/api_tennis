<?php

namespace App\Controller;

use App\Entity\MatchTennis;
use App\Entity\Player;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ApiController extends AbstractController
{
    /**
     * @Route("/api", name="api")
     */
    public function index(): Response
    {
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }

	/**
	 *  PLAYERS
	 */

	/**
	 * @Route("/api/players", name="api_players", methods={"GET","HEAD"} )
	 */
	public function players(SerializerInterface $serializer): Response
	{
		$players = $this->getDoctrine()
					->getManager()
					->getRepository(Player::class)
					->findAll();

		if(sizeof($players) > 0)
		{
			$playersJson = $serializer->normalize($players, 'json',['groups' => ['public_read','read_player']]);
			return new JsonResponse(
				$playersJson,
				200
			);
		}
		return new JsonResponse(
			"There are no resources",
			200
		);

	}

	/**
	 * @Route("/api/players/{id}", name="api_players_id", methods={"GET","HEAD"} )
	 */
	public function playersById($id,SerializerInterface $serializer): Response
	{

		$player = $this->getDoctrine()
			->getManager()
			->getRepository(Player::class)
			->findOneBy(['id' => $id]);

		if(!empty($player))
		{
			$playerJson = $serializer->normalize($player, 'json',['groups' => ['public_read','read_player']]);
			return new JsonResponse(
				$playerJson,
				200
			);
		}
		return new JsonResponse(
			"There are no resources",
			403
		);
	}

	/**
	 * @Route("/api/players/{id}", name="api_players_create", methods="POST" )
	 */
	public function createPlayer(): Response
	{

		return new JsonResponse(
			null,
			200
		);
	}

	/**
	 * @Route("/api/players/{id}", name="api_players_update", methods="PUT" )
	 */
	public function updatePlayer(): Response
	{

		return new JsonResponse(
			null,
			200
		);
	}

	/**
	 * @Route("/api/players/{id}", name="api_players_delete", methods="DELETE" )
	 */
	public function deletePlayer(): Response
	{

		return new JsonResponse(
			null,
			200
		);
	}

	/**
	 *  Match
	 */

	/**
	 * @Route("/api/matchs", name="api_matchs", methods={"GET","HEAD"} )
	 */
	public function matchs(SerializerInterface $serializer): Response
	{
		$matchs = $this->getDoctrine()
			->getManager()
			->getRepository(MatchTennis::class)
			->findAll();

		if(sizeof($matchs) > 0)
		{
			$matchsJson = $serializer->normalize($matchs, 'json',['groups' => ['public_read','read_match']]);
			return new JsonResponse(
				$matchsJson,
				200
			);
		}
		return new JsonResponse(
			"There are no resources",
			200
		);

	}

	/**
	 * @Route("/api/matchs/{id}", name="api_matchs_id", methods={"GET","HEAD"} )
	 */
	public function matchsById($id,SerializerInterface $serializer): Response
	{

		$match = $this->getDoctrine()
			->getManager()
			->getRepository(MatchTennis::class)
			->findOneBy(['id' => $id]);

		if(!empty($match))
		{
			$matchJson = $serializer->normalize($match, 'json',['groups' => ['public_read','read_match']]);
			return new JsonResponse(
				$matchJson,
				200
			);
		}
		return new JsonResponse(
			"There are no resources",
			403
		);
	}

}

