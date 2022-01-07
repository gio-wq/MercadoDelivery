-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 19-Nov-2020 às 22:58
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdmercado`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbclientes`
--

DROP TABLE IF EXISTS `tbclientes`;
CREATE TABLE IF NOT EXISTS `tbclientes` (
  `nome` varchar(255) NOT NULL,
  `email_cliente` varchar(255) NOT NULL,
  `nasc_cliente` date NOT NULL,
  `cpf_cliente` varchar(14) NOT NULL,
  `logra` varchar(20) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `comple` varchar(50) NOT NULL,
  `senha` varchar(8) NOT NULL,
  PRIMARY KEY (`cpf_cliente`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbclientes`
--

INSERT INTO `tbclientes` (`nome`, `email_cliente`, `nasc_cliente`, `cpf_cliente`, `logra`, `cep`, `endereco`, `comple`, `senha`) VALUES
('Giovanna Eduarda Dos Santos de Andrade', 'giovanna.andrade081@hotmail.com', '2002-10-09', '172.310.857-09', 'rua', '20756-110', 'Leopoldina, 49', 'Casa 9', '09102002'),
('Edson Lenine Cruz de Andrade', 'edson.rio2hotmail.com', '1970-09-12', '123.675.780-09', 'travessa', '2123457-6', 'Rosa Maria', 'casa 34', '12345678'),
('Maria Imaculada Da ConceiÃ§Ã£o', 'maria.imc@hotmail.com', '2002-08-07', '138.475.684-66', 'rua', '21347-135', 'de Madureira', '', '23456789'),
('Admnistrador', 'ADM', '2002-10-09', '000.000.000-00', '0', '0', '0', '0', '1001'),
('Garibeu', 'gaga@hotmail.com', '2002-10-08', '123.435.987-26', 'alameda', '90238-888', 'diaz da cruz', '47,casa 7', '70979206'),
('joao Ribeiro', 'jr@htomail.com', '2001-10-08', '124.365.476-84', 'alameda', '23874-619', 'diaz da cruz', 'tuiuiti', '70979206'),
('Maria Regina Alves Barbosa', 'maregininha@hotmail.com', '1080-08-12', '128.973.814-68', 'alameda', '11132-047', 'De MagalhÃ£es', '45, apt 202', '7044780'),
('jopajoajoa', 'joajoa@gmail.com', '1955-05-05', '125.438.156-19', 'alameda', '19805-687', 'vigo solto', '49', '12345678');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcompras`
--

DROP TABLE IF EXISTS `tbcompras`;
CREATE TABLE IF NOT EXISTS `tbcompras` (
  `status` varchar(100) NOT NULL,
  `id_compra` int(11) NOT NULL AUTO_INCREMENT,
  `cpf_cliente` varchar(14) NOT NULL,
  `cpf_entregador` varchar(14) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `qtd_produto` int(11) NOT NULL,
  `total` float NOT NULL,
  PRIMARY KEY (`id_compra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbfuncionarios`
--

DROP TABLE IF EXISTS `tbfuncionarios`;
CREATE TABLE IF NOT EXISTS `tbfuncionarios` (
  `nome_func` varchar(255) NOT NULL,
  `cpf_func` varchar(14) NOT NULL,
  `nasc_func` date NOT NULL,
  `adms_func` date NOT NULL,
  `cargo` varchar(13) NOT NULL,
  `senha_func` varchar(8) NOT NULL,
  `email_func` varchar(100) NOT NULL,
  `cel_func` varchar(14) NOT NULL,
  `id_func` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_func`)
) ENGINE=InnoDB AUTO_INCREMENT=1006 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbfuncionarios`
--

INSERT INTO `tbfuncionarios` (`nome_func`, `cpf_func`, `nasc_func`, `adms_func`, `cargo`, `senha_func`, `email_func`, `cel_func`, `id_func`) VALUES
('joao vieira dos santos', '129.846.343-13', '1998-03-09', '2017-08-09', 'gerente', '808080', 'joajoa@hotmail.com', '(21)93846-6576', 1000),
('Kaique Ramos Vieira', '124.873.146-63', '2001-05-12', '2019-03-21', 'caixa', '8070447', 'kaka@hotmail.com', '(21)93855-4987', 1001),
('Joa roberto', '234.113.514-53', '1980-08-08', '2018-09-09', 'entregador', '80808080', 'jj@hotmail.com', '(21)94385-5555', 1002),
('Juliana Ribeiro MagalhÃ£es', '124.984.577-23', '1980-12-07', '2020-07-06', 'caixa', '50505050', 'jujur@hotmail.com', '(21)95676-8969', 1003),
('Giovanna Andrade', '261.487.878-78', '2002-10-09', '2018-03-12', 'gerente', '09102002', 'giovanna.andrade081@hotmail.com', '(21)99158-6094', 1004),
('Benedita Vieira', '398.246.587-96', '1989-10-05', '2005-06-09', 'caixa', '210996', 'bebe@hotmail.com', '(21)94085-4903', 1005);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbprodutos`
--

DROP TABLE IF EXISTS `tbprodutos`;
CREATE TABLE IF NOT EXISTS `tbprodutos` (
  `nome_prod` varchar(255) NOT NULL,
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `preco_prod` float NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `sub_categoria` varchar(100) NOT NULL,
  `qtd_produto` int(11) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `data_val` date NOT NULL,
  `lote` varchar(100) NOT NULL,
  `url_img` varchar(255) NOT NULL,
  PRIMARY KEY (`id_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbprodutos`
--

INSERT INTO `tbprodutos` (`nome_prod`, `id_produto`, `preco_prod`, `categoria`, `sub_categoria`, `qtd_produto`, `marca`, `data_val`, `lote`, `url_img`) VALUES
('Arroz Branco', 1, 25.99, 'alimentos', 'Cereais, Farinhas e GrÃ£os', 50, 'Tio JoÃ£o', '2021-05-02', '23ed445', 'https://static.carrefour.com.br/medias/sys_master/images/images/hb1/he1/h00/h00/9452863029278.jpg'),
('AÃ§ucar Cristal 1Kg', 2, 2, 'alimentos', 'Cereais, Farinhas e GrÃ£os', 30, 'Uniao', '2021-09-21', '23452', 'https://patiogourmet.com.br/online/api/image/d4df81a59494b29783bb3e52c06a395a?width=376&height=376'),
('FeijÃ£o Preto 1Kg', 3, 6.59, 'alimentos', 'Cereais, Farinhas e GrÃ£os', 80, 'Kikaldo', '2021-03-21', 'as3721', 'https://d26lpennugtm8s.cloudfront.net/stores/829/625/products/feijao-preto-kicaldo-1kg1-413426cdccd6197d9216032107213326-1024-1024.jpg'),
('AÃ§Ãºcar Refinado 1Kg', 4, 2.99, 'alimentos', 'Cereais, Farinhas e GrÃ£os', 30, 'UniÃ£o', '2021-05-21', 'erb45652', 'https://www.widestock.com.br/media/catalog/product/a/c/acucar-refinado-uniao-1kg-fardo-com-10.jpg'),
('Sal Refinado Branco', 5, 3.49, 'alimentos', 'Temperos, Condimentos e Ervas', 50, 'Cisne', '2021-02-21', '43bge876', 'https://www.paodeacucar.com/img/uploads/1/547/458547.jpg'),
('Ã“leo  de Soja 900ml', 6, 7.99, 'alimentos', 'Temperos, Condimentos e Ervas', 35, 'Soya', '2021-05-21', '43bre786', 'https://www.paodeacucar.com/img/uploads/1/281/565281.png'),
('MacarrÃ£o Espaguete 1Kg', 7, 7.2, 'alimentos', 'Cereais, Farinhas e GrÃ£os', 30, 'AmÃ¡lia', '2021-03-21', '32jb786', 'https://www.drogariaminasbrasil.com.br/media/product/5d6/macarrao-santa-amalia-espaguete-1kg-781.jpg'),
('MacarrÃ£o Parafuso 500g', 8, 4.05, 'alimentos', 'Cereais, Farinhas e GrÃ£os', 35, 'Galo de SÃªmola', '2021-08-21', 'sdbf6232', 'https://static.carrefour.com.br/medias/sys_master/images/images/h93/h54/h00/h00/9393706696734.jpg'),
('Molho de Tomate Tradicional 340kg', 9, 1.08, 'alimentos', 'Temperos, Condimentos e Ervas', 50, 'Primor', '2021-03-23', '234brhe', 'https://api.tendaatacado.com.br/fotos/3130_big.jpg'),
('Farinha de Trigo Tradicional 1Kg', 10, 4.69, 'alimentos', 'Cereais, Farinhas e GrÃ£os', 35, 'Dona Benta', '2021-06-05', '2343gw', 'https://static.cdnlive.com.br/uploads/653/produto/15860909761517_zoom.jpeg'),
('Farinha de Mandioca Torrada 500kg', 11, 4.99, 'alimentos', 'Cereais, Farinhas e GrÃ£os', 20, 'Yoki', '2021-04-21', '34vwe22', 'https://www.paodeacucar.com/img/uploads/1/147/581147.png'),
('FubÃ¡ Mimoso 1Kg', 12, 4.55, 'alimentos', 'Cereais, Farinhas e GrÃ£os', 38, 'Yoki', '2021-02-02', '22ee42', 'https://static.paodeacucar.com/img/uploads/1/142/581142.png'),
('CafÃ© em PÃ³ Tradicional 500g', 13, 8.99, 'alimentos', 'Temperos, Condimentos e Ervas', 80, 'PilÃ£o', '2021-08-21', '23rtf45', 'https://www.confianca.com.br/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/3/9/396230.jpg'),
('Achocolatado em PÃ³ 400g', 14, 5.95, 'alimentos', 'LaticÃ­nios', 95, 'Toddy', '2021-06-21', '2dd432', 'https://static.carrefour.com.br/medias/sys_master/images/images/h6f/h17/h00/h00/26959975055390.jpg'),
('Negresco Baunilha 140g', 15, 2.15, 'alimentos', 'LaticÃ­nios', 105, 'NestlÃ©', '2021-04-13', '12cvgr11', 'https://static.carrefour.com.br/medias/sys_master/images/images/h53/hd5/h00/h00/11913905700894.jpg'),
('Biscoito Cream Cracker 400g', 16, 5.29, 'alimentos', 'Padaria', 65, 'Richester', '2021-08-20', 'ewr2312', 'https://superprix.vteximg.com.br/arquivos/ids/175768-600-600/Richester-Superiore-Cream-Cracker-400g-2.png?v=636365203820870000'),
('Biscoito Maizena 200g', 17, 3.9, 'alimentos', 'LaticÃ­nios', 50, 'PiraquÃª', '2021-03-21', '234e237', 'https://a-static.mlcdn.com.br/574x431/biscoito-maizena-piraque-200g/magazineluiza/226712900/c5b90296b65cc99825ce2d8c948d1e0e.jpg'),
('Leite Condensado INtegral 395g', 18, 6.3, 'alimentos', 'LaticÃ­nios', 72, 'ItambÃ©', '2021-05-02', '2wber44', 'https://images-americanas.b2w.io/produtos/01/00/img/1445066/8/1445066838_1GG.jpg'),
('Creme de Leite', 19, 2.59, 'alimentos', 'LaticÃ­nios', 56, 'Italac', '2021-04-22', '2321edfr', 'https://api.tendaatacado.com.br/fotos/1456.jpg'),
('MacarrÃ£o InstantÃ¢neo Picanha 80g', 20, 1.39, 'alimentos', 'Cereais, Farinhas e GrÃ£os', 150, 'Nissin Mioj', '2021-10-15', '24bjh4', 'https://static.cdnlive.com.br/uploads/653/produto/15856597208888_zoom.jpg'),
('Ãgua Mineral Sem GÃ¡s 1,5L', 21, 2.75, 'bebidas', 'Ãgua e Ãgua de coco', 150, 'Minalba', '2024-03-04', '324fr4', 'https://static.carrefour.com.br/medias/sys_master/images/images/hd5/h4c/h00/h00/26541162233886.jpg'),
('Ãgua Mineral com GÃ¡s 375ml', 22, 24.99, 'bebidas', 'Ãgua e Ãgua de coco', 30, 'Voss', '2024-10-21', '234re3', 'https://d3qoj2c6mu9s8x.cloudfront.net/Custom/Content/Products/35/32/35325_agua-mineral-com-gas-voss-voss-375-ml_m1_636776170548734103.jpg'),
('Ãgua de Coco 1l', 23, 7.99, 'bebidas', 'Ãgua e Ãgua de coco', 80, 'Kerococo', '2025-11-17', '23fr35', 'https://www.imigrantesbebidas.com.br/bebida/images/products/full/4720_Agua_de_Coco_Kerococo_1L.jpg'),
('Whisky 1000ml', 24, 206.7, 'bebidas', 'Destilados', 60, 'Jack Daniels', '2042-12-03', '12gvtr', 'https://images-submarino.b2w.io/produtos/01/00/item/5599/2/5599297SZ.jpg'),
('Espumante 750ml', 25, 34.99, 'bebidas', 'Vinhos e Espumantes', 50, 'Salton Moscatel', '2029-12-13', '12fgeq', 'https://www.imigrantesbebidas.com.br/bebida/images/products/full/5719_Espumante_Salton_Moscatel_750_ml.jpg'),
('Vinho Tinto Merlot', 26, 29.3, 'bebidas', 'Vinhos e Espumantes', 40, 'Aurora', '2038-11-10', '234efg', 'https://static.dooca.com.br/cavesdobrasil/product/vinho-tinto-aurora-merlot-15499917396704.png'),
('Refrigerante 2l', 27, 9.9, 'bebidas', 'Refrigerantes', 250, 'Coca-Cola', '2022-11-04', '123wew3', 'https://cd.shoppub.com.br/cenourao/media/cache/75/1a/751a7512c5ccc760e8d45ffd1eb8b616.jpg'),
('Refrigerante GuaranÃ¡ 2l', 28, 5.9, 'bebidas', 'Refrigerantes', 60, 'AntÃ¡rtica', '2033-11-10', '34r543df', 'https://apoioentrega.vteximg.com.br/arquivos/ids/459552/fd5681a0ce02d7c87e22a146007c2042_refrigerante-guarana-antarctica-zero-garrafa-2l---refri-antarctica-2l-pet-guarana-zero---1-un_lett_2.jpg?v=637305879528730000'),
('Ãgua SanitÃ¡ria', 29, 8.89, 'mat_limpeza', 'Limpeza Geral', 60, 'YPÃŠ', '2021-10-03', '234SDF', 'https://castronaves.vteximg.com.br/arquivos/ids/212698-1000-1000/84608_01.jpg?v=637021678241170000'),
('Sabonete 90g', 30, 2.9, 'cuidados', 'Perfumaria', 50, 'Dove', '2024-11-10', '324dfw', 'https://casafiesta.fbitsstatic.net/img/p/sabonete-dove-original-90g-69333/236202.jpg?w=420&h=420&v=no-change'),
('Desodorante Aererosol', 31, 13.4, 'cuidados', 'Perfumaria', 50, 'Rexona Antibacterial Invisible Masculino', '2022-08-09', '355aab', 'https://www.drogariaminasbrasil.com.br/media/product/4e7/desodorante-aerosol-rexona-antibacterial-invisible-masculino-90g-b6d.jpg'),
('Creme Dental 90g', 32, 3.49, 'cuidados', 'Perfumaria', 80, 'Colgate Tripla AÃ§Ã£o Menta Original', '2022-10-05', 'ss34jh', 'https://drogariasp.vteximg.com.br/arquivos/ids/321419-500-500/Creme-Dental-Colgate-90g-Tripla-Acao-Drogaria-SP-27537.jpg?v=636753789240230000'),
('Absorvente Noturno c/ Abas', 33, 13.8, 'cuidados', 'Perfumaria', 50, 'SempreLivre', '2021-08-31', 'd46g8', 'https://a-static.mlcdn.com.br/618x463/sempre-livre-suave-absorventes-noturno-c-abas-c-8/docepresenca2/6716786876/61cffad5fdb71e1a81f6048ff196fa4d.jpg'),
('Salgadinhos 110g', 34, 6.99, 'alimentos', 'Cereais, Farinhas e GrÃ£os', 100, 'Doritos Queijo Nacho', '2021-02-22', '11bsw8', 'https://www.drogariaminasbrasil.com.br/media/catalog/product/3/4/34012_1.jpg'),
('Refrigerante Lata 350ml', 35, 2.96, 'bebidas', 'Refrigerantes', 80, 'Sprite', '2021-03-21', 'qf45s', 'https://casafiesta.fbitsstatic.net/img/p/refrigerante-sprite-lata-350ml-67111/233979.jpg?w=420&h=420&v=no-change'),
('Detergente Liquido CÃ´co 500ml', 36, 3.22, 'mat_limpeza', 'SabÃ£o e Detergentes', 95, 'YPÃŠ', '2023-03-20', '12ge62', 'https://imageswscdn.wslojas.com.br/files/962/MED_detergente-liquido-ype-cco-com-500ml-289114.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
