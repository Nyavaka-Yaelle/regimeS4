drop database RegimeS4;
create database RegimeS4;
use RegimeS4
create table Utilisateur(
    `idUtilisateur` int primary key auto_increment,
    `nom` varchar(100) not null unique,
    `email` varchar(100) not null unique,
    `motDePasse` varchar(100) not null,
    `identification` int not null
);
create table Profiles(
    `idProfiles` int primary key auto_increment,
    `idUtilisateur` int references Utilisateur(idUtilisateur),
    `genre` int not null,
    `taille` double precision not null,
    `poids` double precision not null,
    `dateNaissance` date not null
);
create table TypeObjectif(
    `idTypeObjectif` integer primary key auto_increment,
    `nom` varchar(100) not null unique
);
create table Objectif(
    `idObjectif` integer primary key auto_increment,
    `idTypeObjectif` integer references TypeObjectif(idTypeObjectif),
    `nom` varchar(100) not null unique
);
create table ObjectifUtilisateur(
    `idObjectifUtilisateur` integer primary key auto_increment,
    `idUtilisateur` integer references Utilisateur(idUtilisateur),
    `idObjectif` integer references Objectif(idObjectif)
);
create table TypeSakafo(
    `idTypeSakafo` integer primary key auto_increment,
    `nom` varchar(100) not null,
    `idTypeObjectif` integer references TypeObjectif(idTypeObjectif)
);

create table Sakafo(
    `idSakafo` integer primary key auto_increment,
    `idTypeSakafo` integer references TypeSakafo(idTypeSakafo),
    `nom` varchar(100) not null,
    `prix` double precision not null
);
create table Regime(
    `idRegime` integer primary key auto_increment,
    `idUtilisateur` integer references Utilisateur(idUtilisateur),
    `debutRegime` date not null,
    `finRegime` date not null
);
create table TypeEnchainement(
    `idTypeEnchainement` integer primary key auto_increment,
    `nom` varchar(100) unique not null
);
create table Enchainement(
    `idEnchainement` integer primary key auto_increment,
    `idTypeEnchainement` integer references TypeEnchainement(idTypeEnchainement),
    `nom` varchar(100) unique not null,
    `duree` integer not null
);
create table Activite(
    `idActivite` integer primary key auto_increment,
    `nom` varchar(100) 
);
create table ActiviteEnchainement(
    `idActiviteEnchainement` integer primary key auto_increment,
    `idActivite` integer references Activite(idActivite),
    `idEnchainement` integer references Enchainement(idEnchainement)
);
create table RegimeJournalier(
    `idRegimeJournalier` integer primary key auto_increment,
    `idRegime` integer references Regime(idRegime),
    `numeroJour` integer not null,
    `idSakafo` integer references Sakafo(idSakafo),
    `idActivite` integer references Activite(idActivite)
);
create table Carte(
    `idCarte` integer auto_increment primary key,
    `code` varchar(14) not null,
    `montant` double precision not null
);
create table CarteValider(
    `idCarteValider` integer auto_increment primary key,
    `idCarte` integer references Carte(idCarte),
    `dateValidation` date not null,
    `idUtilisateur` integer references Utilisateur(idUtilisateur)
);

create or replace view v_ActiviteEnchainement as (
    select ae.*,a.nom from ActiviteEnchainement ae join Activite a on ae.idActivite = a.idActivite
);