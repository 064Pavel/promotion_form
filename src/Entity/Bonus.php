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
    private ?int $id = null;

    #[ORM\Column]
    private ?int $bonusNumber = null;

    #[ORM\Column]
    private ?int $bonusSum = null;

    #[ORM\ManyToOne(inversedBy: 'bonuses')]
    private ?Promotion $promo = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPromo(): ?Promotion
    {
        return $this->promo;
    }

    public function setPromo(?Promotion $promo): static
    {
        $this->promo = $promo;

        return $this;
    }
}
