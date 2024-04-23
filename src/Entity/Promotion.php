<?php

namespace App\Entity;

use App\Entity\Type\CashbackType;
use App\Entity\Type\OrganisationType;
use App\Entity\Type\PromoType;
use App\Repository\PromotionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PromotionRepository::class)]
class Promotion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Поле "name" не должно быть пустым')]
    #[Assert\Length(max: 255, maxMessage: 'Поле "name" не должно превышать {{ limit }} символов')]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: 'Поле "description" не должно быть пустым')]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Поле "partnerName" не должно быть пустым')]
    #[Assert\Length(max: 255, maxMessage: 'Поле "partnerName" не должно превышать {{ limit }} символов')]
    private ?string $partnerName = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Поле "partnerLogo" не должно быть пустым')]
    #[Assert\Url(message: 'Значение поля "partnerLogo" должно быть корректным URL')]
    private ?string $partnerLogo = null;

    #[ORM\Column]
    #[Assert\NotNull(message: 'Поле "isCustom" не должно быть пустым')]
    private ?bool $isCustom = null;

    #[ORM\Column]
    #[Assert\NotNull(message: 'Поле "isReferral" не должно быть пустым')]
    private ?bool $isReferral = null;

    #[ORM\Column]
    #[Assert\NotNull(message: 'Поле "isRandom" не должно быть пустым')]
    private ?bool $isRandom = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    #[Assert\NotNull(message: 'Поле "randomSelectionDate" не должно быть пустым')]
    #[Assert\GreaterThan('today', message: 'Дата должна быть больше или равна текущей дате')]
    private ?\DateTimeInterface $randomSelectionDate = null;

    #[ORM\Column]
    #[Assert\NotNull(message: 'Поле "isGeneralPromoCode" не должно быть пустым')]
    private ?bool $isGeneralPromoCode = null;

    #[ORM\Column(type: 'string')]
    #[Assert\Choice(choices: PromoType::CHOICES, message: 'Неверное значение для поля "promoType"')]
    private ?string $promoType = null;

    #[ORM\Column(type: 'string')]
    #[Assert\Choice(choices: CashbackType::CHOICES, message: 'Неверное значение для поля "cashbackType"')]
    private ?string $cashbackType = null;

    #[ORM\Column(nullable: true)]
    #[Assert\PositiveOrZero(message: 'Значение поля "amountReward" должно быть положительным числом или нулем')]
    private ?int $amountReward = null;

    #[ORM\Column(nullable: true)]
    #[Assert\Range(notInRangeMessage: 'Значение поля "percentAmount" должно быть между {{ min }} и {{ max }}', min: 0, max: 100)]
    private ?int $percentAmount = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Поле "landingPageLink" не должно быть пустым')]
    #[Assert\Url(message: 'Значение поля "landingPageLink" должно быть корректным URL')]
    private ?string $landingPageLink = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Поле "ruleLink" не должно быть пустым')]
    #[Assert\Url(message: 'Значение поля "ruleLink" должно быть корректным URL')]
    private ?string $ruleLink = null;

    #[ORM\Column]
    #[Assert\NotNull(message: 'Поле "promoStartDate" не должно быть пустым')]
    #[Assert\LessThanOrEqual(
        value: 'today',
        message: 'Дата начала промоакции должна быть не более чем три дня назад'
    )] private ?\DateTimeImmutable $promoStartDate = null;
    #[ORM\Column]
    #[Assert\NotNull(message: 'Поле "promoFinishDate" не должно быть пустым')]
    #[Assert\GreaterThan(
        value: 'today',
        message: 'Дата конца промо акции должна быть больше или равна текущей дате'
    )]
    private ?\DateTimeImmutable $promoFinishDate = null;

    #[ORM\Column(type: 'string')]
    #[Assert\Choice(choices: OrganisationType::CHOICES, message: 'Неверное значение для поля "paymentOrganisation"')]
    private ?string $paymentOrganisation = null;

    #[ORM\Column]
    #[Assert\NotNull(message: 'Поле "isActive" не должно быть пустым')]
    private ?bool $isActive = null;

    #[ORM\OneToMany(targetEntity: Bonus::class, mappedBy: 'promo', cascade: ['remove', 'persist'])]
    #[Assert\Valid]
    private Collection $bonuses;

    #[ORM\OneToMany(targetEntity: GeneralPromoCode::class, mappedBy: 'promo', cascade: ['remove', 'persist'])]
    #[Assert\Valid]
    private Collection $generalPromoCodes;

    #[ORM\OneToMany(targetEntity: Action::class, mappedBy: 'promo', cascade: ['remove', 'persist'])]
    #[Assert\Valid]
    private Collection $actions;

    #[ORM\OneToMany(targetEntity: Restriction::class, mappedBy: 'promo', cascade: ['remove', 'persist'])]
    #[Assert\Valid]
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

    public function getPromoType(): ?string
    {
        return $this->promoType;
    }

    public function setPromoType(?string $promoType): static
    {
        $this->promoType = $promoType;

        return $this;
    }

    public function getCashbackType(): ?string
    {
        return $this->cashbackType;
    }

    public function setCashbackType(?string $cashbackType): static
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

    public function getPaymentOrganisation(): ?string
    {
        return $this->paymentOrganisation;
    }

    public function setPaymentOrganisation(?string $paymentOrganisation): static
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
