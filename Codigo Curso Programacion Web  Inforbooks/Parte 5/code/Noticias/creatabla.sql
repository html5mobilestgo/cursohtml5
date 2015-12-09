 Base de datos NewsDB  ejecutándose en localhost

# phpMyAdmin SQL Dump
# version 2.10.3
# http://www.phpmyadmin.net
#
# Servidor: localhost
# Tiempo de generación: 16-10-2009 a las 09:37:07
# Versión del servidor: 6.0.4
# Versión de PHP: 6.0.0
# 
# Base de datos : `NewsDB`
# 

# --------------------------------------------------------
#
# Estructura de tabla para la tabla `Noticia`
#

DROP TABLE IF EXISTS `Noticia`;
CREATE TABLE  `Noticia` (
 `AId` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
 `ATitulo` TEXT NOT NULL ,
 `ATexto` TEXT NOT NULL ,
 `AFecha` DATETIME NOT NULL
) ENGINE = MYISAM CHARACTER SET latin1 COLLATE latin1_spanish_ci;


# --------------------------------------------------------
#
# Estructura de tabla para la tabla `comentario`
#

DROP TABLE IF EXISTS `comentario`;
CREATE TABLE `comentario` (
  `CId` BIGINT  NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  `CAId` BIGINT NOT NULL default '0',
  `CUsuario` TEXT NOT NULL,
  `CTexto` TEXT NOT NULL,
  `CFecha` DATETIME NOT NULL  
)  ENGINE = MYISAM CHARACTER SET latin1 COLLATE latin1_spanish_ci;


