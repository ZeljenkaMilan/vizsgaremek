CREATE TABLE termekek (
    azon INT AUTO_INCREMENT PRIMARY KEY,
    nev VARCHAR(100) NOT NULL,
    leiras TEXT,
    kategoria VARCHAR(20),
    ar INT NOT NULL,
    keszlet INT NOT NULL
);

CREATE TABLE vasarlok (
    azon INT AUTO_INCREMENT PRIMARY KEY,
    nev VARCHAR(30) NOT NULL,
    email VARCHAR(25) NOT NULL,
    telefon VARCHAR(15),
    cim VARCHAR(50)
);

CREATE TABLE rendelesek (
    azon INT AUTO_INCREMENT PRIMARY KEY,
    vasarlo_azon INT NOT NULL,
    datum DATE NOT NULL,
    osszesen INT NOT NULL,
    FOREIGN KEY (vasarlo_azon) REFERENCES vasarlok(azon)
);

CREATE TABLE tetelek (
    azon INT AUTO_INCREMENT PRIMARY KEY,
    rendeles_azon INT NOT NULL,
    termek_azon INT NOT NULL,
    mennyiseg INT NOT NULL,
    FOREIGN KEY (rendeles_azon) REFERENCES rendelesek(azon),
    FOREIGN KEY (termek_azon) REFERENCES termekek(azon)
);

