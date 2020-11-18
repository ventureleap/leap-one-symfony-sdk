Add the routes
    
    leap_one_php_sdk:
        resource: "@LeapOnePhpSdkBundle/Resources/config/routes.yaml"
        prefix:   /


Add the guard on the security configuration file

        guard:
            authenticators:
                - VentureLeap\LeapOnePhpSdk\Services\Security
                
       logout:
            path: leap_one_user_logout