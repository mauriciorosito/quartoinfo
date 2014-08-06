-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 16/07/2014 às 13h17min
-- Versão do Servidor: 5.5.20
-- Versão do PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `cms`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `idCategory` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `type` char(1) DEFAULT NULL,
  PRIMARY KEY (`idCategory`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `category`
--

INSERT INTO `category` (`idCategory`, `name`, `type`) VALUES
(1, 'Hardware', 'N'),
(2, 'Software', 'E'),
(3, 'OS', 'O');

-- --------------------------------------------------------

--
-- Estrutura da tabela `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `idContent` int(11) NOT NULL AUTO_INCREMENT,
  `publisher` int(11) DEFAULT NULL,
  `source` varchar(120) NOT NULL,
  `title` varchar(80) DEFAULT NULL,
  `text` text,
  `postDate` date DEFAULT NULL,
  `expirationDate` date NOT NULL,
  `type` char(1) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`idContent`),
  KEY `publisher` (`publisher`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Extraindo dados da tabela `content`
--

INSERT INTO `content` (`idContent`, `publisher`, `source`, `title`, `text`, `postDate`, `expirationDate`, `type`, `description`) VALUES
(4, 1, '', 'Viagem técnica para FISL', 'As inscrições para o evento FISL que ocorrerá de 7 a 10 de maio já estão abertas. Os professores da área de informática estão organizando um ônibus que sairá do campus Bento Gonçalves nos dias 7 e 8 de maio. Procure um dos professores e dê seu nome completo e cpf para pegar uma carona nessa vaigem de conhecimento! ', '2014-04-29', '2014-07-29', 'E', 'As inscrições para o evento FISL estão abertas '),
(5, 1, '', 'Aberto processo de seleção simplificado para professor substituto de Programação', 'O Câmpus Bento Gonçalves do IFRS, publica Edital nº 021/2014 de Processo Seletivo Simplificado para contratação de professor substituto de Programação.\r\n\r\nO edital dispõe de 1 vaga para docentes com títulação mínima de Ciências da Computação. As inscrições podem ser feitas entre 22 de abril e 9 de maio de 2014.', '2014-06-11', '2014-07-29', 'O', 'Inscrições encerram dia 9 de maio. '),
(6, 1, '', 'Visita de professor estrangeiro', 'O professor americano Richard Snyder da Universidade da Califórnia da cidade de Davis - University of California (UCDavis), visitou nesta segunda-feira, 28 de abril de 2014, o Câmpus Bento Gonçalves do Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Sul (IFRS). No Brasil desde a última sexta, o professor participou de reuniões e esteve com o Diretor de Pesquisa e Inovação, Rodrigo Monteiro, conhecendo a estrutura dos laboratórios de informática do Câmpus.', '2014-04-30', '2014-07-15', 'N', 'As boas-vindas à Instituição foram dadas pelo Diretor-Geral, Luciano Manfroi'),
(8, 1, '', 'Visita de professor estrangeiro2', 'O professor americano Richard Snyder da Universidade da Califórnia da cidade de Davis - University of California (UCDavis), visitou nesta segunda-feira, 28 de abril de 2014, o Câmpus Bento Gonçalves do Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Sul (IFRS). No Brasil desde a última sexta, o professor participou de reuniões e esteve com o Diretor de Pesquisa e Inovação, Rodrigo Monteiro, conhecendo a estrutura dos laboratórios de informática do Câmpus.', '2014-04-30', '2014-07-03', 'N', 'As boas-vindas à Instituição foram dadas pelo Diretor-Geral, Luciano Manfroi'),
(9, 1, '', 'Visita de professor estrangeiro3', 'O professor americano Richard Snyder da Universidade da Califórnia da cidade de Davis - University of California (UCDavis), visitou nesta segunda-feira, 28 de abril de 2014, o Câmpus Bento Gonçalves do Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Sul (IFRS). No Brasil desde a última sexta, o professor participou de reuniões e esteve com o Diretor de Pesquisa e Inovação, Rodrigo Monteiro, conhecendo a estrutura dos laboratórios de informática do Câmpus.', '2014-04-30', '2014-07-03', 'N', 'As boas-vindas à Instituição foram dadas pelo Diretor-Geral, Luciano Manfroi'),
(10, 1, '', 'Visita de professor estrangeiro4', 'O professor americano Richard Snyder da Universidade da Califórnia da cidade de Davis - University of California (UCDavis), visitou nesta segunda-feira, 28 de abril de 2014, o Câmpus Bento Gonçalves do Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Sul (IFRS). No Brasil desde a última sexta, o professor participou de reuniões e esteve com o Diretor de Pesquisa e Inovação, Rodrigo Monteiro, conhecendo a estrutura dos laboratórios de informática do Câmpus.', '2014-04-30', '2014-07-03', 'N', 'As boas-vindas à Instituição foram dadas pelo Diretor-Geral, Luciano Manfroi'),
(11, 1, '', 'Visita de professor estrangeiro5', 'O professor americano Richard Snyder da Universidade da Califórnia da cidade de Davis - University of California (UCDavis), visitou nesta segunda-feira, 28 de abril de 2014, o Câmpus Bento Gonçalves do Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Sul (IFRS). No Brasil desde a última sexta, o professor participou de reuniões e esteve com o Diretor de Pesquisa e Inovação, Rodrigo Monteiro, conhecendo a estrutura dos laboratórios de informática do Câmpus.', '2014-05-30', '2014-07-03', 'N', 'As boas-vindas à Instituição foram dadas pelo Diretor-Geral, Luciano Manfroi'),
(12, 0, 'fonte teste', 'Noticia teste', 'teste legal uaheuiha uihw iuhaiu ehaiuh eiuahwe iahu iuheaui heuiah weiuah iuhawehai uehaui heuiahweuihaeiwuhauiw eh', '0000-00-00', '0000-00-00', 'N', 'descriçãozinha bem legal'),
(13, 0, 'fonte teste', 'Noticia teste', 'teste legal uaheuiha uihw iuhaiu ehaiuh eiuahwe iahu iuheaui heuiah weiuah iuhawehai uehaui heuiahweuihaeiwuhauiw eh', '0000-00-00', '0000-00-00', 'N', 'descriçãozinha bem legal'),
(14, 0, 'fonte teste', 'Noticia teste', 'teste legal uaheuiha uihw iuhaiu ehaiuh eiuahwe iahu iuheaui heuiah weiuah iuhawehai uehaui heuiahweuihaeiwuhauiw eh', '0000-00-00', '0000-00-00', 'N', 'descriçãozinha bem legal'),
(15, 0, 'fonte teste', 'Noticia teste', 'asfha bgiaUDAUBG DIUAB SDIUABSIU DBAIUSB DUIABS D', '2014-07-01', '2014-08-30', 'N', 'descriçãozinha bem legal'),
(16, 0, 'fonte confiável', 'Noticia hoje', '  Vamos testar ... testando blabla blabla   Vamos testar ... testando blabla blabla   Vamos testar ... testando blabla blabla   Vamos testar ... testando blabla blabla   Vamos testar ... testando blabla blabla   Vamos testar ... testando blabla blabla   Vamos testar ... testando blabla blabla   Vamos testar ... testando blabla blabla   Vamos testar ... testando blabla blabla   Vamos testar ... testando blabla blabla   Vamos testar ... testando blabla blabla   Vamos testar ... testando blabla blabla   Vamos testar ... testando blabla blabla   Vamos testar ... testando blabla blabla ', '2014-07-01', '2014-07-30', 'N', 'descrição de hoje'),
(17, 0, 'confiavel', 'Noticia teste', ' ajksd kajs djkabsdk jbakj sdbakjsbd jkabsd bakjsdb', '2014-07-01', '2014-07-30', 'N', 'legal'),
(18, 0, 'confiavel', 'Noticia teste', ' ajksd kajs djkabsdk jbakj sdbakjsbd jkabsd bakjsdb', '2014-07-01', '2014-07-30', 'N', 'legal'),
(19, 0, 'confiavel', 'Noticia teste', ' ajksd kajs djkabsdk jbakj sdbakjsbd jkabsd bakjsdb', '2014-07-01', '2014-07-30', 'N', 'legal'),
(20, 0, 'fonte teste', 'Noticia teste', '  ad asd as da sd', '2014-07-01', '2014-07-30', 'N', 'descriçãozinha bem legal'),
(21, 0, 'confiavel', 'Noticia teste finaleira', '  as das hdaosh doahsd ahs diohasiodh dioasio hiasdh ashiohasd a sasd', '2014-07-01', '2014-07-30', 'N', 'descriçãozinha bem legal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contentcategory`
--

CREATE TABLE IF NOT EXISTS `contentcategory` (
  `idContentCategory` int(11) NOT NULL AUTO_INCREMENT,
  `idCategory` int(11) DEFAULT NULL,
  `idContent` int(11) DEFAULT NULL,
  PRIMARY KEY (`idContentCategory`),
  KEY `idContent` (`idContent`),
  KEY `idCategory` (`idCategory`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `contentcategory`
--

INSERT INTO `contentcategory` (`idContentCategory`, `idCategory`, `idContent`) VALUES
(1, 1, 6),
(2, 2, 4),
(3, 3, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contentmedia`
--

CREATE TABLE IF NOT EXISTS `contentmedia` (
  `idContentMedia` int(11) NOT NULL AUTO_INCREMENT,
  `isMain` tinyint(1) DEFAULT NULL,
  `idContent` int(11) DEFAULT NULL,
  `idMedia` int(11) DEFAULT NULL,
  PRIMARY KEY (`idContentMedia`),
  KEY `idContent` (`idContent`),
  KEY `idMedia` (`idMedia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Extraindo dados da tabela `contentmedia`
--

INSERT INTO `contentmedia` (`idContentMedia`, `isMain`, `idContent`, `idMedia`) VALUES
(1, 1, 6, 1),
(2, 1, 8, 2),
(3, 1, 13, 3),
(4, 0, 13, 4),
(5, 1, 14, 5),
(6, 0, 14, 6),
(7, 1, 15, 7),
(8, 0, 15, 8),
(9, 0, 15, 9),
(10, 1, 18, 12),
(11, 1, 19, 14),
(12, 0, 19, 15),
(13, 1, 20, 16),
(15, 1, 21, 18),
(16, 0, 21, 19),
(17, 0, 21, 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `idCourse` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(140) NOT NULL,
  PRIMARY KEY (`idCourse`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `course`
--

INSERT INTO `course` (`idCourse`, `name`) VALUES
(1, 'Técnico em Informática para Internet'),
(2, 'Análise e Desenvolvimento de Sistemas ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `idFile` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `attachment` tinyint(1) DEFAULT NULL,
  `type` char(1) DEFAULT NULL,
  `is_restrict` tinyint(1) DEFAULT NULL,
  `description` varchar(120) NOT NULL,
  PRIMARY KEY (`idFile`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Extraindo dados da tabela `media`
--

INSERT INTO `media` (`idFile`, `name`, `path`, `attachment`, `type`, `is_restrict`, `description`) VALUES
(1, 'prouni', 'uploads/imgs/prouni.jpg', 0, 'I', 0, 'Imagem do prouni'),
(2, 'enem', 'uploads/imgs/enem.jpg', 0, 'I', 0, 'Imagem do enem'),
(3, 'Inverno', 'uploads/imgs/Inverno.jpg', 0, 'I', 0, 'DESCRIPTION'),
(4, 'ambiguidade.pdf', 'uploads/docs/ambiguidade.pdf', 0, 'I', 0, 'DESCRIPTION'),
(5, 'Inverno', 'uploads/imgs/Inverno.jpg', 0, 'I', 0, 'DESCRIPTION'),
(6, 'ambiguidade.pdf', 'uploads/docs/ambiguidade.pdf', 0, 'I', 0, 'DESCRIPTION'),
(7, 'images', 'uploads/imgs/images.jpg', 0, 'I', 0, 'DESCRIPTION'),
(8, '68651-parte2.pdf', 'uploads/docs/68651-parte2.pdf', 0, 'I', 0, 'DESCRIPTION'),
(9, 'Sinfonia No 9 de Beethoven (scherzo).wma', 'uploads/audios/Sinfonia No 9 de Beethoven (scherzo).wma', 0, 'I', 0, 'DESCRIPTION'),
(10, 'Ninféias', 'uploads/imgs/Ninféias.jpg', 0, 'I', 0, 'DESCRIPTION'),
(11, 'images', 'uploads/imgs/images.jpg', 0, 'I', 0, 'DESCRIPTION'),
(12, 'images', 'uploads/imgs/images.jpg', 0, 'I', 0, 'DESCRIPTION'),
(13, 'b2c.mwb', 'uploads/others/b2c.mwb', 0, 'I', 0, 'DESCRIPTION'),
(14, 'images', 'uploads/imgs/images.jpg', 0, 'I', 0, 'DESCRIPTION'),
(15, 'b2c.mwb', 'uploads/others/b2c.mwb', 0, 'I', 0, 'DESCRIPTION'),
(16, 'images', 'uploads/imgs/images.jpg', 0, 'I', 0, 'DESCRIPTION'),
(18, 'Inverno', 'uploads/imgs/Inverno.jpg', 0, 'I', 0, 'DESCRIPTION'),
(19, 'Aula_MVC.pdf', 'uploads/docs/Aula_MVC.pdf', 0, 'I', 0, 'DESCRIPTION'),
(20, '68651-parte2.pdf', 'uploads/docs/68651-parte2.pdf', 0, 'I', 0, 'DESCRIPTION');

-- --------------------------------------------------------

--
-- Estrutura da tabela `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `idProfile` int(11) NOT NULL DEFAULT '0',
  `type` char(1) DEFAULT NULL,
  `name` varchar(120) DEFAULT NULL,
  `photo` varchar(255) NOT NULL,
  `registration` varchar(11) NOT NULL,
  `about` text NOT NULL,
  PRIMARY KEY (`idProfile`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `profile`
--

INSERT INTO `profile` (`idProfile`, `type`, `name`, `photo`, `registration`, `about`) VALUES
(0, 'A', 'Maurício Rosito', '', '', ''),
(1, 'E', 'Pedro Trindade', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `idProfile` int(11) DEFAULT NULL,
  `idCourse` int(11) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `login` varchar(80) DEFAULT NULL,
  `hash` varchar(80) DEFAULT NULL,
  `reminder` varchar(120) DEFAULT NULL,
  `reminderResponse` varchar(120) DEFAULT NULL,
  `canReceiveContent` tinyint(1) NOT NULL,
  PRIMARY KEY (`idUser`),
  KEY `idProfile` (`idProfile`),
  KEY `idCourse` (`idCourse`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`idUser`, `idProfile`, `idCourse`, `email`, `login`, `hash`, `reminder`, `reminderResponse`, `canReceiveContent`) VALUES
(1, 0, NULL, 'admin@admin.com', 'admin', 'admin', 'Qual o nome do meu cão?', 'toto', 0),
(2, 1, 1, 'pedro@trindade.com', 'pedro', 'pedro', 'Qual o nome da sua mãe?', 'Maria', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
