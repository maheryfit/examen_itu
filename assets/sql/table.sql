-- Création de la table CategorieRegime
CREATE TABLE CategorieRegime (
  idCategorieRegime INT PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(50) NOT NULL
);

INSERT INTO CategorieRegime VALUES (DEFAULT, 'Augmenter mon poids');
INSERT INTO CategorieRegime VALUES (DEFAULT, 'Diminuer mon poids');

-- Création de la table Aliment
CREATE TABLE Aliment (
  idAliment INT PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(50) NOT NULL,
  idCategorieRegime INT,
  FOREIGN KEY (idCategorieRegime) REFERENCES CategorieRegime(idCategorieRegime)
);
INSERT INTO Aliment (idAliment, nom, idCategorieRegime) VALUES
                                                            (DEFAULT, 'Carotte', 2),
                                                            (DEFAULT, 'Pomme', 2),
                                                            (DEFAULT, 'Riz', 2),
                                                            (DEFAULT, 'Brocoli', 2),
                                                            (DEFAULT, 'Quinoa', 2),
                                                            (DEFAULT, 'Courgette', 2),
                                                            (DEFAULT, 'Banane', 1),
                                                            (DEFAULT, 'Amande', 1),
                                                            (DEFAULT, 'Pois chiche', 1);


-- Création de la table Activite
CREATE TABLE Activite (
  idActivite INT PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(50) NOT NULL,
  idCategorieRegime INT,
  FOREIGN KEY (idCategorieRegime) REFERENCES CategorieRegime(idCategorieRegime)
);

INSERT INTO Activite (nom, idCategorieRegime) VALUES
                                                  ('Course à pied', 2),
                                                  ('Natation', 2),
                                                  ('Cyclisme', 2),
                                                  ('Haltérophilie', 1),
                                                  ('Yoga', 1),
                                                  ('Zumba', 1),
                                                  ('Escalade', 2);

CREATE TABLE Genre(
    idGenre INT PRIMARY KEY AUTO_INCREMENT,
    nomGenre CHARACTER(15) NOT NULL
);

INSERT INTO Genre(nomGenre) VALUES('Féminin');
INSERT INTO Genre(nomGenre) VALUES('Masculin');


-- Création de la table Utilisateur
CREATE TABLE Utilisateur (
  idUtilisateur INT PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(50) NOT NULL,
  prenom VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL,
  dateNaissance DATE NOT NULL ,
  dateEnregistrement DATETIME NOT NULL,
  idGenre INT NOT NULL,
  motDePasse VARCHAR(100) NOT NULL,
  FOREIGN KEY (idGenre) REFERENCES Genre(idGenre)
);

-- Création de la table Profil
CREATE TABLE Profil (
  idProfil INT PRIMARY KEY AUTO_INCREMENT,
  idUtilisateur INT,
  poids DECIMAL(5,2) NOT NULL,
  taille DECIMAL(3,2) NOT NULL,
  FOREIGN KEY (idUtilisateur) REFERENCES Utilisateur(idUtilisateur)
);

-- Création de la table Regime
CREATE TABLE Regime (
  idRegime INT PRIMARY KEY AUTO_INCREMENT,
  idCategorieRegime INT,
  montant DECIMAL(6,2) NOT NULL,
  duree INT NOT NULL,
  poids DECIMAL(5,2) NOT NULL,
  FOREIGN KEY (idCategorieRegime) REFERENCES CategorieRegime(idCategorieRegime)
);

-- Création de la table RegimeAliment
CREATE TABLE RegimeAliment (
  idRegimeAliment INT PRIMARY KEY AUTO_INCREMENT,
  idAliment INT,
  idRegime INT,
  FOREIGN KEY (idAliment) REFERENCES Aliment(idAliment),
  FOREIGN KEY (idRegime) REFERENCES Regime(idRegime)
);

-- Création de la table RegimeActivité
CREATE TABLE RegimeActivite (
  idRegimeActivite INT PRIMARY KEY AUTO_INCREMENT,
  idActivite INT,
  idRegime INT,
  FOREIGN KEY (idActivite) REFERENCES Activite(idActivite),
  FOREIGN KEY (idRegime) REFERENCES Regime(idRegime)
);

-- Création de la table Suggestion
CREATE TABLE Suggestion (
  idSuggestion INT PRIMARY KEY AUTO_INCREMENT,
  idRegime INT,
  idProfil INT,
  estPaye BOOLEAN NOT NULL,
  FOREIGN KEY (idRegime) REFERENCES Regime(idRegime),
  FOREIGN KEY (idProfil) REFERENCES Profil(idProfil)
);
