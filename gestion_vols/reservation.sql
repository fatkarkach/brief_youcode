create table reservation
(
    id      int auto_increment
        primary key,
    choix   varchar(256) not null,
    id_user int          not null,
    id_vols int          not null,
    constraint reservation_ibfk_1
        foreign key (id_user) references utilisateurs (id_user)
            on delete cascade,
    constraint reservation_ibfk_2
        foreign key (id_vols) references vols (id_vols)
            on delete cascade
);

