<?php

namespace App\Entity;

use App\Repository\ActionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActionRepository::class)]
class Action
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $actionId = null;

    #[ORM\Column(length: 255)]
    private ?string $typeAction = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'actions')]
    private ?Promotion $promoId = null;

    #[ORM\OneToMany(targetEntity: ActionCondition::class, mappedBy: 'actionId')]
    private Collection $actionConditions;

    public function __construct()
    {
        $this->actionConditions = new ArrayCollection();
    }

    public function getActionId(): ?int
    {
        return $this->actionId;
    }

    public function getTypeAction(): ?string
    {
        return $this->typeAction;
    }

    public function setTypeAction(string $typeAction): static
    {
        $this->typeAction = $typeAction;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPromoId(): ?Promotion
    {
        return $this->promoId;
    }

    public function setPromoId(?Promotion $promoId): static
    {
        $this->promoId = $promoId;

        return $this;
    }

    /**
     * @return Collection<int, ActionCondition>
     */
    public function getActionConditions(): Collection
    {
        return $this->actionConditions;
    }

    public function addActionCondition(ActionCondition $actionCondition): static
    {
        if (!$this->actionConditions->contains($actionCondition)) {
            $this->actionConditions->add($actionCondition);
            $actionCondition->setActionId($this);
        }

        return $this;
    }

    public function removeActionCondition(ActionCondition $actionCondition): static
    {
        if ($this->actionConditions->removeElement($actionCondition)) {
            // set the owning side to null (unless already changed)
            if ($actionCondition->getActionId() === $this) {
                $actionCondition->setActionId(null);
            }
        }

        return $this;
    }
}
