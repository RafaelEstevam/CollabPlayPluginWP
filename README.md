# Docker commands

To start a docker Swarm

- docker stack deploy --compose-file=docker-stack.yml couchbase
- docker stack rm 'service-name'
- docker service rm $(docker service ls -q) - Remove all Swarm services.

