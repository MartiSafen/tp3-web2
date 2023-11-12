<?php
require_once './config.php';
    class Model {
        protected $db;

        function __construct() {
            $this->db = new PDO('mysql:host='. MYSQL_HOST .';dbname='. MYSQL_DB .';charset=utf8', MYSQL_USER, MYSQL_PASS);
            $this->deploy();
        }

        function deploy() {
            $query = $this->db->query('SHOW TABLES');
            $tables = $query->fetchAll(); 
            if(count($tables)==0) {
          
              $sql =<<<END
                          --
                          -- Estructura de tabla para la tabla `categorias`
                          --

                          CREATE TABLE `categorias` (
                            `id_categoria` int(11) NOT NULL,
                            `material` varchar(250) NOT NULL,
                            `color` varchar(200) NOT NULL
                          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

                          --
                          -- Volcado de datos para la tabla `categorias`
                          --

                          INSERT INTO `categorias` (`id_categoria`, `material`, `color`) VALUES
                          (1, 'algodon', 'negro'),
                          (2, 'cuero', 'rojo'),
                          (3, 'friza', 'blanco'),
                          (4, 'lona', 'gris'),
                          (5, 'lona', 'azul'),
                          (6, 'algodon', 'rosa'),
                          (7, 'cuero', 'mochila'),
                          (8, 'cuero vaca', 'mochila');

                          -- --------------------------------------------------------

                          --
                          -- Estructura de tabla para la tabla `productos`
                          --

                          CREATE TABLE `productos` (
                            `id` int(11) NOT NULL,
                            `id_categoria` int(11) NOT NULL,
                            `nombre` varchar(250) NOT NULL,
                            `talle` varchar(45) DEFAULT NULL,
                            `precio` int(11) NOT NULL,
                            `vendedor` varchar(200) NOT NULL
                          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

                          --
                          -- Volcado de datos para la tabla `productos`
                          --

                          INSERT INTO `productos` (`id`, `id_categoria`, `nombre`, `talle`, `precio`, `vendedor`) VALUES
                          (1, 1, 'remera', 'm', 5500, 'martina'),
                          (2, 2, 'zapatillas', 'l', 65000, 'francisco'),
                          (3, 3, 'buzo', 's', 22000, 'martina'),
                          (4, 4, 'zapatillas', 'm', 67000, 'francisco'),
                          (5, 6, 'remera', 'xl', 22000, 'martina'),
                          (6, 5, 'zapatillas', 's', 83080, 'francisco'),
                          (7, 7, 'mochila', 'unico', 11000, 'francisco'),
                          (8, 8, 'mochila', 'unico', 99000, 'martina');

                          --
                          -- Índices para tablas volcadas
                          --

                          --
                          -- Indices de la tabla `categorias`
                          --
                          ALTER TABLE `categorias`
                            ADD PRIMARY KEY (`id_categoria`);

                          --
                          -- Indices de la tabla `productos`
                          --
                          ALTER TABLE `productos`
                            ADD PRIMARY KEY (`id`),
                            ADD UNIQUE KEY `FK_id_categoria` (`id_categoria`);

                          --
                          -- AUTO_INCREMENT de las tablas volcadas
                          --

                          --
                          -- AUTO_INCREMENT de la tabla `categorias`
                          --
                          ALTER TABLE `categorias`
                            MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

                          --
                          -- AUTO_INCREMENT de la tabla `productos`
                          --
                          ALTER TABLE `productos`
                            MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

                          --
                          -- Restricciones para tablas volcadas
                          --

                          --
                          -- Filtros para la tabla `productos`
                          --
                          ALTER TABLE `productos`
                            ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);
                          COMMIT;

              END;
             $this->db->query($sql);

            }
       }

    }