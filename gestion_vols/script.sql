create table utilisateurs
(
    id_user        int auto_increment
        primary key,
    nom            varchar(255) not null,
    prénom         varchar(255) not null,
    date_naissance varchar(255) not null,
    email          varchar(255) not null,
    mode_passe     varchar(255) not null,
    statut         varchar(255) not null
);

create table vols
(
    id_vols        int auto_increment
        primary key,
    lieu_départ    varchar(255) not null,
    lieu_arrivé    varchar(255) not null,
    date_départ    datetime     not null,
    date_arrivé    datetime     not null,
    prix           int          not null,
    limites_places int          not null
);

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


