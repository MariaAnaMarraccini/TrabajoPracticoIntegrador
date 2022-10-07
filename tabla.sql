CREATE TABLE empleados (
  id int unsigned NOT NULL AUTO_INCREMENT,
  id_usuario_ult_mod int(10) NOT NULL,
  nombre varchar(200) NOT NULL,
  apellido varchar(200) NOT NULL,
  dni bigint NOT NULL,
  fecha_ingreso DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  CONSTRAINT fk_empleado_usuario FOREIGN KEY (id_usuario_ult_mod) REFERENCES usuarios(id)
) ENGINE=InnoDB
