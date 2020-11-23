# LEAP.one PHP SDK

## Installation
1. In your project's composer.json file add the following lines:
```json
{
    "repositories": [
            {
                "type": "git",
                "url": "git@github.com:ventureleap/leap-one-php-sdk.git"
            }
        ]
}
```

2. Require the bundle via:
```bash
composer require leap-one-php-sdk
```

3. Add the following variables to your .env.local:
```
LEAP_ONE_ENDPOINT_URL='https://api-test.leap1.de:8000'
LEAP_ONE_APP_ID='<your-app-id>'
LEAP_ONE_APP_SECRET='<your-app-id>'
```

4. (optional) Add the routes
```yaml
    leap_one_php_sdk:
        resource: "@LeapOnePhpSdkBundle/Resources/config/routes.yaml"
        prefix:   /
``

5. (optional) Modify your security config file
This part requires that you already implemented the logic for using users from the LEAP.one User Service.

```yaml
        encoders:
            VentureLeap\LeapOnePhpSdk\Model\User\User:
                algorithm: auto
        providers:
            customer_provider:
                id: VentureLeap\LeapOnePhpSdk\Services\User\UserProvider
        firewalls:
            dev:
                pattern: ^/(_(profiler|wdt)|css|images|js)/
                security: false
            main:
                pattern: /
                anonymous: true
                lazy: true
                guard:
                    authenticators:
                        - VentureLeap\LeapOnePhpSdk\Services\Security\LoginFormAuthenticator
                logout:
                    path: leap_one_user_logout
```
