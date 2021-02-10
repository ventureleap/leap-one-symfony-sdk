<?php

namespace VentureLeap\LeapOneSymfonySdk\Services\AutoMapper;

use AutoMapperPlus\AutoMapperPlusBundle\AutoMapperConfiguratorInterface;
use AutoMapperPlus\Configuration\AutoMapperConfigInterface;
use VentureLeap\LeapOneSymfonySdk\Model\MFA\MFACode;
use VentureLeap\UserService\Model\UserJsonldMfaRequest;

class MFAConfig implements AutoMapperConfiguratorInterface
{
    public function configure(AutoMapperConfigInterface $config): void
    {
        $config->registerMapping(UserJsonldMfaRequest::class, MFACode::class)
            ->forMember('uuid', function (UserJsonldMfaRequest $mfaRequest) {
                return $mfaRequest->getUuid();
            })
            ->forMember('authCode', function (UserJsonldMfaRequest $mfaRequest) {
                return $mfaRequest->getAuthCode();
            })
        ;
    }
}
