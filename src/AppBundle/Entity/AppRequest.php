<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AppRequest
 *
 * @ORM\Table(name="app_request")
 * @ORM\Entity
 */
class AppRequest
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     */
    private $idUser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_time", type="datetime", nullable=false)
     */
    private $dateTime;

    /**
     * @var string
     *
     * @ORM\Column(name="blood_type", type="string", length=5, nullable=false)
     */
    private $bloodType;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="target_name", type="string", length=500, nullable=false)
     */
    private $targetName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time_active", type="datetime", nullable=false)
     */
    private $timeActive;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="changed_status_time", type="datetime", nullable=false)
     */
    private $changedStatusTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="changed_by_id", type="integer", nullable=false)
     */
    private $changedById;

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
     * @return AppRequest
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
     * Set dateTime
     *
     * @param \DateTime $dateTime
     *
     * @return AppRequest
     */
    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;

        return $this;
    }

    /**
     * Get dateTime
     *
     * @return \DateTime
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
     * Set bloodType
     *
     * @param string $bloodType
     *
     * @return AppRequest
     */
    public function setBloodType($bloodType)
    {
        $this->bloodType = $bloodType;

        return $this;
    }

    /**
     * Get bloodType
     *
     * @return string
     */
    public function getBloodType()
    {
        return $this->bloodType;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return AppRequest
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set targetName
     *
     * @param string $targetName
     *
     * @return AppRequest
     */
    public function setTargetName($targetName)
    {
        $this->targetName = $targetName;

        return $this;
    }

    /**
     * Get targetName
     *
     * @return string
     */
    public function getTargetName()
    {
        return $this->targetName;
    }

    /**
     * Set timeActive
     *
     * @param \DateTime $timeActive
     *
     * @return AppRequest
     */
    public function setTimeActive($timeActive)
    {
        $this->timeActive = $timeActive;

        return $this;
    }

    /**
     * Get timeActive
     *
     * @return \DateTime
     */
    public function getTimeActive()
    {
        return $this->timeActive;
    }

    /**
     * Set status
     *
     * @param boolean $status
     *
     * @return AppRequest
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
     * Set changedStatusTime
     *
     * @param \DateTime $changedStatusTime
     *
     * @return AppRequest
     */
    public function setChangedStatusTime($changedStatusTime)
    {
        $this->changedStatusTime = $changedStatusTime;

        return $this;
    }

    /**
     * Get changedStatusTime
     *
     * @return \DateTime
     */
    public function getChangedStatusTime()
    {
        return $this->changedStatusTime;
    }

    /**
     * Set changedById
     *
     * @param integer $changedById
     *
     * @return AppRequest
     */
    public function setChangedById($changedById)
    {
        $this->changedById = $changedById;

        return $this;
    }

    /**
     * Get changedById
     *
     * @return integer
     */
    public function getChangedById()
    {
        return $this->changedById;
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
