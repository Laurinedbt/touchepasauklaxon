-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 04 fév. 2026 à 18:43
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `touche_pas_au_klaxon`
--

--
-- Déchargement des données de la table `agences`
--

INSERT INTO `agences` (`id`, `nom_ville`) VALUES
(1, 'Paris'),
(2, 'Lyon'),
(3, 'Marseille'),
(4, 'Toulouse'),
(5, 'Nice'),
(6, 'Nantes'),
(7, 'Strasbourg'),
(8, 'Montpellier'),
(9, 'Bordeaux'),
(10, 'Lille'),
(11, 'Rennes'),
(12, 'Reims');

--
-- Déchargement des données de la table `trips`
--

INSERT INTO `trips` (`id`, `user_mail`, `depart`, `date_depart`, `heure_depart`, `destination`, `date_arrivee`, `heure_arrivee`, `places`, `places_disponibles`) VALUES
(1, 'chloe.roux@email.fr', 'Lille', '2026-01-31', '17:15:00', 'Paris', '2026-01-31', '20:15:00', 3, 2),
(5, 'maxime.petit@email.fr', 'Lyon', '2026-02-08', '15:00:00', 'Nice', '2026-02-08', '20:30:00', 2, 2);

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `Nom`, `Prenom`, `Telephone`, `Mail`, `password`, `role`) VALUES
(1, 'Martin', 'Alexandre', 612345678, 'alexandre.martin@email.fr', '$2y$10$SM2Kmu9ENnzjk6OaV83sBupHeHk.OfdipqMf/tv/35h61biC2XqMi', 'user'),
(2, 'Dubois', 'Sophie', 698765432, 'sophie.dubois@email.fr', '$2y$10$Df1DlEGXhaXfIw29GUCZD.Gc56GZqFKecPiY9YwpJNWHSpR4Oh23C', 'user'),
(3, 'Bernard', 'Julien', 622446688, 'julien.bernard@email.fr', '$2y$10$f0SPWbrFDRnL/jGGZoUxs../O01Xj.GJO/nBO2PrEGnqvar1DBdBy', 'user'),
(4, 'Moreau', 'Camille', 611223344, 'camille.moreau@email.fr', '$2y$10$Z1PPaogqxHS4aCQ5vj7G2eUZnRpNBNnYI4U9T7pA.2mvNn4tRkDua', 'user'),
(5, 'Lefèvre', 'Lucie', 777889900, 'lucie.lefevre@email.fr', '$2y$10$lHgwnJ0rTwM3306OPmOho.7JrYwj8XqVSf49fnvLuZjoMh0mmLA8S', 'user'),
(6, 'Leroy', 'Thomas', 655443322, 'thomas.leroy@email.fr', '$2y$10$LGN4.7kbvjfCZpoY0Oy.UOL9C5uSmPHM5BtLOGcrR2ywMVYHGEFne', 'user'),
(7, 'Roux', 'Chloé', 633221199, 'chloe.roux@email.fr', '$2y$10$PLxiu6bKBlwikt.GZurB3uI/hoMlSlrbwp2HZ7PjTF0JISfDzJuPG', 'user'),
(8, 'Petit', 'Maxime', 766778899, 'maxime.petit@email.fr', '$2y$10$cphf2r7cm8STUxwGdPe.sOL3qKzq3svPKl4ZyC3cBkzIjTZplRmOS', 'user'),
(9, 'Garnier', 'Laura', 688776655, 'laura.garnier@email.fr', '$2y$10$3fYfcdbb/rPU7lsD.FbX3uj9Dem3YB6NvHq5o1RFn1DOmISw.fi9i', 'admin'),
(10, 'Dupuis', 'Antoine', 744556677, 'antoine.dupuis@email.fr', '$2y$10$JKnvcOWgTYDDNyyVwoN2g.kr.ptTfFxD.pKTIdHu/lwM9aY89tD/G', 'user'),
(11, 'Lefebvre', 'Emma', 699887766, 'emma.lefebvre@email.fr', '$2y$10$RDWsvxPZmczxZ0bA8QhHgeU/hEGYMT4jWEUJaO.i74lW4ybblqbIS', 'user'),
(12, 'Fontaine', 'Louis', 655667788, 'louis.fontaine@email.fr', '$2y$10$qsHfF/1qcHgmL4syb6f9p.VS8tA4pXhDXREt3XAn0mf/LWAbPn3HG', 'user'),
(13, 'Chevalier', 'Clara', 788990011, 'clara.chevalier@email.fr', '$2y$10$6EvGyMQll3lt2t9gW3O3ieeYtZBKzSj/zT28bEcU2VkXCU6XuCZmK', 'user'),
(14, 'Robin', 'Nicolas', 644332211, 'nicolas.robin@email.fr', '$2y$10$niRdR8AiEq9FaLZEGW1OleEsU0qnliF4.JDU1B1woQXAQZ/irV0ri', 'user'),
(15, 'Gauthier', 'Marine', 677889922, 'marine.gauthier@email.fr', '$2y$10$K/5jCrxJmxJInt.2dmzqOej96TyFrpOQl.Fxef6BXA73Q9LdrUk12', 'user'),
(16, 'Fournier', 'Pierre', 722334455, 'pierre.fournier@email.fr', '$2y$10$PGkPaAXPiaWjvXXtOxoqY.p2GmvhrPNTPh40XjgU9t7O1eLsp.dwm', 'user'),
(17, 'Girard', 'Sarah', 688665544, 'sarah.girard@email.fr', '$2y$10$SuK4m2WvnmkcF4D7sT8SaeW.XU64jY1dwCtAqcvJNju6cKLvaGILW', 'user'),
(18, 'Lambert', 'Hugo', 611223366, 'hugo.lambert@email.fr', '$2y$10$0mbpmI5ZeCPIL9jzT/6VMeyAk3BP/81BtkV2MDpnaylRUHon/PdRa', 'user'),
(19, 'Masson', 'Julie', 733445566, 'julie.masson@email.fr', '$2y$10$ISbbhmMs1Pne3VwcJ.C57OVXnCeHryb1uBPR2aOnuGavEPD3XTZyO', 'user'),
(20, 'Henry', 'Arthur', 666554433, 'arthur.henry@email.fr', '$2y$10$LBVn0K1lQ7.pq2Xpu1usxuCniriRS8cKYs2bIcw2c3SwQBj2lVPte', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
