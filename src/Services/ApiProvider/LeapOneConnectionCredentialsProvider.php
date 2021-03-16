<?php


namespace VentureLeap\LeapOneSymfonySdk\Services\ApiProvider;


class LeapOneConnectionCredentialsProvider
{
    private string $endpoint;
    private string $applicationId;
    private string $applicationSecret;

    public function __construct(
        string $endpoint,
        string $applicationId,
        string $applicationSecret
    ) {
        $this->endpoint = $endpoint;
        $this->applicationId = $applicationId;
        $this->applicationSecret = $applicationSecret;
    }

    public function getEndpoint(): string
    {
        return $this->endpoint;
    }

    public function setEndpoint(string $endpoint): void
    {
        $this->endpoint = $endpoint;
    }

    public function getApplicationId(): string
    {
        return $this->applicationId;
    }

    public function setApplicationId(string $applicationId): void
    {
        $this->applicationId = $applicationId;
    }

    public function getApplicationSecret(): string
    {
        return $this->applicationSecret;
    }

    public function setApplicationSecret(string $applicationSecret): void
    {
        $this->applicationSecret = $applicationSecret;
    }
}
