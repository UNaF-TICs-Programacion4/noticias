-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2016 a las 02:34:42
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_noticias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `admin_usuario` varchar(255) CHARACTER SET latin1 NOT NULL,
  `admin_password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `admin_email` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE `noticia` (
  `id` int(11) NOT NULL,
  `rela_idseccion` int(11) NOT NULL,
  `noticia_titulo` varchar(255) CHARACTER SET latin1 NOT NULL,
  `noticia_fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `noticia_autor` varchar(255) CHARACTER SET latin1 NOT NULL,
  `noticia_texto` text CHARACTER SET latin1 NOT NULL,
  `noticia_imagen` varchar(255) CHARACTER SET latin1 NOT NULL,
  `noticia_publicado` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `noticia`
--

INSERT INTO `noticia` (`id`, `rela_idseccion`, `noticia_titulo`, `noticia_fecha_alta`, `noticia_autor`, `noticia_texto`, `noticia_imagen`, `noticia_publicado`) VALUES
(1, 1, 'Están los 23: Tevez lo verá por televisión y la gran sorpresa es Víctor Cuesta, del Rojo', '2016-05-22 02:01:10', 'Hugo Moyano', 'Llegó el 20 de mayo, la fecha límite para entregar la lista de citados para la Copa América Centenario, una versión especial que se celebrará en Estados Unidos con la presencia de los combinados de la Concacaf para celebrar los 100 años del primer torneo de esta competencia. Mientras varias Selecciones ya dieron a conocer los 23 apellidos que llevarán, Gerardo Martino apeló al misterio y aguardó hasta último minuto para entregarla.\r\n\r\nLa gran incógnita estuvo centrada en la presencia de Carlos Tevez, quien finalmente se perderá por primera vez en su carrera una Copa América. El delantero de Boca peleó el puesto con Gonzalo Higuaín y Sergio Agüero, y hasta tuvo chances de colarse en el lugar de Víctor Cuesta, quien fue habilitado a última hora (no estaba en la primera nómina de 40 nombres) y es la gran sorpresa del equipo.\r\n\r\nRespecto a la zona defensiva, hay que recordar las lesiones que marginaron a Pablo Zabaleta, Javier Pinola y Leonel Vangioni de un posible llamado (el Piri, recién recuperado, también quedó afuera). El buen rendimiento del defensor de Independiente lo llevó a transformarse en la revelación. Además, la mirada estuvo enfocada en Javier Mascherano, que si bien no tendrá problemas en jugar, terminó la temporada con una molestia que es para seguir de cerca. Kranevitter será su reemplazo natural.\r\n\r\nCabe destacar que la Selección chocará con Chile el 6 de junio en la apertura del Grupo D (en San Francisco). Cuatro días después irá ante Panamá (en Chicago) y cerrará el 14 contra Bolivia (en Seattle). Hace 23 años que Argentina no consigue levantar este trofeo, teniendo en cuenta que fue subcampeón tres veces en las últimas ocho ediciones.\r\n\r\nLA LISTA DE MARTINO\r\n\r\nArqueros: Sergio Romero (Manchester United), Nahuel Guzmán (Tigres) y Mariano Andújar (Estudiantes)\r\n\r\nDefensores: Facundo Roncaglia (Fiorentina), Marcos Rojo (Manchester United), Nicolás Otamendi (Manchester City), Ramiro Funes Mori (Everton), Gabriel Mercado (River), Jonatan Maidana (River).\r\n\r\nMediocampistas: Javier Mascherano (Barcelona), Augusto Fernández (Atlético Madrid), Matías Kranevitter (Atlético Madrid), Éver Banega (Sevilla), Lucas Biglia (Lazio), Erik Lamela (Tottenham), Javier Pastore (Paris Saint Germain).\r\n\r\nDelanteros: Lionel Messi (barcelona), Gonzalo Higuaín (Napoli), Sergio Agüero (Manchester City), Ángel Di María (Paris Saint Germain), Nicolás Gaitán (Benfica), Ezequiel Lavezzi (Hebei Fortune).', 'copaamerica.jpg', 1),
(3, 4, 'Macri defiende su veto contra todos los pronósticos.', '2016-05-23 03:58:40', 'Heber Caballero', 'El presidente Mauricio Macri defendió el veto a la ley antidespidos aprobada por el Congreso de la Nación y cuestionó a "quienes creen que el Estado debe someter a la gente y que hay que promulgar leyes que más que crear empleo lo congela".\r\n\r\nEn las ya habituales columnas de opinión que el presidente escribe los domingos para diarios de las provincias, esta vez publicada en el diario La Capital de Rosario, Macri apuntó a la oposición por la aprobación de la ley que dicta la emergencia ocupacional al afirmar que "hay quienes creen que el Estado debe someter a la gente y que hay que promulgar leyes que más que crear empleo lo congela, deteniendo todo impulso a aumentarlo" y los acusó de buscar "aferrarse al pasado y a los cepos que no nos permiten despegar".\r\n\r\n"La ley que aprobaron, que algunos llaman anti-despidos y yo llamo anti-empleo, va en contra de este progreso. Es una ley que no ayuda a nadie, ni a los trabajadores ni a quienes están desempleados, porque espanta la posibilidad de crear trabajo", fustigó el mandatario, que además recordó que "los mismos que hoy la aprueban dijeron que era mala, porque sabían que hacía daño a los trabajadores".\r\n\r\n"Muchos de los que hoy la impulsan lo hacen movidos por intereses políticos, porque quieren que el gobierno fracase para volver y continuar con lo que hicieron hasta diciembre", añadió.', 'macriveto.jpg', 1),
(4, 4, '“Ni con tres semestres solucionarían los problemas de los trabajadores"', '2016-05-23 16:57:48', 'Heber Caballero', 'El diputado nacional por el Frente para la Victoria, Héctor Recalde, cuestionó el veto del presidente Mauricio Macri a la ley que buscaba impedir los despidos por seis meses y señaló que "ni aún con 3 semestres solucionarían los problemas de los trabajadores".\r\n\r\nEl jefe del bloque kirchnerista también adelantó que van a "acompañar" a las centrales sindicales si deciden realizar una manifestación o paro en contra del veto, el cual consideró que "alguna consecuencia va a tener". "La decisión le corresponde a los trabajadores y a sus dirigentes sindicales y si la decisión es tomar algún tipo de reacción en contra del veto nosotros vamos a acompañarla", aseguró.\r\n\r\nEn diálogo con radio El Mundo, Recalde afirmó que "lo que ha hecho el Gobierno era muy difícil de pensar que podía hacerlo" y reconoció que le "encantaría y desearía que al pueblo le vaya bien".\r\n\r\nSin embargo, aclaró que ve "muy dificultoso" que "se produzca la revolución de la alegría a partir del 1 de julio". "No creo que solucionemos todos los problemas a partir del 1 de julio. Ni aún con tres semestres creo que solucionarían los problemas de los trabajadores", aseguró Recalde.', 'hectorrecalde.jpg', 1),
(5, 5, 'Pequeño error: Helen Hunt fue confundida con otra estrella de Hollywood', '2016-05-24 23:51:32', 'Twitter', 'Helen Hunt es una de las grandes actrices que tiene la industria de Hollywood. Ganó un Oscar por su interpretación en "Mejor...imposible", participó en películas taquilleras como "La maldición del escorpión de Jade" de Woody Allen y fue la protagonista de la serie multipremiada "Mad About You". Sin embargo, fue confundida por otra actriz en un local de Starbucks: ¿Con quién? Con Jodie Foster.\r\n\r\nFue la propia Hunt, quien contó a través de su cuenta de Twitter, qué fue lo que le pasó en una de las tiendas de la cadena."Ordené mi bebida en Starbucks. Le pregunte a la chica que atendía si necesitaba mi nombre. Me guiñó un ojo y dijo: Te conocemos", escribió...\r\n\r\nHasta ahí parecía una escena común y corriente en la vida de Helen, acostumbrada a que la gente la reconozca por la calle o en lugares públicos. Sin embargo, su sorpresa fue mayúscula cuando leyó en su vaso la leyenda: "Jody", en obvia referencia a la actriz de "El silencio de los inocentes".\r\n\r\nDesde la franquicia de la cafeterías le pidieron una disculpa pública a la actriz, a través de las redes sociales, también en tono jocoso. "@HelenHunt ¡Lo sentimos! Esperamos que la bebida haya estado mejor... imposible", en alusión a la película que, en 1997, protagonizó junto a Jack Nicholson y que le otorgó fama mundial.', 'Helen-Hunt-confundida-estrella-Hollywood_CLAIMA20160524_0368_17.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE `seccion` (
  `id` int(11) NOT NULL,
  `seccion_descri` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `seccion`
--

INSERT INTO `seccion` (`id`, `seccion_descri`) VALUES
(1, 'Deportes'),
(4, 'Nacionales'),
(5, 'Espectáculos');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_NOTICIA_SECCION` (`rela_idseccion`);

--
-- Indices de la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `seccion`
--
ALTER TABLE `seccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD CONSTRAINT `FK_NOTICIA_SECCION` FOREIGN KEY (`rela_idseccion`) REFERENCES `seccion` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
