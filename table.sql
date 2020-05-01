# Creation de la base de données
CREATE DATABASE test;
USE test;

# Tables

CREATE TABLE membre(
	Mail varchar (150),
    primary key(Mail),
    Mot_de_pass VARCHAR(80) NOT NULL,
    Prenom VARCHAR(25) NOT NULL,
    Nom VARCHAR(25) NOT NULL, 
    Telephone INT(10),
    Annee_naissance int(4)
   
);
CREATE TABLE serie(
    Nom VARCHAR(50) not null,
    PRIMARY KEY(Nom),
    Role_principal varchar(50) not null,
    Episode_total  int(3) not null,
    Anne_sortie  int(4),
    Ref_mel  varchar(150),
    realisateur varchar(100)
);
CREATE TABLE episode(
	id_e INT(11) PRIMARY KEY AUTO_INCREMENT,
	title varchar(50) not null,
	nb_episode int(3),
	src varchar (1000),
      	FOREIGN KEY(title) REFERENCES serie(Nom)		
);

CREATE TABLE track(
	id_t INT(11) PRIMARY KEY AUTO_INCREMENT,
	nom_s varchar(50) not null,
	mel varchar(150),
    nb int (3),
FOREIGN KEY(nom_s) REFERENCES serie(Nom),
FOREIGN KEY(mel) REFERENCES membre(Mail)
		
);