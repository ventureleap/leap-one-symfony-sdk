<?php


namespace VentureLeap\LeapOneSymfonySdk\Model\Configuration;

class ConfigurationEntry
{
    /**
     * @var string
     */
    private $uuid;

    /**
     * @var string
     */
    private $key;

    /**
     * @var string
     */
    private $subKey;

    /**
     * @var string
     */
    private $value;

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function setUuid(string $uuid): void
    {
        $this->uuid = $uuid;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function setKey(string $key): void
    {
        $this->key = $key;
    }

    public function getSubKey(): ?string
    {
        return $this->subKey;
    }

    public function setSubKey(?string $subKey): void
    {
        $this->subKey = $subKey;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(?string $value): void
    {
        $this->value = $value;
    }
}
