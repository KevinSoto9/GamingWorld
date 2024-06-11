-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-06-2024 a las 22:48:24
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gamingworld`
--
CREATE DATABASE IF NOT EXISTS `gamingworld` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `gamingworld`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `carritoID` int(11) NOT NULL,
  `usuarioID` int(11) NOT NULL,
  `tarjetaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`carritoID`, `usuarioID`, `tarjetaID`) VALUES
(4, 2, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_juegos`
--

CREATE TABLE `carrito_juegos` (
  `carritoID` int(11) NOT NULL,
  `juegoID` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios_juegos`
--

CREATE TABLE `comentarios_juegos` (
  `comentarioJuegoID` int(11) NOT NULL,
  `UsuarioID` int(11) NOT NULL,
  `JuegoID` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comentarios_juegos`
--

INSERT INTO `comentarios_juegos` (`comentarioJuegoID`, `UsuarioID`, `JuegoID`, `comentario`, `fecha`) VALUES
(4, 2, 20, 'Juegalo por favor Obra Maestra', '2024-04-18 23:46:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios_noticias`
--

CREATE TABLE `comentarios_noticias` (
  `comentarioNoticiaID` int(11) NOT NULL,
  `noticiaDetalleID` int(11) NOT NULL,
  `usuarioID` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comentarios_noticias`
--

INSERT INTO `comentarios_noticias` (`comentarioNoticiaID`, `noticiaDetalleID`, `usuarioID`, `comentario`, `fecha`) VALUES
(9, 1, 2, 'ejemplo', '2024-04-16 20:59:00'),
(11, 1, 2, 'comentario final', '2024-04-16 21:20:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desarrolladores`
--

CREATE TABLE `desarrolladores` (
  `desarrolladorID` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `desarrolladores`
--

INSERT INTO `desarrolladores` (`desarrolladorID`, `nombre`) VALUES
(1, 'Respawn'),
(2, 'Valve'),
(3, 'Zeekerss'),
(4, 'Frictional Games'),
(5, 'Insomniac Games'),
(6, 'Team Cherry'),
(7, 'KOJIMA PRODUCTIONS'),
(8, 'Arrowhead Game Studios'),
(9, 'FromSoftware'),
(10, 'Santa Monica Studio'),
(11, 'Arkane Studios'),
(12, 'NEOWIZ'),
(13, 'Square Enix'),
(14, 'KOEI TECMO GAMES CO'),
(15, 'Gearbox Software'),
(16, '2K'),
(17, 'Avalanche Software'),
(18, 'Endnight Games Ltd'),
(19, 'CD PROJECKT RED'),
(20, 'Pocketpair'),
(21, 'Larian Studios'),
(22, 'SgtOkiDoki'),
(23, 'Rockstar'),
(24, 'Bohemia Interactive'),
(25, 'Facepunch Studios'),
(26, 'CAPCOM'),
(27, 'MrFatcat'),
(28, 'Nokta Games'),
(29, 'Mobius Digital'),
(30, 'ConcernedApe'),
(31, 'Mundfish'),
(32, 'Crytek'),
(33, 'Irrational Games'),
(34, 'Electronics Arts'),
(35, 'Visceral Games'),
(36, 'Motive'),
(37, 'Unknown Worlds Entertainment'),
(38, 'VOID Interactive'),
(39, 'Techland'),
(40, 'Nightdive Studios'),
(41, 'Hello Games'),
(42, 'Re-Logic'),
(43, 'Iron Gate AB'),
(44, 'Teyon'),
(45, 'Behaviour Interactive Inc.'),
(46, 'Ghost Ship Games'),
(47, 'Turtle Rock Studios'),
(48, 'id Software'),
(49, 'Arsi \"Hakita\" Patata'),
(50, 'Ubisoft'),
(51, 'DICE'),
(52, 'Lucas Pope'),
(53, 'LocalThunk'),
(54, 'Bend Studio'),
(55, 'MINTROCKET'),
(56, 'Pathea Games'),
(57, 'Ghost Town Games Ltd'),
(58, 'SadSquare Studio '),
(59, 'Sumo Digital'),
(60, 'Norsfell'),
(61, 'Sports Interactive'),
(62, 'Kite Games'),
(63, 'The Chinese Room'),
(64, 'Cat Play Studio'),
(65, 'Naughty Dog'),
(66, 'IO Interactive A/S'),
(67, 'Crowbar Collective'),
(68, 'Aspyr'),
(69, 'Team17'),
(70, 'Remedy Entertainment'),
(71, 'Wube Software LTD.'),
(72, 'Avalanche Studios'),
(73, 'Tripwire Interactive'),
(74, 'ZeniMax Online Studios'),
(75, 'SOUTHPAW GAMES'),
(76, 'Interplay Inc.'),
(77, 'Black Isle Studios'),
(78, '14° East'),
(79, 'Bethesda'),
(80, 'Obsidian Entertainment'),
(81, 'DONTNOD Entertainment'),
(82, 'Ludeon Studios'),
(83, 'Crystal Dynamics'),
(84, 'TT Games'),
(85, 'Coolhand Interactive'),
(86, 'LucasArts'),
(87, 'Totally Games'),
(88, 'Lucasfim'),
(89, 'Ensemble Studios'),
(90, 'Raven Software'),
(91, 'BioWare'),
(92, 'Pandemic Studios'),
(93, 'Traveller\'s Tales'),
(94, 'Petroglyph'),
(95, 'Square Enix'),
(96, 'Vicarius Visions'),
(97, 'Toys for Bob'),
(98, 'C Prompt Games'),
(99, 'Rocksteady Studios'),
(100, 'Climax Studios'),
(101, 'Massive Entertainment'),
(102, 'Red Storm Entertainment'),
(103, 'Infinity Ward'),
(104, 'Treyarch'),
(105, 'QLOC'),
(107, 'Supergiant Games'),
(108, 'Studio MDHR'),
(109, 'Creative Assembly'),
(110, 'Perfuse Entertainment');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editores`
--

CREATE TABLE `editores` (
  `editorID` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `editores`
--

INSERT INTO `editores` (`editorID`, `nombre`) VALUES
(1, 'Electronic Arts'),
(2, 'Valve'),
(3, 'Zeekerss'),
(4, 'Frictional Games'),
(5, 'PlayStation'),
(6, 'Team Cherry'),
(7, '505 Games'),
(8, 'Activision'),
(9, 'Bethesda'),
(10, 'NEOWIZ'),
(11, 'Square Enix'),
(12, 'KOEI TECMO GAMES CO'),
(13, '2K'),
(14, 'Warner Bros. Games'),
(15, 'Endnight Games Ltd'),
(16, 'Newnight'),
(17, 'CD PROJECKT RED'),
(18, 'Pocketpair'),
(19, 'Larian Studios'),
(20, 'FromSoftware'),
(21, 'SgtOkiDoki'),
(22, 'Rockstar'),
(23, 'Bohemia Interactive'),
(24, 'Facepunch Studios'),
(25, 'CAPCOM'),
(26, 'MrFatcat'),
(27, 'Nokta Games'),
(28, 'Annapurna Interactive'),
(29, 'ConcernedApe'),
(30, 'Focus Entertainment'),
(31, 'Crytek'),
(32, 'Electronics Arts'),
(33, 'Unknown Worlds Entertainment'),
(34, 'VOID Interactive'),
(35, 'Techland'),
(36, 'Prime Matter'),
(37, 'Nightdive Studios'),
(38, 'Hello Games'),
(39, 'Re-Logic'),
(40, 'Coffee Stain Publishing'),
(41, 'Nacon'),
(42, 'Behaviour Interactive Inc.'),
(43, 'Coffee Stain Publishing'),
(45, 'New Blood Interactive'),
(46, 'Ubisoft'),
(47, '3909'),
(48, 'Playstack'),
(49, 'MINTROCKET'),
(50, 'Pathea Games'),
(51, 'Team17'),
(52, 'SadSquare Studio '),
(53, 'Gun Interactive'),
(54, 'Gearbox Publishing'),
(55, 'SEGA'),
(56, 'Kalypso Media'),
(58, 'Cat Play Studio'),
(59, 'IO Interactive A/S'),
(60, 'Crowbar Collective'),
(61, 'Aspyr'),
(62, 'Wube Software LTD.'),
(63, 'Tripwire Interactive'),
(64, 'NEOWIZ'),
(65, 'Focus Entertainment'),
(66, 'Ludeon Studios'),
(67, 'Crystal Dynamics'),
(68, 'LucasArts'),
(69, 'Square Enix'),
(70, 'Paradox Interactive'),
(72, 'Activision'),
(73, 'FromSoftware'),
(74, 'Bandai Namco Entertainment'),
(75, 'Supergiant Games'),
(76, 'Studio MDHR'),
(77, 'Creative Assembly'),
(78, 'Perfuse Entertainment');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `generoID` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`generoID`, `nombre`) VALUES
(1, 'Acción'),
(2, 'Tipo Dark Souls'),
(3, 'Aventura'),
(4, 'Plataformas'),
(5, 'Primera persona'),
(6, 'Ciencia ficción'),
(7, 'Terror'),
(8, 'Survival Horror'),
(9, 'Metroidvania'),
(10, 'Superhéroes'),
(11, 'Mundo Abierto'),
(12, 'Buena Trama'),
(13, 'Simulador de caminar'),
(14, 'Disparos'),
(15, 'Simulador inmersivo'),
(16, 'Hack and slash'),
(17, 'Rol'),
(18, 'Puzzles'),
(20, 'Survival'),
(21, 'Ciberpunk'),
(22, 'Dragones y Mazmorras'),
(23, 'Fantasía oscura'),
(24, 'FPS'),
(25, 'Militares'),
(26, 'Crimen'),
(27, 'Zombis'),
(28, 'Gestión'),
(29, 'Exploración'),
(30, 'Pixelados'),
(31, 'Fútbol'),
(32, 'Deportes'),
(33, 'e-sports'),
(34, 'Enanos'),
(35, 'Retro'),
(36, 'Juegos de cartas'),
(37, 'Roguelike'),
(38, 'Casuales'),
(39, 'Roguelite'),
(40, 'Estrategia'),
(41, 'Sigilo'),
(42, 'Posapocalípticos'),
(43, 'LEGO'),
(44, 'Fantasía'),
(45, 'MMORPG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

CREATE TABLE `juegos` (
  `JuegoID` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_salida` date NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`JuegoID`, `nombre`, `descripcion`, `fecha_salida`, `precio`) VALUES
(1, 'STAR WARS Jedi Survivor™', 'La historia de Cal Kestis continúa en Star Wars Jedi: Survivor™, un juego de acción y aventuras en tercera persona desarrollado por Respawn Entertainment en colaboración con Lucasfilm Games. Este título para un jugador centrado en la historia retoma la aventura 5 años después de los acontecimientos de Star Wars Jedi: Fallen Order™ y sigue la lucha cada vez más desesperada de Cal mientras la galaxia se hunde en la oscuridad. Empujado al exilio por culpa del Imperio, deberá guardarse de nuevas y viejas amenazas. Como uno de los últimos Caballeros Jedi, debe hacer frente a los tiempos más oscuros de la galaxia, pero ¿hasta dónde está dispuesto a llegar para protegerse a sí mismo, a su tripulación y al legado de la Orden Jedi?', '2023-04-23', 69.99),
(2, 'Portal', 'Portal™ es la nueva aventura para un solo jugador de Valve. Ambientado en los misteriosos laboratorios de Aperture Science, Portal ha sido calificado como uno de los juegos más innovadores de los últimos tiempos y ofrece incontables horas de rompecabezas nunca vistos.\r\n\r\nEl juego está diseñado para cambiar radicalmente el modo en que los jugadores enfocan, sopesan y reaccionan a las circunstancias en un entorno determinado, al igual que la pistola antigravedad abrió un nuevo mundo de posibilidades a la hora de manipular objetos.\r\n\r\nLos jugadores deben resolver rompecabezas y desafíos basados en las leyes físicas abriendo portales y desplazando objetos, o incluso sus propios avatares, a través del espacio.', '2007-10-10', 19.50),
(3, 'Lethal Company', 'Eres un trabajador contratado por la Empresa. Su trabajo consiste en recolectar chatarra de lunas industrializadas abandonadas para cumplir con la cuota de ganancias de la Compañía. Puedes usar el dinero que ganes para viajar a lunas nuevas con mayores riesgos y recompensas, o puedes comprar trajes elegantes y decoraciones para tu barco. Experimenta la naturaleza, escaneando cualquier criatura que encuentres para agregarla a tu bestiario. Explora los maravillosos espacios al aire libre y hurga en sus zonas más abandonadas, de acero y hormigón. Nunca te pierdas la cuota.', '2023-10-23', 9.75),
(4, 'SOMA', 'SOMA es un videojuego de terror y ciencia ficción de Frictional Games, los creadores de Amnesia: the Dark Descent. Se trata de una historia inquietante sobre la identidad, la conciencia y lo que significa ser humano.\r\n\r\nLa radio no funciona, la comida escasea y las máquinas han comenzado a creerse que son personas. La instalación sumergida PATHOS-II ha sufrido un aislamiento terrible y se tendrán que tomar decisiones difíciles. ¿Qué hacer? ¿Qué tiene sentido? ¿Qué queda por lo que luchar?\r\n\r\nEntra en el mundo de SOMA y enfréntate a los horrores sumergidos en las profundidades del océano. Hurga entre terminales cerradas y documentos secretos para descubrir la verdad que se oculta tras el caos. Busca a los últimos habitantes y participa en los sucesos que en último término darán forma al destino de la estación. Pero ten cuidado, el peligro se esconde en cada esquina: humanos corruptos, criaturas retorcidas, robots locos e incluso una I.A. inescrutable y omnipresente.\r\nNecesitarás averiguar cómo lidiar con cada uno. Recuerda simplemente que no hay marcha atrás, o vences a tus enemigos o prepárate para correr.', '2015-09-22', 28.99),
(5, 'Hollow Knight', 'Bajo la deteriorada ciudad de Petrópolis yace un antiguo reino en ruinas. A muchos les atrae la vida bajo la superficie y van en busca de riquezas, gloria o respuestas a viejos enigmas.\r\n\r\nHollow Knight es una aventura de acción clásica en 2D ambientada en un vasto mundo interconectado. Explora cavernas tortuosas, ciudades antiguas y páramos mortales. Combate contra criaturas corrompidas, haz amistad con extraños insectos y resuelve los antiguos misterios que yacen en el corazón de reino.', '2017-02-24', 14.79),
(6, 'Marvels Spider-Man Remastered', 'Marvel\'s Spider-Man Remasterizado para PC ha sido desarrollado por Insomniac Games en colaboración con Marvel y optimizado para PC por Nixxes Software. El protagonista es un Peter Parker veterano que ha pulido sus habilidades en la lucha contra el crimen y los villanos en la Nueva York de Marvel. A su vez, también lucha por poner en orden su caótica vida personal y su carrera, con el destino de la ciudad en sus manos.', '2022-08-12', 59.99),
(7, 'DEATH STRANDING DIRECTORS CUT', 'El legendario creador de videojuegos Hideo Kojima nos ofrece una experiencia que desafía a todos los géneros y que, ahora, se amplía con este DIRECTOR’S CUT definitivo.\r\n\r\nEn el futuro, un misterioso evento conocido como Death Stranding ha abierto una puerta entre los vivos y los muertos, lo que lleva a grotescas criaturas del otro mundo deambulen por un planeta en ruinas habitado por una sociedad desolada.\r\n\r\nEn el papel de Sam Bridges, tendrás la misión de llevar esperanza a la humanidad conectando a los últimos supervivientes de unos Estados Unidos arrasados.\r\n¿Podrás volver a unir, paso a paso, un mundo hecho añicos?', '2022-03-30', 39.99),
(8, 'HELLDIVERS™ 2', 'HELLDIVERS™ 2 es un juego de disparos por equipos en tercera persona en el que las fuerzas de élite de los Helldivers luchan por ganar un conflicto intergaláctico y liberar a la galaxia de las crecientes amenazas alienígenas. Desde una perspectiva en tercera persona, los jugadores utilizan diversas armas (pistolas, ametralladoras, lanzallamas) y estratagemas (torretas, ataques aéreos, etc.) para disparar y eliminar a las fuerzas enemigas. El combate incluye la sangre y el desmembramiento de las fuerzas alienígenas. También se pueden ver las salpicaduras de sangre y los desmembramientos de los jugadores que sean alcanzados por explosiones del entorno o por fuego amigo. Los campamentos enemigos y los entornos del campo de batalla tienen manchas de sangre y cadáveres desmembrados.', '2024-02-08', 39.99),
(9, 'Sekiro™ Shadows Die Twice - GOTY Edition', 'En Sekiro™: Shadows Die Twice encarnas al \'lobo manco\', un guerrero desfigurado y caído en desgracia que ha sido rescatado al borde de la muerte. Tras jurar proteger a un joven señor descendiente de un antiguo linaje, te conviertes en el objetivo de despiadados enemigos, entre ellos el peligroso clan Ashina. Cuando el joven señor sea capturado, nada te detendrá en tu peligrosa aventura por restituir tu honor, ni siquiera la muerte.\r\n\r\nExplora el Japón de la era Sengoku de finales del siglo XVI, un brutal periodo de constante conflicto, mientras te enfrentas a inconmensurables enemigos en un mundo oscuro y tortuoso. Despliega un arsenal de instrumentos protésicos letales y poderosas habilidades ninja, al mismo tiempo que combinas el sigilo, la verticalidad y transversalidad, y los viscerales combates cara a cara en una sangrienta confrontación.\r\n\r\nVéngate. Restituye tu honor. Mata con ingenio.', '2019-03-21', 59.99),
(10, 'God of War', 'Entra en los dominios nórdicos\r\nKratos ha dejado atrás su venganza contra los dioses del Olimpo y vive ahora como un hombre en los dominios de los dioses y monstruos nórdicos. En este mundo cruel e implacable debe luchar para sobrevivir… y enseñar a su hijo a hacerlo también.\r\n\r\nAprovecha una segunda oportunidad\r\nKratos vuelve a ser padre. Como progenitor y protector de Atreus, un hijo decidido a ganarse el respeto del padre, Kratos debe sobrevivir en un mundo muy peligroso dominando y controlando la ira que tanto lo ha caracterizado.\r\n\r\nViaja a un mundo oscuro y elemental de criaturas temibles\r\nEste entorno inequívocamente nuevo, con su propio panteón de criaturas, monstruos y dioses, nos lleva desde las columnas de mármol del fastuoso Olimpo hasta los bosques agrestes, las montañas y las cuevas de la tradición nórdica anterior a los vikingos.\r\n\r\nLucha en combates físicos y viscerales\r\nCon una cámara al hombro que acerca al jugador a la acción más que antes, las peleas de God of War™ son un reflejo del panteón de criaturas nórdicas que encontrará Kratos: grandiosas, duras y extenuantes. La nueva arma principal y las nuevas habilidades mantienen el espíritu que define la saga God of War y presentan una visión del conflicto que renueva el género.', '2022-01-14', 49.99),
(11, 'Prey', '\r\nEn Prey te despertarás a bordo de la Talos I, una estación espacial en órbita alrededor de la Luna en el año 2032. Eres el sujeto clave de un experimento que espera cambiar la humanidad para siempre... pero las cosas se han complicado de forma terrible. La estación espacial ha sido invadida por alienígenas hostiles que quieren darte caza. Mientras investigas los oscuros secretos de la Talos I y de tu propio pasado, tendrás que sobrevivir gracias a las herramientas que encuentres en la estación, así como a tu ingenio, armas e increíbles habilidades. El destino de Talos I y de todos los que están a bordo se encuentra en tus manos.', '2017-05-04', 29.99),
(12, 'STAR WARS Jedi La Orden caída™', 'Una aventura de dimensiones galácticas te espera en Star Wars Jedi: Fallen Order, un juego de aventuras y acción en tercera persona de Respawn Entertainment. Este título para un jugador centrado en la historia te pone en la piel de un padawan Jedi que ha escapado a duras penas de la purga de la Orden 66 después del Episodio III: La venganza de los Sith. Para reconstruir la Orden Jedi, deberás reunir los fragmentos de tu pasado para completar tu entrenamiento, desarrollar nuevas y poderosas habilidades con la Fuerza y dominar la espada láser antes de que el Imperio y sus mortíferos inquisidores te alcancen.\r\n\r\nMientras perfeccionan sus habilidades, los jugadores lucharán con espadas láser y poderes de la Fuerza en combates cinematográficos que recrean la intensidad las películas de Star Wars. Deberán crear estrategias para enfrentarse a sus enemigos, valorar sus debilidades y fortalezas, y emplear su entrenamiento Jedi para derrotarlos y resolver los misterios que encuentren en su camino.\r\n\r\nLos aficionados de Star Wars reconocerán ubicaciones, armas, equipo y enemigos emblemáticos de la saga, y descubrirán un elenco de personajes, escenarios, criaturas, droides y adversarios nuevos. En esta nueva historia de Star Wars, te sumergirás en una galaxia que acaba de caer en las garras del Imperio y lucharás por sobrevivir como un Jedi fugitivo mientras exploras los misterios de una civilización perdida hace tiempo para reconstruir la Orden antes de que el Imperio extermine a los Jedi.', '2019-11-15', 39.99),
(13, 'Portal 2', 'Portal 2 continúa con esa fórmula ganadora consistente en una innovadora mecánica de juego, historia y música que condujeron al Portal original a ganar más de 70 galardones y lo convirtieron en un nuevo mito de la industria.\r\n\r\nEn el modo de un jugador de Portal 2 conoceremos a un nuevo elenco de personajes, gran cantidad de innovadores puzles y un número mucho mayor de enrevesadas salas de pruebas. Los jugadores podrán explorar zonas de Aperture Science Labs nunca vistas anteriormente y volverán a encontrarse a GLaDOS, ese compañero computerizado, y en ocasiones con tendencias asesinas, que los guio a lo largo del juego original.\r\n\r\nEl modo cooperativo para dos jugadores tiene su propia campaña totalmente independiente, con una historia única, salas de pruebas y dos nuevos personajes con los que podremos jugar. Este nuevo modo obliga a los jugadores a reconsiderar todo lo que creían saber acerca de los portales. Para tener éxito no solo deberán trabajar codo con codo, sino que también tendrán que pensar de forma cooperativa.', '2011-04-11', 9.75),
(14, 'Marvels Spider-Man Miles Morales', 'Tras los acontecimientos de Marvel’s Spider-Man Remasterizado, el adolescente Miles Morales se adapta a su nuevo barrio al tiempo que sigue los pasos de Peter Parker, su mentor, para convertirse en un nuevo Spider-Man. Pero cuando una feroz lucha de poderes amenaza con destruir su nuevo hogar, el aspirante a héroe se da cuenta de que un gran poder conlleva una gran responsabilidad. Para salvar la Nueva York de Marvel, Miles debe tomar el relevo de Spider-Man y estar a la altura.', '2022-11-18', 49.99),
(15, 'Lies of P', 'Eres una marioneta creada por Geppetto, atrapada en una red de mentiras junto a monstruos inimaginables y personajes poco fiables que se interpondrán en tu camino mientras trata de resolver los sucesos que han ocurrido en el mundo de Lies of P.\r\n\r\nTe despierta una voz misteriosa que te guía a través de Krat, una ciudad antaño bulliciosa que ahora ha sido infestada por la locura y la sed de sangre. En este juego soulslike deberás adaptarte y ajustar tus armas para enfrentarte a horrores indescriptibles, desentrañar los secretos inconmensurables de la élite de la ciudad y elegir si enfrentarte a los dilemas con la verdad o con mentiras para superarlos y descubrir quién eres.\r\n', '2023-09-18', 59.99),
(16, 'NieR Automata™', 'NieR: Automata narra la historia de los androides 2B, 9S y A2, que luchan para recuperar el mundo distópico dirigido por las máquinas que han invadido unas poderosas formas de vida mecánicas.\r\n\r\nUnos alienígenas mecanizados han invadido la Tierra, obligando a la humanidad a abandonarla. En un último intento por recuperar el planeta, la resistencia humana envía un ejército de soldados androides para acabar con los invasores. La guerra entre las máquinas y los androides se vuelve cada vez más encarnizada. Una guerra que pronto pondrá al descubierto la verdad sobre este mundo...', '2017-03-17', 39.99),
(17, 'Nioh 2 – The Complete Edition', 'Vive la emoción de enfrentarte a hordas de temibles yokai en este brutal RPG de acción masocore. Crea a tu protagonista original y emprende una aventura a través de devastados paisajes del Japón del período de Sengoku.\r\n\r\nAl igual que la anterior entrega, que gozó de gran popularidad entre críticos y jugadores por igual, Nioh 2 ofrece una historia original profunda centrada en los comandantes militares del período de Sengoku. Además, en Nioh 2 puedes ir más allá del anterior juego y desatar el nuevo poder de Forma Yokai, con el que te transformarás para hacer frente al poder de los mayores yokai. Otra novedad de Nioh 2 es que tus enemigos pueden crear un Reino Oscuro, lo que eleva las apuestas y ofrece un nuevo reto para tu personaje. Enfréntate a temibles monstruos y desata tu oscuridad en el mundo de Nioh 2.\r\n', '2021-02-05', 59.99),
(18, 'Borderlands 3', '¡Vuelve el padre de los shooter-looter, con tropecientas mil armas y una aventura caótica! Arrasa a tus enemigos y descubre mundos inéditos con uno de los cuatro nuevos buscacámaras. Juega solo o con amigos para derribar a adversarios increíbles, hacerte con montones de botín y salvar tu hogar de la secta más cruel de la galaxia.', '2020-03-13', 59.99),
(19, 'Amnesia The Dark Descent', 'Los últimos recuerdos se desvanecen en las tinieblas. Tu mente es un caos y lo único que queda es esa sensación de ser la presa. Debes escapar.\r\nDespierta...\r\nAmnesia: The Dark Descent es un juego de horror y supervivencia en primera persona. Un juego sobre la inmersión, el descubrimiento y la vida dentro de una pesadilla. Una experiencia que te helará la sangre.\r\nVas tropezando por los estrechos pasillos cuando escuchas un grito en la lejanía.\r\nSe está acercando.\r\nExplora...\r\nAmnesia: The Dark Descent te pone en las botas de Daniel, que despierta en un lúgubre castillo recordando a duras penas algún destello sobre su pasado. Además de explorar los fantasmagóricos senderos, deberás implicarte en los perturbados recuerdos de Daniel. El horror no sólo viene del exterior, también puebla su atormentada mente. Te aguarda una inquietante odisea por los más oscuros rincones de la mente humana.\r\n¿Ese sonido es de pies que se arrastran?. ¿O tu mente te está jugando una mala pasada?\r\nExperimenta...\r\nMediante un mundo totalmente simulado a nivel físico, gráficos 3D de última generación y un sistema dinámico de sonido, el juego no escatima recursos para tratar de absorberte. Una vez que empieces, tendrás el control absoluto de principio a fin. No hay escenas cinemáticas ni saltos en el tiempo, todo lo que ocurra lo vivirás de primera mano.\r\nAlgo emerge de la oscuridad. Se aproxima. Con rapidez.\r\nSobrevive...\r\nAmnesia: The Dark Descent te lanza de cabeza a un mundo peligroso donde los problemas te acechan tras cada esquina. Sólo te puedes defender escondiéndote, corriendo o utilizando tu buen juicio.\r\n¿Tienes lo que hay que tener para sobrevivir?', '2010-09-08', 19.50),
(20, 'BioShock™', 'BioShock es un shooter distinto a todos los que has jugado antes, lleno de armas y tácticas nunca vistas. Tendrás un completo arsenal a tu disposición: desde sencillos revólveres a lanzagranadas y lanzadores de productos químicos, pero también estarás obligado a modificar tu ADN para crear un arma mucho más mortífera: tú. Al inyectarte plásmidos conseguirás superpoderes: lanza descargas eléctricas al agua para electrocutar múltiples enemigos, o congélalos en un bloque de hielo para hacerlos pedazos con un golpe de llave inglesa.\r\nNingún encuentro se juega de la misma manera, ni dos jugadores jugarán igual.', '2007-08-21', 19.99),
(21, 'Hogwarts Legacy', 'Hogwarts Legacy es un RPG de acción en un mundo abierto ambientado en el universo de los libros de Harry Potter. Embárcate en un viaje que te llevará a lugares nuevos y ya conocidos, y en el que podrás descubrir animales fantásticos, personalizar a tu personaje, elaborar pociones, dominar hechizos, mejorar tus habilidades y convertirte en la bruja o el mago que quieras ser.', '2023-02-10', 59.99),
(22, 'The Forest', 'Como único superviviente de un accidente de avión de pasajeros, te encuentras en un bosque misterioso luchando por sobrevivir contra una sociedad de mutantes caníbales.\r\n\r\nConstruye, explora y sobrevive en este aterrador simulador de terror y supervivencia en primera persona.', '2018-04-20', 16.79),
(23, 'Sons Of The Forest', 'Enviado a buscar a un multimillonario desaparecido en una isla remota, te encuentras en un infierno infestado de caníbales. Crea, construye y lucha por sobrevivir, solo o con amigos, en este nuevo y aterrador simulador de terror y supervivencia de mundo abierto.\r\nUn simulador de terror de supervivencia\r\n\r\nExperimenta total libertad para afrontar el mundo como quieras. Tú decides qué hacer, adónde ir y cuál es la mejor manera de sobrevivir. No hay ningún NPC que te grite órdenes ni te dé misiones que no quieras hacer. Tú das las órdenes, tú eliges lo que sucede después.\r\nLuchar contra los demonios\r\n\r\nEntra en un mundo donde ningún lugar es seguro y lucha contra una variedad de criaturas mutadas, algunas que son casi humanas y otras que no se parecen a nada que hayas visto antes. Armado con pistolas, hachas, porras paralizantes y más, protégete a ti mismo y a tus seres queridos.\r\nConstruir y crear\r\n\r\nSiente cada interacción; Rompe palos para hacer fuego. Utilice un hacha para cortar ventanas y pisos. Construya una pequeña cabaña o un complejo junto al mar, la elección es suya.\r\nCambio de estaciones\r\n\r\nArranque salmón fresco directamente de los arroyos en primavera y verano. Recoge y almacena carne para los fríos meses de invierno. No estás solo en esta isla, así que a medida que llega el invierno y los alimentos y los recursos escasean, no serás el único que busque comida.\r\nJuego cooperativo\r\n\r\nSobrevive solo o con amigos. Comparta elementos y trabajen juntos para construir defensas. Traiga refuerzos para explorar por encima y por debajo del suelo.', '2024-02-22', 28.99),
(24, 'Cyberpunk 2077', 'Cyberpunk 2077 es un RPG de aventura y acción de mundo abierto ambientado en la megalópolis de Night City, donde te pondrás en la piel de un mercenario o una mercenaria ciberpunk y vivirás su lucha a vida o muerte por la supervivencia. Mejorado y con contenido nuevo adicional gratuito. Personaliza tu personaje y tu estilo de juego a medida que aceptas trabajos, te labras una reputación y desbloqueas mejoras. Las relaciones que forjes y las decisiones que tomes darán forma al mundo que te rodea. Aquí nacen las leyendas. ¿Cuál será la tuya?', '2020-12-10', 59.99),
(25, 'Palworld', 'P. ¿Qué clase de juego es?\r\n\r\nR. ¿Quieres vivir tranquilamente con estas misteriosas criaturas, los Pals, o prefieres lanzarte a la aventura y luchar contra cazadores furtivos?\r\n\r\nLos Pals pueden luchar, procrear, ayudarte en las labores agrícolas y trabajar en fábricas.\r\nTambién puedes venderlos, despedazarlos y comértelos.\r\n', '2024-01-19', 28.99),
(26, 'Baldurs Gate 3', 'Reúne a tu grupo y regresa a los Reinos Olvidados en una historia de compañerismo, traición, sacrificio, supervivencia y la atracción de un poder absoluto.\r\n\r\nUnas misteriosas aptitudes empiezan a surgir en tu interior por obra de un parásito de los azotamentes que te han implantado en el cerebro. Resístete y vuelve a la oscuridad contra sí misma o abraza la corrupción y conviértete en el mal supremo.\r\n\r\nDe manos de los creadores de Divinity: Original Sin 2, llega un juego de rol para la nueva generación de consolas, ambientado en el mundo de Dungeons & Dragons.', '2023-08-03', 59.99),
(27, 'ELDEN RING', 'EL NUEVO JUEGO DE ROL Y ACCIÓN DE AMBIENTACIÓN FANTÁSTICA.\r\nÁlzate, Sinluz, y que la gracia te guíe para abrazar el poder del Círculo de Elden y encumbrarte como señor del Círculo en las Tierras Intermedias.\r\n\r\n• Un extenso mundo lleno de emociones\r\nUn vasto mundo perfectamente conectado en el que los territorios abiertos estarán repletos de situaciones y mazmorras enormes con diseños complejos y tridimensionales. Mientras exploras, experimentarás el deleite de descubrir amenazas desconocidas y sobrecogedoras, y eso te haré sentir la emoción de la superación.\r\n\r\n• Crea tu propio personaje\r\nAdemás de personalizar la apariencia de tu personaje, puedes combinar libremente las armas, armaduras y la magia que te equipas. Puedes desarrollar a tu personaje según tu estilo de juego, tanto para aumentar tu fuerza bruta y ser un guerrero poderoso, como para dominar la magia.\r\n\r\n• Un drama épico nacido de un mito\r\nUna historia muy profunda contada en fragmentos. Un drama épico en el que las motivaciones de cada personaje se encuentran en las Tierras Intermedias.\r\n\r\n• Jugabilidad online única que te conecta libremente con otros jugadores\r\nAdemás del multijugador, en el que te puedes conectar directamente con otros jugadores y viajar juntos, el juego incluye un elemento online asíncrono único que te permite sentir la presencia de otros.', '2022-02-25', 59.99),
(28, 'BattleBit Remastered', 'BattleBit Remastered apuesta por una experiencia caótica de shooter en primera persona multijugador masivo online.\r\n', '2023-06-15', 14.79),
(29, 'Grand Theft Auto V', 'Cuando un joven estafador callejero, un ladrón de bancos retirado y un psicópata aterrador se ven involucrados con lo peor y más desquiciado del mundo criminal, del gobierno de los EE. UU. y de la industria del espectáculo, tendrán que llevar a cabo una serie de peligrosos golpes para sobrevivir en una ciudad implacable en la que no pueden confiar en nadie. Y mucho menos los unos en los otros.\r\n\r\nGrand Theft Auto V para PC ofrece a los jugadores la opción de explorar el galardonado mundo de Los Santos y el condado de Blaine con una resolución de 4K y disfrutar del juego a 60 fotogramas por segundo.\r\n\r\nEl juego cuenta con múltiples y variadas opciones de personalización específicas para ordenadores, con más de 25 ajustes configurables distintos para la calidad de las texturas, shader, teselado, antialiasing y muchos otros elementos, además de opciones de personalización del ratón y el teclado. También es posible modificar la densidad de población para controlar el tráfico de vehículos y peatones, y es compatible con dos y tres monitores, 3D y mandos \"\"plug-and-play\"\".\r\n\r\nGrand Theft Auto V para PC también incluye Grand Theft Auto Online, compatible con 30 jugadores y dos espectadores. Grand Theft Auto Online para PC incluirá todas las mejoras y contenidos creados por Rockstar desde la fecha de lanzamiento de Grand Theft Auto Online, incluidos los golpes y los modos Adversario.\r\n\r\nLa versión para PC de Grand Theft Auto V y Grand Theft Auto Online incluye la vista en primera persona, que ofrece a los jugadores la posibilidad de explorar todos los detalles del mundo de Los Santos y el condado de Blaine de una forma totalmente nueva.\r\n\r\nGrand Theft Auto V para PC también cuenta con el nuevo editor Rockstar, un conjunto de herramientas que permite grabar, editar y compartir vídeos de Grand Theft Auto V y Grand Theft Auto Online de manera rápida y sencilla. Gracias al modo director del editor Rockstar, los jugadores pueden dar vida a sus ideas y crear escenas con personajes del juego, peatones e incluso animales. El editor cuenta con técnicas avanzadas de movimiento de cámara, efectos de edición como imágenes a cámara lenta o rápida, varios filtros de cámara, la posibilidad de añadir canciones de las emisoras de radio de GTA V o controlar de forma dinámica la intensidad de la música del juego. Los vídeos terminados pueden subirse directamente a YouTube y al Social Club de Rockstar Games desde el editor Rockstar para compartirlos de manera sencilla.\r\n\r\nThe Alchemist y Oh No, compositores de la banda sonora, son los locutores de la nueva radio del juego, \"\"The Lab FM\"\", que emite canciones nuevas y exclusivas de estos dos artistas inspiradas en la música original del juego. También colaboran otros artistas invitados como Earl Sweatshirt, Freddie Gibbs, Little Dragon, Killer Mike y Sam Herring de Future Islands, por mencionar algunos. Los jugadores también pueden descubrir Los Santos y el condado de Blaine mientras escuchan su propia música en \"\"Tu radio\"\", una nueva emisora con una banda sonora creada y personalizada por el jugador.\r\n', '2015-04-14', 39.98),
(30, 'Red Dead Redemption 2', 'América, 1899.\r\n\r\nArthur Morgan y la banda de Van der Linde se ven obligados a huir. Con agentes federales y los mejores cazarrecompensas de la nación pisándoles los talones, la banda deberá atracar, robar y luchar para sobrevivir en su camino por el escabroso territorio del corazón de América. Mientras las divisiones internas aumentan y amenazan con separarlos a todos, Arthur deberá elegir entre sus propios ideales y la lealtad a la banda que lo vio crecer.\r\n\r\nCon contenido adicional para el Modo Historia y un completo modo Foto, Red Dead Redemption 2 también incluye acceso gratuito al mundo multijugador compartido de Red Dead Online, en el que los jugadores asumen diversos roles para ganarse la vida a su manera en la frontera mientras persiguen a fugitivos buscados como cazarrecompensas, crean un negocio como comerciantes, descubren exóticos tesoros como coleccionistas, dirigen una destilería ilegal como licoristas y muchas cosas más.\r\n\r\nGracias a las nuevas mejoras gráficas y técnicas que permiten una mayor inmersión en el juego, Red Dead Redemption 2 para PC aprovecha al máximo la potencia de los equipos para conseguir que todos y cada uno de los aspectos de este gigantesco mundo lleno de detalles cobren vida. Incluye mayores distancias de dibujado; iluminación global y oclusión ambiental de mayor calidad, para mejorar la luz tanto de día como de noche; reflejos mejorados y sombras más profundas y de mayor resolución a todas las distancias; texturas de árboles teseladas y texturas de hierba y pelaje mejoradas para aumentar el realismo de las plantas y animales.\r\n\r\nRed Dead Redemption 2 para PC también ofrece compatibilidad con HDR, la posibilidad de utilizar pantallas de alta gama (con resoluciones 4K y superiores), configuraciones con varios monitores, con pantalla panorámica, mayores tasas de fotogramas, etc.', '2019-12-05', 59.99),
(31, 'DayZ', 'Tu relato se escribe sin marcadores en el mapa, ni misiones diarias, ni clasificaciones. Lo único que hay es Chernarus: 230 kilómetros cuadrados de un estado postsoviético que se vio afectado por un virus desconocido que convirtió a la mayor parte de la población en infectados rabiosos.\r\n\r\nLa misión es sobrevivir a la caída de la civilización tanto tiempo como puedas. Pero Chernarus es un lugar despiadado en el que la muerte es para siempre. Cuando vuelvas a empezar, tan solo conservarás el recuerdo de un error fatal.\r\n\r\nHasta 60 jugadores a la vez luchan por sobrevivir a toda costa. Haz amigos, mata sin pensarlo, construye una base y arriésgate a que te traicionen por una lata de riquísimas alubias. Usa el chat de voz para interactuar con los demás jugadores cuando lo consideres oportuno. Cada encuentro cuenta cuando tu vida está siempre en juego. Ten cuidado. Mantente alerta. No te fíes de nadie...', '2018-12-13', 39.99),
(32, 'Rust', 'El único objetivo en Rust es sobrevivir. Todo quiere que mueras: la vida salvaje de la isla y otros habitantes, el medio ambiente y otros supervivientes. Haz lo que sea necesario para durar una noche más.\r\n\r\nRust está en su décimo año y ya ha tenido más de 375 actualizaciones de contenido, con un parche de contenido garantizado cada mes. Desde correcciones y mejoras periódicas del equilibrio hasta actualizaciones de gráficos e inteligencia artificial, pasando por agregar contenido como nuevos mapas, instrumentos musicales, trenes y drones, así como temporadas y eventos regulares, siempre sucede algo interesante o peligroso (o ambas cosas) en la isla.', '2018-02-08', 39.99),
(33, 'Dragons Dogma 2', '¡Parte hacia tu gran aventura, Arisen!\r\n\r\nDragon’s Dogma es un juego de rol y acción basado en historia y para un jugador que te permite elegir tu propia experiencia: desde el aspecto de tu Arisen, a tu vocación, tu grupo, cómo afrontar las diferentes situaciones y mucho más. Ahora, en esta esperada secuela, el increíblemente detallado mundo de fantasía de Dragon’s Dogma 2 está aguardando a que lo explores.\r\n\r\nEn tu viaje, te acompañarán los peones, unos misteriosos seres de otro mundo, en una aventura tan especial que te sentirás como si otros jugadores se hubieran unido a tu misión.\r\n\r\nTodo esto, llevado a otro nivel gracias a los modelos físicos, la inteligencia artificial (IA) y la última tecnología en gráficos, para que el mundo de fantasía de Dragon’s Dogma 2 sea verdaderamente inmersivo.', '2024-03-22', 64.99),
(34, 'Resident Evil 7 Biohazard', 'Resident Evil 7 biohazard es la siguiente gran entrega de la renombrada serie Resident Evil y supone un nuevo hito para la franquicia, puesto que se aprovecha de sus raíces y abre la puerta a una experiencia de miedo realmente terrorífica. Con su gran cambio a la vista en primera persona y un estilo fotorrealista gracias al nuevo motor de Capcom RE Engine, Resident Evil 7 trae un nivel sin precedentes de inmersión que logra una experiencia de terror muy cercana y personal.\r\n\r\nAmbientado en la América rural moderna y continuando la historia de los dramáticos sucesos de Resident Evil® 6, los jugadores experimentarán el terror directamente desde la perspectiva en primera persona. Resident Evil 7 encarna los elementos distintivos de la serie de exploración y atmósfera tensa con los que se acuñó el género de “terror de supervivencia” hace ya veinte años. Ahora, una completa actualización del sistema de juego lleva la experiencia del terror de supervivencia al siguiente nivel.', '2017-01-24', 19.99),
(35, 'Inside the Backrooms', 'Inside the Backrooms es un juego de terror cooperativo online para hasta 4 jugadores, donde tú y tus amigos lucharéis por escapar de los diferentes niveles de las trastiendas, resolviendo diferentes puzles con diferentes mecánicas en cada uno.\r\nEste juego está basado en el famoso creepypasta con muchas referencias reales implementadas, como entidades icónicas y elementos importantes. Tendrás que explorar cada habitación, buscar elementos que te ayuden a seguir avanzando a lo largo del juego y desbloquear nuevas áreas, pero cuanto más avance más peligroso será, deberás prestar mucha atención en el área, identificar cada entidad y Sepa cómo evitarlos si quiere sobrevivir.\r\nBusca suministros, guárdalos en tu inventario, explora todas las habitaciones, resuelve acertijos, desbloquea áreas del mapa, interactúa, intenta recolectar todo lo que encuentres.\r\nEl objetivo principal de Inside the Backrooms es involucrar a los jugadores con su jugabilidad, dificultad y atmósfera. Hay infinidad de habitaciones idénticas con una alfombra vieja y sucia y paredes de color amarillento pálido, donde a primera vista te da una sensación lúgubre y mala donde te das cuenta de que no es un lugar seguro.', '2022-06-20', 6.99),
(36, 'Supermarket Simulator', '\"Supermarket Simulator\" es una escalofriante simulación en primera persona en la que cada detalle de la gestión de un supermercado cobra vida.\r\n\r\nDiseña tu tienda, optimizando la eficiencia y la estética. Determina dónde se exponen los productos, gestiona tus pasillos y garantiza una experiencia de compra fluida para tus clientes.\r\n\r\nOrdena las existencias utilizando un ordenador del juego. Desembala los productos, organízalos en tu almacén y colócalos en estanterías, frigoríficos y congeladores.\r\n\r\nEscanea artículos, acepta pagos en efectivo y con tarjeta de crédito, y asegúrate de que los clientes se van satisfechos con su experiencia de compra y pago.\r\n\r\nNavegue por las complejidades de un mercado en tiempo real. Compre productos cuando los precios bajen y determine los precios más vendidos para equilibrar la satisfacción del cliente con los márgenes de beneficio.\r\n\r\nA medida que acumules beneficios, plantéate reinvertir. Amplía el espacio físico de tu tienda, mejora los interiores y adáptate continuamente a las cambiantes demandas del mundo minorista.\r\n\r\nEn \"Supermarket Simulator\", cada decisión cuenta. ¿Estarás a la altura de las circunstancias, transformando un modesto establecimiento en una potencia del comercio minorista, equilibrando al mismo tiempo la satisfacción del cliente y las finanzas?', '2024-02-20', 12.99),
(37, 'Outer Wilds', 'Outer Wilds, nombrado juego del año 2019 por Giant Bomb, Polygon, Eurogamer y The Guardian, es un galardonado título de mundo abierto, que se desarrolla en un enigmático sistema solar confinado a un bucle temporal infinito.\r\n\r\n¡El programa espacial espera por ti!\r\nEres la nueva incorporación de Outer Wilds Ventures, un programa espacial incipiente que busca respuestas en un sistema solar extraño y en constante evolución.\r\n\r\nLos misterios del sistema solar...\r\n¿Qué acecha en el corazón del peligroso planeta Dark Bramble? ¿Quién o qué construyó las ruinas alienígenas en la Luna? ¿Es posible detener el interminable bucle de tiempo? Todas estas respuestas te aguardan en los rincones más profundos y riesgosos del espacio.\r\n\r\nEl tiempo todo lo cambia...\r\nLos planetas de Outer Wilds se encuentran plagados de ubicaciones ocultas que cambian con el paso del tiempo. Visita una ciudad subterránea antes de que se la trague la arena o explora la superficie de un planeta y observa cómo se cae a pedazos bajo tus propias narices. Unos ambientes peligrosos y las catástrofes naturales guardan cada uno de estos secretos.\r\n\r\n¿Qué esperas? ¡Ve por tu equipo explorador!\r\nCálzate tus botas exploradoras, revisa los niveles de oxígeno y prepárate para aventurarte en el espacio. Usa una variedad de dispositivos exclusivos para investigar tus alrededores, busca y rastrea señales misteriosas, descifra escrituras alienígenas ancestrales y, lo más importante, prepara el malvavisco perfecto.', '2020-06-18', 22.99),
(38, 'Stardew Valley', 'Acabas de heredar la vieja parcela agrícola de tu abuelo de Stardew Valley. Decides partir hacia una nueva vida con unas herramientas usadas y algunas monedas. ¿Te ves capaz de vivir de la tierra y convertir estos campos descuidados en un hogar próspero?\r\n\r\n¡Crea la granja de tus sueños! Constrúyela desde cero en una de las cinco configuraciones del mapa.\r\n¡Domina tu habilidad con la ganadería! Cría animales, siembra cultivos y fabrica maquinaria útil entre muchas más cosas.\r\n¡Únete a la comunidad local! Entabla amistad con más de 30 habitantes de Pelican Town.\r\n¡Personaliza a tu granjero! Podrás elegir entre cientos de opciones de personalización de personajes.\r\n¡Instálate y empieza a formar una familia! Comparte tu vida en la granja con uno de los doce personajes con los que podrás tener una relación.\r\n¡Explora grandes y misteriosas cuevas! Encuentra monstruos peligrosos y tesoros valiosos.', '2016-02-26', 13.99),
(39, 'Atomic Heart', 'Te damos la bienvenida a un mundo utópico, maravilloso y perfecto, en el que los humanos viven en armonía con leales y complacientes robots.\r\n\r\nBueno, al menos, hasta ahora. Apenas quedan unos días para el lanzamiento del más moderno sistema de control de robots y solo un trágico accidente o una conspiración mundial podrían impedirlo...\r\n\r\nEl imparable avance de la tecnología y el desarrollo de experimentos secretos han dado lugar a criaturas mutantes, máquinas aterradoras y robots superpoderosos que, de repente, se han rebelado contra sus creadores. Solo tú puedes detenerlos y averiguar qué hay más allá de este mundo ideal.\r\n\r\nEmplea las habilidades de combate que te otorgan tu guante eléctrico experimental y tu arsenal de armas de filo y de fuego avanzadas para luchar a vida o muerte en encuentros explosivos y frenéticos. Adapta tu estilo de combate a cada rival, combina habilidades y recursos, aprovecha el entorno y mejora el equipamiento para superar retos y luchar por el bien.', '2023-02-20', 59.99),
(40, 'Hunt Showdown', 'Corre el año 1895, y eres un Cazador con la misión de eliminar a los salvajes monstruos de pesadilla que han infestado el Pantano de Luisiana. Juega en solitario o en equipos de dos o tres, mientras buscas pistas que te ayuden a rastrear a tu objetivo y compite con otros Cazadores que buscan la misma recompensa. Mata y destierra a tu objetivo, recoge la recompensa, y entonces prepárate para las confrontaciones: una vez que la recompensa esté en tus manos, todos los demás Cazadores del mapa querrán tu premio. No muestres piedad mientras luchas en un mundo despiadado y oscuro con armas brutales inspiradas en la época, mientras subes de nivel, desbloqueas equipo y recoges experiencia y oro para tu Línea de Sangre.', '2019-08-27', 39.99),
(41, 'BioShock® 2', 'Situado unos 10 años después de los eventos del Bioshock original, los ecos de los pecados pasados vuelven a resonar por las salas de Rapture. A lo largo de la costa del Atlántico, un monstruo ha estado secuestrando niñas pequeñas, llevándoselas de regreso a la ciudad submarina de Rapture. Los jugadores se calzarán las pesadas botas del ciudadano más simbólico de Rapture, el Big Daddy, para moverse a lo largo de la hermosa y decrépita ciudad caida, persiguiendo a un enemigo desconocido mientras buscan respuestas y su propia supervivencia.\r\n\r\nEl modo Multijugador de BioShock 2 proporcionará una rica experiencia de precuela que expande los orígenes del mundo de BioShock. Situado durante la caída de Rapture, el jugador asumirá el papel de un sujeto de pruebas de los Plásmidos para Sinclair Solutions, el principal proveedor de Plásmidos y Tónicos de la ciudad submarina de Rapture que se exploró en el primer BioShock. El jugador deberá utilizar todos los elementos de Bioshock para sobrevivir, a medida que la profunda experiencia de BioShock se refina y transforma en una experiencia multijugador única que sólo se puede dar en Rapture.', '2010-02-09', 19.99),
(42, 'BioShock Infinite', 'En deuda con las personas equivocadas, con su vida en juego, veterano de la Caballería de los EE. UU. y ahora pistolero a sueldo, Booker DeWitt sólo tiene una oportunidad de hacer borrón y cuenta nueva. Debe rescatar a Elizabeth, una misteriosa niña encarcelada desde la infancia y encerrada en la ciudad voladora de Columbia. Obligados a confiar el uno en el otro, Booker y Elizabeth forman un vínculo poderoso durante su atrevida fuga. Juntos, aprenden a aprovechar un arsenal cada vez mayor de armas y habilidades, mientras luchan en zepelines en las nubes, a lo largo de Sky-Lines de alta velocidad y en las calles de Columbia, todo mientras sobreviven a las amenazas de la ciudad aérea y descubriendo su oscuro secreto.', '2013-03-25', 29.99),
(43, 'Dead Space', 'Solamente los Muertos Sobreviven.\r\nUna gigantesca astronave minera deja de comunicar con la Tierra tras entrar en contacto con un extraño artefacto en un planeta distante. El ingeniero Isaac Clarke se embarca para repararla y descubre un horrible baño de sangre  la tripulación de la astronave cruelmente masacrada e infectada por una malvada presencia alienígena. Desde este momento, Isaac se encuentra aislado, atrapado y en una lucha desesperada por sobrevivir.', '2008-10-20', 19.99),
(44, 'Dead Space™ 2', 'En Dead Space™ 2, te vuelves a poner en la piel de Isaac Clarke, el ingeniero de sistemas de Dead Space, tras despertarse tres años después de los horribles sucesos ocurridos en la USG Ishimura. La Ishimura era una nave minera de categoría Destructor de Planetas asediada por los grotescos cadáveres vivientes de su tripulación, conocidos como los “Necromorfos”. Tras desenterrar un misterioso artefacto conocido como la Efigie, Isaac se encuentra en la Sprawl, una gigantesca estación espacial en la órbita de Saturno. Incapaz de recordar cómo llegó ahí y atormentado por visiones de su novia muerta, Nicole, deberá sobrevivir a otra espeluznante plaga de Necromorfos mientras se abre paso luchando en busca de una esperanzadora respuesta que le indique cómo terminar con todo el caos.', '2011-01-26', 19.99),
(45, 'Dead Space™ 3', 'Viaja por el espacio hasta el planeta helado de Tau Volantis con Isaac Clarke y el sargento John Carver para descubrir y destruir el origen del brote necromorfo. Peina el duro entorno en busca de materias primas y busca piezas para crear tus armas personalizadas y herramientas de supervivencia definitivas: las necesitarás si quieres que Isaac y Carver salgan del planeta con vida. Los necromorfos son solo uno de los muchos enemigos a los que se enfrentarán esta vez. Supera avalanchas, peligrosas escaladas con hielo, terrenos salvajes violentos y un ejército de los enemigos más mortíferos y evolucionados en tu misión para salvar a la humanidad de un apocalipsis inminente.', '2013-02-05', 19.99),
(46, 'Dead Space™', 'Vuelve Dead Space™, el clásico de terror, supervivencia y ciencia ficción, reconstruido completamente desde cero para ofrecer una experiencia más profunda e inmersiva. Este remake presenta una fidelidad visual asombrosa, un sonido ambiente lleno de suspense y mejoras en la jugabilidad, sin perder ni un ápice de la escalofriante visión del juego original.\r\n\r\nIsaac Clarke es un ingeniero cualquiera con la misión de reparar la descomunal nave extractora USG Ishimura, pero descubrirá que algo ha ido terriblemente mal. La tripulación de la nave ha sido asesinada y su querida compañera Nicole está perdida en algún lugar a bordo.\r\n\r\nSin nadie que lo acompañe y armado únicamente con sus herramientas y habilidades de ingeniería, Isaac tendrá que darse prisa para encontrar a Nicole mientras va desvelando el terrorífico misterio de lo sucedido a bordo del Ishimura. Atrapado con unas criaturas hostiles, los necromorfos, Isaac se enfrenta a una batalla por la supervivencia no solo contra los horrores de la nave, sino para evitar caer en la locura.', '2023-01-27', 59.99),
(47, 'Subnautica', 'Subnautica es un juego de mundo abierto, exploración submarina y aventura actualmente en desarrollo por Unknown Worlds, el desarrollador detrás de Natural Selection 2.\r\n\r\nDespués de estrellarte sobre un mundo océano alienígena, la única dirección a la que puedes ir es hacia abajo. Los océanos de Subnautica se extienden desde los arrefices de coral de la superficie bañados por el sol hasta las traicioneras fosas abisales. Gestiona tu suministro de oxígeno mientras exploras los bosques de algas, mesetas, arrecifes, y retorcidos sistemas de cuevas. El agua rebosa de vida: algunas criaturas son útiles, la mayoría peligrosas.\r\n\r\nTras despertarte en tu cápsula de salvamento, el reloj corre para que encuentres agua, comida y desarrolles el equipo que necesitas para explorar. Recolecta recursos del océano que te rodea. Fabrica cuchillos, linternas, equipo de buceo y tu propio vehículo acuático. Aventúrate más en las profundidades para encontrar recursos más raros que te permitiran crear objetos más avanzados.\r\n\r\nConstruye bases en el lecho marino. Elige diseños y componentes, y gestiona la integridad del casco a medida que la profundidad y la presión aumenta. Usa tu base para almacenar recursos, guardar tus vehículos, y rellenar tus reservas de oxígeno a medida que exploras el vasto océano.', '2018-01-23', 29.99),
(48, 'Ready or Not', 'Los Sueños. El LSPD informa de un gran aumento de los delitos en toda el área metropolitana de Los Sueños. Se ha enviado a los SWAT (equipos de armas y tácticas especiales) para solventar diversas situaciones de alto riesgo, como toma de rehenes, amenazas de bomba activas, sospechosos atrincherados y otras conductas delictivas. Se recomienda a los ciudadanos permanecer en casa o tener cuidado al recorrer la ciudad.\r\n\r\nA pesar de que Los Sueños sigue siendo percibida como una ciudad con gente adinerada, es evidente que para muchos otros las cosas con más calidad de la vida son cada vez más difíciles de conseguir. «La ciudad está atestada de altos edificios de apartamentos sin espacio y cada vez hay menos viviendas asequibles, algo de lo que las organizaciones criminales se han aprovechado como si de un parásito maligno se trataran», afirma el jefe de policía Galo Álvarez. «En una ciudad en la que la población se limita a tratar de sobrevivir, la intervención del LSPD y de su equipo de SWAT sigue siendo esencial para evitar que el deteriorado tejido social de esta ciudad se desgarre ante el caos actual».\r\n\r\nComo respuesta a la intensa oleada de crímenes en la que está inmersa Los Sueños, el jefe Álvarez del LSPD cuenta con el fiel apoyo de David Beaumont, apodado «el Juez», como comandante del equipo de SWAT del LSPD. Poco después de anunciarlo, el LSPD también ha informado de que se encuentra en proceso de incorporar a más miembros a esta unidad especializada con el objetivo de devolver la paz a la ciudad.', '2023-12-13', 49.99),
(49, 'Dying Light', 'De los creadores de los superéxitos Dead Island y Call of Juarez, galardonado con más de 50 premios y nominaciones del sector. Un juego cuyo enfoque ha sentado nuevos estándares para los juegos de zombis en primera persona. Con el desarrollo de nuevos contenidos y eventos de la comunidad años después de su lanzamiento.\r\n\r\n¡Sobrevive en una ciudad devastada por un virus de zombis! En tu misión secreta deberás tomar una decisión. ¿Serás fiel a tus superiores o salvarás a los supervivientes? Está en tus manos...', '2015-01-26', 29.99),
(50, 'Dying Light 2 Stay Human Reloaded Edition', 'Han pasado 20 años desde lo sucedido en el primer juego. El virus ha ganado la batalla y la humanidad agoniza. Ponte en el papel de Aiden Caldwell, un peregrino errante que se dedica a llevar suministros, noticias y sirve de nexo entre los pocos asentamientos de supervivientes que quedan en una tierra asolada por el virus zombi. Sin embargo, tus verdaderas intenciones son otras: encontrar a tu hermana Mia, a la que dejaste atrás siendo niño cuando escapaste del doctor Waltz y sus horribles experimentos. Presa de tu pasado, finalmente decides que es hora de enfrentarte a él cuando descubres que Mia puede seguir viva en la última ciudad de la Tierra: Villedor.\r\n\r\nAl poco tiempo te das cuenta de que la ciudad es un asentamiento asediado por el conflicto. Tendrás que enfrentarte a tus enemigos en combates sangrientos e ingeniosos, así que perfecciona tus habilidades para poder derrotar a las hordas de zombis y hacer aliados por igual. Explora la ciudad con total libertad, haz parkour por los edificios y tejados de Villedor en busca de botines ocultos. ¡Ah! Y ten cuidado cuando caiga la noche, pues es entonces cuando los monstruos se apoderan de las calles.', '2022-02-04', 59.99),
(51, 'System Shock', 'System Shock es el remake completo del innovador título original de 1994, que combina jugabilidad de culto con nuevos gráficos en alta definición, controles actualizados, una interfaz rediseñada y sonidos y música exclusivos; incluso cuenta con el actor de doblaje que puso la voz original a SHODAN, uno de los villanos más icónicos de los videojuegos. Contempla el renacimiento de uno de los juegos más grandes e influyentes jamás creados.\r\n\r\nUna IA psicótica se ha apoderado de Estación Ciudadela y ha transformado a la tripulación en un ejército de cíborgs y mutantes. Y planea hacer lo mismo con la Tierra. Debes explorar y abrirte camino por una estación espacial infernal. Detén a SHODAN y evita la destrucción de la humanidad.', '2023-05-30', 39.99);
INSERT INTO `juegos` (`JuegoID`, `nombre`, `descripcion`, `fecha_salida`, `precio`) VALUES
(52, 'System Shock 2', 'Te despiertas del frío de tu criotubo y descubres implantes cibernéticos injertados en tu carne y la tripulación de la nave estelar Von Braun masacrada. Los infectados deambulan por los pasillos, sus gritos y gemidos te invitan a unirte a ellos mientras la inteligencia artificial rebelde conocida como SHODAN se burla y ridiculiza tu débil intento de desentrañar el horrible misterio de la nave estelar abandonada Von Braun.\r\n\r\nSystem Shock™ 2 es una experiencia que define el género y que estableció mecánicas de juego innovadoras que son un elemento básico del género FPS y RPG actual. Ha seguido inspirando algunos de los mejores títulos de nuestra generación con juegos como Deus Ex® y Bioshock®.\r\nDescubra cómo una historia inquietante, un juego innovador y una atmósfera aterradora han hecho de System Shock™ 2 uno de los mejores juegos de todos los tiempos.', '1999-08-11', 9.99),
(53, 'No Mans Sky', 'Inspirado en las aventuras y la imaginación que adoramos de la ciencia ficción clásica, No Man\'s Sky te presenta toda una galaxia para que la explores, llena de singulares planetas y formas de vida, junto a peligro y acción constantes.\r\n\r\nEn No Man\'s Sky, cada estrella es la luz de un sol lejano que orbitan planetas repletos de vida, y puedes ir a todos los que quieras. Vuela suavemente desde las profundidades espaciales hasta la superficie de los planetas, sin pantallas de carga y sin límites. En este universo infinito generado de forma procedimental, descubrirás lugares y criaturas que ningún otro jugador ha visto antes y, quizá, nunca más nadie vuelva a ver.\r\nEmprende un viaje épico\r\nEn el centro de la galaxia yace un pulso irresistible que te incita a viajar hacia él para aprender la verdadera naturaleza del cosmos. Pero, al enfrentarte a criaturas hostiles y feroces piratas, descubrirás que la muerte tiene un precio y que tu supervivencia dependerá de las decisiones que tomes al mejorar tu nave, tu arma y tu traje.\r\nBusca tu propio destino\r\nTu viaje a través de No Man\'s Sky solo depende de ti. ¿Serás un luchador que hace presa de los débiles y se lleva sus riquezas o que acaba con los piratas para hacerse con sus botines? Ese poder está en tu mano si mejoras la velocidad y el armamento de tu nave.\r\n\r\n¿Serás un comerciante? Encuentra ricos recursos en mundos olvidados y explótalos al mayor precio. Invierte en más espacio de carga y cosecharás enormes recompensas.\r\n\r\n¿O quizá un explorador? Ve más allá de las fronteras conocidas y descubre lugares y cosas que nadie ha visto antes. Mejora tus motores para llegar cada vez más lejos y refuerza tu traje para sobrevivir en entornos tóxicos capaces de matar a los desprevenidos.\r\nComparte tu viaje\r\nLa galaxia es un lugar que vive y respira. Los convoyes comerciales viajan entre las estrellas, las facciones luchan por dominar territorios, los piratas dan caza a los desprevenidos y la policía siempre vigila. Todos los demás jugadores viven en la misma galaxia, y si quieres podrás compartir con ellos tus descubrimientos en un mapa que abarca todo el espacio conocido. Quizá veas los resultados de sus acciones, además de los de las tuyas...', '2016-08-12', 58.99),
(54, 'Terraria', '¡Cava, lucha, explora, construye! Nada es imposible en este juego de aventuras repleto de acción. El mundo es tu lienzo y la tierra misma es tu pintura.\r\n¡Coge tus herramientas y adelante! Crea armas para deshacerte de una gran variedad de enemigos en numerosos ecosistemas. Excava profundo bajo tierra para encontrar accesorios, dinero y otras cosas muy útiles. Reúne recursos para crear todo lo que necesites y conformar así tu propio mundo. Construye una casa, un fuerte o incluso un castillo. La gente se mudará a vivir ahí e incluso quizás te vendan diferentes mercancías que te ayuden en tu viaje.\r\nPero ten cuidado, aún te aguardan más desafíos... ¿Estás preparado para la tarea?', '2011-05-16', 9.75),
(55, 'Valheim', 'Un guerrero muerto en batalla, las Valquirias llevaron su alma a Valheim, el décimo mundo nórdico. Rodeado de criaturas del caos y antiguos enemigos de los dioses, eres el guardián más joven del purgatorio primordial, encargado de matar a los viejos rivales de Odín y poner orden en Valheim.\r\n\r\nTus pruebas comienzan en el pacífico centro desarmado de Valheim, pero los dioses recompensan a los valientes y la gloria te aguarda. Aventúrate a través de bosques imponentes y montañas cubiertas de nieve, explora y recolecta materiales valiosos para crear armas más letales, armaduras más resistentes, fortalezas vikingas y puestos de avanzadilla. Construye un poderoso barco y navega por los grandes océanos en busca de tierras exóticas... pero ten cuidado de navegar demasiado lejos...', '2021-02-02', 19.99),
(56, 'EA SPORTS FC™ 24', 'EA SPORTS FC™ 24 te da la bienvenida a The World\'s Game: la experiencia futbolística más fiel hasta la fecha con HyperMotionV, PlayStyles optimizado por Opta y el motor mejorado de Frostbite™.', '2023-09-29', 69.99),
(57, 'RoboCop Rogue City', 'Conviértete en el legendario héroe parte hombre, parte máquina, todo policía y haz justicia en el Viejo Detroit.', '2023-11-02', 49.99),
(58, 'Dead by Daylight', 'Dead by Daylight es un juego de horror de multijugador (4 contra 1) en el que un jugador representa el rol del asesino despiadado y los 4 restantes juegan como supervivientes que intentan escapar de él para evitar ser capturados, torturados y asesinados.\r\n\r\nLos supervivientes juegan en tercera persona y tienen la ventaja de contar con una mejor percepción del entorno. El asesino juega en primera persona y está más enfocado en su presa.\r\n\r\nEl objetivo del superviviente en cada encuentro es escapar del área de matanza sin que lo capture el asesino, algo que suena más fácil de lo que es, especialmente con un entorno que cambia cada vez que juegas.', '2016-06-14', 19.99),
(59, 'Deep Rock Galactic', 'Deep Rock Galactic es un shooter cooperativo de ciencia ficción en primera persona con enanos espaciales de armas tomar, entornos totalmente destruibles, cuevas generadas procedimentalmente y hordas interminables de monstruos alienígenas.\r\nCooperativo para 1-4 jugadores\r\nTrabajad en equipo para excavar, explorar y abriros paso peleando a lo largo de un enorme sistema de cuevas repletas de enemigos mortíferos y valiosos recursos. ¡Necesitaréis la ayuda de vuestros compañeros si queréis sobrevivir a los sistemas de cuevas más mortíferos de la galaxia!\r\n4 clases únicas\r\nEscoge la clase apropiada para cada tarea. Aniquila a los enemigos como Gunner, ve por delante y alumbra las cuevas como Scout, atraviesa la roca viva como Driller o da apoyo al equipo construyendo estructuras defensivas y torretas como Engineer.\r\nEntornos totalmente destruibles\r\nDestruye todo lo que te rodea para alcanzar tu objetivo. No hay un camino establecido, puedes completar la misión a tu manera. Taladra en línea recta hasta llegar a tu objetivo o crea una intrincada red de galerías para explorar tus alrededores: tú decides. Pero ve con cuidado, ¡no querrás toparte con un enjambre de alienígenas sin ir preparado!\r\nRed de cuevas generadas procedimentalmente\r\nExplora una red de sistemas de cuevas generadas procedimentalmente y llenas de enemigos con los que luchar y riquezas que recoger. Siempre hay algo nuevo que descubrir, y no hay dos recorridos iguales.\r\nHerramientas y armas de alta tecnología\r\nLos enanos saben lo que necesitan para hacer un buen trabajo. Cuentan con las armas más potentes y las herramientas más avanzadas de la galaxia: lanzallamas, ametralladoras montadas, lanzadores de plataformas portátiles, y mucho, mucho más.\r\nAlumbra el camino\r\nLas cuevas subterráneas son oscuras y albergan terrores. Tendrás que llevar tus propias luces para poder iluminar estas cavernas oscuras como bocas de lobo.\r\n', '2020-05-13', 29.99),
(60, 'Back 4 Blood', 'Los creadores de la aclamada saga de Left 4 Dead presentan Back 4 Blood, un emocionante juego de disparos en primera persona cooperativo. Te encuentras en medio de una guerra contra los Infectados. Estos humanos, huéspedes de un parásito letal, se han convertido en terroríficas criaturas dispuestas a devorar lo que queda de civilización. Con la humanidad a punto de extinguirse, tus amigos y tú deberéis enfrentaros al enemigo, exterminar a los Infectados y recuperar el control del mundo.\r\nCampaña cooperativa\r\n\r\nAvanza en una campaña cooperativa de 4 jugadores y trabaja conjuntamente con tus compañeros para completar misiones cada vez más desafiantes. Juega con hasta 3 amigos en línea o juega en solitario y lidera tu equipo en la batalla.\r\n\r\nSelecciona a uno de los 8 Exterminadores personalizables para convertirte en un superviviente inmune, elige entre una gran variedad de elementos y armas letales, y elabora tu propia estrategia para derrotar a un enemigo mutante decidido a acabar con toda la humanidad.\r\nModo multijugador competitivo\r\n\r\nJuega con tus amigos o contra ellos en modo JcJ. Conviértete en un Exterminador con ventajas especiales o en un temible Infectado. Los dos bandos incluyen habilidades, cualidades y armas únicas.\r\nRejugabilidad extrema\r\n\r\nCon el nuevo Sistema de Cartas Aleatorias tú decides cómo jugar. Cada vez que utilices este sistema, se generará una experiencia completamente diferente para que puedas personalizar tanto tu personaje como tus barajas y participar en combates mucho más difíciles.\r\n\r\nEl Director del Juego se adapta constantemente a las acciones del jugador para garantizar emocionantes combates, una variada experiencia de juego y legiones de Infectados mucho más difíciles de derrotar, como los jefes mutados de hasta 6 metros de altura.', '2021-10-12', 59.99),
(61, 'DOOM Eternal', 'Los ejércitos del infierno han invadido la Tierra. Ponte en la piel del Slayer en una épica campaña para un jugador y cruza dimensiones aniquilando demonios para detener la destrucción definitiva de la humanidad.\r\n\r\nNo Le Tienen Miedo A Nada... Salvo A Ti.\r\n\r\nDisfruta de la mejor combinación de velocidad y potencia en DOOM Eternal, que trae un salto cualitativo del combate en primera persona.\r\nNivel De Amenaza Del Slayer Al Máximo\r\nArmado con un lanzallamas en el hombro, una hoja retráctil en la muñeca, armas y modificaciones mejoradas, y habilidades, eres más rápido, fuerte y versátil que nunca.\r\nLa Impía Trinidad\r\nObtén lo que necesites de tus enemigos: consigue salud al ejecutarlos, armadura al incinerarlos y munición al destriparlos con la motosierra; conviértete en el matademonios supremo.\r\nJuega A Battlemode\r\nUna nueva experiencia multijugador 2 contra 1. Un DOOM Slayer armado hasta los dientes se enfrenta a dos jugadores demonio en cinco rondas de intenso combate en primera persona.', '2020-03-20', 39.99),
(62, 'ULTRAKILL', 'ULTRAKILL es un FPS ultraviolento de ritmo rápido de la vieja escuela que fusiona shooters clásicos como Quake, shooters modernos como Doom (2016) y juegos de acción de personajes como Devil May Cry.\r\n\r\nLa humanidad se ha extinguido y los únicos seres que quedan en la tierra son máquinas alimentadas por sangre.\r\nPero ahora esa sangre está empezando a correr en la superficie...\r\nLas máquinas corren hacia las profundidades del infierno en busca de más.', '2022-09-03', 24.50),
(63, 'Tom Clancys Rainbow Six® Siege', 'Tom Clancy\'s Rainbow Six® Siege es un shooter táctico realista por equipos en el que una cuidadosa planificación y ejecución de tu estrategia son claves para conseguir la victoria.\r\n\r\nEmbárcate en un nuevo tipo de asalto usando un nivel de destrucción y unos dispositivos nunca vistos.\r\nEn defensa, coordina tus acciones con tu equipo para transformar tu entorno en una fortaleza. Pon trampas, refuerza lugares y crea sistemas de defensa para evitar que el enemigo abra brecha.\r\nEn ataque, lidera tu grupo a través de estrechos pasillos, pasos de puerta reforzados y paredes con barricadas. Combina mapas tácticos, drones de vigilancia, acciones de rápel y otros movimientos para planificar, atacar y dominar cualquier situación.\r\n\r\nElige entre docenas de agentes altamente entrenados, provenientes de las mejores fuerzas especiales de todo el mundo. Usa la tecnología más avanzada para seguir los movimientos enemigos. Destroza paredes para abrir nuevas líneas de disparo. Rompe techos y suelos para crear nuevos puntos de acceso. Usa cada arma y cada dispositivo de tu arsenal para localizar, manipular y destruir a tus enemigos, y al escenario que los rodea.', '2015-11-01', 19.99),
(64, 'STAR WARS™ Battlefront™ II', '¡Saca tu lado heroico en la aventura definitiva de Star Wars™ con Star Wars™ Battlefront™ II: Celebration Edition! Hazte con Star Wars Battlefront II y todo el contenido de personalización disponible a través de las compras del juego desde el lanzamiento, así como con los artículos inspirados en Star Wars™: EL ASCENSO DE SKYWALKER™*.', '2017-11-16', 39.99),
(65, 'Papers, Please', '¡Enhorabuena!\r\nSu nombre ha salido elegido en la lotería de trabajo.\r\nPreséntese inmediatamente ante el Ministerio de Admisiones, en el puesto fronterizo de Grestin.\r\nSe le proporcionará una vivienda de clase 8 en Grestin Oriental, en la cual podrá alojarse junto a su familia.\r\nGloria a Arstotzka.\r\n\r\n\r\nEl estado comunista de Arstotzka ha concluido una guerra de 6 años contra la vecina Kolechia y ha reclamado la mitad que le pertenece de la ciudad fronteriza Grestin.\r\n\r\nTu trabajo como inspector de inmigración es controlar el flujo humano que entra al lado arstotzko de Grestin desde Kolechia. Entre la marea de inmigrantes y visitantes en busca de trabajo se esconden falsificadores, espías y terroristas.\r\n\r\nUsando tan solo los documentos que te entreguen los viajeros y los primitivos sistemas de inspección, registro e identificación dactilar del Ministerio de Admisiones, deberás decidir quién entra en Arstotzka y quién debe ser rechazado o arrestado.', '2013-08-08', 9.75),
(66, 'Balatro', 'Balandro es un constructor de mazos roguelike basado en el póker donde deberás crear potentes sinergias y ganar a lo grande.\r\n\r\nCombina manos válidas de póker con comodines exclusivos para crear diversas sinergias y mazos. Gana las fichas que necesites para vencer en ciegas intrincadas mientras descubres manos y barajas ocultas durante tu progreso. Toda ayuda será poca para llegar hasta la ciega grande, superar el ante final y alzarte con la victoria.', '2024-02-20', 13.99),
(67, 'Titanfall® 2', 'La mejor forma de empezar en uno de los «shooters» más sorprendentes de 2016 es con Titanfall™ 2: Ultimate Edition. No solo tendrás acceso a todos los contenidos de la edición Digital Deluxe, sino que esta colección también incluye un pack Arranque que desbloquea al instante todas las clases de titanes y pilotos, y proporciona fondos, fichas de XP doble y una pintura personalizada para la carabina R-201 con los que iniciarte en la Frontera. Ultimate Edition incluye el juego base Titanfall™ 2, el contenido de la Deluxe Edition (titanes prime Scorch e Ion; pintura Deluxe Edition para 6 titanes; camuflaje Deluxe Edition para todos los titanes, pilotos y armas; decoraciones Deluxe Edition para 6 titanes; indicativo Deluxe Edition) y el contenido de Arranque (desbloqueo de todos los titanes y funciones tácticas de piloto, 500 créditos para desbloquear arsenales, opciones cosméticas y equipo, 10 fichas 2XP, pintura Underground de carabina R-201).', '2016-10-28', 29.99),
(68, 'Battlefield™ 2042', 'Battlefield™ 2042 es un shooter en primera persona que marca el regreso a la emblemática guerra total de la franquicia. Con la ayuda de un arsenal de vanguardia, participa en batallas multijugador intensas e inmersivas.\r\n\r\nEs todo o nada en Battlefield™ 2042 – Temporada 7: Punto de inflexión\r\nHaz lo que sea necesario en la temporada 7: Punto de inflexión, que lleva la batalla por el recurso más valioso de la Tierra al desierto de Atacama en Chile. Tendrás que darlo todo con tu patrulla mientras libras combates por los suburbios sin ley del nuevo mapa Refugio y al volver a visitar un escenario favorito del público: Estadio. Usa la destrucción a tu antojo y ataca sin cuartel a las tropas enemigas con nuevo equipamiento como el subfusil SCZ-3, el dispositivo Predator SRAW y el bombardero aéreo XFAD-4 Draugr*. Desbloquea 100 niveles nuevos de contenido del pase de batalla en una batalla por el poder absoluto.\r\n\r\nLleva a tu equipo a la victoria en la guerra total a gran escala y en los combates a corta distancia en mapas del mundo de 2042 y de títulos clásicos de Battlefield. Descubre tu propio estilo de juego entre las distintas clases y disfruta de varias experiencias con versiones mejoradas de Conquista y Avance. Explora Battlefield Portal, una plataforma donde puedes descubrir, crear y compartir batallas inesperadas del pasado y del presente de Battlefield.\r\n', '2021-11-19', 59.99),
(69, 'Millennia', 'Crea tu propia nación en Millennia, un juego histórico 4X por turnos que desafía tu dominio de la estrategia a lo largo de 10 000 años de historia, desde los albores de la humanidad hasta nuestros futuros posibles. Marca el rumbo de la historia y experimenta distintas líneas temporales cada vez que superes el juego al escribir una historia épica con tus acciones. Lidera a tu pueblo en tiempos de crisis y eras de descubrimientos, enfrenta desafíos y oportunidades grandes, y construye una civilización que prospere a lo largo de las eras.\r\n\r\nMarca el rumbo de la historia durante diez siglos, desde las primeras ciudades hasta los viajes al espacio. Si cumples determinados objetivos, puedes pasar a una Edad Variable, una historia alternativa con reglas, tecnologías y unidades nuevas. Pero ten cuidado con las Edades de Crisis; un camino de caos y desorden puede sumir al mundo en un futuro de guerras, enfermedades o ignorancia. Aunque recuerda que un gobernante sabio siempre puede convertir una crisis en una oportunidad... Elige con cuidado tu camino, pues las eras por las que pases tendrán un impacto duradero en tu población y en el mundo.\r\n\r\nPersonaliza tu nación al adoptar Espíritus Nacionales exclusivos a lo largo del juego. ¿Tu nación será de guerreros o de exploradores? ¿El gobernante de tu pueblo será un gran kan o un constructor de monumentos? ¿Te conocen por definir la cultura pop o por dominar la economía mundial? ¿Qué elementos de tu cultura perdurarán a lo largo de la historia?', '2024-03-26', 39.99),
(70, 'Days Gone', '\"Days Gone es un juego de acción y aventura de mundo abierto ambientado en un entorno natural hostil dos años después de una devastadora pandemia global.\r\n\r\nPonte en los zapatos salpicados de barro del otrora forajido Deacon St. John, un motero cazarrecompensas que intenta buscar una razón por la que vivir en una tierra rodeada de muerte. Registra asentamientos abandonados en busca de equipamiento para crear armas y objetos valiosos o arriésgate a tratar con otros supervivientes que se ganan la vida a duras penas mediante intercambios justos... u otros métodos más violentos.', '2021-05-18', 49.99),
(71, 'DAVE THE DIVER', 'Explora y resuelve los misterios de la Fosa Azul durante el día y gestiona un exótico y popular restaurante de sushi durante la noche.\r\n¡Déjate atrapar por el gratificante bucle de Dave the Diver!\r\n\r\nSumérgete en la siempre cambiante Fosa Azul y utiliza un arpón u otras armas para atrapar peces y varias otras criaturas.\r\nCrea y mejora tu equipo con los recursos que recojas y las ganancias del restaurante de sushi y prepárate para los peligros que acechan en territorio desconocido.\r\n¡Si te quedas sin oxígeno, perderás los objetos y peces que recojas!\r\n\r\nPersonajes estrafalarios pero encantadores y una historia llena de chistes, parodias y humor ofrecen una experiencia de juego cercana y agradable.\r\n\r\nEl atractivo estilo de animación, mezcla de gráficos 3D y pixel art, refleja asombrosos paisajes submarinos.\r\nEsta aventura oceánica se desarrolla en el entorno marino real de una Fosa Azul llena de más de 200 tipos de criaturas marinas.\r\n\r\nLos minijuegos, misiones secundarias y múltiples tramas ofrecen abundantes horas de entretenimiento y un juego variado.', '2023-06-28', 19.99),
(72, 'My Time at Sandrock', 'My Time at Sandrock-Viaja a la desértica comunidad de Sandrock y asume el papel de un Constructor principiante. Utiliza tu confiable juego de herramientas para recopilar recursos, construir maquinaria ¡y convertir tu ruinoso taller en una instalación de producción que marche sobre ruedas para salvar a la ciudad de las fauces de la ruina económica!\r\n\r\nDespués de aceptar una propuesta de trabajo para convertirte en el nuevo Constructor de Sandrock, llegarás a la salvaje y accidentada ciudad-estado, donde dependerá de ti y de tus confiables herramientas llevar a la comunidad a su antigua gloria. Reúne recursos para construir maquinaria, haz amistad con los lugareños y defiende a Sandrock de los monstruos… ¡Todo ello mientras salvas a la ciudad de la ruina económica!', '2023-11-02', 34.99),
(73, 'Half-Life Alyx', '﻿Half-Life: Alyx es el regreso de Valve en realidad virtual a la serie Half-Life. Es la historia de una lucha imposible contra una cruel raza alienígena conocida como la Alianza que se desarrolla entre los acontecimientos de Half-Life y Half-Life 2.\r\n\r\nJugando como Alyx Vance, eres la única oportunidad de supervivencia de la humanidad. El control de la Alianza sobre el planeta desde el incidente de Black Mesa solo se ha fortalecido a medida que acorralan a los habitantes que quedan en las ciudades. Entre ellos se encuentran algunos de los mejores científicos de la Tierra: tú y tu padre, el Dr. Eli Vance.\r\n\r\nComo fundadores de una resistencia incipiente, habéis continuado vuestra actividad científica clandestina, realizando investigaciones críticas y construyendo herramientas invaluables para los pocos humanos lo suficientemente valientes como para desafiar a la Alianza.\r\n\r\nTodos los días, aprendes más sobre tu enemigo, y cada día trabajas para encontrar su punto débil.', '2020-03-23', 58.99),
(74, 'Overcooked! 2', '¡Overcooked vuelve con un nuevo y caótico juego de cocina en acción! Regresa al Reino de la Cebolla y organiza tu equipo de chefs en un cooperativo clásico o en partidas en línea de hasta cuatro jugadores. Agarraos los delantales... es hora de salvar el mundo (¡otra vez!)\r\n\r\nFuera de sartén, al fuego...\r\n\r\nYa salvaste al mundo del Ever Peckish. Ahora ha surgido una nueva amenaza y es hora de volver a las cocinas para detener al Pan Demonium.', '2018-08-07', 22.99),
(75, 'Visage', 'Visage es un juego de terror psicológico en primera persona.\r\n\r\nExplora una misteriosa casa en constante cambio sumergiéndote lentamente en una atmósfera que combina entornos acogedores e inquietantes con otros terroríficamente realistas, y disfruta de una auténtica experiencia de terror.\r\nEntorno\r\nEl juego se desarrolla dentro de una enorme casa en la que se han producido hechos escalofriantes. Tendrás que desplazarte por pasillos sombríos, explorar cada habitación y perderte en laberintos infinitos que llenarán tu cabeza de recuerdos de las familias muertas que vivieron aquí. Este retorcido escenario, carente de toda vida salvo la tuya, te guiará hasta lugares que jamás habrías imaginado.\r\n\r\nLa casa está marcada por un terrible pasado. Familias brutalmente asesinadas por sus propios miembros, personas que se volvieron locas, llegando al suicido en muchos casos, y otros sucesos espeluznantes. Cada habitación tiene su propia historia esbozada sobre un lienzo invisible. Como jugador, revivirás parte de este oscuro pasado y cada fragmento te dejará horrorizado y sin aliento. Pronto desearás caer al abismo y unirte a los muertos, pero la muerte no te ayudará a escapar de este lugar. ¿Huirás o tratarás de desvelar la verdad oculta en las sombras?\r\n\r\nLas familias que murieron en esta casa te perseguirán hasta acabar con tus nervios. Seguirán todos tus movimientos, te vigilarán desde cada esquina, jugarán con tu mente e intentarán atacarte. ¿Por qué te persiguen? ¿Qué has hecho? Esto es lo que tendrás que descubrir.\r\n\r\nSistema de juego\r\nEn Visage te encuentras indefenso, no tienes armas con las que defenderte de las espantosas criaturas que te observarán desde cada esquina, puerta o incluso desde debajo de tus pies. Podrás coger objetos clave, interaccionar con el entorno y buscar cosas que te ayuden a escapar de esta pesadilla o a sumergirte más en ella.\r\n\r\nMorir forma parte del juego. Tendrás que evitar el miedo a toda costa, ya que este atrae a las criaturas oscuras. Mantén la cordura todo lo posible y evitarás caer al mundo de los muertos. Esto no será fácil y tendrás que buscar formas de evitar volverte loco, como mantenerte cerca de alguna luz.', '2020-10-30', 29.99),
(76, 'The Texas Chain Saw Massacre', 'Ponte en la piel de un miembro de la conocida familia Slaughter, o en la piel de una de sus víctimas, en The Texas Chain Saw Massacre: un juego de terror asimétrico en tercera persona que se basa en la icónica película de 1974.\r\n\r\nComo víctima, usa bien la cabeza y no hagas ruido para escapar de la familia y encontrar las herramientas necesarias para salir con vida. Los jugadores que encarnen a la familia Slaughter tendrán que ir a por sus invitados y no dejar que se escapen. Es hora de que descubráis si tenéis lo necesario para sobrevivir.\r\n\r\nSufre en tus propias carnes la matanza de The Texas Chain Saw Massacre.', '2023-08-18', 38.99),
(77, 'Control Ultimate Edition', 'Control Ultimate Edition\r\n\r\nControl Ultimate Edition incluye el juego principal y todas las expansiones lanzadas (\"La Fundación\" y \"SMA\") en un único paquete a un gran precio.\r\n\r\nUna presencia corrupta ha invadido la Agencia Federal de Control... Solo tú puedes detenerla. El mundo es tu arma en esta lucha épica para aniquilar a un enemigo amenazante en entornos profundos e impredecibles. La contención ha fallado, la humanidad está en juego. ¿Retomarás el control?\r\n\r\nControl es un emocionante título de acción y aventuras en tercera persona con gráficos espectaculares que ha ganado más de 80 premios. Gracias a la mezcla de entornos abiertos y la creación de mundos y narrativa características del emblemático desarrollador, Remedy Entertainment, Control presenta una experiencia de juego amplía y muy gratificante.\r\n\r\nCaracterísticas principales\r\n\r\nDescubre los misterios\r\n¿Puedes enfrentarte a los secretos oscuros de la Agencia? Desentraña una lucha épica\r\nsobrenatural llena de personajes inesperados y sucesos extraños mientras\r\nbuscas a tu hermano desaparecido. Descubre la verdad que te ha traído\r\nhasta aquí.\r\n\r\nCualquier cosa es un arma\r\nDesata la destrucción con armamento que se transforma y poderes\r\ntelequinéticos. Descubre nuevas formas de aniquilar a tus enemigos aprovechando\r\nhabilidades poderosas para convertir lo que te rodea en armas letales.\r\n\r\nExplora un mundo oculto\r\nSumérgete en los amenazantes espacios de una agencia gubernamental\r\nsecreta. Explora los entornos cambiantes de la Agencia y descubre\r\nque hay mucho más de lo que parece a simple vista...\r\n\r\nLucha por el control\r\nLucha contra un enemigo incansable en misiones emocionantes y peleas\r\ncon jefes exigentes. Gana poderosas mejoras para aumentar tus habilidades\r\ny personalizar tu armamento.', '2020-08-27', 39.99),
(78, 'Tribes of Midgard', '¡Bienvenida sea la primavera! ¡Despídete del frío abrazo invernal con nuestro evento festivo del Byefrost, que se celebrará del 28 de marzo al 18 de abril! Prepárate a conciencia y recorre Miðgarð (¡y más allá!) en esta épica aventura de rol, acción y supervivencia. Construye, fabrica, explora y lucha contra imponentes criaturas legendarias para desvelar los secretos de las piedras del santuario. ¡El Valhalla os aguarda, einherjar!\r\n\r\n¡Viaja por mundos generados procedimentalmente para encontrar recursos, reunir botín, fabricar armas poderosas, subir de nivel y perseguir gallinas en el Ragnarök más colorido jamás visto!\r\n\r\nModo Supervivencia: ¡Explora a tu propio ritmo y construye un hogar vikingo ideal! Elige entre 90 habilidades durante tu progreso y lucha para abrirte paso contra los imponentes jötnar hasta que puedas enfrentarte a los todopoderosos antiguos. Descubre qué es lo que te espera al final de tu viaje épico. \r\n\r\nModo Saga: Ponte a prueba en esta aventura de ritmo frenético para enfrentarte a las fuerzas del Ragnarök antes de un invierno eterno. Desbloquea y especialízate en una de las 8 clases para defender tu aldea todo lo que puedas. ¡Cuanto mayor sea la hazaña, mayor será la recompensa al llegar al Bifröst!\r\n\r\nCuanto más grandes sean, ¡mayor será el batacazo! Y, créenos, ¡son enormes!  \r\n\r\nTras bajar del Valhalla, tu einherjar no tendrá más que una triste ropa interior y muchas ganas de salvar el mundo. Enfréntate a la constante amenaza de los gigantescos jötnar y a sus comandantes, los antiguos, que son incluso más peligrosos. La mecánica de juego trepidante te permite desatar hechizos poderosos con tus armas, bloquear ataques con tu fiable escudo y esquivar en el momento justo para derrotar a villanos que ocupan gran parte de la pantalla.\r\n\r\n¡Tu destino solo depende de ti, einherjar!\r\n\r\nCrea distintas builds de personajes subiendo de nivel y eligiendo habilidades increíbles de los dioses nórdicos. Recoge recursos raros y agénciate runas poderosas que cambiarán de forma sorprendente tu manera de jugar. Completa eventos de juego, surca los mares en embarcaciones, acepta las misiones que te ofrecen los PNJ, saquea mazmorras para enaltecer tu leyenda... ¡o ponte a pescar tranquilamente! No solo estás a la altura de este desafío, sino que te han elegido para superarlo.', '2021-07-27', 19.99),
(79, 'Football Manager 2024', 'Ponte en la piel de un auténtico mánager y escribe tu propia historia futbolística en Football Manager 2024, la edición más completa de la saga hasta la fecha.\r\n\r\nTanto si eres un mánager al que le gusta construir desde cero como si prefieres perseguir la gloria inmediata, te espera un reto a tu medida. El acuerdo de licencia con la Meiji Yasuda Insurance Ltd J.League desbloquea por primera vez la J1 League, J2 League y J3 League para que puedas explorar nuevos horizontes en Japón.\r\n\r\nEn tus manos está confeccionar una plantilla que compita contra los mejores equipos desde cualquier rincón del mundo.\r\n\r\nDescripción del juego\r\n\r\n- Continúa tu incesante andadura hacia la cima del mundo del fútbol con una nueva funcionalidad que te permite importar tu carrera de Football Manager 2023.\r\n- Crea una estrategia táctica ganadora con los sistemas más populares y las innovaciones posicionales vanguardistas del fútbol moderno para lograr la victoria en el terreno de juego.\r\n- Domina el mercado de fichajes con nuevas formas de confeccionar tu equipo y construir una plantilla capaz de alcanzar tus objetivos.\r\n- Mejora a tus jugadores en el campo de entrenamiento y desarrolla la mentalidad y el trabajo en equipo necesarios para transformar a los aspirantes en campeones.\r\n- Observa cómo tu visión táctica cobra vida en los días de partido con un nivel superior gracias a las mejoras en los movimientos del balón y de los jugadores.', '2023-11-06', 59.99),
(80, 'Sudden Strike 4', 'En Sudden Strike 4, te embarcarás en tres grandes campañas ambientadas en los campos de batalla de la Segunda Guerra Mundial.\r\n\r\nTras asumir el mando de las tropas aliadas, alemanas o soviéticas, podrás enviar a la batalla a más de 100 unidades diferentes; como el bombardero alemán Heinkel He111, el tanque ruso T-34, el caza británico Hawker Typhoon y el infame Panzerkampfwagen VI \"Tiger\" alemán.\r\n\r\nPor primera vez en la saga Sudden Strike, podrás elegir a uno de los nueve comandantes disponibles, como George Patton o Bernard Montgomery. Cada uno de ellos ofrecerá distintos enfoques de combate y habilidades únicas.\r\n\r\nHaz gala de tus dotes de estratega en más de 20 exigentes escenarios para un jugador, en el modo escaramuza, basado en desafíos, y en el ultracompetitivo modo multijugador.\r\nAprovecha los puntos débiles de los tanques, tiende emboscadas, ocupa edificios con la infantería, supera al enemigo con un posicionamiento inteligente o lanza devastadores ataques aéreos. ¡Tú eliges cómo quieres abordar cada misión!\r\n', '2017-08-11', 19.99),
(81, 'Amnesia A Machine for Pigs', 'Este mundo es una máquina: A Machine for Pigs, creada exclusivamente para masacrar cerdos.\r\n\r\nDe la mano de los creadores de Amnesia: The Dark Descent y Dear Esther llega un nuevo juego de terror en primera persona que te arrastrará hasta lo más profundo de la codicia, el poder y la locura. Te clavará el hocico entre las costillas y te engullirá el corazón.\r\n\r\nEstamos en el año 1899\r\n\r\nEl rico industrial Oswald Mandus se despierta en su cama, destrozado por la fiebre y acosado por sueños de un motor siniestro e infernal. Torturado por visiones de una desastrosa expedición por México, deshecho por sus sueños frustrados en busca de una utopía industrial, invadido por la culpa y aquejado de una terrible enfermedad tropical, despierta y se encuentra en medio de una pesadilla. La casa está en silencio y el suelo tiembla bajo sus pies a expensas de una máquina infernal: lo único que sabe es que sus hijos corren un grave peligro y que en sus manos está el salvarlos.', '2013-09-10', 19.50),
(82, 'Amnesia Rebirth', 'No se te puede escapar ni un suspiro. La criatura está a pocos centímetros de ti. Su único propósito es alimentarse de tu terror. Te agachas en la oscuridad, intentando controlar tu miedo en aumento, intentando silenciar lo que llevas dentro.\r\n\r\n«Te conozco. Sé de qué eres capaz».\r\n\r\nEn Amnesia: Rebirth, eres Tasi Trianon y te despiertas en pleno desierto en Argelia. Han pasado días. ¿Dónde has estado? ¿Qué has hecho? ¿Dónde están los demás? Sigue las huellas del viaje, reúne los fragmentos de tu pasado hecho añicos; es tu única oportunidad de sobrevivir al despiadado horror que amenaza con devorarte.\r\n\r\n«No se permita sentir ira, no se permita tener miedo».\r\n\r\nEl tiempo va en tu contra. Asume el papel de Tasi y guíala por el terror y el dolor. Mientras luchas por abrirte paso por un paisaje desolado, también tendrás que luchar contra tus propias esperanzas, miedos y amargos remordimientos. Aun así deberás continuar, paso a paso, sabiendo que si fracasas lo perderás todo.\r\n\r\nTambién disponible en modo aventura para quienes quieran vivir la historia pero no el terror.', '2020-10-20', 28.99),
(83, 'Amnesia The Bunker', 'Amnesia: The Bunker es un juego de terror en primera persona de los creadores de SOMA y Amnesia.\r\n\r\nTe han abandonado a tu suerte en un búnker desolado de la 1ª Guerra Mundial con una única bala en el cañón: de ti depende enfrentarte a los asfixiantes terrores que acechan en la oscuridad. Cueste lo que cueste, no permitas que las luces se apaguen y logra salir con vida. Una experiencia de lo más aterradora.\r\n\r\nTensión creciente\r\nExplora diferentes maneras de afrontar la supervivencia. Ponte en la piel del soldado francés Henri Clément, armado con un revólver, una ruidosa linterna de dinamo y otras pocas provisiones que podrás recolectar y fabricar por el camino. Gracias a la aleatorización y a un comportamiento imprevisible, ninguna partida será igual.\r\n\r\nTe persigue una amenaza omnipresente que reacciona a todos tus ruidos y movimientos. Deberás adaptar tu estilo de juego para enfrentarte al infierno. Cada decisión que tomes cambiará la respuesta del juego. Tus acciones tienen consecuencias.\r\n\r\nEscapa de la pesadilla\r\nSoluciona los problemas a tu manera en un mundo semiabierto. Para lograr escapar, deberás explorar y experimentar. Averigua lo que sucede aquí abajo. ¿Qué les ha pasado a los demás soldados? ¿A dónde han ido todos los oficiales? ¿Qué pesadilla diabólica acecha debajo de este infierno? Desvela los misterios del búnker y familiarízate con los recovecos de este cruel sandbox para aumentar tus posibilidades de supervivencia.', '2023-06-06', 24.50),
(84, 'No One Survived', 'Introducción al juego:\r\n\"No One Survived\" es un juego sandbox de supervivencia multijugador, siempre presta atención al estado de tu personaje y a esos peligrosos zombis. Debes explorar y recolectar materiales útiles y construir un refugio en el apocalipsis.\r\nAdquirir los conocimientos necesarios, tales como: medicina, química eléctrica, sastrería, metalurgia, ingeniería civil, fabricación de armas, etc.\r\nUtilice este conocimiento para construir más equipos de alta tecnología que le ayudarán a sobrevivir en este mundo.\r\n\r\nExplorar:\r\nMapa mundial abierto con múltiples ubicaciones para explorar.\r\n\r\nHacer:\r\nMás de 400 elementos, una variedad de fórmulas sintéticas, mejoran el nivel de tecnología, puedes desbloquear fórmulas más poderosas.\r\n\r\nEdificio:\r\nCon casi 150 elementos para construir, diseña tu propia casa y defiéndete del ataque de los zombies. La construcción de carga se basa en un sistema único de vigas y columnas, y usted debe planificar su propia estructura de vigas y columnas de manera razonable para construir una casa hermosa y hermosa.\r\n\r\nSistema de agua y electricidad:\r\nTres tipos de equipos de generación de energía, generación de energía mediante combustible, generación de energía térmica y generación de energía solar, proporcionan electricidad para los equipos eléctricos.\r\nConstruya un pozo, conéctese a una estación de almacenamiento de agua, un baño o lavabo a una estación de almacenamiento de agua y báñese al final del día.\r\n\r\nHabilidades tecnológicas:\r\nVarias habilidades para aprender: medicina, ciencias de la electrificación, mecánica, sastrería, metalurgia, agricultura, cocina, ingeniería civil, fabricación de armas.\r\nUna variedad de habilidades de combate: armas contundentes, armas afiladas, armas de fuego, físico.\r\nUn árbol de tecnología que se desbloquea gradualmente con la mejora de habilidades.\r\n\r\nArsenal:\r\nUna variedad de armas disponibles, arcos y flechas silenciosos, poderosos machetes para matar extremidades rotas, mazos para derribar zombis y una variedad de armas de fuego, que se pueden modificar para disparar a los zombis desde la distancia.\r\nMás de 100 tipos de ropa ponible, cada prenda tiene sus propios atributos, debes elegir la ropa adecuada en diferentes estaciones.\r\n\r\nSobrevivir:\r\nEn un mundo donde las cuatro estaciones cambian, cada estación tendrá diferentes cambios de temperatura y diferentes cambios climáticos. Ciertos recursos desaparecen durante determinadas temporadas. En invierno necesitas un invernadero para cultivar.', '2023-01-14', 16.49),
(85, 'The Last of Us™ Parte I', 'Disfruta de la emotiva historia y los inolvidables personajes de The Last of Us, ganador de más de 200 premios de Juego del Año.\r\n\r\nEn una civilización asolada, plagada de infectados y crueles supervivientes, Joel, nuestro exhausto protagonista, es contratado para sacar a escondidas a una chica de 14 años, Ellie, de una zona militar en cuarentena. Pero lo que comienza siendo una simple tarea, pronto se transforma en un brutal viaje por el país.\r\n\r\nIncluye la historia completa para un solo jugador de The Last of Us y el aclamado capítulo previo, Left Behind, que explora los acontecimientos que cambiaron la vida de Ellie y su mejor amiga Riley para siempre.', '2023-03-28', 59.99),
(86, 'The Witcher® 3 Wild Hunt', 'Eres Geralt de Rivia, cazador de monstruos. En un continente devastado por la guerra e infestado de criaturas, tu misión es encontrar a Ciri, la niña de la profecía, un arma viviente que puede alterar el mundo tal y como lo conocemos.\r\n\r\nActualizado a la versión más reciente, The Witcher 3: Wild Hunt incluye contenido publicado para el juego, junto con nuevos añadidos: un modo foto integrado, objetos inspirados en la serie de Netflix The Witcher —espadas, armaduras y atuendos alternativos— ¡y muchas cosas más!\r\n\r\n¡Contempla el siniestro mundo de fantasía del continente como nunca antes! Esta edición de The Witcher 3: Wild Hunt ha sido mejorada con numerosos efectos visuales y mejoras técnicas, incluidos un nivel de detalle perfeccionado, una gran variedad de mods creados y recién desarrollados por la comunidad, trazado de rayos en tiempo real y mucho más, todo ello implementado pensando en la potencia de los PC modernos.\r\n\r\nAdiestrados desde su infancia y mutados para obtener habilidades, fuerza y reflejos sobrehumanos, los brujos sirven como contrapeso al mundo infestado de monstruos en el que viven.\r\n• Destruye a tus enemigos de formas espantosas como cazador de monstruos profesional, armado con una gran variedad de armas mejorables, pociones de mutación y magia de combate.\r\n• Da caza a una amplia gama de monstruos exóticos: desde bestias salvajes que merodean por los pasos de montaña, hasta astutos depredadores sobrenaturales que acechan en las sombras de los callejones de ciudades densamente pobladas.\r\n• Invierte tus recompensas en mejorar tus armas y comprar armaduras personalizadas, o gástatelas en carreras de caballos, juegos de cartas, peleas a puñetazos y otros placeres que te ofrece la vida.', '2015-05-15', 29.99),
(87, 'Hitman Codename 47', 'Como el enigmático Hitman, debes usar el sigilo y la astucia para entrar, ejecutar y salir de la zona de asignación llamando la menor atención y consiguiendo la máxima efectividad. Por un precio, tienes acceso a los dispositivos más avanzados, aunque el modo en que los uses determinará si acabarás siendo millonario, o conseguir que acaben contigo.\r\nThe Hitman es el asesino más exitoso y rico del mundo; sin embargo, está atormentado por su pasado lleno de engaños y carnicerías genéticas. La ingeniosa historia evolucionará durante cinco episodios de acción desenfrenada. Recuerda, en el mundo de los asesinos a sueldo, más vale una mente rápida que un gatillo rápido.', '2000-11-23', 7.99),
(88, 'Hitman 2 Silent Assassin', 'Entra en el mundo de un asesino retirado al que una traición obliga a regresar al servicio activo. Puede que seas un asesino a sueldo pero aún tienes tu sentido de la lealtad y de la justicia. Visita los lugares más recónditos y oscuros de un mundo corrompido por el crimen, la codicia, la degradación y el deshonor. Y un pasado que te pisa los talones.\r\nNo confíes en nadie - por un precio adecuado, el dedo de tu más fiel aliado comenzará a acariciar el gatillo. Puede que tus objetivos se escondan en los lugares más remotos del planeta, pero su destrucción no es evitable, tan sólo pospuesta.\r\nAprende tu oficio, domina tus herramientas, supera tus obstáculos, sé más astuto que tus enemigos... elimina tus objetivos. Recuerda: las decisiones precipitadas tienen malas consecuencias. Debes saber al instante cuándo golpear, y cuándo tomarte tu tiempo. La oportunidad favorece a los preparados. El fracaso no es una opción.', '2002-10-01', 8.99),
(89, 'Hitman Contracts', 'Adéntrate en el mundo de HITMAN: un mundo regido por el crimen, el pecado y la codicia. Métete en el papel del Agente 47, enfréntate a sus peores adversarios y cumple con la labor de asesino despiadado pero eficaz. Elimina a tus objetivos como sea.\r\n\r\nNo hay reglas... tan solo un contrato firmado con sangre.', '2004-04-20', 8.99),
(90, 'Hitman Blood Money', 'El dinero habla. El silencio paga. Prepárate para hacer una masacre. Cuando los asesinos de la agencia de contratación de 47, la ICA, son eliminados sistemáticamente tras una serie de ataques, parece que una agencia mayor y más poderosa ha saltado a la palestra. Presintiendo que él puede ser su próximo objetivo, 47 viaja a América y se prepara para hacer una masacre.', '2006-05-30', 9.75),
(91, 'Hitman Absolution™', 'HITMAN: ABSOLUTION sigue los pasos del asesino original mientras trabaja en su contrato más personal hasta la fecha. Traicionado por la Agencia y buscado por la policía, el Agente 47 se ve abocado a la búsqueda de la redención en un mundo corrupto y retorcido.\r\nCaracterísticas Principales\r\nPresentamos la tecnología Glacier 2™: HITMAN: ABSOLUTION se ha construido a partir de cero para crear un título que hace gala de una historia cinematográfica, una destacable dirección artística y un diseño muy original del juego y el sonido\r\nModo Contratos: Crea tus propios desafíos personalizados escogiendo el nivel, los objetivos, las armas y las normas del asesinato en un nuevo e innovador modo online. Puedes compartir los contratos creados con tus amigos o con toda la comunidad de Hitman y el dinero que obtengas servirá para desbloquear armas, mejoras y disfraces\r\nLibertad de elección: Acecha a tu presa; plántale cara directamente o adáptate a la situación. En el papel del Agente 47, la elección está en tus manos, gracias a la evolucionada mecánica de juego y a un revolucionario sistema de IA\r\nSumérgete en un mundo vivo y vibrante: En el mundo de Hitman: Absolution cualquier momento puede ser memorable; personajes peculiares, diálogos interesantes e interpretaciones de cine se combinan para crear una experiencia de juego sin igual\r\nDisfraces: Como el Agente 47, la identidad de casi todos aquellos con los que te encuentres está a tu disposición. Inmoviliza a tu presa, róbale la ropa y usa tu instinto para camuflarte y engañar a tus enemigos\r\nModo de Instinto: Observa el mundo con los ojos del Agente 47 y conviértete en el asesino más letal del mundo. Usando el modo de instinto de Hitman: Absolution, predecirás los movimientos de los enemigos, descubrirás nuevas formas de matar y emplearás armamento de alta potencia con una precisión mortífera', '2012-11-20', 19.99),
(92, 'HITMAN 3', 'Entra en el mundo del asesino definitivo. HITMAN: mundo del asesinato reúne lo mejor de HITMAN, HITMAN 2 y HITMAN 3. Incluye la campaña principal, contratos, intensificaciones, objetivos escurridizos y contenido destacado.\r\n\r\nTu arma más peligrosa es la creatividad. Desbloquea nuevo equipamiento y sube de nivel con misiones de lo más rejugables.\r\n\r\nRecorre un mundo vivo y repleto de personajes intrigantes y oportunidades letales.\r\n\r\nHITMAN: FREELANCER\r\nUna nueva forma de jugar según tus propios términos que combina elementos de roguelike y planificación estratégica con una rejugabilidad constante e infinit', '2022-01-20', 69.99),
(93, 'Half-Life', 'Nombrado juego del año por más de 50 publicaciones, la ópera prima de Valve mezcla acción y aventuras con una tecnología galardonada con varios premios, en un mundo terriblemente realista en el que los jugadores deberán esforzarse por sobrevivir. También incluye un emocionante modo multijugador que te permite jugar contra amigos y enemigos de todo el mundo.', '1998-11-08', 8.19),
(94, 'Half-Life 2', '1998. HALF-LIFE supone un impacto en la industria de juegos con su combinación de acción frenética y narración continua y absorbente. El título de debut de Valve fue galardonado con más de 50 premios que lo consideraron el juego del año hasta convertirse en \"El mejor juego para PC de la historia\", galardón concedido por la revista PC Gamer, y ha vendido más de ocho millones de unidades en todo el mundo.\r\n\r\nHOY. Todo el suspensе, los desafíos y la carga emocional del original, aunados a un realismo sorprendente y una estupenda manejabilidad: Half-Life 2 abre las puertas a un mundo en el que la presencia del jugador influye en todo lo que lo rodea, desde el entorno físico hasta el comportamiento e incluso las emociones de amigos y enemigos.\r\n\r\nEl jugador vuelve a tomar la palanca del científico Gordon Freeman, quien se encuentra en una Tierra infestada por alienígenas, desposeída de todos sus recursos y en la que cada vez queda menos población. Freeman se ve envuelto en el papel nada envidiable de rescatar el mundo del mal que desencadenó en Black Mesa. Y mucha gente a la que aprecia cuenta con él.\r\n\r\nLa nueva tecnología patentada por Valve, Source®, hace posible el juego intenso y en tiempo real de Half-Life 2. Source ofrece grandes mejoras en:\r\n\r\nPersonajes: el sistema de animación facial avanzada proporciona los personajes más sofisticados jamás vistos. Con 40 \"músculos\" faciales definidos, los personajes humanos transmiten un despliegue completo de emociones humanas y responden al jugador con fluidez e inteligencia.\r\nFísica: Todo, desde las piedras hasta los camiones de 2 toneladas, pasando por el agua, responde como en el mundo real, ya que obedece a las leyes de la masa, gravedad y flotabilidad.\r\nGráficos: el renderizador basado en sombreadores de Source, como el utilizado en Pixar para crear películas como Toy Story® y Monster\'s, Inc.®, crea los entornos más atractivos y realistas jamás vistos en un videojuego.\r\nInteligencia artificial: ni los aliados ni los enemigos se entregan ciegamente a la batalla. Pueden evaluar los peligros, desplazarse por terrenos peligrosos y utilizar los objetos a su alcance como armas.', '2004-11-16', 9.75),
(95, 'Black Mesa', 'Revive la vida media\r\nBlack Mesa es la reinvención hecha por fans de Half-Life de Valve Software.\r\n\r\nBlack Mesa: Edición Definitiva\r\nLa actualización 1.5 reúne todas las mejoras en gráficos y jugabilidad a lo largo de 15 años de desarrollo para crear la versión final de Black Mesa. ¡Nunca ha habido un mejor momento para coger la palanca y jugar!\r\n\r\nCampaña para un jugador\r\nEres Gordon Freeman, físico teórico del Centro de Investigación Black Mesa. Cuando un experimento de rutina sale terriblemente mal, debes abrirte camino a través de una invasión alienígena interdimensional y un equipo de limpieza militar sediento de sangre para salvar al equipo científico... ¡y al mundo!', '2020-03-06', 19.50);
INSERT INTO `juegos` (`JuegoID`, `nombre`, `descripcion`, `fecha_salida`, `precio`) VALUES
(96, 'Left 4 Dead', 'De la mano de Valve®, creadores de Counter-Strike®, Half-Life® y otros muchos juegos, llega Left 4 Dead™, una nueva aventura para PC y Xbox 360 que te mete en la piel de uno de los cuatro «supervivientes» en su pugna épica contra hordas de zombis y sus terroríficas variedades mutantes especiales.\r\nAmbientado justo tras el estallido del largamente anunciado Apocalipsis zombi, la dinámica de juego cooperativa de Left 4 Dead se desarrolla en cuatro extensas «películas» que guían a los supervivientes por los tejados de metrópolis abandonadas, por pueblos abandonados y bosques sumidos en la oscuridad, todo para que consigas escapar del epicentro devastado lleno de enemigos infectados. Cada «película» consta de cinco grandes mapas y permite participar a entre uno y cuatro jugadores, poniendo énfasis en las estrategias y objetivos de equipo.\r\nUtiliza la nueva tecnología bautizada como «Director de IA» para generar por procedimiento una experiencia diferente cada vez que se juega. El Director ajusta la frecuencia y ferocidad de los ataques zombis a tu rendimiento, colocándote en el centro de una película de terror como las de Hollywood, muy dinámica pero no abrumadora.\r\nAdictiva dinámica de juego individual, cooperativo o multijugador, de la mano de los creadores de Counter-Strike y Half-Life.\r\nEl modo Enfrentamiento te permite competir 4c4 con tus amigos, jugando como un humano que trata de hacer que lo rescaten, o como un monstruo jefe de zombis que no parará hasta destruirlo todo.\r\nPrueba a ver durante cuánto tiempo puedes contener con tus amigos a la horda de infectados en el nuevo modo Supervivencia.\r\nLa avanzada inteligencia artificial de «Director de IA» crea de forma dinámica experiencias intensas y distintas cada vez que se juega.\r\n20 mapas, 10 armas y posibilidades sin límite en cuatro extensas «películas».\r\nMatchmaking, estadísticas, clasificaciones y un sistema de recompensas guían el juego cooperativo.\r\nModo de comentario de los desarrolladores para que los jugadores puedan echar un vistazo entre bastidores.\r\nBasado en la tecnología de Source y Steam.', '2008-11-17', 9.75),
(97, 'Left 4 Dead 2', 'Ambientado en el apocalipsis zombi, Left 4 Dead 2 (L4D2) es la esperadísima secuela del galardonado Left 4 Dead, el juego cooperativo número 1 de 2008.\r\nEste FPS cooperativo de acción y terror os llevará a ti y a tus amigos por las ciudades, pantanos y cementerios del Sur Profundo, desde Savannah hasta Nueva Orleans, a lo largo de cinco extensas campañas.\r\nJugarás como uno de los cuatro nuevos supervivientes, armado con un amplio y devastador arsenal de armas clásicas y mejoradas. Además de las armas de fuego, también tendrás la oportunidad de masacrar a los infectados con diversas armas de combate cuerpo a cuerpo, desde motosierras hasta hachas, e incluso una mortífera sartén.\r\nPondrás a prueba estas armas contra tres espantosos y formidables nuevos infectados especiales (o jugarás como ellos en el modo Enfrentamiento). También te encontrarás con cinco nuevos infectados comunes no comunes, incluyendo a los aterradores embarrados.\r\nAI Director 2.0 lleva la jugabilidad frenética y repleta de acción de L4D a un nivel superior. Esta versión mejorada de Director tiene la capacidad de modificar por procedimientos la meteorología en la que luchas y las rutas que tomas, además de adaptar la población enemiga, los efectos y los sonidos para ajustarlos a tus acciones. L4D2 promete una experiencia satisfactoria, única y desafiante en cada partida, personalizada de acuerdo con tu estilo de juego.\r\nAcción cooperativa de nueva generación de la mano de los creadores de Half-Life, Portal, Team Fortress y Counter-Strike.\r\nMás de 20 nuevas armas y objetos encabezados por más de 10 armas de combate cuerpo a cuerpo (hacha, motosierra, sartén, bate de béisbol...) te permitirán enfrentarte a los zombis desde bien cerca.\r\nNuevos supervivientes. Nueva historia. Nuevos diálogos.\r\nCinco extensas campañas para los modos Cooperativo, Enfrentamiento y Supervivencia.\r\nUn modo multijugador completamente nuevo.\r\nInfectados comunes no comunes. Cada una de las cinco nuevas campañas contiene al menos un nuevo tipo de zombi común no común exclusivo de esa campaña.\r\nAI Director 2.0: La avanzada tecnología bautizada como AI Director caracterizó la jugabilidad única de L4D permitiendo ajustar dinámicamente la población enemiga, los efectos y la música a las acciones de los jugadores. L4D2 incorpora el nuevo AI Director 2.0, que amplía la capacidad del Director para personalizar el diseño de los niveles, los objetos del entorno, la meteorología y la iluminación para reflejar los diferentes momentos del día.\r\nUn sistema de estadísticas, clasificaciones y premios que fomenta el juego cooperativo.', '2009-11-19', 9.75),
(98, 'STAR WARS™ Battlefront Classic Collection', 'Lucha en batallas icónicas de toda la galaxia STAR WARS™\r\n\r\nJuega juegos clásicos de STAR WARS Battlefront en línea y sin conexión en esta colección clásica completa.\r\n\r\nEsta colección clásica incluye:\r\nSTAR WARS Battlefront (Clásico)\r\n-Incluye mapa extra: Palacio de Jabba\r\nSTAR WARS Frente de Batalla II\r\n-Incluye mapas adicionales: Bespin: Cloud City, Rhen Var: Harbor, Rhen Var: Citadel y Yavin 4: Arena\r\n-Incluye héroes adicionales: Asajj Ventress y Kit Fisto.\r\n\r\n**Principales características**\r\nAtraviesa la galaxia en modo campaña y conquista galáctica\r\nConquista Galáctica: Define tu estrategia, recluta tus tropas y ejecuta tu visión táctica para conquistar la galaxia.\r\nCampaña STAR WARS™ Battlefront: experimenta batallas icónicas de STAR WARS Episodios I-VI\r\nCampaña STAR WARS™ Battlefront II: Únete al ascenso de la Legión 501 de Stormtroopers de élite de Darth Vader\r\n\r\nUbicaciones masivas con soporte en línea para hasta 64 jugadores\r\n-Lucha en el campo: Wookiee Warriors, Jet Troopers, Droidekas y otros en acción multijugador masiva.\r\n-Conduce vehículos icónicos: Speeder Bikes, AT-ST, AT-RT y otros, en batallas ofensivas y defensivas.\r\n-Pilotar naves legendarias: cazas TIE, X-wings y otros, en combates en el aire y en el espacio.\r\n\r\nAsalto de héroe ampliado\r\nPuedes jugar Hero Assault en todos los mapas de campo, incluidos: Death Star, Kashyyyk, Kamino y Naboo por primera vez.\r\n-Lucha con héroes: ¡Mace Windu, Yoda, Luke Skywalker y muchos otros!\r\n-¡Lucha contra villanos: Darth Maul, General Grievous, Darth Vader y muchos otros!', '2024-03-14', 34.14),
(99, 'MONOPOLY® PLUS', 'Un juego de mesa que está vivo\r\n• Una auténtica ciudad en 3D en el centro del tablero vive y evoluciona a medida que juegas. Posees un mundo en miniatura en el que cada barrio tiene su propia identidad y características. Sus amistosos habitantes interactuarán con tu progreso por todo el juego, celebrando tus logros, añadiendo toda una nueva dimensión a tu experiencia de juego. Siente que posees algo especial, y admira cómo se expande tu imperio ante tus propios ojos.\r\n\r\nJuega a tu manera\r\n• Puedes cambiar las reglas y adaptarlas a tu estilo de juego. Prueba el famoso modo Speed Die, para que el juego sea más divertido, o selecciona una de las seis reglas de la casa elegidas por miembros de la comunidad de Monopoly de todo el mundo.', '2017-09-07', 14.99),
(100, 'Hell Let Loose', 'Únete a la experiencia en constante expansión de Hell Let Loose, un shooter bestial en primera persona ambientado en la II Guerra Mundial que incluye batallas épicas de 100 jugadores con infantería, tanques, artillería, un frente dinámico y un sistema de gestión de recursos inspirado en los títulos de estrategia en tiempo real.\r\n\r\nParticipa en las batallas más emblemáticas del Frente Occidental, como Carentan, Omaha Beach y Foy, entre otras. El combate está a otro nivel. No eres más que otro engranaje en esta máquina de guerra colosal, como los pesados tanques que dominan el campo de batalla y las vitales cadenas de suministro que alimentan a los soldados del frente. Hell Let Loose te mete de lleno en el caos de la guerra e incluye complejos vehículos que podrás controlar, un frente dinámico en constante evolución y una jugabilidad crucial centrada en las unidades que determinará las tornas del combate.\r\n\r\nJuega en más de 9 extensos mapas modelados a partir de imágenes de reconocimiento reales y de datos de satélite. Todo el campo de batalla está dividido en grandes sectores que capturar, lo que permite una jugabilidad emergente y única en la que dos pelotones de 50 jugadores cada uno combaten en una lucha a muerte a través de campos, puentes, bosques y pueblos en un frente que no deja de cambiar. Cuando captures un sector, este generará uno de los tres recursos disponibles para tu equipo, lo que crea una jugabilidad compleja que influirá en la marcha hacia la victoria.\r\n\r\nUn escenario bélico épico\r\n\r\nDomina el campo de batalla en enfrentamientos 50 contra 50 que transcurren en mapas enormes. Escoge uno de los 14 roles, entre los que hay unidades blindadas, de infantería y de reconocimiento, cada una equipada con armas, vehículos y equipo distintos. Juega como oficial, oteador, ametrallador, médico, ingeniero, comandante de tanque y más para experimentar cada aspecto de las batallas de la II Guerra Mundial.\r\n\r\nJugabilidad bestial\r\n\r\nHell Let Loose te meterá de lleno en más de 9 campos de batalla emblemáticos de la II Guerra Mundial, como Omaha Beach, Carentan y Foy. Los vehículos, las armas y los uniformes históricos están reproducidos con gran detalle, y el combate es tan sangriento y brutal como lo fue en su día. Las batallas transcurren en mapas enormes a escala real de ubicaciones de batallas reales, que han sido recreadas con fotografías aéreas de archivo e imágenes de satélite para conseguir un detalle increíble gracias a Unreal Engine 4.\r\n\r\nJugad juntos, ganad juntos\r\n\r\nHell Let Loose no se centra en la estadística de bajas y muertes: el trabajo en equipo es fundamental en el juego. La comunicación es esencial. Los jugadores trabajan juntos bajo el liderazgo de los oficiales y de su comandante para tomar objetivos estratégicos del campo de batalla y vencer así al bando rival. Hell Let Loose es un juego en el que es necesario trabajar en equipo y comunicarse para ganar, pero también para sobrevivir.\r\n', '2021-07-27', 44.99),
(102, 'Factorio', ' Tendrás que extraer recursos, investigar tecnologías, construir infraestructuras, automatizar la producción y luchar contra enemigos.  Comenzarás cortando arboles y extrayendo minerales, construyendo cintas transportadoras y brazos mecánicos a mano, pero en poco tiempo tu fábrica puede llegar a convertirse en una megaindustria, con gigantes plantas solares, refinando y craqueando petróleo, produciendo y desplegando ejércitos de robots logísticos y de construcción, todo esto para satisfacer tus necesidades de recursos.  Sin embargo, esta dura explotación del los recursos del planeta no les va a sentar nada bien a los nativos locales, por lo que deberás estar preparado para defender tu vida y tu imperio mecánico.  Une fuerzas con otros jugadores en el modo cooperativo Multijugador, crea enormes fábricas, colabora y delega tareas entre tú y tus amigos.  Añade mods para divertirte más, desde pequeños mods que cambian pequeñas cosas, hasta algunos que cambian completamente la dinámica del juego. Factorio proporciona un completo Soporte Mod que ha permitido a los creadores de contenido de todo el mundo, crear interesantes diseños e innovadoras características nuevas. Mientras que el corazón de la jugabilidad se encuentra en el modo libre, existen una serie de interesantes desafíos en forma de Packs de escenario, desponibles como DLC gratuito.  Si no te acaba de convencer ningún mapa, puedes crear el tuyo propio en el juego mediante el Editor de Mapas; coloca entidades, enemigos e incluso terreno de cualquier forma que puedas imaginar a tu antojo, e incluso añade tu propio Script para hacer más interesante la jugabilidad.', '2022-08-14', 31.99),
(103, 'Just Cause', '¡Es tu mundo y tú dictas las reglas! En Just Cause, eres un oficial de operaciones latino y un especialista en cambios de régimen apoyado por un departamento gubernamental estadounidense de alto secreto que trata de derrocar al corrupto gobierno de San Esperito. Se sospecha que este estado sudamericano está almacenando armas de destrucción masiva y tu misión consiste en eliminar la amenaza que supone para la paz mundial. El hecho de que este paraíso tropical esté a punto de desmoronarse debido a las luchas internas por el poder entre las distintas facciones puede beneficiarte, sólo tienes que dar un empujoncito hacia el lado que más te convenga.\r\nEn Just Cause tienes libertad para llevar a cabo tus misiones de la forma que quieras: enfrentar a las distintas facciones de la isla entre ellas, incitar a una rebelión de masas y crear alianzas con ejércitos rebeldes y cárteles dedicados al tráfico de drogas. La acción transcurre en un mundo increíblemente detallado que comprende más de 100.000 hectáreas de montañas, junglas, playas, ciudades y pueblos. Podrás explorar la isla por tierra, mar y aire, pues tendrás a tu disposición la más variada y emocionante colección de vehículos que se haya visto jamás en un videojuego.', '2006-09-22', 6.99),
(104, 'Just Cause 2', 'Sumérgete en una aventura frenética con total libertad. Eres el agente Rico Rodriguez, y tu misión consiste en encontrar y eliminar a tu amigo y mentor que ha desaparecido en la isla paradisíaca de Panau. Allí tendrás que causar el máximo caos posible por tierra, mar y aire para cambiar el equilibrio de fuerzas. Gracias a una combinación única formada por unos ganchos y un paracaídas, usa el salto BASE, toma el control y crea tus propias acrobacias a toda velocidad. Con más de 400 millas cuadradas de terreno escabroso y centenares de armas y vehículos, Just Cause 2 desafía a la gravedad y a la fe.', '2010-03-23', 14.99),
(105, 'Just Cause 3', 'La república de Medici, en el Mediterráneo, se encuentra oprimida por el tiránico régimen del general Di Ravello, un dictador con una insaciable sed de poder. Tú eres Rico Rodriguez y tu misión consiste en derrocar al general sea como sea. Tienes a tu disposición más de 1000 km2 de tierra, mar y aire que puedes surcar libremente, además de un enorme arsenal de armas, artefactos y vehículos; todo ello para sembrar el caos de la forma más original y explosiva que puedas imaginar.', '2015-12-01', 19.99),
(106, 'Just Cause 4 Reloaded', '¡Just Cause 4 Reloaded ofrece una experiencia de juego expansiva y explosiva en un paquete completamente nuevo! Just Cause 4 Reloaded incluye contenido adicional premium, así como todas las mejoras anteriores y añadidos para el juego.\r\n\r\nAdéntrate en una experiencia de mundo abierto sandbox repleta de acción y siembra el caos con una amplia selección de armas, vehículos y equipación. ¡Abróchate el traje aéreo, equipa el gancho personalizable y prepárate para desatar la tempestad!\r\n', '2018-12-04', 39.64),
(107, 'UNCHARTED™ Colección Legado de los Ladrones', '¿Estás listo para buscar tu fortuna?\r\n\r\nBusca tu propia fortuna y deja tu impronta con UNCHARTED: Colección Legado de los Ladrones. Descubre una emocionante narrativa de película y las escenas de acción más palomiteras de la franquicia UNCHARTED, repletas de momentos hilarantes, ingeniosos y sublimes de nuestros queridos ladrones Nathan Drake y Chloe Frazer.\r\n\r\nEn una experiencia ofrecida por la galardonada desarrolladora Naughty Dog, UNCHARTED: Colección Legado de los Ladrones incluye UNCHARTED™ 4: El desenlace del ladrón y UNCHARTED™: El legado perdido, dos aventuras para un jugador aclamadas por la crítica en las que recorrerás el mundo. Cada historia es un torrente de momentos divertidos y dramáticos, con una acción de alto octanaje y descubrimientos asombrosos, remasterizados para ser más inmersivos si cabe.\r\n\r\nJunglas espesas, montañas nevadas, islas exóticas y calles empapadas por la lluvia; explora cada rincón de entornos preciosos con detalles espectaculares. Sumérgete en la narrativa de película con una resolución 4K supernítida* y compatible con un monitor ultrapanorámico**. Disfruta de la mejora de una serie de características de ajustes gráficos, como la posibilidad de modificar las texturas y la calidad de modelado, el filtrado anisotrópico, las sombras, los reflejos y la oclusión ambiental.\r\n\r\nSiente la emoción del juego en tus manos\r\n\r\nSiente la respuesta háptica y los efectos de gatillos dinámicos diseñados para UNCHARTED: Colección Legado de los Ladrones cuando juegues con el mando DualSense™ conectado con cable al PC. Puedes dejar tu impronta de la forma que prefieras gracias a la completa reasignación de botones y la compatibilidad con el mando DualShock®4***, los controladores de juegos XInput y una gran variedad de mandos, teclados y ratones. Quienes prefieran ver las cosas más claras pueden probar las funciones RGB de los dispositivos compatibles con los periféricos de Razer Chroma y Chroma Link, así como con los modelos de Logitech.', '2022-10-19', 49.99),
(108, 'Half-Life 2 Episode One', 'Half-Life 2 ha vendido más de 4 millones de copias en todo el mundo y recibido más de 35 galardones como mejor juego del año. Episode One es el primero de una serie de juegos que revelarán los acontecimientos posteriores al final de Half-Life 2 y te permitirán aventurarte más allá de Ciudad 17. Además, cuenta con dos escenarios para varios jugadores. No es necesario tener Half-Life 2.', '2006-06-01', 7.79),
(109, 'Half-Life 2 Episode Two', 'Half-Life® 2: Episode Two es la segunda parte de la nueva trilogía creada por Valve que amplía la galardonada saga superventas Half-Life®.\r\n\r\nAsumirás el papel del Dr. Gordon Freeman, visto por última vez escapando de Ciudad 17 con Alyx Vance en el mismo momento en que la Ciudadela entraba en erupción en medio de una tormenta de proporciones épicas. En Episode Two, tendrás que combatir a las fuerzas de la Alianza en tu afán de atravesar antes que ellos White Forest, con el fin de entregar unos datos de vital importancia robados de la Ciudadela al enclave de científicos de la resistencia que se refugian en él.\r\n\r\nHalf-Life® 2: Episode Two incorpora a la galardonada dinámica de juego de Half-Life nuevas armas, vehículos y engendros monstruosos.', '2007-10-10', 6.99),
(110, 'Killing Floor', 'Killing Floor es un shooter Cooperativo del género Survival Horror que tiene lugar en los campos y ciudades devastadas de Inglaterra, después de que una serie de experimentos militares de clonación fracasaran con horribles consecuencias. Tú y tus amigos sois miembros de los militares desplegados en esos lugares con una sencilla misión: ¡Sobrevivir el tiempo suficiente para despejar el área de experimentos fallidos!', '2009-05-14', 19.99),
(111, 'Killing Floor 2', 'En KILLING FLOOR 2 los jugadores se adentran en la Europa continental para luchar contra el brote causado por el experimento fallido de Horzine Biotech, que cada vez se propaga con más rapidez y de manera más contundente. Tal es su magnitud que ha llegado incluso a paralizar a la Unión Europea. Justo un mes después de lo sucedido en el primer KILLING FLOOR, los clones de los especímenes están por todas partes y la civilización se ha sumido en el caos: las comunicaciones no funcionan, los gobiernos se han colapsado y los cuerpos militares han sido erradicados. Los habitantes de Europa saben muy bien cómo sobrevivir y protegerse ante este tipo de situaciones, y los más afortunados han decidido ocultarse.\r\n\r\nPero no todo el mundo ha perdido la esperanza... Un grupo de civiles y mercenarios ha unido sus fuerzas para luchar contra el brote y ha establecido bases de operaciones con financiación privada por toda Europa. Una vez localizados los brotes de clones de los especímenes, los jugadores tendrán que abrirse paso en zonas infestadas de zeds y acabar con ellos.', '2016-11-16', 27.99),
(112, 'The Elder Scrolls® Online', 'Vive una historia en permanente estado de expansión por todo Tamriel con The Elder Scrolls Online, un RPG en línea que ha recibido toda clase de premios y alabanzas. Explora un mundo lleno de vida y sorpresas con tus amigos, o embárcate en una aventura en solitario. Disfruta de un control total sobre el aspecto y la forma de jugar de tu personaje: de las armas que esgrimas a las habilidades que uses, las decisiones que tomes darán forma a tu destino. Te damos la bienvenida a un mundo sin límites.\r\nJUEGA COMO QUIERAS\r\nCombate, construye, roba, asedia, explora y combina distintos tipos de armaduras, armas y habilidades hasta crear un estilo de juego propio. Tú decides lo que quieres hacer en el mundo persistente, vivo y siempre en crecimiento de The Elder Scrolls.\r\nCUENTA TU PROPIA HISTORIA\r\nDesvela los secretos de Tamriel tras partir en una aventura para recobrar tu alma perdida y salvar al mundo de la amenaza de Oblivion. Vive cualquiera de sus historias en cualquier parte del mundo y en el orden que quieras, por tu cuenta o en compañía de otros.\r\nUN RPG MULTIJUGADOR\r\nCumple misiones con tus amigos, únete a otros aventureros para explorar mazmorras repletas de peligros y monstruos o participa en épicas batallas JcJ con otros centenares de jugadores.', '2014-04-04', 19.99),
(113, 'Skul The Hero Slayer', 'El castillo del rey demonio en ruinas\r\nLa raza humana ha atacado el castillo del rey demonio, aunque eso no es nada nuevo. No obstante, esta vez los aventureros han decidido unir fuerzas con el Ejército Imperial y el «Héroe de Carleon» para lanzar un ataque sin precedentes contra las fuerzas demoniacas e intentar acabar con ellas de una vez por todas. Han atacado la fortaleza demoniaca con una cantidad de efectivos apabullante y han conseguido destruirla por completo. Todos los demonios que estaban en el castillo han sido capturados, excepto un esqueleto solitario llamado «Skul».\r\n\r\nAcción y plataformas de desplazamiento lateral\r\n«Skul: The Hero Slayer» es un juego de acción y plataformas con ciertas características de rogue-like, como mapas cambiantes y muy exigentes. No podrás bajar la guardia, pues nunca sabrás qué esperar.\r\n\r\nUn montón de calaveras: un montón de personajes jugables\r\nSkul no es un esqueleto normal. Además de sus formidables habilidades de combate, tiene la capacidad de obtener nuevas y emocionantes habilidades según la calavera que lleve. Puedes llevar hasta 2 calaveras a la vez, cada una con distintos poderes, alcances y velocidades. Utiliza los combos que más se adapten a tu estilo de juego e intercámbialas en mitad del combate para subyugar a tus enemigos. ¡El poder está en tus manos!', '2021-01-21', 16.79),
(114, 'Fallout A Post Nuclear Role Playing Game', 'Te acabas de topar con el clásico juego de rol postapocalíptico que revitalizó todo el género. El sistema SPECIAL de Fallout® te permite desarrollar diferentes tipos de personaje y tomar decisiones significativas, todo bajo tu completo control. Explora las ruinas devastadas de una civilización de la Edad de Oro. Habla, infíltrate o combate contra mutantes, gánsteres y adversarios robóticos. Toma las decisiones correctas o acabarás como otro héroe caído en el páramo...', '1997-09-30', 9.99),
(115, 'Fallout 2 A Post Nuclear Role Playing Game', 'Fallout® 2 es la secuela del juego aclamado por la crítica que sacó a los RPGs de las mazmorras y los llevó a un retro-futuro dinámico y apocalíptico.\r\n\r\nHan pasado 80 años desde que tus antecesores cruzaron los páramos. Mientras buscas el Kit de Creación del Jardín del Edén para salvar a tu primitivo pueblo, tu camino es invadido por una radiación paralizante, mutantes megalomaníacos y una imparable cadena de mentiras, decepciones y traiciones. Comienzas a preguntarte si realmente queda alguien capaz de sacar algo de este salvaje nuevo mundo.\r\n\r\nMientras aprendes a dominar las habilidades y rasgos de tu personaje para sobrevivir, Fallout® 2 te retará a aguantar en un mundo post-nuclear cuyo futuro se marchita a medida que transcurren los segundos...', '1998-12-01', 9.99),
(116, 'Fallout Tactics Brotherhood of Steel', '¡El combate táctico entre pelotones le da un nuevo soplo de aire fresco al universo de Fallout®!\r\nEres basura desdichada. Has nacido del polvo, pero nosotros te forjaremos en acero. Aprenderás a doblarte, o si no, te romperás. En estos tiempos oscuros que corren, la Hermandad - tu Hermandad - es todo lo que hay entre la llama reavivada de la civilización y los páramos desérticos radiactivos.\r\nTus armas serán más que tus herramientas: serán tus amigos. Usarás tus habilidades para infundir ánimo en los débiles y protegerlos... les guste o no. Tus compañeros te serán más fieles que tus propios familiares y, para aquéllos que sobrevivan, les esperará el honor, el respeto y el botín tras la guerra.', '2001-03-01', 9.99),
(117, 'Fallout 3', 'Los ingenieros de Vault-Tec han trabajado sin descanso en una reproducción interactiva de la vida en el Yermo para que la disfrutes desde la comodidad de tu refugio. Incluye un mundo en constante expansión, combates únicos, efectos visuales cargados de realismo, miles de decisiones para tomar y un increíble reparto de personajes dinámicos. Cada minuto es una lucha por sobrevivir a los horrores del mundo exterior: radiación, supermutantes y criaturas mutantes hostiles. Vault-Tec, la primera elección de América en simulación post-nuclear.\r\n¡Libertad sin límites! ¡Explora los enormes parajes de Yermo Capital! ¡Visita los grandiosos monumentos de los Estados Unidos en las post-apocalípticas ruinas de la capital del país! Toma las decisiones que te definirán como personaje y cambia el mundo. ¡Simplemente procura no apartar la vista de tu medidor de radiación!\r\n¡Vive la experiencia S.P.E.C.I.A.L.! Los ingenieros de Vault-Tec te brindan el último grito en simulación de habilidades humanas: ¡el Sistema de Creación de Personajes SPECIAL! Gracias a un nuevo sistema de representación basado en reparto de puntos, SPECIAL te ofrece una personalización de personaje ilimitada. También se incluyen docenas de habilidades y ventajas, ¡cada una con una variada gama de efectos!\r\n¡Nuevas y fantásticas vistas! ¡Los magos de Vault-Tec lo han vuelto a conseguir! No volverás a estar atado a una sola vista, vive la acción desde primera o tercera persona. ¡Personaliza tu vista con sólo tocar un botón!', '2008-10-28', 9.99),
(118, 'Fallout New Vegas', 'Bienvenido a Las Vegas. New Vegas.\r\nEs una de esas ciudades en las que cavas tu propia tumba antes de que te peguen un tiro en la cabeza para dejarte morir solo… y eso es antes de que las cosas se pongan realmente feas. Es una ciudad de soñadores y forajidos que se está desgarrando por la lucha entre las facciones que ansían hacerse con el control total de este oasis en pleno desierto. Es un lugar donde las personas apropiadas con el armamento adecuado pueden hacer historia, y de paso hacer algo más que un par de enemigos.\r\nA medida que luchas para abrirte camino a lo largo de las abrasadoras tierras baldías de Mojave, la colosal Presa Hoover y la deslumbrante zona de Vegas Strip, conocerás a un pintoresco elenco de personajes, facciones hambrientas de poder, armas especiales, criaturas mutadas y mucho más. Escoge tu bando en la inminente guerra o declara que “el ganador se lo queda todo” y corónate Rey de New Vegas en esta secuela del juego del año 2008, Fallout 3.\r\nDisfruta de tu estancia.', '2010-10-22', 9.99),
(119, 'Fallout 4', 'Bethesda Game Studios, el galardonado creador de Fallout 3 y The Elder Scrolls V: Skyrim, os da la bienvenida al mundo de Fallout 4, su juego más ambicioso hasta la fecha y la siguiente generación de mundos abiertos.\r\n\r\nEres el único superviviente del Refugio 111 en un mundo destruido por la guerra nuclear. Cada segundo es una lucha por la supervivencia, y en tus manos estarán todas las decisiones. Solo tú puedes reconstruir el yermo y decidir su futuro. Bienvenido a casa.\r\n\r\nCARACTERÍSTICAS:\r\n¡Libertad e independencia!\r\nHaz lo que quieras en un gigantesco mundo abierto con cientos de ubicaciones, personajes y misiones. Únete a diversas facciones que ansían hacerse con el poder o ve por tu cuenta. Las decisiones están en tus manos.\r\n\r\n¡Eres S.P.E.C.I.A.L.!\r\nCon el sistema de personajes S.P.E.C.I.A.L. podrás ser quien tú quieras, desde un soldado con servoarmadura a un carismático embaucador. Elige entre cientos de extras y desarrolla tu estilo de juego personal.\r\n\r\n¡Píxeles de superlujo!\r\nEl motor gráfico y de iluminación de nueva generación hace que el mundo de Fallout cobre vida como nunca antes lo había hecho. Todas las localizaciones están llenas de detalles dinámicos, desde los bosques destruidos de la Commonwealth a las ruinas de Boston.', '2015-11-10', 19.99),
(120, 'Fallout 76', 'Bethesda Game Studios, los galardonados creadores de Skyrim y Fallout 4, te dan la bienvenida a Fallout 76. Veinticinco años después de la caída de las bombas, saldrás junto a los demás moradores del refugio (elegidos de entre lo mejor de la nación) a los Estados Unidos posnucleares el Día de la Recuperación de 2102. Juega solo o forma un equipo mientras exploras, completas misiones, construyes y superas las mayores amenazas. Explora un amplio Yermo devastado por el conflicto nuclear en este juego multijugador de mundo abierto que completa la historia de Fallout. Experimenta el mundo más grande y dinámico jamás creado para este legendario universo.\r\nCadenas de misiones inmersivas y personajes interesantes\r\nDescubre los secretos de Virginia Occidental mientras completas la compleja misión principal, que comienza en el momento en que abandonas el Refugio 76. Haz amigos y enemigos entre los vecinos que han venido a reconstruir el mundo y vive Appalachia a través de los ojos de sus habitantes.\r\nTablero De S.c.o.r.e. De La Temporada\r\nVe avanzando a lo largo de cada temporada para completar desafíos por tiempo limitado y desbloquear una serie de recompensas totalmente gratuitas, como consumibles, objetos para el C.A.M.P. y más.\r\nJuego De Rol Multijugador\r\nAprovecha el sistema de S.P.E.C.I.A.L. para crear tu personaje y labrarte una reputación en un Yermo que cuenta con cientos de ubicaciones por descubrir.', '2020-04-14', 39.99),
(121, 'Ratchet & Clank Una dimensión aparte', '¡Los aventureros intergalácticos protagonizan un regreso espectacular en Ratchet & Clank: Una dimensión aparte!\r\n\r\nSalta de dimensión en dimensión junto a nuestros héroes por primera vez en tu PC. Ayúdalos a derrotar a un malvado emperador de otra realidad viajando entre mundos cargados de acción y más allá.\r\n\r\nCon el destino de su propio universo en juego, ¡desempolva el brutal arsenal de este dúo dinámico y evita un colapso dimensional!\r\n\r\nCrea un doble equipo de ensueño con un reparto de aliados conocidos y de caras nuevas, como Rivet, una nueva luchadora lombax de la Resistencia de otra dimensión, tan decidida como tú a eliminar a la amenaza robótica.\r\nIntegración del mando inalámbrico DualSense™\r\nDisfruta de una espectacular aventura interdimensional. Desarrollada por el aclamado estudio Insomniac Games y adaptada para PC por Nixxes Software, no solo verás la acción, sino que cobrará vida en tus manos con el mando inalámbrico DualSense™.*\r\n\r\nCon la retroalimentación háptica y los gatillos adaptativos experimentarás sensaciones realistas: siente el zumbido de una nave espacial vibrar en la superficie del mando o el retroceso al apretar el gatillo de tu fiel Ejecutor.', '2023-07-26', 59.99),
(122, 'Vampyr', 'Londres, 1918. Eres el Dr. Jonathan Reid, recientemente convertido en vampiro. Como doctor, debes encontrar la cura para la gripe que diezma a la población. Como vampiro, estás condenado a alimentarte de aquellos a quienes has jurado curar.\r\n\r\n¿Abrazarás tu monstruo interior? Sobrevive y lucha contra cazadores de vampiros, skals no muertos y otras criaturas sobrenaturales. Usa tus poderes malditos para manipular y escarbar en las vidas de quienes te rodean y decidir quién será tu próxima víctima. Lucha y vive con tus decisiones: tus acciones salvarán o condenarán a Londres.', '2018-06-05', 39.99),
(123, 'RimWorld', 'RimWorld es un simulador de colonias de ciencia ficción dirigido por una brillante Inteligencia Artificial que narrará la historia. Inspirado por Dwarf Fortress, Firefly, y Dune.\r\n\r\nRimWorld es un generador de historias. Está diseñado para ser co-autor de historias trágicas, alocadas y llenas de triunfos, relatando la vida de piratas, colonos desesperados, gente muriendo de hambre y supervivencia IA Narradora. Hay varios narradores a elegir. Randy Random hace cosas locas, Cassandra Classic prefiere que vaya subiendo la tensión poco a poco, y Phoebe Chillax prefiere relajarse.\r\n\r\nTus colonos no son colonizadores expertos - son supervivientes de una catástrofe, cuando se encontraban en un transbordador de pasajeros que fue destruido en órbita. Podrías terminar con un noble, un contable, y una ama de casa. Obtendrás más colonos al capturarlos en combate y convertirlos a tu facción, comprarlos de comerciantes de esclavos, o simplemente al aceptar refugiados. Así que tu colonia siempre será un equipo variopinto.\r\n\r\nLos antecedentes de la persona serán registrados y esto afectará la forma en que se juegan. Un noble será perfecto para situaciones sociales (reclutando prisioneros, negociando precios con comerciantes), pero se negará a hacer trabajo físico. Un granjero sabrá como cosechar alimento para esas largas temporadas, pero no es bueno investigando. Un científico será un excelente investigador, pero no cuenta con habilidades sociales. Un asesino genéticamente modificado sólo sabrá matar - pero al menos será muy bueno en esto.', '2018-10-17', 31.99),
(124, 'Tomb Raider Legend', 'Sigue a Lara Croft en una aventura en la que recorre el mundo viajando a lugares exóticos en busca de uno de los artefactos más importantes de la historia, algo que resucitará a ciertos personajes indeseables del misterioso pasado de Lara. Lara deberá utilizar su destreza física y su ingenio para explorar amplias y traicioneras tumbas llenas de complicados acertijos y trampas mortales. ¡Disfruta de una aventura cargada de adrenalina en Tomb Raider: Legend!', '2006-04-07', 6.99),
(125, 'Tomb Raider Underworld', 'Tomb Raider: Underworld representa una nueva evolución en la jugabilidad basada en la exploración. En el papel de la valiente aventurera Lara Croft, explora exóticos lugares por todo el mundo, cada uno de ellos diseñado con un increíble cuidado por los detalles que da como resultado una sorprendente fidelidad visual en alta definición que da vida a un mundo real como la vida misma, proporcionando un nuevo nivel de desafío y elecciones.\r\n', '2008-11-21', 8.99),
(126, 'Tomb Raider', 'Tomb Raider relata los intensos y conflictivos orígenes de Lara Croft y su transformación de joven asustadiza a endurecida superviviente. Lara, que solo cuenta con sus instintos y su habilidad para superar los límites de la resistencia humana, tendrá que aclarar la historia tenebrosa de una isla olvidada para escapar de su acoso implacable. Descárgate el tráiler Turning Point para ver el comienzo de la aventura legendaria de Lara.', '2013-03-05', 14.99),
(127, 'LARA CROFT AND THE TEMPLE OF OSIRIS™', 'Lara Croft and the Temple of Osiris es la continuación del aclamado Lara Croft and the Guardian of Light y la primera experiencia cooperativa para cuatro jugadores de Lara Croft. Con unos gráficos impresionantes y una historia completamente nueva, los jugadores tendrán que trabajar juntos para explorar el templo, derrotar a hordas de enemigos procedentes del inframundo egipcio, resolver intrincados rompecabezas y evitar trampas mortales. Al mismo tiempo también deberán competir para obtener tesoros, poderosos artefactos y el derecho a fanfarronear como nunca.\r\n\r\nLara Croft and the Temple of Osiris está ambientado en las profundidades del desierto de Egipto. En esta nueva aventura Lara debe unir fuerzas con Carter Bell, otro buscador de tesoros como ella, y las divinidades prisioneras Horus e Isis para derrotar al malvado dios Set. Lara y sus compañeros tendrán que luchar contra toda clase de deidades legendarias y criaturas míticas y, a la vez, enfrentarse a los elementos de la naturaleza y abrirse paso a través de las arenas y de tumbas ancestrales. El destino del mundo está en juego y Lara deberá recuperar los fragmentos de Osiris para evitar que Set esclavice a toda la humanidad', '2014-04-09', 19.99),
(128, 'Lara Croft and the Guardian of Light', 'Lara Croft and the Guardian of Light es un juego de accción y aventura protagonizado por Lara Croft. Este nuevo capítulo de la saga de Tomb Raider combina los rasgos principales de la misma, tales como la exploración, las plataformas y la resolución de puzles, con la progresión del personaje, divertidos combates a un ritmo frenético y elementos de cooperación y competición entre amigos.\r\n', '2010-09-28', 9.99),
(129, 'Tomb Raider Anniversary', 'Tomb Raider: Anniversary regresa al instante donde la aventura original de Lara Croft, en su búsqueda del legendario artefacto Scion, definió el género en tercera persona. Usando un mejorado motor de Tomb Raider: Legend, los gráficos, la tecnología y la física llevan la aventura de Lara y la búsqueda de un místico artefacto únicamente conocido como el Scion a los estándares tecnológicos actuales, ofreciendo a los jugadores una experiencia de juego totalmente nueva. Con un diseño completamente reinventado, Anniversary nos entrega a una Lara Croft dinámica, fluida y rápida, masivos entornos con increíbles efectos visuales, combate intenso, ritmo frenético y una historia original realzada y clarificada.', '2007-06-05', 8.99),
(130, 'Rise of the Tomb Raider™', 'Tomb Raider relata los intensos y conflictivos orígenes de Lara Croft y su transformación de joven asustadiza a endurecida superviviente. Lara, que solo cuenta con sus instintos y su habilidad para superar los límites de la resistencia humana, tendrá que aclarar la historia tenebrosa de una isla olvidada para escapar de su acoso implacable. Descárgate el tráiler Turning Point para ver el comienzo de la aventura legendaria de Lara.', '2013-03-05', 14.99),
(131, 'Shadow of the Tomb Raider Definitive Edition', 'En Shadow of the Tomb Raider Definitive Edition, vive el capítulo final de la historia sobre el origen de Lara, en el que se convierte en la saqueadora de tumbas que está destinada a ser. Esta edición incluye el juego básico y siete tumbas de desafío de contenido descargable, así como armas, atuendos y habilidades descargables.\r\n\r\nSobrevive en el lugar más mortal de la Tierra: domina un entorno selvático inclemente. Explora entornos subacuáticos llenos de cavidades y sistemas de túneles.\r\n\r\nSé uno con la selva: en inferioridad numérica y mal equipada, Lara debe aprovechar la selva en su favor. Ataca por sorpresa y desaparece como un jaguar, camúflate en el barro y desata el pánico entre los enemigos para sembrar el caos.\r\n\r\nDescubre tumbas oscuras y despiadadas: son más aterradoras que nunca, pues se requieren técnicas avanzadas para llegar a ellas y, una vez dentro, están repletas de puzles mortales.\r\n\r\nDesentierra la historia viva: descubre la Ciudad Oculta y explora la mayor instalación jamás vista en un juego de Tomb Raider.', '2018-09-14', 39.60),
(132, 'Tomb Raider I-III Remastered', 'Descubre las aventuras originales de Lara Croft fielmente remasterizadas\r\n\r\nJuega las tres aventuras originales de Tomb Raider: Hacemos historia brindando una experiencia completa con todas las expansiones y niveles secretos pero en nuevas plataformas, la colección definitiva.\r\nTítulos incluidos\r\nTomb Raider I + Unfinished Business\r\nTomb Raider II + Golden Mask\r\nTomb Raider III + The Lost Artifact\r\n\r\nResuelve misterios antiguos: El antiguo mundo y sus misterios te esperan. Desvela las entrañas del pasado confinadas por el paso del tiempo.\r\n\r\nUna aventura por todo el mundo: Viaja por el mundo con Lara Croft y ayúdala a enfrentarse a enemigos despiadados y mitos atávicos.\r\n\r\nFiel al original: Un cuadro clásico pintado con pinceles modernos - gráficos mejorados. Con una opción para cambiar a la apariencia poligonal original - nostalgia sin frenos.', '2024-02-14', 28.99),
(133, 'Resident Evil 5', 'La corporación Umbrella y sus reservas de virus letales han sido destruidas y contenidas. Pero ha surgido una amenaza nueva y más peligrosa. Años después de sobrevivir a los acontecimientos de Raccoon City, Chris Redfield se ha dedicado a luchar contra la lacra del armamento bioorgánico en todo el mundo. Como miembro de la Bio-terrorism Security Assessment Alliance (BSAA), Chris recibe la misión de ir a África a investigar un agente biológico que está transformando a la población en criaturas agresivas y perturbadoras. Tanto él como Sheva Alomar, una agente local de la BSAA, deben unir fuerzas para descubrir la verdad detrás de esta sucesión de desgracias.\r\n\r\nEste juego es una conversión de la versión que se lanzó para Games for Windows - Live en 2009. Si compras el Untold Stories Bundle en Steam, conseguirás lo mismo que con la Resident Evil 5 Gold Edition.', '2009-09-15', 19.99),
(134, 'Resident Evil', 'Es el año 1998. Un grupo de fuerzas especiales es destinado a las afueras de Raccoon City para investigar una serie de extraños asesinatos. A su llegada, una jauría de perros sedientos de sangre ataca al grupo, obligándoles a refugiarse en una mansión cercana. La muerte acecha en cada esquina y escasean los suministros. Aquí comienza la lucha por la supervivencia.\r\n\r\nLa versión remasterizada en HD del \"remake\" de Resident Evil. Revive el juego que definió el \"Survival Horror\".', '2015-01-22', 19.99),
(135, 'Resident Evil 2', 'Vuelve Resident Evil 2, la obra maestra que definió un género, completamente renovado para una narrativa aún más intensa. Con el motor gráfico RE propietario de Capcom, Resident Evil 2 supone un nuevo enfoque de esta saga clásica del survival horror, con gráficos espectacularmente realistas, estremecedor sonido inmersivo, una nueva vista sobre el hombro y nuevos controles, además de modos de juego del título original.\r\n\r\nResident Evil 2 supone la vuelta de la acción clásica, la exploración tensa y las mecánicas de resolución de rompecabezas que definieron la serie. Los jugadores acompañarán al policía novato Leon S. Kennedy y a la estudiante universitaria Claire Redfield, que se ven atrapados en una apocalíptica epidemia en Racoon City que ha transformado a su población en zombis mortíferos. Ambos personajes tienen sus propias campañas jugables, lo que permite a los jugadores ver la historia desde dos puntos de vista. El destino de ambos personajes, favoritos de los fans, está en manos de los jugadores, que deberán hacerlos colaborar y llegar hasta el fondo de lo que se esconde tras este terrorífico ataque a la ciudad. ¿Lograrán sobrevivir?\r\n', '2019-01-25', 39.99),
(136, 'Resident Evil 3', 'Jill Valentine es una de las pocas personas que quedan en Raccoon City que han sido testigos de las atrocidades de Umbrella. Para detenerla, Umbrella decide usar su arma secreta definitiva: ¡Nemesis!\r\n\r\nTambién incluye Resident Evil Resistance, un nuevo modo multijugador online 1 contra 4 ambientado en el universo de Resident Evil, donde 4 supervivientes se enfrentarán al siniestro Cerebro.', '2020-04-03', 39.99),
(137, 'Resident Evil 4', 'Sobrevivir es solo el principio.\r\n\r\nSeis años después de la catástrofe biológica en Raccoon City, el agente Leon S. Kennedy, uno de los supervivientes del desastre, ha sido enviado a rescatar a la hija del presidente, a quien han secuestrado. Siguiendo su rastro, llega a una apartada población europea, donde sus habitantes sufren un mal terrible. Así comienza esta historia de un arriesgado rescate y terror escalofriante donde se cruzan la vida y la muerte, y el miedo y la catarsis.\r\n\r\nCon una mecánica de juego modernizada, una historia reimaginada y unos gráficos espectacularmente detallados, Resident Evil 4 supone el renacimiento de un gigante del mundo de los videojuegos.\r\n\r\nRevive la pesadilla que revolucionó el género del survival horror.', '2023-03-24', 39.99),
(138, 'Resident Evil 6', 'Con una mezcla de acción, terror y supervivencia, Resident Evil 6 promete ser la experiencia de terror dramático de 2013. Los personajes favoritos de la saga Resident Evil como Leon S. Kennedy, Chris Redfield y Ada Wong unen sus fuerzas a nuevos personajes, incluyendo a Jake Muller, para enfrentarse a un nuevo horror, el altamente virulento virus-C, a medida que la narrativa se desplaza desde Norteamérica hasta el estado de Edonia, devastado por la guerra y situado en Europa del Este, y hasta la ciudad china de Lanshiang.\r\n\r\nComenzando con cuatro historias diferentes pero entrelazadas, cada una con una pareja de protagonistas para jugar solo o en cooperativo, tanto local como online, Resident Evil 6 no sólo proporciona diferentes perspectivas y estilos de juego, sino que introduce la innovadora mecánica Crossover que permite a los jugadores unirse y compartir el horror. En los momentos clave del juego, hasta 4 jugadores pueden unirse online para enfrentarse a una situación específica, con cambios de pareja en algunas zonas para aumentar la profundidad del juego.', '2013-03-22', 19.99),
(139, 'Resident Evil Village', 'Vive el survival horror como nunca antes en la 8.ª entrega principal de la aclamada serie Resident Evil: Resident Evil Village\r\n\r\nAmbientada unos años después de los escalofriantes sucesos del aclamado Resident Evil 7: Biohazard, esta flamante nueva historia arranca con Ethan Winters y su esposa Mia viviendo plácidamente en un nuevo lugar, lejos de pesadillas pasadas. Sin embargo, justo cuando están empezando su nueva vida juntos, la tragedia vuelve a cebarse con ellos.\r\n', '2021-05-07', 39.99),
(140, 'Resident Evil Revelations', 'Resident Evil® Revelations vuelve remasterizado para PC con imágenes en alta resolución de gran calidad, efectos de iluminación mejorados y una experiencia de sonido que te mete de lleno en la acción. Esta última versión de Resident Evil Revelations llega con contenidos adicionales, como un nuevo y aterrador enemigo, un modo de dificultad extra, integración con ResidentEvil.net y mejoras en el modo Asalto. El modo Asalto, que se introdujo en la serie por primera vez en la versión original de Resident Evil Revelations, permite jugar en línea a los jugadores en modo cooperativo o en solitario para enfrentarse a hordas de enemigos a lo largo de misiones mientras suben de nivel a los personajes y consiguen mejoras para las armas. Con nuevas armas, habilidades y personajes jugables, como Hunk, el modo Asalto lleva la experiencia a un nuevo nivel.\r\n\r\nEl juego de terror de supervivencia aclamado por la crítica lleva a los jugadores de nuevo a los sucesos acontecidos entre Resident Evil®4 y Resident Evil®5, en los que se revela toda la verdad sobre el virus T-Abyss. Los personajes destacados de la serie Jill Valentine y Chris Redfield protagonizan este Resident Evil Revelations, junto a sus compañeros de la BSAA Parker Luciani y Jessica Sherawat. La historia comienza a bordo de un crucero supuestamente abandonado, el \"Queen Zenobia\", donde los horrores acechan en cada rincón, antes de que los jugadores pongan rumbo a tierra, en dirección a la devastada ciudad de Terragrigia. Con la escasa munición y las pocas armas disponibles, tendrán por delante el reto de sobrevivir a los horrores que acechan en Resident Evil Revelations.', '2013-05-20', 19.99),
(141, 'Resident Evil Revelations 2', 'Al comienzo de Resident Evil Revelations 2 veremos el espectacular regreso de Claire Redfield, uno de los personajes preferidos de los aficionados. Claire sobrevivió al incidente de Raccoon City narrado en entregas anteriores de Resident Evil y ahora trabaja para la organización antibioterrorista Terra Save. Moira Burton asiste a su fiesta de bienvenida a Terra Save cuando soldados desconocidos asaltan las oficinas. Claire y Moira pierden el conocimiento y, al despertar, se encuentran en una penitenciaría oscura y abandonada. Deberán colaborar para descubrir quién las raptó y con qué siniestro fin. ¿Lograrán escapar con vida y descubrir por qué las llevaron hasta esta isla remota? Una trama llena de giros y sorpresas hará que los jugadores no puedan saber lo que les espera.\r\n\r\nCamino de la remota isla prisión en busca de su hija desaparecida, Barry Burton conoce a un nuevo personaje, Natalia Korda, una niña con un extraño poder que le permite sentir a sus enemigos y detectar objetos escondidos. Los jugadores tendrán que utilizar esta capacidad y las dotes para el combate de Barry para sobrevivir en la misteriosa isla y dar con Moira. Con terroríficos enemigos acechando tras cada recodo, Barry deberá racionar con sumo cuidado sus armas y municiones, al puro estilo del terror de supervivencia clásico.\r\n\r\nResident Evil Revelations 2 va un paso más allá en la estructura por capítulos del Resident Evil Revelations original y se lanzará inicialmente como una serie de episodios descargables semanales a partir del 24 de febrero de 2015.', '2015-02-25', 19.99);
INSERT INTO `juegos` (`JuegoID`, `nombre`, `descripcion`, `fecha_salida`, `precio`) VALUES
(142, 'STAR WARS™ Squadrons', 'Domina el arte del combate con cazas estelares en la auténtica de pilotaje de STAR WARS™: Squadrons. Abróchate el cinturón y siente la adrenalina de los combates espaciales multijugador en primera persona junto a tu escuadrón. Alístate y métete en las cabinas de cazas estelares de las flotas de la Nueva República y del Imperio, y lucha en batallas espaciales estratégicas 5 contra 5. Modifica tu caza estelar y ajusta la composición de tu escuadrón para adaptarte a distintos estilos y aplastar a tus rivales. Triunfa como equipo y completa objetivos tácticos de campos de batalla tanto conocidos como nunca vistos, entre los que se incluyen el gigante gaseoso de Yavin Prime y la luna destrozada de Galitan.\r\n\r\nToma el control de cazas estelares como el Ala-X y el caza TIE. Personaliza tu armamento y apariencia, desvía la energía a armas, escudos o motores y disfruta de una inmersión total en la cabina. ¡Además, podréis jugar al juego completo en realidad virtual!\r\n\r\nDescubre lo que significa ser piloto en una emocionante historia de STAR WARS™ para un jugador tras los acontecimientos de El Retorno del Jedi. Desde perspectivas alternas entre las dos facciones, líderes emblemáticos y emergentes de ambos bandos lucharán por la galaxia. La Nueva República lucha por la libertad. El Imperio exige orden. Necesitamos que te unas a la élite de la galaxia.\r\n', '2020-10-02', 39.99),
(143, 'LEGO® Star Wars™ La Saga Skywalker', 'La galaxia es tuya con LEGO® Star Wars™: La Saga Skywalker. Vive los momentos inolvidables y llenos de acción de las nueve películas de la saga a través del humor característico que ofrece LEGO\r\n\r\nLa versión digital incluye el personaje jugable exclusivo Obi-Wan Kenobi clásico.\r\n\r\n● Explora las trilogías en cualquier orden: los jugadores pueden revivir la historia épica de las nueve películas de la saga Skywalker y todo comienza con la selección de la trilogía preferida para empezar el viaje.\r\n\r\n● Juega con héroes y villanos legendarios: disfruta de más de 300 personajes jugables de toda la galaxia.\r\n\r\n● Descubre lugares míticos: los jugadores pueden visitar los lugares más conocidos de sus películas favoritas de la saga Skywalker. Viaja con total libertad y desbloquea 23 planetas mientras progresas en la historia de la saga o exploras y descubres emocionantes misiones.\r\n\r\n● Pilota potentes vehículos: más de 100 vehículos procedentes de toda la galaxia están a tu disposición. Participa en batallas aéreas y derrota naves capitales tales como el superdestructor estelar, en el que además podrás subirte a bordo para explorar.\r\n\r\n● Experiencia de juego inmersiva: encadena diferentes ataques para formar combos y defenderte de los enemigos. Nuevos controles y mecánica del bláster renovada que te permiten apuntar con precisión o utilizar las habilidades de los Jedi blandiendo la espada láser y utilizando el poder de la Fuerza.', '2022-04-05', 49.99),
(144, 'STAR WARS™ Dark Forces Remaster', 'Star Wars™: Dark Forces Remaster ha cobrado vida gracias al equipo de Nightdive Studios, completamente remasterizado a través de su motor KEX patentado, lo que permite que el juego se ejecute en dispositivos de juego modernos con una resolución de hasta 4K a 120 FPS. Los jugadores nuevos y recurrentes disfrutarán de la jugabilidad mejorada de Star Wars: Dark Forces Remaster, texturas de alta resolución, iluminación y renderizado mejorados y soporte para gamepads.\r\n\r\nEl Star Wars: Dark Forces original de 1995 elevó el listón de los juegos FPS, ofreciendo a los jugadores un grado significativo de movimiento e interactividad, una gran selección de elementos y potenciadores, y entornos atractivos.\r\n\r\nEn el primer videojuego FPS de Star Wars, los jugadores asumen el papel de Kyle Katarn, un desertor del Imperio Galáctico convertido en mercenario a sueldo. Katarn se une a la división de operaciones encubiertas de la Alianza Rebelde encargada de infiltrarse en el Imperio Galáctico, donde descubre el Proyecto secreto Dark Trooper. El desarrollo de esta nueva y poderosa serie de droides de combate imperiales y soldados de asalto con servoarmaduras pretende fortalecer el control del Imperio sobre la galaxia a menos que Katarn y la Alianza Rebelde intervengan.', '2024-02-28', 28.99),
(145, 'STAR WARS™ Battlefront', 'La Edición Ultimate de Star Wars™ Battlefront™ tiene todo lo que los fans necesitan para vivir sus fantasías de combate de Star Wars™. Además de la Edición Deluxe de Star Wars Battlefront, rebeldes e imperiales podrán ampliar su galaxia con el pase de temporada de Star Wars Battlefront, que incluye cuatro paquetes de expansión llenos de contenido y el gesto \"Yo disparé primero\".', '2015-11-19', 19.99),
(146, 'STAR WARS™ Rebellion', 'Es una época de gran agitación. La primera Estrella de la Muerte ha sido destruida, lo que supone una gran victoria para la Rebelión. Pero el Imperio sigue siendo fuerte. Como comandante, debes elegir tomar el control de la Alianza Rebelde o del Imperio Galáctico. Tu objetivo: dominar completamente la galaxia.\r\n\r\nToma la galaxia por la fuerza. Toma la galaxia a través de la diplomacia. Toma la galaxia a través de operaciones encubiertas. Gánate la lealtad (o el resentimiento) de hasta 200 mundos. Star Wars™ Rebellion te ofrece una gran variedad de medios para implementar estrategias y tácticas a gran escala y en un entorno en tiempo real. Con el control de toda la galaxia de Star Wars como premio, ¿la Fuerza™ estará contigo? Descúbrelo por ti mismo.', '1998-02-28', 6.99),
(147, 'STAR WARS™ Starfighter™', 'Únete a tres heroicos pilotos estelares en su viaje por el espacio exterior y realiza misiones para salvar el planeta de Naboo. El piloto novato de Naboo Rhys Dallows, la mercenaria Vana Sage y el pirata alienígena Nym forman una alianza poco usual, y juntos se preparan para realizar un inesperado asalto en este pacífico planeta.\r\n\r\nPilota tres cazas estelares: el elegante caza estelar de Naboo, el ágil Guardian Mantis y el letal Havoc.\r\n\r\nToma parte en 14 misiones para salvar Naboo: batallas aéreas en el espacio exterior, ataques rápidos, misiones de escolta y mucho más.\r\n\r\nEntornos inmensos que te sumergen en los mundos de Star Wars: desde las enormes llanuras de Naboo hasta los confines del espacio, pasando por los corredores interiores de la Nave de Control Droide.', '2002-01-21', 6.99),
(148, 'STAR WARS™ Republic Commando™', 'El caos ha estallado en la galaxia. Como líder de una escuadra de élite de los Republic Commandos, tu misión es infiltrarte, dominar y, en última instancia, aniquilar al enemigo. Tu escuadra acatará tus órdenes y tu liderazgo, trabajando juntos como un equipo - de forma instintiva, inteligente, al instante. Tú eres el líder. Ellos son tu arma.\r\n\r\nInnovador Sistema de Control de Escuadra - Con comandos de escuadra intuitivos e inteligentes, la simple pulsación de un botón controla a tu escuadra para ejecutar complejos comandos y maniobras estratégicas.\r\n\r\nMúltiples Modos de Juego - Escoge la opción de un jugador y comanda una escuadra de cuatro que puedes manejar a tu antojo. O escoge el modo multijugador y juega con hasta 16 jugadores online en distintos modos multijugador.\r\n\r\nPreludio del Episodio III - Encuentra nuevos vehículos, lugares y enemigos de la inminente película.', '2005-03-01', 9.75),
(149, 'STAR WARS™ The Force Unleashed™ II', 'La saga de Star Wars® continúa con Star Wars®: The Force Unleashed™ II, la esperada secuela del juego de Star Wars más exitoso. En Star Wars: The Force Unleashed, el mundo conoció al (ahora fugitivo) aprendiz de Darth Vader, Starkiller: el atípico héroe que encendería la llama de la rebelión en una galaxia que necesita desesperadamente un defensor.\r\n\r\nEn esta secuela, Starkiller regresa con desmesurados poderes de la Fuerza y se embarca en un viaje para descubrir su identidad y reunirse con su verdadero amor, Juno Eclipse. En Star Wars: The Force Unleashed II, Starkiller vuelve a ser el peón de Darth Vader, pero en lugar de entrenar a su protegido para ser un implacable asesino, el Lord oscuro está intentando clonar a su antiguo aprendiz para crear el guerrero Sith definitivo. La persecución ha comenzado: Starkiller buscará a Juno mientras Darth Vader intenta darle caza.\r\n\r\nCon nuevos y devastadores poderes de la Fuerza y la habilidad de empuñar un sable láser doble, Starkiller se abrirá camino a través de mortíferos enemigos en los fascinantes mundos de las películas de Star Wars, mientras busca desesperadamente respuestas a su pasado.', '2010-10-26', 19.50),
(150, 'STAR WARS™ Rebel Assault I + II', 'Star Wars™: Asalto Rebelde\r\nLas fuerzas rebeldes han ganado su primera batalla contra el lado oscuro... ¡Pero la guerra no ha hecho más que empezar!\r\n\r\nComo Rookie One, eres arrojado a una galaxia 3D muy, muy lejana para aplastar al malvado Imperio, de una vez por todas. Lleva tu T16 Skyhopper a una carrera de entrenamiento a través de Beggar\'s Canyon... Luego esquiva asteroides y destruye cazas TIE en un estruendo en el espacio profundo... enfréntate a una flota de amenazantes AT-AT en la tundra helada de Hoth... y finalmente aniquila a Vader. y el malvado Imperio con una trinchera kamikaze en la infame Estrella de la Muerte.\r\n\r\nStar Wars™: Rebel Assault II: El Imperio Oculto\r\nLa historia comienza en las cercanías de la Nebulosa Dreighton, donde Rookie One es parte de una patrulla de exploración rebelde. Está investigando desapariciones de naves espaciales rebeldes cerca de Dreighton, una región rica en mitología sobre naves espaciales que desaparecen. Las leyendas de la región se remontan a los días en que los primeros viajeros hiperespaciales perdieron la orientación y desaparecieron en las corrientes, remolinos y tormentas de la nebulosa. Durante las Guerras Clon, dos flotas de combate opuestas, en el apogeo de la batalla, fueron tragadas por la Nebulosa Dreighton, dejándola como el único verdadero vencedor de la batalla.\r\n\r\nCon imágenes originales de Star Wars en acción en vivo, Rebel Assault II: The Hidden Empire presenta una multitud de mejoras innovadoras, que incluyen un juego arcade intuitivo y desafiante; quince misiones terrestres, aéreas y espaciales; una historia original de Star Wars; vídeo de alta calidad en pantalla completa; cuatro niveles de habilidad, de fácil a difícil; una banda sonora digital de John Williams Star Wars; y efectos de sonido auténticos de Skywalker Sound.', '1993-10-16', 9.75),
(151, 'STAR WARS™ TIE Fighter Special Edition', 'Conviértete en un recluta de la Armada Imperial al mando de Darth Vader y pilotea vehículos espaciales que te dejarán sin aliento.\r\n\r\nA raíz de la Batalla de Hoth, a través de su traición en Yavin, la alianza de rebeldes y otros criminales ha amenazado los cimientos mismos del pacífico Imperio. La Armada Imperial está llamada a erradicar los últimos restos de la rebelión y restaurar la ley y el orden. Como piloto de cazas estelares de la marina imperial, salvaguardarás vidas en peligro en toda la galaxia. ¡Únete a la causa del Emperador para eliminar el levantamiento rebelde mientras el Imperio contraataca!', '1994-07-01', 9.75),
(152, 'STAR WARS™ - X-Wing Special Edition', 'La Antigua República ha desaparecido. El Senado ha sido abolido. Los Caballeros Jedi han sido exterminados. Ahora el Emperador busca aplastar la última oposición que queda. Contra el abrumador poder del Imperio se alza una pequeña pero creciente Alianza Rebelde.\r\n\r\nGrupos de resistencia dispersos se están uniendo y lo que más se necesita ahora son pilotos de Starfighter. ¿Te unirás a su lucha para poner fin a esta tiranía y convertirte en un héroe de la Rebelión?', '1994-01-01', 9.75),
(153, 'STAR WARS™ X-Wing vs TIE Fighter - Balance of Power Campaigns™', 'En tiempo real contra pilotos reales; ¡Este es el combate espacial de Star Wars como debía ser! Con desafiantes combates aéreos en tiempo real de 2 a 8 jugadores, Star Wars™: X-Wing vs. TIE Fighter es uno de los simuladores de combate espacial de mayor importancia histórica jamás creado. Nunca antes los pilotos virtuales habían podido subir a la cabina de un caza estelar Empire o Rebellion y tener la opción de volar solos o con otros, de forma cooperativa o competitiva.\r\n\r\nVuela en más de 50 misiones de combate en nueve cazas estelares de Star Wars meticulosamente mejorados con o contra tus amigos. O participa en combates cuerpo a cuerpo, enfrentándote a todos los rivales, para determinar de una vez por todas quién es el mejor piloto de cazas estelares de la galaxia. El poder de la Force™ reside en el piloto más hábil y atrevido.\r\n\r\nElige tu nave y elige tus armas, pero sobre todo, elige a tus compañeros de ala con mucho cuidado. ¡Su vida puede depender de ello!', '1997-04-17', 9.75),
(154, 'Star Wars Shadows of the Empire', 'Hace mucho tiempo en una galaxia muy, muy lejana...\r\n\r\nMientras Luke Skywalker y la Alianza Rebelde luchan por derrotar a Darth Vader y el Imperio, surge una nueva amenaza. El Príncipe Oscuro Xizor, líder del sindicato criminal Sol Negro, aspira a ocupar el lugar de Darth Vader al lado del Emperador. Para ello, deberá eliminar al joven Skywalker. Como Dash Rendar, depende de ti proteger a Luke y ayudar a la Alianza a derrotar al malvado Xizor. ¡Cuidado con los infames cazarrecompensas y los letales soldados de asalto! ¡Que la fuerza esté con usted!\r\n\r\n- Una trama nueva y apasionante, con nuevos personajes y entornos... descubre qué pasó entre Star Wars™ The Empire Strikes Back™ y Star Wars™ Return of the Jedi™.\r\n\r\n- Cinco modos de juego, en una variedad de vehículos y naves espaciales, desde el Outrider fuertemente blindado hasta deslizadores de nieve, aerotrenes, mochilas propulsoras y motos deslizadoras.\r\n\r\n- Escenarios de Star Wars™ llenos de acción, incluidos Mos Eisley y el planeta helado Hoth. Nuevos lugares, como las alcantarillas de la Ciudad Imperial, el palacio de Xizor, el espaciopuerto de Gall y los temidos depósitos de chatarra de Ord Mantel.', '1997-09-17', 6.99),
(155, 'STAR WARS™ Jedi Knight Dark Forces II', 'Dark Forces™ marcó un estándar en la acción en primera persona del universo de Star Wars®. Ahora Jedi Knight: Dark Forces II continúa donde lo dejó el galardonado juego... con aún más características y más potencia de fuego en espectaculares gráficos en 3D. Como Kyle Katarn, deberás hacerte con el sable de luz y aprender los caminos de la Fuerza para convertirte en un caballero jedi. Enfréntate a viejos enemigos: Greedo, Boosk, tropas de asalto... y a nuevos enemigos... siete jedi oscuros que planean dominar el poder de un antiguo cementerio para un mal sin igual. Pero no te preocupes, tu arsenal de 10 armas y cerca de 12 poderes de la Fuerza te convertirán en una amenaza a tener en cuenta.', '1997-10-09', 6.99),
(156, 'STAR WARS™ Jedi Knight - Mysteries of the Sith™', '\"He elegido mi destino, y éste se encuentra aquí...\" - Kyle Katarn\r\nHan pasado cinco años de la victoria de Kyle sobre los siete jedi oscuros. Las fuerzas imperiales invasoras avanzan hacia una tranquila base rebelde interrumpiendo el entrenamiento de Mara Jade, una nueva y valiente alumna de Kyle. Presentada por primera vez en la galardonada novela de Star Wars, Heredero del Imperio, escrita por Timothy Zahn, Mara combina sus experiencias pasadas como contrabandista y Mano del Emperador con su aprendizaje como caballero jedi. Armada con cuatro nuevas armas y cinco nuevos poderes de la Fuerza, Mara deberá encargarse de asegurar los suministros que la Nueva República necesita desesperadamente mientras que Kyle, creyendo que es parte de su destino, buscará los tesoros ocultos en un antiguo templo sith.\r\n¿Conseguirá esta audaz mujer jedi proteger la base rebelde, negociar con Ka\'Pa el Hutt y repeler a una falange de enemigos?\r\n¿Liberarán nuevos poderes los antiguos secretos de los sith?\r\n¿Serán Kyle y Mara lo suficientemente fuertes como para resistirse a las tentaciones del lado oscuro, o estos nuevos embrollos van a seducirles?', '1998-01-31', 6.99),
(157, 'STAR WARS™ Galactic Battlegrounds Saga', '¡El destino de una galaxia está en juego y tú estás al mando!\r\n\r\nLidera los grandes ejércitos de la saga Star Wars™ Episodio II: El ataque de los Clones en intensos enfrentamientos estratégicos en tiempo real. Entra en la lucha como el Imperio Galáctico, la Alianza Rebelde, los Wookies, la Federación de Comercio, los Gungans o Royal Naboo para determinar el curso de la Guerra Civil Galáctica.\r\n\r\nExpande el campo de batalla con el complemento Clone Campaigns. Elige jugar como la Confederación separatista de Sistemas Independientes o la República Galáctica en 14 misiones basadas en personajes, vehículos y ubicaciones de Star Wars Episodio II: El ataque de los clones.', '2021-11-09', 6.99),
(158, 'STAR WARS™ - X-Wing Alliance™', 'Una familia neutral lucha por su negocio (y su supervivencia) y se ve envuelta en la lucha contra el Imperio invasor. Debes desafiar las tácticas de mano dura de una familia rival que no se detendrá ante nada para destruir tu empresa comercial. Al final, te unirás a la Alianza Rebelde para realizar una serie de tareas encubiertas y descubrirás información sobre el segundo proyecto de la Estrella de la Muerte del Imperio. ¿El final? Te encontrarás a los mandos del legendario Halcón Milenario, volando contra la enorme flota imperial en la Batalla de Endor. Star Wars™: X-Wing Alliance™ te sitúa justo en medio del conflicto épico de Star Wars™ y lleva la emoción del combate espacial a nuevas alturas.', '1998-03-28', 9.75),
(159, 'STAR WARS™ Rogue Squadron 3D', 'Es un momento de gran regocijo en la galaxia. Luke Skywalker, con la ayuda de Wedge Antilles, ha hecho volar la Estrella de la Muerte. Pero queda poco tiempo para celebrar. El poderoso Imperio está reuniendo fuerzas para un asalto decidido y total contra las fuerzas rebeldes.\r\n\r\nPara salvar a la Alianza Rebelde de este ataque imperial, Luke Skywalker y Wedge Antilles han reunido el Escuadrón Pícaro, un grupo de doce de los pilotos de cazas estelares más hábiles y probados en batalla. Volarás a la batalla como Luke Skywalker para participar en intensas y trepidantes misiones planetarias aire-tierra y aire-aire: combates aéreos, búsqueda y destrucción, reconocimiento, bombardeos, tareas de rescate y más.', '1998-12-03', 9.75),
(160, 'STAR WARS™ Jedi Knight II - Jedi Outcast™', 'El legado de Star Wars Dark Forces™ y de Star Wars® Jedi Knight reside en la intesa acción en primera persona de Jedi Outcast.\r\nComo Kyle Katarn, agente de la Nueva República, utiliza tu sable de luz y el poder de la Fuerza para luchar contra un nuevo mal que está azotando a la galaxia.\r\nManeja hasta 8 habilidades de la Fuerza, incluyendo el truco mental Jedi, el relámpago de la Fuerza o el estrangulamiento de la Fuerza.\r\nElige sabiamente entre un arsenal de 13 armas, incluyendo el rifle disruptor, detonadores térmicos, minas de presión o la ballesta Wookie.\r\nJuega contra 2 o hasta 32 jugadores online o contra una gran variedad de bots y consigue 7 poderes de la Fuerza adicionales.\r\nPon a prueba tus habilidades en 24 misiones para un jugador y en 6 diferentes modos de juego multijugador incluyendo Maestro Jedi, Holocrón, Capturar el ysalamiri, Duelo, Combate a muerte y Capturar la bandera.\r\nInteractúa con personajes legendarios de Star Wars como Luke Skywalker y Lando Calrissian (con la voz de Billy Dee Williams como Lando).\r\nDesarrollado por los aclamados Raven Studios y utilizando el motor de Quake III Arena.', '2003-09-16', 9.75),
(161, 'STAR WARS™ Knights of the Old Republic™', 'Escoge tu camino.\r\nCuatro mil años antes de la fundación del Imperio Galáctico cientos de caballeros Jedi han caído en la batalla contra los despiadados Sith. Tú eres la última esperanza de la Orden Jedi. ¿Podrás dominar el increíble poder de la Fuerza durante tu búsqueda para salvar la República? ¿o te dejarás tentar por el lado oscuro? Héroe o villano, salvador o conquistador... ¡sólo tú podrás decidir el destino de toda la galaxia!', '2003-11-19', 9.75),
(162, 'STAR WARS™ Jedi Knight - Jedi Academy™', 'Forja tu arma y sigue el camino del Jedi\r\nJedi Knight: Jedi Academy es la más reciente entrega de la aclamada serie Jedi Knight. Toma el papel de un nuevo estudiante ansioso de aprender el camino de la Fuerza del Maestro Jedi Luke Skywalker. Interactúa con personajes conocidos de Star Wars en lugares clásicos de la saga Star Wars mientras te enfrentas a la gran elección: lucha por el bien y la libertad en el lado de la luz o sigue el camino del mal y el poder hacia el lado oscuro.', '2003-09-16', 9.75),
(163, 'STAR WARS™ Battlefront (Classic, 2004)', 'STAR WARS™ Battlefront es un juego de acción y disparos que brinda a los fanáticos y jugadores la oportunidad de revivir y participar en todas las batallas clásicas de Star Wars como nunca antes. Los jugadores pueden seleccionar uno de los diferentes tipos de soldados, saltar a cualquier vehículo, manejar cualquier torreta en el frente de batalla y conquistar la galaxia planeta por planeta en línea con sus amigos o sin conexión en una variedad de modos para un jugador. Los modos para un jugador incluyen \"Acción instantánea\", \"Conquista galáctica\" y el modo \"Campañas históricas\" basado en historias que permite a los jugadores experimentar todas las batallas épicas de Star Wars de los Episodios I-VI, luchando desde la perspectiva de cada una de las cuatro facciones. dentro del juego.\r\n\r\nLucha como soldado en el frente, donde cada arma y vehículo que ves es tuyo. Enfréntate al Imperio o aplasta la Rebelión, solo o con un ejército detrás de ti.', '2004-09-21', 9.75),
(164, 'STAR WARS™ Knights of the Old Republic™ II - The Sith Lords™', 'Cinco años después de los acontecimientos del galardonado Star Wars® Knights of the Old Republic™, los Señores Sith han cazado a los Jedi hasta llevarlos al borde de la extinción y están próximos a aplastar la Antigua República. Con la Orden Jedi en ruinas, la única esperanza de la República es un Jedi solitario luchando por recuperar su conexión con la Fuerza. Encarnando a este Jedi, te encontrarás enfrentado a la decisión más terrible de la galaxia: Seguir el lado luminoso o sucumbir a la oscuridad...', '2005-02-08', 9.75),
(165, 'STAR WARS™ Battlefront II (Classic, 2005)', 'Con un combate espacial totalmente nuevo, personajes Jedi jugables, y más de 16 nuevos frentes de batalla, Star Wars Battlefront II te proporciona más formas que nunca de revivir las clásicas batallas de Star Wars en cualquier momento.\r\n\r\nExperiencia de Un Jugador mejorada - Únete al ascenso de la Legion 501 de Tropas de Asalto de Élite de Darth Vader a medida que luchas a través de una nueva saga basada en la historia donde cada acción que realices tendrá un impacto en el frente de batalla y, en última instancia, en el destino de la galaxia de Star Wars.\r\n\r\nNuevas Localizaciones de la Trilogía Clásica - Lucha dentro de los pasillos de la segunda Estrella de la Muerte, en los cenagosos pantanos de Dagobah, e incluso a bordo del Tantive IV, la nave que huye del bloqueo al comienzo de Star Wars Episode IV: Una Nueva Esperanza.\r\n\r\nMás Clases y Vehículos - Escoge ahora de entre seis diferentes clases de soldados, además de héroes de bonus por parte de cada una de las cuatro facciones: Rebeldes, Imperiales, CIS y la República. Y utiliza más de 30 vehículos de tierra y espaciales, incluyendo el speeder clon BARC, el AT-RT, el nuevo Caza Jedi y el ARC 170.\r\n\r\nCaracterísticas Online Mejoradas - Lucha en batallas online masivas con acción multijugador para hasta 64 jugadores. Participa en cinco modos de juego online diferentes incluyendo Conquista, Asalto, Captura la Bandera (una y dos), y Caza.', '2005-11-01', 9.75),
(166, 'LEGO® Star Wars™ - The Complete Saga', 'Dale Caña a los Bloques desde el I hasta el VI\r\n\r\n¡Juega a lo largo de las seis películas de Star Wars en un solo videojuego! Con nuevos personajes, nuevos niveles, nuevas características y, por primera vez, ¡la oportunidad de construir y luchar a tu manera en una divertida galaxia de Star Wars en tu PC!\r\n\r\nNuevas Características de Jugabilidad con Poderes de la Fuerza mejorados, nuevos power-ups y nuevos Desafíos.\r\n\r\nResuelve Puzles mediante el uso del pensamiento creativo, el trabajo en equipo y situaciones únicas de construcción.\r\n\r\n¡Más de 120 personajes jugables, y nuevos personajes como Watto, Zam Wessell, Boss Nass y más!\r\n\r\nCreador de Personajes Mejorado que permite millones de posibilidades. Con trozos de personajes de las 6 películas, crea mezclas de personajes de las dos trilogías como Han Windu y Lando Amidala.\r\n\r\nNiveles rediseñados como la \"Carrera de Vainas de Mos Espa\" y \"Caballería de Naves de Guerra\" para aprovechar la jugabilidad de vehículos en espacio abierto de LEGO Star Wars II.\r\n\r\nNiveles y misiones de bonus que te permiten realizar 10 misiones adicionales de Cazarrecompensas de Jabba the Hutt en la trilogía original de la precuela.\r\n\r\nEl Co-Op para dos jugadores permite a amigos y familiares jugar juntos.', '2009-11-13', 19.50),
(167, 'STAR WARS™ - The Force Unleashed™ Ultimate Sith Edition', 'La historia y acción de Star Wars®: The Force Unleashed™ se amplía con el estreno de\r\nStar Wars The Force Unleashed: Ultimate Sith Edition, una nueva versión especial del juego que mostrará a los jugadores el lado\r\nmás profundo y oscuro de la Fuerza en una historia que les situará en un viaje donde se toparán con el mismísimo Luke Skywalker. La\r\nUltimate Sith Edition incluye todas las misiones originales de Star Wars: The Force Unleashed además de contenido anteriormente\r\ndisponible sólo mediante descarga y un nivel de bonificación completamente nuevo.\r\nStar Wars: The Force Unleashed recrea de una nueva\r\nforma el alcance y la escala de la Fuerza y los jugadores se ponen en el papel del \"Aprendiz Secreto\" de Darth Vader, desvelando\r\nnuevas revelaciones sobre la galaxia Star Wars vistas a través de los ojos de un nuevo personaje misterioso armado con poderes sin precedentes.', '2009-11-03', 19.50),
(168, 'LEGO® STAR WARS™ The Force Awakens', 'La fuerza es poderosa aquí… La franquicia N.º 1 de videojuegos de LEGO® regresa de forma triunfal con un viaje cargado de diversión y humor en la nueva aventura de Star Wars. Juega con todos los personajes de la película, incluidos Rey, Finn, Poe Dameron, Han Solo, Chewbacca, C-3PO y BB-8, además de a Kylo Ren, el general Hux y el capitán Phasma.\r\n\r\nCon LEGO® Star Wars™: El Despertar de la Fuerza™, podrás revivir la épica acción de la película superventas de una forma que solo LEGO puede ofrecer, con nuevo contenido del universo Star Wars que se adentra en el tiempo comprendido entre Star Wars: El retorno del Jedi y Star Wars: El Despertar de la Fuerza.\r\n\r\nLEGO Star Wars: El Despertar de la Fuerza introduce nuevas mecánicas de juego, incluido el sistema multi-construcciones, en el que los jugadores pueden escoger entre varias opciones para crear algo para progresar en el juego, o enzarzarse en emocionantes batallas de bláster por primera vez, aprovechando el entorno para enfrentarse a la Primera Orden.', '2016-06-27', 29.99),
(169, 'STAR WARS™ Empire at War - Gold Pack', 'Dirige o corrompe toda una galaxia en la colección de estrategia definitiva de Star Wars. Es un periodo de guerra civil. ¿Dirigirás los reinos de la Rebelión, asumirás el control del Imperio, o gobernarás los Bajos Fondos en Star Wars Underworld?\r\nStar Wars Empire at War:\r\nDesde las vidas de los soldados hasta la muerte de los planetas, tú eres el comandante galáctico supremo. Es un periodo de guerra civil galáctica. Dirige los reinos de la Rebelión o asume el control del Imperio. Elijas lo que elijas, dependerá de TI conducir a tu facción hacia la victoria definitiva. Dirígelo todo desde las tropas individuales hasta las naves espaciales e incluso la poderosa Estrella de la Muerte, mediante campañas terrestres, espaciales y a lo largo de toda la galaxia. Olvídate de la tediosa recolección de recursos – sencillamente salta al centro de la acción. ¡Incluso podrás cambiar la historia de Star Wars! Todas tus decisiones afectarán a la siguiente batalla, y cada una de ellas ayuda a conformar el destino de la galaxia.\r\n\r\nStar Wars® Empire at War™: Forces of Corruption™:\r\nYa has jugado con el lado luminoso. También lo has hecho con el lado oscuro. ¡Pues ha llegado el turno del lado corrupto! Como Tyber Zann nada te podrá detener para convertirte en el líder criminal más importante desde Jabba the Hutt. Con nuevas tácticas como la piratería, el secuestro, el chantaje y el soborno, podrás controlar las misteriosas fuerzas de la corrupción en tu intento por controlar los bajos fondos de Star Wars. No te limites a controlar la galaxia… ¡corrómpela!', '2006-02-16', 19.50),
(170, 'FINAL FANTASY VII', 'En Midgar, una ciudad controlada por la gran conglomeración Shinra Inc., el reactor Mako nº 1 ha sido destruido por un grupo de rebeldes llamado AVALANCHE.\r\n\r\nAVALANCHE es un grupo formado en secreto para empezar una rebelión contra Shinra Inc., una organización que absorbe energía Mako destruyendo así los recursos naturales del planeta. Cloud, un ex miembro de las fuerzas de combate de elite de Shinra, los SOLDIER, participó en la explosión del reactor Mako.\r\n\r\n¿Podrán Cloud y AVALANCHE proteger al planeta de la temible poderosa Shinra Inc.?\r\n\r\n¡El clásico de los juegos de rol FINAL FANTASY VII vuelve para PC, ahora con nuevas características en línea!', '2013-07-04', 12.99),
(171, 'FINAL FANTASY VIII', 'Son tiempos de guerra. Galbadia, una superpotencia mundial, declara la guerra a Dollet, un país vecino cuya academia militar alberga a dos verdaderas personalidades: el exaltado Seifer y el lobo solitario Squall Leonhart, tan enfrentados entre ellos como lo está su país con Galbadia. Hay quien ve a Squall como alguien falto de espíritu de equipo, y a Seifer como un soldado que carece de la disciplina de su rival. Sin embargo, un encuentro fortuito con la independiente Rinoa Heartilly trastoca el universo de Squall, quien, educado en la más estricta disciplina, encuentra fascinante la despreocupada actitud de ella. Además, Squall comienza a tener sueños en los que es un soldado del ejército galbadiano llamado Laguna Loire...\r\n\r\nEntretanto, una aviesa hechicera está manipulando a los hombres más poderosos de Galbadia.\r\n¿Conseguirán Squall y sus amigos derrotar a esta maquiavélica hechicera y salvar el mundo?\r\n¿Qué papel desempeña en todo esto el misterioso Laguna Loire? Solo tú puedes decidir qué ocurrirá ahora en el regreso de la mejor aventura de rol de todos los tiempos...', '2013-12-05', 12.99),
(172, 'FINAL FANTASY IX', 'FINAL FANTASY IX, uno de los juegos de rol japoneses más aclamados, fue lanzado al mercado en el año 2000 (2001 en territorio europeo) y se convirtió en un éxito con más de 5,5 millones de copias vendidas en todo el mundo.\r\nNo te pierdas esta oportunidad y disfruta ahora de las aventuras de Yitán, Vivi y compañía en esta versión para PC.\r\n\r\n■ Sinopsis de la historia\r\nLa compañía de teatro Tántalus acude al reino de Alexandria con la intención de secuestrar a la princesa Garnet. Sin embargo, y para sorpresa de todos, resulta ser la princesa quien ya tenía pensado fugarse. Así es como conoce a Yitán, uno de los miembros de la compañía, y emprende su viaje junto a él y el capitán Steiner, su guardaespaldas. Más tarde se les unen el mago negro Vivi y Quina de la tribu de Qu. Juntos afrontarán una increíble aventura que los llevará a descubrir secretos sobre sí mismos y la existencia de un Cristal, la fuente de toda vida, amenazado por las sombras de un terrible enemigo al que deberán plantar batalla.\r\n\r\n■ Características del juego\r\n- Aprendizaje de habilidades\r\nCiertos objetos despiertan las habilidades potenciales de los personajes.\r\nAl principio, para poder utilizar una habilidad, el personaje debe tener puesto el objeto correspondiente. Una vez aprendida, ya no será necesario tener equipado el objeto.\r\n¡Prueba todas las opciones y personaliza a tus personajes!', '2016-04-14', 20.99),
(173, 'STRANGER OF PARADISE FINAL FANTASY ORIGIN', 'Con los recuerdos del viaje guardados en lo profundo de sus corazones...\r\n\r\nPara derrotar a los rivales en cruentas batallas, tienes a tu disposición todo tipo de habilidades. Además, cuentas con una amplia gama de trabajos y armas con las que personalizar a los miembros de tu equipo y varios niveles de dificultad para que la experiencia de juego se adapte totalmente a tus gustos.\r\n\r\n¿Volverá la paz con la luz de los Cristales? ¿O dará pie a una nueva forma de oscuridad... o algo completamente distinto?\r\n\r\nEste título muestra localizaciones memorables de otras entregas de la serie FINAL FANTASY.\r\n\r\nLa guarida pirata recuerda a Sastasha, de FINAL FANTASY XIV. Más allá del místico paraje repleto de coloridos corales se halla el escondrijo en donde el barco pirata descansa anclado.\r\n\r\nEl Pico albo guarda parecido con el Monte Gagazet de FINAL FANTASY X. Fieras ventiscas y avalanchas impiden el paso de los viajeros, mientras figuras esculpidas yacen en lo profundo de la montaña.\r\n\r\nExisten más áreas y composiciones musicales que se inspiran en la serie para ofrecer a los seguidores de FINAL FANTASY toda clase de recuerdos nostálgicos y darle al juego una capa más de diversión.', '2023-04-06', 39.99),
(174, 'FINAL FANTASY VII REMAKE INTERGRADE', 'FINAL FANTASY VII REMAKE es una atrevida reconstrucción del videojuego FINAL FANTASY VII, que fue lanzado en 1997, y se ha desarrollado obedeciendo a la visión de los desarrolladores principales del original.\r\nEste juego aclamado por la crítica combina el combate tradicional por turnos con la acción en tiempo real, y se ofrece ahora por primera vez en Steam junto con FF7R EPISODE INTERmission, una nueva historia con Yuffie Kisaragi como protagonista.\r\n', '2022-06-17', 79.99),
(175, 'FINAL FANTASY VI', '¡Una versión remodelada en 2D del sexto título de la célebre serie FINAL FANTASY! Disfruta de una historia clásica narrada a través de unos gráficos retro fascinantes. Toda la magia del original con una jugabilidad mejorada.\r\n\r\nLa Guerra de los Magos hizo desaparecer la magia del mundo. Mil años después, la humanidad depende de las máquinas, hasta que aparece una chica con unos misteriosos poderes. El sistema de magicitas te permite personalizar qué habilidades, hechizos e invocaciones aprenden los miembros del grupo. Todos los personajes jugables tienen sus propias historias, objetivos y porvenires. Descubre cómo se entrecruzan sus destinos en este fascinante melodrama.\r\n\r\nRedescubre el título considerado la obra cumbre de la serie FINAL FANTASY en el momento de su lanzamiento y cuya popularidad perdura hoy en día.', '2022-02-23', 17.99),
(176, 'FINAL FANTASY V', '¡Una versión remodelada en 2D del quinto título de la célebre serie FINAL FANTASY! Disfruta de una historia clásica narrada a través de unos gráficos retro fascinantes. Toda la magia del original con una jugabilidad mejorada.\r\n\r\nEl rey de Tycoon ha percibido un cambio en el viento. Cuando los Cristales que mantienen el equilibrio de poder en el mundo corren peligro, el rey acude al rescate… pero desaparece. En algún lugar un joven y su chocobo acaban conociendo a unos amigos que cambiarán su destino.\r\n\r\nPartiendo de los sistemas de trabajos de los juegos anteriores, FFV incluye una variada selección de trabajos para que los pruebes y un sistema de habilidades único que te permite combinarlas.\r\n\r\n¡Desarrolla tus personajes libremente y domina tu estrategia en combate en la quinta entrega de FINAL FANTASY!', '2021-11-10', 17.99),
(177, 'FINAL FANTASY IV', '¡Una versión remodelada en 2D del cuarto título de la célebre serie FINAL FANTASY! Disfruta de una historia clásica narrada a través de unos gráficos retro fascinantes. Toda la magia del original con una jugabilidad mejorada.\r\n\r\nEl rey de Baronia ha enviado sus mejores barcos voladores, las Alas Rojas, a atacar a los países vecinos. Turbado por su misión, Cecil, caballero oscuro y capitán de las Alas Rojas, decide enfrentarse a la tiranía de Baronia en compañía de su amigo de confianza y de su amante. En su búsqueda de los Cristales, Cecil debe recorrer el mundo entero y el inframundo, llegando hasta la Tierra de Invocación e incluso hasta la Luna. Une fuerzas con el draconarius Kain, la maga blanca Rosa, la invocadora Rydia y muchos otros aliados valiosos.\r\n\r\nFFIV es el primer título que introdujo el sistema de batalla en tiempo continuo, donde el tiempo pasa durante el combate y se transmite una sensación de premura. Gracias al éxito del juego, este revolucionario sistema se implementó en muchos de los títulos sucesivos de la serie.\r\n\r\n¡Contempla la dramática historia y los dinámicos combates de la cuarta entrega de FINAL FANTASY!', '2021-09-08', 17.99),
(178, 'FINAL FANTASY III', '¡Una versión remodelada en 2D del tercer título de la célebre serie FINAL FANTASY! Disfruta de una historia clásica narrada a través de unos gráficos retro fascinantes. Toda la magia del original con una jugabilidad mejorada.\r\n\r\nCon el poder de la Luz a punto de ser eclipsado por el de la Oscuridad, solo los cuatro aventureros elegidos por los Cristales pueden salvar el mundo.\r\n\r\nDescubre el sistema para cambiar los trabajos que se introdujo por primera vez en FFIII. Cámbialos a placer y usa las diferentes habilidades según avanzas en el juego. Cambia entre trabajos muy distintos, como Guerrero, Monje, Mago blanco, Mago negro, Draconarius, Conjurador o incluso Invocador, que te permitirá dar órdenes a los monstruos.\r\n\r\n¡Disfruta de la tercera entrega de la serie FINAL FANTASY!', '2021-07-28', 17.99),
(179, 'FINAL FANTASY II', '¡Una versión remodelada en 2D del segundo título de la célebre serie FINAL FANTASY! Disfruta de una historia clásica narrada a través de unos gráficos retro fascinantes. Toda la magia del original con una jugabilidad mejorada.\r\n\r\nEsta historia épica comienza con cuatro jóvenes huérfanos a causa del conflicto entre el imperio palamecio y el ejército rebelde. En su aventura unirán fuerzas con el mago blanco Minu, el príncipe Néstor de Kasuán, la pirata Leila y muchos personajes más. Descubre los hermosos y a veces trágicos giros del destino que te esperan en tu aventura.\r\n\r\nFFII introdujo un sistema único para el nivel de las habilidades que fortalece los distintos atributos de los personajes en función de su estilo de lucha en lugar de subir de nivel. Usa las palabras clave que obtienes en los diálogos para acceder a información nueva y avanzar en la historia.\r\n\r\n¡La innovadora serie de juegos adopta un ambicioso giro en la segunda entrega de FINAL FANTASY!', '2021-07-28', 11.99),
(180, 'FINAL FANTASY', '¡Una versión remodelada en 2D del primer título de la célebre serie FINAL FANTASY! Disfruta de una historia clásica narrada a través de unos gráficos retro fascinantes. Toda la magia del original con una jugabilidad mejorada.\r\n\r\nTierra, Fuego, Agua, Viento… La Luz que alguna vez brilló dentro de ellos se ha apagado. Con el mundo asolado por la oscuridad, la única esperanza para la humanidad yace en las antiguas leyendas. Métete en la piel de los Guerreros de la Luz y embárcate en tu propia aventura para recuperar el poder de los Cristales y salvar el mundo.\r\n\r\nCambia de oficios para mejorar tus personajes. Recorre el amplio mundo con tu barco volador y otros medios. Vuelve al juego con el que empezó todo.', '2021-07-28', 11.99),
(181, 'FINAL FANTASY XV WINDOWS EDITION', 'Este episodio original relata el origen del odio y pesar del mayor rival de Noctis, Ardyn Lucis Caelum. Su pasado fue borrado de la historia de Eos y tuvo que cargar con una cruz cuyo peso aún sostiene. El misterio de su existencia queda desvelado a través del jugador, quien podrá controlarle por vez primera.\r\n\r\n*Para jugar a este contenido es necesario poseer FINAL FANTASY XV (a la venta por separado) y descargarse la última actualización.', '2018-03-06', 34.99),
(182, 'FINAL FANTASY XIV Online', 'Para quienes descubren FINAL FANTASY XIV Online por primera vez, esta edición incluye tres galardonados títulos: FINAL FANTASY XIV: A Realm Reborn, el juego principal, y la primera y segunda expansión, FINAL FANTASY XIV: Heavensward y FINAL FANTASY XIV: Stormblood. Esta edición también incluye un periodo de juego gratuito de 30 días.*\r\n\r\nÚnete a más de 27 millones de aventureros de todo el mundo y forma parte de un alucinante viaje en un increíble FINAL FANTASY en constante evolución. Disfruta de todas las características distintivas de esta exitosa franquicia: una historia inolvidable, emocionantes batallas y numerosos escenarios cautivadores que explorar.\r\n\r\n¡Forma equipo con tus amigos o juega en solitario! Adéntrate en todas las mazmorras de la historia principal en solitario y busca la ayuda de los NPC aliados para que luchen a tu lado.\r\n', '2014-02-18', 9.99),
(183, 'LIGHTNING RETURNS™ FINAL FANTASY® XIII', 'Lightning Returns es el capítulo de cierre de la saga Final Fantasy XIII y la última batalla con Lightning como protagonista. El fin de la trilogía presenta un mundo nuevo, un sinfín de opciones de personalización e increíbles combates cargados de acción.\r\n\r\nEl mundo se sumerge poco a poco en un mar de caos, y en 13 días no quedará nada.\r\nAunque el planeta está condenado, todavía queda esperanza para sus habitantes.\r\nTras siglos en un estado de cristalización, nuestra heroína acaba de despertarse: una guerrera legendaria con la misión divina de salvar las almas de la humanidad. Su nombre: Lightning.\r\nAl haber sido bendecida con una fuerza increíble y un arsenal de armas nuevas, tiene todo lo que necesita para la batalla que se avecina.\r\nTodo salvo tiempo. Y ahora debe tomar una difícil decisión…', '2015-12-10', 15.99),
(184, 'FINAL FANTASY® XIII-2', 'Ahora mejorado para Windows PC, FINAL FANTASY XIII-2 supera la calidad de su predecesor en todos los aspectos posibles, con un nuevo sistema de juego e imágenes y audio de última generación. Este juego te permitirá explorar libremente distintas posibilidades y caminos al hacer que tus decisiones tengan peso para alterar no solo tus alrededores, ¡sino también el tiempo y el espacio!\r\nYa no es cosa de enfrentarse al destino. ¡Crea tu propio futuro y cambia el mundo!', '2014-12-11', 15.99),
(185, 'FINAL FANTASY® XIII', '¿TIENES EL CORAJE NECESARIO PARA ENFRENTARTE A TU DESTINO?\r\n\r\nCuando un terrible peligro amenaza con sumir el mundo flotante del Nido en el caos, la vida de un grupo de desconocidos da un giro inesperado al quedar marcados como enemigos del estado. La población, aterrada, pide a gritos su sangre y el ejército parece más que dispuesto a derramarla en aras de la paz. Su única esperanza es emprender la huída. Únete en su lucha desesperada contra las fuerzas que rigen su destino y evita una catástrofe sin precedentes.\r\n\r\nGracias a su historia inolvidable, un sistema de combate inigualable que une acción y estrategia y unos gráficos y unas secuencias de vídeo que te dejarán con la boca abierta, FINAL FANTASY XIII es el futuro de los videojuegos.', '2014-10-09', 12.99),
(186, 'FINAL FANTASY XII THE ZODIAC AGE', 'FINAL FANTASY XII THE ZODIAC AGE - Este venerado clásico regresa ahora completamente remasterizado por primera vez para PC con aspectos de la jugabilidad nuevos y mejorados.\r\n\r\nREGRESA AL MUNDO DE IVALICE\r\nAdéntrate en una época de guerra en el mundo de Ivalice. El pequeño reino de Dalmasca ha sido conquistado por el imperio de Arcadia y lo ha dejado sumido en ruinas e incertidumbre. La princesa Ashe, la única heredera al trono, lucha en la resistencia para poner fin a la ocupación de su país.\r\nVaan, un joven que ha perdido a su familia en la guerra, sueña con surcar los cielos sin límites. En una lucha por la libertad y por recuperar la soberanía, estos dos inesperados aliados y sus compañeros se embarcan en una aventura heroica para recobrar su patria.\r\n\r\nTanto los jugadores nuevos como quienes ya conozcan el título podrán vivir una gran aventura mejorada en el mundo de Ivalice.', '2018-02-01', 49.99),
(187, 'FINAL FANTASY X X-2 HD Remaster', 'FINAL FANTASY X narra la historia de Tidus, una estrella del blitzbol que se embarca junto a la hermosa invocadora Yuna en una misión para poner fin a la espiral de destrucción que una terrible amenaza conocida como \"Sinh\" ha provocado en el mundo de Spira.\r\n\r\nFINAL FANTASY X-2 nos lleva de vuelta al mundo de Spira dos años después del comienzo de la Calma Eterna. Tras ver una imagen extrañamente conocida en una esfera, Yuna se convierte en cazaesferas y, en compañía de Rikku y Paine, parte en un viaje en busca de respuestas.\r\n\r\nBasado en las versiones internacionales de los juegos que previamente se publicaron en exclusiva en Japón y Europa, FINAL FANTASY X/X-2 HD Remaster lleva estos clásicos atemporales a la actual generación de fans, ya sean nuevos o de toda la vida.\r\n', '2016-05-12', 24.99),
(188, 'FINAL FANTASY VIII - REMASTERED', 'Son tiempos de guerra. Galbadia, bajo el control de la bruja Edea, ha movilizado sus poderosísimos ejércitos contra las demás naciones del mundo.\r\nSquall y otros miembros de Seed, una unidad de mercenarios de élite, unen fuerzas con Rinoa, perteneciente a la resistencia, para plantarle cara al tiránico régimen de Galbadia y evitar que Edea se salga con la suya.\r\n\r\nEste producto es una versión remasterizada de FINAL FANTASY VIII que incluye numerosas mejoras, entre las que se encuentran opciones para personalizar la dificultad y experiencia de juego.', '2019-09-03', 19.99),
(189, 'Crash Bandicoot™ N. Sane Trilogy', '¡Vuelve Crash Bandicoot™, tu marsupial favorito! Mejorado, embelesado y listo para bailar con la colección de juegos La trilogía. Ahora puedes disfrutar de Crash Bandicoot como nunca antes. Gira, salta, rompe, enfréntate a los épicos desafíos y vive las aventuras de los tres juegos con los que empezó todo: Crash Bandicoot™, Crash Bandicoot™ 2: Cortex Strikes Back y Crash Bandicoot™ 3: Warped. ¡Vuelve a vivir tus momentos favoritos de Crash con gráficos remasterizados y prepárate para disfrutar a tope!\r\nCrash Bandicoot™: La trilogía Nivel Stormy Ascent\r\n\r\nJuega al famoso nivel Stormy Ascent del juego original Crash Bandicoot. Este nivel, que no llegó a terminarse y nunca había estado disponible anteriormente, pondrá a prueba hasta a los fans más curtidos de Crash. ¿Te atreves a enfrentarte a los escalones que se retraen rápidamente, los ayudantes de laboratorio que arrojan recipientes, los pájaros voladores, las plataformas móviles y las púas de hierro? ¡Descárgate y juega al nivel Stormy Ascent!\r\nCrash Bandicoot: La trilogía Nivel Future Tense\r\n\r\nJuega al primer nivel NUEVO que se ha creado para el sistema de juego de la trilogía original en casi 20 años. \"Future Tense\" se inspira en el nivel de demostración \"Waterfall\" del primer Crash Bandicoot, e incluye varios puzles del nivel original en el entorno futurista de Crash Bandicoot 3: Warped. Descubre todo un nuevo nivel de dificultad para Crash Bandicoot: La trilogía mientras esquivas cohetes, destruyes robots y saltas láseres según asciendes por un inmenso rascacielos futurista.', '2018-06-25', 39.99),
(190, 'Crash Bandicoot™ 4 Its About Time', '¡Ya era hora! El aclamado por la crítica Crash Bandicoot™ 4: It’s About Time ya está disponible en Steam. Crash se lanza de lleno con tus marsupiales favoritos a una aventura temporal que se cae a pedazos.\r\n\r\nNeo Cortex y N. Tropy han vuelto a las andadas y esta vez no planean darle la tabarra al universo, ¡su objetivo es el multiverso entero! Crash y Coco tendrán que reunir cuatro máscaras cuánticas y trastocar las leyes de la realidad para salvar el mundo.\r\n\r\n¿Habilidades nuevas? Evidentemente. ¿Más personajes jugables? Sep. ¿Dimensiones alternativas? Faltaría más. ¿Jefes alocadísimos? Por supuesto. ¿Cañita de la buena? Por los \'jorts\' que lleva que sí. ¿Cómo? ¿Entonces se llaman \'jorts\' de verdad? ¡En este universo no!', '2022-10-18', 39.99),
(191, 'Batman™ Arkham Knight', 'Batman™: Arkham Knight es la épica conclusión de la galardonada trilogía de Arkham, creada por Rocksteady Studios. El título, desarrollado en exclusiva para plataformas de nueva generación, presenta la espectacular versión del batmóvil imaginada por Rocksteady. La incorporación del legendario vehículo, unida al aclamado sistema de juego de la serie Arkham, ofrece a los jugadores una recreación definitiva del universo de Batman en la que pueden recorrer las calles y sobrevolar los tejados de la totalidad de Gotham City. En este explosivo desenlace, Batman se enfrenta a la mayor amenaza para la ciudad que ha jurado proteger, cuando el Espantapájaros reaparece para unir a todos los supervillanos de Gotham y jura destruir al murciélago de una vez para siempre.', '2015-06-23', 19.99),
(192, 'Batman Arkham City', 'No hay escapatoria de Arkham City, la enorme y caótica prisión ubicada en el corazón de Gotham City y hogar de los más violentos criminales y de los supervillanos más infames. Con vidas inocentes en juego, solo hay un hombre que puede salvarlos y llevar justicia a las calles de Gotham City… Batman.', '2011-11-15', 19.99);
INSERT INTO `juegos` (`JuegoID`, `nombre`, `descripcion`, `fecha_salida`, `precio`) VALUES
(193, 'Batman Arkham Asylum Game of the Year Edition', 'El juego aclamado por la crítica Batman: Arkham Asylum vuelve en la edición remasterizada Juego del Año, con nuevos 4 mapas para Challenge. Los nuevos mapas de Challenge son Crime Alley, Scarecrow Nightmare, Totally Insane y Nocturnal Hunter (ambos del Insane Night Map Pack).\r\nUtiliza el sistema de combate único FreeFlow™ para encadenar una cantidad ilimitada de combos de forma fluida y luchar contra enormes grupos de secuaces del Jocker en brutales enfrentamientos cuerpo a cuerpo.\r\nInvestiga como Batman, el MEJOR DETECTIVE DEL MUNDO, resolviendo complejos puzles con la ayuda de tecnología forense de última generación incluyendo un escáner de rayos X, lectores de huellas digitales, el spray \'Amido Black\' y un detector de feromonas.\r\nEnfréntate a los villanos más grandes de Gotham incluyendo al JOKER, HARLEY QUINN, HIEDRA VENENOSA y COCODRILO ASESINO.\r\nConviértete en el Depredador Invisible™ con los aterradores asaltos por sorpresa de Batman y un sistema único de puntos de ventaja para moverte sin ser detectado y cazar a tus enemigos.\r\nEscoge múltiples métodos de asalto, tales como descender desde las alturas y atravesar paredes.\r\nExplora cada centímetro del ARKHAM ASYLUM™ y recorre con total libertad la infame isla, presentada por primera vez en su cruda y realista totalidad.\r\nExperimenta qué se siente al ser BATMAN utilizando BATARANGS, un gel explosivo en aerosol, la BATGARRA, el resonador de sónar y el lanzador de cable.\r\nDesbloquea más secretos al completar desafíos ocultos en el mundo y desarrolla y personaliza tu equipo ganando puntos de experiencia.\r\nDesplázate por el mapa utilizando la pistola de gancho de Batman para llegar a lugares inalcanzables, y saltar desde cualquier altura para planear en cualquier dirección.', '2010-03-26', 19.99),
(194, 'Batman™ Arkham Origins', 'Batman™: Arkham Origins es la próxima entrega de la exitosa franquicia de videojuegos Batman: Arkham. Desarrollado por WB Games Montréal, el juego presenta una Ciudad Gótica ampliada e introduce una historia precuela original ambientada varios años antes de los eventos de Batman: Arkham Asylum y Batman: Arkham City, los dos primeros juegos de la franquicia aclamados por la crítica. El juego, que tiene lugar antes del surgimiento de los criminales más peligrosos de Gotham City, muestra a un Batman joven y poco refinado mientras se enfrenta a un momento decisivo en el inicio de su carrera como luchador contra el crimen que marca su camino para convertirse en el Caballero de la Noche.', '2013-10-25', 19.99),
(195, 'Assassins Creed Origins', 'El esplendor y la intriga del antiguo Egipto se desdibujan en una cruenta lucha por el poder. Desvela secretos y mitos ya olvidados en un momento crucial: el origen de la Hermandad de los Assassins\r\n\r\nUN PAÍS POR DESCUBRIR\r\nNavega por el Nilo, explora una tierra vasta e impredecible y descubre los misterios de las pirámides mientras sobrevives a peligrosas facciones y bestias salvajes.\r\n\r\nUNA NUEVA HISTORIA EN CADA PARTIDA\r\nParticipa en las misiones y embárcate en apasionantes historias en las que tu camino se cruzará con personajes carismáticos, desde nobles acaudalados hasta miserables marginados.\r\n\r\nVIVE LA ACCIÓN DEL RPG\r\nDisfruta de una experiencia de lucha totalmente nueva. Saquea y empuña docenas de armas con características y niveles de rareza distintos. Profundiza en la mecánica de progreso y demuestra tu destreza contra jefes singulares y poderosos.\r\nREQUISITOS DEL SISTEMA', '2017-10-27', 59.99),
(196, 'Assassins Creed Chronicles Russia', 'Únete a Nikolai Orelov en su búsqueda por la redención y viaja a través de la emblemática Rusia en una perspectiva 2,5 D.\r\n\r\n• Sobrevive al periodo posterior a la Revolución de Octubre.\r\nAdéntrate en un gran evento histórico acompañado de un estilo propagandístico y simbolismo revolucionario. Móntate a bordo del famoso Transiberiano, infíltrate en el Kremlin y escapa de Moscú.\r\n\r\n• Vive la emoción de ser un Asesino sigiloso en un entorno moderno y único.\r\nExplora un entorno contemporáneo del siglo XX y emplea sus sistemas sigilosos modernos, como ascensores, radios y cables trampa. Usa vehículos como camiones, trenes y tanques.\r\n\r\n• Alterna entre dos personajes.\r\nEncarna a Nikolai, capaz de abatir blancos con su rifle silencioso, detonar minas desde la distancia o acercarse con su bayoneta. Descubre el cabestrante mecánico de Nikolai, una herramienta útil que produce descargas eléctricas.\r\nJuega como Anastasia e infíltrate en canales estrechos y descubre su cuchilla Helix.', '2016-06-09', 9.99),
(197, 'Assassins Creed Chronicles India', 'Juega como Arbaaz en su misión de venganza en este colorista retrato de la India colonial en 2.5D y un estilo de juego basado en el sigilo.\r\n\r\n• Recorre una impresionante recreación de la India del siglo XIX y sus legendarios paisajes.\r\nDescubre un exquisito retrato de la India colonial gracias a una paleta de vibrantes colores. Usa la tirolina por las calles de Amritsar, ocúltate en las sombras de palacio, y descubre artefactos legendarios siguiendo los pasos de Alejandro el Grande.\r\n\r\n• Experimenta la emoción de ser un sigiloso Assassin.\r\nEres un Assassin inteligente y con atractivo, usa nuevos subterfugios para pasar desapercibido y saquear. Descubre las nuevas y letales habilidades y los accesorios de los Assassin, como el talwar (espada curva) o el chakram (arma circular arrojadiza), para infligir el máximo daño posible e interactuar con el escenario.\r\n\r\n• Demuestra tu talento para el combate con el nuevo movimiento de doble asesinato, el golpe hélice o el derribo silencioso. Sé más ágil que nunca en los nuevos niveles de plataformas, y escapa de escenarios que puedes destruir como plazas y bazares, dejando el caos a tu paso.\r\n\r\n• Descubre el nuevo modo de desafío\r\nDesbloquea varias salas de desafío: pon tu habilidad al límite en una compleja secuencia de carreras de obstáculos. Supera el marcador para recoger artefactos, cumple los contratos especiales y asesina, ¡todo ello en una nueva y emocionante experiencia jugable!', '2016-01-12', 9.99),
(198, 'Assassins Creed Syndicate', 'Londres, 1868. En plena Revolución Industrial, lidera tu organización secreta e influye para luchar contra los que explotan a los desprotegidos en nombre del progreso:\r\n\r\n• Campeón de la justicia\r\nSerás Jacob Frye, un joven y temerario Assassin. Usa tus habilidades para ayudar a aquellos que ven pisoteados sus derechos por el avance y el progreso. No te detendrás ante nada para devolver la justicia a las calles de Londres, ya sea liberar a niños usados como esclavos en las fábricas, o robar objetos preciosos de barcos enemigos.\r\n• Dirige el mundo subterrándeo de Londres\r\nPara reclamar Londres para el pueblo, necesitarás un ejército. Como líder de una banda, fortalece tu campamento y convence a miembros de otras bandas para que se unan a tu causa, así podrás arrebatar la ciudad a los Templarios.\r\n• Nuevo sistema dinámico de lucha\r\nEn Assassin’s Creed Syndicate la acción es rápida y brutal. Como maestro del combate, combina las muertes múltiples y los contraataques para vencer.\r\n• Un nuevo arsenal\r\nElige cómo quieres luchar. Aprovecha el lanzador de cuerda para ser más sigiloso y ataca con tu Hoja Oculta. O elige el kukri y los nudillos de acero para sorprender a tus enemigos.\r\n• Vehículos sistémicos\r\nEn Londres, los vehículos sistémicos ofrecen un escenario que no deja de cambiar. Conduce carruajes para perseguir a tu objetivo, usa el parkour para enzarzarte en épicos combates en lo alto de trenes a toda velocidad, o atraviesa en barco a tu manera el río Támesis.\r\n• Un gran mundo abierto\r\nRecorre la ciudad en pleno apogeo de la Revolución Industrial y conoce a importantes personajes históricos. De Westminster hasta Whitechapel, tu camino se cruzará con los de Darwin, Dickens, la Reina Victoria… Y muchos más.\r\n• Un enfoque más nítido\r\nEnfoca el objetivo, participa en el combate o lanza un gancho de agarre manteniendo tu objetivo a la vista con Tobii Eye Tracking (sistema de seguimiento visual). La interfaz de usuario limpia te permite concentrarte en lo que está ocurriendo, mientras que las funciones de visión extendida y luz dinámica te hacen sumergirte mucho más en la emocionante aventura de las calles de Londres.\r\nCompatible con todos los dispositivos de juego de Tobii Eye Tracking.', '2015-11-19', 39.99),
(199, 'Assassins Creed Chronicles China', 'Sigue los pasos de tres Assassins legendarios en épicas misiones de Venganza, Castigo y Redención\r\n\r\nAssassin’s Creed® Chronicles transporta a los jugadores a tres civilizaciones y épocas históricas diferentes: el comienzo del colapso de la Dinastía Ming, la entrada en la guerra del Imperio Sij en la India, y las repercusiones de la revolución de Octubre Rojo.\r\n\r\nDiseñado para los maestros del sigilo que comparten una gran pasión por recrear la Historia con los videojuegos, Assassin’s Creed Chronicles permite a los jugadores asumir los roles de los Assassins Shao Jun, Arbaaz Mir y Nikolaï Orelov, en una versión 2.5D de la más que conocida experiencia de juego que caracteriza a esta serie. Mata desde las sombras, domina el arte del parkour y no dudes en dar un Salto de Fe en esta colección de impresionantes obras de arte en movimiento.\r\nPRIMERA ENTREGA: CHINA\r\n\r\nLa primera entrega de la saga Assassin’s Creed Chronicles tiene lugar en China, en el año 1526, justo cuando la Dinastía Ming comienza su gran declive. Encarnarás a Shao Jun, la última Assassin de la Hermandad China, en su viaje de regreso a su hogar con un solo propósito: venganza. Recientemente entrenada por el legendario Ezio Auditore, está obsesionada con vengar y restaurar el honor de su Hermandad caída.', '2015-04-21', 9.99),
(200, 'Assassins Creed Rogue', 'Siglo XVIII. América del Norte. Entre el caos y la violencia de la Guerra franco-india, Shay Patrick Cormac, un joven y valiente miembro de la orden de los Assassin, experimenta una oscura transformación que afectará de forma definitiva al devenir de la Hermandad. Tras una dura pelea por una misión que fracasa trágicamente, Shay decide acabar con todos aquellos que le traicionaron y convertirse por tanto en el cazador de Assasins más temido de la historia.\r\n\r\nPresentamos Assassin’s Creed Rogue, el capítulo más oscuro de la franquicia Assassin\'s Creed hasta la fecha. Vivirás en la piel de Shay la lenta transformación que le llevará de ser un Assassin a un cazador de Assassins. Sigue tu propio credo y emprende un extraordinario viaje en el que recorrerás la ciudad de Nueva York, valles y ríos en plena naturaleza salvaje, hasta llegar a las heladas aguas del océano Atlántico Norte en busca de tu gran objetivo: acabar con los Assassins.', '2015-03-10', 19.99),
(201, 'Assassins Creed Unity', 'Assassin’s Creed® Unity es un juego de acción/aventura con el que te sumerges en un París lleno de vida durante su época más oscura: la Revolución Francesa. Tendrás control total sobre Arno, ya que podrás personalizar su equipo tanto visual como técnicamente. Además de contar contar con una gran campaña individual, Assassin’s Creed Unity te da la oportunidad de jugar junto con 3 amigos en misiones concretas de una campaña cooperativa online. Durante el juego, formarás parte de momentos clave de la historia francesa que dieron lugar al enorme París que hoy todos conocemos.', '2014-11-13', 29.99),
(202, 'Assassins Creed Freedom Cry', 'Esclavo de nacimiento, Adewalé encontró la libertad como pirata en el Jackdaw. Ahora, 15 años después, Adewalé es un diestro Assassin que naufraga en Santo Domingo sin armas ni tripulación. Tiene que conseguir un barco y formar una nueva tripulación para liberar a los esclavos y matar a sus captores. ¡Más de tres horas de una nueva historia para un jugador! Para jugar a Assassin’s Creed® Grito de Libertad no se necesita una copia de Assassin’s Creed®IV Black Flag™.', '2014-02-25', 14.99),
(203, 'Assassins Creed Liberation HD', 'Presentamos Assassin\'s Creed® Liberation HD, el sorprendente capítulo previo a la Guerra de la Independencia de los Estados Unidos de la saga Assassin\'s Creed que llega, por primera vez, para consolas HD y PC. La experiencia de juego mejorada, una historia más intensa y los gráficos de alta definición hacen de Liberation una experiencia envolvente y completa de Assassin\'s Creed.\r\n\r\nCorre el año 1765. Mientras en el norte se desarrollan los acontecimientos desencadenantes de la Guerra de la Independencia, el ejército español planea tomar el control de Luisiana, en el sur. Pero no cuentan con Aveline, la asesina que usará todas las armas y habilidades de su arsenal en su búsqueda de la libertad. Aveline infunde un miedo mortal en los corazones de los que la rodean, bien por eliminar a sus enemigos con sus múltiples técnicas asesinas o por atraerlos a trampas mortales.\r\n\r\nComo asesina, Aveline pronto se encontrará en un viaje inolvidable que la llevará desde las abarrotadas calles de Nueva Orleans hasta pantanos hechizados con vudú y antiguas ruinas mayas. Jugará un papel crucial en la turbulenta revolución de Nueva Orleans y el comienzo de una nueva nación mientras lucha por la libertad, no para ella, sino para aquellos a los que les han destrozado la vida y las esperanzas.', '2014-01-15', 19.99),
(204, 'Assassins Creed IV Black Flag™', 'Año 1715. Los piratas dominaban todo el Caribe y habían establecido su propio gobierno en el que la corrupción, la codicia y la crueldad eran las únicas leyes.\r\n\r\nEntre estos hombres destacaba un joven y altivo capitán llamado Edward Kenway. Su lucha por conseguir la gloria le granjeó el respeto de leyendas como Barbanegra, pero también le sumergió de lleno en la histórica lucha entre Assassins y templarios, una lucha que amenazaba con destruir todo lo que los piratas habían creado.\r\n\r\nBienvenidos a la era de oro de los piratas.', '2013-10-29', 39.99),
(205, 'Assassins Creed Revelations', 'Cuando un hombre ha ganado todas sus batallas y derrotado a sus enemigos, ¿qué le queda por conseguir? Ezio Auditore deberá dejar atrás su vida en busca de respuestas, en busca de la verdad.\r\nEn Assassin’s Creed® Revelations, el maestro asesino Ezio Auditore sigue los pasos del legendario mentor Altair en un viaje de descubrimiento y revelaciones. Es un camino peligroso, uno que llevará a Ezio a Constantinopla, el corazón del Imperio Otomano, donde un ejército cada vez más grande de templarios amenaza con desestabilizar la región.', '2011-12-01', 14.99),
(206, 'Assassins Creed Brotherhood', 'Vive y respira como Ezio, un legendario Maestro Asesino, en su continua lucha contra la poderosa Orden de los Templarios. Deberá viajar hasta la más increíble de las ciudades de Italia, Roma, centro de poder, avaricia y corrupción, para atacar el corazón del enemigo.\r\n\r\nVencer a los corruptos tiranos que están atrincherados allí requerirá no sólo su fuerza, sino también su liderazgo, puesto que Ezio comandará a toda una Hermandad que luchará a su lado. Sólo trabajando juntos, los Asesinos conseguirán derrotar a sus mortíferos enemigos.\r\n\r\nY por primera vez, se introduce un galardonado apartado multijugador que te permite elegir entre un amplia variedad de personajes únicos, cada uno con sus propias armas y técnicas de asesinato, y comparar tus habilidades con otros jugadores de todo el mundo.\r\n\r\nEs hora de unirse a la Hermandad.', '2011-03-17', 14.99),
(207, 'Assassins Creed 2', 'Assassin\'s Creed® 2 es la secuela del título que se convirtió en la nueva IP con unas ventas más rápidas de la historia de los videojuegos. Este título tan largamente esperado introduce a un nuevo héroe, Ezio Auditore da Firenze, un joven noble italiano, y una nueva era, el Renacimiento.\r\nAssassin\'s Creed 2 mantiene la esencia de la jugabilidad que convirtió al primer juego en un éxito arrollador e introduce nuevas experiencias que sorprenderán y desafiarán a los jugadores.\r\nAssassin\'s Creed 2 es una historia épica de familia, venganza y conspiración que tiene lugar en el prístino, aunque brutal, trasfondo de una Italia renacentista. Ezio entabla amistad con Leonardo da Vinci, se enfrenta con las familias más poderosas de Florencia y se aventura por los canales de Venecia donde aprende a ser un maestro asesino.', '2010-03-05', 9.99),
(208, 'Assassins Creed Directors Cut Edition', 'Assassin\'s Creed™ es el juego de nueva generación desarrollado por Ubisoft Montreal que redefine el género de acción. Mientras que otros juegos presumen de ser de nueva generación con impresionantes gráficos y física, Assassin\'s Creed fusiona tecnología, diseño de juego, temas y emociones en un mundo donde siembras el caos y te conviertes en un vulnerable, pero poderoso, agente de cambio.\r\nEstamos en el año 1191 d.C., y la Tercera Cruzada está asolando la Tierra Santa. Tú, Altair, intentarás poner fin a las hostilidades eliminando ambas partes del conflicto.\r\nEres un Asesino, un guerrero envuelto en un halo de misterio y temido por tu crueldad. Tus acciones pueden sembrar el caos en tu entorno más cercano y tu existencia dará forma a los acontecimientos durante este momento clave de la historia.', '2008-04-09', 9.99),
(209, 'Far Cry 5', 'Te damos la bienvenida al condado de Hope (Montana), la tierra de los libres y valientes, pero también el hogar de una secta apocalíptica llena de fanáticos. Enfréntate a su líder, Joseph Seed, y sus hermanos, los Heraldos, para prender la mecha de la resistencia y liberar a la comunidad asediada.\r\n\r\nJuega en solitario o en un modo cooperativo de dos jugadores en el inmenso mundo abierto del condado de Hope. Haz uso de un vasto arsenal que incluye desde lanzacohetes hasta palas, y conduce cochazos icónicos, quads, avionetas y muchas cosas más para luchar contra las fuerzas de la secta en enfrentamientos épicos.\r\n\r\nDESCUBRE UNO DE LOS FAR CRY MÁS ACLAMADOS\r\nÚnete a los millones de jugadores de Far Cry® 5 y descubre lo que IGN describe como \"diversión frenética\".\r\n\r\nPLANTA CARA A LA SECTA MORTAL DE JOSEPH SEED\r\nLibra al condado de Hope de la secta de la Puerta del Edén y de la familia Seed. Descubre la primera aparición del carismático antagonista Joseph Seed antes de su regreso en Far Cry® New Dawn y su propio DLC en Far Cry® 6: Caída.\r\n\r\nEXPLORA EL CONDADO DE HOPE EN SOLITARIO O COOPERATIVO Y ESTABLECE TUS PROPIAS REGLAS\r\nJuega en solitario o en un modo cooperativo de dos jugadores en el inmenso mundo abierto del condado de Hope. Haz uso de un vasto arsenal que incluye desde lanzacohetes hasta palas, y conduce cochazos icónicos, quads, avionetas y muchas cosas más para luchar contra las fuerzas de la secta en enfrentamientos épicos. Alíate con animales de compañía, como el aclamado oso Cheeseburger y el perro Boomer, y libera el condado de Hope de las garras de sus opresores.', '2018-03-27', 59.99),
(210, 'Far Cry 4', 'Oculto en la recóndita cordillera del Himalaya se encuentra Kyrat, un país anclado en la tradición y la violencia. Eres Ajay Ghale. Viajarás a Kyrat para cumplir con el último deseo de tu madre, pero una vez allí te verás atrapado en una guerra civil desatada para acabar con el régimen opresivo del dictador Pagan Min. Explora y navega este gigantesco mundo de juego, en el que el peligro y los imprevistos acechan a la vuelta de cualquier esquina. Cada decisión que tomes aquí cuenta, y cada segundo es una historia. Bienvenido a Kyrat.\r\n\r\nCaracterísticas principales\r\n\r\n• EXPLORA UN MUNDO ABIERTO LLENO DE POSIBILIDADES\r\nDescubre el mundo de Far Cry más diverso creado hasta ahora. Con escenarios que van desde los bosques más frondosos hasta las cimas nevadas del Himalaya, recorrerás un mundo entero lleno de vida... y de muerte.\r\n- Leopardos, rinocerontes, águilas negras, o feroces tejones meleros abundan en un Kyrat habitado por una abundante vida salvaje. Mientras buscas los recursos que necesitas, siempre sabrás que algo puede estar a punto de cazarte...\r\n- Otea bien el territorio enemigo desde las alturas en el nuevo autogiro, y lánzate en picado a tierra rápidamente con tu nuevo traje aéreo. Trepa a lo alto de un elefante de seis toneladas y desata su impresionante fuerza sobre tus enemigos.\r\n- Elige el arma más adecuada para cada trabajo, da igual lo anormal o impredecible que este pueda ser. Gracias a un arsenal de lo más variopinto, estarás preparado para cualquier eventualidad.\r\n\r\n• MODO COOPERATIVO: JUEGA CON TUS AMIGOS\r\nNo todos los viajes son para hacerlos en solitario. Far Cry 4 permite que un segundo jugador entre y salga de la partida en cualquier punto, redefiniendo así la experiencia del modo cooperativo con la esencia más auténtica de Far Cry de cara a la nueva generación. Ahora podrás descubrir y explorar el vibrante mundo abierto de Kyrat acompañado.', '2014-11-18', 29.99),
(211, 'Far Cry 3 - Blood Dragon', '\"Far Cry 3: Blood Dragon es el ciberjuego de disparos más FLIPANTE.\r\nEstá amBiehntado en un extraño mundo abierto: una isla plagada de maldad.\r\nUna visión del futuro totalmente ochentera al estilo VHS. Año 2007. Eres el sargento Rex Colt, un cibercomando Tipo Cuatro que se enfrenta a un ejército de cíborgs rebeldes. Tu misión: conseguir a la chica, matar a los malos y salvar el mundo.\r\nExperimenta todos los clichés de la época del VHS en esta visión de un futuro nuclear con cíborgs, Dragones Sangrientos, mutantes y Michael Biehn (Terminator, Aliens, Navy Seals).\r\nPara jugar a Far Cry® Blood Dragon no se necesita una copia de Far Cry® 3.', '2013-05-01', 14.99),
(212, 'Far Cry 3', 'Far Cry 3 es un juego de disparos en primera persona de mundo abierto ambientado en una isla como ninguna otra. Un lugar donde señores de la guerra fuertemente armados trafican con esclavos. Donde se persigue a los forasteros para pedir rescate. Y mientras te embarcas en una búsqueda desesperada para rescatar a tus amigos, te das cuenta de que la única forma de escapar de esta oscuridad... es abrazarla.\r\nCaracterísticas clave:\r\nUN DISPARADOR EN PRIMERA PERSONA DE MUNDO ABIERTO\r\n\r\nCrea tu propia aventura FPS. Personaliza tus armas, tus habilidades y tu enfoque en cada misión, ya sea que prefieras una acción intensa de correr y disparar, derribos sigilosos en primeros planos o francotiradores de largo alcance.\r\n\r\nUNA ISLA DE PELIGRO Y DESCUBRIMIENTO\r\n\r\nExplore una isla diversa, desde cadenas montañosas y pastizales pantanosos hasta playas de arena blanca. Descubre reliquias, caza animales exóticos, juega minijuegos y viaja rápidamente por tierra, mar o aire. ¡Ábrete camino a través de las ciudades, templos, puertos fluviales y más de la isla!\r\n\r\nDESCUBRE UNA HISTORIA MEMORABLE Y UN REPARTO DE PERSONAJES LOCOS\r\n\r\nEncuentra un elenco de personajes atractivo y perturbado mientras emprendes un valiente viaje al lado oscuro de la humanidad, escrito por un ganador del premio Writers Guild.\r\n\r\nJUEGA CON AMIGOS EN UNA CAMPAÑA COOPERATIVA COMPLETA\r\n\r\nJuega en línea y forma equipo en una campaña para cuatro jugadores que te desafía a dar lo mejor de ti y trabajar juntos para prevalecer. Experimenta la isla a través de los ojos de una tripulación descarriada en su propia búsqueda para sobrevivir contra todo pronóstico.', '2012-11-29', 19.99),
(213, 'Far Cry 2', 'Far Cry® 2 el juego de disparos en primera persona de nueva generación de Ubisoft, te llevará a lo más profundo de los escenarios más bellos y hostiles del mundo: ¡África! Más que un logro visual y tecnológico, Far Cry 2, la verdadera secuela del premiado y aclamado juego de PC, te ofrecerá una experiencia de juego sin precedentes.\r\nAtrapado entre dos facciones rivales en una guerra por África, serás enviado a este lugar para cazar al \"Jackal\", un misterioso personaje que ha llevado al límite el conflicto entre los lugartenientes poniendo en peligro miles de vidas. Para completar tu misión tendrás que jugar para ambos lados, identificar y explotar sus debilidades, y neutralizar su poder armamentista con sorpresa, subversión, astucia y por supuesto, fuerza bruta.', '2008-10-22', 9.99),
(214, 'Far Cry', 'Un paraíso tropical se siembra de una fuerza maligna escondida en Far Cry®, un shooter de astucia y detallada acción que presiona los límites del combate a nuevos niveles.\r\nEl marino independiente Jack Carver maldice el día en que llegó a esta isla. Hace una semana, una impetuosa reportera llamada Valerie le ofreció una increíble suma de dinero por llevarla a este escombrado paraíso. Poco después de llegar al muelle, el barco de Jack fue balaceado por un misterioso grupo de la milicia que ha empezado a aparecer por toda la isla.\r\nCon su barco destruido, sin dinero y Valerie desaparecida, Jack se encuentra ahora enfrentando a una armada de mercenarios en medio de los peligros de la isla con nada más para poder sobrevivir que una pistola. Sin embargo entre más se adentra en la isla, más extrañas se vuelven las cosas.\r\nJack se encuentra con un recién iniciado en la milicia que le revela los horribles detalles de las verdaderas intenciones de estos mercenarios. Esta persona le da a Jack una opción por resolver: pelear contra estos mortales mercenarios o condenar a la raza humana a una insidiosa agenda.', '2004-03-23', 9.99),
(215, 'Prince of Persia The Forgotten Sands', 'Prince of Persia Las Arenas Olvidadas es el siguiente capítulo en el universo de Las Arenas del Tiempo, el favorito de los fans. Durante su visita al reino de su hermano tras su aventura en Azad, el Príncipe se encuentra el palacio real asediado por un poderoso ejército empeñado en destruirlo. Cuando se toma la decisión de utilizar el antiguo poder de las Arenas en una apuesta desesperada por salvar al reino de la aniquilación absoluta, el Príncipe se embarcará en una aventura épica en la que aprenderá a soportar el peso del auténtico liderazgo, y descubrirá que un gran poder suele acarrear un coste muy elevado. ', '2010-06-10', 9.99),
(216, 'Prince of Persia The Two Thrones', 'El Príncipe de Persia, un experimentado guerrero, regresa de la Isla del Tiempo a Babilonia con su amor, Kaileena. En lugar de la paz que anhela, encuentra su patria devastada por la guerra y con el reino en su contra. El Príncipe es rápidamente capturado y Kaileena no tiene más remedio que sacrificarse y liberar las Arenas del Tiempo para salvarlo. Arrojado a las calles y perseguido como un fugitivo, el Príncipe descubrirá enseguida que las batallas anteriores han dado lugar a un letal Príncipe Oscuro cuyo espíritu le posee gradualmente...', '2005-12-07', 9.99),
(217, 'Prince of Persia Warrior Within', 'Entra en el oscuro inframundo de Prince of Persia Warrior Within, la impactante secuela del aclamado Prince of Persia: The Sands of Time™.\r\n\r\nPerseguido por Dahaka, una encarnación inmortal del Destino que busca una retribución divina, el Príncipe se embarcará en un camino tanto de matanzas como de misterio para desafiar a su muerte predestinada. Su viaje le llevará al núcleo infernal de una fortaleza en una isla maldita, donde se albergan los peores temores de la humanidad.\r\n\r\nSólo con inflexible determinación, amargos desafíos y la dominación de nuevas técnicas mortales de combate, el Príncipe podrá ascender a un nuevo nivel como guerrero y defender lo que ningún enemigo le va a arrebatar: su vida.', '2004-11-30', 9.99),
(218, 'Prince of Persia The Sands of Time', 'En mitad de las ardientes arenas de la antigua Persia circula una leyenda en una antigua lengua. Habla sobre una época transmitida por la sangre y gobernada por el engaño. Una daga mágica atrajo a un joven príncipe que se la llevó para liberar un mortífero mal en un hermoso reino. Ayudado por los engaños de una seductora princesa y por los absolutos poderes de las Arenas del Tiempo, el príncipe empieza una angustiosa búsqueda para reclamar el Palacio de los Malditos y restaurar la paz en sus tierras.', '2003-12-02', 9.99),
(219, 'Prince of Persia', 'La aclamada franquicia de Prince Of Persia regresa por primera vez para las consolas de nueva generación y nos trae un viaje épico y completamente nuevo.\r\nEmerge un nuevo héroe – domina las acrobacias, la estrategia y las tácticas de combate del más ágil guerrero de todos los tiempos. Cuélgate del borde de edificios, realiza acrobacias aéreas perfectamente medidas y deslízate a través de cañones, edificios y prácticamente cualquier cosa que esté a tu alcance. Este nuevo guerrero deberá utilizar todas sus nuevas habilidades a lo largo de un sistema de combate totalmente nuevo para lograr combatir con éxito a los tenientes corruptos de Ahriman y así poder curar la tierra de la oscura corrupción y restaurar la luz.\r\nComienza una nueva y épica aventura – escápate para poder experimentar un nuevo y fantástico mundo de la antigua Persia. Historia y elementos ambientales perfeccionados que ofrecen una experiencia de aventura y acción que bien podría competir con las mejores películas de Hollywood.\r\nNueva estructura de mundo abierto – por primera vez en la historia de la franquicia de Prince Of Persia, tendrás la oportunidad de determinar la forma en que evoluciona el juego en una aventura no-lineal. El jugador decidirá cómo se desarrolla la historia al escoger su camino en este mundo abierto.\r\nSurge una nueva aliada – la aliada más grande de la historia se revela en forma de Elika, una compañera con IA dinámica que se le une al Príncipe en su lucha para salvar al mundo. Dotada de poderes mágicos, Elika interactúa en el combate, la acrobacia y la resolución de rompecabezas dentro del juego; permitiendo así al Príncipe alcanzar nuevas alturas de artística y mortal acrobacia a través de movimientos acrobáticos a dúo y devastadores combos de ataque.', '2008-12-10', 9.99),
(220, 'Tom Clancys The Division', 'Durante un Viernes Negro una pandemia devastadora se extiende por la ciudad de Nueva York y, uno tras otro, los servicios básicos caen. En cuestión de días, sin comida ni agua, la ciudad entera se ve abocada al caos. De inmediato se activa The Division, una unidad secreta de agentes tácticos capaces de actuar de forma independiente. A pesar de llevar una vida aparentemente normal entre el resto de los ciudadanos, estos agentes están entrenados para actuar sin recibir órdenes y sin mando central, para salvar a la sociedad.\r\n\r\nCuando la sociedad cae, surgimos.', '2016-03-08', 29.99),
(221, 'Tom Clancys Ghost Recon Wildlands', 'Crea un equipo hasta con 3 amigos en Tom Clancy’s Ghost Recon® Wildlands y disfruta del Shooter militar definitivo en un enorme y peligroso mundo abierto. Participa en un modo JcJ 4 contra 4 basado en clases y batallas tácticas con Ghost War.\r\n\r\nACABA CON EL CÁRTEL\r\nEn un futuro cercano, Bolivia ha caído en manos del despiadado cártel de Santa Blanca, que ha propagado la injusticia y la violencia. Su objetivo: crear el mayor narcoestado de la historia.\r\n\r\nSÉ UN GHOST\r\nCrea un Ghost y personalízalo junto a sus armas y equipo. Disfruta de una libertad de juego total. Lidera a tu equipo y acaba con el cártel, solo o con tres amigos.\r\n\r\nEXPLORA BOLIVIA\r\nViaja por el mayor mundo abierto creado por Ubisoft para un juego de acción y aventura. Descubre la gran diversidad de paisajes de Wildlands por tierra, mar y aire con más de 60 vehículos distintos.\r\n\r\nCONFÍA EN TUS OJOS\r\nDetener el Cartel de Santa Blanca se convierte en una experiencia aún más rica con Tobii Eye Tracking. Las características como Extended View, Aim at Gaze y Communications Wheel te permiten utilizar el movimiento natural de tus ojos para interactuar con el ambiente, sin interrumpir o modificar tus controles tradicionales. Contando con un extenso conjunto de funciones de seguimiento ocular, la comunicación del equipo se vuelve más eficiente, los tiroteos más intensos y la exploración de tu nuevo entorno se convierte en una aventura aún más envolvente.', '2017-03-07', 49.99),
(222, 'Tom Clancys Ghost Recon Future Soldier', 'CUANDO TE VEAS SUPERADO EN NÚMERO, RECUERDA QUE SOLO LOS MUERTOS JUEGAN LIMPIO.\r\n\r\nNo hay nada justo ni honroso en un combate. Solo hay victorias y derrotas, vivos y muertos. Y a los Ghosts no les preocupan las posibilidades. Hacen lo que está en su mano para superar y eliminar al enemigo. Para ganar una batalla desigual, la clave está en usar la tecnología más innovadora.\r\n\r\nEn Ghost Recon Future Soldier te unirás a una élite de soldados de operaciones especiales altamente entrenados.\r\nMarcar y eliminar: usa la función de marcado sobre el terreno o con drones para coordinar ataques sincronizados.\r\nQue no te vean: aprovecha el sistema de cobertura y cambia entre coberturas dinámicas para sorprender, flanquear y eliminar al enemigo.', '2012-06-28', 14.99),
(223, 'Tom Clancys Ghost Recon Desert Siege', '2009, África del Este. Un conflicto de más de 60 años explota sobre Etiopía e invade a su pequeño vecino Eritrea amenazando las vías marítimas más vitales del mundo en el Mar Rojo. Un equipo élite de Boinas Verdes Norteamericano conocido como los Ghosts, arriba a este lugar para salvaguardar los mares y liberar Eritrea. Conforme avanza la guerra, los Ghosts son llevados desde las costas de Eritrea hasta el corazón de Etiopía en su batalla más mortal hasta el momento.\r\nNuevos modos multi – jugador: modos Siege y Domination basados en estrategias de equipo permite atacar y defender territorios.\r\nAmbos modos de juegos nuevos, totalmente compatibles con el juego original de Ghost Recon – juega durante horas en los mapas originales.\r\n8 nuevas misiones para un solo jugador.\r\n4 espacios nuevos dedicados exclusivamente a multi – jugador.\r\n9 armas nuevas en multi – player incluyendo la ametralladora Bizon, el rifle de largo alcance M98 y la temida ametralladora M-60.', '2002-03-26', 4.99),
(224, 'Tom Clancys Ghost Recon Island Thunder', 'Ghost Recon da el siguiente paso en lo que a realismo dentro del campo de batalla se refiere con Tom Clancy’s Ghost Recon™: Island Thunder™.\r\n2009, Cuba: Castro ha muerto y las primeras elecciones libres en décadas para Cuba están siendo precedidas por un completo ambiente de agitación liderado por un lord de las drogas. Los Ghosts, un equipo élite de Boinas Verdes Norteamericano, son enviados a Cuba como parte del equipo de pacificación de la UN para destruir las fuerzas rebeldes y a sus líderes mercenarios y así asegurar unas elecciones libre en Cuba.\r\n8 nuevas misiones para un solo jugador en una completamente nueva campaña a través de la Isla de Cuba\r\n5 nuevos mapas dedicados a multi – jugador\r\n12 nuevas armas para multi – jugador incluyendo el rifle M4 SOCOM y el lanzador de granadas automático MM-1\r\n2 nuevos modos nulti – jugador\r\nNuevos vehículos cubanos enemigos, nuevos vehículos aliados e inserciones por helicóptero.', '2002-09-25', 4.99),
(225, 'Tom Clancys Ghost Recon', '2008, Europa Oriental. La guerra ha traspasado las fronteras de Rusia y la fe del mundo se balancea en la cuerda floja. Es en este preciso momento cuando se llama a los Ghosts – un hábil grupo de boinas verdes de élite, armados con la más alta tecnología y entrenados para utilizar las armas más mortíferas -. Su misión: abrir el camino para las fuerzas de pacificación de la NATO y ponerle un alto al conflicto antes de que este literalmente prolifere.\r\nTodo el realismo, dulzura y miedo del Mejor Juego del Año: tensión y realismo a muerte que han ganado premios llevados a los campos de guerra del mañana.\r\nMulti - jugador: multi – jugador en línea o LAN de hasta 36 jugadores simultáneos.\r\nArmas: armas especiales y/o estándar como el M16A2, carabina M4 y el mortífero OICW.\r\nModo de Juego: una experiencia de combate total que nos da una lección realista de cómo serán los campos de guerra del futuro.\r\nIncluye: 23 misiones de un solo jugador, 11 mapas multi – jugador y seis modos para multi – jugador.', '2001-11-13', 9.99),
(226, 'Tom Clancys Splinter Cell Blacklist', 'Estados Unidos tiene presencia militar en dos tercios de los países de todo el mundo, y algunos de ellos han dicho ‘basta’. Un grupo terrorista autodenominado los Ingenieros ha lanzado un ultimátum al que llaman la Lista Negra, una serie de ataques en escala contra intereses de EE.UU. El agente especial Sam Fisher es el líder del recién formado 4th Echelon, una unidad clandestina que solo responde ante el presidente de Estados Unidos, y cuya misión será dar caza a los Ingenieros por todos los medios, y detener la cuenta atrás de la Lista Negra antes de que llegue a cero.\r\nCaracterísticas principales\r\nOpera sin restricciones:\r\nSam ha vuelto con su habitual traje operativo y sus visores, y es más letal y ágil que nunca. Con la libertad de hacer lo que sea necesario para detener la Lista Negra, Sam viaja desde lugares exóticos a ciudades estadounidenses en una carrera contrarreloj para averiguar quién está detrás de esta terrible amenaza. La emoción del juego se ve potenciada por la captura completa de movimientos, que crea una experiencia totalmente de cine.\r\nTu propio estilo de juego:\r\nSplinter Cell Blacklist mantiene las raíces de juego de sigilo propias de la franquicia mientras explora nuevas direcciones para entrar de lleno en la acción y la aventura. Los jugadores pueden definir su propio estilo de juego y ver recompensadas sus decisiones.', '2013-08-22', 19.99),
(227, 'Tom Clancys Splinter Cell Conviction', 'Una investigación sobre la muerte de su hija conduce de forma inesperada al ex agente Sam Fisher a descubrir que ha sido traicionado por su antigua agencia, Third Echelon. Ahora, como renegado, Fisher se encuentra a sí mismo en un carrera contrarreloj para desbaratar un mortífero complot terrorista que amenaza a millones de personas.\r\nUniendo las mejoras de un modo de juego revolucionario con una explosiva historia sin ningún tipo de restricciones, Tom Clancy’s Splinter Cell Conviction te arma hasta los dientes con un arsenal de alta tecnología y con habilidades letales de un operativo de élite a la vez que te invita a entrar en el peligroso mundo donde la justicia se basa en tus propias reglas.', '2010-04-29', 9.99),
(228, 'Tom Clancys Splinter Cell Chaos Theory', 'Es el año 2008.\r\nCortes de luz en toda la ciudad... sabotaje de la bolsa... secuestro electrónico de los sistemas de defensa nacional... es la guerra de la información.\r\nPara prevenir estos ataques, los agentes deben infiltrarse a fondo en territorio hostil y recolectar información crítica de inteligencia, más cerca aún que los propios soldados enemigos.\r\nEres Sam Fisher, el mejor agente encubierto de élite de la NSA. Para completar tu misión deberás matar de cerca, atacar con tu cuchillo de combate, disparar con tu prototipo de rifle Land Warrior y usar técnicas de supresión radicales como la rotura de cuello invertida. Además de formar parte de misiones de infiltración multijugador, donde el trabajo en equipo es el arma definitiva.\r\nSi el enemigo evoluciona, tú también.', '2005-03-29', 9.99),
(229, 'Tom Clancys Splinter Cell Double Agent', 'La saga de éxito Tom Clancy\'s Splinter Cell® toma un rumbo completamente nuevo.\r\nEncarna a un agente doble en la esperadísima secuela del Juego del Año 2005, Tom Clancy\'s Splinter Cell Double Agent™. Adopta el papel simultáneo de agente secreto y terrorista sin escrúpulos, donde las decisiones que tomes sobre a quién traicionar y a quién proteger afectarán al resultado del juego.\r\nSiente la tensión brutal y los dilemas desgarradores de la vida en tu papel de agente doble. Miente, mata, sabotea, traiciona. Todo para proteger al inocente. ¿Hasta dónde llegarás para ganarte la confianza del enemigo? En la piel del agente secreto Sam Fisher, deberás infiltrarte en un despiadado grupo terrorista y destruirlo desde el interior. Mide al detalle las consecuencias de tus acciones: si matas a demasiados terroristas quedarás al descubierto y, si dudas, morirán millones de personas. Haz lo que sea necesario para completar tu misión, pero sal de allí con vida.', '2006-10-19', 9.99),
(230, 'Tom Clancys Splinter Cell', '¡Infíltrate en posiciones terroristas, adquiere información crítica de inteligencia por cualquier medio necesario, ejecuta con extrema cautela y retírate sin dejar huella!\r\nTú eres Sam Fisher, un operativo secreto altamente entrenado del arma secreta de la NSA: el Third Echelon. La estabilidad del mundo está en tus manos mientras la tensión internacional por el cyber - terrorismo está a punto de explotar en una Tercera Guerra Mundial.\r\nAdéntrate en el Verdadero Mundo del Espionaje Moderno – entra el universo realista de Tom Clancy. Prepárate con los mejores y más secretos accesorios y ropa.\r\nUn Nuevo Nivel de Cautela – toda la mejor acción y cautela ahora con nuevos movimientos. Medio ambientes altamente interactivos te darán más opciones de juego y mayor habilidad para preparar estratégicamente cada acción.\r\nMedio Ambientes Profundos. Inmersión sin Paralelo – medio ambientes impresionantes gracias al motor gráfico Unreal ™. Luz dinámica y efectos de sonido que simulan la realidad a la perfección.\r\nAcción a Escala Global – más de 20 horas de acción. Objetivos de misión diversos que se pueden lograr por diferentes medios, aumentando así la jugabilidad.', '2003-02-18', 4.99),
(231, 'Watch_Dogs', 'Solo hace falta mover un dedo para hacerlo todo. Conectarse con amigos. Comprar los últimos juguetes tecnológicos. Saber lo que pasa en el mundo… Pero ese simple gesto de mover el dedo no solo arroja sombra sobre la pantalla. Con cada conexión dejamos una huella en el mundo digital y dejamos rastros de nuestros movimientos, de lo que buscamos, de lo que nos gusta y nos disgusta. Y no solo dejan huella las personas. Hoy día todas las ciudades están conectadas, las infraestructuras urbanas están monitorizadas y todo se controla con un complejo sistema operativo.\r\n\r\nEn Watch_Dogs este sistema se denomina CTOS (Central Operating System), controla casi todos los elementos tecnológicos de la ciudad y guarda los datos de todos sus habitantes.\r\n\r\nJuegas como Aiden Pearce, un brillante hacker y antiguo matón, cuyo pasado delictivo le ha conducido a una terrible tragedia familiar. Ahora, persiguiendo a los que hirieron a tu familia, podrás hackear todo lo que te rodea, manipulando la red de conexiones de la ciudad. Accede a las cámaras de seguridad que hay por todas partes, descarga información personal que te lleve a tu objetivo, controla los semáforos y el transporte público para detener al enemigo… y mucho más.\r\n\r\nUsa la ciudad de Chicago como tu propia arma, y crea tu propio estilo de venganza.', '2014-05-26', 19.99),
(232, 'Watch_Dogs 2', 'Juega como Marcus Holloway, un joven y brillante hacker que vive en la cuna de la revolución tecnológica, la zona de la bahía de San Francisco.\r\nColabora con DedSec, un conocido grupo de hackers, para ejecutar el mayor pirateo de la historia; acaba con ctOS 2.0, un sistema operativo utilizado por un grupo de genios criminales para vigilar y manipular a los ciudadanos a gran escala.\r\n\r\nAprovecha las ventajas de Tobii Eye Tracking. Deja que tu mirada te ayude a armar el \"Internet de las cosas\", apunta a los enemigos y cúbrete mientras exploras naturalmente el ambiente. Combina el amplio conjunto de funciones de seguimiento ocular para identificar a los enemigos, interactuar con el entorno, ubicar puntos de refugio y seleccionar rápidamente los objetivos pirateables. Deja que tu visión conduzca la piratería del cerebro digital de la ciudad.\r\nCompatible con todos los dispositivos de juego de Tobii Eye Tracking.', '2016-11-29', 59.99),
(233, 'Call of Duty (2003)', 'Call of Duty® ofrece el descarnado realismo y la intensidad cinematográfica de las épicas batallas de la II Guerra Mundial como nunca antes: a través de los ojos de ciudadanos soldado y héroes olvidados de la alianza de naciones que ayudaron a conformar el curso de la historia moderna.\r\nAdéntrate en el caos de la batalla como parte de un escuadrón bien entrenado, que despliega fuego de cobertura y pone a salvo a los heridos. Además de los movimientos y tácticas auténticos de un escuadrón, la personalidad y entrenamiento propios de cada soldado salen a la luz en el campo de batalla.\r\nNo hay soldado o nación que ganara la guerra en solitario. Por primera vez, Call of Duty® capta la guerra desde distintas perspectivas: a través de los ojos de soldados americanos, británicos o rusos. Sumérgete en la batalla en 24 misiones que abarcan 4 campañas históricas interconectadas. Encárgate de objetivos de misión que van desde el sabotaje y el asalto total a misiones de sigilo, combate entre vehículos y rescate. Las armas, localizaciones, vehículos y sonidos de guerra auténticos contribuyen al realismo, sumergiéndote en la experiencia más intensa sobre la II Guerra Mundial hasta el momento.\r\n', '2003-10-29', 19.99),
(234, 'Call of Duty 2', 'Call of Duty® 2 da un nuevo significado a la intensidad cinematográfica y al caos de la batalla, tal y como se vive a través de los ojos de soldados normales que luchan juntos en conflictos épicos de la II Guerra Mundial. Call of Duty 2, secuela del juego original de 2003 (ganador de más de 80 galardones de Juego del Año), ofrece batallas más colosales, intensas y realistas que nunca antes, gracias al maravilloso apartado visual del nuevo motor COD™2.\r\nEl equipo de desarrollo número uno en juegos de puntería sobre la II Guerra Mundial vuelve con una nueva y sorprendente experiencia: desarrollado por Infinity Ward, creadores del galardonado Call of Duty. Mejoras completamente nuevas y sin precedentes, desde los gráficos de sorprendente realismo hasta la inigualable jugabilidad, gracias al revolucionario motor COD2, a la innovadora inteligencia artificial y a las innovaciones en la dinámica de juego basadas en las decisiones. La nieve, la lluvia, la niebla y el humo perfectamente recreados se combinan con luces y sombras dinámicas, lo que lo convierten en el juego de puntería sobre la II Guerra Mundial más intenso hasta el momento.', '2005-10-25', 19.99),
(235, 'Call of Duty Ghosts', 'Superados en número y en armamento. Pero nunca vencidos.\r\n\r\nCall of Duty®: Ghosts es un extraordinario paso adelante en una de las mayores sagas de todos los tiempos en el sector del entretenimiento. Este nuevo capítulo de Call of Duty® cuenta con una nueva dinámica en la que el jugador forma parte de una nación destrozada que no lucha por la libertad, sino por sobrevivir.\r\n\r\nUn motor de nueva generación da vida a esta nueva experiencia de Call of Duty y ofrece unos niveles espectaculares de realismo y rendimiento, sin perder la velocidad y la fluidez de las 60 imágenes por segundo en todas las plataformas.\r\n\r\nDiez años después de un acontecimiento devastador, el equilibrio de poder mundial y las fronteras de Estados Unidos han cambiado para siempre. Respecto a lo que queda de las fuerzas de operaciones especiales, un misterioso grupo conocido como \"Ghosts\" está al frente de la lucha contra una nueva potencia mundial tecnológicamente superior.\r\n\r\nUn nuevo universo de Call of Duty: por primera vez en la historia de la saga, los jugadores asumen el papel de perdedores en Call of Duty: Ghosts. Superados en número y en armamento, tendrán que luchar para recuperar una nación destruida en una narrativa intensamente personal. Los jugadores conocerán a nuevos personajes y visitarán lugares en un mundo que ha cambiado como nunca se había visto en Call of Duty®.', '2014-03-25', 49.99),
(236, 'Call of Duty 4 Modern Warfare (2007)', 'El nuevo thriller de acción del galardonado equipo de Infinity Ward, los creadores de la serie Call of Duty®, ofrece la experiencia cinematográfica más intensa jamás vista hasta la fecha. Call of Duty 4: Modern Warfare equipa a los jugadores con un avanzado y moderno arsenal de alta potencia de fuego y los transporta a los lugares más conflictivos del planeta para encargarse de un grupo de enemigos sin escrúpulos que está amenazando al mundo.\r\nComo marine de los E.E.U.U. y soldado británico del S.A.S. a través de una historia llena de giros, los jugadores utilizan tecnología sofisticada, potencia de fuego superior y ataques coordinados por tierra y aire sobre el campo de batalla donde la velocidad, la precisión y la comunicación son esenciales para la victoria. Este título épico también incluye una intensa acción multijugador ofreciendo, a los fans y a toda una nueva comunidad, una mecánica de juego constante, adictiva y personalizable.', '2007-11-12', 19.99);
INSERT INTO `juegos` (`JuegoID`, `nombre`, `descripcion`, `fecha_salida`, `precio`) VALUES
(237, 'Call of Duty Infinite Warfare', 'Infinite Warfare ofrece tres modos de juego exclusivos: campaña, multijugador y Zombis.\r\n\r\nEn la campaña, los jugadores interpretan al capitán Reyes, un piloto ascendido a comandante que debe liderar a las fuerzas de la coalición contra un enemigo fanático y despiadado, mientras intenta superar los entornos letales del espacio.\r\n\r\nEl multijugador combina un sistema de movimientos encadenados con el diseño de mapas centrado en el jugador, un gran nivel de personalización y un nuevo sistema de combate para crear una genial experiencia lúdica donde cada segundo cuenta. Los módulos de combate (o módulos) son los sistemas de combate definitivos. Cada módulo es una armadura de combate táctico de vanguardia que el jugador se pone, y que encaja con distintos estilos de juego. Este se unirá también a uno de los cuatro nuevos equipos de misión para desbloquear tarjetas de visita, camuflajes, emblemas y armas exclusivas para ese equipo.\r\n\r\nEn Zombis, viaja en el tiempo hasta un parque de atracciones de la década de 1980 con un montón de atracciones, un alucinante salón de recreativos y una montaña rusa funky y totalmente operativa. Cuenta con los aspectos más populares de este modo de juego, como huevos de Pascua, potenciadores y armas originales, al tiempo que ofrece novedades como las reglas por equipos, los recreativos del Más allá y las cartas de Destino y Fortuna.', '2016-11-04', 29.99),
(238, 'Call of Duty World at War', 'Call of Duty ha vuelto, redefiniendo la guerra como nunca la habías experimentado. Tomando como base el motor de Call of Duty 4®: Modern Warfare, Call of Duty: World at War sumerge a los jugadores en la experiencia de combate más descarnada y caótica de la Segunda Guerra Mundial hasta la fecha. Los jugadores tendrán que agruparse para sobrevivir a las batallas extremadamente angustiosas y duras que condujeron a la desaparición de los poderes del Eje en los frentes europeo y pacífico. El título ofrece una experiencia sin censuras, con enemigos únicos y diferentes combates: cazas kamikazes, ataques de emboscada, cargas japonesas y astutas estrategias de cobertura, así como acción explosiva en pantalla mediante la nueva campaña cooperativa para cuatro jugadores. El adictivo y competitivo modo multijugador también ha sido mejorado con nueva acción basada en vehículos e infantería, un mayor número de armas, un nivel máximo aumentado y montones de nuevos mapas, ventajas y desafíos.', '2008-11-18', 19.99),
(239, 'Call of Duty Modern Warfare Remastered (2017)', 'Vuelve Call of Duty: Modern Warfare, uno de los juegos mejor valorados por la crítica de la historia, remasterizado en alta definición con texturas mejoradas, un renderizado basado en físicas, iluminación de alto rango dinámico y mucho más. Desarrollado por Infinity Ward, el aclamado Call of Duty® 4: Modern Warfare® marcó unos nuevos estándares de acción intensa y cinematográfica. Además, obtuvo el reconocimiento mundial como uno de los videojuegos más influyentes de la historia. Call of Duty 4: Modern Warfare, ganador de numerosos galardones al Juego del año, se convirtió en un éxito instantáneo y un fenómeno de masas que puso el listón muy alto en los shooters en primera persona, y ahora regresa para una nueva generación de fans.\r\n\r\nRevive una de las campañas más legendarias de la historia mientras recorres el mundo y realizas misiones tan míticas como \"Todos camuflados\", \"Club de ligue aéreo\" y \"Tripulación prescindible\". Encarnarás a personajes inolvidables como el sargento John \"Soap\" MacTavish o el capitán John Price mientras luchas contra un grupo rebelde de enemigos en puntos calientes del mundo que van desde Europa del Este y la Rusia rural hasta Oriente Medio. Vive una historia apasionante repleta de giros, haz uso de una tecnología sofisticada y una potencia de fuego superior mientras coordinas ataques aéreos y terrestres en un campo de batalla en el que la velocidad y la precisión son fundamentales para la victoria.\r\n\r\nAdemás, forma equipo con tus amigos en el modo en línea que redefinió Call of Duty, con rachas de bajas, PX, prestigio y demás elementos en modos multijugador personalizables y clásicos.', '2017-07-27', 39.99),
(240, 'Call of Duty Modern Warfare 2 (2009)', 'El juego más esperado del año y la secuela del juego de acción en primera persona número uno en ventas de todos los tiempos, Modern Warfare 2 continúa con la tensión y la acción trepidante enfrentando a los jugadores con una nueva amenaza decidida a situar al mundo al borde del colapso.\r\n\r\nCall of Duty®: Modern Warfare 2 incluye por primera vez en un videojuego una banda sonora creada por el legendario y galardonado compositor Hans Zimmer, ganador de los premios Oscar de la Academia®, Globo de Oro®, Grammy® y Tony. El juego continúa los eventos históricos de Call of Duty® 4: Modern Warfare®, la superproducción aclamada y premiada mundialmente por la crítica,', '2009-11-12', 19.99),
(241, 'Call of Duty Black Ops', 'La saga de acción en primera persona más grande de todos los tiempos y la continuación del superventas del año pasado Call of Duty®: Modern Warfare 2 regresa en Call of Duty®: Black Ops.\r\nCall of Duty®: Black Ops te llevará más allá de las líneas enemigas como miembro de un equipo de fuerzas especiales de élite en misiones de guerra encubierta, operaciones secretas y conflictos explosivos por todo el planeta. Tendrás acceso al armamento y al equipo más exclusivos, esto te permitirá equilibrar la balanza durante la época más peligrosa que la humanidad ha conocido.', '2010-11-09', 39.99),
(242, 'Call of Duty Black Ops II', 'Superando las expectativas de los fans con respecto a esta franquicia que ha batido todos los récords, Call of Duty®: Black Ops 2 lleva a los jugadores a un futuro cercano, la Guerra Fría del siglo XXI, donde la tecnología y las armas han dado pie a una nueva generación bélica.', '2012-11-12', 59.99),
(243, 'Call of Duty Black Ops III', 'Call of Duty® Black Ops III: Zombies Chronicles Edition incluye el juego original completo y la expansión de contenido Zombies Chronicles.\r\n\r\nCall of Duty: Black Ops III combina tres modos de juego únicos: campaña, multijugador y Zombis para proporcionar a los fans la experiencia Call of Duty más profunda y ambiciosa hasta la fecha.\r\n\r\nLa expansión de contenido Zombies Chronicles incluye 8 mapas clásicos de Zombis remasterizados de Call of Duty®: World at War, Call of Duty®: Black Ops y Call of Duty®: Black Ops II. Mapas completos de la saga original totalmente remasterizados en alta definición para jugar en Call of Duty®: Black Ops III.', '2015-11-05', 19.99),
(244, 'DARK SOULS REMASTERED', 'Entonces llegó el Fuego. Vuelve a disfrutar del aclamado juego que definió el género con el que empezó todo. Gracias a una magnífica remasterización, podrás regresar a Lordran con unos impresionantes detalles en alta definición y a 60 fps.\r\nDark Souls Remastered incluye el juego principal y el contenido descargable \"Artorias of the Abyss\".', '2018-05-24', 39.99),
(245, 'DARK SOULS II', 'DARK SOULS™ II, desarrollado por FROM SOFTWARE, es la tan esperada secuela del implacable éxito de 2011, Dark Souls. La inimitable experiencia de este juego de rol de acción de la vieja escuela cautivó la imaginación de jugadores de todo el mundo con desafíos increíbles e intensas y emotivas recompensas.\r\n\r\nDARK SOULS™ II nos trae la oscuridad característica de la franquicia y magníficas innovaciones en el sistema de juego, tanto para el modo individual como para el multijugador.\r\nÚnete al oscuro viaje y experimenta los sobrecogedores encuentros con enemigos, los peligros diabólicos y los desafíos implacables que solo FROM SOFTWARE puede ofrecer.', '2014-04-25', 39.99),
(246, 'DARK SOULS III', 'DARK SOULS™ III continúa redefiniendo los límites con el nuevo y ambicioso capítulo de esta serie revolucionaria, tan aclamada por la crítica.\r\n\r\nAdéntrate en un universo lleno de enemigos y entornos descomunales, un mundo en ruinas en el que las llamas se están apagando. Los jugadores se sumergirán en la atmósfera épica de un mundo de oscuridad gracias a un juego más rápido y una intensidad de combate ampliada. Tanto fans como recién llegados disfrutarán de una acción gratificante y gráficos absorbentes.\r\nSolo quedan las ascuas... ¡Prepárate una vez más para sumergirte en la oscuridad!', '2016-04-11', 59.99),
(247, 'Hades', 'Hades es un juego roguelike de exploración de mazmorras que combina los mejores aspectos de los aclamados títulos anteriores de Supergiant, como la acción rápida de Bastion, la atmósfera y la profundidad de Transistor y la narrativa centrada en los personajes de Pyre.\r\n\r\nCOMBATE PARA ESCAPAR DEL INFIERNO\r\nComo el príncipe inmortal del Inframundo, tendrás a tu disposición los poderes y las armas míticas del Olimpo para liberarte de las garras del mismísimo dios de los muertos, al tiempo que te vas haciendo más fuerte y descubres más piezas de la historia con cada intento de fuga.\r\n\r\nDESATA LA IRA DEL OLIMPO\r\n¡Los dioses del Olimpo están de tu lado! Conoce a Zeus, Atenea, Poseidón y muchos más, y elige entre decenas de poderosas bendiciones que potenciarán tus habilidades. Hay miles de arquetipos de personaje viables que irás descubriendo a medida que juegues.', '2020-09-17', 24.50),
(248, 'Hades II', 'La primera continuación de Supergiant Games se basa en los mejores aspectos del juego de mazmorras divino de tipo rogue-like y ofrece una experiencia de juego totalmente nueva, llena de acción y con una rejugabilidad ilimitada, con el Inframundo de los mitos griegos y su conexión con los albores de la brujería como telón de fondo.\r\n\r\nÁBRETE PASO MÁS ALLÁ DEL INFRAMUNDO\r\nEncarnarás a la Princesa inmortal del Inframundo, y explorarás un mundo más extenso y elaborado. Tendrás que derrotar a las fuerzas del Titán del Tiempo con la ayuda del Olimpo, en una historia desgarradora que se irá desgranando poco a poco con cada uno de tus logros o reveses.\r\n\r\nDOMINA LA BRUJERÍA Y LAS ARTES OSCURAS\r\nImbuye de magia ancestral tus legendarias Armas de la Noche para que nadie pueda interponerse en tu camino. Poténciate con las bendiciones de más de una docena de dioses del Olimpo, desde Apolo hasta Zeus. Tendrás a tu disposición un sinfín de opciones para mejorar tus habilidades.', '2024-05-06', 28.99),
(249, 'Cuphead', 'Cuphead es un juego de acción clásico estilo \"dispara y corre\" que se centra en combates contra el jefe. Inspirado en los dibujos animados de los años 30, los aspectos visual y sonoro están diseñados con esmero empleando las mismas técnicas de la época, es decir, animación tradicional a mano, fondos de acuarela y grabaciones originales de jazz.\r\n\r\nJuega como Cuphead o Mugman (en modo de un jugador o cooperativo) y cruza mundos extraños, adquiere nuevas armas, aprende poderosos supermovimientos y descubre secretos ocultos mientras procuras saldar tu deuda con el diablo.', '2017-09-29', 19.99),
(250, 'Alien Isolation', 'Descubre el verdadero significado del terror en Alien: Isolation, un juego de horror y supervivencia que transcurre en un ambiente de constante tensión y peligro. Han pasado quince años desde los sucesos de Alien™. La hija de Ellen Ripley, Amanda, se ve involucrada en una desesperada batalla por sobrevivir cuando se embarca en una misión que le permitirá averiguar qué sucedió realmente a su madre.\r\n\r\nAmanda tendrá que explorar un mundo cada vez más volátil y hacer frente a los constantes ataques tanto de una población sumida en la desesperación como de un alien despiadado e impredecible.\r\n\r\nIndefensa y poco preparada, tendrá que arreglárselas para conseguir recursos, improvisar soluciones y usar su cerebro, no solo para cumplir con su misión, sino para seguir con vida.\r\n', '2014-10-06', 39.99),
(251, 'Golf It', '¡Embárcate en un viaje emocionante con Golf It! Toma tu putter, reúne a tus amigos y sumérgete en una aventura épica de minigolf. Conquista innumerables campos, crea recuerdos duraderos y perfecciona tus habilidades para convertirte en el máximo campeón de minigolf. ¡Tu emocionante odisea en el golf comienza aquí!\r\n\r\nExplora ocho campos oficiales, cada uno diseñado con un tema único, hoyos desafiantes y mecánicas completamente nuevas. ¿Quieres llevar tu juego al siguiente nivel? En nuestro taller están disponibles miles de cursos creados por la comunidad y creados con una creatividad increíble.\r\n\r\nUn editor de niveles detallado te brinda todo lo que necesitas para expresar y compartir tu creatividad. Con miles de objetos únicos, un paisaje dinámico y sistemas de eventos complejos, las posibilidades son infinitas. ¿Aún te falta algo? Haznos saber. Estaremos encantados de implementar aún más funciones para usted.', '2023-08-18', 8.99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos_desarrolladores`
--

CREATE TABLE `juegos_desarrolladores` (
  `JuegoID` int(11) NOT NULL,
  `desarrolladorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `juegos_desarrolladores`
--

INSERT INTO `juegos_desarrolladores` (`JuegoID`, `desarrolladorID`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(6, 5),
(5, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(12, 1),
(11, 11),
(13, 2),
(14, 5),
(15, 12),
(16, 13),
(17, 14),
(18, 15),
(19, 4),
(20, 16),
(21, 17),
(22, 18),
(23, 18),
(24, 19),
(25, 20),
(26, 21),
(27, 9),
(28, 22),
(29, 23),
(30, 23),
(31, 24),
(32, 25),
(33, 26),
(34, 26),
(35, 27),
(36, 28),
(37, 29),
(38, 30),
(39, 31),
(40, 32),
(41, 16),
(42, 33),
(43, 34),
(44, 35),
(45, 35),
(46, 36),
(47, 37),
(48, 38),
(49, 39),
(50, 39),
(51, 40),
(52, 40),
(53, 41),
(54, 42),
(55, 43),
(56, 34),
(57, 44),
(58, 45),
(59, 46),
(60, 47),
(61, 48),
(62, 49),
(63, 50),
(64, 51),
(65, 52),
(66, 53),
(67, 1),
(68, 51),
(70, 54),
(71, 55),
(72, 56),
(73, 2),
(74, 57),
(75, 58),
(76, 59),
(78, 60),
(79, 61),
(80, 62),
(81, 63),
(82, 4),
(83, 4),
(84, 64),
(85, 65),
(86, 19),
(87, 66),
(88, 66),
(89, 66),
(90, 66),
(91, 66),
(92, 66),
(93, 2),
(94, 2),
(95, 67),
(96, 2),
(97, 2),
(98, 68),
(99, 50),
(100, 69),
(77, 70),
(102, 71),
(103, 72),
(104, 72),
(105, 72),
(106, 72),
(107, 65),
(108, 2),
(109, 2),
(110, 73),
(111, 73),
(112, 74),
(113, 75),
(114, 76),
(115, 77),
(116, 78),
(117, 79),
(118, 80),
(119, 79),
(120, 79),
(121, 5),
(122, 81),
(123, 82),
(124, 83),
(125, 83),
(126, 83),
(127, 83),
(128, 83),
(129, 83),
(130, 83),
(131, 83),
(132, 68),
(133, 26),
(134, 26),
(136, 26),
(137, 26),
(138, 26),
(139, 26),
(140, 26),
(141, 26),
(142, 36),
(143, 84),
(144, 40),
(145, 51),
(146, 85),
(147, 86),
(148, 86),
(149, 68),
(150, 68),
(151, 87),
(152, 88),
(153, 87),
(154, 86),
(155, 86),
(156, 86),
(157, 89),
(158, 87),
(159, 86),
(160, 86),
(161, 91),
(162, 90),
(163, 92),
(165, 92),
(166, 93),
(167, 86),
(168, 93),
(169, 94),
(170, 95),
(171, 95),
(172, 95),
(173, 95),
(174, 95),
(175, 95),
(176, 95),
(177, 95),
(178, 95),
(179, 95),
(180, 95),
(182, 95),
(183, 95),
(184, 95),
(185, 95),
(186, 95),
(187, 95),
(188, 95),
(189, 96),
(190, 97),
(69, 98),
(191, 99),
(192, 99),
(193, 99),
(194, 99),
(195, 50),
(196, 100),
(197, 100),
(198, 50),
(199, 100),
(200, 50),
(201, 50),
(202, 50),
(203, 50),
(204, 50),
(204, 50),
(205, 50),
(206, 50),
(207, 50),
(208, 50),
(209, 50),
(210, 50),
(211, 50),
(212, 50),
(213, 50),
(214, 50),
(215, 50),
(216, 50),
(217, 50),
(218, 50),
(219, 50),
(220, 101),
(221, 50),
(222, 50),
(223, 102),
(224, 102),
(225, 102),
(226, 50),
(227, 50),
(228, 50),
(229, 50),
(230, 50),
(231, 50),
(232, 50),
(233, 103),
(234, 103),
(235, 103),
(236, 103),
(237, 103),
(238, 104),
(239, 90),
(240, 103),
(241, 104),
(242, 104),
(243, 104),
(244, 105),
(245, 9),
(246, 9),
(247, 107),
(248, 107),
(249, 108),
(250, 109),
(251, 110);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos_editores`
--

CREATE TABLE `juegos_editores` (
  `juegoID` int(11) NOT NULL,
  `editorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `juegos_editores`
--

INSERT INTO `juegos_editores` (`juegoID`, `editorID`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(6, 5),
(5, 6),
(7, 7),
(8, 5),
(9, 8),
(10, 5),
(12, 1),
(11, 9),
(2, 2),
(13, 2),
(14, 5),
(15, 10),
(16, 11),
(17, 12),
(18, 13),
(19, 4),
(20, 13),
(21, 14),
(22, 15),
(23, 16),
(24, 17),
(25, 18),
(26, 19),
(27, 20),
(28, 21),
(29, 22),
(30, 22),
(31, 23),
(32, 24),
(33, 25),
(34, 25),
(35, 26),
(36, 27),
(37, 28),
(38, 29),
(39, 30),
(40, 31),
(41, 13),
(42, 13),
(43, 32),
(44, 32),
(45, 32),
(46, 32),
(47, 33),
(48, 34),
(49, 35),
(50, 35),
(51, 36),
(52, 37),
(53, 38),
(54, 39),
(55, 40),
(56, 32),
(57, 41),
(58, 42),
(59, 43),
(61, 9),
(62, 45),
(63, 46),
(64, 32),
(65, 47),
(66, 48),
(67, 32),
(68, 32),
(70, 5),
(71, 49),
(72, 50),
(73, 2),
(60, 14),
(74, 51),
(75, 52),
(76, 53),
(78, 54),
(79, 55),
(80, 56),
(81, 4),
(82, 4),
(83, 4),
(84, 58),
(85, 5),
(86, 17),
(87, 59),
(88, 59),
(89, 59),
(90, 59),
(91, 59),
(92, 59),
(93, 2),
(94, 2),
(95, 60),
(96, 2),
(97, 2),
(98, 61),
(99, 46),
(100, 51),
(77, 7),
(102, 62),
(103, 11),
(104, 11),
(105, 11),
(106, 11),
(107, 5),
(108, 2),
(109, 2),
(110, 63),
(111, 63),
(112, 9),
(113, 64),
(114, 9),
(115, 9),
(116, 9),
(117, 9),
(118, 9),
(119, 9),
(120, 9),
(121, 5),
(122, 65),
(123, 66),
(124, 67),
(125, 67),
(126, 67),
(127, 67),
(128, 67),
(129, 67),
(130, 67),
(131, 67),
(132, 61),
(133, 25),
(134, 25),
(136, 25),
(137, 25),
(138, 25),
(139, 25),
(140, 25),
(141, 25),
(142, 1),
(143, 14),
(144, 37),
(145, 1),
(146, 68),
(147, 68),
(148, 68),
(149, 68),
(150, 61),
(151, 68),
(152, 68),
(153, 68),
(154, 68),
(155, 68),
(156, 68),
(157, 68),
(158, 68),
(159, 68),
(160, 68),
(161, 68),
(162, 68),
(163, 68),
(165, 68),
(166, 68),
(167, 68),
(168, 14),
(169, 68),
(170, 69),
(171, 69),
(172, 69),
(173, 69),
(174, 69),
(175, 69),
(176, 69),
(177, 69),
(178, 69),
(179, 69),
(180, 69),
(182, 69),
(183, 69),
(184, 69),
(185, 69),
(186, 69),
(187, 69),
(188, 69),
(189, 8),
(190, 8),
(69, 70),
(192, 14),
(191, 14),
(193, 14),
(194, 14),
(195, 46),
(196, 46),
(197, 46),
(198, 46),
(199, 46),
(200, 46),
(201, 46),
(202, 46),
(203, 46),
(204, 46),
(204, 46),
(205, 46),
(206, 46),
(207, 46),
(208, 46),
(209, 46),
(210, 46),
(211, 46),
(212, 46),
(213, 46),
(214, 46),
(215, 46),
(216, 46),
(217, 46),
(218, 46),
(219, 46),
(220, 46),
(221, 46),
(222, 46),
(223, 46),
(224, 46),
(225, 46),
(226, 46),
(227, 46),
(228, 46),
(229, 46),
(230, 46),
(231, 46),
(232, 46),
(233, 72),
(234, 72),
(235, 72),
(236, 72),
(237, 72),
(238, 72),
(239, 72),
(240, 72),
(241, 72),
(242, 72),
(243, 72),
(244, 73),
(245, 74),
(246, 73),
(247, 75),
(248, 75),
(249, 76),
(250, 55),
(251, 78);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos_generos`
--

CREATE TABLE `juegos_generos` (
  `JuegoID` int(11) NOT NULL,
  `generoID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `juegos_generos`
--

INSERT INTO `juegos_generos` (`JuegoID`, `generoID`) VALUES
(1, 1),
(1, 3),
(1, 2),
(2, 5),
(2, 6),
(3, 5),
(3, 6),
(3, 7),
(4, 7),
(4, 8),
(4, 5),
(5, 9),
(5, 2),
(5, 4),
(6, 1),
(6, 10),
(6, 11),
(7, 12),
(7, 11),
(7, 13),
(8, 1),
(8, 14),
(8, 6),
(9, 1),
(9, 12),
(9, 2),
(10, 1),
(10, 12),
(10, 3),
(11, 6),
(11, 15),
(11, 7),
(12, 1),
(12, 3),
(12, 2),
(13, 5),
(13, 6),
(13, 4),
(2, 4),
(14, 1),
(14, 10),
(14, 11),
(15, 2),
(15, 1),
(15, 3),
(16, 12),
(16, 16),
(16, 1),
(17, 17),
(17, 1),
(17, 2),
(18, 17),
(18, 14),
(18, 1),
(19, 7),
(19, 8),
(19, 18),
(20, 12),
(20, 1),
(20, 7),
(21, 44),
(21, 11),
(21, 12),
(22, 20),
(22, 11),
(22, 7),
(23, 20),
(23, 12),
(23, 7),
(24, 21),
(24, 11),
(24, 17),
(25, 11),
(25, 20),
(25, 17),
(26, 17),
(26, 12),
(26, 22),
(27, 2),
(27, 23),
(27, 11),
(28, 24),
(28, 14),
(28, 25),
(29, 11),
(29, 1),
(29, 26),
(30, 11),
(30, 12),
(30, 3),
(31, 20),
(31, 27),
(31, 1),
(32, 20),
(32, 11),
(32, 3),
(33, 17),
(33, 1),
(33, 11),
(34, 7),
(34, 8),
(34, 5),
(35, 7),
(35, 8),
(35, 18),
(36, 15),
(36, 28),
(36, 5),
(37, 29),
(37, 3),
(37, 11),
(38, 15),
(38, 30),
(38, 17),
(39, 7),
(39, 24),
(39, 18),
(40, 11),
(40, 24),
(40, 14),
(41, 12),
(41, 1),
(41, 7),
(42, 24),
(42, 1),
(42, 12),
(43, 7),
(43, 6),
(43, 1),
(44, 7),
(44, 6),
(44, 1),
(45, 1),
(45, 7),
(45, 6),
(46, 7),
(46, 6),
(46, 1),
(47, 20),
(47, 11),
(47, 7),
(48, 24),
(48, 7),
(48, 26),
(49, 27),
(49, 8),
(49, 7),
(50, 11),
(50, 27),
(50, 7),
(51, 1),
(51, 21),
(51, 6),
(52, 21),
(52, 7),
(52, 6),
(53, 11),
(53, 20),
(53, 6),
(54, 20),
(54, 30),
(54, 3),
(55, 20),
(55, 11),
(55, 17),
(56, 31),
(56, 32),
(56, 33),
(57, 24),
(57, 1),
(57, 5),
(58, 7),
(58, 8),
(58, 20),
(59, 34),
(59, 24),
(59, 29),
(60, 27),
(60, 24),
(60, 1),
(61, 1),
(61, 24),
(61, 5),
(62, 35),
(62, 21),
(62, 24),
(63, 24),
(63, 14),
(63, 33),
(64, 1),
(64, 14),
(64, 6),
(65, 15),
(65, 18),
(65, 30),
(66, 36),
(66, 37),
(66, 30),
(67, 24),
(67, 14),
(67, 1),
(68, 24),
(68, 14),
(68, 25),
(69, 15),
(69, 28),
(69, 25),
(70, 11),
(70, 27),
(70, 20),
(71, 30),
(71, 3),
(71, 28),
(72, 28),
(72, 15),
(72, 11),
(73, 24),
(73, 12),
(73, 7),
(74, 1),
(74, 15),
(74, 38),
(75, 7),
(75, 8),
(75, 5),
(76, 7),
(76, 8),
(76, 1),
(77, 1),
(77, 12),
(77, 6),
(78, 20),
(78, 29),
(78, 39),
(79, 32),
(79, 31),
(79, 28),
(80, 40),
(80, 17),
(80, 25),
(81, 13),
(81, 7),
(81, 12),
(82, 7),
(82, 8),
(82, 18),
(83, 7),
(83, 20),
(83, 8),
(84, 20),
(84, 11),
(84, 27),
(85, 12),
(85, 14),
(85, 27),
(86, 11),
(86, 17),
(86, 12),
(87, 41),
(87, 1),
(87, 26),
(88, 41),
(88, 1),
(88, 26),
(89, 41),
(89, 1),
(89, 26),
(90, 41),
(90, 1),
(90, 26),
(91, 41),
(91, 1),
(91, 26),
(92, 41),
(92, 1),
(92, 26),
(93, 1),
(93, 12),
(93, 14),
(94, 1),
(94, 12),
(94, 14),
(95, 1),
(95, 12),
(95, 14),
(96, 1),
(96, 27),
(96, 14),
(97, 1),
(97, 14),
(97, 27),
(98, 1),
(98, 6),
(98, 14),
(99, 40),
(99, 38),
(99, 15),
(100, 1),
(100, 14),
(100, 24),
(102, 40),
(102, 28),
(102, 15),
(103, 1),
(103, 11),
(103, 14),
(104, 1),
(104, 11),
(104, 3),
(105, 1),
(105, 11),
(105, 14),
(106, 1),
(106, 11),
(106, 3),
(107, 1),
(107, 3),
(107, 12),
(108, 1),
(108, 12),
(108, 14),
(109, 1),
(109, 12),
(109, 14),
(110, 24),
(110, 27),
(110, 20),
(111, 24),
(111, 20),
(111, 27),
(112, 17),
(112, 11),
(112, 3),
(113, 1),
(113, 37),
(113, 30),
(114, 17),
(114, 42),
(114, 11),
(115, 17),
(115, 42),
(115, 11),
(116, 17),
(116, 42),
(116, 40),
(117, 17),
(117, 42),
(117, 11),
(118, 17),
(118, 42),
(118, 11),
(119, 17),
(119, 42),
(119, 11),
(120, 17),
(120, 42),
(120, 11),
(121, 1),
(121, 3),
(121, 4),
(122, 1),
(122, 12),
(122, 17),
(123, 15),
(123, 20),
(123, 40),
(124, 1),
(124, 3),
(124, 4),
(125, 1),
(125, 3),
(125, 4),
(126, 1),
(126, 3),
(126, 12),
(127, 1),
(127, 3),
(127, 18),
(128, 1),
(128, 3),
(128, 18),
(129, 1),
(129, 3),
(129, 18),
(130, 1),
(130, 3),
(130, 11),
(131, 1),
(131, 3),
(131, 11),
(132, 1),
(132, 3),
(132, 18),
(133, 1),
(133, 7),
(133, 27),
(134, 8),
(134, 27),
(134, 7),
(135, 27),
(135, 8),
(135, 7),
(136, 1),
(136, 27),
(136, 7),
(137, 8),
(137, 7),
(137, 27),
(138, 1),
(138, 27),
(138, 7),
(139, 8),
(139, 7),
(139, 5),
(140, 1),
(140, 7),
(140, 27),
(141, 1),
(141, 7),
(141, 27),
(142, 6),
(142, 1),
(142, 15),
(143, 43),
(143, 3),
(143, 11),
(144, 1),
(144, 24),
(144, 14),
(145, 14),
(145, 6),
(145, 3),
(146, 40),
(146, 6),
(146, 29),
(147, 1),
(147, 15),
(147, 6),
(148, 24),
(148, 1),
(148, 6),
(149, 1),
(149, 3),
(149, 16),
(150, 1),
(150, 15),
(150, 6),
(151, 1),
(151, 6),
(151, 15),
(152, 1),
(152, 15),
(152, 6),
(153, 1),
(153, 6),
(153, 15),
(154, 1),
(154, 3),
(154, 6),
(155, 1),
(155, 24),
(155, 6),
(156, 1),
(156, 24),
(156, 6),
(157, 40),
(157, 1),
(157, 6),
(158, 1),
(158, 6),
(158, 15),
(159, 1),
(159, 15),
(159, 6),
(160, 1),
(160, 6),
(160, 24),
(161, 17),
(161, 6),
(161, 12),
(162, 1),
(162, 6),
(162, 24),
(163, 1),
(163, 24),
(163, 6),
(164, 17),
(164, 12),
(164, 6),
(165, 1),
(165, 6),
(165, 24),
(166, 43),
(166, 3),
(166, 6),
(167, 1),
(167, 3),
(167, 16),
(168, 43),
(168, 1),
(168, 3),
(169, 40),
(169, 6),
(169, 1),
(170, 17),
(170, 12),
(170, 44),
(171, 17),
(171, 12),
(171, 44),
(172, 17),
(172, 12),
(172, 44),
(173, 17),
(173, 1),
(173, 3),
(174, 17),
(174, 12),
(174, 44),
(175, 17),
(175, 3),
(175, 44),
(176, 17),
(176, 3),
(176, 44),
(177, 17),
(177, 3),
(177, 44),
(178, 17),
(178, 3),
(178, 44),
(179, 17),
(179, 3),
(179, 44),
(180, 17),
(180, 3),
(180, 44),
(181, 17),
(181, 44),
(181, 12),
(182, 45),
(182, 17),
(182, 44),
(183, 17),
(183, 44),
(183, 11),
(184, 17),
(184, 12),
(184, 44),
(185, 17),
(185, 12),
(185, 44),
(186, 17),
(186, 12),
(186, 44),
(187, 17),
(187, 12),
(187, 44),
(188, 17),
(188, 12),
(188, 44),
(189, 4),
(189, 1),
(189, 3),
(190, 1),
(190, 3),
(190, 4),
(191, 1),
(191, 11),
(191, 10),
(192, 1),
(192, 11),
(192, 10),
(193, 1),
(193, 11),
(193, 10),
(194, 1),
(194, 11),
(194, 10),
(195, 11),
(195, 1),
(195, 17),
(196, 1),
(196, 3),
(196, 4),
(197, 1),
(197, 3),
(193, 4),
(198, 1),
(198, 11),
(198, 17),
(199, 1),
(199, 3),
(199, 4),
(200, 1),
(200, 11),
(200, 17),
(201, 1),
(201, 11),
(201, 17),
(202, 1),
(202, 11),
(202, 17),
(203, 1),
(203, 11),
(203, 17),
(204, 1),
(204, 11),
(204, 17),
(205, 1),
(205, 11),
(205, 17),
(206, 1),
(206, 11),
(206, 17),
(207, 1),
(207, 11),
(207, 17),
(208, 1),
(208, 11),
(208, 17),
(209, 1),
(209, 3),
(209, 11),
(210, 1),
(210, 3),
(210, 11),
(211, 24),
(211, 1),
(211, 11),
(212, 1),
(212, 3),
(212, 11),
(213, 3),
(213, 1),
(213, 11),
(214, 1),
(214, 3),
(214, 11),
(215, 1),
(215, 3),
(215, 4),
(216, 1),
(216, 3),
(216, 4),
(217, 1),
(217, 3),
(217, 4),
(218, 1),
(218, 3),
(218, 4),
(219, 1),
(219, 3),
(219, 4),
(220, 11),
(220, 14),
(220, 17),
(221, 11),
(221, 11),
(221, 14),
(221, 41),
(222, 1),
(222, 41),
(222, 14),
(223, 1),
(223, 14),
(223, 24),
(224, 1),
(224, 14),
(224, 24),
(225, 24),
(225, 1),
(225, 15),
(226, 41),
(226, 1),
(226, 14),
(227, 41),
(227, 1),
(227, 14),
(228, 41),
(228, 1),
(228, 14),
(229, 1),
(229, 41),
(229, 14),
(230, 41),
(230, 1),
(230, 14),
(231, 11),
(231, 1),
(231, 3),
(232, 11),
(232, 1),
(232, 3),
(233, 24),
(233, 1),
(233, 14),
(234, 24),
(234, 1),
(234, 14),
(235, 24),
(235, 1),
(235, 14),
(236, 1),
(126, 24),
(236, 24),
(236, 14),
(237, 1),
(237, 14),
(237, 24),
(238, 1),
(238, 14),
(238, 24),
(239, 1),
(239, 14),
(239, 24),
(240, 1),
(240, 14),
(240, 24),
(241, 1),
(241, 14),
(241, 24),
(242, 1),
(242, 14),
(242, 24),
(243, 1),
(243, 14),
(243, 24),
(244, 2),
(244, 23),
(244, 17),
(245, 2),
(245, 23),
(245, 17),
(246, 2),
(246, 23),
(246, 17),
(247, 37),
(247, 16),
(247, 1),
(248, 37),
(248, 16),
(248, 1),
(249, 35),
(249, 2),
(249, 1),
(250, 7),
(250, 8),
(250, 6),
(251, 38),
(251, 15),
(251, 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `noticiaID` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `resumen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`noticiaID`, `titulo`, `resumen`) VALUES
(1, 'XDefiant lanzará un test para que los jugadores puedan probar el juego durante un fin de semana', 'XDefiant, el juego desarrollado por Ubisoft, ha sufrido otro retraso y está en espera de pruebas para determinar su fecha de lanzamiento. Según el periodista Tom Henderson de Insider Gaming, Ubisoft realizará una prueba de servidores de XDefiant desde el 19 de abril durante todo el fin de semana. Aunque Ubisoft había anunciado una duración de 12 horas para la prueba, Henderson indica que será un evento de fin de semana completo. El objetivo principal de esta prueba es establecer una fecha de lanzamiento, que podría ser este verano según las indicaciones. Ubisoft aún no ha confirmado esta información.'),
(2, 'Balatro es cambiado de calificacion PEGI 3 a PEGI 18 y es retirado de la eshop', '\r\nEl 1 de marzo, la editora Playstack retiró el juego Balatro de algunas tiendas digitales debido a un cambio inesperado en su clasificación por edades. Originalmente, Balatro tenía una clasificación de +3 según PEGI (Pan European Game Information), lo que significa apto para mayores de 3 años. Sin embargo, el juego fue reclasificado a +18 sin previo aviso debido a una supuesta inclusión de imágenes relacionadas con apuestas, lo que llevó a su retirada de algunas tiendas.\r\n\r\nEste cambio afectó principalmente a la eShop de Nintendo, donde Balatro sigue disponible en la versión americana pero no en las versiones europea, australiana y japonesa.'),
(3, 'Fallout 4 recibe un incremento nunca antes visto en ventas gracias a la serie de Amazon Prime', '\r\nEl juego Fallout 4 ha experimentado un sorprendente aumento del 7500% en ventas en Europa, y la razón principal detrás de este crecimiento es el éxito de la serie Fallout en Amazon Prime. La adaptación televisiva ha generado un gran interés y entusiasmo entre los espectadores, lo que a su vez ha impulsado el interés en los videojuegos de la saga. Además, las otras entregas modernas de Fallout también han visto un aumento significativo en su audiencia, reflejando el impacto positivo de la serie en toda la franquicia. Incluso Fallout 76, a pesar de sus críticas iniciales, ha logrado establecer un nuevo récord histórico de jugadores gracias a este renovado interés en el universo Fallout. Este fenómeno demuestra el poder del entretenimiento transmedia y cómo una adaptación exitosa puede revitalizar y ampliar una comunidad de fans.'),
(4, 'Se rumorea la entrada al Game Pass de la saga Call of Duty', 'Hay una gran expectación entre los jugadores ante la posible inclusión de la franquicia Call of Duty en Xbox Game Pass. Recientemente, un usuario descubrió Call of Duty: Black Ops 3 listado en el catálogo de Xbox Cloud Gaming dentro de la aplicación de Game Pass para móviles. Aunque no se ha confirmado oficialmente, este hallazgo ha avivado las especulaciones sobre la llegada de los juegos de Call of Duty al servicio de suscripción de Microsoft, lo que podría resultar en un aumento significativo de suscriptores para Game Pass.'),
(5, 'Deathtroopers el juego fan made que ha sorprendido a la comunidad de Star Wars', '\'Deathtroopers\' es un videojuego que reimagina el universo de \'Star Wars\' con un enfoque en el terror. Desarrollado por Stefano Cagnani y basado en el libro de Joe Schreiber, este juego tiene dos episodios descargables gratuitamente en itch.io. El primer episodio nos lleva a la Estrella de la Muerte, donde un Stormtrooper se enfrenta a tropas de asalto no-muertas y a un villano zombificado. El segundo episodio, llamado \'The Outpost\', se sitúa en la luna de Endor, donde debemos localizar una base rebelde abandonada y enfrentarnos a la fauna del planeta. Estas incursiones en el horror espacial de \'Star Wars\' recuerdan que la ciencia ficción tiene un lado tenebroso que se explora en la literatura y ahora también en los videojuegos.'),
(6, 'Se rumorea el desarrollo de un nuevo Just Cause tras declaraciones de Avalanche Studios', 'Avalanche Studios está trabajando en un proyecto de mundo abierto AAA no anunciado, según ofertas de trabajo. Aunque tienen Contraband como un proyecto anunciado para Xbox Game Studios, no parece que el nuevo juego esté relacionado con él. Se especula que podría ser una pista sobre Just Cause 5, ya que Avalanche ha trabajado en la saga Just Cause antes. La oferta de trabajo busca un animador de gameplay para unirse al proyecto en Estocolmo o Liverpool.'),
(7, 'PlayStation anuncia el cierre definitivo de los servidores de LittleBigPlanet 3', 'PlayStation ha cerrado de manera indefinida los servidores de LittleBigPlanet 3 debido a problemas técnicos. Esto implica que ya no se puede acceder a las creaciones de la comunidad ni a otros servicios en línea. La decisión se tomó después de desconexiones temporales de los servidores en enero de 2024. Aunque algunos jugadores están decepcionados por perder acceso a mucho contenido, todavía se pueden jugar los niveles descargados y la campaña principal del juego en la PS4.'),
(8, 'Still Wakes the Deep tendrá una edición física en España para PS5', 'El 18 de junio, Meridiem Games lanzará en formato físico para PS5 \"Still Wakes the Deep\", una aventura narrativa de terror situada en una plataforma petrolífera en el mar del Norte. Desarrollado por The Chinese Room, el juego también estará disponible en PC y Xbox Series X/S, incluido en Xbox Game Pass y PC Game Pass desde su estreno. La versión física costará 29,99 €, mientras que el precio digital aún no se ha anunciado.'),
(9, 'Un rumor afirma que Helldivers 2  llegará a  Xbox Series X S', 'Hay rumores de que Helldivers 2 podría llegar a Xbox Series X|S, con Sony y Microsoft en conversaciones iniciales según XboxEra. Aunque Arrowhead desarrolla el juego para PS5 y PC en colaboración con Sony, no hay confirmación oficial de su llegada a Xbox. Johan Pilested de Arrowhead ha mencionado que su objetivo es crear el mejor juego como servicio en colaboración con Sony.'),
(10, 'Opiniones sobre el remake de Metal Gear Solid 3', 'Konami ha aumentado la expectación por el próximo lanzamiento de Metal Gear Solid Delta: Snake Eater, presentando el juego como un remake completo del original de 2004. En una reciente aparición en el podcast oficial de Xbox, el productor Noriaki Okamura destacó que, aunque la trama y el mundo del juego se mantienen intactos, el equipo de desarrollo se ha centrado en mejorar significativamente los gráficos y el audio para ofrecer una experiencia de última generación.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias_detalles`
--

CREATE TABLE `noticias_detalles` (
  `noticiaDetalleID` int(11) NOT NULL,
  `noticiaID` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `fechaPublicacion` date NOT NULL,
  `urlNoticia` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `noticias_detalles`
--

INSERT INTO `noticias_detalles` (`noticiaDetalleID`, `noticiaID`, `titulo`, `descripcion`, `fechaPublicacion`, `urlNoticia`) VALUES
(1, 1, 'XDefiant será jugable este fin de semana en la esperada prueba de servidores, según un rumor', 'XDefiant no está pasando por un buen momento. El título desarrollado por Ubisoft sufrió otro retraso a principios de este mes, con el estudio señalando que ciertos elementos de XDefiant deben pasar por una prueba para poder fijar la fecha de lanzamiento definitiva. Parece que ya se sabe cuándo se llevará a cabo esa prueba.\r\n\r\n\r\nEl conocido periodista Tom Henderson ha vuelto con una nueva entrada de Insider Gaming. En ella indica que Ubisoft regresará esta misma semana (más en concreto el próximo 19 de abril) con una prueba de servidores de XDefiant bajo el brazo. Ubisoft dijo que la prueba tendría una duración de 12 horas, pero Henderson señala que se desarrollará durante todo el fin de semana.\r\n\r\n\r\nEl único objetivo del estudio, añade Henderson, es \"poder fijar una fecha de lanzamiento\" después de la prueba de servidores que se llevará a cabo el próximo fin de semana, fecha que parece apuntar a verano de este año. Ubisoft no se ha pronunciado ante estas afirmaciones, pero si lo que dice el periodista es verdad, el estudio no debería tardar en confirmarlo.', '2024-04-16', 'https://es.ign.com/tom-clancys-xdefiant/201985/news/xdefiant-sera-jugable-este-fin-de-semana-en-la-esperada-prueba-de-servidores-segun-un-rumor'),
(2, 2, 'Polemica de Balatro con un PEGI 18 y retirado de la eShop', 'El pasado 1 de marzo nos enterábamos, a través de un comunicado de la editora Playstack, de la retirada de Balatro de «algunas tiendas digitales de varios países» tras un inesperado cambio en la clasificación por edades.\r\n\r\nSegún el comunicado, el problema vino «no de las tiendas en sí» sino del «cambio repentino» en la clasificación por edades; específicamente, en la clasificación por edades en europa, determinado por PEGI (Pan European Game Information, el organismo de autorregulación que determina y clasifica el contenido de los videojuegos y sirve como guía para el acceso a esos contenidos). El PEGI de Balatro el día de su lanzamiento era +3; esto es: el juego, según este organismo, era apto para mayores de 3 años. «Sin preaviso» y «debido a la creencia equivocada de que el juego incluye imágenes de juegos de apuestas y da instrucciones sobre cómo apostar», explica PlayStack, la clasificación cambió a finales de la semana pasada a +18, esto es, solo para mayores de edad; en ese momento, el juego fue retirado de «algunas tiendas digitales».\r\n\r\nEs un eufemismo amable para referirse a la eShop de Nintendo, donde el juego, por cierto, sigue estando disponible solo de manera parcial: en la eShop americana sí se puede encontrar, pero no en las europea, australiana y japonesa.', '2024-03-06', 'https://www.anaitgames.com/noticias/por-que-ha-acabado-balatro-con-un-pegi-18-y-retirado-de-la-eshop'),
(3, 3, 'Fallout 4 incrementa un 7500 por ciento sus ventas en Europa gracias a la serie de Amazon Prime', 'La serie de Fallout en Amazon Prime ha logrado revitalizar un juego de hace casi 10años: Fallout 4, la última entrega principal de la saga de Bethesda, logra ser el más vendido de Europa.\r\n\r\nA finales del año que viene estaremos celebrando el décimo aniversario del lanzamiento de\r\nFallout 4, la última entrega principal de la saga de rol posapocalíptico de Bethesda. Aunque el lanzamiento de nuevo contenido cesó hace tiempo (a excepción del parche de nueva generación que ya tiene fecha para PS5 y Xbox Series X/S), este videojuego acaba de conseguir un aumento del 7500 % de las ventas en Europa.\r\n\r\nLa razón de este exorbitado crecimiento ya os la podéis imaginar: el estreno de la serie Fallout en Amazon Prime. La adaptación está siendo todo un éxito tanto de crítica como en lo que respecta a número de jugadores: las tres entregas modernas de la saga han\r\nmultiplicado su audiencia de una forma exagerada, del mismo modo que el multijugador Fallout 76 ha logrado su récord histórico de jugadores gracias a la serie.\r\n\r\nA causa de este espectacular incremento en las ventas, Fallout 4 ha logrado ser el videojuego más vendido de la semana en el mercado europeo, según los datos de GSD publicados por Gamesindustry.biz. En ese mismo informe se recoge que de los 10 juegos más vendidos durante la semana, cuatro son de la saga Fallout.', '2024-04-18', 'https://vandal.elespanol.com/noticia/1350770669/fallout-4-incrementa-un-7500-sus-ventas-en-europa-gracias-a-la-serie-de-amazon-prime/'),
(4, 4, 'La saga Call of Duty apunta a llegar pronto a Game Pass, una pista sugiere que próximamente la franquicia de Activision llegará al servicio de Microsoft', 'Millones de jugadores están esperando el anuncio de que todos los juegos de Call of Duty llegarán a Game Pass, y da la sensación de que ese día llegará pronto. Seguramente a partir de ese día Microsoft notará cómo la franquicia shooter de Activision recibirá millones de nuevos suscriptores para su servicio de suscripción. Sin embargo, toca esperar unas cuantas semanas a que esto suceda, pero una última pista nos ha dado esperanzas de ver COD en Game Pass más pronto que tarde. \r\n\r\nTal y como recogen desde Insider Gaming, un usuario que estaba navegando por su aplicación de Game Pass de móviles encontró que Call of Duty: Black Ops 3 aparecía en el catálogo de juegos de Xbox Cloud Gaming. El jugador explica la situación: \"¿Alguien más está viendo Black Ops 3 en los juegos en la nube? Me di cuenta en mi teléfono, pero cuando hice click en él sólo se congela durante un segundo antes de volver a la parte superior, así que no creo que [BO3] deba estar ahí\", desvela.\r\n\r\n\"No soy dueño del juego y no está en Game Pass, así que me sorprendió verlo allí. ¿Está ahí para alguien más? ¿Creemos que esto fue un error y una señal de que sucederá pronto?\", pregunta al resto de usuarios en Reddit. Algunos rechazan esta idea, pero otros piensan que es un indicativo de que podría llegar tarde o temprano junto al resto de la saga. Hace días, el medio Insider Gaming informó que que Microsoft está preparando un gran anuncio de la franquicia shooter de Activision de cara al Xbox Showcase del 9 de junio, con bombazos como Gears 6 y el próximo Call of Duty. En octubre del año pasado, Activision confirmó que Call of Duty iba a llegar a Game Pass \"en algún momento del año pasado\".', '2024-04-18', 'https://www.3djuegos.com/juegos/call-of-duty-black-ops-3/noticias/saga-call-of-duty-apunta-a-llegar-pronto-a-game-pass-pista-sugiere-que-proximamente-franquicia-activision-llegara-al-servicio-microsoft'),
(5, 5, 'Star Wars y zombies, al fin juntos Deathtroopers ha creado el videojuego no oficial más atractivo de la saga', 'No es muy habitual reimaginar el mundo de \'Star Wars\' como una película de terror, aunque es cierto que desde hace años los entornos vacíos y silenciosos de las naves espaciales y el infinito desconocido que es el espacio exterior nos han habituado a esperar que las historias de ciencia ficción tengan un lado tenebroso. De hecho, aspectos de \'Star Wars\' como el Lado Oscuro o sus (a menudo) aterradores y deformes villanos juegan con el punto terrorífico que tiene toda aventura de ciencia ficción.\r\n\r\nSin embargo, \'Deathtroopers\' aprieta el acelerador en ese sentido: el desarrollador Stefano Cagnani parte de un libro de Joe Schreiber que nos recuerda que en materia literaria sí ha habido más incursiones en el horror espacial de \'Star Wars\', como la serie juvenil \'Galaxy of Fear\'. En cualquier caso, el videojuego basado en este libro de 2009 tiene dos episodios, ambos descargables de forma gratuita en itch.io.\r\n\r\nEn el primero de ellos deambulábamos por la Estrella de la Muerte como un Stormtrooper que se enfrentaba a oleadas de tropas de asalto no-muertas, e incluía la aparición de un conocido villano de la franquicia completamente zombificado. En el nuevo capítulo, The Outpost, estamos en la luna de Endor, donde hay que localizar una vieja base abandonada de los Rebeldes. Y también nos encontraremos con fauna muy reconocible del planeta.', '2024-04-18', 'https://www.xataka.com/videojuegos/este-videojuego-no-oficial-star-wars-nos-pone-a-disparar-oleadas-stormtroopers-zombis-literalmente'),
(6, 6, 'Posible nuevo Just Cause en camino, Avalanche Studios contrata para un nuevo mundo abierto triple A', 'Avalanche Studios está trabajando en un proyecto no anunciado, según ofertas de trabajo que hacen referencia a un mundo abierto AAA. No es una gran sorpresa que el equipo desarrolle este tipo de juegos tras varios Just Cause, Mad Max o Rage 2, pero sí parece que no tiene relación con su juego anunciado, Contraband para Xbox Game Studios. El estudio ficha para Contraband y es un proyecto anunciado oficialmente, por lo que no parece lógico que Avalanche evite mencionar el juego. Es por eso que algunos jugadores creen que es una primera pista de Just Cause 5, la saga que publica Square Enix y que estrenó su último juego en 2018. \"Avalanche Studios Group y su división Avalanche Studios están creando nuestro próximo mundo abierto AAA puntero, y buscamos un animador de gameplay muy habilidoso y motivado para unirse a uno de nuestros emocionantes proyectos AAA en los estudios en Estocolmo o Liverpool\", se lee en su oferta. ', '2024-04-19', 'https://vandal.elespanol.com/noticia/1350770686/nuevo-just-cause-en-camino-avalanche-studios-contrata-para-un-nuevo-mundo-abierto-triple-a/'),
(7, 7, 'Adiós a LittleBigPlanet 3 y a las creaciones de los jugadores. PlayStation confirma el cierre indefinido de los servidores del juego de plataformas', '¿Te acuerdas de LittleBigPlanet 3? Seguramente la respuesta sea sí, pues se trataba de un divertido juego de plataformas que ofrecía bastante contenido gracias al compromiso de los jugadores en crear niveles continuamente. Sin embargo, eso ya es cosa del pasado porque muchos jugadores no volverán a disfrutar de las creaciones de la comunidad ni de sus servidores. Es hora de decir adiós a LittleBigPlanet 3 casi 10 años después de su lanzamiento.\r\n\r\nPuede que a muchos jugadores no les afecte esta noticia, pero siempre hay algún usuario afectado con este tipo de comunicados. Resulta que LittleBigPlanet 3 ha cerrado los servidores de manera indefinida, lo que significa que las creaciones de la comunidad ya no son accesibles a menos que las hayas descargado previamente en tu PS4. Esto lo ha confirmado la cuenta de X/Twitter oficial en un mensaje dirigido a la comunidad sobre su título de plataformas.\r\n\r\n\"Debido a problemas técnicos continuos que provocaron que los servidores de LittleBigPlanet 3 para PS4 se desconectaran temporalmente en enero de 2024, se tomó la decisión de mantener los servidores fuera de línea indefinidamente. Todos los servicios en línea, incluido el acceso a las creaciones de otros jugadores, ya no están disponibles\", explican (vía VGC). Un pequeño sector no se ha tomado demasiado bien esta noticia porque supone perder mucho contenido, pero al menos los niveles descargados y la campaña se podrán jugar sin problemas.', '2024-04-20', 'https://www.3djuegos.com/juegos/littlebigplanet-3/noticias/adios-a-littlebigplanet-3-a-creaciones-jugadores-playstation-confirma-cierre-indefinido-servidores-juego-plataformas'),
(9, 9, 'Sony y Microsoft estarían trabajando para llevar Helldivers 2 a Xbox Series X S, afirma un rumor de XboxEra', 'Helldivers 2 en Xbox Series X|S podría ser una realidad dentro de poco, este rumor iniciado por XboxEra afirma que ambas compañías están en conversaciones iniciales para hacerlo posible.\r\n\r\nHelldivers 2 para PC, Steam Deck y PS5 está desarrollado por Arrowhead y su CEO sigue cómodo, pero un rumor de XboxEra podría haber anticipado que Sony y Microsoft buscan llevar el shooter a Xbox Series X|S. Según fuentes de Nick \"Shpeshal Nick\" Baker en el mismo podcast, parece ser que ambas compañías estarían en conversaciones para llevar el juego más allá de PlayStation 5 en consolas.\r\n\r\nDesde el principio comenta que no hay nada confirmado y son cosas que sabido, pero desde el pasado febrero hay abierta una petición para lanzar Helldivers 2 en Xbox. Empieza comentando la situación con el nuevo CEO de PlayStation y de que sería más abierto con ciertas cosas, como por ejemplo la de estrenar juegos en PC y PlayStation el mismo día.Tras esto y unas conversaciones sobre el asunto, Nick deja claro que esto no es una confirmación de que vaya a ocurrir y solamente son \"conversaciones iniciales\"; aunque podría no suceder.Mientras tanto, Johan Pilested confirmaba que Arrowhead y Sony colaboran juntas en el desarrollo de Helldivers 2 y el estudio quiere crear el mejor juego como servicio que se pueda jugar. ', '2024-04-21', 'https://www.hobbyconsolas.com/noticias/port-helldivers-2-xbox-series-xs-proceso-rumor-1381075'),
(10, 8, 'El terror de Still Wakes the Deep tendrá edición física para PS5', 'Meridiem Games editará en España el 18 de junio una versión en formato físico\r\npara PlayStation 5 de Still Wakes the Deep, la aventura narrativa de terror que\r\nestará disponible ese mismo día también para PC (Steam y Epic Games Store) y\r\nXbox Series X/S. Desde el estreno se incluirá en Xbox Game Pass y PC Game\r\nPass. El título, que aún no tiene precio en formato digital, costará 29,99 € en la\r\nversión física de PS5.\r\nStill Wakes the Deep es una aventura de terror narrativa para un jugador que lleva\r\na los jugadores a una plataforma petrolífera en el mar del Norte. Como un\r\nempleado más del lugar, los jugadores tendrán que sobrevivir y rescatar a los\r\ncompañeros tras un colapso provocado por una fuerte tormenta y por una\r\ncriatura incognoscible que está sembrando el terror en esta claustrofóbica\r\nambientación.El título está desarrollado por The Chinese Room, el equipo que revolucionó el\r\ngénero de las aventuras narrativas con Dear Esther y profundizó en esa\r\npropuesta, centrada en la exploración en primera persona y en la\r\nambientación, con sus siguientes obras: Amnesia: A Machine for Pigs,\r\nEverybody\'s Gone to the Rapture y Little Orpheus.', '2024-04-21', 'https://vandal.elespanol.com/noticia/1350770719/el-terror-de-still-wakes-the-deep-tendra-en-espana-edicion-fisica-para-ps5/'),
(11, 10, 'El remake de Metal Gear Solid 3 será la mejor experiencia de supervivencia, acción y sigilo, Konami detalla las mejoras gráficas del juego', 'Aunque sigue sin fecha de lanzamiento, Konami se ha decidido a ponernos los dientes largos con el esperado Metal Gear Solid Delta: Snake Eater. Tras emocionar a la comunidad en el pasado Xbox Games Showcase 2024 con un tráiler, los de Redmond han hecho un hueco a Noriaki Okamura, productor de la juego, en su podcast oficial para profundizar en las vicisitudes de la experiencia. Y esto nos ha dado la oportunidad de ver la ambición del equipo de desarrollo en lo referente a la mejora de gráficos.\r\n\r\nPorque, en palabras del profesional, \"Metal Gear Solid Delta: Snake Eater es más que un simple remaster. Esto es un remake de Metal Gear Solid 3: Snake Eater, que se lanzó inicialmente en 2004\". Por lo tanto, Konami se ha encargado de mejorar la experiencia sin tocar la trama original: \"Mantenemos todo sobre la historia y el mundo del juego, pero lo estamos reconstruyendo con gráficos de última generación y audio 3D\", sigue Okamura. \"Lo que realmente mejora el ambiente de la jungla y hace que esta sea la mejor experiencia de supervivencia, acción y sigilo\".\r\n\r\n\"Estamos invirtiendo mucho esfuerzo en el aspecto visual de la jungla, que está presente en buena parte del juego\", continúa el productor en la charla. \"Queremos que los escenarios se vean y se sientan totalmente descuidados, húmedos. También hemos creado modelos mucho más realistas para las plantas y animales que encuentras ahí, que pueden ser consumidos por Snake, y hemos intensificado el realismo de las heridas que puedes tener o el barro en el que te verás cubierto. Así que realmente sentirás la dureza de este ambiente y de tu misión ahí\".', '2024-06-11', 'https://www.3djuegos.com/juegos/metal-gear-solid-delta-snake-eater/noticias/remake-metal-gear-solid-3-sera-mejor-experiencia-supervivencia-accion-sigilo-konami-detalla-mejoras-graficas-juego');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedades`
--

CREATE TABLE `novedades` (
  `novedadID` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `novedades`
--

INSERT INTO `novedades` (`novedadID`, `titulo`, `descripcion`, `fecha`) VALUES
(1, 'Black Myth Wukong', 'Black Myth: Wukong es un RPG de acción inspirado en la mitología china. La historia está basada en «Viaje al Oeste», una de las cuatro grandes novelas clásicas de la literatura china. Encarnarás al Predestinado, que ha de embarcarse en un viaje repleto de peligros y maravillas, donde descubrirá la verdad que se oculta tras una gloriosa leyenda del pasado.  • Explora una tierra de vastas maravillas Un mundo nunca visto con nuevos paisajes que explorar a cada paso. ¡Sumérgete en un reino fascinante lleno de maravillas y descubre la mitología de la antigua china!  En el papel del Predestinado, te adentrarás en los impresionantes paisajes de la novela clásica «Viaje al Oeste» e iniciarás una nueva epopeya rebosante de aventuras ignotas.  • Enfréntate a poderosos enemigos, tanto conocidos como nuevos Un mono heroico, de gran prestigio y poder, al que persiguen enemigos para su fama demoler. «Viaje al Oeste» destaca por su diverso elenco de adversarios, cada uno con sus fortalezas únicas.  Jugando como el Predestinado, te las verás con poderosos enemigos y dignos rivales a lo largo de tu viaje. Enfréntate a ellos con valentía en batallas épicas en las que rendirse no es una opción.  • Mejora tu dominio de distintos conjuros El conocimiento como arma, conjuros de gran poder; habilidades necesarias para en la batalla vencer. Utiliza conjuros, transformaciones y artefactos mágicos de todo tipo que resultan complementarios pero también antagónicos y constituyen elementos icónicos de los combates de la mitología china desde tiempos inmemoriales.  Como el Predestinado, además de dominar distintas técnicas de bastón, también tienes la opción de combinar a voluntad diferentes conjuros, habilidades, armas y piezas de equipo para hallar la estrategia ganadora que mejor se adapte a tu estilo de combate.  • Descubre la conmovedora historia de cada personaje Tras cada criatura que puedes encontrar, existe un relato que hay que contar. Bajo la fachada de ferocidad y astucia de tus enemigos se oculta un fascinante tapiz que has de desentrañar para comprender sus orígenes, su personalidad y su motivación.  En la piel del Predestinado, descubrirás las historias de los distintos personajes, indagarás más allá de vuestros enfrentamientos y serás testigo del amor, el odio, la codicia y la furia que una vez sintieron y aún albergan en su interior.', '2024-08-19'),
(2, 'Frostpunk 2', 'LA HELADA NUNCA TERMINA El juego se desarrolla 30 años después de la apocalíptica tormenta de nieve de Frostpunk. La Tierra aún vive asolada por el hielo perpetuo y un clima gélido. Serás el líder de una metrópolis hambrienta de recursos en la que la expansión y los conflictos internos son una realidad inevitable. De ti depende tomar decisiones sobre el futuro de la ciudad y asumir sus consecuencias.  En Frostpunk 2 puedes construir tu ciudad a una nueva escala creando barrios enteros con distintos propósitos. Asegúrate de que todas las zonas de la ciudad funcionen de forma coordinada. Investiga tecnologías que marcarán la dirección del progreso de tus ciudadanos. LA CIUDAD NO DEBE CAER \"Frostpunk 2 sigue siendo un juego sobre la ciudad y su sociedad\", afirma Jakub Stokalski, codirector del juego y director de diseño de 11 bit studios.  \"Pero las revueltas internas, azuzadas por las crecientes diferencias sociales, harán que los jugadores se enfrenten a nuevos tipos de amenazas. Usamos un ambiente posapocalíptico para contar una historia importante sobre la ambición humana, porque, al final, lo que puede acabar con nosotros no es el entorno, sino la naturaleza humana\". NAVEGA ENTRE LAS FACCIONES COMO ADMINISTRADOR Al crecer la ciudad, crear y aprobar nuevas leyes cada vez será más complicado. La población se irá dividiendo lentamente en facciones con visiones distintas y contradictorias del futuro.  El Consejo es el lugar donde estas ideas chocarán, a veces con violencia. Tu papel como Administrador es asegurar que la ciudad perdure a pesar de estos conflictos. Gestiona crisis incipientes mientras diriges a la humanidad hacia un nuevo destino.', '2024-07-25'),
(3, 'S.T.A.L.K.E.R. 2 Heart of Chornobyl', 'La Zona de Exclusión de Chornóbil cambió radicalmente tras la segunda explosión en 2006. Los mutantes violentos, las anomalías letales y las facciones enfrentadas hacen de la Zona un lugar en el que sobrevivir es todo un reto. Sin embargo, los valiosísimos artefactos atraen a gente de todo el mundo. Apodados Stalkers, se adentran en la zona por su cuenta y riesgo en busca de fortuna o posiblemente de la verdad que esconde el Corazón de Chornóbil.\r\n\r\nFASCINANTE HISTORIA NO LINEAL EN UN MUNDO ABIERTO FLUIDO\r\nEn el papel de un Stalker solitario, explora lugares de realismo fotográfico en un mundo abierto sin zonas de carga con una superficie de 64 km² que incluye diversos entornos que reflejan distintos aspectos postapocalípticos. Ábrete paso por la Zona, encuentra tu destino y decide el futuro que le espera a la humanidad en una historia épica con muchas opciones.\r\n\r\nNUMEROSOS ENEMIGOS Y CIENTOS DE COMBINACIONES DE ARMAS\r\nConocerás a miembros de diversas facciones y deberás decidir quiénes merecen tu amistad y quiénes una buena dosis de plomo. Participa en intensos tiroteos contra enemigos que usarán diferentes tácticas para intentar acabar contigo. Elige tu arsenal de entre más de 30 tipos de armas con numerosas modificaciones que te permitirán crear cientos de combinaciones letales.', '2024-09-05'),
(4, 'Cataclismo', 'Cataclismo, obra de los creadores de Moonlighter, combina estrategia en tiempo real y defensa de torres. Protege el último bastión de la humanidad en un mundo en ruinas edificando fortalezas ladrillo a ladrillo para rechazar oleadas de horrores. Resiste el asedio y álzate sobre la niebla en una historia de esperanza, resistencia y comunidad.\r\n\r\nArquitecto durante el día, general durante la noche: tendrás que reunir recursos y usar mecánicas inspiradas en LEGO® para dotar a tu fortaleza de un diseño táctico, teniendo en cuenta el clima, las trampas y el posicionamiento de tus tropas. Al caer la noche, las hordas de horrores llegarán para intentar arrasarlo todo. Gracias al sistema de física realista, ¡los bloques aplastarán a amigos y enemigos al caer!\r\n\r\nTras las murallas hay un auténtico hervidero. Tu ciudadela será más eficaz al erigir edificios clave y alcanzar nuevos niveles de prosperidad. Cada novedad traerá consigo más construcciones, soldados más poderosos y armas contra el asedio, incluyendo flechas incendiarias con las que incinerar a los horrores. Cuanto más prosperes, más fácil será resistir el asedio.', '2024-07-16'),
(5, 'Warhammer 40,000 Space Marine 2', 'La galaxia corre peligro. Es el fin numerosos planetas. El Imperio te necesita.\r\n\r\nDespliega las habilidades sobrehumanas y la brutalidad de un Marine Espacial, el mejor cuerpo de guerreros del Emperador. Aprovecha tus capacidades mortíferas y un arsenal devastador para acabar con las implacables hordas del enemigo.\r\n\r\nAplaca los horrores de la galaxia en épicas batallas sobre planetas remotos. Descubre misterios oscuros y pon freno a la noche eterna para demostrar tu fidelidad.\r\n\r\nAcude a la llamada.\r\nPrepárate para la guerra.', '2024-09-09'),
(6, 'Star Wars Outlaws', 'Star Wars Outlaws, el juego de Star Wars de mundo abierto, se lanzará a finales de este año\", decía la publicación. \"El juego te permite explorar distintos planetas en toda la galaxia, tanto icónicos como nuevos. Puedes arriesgarlo todo como Kay Vess, una sinvergüenza emergente que busca la libertad y los medios para comenzar una nueva vida, junto con su compañero Nix. Si estás dispuesto a correr el riesgo, la galaxia está llena de oportunidades.', '2024-08-30'),
(7, 'Dustborn', 'Dustborn es un videojuego de acción y aventura para un jugador sobre la esperanza, el amor, la amistad, los robots... y el poder de las palabras.\r\n\r\nTe pones en la piel de Pax, una «anómala» exiliada y estafadora con la habilidad de usar las palabras como arma. Con la intención de dejar atrás su pasado y empezar de cero, ha aceptado un trabajo que consiste en llevar un valioso paquete desde Pacifica a Nova Scotia, por lo que tendrá que cruzar todo el territorio de la República de América, que está bajo el control de Justice. Es razón suficiente como para emprender un viaje por carretera, ¿no?\r\n\r\n¡Pues haz las maletas, reúne a una pandilla con habilidades extraordinarias y que comience la aventura por todo el país!\r\n\r\nExplora los impresionantes paisajes de una versión alternativa de los Estados Unidos mientras viajas en un autobús conducido por un robot. Haz altos en el camino para reclutar a más miembros para la pandilla, mejorar tus relaciones, completar encargos y enfrentarte a retos cada vez más desafiantes. Ahora bien, las personas a las que les has robado el paquete quieren recuperarlo, y Justice no piensa ponértelo fácil, así que mejor que no te olvides de tu bate de béisbol.', '2024-08-20'),
(8, 'Vampire The Masquerade Bloodlines 2', 'Eres una vampira ancestral que lucha para abrirse paso en la Seattle actual al borde de una guerra. Conoce a los que controlan todo, forma alianzas y decide quién gobierna y cómo será la ciudad.\r\n\r\nUn asedio de tres frentes en Seattle, un vacío de poder en la corte vampírica y una vampira ancestral despertada en desacuerdo con la voz de su cabeza. Todo esto es obra del estudio premiado por los BAFTA, The Chinese Room.\r\nTú eres el monstruo\r\nLa sangre te alimenta y da poder a tus disciplinas vampíricas. Acechas a la población de la ciudad y te alimentas de ella. Usa los poderes sobrenaturales o la persuasión con los civiles y atráelos hacia los callejones oscuros para saciar tu hambre. Pero ten cuidado de no romper la Mascarada. No reveles lo que eres o habrá represalias. Al principio de la ley y luego, bueno... recuerda que no eres la única criatura de la noche.\r\n\r\nExplora un combate inmersivo y visceral que recompensa estilos de juego y enfoques diferentes según tu elección de clan. ¿Entrarás en combate con puños sobrenaturales, atacarás desde lejos o achicarás al rebaño desde lejos como la depredadora que eres? Las elecciones de clan admiten estos estilos de juego y más.', '2024-07-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas`
--

CREATE TABLE `tarjetas` (
  `tarjetaID` int(11) NOT NULL,
  `NumTarjeta` varchar(16) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `FechaExp` varchar(5) NOT NULL,
  `CVC` int(4) NOT NULL,
  `UsuarioID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tarjetas`
--

INSERT INTO `tarjetas` (`tarjetaID`, `NumTarjeta`, `Nombre`, `FechaExp`, `CVC`, `UsuarioID`) VALUES
(13, '1234567812345678', 'Kevin Soto', '02/28', 123, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `UsuarioID` int(11) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `Alias` varchar(25) NOT NULL,
  `Tipo` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`UsuarioID`, `Email`, `Password`, `Alias`, `Tipo`) VALUES
(1, 'email1@email.com', '1234', 'Usuario1', 'Cliente'),
(2, 'Ksotbri029@gamingworld.com', '12345678', 'Admin1', 'administrador'),
(3, 'example@example.com', '12345678', 'example', 'Cliente'),
(4, 'example2@example.com', '12345678', 'example2', 'Cliente'),
(5, 'Admin2@gamingworld.com', '12345678', 'Admin2', 'administrador'),
(6, 'KevinS9sotob@hotmail.com', 'Seidel9k', 'Seidel9', 'Cliente'),
(7, 'Zoidel97@gamingworld.com', '12345678', 'XX', 'administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`carritoID`),
  ADD KEY `usuarioID` (`usuarioID`),
  ADD KEY `tarjetaID` (`tarjetaID`);

--
-- Indices de la tabla `carrito_juegos`
--
ALTER TABLE `carrito_juegos`
  ADD KEY `juegoID` (`juegoID`),
  ADD KEY `ca` (`carritoID`);

--
-- Indices de la tabla `comentarios_juegos`
--
ALTER TABLE `comentarios_juegos`
  ADD PRIMARY KEY (`comentarioJuegoID`),
  ADD KEY `JuegoID` (`JuegoID`),
  ADD KEY `comentarios_juegos_ibfk_2` (`UsuarioID`);

--
-- Indices de la tabla `comentarios_noticias`
--
ALTER TABLE `comentarios_noticias`
  ADD PRIMARY KEY (`comentarioNoticiaID`),
  ADD KEY `usuarioID` (`usuarioID`),
  ADD KEY `noticiaDetalleID` (`noticiaDetalleID`) USING BTREE;

--
-- Indices de la tabla `desarrolladores`
--
ALTER TABLE `desarrolladores`
  ADD PRIMARY KEY (`desarrolladorID`);

--
-- Indices de la tabla `editores`
--
ALTER TABLE `editores`
  ADD PRIMARY KEY (`editorID`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`generoID`);

--
-- Indices de la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD PRIMARY KEY (`JuegoID`);

--
-- Indices de la tabla `juegos_desarrolladores`
--
ALTER TABLE `juegos_desarrolladores`
  ADD KEY `JuegoID` (`JuegoID`),
  ADD KEY `desarrolladorID` (`desarrolladorID`);

--
-- Indices de la tabla `juegos_editores`
--
ALTER TABLE `juegos_editores`
  ADD KEY `editorID` (`editorID`),
  ADD KEY `JuegoID` (`juegoID`) USING BTREE;

--
-- Indices de la tabla `juegos_generos`
--
ALTER TABLE `juegos_generos`
  ADD KEY `JuegoID` (`JuegoID`),
  ADD KEY `generoID` (`generoID`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`noticiaID`);

--
-- Indices de la tabla `noticias_detalles`
--
ALTER TABLE `noticias_detalles`
  ADD PRIMARY KEY (`noticiaDetalleID`),
  ADD KEY `noticiaID` (`noticiaID`);

--
-- Indices de la tabla `novedades`
--
ALTER TABLE `novedades`
  ADD PRIMARY KEY (`novedadID`);

--
-- Indices de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  ADD PRIMARY KEY (`tarjetaID`),
  ADD KEY `UsuarioID` (`UsuarioID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`UsuarioID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `carritoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `comentarios_juegos`
--
ALTER TABLE `comentarios_juegos`
  MODIFY `comentarioJuegoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `comentarios_noticias`
--
ALTER TABLE `comentarios_noticias`
  MODIFY `comentarioNoticiaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `desarrolladores`
--
ALTER TABLE `desarrolladores`
  MODIFY `desarrolladorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT de la tabla `editores`
--
ALTER TABLE `editores`
  MODIFY `editorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `generoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `juegos`
--
ALTER TABLE `juegos`
  MODIFY `JuegoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `noticiaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `noticias_detalles`
--
ALTER TABLE `noticias_detalles`
  MODIFY `noticiaDetalleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `novedades`
--
ALTER TABLE `novedades`
  MODIFY `novedadID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  MODIFY `tarjetaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `UsuarioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`usuarioID`) REFERENCES `usuarios` (`UsuarioID`),
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`tarjetaID`) REFERENCES `tarjetas` (`tarjetaID`);

--
-- Filtros para la tabla `carrito_juegos`
--
ALTER TABLE `carrito_juegos`
  ADD CONSTRAINT `carrito_juegos_ibfk_1` FOREIGN KEY (`juegoID`) REFERENCES `juegos` (`JuegoID`),
  ADD CONSTRAINT `carrito_juegos_ibfk_2` FOREIGN KEY (`carritoID`) REFERENCES `carrito` (`carritoID`);

--
-- Filtros para la tabla `comentarios_juegos`
--
ALTER TABLE `comentarios_juegos`
  ADD CONSTRAINT `comentarios_juegos_ibfk_1` FOREIGN KEY (`JuegoID`) REFERENCES `juegos` (`JuegoID`),
  ADD CONSTRAINT `comentarios_juegos_ibfk_2` FOREIGN KEY (`UsuarioID`) REFERENCES `usuarios` (`UsuarioID`);

--
-- Filtros para la tabla `comentarios_noticias`
--
ALTER TABLE `comentarios_noticias`
  ADD CONSTRAINT `comentarios_noticias_ibfk_1` FOREIGN KEY (`noticiaDetalleID`) REFERENCES `noticias_detalles` (`noticiaDetalleID`),
  ADD CONSTRAINT `comentarios_noticias_ibfk_2` FOREIGN KEY (`usuarioID`) REFERENCES `usuarios` (`UsuarioID`);

--
-- Filtros para la tabla `juegos_desarrolladores`
--
ALTER TABLE `juegos_desarrolladores`
  ADD CONSTRAINT `juegos_desarrolladores_ibfk_1` FOREIGN KEY (`JuegoID`) REFERENCES `juegos` (`JuegoID`),
  ADD CONSTRAINT `juegos_desarrolladores_ibfk_2` FOREIGN KEY (`desarrolladorID`) REFERENCES `desarrolladores` (`desarrolladorID`);

--
-- Filtros para la tabla `juegos_editores`
--
ALTER TABLE `juegos_editores`
  ADD CONSTRAINT `juegos_editores_ibfk_1` FOREIGN KEY (`juegoID`) REFERENCES `juegos` (`JuegoID`),
  ADD CONSTRAINT `juegos_editores_ibfk_2` FOREIGN KEY (`editorID`) REFERENCES `editores` (`editorID`);

--
-- Filtros para la tabla `juegos_generos`
--
ALTER TABLE `juegos_generos`
  ADD CONSTRAINT `juegos_generos_ibfk_1` FOREIGN KEY (`JuegoID`) REFERENCES `juegos` (`JuegoID`),
  ADD CONSTRAINT `juegos_generos_ibfk_2` FOREIGN KEY (`generoID`) REFERENCES `generos` (`generoID`);

--
-- Filtros para la tabla `noticias_detalles`
--
ALTER TABLE `noticias_detalles`
  ADD CONSTRAINT `noticias_detalles_ibfk_1` FOREIGN KEY (`noticiaID`) REFERENCES `noticias` (`noticiaID`);

--
-- Filtros para la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  ADD CONSTRAINT `tarjetas_ibfk_1` FOREIGN KEY (`UsuarioID`) REFERENCES `usuarios` (`UsuarioID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
