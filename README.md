# CO565-WebServices

App that allows parents/ minders to choose their children's school meals and see the nutrional information in each meal

Contributors:
<li>Atish Appadu</li>
<li>Isabelle Thorpe</li>
<li>Jon Jackson</li>
<li>Kayley Syrett</li>

## Local Development Environment

- XAMPP recommended (PHP 8.x)
- Git
- Composer (https://getcomposer.org/)

## Setup Instructions

- Clone repo to local htdocs folder
- Setup empty database on localhost (named "co565_db")
- run `composer install`
- run `vendor/bin/phinx migrate -e development`
- run `vendor/bin/phinx seed:run -e development`

## Default Logins

### Admin

- User ID: nigellalawson@microwave.com
- Password: password

### Parent

- User ID: jonjackson@munched.com
- Password: password
