-- MySQL dump 10.13  Distrib 5.5.38, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: demandas
-- ------------------------------------------------------
-- Server version	5.5.38-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `en_configura_cor`
--

DROP TABLE IF EXISTS `en_configura_cor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `en_configura_cor` (
  `COD_CONFIGURA_COR` int(10) NOT NULL AUTO_INCREMENT,
  `VLR_TEMPO_INICIAL` time DEFAULT NULL,
  `VLR_TEMPO_FINAL` time DEFAULT NULL,
  `DSC_COR` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`COD_CONFIGURA_COR`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `en_configura_cor`
--

LOCK TABLES `en_configura_cor` WRITE;
/*!40000 ALTER TABLE `en_configura_cor` DISABLE KEYS */;
INSERT INTO `en_configura_cor` VALUES (1,'00:00:01','24:01:00','#EFFBEF'),(2,'24:01:01','48:00:00','#F7F8E0'),(3,'48:00:01','838:59:59','#F6CECE');
/*!40000 ALTER TABLE `en_configura_cor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `en_demandas`
--

DROP TABLE IF EXISTS `en_demandas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `en_demandas` (
  `COD_DEMANDA` int(10) NOT NULL AUTO_INCREMENT,
  `TPO_DEMANDA` int(10) NOT NULL DEFAULT '0',
  `DSC_DEMANDA` varchar(50) NOT NULL,
  `COD_SISTEMA` int(10) NOT NULL,
  `DTA_DEMANDA` datetime NOT NULL,
  `COD_RESPONSAVEIS` varchar(50) NOT NULL,
  `COD_SITUACAO` int(50) NOT NULL,
  `IND_PRIORIDADE` int(50) NOT NULL,
  `DTA_FIM_DEMANDA` datetime DEFAULT NULL,
  `COD_USUARIO` int(11) NOT NULL DEFAULT '0',
  `COD_SISTEMA_ORIGEM` int(11) DEFAULT NULL,
  PRIMARY KEY (`COD_DEMANDA`),
  KEY `FK_COD_SISTEMA` (`COD_SISTEMA`),
  CONSTRAINT `FK_COD_SISTEMA` FOREIGN KEY (`COD_SISTEMA`) REFERENCES `en_sistemas` (`COD_SISTEMA`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `en_demandas`
--

LOCK TABLES `en_demandas` WRITE;
/*!40000 ALTER TABLE `en_demandas` DISABLE KEYS */;
INSERT INTO `en_demandas` VALUES (1,0,'Colocar tempo decorrido da demanda',1,'2018-03-27 23:18:35','2',6,0,'2018-04-03 15:34:01',3,1),(2,0,'Verificar salvar na demanda',1,'2018-03-27 23:21:11','2',6,0,'2018-04-03 15:34:01',3,1),(3,0,'Criar botÃ£o para exibir texto da demanda',1,'2018-03-27 23:27:24','2',6,0,'2018-04-03 15:34:01',3,1),(4,3,'Enviar email',1,'2018-03-28 08:59:09','3',6,2,'2018-04-11 08:48:49',3,1),(5,0,'Criar link para histÃ³rico da demanda',1,'2018-03-28 09:02:53','2',6,0,'2018-04-03 15:34:01',3,1),(6,0,'Erro ao atualizar usuÃ¡rio',1,'2018-03-28 09:08:20','3',6,0,'2018-04-03 15:34:01',3,1),(7,0,'Criar campo prioridade',1,'2018-03-28 09:10:17','2',6,2,'2018-04-03 15:27:34',3,1),(8,0,'Erro na tela de login',1,'2018-03-28 09:48:07','2',6,0,'2018-04-03 13:13:16',3,1),(9,0,'Colocar o nÃºmero da demanda',1,'2018-03-28 11:16:17','2',6,0,'2018-04-03 15:34:01',3,1),(10,0,'Mudar o tÃ­tulo da coluna ResponsÃ¡veis',1,'2018-03-28 11:29:04','2',6,0,'2018-04-03 15:34:01',3,1),(11,0,'Mostrar somente minhas demandas',1,'2018-03-28 11:34:23','2',6,0,'2018-04-03 15:34:01',3,1),(12,1,'ExbiÃ§Ã£o de demandas',1,'2018-03-29 15:13:28','2',6,3,'2018-04-05 15:37:27',3,1),(13,0,'Erro na tela de login',1,'2018-04-02 13:44:16','3',6,0,'2018-04-03 15:34:01',3,1),(14,0,'Colocar data de tÃ©rmino da demanda',1,'2018-04-02 16:57:14','2',6,1,'2018-04-03 12:56:49',3,1),(15,0,'Colocar campo prioridade na listagem',1,'2018-04-03 10:00:25','2',6,1,'2018-04-03 15:28:14',3,1),(16,3,'Criar tela para configuraÃ§Ã£o de tempo',1,'2018-04-03 10:01:23','2',6,1,'2018-04-17 13:52:41',3,1),(17,3,'Alterar menu principal',1,'2018-04-03 14:20:10','2',6,1,'2018-04-05 14:42:53',3,1),(18,0,'Colocar o tipo da demanda',1,'2018-04-03 14:23:48','2',6,2,'2018-04-03 15:20:51',3,1),(19,3,'Adicionar um campo na listagem de demandas',1,'2018-04-03 14:25:42','2',6,1,'2018-04-17 13:54:16',3,1),(20,1,'Corrigir o campo duraÃ§Ã£o na listagem',1,'2018-04-04 15:04:27','2',7,4,'2018-04-05 14:32:03',3,1),(21,2,'Colocar item no combo status da demanda',1,'2018-04-04 15:19:35','2',7,3,'2018-04-05 14:32:03',3,1),(22,2,'OrdenaÃ§Ã£o no histÃ³rico da demanda',1,'2018-04-04 15:23:53','2',6,2,'2018-04-05 14:42:53',3,1),(23,3,'Quando cancelar uma demanda parar o tempo',1,'2018-04-04 16:26:06','2',6,2,'2018-04-05 14:42:53',3,1),(24,3,'Permitir upload de arquivos',1,'2018-04-05 15:17:56','2',6,2,'2018-06-04 10:25:20',3,1),(25,3,'Link menu principal',1,'2018-04-05 15:20:01','2',6,2,'2018-04-05 18:01:48',3,1),(26,3,'No menu principal criar outro quantitativo',1,'2018-04-05 15:40:07','2',6,1,'2018-04-06 15:56:58',3,1),(27,3,'Link na listagem de quantitativos por status',1,'2018-04-05 15:44:13','2',6,2,'2018-04-06 13:18:23',3,1),(28,2,'Erro ao gravar demanda',1,'2018-04-05 15:46:36','2',6,2,'2018-04-05 18:27:21',3,1),(29,1,'InconsistÃªncia entre relatÃ³rios',3,'2018-04-06 01:07:38','3',6,4,NULL,2,1),(30,3,'Elaborar Nova Tela',2,'2018-04-06 01:35:18','2',6,1,'2018-06-04 10:23:52',2,1),(31,3,'Elaborar Nova Tela',3,'2018-04-06 01:37:01','2',4,1,NULL,2,1),(32,2,'Problema ao cancelar plano turma',3,'2018-04-06 11:04:39','2',6,2,'2018-05-14 15:51:13',3,1),(33,2,'NÃ£o mostrar demandas',1,'2018-04-06 11:13:16','2',6,1,'2018-04-06 13:38:42',3,1),(34,3,'Criar uma tela para gerar excel',4,'2018-04-18 10:52:22','2',6,3,'2018-04-20 11:32:09',3,1),(35,3,'Permitir cadastrar produtos somente para uma loja',4,'2018-04-18 11:13:12','2',6,3,'2018-04-27 14:02:03',3,1),(36,2,'Colocar campo no cadastro de Lojas',4,'2018-04-19 10:26:25','2',6,2,'2018-05-25 12:29:37',3,1),(37,3,'Colocar filtro no relatÃ³rio de produÃ§Ã£o',4,'2018-04-26 10:19:50','3',6,1,'2018-05-02 12:38:34',3,1),(38,2,'CorreÃ§Ã£o na tela Lista PresenÃ§a',3,'2018-04-26 10:58:33','3',6,4,NULL,2,1),(39,3,'Gravar erros emitidos na Nota Fiscal',2,'2018-05-08 11:14:33','2',6,3,'2018-06-04 10:25:09',3,1),(40,2,'NÃ£o permitir cadastrar produto sem codncm',2,'2018-05-08 11:22:06','3',6,4,'2018-05-25 10:49:34',3,1),(55,3,'Criar funcionalidade devoluÃ§Ã£o de NF',2,'2018-06-04 14:24:58','2',6,3,'2020-01-21 12:28:44',1,1),(56,2,'Verificar Salvar na tela de editar demanda',5,'2020-01-06 09:28:36','3',6,2,'2020-01-08 09:02:22',3,1),(57,2,'Verificar Salvar na tela de editar demanda',1,'2020-01-06 09:28:45','3',7,2,'2020-01-06 09:29:29',3,1),(58,2,'Verificar Salvar na tela de incluir demanda',5,'2020-01-07 10:11:20','3',6,2,'2020-01-08 09:16:45',3,1),(59,2,'Ajustar Layout das telas',5,'2020-01-07 10:31:40','3',6,2,'2020-01-08 09:16:51',3,1),(60,3,'CriaÃ§Ã£o de mÃ©todo para alterar o estado da dema',5,'2020-01-08 17:16:22','3',6,2,'2020-01-08 17:22:11',3,1),(61,3,'AlteraÃ§Ã£o de mÃ©todo que retorna equipes para re',5,'2020-01-09 11:37:38','3',6,2,'2020-01-09 11:37:56',3,1),(62,2,'Alterar objetivos do plano Operacional',6,'2020-01-10 12:03:50','3',6,2,'2020-01-10 12:04:42',3,1),(63,3,'Criar mÃ©todo para incluir mÃ³dulos',5,'2020-01-14 09:50:54','3',6,2,'2020-01-14 09:53:19',3,1),(64,3,'Criar mÃ©todo para excluir mÃ³dulo',5,'2020-01-14 09:51:20','3',6,2,'2020-01-14 09:53:26',3,1),(65,3,'Criar mÃ©todo para lista mÃ³dulos',5,'2020-01-14 09:51:39','3',6,2,'2020-01-14 09:53:32',3,1),(66,2,'Alterar listagem que retorna as equipes',5,'2020-01-14 09:52:12','3',6,2,'2020-01-14 09:53:39',3,1),(67,3,'Criar mÃ©todo para vincular item pmi',5,'2020-01-14 12:05:00','3',6,2,'2020-01-21 12:28:44',3,1),(68,3,'Filtro das ManifestaÃ§Ãµes RCM conforme tipo',7,'2020-01-21 15:30:36','2',6,2,'2020-01-24 13:14:13',4,1),(69,3,'Criar mÃ©todo para retornar o Quantitativo de Dema',5,'2020-01-21 16:04:59','3',6,2,'2020-01-21 16:05:42',3,1),(70,3,'Criar MÃ©todo para retornar listagem de demandas p',5,'2020-01-21 16:05:28','3',6,2,'2020-01-21 16:05:48',3,1),(71,3,'Montar tela inicial',5,'2020-01-21 16:17:00','2',6,2,'2020-01-21 17:15:56',2,1),(72,2,'Comentar o atributo UOR da entidade recurso atvd p',5,'2020-01-22 11:09:13','3',6,2,'2020-01-22 11:35:25',4,1),(73,3,'Implementar Pesquisa de Demandas na tela principal',5,'2020-01-22 12:16:10','2',6,2,'2020-01-22 12:18:06',3,1),(74,3,'Implementar Pesquisa de Demandas na tela principal',5,'2020-01-22 12:16:26','3',6,2,'2020-01-22 16:23:32',3,1),(75,3,'Incluir regra alocaÃ§Ã£o',5,'2020-01-23 13:23:06','3',6,2,'2020-01-23 13:27:05',3,1),(76,2,'Modificar a API para receber no POST o DTO',7,'2020-01-23 14:25:05','3',6,2,'2020-01-24 11:17:01',4,1),(77,3,'AlteraÃ§Ãµes Tela Aluguel',8,'2020-01-26 10:51:45','2',6,2,'2020-01-27 17:18:13',3,1),(78,3,'Tela de Perfil',8,'2020-01-26 10:57:19','2',6,2,'2020-01-27 17:18:05',3,1),(79,3,'Criar Tela para alterar senha',8,'2020-01-26 10:57:44','2',6,2,'2020-01-27 17:17:57',3,1),(80,3,'Gravar indicador de leitura da manifestaÃ§Ã£o',7,'2020-01-27 19:17:15','3',6,2,'2020-01-28 11:23:04',4,1),(81,2,'Verificar Listagem de Demandas por Estado (inicio)',5,'2020-01-28 10:54:22','2',6,2,'2020-01-28 12:23:55',3,1),(82,3,'Criar campo aniversÃ¡rio no cadastro do Cliente',8,'2020-01-28 15:32:07','2',4,2,NULL,3,1),(83,3,'Criar link na listagem minhas demandas',1,'2020-01-28 15:33:17','2',1,1,NULL,3,1),(84,3,'Criar coluna com tempo em execuÃ§Ã£o',1,'2020-01-28 15:36:53','2',1,1,NULL,3,1),(85,2,'Incluir escolha de item pmi na alocaÃ§ no AnaliseA',7,'2020-01-28 19:11:44','3',1,2,NULL,4,1),(86,3,'Tela de cadastro de aluguel',8,'2020-01-28 22:43:53','2',1,2,NULL,2,1);
/*!40000 ALTER TABLE `en_demandas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `en_log_situacao_demanda`
--

DROP TABLE IF EXISTS `en_log_situacao_demanda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `en_log_situacao_demanda` (
  `COD_OPERACAO` int(10) NOT NULL AUTO_INCREMENT,
  `COD_DEMANDA` int(10) NOT NULL,
  `COD_SITUACAO` int(10) NOT NULL,
  `TPO_OPERACAO` char(2) NOT NULL,
  `DTA_OPERACAO` datetime NOT NULL,
  `COD_USUARIO` int(10) NOT NULL,
  `COD_SISTEMA_ORIGEM` int(11) DEFAULT NULL,
  PRIMARY KEY (`COD_OPERACAO`)
) ENGINE=InnoDB AUTO_INCREMENT=262 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `en_log_situacao_demanda`
--

LOCK TABLES `en_log_situacao_demanda` WRITE;
/*!40000 ALTER TABLE `en_log_situacao_demanda` DISABLE KEYS */;
INSERT INTO `en_log_situacao_demanda` VALUES (1,1,1,'I','2018-03-27 23:18:35',1,1),(2,2,1,'I','2018-03-27 23:21:11',1,1),(3,3,1,'I','2018-03-27 23:27:24',1,1),(4,4,1,'I','2018-03-28 08:59:09',1,1),(5,5,1,'I','2018-03-28 09:02:53',1,1),(6,6,1,'I','2018-03-28 09:08:20',1,1),(7,7,1,'I','2018-03-28 09:10:17',1,1),(8,6,4,'U','2018-03-28 09:29:39',1,1),(9,8,1,'I','2018-03-28 09:48:07',1,1),(10,8,2,'U','2018-03-28 09:49:11',1,1),(11,3,2,'U','2018-03-28 09:51:16',1,1),(12,8,3,'U','2018-03-28 09:57:54',1,1),(13,3,4,'U','2018-03-28 11:04:50',1,1),(14,8,2,'U','2018-03-28 11:10:24',1,1),(15,9,1,'I','2018-03-28 11:16:17',1,1),(16,10,1,'I','2018-03-28 11:29:04',1,1),(17,11,1,'I','2018-03-28 11:34:23',1,1),(18,8,3,'U','2018-03-28 11:34:54',1,1),(19,5,2,'U','2018-03-28 11:36:47',1,1),(20,5,4,'U','2018-03-28 11:59:30',1,1),(21,3,6,'U','2018-03-28 11:59:47',1,1),(22,6,6,'U','2018-03-28 12:00:14',1,1),(23,8,6,'U','2018-03-29 10:21:32',1,1),(24,11,4,'U','2018-03-29 10:39:31',1,1),(25,10,2,'U','2018-03-29 10:39:53',1,1),(26,10,4,'U','2018-03-29 10:40:36',1,1),(27,9,2,'U','2018-03-29 10:41:20',1,1),(28,9,4,'U','2018-03-29 10:48:32',1,1),(29,11,1,'U','2018-03-29 10:56:03',1,1),(30,5,6,'U','2018-03-29 11:05:46',1,1),(31,10,6,'U','2018-03-29 11:06:08',1,1),(32,9,6,'U','2018-03-29 11:08:14',1,1),(33,11,6,'U','2018-03-29 11:22:54',2,1),(34,7,2,'U','2018-03-29 11:49:28',2,1),(35,7,5,'U','2018-03-29 12:23:27',2,1),(36,1,4,'U','2018-03-29 13:05:01',2,1),(37,12,1,'I','2018-03-29 15:13:28',3,1),(38,7,6,'U','2018-03-30 09:12:05',3,1),(39,8,1,'U','2018-03-30 09:13:15',3,1),(40,7,1,'U','2018-04-02 13:36:53',1,1),(41,13,6,'I','2018-04-02 13:44:16',1,1),(42,7,6,'U','2018-04-02 13:44:31',1,1),(43,1,2,'U','2018-04-02 14:18:06',2,1),(44,7,4,'U','2018-04-02 14:18:28',2,1),(45,1,2,'U','2018-04-02 14:19:17',1,1),(46,7,6,'U','2018-04-02 15:27:53',2,1),(47,14,1,'I','2018-04-02 16:57:14',1,1),(48,1,6,'U','2018-04-02 18:35:26',2,1),(49,15,1,'I','2018-04-03 10:00:25',1,1),(50,16,1,'I','2018-04-03 10:01:23',1,1),(51,2,2,'U','2018-04-03 10:52:33',2,1),(52,2,6,'U','2018-04-03 10:58:28',2,1),(53,15,2,'U','2018-04-03 10:59:39',2,1),(54,15,6,'U','2018-04-03 11:28:59',2,1),(55,14,2,'U','2018-04-03 11:33:55',2,1),(56,14,6,'U','2018-04-03 12:56:49',2,1),(57,8,6,'U','2018-04-03 13:13:16',2,1),(58,16,2,'U','2018-04-03 13:16:25',2,1),(59,17,1,'I','2018-04-03 14:20:10',1,1),(60,18,1,'I','2018-04-03 14:23:48',1,1),(61,19,1,'I','2018-04-03 14:25:42',1,1),(62,16,3,'U','2018-04-03 14:37:30',2,1),(63,18,2,'U','2018-04-03 15:16:10',2,1),(64,18,6,'U','2018-04-03 15:20:51',2,1),(65,7,3,'U','2018-04-03 15:27:30',2,1),(66,7,6,'U','2018-04-03 15:27:34',2,1),(67,15,3,'U','2018-04-03 15:28:09',2,1),(68,15,6,'U','2018-04-03 15:28:14',2,1),(69,17,2,'U','2018-04-03 15:39:22',2,1),(70,20,1,'I','2018-04-04 15:04:27',1,1),(71,21,1,'I','2018-04-04 15:19:35',1,1),(72,22,1,'I','2018-04-04 15:23:53',1,1),(73,20,7,'U','2018-04-04 16:02:08',1,1),(74,21,7,'U','2018-04-04 16:25:20',1,1),(75,23,1,'I','2018-04-04 16:26:06',1,1),(76,17,4,'U','2018-04-05 01:15:15',2,1),(77,22,2,'U','2018-04-05 01:16:02',2,1),(78,22,4,'U','2018-04-05 01:16:32',2,1),(79,23,4,'U','2018-04-05 01:17:00',2,1),(80,22,6,'U','2018-04-05 14:21:17',2,1),(81,23,6,'U','2018-04-05 14:21:34',2,1),(82,17,6,'U','2018-04-05 14:22:08',2,1),(83,12,2,'U','2018-04-05 14:59:24',2,1),(84,24,1,'I','2018-04-05 15:17:56',3,1),(85,25,1,'I','2018-04-05 15:20:01',3,1),(86,12,6,'U','2018-04-05 15:37:27',1,1),(87,26,1,'I','2018-04-05 15:40:07',3,1),(88,25,2,'U','2018-04-05 15:42:10',1,1),(89,27,1,'I','2018-04-05 15:44:13',1,1),(90,28,1,'I','2018-04-05 15:46:36',1,1),(91,25,4,'U','2018-04-05 17:59:33',2,1),(92,25,6,'U','2018-04-05 18:01:48',2,1),(93,28,4,'U','2018-04-05 18:25:59',2,1),(94,28,6,'U','2018-04-05 18:27:21',2,1),(95,27,2,'U','2018-04-05 18:35:36',2,1),(96,27,4,'U','2018-04-06 00:58:16',1,1),(97,29,6,'I','2018-04-06 01:07:38',2,1),(98,30,1,'I','2018-04-06 01:35:18',2,1),(99,31,1,'I','2018-04-06 01:37:01',2,1),(100,32,1,'I','2018-04-06 11:04:39',3,1),(101,33,1,'I','2018-04-06 11:13:16',3,1),(102,27,6,'U','2018-04-06 13:18:23',2,1),(103,33,6,'U','2018-04-06 13:38:42',2,1),(104,26,2,'U','2018-04-06 14:58:25',2,1),(105,26,6,'U','2018-04-06 15:56:58',2,1),(106,32,4,'U','2018-04-10 12:14:26',2,1),(107,16,2,'U','2018-04-10 14:06:25',2,1),(108,24,2,'U','2018-04-10 14:49:21',2,1),(109,4,2,'U','2018-04-11 08:34:54',1,1),(110,4,4,'U','2018-04-11 08:36:00',1,1),(111,4,2,'U','2018-04-11 08:38:43',1,1),(112,4,4,'U','2018-04-11 08:39:24',1,1),(116,4,1,'U','2018-04-11 08:44:05',1,1),(118,4,4,'U','2018-04-11 08:48:25',1,1),(119,4,6,'U','2018-04-11 08:48:49',1,1),(121,19,2,'U','2018-04-11 08:59:47',1,1),(122,19,1,'U','2018-04-11 09:00:09',1,1),(123,24,3,'U','2018-04-11 15:19:22',2,1),(124,16,4,'U','2018-04-11 15:31:28',2,1),(125,19,2,'U','2018-04-11 15:32:06',2,1),(126,19,4,'U','2018-04-11 17:22:01',2,1),(127,16,6,'U','2018-04-17 13:52:41',2,1),(128,19,6,'U','2018-04-17 13:54:16',2,1),(129,34,1,'I','2018-04-18 10:52:22',3,1),(130,35,1,'I','2018-04-18 11:13:12',3,1),(131,36,1,'I','2018-04-19 10:26:25',3,1),(132,34,2,'U','2018-04-19 10:28:22',2,1),(133,34,6,'U','2018-04-20 11:32:09',2,1),(134,35,2,'U','2018-04-20 14:06:47',2,1),(135,37,1,'I','2018-04-26 10:19:50',3,1),(136,38,6,'I','2018-04-26 10:58:33',2,1),(137,35,4,'U','2018-04-26 15:09:00',2,1),(138,35,6,'U','2018-04-27 14:02:03',2,1),(139,37,6,'U','2018-05-02 12:38:29',2,1),(140,37,6,'U','2018-05-02 12:38:34',2,1),(141,39,1,'I','2018-05-08 11:14:33',3,1),(142,40,1,'I','2018-05-08 11:22:06',3,1),(143,40,2,'U','2018-05-08 11:42:46',2,1),(144,40,3,'U','2018-05-08 12:41:39',2,1),(145,32,6,'U','2018-05-14 15:51:13',1,1),(146,36,4,'U','2018-05-17 14:34:53',2,1),(147,36,3,'U','2018-05-17 22:27:37',2,1),(148,36,4,'U','2018-05-21 14:19:21',2,1),(149,40,6,'U','2018-05-25 10:49:34',1,1),(150,36,6,'U','2018-05-25 12:29:37',2,1),(151,24,2,'U','2018-05-29 14:26:34',2,1),(152,24,4,'U','2018-05-29 14:55:08',2,1),(153,31,2,'U','2018-05-29 15:00:05',2,1),(154,31,3,'U','2018-05-29 15:17:28',2,1),(155,30,2,'U','2018-05-29 15:17:39',2,1),(156,30,3,'U','2018-05-29 16:50:16',2,1),(157,39,2,'U','2018-05-30 09:59:37',2,1),(158,39,4,'U','2018-05-30 10:31:39',2,1),(174,30,6,'U','2018-06-04 10:23:52',1,1),(175,39,6,'U','2018-06-04 10:25:09',2,1),(176,24,6,'U','2018-06-04 10:25:20',2,1),(177,31,4,'U','2018-06-04 10:37:55',2,1),(178,55,1,'I','2018-06-04 14:24:58',1,1),(179,55,2,'U','2018-06-04 14:26:40',2,1),(180,55,1,'U','2018-06-04 14:44:01',1,1),(181,55,2,'U','2018-06-04 14:44:21',1,1),(182,56,2,'I','2020-01-06 09:28:36',3,1),(183,57,2,'I','2020-01-06 09:28:45',3,1),(184,57,7,'U','2020-01-06 09:29:29',3,1),(185,56,4,'U','2020-01-07 09:50:06',3,1),(186,56,2,'U','2020-01-07 09:56:00',3,1),(187,56,4,'U','2020-01-07 09:56:16',3,1),(188,58,4,'I','2020-01-07 10:11:20',3,1),(189,59,2,'I','2020-01-07 10:31:40',3,1),(190,59,4,'U','2020-01-08 08:40:44',3,1),(191,56,6,'U','2020-01-08 09:02:22',3,1),(192,58,6,'U','2020-01-08 09:16:45',3,1),(193,59,6,'U','2020-01-08 09:16:51',3,1),(194,60,2,'I','2020-01-08 17:16:22',3,1),(195,60,6,'U','2020-01-08 17:22:11',3,1),(196,61,2,'I','2020-01-09 11:37:38',3,1),(197,61,6,'U','2020-01-09 11:37:56',3,1),(198,62,2,'I','2020-01-10 12:03:50',3,1),(199,62,6,'U','2020-01-10 12:04:42',3,1),(200,63,2,'I','2020-01-14 09:50:54',3,1),(201,64,2,'I','2020-01-14 09:51:20',3,1),(202,65,2,'I','2020-01-14 09:51:39',3,1),(203,66,2,'I','2020-01-14 09:52:12',3,1),(204,63,6,'U','2020-01-14 09:53:19',3,1),(205,64,6,'U','2020-01-14 09:53:26',3,1),(206,65,6,'U','2020-01-14 09:53:32',3,1),(207,66,6,'U','2020-01-14 09:53:39',3,1),(208,67,2,'I','2020-01-14 12:05:00',3,1),(209,55,6,'U','2020-01-21 12:28:44',2,1),(210,67,6,'U','2020-01-21 12:28:44',3,1),(211,68,1,'I','2020-01-21 15:30:36',4,1),(212,69,1,'I','2020-01-21 16:04:59',3,1),(213,70,1,'I','2020-01-21 16:05:28',3,1),(214,69,6,'U','2020-01-21 16:05:42',3,1),(215,70,6,'U','2020-01-21 16:05:48',3,1),(216,71,2,'I','2020-01-21 16:17:00',2,1),(217,71,6,'U','2020-01-21 17:15:56',2,1),(218,72,1,'I','2020-01-22 11:09:13',4,1),(219,72,2,'U','2020-01-22 11:32:49',3,1),(220,72,6,'U','2020-01-22 11:35:25',3,1),(221,68,2,'U','2020-01-22 12:02:29',2,1),(222,73,1,'I','2020-01-22 12:16:10',3,1),(223,74,1,'I','2020-01-22 12:16:26',3,1),(224,74,2,'U','2020-01-22 12:16:40',3,1),(225,73,6,'U','2020-01-22 12:18:06',3,1),(226,74,6,'U','2020-01-22 16:23:32',3,1),(227,75,2,'I','2020-01-23 13:23:06',3,1),(228,75,6,'U','2020-01-23 13:27:05',3,1),(229,76,2,'I','2020-01-23 14:25:05',4,1),(230,76,2,'U','2020-01-23 14:25:23',4,1),(231,76,6,'U','2020-01-24 11:17:01',3,1),(232,68,6,'U','2020-01-24 13:14:13',2,1),(233,77,1,'I','2020-01-26 10:51:45',3,1),(234,78,1,'I','2020-01-26 10:57:19',3,1),(235,79,1,'I','2020-01-26 10:57:44',3,1),(236,78,2,'U','2020-01-27 09:44:09',2,1),(237,78,4,'U','2020-01-27 10:15:24',2,1),(238,79,2,'U','2020-01-27 10:21:14',2,1),(239,79,4,'U','2020-01-27 11:15:58',2,1),(240,77,2,'U','2020-01-27 11:18:01',2,1),(241,77,4,'U','2020-01-27 16:29:15',2,1),(242,79,6,'U','2020-01-27 17:17:57',3,1),(243,78,6,'U','2020-01-27 17:18:05',3,1),(244,77,6,'U','2020-01-27 17:18:13',3,1),(245,80,1,'I','2020-01-27 19:17:15',4,1),(246,80,1,'U','2020-01-27 19:25:00',4,1),(247,80,2,'U','2020-01-28 08:47:56',3,1),(248,80,3,'U','2020-01-28 09:39:57',3,1),(249,81,1,'I','2020-01-28 10:54:22',3,1),(250,80,2,'U','2020-01-28 11:18:10',3,1),(251,80,6,'U','2020-01-28 11:23:04',3,1),(252,81,2,'U','2020-01-28 12:13:12',2,1),(253,81,6,'U','2020-01-28 12:23:55',2,1),(254,82,1,'I','2020-01-28 15:32:07',3,1),(255,83,1,'I','2020-01-28 15:33:17',3,1),(256,84,1,'I','2020-01-28 15:36:53',3,1),(257,82,2,'U','2020-01-28 16:07:51',2,1),(258,82,4,'U','2020-01-28 16:57:14',2,1),(259,85,1,'I','2020-01-28 19:11:44',4,1),(260,85,1,'U','2020-01-28 19:14:25',4,1),(261,86,1,'I','2020-01-28 22:43:53',2,1);
/*!40000 ALTER TABLE `en_log_situacao_demanda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `en_sistemas`
--

DROP TABLE IF EXISTS `en_sistemas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `en_sistemas` (
  `COD_SISTEMA` int(10) NOT NULL AUTO_INCREMENT,
  `NME_SISTEMA` varchar(50) NOT NULL,
  `NME_BANCO` varchar(100) DEFAULT NULL,
  `IND_ATIVO` char(2) NOT NULL,
  PRIMARY KEY (`COD_SISTEMA`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `en_sistemas`
--

LOCK TABLES `en_sistemas` WRITE;
/*!40000 ALTER TABLE `en_sistemas` DISABLE KEYS */;
INSERT INTO `en_sistemas` VALUES (1,'Demandas','demandas','S'),(2,'Siscove','siscove','S'),(3,'ACDC','cdma','S'),(4,'PÃ£o Dourado','dourado','S'),(5,'AnaliseAV','','S'),(6,'Trabalho','','S'),(7,'RecomendaÃ§Ã£o','','S'),(8,'Sisto','sisto','S');
/*!40000 ALTER TABLE `en_sistemas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `en_situacao`
--

DROP TABLE IF EXISTS `en_situacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `en_situacao` (
  `COD_SITUACAO` int(10) NOT NULL AUTO_INCREMENT,
  `DSC_SITUACAO` varchar(50) NOT NULL,
  PRIMARY KEY (`COD_SITUACAO`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `en_situacao`
--

LOCK TABLES `en_situacao` WRITE;
/*!40000 ALTER TABLE `en_situacao` DISABLE KEYS */;
INSERT INTO `en_situacao` VALUES (1,'Aguardando Atendimento'),(2,'Em Desenvolvimento'),(3,'Pausada'),(4,'ConcluÃ­da'),(5,'Enviada para HomologaÃ§Ã£o'),(6,'Publicada/ Finalizada'),(7,'Cancelada');
/*!40000 ALTER TABLE `en_situacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `re_arquivo_demanda`
--

DROP TABLE IF EXISTS `re_arquivo_demanda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `re_arquivo_demanda` (
  `cod_arquivo` int(11) NOT NULL AUTO_INCREMENT,
  `cod_demanda` int(11) NOT NULL,
  `DSC_ARQUIVO` longtext,
  `TXT_CAMINHO_ARQUIVO` varchar(100) DEFAULT NULL,
  `dta_arquivo` datetime DEFAULT NULL,
  PRIMARY KEY (`cod_arquivo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `re_arquivo_demanda`
--

LOCK TABLES `re_arquivo_demanda` WRITE;
/*!40000 ALTER TABLE `re_arquivo_demanda` DISABLE KEYS */;
/*!40000 ALTER TABLE `re_arquivo_demanda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `re_descricao_demanda`
--

DROP TABLE IF EXISTS `re_descricao_demanda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `re_descricao_demanda` (
  `COD_DESCRICAO` int(10) NOT NULL AUTO_INCREMENT,
  `COD_DEMANDA` int(10) NOT NULL,
  `TXT_DESCRICAO` longtext NOT NULL,
  `TPO_DESCRICAO` char(2) NOT NULL,
  `DTA_DESCRICAO` datetime NOT NULL,
  `COD_USUARIO` int(10) NOT NULL,
  `COD_SISTEMA_ORIGEM` int(11) DEFAULT NULL,
  PRIMARY KEY (`COD_DESCRICAO`),
  KEY `FK_COD_DEMANDA` (`COD_DEMANDA`),
  CONSTRAINT `FK_COD_DEMANDA` FOREIGN KEY (`COD_DEMANDA`) REFERENCES `en_demandas` (`COD_DEMANDA`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `re_descricao_demanda`
--

LOCK TABLES `re_descricao_demanda` WRITE;
/*!40000 ALTER TABLE `re_descricao_demanda` DISABLE KEYS */;
INSERT INTO `re_descricao_demanda` VALUES (2,1,'Na listagem das demandas deve aparecer um campo com o tempo decorrido da demanda a partir do momento ela foi criada.','R','2018-03-27 23:20:31',1,1),(3,2,'Ao salvar a demanda tem que carregar a listagem de demandas.','R','2018-03-27 23:21:56',1,1),(4,2,'Ao salvar uma demanda, se ela for salva com sucesso, tem que atribuir o cÃ³digo da demanda que foi salva no codDemanda da tela.','R','2018-03-27 23:22:42',1,1),(5,4,'O sistema deverÃ¡ enviar um email para o responsÃ¡vel da demanda nas seguintes ocasiÃµes:\n1 - Quando criar uma demanda','R','2018-03-28 09:00:43',1,1),(6,5,'Colocar link ao lado do link Editar na listagem de demandas.','R','2018-03-28 09:03:23',1,1),(7,6,'Ao atualizar um usuÃ¡rio o sistema apresenta tela de erro.','R','2018-03-28 09:08:45',1,1),(8,7,'No cadastro da demanda criar combo prioridade com os seguintes valores:\n1 - Baixa\n2 - Normal\n3 - Alta\n4 - CrÃ­tica','R','2018-03-28 09:11:25',1,1),(9,7,'A listagem de demandas deve ser ordenada pela prioridade','R','2018-03-28 09:11:43',1,1),(10,8,'A Tela de login nÃ£o estÃ¡ aceitando usuÃ¡rios novos','R','2018-03-28 09:48:31',1,1),(11,9,'Colocar o nÃºmero da demanda na listagem de demandas antes da Data','R','2018-03-28 11:17:57',1,1),(12,10,'Alterar para ResponsÃ¡vel','R','2018-03-28 11:29:31',1,1),(13,11,'Na Listagem de demandas deve mostrar somente as minhas demandas.','R','2018-03-28 11:35:31',1,1),(14,11,'Se o usuÃ¡rio for o Administrador ele vÃª todas as demandas','R','2018-03-29 10:55:59',1,1),(15,7,'ALTER TABLE `en_demandas`\n	ADD COLUMN `IND_PRIORIDADE` INT(50) NOT NULL AFTER `COD_SITUACAO`','S','2018-03-29 12:14:03',2,1),(16,12,'Exibir demandas de acordo com campo tipo de demandas','R','2018-03-29 15:14:45',1,1),(17,12,'Colocar botÃ£o pesquisar','R','2018-04-02 13:29:36',1,1),(18,12,'A tela deverÃ¡ vir sem a listagem que sÃ³ serÃ¡ mostrada depois que clicar no botÃ£o pesquisar','R','2018-04-02 13:29:58',1,1),(19,16,'A tela deve ter os seguintes campos:\n1 - Tempo inicial \n2 - Tempo final\n3 - Cor','R','2018-04-03 10:03:12',1,1),(20,17,'Alterar layout da tela principal do sistema.','R','2018-04-03 14:20:50',1,1),(21,18,'Incluir o combo tipo da demanda na tela de cadastro de demandas, com os seguintes valores:\n1 - Incidente\n2 - Corretiva\n3 - Evolutiva','R','2018-04-03 14:24:44',1,1),(24,19,'Incluir mais um campo na listagem de demandas com o fundo colorido de acordo com a tela de configuraÃ§Ã£o relacionado com o tempo de duraÃ§Ã£o da demanda','R','2018-04-03 14:27:51',1,1),(25,20,'O campo duraÃ§Ã£o estÃ¡ contabilizando errado','O','2018-04-04 15:04:54',1,1),(26,20,'Um exemplo Ã© a demanda 18 que foi aberta dia 03 as 14:23 e ainda consta 0 dias','O','2018-04-04 15:09:41',1,1),(27,21,'Incluir item no combo status com a DescriÃ§Ã£o &#34;Cancelada&#34;, no cadastro de demandas','R','2018-04-04 15:20:10',1,1),(28,22,'Ordenar o histÃ³rico das demandas pelo campo Data','R','2018-04-04 15:24:31',1,1),(29,16,'CREATE TABLE `EN_CONFIGURA_COR` (\n	`COD_CONFIGURA_COR` INT(10) NOT NULL AUTO_INCREMENT,\n	`VLR_TEMPO_INICIAL` TIME NULL,\n	`VLR_TEMPO_FINAL` TIME NULL,\n	`DSC_COR` VARCHAR(50) NULL,\n	PRIMARY KEY (`COD_CONFIGURA_COR`)\n)\nCOLLATE=&#39;latin1_swedish_ci&#39;\nENGINE=InnoDB','S','2018-04-05 14:45:13',2,1),(30,24,'O sistema deve permitir upload de scripts ao invÃ©s de colocar os scripts em campo texto.','R','2018-04-05 15:18:23',3,1),(31,25,'Na listagem de demandas pendentes no menu principal, colocar um link para exibir a descriÃ§Ã£o da demanda assim como Ã© na tela de listagem de demandas.','R','2018-04-05 15:20:51',3,1),(32,26,'Criar outro quantitativo por prioridade da demanda na tela do menu principal','R','2018-04-05 15:40:35',3,1),(33,27,'Quando clicar na descriÃ§Ã£o do status no menu principal no quantitativo por status, o sistema deve direcionar para a tela de demandas com o combo do status preenchido e com as respectivas demandas listadas.','R','2018-04-05 15:46:02',1,1),(34,28,'Ao incluir uma demanda nova sem antes listar as demandas, na hora de salvar o sistema apresenta mensagem de erro.','R','2018-04-05 15:47:30',1,1),(35,30,'Elabora uma nova tela para cadastrar demandas do sistema ','R','2018-04-06 01:36:23',2,1),(36,31,'Elaborar uma nova tela para cadastrar demandas do sistema','R','2018-04-06 01:37:43',2,1),(37,32,'Ao cancelar um plano das turmas de um aluno, o sistema deve verificar se este plano tem pagamentos efetuados. Se tiver pagamentos efetuados o sistema dirÃ¡ que nÃ£o pode cancelar o plano porque tem pagamentos para aquele plano.','R','2018-04-06 11:06:17',3,1),(38,33,'Na listagem de Minhas Demandas, nÃ£o mostrar demandas Publicadas/Finalizadas e nem Canceladas.','R','2018-04-06 11:14:05',3,1),(39,34,'A tela deverÃ¡ gerar um excel de todos os produtos ativos no sistema.','R','2018-04-18 10:53:14',3,1),(40,35,'O sistema deverÃ¡ permitir cadastrar um produto somente para uma loja e mostrar na tela de pedidos somente os produtos daquela loja','R','2018-04-18 11:13:56',3,1),(41,34,'A tela deverÃ¡ conter os seguintes filtros: Ativo, ClassificaÃ§Ã£o e Departamento','R','2018-04-18 23:20:33',1,1),(43,36,'O campo jÃ¡ existe na tabela EN_LOJA','O','2018-04-19 10:27:33',3,1),(44,36,'Inserir um campo para colocar a ordem na tela de cadastro de lojas.','R','2018-04-19 10:27:44',3,1),(45,37,'Incluir o combo loja antes no relatÃ³rio de agenda de produÃ§Ã£o por loja','R','2018-04-26 10:20:28',3,1),(46,38,'NÃ£o estÃ¡ permitindo consultas com o mÃªs de MarÃ§o como referencia','R','2018-04-26 10:59:47',2,1),(47,39,'Toda vez que der algum erro na emissÃ£o da nota fiscal pelo sistema, os erros deverÃ£o ser salvos em uma tabela.','R','2018-05-08 11:15:18',3,1),(48,40,'O sistema nÃ£o deverÃ¡ permitir cadastrar ou alterar um produto com o cÃ³digo ncm 0 ou vazio.','R','2018-05-08 11:22:52',3,1),(49,30,'Pausada, pois estÃ¡ aguardando verificaÃ§Ã£o de seguranÃ§a','O','2018-05-30 10:35:36',2,1),(50,31,'Pausada, pois estÃ¡ aguardando verificaÃ§Ã£o de seguranÃ§a','O','2018-05-30 10:35:54',2,1),(55,55,'O sistema deve poder devolver uma Nota Fiscal e todos os produtos da nota devem voltar para o estoque.','R','2018-06-04 14:25:50',1,1),(56,72,'Comentar na classe RecursoEstimadoAtividadePlanejamentoRepository o campo CD_UOR_RCS que estÃ¡ nos selects','R','2020-01-22 11:33:22',3,1),(57,75,'Permitir Alocar somente em situaÃ§Ã£o Em Andamento','R','2020-01-23 13:23:32',3,1),(58,76,'Alterar Front-end tambÃ©m','O','2020-01-23 16:16:46',3,1),(59,77,'Aumentar a tabela dos produtos por dia','R','2020-01-26 10:52:14',3,1),(60,77,'Remover o quantitativo de pÃ¡ginas e adicionar tÃ­tulos nas tabelas','R','2020-01-26 10:52:42',3,1),(61,77,'Criar modal com listagem aluguÃ©is agendados e remover da tela de aluguel','R','2020-01-26 10:53:17',3,1),(62,77,'Adicionar campo valor unitÃ¡rio na tela de aluguÃ©is','R','2020-01-26 10:53:40',3,1),(63,77,'Alterar forma como o campo vlr_venda Ã© salvo no banco','R','2020-01-26 10:54:13',3,1),(64,80,'Aguardando resolver bug que nÃ£o estÃ¡ carregando a tela','O','2020-01-28 09:40:30',3,1),(65,83,'Inserir Link para poder editar a demanda na tela incial, na listagem minhas demandas','R','2020-01-28 15:34:00',3,1),(66,84,'A coluna deverÃ¡ contabilizar somente o tempo da demanda na situaÃ§Ã£o &#34;Em desenvolvimento&#34;','R','2020-01-28 15:37:29',3,1),(67,82,'ALTER TABLE sisto.en_cliente ADD dta_nascimento DATE NULL','S','2020-01-28 16:07:08',2,1),(68,86,'Inserir novo  campo para forma de pagamento','O','2020-01-28 22:45:05',2,1),(69,86,'Inserir campo para informar endereÃ§o de entrega, com opÃ§Ã£o de escolher o endereÃ§o jÃ¡ cadastrado no cadastro do cliente','R','2020-01-28 22:46:15',2,1),(70,86,'Inserir campo para informar campo de referÃªncia','R','2020-01-28 22:50:05',2,1),(71,86,'Formas de Pagamento possÃ­veis: Dinheiro, CartÃ£o, Boleto ou Deposito BancÃ¡rio','R','2020-01-28 22:52:33',2,1);
/*!40000 ALTER TABLE `re_descricao_demanda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `re_usuario_sistema`
--

DROP TABLE IF EXISTS `re_usuario_sistema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `re_usuario_sistema` (
  `cod_usuario_sistema` int(11) NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(11) DEFAULT NULL,
  `cod_sistema` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_usuario_sistema`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `re_usuario_sistema`
--

LOCK TABLES `re_usuario_sistema` WRITE;
/*!40000 ALTER TABLE `re_usuario_sistema` DISABLE KEYS */;
INSERT INTO `re_usuario_sistema` VALUES (5,1,1),(6,1,2),(7,1,3),(8,1,4),(9,1,5),(10,1,6),(11,1,7),(12,4,5),(13,4,6),(14,4,7),(38,2,1),(39,2,2),(40,2,4),(41,2,5),(42,2,6),(43,2,7),(44,2,8),(45,3,1),(46,3,2),(47,3,4),(48,3,5),(49,3,6),(50,3,7),(51,3,8);
/*!40000 ALTER TABLE `re_usuario_sistema` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `se_menu`
--

DROP TABLE IF EXISTS `se_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `se_menu` (
  `COD_MENU` int(4) NOT NULL,
  `DSC_MENU` varchar(100) DEFAULT NULL,
  `NME_CONTROLLER` varchar(1000) DEFAULT NULL,
  `NME_METHOD` varchar(1000) DEFAULT NULL,
  `DSC_CAMINHO_IMAGEM` varchar(1000) DEFAULT NULL,
  `IND_ATALHO` char(1) DEFAULT NULL,
  `IND_ATIVO` char(1) DEFAULT NULL,
  `COD_MENU_PAI` int(4) DEFAULT NULL,
  `IND_MOBILE` char(1) DEFAULT NULL,
  `DSC_ACTIVITY` varchar(100) DEFAULT NULL,
  `IND_VISIBLE` char(1) DEFAULT NULL,
  PRIMARY KEY (`COD_MENU`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `se_menu`
--

LOCK TABLES `se_menu` WRITE;
/*!40000 ALTER TABLE `se_menu` DISABLE KEYS */;
INSERT INTO `se_menu` VALUES (4,'Itens de Menu','MenuPrincipal','CarregaMenu',NULL,'N','S',0,'N',NULL,'N'),(3,'Cadastro de Menus','Menu','ChamaView',NULL,'N','S',2,'N',NULL,'S'),(1,'Inicio','MenuPrincipal','ChamaView',NULL,'N','S',-1,'N',NULL,'S'),(2,'Restrito',NULL,NULL,NULL,'N','S',0,'N',NULL,'S'),(5,'Carrega Itens do Menu','Menu','CarregaMenu',NULL,'N','S',0,'N',NULL,'N'),(6,'Carrega Dados do Usuario','MenuPrincipal','CarregaDadosUsuario',NULL,'N','S',0,'N',NULL,'N'),(7,'Lista Menus Ativos','Menu','ListarMenusAtivos',NULL,'N','S',0,'N',NULL,'N'),(8,'Salvar Menu','Menu','SalvarMenu',NULL,'N','S',0,'N',NULL,'N'),(9,'Listar Controllers','Menu','ListarClasses',NULL,'N','S',0,'N',NULL,'N'),(10,'Listar Metodos','Menu','ListarMetodos',NULL,'N','S',0,'N',NULL,'N'),(11,'PermissÃ£o','Permissao','ChamaView',NULL,NULL,'S',2,NULL,NULL,'S'),(12,'Lista de Menus PermissÃ£o','Menu','ListarMenusPermissao',NULL,NULL,'S',-1,NULL,NULL,'N'),(13,'Lista de perfis ativos','Perfil','ListarPerfilAtivo',NULL,NULL,'S',-1,NULL,NULL,'N'),(14,'Salvar PermissÃ£o','Permissao','SalvarPermissao',NULL,NULL,'S',-1,NULL,NULL,'N'),(15,'Carregar Menu Por um cÃ³digo','Menu','CarregaMenuByCod',NULL,NULL,'S',-1,NULL,NULL,'N'),(19,'Cadastro','','',NULL,NULL,'S',-1,NULL,NULL,'S'),(20,'Sistemas','Sistemas','ChamaView',NULL,NULL,'S',19,NULL,NULL,'S'),(16,'Gerar Arquivos','MontaFile','ChamaView',NULL,NULL,'S',2,NULL,NULL,'S'),(17,'Listar Tabelas','MontaFile','ListarTabelas',NULL,NULL,'S',2,NULL,NULL,'N'),(18,'Gerar Arquivo','MontaFile','GeraFile',NULL,NULL,'S',2,NULL,NULL,'N'),(21,'Insere um novo Sistema','Sistemas','InsertSistemas',NULL,NULL,'S',-1,NULL,NULL,'N'),(22,'Retorna uma Lista de Sistemas','Sistemas','ListarSistemas',NULL,NULL,'S',-1,NULL,NULL,'N'),(23,'Consultar Sistema','Sistemas','ConsultaSistemas',NULL,NULL,'S',-1,NULL,NULL,'N'),(24,'Atualizar sistema','Sistemas','UpdateSistemas',NULL,NULL,'S',NULL,NULL,NULL,'N'),(25,'Demandas','Demandas','ChamaView',NULL,NULL,'S',19,NULL,NULL,'S'),(26,'Retorna Lista de Demandas','Demandas','ListarDemandas',NULL,NULL,'S',NULL,NULL,NULL,'N'),(27,'Insere uma nova Demanda','Demandas','InsertDemandas',NULL,NULL,'S',NULL,NULL,NULL,'N'),(28,'Atualizar Demanda','Demandas','UpdateDemandas',NULL,NULL,'S',NULL,NULL,NULL,'N'),(29,'Listagem de DescriÃ§Ãµes da demanda','DescricaoDemandas','ListarDescricaoDemandas',NULL,NULL,'S',NULL,NULL,NULL,'N'),(30,'Inserir DescriÃ§Ã£o da Demanda','DescricaoDemandas','InsertDescricaoDemandas',NULL,NULL,'S',NULL,NULL,NULL,'N'),(31,'Monta Combo Sistema','Sistemas','ListaSistemasAtivos',NULL,NULL,'S',NULL,NULL,NULL,'N'),(32,'SituaÃ§Ã£o','Situacao','ChamaView',NULL,NULL,'S',19,NULL,NULL,'S'),(33,'Listar SituaÃ§Ãµes','Situacao','ListarSituacao',NULL,NULL,'S',NULL,NULL,NULL,'N'),(34,'Inserir SituaÃ§Ã£o','Situacao','InsertSituacao',NULL,NULL,'S',NULL,NULL,NULL,'N'),(35,'Alterar SituaÃ§Ã£o','Situacao','UpdateSituacao',NULL,NULL,'S',NULL,NULL,NULL,'N'),(36,'UsuÃ¡rios','Usuario','ChamaView',NULL,NULL,'S',2,NULL,NULL,'S'),(37,'Listagem de Usuarios','Usuario','ListarUsuario',NULL,NULL,'S',NULL,NULL,NULL,'N'),(38,'Inserir Usuario','Usuario','InsertUsuario',NULL,NULL,'S',NULL,NULL,NULL,'N'),(39,'Atualizar Usuario','Usuario','UpdateUsuario',NULL,NULL,'S',NULL,NULL,NULL,'N'),(40,'Reiniciar Senha','Usuario','ReiniciarSenha',NULL,NULL,'S',NULL,NULL,NULL,'N'),(41,'Deletar DescriÃ§Ã£o da Demanda','DescricaoDemandas','DeleteDescricaoDemandas',NULL,NULL,'S',NULL,NULL,NULL,'N'),(42,'Monta Combo Responsaveis','Usuario','ListarUsuariosAtivos',NULL,NULL,'S',NULL,NULL,NULL,'N'),(43,'Listar HistÃ³rico da Demanda','Demandas','ListarLogsDemanda',NULL,NULL,'S',NULL,NULL,NULL,'N'),(44,'Listar Demandas Pendentes (Menu Principal)','Demandas','ListarDemandasPendentes',NULL,NULL,'S',NULL,NULL,NULL,'N'),(45,'Listar Demandas UsuÃ¡rio (Menu Principal)','Demandas','ListarDemandasUsuario',NULL,NULL,'S',NULL,NULL,NULL,'N'),(46,'Contagem de SituaÃ§Ãµes de Demandas(Menu Principal)','Demandas','ContagemDemandasStatus',NULL,NULL,'S',-1,NULL,NULL,'N'),(47,'Contagem de Prioridade de Demandas(Menu Principal)','Demandas','ContagemDemandasPrioridade',NULL,NULL,'S',NULL,NULL,NULL,'N'),(48,'Prazos','ConfiguraCor','ChamaView',NULL,NULL,'S',19,NULL,NULL,'S'),(49,'Listar Prazos','ConfiguraCor','ListarConfiguraCor',NULL,NULL,'S',NULL,NULL,NULL,'N'),(50,'Inserir Prazo','ConfiguraCor','InsertConfiguraCor',NULL,NULL,'S',NULL,NULL,NULL,'N'),(51,'Alterar Prazo','ConfiguraCor','UpdateConfiguraCor',NULL,NULL,'S',NULL,NULL,NULL,'N'),(52,'Inserir Arquivo','ArquivoDemandas','InsertArquivoDemandas',NULL,NULL,'S',NULL,NULL,NULL,'N'),(53,'Fazer Upload de Arquivo','ArquivoDemandas','uploadArquivo',NULL,NULL,'S',NULL,NULL,NULL,'N'),(54,'Listar Arquivos','ArquivoDemandas','ListarArquivoDemandas',NULL,NULL,'S',NULL,NULL,NULL,'N'),(55,'Excluir Arquivo','ArquivoDemandas','DeleteArquivoDemandas',NULL,NULL,'S',NULL,NULL,NULL,'N'),(56,'Contagem Total de Demandas (Menu Principal)','Demandas','ContagemDemandasTotal',NULL,NULL,'S',NULL,NULL,NULL,'N'),(57,'Trocar Senha','MenuPrincipal','TrocaSenha',NULL,NULL,'S',19,NULL,NULL,'N'),(58,'Trocar Senha Login','Login','AlterarSenha',NULL,NULL,'S',19,NULL,NULL,'N'),(59,'Logoff','Login','Logoff',NULL,NULL,'S',-1,NULL,NULL,'S'),(60,'Listar Sistemas Por UsuÃ¡rio','Sistemas','ListarSistemasAtivosPorUsuario',NULL,NULL,'S',-1,NULL,NULL,'N');
/*!40000 ALTER TABLE `se_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `se_menu_perfil`
--

DROP TABLE IF EXISTS `se_menu_perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `se_menu_perfil` (
  `COD_PERFIL` int(4) NOT NULL,
  `COD_MENU` int(4) NOT NULL,
  PRIMARY KEY (`COD_PERFIL`,`COD_MENU`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `se_menu_perfil`
--

LOCK TABLES `se_menu_perfil` WRITE;
/*!40000 ALTER TABLE `se_menu_perfil` DISABLE KEYS */;
INSERT INTO `se_menu_perfil` VALUES (1,1),(1,2),(1,3),(1,4),(1,5),(1,6),(1,7),(1,8),(1,9),(1,10),(1,11),(1,12),(1,13),(1,14),(1,15),(1,16),(1,17),(1,18),(1,19),(1,20),(1,21),(1,22),(1,23),(1,24),(1,25),(1,26),(1,27),(1,28),(1,29),(1,30),(1,31),(1,32),(1,33),(1,34),(1,35),(1,36),(1,37),(1,38),(1,39),(1,40),(1,41),(1,42),(1,43),(1,44),(1,45),(1,46),(1,47),(1,48),(1,49),(1,50),(1,51),(1,52),(1,53),(1,54),(1,55),(1,56),(1,57),(1,58),(1,59),(1,60),(2,1),(2,4),(2,6),(2,13),(2,19),(2,20),(2,21),(2,22),(2,23),(2,24),(2,25),(2,26),(2,27),(2,28),(2,29),(2,30),(2,31),(2,32),(2,33),(2,34),(2,35),(2,41),(2,42),(2,43),(2,44),(2,45),(2,46),(2,47),(2,48),(2,49),(2,50),(2,51),(2,52),(2,53),(2,54),(2,55),(2,56),(2,57),(2,58),(2,59),(2,60);
/*!40000 ALTER TABLE `se_menu_perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `se_perfil`
--

DROP TABLE IF EXISTS `se_perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `se_perfil` (
  `COD_PERFIL` int(4) NOT NULL DEFAULT '0',
  `DSC_PERFIL` varchar(50) DEFAULT NULL,
  `IND_ATIVO` char(1) DEFAULT NULL,
  PRIMARY KEY (`COD_PERFIL`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `se_perfil`
--

LOCK TABLES `se_perfil` WRITE;
/*!40000 ALTER TABLE `se_perfil` DISABLE KEYS */;
INSERT INTO `se_perfil` VALUES (1,'Desenvolvimento','S'),(2,'Usuario','S');
/*!40000 ALTER TABLE `se_perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `se_usuario`
--

DROP TABLE IF EXISTS `se_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `se_usuario` (
  `COD_USUARIO` int(4) NOT NULL DEFAULT '0',
  `NME_USUARIO` varchar(50) DEFAULT NULL,
  `COD_USUARIO_PAI` int(11) DEFAULT NULL,
  `NME_USUARIO_COMPLETO` varchar(60) DEFAULT NULL,
  `TXT_SENHA` varchar(1000) DEFAULT NULL,
  `NRO_TEL_CELULAR` varchar(50) DEFAULT NULL,
  `TXT_EMAIL` varchar(60) DEFAULT NULL,
  `DTA_INATIVO` datetime DEFAULT NULL,
  `COD_PERFIL` int(4) DEFAULT NULL,
  `IND_ATIVO` char(1) DEFAULT NULL,
  PRIMARY KEY (`COD_USUARIO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `se_usuario`
--

LOCK TABLES `se_usuario` WRITE;
/*!40000 ALTER TABLE `se_usuario` DISABLE KEYS */;
INSERT INTO `se_usuario` VALUES (1,'adm',NULL,'Administrador','c4ca4238a0b923820dcc509a6f75849b','','rafaelfcarneiro@gmail.com',NULL,1,'S'),(2,'fernanda',NULL,'Fernanda Lopes','c4ca4238a0b923820dcc509a6f75849b','','fernandalassis21@gmail.com',NULL,2,'S'),(3,'rafael',NULL,'Rafael Freitas Carneiro','c4ca4238a0b923820dcc509a6f75849b','','rafaelfcarneiro@gmail.com',NULL,2,'S'),(4,'Guilherme',NULL,'Guilherme','28f8a21d6ae404767aee548b2fa07586','','',NULL,2,'S');
/*!40000 ALTER TABLE `se_usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-01-29  8:45:38
