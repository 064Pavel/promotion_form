<?php

namespace App\Entity;

use App\Repository\GeneralPromoCodeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GeneralPromoCodeRepository::class)]
class GeneralPromoCode
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $generalPromoCodeId = null;

    #[ORM\Column(length: 255)]
    private ?string $promoCode = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $addInfo = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $timestampExpire = null;

    #[ORM\Column]
    private ?int $promoAmount = null;

    #[ORM\ManyToOne(inversedBy: 'generalPromoCodes')]
    private ?Promotion $promoId = null;

    public function getGeneralPromoCodeId(): ?int
    {
        return $this->generalPromoCodeId;
    }

    public function getPromoCode(): ?string
    {
        return $this->promoCode;
    }

    public function setPromoCode(string $promoCode): static
    {
        $this->promoCode = $promoCode;

        return $this;
    }

    public function getAddInfo(): ?string
    {
        return $this->addInfo;
    }

    public function setAddInfo(string $addInfo): static
    {
        $this->addInfo = $addInfo;

        return $this;
    }

    public function getTimestampExpire(): ?\DateTimeInterface
    {
        return $this->timestampExpire;
    }

    public function setTimestampExpire(\DateTimeInterface $timestampExpire): static
    {
        $this->timestampExpire = $timestampExpire;

        return $this;
    }

    public function getPromoAmount(): ?int
    {
        return $this->promoAmount;
    }

    public function setPromoAmount(int $promoAmount): static
    {
        $this->promoAmount = $promoAmount;

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
