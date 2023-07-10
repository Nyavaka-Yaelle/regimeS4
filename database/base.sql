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
insert into TypeObjectif (nom) values
    ('Perdre du poids'),
    ('Gagner du poids'),
    ('Se muscler');

create table Objectif(
    `idObjectif` integer primary key auto_increment,
    `idTypeObjectif` integer references TypeObjectif(idTypeObjectif),
    `nom` varchar(100) not null unique
);

insert into Objectif(idTypeObjectif,nom) values
    (1,'Perte de poids globale'),
    (1,'Ventre et taille'),
    (1,'Cuisses et fessiers'),
    (1,'Bras et epaules'),
    (1,'Dos et posture'),
    (1,'Jambes et mollets'),
    (1,'Haut du corps et poitrine');

insert into Objectif(idTypeObjectif,nom) values
    (2,'Gain de poids globale'),
    (2,'Ventre et taille+'),
    (2,'Cuisses et fessiers+'),
    (2,'Bras et epaules+'),
    (2,'Dos et posture+'),
    (2,'Jambes et mollets+'),
    (2,'Haut du corps et poitrine+');

insert into Objectif(idTypeObjectif,nom) values
(3,'Musculation globale'),
(3,'Ventre et taille-'),
(3,'Cuisses et fessiers-'),
(3,'Bras et epaules-'),
(3,'Dos et posture-'),
(3,'Jambes et mollets-'),
(3,'Haut du corps et poitrine-');

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
insert into TypeSakafo(nom,idTypeObjectif) values
('Repas riche en légumes',1),
('Repas riche en calories',2),
('Repas riche en protéines',3);

create table Sakafo(
    `idSakafo` integer primary key auto_increment,
    `idTypeSakafo` integer references TypeSakafo(idTypeSakafo),
    `nom` varchar(100) not null,
    `prix` double precision not null
);

insert into Sakafo(idTypeSakafo,nom,prix) values
(1,'Salade de poulet grillé',6000),
(1,'Saumon poché avec légumes vapeur',10000),
(1,'Wrap aux légumes',4000),
(1,'Omelette aux légumes',3000),
(1,'Salade de quinoa aux légumes',5000);

insert into Sakafo(idTypeSakafo,nom,prix) values
(2,'Smoothie protéiné',3000),
(2,'Avocat sur du pain complet',4000),
(2,'Pâtes avec sauce au fromage',10000),
(2,'Beurre de cacahuète sur des crackers',5000),
(2,'Poisson grillé avec quinoa',6000);

insert into Sakafo(idTypeSakafo,nom,prix) values
(3,'Poulet grillé avec patates douces',10000),
(3,'Bowl de quinoa et légumes avec tofu',9000),
(3,'Steak de boeuf avec riz complet',5000),
(3,'Omelette avec avocat',3000),
(3,'Smoothie protéiné aux fruits et aux noix',4000);

create table TypeEnchainement(
    `idTypeEnchainement` integer primary key auto_increment,
    `nom` varchar(100) unique not null,
    `idTypeObjectif` integer references TypeObjectif(idTypeObjectif)
);
insert into TypeEnchainement(nom, idTypeObjectif) values
    ('Perdre du poids',1),
    ('Gagner du poids',2),
    ('Se muscler',3);

create table Enchainement(
    `idEnchainement` integer primary key auto_increment,
    `idTypeEnchainement` integer references TypeEnchainement(idTypeEnchainement),
    `nom` varchar(100) unique not null,
    `duree` integer not null
);
insert into Enchainement(idTypeEnchainement,nom,duree) values
(1,'Marche rapide',45),
(1,'Yoga',30),
(1,'Aérobic',30),
(1,'Vélo',40);

insert into Enchainement(idTypeEnchainement,nom,duree) values
(2,'Gainage',20),
(2,'Entraînement avec poids libres',45),
(2,'Soulevés de terre',10),
(2,'Burpees',10);

insert into Enchainement(idTypeEnchainement,nom,duree) values
(3,'Soulevé de terre ',45),
(3,'Squats',30),
(3,'Développé couché',20),
(3,'Rowing avec barre',25);

create table Activite(
    `idActivite` integer primary key auto_increment,
    `nom` varchar(100) 
);
insert into Activite(nom) values
('Activite en circuit'),
('Activite de resistance'),
('Activite de renforcement');

create table ActiviteEnchainement(
    `idActiviteEnchainement` integer primary key auto_increment,
    `idActivite` integer references Activite(idActivite),
    `idEnchainement` integer references Enchainement(idEnchainement)
);
insert into ActiviteEnchainement(idActivite,idEnchainement) values
(1,1),
(1,2),
(1,3),
(1,4),
(2,5),
(2,6),
(2,7),
(2,8),
(3,9),
(3,10),
(3,11),
(3,12);

create table Regime(
    `idRegime` integer primary key auto_increment,
    `idUtilisateur` integer references Utilisateur(idUtilisateur),
    `debutRegime` date not null,
    `finRegime` date not null
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
    `montant` double not null
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
create or replace view v_Sakafo as (
    select s.*,ts.nom nomTypeSakafo, ts.idTypeObjectif from sakafo s join TypeSakafo ts on s.idTypeSakafo = ts.idTypeSakafo
);
create or replace view v_TypeSakafo as (
    select ts.*,ob.nom nomTypeObjectif from TypeSakafo ts join TypeObjectif ob on ts.idTypeObjectif = ob.idTypeObjectif
);