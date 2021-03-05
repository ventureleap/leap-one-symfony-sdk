<?php


namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\CollectionFilter\Product;


class ProductCategoryFilter
{
    private ?string  $name;
    private ?string $products;
    private ?string $customData;
    private int $page = 1;
    private ?int $itemsPerPage;
    private ?bool $pagination;
    private ?string $acceptLanguage;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getProducts(): ?string
    {
        return $this->products;
    }

    public function setProducts(?string $products): void
    {
        $this->products = $products;
    }

    public function getCustomData(): ?string
    {
        return $this->customData;
    }

    public function setCustomData(?string $customData): void
    {
        $this->customData = $customData;
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

    public function getPagination(): ?bool
    {
        return $this->pagination;
    }

    public function setPagination(?bool $pagination): void
    {
        $this->pagination = $pagination;
    }

    public function getAcceptLanguage(): ?string
    {
        return $this->acceptLanguage;
    }

    public function setAcceptLanguage(?string $acceptLanguage): void
    {
        $this->acceptLanguage = $acceptLanguage;
    }

}
