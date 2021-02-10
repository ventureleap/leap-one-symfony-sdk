<?php

namespace VentureLeap\LeapOneSymfonySdk\Model\MFA;

class MFACode
{
    protected string $uuid;

    protected string $authCode;

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function setUuid(string $uuid): void
    {
        $this->uuid = $uuid;
    }

    public function getAuthCode(): string
    {
        return $this->authCode;
    }

    public function setAuthCode(string $authCode): void
    {
        $this->authCode = $authCode;
    }
}
