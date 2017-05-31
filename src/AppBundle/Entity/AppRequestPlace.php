<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AppRequestPlace
 *
 * @ORM\Table(name="app_request_place", indexes={@ORM\Index(name="city_id", columns={"city_id"})})
 * @ORM\Entity
 */
class AppRequestPlace
{
    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=false)
     */
    private $address;

    /**
     * @var boolean
     *
     * @ORM\Column(name="type", type="boolean", nullable=false)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\AppCities
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\AppCities")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="city_id", referencedColumnName="id")
     * })
     */
    private $city;



    /**
     * Set address
     *
     * @param string $address
     *
     * @return AppRequestPlace
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set type
     *
     * @param boolean $type
     *
     * @return AppRequestPlace
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return boolean
     */
    public function getType()
    {
        return $this->type;
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
     * Set city
     *
     * @param \AppBundle\Entity\AppCities $city
     *
     * @return AppRequestPlace
     */
    public function setCity(\AppBundle\Entity\AppCities $city = null)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return \AppBundle\Entity\AppCities
     */
    public function getCity()
    {
        return $this->city;
    }
}
