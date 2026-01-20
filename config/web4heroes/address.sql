create table web4heroes.address
(
    id          INT auto_increment
        primary key,
    number      VARCHAR(10)  null,
    complement  VARCHAR(45)  null,
    street      VARCHAR(255) null,
    postal_code VARCHAR(45)  null,
    city        VARCHAR(45)  null,
    pays        VARCHAR(45)  null,
    users_id    INT          not null,
    constraint fk_adresse_users1
        foreign key (users_id) references web4heroes.users (id)
            on delete cascade
)
    engine = InnoDB;

create index fk_adresse_users1_idx
    on web4heroes.address (users_id);

