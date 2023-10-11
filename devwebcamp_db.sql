/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `categorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

CREATE TABLE `dias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

CREATE TABLE `eventos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(120) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `descripcion` text,
  `disponibles` int DEFAULT NULL,
  `categoria_id` int NOT NULL,
  `dia_id` int NOT NULL,
  `hora_id` int NOT NULL,
  `ponente_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_eventos_categorias_idx` (`categoria_id`),
  KEY `fk_eventos_dias1_idx` (`dia_id`),
  KEY `fk_eventos_horas1_idx` (`hora_id`),
  KEY `fk_eventos_ponentes1_idx` (`ponente_id`),
  CONSTRAINT `fk_eventos_categorias` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  CONSTRAINT `fk_eventos_dias1` FOREIGN KEY (`dia_id`) REFERENCES `dias` (`id`),
  CONSTRAINT `fk_eventos_horas1` FOREIGN KEY (`hora_id`) REFERENCES `horas` (`id`),
  CONSTRAINT `fk_eventos_ponentes1` FOREIGN KEY (`ponente_id`) REFERENCES `ponentes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb3;

CREATE TABLE `eventos_registros` (
  `id` int NOT NULL AUTO_INCREMENT,
  `evento_id` int DEFAULT NULL,
  `registro_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `evento_id` (`evento_id`),
  KEY `registro_id` (`registro_id`),
  CONSTRAINT `eventos_registros_ibfk_1` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`id`),
  CONSTRAINT `eventos_registros_ibfk_2` FOREIGN KEY (`registro_id`) REFERENCES `registros` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

CREATE TABLE `horas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `hora` varchar(13) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

CREATE TABLE `paquetes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

CREATE TABLE `ponentes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) DEFAULT NULL,
  `apellido` varchar(40) DEFAULT NULL,
  `ciudad` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `pais` varchar(20) DEFAULT NULL,
  `imagen` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `tags` varchar(120) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `redes` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3;

CREATE TABLE `regalos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

CREATE TABLE `registros` (
  `id` int NOT NULL AUTO_INCREMENT,
  `paquete_id` int DEFAULT NULL,
  `pago_id` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `token` varchar(8) DEFAULT NULL,
  `usuario_id` int DEFAULT NULL,
  `regalo_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuarioId` (`usuario_id`),
  KEY `paquete_id` (`paquete_id`),
  KEY `regalo_id` (`regalo_id`),
  CONSTRAINT `registros_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `registros_ibfk_2` FOREIGN KEY (`paquete_id`) REFERENCES `paquetes` (`id`),
  CONSTRAINT `registros_ibfk_3` FOREIGN KEY (`regalo_id`) REFERENCES `regalos` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) DEFAULT NULL,
  `apellido` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `confirmado` tinyint(1) DEFAULT NULL,
  `token` varchar(13) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Conferencias');
INSERT INTO `categorias` (`id`, `nombre`) VALUES
(2, 'Workshops');


INSERT INTO `dias` (`id`, `nombre`) VALUES
(1, 'Viernes');
INSERT INTO `dias` (`id`, `nombre`) VALUES
(2, 'Sábado');


INSERT INTO `eventos` (`id`, `nombre`, `descripcion`, `disponibles`, `categoria_id`, `dia_id`, `hora_id`, `ponente_id`) VALUES
(1, 'Next.js - Aplicaciones con gran performance', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 49, 2, 2, 1, 1);
INSERT INTO `eventos` (`id`, `nombre`, `descripcion`, `disponibles`, `categoria_id`, `dia_id`, `hora_id`, `ponente_id`) VALUES
(2, 'MongoDB - Base de Datos a gran escala', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 49, 2, 2, 2, 2);
INSERT INTO `eventos` (`id`, `nombre`, `descripcion`, `disponibles`, `categoria_id`, `dia_id`, `hora_id`, `ponente_id`) VALUES
(3, 'Tailwind y Figma', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 47, 1, 1, 2, 3);
INSERT INTO `eventos` (`id`, `nombre`, `descripcion`, `disponibles`, `categoria_id`, `dia_id`, `hora_id`, `ponente_id`) VALUES
(4, 'MERN - MongoDB Express React y Node.js - Ejemplo Real', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 30, 1, 2, 4, 8),
(5, 'Vue.js con Django para gran Performance', 'Nunc laoreet sit amet turpis eu vulputate. Etiam quis dignissim elit, ac commodo ligula. Donec eu mollis odio, vitae sodales est. Fusce ut turpis eros. Vestibulum mauris ligula, suscipit eget lacus non, vulputate laoreet enim. Etiam ac elementum lacus, eu dapibus dolor. Proin ac justo in erat elementum venenatis sit amet et arcu. Cras eu ultrices lorem, et mollis libero. Nam ex velit, sollicitudin ac lectus ut, lobortis blandit nibh. Donec vulputate eros quis arcu varius bibendum. Vestibulum mattis consectetur orci eget feugiat. Donec massa ligula, pulvinar vitae sem nec, suscipit tempus tortor. Nulla congue venenatis metus. Ut quis diam est. Sed non sagittis justo, ut rhoncus neque. Quisque ut mi et nunc sollicitudin luctus quis a ante. ', 48, 2, 1, 1, 4),
(6, 'DevOps - Primeros Pasos', 'Nunc laoreet sit amet turpis eu vulputate. Etiam quis dignissim elit, ac commodo ligula. Donec eu mollis odio, vitae sodales est. Fusce ut turpis eros. Vestibulum mauris ligula, suscipit eget lacus non, vulputate laoreet enim. Etiam ac elementum lacus, eu dapibus dolor. Proin ac justo in erat elementum venenatis sit amet et arcu. Cras eu ultrices lorem, et mollis libero. Nam ex velit, sollicitudin ac lectus ut, lobortis blandit nibh. Donec vulputate eros quis arcu varius bibendum. Vestibulum mattis consectetur orci eget feugiat. Donec massa ligula, pulvinar vitae sem nec, suscipit tempus tortor. Nulla congue venenatis metus. Ut quis diam est. Sed non sagittis justo, ut rhoncus neque. Quisque ut mi et nunc sollicitudin luctus quis a ante. ', 0, 1, 1, 1, 5),
(7, 'WordPress y React - Gran Performance a costo 0', 'Nunc laoreet sit amet turpis eu vulputate. Etiam quis dignissim elit, ac commodo ligula. Donec eu mollis odio, vitae sodales est. Fusce ut turpis eros. Vestibulum mauris ligula, suscipit eget lacus non, vulputate laoreet enim. Etiam ac elementum lacus, eu dapibus dolor. Proin ac justo in erat elementum venenatis sit amet et arcu. Cras eu ultrices lorem, et mollis libero. Nam ex velit, sollicitudin ac lectus ut, lobortis blandit nibh. Donec vulputate eros quis arcu varius bibendum. Vestibulum mattis consectetur orci eget feugiat. Donec massa ligula, pulvinar vitae sem nec, suscipit tempus tortor. Nulla congue venenatis metus. Ut quis diam est. Sed non sagittis justo, ut rhoncus neque. Quisque ut mi et nunc sollicitudin luctus quis a ante. ', 39, 2, 1, 2, 6),
(8, 'React, Angular y Svelte - Creando un Proyecto', 'Nunc laoreet sit amet turpis eu vulputate. Etiam quis dignissim elit, ac commodo ligula. Donec eu mollis odio, vitae sodales est. Fusce ut turpis eros. Vestibulum mauris ligula, suscipit eget lacus non, vulputate laoreet enim. Etiam ac elementum lacus, eu dapibus dolor. Proin ac justo in erat elementum venenatis sit amet et arcu. Cras eu ultrices lorem, et mollis libero. Nam ex velit, sollicitudin ac lectus ut, lobortis blandit nibh. Donec vulputate eros quis arcu varius bibendum. Vestibulum mattis consectetur orci eget feugiat. Donec massa ligula, pulvinar vitae sem nec, suscipit tempus tortor. Nulla congue venenatis metus. Ut quis diam est. Sed non sagittis justo, ut rhoncus neque. Quisque ut mi et nunc sollicitudin luctus quis a ante. ', 29, 1, 1, 3, 7),
(9, 'Laravel y Next.js - Aplicaciones Full Stack en Tiempo Record', 'Nunc laoreet sit amet turpis eu vulputate. Etiam quis dignissim elit, ac commodo ligula. Donec eu mollis odio, vitae sodales est. Fusce ut turpis eros. Vestibulum mauris ligula, suscipit eget lacus non, vulputate laoreet enim. Etiam ac elementum lacus, eu dapibus dolor. Proin ac justo in erat elementum venenatis sit amet et arcu. Cras eu ultrices lorem, et mollis libero. Nam ex velit, sollicitudin ac lectus ut, lobortis blandit nibh. Donec vulputate eros quis arcu varius bibendum. Vestibulum mattis consectetur orci eget feugiat. Donec massa ligula, pulvinar vitae sem nec, suscipit tempus tortor. Nulla congue venenatis metus. Ut quis diam est. Sed non sagittis justo, ut rhoncus neque. Quisque ut mi et nunc sollicitudin luctus quis a ante. ', 39, 1, 2, 1, 8),
(10, 'Remix - El Nuevo Framework de React', 'Nunc laoreet sit amet turpis eu vulputate. Etiam quis dignissim elit, ac commodo ligula. Donec eu mollis odio, vitae sodales est. Fusce ut turpis eros. Vestibulum mauris ligula, suscipit eget lacus non, vulputate laoreet enim. Etiam ac elementum lacus, eu dapibus dolor. Proin ac justo in erat elementum venenatis sit amet et arcu. Cras eu ultrices lorem, et mollis libero. Nam ex velit, sollicitudin ac lectus ut, lobortis blandit nibh. Donec vulputate eros quis arcu varius bibendum. Vestibulum mattis consectetur orci eget feugiat. Donec massa ligula, pulvinar vitae sem nec, suscipit tempus tortor. Nulla congue venenatis metus. Ut quis diam est. Sed non sagittis justo, ut rhoncus neque. Quisque ut mi et nunc sollicitudin luctus quis a ante. ', 30, 2, 1, 3, 9),
(11, 'TailwindCSS - Crear Sitios Accesibles', 'Nunc laoreet sit amet turpis eu vulputate. Etiam quis dignissim elit, ac commodo ligula. Donec eu mollis odio, vitae sodales est. Fusce ut turpis eros. Vestibulum mauris ligula, suscipit eget lacus non, vulputate laoreet enim. Etiam ac elementum lacus, eu dapibus dolor. Proin ac justo in erat elementum venenatis sit amet et arcu. Cras eu ultrices lorem, et mollis libero. Nam ex velit, sollicitudin ac lectus ut, lobortis blandit nibh. Donec vulputate eros quis arcu varius bibendum. Vestibulum mattis consectetur orci eget feugiat. Donec massa ligula, pulvinar vitae sem nec, suscipit tempus tortor. Nulla congue venenatis metus. Ut quis diam est. Sed non sagittis justo, ut rhoncus neque. Quisque ut mi et nunc sollicitudin luctus quis a ante. ', 30, 1, 1, 4, 10),
(12, 'TypeScript en React', 'Nunc laoreet sit amet turpis eu vulputate. Etiam quis dignissim elit, ac commodo ligula. Donec eu mollis odio, vitae sodales est. Fusce ut turpis eros. Vestibulum mauris ligula, suscipit eget lacus non, vulputate laoreet enim. Etiam ac elementum lacus, eu dapibus dolor. Proin ac justo in erat elementum venenatis sit amet et arcu. Cras eu ultrices lorem, et mollis libero. Nam ex velit, sollicitudin ac lectus ut, lobortis blandit nibh. Donec vulputate eros quis arcu varius bibendum. Vestibulum mattis consectetur orci eget feugiat. Donec massa ligula, pulvinar vitae sem nec, suscipit tempus tortor. Nulla congue venenatis metus. Ut quis diam est. Sed non sagittis justo, ut rhoncus neque. Quisque ut mi et nunc sollicitudin luctus quis a ante. ', 28, 2, 2, 3, 11),
(13, 'Presente y Futuro del Frontend', 'Nunc laoreet sit amet turpis eu vulputate. Etiam quis dignissim elit, ac commodo ligula. Donec eu mollis odio, vitae sodales est. Fusce ut turpis eros. Vestibulum mauris ligula, suscipit eget lacus non, vulputate laoreet enim. Etiam ac elementum lacus, eu dapibus dolor. Proin ac justo in erat elementum venenatis sit amet et arcu. Cras eu ultrices lorem, et mollis libero. Nam ex velit, sollicitudin ac lectus ut, lobortis blandit nibh. Donec vulputate eros quis arcu varius bibendum. Vestibulum mattis consectetur orci eget feugiat. Donec massa ligula, pulvinar vitae sem nec, suscipit tempus tortor. Nulla congue venenatis metus. Ut quis diam est. Sed non sagittis justo, ut rhoncus neque. Quisque ut mi et nunc sollicitudin luctus quis a ante. ', 30, 2, 2, 8, 12),
(14, 'Extiende la API de WordPress con PHP', 'Nunc laoreet sit amet turpis eu vulputate. Etiam quis dignissim elit, ac commodo ligula. Donec eu mollis odio, vitae sodales est. Fusce ut turpis eros. Vestibulum mauris ligula, suscipit eget lacus non, vulputate laoreet enim. Etiam ac elementum lacus, eu dapibus dolor. Proin ac justo in erat elementum venenatis sit amet et arcu. Cras eu ultrices lorem, et mollis libero. Nam ex velit, sollicitudin ac lectus ut, lobortis blandit nibh. Donec vulputate eros quis arcu varius bibendum. Vestibulum mattis consectetur orci eget feugiat. Donec massa ligula, pulvinar vitae sem nec, suscipit tempus tortor. Nulla congue venenatis metus. Ut quis diam est. Sed non sagittis justo, ut rhoncus neque. Quisque ut mi et nunc sollicitudin luctus quis a ante. ', 20, 1, 1, 8, 13),
(15, 'Node y Vue.js - Proyecto Práctico', 'Nunc laoreet sit amet turpis eu vulputate. Etiam quis dignissim elit, ac commodo ligula. Donec eu mollis odio, vitae sodales est. Fusce ut turpis eros. Vestibulum mauris ligula, suscipit eget lacus non, vulputate laoreet enim. Etiam ac elementum lacus, eu dapibus dolor. Proin ac justo in erat elementum venenatis sit amet et arcu. Cras eu ultrices lorem, et mollis libero. Nam ex velit, sollicitudin ac lectus ut, lobortis blandit nibh. Donec vulputate eros quis arcu varius bibendum. Vestibulum mattis consectetur orci eget feugiat. Donec massa ligula, pulvinar vitae sem nec, suscipit tempus tortor. Nulla congue venenatis metus. Ut quis diam est. Sed non sagittis justo, ut rhoncus neque. Quisque ut mi et nunc sollicitudin luctus quis a ante. ', 30, 1, 2, 2, 14),
(16, 'GraphQL y Flutter - Gran Performance para Android y iOS', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 30, 1, 1, 5, 15),
(17, 'REST API\'s - Backend para Web y Móvil', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 18, 2, 1, 4, 16),
(18, 'JavaScript - Apps para Web, Desktop y Escritorio', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 48, 2, 1, 8, 17),
(19, 'Flutter y React Native - ¿Cómo elegir?', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 40, 2, 1, 6, 18),
(20, 'Laravel y Flutter - Creando Un Proyecto Real', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 30, 1, 2, 5, 18),
(21, 'Laravel y React Native - Creando un Proyecto Real', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 48, 1, 2, 7, 18),
(22, 'PHP 8 - ¿Qué es Nuevo y que cambió?', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 49, 2, 1, 7, 1),
(23, 'MEVN Stack - Mongo Express  Vue.js y Node.js', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 49, 2, 1, 5, 2),
(24, 'Introducción a TailwindCSS', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 30, 2, 2, 4, 3),
(25, 'WPGraphQL y GatsbyJS - Headless WordPress', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 40, 2, 2, 5, 6),
(26, 'Svelte - El Nuevo Framework de JS ', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 39, 2, 2, 6, 7),
(27, 'Next.js - El Mejor Framework para React', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 40, 2, 2, 7, 8),
(28, 'React 18 - Una Introducción Práctica', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 28, 1, 1, 6, 9),
(29, 'Vue.js - Composition API', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 20, 1, 1, 7, 14),
(30, 'Vue.js - Pinia para reemplazar Vuex', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 25, 1, 2, 3, 14),
(31, 'GraphQL - Introducción Práctica', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 30, 1, 2, 8, 15),
(32, 'React y TailwindCSS - Frontend Moderno', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec sodales condimentum magna fringilla egestas. In non pellentesque magna, at mollis velit. Morbi nec dapibus diam. Phasellus ante neque, blandit eget tortor a, cursus molestie turpis. Aenean placerat aliquet nibh, et interdum ipsum finibus at. Nulla sit amet faucibus leo, vel blandit urna. Curabitur dictum euismod sem, eget euismod magna pulvinar et. Nam semper aliquet nunc eu ornare. ', 29, 1, 2, 6, 17);

INSERT INTO `eventos_registros` (`id`, `evento_id`, `registro_id`) VALUES
(1, 26, 1);
INSERT INTO `eventos_registros` (`id`, `evento_id`, `registro_id`) VALUES
(2, 5, 1);
INSERT INTO `eventos_registros` (`id`, `evento_id`, `registro_id`) VALUES
(3, 32, 1);
INSERT INTO `eventos_registros` (`id`, `evento_id`, `registro_id`) VALUES
(4, 8, 1),
(5, 3, 1);

INSERT INTO `horas` (`id`, `hora`) VALUES
(1, '10:00 - 10:55');
INSERT INTO `horas` (`id`, `hora`) VALUES
(2, '11:00 - 11:55');
INSERT INTO `horas` (`id`, `hora`) VALUES
(3, '12:00 - 12:55');
INSERT INTO `horas` (`id`, `hora`) VALUES
(4, '13:00 - 13:55'),
(5, '16:00 - 16:55'),
(6, '17:00 - 17:55'),
(7, '18:00 - 18:55'),
(8, '19:00 - 19:55');

INSERT INTO `paquetes` (`id`, `nombre`) VALUES
(1, 'Presencial');
INSERT INTO `paquetes` (`id`, `nombre`) VALUES
(2, 'Virtual');
INSERT INTO `paquetes` (`id`, `nombre`) VALUES
(3, 'Gratis');

INSERT INTO `ponentes` (`id`, `nombre`, `apellido`, `ciudad`, `pais`, `imagen`, `tags`, `redes`) VALUES
(1, ' Julian', 'Muñoz', 'Madrid', 'España', '6764a74ccf2b4b5b74e333016c13388a', 'React,PHP,Laravel', '{\"facebook\":\"https://www.facebook.com/arturo.hernandezgarza\",\"twitter\":\"https://twitter.com/arturo_hdzg\",\"youtube\":\"https://www.youtube.com/@ArturoHDZG\",\"instagram\":\"https://www.instagram.com/arturohdzgarza\",\"tiktok\":\"https://www.tiktok.com/@arturo.hdz\",\"github\":\"https://arturohdzg.github.io/ArturoHDZG\"}');
INSERT INTO `ponentes` (`id`, `nombre`, `apellido`, `ciudad`, `pais`, `imagen`, `tags`, `redes`) VALUES
(2, ' Israel', 'González', 'CDMX', 'México', '6497c66bcc464e26871c046dd5bb86c8', 'Vue,Node.js,MongoDB', '{\"facebook\":\"https://www.facebook.com/arturo.hernandezgarza\",\"twitter\":\"https://twitter.com/arturo_hdzg\",\"youtube\":\"https://www.youtube.com/@ArturoHDZG\",\"instagram\":\"https://www.instagram.com/arturohdzgarza\",\"tiktok\":\"https://www.tiktok.com/@arturo.hdz\",\"github\":\"https://arturohdzg.github.io/ArturoHDZG\"}');
INSERT INTO `ponentes` (`id`, `nombre`, `apellido`, `ciudad`, `pais`, `imagen`, `tags`, `redes`) VALUES
(3, ' Isabella', 'Tassis', 'Buenos Aires', 'Argentina', '55c7866df31370ec3299eed6eb63daa1', 'UX / UI,HTML,CSS,TailwindCSS', '{\"facebook\":\"https://www.facebook.com/arturo.hernandezgarza\",\"twitter\":\"https://twitter.com/arturo_hdzg\",\"youtube\":\"https://www.youtube.com/@ArturoHDZG\",\"instagram\":\"https://www.instagram.com/arturohdzgarza\",\"tiktok\":\"https://www.tiktok.com/@arturo.hdz\",\"github\":\"https://arturohdzg.github.io/ArturoHDZG\"}');
INSERT INTO `ponentes` (`id`, `nombre`, `apellido`, `ciudad`, `pais`, `imagen`, `tags`, `redes`) VALUES
(4, ' Jazmín', 'Hurtado', 'CDMX', 'México', 'de6e3fa0cde8402de4c28e6be0903ada', 'Django,React, Vue.js', '{\"facebook\":\"https://www.facebook.com/arturo.hernandezgarza\",\"twitter\":\"https://twitter.com/arturo_hdzg\",\"youtube\":\"https://www.youtube.com/@ArturoHDZG\",\"instagram\":\"https://www.instagram.com/arturohdzgarza\",\"tiktok\":\"https://www.tiktok.com/@arturo.hdz\",\"github\":\"https://arturohdzg.github.io/ArturoHDZG\"}'),
(5, ' María Camila', 'Murillo', 'Guadalajara', 'México', 'cec8c9d7bcb4c19e87d1164bce8fe176', 'Devops,Git,CI CD', '{\"facebook\":\"https://www.facebook.com/arturo.hernandezgarza\",\"twitter\":\"https://twitter.com/arturo_hdzg\",\"youtube\":\"https://www.youtube.com/@ArturoHDZG\",\"instagram\":\"https://www.instagram.com/arturohdzgarza\",\"tiktok\":\"https://www.tiktok.com/@arturo.hdz\",\"github\":\"https://arturohdzg.github.io/ArturoHDZG\"}'),
(6, ' Tomas', 'Aleman', 'Bogotá', 'Colombia', '5332118b8d7690a1b992431802eafab1', 'WordPress,PHP,React', '{\"facebook\":\"https://www.facebook.com/arturo.hernandezgarza\",\"twitter\":\"https://twitter.com/arturo_hdzg\",\"youtube\":\"https://www.youtube.com/@ArturoHDZG\",\"instagram\":\"https://www.instagram.com/arturohdzgarza\",\"tiktok\":\"https://www.tiktok.com/@arturo.hdz\",\"github\":\"https://arturohdzg.github.io/ArturoHDZG\"}'),
(7, ' Lucía', 'Velázquez', 'Buenos Aires', 'Argentina', '90956ece4adbd9f9ccb8f4ae80dc1537', 'React,Angular,Svelte', '{\"facebook\":\"https://www.facebook.com/arturo.hernandezgarza\",\"twitter\":\"https://twitter.com/arturo_hdzg\",\"youtube\":\"https://www.youtube.com/@ArturoHDZG\",\"instagram\":\"https://www.instagram.com/arturohdzgarza\",\"tiktok\":\"https://www.tiktok.com/@arturo.hdz\",\"github\":\"https://arturohdzg.github.io/ArturoHDZG\"}'),
(8, ' Catarina', 'Pardo', 'Lima', 'Perú', '9886ffc0d31e4c20a04acc1464630527', 'Next.js,Laravel,MERN', '{\"facebook\":\"https://www.facebook.com/arturo.hernandezgarza\",\"twitter\":\"https://twitter.com/arturo_hdzg\",\"youtube\":\"https://www.youtube.com/@ArturoHDZG\",\"instagram\":\"https://www.instagram.com/arturohdzgarza\",\"tiktok\":\"https://www.tiktok.com/@arturo.hdz\",\"github\":\"https://arturohdzg.github.io/ArturoHDZG\"}'),
(9, ' Raquel', 'Ros', 'Madrid', 'España', 'd697f6c454c36252d70abacd7599566c', 'Next.js,Remix,Vue.js', '{\"facebook\":\"https://www.facebook.com/arturo.hernandezgarza\",\"twitter\":\"https://twitter.com/arturo_hdzg\",\"youtube\":\"https://www.youtube.com/@ArturoHDZG\",\"instagram\":\"https://www.instagram.com/arturohdzgarza\",\"tiktok\":\"https://www.tiktok.com/@arturo.hdz\",\"github\":\"https://arturohdzg.github.io/ArturoHDZG\"}'),
(10, ' Sofía', 'Amengual', 'Santiago', 'Chile', '414ffd61380bbf0e9f45cbde4d0cbb7f', 'UX / UI,Figma,TailwindCSS', '{\"facebook\":\"https://www.facebook.com/arturo.hernandezgarza\",\"twitter\":\"https://twitter.com/arturo_hdzg\",\"youtube\":\"https://www.youtube.com/@ArturoHDZG\",\"instagram\":\"https://www.instagram.com/arturohdzgarza\",\"tiktok\":\"https://www.tiktok.com/@arturo.hdz\",\"github\":\"https://arturohdzg.github.io/ArturoHDZG\"}'),
(11, ' María José', 'Leoz', 'NY', 'Estados Unidos', 'c8b3a77bce7a6efb6e6872db67cfa553', 'React,TypeScript,JavaScript', '{\"facebook\":\"https://www.facebook.com/arturo.hernandezgarza\",\"twitter\":\"https://twitter.com/arturo_hdzg\",\"youtube\":\"https://www.youtube.com/@ArturoHDZG\",\"instagram\":\"https://www.instagram.com/arturohdzgarza\",\"tiktok\":\"https://www.tiktok.com/@arturo.hdz\",\"github\":\"https://arturohdzg.github.io/ArturoHDZG\"}'),
(12, ' Alexa', 'Mina', 'Bogotá', 'Colombia', '6eac63d88743bbb9ee0bfd8c60cf4186', 'HTML,CSS,React,TailwindCSS', '{\"facebook\":\"https://www.facebook.com/arturo.hernandezgarza\",\"twitter\":\"https://twitter.com/arturo_hdzg\",\"youtube\":\"https://www.youtube.com/@ArturoHDZG\",\"instagram\":\"https://www.instagram.com/arturohdzgarza\",\"tiktok\":\"https://www.tiktok.com/@arturo.hdz\",\"github\":\"https://arturohdzg.github.io/ArturoHDZG\"}'),
(13, ' Jesus', 'López', 'Madrid', 'España', 'e481bca0c512f5b4d8f76ccea2548f0d', 'PHP,WordPress,HTML,CSS', '{\"facebook\":\"https://www.facebook.com/arturo.hernandezgarza\",\"twitter\":\"https://twitter.com/arturo_hdzg\",\"youtube\":\"https://www.youtube.com/@ArturoHDZG\",\"instagram\":\"https://www.instagram.com/arturohdzgarza\",\"tiktok\":\"https://www.tiktok.com/@arturo.hdz\",\"github\":\"https://arturohdzg.github.io/ArturoHDZG\"}'),
(14, ' Irene ', 'Dávalos', 'CDMX', 'México', '6727e8ee7f6c642026247fe0556d866d', 'Node.js,Vue.js,Angular', '{\"facebook\":\"https://www.facebook.com/arturo.hernandezgarza\",\"twitter\":\"https://twitter.com/arturo_hdzg\",\"youtube\":\"https://www.youtube.com/@ArturoHDZG\",\"instagram\":\"https://www.instagram.com/arturohdzgarza\",\"tiktok\":\"https://www.tiktok.com/@arturo.hdz\",\"github\":\"https://arturohdzg.github.io/ArturoHDZG\"}'),
(15, ' Brenda', ' Ocampo', 'Santiago', 'Chile', '40e01f5c023c7e74c9c372a8126edd97', 'Laravel,Next.js,GraphQL,Flutter', '{\"facebook\":\"https://www.facebook.com/arturo.hernandezgarza\",\"twitter\":\"https://twitter.com/arturo_hdzg\",\"youtube\":\"https://www.youtube.com/@ArturoHDZG\",\"instagram\":\"https://www.instagram.com/arturohdzgarza\",\"tiktok\":\"https://www.tiktok.com/@arturo.hdz\",\"github\":\"https://arturohdzg.github.io/ArturoHDZG\"}'),
(16, ' Julián ', 'Noboa', 'Las Vegas', 'EU', '6d4629dacbed2e4f5a344282ec2f4f76', 'iOS,Figma,REST API\'s', '{\"facebook\":\"https://www.facebook.com/arturo.hernandezgarza\",\"twitter\":\"https://twitter.com/arturo_hdzg\",\"youtube\":\"https://www.youtube.com/@ArturoHDZG\",\"instagram\":\"https://www.instagram.com/arturohdzgarza\",\"tiktok\":\"https://www.tiktok.com/@arturo.hdz\",\"github\":\"https://arturohdzg.github.io/ArturoHDZG\"}'),
(17, ' Vicente ', 'Figueroa', 'CDMX', 'México', '2a41a781d8ae8f0f7a1969c766276b08', 'React,Tailwind,JavaScript,TypeScript,Node', '{\"facebook\":\"https://www.facebook.com/arturo.hernandezgarza\",\"twitter\":\"https://twitter.com/arturo_hdzg\",\"youtube\":\"https://www.youtube.com/@ArturoHDZG\",\"instagram\":\"https://www.instagram.com/arturohdzgarza\",\"tiktok\":\"https://www.tiktok.com/@arturo.hdz\",\"github\":\"https://arturohdzg.github.io/ArturoHDZG\"}'),
(18, ' Nico', 'Fraga', 'Buenos Aires', 'Argentina', 'ddcb5f17ce3c89c0eb42aa1ddf81be81', 'PHP,Laravel,Flutter,react native', '{\"facebook\":\"https://www.facebook.com/arturo.hernandezgarza\",\"twitter\":\"https://twitter.com/arturo_hdzg\",\"youtube\":\"https://www.youtube.com/@ArturoHDZG\",\"instagram\":\"https://www.instagram.com/arturohdzgarza\",\"tiktok\":\"https://www.tiktok.com/@arturo.hdz\",\"github\":\"https://arturohdzg.github.io/ArturoHDZG\"}');

INSERT INTO `regalos` (`id`, `nombre`) VALUES
(1, 'Paquete Stickers');
INSERT INTO `regalos` (`id`, `nombre`) VALUES
(2, 'Camisa Mujer - Chica');
INSERT INTO `regalos` (`id`, `nombre`) VALUES
(3, 'Camisa Mujer - Mediana');
INSERT INTO `regalos` (`id`, `nombre`) VALUES
(4, 'Camisa Mujer - Grande'),
(5, 'Camisa Mujer - XL'),
(6, 'Camisa Hombre - Chica'),
(7, 'Camisa Hombre - Mediana'),
(8, 'Camisa Hombre - Grande'),
(9, 'Camisa Hombre - XL');

INSERT INTO `registros` (`id`, `paquete_id`, `pago_id`, `token`, `usuario_id`, `regalo_id`) VALUES
(1, 1, '04L07732XL362584V', '914fc80a', 2, 9);


INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `password`, `confirmado`, `token`, `admin`) VALUES
(1, 'Super', 'Admin', 'admin@devwebcamp.com', '$2y$10$oEJwLP2Zr19b.HjI1gXjhuOY06w5EvSXxL.HUa5lp4VBnZhulmJvu', 1, '', 1);
INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `password`, `confirmado`, `token`, `admin`) VALUES
(2, 'Arturo', 'Hernandez Garza', 'arturo_hdzg@hotmail.com', '$2y$10$TLwoYYyDWADWucsK2hIBV.a3RB0UoDN/Ekt.eHSP6I5NVuARINpq.', 1, '', 0);



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;