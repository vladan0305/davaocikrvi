<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AppCities
 *
 * @ORM\Table(name="app_cities", indexes={@ORM\Index(name="country_id", columns={"country_id"})})
 * @ORM\Entity
 */
class AppCities
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="post_code", type="string", length=15, nullable=false)
     */
    private $postCode;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\AppCountry
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\AppCountry")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     * })
     */
    private $country;



    /**
     * Set name
     *
     * @param string $name
     *
     * @return AppCities
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
     * Set postCode
     *
     * @param string $postCode
     *
     * @return AppCities
     */
    public function setPostCode($postCode)
    {
        $this->postCode = $postCode;

        return $this;
    }

    /**
     * Get postCode
     *
     * @return string
     */
    public function getPostCode()
    {
        return $this->postCode;
    }

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
     * Set country
     *
     * @param \AppBundle\Entity\AppCountry $country
     *
     * @return AppCities
     */
    public function setCountry(\AppBundle\Entity\AppCountry $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \AppBundle\Entity\AppCountry
     */
    public function getCountry()
    {
        return $this->country;
    }
}
