<?php

namespace Witty\ProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Witty\ProjectBundle\Entity\Reward
 *
 * @ORM\Table(name="reward")
 * @ORM\Entity
 */
class Reward
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
	 * @ORM\ManyToOne(targetEntity="Project", inversedBy="rewards")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     */
    private $project;

    /**
     * @ORM\OneToMany(targetEntity="UserReward", mappedBy="reward")
     */
    protected $userRewards;
	
    /**
     * @var integer $pledgeAmount
     *
     * @ORM\Column(name="pledge_amount", type="integer", nullable=false)
     */
    private $pledgeAmount;

    /**
     * @var integer $offset
     *
     * @ORM\Column(name="offset", type="integer", nullable=true)
     */
    private $offset;

    /**
     * @var integer $limit
     *
     * @ORM\Column(name="limit", type="integer", nullable=true)
     */
    private $limit;

    /**
     * @var \DateTime $deliveryDate
     *
     * @ORM\Column(name="delivery_date", type="datetime", nullable=true)
     */
    private $deliveryDate;

    /**
     * @var \DateTime $creationDate
     *
     * @ORM\Column(name="creation_date", type="datetime", nullable=false)
     */
    private $creationDate;

    /**
     * @var \DateTime $updateDate
     *
     * @ORM\Column(name="update_date", type="datetime", nullable=true)
     */
    private $updateDate;

    /**
     * @var string $description
     *
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    private $description;



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
     * Set pledgeAmount
     *
     * @param integer $pledgeAmount
     * @return Reward
     */
    public function setPledgeAmount($pledgeAmount)
    {
        $this->pledgeAmount = $pledgeAmount;
    
        return $this;
    }

    /**
     * Get pledgeAmount
     *
     * @return integer 
     */
    public function getPledgeAmount()
    {
        return $this->pledgeAmount;
    }

    /**
     * Set offset
     *
     * @param integer $offset
     * @return Reward
     */
    public function setOffset($offset)
    {
        $this->offset = $offset;
    
        return $this;
    }

    /**
     * Get offset
     *
     * @return integer 
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * Set limit
     *
     * @param integer $limit
     * @return Reward
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
    
        return $this;
    }

    /**
     * Get limit
     *
     * @return integer 
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * Set deliveryDate
     *
     * @param \DateTime $deliveryDate
     * @return Reward
     */
    public function setDeliveryDate($deliveryDate)
    {
        $this->deliveryDate = $deliveryDate;
    
        return $this;
    }

    /**
     * Get deliveryDate
     *
     * @return \DateTime 
     */
    public function getDeliveryDate()
    {
        return $this->deliveryDate;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     * @return Reward
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    
        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime 
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set updateDate
     *
     * @param \DateTime $updateDate
     * @return Reward
     */
    public function setUpdateDate($updateDate)
    {
        $this->updateDate = $updateDate;
    
        return $this;
    }

    /**
     * Get updateDate
     *
     * @return \DateTime 
     */
    public function getUpdateDate()
    {
        return $this->updateDate;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Reward
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
     * Set project
     *
     * @param Witty\ProjectBundle\Entity\Project $project
     * @return Reward
     */
    public function setProject(\Witty\ProjectBundle\Entity\Project $project = null)
    {
        $this->project = $project;
    
        return $this;
    }

    /**
     * Get project
     *
     * @return Witty\ProjectBundle\Entity\Project 
     */
    public function getProject()
    {
        return $this->project;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->userRewards = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add userRewards
     *
     * @param Witty\ProjectBundle\Entity\UserReward $userRewards
     * @return Reward
     */
    public function addUserReward(\Witty\ProjectBundle\Entity\UserReward $userRewards)
    {
        $this->userRewards[] = $userRewards;
    
        return $this;
    }

    /**
     * Remove userRewards
     *
     * @param Witty\ProjectBundle\Entity\UserReward $userRewards
     */
    public function removeUserReward(\Witty\ProjectBundle\Entity\UserReward $userRewards)
    {
        $this->userRewards->removeElement($userRewards);
    }

    /**
     * Get userRewards
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getUserRewards()
    {
        return $this->userRewards;
    }
}