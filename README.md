# swapi
 
<p align="center"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/Star_Wars_Logo.svg/1200px-Star_Wars_Logo.svg.png" width="100%"></p>

## Table of Contents
1.  [About Swapi](#about-swapi)
2.  [Technologies](#technologies)
3.  [Installing Swapi package](#installing-swapi-package)
4.  [Usage](#usage)
5.  [Testing](#testing)
6.  [License](#license)

## About Swapi

"Swapi package" is a simple wrapper package that provide the list of people and the information related to a planet accessible   using the following APIs:
<ul>
<li>GET /api/people (Provide a paginated list of people, filterable and orderable)</li>
<li>GET /api/people/{peopleId} (Provide selected people data including planet details)</li>
</ul>

## Technologies

Laravel 8.*<br>

#### Dependencies
<a href="https://github.com/guzzle/guzzle" target="_blank">guzzlehttp/guzzle</a><br>
<a href="https://packagist.org/packages/phpunit/phpunit" target="_blank">phpunit/phpunit</a>

## Install and configure Swapi Package

To install Swapi package run this command:

```bash
composer require christiancocco/swapi
```
Now you can configure testing environment file to be able to run test script.

1. Create testing DB<br>
2. Create .env.testing file in your root application folder and change DB connection parameter</li>
3. Add following to phpunit.xml file:<br>
```bash
<?xml version="1.0" encoding="UTF-8"?>

    <!-- ... -->

    <testsuites>

        <!-- ... -->

        <testsuite name="Swapi">
            <directory suffix="Test.php">./vendor/christiancocco/swapi/tests</directory>
        </testsuite>
    </testsuites>

```

## Usage


## Testing


## License

The Swapi Laravel package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
