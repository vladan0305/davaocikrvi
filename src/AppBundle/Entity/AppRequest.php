<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AppRequest
 *
 * @ORM\Table(name="app_request", indexes={@ORM\Index(name="id_user", columns={"id_user"}), @ORM\Index(name="changed_by_id", columns={"changed_by_id"})})
 * @ORM\Entity
 */
class AppRequest
{
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
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\AppAdmin
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\AppAdmin")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="changed_by_id", referencedColumnName="id")
     * })
     */
    private $changedBy;

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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set changedBy
     *
     * @param \AppBundle\Entity\AppAdmin $changedBy
     *
     * @return AppRequest
     */
    public function setChangedBy(\AppBundle\Entity\AppAdmin $changedBy = null)
    {
        $this->changedBy = $changedBy;

        return $this;
    }

    /**
     * Get changedBy
     *
     * @return \AppBundle\Entity\AppAdmin
     */
    public function getChangedBy()
    {
        return $this->changedBy;
    }

    /**
     * Set idUser
     *
     * @param \AppBundle\Entity\AppUsers $idUser
     *
     * @return AppRequest
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
