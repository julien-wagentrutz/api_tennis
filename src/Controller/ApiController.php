<?php

namespace App\Controller;

use App\Entity\Board;
use App\Entity\Country;
use App\Entity\Level;
use App\Entity\MatchTennis;
use App\Entity\Player;
use App\Entity\Round;
use App\Entity\Tourney;
use App\Entity\TourneyPlay;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
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
	public function players(SerializerInterface $serializer, Request $request): Response
	{
		$orderBy = 'id';
		$limit= null;
		$offset= 0;
		$desc= false;

		if(!empty($request->query->get('limit'))) {$limit = $request->query->get('limit');}
		if(!empty($request->query->get('orderby'))) {$orderBy = $request->query->get('orderby');}
		if(!empty($request->query->get('offset'))) {$offset = $request->query->get('offset');}
		if(!empty($request->query->get('desc'))) {$desc = $request->query->get('desc');}
		$param = array(
			"orderBy" => $orderBy,
			"limit" => $limit,
			"offset" => $offset,
			"desc" => $desc
		);

		$players = $this->getDoctrine()
					->getManager()
					->getRepository(Player::class)
					->findByWithParam($param);

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
			404
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
			) ;
		}
		return new JsonResponse(
			"There are no resources",
			404
		);
	}

	/**
	 * @Route("/api/players", name="api_players_create", methods="POST" )
	 */
	public function createPlayer(SerializerInterface $serializer,Request $request): Response
	{

		if(in_array("ROLE_ADMIN",$this->getUser()->getRoles()))
		{
			$player = new Player();
			$data = json_decode($request->getContent());
			$country = $this->getDoctrine()
				->getManager()
				->getRepository(Country::class)
				->findOneBy(['id' => $data->country]);

			$player->setName($data->name);
			$player->setLastName($data->lastName);
			$player->setBirthDate($data->birthDate);
			$player->setTurnedProDate($data->turnedPro);
			$player->setWeightLbs($data->weightLbs);
			$player->setWeightKg($data->weightKg);
			$player->setHeightFt($data->heightFt);
			$player->setHeightM($data->heightM);
			$player->setBirthPlace($data->birthPlace);
			$player->setResidencePlace($data->residencePlace);
			$player->setPlayHand($data->playHand);
			$player->setImgPath($data->imgPath);
			$player->setCoach($data->coach);
			$player->setBackHand($data->backHand);
			$player->setCountry($country);

			$this->getDoctrine()->getManager()->persist($player);
			$this->getDoctrine()->getManager()->flush();
			$playerJson = $serializer->normalize($player, 'json',['groups' => ['public_read','read_player']]);

			return new JsonResponse(
				$playerJson,
				201
			);
		}
		return new JsonResponse(
			"Request not allowed",
			405
		);
	}

	/**
	 * @Route("/api/players/{id}", name="api_players_update", methods="PUT" )
	 */
	public function updatePlayer($id, SerializerInterface $serializer,Request $request): Response
	{

		if(in_array("ROLE_ADMIN",$this->getUser()->getRoles()))
		{
			$player = $this->getDoctrine()
				->getManager()
				->getRepository(Player::class)
				->findOneBy(['id' => $id]);

			$data = json_decode($request->getContent());
			$country = $this->getDoctrine()
				->getManager()
				->getRepository(Country::class)
				->findOneBy(['id' => $data->country]);

			$player->setName($data->name);
			$player->setLastName($data->lastName);
			$player->setBirthDate($data->birthDate);
			$player->setTurnedProDate($data->turnedPro);
			$player->setWeightLbs($data->weightLbs);
			$player->setWeightKg($data->weightKg);
			$player->setHeightFt($data->heightFt);
			$player->setHeightM($data->heightM);
			$player->setBirthPlace($data->birthPlace);
			$player->setResidencePlace($data->residencePlace);
			$player->setPlayHand($data->playHand);
			$player->setImgPath($data->imgPath);
			$player->setCoach($data->coach);
			$player->setBackHand($data->backHand);
			$player->setCountry($country);

			$this->getDoctrine()->getManager()->flush();
			$playerJson = $serializer->normalize($player, 'json',['groups' => ['public_read','read_player']]);

			return new JsonResponse(
				$playerJson,
				200
			);
		}
		return new JsonResponse(
			"Request not allowed",
			405
		);
	}

	/**
	 * @Route("/api/players/{id}", name="api_players_delete", methods="DELETE" )
	 */
	public function deletePlayer($id): Response
	{
		$player = $this->getDoctrine()
			->getManager()
			->getRepository(Player::class)
			->findOneBy(['id' => $id]);

		if(in_array("ROLE_ADMIN",$this->getUser()->getRoles()))
		{
			if(!empty($player))
			{
				$this->getDoctrine()->getManager()->remove($player);
				$this->getDoctrine()->getManager()->flush();

				return new JsonResponse(
					null,
					204
				);
			}
			return new JsonResponse(
				null,
				404
			);

		}
		return new JsonResponse(
			"Request not allowed",
			405
		);
	}


	/**
	 *  Tourney
	 */

	/**
	 * @Route("/api/tourneys", name="api_tourneys", methods={"GET","HEAD"} )
	 */
	public function tourneys(SerializerInterface $serializer,Request $request): Response
	{
		$orderBy = 'id';
		$limit= null;
		$offset= 0;
		$desc= false;

		if(!empty($request->query->get('limit'))) {$limit = $request->query->get('limit');}
		if(!empty($request->query->get('orderby'))) {$orderBy = $request->query->get('orderby');}
		if(!empty($request->query->get('offset'))) {$offset = $request->query->get('offset');}
		if(!empty($request->query->get('desc'))) {$desc = $request->query->get('desc');}
		$param = array(
			"orderBy" => $orderBy,
			"limit" => $limit,
			"offset" => $offset,
			"desc" => $desc
		);


		$tourneys = $this->getDoctrine()
			->getManager()
			->getRepository(Tourney::class)
			->findByWithParam($param);

		if(sizeof($tourneys) > 0)
		{
			$tourneysJson = $serializer->normalize($tourneys, 'json',['groups' => ['public_read','read_tourney']]);
			return new JsonResponse(
				$tourneysJson,
				200
			);
		}
		return new JsonResponse(
			"There are no resources",
			404
		);

	}

	/**
	 * @Route("/api/tourneys/{id}", name="api_tourneys_id", methods={"GET","HEAD"} )
	 */
	public function tourneysById($id,SerializerInterface $serializer): Response
	{
		$tourney = $this->getDoctrine()
			->getManager()
			->getRepository(Tourney::class)
			->findOneBy(['id' => $id]);

		if(!empty($tourney))
		{
			$tourneyJson = $serializer->normalize($tourney, 'json',['groups' => ['public_read','read_tourney']]);
			return new JsonResponse(
				$tourneyJson,
				200
			);
		}
		return new JsonResponse(
			"There are no resources",
			404
		);
	}

	/**
	 * @Route("/api/tourneys", name="api_tourneys_create", methods="POST" )
	 */
	public function createTourney(SerializerInterface $serializer,Request $request): Response
	{

		if(in_array("ROLE_ADMIN",$this->getUser()->getRoles()))
		{
			$data = json_decode($request->getContent());

			$level = $this->getDoctrine()
				->getManager()
				->getRepository(Level::class)
				->findOneBy(['id' => $data->level]);
			$date = new \DateTime($data->createdAt);
			$date->format('d-m-Y');
			$tourney = new Tourney();
			$tourney->setName($data->name);
			$tourney->setCreatedAt($date);
			$tourney->setPathLogo($data->pathLogo);
			$tourney->setLevel($level);


			$this->getDoctrine()->getManager()->persist($tourney);
			$this->getDoctrine()->getManager()->flush();
			$tourneyJson = $serializer->normalize($tourney, 'json',['groups' => ['public_read','read_player']]);

			return new JsonResponse(
				$tourneyJson,
				201
			);
		}
		return new JsonResponse(
			"Request not allowed",
			405
		);
	}

	/**
	 * @Route("/api/tourneys/{id}", name="api_tourneys_update", methods="PUT" )
	 */
	public function updateTourney($id, SerializerInterface $serializer,Request $request): Response
	{

		if(in_array("ROLE_ADMIN",$this->getUser()->getRoles()))
		{
			$data = json_decode($request->getContent());

			$level = $this->getDoctrine()
				->getManager()
				->getRepository(Level::class)
				->findOneBy(['id' => $data->level]);
			$date = new \DateTime($data->createdAt);
			$date->format('d-m-Y');

			$tourney = $this->getDoctrine()
				->getManager()
				->getRepository(Tourney::class)
				->findOneBy(['id' => $id]);

			$tourney->setName($data->name);
			$tourney->setCreatedAt($date);
			$tourney->setPathLogo($data->pathLogo);
			$tourney->setLevel($level);


			$this->getDoctrine()->getManager()->persist($tourney);
			$this->getDoctrine()->getManager()->flush();
			$tourneyJson = $serializer->normalize($tourney, 'json',['groups' => ['public_read','read_player']]);

			return new JsonResponse(
				$tourneyJson,
				201
			);
		}
		return new JsonResponse(
			"Request not allowed",
			405
		);
	}

	/**
	 * @Route("/api/tourneys/{id}", name="api_tourneys_delete", methods="DELETE" )
	 */
	public function deleteTourney($id): Response
	{
		$tourney = $this->getDoctrine()
			->getManager()
			->getRepository(Tourney::class)
			->findOneBy(['id' => $id]);

		if(in_array("ROLE_ADMIN",$this->getUser()->getRoles()))
		{
			if(!empty($tourney))
			{
				$this->getDoctrine()->getManager()->remove($tourney);
				$this->getDoctrine()->getManager()->flush();

				return new JsonResponse(
					null,
					204
				);
			}
			return new JsonResponse(
				null,
				404
			);

		}
		return new JsonResponse(
			"Request not allowed",
			405
		);
	}

	/**
	 *  Tourney Play
	 */

	/**
	 * @Route("/api/tourneysPlay/", name="api_tourneys_play", methods={"GET","HEAD"} )
	 */
	public function tourneysPlay(SerializerInterface $serializer, Request $request): Response
	{
		$orderBy = 'id';
		$limit= null;
		$offset= 0;
		$desc= false;

		if(!empty($request->query->get('limit'))) {$limit = $request->query->get('limit');}
		if(!empty($request->query->get('orderby'))) {$orderBy = $request->query->get('orderby');}
		if(!empty($request->query->get('offset'))) {$offset = $request->query->get('offset');}
		if(!empty($request->query->get('desc'))) {$desc = $request->query->get('desc');}
		$param = array(
			"orderBy" => $orderBy,
			"limit" => $limit,
			"offset" => $offset,
			"desc" => $desc
		);

		$tourneysPlay = $this->getDoctrine()
			->getManager()
			->getRepository(TourneyPlay::class)
			->findByWithParam($param);

		if(sizeof($tourneysPlay) > 0)
		{
			$tourneysPlayJson = $serializer->normalize($tourneysPlay, 'json',['groups' => ['public_read',"read_tourneyPlay"]]);
			return new JsonResponse(
				$tourneysPlayJson,
				200
			);
		}
		return new JsonResponse(
			"There are no resources",
			404
		);

	}

	/**
	 * @Route("/api/tourneysPlay/{id}", name="api_tourneys_play_id", methods={"GET","HEAD"} )
	 */
	public function tourneyPlayById($id,SerializerInterface $serializer): Response
	{

		$tourneyPlay = $this->getDoctrine()
			->getManager()
			->getRepository(TourneyPlay::class)
			->findOneBy(['id' => $id]);

		if(!empty($tourneyPlay))
		{
			$tourneyPlayJson = $serializer->normalize($tourneyPlay, 'json',['groups' => ['public_read',"read_tourneyPlay"]]);
			return new JsonResponse(
				$tourneyPlayJson,
				200
			);
		}
		return new JsonResponse(
			"There are no resources",
			404
		);
	}

	/**
	 * @Route("/api/tourneysPlay", name="api_tourneys_play_create", methods="POST" )
	 */
	public function createTourneyPlay(SerializerInterface $serializer,Request $request): Response
	{

		if(in_array("ROLE_ADMIN",$this->getUser()->getRoles()))
		{
			$data = json_decode($request->getContent());
			$tourneyPlay = new TourneyPlay();
			$country = $this->getDoctrine()
				->getManager()
				->getRepository(Country::class)
				->findOneBy(['id' => $data->country]);
			$tourney = $this->getDoctrine()
				->getManager()
				->getRepository(Tourney::class)
				->findOneBy(['id' => $data->tourney]);
			$dateStart = new \DateTime($data->startDate);
			$dateStart->format('d-m-Y');
			$dateEnd = new \DateTime($data->endDate);
			$dateEnd->format('d-m-Y');

			$tourneyPlay->setCountry($country);
			$tourneyPlay->setTourney($tourney);
			$tourneyPlay->setCity($data->city);
			$tourneyPlay->setPlace($data->place);
			$tourneyPlay->setSurface($data->surface);
			$tourneyPlay->setDotation($data->dotation);
			$tourneyPlay->setEdition($data->edition);
			$tourneyPlay->setEndDate($dateStart);
			$tourneyPlay->setStartDate($dateEnd);
			$tourneyPlay->setOutdoor($data->outdoor);


			$this->getDoctrine()->getManager()->persist($tourneyPlay);
			$this->getDoctrine()->getManager()->flush();
			$tourneyPlayJson = $serializer->normalize($tourneyPlay, 'json',['groups' => ['public_read','read_player']]);

			return new JsonResponse(
				$tourneyPlayJson,
				201
			);
		}
		return new JsonResponse(
			"Request not allowed",
			405
		);
	}

	/**
	 * @Route("/api/tourneysPlay/{id}", name="api_tourneys_play_update", methods="PUT" )
	 */
	public function updateTourneyPlay($id, SerializerInterface $serializer,Request $request): Response
	{

		if(in_array("ROLE_ADMIN",$this->getUser()->getRoles()))
		{
			$data = json_decode($request->getContent());
			$tourneyPlay = $this->getDoctrine()
				->getManager()
				->getRepository(TourneyPlay::class)
				->findOneBy(['id' => $id]);

			$country = $this->getDoctrine()
				->getManager()
				->getRepository(Country::class)
				->findOneBy(['id' => $data->country]);
			$tourney = $this->getDoctrine()
				->getManager()
				->getRepository(Tourney::class)
				->findOneBy(['id' => $data->tourney]);
			$dateStart = new \DateTime($data->startDate);
			$dateStart->format('d-m-Y');
			$dateEnd = new \DateTime($data->endDate);
			$dateEnd->format('d-m-Y');

			$tourneyPlay->setCountry($country);
			$tourneyPlay->setTourney($tourney);
			$tourneyPlay->setCity($data->city);
			$tourneyPlay->setPlace($data->place);
			$tourneyPlay->setSurface($data->surface);
			$tourneyPlay->setDotation($data->dotation);
			$tourneyPlay->setEdition($data->edition);
			$tourneyPlay->setEndDate($dateStart);
			$tourneyPlay->setStartDate($dateEnd);
			$tourneyPlay->setOutdoor($data->outdoor);


			$this->getDoctrine()->getManager()->persist($tourneyPlay);
			$this->getDoctrine()->getManager()->flush();
			$tourneyPlayJson = $serializer->normalize($tourneyPlay, 'json',['groups' => ['public_read','read_player']]);

			return new JsonResponse(
				$tourneyPlayJson,
				201
			);
		}
		return new JsonResponse(
			"Request not allowed",
			405
		);
	}

	/**
	 * @Route("/api/tourneysPlay/{id}", name="api_tourneys_play_delete", methods="DELETE" )
	 */
	public function deleteTourneyPlay($id): Response
	{
		$tourneyPlay = $this->getDoctrine()
			->getManager()
			->getRepository(TourneyPlay::class)
			->findOneBy(['id' => $id]);

		if(in_array("ROLE_ADMIN",$this->getUser()->getRoles()))
		{
			if(!empty($tourneyPlay))
			{
				$this->getDoctrine()->getManager()->remove($tourneyPlay);
				$this->getDoctrine()->getManager()->flush();

				return new JsonResponse(
					null,
					204
				);
			}
			return new JsonResponse(
				null,
				404
			);

		}
		return new JsonResponse(
			"Request not allowed",
			405
		);
	}

	/**
	 *  Board
	 */

	/**
	 * @Route("/api/boards", name="api_boards", methods={"GET","HEAD"} )
	 */
	public function boards(SerializerInterface $serializer, Request $request): Response
	{
		$orderBy = 'id';
		$limit= null;
		$offset= 0;
		$desc= false;

		if(!empty($request->query->get('limit'))) {$limit = $request->query->get('limit');}
		if(!empty($request->query->get('orderby'))) {$orderBy = $request->query->get('orderby');}
		if(!empty($request->query->get('offset'))) {$offset = $request->query->get('offset');}
		if(!empty($request->query->get('desc'))) {$desc = $request->query->get('desc');}
		$param = array(
			"orderBy" => $orderBy,
			"limit" => $limit,
			"offset" => $offset,
			"desc" => $desc
		);

		$boards = $this->getDoctrine()
			->getManager()
			->getRepository(Board::class)
			->findByWithParam($param);

		if(sizeof($boards) > 0)
		{
			$boardsJson = $serializer->normalize($boards, 'json',['groups' => ['public_read','read_board']]);
			return new JsonResponse(
				$boardsJson,
				200
			);
		}
		return new JsonResponse(
			"There are no resources",
			404
		);

	}

	/**
	 * @Route("/api/boards/{id}", name="api_boards_id", methods={"GET","HEAD"} )
	 */
	public function boardsById($id,SerializerInterface $serializer): Response
	{

		$board = $this->getDoctrine()
			->getManager()
			->getRepository(MatchTennis::class)
			->findOneBy(['id' => $id]);

		if(!empty($board))
		{
			$boardJson = $serializer->normalize($board, 'json',['groups' => ['public_read','read_board']]);
			return new JsonResponse(
				$boardJson,
				200
			);
		}
		return new JsonResponse(
			"There are no resources",
			404
		);
	}

	/**
	 * @Route("/api/boards", name="api_boards_create", methods="POST" )
	 */
	public function createBoard(SerializerInterface $serializer,Request $request): Response
	{

		if(in_array("ROLE_ADMIN",$this->getUser()->getRoles()))
		{
			$data = json_decode($request->getContent());
			$board = new Board();
			$tourneyPlay = $this->getDoctrine()
				->getManager()
				->getRepository(TourneyPlay::class)
				->findOneBy(['id' => $data->tourneyPlay]);

			$board->setTourneyPlay($tourneyPlay);
			$board->setType($data->type);
			$board->setNbPlayer($data->nbPlayer);


			$this->getDoctrine()->getManager()->persist($board);
			$this->getDoctrine()->getManager()->flush();
			$boardJson = $serializer->normalize($board, 'json',['groups' => ['public_read','read_player']]);

			return new JsonResponse(
				$boardJson,
				201
			);
		}
		return new JsonResponse(
			"Request not allowed",
			405
		);
	}

	/**
	 * @Route("/api/boards/{id}", name="api_boards_update", methods="PUT" )
	 */
	public function updateBoard($id, SerializerInterface $serializer,Request $request): Response
	{

		if(in_array("ROLE_ADMIN",$this->getUser()->getRoles()))
		{
			$data = json_decode($request->getContent());
			$board = $this->getDoctrine()
				->getManager()
				->getRepository(Board::class)
				->findOneBy(['id' => $id]);

			$tourneyPlay = $this->getDoctrine()
				->getManager()
				->getRepository(TourneyPlay::class)
				->findOneBy(['id' => $data->tourneyPlay]);

			$board->getTourneyPlay($tourneyPlay);
			$board->setType($data->type);
			$board->setNbPlayer($data->nbPlayer);

			$this->getDoctrine()->getManager()->persist($board);
			$this->getDoctrine()->getManager()->flush();
			$boardJson = $serializer->normalize($board, 'json',['groups' => ['public_read','read_player']]);

			return new JsonResponse(
				$boardJson,
				201
			);
		}
		return new JsonResponse(
			"Request not allowed",
			405
		);
	}

	/**
	 * @Route("/api/boards/{id}", name="api_boards_delete", methods="DELETE" )
	 */
	public function deleteBoard($id): Response
	{
		$board = $this->getDoctrine()
			->getManager()
			->getRepository(Board::class)
			->findOneBy(['id' => $id]);

		if(in_array("ROLE_ADMIN",$this->getUser()->getRoles()))
		{
			if(!empty($board))
			{
				$this->getDoctrine()->getManager()->remove($board);
				$this->getDoctrine()->getManager()->flush();

				return new JsonResponse(
					null,
					204
				);
			}
			return new JsonResponse(
				null,
				404
			);

		}
		return new JsonResponse(
			"Request not allowed",
			405
		);
	}

	/**
	 *  Match
	 */

	/**
	 * @Route("/api/matchs", name="api_matchs", methods={"GET","HEAD"} )
	 */
	public function matchs(SerializerInterface $serializer, Request $request): Response
	{
		$orderBy = 'id';
		$limit= null;
		$offset= 0;
		$desc= false;

		if(!empty($request->query->get('limit'))) {$limit = $request->query->get('limit');}
		if(!empty($request->query->get('orderby'))) {$orderBy = $request->query->get('orderby');}
		if(!empty($request->query->get('offset'))) {$offset = $request->query->get('offset');}
		if(!empty($request->query->get('desc'))) {$desc = $request->query->get('desc');}
		$param = array(
			"orderBy" => $orderBy,
			"limit" => $limit,
			"offset" => $offset,
			"desc" => $desc
		);

		$matchs = $this->getDoctrine()
			->getManager()
			->getRepository(MatchTennis::class)
			->findByWithParam($param);

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
			404
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
			404
		);
	}

	/**
	 * @Route("/api/matchs", name="api_matchs_create", methods="POST" )
	 */
	public function createMatchs(SerializerInterface $serializer,Request $request): Response
	{

		if(in_array("ROLE_ADMIN",$this->getUser()->getRoles()))
		{
			$data = json_decode($request->getContent());
			$match = new MatchTennis();
			$round = $this->getDoctrine()
				->getManager()
				->getRepository(Round::class)
				->findOneBy(['id' => $data->round]);
			$board = $this->getDoctrine()
				->getManager()
				->getRepository(Board::class)
				->findOneBy(['id' => $data->board]);
			$date = new \DateTime($data->date);
			$date->format('d-m-Y');

			$match->setBoard($board);
			$match->setRound($round);
			$match->setTypeMatch($data->type);
			$match->setMatchTime($data->time);
			$match->setMatchDate($date);
			$match->setPlayer1PointDuringMatch($data->player_1_point);
			$match->setPlayer2PointDuringMatch($data->player_2_point);
			$match->setPlayer12PointDuringMatch($data->player_1_2_point);
			$match->setPlayer22PointDuringMatch($data->player_2_2_point);
			$match->setPlayer1RankDuringMatch($data->player_1_rank);
			$match->setPlayer2RankDuringMatch($data->player_2_rank);
			$match->setPlayer12RankDuringMatch($data->player_1_2_rank);
			$match->setPlayer22RankDuringMatch($data->player_2_2_rank);

			$this->getDoctrine()->getManager()->persist($match);
			$this->getDoctrine()->getManager()->flush();
			$matchJson = $serializer->normalize($match, 'json',['groups' => ['public_read','read_player']]);

			return new JsonResponse(
				$matchJson,
				201
			);
		}
		return new JsonResponse(
			"Request not allowed",
			405
		);
	}

	/**
	 * @Route("/api/matchs/{id}", name="api_matchs_update", methods="PUT" )
	 */
	public function updateMatchs($id, SerializerInterface $serializer,Request $request): Response
	{

		if(in_array("ROLE_ADMIN",$this->getUser()->getRoles()))
		{
			$data = json_decode($request->getContent());
			$match = $this->getDoctrine()
				->getManager()
				->getRepository(MatchTennis::class)
				->findOneBy(['id' => $id]);
			$round = $this->getDoctrine()
				->getManager()
				->getRepository(Round::class)
				->findOneBy(['id' => $data->round]);
			$board = $this->getDoctrine()
				->getManager()
				->getRepository(Board::class)
				->findOneBy(['id' => $data->board]);
			$date = new \DateTime($data->date);
			$date->format('d-m-Y');

			$match->setBoard($board);
			$match->setRound($round);
			$match->setTypeMatch($data->type);
			$match->setMatchTime($data->time);
			$match->setMatchDate($date);
			$match->setPlayer1PointDuringMatch($data->player_1_point);
			$match->setPlayer2PointDuringMatch($data->player_2_point);
			$match->setPlayer12PointDuringMatch($data->player_1_2_point);
			$match->setPlayer22PointDuringMatch($data->player_2_2_point);
			$match->setPlayer1RankDuringMatch($data->player_1_rank);
			$match->setPlayer2RankDuringMatch($data->player_2_rank);
			$match->setPlayer12RankDuringMatch($data->player_1_2_rank);
			$match->setPlayer22RankDuringMatch($data->player_2_2_rank);

			$this->getDoctrine()->getManager()->persist($match);
			$this->getDoctrine()->getManager()->flush();
			$matchJson = $serializer->normalize($match, 'json',['groups' => ['public_read','read_player']]);

			return new JsonResponse(
				$matchJson,
				201
			);
		}
		return new JsonResponse(
			"Request not allowed",
			405
		);
	}

	/**
	 * @Route("/api/matchs/{id}", name="api_matchs_delete", methods="DELETE" )
	 */
	public function deleteMatchs($id): Response
	{
		$match = $this->getDoctrine()
			->getManager()
			->getRepository(MatchTennis::class)
			->findOneBy(['id' => $id]);

		if(in_array("ROLE_ADMIN",$this->getUser()->getRoles()))
		{
			if(!empty($match))
			{
				$this->getDoctrine()->getManager()->remove($match);
				$this->getDoctrine()->getManager()->flush();

				return new JsonResponse(
					null,
					204
				);
			}
			return new JsonResponse(
				null,
				404
			);

		}
		return new JsonResponse(
			"Request not allowed",
			405
		);
	}
}

