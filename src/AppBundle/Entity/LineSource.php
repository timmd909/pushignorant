<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\Line as Line;

/**
 * LineSource
 *
 * @ORM\Table(name="line_source")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LineSourceRepository")
 */
class LineSource
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $url;

    /**
     * @ORM\OneToMany(targetEntity="Line", mappedBy="lineSource")
     */
    private $lines;

    /**
     * @ORM\ManyToMany(targetEntity="League", inversedBy="lineSources")
     * @ORM\JoinTable(name="line_sources_leagues")
     */
    private $leagues;

    public function __construct()
    {
        $this->lines = new ArrayCollection();
        $this->leagues = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
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
     * @return LineSource
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
     * Set league
     */
    public function setLeagues(ArrayCollection $leagues)
    {
        $this->leagues = $leagues;

        return $this;
    }

    /**
     * Get league
     */
    public function getLeagues()
    {
        return $this->leagues;
    }

    /**
     * Set league
     */
    public function setLines(ArrayCollection $lines)
    {
        $this->lines = $lines;

        return $this;
    }

    /**
     * Get league
     */
    public function getLines()
    {
        return $this->lines;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return LineSource
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    public function __toString() {
        return  'Line Source: ' . $this->name . ' (' . $this->url . ')';
    }
}
