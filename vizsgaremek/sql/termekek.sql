CREATE TABLE termekek (
    azon INT AUTO_INCREMENT PRIMARY KEY,
    nev VARCHAR(100) NOT NULL,
    leiras TEXT,
    kategoria VARCHAR(20),
    ar INT NOT NULL,
    keszlet INT NOT NULL
);
