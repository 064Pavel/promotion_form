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
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $typeAction = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'actions')]
    private ?Promotion $promo = null;

    #[ORM\OneToMany(targetEntity: ActionCondition::class, mappedBy: 'actionId')]
    private Collection $actionConditions;

    public function __construct()
    {
        $this->actionConditions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPromo(): ?Promotion
    {
        return $this->promo;
    }

    public function setPromo(?Promotion $promo): static
    {
        $this->promo = $promo;

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
            $actionCondition->setAction($this);
        }

        return $this;
    }

    public function removeActionCondition(ActionCondition $actionCondition): static
    {
        if ($this->actionConditions->removeElement($actionCondition)) {
            // set the owning side to null (unless already changed)
            if ($actionCondition->getAction() === $this) {
                $actionCondition->setAction(null);
            }
        }

        return $this;
    }
}
