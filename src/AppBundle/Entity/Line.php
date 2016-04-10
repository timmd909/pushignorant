<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Line
 *
 * @ORM\Table(name="line")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LineRepository")
 */
class Line
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="LineSource", inversedBy="lines")
     */
    private $lineSource;

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
     * @return Line
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

    public function getLineSource()
    {
        return $this->lineSource;
    }

    public function setLineSource($lineSource)
    {
        $this->lineSource = $lineSource;
        return $this;
    }

    public function __toString() {
        return 'Line: ' . $this->name;
    }
}
