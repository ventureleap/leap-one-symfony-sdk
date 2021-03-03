<?php


namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\CollectionFilter\Order;


class OrderVoucherFilter
{
    private ?array $properties;
    private ?string $custom_data; 
    private ?bool $active;
    private ?bool $deleted;
    private ?string $created_at_before; 
    private ?string $created_at_strictly_before; 
    private ?string $created_at_after; 
    private ?string $created_at_strictly_after; 
    private ?string $updated_at_before; 
    private ?string $updated_at_strictly_before; 
    private ?string $updated_at_after; 
    private ?string $updated_at_strictly_after; 
    private ?string $order_created_at; 
    private ?string $order_updated_at; 
    private ?string $order_active; 
    private ?string $order_deleted; 
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
        return $this->custom_data;
    }

    public function setCustomData(?string $custom_data): void
    {
        $this->custom_data = $custom_data;
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
        return $this->created_at_before;
    }

    public function setCreatedAtBefore(?string $created_at_before): void
    {
        $this->created_at_before = $created_at_before;
    }

    public function getCreatedAtStrictlyBefore(): ?string
    {
        return $this->created_at_strictly_before;
    }

    public function setCreatedAtStrictlyBefore(?string $created_at_strictly_before): void
    {
        $this->created_at_strictly_before = $created_at_strictly_before;
    }

    public function getCreatedAtAfter(): ?string
    {
        return $this->created_at_after;
    }

    public function setCreatedAtAfter(?string $created_at_after): void
    {
        $this->created_at_after = $created_at_after;
    }

    public function getCreatedAtStrictlyAfter(): ?string
    {
        return $this->created_at_strictly_after;
    }

    public function setCreatedAtStrictlyAfter(?string $created_at_strictly_after): void
    {
        $this->created_at_strictly_after = $created_at_strictly_after;
    }

    public function getUpdatedAtBefore(): ?string
    {
        return $this->updated_at_before;
    }

    public function setUpdatedAtBefore(?string $updated_at_before): void
    {
        $this->updated_at_before = $updated_at_before;
    }

    public function getUpdatedAtStrictlyBefore(): ?string
    {
        return $this->updated_at_strictly_before;
    }

    public function setUpdatedAtStrictlyBefore(?string $updated_at_strictly_before): void
    {
        $this->updated_at_strictly_before = $updated_at_strictly_before;
    }

    public function getUpdatedAtAfter(): ?string
    {
        return $this->updated_at_after;
    }

    public function setUpdatedAtAfter(?string $updated_at_after): void
    {
        $this->updated_at_after = $updated_at_after;
    }

    public function getUpdatedAtStrictlyAfter(): ?string
    {
        return $this->updated_at_strictly_after;
    }

    public function setUpdatedAtStrictlyAfter(?string $updated_at_strictly_after): void
    {
        $this->updated_at_strictly_after = $updated_at_strictly_after;
    }

    public function getOrderCreatedAt(): ?string
    {
        return $this->order_created_at;
    }

    public function setOrderCreatedAt(?string $order_created_at): void
    {
        $this->order_created_at = $order_created_at;
    }

    public function getOrderUpdatedAt(): ?string
    {
        return $this->order_updated_at;
    }

    public function setOrderUpdatedAt(?string $order_updated_at): void
    {
        $this->order_updated_at = $order_updated_at;
    }

    public function getOrderActive(): ?string
    {
        return $this->order_active;
    }

    public function setOrderActive(?string $order_active): void
    {
        $this->order_active = $order_active;
    }

    public function getOrderDeleted(): ?string
    {
        return $this->order_deleted;
    }

    public function setOrderDeleted(?string $order_deleted): void
    {
        $this->order_deleted = $order_deleted;
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
