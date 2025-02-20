# Facebook for WooCommerce

[![PHP Coding Standards](https://github.com/woocommerce/facebook-for-woocommerce/actions/workflows/php-cs-on-changes.yml/badge.svg)](https://github.com/woocommerce/facebook-for-woocommerce/actions/workflows/php-coding-standards.yml)

![Banner top GIF](https://media3.giphy.com/media/v1.Y2lkPTc5MGI3NjExa2p4a3NzOW95dzMzd2ZzMng2MjZqdWJsMTBpZDNxYTM2NmlhazIxNCZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/EC1gl2A5oplKMAorkT/giphy.gif) 

![Banner top GIF]([https://media3.giphy.com/media/v1.Y2lkPTc5MGI3NjExa2p4a3NzOW95dzMzd2ZzMng2MjZqdWJsMTBpZDNxYTM2NmlhazIxNCZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/EC1gl2A5oplKMAorkT/giphy.gif](https://media0.giphy.com/media/v1.Y2lkPTc5MGI3NjExbGJuM3RocXZxNmp2bHA5cW9pbG5ibTBub3h3ZjdybWlnbGR0NGhheCZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/nhW9Oxyu2FeAkqZyc7/giphy.gif)) 

### We are thrilled to invite you to contribute to our project and be part of an amazing community.Your ideas, code, and feedback are invaluable to us!

# 🌟 Join Us Today! 🌟

![Excited GIF](https://media1.giphy.com/media/v1.Y2lkPTc5MGI3NjExbWw0aHV4bTJpdjA1OGJ3dmt6eGJvYTBlN3A4MHhmaWp2Zm5rYXFtaiZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/oMinksTUtYZFw60CfI/giphy.gif) 

### Happy contributing! 🚀

![Banner bottom GIF](https://media3.giphy.com/media/v1.Y2lkPTc5MGI3NjExa2p4a3NzOW95dzMzd2ZzMng2MjZqdWJsMTBpZDNxYTM2NmlhazIxNCZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/EC1gl2A5oplKMAorkT/giphy.gif) 

This is the development repository for the Facebook for WooCommerce plugin.

- [WooCommerce.com product page](https://woocommerce.com/products/facebook/)
- [WordPress.org plugin page](https://wordpress.org/plugins/facebook-for-woocommerce/)
- [User documentation](https://woocommerce.com/document/facebook-for-woocommerce/)

## Support
The best place to get support is the [WordPress.org Facebook for WooCommerce forum](https://wordpress.org/support/plugin/facebook-for-woocommerce/).

If you have a WooCommerce.com account, you can [search for help or submit a help request on WooCommerce.com](https://woocommerce.com/my-account/contact-support/).

### Logging
The plugin offers logging that can help debug various problems. You can enable debug mode in the main plugin settings panel under the `Enable debug mode` section.
By default plugin omits headers in the requests to make the logs more readable. If debugging with headers is necessary you can enable the headers in the logs by setting `wc_facebook_request_headers_in_debug_log` option to true.
## Development
### Developing
- Clone this repository into the `wp-content/plugins/` folder your WooCommerce development environment.
- Install dependencies:
	- `npm install`
	- `composer install`
- Build assets:
	- `npm start` to build a development version
- Linting:
	- `npm run lint:php` to run PHPCS linter on all PHP files
- Testing:
	- `./bin/install-wp-tests.sh <test-db-name> <db-user> <db-password> [db-host]` to set up testing environment
	- `npm run test:php` to run PHP unit tests on all PHP files

#### Production build

- `npm run build` : Builds a production version.

### Releasing
Refer to the [wiki for details of how to build and release the plugin](https://github.com/woocommerce/facebook-for-woocommerce/wiki/Build-&-Release).

### PHPCS Linting and PHP 8.1+

We currently do not support PHPCS on PHP 8.1+ versions. Please run PHPCS checks on PHP 8.0 or lower versions. Refer [#2624 PR](https://github.com/woocommerce/facebook-for-woocommerce/pull/2624/) for additional context.
