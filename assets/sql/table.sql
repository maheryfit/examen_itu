-- Création de la table CategorieRegime
CREATE TABLE Categorieregime (
    idcategorieregime INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL
);

INSERT INTO Categorieregime VALUES (DEFAULT, 'Augmenter mon poids');
INSERT INTO Categorieregime VALUES (DEFAULT, 'Diminuer mon poids');

-- Création de la table Aliment
CREATE TABLE Aliment (
  idaliment INT PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(50) NOT NULL,
  idcategorieregime INT,
  FOREIGN KEY (idcategorieregime) REFERENCES Categorieregime(idcategorieregime)
);
INSERT INTO Aliment (nom, idcategorieregime) VALUES
                                                        ('Carotte', 2),
                                                        ('Pomme', 2),
                                                        ('Riz', 2),
                                                        ('Brocoli', 2),
                                                        ('Quinoa', 2),
                                                        ('Courgette', 2),
                                                        ('Banane', 1),
                                                        ('Amande', 1),
                                                        ('Pois chiche', 1);


-- Création de la table Activite
CREATE TABLE Activite (
  idactivite INT PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(50) NOT NULL,
  idcategorieregime INT,
  FOREIGN KEY (idcategorieregime) REFERENCES Categorieregime(idcategorieregime)
);

INSERT INTO Activite (nom, idcategorieregime) VALUES
                                                  ('Course à pied', 2),
                                                  ('Natation', 2),
                                                  ('Cyclisme', 2),
                                                  ('Haltérophilie', 1),
                                                  ('Yoga', 1),
                                                  ('Zumba', 1),
                                                  ('Escalade', 2);

CREATE TABLE Genre(
    idgenre INT PRIMARY KEY AUTO_INCREMENT,
    nomgenre CHARACTER(15) NOT NULL
);

INSERT INTO Genre(nomgenre) VALUES('Féminin');
INSERT INTO Genre(nomgenre) VALUES('Masculin');


-- Création de la table Utilisateur
CREATE TABLE Utilisateur (
  idutilisateur INT PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(50) NOT NULL,
  prenom VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL,
  datenaissance DATE NOT NULL ,
  dateenregistrement DATETIME NOT NULL,
  idgenre INT NOT NULL,
  motdepasse VARCHAR(100) NOT NULL,
  isadmin INT NOT NULL,
  FOREIGN KEY (idgenre) REFERENCES Genre(idgenre)
);

-- Création de la table Profil
CREATE TABLE Profil (
  idprofil INT PRIMARY KEY AUTO_INCREMENT,
  idutilisateur INT,
  poids DECIMAL(5,2) NOT NULL,
  taille DECIMAL(3,2) NOT NULL,
  dateprofil DATE NOT NULL,
  FOREIGN KEY (idutilisateur) REFERENCES Utilisateur(idutilisateur)
);

-- Création de la table Regime
CREATE TABLE Regime (
  idregime INT PRIMARY KEY AUTO_INCREMENT,
  idcategorieregime INT,
  montant DECIMAL(6,2) NOT NULL,
  duree INT NOT NULL,
  poids DECIMAL(5,2) NOT NULL,
  FOREIGN KEY (idcategorieregime) REFERENCES Categorieregime(idcategorieregime)
);

-- Création de la table RegimeAliment
CREATE TABLE Regimealiment (
  idregimealiment INT PRIMARY KEY AUTO_INCREMENT,
  idaliment INT,
  idregime INT,
  FOREIGN KEY (idaliment) REFERENCES Aliment(idaliment),
  FOREIGN KEY (idregime) REFERENCES Regime(idregime)
);

-- Création de la table RegimeActivité
CREATE TABLE Regimeactivite (
  idregimeactivite INT PRIMARY KEY AUTO_INCREMENT,
  idactivite INT,
  idregime INT,
  FOREIGN KEY (idactivite) REFERENCES Activite(idactivite),
  FOREIGN KEY (idregime) REFERENCES Regime(idregime)
);

-- Création de la table Suggestion
CREATE TABLE Suggestion (
  idsuggestion INT PRIMARY KEY AUTO_INCREMENT,
  idregime INT,
  idprofil INT,
  estpaye INT NOT NULL,
  FOREIGN KEY (idregime) REFERENCES Regime(idregime),
  FOREIGN KEY (idprofil) REFERENCES Profil(idprofil)
);

CREATE TABLE Codeportemonnaie (
    idcodeportemonnaie INT PRIMARY KEY AUTO_INCREMENT,
    code VARCHAR(10) NOT NULL UNIQUE,
    montant DECIMAL(6,2) NOT NULL,
    etat INT NOT NULL
);


CREATE TABLE Validationcodeportemonnaie (
    idcodeportemonnaie INT NOT NULL,
    idutilisateur INT NOT NULL,
    datevalidation DATE NOT NULL,
    FOREIGN KEY (idcodeportemonnaie) REFERENCES Codeportemonnaie(idcodeportemonnaie),
    FOREIGN KEY (idutilisateur) REFERENCES Utilisateur(idutilisateur)
);