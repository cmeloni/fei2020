#!/bin/bash

docker-compose exec app composer update
docker-compose exec app chmod 777 ./web/assert -R
docker-compose exec app chmod 777 ./runtime -R

