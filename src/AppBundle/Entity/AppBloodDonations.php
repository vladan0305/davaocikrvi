<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AppBloodDonations
 *
 * @ORM\Table(
 *     name="app_blood_donations",
 *     indexes={@ORM\Index(name="id_user", columns={"id_user"}
 * ),
 * @ORM\Index(name="id_place", columns={"id_place"}),
 * @ORM\Index(name="id_request", columns={"id_request"})})
 * @ORM\Entity
 */
class AppBloodDonations
{
    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer", nullable=false)
     */
    private $quantity;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\AppRequest
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\AppRequest")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_request", referencedColumnName="id")
     * })
     */
    private $idRequest;

    /**
     * @var \AppBundle\Entity\AppCities
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\AppCities")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_place", referencedColumnName="id")
     * })
     */
    private $idPlace;

    /**
     * @var \AppBundle\Entity\AppUsers
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\AppUsers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;



    /**
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return AppBloodDonations
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return AppBloodDonations
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set status
     *
     * @param boolean $status
     *
     * @return AppBloodDonations
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean
     */
    public function getStatus()
    {
        return $this->status;
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
     * Set idRequest
     *
     * @param \AppBundle\Entity\AppRequest $idRequest
     *
     * @return AppBloodDonations
     */
    public function setIdRequest(\AppBundle\Entity\AppRequest $idRequest = null)
    {
        $this->idRequest = $idRequest;

        return $this;
    }

    /**
     * Get idRequest
     *
     * @return \AppBundle\Entity\AppRequest
     */
    public function getIdRequest()
    {
        return $this->idRequest;
    }

    /**
     * Set idPlace
     *
     * @param \AppBundle\Entity\AppCities $idPlace
     *
     * @return AppBloodDonations
     */
    public function setIdPlace(\AppBundle\Entity\AppCities $idPlace = null)
    {
        $this->idPlace = $idPlace;

        return $this;
    }

    /**
     * Get idPlace
     *
     * @return \AppBundle\Entity\AppCities
     */
    public function getIdPlace()
    {
        return $this->idPlace;
    }

    /**
     * Set idUser
     *
     * @param \AppBundle\Entity\AppUsers $idUser
     *
     * @return AppBloodDonations
     */
    public function setIdUser(\AppBundle\Entity\AppUsers $idUser = null)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return \AppBundle\Entity\AppUsers
     */
    public function getIdUser()
    {
        return $this->idUser;
    }
}
