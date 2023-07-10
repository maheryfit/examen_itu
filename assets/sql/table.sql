-- Création de la table CategorieRegime
CREATE TABLE Categorie_regime (
    id_categorie_regime INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL
);

INSERT INTO Categorie_regime VALUES (DEFAULT, 'Augmenter mon poids');
INSERT INTO Categorie_regime VALUES (DEFAULT, 'Diminuer mon poids');

-- Création de la table Aliment
CREATE TABLE Aliment (
  id_aliment INT PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(50) NOT NULL,
  id_categorie_regime INT,
  FOREIGN KEY (id_categorie_regime) REFERENCES Categorie_regime(id_categorie_regime)
);
INSERT INTO Aliment (nom, id_categorie_regime) VALUES
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
  idActivite INT PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(50) NOT NULL,
  id_categorie_regime INT,
  FOREIGN KEY (id_categorie_regime) REFERENCES Categorie_regime(id_categorie_regime)
);

INSERT INTO Activite (nom, id_categorie_regime) VALUES
                                                  ('Course à pied', 2),
                                                  ('Natation', 2),
                                                  ('Cyclisme', 2),
                                                  ('Haltérophilie', 1),
                                                  ('Yoga', 1),
                                                  ('Zumba', 1),
                                                  ('Escalade', 2);

CREATE TABLE Genre(
    id_genre INT PRIMARY KEY AUTO_INCREMENT,
    nom_genre CHARACTER(15) NOT NULL
);

INSERT INTO Genre(nom_genre) VALUES('Féminin');
INSERT INTO Genre(nom_genre) VALUES('Masculin');


-- Création de la table Utilisateur
CREATE TABLE Utilisateur (
  idUtilisateur INT PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(50) NOT NULL,
  prenom VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL,
  date_naissance DATE NOT NULL ,
  date_enregistrement DATETIME NOT NULL,
  id_genre INT NOT NULL,
  mot_de_passe VARCHAR(100) NOT NULL,
  is_admin INT NOT NULL,
  FOREIGN KEY (id_genre) REFERENCES Genre(id_genre)
);

-- Création de la table Profil
CREATE TABLE Profil (
  id_profil INT PRIMARY KEY AUTO_INCREMENT,
  id_utilisateur INT,
  poids DECIMAL(5,2) NOT NULL,
  taille DECIMAL(3,2) NOT NULL,
  date_profil DATE NOT NULL,
  FOREIGN KEY (id_utilisateur) REFERENCES Utilisateur(id_utilisateur)
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
  estPaye INT NOT NULL,
  FOREIGN KEY (idRegime) REFERENCES Regime(idRegime),
  FOREIGN KEY (idProfil) REFERENCES Profil(idProfil)
);
