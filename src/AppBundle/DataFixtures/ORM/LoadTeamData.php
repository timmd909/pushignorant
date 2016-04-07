<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\League;
use AppBundle\Entity\Team;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadTeamData implements FixtureInterface, ContainerAwareInterface
{
    /**
     * The dependency injection container.
     *
     * @var ContainerInterface
     */
    protected $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = NULL)
    {
        $this->container = $container;
    }

    /**
     * Location of YAML data relative to the kernel root
     */
    const TEAM_YAML = '/../app/Resources/fixtures/teams.yml';

    private function loadTeamYaml() {
        $rootDir = ($this->container->getParameter('kernel.root_dir'));
        $filename = $rootDir . self::TEAM_YAML;

        if (!is_file($filename)) {
            throw new \Error('Unable to load team YAML data');
        }

        $yamlContent = file_get_contents($filename);
        $parsed = yaml_parse($yamlContent);

        return $parsed['Leagues'];
    }

    public function load(ObjectManager $manager)
    {
        $leagueData = $this->loadTeamYaml();

        foreach ($leagueData as $currLeague) {
            $leagueName = $currLeague['name'];
            $numTeams = count($currLeague['teams']);
            print("Found league: $leagueName ($numTeams total teams)\n");

            $league = new League();
            $league->setName($leagueName);
            $manager->persist($league);

            foreach($currLeague['teams'] as $currTeam) {
                $team = new Team();
                $team->setName($currTeam['name']);
                $team->setRegion($currTeam['region']);
                $team->setLeague($league);
                $manager->persist($team);
            } // foreach teams
        } // foreach leagues

        $manager->flush();
    } // public function load(...)
}
