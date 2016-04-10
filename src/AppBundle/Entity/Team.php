<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
//use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 */
class Team
{
    public function __construct()
    {
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="text",length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="text",length=200)
     */
    private $region;

    /**
     * @ORM\ManyToOne(targetEntity="League", inversedBy="teams")
     */
    private $league;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Team
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set region
     *
     * @param string $region
     *
     * @return Team
     */
    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set league
     *
     * @param \AppBundle\Entity\League $league
     *
     * @return Team
     */
    public function setLeague(\AppBundle\Entity\League $league = null)
    {
        $this->league = $league;

        return $this;
    }

    /**
     * Get league
     *
     * @return \AppBundle\Entity\League
     */
    public function getLeague()
    {
        return $this->league;
    }

    public function __toString() {
        return  'Team: ' . $this->name . ' (' . $this->getLeague()->getName() . ')';
    }

}
