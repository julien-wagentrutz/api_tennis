# API_Tennis
API pour obtenir toutes les informations sur les joueurs ATP. (Match, Rank,Points)

## Dépendance

* [Make](https://stat545.com/make-windows.html)
* [Docker](https://docs.docker.com/get-docker/)

## Installation 

Lancer sur un terminal les commandes suivantes à l'intérieur du repo

Première utilisation
```sh
$ make build 
```

Pour lancer le projet
```sh
$ make run
```

Pour lancer le serveur symfony
```sh
$ make run-server 
```

Initialiser la base de données
```sh
$ make load-fixtures 
```

Accès au bash 
```sh
$ make docker-bash 
```


## Ressources

Accès au site : [localhost:8000](https://localhost:8000)

Accès à phpmyadmin : [localhost:8080](http://localhost:8080)

Accès au service de mails : [localhost:8002](http://localhost:8002)


