<?php


namespace AutoMapperPlus\AutoMapperPlusBundle\src\Services\ApiProvider;


interface LeapOneConnectionCredentialsProviderInterface
{
    public function getEndpoint(): string;

    public function setEndpoint(string $endpoint): void;

    public function getApplicationId(): string;

    public function setApplicationId(string $applicationId): void;

    public function getApplicationSecret(): string;

    public function setApplicationSecret(string $applicationSecret): void;
}
