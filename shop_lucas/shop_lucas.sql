-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 11 jan. 2023 à 23:38
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `shop_lucas`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(11) NOT NULL,
  `date_commande` datetime NOT NULL DEFAULT current_timestamp(),
  `quantite` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(10) NOT NULL,
  `type_id` int(10) NOT NULL,
  `modele` varchar(50) NOT NULL,
  `description_produit` varchar(255) NOT NULL,
  `taille` varchar(30) NOT NULL,
  `prix` int(5) NOT NULL,
  `image_produit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `type_id`, `modele`, `description_produit`, `taille`, `prix`, `image_produit`) VALUES
(2, 2, 'T-shirt unicolore', 'Couleur:	Blanc\r\nStyle:	Casual\r\nType de motif:	Unicolore\r\nType du col:	Col rond\r\nLongueur des manches:	Manches courtes\r\nType de manches:	Épaules Tombantes\r\nLongueur:	Classique\r\nType d\'ajustement:	Coupe régulière\r\nTissu:	Extensibilité légère\r\nTissu/matériel', 'S', 9, 'http://pngimg.com/uploads/tshirt/tshirt_PNG5435.png'),
(31, 4, 'Pull-over', 'Pull-over de loisirs Neymar Jr Creativity Logo Crew Puma, noir\r\nSûr du style, amour des fans et fonctionnalité ! La polyvalence de ce sweat-shirt parle d’elle-même ! Viens chercher le pull de loisirs Neymar Jr Creativity Crew Puma MAINTENANT !', 'L', 49, 'https://soccerstorecore.azureedge.net/0-0-96371.png'),
(33, 3, 'PANTALON DE JOGGING', 'PANTALON DE JOGGING STAR HEATHER GREY\r\n80% coton fil Belcoro® / 20% polyester. Taille élastique avec cordon. Chevilles élastiques en coton / Lycra®. 2 poches latérales. Jambes sans couture sur les côtés pour maximiser la surface d\'impression.', 'M', 13, 'https://www.crafters.fr/images/stories/virtuemart/product/hqtxadm/9705_5dc1adeb8aa89_HETAHER-GREY-FACE.png'),
(34, 3, 'Pantalon classique marron', 'Fermeture à glissière et à boutons\r\nDeux poches latérales en biais\r\nDeux poches arrière boutonnées\r\nCoupe regular\r\nFabriqué en Italie\r\nRéf. MOY-40--Y---B0010/0001 003\r\n100% laine vierge', 'M', 1500, 'https://www.zilli.com/8560-large_default/pantalon-classique-marron.jpg'),
(35, 1, 'Robe Bleuh', 'Robe Rouge à point blanc et jsp ', 'M', 39, 'https://robesapois.fr/wp-content/uploads/2020/09/HTB136uuXpuWBuNjSszbq6AS7FXaR_result-247x296.png'),
(36, 2, 'T-shirt unicolore', 'Couleur: Gris\r\nStyle:	Casual\r\nType de motif:	Unicolore\r\nType du col:	Col rond\r\nLongueur des manches:	Manches courtes\r\nType de manches:	Épaules Tombantes\r\nLongueur:	Classique\r\nType d\'ajustement:	Coupe régulière\r\nTissu:	Extensibilité légère\r\nTissu/matériel:', 'M', 9, 'https://pngimg.com/uploads/tshirt/tshirt_PNG5448.png'),
(38, 4, 'Sweatshirt White', 'Jacquemus Hooded Sweatshirt White\r\nDans le cadre de leur première collaboration, Nike et Jacquemus ont accompagné les Air Humara LX Beige et Brown d\'une collection de vêtements et accessoires.\r\n\r\nLe Nike Jacquemus Hooded Sweatshirt White présente une conf', 'S', 230, 'https://cdn.shopify.com/s/files/1/2358/2817/products/nike-jacquemus-hoodie.png?v=1657113895'),
(39, 1, 'Robe, Ralph Lauren Corporation', 'Robe, Ralph Lauren Corporation, En Mousseline De Soie\r\nRobe, Ralph Lauren Corporation, En Mousseline De Soie \r\nRobe, Ralph Lauren Corporation, En Mousseline De Soie, De La Soie, Rouge, Vêtements, Décolleté, Robe De Soirée, Sari, La Mode, Robe De Cocktail,', 'XS', 229, 'https://www.pngmart.com/files/17/Girl-Short-Dress-PNG-Clipart.png'),
(40, 3, 'Pantalon TSI JSP', 'Pantalon treillis TSI Jeunes Sapeurs-Pompiers sans bandes rétro réfléchissantes avec liseré rouge. Ceinture élastique réglable (permet d\'élargir ou de resserrer d\'une taille) Empiècement dos, 2 poches biais, bas élastique de resserrage et renfort genoux.', 'L', 43, 'https://www.laboutiqueofficiellepompiers.fr/9132-thickbox_default/nouveau-pantalon-jsp.jpg'),
(41, 3, 'Pantalon à pattes d&#039;éléphant', 'Pantalon à pattes d&#039;éléphant Hippie', 'S', 70, 'https://www.graphiti.fr/16075-large_default/alexander-mcqueen-jeans-patte-d-elephant-patch-logo-denim-bleu.jpg'),
(43, 2, 'T-SHIRT MLDEG BLEU', 'Tee-shirt Officiel MLDEG Bleu marquage dos.\r\nDisponible du S au 5XL\r\n100 % coton biologique.', 'S', 25, 'https://ninestore.fr/2322-home_default/t-shirt-mldeg-bleu-marquage-dos.jpg'),
(44, 4, 'Sweat-Shirt De Travail A Capuche Russell', 'Authenticity is the foundation of our business, and every item we sell is inspected by our expert team. Our authenticators are the most experienced and highly trained in the business. In addition, we source our products only from trusted suppliers.', 'XXS', 46, 'https://cdn.lafinefleur.co/wp-content/uploads/2019/11/Sweat-capuche-Bleu-marine.png'),
(45, 4, 'SWEAT BASIQUE NOIR', 'Pour tous ceux à la recherche d&#039;un sweat classique, confortable et intemporel, Le basique Crafters est idéal. Un sweat unisexe avec une coupe légèrement ajustée, une poche kangourou, des finitions bord côte aux manches et à la taille et très agréable', 'XXL', 15, 'https://www.crafters.fr/images/stories/virtuemart/product/hqtxadm/7758_5d52af42ab558_SWEAT-BASIQUE-DOS-NOIR.png'),
(46, 2, 'T-shirt Young 1-PACT', 'T-shirt Young 1-PACT \r\nyvick', 'M', 19, 'https://pbs.twimg.com/media/C3HTxAHWgAAhs1k.png');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `type_nom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`type_id`, `type_nom`) VALUES
(1, 'Robe'),
(2, 'Tshirt'),
(3, 'Pantalon'),
(4, 'Pull');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `ip` varchar(20) NOT NULL,
  `token` text NOT NULL,
  `date_inscription` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `pseudo`, `email`, `adresse`, `password`, `ip`, `token`, `date_inscription`) VALUES
(1, 'LucasStagnette', 'lucasgrosliere@outlook.fr', '21 rue des Mouettes, Sables d\'Olonne', '$2y$12$sdIJhqZEotz3Uy1NjSaSgu8hVL88jsok0z/ZWnDqmGexuPkrX4nQa', '::1', 'e341c4109044e5ba91fbc5bde007a0b4b8ca087043e7885ffc0abfc57278c555790dce80f584ccaea8892a68f382c2f74b69608fadef141f6b48cb6c2ddff1f0', '2023-01-10 20:07:24'),
(5, 'test', 'test@test.fr', '300 rue Saint Charles, Paris, 75015', '$2y$12$4jrT53bYFrekTowiRR.1Q..qB4PzYR2gtnUIg.0/FX4yfDZerpU5i', '::1', '4705dfb8c3b33044fcbce005ac087d51d8957d3accc053d800820f88af25dc7606ee5f082bce376347ede0fff4901289b360a58f06f36ea2fe96b436c1556a01', '2023-01-10 22:03:27');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `id_produit` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id`);

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
