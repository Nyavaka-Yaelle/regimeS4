drop database RegimeS4;
create database RegimeS4;
use RegimeS4
create table Utilisateur(
    `idUtilisateur` int primary key auto_increment,
    `nom` varchar(100) not null,
    `email` varchar(100) not null unique,
    `motDePasse` varchar(100) not null,
    `identification` int not null
);
create table Profiles{
    `idProfiles` int primary key auto_increment,
    `idUtilisateur` int references Utilisateur(idUtilisateur),
    `genre` enum('1','0'), --1 homme  --0 femme
    `taille` float,
    `poids` float,
    `dateNaissance` date
};
create table TypeObjectif{
    `idTypeObjectif` integer primary key auto_increment,
    `nom` varchar(100)
};
create table Objectif{
    `idObjectif` integer primary key auto_increment,
    `idTypeObjectif` integer references TypeObjectif(idTypeObjectif),
    `nom` varchar(100)
};
create table ObjectifUtilisateur{
    `idObjectifUtilisateur` integer primary key auto_increment,
    `idUtilisateur` integer references Utilisateur(idUtilisateur),
    `idObjectif` integer references Objectif(idObjectif)
};
create table TypeSakafo{
    `idTypeSakafo` integer primary key auto_increment,
    `nom` varchar(100)
};
create table Sakafo{
    `idSakafo` integer primary key auto_increment,
    `idTypeSakafo` integer references TypeSakafo(idTypeSakafo)
    `nom` varchar(100),
    `prix` float
};
create table Regime{
    `idRegime` integer primary key auto_increment,
    `idUtilisateur` integer references Utilisateur(idUtilisateur),
    `debutRegime` date,
    `finRegime` date
};
create table TypeEnchainement{
    `idTypeEnchainement` integer primary key auto_increment,
    `nom` varchar(100)
};
create table Enchainement{
    `idEnchainement` integer primary key auto_increment,
    `idTypeEnchainement` integer references TypeEnchainement(idTypeEnchainement),
    `nom` varchar(100),
    `duree` integer
};
--duree minute
create table Activite{
    `idActivite` integer,
    `idEnchainement` integer references Enchainement(idEnchainement),
    primary key(idActivite,idEnchainement)
};
create table RegimeJournalier{
    `idRegime` integer,
    `numeroJour` integer,
    `idSakafo` integer references Sakafo(idSakafo),
    `idActivite` integer references Activite(idActivite),
    primary key(idRegime)
};
create table Carte{
    `idCarte` integer auto_increment primary key,
    `code` varchar(14),
    `montant` float
};
create table CarteValider{
    `idCarte` integer references Carte(idCarte),
    `dateValidation` date,
    `idUtilisateur` integer references Utilisateur(idUtilisateur)
};