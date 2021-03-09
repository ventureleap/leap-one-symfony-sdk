<?php


namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\CollectionFilter\Order;


class VoucherFilter
{
    private ?array $properties;
    private ?string $custom_data;
    private ?string $voucher_code;
    private ?string $voucher_type;
    private ?string $value;
    private ?string $quantity;
    private ?string $quantity_per_person;
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
    private ?string $valid_from_before;
    private ?string $valid_from_strictly_before;
    private ?string $valid_from_after;
    private ?string $valid_from_strictly_after;
    private ?string $valid_to_before;
    private ?string $valid_to_strictly_before;
    private ?string $valid_to_after;
    private ?string $valid_to_strictly_after;
    private ?string $order_voucher_type;
    private ?string $order_voucher_code;
    private ?string $order_created_at;
    private ?string $order_updated_at;
    private ?string $order_active;
    private ?string $order_deleted;
    private ?string $order_valid_from;
    private ?string $order_valid_to;
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

    public function getVoucherCode(): ?string
    {
        return $this->voucher_code;
    }

    public function setVoucherCode(?string $voucher_code): void
    {
        $this->voucher_code = $voucher_code;
    }

    public function getVoucherType(): ?string
    {
        return $this->voucher_type;
    }

    public function setVoucherType(?string $voucher_type): void
    {
        $this->voucher_type = $voucher_type;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(?string $value): void
    {
        $this->value = $value;
    }

    public function getQuantity(): ?string
    {
        return $this->quantity;
    }

    public function setQuantity(?string $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getQuantityPerPerson(): ?string
    {
        return $this->quantity_per_person;
    }

    public function setQuantityPerPerson(?string $quantity_per_person): void
    {
        $this->quantity_per_person = $quantity_per_person;
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

    public function getValidFromBefore(): ?string
    {
        return $this->valid_from_before;
    }

    public function setValidFromBefore(?string $valid_from_before): void
    {
        $this->valid_from_before = $valid_from_before;
    }

    public function getValidFromStrictlyBefore(): ?string
    {
        return $this->valid_from_strictly_before;
    }

    public function setValidFromStrictlyBefore(?string $valid_from_strictly_before): void
    {
        $this->valid_from_strictly_before = $valid_from_strictly_before;
    }

    public function getValidFromAfter(): ?string
    {
        return $this->valid_from_after;
    }

    public function setValidFromAfter(?string $valid_from_after): void
    {
        $this->valid_from_after = $valid_from_after;
    }

    public function getValidFromStrictlyAfter(): ?string
    {
        return $this->valid_from_strictly_after;
    }

    public function setValidFromStrictlyAfter(?string $valid_from_strictly_after): void
    {
        $this->valid_from_strictly_after = $valid_from_strictly_after;
    }

    public function getValidToBefore(): ?string
    {
        return $this->valid_to_before;
    }

    public function setValidToBefore(?string $valid_to_before): void
    {
        $this->valid_to_before = $valid_to_before;
    }

    public function getValidToStrictlyBefore(): ?string
    {
        return $this->valid_to_strictly_before;
    }

    public function setValidToStrictlyBefore(?string $valid_to_strictly_before): void
    {
        $this->valid_to_strictly_before = $valid_to_strictly_before;
    }

    public function getValidToAfter(): ?string
    {
        return $this->valid_to_after;
    }

    public function setValidToAfter(?string $valid_to_after): void
    {
        $this->valid_to_after = $valid_to_after;
    }

    public function getValidToStrictlyAfter(): ?string
    {
        return $this->valid_to_strictly_after;
    }

    public function setValidToStrictlyAfter(?string $valid_to_strictly_after): void
    {
        $this->valid_to_strictly_after = $valid_to_strictly_after;
    }

    public function getOrderVoucherType(): ?string
    {
        return $this->order_voucher_type;
    }

    public function setOrderVoucherType(?string $order_voucher_type): void
    {
        $this->order_voucher_type = $order_voucher_type;
    }

    public function getOrderVoucherCode(): ?string
    {
        return $this->order_voucher_code;
    }

    public function setOrderVoucherCode(?string $order_voucher_code): void
    {
        $this->order_voucher_code = $order_voucher_code;
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

    public function getOrderValidFrom(): ?string
    {
        return $this->order_valid_from;
    }

    public function setOrderValidFrom(?string $order_valid_from): void
    {
        $this->order_valid_from = $order_valid_from;
    }

    public function getOrderValidTo(): ?string
    {
        return $this->order_valid_to;
    }

    public function setOrderValidTo(?string $order_valid_to): void
    {
        $this->order_valid_to = $order_valid_to;
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
