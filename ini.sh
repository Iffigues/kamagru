#!/bin/sh
docker-machine create --driver virtualbox Char
docker-machine start Char;
eval $(docker-machine env Char);
#chrome://flags/#unsafely-treat-insecure-origin-as-secure
