<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AppBloodDonations
 *
 * @ORM\Table(name="app_blood_donations")
 * @ORM\Entity
 */
class AppBloodDonations
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     */
    private $idUser;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_place", type="integer", nullable=false)
     */
    private $idPlace;

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
     * @var integer
     *
     * @ORM\Column(name="id_request", type="integer", nullable=false)
     */
    private $idRequest;

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
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return AppBloodDonations
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return integer
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set idPlace
     *
     * @param integer $idPlace
     *
     * @return AppBloodDonations
     */
    public function setIdPlace($idPlace)
    {
        $this->idPlace = $idPlace;

        return $this;
    }

    /**
     * Get idPlace
     *
     * @return integer
     */
    public function getIdPlace()
    {
        return $this->idPlace;
    }

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
     * Set idRequest
     *
     * @param integer $idRequest
     *
     * @return AppBloodDonations
     */
    public function setIdRequest($idRequest)
    {
        $this->idRequest = $idRequest;

        return $this;
    }

    /**
     * Get idRequest
     *
     * @return integer
     */
    public function getIdRequest()
    {
        return $this->idRequest;
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
}
