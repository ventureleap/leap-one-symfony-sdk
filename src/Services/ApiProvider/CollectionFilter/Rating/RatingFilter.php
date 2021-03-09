<?php


namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\CollectionFilter\Rating;


class RatingFilter
{
    private ?string $productUuid = null;
    private ?bool $existsReview = null;
    private ?string $customData = null;
    private int $page = 1;

    public function getProductUuid(): ?string
    {
        return $this->productUuid;
    }

    public function setProductUuid(?string $productUuid): void
    {
        $this->productUuid = $productUuid;
    }

    public function getExistsReview(): ?bool
    {
        return $this->existsReview;
    }

    public function setExistsReview(?bool $existsReview): void
    {
        $this->existsReview = $existsReview;
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

}
