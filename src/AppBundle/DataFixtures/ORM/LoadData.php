<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\League;
use AppBundle\Entity\LineSource;
use AppBundle\Entity\Line;
use AppBundle\Entity\Team;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadData implements FixtureInterface, ContainerAwareInterface
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

    /**
     * Location of YAML data relative to the kernel root
     */
    const LINE_SOURCE_YAML = '/../app/Resources/fixtures/line-sources.yml';

    /**
     * Loads and parse a YAML file
     * @param  string $filename Path relative to root_dir
     * @return YAML data
     */
    private function loadAndParseYaml($filename) {
        $rootDir = ($this->container->getParameter('kernel.root_dir'));
        $filename = $rootDir . $filename;

        if (!is_file($filename)) {
            throw new \Error("Unable to load '$filename' YAML data");
        }

        $yamlContent = file_get_contents($filename);
        return yaml_parse($yamlContent);
    }

    private function loadLineSources(ObjectManager $manager) {
        $parsed = $this->loadAndParseYaml(self::LINE_SOURCE_YAML);
        $lineSourceData = $parsed['LineSources'];

        foreach ($lineSourceData as $currLineSource) {
            $lineSourceName = $currLineSource['name'];
            $lineSourceUrl = $currLineSource['url'];
            $lineSourceLines = $currLineSource['lines'];
            $lineSourceLeagues = $currLineSource['leagues'];

            $lineSource = new LineSource();
            $lineSource->setName($lineSourceName);
            $lineSource->setUrl($lineSourceUrl);

            print("Processing $lineSource\n");

            $lines = [];
            foreach ($lineSourceLines as $currLine) {
                print("\t- ${currLine}\n");
                $line = new Line();
                $line->setName($currLine);
                $line->setLineSource($lineSource);
                $manager->persist($line);
                $lines[] = $line;
            }

            $leagueRepo = $manager->getRepository('AppBundle\Entity\League');
            foreach ($lineSourceLeagues as $currLeagueName) {
                $leagueEntity = $leagueRepo->findByName($currLeagueName);
                $leagueEntity = $leagueEntity[0];
                $lineSource->getLeagues()->add($leagueEntity);
            }

            $manager->persist($lineSource);
        }
    }

    private function loadTeams(ObjectManager $manager) {
        $parsed = $this->loadAndParseYaml(self::TEAM_YAML);
        $leagueData = $parsed['Leagues'];

        foreach ($leagueData as $currLeague) {
            $leagueName = $currLeague['name'];
            $numTeams = count($currLeague['teams']);
            // print("Found league: $leagueName ($numTeams total teams)\n");

            $league = new League();
            $league->setName($leagueName);
            $manager->persist($league);

            print("Processing $league\n");

            foreach($currLeague['teams'] as $currTeam) {
                $team = new Team();
                $team->setName($currTeam['name']);
                $team->setRegion($currTeam['region']);
                $team->setLeague($league);
                $manager->persist($team);
                print ("\tProcessing $team\n");
            } // foreach teams
        } // foreach leagues
    }

    /**
     * Loads the basic database
     * @param  ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $this->loadTeams($manager);
        $manager->flush();

        $this->loadLineSources($manager);
        $manager->flush();
    } // public function load(...)
}
