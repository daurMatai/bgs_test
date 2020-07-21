## Dependency

* curl *(required)* 
* docker *(required)* 
* docker-compose *(required)*
* git *(optional)*
* nodejs *(optional)*
* npm *(optional)*

## Dependency install for Ubuntu

#### curl
    sudo apt install curl

#### docker *(required)* 
    curl https://get.docker.com > /tmp/install.sh
    cat /tmp/install.sh
    ...
    chmod +x /tmp/install.sh
    /tmp/install.sh
    
    sudo groupadd docker
    sudo usermod -aG docker $USER
    sudo systemctl restart docker
    
    docker run hello-world

#### docker-compose
    sudo curl -L "https://github.com/docker/compose/releases/download/1.25.4/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
    sudo chmod +x /usr/local/bin/docker-compose
    sudo ln -s /usr/local/bin/docker-compose /usr/bin/docker-compose
    docker-compose --version

#### git
    sudo apt install git
    
#### nodejs & npm
You can choose the version that you like or leave it as is

    cd ~
    curl -sL https://deb.nodesource.com/setup_10.x -o nodesource_setup.sh
    cat nodesource_setup.sh
    sudo bash nodesource_setup.sh
    sudo apt install nodejs
    
    nodejs -v
    npm -v

For some `npm` packages to work (for example, requiring compilation of code from the source code), you need to install the `build-essential` package

    sudo apt install build-essential
    
## Run local

    cp .env.example .env
    
In the root folder of the project
        
    docker run --rm -v $(pwd):/app composer install
    sudo chown -R $USER:$USER *
    
    docker-compose build
   
    docker-compose up
or

    docker-compose up -d

## API

    GET `http://localhost:8088/api/members` - get all members
    GET `http://localhost:8088/api/members?event=1` - get all members filtered by event
    POST `http://localhost:8088/api/member` - create member {email, first_name, last_name, event_id}
    POST `http://localhost:8088/api/member/{id}` - update member {first_name, last_name}
    DELETE `http://localhost:8088/api/member/{id}` - delete member
