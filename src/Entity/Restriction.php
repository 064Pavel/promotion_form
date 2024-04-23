<?php

namespace App\Entity;

use App\Repository\RestrictionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: RestrictionRepository::class)]
class Restriction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    #[Assert\Positive(message: 'Number Client Participation должно быть положительным числом')]
    private ?int $numberClientParticipation = null;

    #[ORM\Column]
    #[Assert\Positive(message: 'Number Client Participation Product Type должно быть положительным числом')]
    private ?int $numberClientParticipationProductType = null;

    #[ORM\Column]
    #[Assert\Positive(message: 'Number Client Participation Partner Code должно быть положительным числом')]
    private ?int $numberClientParticipationPartnerCode = null;

    #[ORM\Column]
    #[Assert\Type(type: 'bool', message: 'Is Limited должно быть логическим типом')]
    private ?bool $isLimited = null;

    #[ORM\Column]
    #[Assert\Type(type: 'integer', message: 'Amount Limit должно быть целым числом')]
    #[Assert\GreaterThanOrEqual(value: 0, message: 'Amount Limit должно быть больше или равно нулю')]
    private ?int $amountLimit = null;

    #[ORM\Column(type: Types::ARRAY)]
    #[Assert\Count(min: 1, minMessage: 'Client Geo должен содержать как минимум 1 элемент')]
    private array $clientGeo = [];

    #[ORM\ManyToOne(inversedBy: 'restrictions')]
    private ?Promotion $promo = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumberClientParticipation(): ?int
    {
        return $this->numberClientParticipation;
    }

    public function setNumberClientParticipation(int $numberClientParticipation): static
    {
        $this->numberClientParticipation = $numberClientParticipation;

        return $this;
    }

    public function getNumberClientParticipationProductType(): ?int
    {
        return $this->numberClientParticipationProductType;
    }

    public function setNumberClientParticipationProductType(int $numberClientParticipationProductType): static
    {
        $this->numberClientParticipationProductType = $numberClientParticipationProductType;

        return $this;
    }

    public function getNumberClientParticipationPartnerCode(): ?int
    {
        return $this->numberClientParticipationPartnerCode;
    }

    public function setNumberClientParticipationPartnerCode(int $numberClientParticipationPartnerCode): static
    {
        $this->numberClientParticipationPartnerCode = $numberClientParticipationPartnerCode;

        return $this;
    }

    public function isLimited(): ?bool
    {
        return $this->isLimited;
    }

    public function setIsLimited(bool $isLimited): static
    {
        $this->isLimited = $isLimited;

        return $this;
    }

    public function getAmountLimit(): ?int
    {
        return $this->amountLimit;
    }

    public function setAmountLimit(int $amountLimit): static
    {
        $this->amountLimit = $amountLimit;

        return $this;
    }

    public function getClientGeo(): array
    {
        return $this->clientGeo;
    }

    public function setClientGeo(array $clientGeo): static
    {
        $this->clientGeo = $clientGeo;

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
