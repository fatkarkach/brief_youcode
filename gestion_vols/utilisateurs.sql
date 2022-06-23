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

