# QCM Website

The objective of this project was to build a website proposing MCQs on many films, so that users can test their cinematographic culture.
I chose to create my website with the PHP language. I chose this technology because I wanted to put into practice object-oriented programming with PHP while respecting the MVC (Model, View, Controller) design pattern.
The site is based on 3 types of status on the site : 

> - **Classic users** : these people can just make MCQs.
> - **Authors** : these users with this status can make MCQs, but also edit existing MCQs and add new ones. (CRUD)
> - **Admins** : these users manage and moderate people with author status. (CRUD)

Create a file `.env` :
```sh
MYSQL_ROOT_PASSWORD=
MYSQL_DATABASE=
MYSQL_USER=
MYSQL_PASSWORD=
LOCAL_PORT=
DIST_PORT=
LOCAL_PORT_PHPMYADMIN=
DIST_POR_PHPMYADMINT=
```

### Start the project

- `docker-compose up`


### Connection

user account test :
- Username : `thib`
- password : `aa`

