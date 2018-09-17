# Breaking (?) changes between version 5.6.33 and 5.6.34

To demonstrate the difference in behaviour run the tests with both versions.

5.6.33 will let all tests pass
5.6.34 will fail the last three tests

Run below after changing the version in `composer.json`:

`rm composer.lock && rm -rf vendor && composer install && clear && vendor/bin/phpunit`
