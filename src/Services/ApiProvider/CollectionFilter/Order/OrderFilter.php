<?php


namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\CollectionFilter\Order;


class OrderFilter
{
    private ?array $properties = null;
    private ?string $customData = null;
    private ?string $internalComment = null;
    private ?string $customerComment = null;
    private ?string $billingAddressFullName = null;
    private ?string $billingAddressCompanyName = null;
    private ?string $orderCode = null;
    private ?string $status = null;
    private ?string $paymentStatus = null;
    private ?string $customerUuid = null;
    private ?string $paymentProvider = null;
    private ?string $paymentMethod = null;
    private ?string $paymentComment = null;
    private ?bool $active = null;
    private ?bool $deleted = null;
    private ?bool $isBToB = null;
    private ?string $dateOfValidityBefore = null;
    private ?string $dateOfValidityStrictlyBefore = null;
    private ?string $dateOfValidityAfter = null;
    private ?string $dateOfValidityStrictlyAfter = null;
    private ?string $createdAtBefore = null;
    private ?string $createdAtStrictlyBefore = null;
    private ?string $createdAtAfter = null;
    private ?string $createdAtStrictlyAfter = null;
    private ?string $orderStatus = null;
    private ?string $orderPaymentStatus = null;
    private ?string $orderCreatedAt = null;
    private ?string $orderUpdatedAt = null;
    private ?string $orderPaymentDate = null;
    private ?string $orderOrderCode = null;
    private ?string $orderCustomerUuid = null;
    private int $page = 1;
    private ?int $itemsPerPage = null;
    private ?string $pagination = null;
    private ?string $paymentReference = null;

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

    public function getInternalComment(): ?string
    {
        return $this->internalComment;
    }

    public function setInternalComment(?string $internalComment): void
    {
        $this->internalComment = $internalComment;
    }

    public function getCustomerComment(): ?string
    {
        return $this->customerComment;
    }

    public function setCustomerComment(?string $customerComment): void
    {
        $this->customerComment = $customerComment;
    }

    public function getBillingAddressFullName(): ?string
    {
        return $this->billingAddressFullName;
    }

    public function setBillingAddressFullName(?string $billingAddressFullName): void
    {
        $this->billingAddressFullName = $billingAddressFullName;
    }

    public function getBillingAddressCompanyName(): ?string
    {
        return $this->billingAddressCompanyName;
    }

    public function setBillingAddressCompanyName(?string $billingAddressCompanyName): void
    {
        $this->billingAddressCompanyName = $billingAddressCompanyName;
    }

    public function getOrderCode(): ?string
    {
        return $this->orderCode;
    }

    public function setOrderCode(?string $orderCode): void
    {
        $this->orderCode = $orderCode;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    public function getPaymentStatus(): ?string
    {
        return $this->paymentStatus;
    }

    public function setPaymentStatus(?string $paymentStatus): void
    {
        $this->paymentStatus = $paymentStatus;
    }

    public function getCustomerUuid(): ?string
    {
        return $this->customerUuid;
    }

    public function setCustomerUuid(?string $customerUuid): void
    {
        $this->customerUuid = $customerUuid;
    }

    public function getPaymentProvider(): ?string
    {
        return $this->paymentProvider;
    }

    public function setPaymentProvider(?string $paymentProvider): void
    {
        $this->paymentProvider = $paymentProvider;
    }

    public function getPaymentMethod(): ?string
    {
        return $this->paymentMethod;
    }

    public function setPaymentMethod(?string $paymentMethod): void
    {
        $this->paymentMethod = $paymentMethod;
    }

    public function getPaymentComment(): ?string
    {
        return $this->paymentComment;
    }

    public function setPaymentComment(?string $paymentComment): void
    {
        $this->paymentComment = $paymentComment;
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

    public function getIsBToB(): ?bool
    {
        return $this->isBToB;
    }

    public function setIsBToB(?bool $isBToB): void
    {
        $this->isBToB = $isBToB;
    }

    public function getDateOfValidityBefore(): ?string
    {
        return $this->dateOfValidityBefore;
    }

    public function setDateOfValidityBefore(?string $dateOfValidityBefore): void
    {
        $this->dateOfValidityBefore = $dateOfValidityBefore;
    }

    public function getDateOfValidityStrictlyBefore(): ?string
    {
        return $this->dateOfValidityStrictlyBefore;
    }

    public function setDateOfValidityStrictlyBefore(?string $dateOfValidityStrictlyBefore): void
    {
        $this->dateOfValidityStrictlyBefore = $dateOfValidityStrictlyBefore;
    }

    public function getDateOfValidityAfter(): ?string
    {
        return $this->dateOfValidityAfter;
    }

    public function setDateOfValidityAfter(?string $dateOfValidityAfter): void
    {
        $this->dateOfValidityAfter = $dateOfValidityAfter;
    }

    public function getDateOfValidityStrictlyAfter(): ?string
    {
        return $this->dateOfValidityStrictlyAfter;
    }

    public function setDateOfValidityStrictlyAfter(?string $dateOfValidityStrictlyAfter): void
    {
        $this->dateOfValidityStrictlyAfter = $dateOfValidityStrictlyAfter;
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

    public function getOrderStatus(): ?string
    {
        return $this->orderStatus;
    }

    public function setOrderStatus(?string $orderStatus): void
    {
        $this->orderStatus = $orderStatus;
    }

    public function getOrderPaymentStatus(): ?string
    {
        return $this->orderPaymentStatus;
    }

    public function setOrderPaymentStatus(?string $orderPaymentStatus): void
    {
        $this->orderPaymentStatus = $orderPaymentStatus;
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

    public function getOrderPaymentDate(): ?string
    {
        return $this->orderPaymentDate;
    }

    public function setOrderPaymentDate(?string $orderPaymentDate): void
    {
        $this->orderPaymentDate = $orderPaymentDate;
    }

    public function getOrderOrderCode(): ?string
    {
        return $this->orderOrderCode;
    }

    public function setOrderOrderCode(?string $orderOrderCode): void
    {
        $this->orderOrderCode = $orderOrderCode;
    }

    public function getOrderCustomerUuid(): ?string
    {
        return $this->orderCustomerUuid;
    }

    public function setOrderCustomerUuid(?string $orderCustomerUuid): void
    {
        $this->orderCustomerUuid = $orderCustomerUuid;
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

    public function getPaymentReference(): ?string
    {
        return $this->paymentReference;
    }

    public function setPaymentReference(?string $paymentReference): void
    {
        $this->paymentReference = $paymentReference;
    }
}
