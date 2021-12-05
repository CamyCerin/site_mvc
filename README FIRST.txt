créer une bdd du nom : api_mvc

create table if not exists article
    (
    id int auto_increment primary key,
    title        varchar(255) not null,
    content      text         not null,
    picture      varchar(255) not null,
    author_id    int          not null,
    created_date datetime     not null
    );

create table if not exists review
    (
        id int auto_increment primary key,
        content      varchar(255) not null,
        author_id    int          not null,
        created_date datetime     not null,
        article_id   int          not null
    );

create table if not exists user
    (
        id int auto_increment primary key,
        username varchar(255) not null,
        email    varchar(255) not null,
        password varchar(255) not null,
        role     varchar(255) not null
    );


MODIFIER l'url si besoin dans web/index.php et dans .htaccess en fonction du folder