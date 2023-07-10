-- Création de la table CategorieRegime
CREATE TABLE CategorieRegime (
  idCategorieRegime INT PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(50) NOT NULL
);

-- Création de la table Aliment
CREATE TABLE Aliment (
  idAliment INT PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(50) NOT NULL,
  idCategorieRegime INT,
  FOREIGN KEY (idCategorieRegime) REFERENCES CategorieRegime(idCategorieRegime)
);

-- Création de la table Activite
CREATE TABLE Activite (
  idActivite INT PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(50) NOT NULL,
  idCategorieRegime INT,
  FOREIGN KEY (idCategorieRegime) REFERENCES CategorieRegime(idCategorieRegime)
);

-- Création de la table Utilisateur
CREATE TABLE Utilisateur (
  idUtilisateur INT PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(50) NOT NULL,
  prenom VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL,
  date_naissance DATE NOT NULL,
  date_enregistrement DATETIME NOT NULL,
  mot_de_passe VARCHAR(100) NOT NULL
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
