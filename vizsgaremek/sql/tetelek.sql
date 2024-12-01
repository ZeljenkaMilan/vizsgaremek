CREATE TABLE tetelek (
    azon INT AUTO_INCREMENT PRIMARY KEY,
    rendeles_azon INT NOT NULL,
    termek_azon INT NOT NULL,
    mennyiseg INT NOT NULL,
    FOREIGN KEY (rendeles_azon) REFERENCES rendelesek(azon),
    FOREIGN KEY (termek_azon) REFERENCES termekek(azon)
);
