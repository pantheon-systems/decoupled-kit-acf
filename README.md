# Decoupled Kit Advanced Custom Fields

[![Actively Maintained](https://img.shields.io/badge/Pantheon-Actively_Maintained-yellow?logo=pantheon&color=FFDC28)](https://docs.pantheon.io/oss-support-levels#actively-maintained-support) [![GPL 2.0 License](https://img.shields.io/github/license/pantheon-systems/decoupled-kit-acf)](https://github.com/pantheon-systems/decoupled-kit-acf/blob/main/LICENSE.md)

Adds examples related to using advanced custom fields on a decoupled WordPress site.

## Features

- Enables the Advanced Custom Fields plugin.
- Adds a 'related content' field group to posts.
- Creates an example post with associated related content.
- Exposes the related content field group to GraphQL via the wp-graphql-acf plugin.

## Installation

To install Decoupled Kit ACF, follow these steps:

- Require the plugin using composer:

`composer require pantheon-systems/decoupled-kit-acf`

- Activate the plugin.

## Configuration

This plugin does not expose any configuration options and [is not visible/editable via the “Edit Field Groups” admin page](https://www.advancedcustomfields.com/resources/register-fields-via-php/#getting-started) De-activating the plugin will disable the 'related content' field group.

## Linting

This plugin uses [Composer](https://getcomposer.org/) to manage dependencies. To install dependencies, run `composer install` from the plugin directory.

Linting is done with [PHP_CodeSniffer](https://packagist.org/packages/squizlabs/php_codesniffer) using the [Pantheon WP Coding Standards](https://packagist.org/packages/pantheon-systems/pantheon-wp-coding-standards) ruleset. To run the linting checks, use the following command:

```bash
composer lint
```
