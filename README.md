# Runa Connect API Laravel Package

This package provides an easy-to-use integration of the Runa Connect API for Laravel applications.

## Table of Contents

- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [Testing](#testing)
- [License](#license)

## Installation

To install the package, run the following command:

```sh
composer require claraleigh/runa-api
```

## Configuration

After installing the package, you need to publish the configuration file:

```sh
php artisan vendor:publish --provider="ClaraLeigh\RunaApi\RunaApiServiceProvider" --tag="config"
```

Then, add your Runa Connect API key to your `.env` file:

