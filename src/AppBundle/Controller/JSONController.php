<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class JSONController extends Controller
{
    public function showAction(Request $request, $name = NULL)
    {
        $em = $this->getDoctrine()->getManager();

        /**
         * Holds the template's location
         */
        $template;

        /**
         * Data to pass to the template
         */
        $data = [];

        $response = new Response(
            'Content',
            Response::HTTP_OK,
            array('content-type' => 'application/json')
        );

        switch ($name) {
            case 'teams':
                $template = "json/teams.json.twig";
                $leagueRepo = $em->getRepository('AppBundle\Entity\League');
                $teamRepo = $em->getRepository('AppBundle\Entity\Team');

                $data = [ 'leagues' => []];

                foreach ($leagueRepo->findAll() as $currLeague) {
                    $league = [
                        'id' => $currLeague->getId(),
                        'name' => $currLeague->getName(),
                        'teams' => []
                    ];

                    foreach ($teamRepo->findByLeague($currLeague) as $currTeam) {
                        $team = [
                            'id' => $currTeam->getId(),
                            'name' => $currTeam->getName(),
                            'region' => $currTeam->getRegion()
                        ];
                        $league['teams'][] = $team;
                    }

                    $data['leagues'][] = $league;
                }
                break;

            default:
                $template = "json/error.json.twig";
                $data['message'] = "JSON data of name '$name' not recognized";
                break;
        }
        return $this->render($template, $data, $response);
    }

}
