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
create table Profiles{
    `idProfiles` int primary key auto_increment,
    `idUtilisateur` int references Utilisateur(idUtilisateur) unique,
    `genre` enum('1','0'), --1 homme  --0 femme
    `taille` double precision not null,
    `poids` double precision not null,
    `dateNaissance` date not null
};
create table TypeObjectif{
    `idTypeObjectif` integer primary key auto_increment,
    `nom` varchar(100) not null unique
};
create table Objectif{
    `idObjectif` integer primary key auto_increment,
    `idTypeObjectif` integer references TypeObjectif(idTypeObjectif),
    `nom` varchar(100) not null unique
};
create table ObjectifUtilisateur{
    `idObjectifUtilisateur` integer primary key auto_increment,
    `idUtilisateur` integer references Utilisateur(idUtilisateur),
    `idObjectif` integer references Objectif(idObjectif)
};
create table TypeSakafo{
    `idTypeSakafo` integer primary key auto_increment,
    `nom` varchar(100) not null
};
create table Sakafo{
    `idSakafo` integer primary key auto_increment,
    `idTypeSakafo` integer references TypeSakafo(idTypeSakafo)
    `nom` varchar(100) not null,
    `prix` double precision not null
};
create table Regime{
    `idRegime` integer primary key auto_increment,
    `idUtilisateur` integer references Utilisateur(idUtilisateur),
    `debutRegime` date not null,
    `finRegime` date not null
};
create table TypeEnchainement{
    `idTypeEnchainement` integer primary key auto_increment,
    `nom` varchar(100) unique not null
};
create table Enchainement{
    `idEnchainement` integer primary key auto_increment,
    `idTypeEnchainement` integer references TypeEnchainement(idTypeEnchainement),
    `nom` varchar(100) unique not null,
    `duree` integer not null
};
--duree minute
create table Activite{
    `idActivite` integer primary key auto_increment,
    `idEnchainement` integer references Enchainement(idEnchainement)
};
create table RegimeJournalier{
    `idRegime` integer primary key auto_increment,
    `numeroJour` integer,
    `idSakafo` integer references Sakafo(idSakafo),
    `idActivite` integer references Activite(idActivite)
};
create table Carte{
    `idCarte` integer auto_increment primary key,
    `code` varchar(14),
    `montant` double precision not null
};
create table CarteValider{
    `idCarteValider` integer auto_increment primary key,
    `idCarte` integer references Carte(idCarte),
    `dateValidation` date,
    `idUtilisateur` integer references Utilisateur(idUtilisateur)
};