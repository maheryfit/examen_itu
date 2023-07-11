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
INSERT INTO Aliment (nom, idcategorieregime) VALUES ('Carotte', 2),
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
  montant DECIMAL(8,2) NOT NULL,
  duree INT NOT NULL,
  poids DECIMAL(5,2) NOT NULL,
  FOREIGN KEY (idcategorieregime) REFERENCES Categorieregime(idcategorieregime)
);

INSERT INTO Regime (idcategorieregime, montant, duree, poids)
VALUES (1, 20000.00, 30, 70.50);

INSERT INTO Regime (idcategorieregime, montant, duree, poids)
VALUES (2, 18000.00, 45, 65.20);

INSERT INTO Regime (idcategorieregime, montant, duree, poids)
VALUES (1, 15000.00, 60, 80.00);

INSERT INTO Regime (idcategorieregime, montant, duree, poids)
VALUES (2, 22000.00, 30, 68.75);

INSERT INTO Regime (idcategorieregime, montant, duree, poids)
VALUES (1, 18000.00, 45, 75.25);

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
    montant DECIMAL(10,2) NOT NULL,
    etat INT NOT NULL
);

INSERT INTO Codeportemonnaie (code, montant, etat)
VALUES ('ABC123', 15000.0, 0);

INSERT INTO Codeportemonnaie (code, montant, etat)
VALUES ('DEF456', 18000.0, 0);

INSERT INTO Codeportemonnaie (code, montant, etat)
VALUES ('GHI789', 20000.0, 0);

INSERT INTO Codeportemonnaie (code, montant, etat)
VALUES ('JKL012', 22000.0, 0);

INSERT INTO Codeportemonnaie (code, montant, etat)
VALUES ('MNO345', 25000.0, 0);

INSERT INTO Codeportemonnaie (code, montant, etat)
VALUES ('PQR678', 28000.0, 0);

INSERT INTO Codeportemonnaie (code, montant, etat)
VALUES ('STU901', 15050.0, 0);

INSERT INTO Codeportemonnaie (code, montant, etat)
VALUES ('VWX234', 17500.0, 0);

INSERT INTO Codeportemonnaie (code, montant, etat)
VALUES ('YZA567', 19800.0, 0);

INSERT INTO Codeportemonnaie (code, montant, etat)
VALUES ('BCD890', 22500.0, 0);

INSERT INTO Codeportemonnaie (code, montant, etat)
VALUES ('EFG123', 24000.0, 0);

INSERT INTO Codeportemonnaie (code, montant, etat)
VALUES ('HIJ456', 26500.0, 0);

INSERT INTO Codeportemonnaie (code, montant, etat)
VALUES ('KLM789', 28000.0, 0);

INSERT INTO Codeportemonnaie (code, montant, etat)
VALUES ('NOP012', 30000.0, 0);

INSERT INTO Codeportemonnaie (code, montant, etat)
VALUES ('QRS345', 32000.0, 0);


CREATE TABLE Validationcodeportemonnaie (
    idcodeportemonnaie INT NOT NULL,
    idutilisateur INT NOT NULL,
    datevalidation DATE NOT NULL,
    FOREIGN KEY (idcodeportemonnaie) REFERENCES Codeportemonnaie(idcodeportemonnaie),
    FOREIGN KEY (idutilisateur) REFERENCES Utilisateur(idutilisateur)
);