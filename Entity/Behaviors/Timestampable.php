<?php

namespace BlueBear\BaseBundle\Entity\Behaviors;

use DateTime;

trait Timestampable
{
    /**
     * @var DateTime
     * @ORM\Column(name="created_at", type="datetime")
     */
    protected $createdAt;

    /**
     * @var DateTime
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    protected $updatedAt;

    /**
     * @ORM\PrePersist()
     * @param null $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt = null)
    {
        if (!$createdAt) {
            $createdAt = new DateTime();
        }
        if (!$this->createdAt) {
            $this->createdAt = $createdAt;
        }
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     * @return $this
     */
    public function setUpdatedAt()
    {
        $this->updatedAt = new DateTime();
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
