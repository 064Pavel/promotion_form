<?php

namespace App\Entity;

use App\Repository\GeneralPromoCodeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: GeneralPromoCodeRepository::class)]
class GeneralPromoCode
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Поле Promo Code не может быть пустым')]
    #[Assert\Length(max: 255, maxMessage: 'Длина Promo Code не может превышать 255 символов')]
    private ?string $promoCode = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\Length(max: 65535, maxMessage: 'Длина Add Info не может превышать 65535 символов')]
    private ?string $addInfo = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Assert\NotBlank(message: 'Поле Timestamp Expire не может быть пустым')]
    #[Assert\GreaterThan('today', message: 'Дата и время истечения должны быть больше текущей даты и времени')]
    private ?\DateTimeInterface $timestampExpire = null;

    #[ORM\Column]
    #[Assert\GreaterThanOrEqual(value: 0, message: 'Promo Amount должен быть больше или равен нулю')]
    private ?int $promoAmount = null;

    #[ORM\ManyToOne(inversedBy: 'generalPromoCodes')]
    private ?Promotion $promo = null;

    public function getId(): ?int
    {
        return $this->id;
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
