<?php

namespace App\Entity;

use App\Entity\Enum\CashbackType;
use App\Entity\Enum\OrganisationType;
use App\Entity\Enum\PromoType;
use App\Repository\PromotionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PromotionRepository::class)]
class Promotion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $partnerName = null;

    #[ORM\Column(length: 255)]
    private ?string $partnerLogo = null;

    #[ORM\Column]
    private ?bool $isCustom = null;

    #[ORM\Column]
    private ?bool $isReferral = null;

    #[ORM\Column]
    private ?bool $isRandom = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeInterface $randomSelectionDate = null;

    #[ORM\Column]
    private ?bool $isGeneralPromoCode = null;

    #[ORM\Column(type: 'string', enumType: PromoType::class)]
    private PromoType|null $promoType = null;

    #[ORM\Column(type: 'string', enumType: CashbackType::class)]
    private CashbackType|null $cashbackType = null;

    #[ORM\Column(nullable: true)]
    private ?int $amountReward = null;

    #[ORM\Column(nullable: true)]
    private ?int $percentAmount = null;

    #[ORM\Column(length: 255)]
    private ?string $landingPageLink = null;

    #[ORM\Column(length: 255)]
    private ?string $ruleLink = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $promoStartDate = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $promoFinishDate = null;

    #[ORM\Column(type: 'string', enumType: OrganisationType::class)]
    private OrganisationType|null $paymentOrganisation = null;

    #[ORM\Column]
    private ?bool $isActive = null;

    #[ORM\OneToMany(targetEntity: Bonus::class, mappedBy: 'promoId')]
    private Collection $bonuses;

    #[ORM\OneToMany(targetEntity: GeneralPromoCode::class, mappedBy: 'promoId')]
    private Collection $generalPromoCodes;

    #[ORM\OneToMany(targetEntity: Action::class, mappedBy: 'promoId')]
    private Collection $actions;

    #[ORM\OneToMany(targetEntity: Restriction::class, mappedBy: 'promoId')]
    private Collection $restrictions;

    public function __construct()
    {
        $this->bonuses = new ArrayCollection();
        $this->generalPromoCodes = new ArrayCollection();
        $this->actions = new ArrayCollection();
        $this->restrictions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

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

    public function getPartnerName(): ?string
    {
        return $this->partnerName;
    }

    public function setPartnerName(string $partnerName): static
    {
        $this->partnerName = $partnerName;

        return $this;
    }

    public function getPartnerLogo(): ?string
    {
        return $this->partnerLogo;
    }

    public function setPartnerLogo(string $partnerLogo): static
    {
        $this->partnerLogo = $partnerLogo;

        return $this;
    }

    public function isCustom(): ?bool
    {
        return $this->isCustom;
    }

    public function setIsCustom(bool $isCustom): static
    {
        $this->isCustom = $isCustom;

        return $this;
    }

    public function isReferral(): ?bool
    {
        return $this->isReferral;
    }

    public function setIsReferral(bool $isReferral): static
    {
        $this->isReferral = $isReferral;

        return $this;
    }

    public function isRandom(): ?bool
    {
        return $this->isRandom;
    }

    public function setIsRandom(bool $isRandom): static
    {
        $this->isRandom = $isRandom;

        return $this;
    }

    public function getRandomSelectionDate(): ?\DateTimeInterface
    {
        return $this->randomSelectionDate;
    }

    public function setRandomSelectionDate(\DateTimeInterface $randomSelectionDate): static
    {
        $this->randomSelectionDate = $randomSelectionDate;

        return $this;
    }

    public function isGeneralPromoCode(): ?bool
    {
        return $this->isGeneralPromoCode;
    }

    public function setIsGeneralPromoCode(bool $isGeneralPromoCode): static
    {
        $this->isGeneralPromoCode = $isGeneralPromoCode;

        return $this;
    }

    public function getPromoType(): PromoType
    {
        return $this->promoType;
    }

    public function setPromoType(PromoType $promoType): static
    {
        $this->promoType = $promoType;

        return $this;
    }

    public function getСashbackType(): CashbackType
    {
        return $this->cashbackType;
    }

    public function setСashbackType(CashbackType $cashbackType): static
    {
        $this->cashbackType = $cashbackType;

        return $this;
    }

    public function getAmountReward(): ?int
    {
        return $this->amountReward;
    }

    public function setAmountReward(int $amountReward): static
    {
        $this->amountReward = $amountReward;

        return $this;
    }

    public function getPercentAmount(): ?int
    {
        return $this->percentAmount;
    }

    public function setPercentAmount(?int $percentAmount): static
    {
        $this->percentAmount = $percentAmount;

        return $this;
    }

    public function getLandingPageLink(): ?string
    {
        return $this->landingPageLink;
    }

    public function setLandingPageLink(string $landingPageLink): static
    {
        $this->landingPageLink = $landingPageLink;

        return $this;
    }

    public function getRuleLink(): ?string
    {
        return $this->ruleLink;
    }

    public function setRuleLink(string $ruleLink): static
    {
        $this->ruleLink = $ruleLink;

        return $this;
    }

    public function getPromoStartDate(): ?\DateTimeImmutable
    {
        return $this->promoStartDate;
    }

    public function setPromoStartDate(\DateTimeImmutable $promoStartDate): static
    {
        $this->promoStartDate = $promoStartDate;

        return $this;
    }

    public function getPromoFinishDate(): ?\DateTimeImmutable
    {
        return $this->promoFinishDate;
    }

    public function setPromoFinishDate(\DateTimeImmutable $promoFinishDate): static
    {
        $this->promoFinishDate = $promoFinishDate;

        return $this;
    }

    public function getPaymentOrganisation(): OrganisationType
    {
        return $this->paymentOrganisation;
    }

    public function setPaymentOrganisation(OrganisationType $paymentOrganisation): static
    {
        $this->paymentOrganisation = $paymentOrganisation;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): static
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * @return Collection<int, Bonus>
     */
    public function getBonuses(): Collection
    {
        return $this->bonuses;
    }

    public function addBonus(Bonus $bonus): static
    {
        if (!$this->bonuses->contains($bonus)) {
            $this->bonuses->add($bonus);
            $bonus->setPromo($this);
        }

        return $this;
    }

    public function removeBonus(Bonus $bonus): static
    {
        if ($this->bonuses->removeElement($bonus)) {
            // set the owning side to null (unless already changed)
            if ($bonus->getPromo() === $this) {
                $bonus->setPromo(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, GeneralPromoCode>
     */
    public function getGeneralPromoCodes(): Collection
    {
        return $this->generalPromoCodes;
    }

    public function addGeneralPromoCode(GeneralPromoCode $generalPromoCode): static
    {
        if (!$this->generalPromoCodes->contains($generalPromoCode)) {
            $this->generalPromoCodes->add($generalPromoCode);
            $generalPromoCode->setPromo($this);
        }

        return $this;
    }

    public function removeGeneralPromoCode(GeneralPromoCode $generalPromoCode): static
    {
        if ($this->generalPromoCodes->removeElement($generalPromoCode)) {
            // set the owning side to null (unless already changed)
            if ($generalPromoCode->getPromo() === $this) {
                $generalPromoCode->setPromo(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Action>
     */
    public function getActions(): Collection
    {
        return $this->actions;
    }

    public function addAction(Action $action): static
    {
        if (!$this->actions->contains($action)) {
            $this->actions->add($action);
            $action->setPromo($this);
        }

        return $this;
    }

    public function removeAction(Action $action): static
    {
        if ($this->actions->removeElement($action)) {
            // set the owning side to null (unless already changed)
            if ($action->getPromo() === $this) {
                $action->setPromo(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Restriction>
     */
    public function getRestrictions(): Collection
    {
        return $this->restrictions;
    }

    public function addRestriction(Restriction $restriction): static
    {
        if (!$this->restrictions->contains($restriction)) {
            $this->restrictions->add($restriction);
            $restriction->setPromo($this);
        }

        return $this;
    }

    public function removeRestriction(Restriction $restriction): static
    {
        if ($this->restrictions->removeElement($restriction)) {
            // set the owning side to null (unless already changed)
            if ($restriction->getPromo() === $this) {
                $restriction->setPromo(null);
            }
        }

        return $this;
    }
}
