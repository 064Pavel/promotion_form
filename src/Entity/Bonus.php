<?php

namespace App\Entity;

use App\Repository\BonusRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BonusRepository::class)]
class Bonus
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $bonusId = null;

    #[ORM\Column]
    private ?int $bonusNumber = null;

    #[ORM\Column]
    private ?int $bonusSum = null;

    #[ORM\ManyToOne(inversedBy: 'bonuses')]
    private ?Promotion $promoId = null;

    public function getBonusId(): ?int
    {
        return $this->bonusId;
    }

    public function getBonusNumber(): ?int
    {
        return $this->bonusNumber;
    }

    public function setBonusNumber(int $bonusNumber): static
    {
        $this->bonusNumber = $bonusNumber;

        return $this;
    }

    public function getBonusSum(): ?int
    {
        return $this->bonusSum;
    }

    public function setBonusSum(int $bonusSum): static
    {
        $this->bonusSum = $bonusSum;

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
}
