<?php


namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\CollectionFilter\Product;


class PriceListProductFilter
{
    private ?string $product = null;
    private ?string $priceList = null;
    private int $page = 1;
    private ?int $itemsPerPage = null;
    private ?bool $pagination = null;

    public function getProduct(): ?string
    {
        return $this->product;
    }

    public function setProduct(?string $product): void
    {
        $this->product = $product;
    }

    public function getPriceList(): ?string
    {
        return $this->priceList;
    }

    public function setPriceList(?string $priceList): void
    {
        $this->priceList = $priceList;
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
}
