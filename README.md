# Test task for Back-End PHP Intern in MacPaw

Hi there
This is my test task based on Laravel v9.21.6 (PHP v8.1.8) . 

You can read a more detailed work report [here](https://github.com/oleksandroo/testTask/blob/master/Test%20task%20report.pdf). I managed to complete all the tasks (main and optional)
## Content

This branch contains a three-tier architectureapplication running on a LEMP stack, supported by Docker and orchestrated by Docker Compose.

It includes:

* A container for Nginx;
* A container for the backend application (based on [Laravel](https://laravel.com/));
* A container for MySQL;
* A volume to persist MySQL data.

## Directions of use

Add the following domains to your machine's `hosts` file:

```
127.0.0.1 http://laravel.test.task/
```

Clone the repository 

```
$ git clone git@github.com:osteel/docker-tutorial.git && cd docker-tutorial
$ git checkout part-3
```

**The rest of the commands are to be run from the root of the project.**

Copy `.env.example` to `.env`, both at the root of the project and in `src/task`:

```
$ cp .env.example .env && cd src/task && cp .env.example .env && cd ../..
```

Install the task dependencies:

```
$ docker compose run --rm task composer install
```

Start the project:

```
$ docker compose up -d
```

Once the project is started, generate the Laravel application's key:

```
$ docker compose exec task php artisan key:generate
```
## Available routes ##

```
- http://laravel.test.task/api/
- http://laravel.test.task/api/neo/hazardous/
- http://laravel.test.task/api/neo/fastest?hazardous=true
```
