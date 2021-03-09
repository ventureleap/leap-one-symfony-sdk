<?php


namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider\CollectionFilter\User;


class UserFilter
{
    private ?string $username;
    private ?string $email;
    private ?string $firstName;
    private ?string $lastName;
    private ?string $customData;
    private ?string $userType;
    private ?bool $active;
    private ?bool $deleted;
    private int $page = 1;
    private ?int $itemsPerPage = 10;
    private ?bool $pagination;

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): void
    {
        $this->username = $username;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getCustomData(): ?string
    {
        return $this->customData;
    }

    public function setCustomData(?string $customData): void
    {
        $this->customData = $customData;
    }

    public function getUserType(): ?string
    {
        return $this->userType;
    }

    public function setUserType(?string $userType): void
    {
        $this->userType = $userType;
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
