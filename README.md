php spark make:controller Dashboard/DashboardController


# Criando o Filtro que permita somente o superadmin acessar o manager
php spark make:filter SuperadminFilter

# Enviando emails

utilizamos o mailtrap 


Criando exemplo simples de teste rápido 
	
php spark make:controller SendEmailController

After creating a controller add this method:

<?php
 
namespace App\Controllers;
 
use App\Controllers\BaseController;
 
class SendEmailController extends BaseController
{
    public function index()
    {
        $email = \Config\Services::email();
        $email->setTo('sample-recipient@binaryboxtuts.com');
        $email->setSubject('Email Test');
        $email->setMessage('A sample email using mailtrap.');
        $email->send();
    }
}
Register Route
Now we will be registering the route for merging the PDF files. Open the file /app/Config/Routes.php and update the routes:
$routes->get('/send-email', 'SendEmailController::index');


# Autenticação de usuários

composer require agungsugiarto/codeigniter4-authentication
php spark auth:publish
php spark migrate
php spark key:generate


Registering auth routes
Open your config routes located at app/Config/Routes add this line:

\Fluent\Auth\Facades\Auth::routes();

Fazer os passos 6 6. Registering filter, 7 Registering Event dispatcher da documentação https://github.com/agungsugiarto/codeigniter4-authentication/blob/2.x/docs/en/authentication.md


#Criando um filter baseado no arquivo do vendor inicie com o comando 
php spark make:filter AuthFilter
adicionei a linha
use \Fluent\Auth\Filters\AuthenticationFilter;
e colocando o extends AuthenticationFilter 

# limpando os logs 
# php spark logs:clear


php spark make:seeder PlanSeeder

# Nova área/CRUD
php spark make:migration create_table_plans
php spark make:model PlanModel
php spark make:entity Plan
php spark make:controller Manager/PlansController

# CodeIgniter 4 Application Starter

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](http://codeigniter.com).

This repository holds a composer-installable app starter.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [the announcement](http://forum.codeigniter.com/thread-62615.html) on the forums.

The user guide corresponding to this version of the framework can be found
[here](https://codeigniter4.github.io/userguide/).

## Installation & updates

`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)
