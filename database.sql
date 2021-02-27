CREATE DATABASE IF NOT EXISTS viajes;
USE viajes;

CREATE TABLE IF NOT EXISTS viajes(
    id      int(255) auto_increment not null,
    fecha   datetime not null,
    destino varchar(255) not null,
    tipo    varchar(255) not null,
    numero_guia varchar(255) not null,
    created_at datetime,
    updated_at datetime,
    CONSTRAINT pk_viajes PRIMARY KEY(id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS gastos(
    id          int(255) auto_increment not null,
    viaje_id    int(255),
    cantidad    int(255) not null,
    tipo        varchar(255) not null,
    CONSTRAINT pk_gastos PRIMARY KEY(id),
    CONSTRAINT fk_gastos_viajes FOREIGN KEY(viaje_id) REFERENCES viajes(id)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS depositos(
    id          int(255) auto_increment not null,
    fecha       datetime not null,
    cantidad    int(255) not null,
    CONSTRAINT pk_depositos PRIMARY KEY(id)
)ENGINE=InnoDB;