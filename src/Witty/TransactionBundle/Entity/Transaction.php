<?php

namespace Witty\TransactionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Witty\TransactionBundle\Entity\Transaction
 *
 * @ORM\Table(name="transaction")
 * @ORM\Entity
 */
class Transaction
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
     * @ORM\ManyToOne(targetEntity="\Witty\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;
	
	/**
     * @ORM\ManyToMany(targetEntity="\Witty\ProjectBundle\Entity\Reward")
     * @ORM\JoinTable(name="transaction_reward",
     *      joinColumns={@ORM\JoinColumn(name="transaction_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="reward_id", referencedColumnName="id")}
     *      )
     */
    private $rewards;
	
	/**
     * @ORM\ManyToMany(targetEntity="\Witty\ProjectBundle\Entity\RewardOption")
     * @ORM\JoinTable(name="transaction_rewardoption",
     *      joinColumns={@ORM\JoinColumn(name="transaction_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="rewardoption_id", referencedColumnName="id")}
     *      )
     */
    private $options;
	
	/**
     * @ORM\ManyToMany(targetEntity="\Witty\ProjectBundle\Entity\UserReward")
     * @ORM\JoinTable(name="transaction_cancelleduserreward",
     *      joinColumns={@ORM\JoinColumn(name="transaction_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="userreward_id", referencedColumnName="id")}
     *      )
     */
    private $cancelledUserRewards;	
	
	/**
     * @ORM\ManyToMany(targetEntity="\Witty\ProjectBundle\Entity\UserRewardOption")
     * @ORM\JoinTable(name="transaction_cancelleduserrewardoption",
     *      joinColumns={@ORM\JoinColumn(name="transaction_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="userrewardoption_id", referencedColumnName="id")}
     *      )
     */
    private $cancelledUserRewardOptions;

    /**
     * @var boolean $completed
     *
     * @ORM\Column(name="completed", type="boolean", nullable=false)
     */
    private $completed;
	
    /**
     * @var \DateTime $creationDate
     *
     * @ORM\Column(name="creation_date", type="datetime", nullable=false)
     */
    private $creationDate;
	
    /**
     * @var \DateTime $completionDate
     *
     * @ORM\Column(name="completion_date", type="datetime", nullable=true)
     */
    private $completionDate;
	
    /**
     * @var decimal $amount
     *
     * @ORM\Column(name="amount", type="decimal", precision=8, scale=2, nullable=false)
     */
    private $amount;	
	
    /**
     * @var decimal $creditUsed
     *
     * @ORM\Column(name="credit_used", type="decimal", precision=8, scale=2, nullable=false)
     */
    private $creditUsed;
	
    /**
     * @var decimal $fees
     *
     * @ORM\Column(name="fees", type="decimal", precision=8, scale=2, nullable=false)
     */
    private $fees;
	
    /**
     * @var decimal $feesPercentage
     *
     * @ORM\Column(name="fees_percentage", type="decimal", precision=4, scale=2, nullable=false)
     */
    private $feesPercentage;
			
    /**
     * @var decimal $totalAmount
     *
     * @ORM\Column(name="total_amount", type="decimal", precision=8, scale=2, nullable=false)
     */
    private $totalAmount;
	
    /**
     * @var string $paypalId
     *
     * @ORM\Column(name="paypal_id", type="string", nullable=true)
     */
    private $paypalId;	
	
    /**
     * @var boolean $error
     *
     * @ORM\Column(name="error", type="boolean", nullable=true)
     */
    private $error;
		
    /**
     * Constructor
     */
    public function __construct($feesPercentage = 0)
    {
        $this->creationDate = new \DateTime();
		$this->completed = false;
		$this->feesPercentage = $feesPercentage;
		$this->rewards = new \Doctrine\Common\Collections\ArrayCollection();
		$this->options = new \Doctrine\Common\Collections\ArrayCollection();
		$this->cancelledUserRewards = new \Doctrine\Common\Collections\ArrayCollection();
		$this->cancelledUserRewardOptions = new \Doctrine\Common\Collections\ArrayCollection();
		$this->creditUsed = 0;
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
     * Set completed
     *
     * @param boolean $completed
     * @return Transaction
     */
    public function setCompleted($completed)
    {
        $this->completed = $completed;
    
        return $this;
    }

    /**
     * Get completed
     *
     * @return boolean 
     */
    public function getCompleted()
    {
        return $this->completed;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     * @return Transaction
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
     * Set completionDate
     *
     * @param \DateTime $completionDate
     * @return Transaction
     */
    public function setCompletionDate($completionDate)
    {
        $this->completionDate = $completionDate;
    
        return $this;
    }

    /**
     * Get completionDate
     *
     * @return \DateTime 
     */
    public function getCompletionDate()
    {
        return $this->completionDate;
    }

    /**
     * Set amount
     *
     * @param float $amount
     * @return Transaction
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    
        return $this;
    }

    /**
     * Get amount
     *
     * @return float 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set fees
     *
     * @param float $fees
     * @return Transaction
     */
    public function setFees($fees)
    {
        $this->fees = $fees;
    
        return $this;
    }

    /**
     * Get fees
     *
     * @return float 
     */
    public function getFees()
    {
        return $this->fees;
    }

    /**
     * Set totalAmount
     *
     * @param float $totalAmount
     * @return Transaction
     */
    public function setTotalAmount($totalAmount)
    {
        $this->totalAmount = $totalAmount;
    
        return $this;
    }

    /**
     * Get totalAmount
     *
     * @return float 
     */
    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    /**
     * Set paypalId
     *
     * @param string $paypalId
     * @return Transaction
     */
    public function setPaypalId($paypalId)
    {
        $this->paypalId = $paypalId;
    
        return $this;
    }

    /**
     * Get paypalId
     *
     * @return string 
     */
    public function getPaypalId()
    {
        return $this->paypalId;
    }

    /**
     * Set error
     *
     * @param boolean $error
     * @return Transaction
     */
    public function setError($error)
    {
        $this->error = $error;
    
        return $this;
    }

    /**
     * Get error
     *
     * @return boolean 
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Set user
     *
     * @param Witty\UserBundle\Entity\User $user
     * @return Transaction
     */
    public function setUser(\Witty\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return Witty\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add rewards
     *
     * @param Witty\ProjectBundle\Entity\Reward $rewards
     * @return Transaction
     */
    public function addReward(\Witty\ProjectBundle\Entity\Reward $rewards)
    {
        $this->rewards[] = $rewards;
		$this->updateAmount();
		
        return $this;
    }

    /**
     * Remove rewards
     *
     * @param Witty\ProjectBundle\Entity\Reward $rewards
     */
    public function removeReward(\Witty\ProjectBundle\Entity\Reward $rewards)
    {
        $this->rewards->removeElement($rewards);
		$this->updateAmount();
    }

    /**
     * Get rewards
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getRewards()
    {
        return $this->rewards;
    }

    /**
     * Add options
     *
     * @param Witty\ProjectBundle\Entity\RewardOption $options
     * @return Transaction
     */
    public function addOption(\Witty\ProjectBundle\Entity\RewardOption $options)
    {
        $this->options[] = $options;
		$this->updateAmount();
    
        return $this;
    }

    /**
     * Remove options
     *
     * @param Witty\ProjectBundle\Entity\RewardOption $options
     */
    public function removeOption(\Witty\ProjectBundle\Entity\RewardOption $options)
    {
        $this->options->removeElement($options);
		$this->updateAmount();
    }

    /**
     * Get options
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getOptions()
    {
        return $this->options;
    }


    /**
     * Set feesPercentage
     *
     * @param float $feesPercentage
     * @return Transaction
     */
    public function setFeesPercentage($feesPercentage)
    {
        $this->feesPercentage = $feesPercentage;
		$this->updateAmount();
    
        return $this;
    }

    /**
     * Get feesPercentage
     *
     * @return float 
     */
    public function getFeesPercentage()
    {
        return $this->feesPercentage;
    }
	
	
	//Calcule le montant de la transaction
	private function updateAmount()
	{
		$amount = 0;
	
		foreach($this->getRewards() as $reward)
			$amount += $reward->getCost();
	
		foreach($this->getOptions() as $option)
			$amount += $option->getCost();
			
		foreach($this->getCancelledUserRewards() as $cancelledUserReward)
			$amount -= $cancelledUserReward->getReward()->getCost();
	
		foreach($this->getCancelledUserRewardOptions() as $cancelledUserRewardOption)
			$amount -= $cancelledUserRewardOption->getRewardOption()->getCost();

		if($this->user)
		{
			$this->creditUsed = min($this->user->getCredit(), $amount);	
			$amount -= $this->creditUsed;
		}

		$this->amount = $amount;
		$this->fees = ceil($amount * $this->feesPercentage * 100) / 100;
		$this->totalAmount = $this->amount + $this->fees;
	}

    /**
     * Set creditUsed
     *
     * @param float $creditUsed
     * @return Transaction
     */
    public function setCreditUsed($creditUsed)
    {
        $this->creditUsed = $creditUsed;
		$this->updateAmount();
    
        return $this;
    }

    /**
     * Get creditUsed
     *
     * @return float 
     */
    public function getCreditUsed()
    {
        return $this->creditUsed;
    }


    /**
     * Add cancelledUserRewards
     *
     * @param Witty\ProjectBundle\Entity\Reward $cancelledUserRewards
     * @return Transaction
     */
    public function addCancelledUserReward(\Witty\ProjectBundle\Entity\UserReward $cancelledUserRewards)
    {
        $this->cancelledUserRewards[] = $cancelledUserRewards;
		$this->updateAmount();
    
        return $this;
    }

    /**
     * Remove cancelledUserRewards
     *
     * @param Witty\ProjectBundle\Entity\Reward $cancelledUserRewards
     */
    public function removeCancelledUserReward(\Witty\ProjectBundle\Entity\UserReward $cancelledUserRewards)
    {
        $this->cancelledUserRewards->removeElement($cancelledUserRewards);
		$this->updateAmount();
    }

    /**
     * Get cancelledUserRewards
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getCancelledUserRewards()
    {
        return $this->cancelledUserRewards;
    }

    /**
     * Add cancelledUserRewardOptions
     *
     * @param Witty\ProjectBundle\Entity\RewardOption $cancelledUserRewardOptions
     * @return Transaction
     */
    public function addCancelledUserRewardOption(\Witty\ProjectBundle\Entity\UserRewardOption $cancelledUserRewardOptions)
    {
        $this->cancelledUserRewardOptions[] = $cancelledUserRewardOptions;
		$this->updateAmount();
    
        return $this;
    }

    /**
     * Remove cancelledUserRewardOptions
     *
     * @param Witty\ProjectBundle\Entity\RewardOption $cancelledUserRewardOptions
     */
    public function removeCancelledUserRewardOption(\Witty\ProjectBundle\Entity\UserRewardOption $cancelledUserRewardOptions)
    {
        $this->cancelledUserRewardOptions->removeElement($cancelledUserRewardOptions);
		$this->updateAmount();
    }

    /**
     * Get cancelledUserRewardOptions
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getCancelledUserRewardOptions()
    {
        return $this->cancelledUserRewardOptions;
    }
}