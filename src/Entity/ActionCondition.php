<?php

namespace App\Entity;

use App\Repository\ActionConditionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActionConditionRepository::class)]
class ActionCondition
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $source = null;

    #[ORM\Column]
    private ?int $partnerCode = null;

    #[ORM\Column]
    private ?int $partnerType = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $productCode = [];

    #[ORM\Column(length: 255)]
    private ?string $productCategory = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $placement = [];

    #[ORM\Column]
    private ?int $activityCode = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $dataSource = [];

    #[ORM\Column(type: Types::ARRAY)]
    private array $pageUnit = [];

    #[ORM\Column(type: Types::ARRAY)]
    private array $payFromName = [];

    #[ORM\ManyToOne(inversedBy: 'actionConditions')]
    private ?Action $action = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSource(): ?int
    {
        return $this->source;
    }

    public function setSource(int $source): static
    {
        $this->source = $source;

        return $this;
    }

    public function getPartnerCode(): ?int
    {
        return $this->partnerCode;
    }

    public function setPartnerCode(int $partnerCode): static
    {
        $this->partnerCode = $partnerCode;

        return $this;
    }

    public function getPartnerType(): ?int
    {
        return $this->partnerType;
    }

    public function setPartnerType(int $partnerType): static
    {
        $this->partnerType = $partnerType;

        return $this;
    }

    public function getProductCode(): array
    {
        return $this->productCode;
    }

    public function setProductCode(array $productCode): static
    {
        $this->productCode = $productCode;

        return $this;
    }

    public function getProductCategory(): ?string
    {
        return $this->productCategory;
    }

    public function setProductCategory(string $productCategory): static
    {
        $this->productCategory = $productCategory;

        return $this;
    }

    public function getPlacement(): array
    {
        return $this->placement;
    }

    public function setPlacement(array $placement): static
    {
        $this->placement = $placement;

        return $this;
    }

    public function getActivityCode(): ?int
    {
        return $this->activityCode;
    }

    public function setActivityCode(int $activityCode): static
    {
        $this->activityCode = $activityCode;

        return $this;
    }

    public function getDataSource(): array
    {
        return $this->dataSource;
    }

    public function setDataSource(array $dataSource): static
    {
        $this->dataSource = $dataSource;

        return $this;
    }

    public function getPageUnit(): array
    {
        return $this->pageUnit;
    }

    public function setPageUnit(array $pageUnit): static
    {
        $this->pageUnit = $pageUnit;

        return $this;
    }

    public function getPayFromName(): array
    {
        return $this->payFromName;
    }

    public function setPayFromName(array $payFromName): static
    {
        $this->payFromName = $payFromName;

        return $this;
    }

    public function getAction(): ?Action
    {
        return $this->action;
    }

    public function setAction(?Action $action): static
    {
        $this->action = $action;

        return $this;
    }
}
