<?php


namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\CollectionFilter\AuditLog;


class AuditLogEntryFilter
{
    private ?string $entityUuid;
    private ?string $userUuid;
    private ?string $entityType;
    private ?string $orderUuid;
    private ?string $orderUserUuid;
    private ?string $orderEntityUuid;
    private ?string $orderEntityType;
    private ?string $orderUrl;
    private ?string $orderBody;
    private ?string $orderEntryType;
    private ?string $orderApplicationId;
    private ?string $orderCreatedAt;
    private ?string $orderUpdatedAt;
    private int $page = 1;


    public function getEntityUuid(): ?string
    {
        return $this->entityUuid;
    }

    public function setEntityUuid(string $entityUuid): void
    {
        $this->entityUuid = $entityUuid;
    }

    public function getUserUuid(): ?string 
    {
        return $this->userUuid;
    }

    public function setUserUuid(string $userUuid): void
    {
        $this->userUuid = $userUuid;
    }

    public function getEntityType(): ?string
    {
        return $this->entityType;
    }

    public function setEntityType(string $entityType): void
    {
        $this->entityType = $entityType;
    }

    public function getOrderUuid(): ?string
    {
        return $this->orderUuid;
    }

    public function setOrderUuid(string $orderUuid): void
    {
        $this->orderUuid = $orderUuid;
    }

    public function getOrderUserUuid(): ?string
    {
        return $this->orderUserUuid;
    }

    public function setOrderUserUuid(string $orderUserUuid): void
    {
        $this->orderUserUuid = $orderUserUuid;
    }

    public function getOrderEntityUuid(): ?string
    {
        return $this->orderEntityUuid;
    }

    public function setOrderEntityUuid(string $orderEntityUuid): void
    {
        $this->orderEntityUuid = $orderEntityUuid;
    }

    public function getOrderEntityType(): ?string
    {
        return $this->orderEntityType;
    }

    public function setOrderEntityType(string $orderEntityType): void
    {
        $this->orderEntityType = $orderEntityType;
    }

    public function getOrderUrl(): ?string
    {
        return $this->orderUrl;
    }

    public function setOrderUrl(string $orderUrl): void
    {
        $this->orderUrl = $orderUrl;
    }

    public function getOrderBody(): ?string
    {
        return $this->orderBody;
    }

    public function setOrderBody(string $orderBody): void
    {
        $this->orderBody = $orderBody;
    }

    public function getOrderEntryType(): ?string
    {
        return $this->orderEntryType;
    }

    public function setOrderEntryType(string $orderEntryType): void
    {
        $this->orderEntryType = $orderEntryType;
    }

    public function getOrderApplicationId(): ?string
    {
        return $this->orderApplicationId;
    }

    public function setOrderApplicationId(string $orderApplicationId): void
    {
        $this->orderApplicationId = $orderApplicationId;
    }

    public function getOrderCreatedAt(): ?string
    {
        return $this->orderCreatedAt;
    }

    public function setOrderCreatedAt(string $orderCreatedAt): void
    {
        $this->orderCreatedAt = $orderCreatedAt;
    }

    public function getOrderUpdatedAt(): ?string
    {
        return $this->orderUpdatedAt;
    }

    public function setOrderUpdatedAt(string $orderUpdatedAt): void
    {
        $this->orderUpdatedAt = $orderUpdatedAt;
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
