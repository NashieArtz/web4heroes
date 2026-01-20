create table web4heroes.users
(
    id        INT auto_increment
        primary key,
    email     VARCHAR(100)                                     not null,
    pwd       VARCHAR(255)                                     not null,
    lastname  VARCHAR(100)                                     null,
    firstname VARCHAR(100)                                     null,
    gender    enum ('Male', 'Female', 'Other') default 'Other' null,
    birthdate DATE                                             null,
    phone     VARCHAR(20)                                      null,
    constraint email_UNIQUE
        unique (email)
)
    engine = InnoDB;

