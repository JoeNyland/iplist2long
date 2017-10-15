# iplist2long

Simple microservice to convert an array of IPs to long integers or the other way around

## Setup

```
composer install
```

## Usage

```
php -S localhost:8080 -t public/
```

```
curl localhost:8080/convert/fromIps -X POST -d '["192.168.1.1"]'
=> [3232235777]

curl localhost:8080/convert/fromLongs -X POST -d '[58575289]'
=> ["3.125.201.185"]
```

## Tests

```
phpunit --bootstrap vendor/autoload.php tests
```
