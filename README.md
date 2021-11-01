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
composer require christiancocco/swapi --with-all-dependencies
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
After installation you have to run the following command:<br>

```bash
php artisan swapi:install
```
This command initialize package (copy configuration file) and run migration for planet and people table.

```bash
php artisan swapi:init
```
This command initialize data retring data from swapi.dev.

(Full documentation: https://swapi.dev/documentation)

NB. To initialize testing database run this command:

```bash
php artisan migrate --env=testing
```
If you want to filtering, ordering and paging <b>/api/people</b> result you can use this querystring parameter:

1. query: string to search in all people fields
2. itemperpage: item per page (default value = 10)
3. page: page number
4. sort: sorting field
5. sortVer: sorting versus (ASC: ascending - default value; DESC: descending)

Example: /api/people?query=fair&sort=name&sortVer=DESC&itemperpage=2&page=2

## Testing

To launch the Unit Test run this command:
```bash
php artisan test --filter=SwapiUnitTest --stop-on-failure
```

To launch the Feature Test run this command:
```bash
php artisan test --filter=SwapiFeatureTest --stop-on-failure
```

## License

The Swapi Laravel package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
