CREATE DATABASE aguirre_cecilia;

USE aguirre_cecilia;

 -- Crear la tabla de usuarios
CREATE TABLE usuarios (
  id_usuario INT(15) AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(50) NOT NULL,
  apellido VARCHAR(50) NOT NULL, 
  usuario VARCHAR(40) NOT NULL,
  email VARCHAR(100) NOT NULL,
  pass VARCHAR(100) NOT NULL,
  perfil_id INT(11) NOT NULL DEFAULT 2,
  baja VARCHAR(2) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
);

-- Insertar un nuevo usuario en la tabla 'usuarios'
INSERT INTO aguirre_cecilia.usuarios
   (nombre, apellido, usuario, email, pass, perfil_id, baja)
VALUES
   ('Cecilia', 'Aguirre', 'Cecibel', 'Cecilia@Cecilia', '$2y$10$Cuha6/ElxwPfgaRjArFxxudUhD9cW5fUll0NGCQJz5O5hlQ8OuuTi', 2, 'NO');

-- Seleccionar todos los registros de la tabla 'usuarios'
SELECT * FROM aguirre_cecilia.usuarios;
