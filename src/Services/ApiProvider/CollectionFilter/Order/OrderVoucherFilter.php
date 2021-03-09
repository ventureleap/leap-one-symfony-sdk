<?php


namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\CollectionFilter\Order;


class OrderVoucherFilter
{
    private ?array $properties = null;
    private ?string $customData = null;
    private ?bool $active = null;
    private ?bool $deleted = null;
    private ?string $createdAtBefore = null;
    private ?string $createdAtStrictlyBefore = null;
    private ?string $createdAtAfter = null;
    private ?string $createdAtStrictlyAfter = null;
    private ?string $updatedAtBefore = null;
    private ?string $updatedAtStrictlyBefore = null;
    private ?string $updatedAtAfter = null;
    private ?string $updatedAtStrictlyAfter = null;
    private ?string $orderCreatedAt = null;
    private ?string $orderUpdatedAt = null;
    private ?string $orderActive = null;
    private ?string $orderDeleted = null;
    private int $page = 1;

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

    public function getOrderActive(): ?string
    {
        return $this->orderActive;
    }

    public function setOrderActive(?string $orderActive): void
    {
        $this->orderActive = $orderActive;
    }

    public function getOrderDeleted(): ?string
    {
        return $this->orderDeleted;
    }

    public function setOrderDeleted(?string $orderDeleted): void
    {
        $this->orderDeleted = $orderDeleted;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function setPage(int $page): void
    {
        $this->page = $page;
    }
}
