create table Utilisateur(
    idUtilisateur int primary key auto_increment,
    nom varchar(100) not null,
    email varchar(100) not null unique,
    motDePasse varchar(100) not null,
    identification int not null
);