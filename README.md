# PHP Laravel VerifyEmail

[![Build Status](https://travis-ci.org/madeITBelgium/verifyEmail.svg?branch=master)](https://travis-ci.org/madeITBelgium/verifyEmail)
[![Coverage Status](https://coveralls.io/repos/github/madeITBelgium/verifyEmail/badge.svg?branch=master)](https://coveralls.io/github/madeITBelgium/verifyEmail?branch=master)
[![Latest Stable Version](https://poser.pugx.org/madeITBelgium/verifyEmail/v/stable.svg)](https://packagist.org/packages/madeITBelgium/verifyEmail)
[![Latest Unstable Version](https://poser.pugx.org/madeITBelgium/verifyEmail/v/unstable.svg)](https://packagist.org/packages/madeITBelgium/verifyEmail)
[![Total Downloads](https://poser.pugx.org/madeITBelgium/verifyEmail/d/total.svg)](https://packagist.org/packages/madeITBelgium/verifyEmail)
[![License](https://poser.pugx.org/madeITBelgium/verifyEmail/license.svg)](https://packagist.org/packages/madeITBelgium/verifyEmail)


Is a PHP class to verify an email address and make sure it is valid and does exist on the mail server.

This class connects to the mail server and checks whether the mailbox exists or not.

# Installation

Require this package in your `composer.json` and update composer.

```php
"madeitbelgium/verifyemail": "~1.0"
```

Publish the config file. Set the correct email address.
```php
php artisan vendor:publish
```


# Documentation
## Usage


```PHP
use MadeITBelgium\VerifyEmail\Facades\VerifyEmail;

$ve = VerifyEmail::verify('some.email.address@example.com');
```


OR (You can set another second email address or change the port)
```PHP
$ve = VerifyEmail::verify('some.email.address@example.com', 'my.email.address@my-domain.com', 26);
```
This will return a boolean. True if the email is valid, false otherwise.

The first email address 'some.email.address@example.com' is the one to be checked, and the second 'my.email.address@my-domain.com' is an email address to be provided to the server. This email needs to be valid and from the same server that the script is running from. To make sure your server is not treated as a spam or gets blacklisted check the score of your server here https://mail-tester.com



If you want to get any errors, call this function after the verify function:

```PHP
print_r(VerifyEmail::getErrors());
```

This will return an array of all errors (if any):


```HTML
Array
(
    [0] => No suitable MX records found.
)
```



If you want to get all debug messages of the connection, call this function:

```PHP
print_r(VerifyEmail::getDebug());
```

This will return an array of all messages and values that used during the process.



```HTML
Array
(
    [0] => initialized with Email: h*****@gmail.com, Verifier Email: sam@verifye.ml, Port: 25
    [1] => Verify function was called.
    [2] => Finding MX record...
    [3] => Found MX: alt4.gmail-smtp-in.l.google.com
    [4] => Connecting to the server...
    [5] => Connection to server was successful.
    [6] => Starting veriffication...
    [7] => Got a 220 response. Sending HELO...
    [8] => Response: 250 mx.google.com at your service

    [9] => Sending MAIL FROM...
    [10] => Response: 250 2.1.0 OK gw8si3985770wjb.84 - gsmtp

    [11] => Sending RCPT TO...
    [12] => Response: 250 2.1.5 OK gw8si3985770wjb.84 - gsmtp

    [13] => Sending QUIT...
    [14] => Looking for 250 response...
    [15] => Found! Email is valid.
)
```


And to see the *raw* debug messages of the server commands sent
```PHP
print_r(VerifyEmail::getDebug(true));
```
which will return an array:

    Array
    (
        [helo] => 250 mx.google.com at your service
        [mail_from] => 250 2.1.0 OK a68si4170774ioe.18 - gsmtp
        [rcpt_to] => 250 2.1.5 OK a68si4170774ioe.18 - gsmtp
        [quit] => 4
    )



## Notes:

- Some mail servers will silently reject the test message, to prevent spammers from checking against their users' emails and filter the valid emails, so this function might not work properly with all mail servers.

- You server must be configured properly as a mail server to avoid being blocked or blacklisted. This includes things like SSL, SPF records, Domain Keys, DMARC records, etc. To check your server use this tool https://mail-tester.com


# Support
Support github or mail: tjebbe.lievens@madeit.be

# Contributing
Please try to follow the psr-2 coding style guide. http://www.php-fig.org/psr/psr-2/

# License
This package is licensed under LGPL. You are free to use it in personal and commercial projects. The code can be forked and modified, but the original copyright author should always be included!