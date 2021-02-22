# LEAP.one SYMFONY PHP SDK
To easy up development in Symfony with the help of leap.one PHP SDK

## Installation

1. Require the bundle via:
```bash
composer require ventureleap/leap-one-symfony-sdk dev-main
```

2. Add the following variables to your .env.local:
```
LEAP_ONE_ENDPOINT_URL='https://api-test.leap1.de:8000'
LEAP_ONE_APP_ID='<your-app-id>'
LEAP_ONE_APP_SECRET='<your-app-id>'
```

3. (optional) Add the routes
```yaml
    leap_one_php_sdk:
        resource: "@LeapOneSymfonySdkBundle/Resources/config/routes.yaml"
        prefix:   /
```

4. (optional) Modify your security config file
   This part requires that you already implemented the logic for using users from the LEAP.one User Service.

```yaml
        encoders:
            VentureLeap\LeapOneSymfony\Model\User\User:
                algorithm: auto
        providers:
           user_provider:
              id: leap_one.user_provider
        firewalls:
            dev:
                pattern: ^/(_(profiler|wdt)|css|images|js)/
                security: false
            main:
                pattern: /
                anonymous: true
                lazy: true
                provider: user_provider
                guard:
                   authenticators:
                      - leap_one.login_form_authenticator
                      - leap_one.mfa_authenticator
                   entry_point: leap_one.login_form_authenticator
                logout:
                    path: leap_one_user_logout
        access_control:
           - { path: ^/login, roles: IS_AUTHENTICATED_ANONYMOUSLY }
           - { path: ^/mfa-check, roles: IS_AUTHENTICATED_ANONYMOUSLY }
           - { path: ^/reset-password, roles: IS_AUTHENTICATED_ANONYMOUSLY }
           - { path: ^/, roles: ROLE_ADMIN }
```

5. (optional) To allow multiple user types

To allow your application to handle multiple types of users you'll need 3 steps.

5.1 Your routes should have an additional section.
This should contain the logic for a route prefix on which
you want to authenticate your users. The example below demonstrates how to add a new user type
called `user`, which will be available under yourdomain.com/user
``````yaml
  leap_one_php_sdk_user:
    resource: "@LeapOneSymfonySdkBundle/Resources/config/routes.yaml"
    defaults:
      user_type: 'user'
    prefix:
      user: '/{user_type}'
``````

5.2 Create new services for the authenticators
```yaml
    leap_one_user.user_provider:
        class: VentureLeap\LeapOneSymfonySdk\Services\User\UserProvider
        public: true
        arguments:
            $userType: 'user'

    leap_one_user.login_form_authenticator:
        parent: leap_one.login_form_authenticator
        arguments:
            $loginRoute: 'leap_one_user_login.user'
            $userProvider: '@leap_one_user.user_provider'

    leap_one_user.mfa_authenticator:
        parent: leap_one.mfa_authenticator
        arguments:
            $loginRoute: 'leap_one_user_mfa_check'
            $userProvider: '@leap_one_user.user_provider'
```

5.3 Use the defined services in your security layer
Add the new user provider to your security.yaml:
```yaml
    providers:
        user_provider:
            id: leap_one.user_provider
        user_user_provider:
            id: leap_one_user.user_provider
```
Add also the new corresponding section to the firewall, eg.:
```yaml
    user:
        pattern: ^/user
        lazy: true
        anonymous: true
        provider: user_user_provider
        guard:
            authenticators:
                - leap_one_user.login_form_authenticator
                - leap_one_user.mfa_authenticator
            entry_point: leap_one_user.login_form_authenticator
        logout:
            path: leap_one_user_logout
```
Of course, you also need to complete your `access_control` logic covering the new routes.

