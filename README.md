# php-logger
A simple PHP logger used to ouput data to server terminal inspired by the console module in javascript

## Features
* Colored output depending on the type of output (debug= default color, info= lightgreen foreground and lightgray background)
*  Highlighting reserved return values eg(true, false and null) with the color blue
#
#
## Examples
### Debug 
```php
    use Alpha\Console\Console;
    Console::log('Hello World!');
```
### Output
![debug-output](https://raw.githubusercontent.com/claretnnamocha/php-logger/master/debug.png)
#
#
### Info 
```php
    use Alpha\Console\Console;
    Console::info('Some informative message!');
```
### Output
![info-output](https://raw.githubusercontent.com/claretnnamocha/php-logger/master/info.png)
#
#
### Error 
```php
    use Alpha\Console\Console;
    Console::error(new Exception());
```
### Output
![error-output](https://raw.githubusercontent.com/claretnnamocha/php-logger/master/error.png)
