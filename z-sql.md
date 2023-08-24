-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Listage des données de la table forum.categorie : ~0 rows (environ)
INSERT INTO `categorie` (`id_categorie`, `categorie`) VALUES
	(1, 'sport'),
	(2, 'cuisine');

-- Listage des données de la table forum.message : ~0 rows (environ)
INSERT INTO `message` (`id_message`, `texte`, `date_creation`, `id_sujet`, `id_utilisateur`) VALUES
	(1, 'j\'ime le foot', '2023-08-23', 1, 1);

-- Listage des données de la table forum.sujet : ~0 rows (environ)
INSERT INTO `sujet` (`id_sujet`, `titre`, `date_creation`, `verouiller`, `id_categorie`, `id_utilisateur`) VALUES
	(1, 'football', '2023-08-23', 1, 1, 1);

-- Listage des données de la table forum.utilisateur : ~0 rows (environ)
INSERT INTO `utilisateur` (`id_utilisateur`, `pseudonyme`, `motsDePasse`, `date_inscription`, `email`, `role`) VALUES
	(1, 'cricri', '0000', '2023-08-23', 'oo@gmail.com', 'role1');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
