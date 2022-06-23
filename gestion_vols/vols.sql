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

