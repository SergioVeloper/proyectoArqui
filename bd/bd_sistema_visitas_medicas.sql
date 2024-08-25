-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 25, 2024 at 05:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_sistema_visitas_medicas`
--

-- --------------------------------------------------------

--
-- Table structure for table `entradaSalida`
--

CREATE TABLE `entradaSalida` (
  `id` int(11) NOT NULL,
  `id_visitador` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `entradaSalida`
--

INSERT INTO `entradaSalida` (`id`, `id_visitador`, `fecha`) VALUES
(1, 1, '2024-08-20'),
(2, 2, '2024-08-20'),
(3, 2, '2024-08-21'),
(4, 3, '2024-08-21'),
(5, 2, '2024-08-25');

-- --------------------------------------------------------

--
-- Table structure for table `especialidad`
--

CREATE TABLE `especialidad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `especialidad`
--

INSERT INTO `especialidad` (`id`, `nombre`) VALUES
(1, 'Odontología'),
(2, 'Cardiología'),
(3, 'Pediatría'),
(4, 'Dermatología'),
(5, 'Ginecología'),
(6, 'Neurología'),
(7, 'Psiquiatría'),
(8, 'Traumatología'),
(9, 'Oftalmología'),
(10, 'Oncología');

-- --------------------------------------------------------

--
-- Table structure for table `medico`
--

CREATE TABLE `medico` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `especialidad_id` int(11) NOT NULL,
  `subespecialidad_id` int(11) NOT NULL,
  `dir_consultorio` varchar(200) NOT NULL,
  `Zona` varchar(100) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medico`
--

INSERT INTO `medico` (`id`, `nombres`, `apellidos`, `especialidad_id`, `subespecialidad_id`, `dir_consultorio`, `Zona`, `telefono`, `email`, `fecha_nacimiento`) VALUES
(44, 'Carlos', 'Pérez', 3, 5, 'Calle 123, Consultorio 1', 'Mercado Campesino', '123456789', 'carlos.perez@hospital.com', '1985-08-06'),
(45, 'Laura', 'Gómez', 6, 8, 'Avenida 45, Consultorio 3', 'Centro', '987654321', 'laura.gomez@medicos.com', '1975-10-22'),
(46, 'Juan', 'Martínez', 1, 2, 'Calle 987, Consultorio 5', 'Parque Bolívar', '123456', 'juan.martinez@medicos.com', '1990-03-18'),
(47, 'Ana', 'López', 6, 8, 'Calle 456, Consultorio 7', 'Parque Bolívar', '555666777', 'prueba3@email.com', '1985-12-19'),
(49, 'Voluptates omnis ut ', 'Sed enim ratione occ', 3, 5, 'Veritatis assumenda ', 'Centro', '75', 'tygyjavux@mailinator.com', '1991-11-08'),
(50, 'Dolores qui consequa', 'Quisquam magnam face', 9, 13, 'Voluptatem accusamu', 'Centro', '26', 'limagevuko@mailinator.com', '2015-02-25'),
(51, 'In dolor in voluptas', 'Veniam nulla sed qu', 5, 7, 'Aliquid debitis mole', 'Centro', '51', 'sazonoq@mailinator.com', '2001-07-24'),
(52, 'Eduardo', 'Magno', 10, 11, 'Barrio Petrolero #25', 'Centro', '34839', 'em@gmail.com', '1980-12-03'),
(53, 'Juana', 'Del arco', 8, 10, 'av americas', 'Parque Bolivar', '293820', 'juana@gmail.com', '1960-04-05'),
(54, 'Carlos', 'Ramírez', 8, 18, 'Calle 1, Edificio A', 'Mercado Campesino', '555-1234', 'carlos.ramirez@example.com', '1980-05-10'),
(55, 'Ana', 'Pérez', 8, 10, 'Calle 2, Edificio B', 'Parque Bolívar', '555-5678', 'ana.perez@example.com', '1985-06-15'),
(56, 'Miguel', 'López', 8, 19, 'Calle 3, Edificio C', 'Centro', '555-9101', 'miguel.lopez@example.com', '1978-07-20'),
(57, 'Laura', 'González', 8, 18, 'Calle 4, Edificio D', 'Barrio Petrolero', '555-1122', 'laura.gonzalez@example.com', '1990-08-25'),
(58, 'Sofía', 'Martínez', 8, 10, 'Calle 5, Edificio E', 'Mercado Morro', '555-3344', 'sofia.martinez@example.com', '1982-09-30'),
(59, 'Pedro', 'Díaz', 8, 19, 'Calle 6, Edificio F', 'Mercado Campesino', '555-5566', 'pedro.diaz@example.com', '1975-10-05'),
(60, 'Lucía', 'Morales', 8, 18, 'Calle 7, Edificio G', 'Parque Bolívar', '555-7788', 'lucia.morales@example.com', '1987-11-10'),
(61, 'Jorge', 'Fernández', 8, 10, 'Calle 8, Edificio H', 'Centro', '555-9900', 'jorge.fernandez@example.com', '1983-12-15'),
(62, 'Marta', 'Gómez', 8, 19, 'Calle 9, Edificio I', 'Barrio Petrolero', '555-2233', 'marta.gomez@example.com', '1979-01-20'),
(63, 'David', 'Vázquez', 8, 18, 'Calle 10, Edificio J', 'Mercado Morro', '555-4455', 'david.vazquez@example.com', '1988-02-25'),
(64, 'Elena', 'Jiménez', 8, 10, 'Calle 11, Edificio K', 'Mercado Campesino', '555-6677', 'elena.jimenez@example.com', '1984-03-30'),
(65, 'Fernando', 'Castro', 8, 19, 'Calle 12, Edificio L', 'Parque Bolívar', '555-8899', 'fernando.castro@example.com', '1976-04-05'),
(66, 'Carmen', 'Ortega', 8, 18, 'Calle 13, Edificio M', 'Centro', '555-1235', 'carmen.ortega@example.com', '1981-05-10'),
(67, 'Luis', 'Sánchez', 8, 10, 'Calle 14, Edificio N', 'Barrio Petrolero', '555-5679', 'luis.sanchez@example.com', '1986-06-15'),
(68, 'Paula', 'Rodríguez', 8, 19, 'Calle 15, Edificio O', 'Mercado Morro', '555-9102', 'paula.rodriguez@example.com', '1989-07-20'),
(69, 'Andrés', 'Hernández', 8, 18, 'Calle 16, Edificio P', 'Mercado Campesino', '555-1123', 'andres.hernandez@example.com', '1977-08-25'),
(70, 'Carolina', 'Iglesias', 8, 10, 'Calle 17, Edificio Q', 'Parque Bolívar', '555-3345', 'carolina.iglesias@example.com', '1980-09-30'),
(71, 'Juan', 'Navarro', 8, 19, 'Calle 18, Edificio R', 'Centro', '555-5567', 'juan.navarro@example.com', '1985-10-05'),
(72, 'Isabel', 'Ramos', 8, 18, 'Calle 19, Edificio S', 'Barrio Petrolero', '555-7789', 'isabel.ramos@example.com', '1978-11-10'),
(73, 'Ricardo', 'Torres', 8, 10, 'Calle 20, Edificio T', 'Mercado Morro', '555-9901', 'ricardo.torres@example.com', '1983-12-15'),
(74, 'María', 'Silva', 8, 19, 'Calle 21, Edificio U', 'Mercado Campesino', '555-2234', 'maria.silva@example.com', '1981-01-20'),
(75, 'Héctor', 'Muñoz', 8, 18, 'Calle 22, Edificio V', 'Parque Bolívar', '555-4456', 'hector.munoz@example.com', '1987-02-25'),
(76, 'Teresa', 'Romero', 8, 10, 'Calle 23, Edificio W', 'Centro', '555-6678', 'teresa.romero@example.com', '1984-03-30'),
(77, 'Emilio', 'Vega', 8, 19, 'Calle 24, Edificio X', 'Barrio Petrolero', '555-8900', 'emilio.vega@example.com', '1979-04-05'),
(78, 'Natalia', 'Pascual', 8, 18, 'Calle 25, Edificio Y', 'Mercado Morro', '555-1236', 'natalia.pascual@example.com', '1982-05-10'),
(79, 'Alberto', 'Santos', 8, 10, 'Calle 26, Edificio Z', 'Mercado Campesino', '555-5680', 'alberto.santos@example.com', '1985-06-15'),
(80, 'Patricia', 'Delgado', 8, 19, 'Calle 27, Edificio AA', 'Parque Bolívar', '555-9103', 'patricia.delgado@example.com', '1978-07-20'),
(81, 'Óscar', 'Vidal', 8, 18, 'Calle 28, Edificio AB', 'Centro', '555-1124', 'oscar.vidal@example.com', '1983-08-25'),
(82, 'Lorena', 'Crespo', 8, 10, 'Calle 29, Edificio AC', 'Barrio Petrolero', '555-3346', 'lorena.crespo@example.com', '1986-09-30'),
(83, 'Gabriel', 'Fuentes', 8, 19, 'Calle 30, Edificio AD', 'Mercado Morro', '555-5568', 'gabriel.fuentes@example.com', '1990-10-05'),
(84, 'Clara', 'Arias', 8, 18, 'Calle 31, Edificio AE', 'Mercado Campesino', '555-7790', 'clara.arias@example.com', '1979-11-10'),
(85, 'Raúl', 'Pérez', 8, 10, 'Calle 32, Edificio AF', 'Parque Bolívar', '555-9902', 'raul.perez@example.com', '1984-12-15'),
(86, 'Cristina', 'Duarte', 8, 19, 'Calle 33, Edificio AG', 'Centro', '555-2235', 'cristina.duarte@example.com', '1981-01-20'),
(87, 'Enrique', 'Ríos', 8, 18, 'Calle 34, Edificio AH', 'Barrio Petrolero', '555-4457', 'enrique.rios@example.com', '1988-02-25'),
(88, 'Rosa', 'Soler', 8, 10, 'Calle 35, Edificio AI', 'Mercado Morro', '555-6679', 'rosa.soler@example.com', '1983-03-30'),
(89, 'Esteban', 'Cruz', 8, 19, 'Calle 36, Edificio AJ', 'Mercado Campesino', '555-8901', 'esteban.cruz@example.com', '1976-04-05'),
(90, 'Nuria', 'Rovira', 8, 18, 'Calle 37, Edificio AK', 'Centro', '555-1237', 'nuria.rovira@example.com', '1982-05-10'),
(91, 'Rafael', 'Montes', 8, 10, 'Calle 38, Edificio AL', 'Parque Bolívar', '555-6789', 'rafael.montes@example.com', '1980-06-15'),
(92, 'Sandra', 'Pacheco', 8, 19, 'Calle 39, Edificio AM', 'Centro', '555-8910', 'sandra.pacheco@example.com', '1985-07-20'),
(93, 'Mario', 'Vázquez', 8, 18, 'Calle 40, Edificio AN', 'Barrio Petrolero', '555-1125', 'mario.vazquez@example.com', '1979-08-25'),
(94, 'Beatriz', 'Lara', 8, 10, 'Calle 41, Edificio AO', 'Mercado Morro', '555-3347', 'beatriz.lara@example.com', '1982-09-30'),
(95, 'Antonio', 'Blanco', 8, 19, 'Calle 42, Edificio AP', 'Mercado Campesino', '555-5569', 'antonio.blanco@example.com', '1987-10-05'),
(96, 'Gloria', 'Carrillo', 8, 18, 'Calle 43, Edificio AQ', 'Parque Bolívar', '555-7791', 'gloria.carrillo@example.com', '1983-11-10'),
(97, 'Julio', 'Molina', 8, 10, 'Calle 44, Edificio AR', 'Centro', '555-9903', 'julio.molina@example.com', '1980-12-15'),
(98, 'Mónica', 'Gil', 8, 19, 'Calle 45, Edificio AS', 'Barrio Petrolero', '555-2236', 'monica.gil@example.com', '1977-01-20'),
(99, 'Diego', 'Alonso', 8, 18, 'Calle 46, Edificio AT', 'Mercado Morro', '555-4458', 'diego.alonso@example.com', '1984-02-25'),
(100, 'Paloma', 'Ruiz', 8, 10, 'Calle 47, Edificio AU', 'Mercado Campesino', '555-6680', 'paloma.ruiz@example.com', '1990-03-30'),
(101, 'Tomás', 'Campos', 8, 19, 'Calle 48, Edificio AV', 'Parque Bolívar', '555-8911', 'tomas.campos@example.com', '1978-04-05'),
(102, 'Verónica', 'Medina', 8, 18, 'Calle 49, Edificio AW', 'Centro', '555-1238', 'veronica.medina@example.com', '1982-05-10'),
(103, 'Ignacio', 'Ortiz', 8, 10, 'Calle 50, Edificio AX', 'Barrio Petrolero', '555-5670', 'ignacio.ortiz@example.com', '1986-06-15'),
(104, 'Claudia', 'Ibáñez', 8, 19, 'Calle 51, Edificio AY', 'Mercado Morro', '555-9104', 'claudia.ibanez@example.com', '1979-07-20'),
(105, 'Felipe', 'Suárez', 8, 18, 'Calle 52, Edificio AZ', 'Mercado Campesino', '555-1126', 'felipe.suarez@example.com', '1983-08-25'),
(106, 'Gabriela', 'Méndez', 8, 10, 'Calle 53, Edificio BA', 'Parque Bolívar', '555-3348', 'gabriela.mendez@example.com', '1980-09-30'),
(107, 'Rodrigo', 'Núñez', 8, 19, 'Calle 54, Edificio BB', 'Centro', '555-5570', 'rodrigo.nunez@example.com', '1987-10-05'),
(108, 'Elisa', 'Molina', 8, 18, 'Calle 55, Edificio BC', 'Barrio Petrolero', '555-7792', 'elisa.molina@example.com', '1984-11-10'),
(109, 'Alfonso', 'López', 8, 10, 'Calle 56, Edificio BD', 'Mercado Morro', '555-9904', 'alfonso.lopez@example.com', '1975-12-15'),
(110, 'Victoria', 'Herrera', 8, 19, 'Calle 57, Edificio BE', 'Mercado Campesino', '555-2237', 'victoria.herrera@example.com', '1988-01-20');

-- --------------------------------------------------------

--
-- Table structure for table `muestrasMedicas`
--

CREATE TABLE `muestrasMedicas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `cantidadMuestras` int(11) NOT NULL,
  `especialidad_id` int(11) NOT NULL,
  `subespecialidad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `muestrasMedicas`
--

INSERT INTO `muestrasMedicas` (`id`, `nombre`, `cantidadMuestras`, `especialidad_id`, `subespecialidad_id`) VALUES
(1, 'Analgesico ABC', 65, 1, 1),
(2, 'Antibiótico Z', 30, 1, 2),
(3, 'Beta Bloqueador A', 42, 4, 6),
(4, 'Diurético B', 60, 2, 4),
(5, 'Suplemento Infantil', 70, 3, 5),
(6, 'Crema Dermatológica C', 26, 4, 6),
(7, 'Antimicótico D', 45, 8, 10),
(8, 'Anticonceptivo Oral', 35, 5, 7),
(9, 'Suplemento Materno', 80, 5, 7),
(10, 'Antiepiléptico E', 20, 6, 8),
(11, 'Antipsicótico F', 55, 7, 9),
(12, 'Antidepresivo G', 50, 7, 9),
(13, 'Analgésico Infantil', 60, 8, 10),
(14, 'Colirio H', 70, 9, 12),
(15, 'Antitumoral I', 25, 2, 4),
(16, 'Enjuague Bucal J', 30, 1, 2),
(17, 'Cardioprotector K', 40, 2, 3),
(18, 'Pediavitamina L', 60, 3, 5),
(19, 'Dermolimpiador M', 45, 4, 6),
(20, 'Antifúngico N', 50, 4, 6),
(21, 'Anticonvulsivo O', 35, 6, 8),
(22, 'Ansiolítico P', 40, 7, 9),
(23, 'Vitaminas para Mujeres', 55, 5, 7),
(24, 'Antiosteoporótico Q', 60, 8, 10),
(25, 'Lentes de Contacto R', 80, 9, 12),
(26, 'Quimioterápico S', 20, 10, 13),
(27, 'Pastillas para la Gripe', 55, 1, 5),
(28, 'Crema para Acné', 35, 4, 6),
(29, 'Inmunosupresor T', 45, 6, 8),
(30, 'Tratamiento para el Sueño', 56, 6, 8),
(32, 'enjuague gingivitis', 32, 1, 2),
(33, 'presion sanguinea a', 7, 2, 3),
(36, 'prueba ', 45, 10, 12),
(37, 'metoprolol', 352, 2, 3),
(38, 'Bloqueador Solar BC', 67, 4, 6),
(39, 'Vitamina k', 589, 2, 16),
(40, 'Furosemida', 43, 2, 16),
(41, 'Propranolol', 45, 2, 16),
(42, 'Valproato', 23, 6, 15),
(43, 'Clonazepam', 43, 6, 15),
(44, 'Risperidona', 234, 6, 15),
(45, 'Paracetamol', 43, 3, 17),
(46, 'Albendazol', 21, 3, 17),
(47, 'Ondansetrón', 21, 3, 17),
(48, 'Clorfenamina', 29, 3, 17),
(49, 'Antinflamatorio FR', 67, 4, 6),
(50, 'Diclofenaco AT', 60, 8, 19),
(51, 'Antinflamatorio deportivo', 43, 8, 19),
(52, 'Antitraspirante clinico', 43, 8, 19),
(53, 'Vendas T', 43, 8, 19),
(54, 'Plantillas clinicas ', 43, 8, 18),
(55, 'Desinflamante Y', 23, 8, 18),
(56, 'Crema Antiseptica', 43, 8, 18);

-- --------------------------------------------------------

--
-- Table structure for table `subespecialidad`
--

CREATE TABLE `subespecialidad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `id_especialidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subespecialidad`
--

INSERT INTO `subespecialidad` (`id`, `nombre`, `id_especialidad`) VALUES
(1, 'Ortodoncia', 1),
(2, 'Endodoncia', 1),
(3, 'Cardiología Intervencionista', 2),
(4, 'Electrofisiología', 2),
(5, 'Neonatología', 3),
(6, 'Dermatología Pediátrica', 4),
(7, 'Medicina Materno-Fetal', 5),
(8, 'Neurocirugía', 6),
(9, 'Psiquiatría Infantil', 7),
(10, 'Cirugía de Columna', 8),
(11, 'oncología radioterápica', 10),
(12, 'hematología', 10),
(13, 'oftalmologia integral', 9),
(14, 'oftalmologia pediátrica', 9),
(15, 'Neurología Pediatrica', 6),
(16, 'Cardiología Pediátrica', 2),
(17, 'Pediatría General', 3),
(18, 'Ortopedia Pediátrica', 8),
(19, 'Traumatología Deportiva', 8);

-- --------------------------------------------------------

--
-- Table structure for table `Turno`
--

CREATE TABLE `Turno` (
  `id` int(11) NOT NULL,
  `id_entradaSalida` int(11) NOT NULL,
  `hora` time NOT NULL,
  `direccionMedico` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Turno`
--

INSERT INTO `Turno` (`id`, `id_entradaSalida`, `hora`, `direccionMedico`, `foto`) VALUES
(18, 1, '11:07:36', 'Boulevard Principal 789', '66c4b1402e776.png'),
(19, 1, '11:07:36', 'Boulevard Principal 789', '66c4b1414a436.png'),
(22, 1, '11:49:18', 'Calle Mayor 101', '66c4bb05af000.png'),
(23, 2, '11:50:28', 'Boulevard Principal 789', '66c4bb4c15976.jpeg'),
(24, 2, '11:51:13', 'Calle Falsa 456', '66c4bb78b4f7a.jpeg'),
(25, 2, '12:05:10', 'Boulevard Principal 789', '66c4bebc77d6e.jpeg'),
(26, 3, '22:15:27', 'Boulevard Principal 789', '66c54dc79ee70.png'),
(27, 3, '22:18:53', 'Calle Falsa 456', '66c54e96184d6.png'),
(28, 3, '23:01:41', 'Calle Mayor 101', '66c558ad1db10.png'),
(29, 4, '09:30:08', 'Avenida Central 202', '66c5ebfdf2ce4.png'),
(30, 5, '21:53:59', 'Calle 987, Consultorio 5', '66ca8ec16c856.png'),
(31, 5, '22:14:40', 'Calle 987, Consultorio 5', '66ca939b06c44.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `Visita`
--

CREATE TABLE `Visita` (
  `id` int(11) NOT NULL,
  `id_medico` int(11) NOT NULL,
  `id_visitador` int(11) NOT NULL,
  `comentarioMedico` varchar(200) NOT NULL,
  `comentarioVisitador` varchar(200) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Visita`
--

INSERT INTO `Visita` (`id`, `id_medico`, `id_visitador`, `comentarioMedico`, `comentarioVisitador`, `fecha`) VALUES
(1, 3, 1, 'Todo bien ', 'Todo correcto ', '2024-08-16'),
(2, 7, 1, 'dgfdsgds', 'sdgsdgs', '2024-08-07'),
(3, 3, 1, 'fhfdh', 'fhdhf', '2024-08-22'),
(10, 7, 1, 'todo bien', 'todo correcto ', '2024-08-07'),
(11, 6, 1, 'todo bien ', 'todo correcto', '2024-08-07'),
(12, 4, 1, 'eekjte', 'dgsg', '2024-08-15'),
(13, 41, 1, 'etewt', 'dgsd', '2024-08-20'),
(14, 2, 1, 'hola', 'me trato bien', '2024-08-20'),
(15, 6, 1, 'todo esta bien', 'todo', '2024-08-22');

-- --------------------------------------------------------

--
-- Table structure for table `visitador`
--

CREATE TABLE `visitador` (
  `id_visitador` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `especialidad_id` int(11) NOT NULL,
  `subespecialidad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitador`
--

INSERT INTO `visitador` (`id_visitador`, `nombre`, `apellido`, `telefono`, `correo`, `especialidad_id`, `subespecialidad_id`) VALUES
(7, 'prueba', 'prueba apellido', '123456789', 'email', 8, 10),
(8, 'prueba 2', 'prueba 2 cambio', '68627565', 'prueba@email.com', 7, 9),
(9, 'prueba 3', 'prueba 3 cambio', '9879541', 'Libero nostrum ipsam@email.com', 5, 7),
(12, 'editado', 'apellido editado', '76', 'Adipisci repellendus', 7, 9),
(13, 'Juana', 'Del arco', '3020394', 'juanita@hola.com', 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `visitadorMuestra`
--

CREATE TABLE `visitadorMuestra` (
  `id` int(11) NOT NULL,
  `id_visitador` int(11) NOT NULL,
  `id_muestra` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitadorMuestra`
--

INSERT INTO `visitadorMuestra` (`id`, `id_visitador`, `id_muestra`, `Cantidad`) VALUES
(1, 1, 5, 1000),
(2, 1, 18, 1000),
(3, 2, 4, 1000),
(4, 2, 17, 1000),
(5, 3, 10, 1000),
(6, 3, 21, 1000),
(7, 4, 3, 1000),
(8, 4, 6, 1000),
(9, 4, 19, 1000),
(10, 4, 20, 1000),
(11, 5, 5, 1000),
(12, 5, 18, 1000),
(13, 6, 10, 1000),
(14, 6, 21, 1000),
(15, 9, 4, 1000),
(16, 9, 17, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `visitaMuestra`
--

CREATE TABLE `visitaMuestra` (
  `id` int(11) NOT NULL,
  `id_visita` int(11) NOT NULL,
  `id_muestra` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitaMuestra`
--

INSERT INTO `visitaMuestra` (`id`, `id_visita`, `id_muestra`, `cantidad`) VALUES
(1, 5, 17, 5),
(2, 10, 17, 3),
(3, 10, 33, 5),
(4, 10, 37, 0),
(5, 11, 45, 4),
(6, 11, 46, 7),
(7, 11, 47, 9),
(8, 11, 48, 7),
(9, 12, 39, 4),
(10, 12, 40, 5),
(11, 12, 41, 6),
(12, 13, 17, 3),
(13, 13, 33, 5),
(14, 13, 37, 3),
(15, 14, 10, 5),
(16, 14, 21, 4),
(17, 14, 29, 3),
(18, 14, 30, 2),
(19, 15, 45, 6),
(20, 15, 46, 5),
(21, 15, 47, 4),
(22, 15, 48, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `entradaSalida`
--
ALTER TABLE `entradaSalida`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `muestrasMedicas`
--
ALTER TABLE `muestrasMedicas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subespecialidad`
--
ALTER TABLE `subespecialidad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Turno`
--
ALTER TABLE `Turno`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Visita`
--
ALTER TABLE `Visita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitador`
--
ALTER TABLE `visitador`
  ADD PRIMARY KEY (`id_visitador`);

--
-- Indexes for table `visitadorMuestra`
--
ALTER TABLE `visitadorMuestra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitaMuestra`
--
ALTER TABLE `visitaMuestra`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `entradaSalida`
--
ALTER TABLE `entradaSalida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `medico`
--
ALTER TABLE `medico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `muestrasMedicas`
--
ALTER TABLE `muestrasMedicas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `subespecialidad`
--
ALTER TABLE `subespecialidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `Turno`
--
ALTER TABLE `Turno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `Visita`
--
ALTER TABLE `Visita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `visitador`
--
ALTER TABLE `visitador`
  MODIFY `id_visitador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `visitadorMuestra`
--
ALTER TABLE `visitadorMuestra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `visitaMuestra`
--
ALTER TABLE `visitaMuestra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
