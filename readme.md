Email sender
============

# This application is only for test purpose ONLY.

## Installation

```bash
$ composer install
```
Composer will ask you for your gmail address and password. These parameters will be saved in `app/config/parameters.yml`. This file will be generated automaticly by composer.
Make sure you add correct credentials to your gmail account. Mailer class is set to use gmail to send messages.

Read more about how to install and use `Composer` on your local machine [here](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx).

## Run application

Open terminal and go to public_html directory

```bash
$ cd path/to/project/public_html
$ php -S localhost:8000
```

Then open in your browser this URL: [localhost:8000](http://localhost:8000)

