/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : inmobiliaria

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-09-05 21:22:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for arrendatario
-- ----------------------------
DROP TABLE IF EXISTS `arrendatario`;
CREATE TABLE `arrendatario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ingreso_mensual` double NOT NULL,
  `numero_registro_camara_comercio` varchar(100) NOT NULL,
  `referencia_bancaria` varchar(100) NOT NULL,
  `cuenta_corriente` varchar(100) NOT NULL,
  `cuenta_ahorroros` varchar(100) NOT NULL,
  `referencia_comercial` varchar(100) NOT NULL,
  `telefono_ref_comercial` varchar(100) NOT NULL,
  `referencia_personal` varchar(100) NOT NULL,
  `telefono_ref_personal` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `persona_id` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of arrendatario
-- ----------------------------
INSERT INTO `arrendatario` VALUES ('2', '2500000', '21365465', '131354654654654', '321654654', '3165464654', 'ljndlkndlsk', '2134654654654', 'kdmldskm', '42454654987', '2016-08-10 22:52:28', '2016-09-05 02:41:41', '12', '1');
INSERT INTO `arrendatario` VALUES ('3', '98798798', '98798798798', '9jbjbjhb', '9987987', '987987987', 'uhuhkjhi', '987987987', 'jhjhjhb', '98797987', '2016-08-14 22:47:19', '2016-08-14 22:47:19', '17', '0');
INSERT INTO `arrendatario` VALUES ('4', '8987987', '987987987', 'iuhkjh', '98', '2132321', 'dds', '21312312', '21312312', '21312', '2016-08-14 22:50:54', '2016-08-14 22:50:54', '18', '0');
INSERT INTO `arrendatario` VALUES ('5', '123456', '12345', '23456', '123456', '123456', '123456', '32345', '12345', '123456', '2016-08-14 22:53:54', '2016-08-14 22:53:54', '19', '0');
INSERT INTO `arrendatario` VALUES ('6', '123456', '12345', '23456', '123456', '123456', '123456', '32345', '12345', '123456', '2016-08-14 22:54:23', '2016-08-14 22:54:23', '20', '0');

-- ----------------------------
-- Table structure for arrendatario_codeudor
-- ----------------------------
DROP TABLE IF EXISTS `arrendatario_codeudor`;
CREATE TABLE `arrendatario_codeudor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codeudor_id` int(10) unsigned NOT NULL,
  `arrendatario_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of arrendatario_codeudor
-- ----------------------------

-- ----------------------------
-- Table structure for arriendo
-- ----------------------------
DROP TABLE IF EXISTS `arriendo`;
CREATE TABLE `arriendo` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date NOT NULL DEFAULT '0000-00-00',
  `fecha_limite_cancelacion` date NOT NULL DEFAULT '0000-00-00',
  `valor_arriendo` double NOT NULL,
  `destino_inmueble` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NULL DEFAULT NULL,
  `propiedad_id` int(10) unsigned NOT NULL,
  `arrendatario_id` int(10) unsigned NOT NULL,
  `codeudor_id` int(10) unsigned NOT NULL,
  `codeudor2_id` int(10) unsigned NOT NULL,
  `valor_comision` double(10,2) NOT NULL,
  `comision` int(2) NOT NULL DEFAULT '10',
  PRIMARY KEY (`id`),
  KEY `propiedad_id` (`propiedad_id`),
  CONSTRAINT `arriendo_ibfk_1` FOREIGN KEY (`propiedad_id`) REFERENCES `propiedad` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of arriendo
-- ----------------------------
INSERT INTO `arriendo` VALUES ('41', '2016-09-04', '2017-09-05', '2017-08-06', '350000', 'casa', '2016-09-05 02:41:41', '2016-09-05 02:41:41', '2', '2', '2', '2', '35000.00', '10');

-- ----------------------------
-- Table structure for codeudor
-- ----------------------------
DROP TABLE IF EXISTS `codeudor`;
CREATE TABLE `codeudor` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ingresos` double NOT NULL,
  `cargo` varchar(100) NOT NULL,
  `referencia_bancaria` varchar(100) NOT NULL,
  `cuenta_corriente` varchar(100) NOT NULL,
  `cuenta_ahorros` varchar(100) NOT NULL,
  `referencia_comercial` varchar(100) NOT NULL,
  `telefono_ref_comercial` varchar(100) NOT NULL,
  `referencia_personal` varchar(100) NOT NULL,
  `telefono_ref_personal` varchar(100) NOT NULL,
  `finca_raiz_direccion` varchar(100) NOT NULL,
  `matricula_inmobiliaria` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `persona_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of codeudor
-- ----------------------------
INSERT INTO `codeudor` VALUES ('1', '3232423324', 'dfdsdfsdfs', 'dsfdfsdsf', '3242332', '32234323', 'fsdfsdfsdf', '223324', 'swrewrwre', '2343232423', 'ddsfsdsfd', '32165464', '2016-08-07 20:17:34', '2016-08-07 20:17:34', '11');
INSERT INTO `codeudor` VALUES ('2', '234567', 'fvdxxdv', 'dfvsdfsd', '23435564', '34334234', 'fdzdfzd', '23432423', 'cxvx', '23434345', '23123esdfd', 'sdfsdfs', '2016-08-14 00:33:03', '2016-08-14 00:33:03', '16');

-- ----------------------------
-- Table structure for factura
-- ----------------------------
DROP TABLE IF EXISTS `factura`;
CREATE TABLE `factura` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `persona_id` int(11) unsigned DEFAULT NULL,
  `arriendo_id` int(10) unsigned NOT NULL,
  `fecha_creacion` timestamp NULL DEFAULT NULL,
  `concepto` varchar(100) NOT NULL,
  `otros` varchar(100) NOT NULL,
  `valor_iva` double(10,2) DEFAULT NULL,
  `iva` int(10) DEFAULT NULL,
  `arriendo` double(10,2) NOT NULL,
  `total` double(10,2) NOT NULL,
  `valor_comision` double(10,2) NOT NULL,
  `comision` int(2) NOT NULL DEFAULT '10',
  `retefuente` double(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `arriendo_id` (`arriendo_id`),
  CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`arriendo_id`) REFERENCES `arriendo` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of factura
-- ----------------------------
INSERT INTO `factura` VALUES ('58', '2', '41', '2016-09-04 00:00:00', 'Ingresos recibidos por terceros correspondientes al mes de Septiembre de 2016', '', '56000.00', '16', '350000.00', '418250.00', '35000.00', '10', '12250.00', '2016-09-05 02:41:41', '2016-09-05 02:41:41');
INSERT INTO `factura` VALUES ('59', '2', '41', '2016-09-04 00:00:00', 'Ingresos recibidos por terceros correspondientes al mes de Septiembre de 2016', '', '56000.00', '16', '350000.00', '418250.00', '35000.00', '10', '12250.00', '2016-09-05 02:41:41', '2016-09-05 02:41:41');
INSERT INTO `factura` VALUES ('60', '2', '41', '2016-09-04 00:00:00', 'Ingresos recibidos por terceros correspondientes al mes de Septiembre de 2016', '', '56000.00', '16', '350000.00', '418250.00', '35000.00', '10', '12250.00', '2016-09-05 02:41:41', '2016-09-05 02:41:41');
INSERT INTO `factura` VALUES ('61', '2', '41', '2016-09-04 00:00:00', 'Ingresos recibidos por terceros correspondientes al mes de Septiembre de 2016', '', '56000.00', '16', '350000.00', '418250.00', '35000.00', '10', '12250.00', '2016-09-05 02:41:41', '2016-09-05 02:41:41');
INSERT INTO `factura` VALUES ('62', '2', '41', '2016-09-04 00:00:00', 'Ingresos recibidos por terceros correspondientes al mes de Septiembre de 2016', '', '56000.00', '16', '350000.00', '418250.00', '35000.00', '10', '12250.00', '2016-09-05 02:41:41', '2016-09-05 02:41:41');
INSERT INTO `factura` VALUES ('63', '2', '41', '2016-09-04 00:00:00', 'Ingresos recibidos por terceros correspondientes al mes de Septiembre de 2016', '', '56000.00', '16', '350000.00', '418250.00', '35000.00', '10', '12250.00', '2016-09-05 02:41:41', '2016-09-05 02:41:41');
INSERT INTO `factura` VALUES ('64', '2', '41', '2016-09-04 00:00:00', 'Ingresos recibidos por terceros correspondientes al mes de Septiembre de 2016', '', '56000.00', '16', '350000.00', '418250.00', '35000.00', '10', '12250.00', '2016-09-05 02:41:41', '2016-09-05 02:41:41');
INSERT INTO `factura` VALUES ('65', '2', '41', '2016-09-04 00:00:00', 'Ingresos recibidos por terceros correspondientes al mes de Septiembre de 2016', '', '56000.00', '16', '350000.00', '418250.00', '35000.00', '10', '12250.00', '2016-09-05 02:41:41', '2016-09-05 02:41:41');
INSERT INTO `factura` VALUES ('66', '2', '41', '2016-09-04 00:00:00', 'Ingresos recibidos por terceros correspondientes al mes de Septiembre de 2016', '', '56000.00', '16', '350000.00', '418250.00', '35000.00', '10', '12250.00', '2016-09-05 02:41:41', '2016-09-05 02:41:41');
INSERT INTO `factura` VALUES ('67', '2', '41', '2016-09-04 00:00:00', 'Ingresos recibidos por terceros correspondientes al mes de Septiembre de 2016', '', '56000.00', '16', '350000.00', '418250.00', '35000.00', '10', '12250.00', '2016-09-05 02:41:41', '2016-09-05 02:41:41');
INSERT INTO `factura` VALUES ('68', '2', '41', '2016-09-04 00:00:00', 'Ingresos recibidos por terceros correspondientes al mes de Septiembre de 2016', '', '56000.00', '16', '350000.00', '418250.00', '35000.00', '10', '12250.00', '2016-09-05 02:41:42', '2016-09-05 02:41:42');
INSERT INTO `factura` VALUES ('69', '2', '41', '2016-09-04 00:00:00', 'Ingresos recibidos por terceros correspondientes al mes de Septiembre de 2016', '', '56000.00', '16', '350000.00', '418250.00', '35000.00', '10', '12250.00', '2016-09-05 02:41:42', '2016-09-05 02:41:42');

-- ----------------------------
-- Table structure for persona
-- ----------------------------
DROP TABLE IF EXISTS `persona`;
CREATE TABLE `persona` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nit` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `profesion` varchar(100) NOT NULL,
  `labora_en` varchar(100) NOT NULL,
  `direccion_labora` varchar(100) NOT NULL,
  `telefono_labora` varchar(100) NOT NULL,
  `direccion_residencia` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tipo_persona_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of persona
-- ----------------------------
INSERT INTO `persona` VALUES ('1', '222333444', 'Fabian', 'bustamante', '3204249116', 'fabian0320@gmail.com', 'ingeniero', 'fabian bustamante web', 'libertadores', '5771324', 'lopez', '2016-05-16 01:23:24', '2016-05-16 01:23:24', '1');
INSERT INTO `persona` VALUES ('3', '13213213', 'ouihsdoisaoi', 'loisdjfoisdjo', '8798798', 'jkdshfksjd@lkjdso.com', 'edfsf', 'sdfsdfs', 'sdfsdf', '546546849', 'dsdsfssdf', '2016-08-07 19:12:43', '2016-08-07 19:12:43', '2');
INSERT INTO `persona` VALUES ('5', '1090393264', 'jesus elias', 'ortega garcia', '321651646', 'jeortegaga@gmail.com', 'ingeniero', 'legalite', 'kjdshkas', '3215465', 'dslakjdsaldapsojpodkas', '2016-08-07 19:46:47', '2016-08-07 19:46:47', '1');
INSERT INTO `persona` VALUES ('7', '1090393264', 'jesus elias', 'ortega garcia', '321651646', 'jeortegaga@gmail.com', 'ingeniero', 'legalite', 'kjdshkas', '3215465', 'dslakjdsaldapsojpodkas', '2016-08-07 19:58:43', '2016-08-07 19:58:43', '2');
INSERT INTO `persona` VALUES ('11', '234565768790', 'asfsadsadassd', 'asdasdsadsa', '342342343', 'jasdas223312@uio.com', 'asdasas', 'asdasdsa', 'asdasdasd', '2323423', 'dsfsddfdfs', '2016-08-07 20:17:34', '2016-08-07 20:17:34', '1');
INSERT INTO `persona` VALUES ('12', '1090393263', 'dsfsdfsdf', 'ortega garcia', '8798798', 'fabian0320@gmail.com', 'edfsf', 'sdfsdfs', 'kjdshkas', '2323423', '', '2016-08-10 22:52:28', '2016-08-10 22:52:28', '2');
INSERT INTO `persona` VALUES ('13', '13213213', 'ouihsdoisaoi', ' loisdjfoisdjo', '8798798', 'jkdshfksjd@lkjdso.com', 'edfsf', 'sdfsdfs', 'sdfsdf', '546546849', 'dsdsfssdf', '2016-08-11 23:31:05', '2016-08-11 23:31:05', '1');
INSERT INTO `persona` VALUES ('14', '1090393265', 'jesus elias', 'ortega garcia', '321651646', 'jeortegaga@gmail.com', 'ingeniero', 'legalite', 'kjdshkas', '3215465', 'dslakjdsaldapsojpodkas', '2016-08-11 23:53:01', '2016-08-11 23:53:01', '2');
INSERT INTO `persona` VALUES ('15', '1090393265', 'jesus elias', 'ortega garcia', '321651646', 'jeortegaga@gmail.com', 'ingeniero', 'legalite', 'kjdshkas', '3215465', 'dslakjdsaldapsojpodkas', '2016-08-12 00:15:07', '2016-08-12 00:15:07', '1');
INSERT INTO `persona` VALUES ('16', '123456', 'wertyh', '3wergf', '2345', 'jeortegaga@gmail.com', 'asdsd', 'sadsdas', 'Cucuta', '3213058244', 'asdassd', '2016-08-14 00:33:03', '2016-08-14 00:33:03', '1');
INSERT INTO `persona` VALUES ('17', '123456789', 'sdfsdfsdf', 'dsfsdfsd', '21312312', 'edf@ldkj.vom', 'lsmdlsmñlsm', 'lksdmlksdm', 'lklkml', '98797987', '', '2016-08-14 22:47:19', '2016-08-14 22:47:19', '1');
INSERT INTO `persona` VALUES ('18', '1234565432', '1rvdvre', 'rfgrefr', '322323432', 'rgfdvdf@okijod.vom', 'oksjadisajkl', 'kndslkjsdlk', 'lkjdlkjdslkj', '9879879', '', '2016-08-14 22:50:54', '2016-08-14 22:50:54', '2');
INSERT INTO `persona` VALUES ('19', '1234567432', '1234565432', '123454234', '1234542345', 'mayerlyb4@gmail.com', '1234567', '1267', '123456', '123456', '', '2016-08-14 22:53:54', '2016-08-14 22:53:54', '2');
INSERT INTO `persona` VALUES ('20', '1234567432', '1234565432', '123454234', '1234542345', 'mayerlyb4@gmail.com', '1234567', '1267', '123456', '123456', '', '2016-08-14 22:54:23', '2016-08-14 22:54:23', '2');

-- ----------------------------
-- Table structure for propiedad
-- ----------------------------
DROP TABLE IF EXISTS `propiedad`;
CREATE TABLE `propiedad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `direccion` varchar(100) NOT NULL,
  `barrio` varchar(100) NOT NULL,
  `precio_venta` decimal(15,2) NOT NULL,
  `valor_arriendo` double NOT NULL,
  `valor_condominio` double NOT NULL,
  `area` double NOT NULL,
  `numero_escritura` varchar(100) DEFAULT NULL,
  `estrato` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `persona_id` int(10) unsigned NOT NULL,
  `tipo_propiedad_id` int(10) unsigned NOT NULL,
  `imagen_principal` varchar(500) NOT NULL,
  `imagen1` varchar(500) NOT NULL,
  `imagen2` varchar(500) NOT NULL,
  `imagen3` varchar(500) NOT NULL,
  `imagen4` varchar(500) NOT NULL,
  `proposito` varchar(500) NOT NULL,
  `estado` varchar(500) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `persona_id` (`persona_id`),
  CONSTRAINT `propiedad_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of propiedad
-- ----------------------------
INSERT INTO `propiedad` VALUES ('1', ' San Luis', ' San Luis', '150000000.00', '700000', '0', '64', '12345646', '3', '2016-08-11 23:31:05', '2016-08-11 23:31:05', '13', '1', 'img/propiedades/1/1_21172N3esG21zZzNaJQ_thumg.JPG', 'img/propiedades/1/1_21172N2yWmVbEac6OQv_thumg.JPG', 'img/propiedades/1/1_21172N0xgGe3LE50vwc_thumg.JPG', 'img/propiedades/1/1_21172N1XDJtucrzTwWU_thumg.JPG', 'img/propiedades/1/1_21172N3esG21zZzNaJQ_thumg.JPG', 'Vende', '0', 'sddsf');
INSERT INTO `propiedad` VALUES ('2', 'atalaya', 'motilones', '0.00', '350000', '0', '64', '3131351361265', '2', '2016-08-11 23:53:01', '2016-09-05 02:41:41', '14', '3', 'img/propiedades/2/2_21172N0xgGe3LE50vwc_thumg.JPG', 'img/propiedades/2/2_21172N1XDJtucrzTwWU_thumg.JPG', 'img/propiedades/2/2_21172N2yWmVbEac6OQv_thumg.JPG', 'img/propiedades/2/2_21172N3esG21zZzNaJQ_thumg.JPG', 'img/propiedades/2/2_13903226_1639304039731529_1696518617159160772_n.jpg', 'Arrienda', '1', 'sddsf');
INSERT INTO `propiedad` VALUES ('3', 'El Contento', 'El Contento', '75000000.00', '150000', '0', '200', '6546546846', '2', '2016-08-12 00:15:07', '2016-08-12 00:15:07', '15', '1', 'img/propiedades/3/3_21182N3qTqTdsAsn6sM_thumg.JPG', 'img/propiedades/3/3_21182N2izTETlKcZwFS_thumg.JPG', 'img/propiedades/3/3_21182N1Uut8JG7Rw0b7_thumg.JPG', 'img/propiedades/3/3_21182N0FOoiAshKMESF_thumg.JPG', 'img/propiedades/3/3_21182N0FOoiAshKMESF_thumg.JPG', 'Vende', '0', '5564654');

-- ----------------------------
-- Table structure for propiedad_desactivada
-- ----------------------------
DROP TABLE IF EXISTS `propiedad_desactivada`;
CREATE TABLE `propiedad_desactivada` (
  `id` int(11) NOT NULL,
  `direccion` text NOT NULL,
  `barrio` text NOT NULL,
  `valor_arriendo` double NOT NULL,
  `valor_condominio` double NOT NULL,
  `area` double NOT NULL,
  `numero_escritura` text NOT NULL,
  `estrato` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `persona_id` int(11) NOT NULL,
  `tipo_propiedad_id` int(11) NOT NULL,
  `imagen_principal` text NOT NULL,
  `imagen1` text NOT NULL,
  `imagen2` text NOT NULL,
  `imagen3` text NOT NULL,
  `imagen4` text NOT NULL,
  `proposito` text NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of propiedad_desactivada
-- ----------------------------
INSERT INTO `propiedad_desactivada` VALUES ('1', 'av 2', 'lopez', '300000', '50000', '250', '234', '3', '2016-05-16 12:47:26', '2016-05-16 12:47:26', '1', '1', 'img/propiedades/1/1_DSCN2996.JPG', 'img/propiedades/1/1_DSCN2997.JPG', 'img/propiedades/1/1_DSCN2998.JPG', 'img/propiedades/1/1_DSCN2998.JPG', 'img/propiedades/1/1_DSCN3008.JPG', 'Arrienda', '0', 'casa grande y bonita');
INSERT INTO `propiedad_desactivada` VALUES ('3', 'asasdsa', 'motilones', '350000', '50000', '100', '316546163164', '2', '2016-08-07 16:46:47', '2016-08-07 19:46:47', '5', '1', 'img/propiedades/3/3_conductor-mayor-dgt.jpg', 'img/propiedades/3/3_cliente.png', 'img/propiedades/3/3_camion.jpg', 'img/propiedades/3/3_diesel-generador.png', 'img/propiedades/3/3_diesel-generador.png', 'Arrienda', '0', 'asdasdsdasdasda');
INSERT INTO `propiedad_desactivada` VALUES ('5', 'aertuik', 'sadadasda', '51635165', '0', '100', '124545654165465', '3', '2016-08-07 16:58:43', '2016-08-07 19:58:43', '7', '1', 'img/propiedades/5/5_Buscar.png', 'img/propiedades/5/5_Cancelar.png', 'img/propiedades/5/5_Foto.png', 'img/propiedades/5/5_Guardar.png', 'img/propiedades/5/5_Nuevo.png', 'Vende', '0', 'asdasdasda');

-- ----------------------------
-- Table structure for rol
-- ----------------------------
DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rol
-- ----------------------------
INSERT INTO `rol` VALUES ('1', 'administrador', null, '0000-00-00 00:00:00');
INSERT INTO `rol` VALUES ('2', 'vendedor', null, '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for tipo_persona
-- ----------------------------
DROP TABLE IF EXISTS `tipo_persona`;
CREATE TABLE `tipo_persona` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tipo_persona
-- ----------------------------
INSERT INTO `tipo_persona` VALUES ('1', 'Natural', '2016-09-04 18:47:48', '0000-00-00 00:00:00');
INSERT INTO `tipo_persona` VALUES ('2', 'Juridica', '2016-09-04 18:47:54', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for tipo_propiedad
-- ----------------------------
DROP TABLE IF EXISTS `tipo_propiedad`;
CREATE TABLE `tipo_propiedad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tipo_propiedad
-- ----------------------------
INSERT INTO `tipo_propiedad` VALUES ('1', 'Casa', '2016-05-16 01:13:24', '2016-08-16 15:36:19');
INSERT INTO `tipo_propiedad` VALUES ('3', 'apartamento', '2016-05-16 01:13:39', '2016-05-16 01:13:39');
INSERT INTO `tipo_propiedad` VALUES ('5', 'Local', '2016-08-05 19:27:25', '2016-08-05 19:27:25');
INSERT INTO `tipo_propiedad` VALUES ('6', 'Lote', '2016-08-16 15:36:30', '2016-08-16 15:36:30');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rol_id` int(10) unsigned NOT NULL,
  `remember_token` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@admin.com', '2016-08-07 15:43:08', '2016-08-16 17:40:50', '1', 'D9ZXoLBPRhaYpxw265r39EoifWSS2Ca9yn7BKcF47pfgPlKDbdlxSoTfU91N');
INSERT INTO `users` VALUES ('3', 'Mayerly Bonilla', 'f976e2029df2e37f146216f08cfe01fc', 'mayerlyb4@gmail.com', '2016-08-07 15:43:04', '2016-08-16 17:41:08', '1', 'G5UTxhjUzsbPFQngBGT0QE93VE9hvkhLMwN0nqpp9bzLsEPd45WsYNoLJCg1');
INSERT INTO `users` VALUES ('5', 'Olga Romero', 'e44d46e0bb9691cf448a9bb19391e8ab', 'olgaluciar72@hotmail.com', '2016-08-05 19:08:44', '2016-08-16 16:06:31', '1', 'dOc1JZM8tdgFryacHuyDwzxnEINDz5CWN1MIoJUKVyGi6HleKiNcD0WqgGpT');
INSERT INTO `users` VALUES ('7', 'Maritza Solano', 'e10adc3949ba59abbe56e057f20f883e', 'maritsol1@hotmail.com', '2016-08-05 19:09:20', '2016-08-08 23:01:15', '1', '');
INSERT INTO `users` VALUES ('9', 'Gloria Mejia', 'e10adc3949ba59abbe56e057f20f883e', 'gloriam_i@hotmail.com', '2016-08-05 19:12:30', '2016-08-08 23:01:26', '2', '');
INSERT INTO `users` VALUES ('11', 'Fabian', 'e10adc3949ba59abbe56e057f20f883e', 'fabian0320@gmail.com', '2016-08-05 20:39:30', '2016-08-10 21:18:30', '2', 'KiaK1d7eDnTFIWbkGvIkzXekB0jKmkDWrqExZHyhf8T5GUUPurnzSx5gITnB');
