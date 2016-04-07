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

        return yaml_parse($yamlContent);
    }

    public function load(ObjectManager $manager)
    {
        $teamData = $this->loadTeamYaml();
        var_dump($teamData);

//        $leagueRepo = $manager->getRepository('League');
//        $leagues = $leagueRepo->findAll();

        $manager->flush();
    }
}
