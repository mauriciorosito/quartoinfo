-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 03/11/2014 às 11h13min
-- Versão do Servidor: 5.5.21
-- Versão do PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `quartoInfo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `href` varchar(200) NOT NULL,
  `src` varchar(200) NOT NULL,
  `alt` varchar(120) NOT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Extraindo dados da tabela `banners`
--

INSERT INTO `banners` (`id`, `title`, `description`, `href`, `src`, `alt`, `type`) VALUES
(12, 'Banner', 'Banner1', 'http://192.168.3.25/quartoInfo/views/lists/home.list.php', '7de45cad881b412905c0c6a8d7c5e9ab.jpg', 'banner por-do-sol', 'banner1'),
(14, 'lorem', 'ipsulum', 'dolor', 'f887b670944a77b101615ff3fea8c437.jpg', 'sit', 'amet'),
(15, 'ground', 'ground', 'ground', '518aac5224d78c9813ad3dd119a41e37.jpg', 'ground', 'trouble, trouble, tr'),
(16, 'teste', 'iuhuihuih', 'iuhuhuh', 'e70e68c60e378f144d1b70a3cc663dd2.jpg', 'poir', 'poires'),
(18, 'ground', 'ground', 'ground', '756c23880a7bb916df076ac107d1be5d.jpg', 'ground', 'trouble, trouble, tr'),
(19, '46utyu', 'tutrurtu', 'rtu', '1dd689a78a7125c441226830a9708a58.jpg', 'ryturtu', 'urtyutru'),
(20, 'rtyutrutyu', 'tryutryu', 'tryurturtu', '', 'gdfhghdfh', 'dfhfhf'),
(25, 'cbcjjghjfgj', 'fjgfjfghjfg', 'jgfjghj', '', 'cncbcvncvn', 'cvbncvncn'),
(26, 'teste ', 'com', 'paginação', '666a646354cba64189258719484cdfb3.jpg', 'texto alternativo', 'oi tudobom?'),
(27, 'Boa tarde', 'boatarde', 'boatarde.php', '628b389215bd15ec363141ef2edba9c5.jpg', 'Um texto de boa tarde', 'oi tudobom?'),
(28, 'Boa tarde', 'boatarde', 'boatarde.php', '9f7c3f73fcdb97e3916d0acee39441d4.jpg', 'Um texto de boa tarde', 'oi tudobom?'),
(29, '23523523', '5235235', '235235235', 'defb789edbb2678b4e9e57fa3c6c2c41.jpg', '235235', '235235'),
(30, '5345234', '523452345', '23452345', 'e0e3392b76bdc3a6c3297af65ad277cd.jpg', '252345', '23452345');

-- --------------------------------------------------------

--
-- Estrutura da tabela `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `idCategory` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `type` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idCategory`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Extraindo dados da tabela `category`
--

INSERT INTO `category` (`idCategory`, `name`, `type`) VALUES
(48, 'B', 'Eventos'),
(58, 'A', 'Notícia'),
(59, 'C', 'Extensão'),
(60, 'D', 'Pesquisa'),
(61, 'E', 'Extensão'),
(62, 'F', 'Eventos'),
(63, 'G', 'Pesquisa'),
(64, 'Z', 'Extensão'),
(66, 'ffgf', 'Notícia'),
(67, 'gfgfgf', 'Notícia');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Extraindo dados da tabela `content`
--

INSERT INTO `content` (`idContent`, `publisher`, `source`, `title`, `text`, `postDate`, `expirationDate`, `type`, `description`) VALUES
(5, 1, '', 'Aberto processo de seleção simplificado para professor substituto de Programação', 'O Câmpus Bento Gonçalves do IFRS, publica Edital nº 021/2014 de Processo Seletivo Simplificado para contratação de professor substituto de Programação.\r\n\r\nO edital dispõe de 1 vaga para docentes com títulação mínima de Ciências da Computação. As inscrições podem ser feitas entre 22 de abril e 9 de maio de 2014.', '2014-06-11', '2014-07-29', 'O', 'Inscrições encerram dia 9 de maio. '),
(6, 1, '', 'Visita de professor estrangeiro', 'O professor americano Richard Snyder da Universidade da Califórnia da cidade de Davis - University of California (UCDavis), visitou nesta segunda-feira, 28 de abril de 2014, o Câmpus Bento Gonçalves do Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Sul (IFRS). No Brasil desde a última sexta, o professor participou de reuniões e esteve com o Diretor de Pesquisa e Inovação, Rodrigo Monteiro, conhecendo a estrutura dos laboratórios de informática do Câmpus.', '2014-04-30', '2014-07-15', 'N', 'As boas-vindas à Instituição foram dadas pelo Diretor-Geral, Luciano Manfroi'),
(8, 1, '', 'Visita de professor estrangeiro2', 'O professor americano Richard Snyder da Universidade da Califórnia da cidade de Davis - University of California (UCDavis), visitou nesta segunda-feira, 28 de abril de 2014, o Câmpus Bento Gonçalves do Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Sul (IFRS). No Brasil desde a última sexta, o professor participou de reuniões e esteve com o Diretor de Pesquisa e Inovação, Rodrigo Monteiro, conhecendo a estrutura dos laboratórios de informática do Câmpus.', '2014-04-30', '2014-07-03', 'N', 'As boas-vindas à Instituição foram dadas pelo Diretor-Geral, Luciano Manfroi'),
(9, 1, '', 'Visita de professor estrangeiro3', 'O professor americano Richard Snyder da Universidade da Califórnia da cidade de Davis - University of California (UCDavis), visitou nesta segunda-feira, 28 de abril de 2014, o Câmpus Bento Gonçalves do Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Sul (IFRS). No Brasil desde a última sexta, o professor participou de reuniões e esteve com o Diretor de Pesquisa e Inovação, Rodrigo Monteiro, conhecendo a estrutura dos laboratórios de informática do Câmpus.', '2014-04-30', '2014-07-03', 'N', 'As boas-vindas à Instituição foram dadas pelo Diretor-Geral, Luciano Manfroi'),
(10, 1, '', 'Visita de professor estrangeiro4', 'O professor americano Richard Snyder da Universidade da Califórnia da cidade de Davis - University of California (UCDavis), visitou nesta segunda-feira, 28 de abril de 2014, o Câmpus Bento Gonçalves do Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Sul (IFRS). No Brasil desde a última sexta, o professor participou de reuniões e esteve com o Diretor de Pesquisa e Inovação, Rodrigo Monteiro, conhecendo a estrutura dos laboratórios de informática do Câmpus.', '2014-04-30', '2014-07-03', 'N', 'As boas-vindas à Instituição foram dadas pelo Diretor-Geral, Luciano Manfroi'),
(11, 0, '', 'Visita de professor estrangeiro5', 'O professor americano Richard Snyder da Universidade da Califórnia da cidade de Davis - University of California (UCDavis), visitou nesta segunda-feira, 28 de abril de 2014, o Câmpus Bento Gonçalves do Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Sul (IFRS). No Brasil desde a última sexta, o professor participou de reuniões e esteve com o Diretor de Pesquisa e Inovação, Rodrigo Monteiro, conhecendo a estrutura dos laboratórios de informática do Câmpus.', '0000-00-00', '0000-00-00', 'N', 'As boas-vindas à Instituição foram dadas pelo Diretor-Geral, Luciano Manfroi'),
(12, 0, 'fonte teste', 'Noticia teste', 'teste legal uaheuiha uihw iuhaiu ehaiuh eiuahwe iahu iuheaui heuiah weiuah iuhawehai uehaui heuiahweuihaeiwuhauiw eh', '0000-00-00', '0000-00-00', 'N', 'descriçãozinha bem legal'),
(13, 0, 'fonte teste', 'Noticia teste', 'teste legal uaheuiha uihw iuhaiu ehaiuh eiuahwe iahu iuheaui heuiah weiuah iuhawehai uehaui heuiahweuihaeiwuhauiw eh', '0000-00-00', '0000-00-00', 'N', 'descriçãozinha bem legal'),
(14, 0, 'fonte teste', 'Noticia teste', 'teste legal uaheuiha uihw iuhaiu ehaiuh eiuahwe iahu iuheaui heuiah weiuah iuhawehai uehaui heuiahweuihaeiwuhauiw eh', '0000-00-00', '0000-00-00', 'N', 'descriçãozinha bem legal'),
(15, 0, 'fonte teste', 'Noticia teste', 'asfha bgiaUDAUBG DIUAB SDIUABSIU DBAIUSB DUIABS D', '2014-07-01', '2014-08-30', 'N', 'descriçãozinha bem legal'),
(16, 0, 'fonte confiável', 'Noticia hoje', '  Vamos testar ... testando blabla blabla   Vamos testar ... testando blabla blabla   Vamos testar ... testando blabla blabla   Vamos testar ... testando blabla blabla   Vamos testar ... testando blabla blabla   Vamos testar ... testando blabla blabla   Vamos testar ... testando blabla blabla   Vamos testar ... testando blabla blabla   Vamos testar ... testando blabla blabla   Vamos testar ... testando blabla blabla   Vamos testar ... testando blabla blabla   Vamos testar ... testando blabla blabla   Vamos testar ... testando blabla blabla   Vamos testar ... testando blabla blabla ', '2014-07-01', '2014-07-30', 'N', 'descrição de hoje'),
(17, 0, 'confiavel', 'Noticia teste', 'ajksd kajs djkabsdk jbakj sdbakjsbd jkabsd bakjsdb', '2000-03-03', '2000-03-03', 'N', 'legal'),
(18, 0, 'confiavel', 'Noticia teste', ' ajksd kajs djkabsdk jbakj sdbakjsbd jkabsd bakjsdb', '2014-07-01', '2014-07-30', 'N', 'legal'),
(19, 0, 'confiavel', 'Noticia teste', ' ajksd kajs djkabsdk jbakj sdbakjsbd jkabsd bakjsdb', '2014-07-01', '2014-07-30', 'N', 'legal'),
(20, 0, 'fonte teste', 'Noticia teste', '  ad asd as da sd', '2014-07-01', '2014-07-30', 'N', 'descriçãozinha bem legal'),
(21, 0, 'confiavel', 'Noticia teste finaleira', '  as das hdaosh doahsd ahs diohasiodh dioasio hiasdh ashiohasd a sasd', '2014-07-01', '2014-07-30', 'N', 'descriçãozinha bem legal'),
(22, 0, '', '', '', '0000-00-00', '0000-00-00', 'N', ''),
(23, 0, '', '', '', '0000-00-00', '0000-00-00', '', ''),
(24, 0, '', '', '', '0000-00-00', '0000-00-00', 'N', ''),
(25, 0, '', '', '', '0000-00-00', '0000-00-00', '', ''),
(26, 0, '', 'iuguyvgiuguigio', 'jkghjbguigbioguigiugui<br>', '0000-00-00', '0000-00-00', '', ''),
(27, 0, '', '', '', '0000-00-00', '0000-00-00', '', ''),
(32, 0, '', 'hghgf', 'gdsgzsdgsdf<br>', '0000-00-00', '0000-00-00', 'P', ''),
(34, 0, '', 'ihfuisdhuifhuifshduifshdui', '', '0000-00-00', '0000-00-00', '', ''),
(35, 0, '', 'hgfhhhgfhgf', '', '0000-00-00', '0000-00-00', '', ''),
(36, 0, '', 'Teste', 'ASUHAUS', '0000-00-00', '0000-00-00', 'E', 'Testando'),
(38, 0, '', '?????', 'LOL', '0000-00-00', '0000-00-00', 'P', 'Testandoooo'),
(39, 0, '', 'Oi', 'Sem midia', '0000-00-00', '0000-00-00', 'P', ''),
(41, 0, '', 'DASDASDASDASD213123', '413423FDSAF234123DS<br>', '0000-00-00', '0000-00-00', 'P', 'DASF341234FASDFASD'),
(42, 0, '', 'FASDFSDF', 'DFASDFASDFADFS<br>', '0000-00-00', '0000-00-00', 'P', 'SADFSFDSDFSA'),
(44, 0, '', 'DASDASD', 'DASDASDASDAS<br>', '0000-00-00', '0000-00-00', 'P', 'ASDASDASDAS'),
(45, 0, '', 'sdasdasdasdasdasdasd', 'dasdasdasdasdasdasdasdasdas<br>', '0000-00-00', '0000-00-00', 'P', 'asdasdasdasdasdsadasdas'),
(46, 0, '', 'dasdasdasdas', 'asdasdasdasdas<br>', '0000-00-00', '0000-00-00', 'P', 'dsdasdasdasd'),
(47, 0, '', 'dsadasdasdasdasdas3231', '31231231231231231231231<br>', '0000-00-00', '0000-00-00', 'P', '2312312312312312'),
(48, 0, '', 'dasdasdasdasdasdasdasdasdasd', 'dasdasdasdas<br>', '0000-00-00', '0000-00-00', 'P', 'asdsadasdas'),
(49, 0, '', 'dasdasdasdasdasdasdasdasdasd', 'dasdasdasdas<br>', '0000-00-00', '0000-00-00', 'P', 'asdsadasdas'),
(50, 0, '', 'dasdasdasdasdasdasdasdasdasd', 'dasdasdasdas<br>', '0000-00-00', '0000-00-00', 'P', 'asdsadasdas'),
(51, 0, '', 'dasdasdasda', 'asdasdasdasdasdas<br>', '0000-00-00', '0000-00-00', 'P', 'dasdasdasdasdasdasdasd'),
(52, 0, '', 'dsdasddasxczz\\xz\\xz\\x', 'xz\\xz\\xz\\xz\\xz\\xz\\xz\\xz\\xz\\xz\\xz\\xz\\xz\\xz\\<br>', '0000-00-00', '0000-00-00', 'P', 'xz\\x\\zx\\zxz\\x\\zxz\\xz\\xz\\xz\\xz\\'),
(53, 0, '', 'dasdas123123', 'dasdas<br>', '0000-00-00', '0000-00-00', 'P', '312312'),
(56, 0, '', 'Oi', '<u>OIIIIIIII</u>', '0000-00-00', '0000-00-00', 'P', 'oi oi oi oi '),
(57, 0, '', 'Oi', '<u>OIIIIIIII</u>', '0000-00-00', '0000-00-00', 'P', 'oi oi oi oi '),
(58, 0, '', 'Maoe', 'lala', '0000-00-00', '0000-00-00', 'P', 'Pagina nova'),
(59, 0, '', 'Oi', '<b><i><u>Oiii</u></i></b>', '0000-00-00', '0000-00-00', 'P', 'oioioioio'),
(60, 0, '', 'Muada', 'lala', '0000-00-00', '0000-00-00', 'P', 'Pagina mudada'),
(61, 0, '', 'asdasdasd', 'dasdasdasdasdas<br>', '0000-00-00', '0000-00-00', 'P', 'dasdasdasd'),
(62, 0, '', 'dasdasdasd', 'sdasdasdasdasdas<br>', '0000-00-00', '0000-00-00', 'P', 'dasdasdasd'),
(63, 0, '', 'Pagina teste', 'asdasdasd', '0000-00-00', '0000-00-00', 'P', 'Dese'),
(65, 0, '', 'Câmpus Bento Gonçalves comemora 55º aniversário com lançamento de revista', 'Ocorreu ontem, dia 22 de outubro, no hall da Biblioteca Firmino Splendor, o lançamento da revista comemorativa de aniversário de 55 anos do Câmpus Bento Gonçalves do Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Sul (IFRS). Estiveram presentes, além do Diretor-Geral da instituição, Luciano Manfroi, e do Pró-Reitor de Ensino da instituição, Amilton de Moura Figueiredo, que estava representando a reitora do IFRS, o Prefeito de Bento Gonçalves, Guilherme Pasin, os secretários de Educação e de Agricultura de Bento Gonçalves, Iraci Luchese Vasques e Thompssom Behur Didoné, o Presidente da Comissão de Educação da Câmara de Bento Gonçalves, vereador Márcio Pilotti, e o coordenador da 16ª Coordenadoria Regional de Ensino (CRE), Enio Cecagno.Luciano Manfroi relembrou uma parte da trajetória do Câmpus Bento Gonçalves e também parabenizou todos os professores e técnicos da instituição, que para ele ?foram de vital importância para agregar o reconhecimento que a instituição possui hoje?. O Prefeito de Bento Gonçalves, Guilherme Pasin, também destacou a importância da instituição na região em que ela está inserida, principalmente na formação de técnicos e tecnólogos em Enologia, um dos pilares da economia bento-gonçalvense.<span>Na ocasião, além da entrega da revista comemorativa aos presentes, foi exibido o novo vídeo institucional do câmpus. Hoje, o Câmpus Bento Gonçalves conta com três cursos técnicos, oito cursos superiores e duas especializações, além das atividades do Proeja e do Pronatec..A comemoração faz parte da 3º Semana de Educação, Ciência e Cultura que ocorre entre os dias 21 a 23 de outubro. Após a cerimônia foi servido um coquetel para os presentes, que puderam acompanhar a apresentação da banda <i>The Bentles.</i><br><br></span><b>Sobre o Câmpus Bento Gonçalves</b><span>Fundado em <u>22 de outubro de 1959 </u>como Escola de Viticultura e Enologia de Bento Gonçalves, hoje a instituição é um dos 17 câmpus do IFRS. Situado na avenida Osvaldo Aranha, no bairro Juventude da Enologia, compreende uma área de 76 mil m² e também conta com uma estação experimental, localizada no distrito de Tuiuty, que possui pouco mais de 76 hectares. São oferecidos cursos <br></span><br><ol><li>médio-técnicos,&nbsp;</li><li>superiores e&nbsp;</li><li>especializações,&nbsp;</li><li>além de cursos Proeja e Pronatec.&nbsp;</li></ol><br><br>Hoje a escola conta com 89 professores, 102 técnicos administrativos, 14 estagiários e 1174 alunos.<br>', '0000-00-00', '0000-00-00', 'P', 'Descrição'),
(67, 0, '', '', '', '0000-00-00', '2010-10-10', 'N', '54,3533'),
(68, 0, 'gd', 'gd', '', '2010-10-10', '2010-10-10', 'P', 'dyt');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

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
(17, 0, 21, 20),
(21, 0, 32, 27),
(24, 0, 36, 30),
(26, 0, 38, 32),
(27, 0, 39, 33),
(29, 0, 41, 35),
(30, 1, 45, 36),
(31, 0, 46, 37),
(32, 0, 47, 38),
(33, 1, 52, 39),
(34, 0, 52, 40),
(35, 1, 53, 41),
(36, 0, 53, 42),
(38, 0, 56, 44),
(39, 1, 57, 45),
(40, 0, 57, 46),
(41, 1, 58, 47),
(42, 1, 59, 48),
(43, 0, 59, 49),
(44, 1, 60, 50);

-- --------------------------------------------------------

--
-- Estrutura da tabela `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `idCourse` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(140) NOT NULL,
  `alias` text NOT NULL,
  `description` text NOT NULL,
  `type` char(1) NOT NULL,
  PRIMARY KEY (`idCourse`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Extraindo dados da tabela `course`
--

INSERT INTO `course` (`idCourse`, `name`, `alias`, `description`, `type`) VALUES
(12, 'Técnico em Informática para Internet', 'tecInfo', 'Descrição do curso Técnico em Informática para Internet.', 'T'),
(16, 'Análise e Desenvolvimento de Sistemas', 'ADS', 'Descrição do curso Superior de&nbsp;Análise e Desenvolvimento de Sistemas.', 'S'),
(23, 'wwwww', 'ghggghgh', '', 'S'),
(24, 's z', 'v', 'fg', 'T'),
(25, 'bmh', 'mhg', '', 'S'),
(26, 't', 'yut', '', 'E'),
(27, 'xv', 'xcv', '', 'E'),
(28, 'eef', 'dfgfgsdg', 'aoih ahsdh asdh ash dkjahsdjkha jksh d', 'T');

-- --------------------------------------------------------

--
-- Estrutura da tabela `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `idLink` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`idLink`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `links`
--

INSERT INTO `links` (`idLink`, `title`, `description`, `url`) VALUES
(1, 'Salário', 'Saladas', 'http://www.guiabento.com.br/estabelecimentos/5/2389/restaurante-manjericao');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Extraindo dados da tabela `media`
--

INSERT INTO `media` (`idFile`, `name`, `path`, `attachment`, `type`, `is_restrict`, `description`) VALUES
(1, 'prouni', 'uploads/imgs/prouni.jpg', 0, 'P', 0, 'Imagem do prouni'),
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
(20, '68651-parte2.pdf', 'uploads/docs/68651-parte2.pdf', 0, 'I', 0, 'DESCRIPTION'),
(21, '', 'uploads/others/', 0, 'I', 0, 'DESCRIPTION'),
(22, '', 'uploads/others/', 0, 'I', 0, 'DESCRIPTION'),
(23, '', 'uploads/others/', 0, 'I', 0, 'DESCRIPTION'),
(24, '', 'uploads/others/', 0, 'I', 0, 'DESCRIPTION'),
(25, '', 'uploads/others/', 0, 'I', 0, 'DESCRIPTION'),
(26, '', 'uploads/others/', 0, 'I', 0, 'DESCRIPTION'),
(27, '', 'uploads/others/', 0, 'I', 0, 'DESCRIPTION'),
(28, 'Ninféias', 'uploads/imgs/Ninféias.jpg', 0, 'I', 0, 'DESCRIPTION'),
(29, 'montanhas  paint.bmp', 'uploads/imgs/montanhas  paint.bmp', 0, 'I', 0, 'DESCRIPTION'),
(30, '', 'uploads/others/', 0, 'I', 0, 'DESCRIPTION'),
(31, '', 'uploads/others/', 0, 'I', 0, 'DESCRIPTION'),
(32, '', 'uploads/others/', 0, 'I', 0, 'DESCRIPTION'),
(33, '', 'uploads/others/', 0, 'I', 0, 'DESCRIPTION'),
(34, '', 'uploads/others/', 0, 'I', 0, 'DESCRIPTION'),
(35, '', 'uploads/others/', 0, 'I', 0, 'DESCRIPTION'),
(36, 'Ninféias', 'uploads/imgs/Ninféias.jpg', 0, 'I', 0, 'DESCRIPTION'),
(37, '', 'uploads/others/', 0, 'I', 0, 'DESCRIPTION'),
(38, '', 'uploads/others/', 0, 'I', 0, 'DESCRIPTION'),
(39, 'Pôr-do-sol', 'uploads/imgs/Pôr-do-sol.jpg', 0, 'I', 0, 'DESCRIPTION'),
(40, 'Montanhas azuis.jpg', 'uploads/imgs/Montanhas azuis.jpg', 0, 'I', 0, 'DESCRIPTION'),
(41, 'Inverno', 'uploads/imgs/Inverno.jpg', 0, 'I', 0, 'DESCRIPTION'),
(42, 'enem.jpg', 'uploads/imgs/enem.jpg', 0, 'I', 0, 'DESCRIPTION'),
(43, 'Inverno', 'uploads/imgs/Inverno.jpg', 0, 'I', 0, 'DESCRIPTION'),
(44, '', 'uploads/others/', 0, 'I', 0, 'DESCRIPTION'),
(45, 'Montanhas azuis', 'uploads/imgs/Montanhas azuis.jpg', 0, 'I', 0, 'DESCRIPTION'),
(46, '', 'uploads/others/', 0, 'I', 0, 'DESCRIPTION'),
(47, 'Ninféias', 'uploads/imgs/Ninféias.jpg', 0, 'I', 0, 'DESCRIPTION'),
(48, 'Inverno', 'uploads/imgs/Inverno.jpg', 0, 'I', 0, 'DESCRIPTION'),
(49, '', 'uploads/others/', 0, 'I', 0, 'DESCRIPTION'),
(50, 'Ninféias', 'uploads/imgs/Ninféias.jpg', 0, 'I', 0, 'DESCRIPTION');

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `idMenu` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `localization` varchar(1) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`idMenu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Extraindo dados da tabela `menu`
--

INSERT INTO `menu` (`idMenu`, `title`, `localization`, `description`) VALUES
(18, 'MenuMa', 'E', ' fafafa'),
(19, 'Escolinhadoflaumba', 'L', ' Menu escolinha do flaumba'),
(23, '', 'E', ' '),
(24, 'Teste', 'E', 'Teste ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `idProfile` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `description` text NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idProfile`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Extraindo dados da tabela `profile`
--

INSERT INTO `profile` (`idProfile`, `name`, `description`, `is_admin`) VALUES
(2, 'Não deletar - aluno', 'Não deletar - aluno', 0),
(3, 'Admin', 'Admin', 1),
(35, 'Teste', 'Teste', 0),
(38, 'lolita', 'ppka do malasas', 0),
(39, 'aushduhasd', 'teste', 1),
(40, '64564', '6456', 0),
(41, 'teste', 'teste', 0),
(42, 'pedreiro', 'assenta um tijolo como ninguém. e no tijolo.', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `profilecategory`
--

CREATE TABLE IF NOT EXISTS `profilecategory` (
  `idProfileCategory` int(11) NOT NULL AUTO_INCREMENT,
  `idProfile` int(11) NOT NULL,
  `idCategory` int(11) NOT NULL,
  `permType` enum('E','C','V','D') NOT NULL,
  PRIMARY KEY (`idProfileCategory`),
  KEY `idProfile` (`idProfile`),
  KEY `idCategory` (`idCategory`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=113 ;

--
-- Extraindo dados da tabela `profilecategory`
--

INSERT INTO `profilecategory` (`idProfileCategory`, `idProfile`, `idCategory`, `permType`) VALUES
(109, 38, 48, 'V'),
(110, 40, 48, 'E'),
(111, 41, 48, 'V'),
(112, 42, 48, 'D');

-- --------------------------------------------------------

--
-- Estrutura da tabela `secao`
--

CREATE TABLE IF NOT EXISTS `secao` (
  `idsecao` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `descricao` longtext NOT NULL,
  PRIMARY KEY (`idsecao`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Extraindo dados da tabela `secao`
--

INSERT INTO `secao` (`idsecao`, `titulo`, `alias`, `descricao`) VALUES
(10, 'Menu Lateral 2', 'Esporadico 2', 'Menu lateral que será acrescido em algumas <b>páginas.</b>'),
(11, 'Menu Superio', 'geral', 'Menu que será inserido no topo de todas as páginas da categoria geral.'),
(13, 'Nome deteste', 'teste', ''),
(14, 'teste', 'teste', 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `submenu`
--

CREATE TABLE IF NOT EXISTS `submenu` (
  `idSubMenu` int(11) NOT NULL AUTO_INCREMENT,
  `position` int(11) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `idMenu` int(11) DEFAULT NULL,
  `idCategory` int(11) DEFAULT NULL,
  `idPage` int(11) DEFAULT NULL,
  PRIMARY KEY (`idSubMenu`),
  KEY `idMenu` (`idMenu`),
  KEY `idPage` (`idPage`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

--
-- Extraindo dados da tabela `submenu`
--

INSERT INTO `submenu` (`idSubMenu`, `position`, `url`, `title`, `type`, `description`, `idMenu`, `idCategory`, `idPage`) VALUES
(38, 1, '', 'Menu4', 'semlink', 'POSICAO 3                                ', 18, 0, 0),
(39, 3, '', 'MenuMaicom', 'semlink', 'OPO                                                                                                                                                                                                ', 18, 0, 0),
(43, 2, '', 'MENUUUU', 'page', 'ALGO                                                ', 18, 0, 41),
(45, 2, '', 'Escolinha002', 'semlink', 'Escolinha--2', 19, 0, NULL),
(46, 1, '', 'Opatioloco', 'semlink', 'redqqas                   ', 19, 0, NULL),
(50, 3, '', 'VACALOCA', 'semlink', 'teetete', 19, 0, NULL),
(52, 1, '', '', 'semlink', '                                ', 24, 0, NULL),
(53, 2, 'teste.php', 'Teste', 'link', 'teste                                ', 24, 0, NULL);

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
  `name` varchar(120) NOT NULL,
  `registration` varchar(11) NOT NULL,
  `about` text NOT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `login` (`login`),
  KEY `idProfile` (`idProfile`),
  KEY `idCourse` (`idCourse`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`idUser`, `idProfile`, `idCourse`, `email`, `login`, `hash`, `reminder`, `reminderResponse`, `canReceiveContent`, `name`, `registration`, `about`) VALUES
(1, 3, NULL, 'admin@admin.com', 'admin', 'admin', 'Qual o nome do meu cão?', 'toto', 0, 'administrador', '', ''),
(18, 2, 16, 'ivan@bucco.com', 'gaiteiro', '', 'É pra excluir?', 'NÃO', 0, 'Ivan Bucco', '20111120220', 'Não excluir, por favor'),
(19, 2, 16, 'kathy@kathy.com', 'kathy', '123456', 'teste', 'teste', 0, 'Kathiane Bombassaro', '20111120181', 'teste');

-- --------------------------------------------------------

--
-- Estrutura stand-in para visualizar `userSearch`
--
CREATE TABLE IF NOT EXISTS `userSearch` (
`idUser` int(11)
,`name` varchar(120)
,`idCourse` int(11)
,`email` varchar(120)
,`about` text
,`registration` varchar(11)
,`courseName` varchar(140)
);
-- --------------------------------------------------------

--
-- Estrutura para visualizar `userSearch`
--
DROP TABLE IF EXISTS `userSearch`;

CREATE ALGORITHM=UNDEFINED DEFINER=`quartoInfo`@`localhost` SQL SECURITY DEFINER VIEW `userSearch` AS select `u`.`idUser` AS `idUser`,`u`.`name` AS `name`,`u`.`idCourse` AS `idCourse`,`u`.`email` AS `email`,`u`.`about` AS `about`,`u`.`registration` AS `registration`,`c`.`name` AS `courseName` from ((`user` `u` join `course` `c` on((`c`.`idCourse` = `u`.`idCourse`))) join `profile` `p` on((`p`.`idProfile` = `u`.`idProfile`))) where (`p`.`is_admin` = 0);

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `profilecategory`
--
ALTER TABLE `profilecategory`
  ADD CONSTRAINT `profilecategory_ibfk_8` FOREIGN KEY (`idCategory`) REFERENCES `category` (`idCategory`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `profilecategory_ibfk_7` FOREIGN KEY (`idProfile`) REFERENCES `profile` (`idProfile`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `submenu`
--
ALTER TABLE `submenu`
  ADD CONSTRAINT `submenu_ibfk_3` FOREIGN KEY (`idMenu`) REFERENCES `menu` (`idMenu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
