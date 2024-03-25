CREATE TABLE Personne(
   id INT AUTO_INCREMENT,
   sexe VARCHAR(10),
   prenom VARCHAR(50),
   nom VARCHAR(50),
   login VARCHAR(10),
   mdp VARCHAR(100),
   role VARCHAR(10),
   email VARCHAR(50),
   date_inscription DATETIME DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY(id),
   UNIQUE(login),
   UNIQUE(email)
)ENGINE=InnoDB;

CREATE TABLE Agence(
   id INT AUTO_INCREMENT,
   nom VARCHAR(50),
   adresse VARCHAR(50),
   cp int,
   ville VARCHAR(50),
   PRIMARY KEY(id)
)ENGINE=InnoDB;

CREATE TABLE date_(
   date_reservation DATETIME DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY(date_reservation)
)ENGINE=InnoDB;

CREATE TABLE vehicule(
   id INT AUTO_INCREMENT,
   marque VARCHAR(20),
   modele VARCHAR(50),
   prix_journalier DECIMAL(7,2),
   couleur VARCHAR(50),
   poids INT,
   type VARCHAR(50),
   capacite INT,
   etat VARCHAR(50),
   id_agence INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_agence) REFERENCES Agence(id)
)ENGINE=InnoDB;

CREATE TABLE reserver(
   id_user INT,
   id_vehicule INT,
   date_reservation DATETIME,
   PRIMARY KEY(id_user, id_vehicule, date_reservation),
   FOREIGN KEY(id_user) REFERENCES Personne(id),
   FOREIGN KEY(id_vehicule) REFERENCES vehicule(id),
   FOREIGN KEY(date_reservation) REFERENCES date_(date_reservation)
)ENGINE=InnoDB;

CREATE TABLE commenter(
   id_user INT,
   id_vehicule INT,
   comment TEXT,
   date_comment DATETIME DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY(id_user, id_vehicule),
   FOREIGN KEY(id_user) REFERENCES Personne(id),
   FOREIGN KEY(id_vehicule) REFERENCES vehicule(id)
)ENGINE=InnoDB;
