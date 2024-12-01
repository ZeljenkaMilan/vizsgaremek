CREATE TABLE rendelesek (
    azon INT AUTO_INCREMENT PRIMARY KEY,
    vasarlo_azon INT NOT NULL,
    datum DATE NOT NULL,
    osszesen INT NOT NULL,
    FOREIGN KEY (vasarlo_azon) REFERENCES vasarlok(azon)
);
