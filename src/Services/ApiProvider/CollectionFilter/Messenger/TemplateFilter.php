<?php


namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\CollectionFilter\Messenger;


class TemplateFilter
{
    private ?array $properties;
    private ?string $customData;
    private ?string $emailTemplate;
    private ?string $smsTemplate;
    private ?string $subject;
    private ?string $language;
    private ?string $templateType;
    private ?bool $active;
    private ?bool $deleted;
    private ?string $createdAtBefore;
    private ?string $createdAtStrictlyBefore;
    private ?string $createdAtAfter;
    private ?string $createdAtStrictlyAfter;
    private ?string $updatedAtBefore;
    private ?string $updatedAtStrictlyBefore;
    private ?string $updatedAtAfter;
    private ?string $updatedAtStrictlyAfter;
    private ?string $orderTemplateType;
    private ?string $orderLanguage;
    private ?string $orderCreatedAt;
    private ?string $orderUpdatedAt;
    private ?string $orderSubject;
    private int $page = 1;
    private ?int $itemsPerPage;
    private ?string $pagination;

    public function getProperties(): ?array
    {
        return $this->properties;
    }

    public function setProperties(?array $properties): void
    {
        $this->properties = $properties;
    }

    public function getCustomData(): ?string
    {
        return $this->customData;
    }

    public function setCustomData(?string $customData): void
    {
        $this->customData = $customData;
    }

    public function getEmailTemplate(): ?string
    {
        return $this->emailTemplate;
    }

    public function setEmailTemplate(?string $emailTemplate): void
    {
        $this->emailTemplate = $emailTemplate;
    }

    public function getSmsTemplate(): ?string
    {
        return $this->smsTemplate;
    }

    public function setSmsTemplate(?string $smsTemplate): void
    {
        $this->smsTemplate = $smsTemplate;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(?string $subject): void
    {
        $this->subject = $subject;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(?string $language): void
    {
        $this->language = $language;
    }

    public function getTemplateType(): ?string
    {
        return $this->templateType;
    }

    public function setTemplateType(?string $templateType): void
    {
        $this->templateType = $templateType;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    public function getDeleted(): ?bool
    {
        return $this->deleted;
    }

    public function setDeleted(?bool $deleted): void
    {
        $this->deleted = $deleted;
    }

    public function getCreatedAtBefore(): ?string
    {
        return $this->createdAtBefore;
    }

    public function setCreatedAtBefore(?string $createdAtBefore): void
    {
        $this->createdAtBefore = $createdAtBefore;
    }

    public function getCreatedAtStrictlyBefore(): ?string
    {
        return $this->createdAtStrictlyBefore;
    }

    public function setCreatedAtStrictlyBefore(?string $createdAtStrictlyBefore): void
    {
        $this->createdAtStrictlyBefore = $createdAtStrictlyBefore;
    }

    public function getCreatedAtAfter(): ?string
    {
        return $this->createdAtAfter;
    }

    public function setCreatedAtAfter(?string $createdAtAfter): void
    {
        $this->createdAtAfter = $createdAtAfter;
    }

    public function getCreatedAtStrictlyAfter(): ?string
    {
        return $this->createdAtStrictlyAfter;
    }

    public function setCreatedAtStrictlyAfter(?string $createdAtStrictlyAfter): void
    {
        $this->createdAtStrictlyAfter = $createdAtStrictlyAfter;
    }

    public function getUpdatedAtBefore(): ?string
    {
        return $this->updatedAtBefore;
    }

    public function setUpdatedAtBefore(?string $updatedAtBefore): void
    {
        $this->updatedAtBefore = $updatedAtBefore;
    }

    public function getUpdatedAtStrictlyBefore(): ?string
    {
        return $this->updatedAtStrictlyBefore;
    }

    public function setUpdatedAtStrictlyBefore(?string $updatedAtStrictlyBefore): void
    {
        $this->updatedAtStrictlyBefore = $updatedAtStrictlyBefore;
    }

    public function getUpdatedAtAfter(): ?string
    {
        return $this->updatedAtAfter;
    }

    public function setUpdatedAtAfter(?string $updatedAtAfter): void
    {
        $this->updatedAtAfter = $updatedAtAfter;
    }

    public function getUpdatedAtStrictlyAfter(): ?string
    {
        return $this->updatedAtStrictlyAfter;
    }

    public function setUpdatedAtStrictlyAfter(?string $updatedAtStrictlyAfter): void
    {
        $this->updatedAtStrictlyAfter = $updatedAtStrictlyAfter;
    }

    public function getOrderTemplateType(): ?string
    {
        return $this->orderTemplateType;
    }

    public function setOrderTemplateType(?string $orderTemplateType): void
    {
        $this->orderTemplateType = $orderTemplateType;
    }

    public function getOrderLanguage(): ?string
    {
        return $this->orderLanguage;
    }

    public function setOrderLanguage(?string $orderLanguage): void
    {
        $this->orderLanguage = $orderLanguage;
    }

    public function getOrderCreatedAt(): ?string
    {
        return $this->orderCreatedAt;
    }

    public function setOrderCreatedAt(?string $orderCreatedAt): void
    {
        $this->orderCreatedAt = $orderCreatedAt;
    }

    public function getOrderUpdatedAt(): ?string
    {
        return $this->orderUpdatedAt;
    }

    public function setOrderUpdatedAt(?string $orderUpdatedAt): void
    {
        $this->orderUpdatedAt = $orderUpdatedAt;
    }

    public function getOrderSubject(): ?string
    {
        return $this->orderSubject;
    }

    public function setOrderSubject(?string $orderSubject): void
    {
        $this->orderSubject = $orderSubject;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function setPage(int $page): void
    {
        $this->page = $page;
    }

    public function getItemsPerPage(): ?int
    {
        return $this->itemsPerPage;
    }

    public function setItemsPerPage(?int $itemsPerPage): void
    {
        $this->itemsPerPage = $itemsPerPage;
    }

    public function getPagination(): ?string
    {
        return $this->pagination;
    }

    public function setPagination(?string $pagination): void
    {
        $this->pagination = $pagination;
    }
}
