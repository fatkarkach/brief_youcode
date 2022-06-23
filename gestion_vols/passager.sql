create table passager
(
    id_passager    int auto_increment
        primary key,
    nom            varchar(255) not null,
    prénom         varchar(255) not null,
    date_naissance varchar(255) not null,
    id             int          null,
    constraint passager_reservation_id_fk
        foreign key (id) references reservation (id)
            on update cascade on delete cascade
);

