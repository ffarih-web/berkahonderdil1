-- Database: db1_berkahonderdil

CREATE DATABASE IF NOT EXISTS db1_berkahonderdil;
USE db1_berkahonderdil;

-- --------------------------------------------------------
-- Tabel untuk data model mobil
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS model (
    id_mobil INT AUTO_INCREMENT PRIMARY KEY,
    model    VARCHAR(100) NOT NULL
);

-- --------------------------------------------------------
-- Tabel untuk data sparepart
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS sparepart (
    id_sparepart INT AUTO_INCREMENT PRIMARY KEY,
    id_mobil     INT NOT NULL,
    nama         VARCHAR(100) NOT NULL,
    stock        INT NOT NULL,
    grade        ENUM('A','B','C') NOT NULL,
    harga        DECIMAL(15,2) NOT NULL,
    deskripsi    TEXT,
    FOREIGN KEY (id_mobil) REFERENCES model(id_mobil)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

-- --------------------------------------------------------
-- Contoh data awal
-- --------------------------------------------------------
INSERT INTO model (model) VALUES
('Toyota Avanza'),
('Honda Jazz'),
('Suzuki Ertiga');

INSERT INTO sparepart (id_mobil, nama, stock, grade, harga, deskripsi) VALUES
(1, 'Kampas Rem Depan', 20, 'A', 350000, 'Kampas rem depan original untuk Toyota Avanza'),
(2, 'Filter Oli', 15, 'B', 75000, 'Filter oli standar Honda Jazz'),
(3, 'Aki GS 45AH', 10, 'A', 950000, 'Aki GS Astra untuk Suzuki Ertiga');
