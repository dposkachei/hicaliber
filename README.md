# Hicaliber Test

## Requirements

* PHP >= 7.4
* MySQL >= 8.0

## Setup (ENG, current)

1. Build and run Docker containers with _docker-compose_
   Go to *laradock* folder:
    ```shell
    cd laradock
    ```

   Copy *.env.local* into *.env* file (dev and production env files are for corresponding environments):
    ```shell
    cp .env.local .env
    ```

   Build containers (first time only):
    ```shell
    docker-compose build
    ```

   Wait until containers are built.

   Run containers (*-d* stands for *"run as daemon"*):
    ```shell
    docker-compose up -d
    ```

   Get in *workspace* container:
    ```shell
    docker-compose exec --user=laradock workspace bash
    ```
2. Packages setup and changing Laravel settings
   Inside *workspace* container run the command:
    ```shell
    composer install
    ``` 

   Copy .env.example into .env (dev and production are for corresponding environments):
    ```shell
    cp .env.example .env
    ```

   Generating Laravel app key (if it's **not** inside .env file):
    ```shell
    php artisan key:generate
    ```

   Run migrations (still inside *workspace* container) and seeds:
    ```shell
    // local & dev envs only
    php artisan migrate --seed

    // on production env
    php artisan migrate
    php artisan db:seed
    ```
3. Build styles and scripts

    ```shell
    yarn install
    yarn run prod
    ```

4. Open application on http://localhost

#### Useful commands

* To stop containers run the following command in *laradock* folder:
    ```shell
    docker-compose stop
    ```

* To re-build containers (run in *laradock* folder):
    ```shell
    docker-compose up -d --build
    // or
    docker-compose build --no-cache
    ```

* Before any new seeder run:
    ```shell
    composer dump-autoload
    ```

* Build styles and scripts
    ```shell
    yarn install
    yarn run prod
    ```
