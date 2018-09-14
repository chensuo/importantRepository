/*
Navicat MySQL Data Transfer

Source Server         : H5
Source Server Version : 50522
Source Host           : 127.0.0.1:3306
Source Database       : librarydb

Target Server Type    : MYSQL
Target Server Version : 50522
File Encoding         : 65001

Date: 2018-02-02 11:28:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for adverts
-- ----------------------------
DROP TABLE IF EXISTS `adverts`;
CREATE TABLE `adverts` (
  `Id` varchar(36) NOT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Link` varchar(255) DEFAULT NULL,
  `Priority` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of adverts
-- ----------------------------
INSERT INTO `adverts` VALUES ('716ec353-f47b-11e7-84b2-54e1adda4205', '11c5e122-f47a-11e7-84b2-54e1adda4205.jpg', '', '99');
INSERT INTO `adverts` VALUES ('7171114f-f47b-11e7-84b2-54e1adda4205', '0c01f045-f47a-11e7-84b2-54e1adda4205.jpg', '', '98');
INSERT INTO `adverts` VALUES ('717298cd-f47b-11e7-84b2-54e1adda4205', '16b3c0ec-f47a-11e7-84b2-54e1adda4205.jpg', '', '97');
INSERT INTO `adverts` VALUES ('71745b27-f47b-11e7-84b2-54e1adda4205', '1cbd3856-f47a-11e7-84b2-54e1adda4205.jpg', '', '96');

-- ----------------------------
-- Table structure for authors
-- ----------------------------
DROP TABLE IF EXISTS `authors`;
CREATE TABLE `authors` (
  `Id` varchar(36) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Pinyin` varchar(50) NOT NULL,
  `Header` varchar(255) DEFAULT NULL,
  `Introduce` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of authors
-- ----------------------------
INSERT INTO `authors` VALUES ('0574d2b8-637e-11e7-910c-14dda97c3051', '冯埃里希曼施泰因', 'FALXMSTY', null, '冯·埃里希·曼施泰因,德国陆军元帅,出身于军官世家。在第二次世界大战中，曼施泰因积极参与制订和实施希特勒的侵略战争计划，先后任集团军群参谋长、集团军司令、集团军群司令。1944年3月，因在作战指导上与希特勒发生分歧被解职；1945年5月被英军俘虏；1949年12月被战胜国判处18年徒刑，1953年因病获释。战后，被联邦德国阿登纳政府聘为顾问，参与组建联邦国防军。1973年6月病逝，终年86岁。\r\n\r\n　　戴耀先 中国人民解放军军事科学院研究员、大校，从业33年，一直从事德国军事研究，论著、译著十余种。主要有：《论德国军事》《德意志军事思想研究》《德国总参谋部》《总体战》《第二次世界大战大事记》等。');
INSERT INTO `authors` VALUES ('0836a269-63a2-11e7-910c-14dda97c3051', '吕思勉', 'LSM', null, '吕思勉（1884～1957），字诚之。出身于江苏常州一个书香门第，少时受教于父母师友，15岁入县学，16岁自学古史典籍。早年执教于常州溪山小学堂、常州府中学堂，学生中有后来成为文史大家的钱穆、赵元任、黄永年等人。1926年后长期任上海光华大学国文系、历史系教授兼系主任，1951年院系合并后任华东师范大学教授。\r\n　　吕思勉先生读书广博，治学严谨，考据功底精深，注重综合研究，讲究融会贯通，一生著作等身，有《经子解题》、《理学纲要》、《宋代文学》、《先秦学术概论》、《中国民族史》、《中国制度史》、《吕著史学与史籍》、《文字学四种》、《白话本国史》、《吕著中国通史》、《先秦史》、《秦汉史》、《两晋南北朝史》、《隋唐五代史》、《吕著中国近代史》等传世。');
INSERT INTO `authors` VALUES ('0a4fd8b9-63a7-11e7-910c-14dda97c3051', '梁实秋', 'LSQ', null, '梁实秋\r\n　　中国著名的散文家、翻译家、学者、文学批评家，国内第一个研究莎士比亚的权威人士。一生给中国文坛留下了两千多万字的著作，代表作有《雅舍小品》《雅舍谈吃》，长篇散文集《槐园梦忆》等。\r\n　　他自幼受家庭熏陶，爱好古典文化，一生温文儒雅，颇有大家风范。这种爱好和性格，使得他以雅致、闲适的独特文风享誉文坛。');
INSERT INTO `authors` VALUES ('0af4c56b-637e-11e7-910c-14dda97c3051', '孙武', 'SW', null, '孙武(约前545—前470)，汉族，字长卿，山东省惠民县人，春秋时期陈国公子妫完的后代。春秋时期吴国将领，著名的军事家、政治家。他被尊称为“兵圣”，是兵法家孙膑的祖先。\r\n　　他曾率领吴国军队大破楚国军队，占领了楚的国都郢城，几近灭亡楚国。其著有巨作《孙子兵法》十三篇，为后世兵法家所推崇，被誉为“兵学圣典”，置于《武经七书》之首。被译为英文、法文、德文、日文，成为国际间最著名的兵学典范之书。');
INSERT INTO `authors` VALUES ('10166ede-637e-11e7-910c-14dda97c3051', '李大光', 'LDG', null, '李大光，国防大学教授，研究生导师。中国科协科普协会会员、中国海洋发展研究会理事。主要研究领域：国家安全、军事战略、军事装备和国际政治。著有《中国安全抉择》《一门三首相》《世界四大间谍组织机构内幕揭密》《影响未来战争演变的军事高技术》《美俄太空力量建设及其作战运用》《国家安全》等著作；研究撰写的咨询报告经常得到军委主席、副主席的指示。');
INSERT INTO `authors` VALUES ('2295f38e-63a4-11e7-910c-14dda97c3051', '李银河', 'LYH', null, '李银河，当代中国*影响力知识分子、著名社会学家，自由主义代表学者。美国匹兹堡大学社会学博士。中国第一个文科博士后，1999年被《亚洲周刊》评为中国50位*影响的人物之一。2008年被评为“改革开放30年影响中国30人”。\r\n2012年从中国社科院退休后，隐居乡间、海滨，专心读书写作，近年先后出版 “心灵散文”系列：《我的生命哲学》《我的心灵阅读》《我的社会观察》和《一个无神论者的静修》等。');
INSERT INTO `authors` VALUES ('3877bb69-63a6-11e7-910c-14dda97c3051', '比尔·波特', 'BEBT', null, '[美]比尔·波特，美国当代著名的作家、翻译家、汉学家。1970年进入哥伦比亚大学攻读人类学博士，机缘巧合之下开始学习中文，从此爱上中国文化。1972年，比尔赴台湾一所寺庙修行，在那里过起暮鼓晨钟的隐居生活；1991年，他又辗转至香港某广播电台工作，并开始长期在中国大陆旅行，撰写了大量介绍中国风土人情的书籍和游记，同时翻译多部佛学经典和诗集，在欧美各国掀起了一股学习中国传统文化的热潮。\r\n比尔关于中国隐者的作品《空谷幽兰》出版后，受到读者的热烈欢迎，一版再版，畅销至今。近几年，他又相继推出了追溯中国禅宗文化与历史的《禅的行囊》、追寻黄河源头的《黄河之旅》、追溯中华文明史上辉煌篇章的《丝绸之路》，以及探秘中国西南少数民族风情的《彩云之南》。2016年则继续推出了寻访中国古代诗人遗踪的《寻人不遇》，以及品味中国江南风韵的《江南之旅》。');
INSERT INTO `authors` VALUES ('3a9b2cc2-6abc-11e7-b520-14dda97c3051', '王利杰', 'WLJ', null, '王利杰-新锐天使投资人，PreAngel创始合伙人。\r\n2001年供职于华为技术，2008年创办“移动2.0论坛”，2011年创办PreAngel天使投资品牌。至今投资300多个科技初创企业，主要分布在北京、上海、硅谷、纽约、洛杉矶等地。\r\nPreAngel旗下目前有荷多资本、喔赢资本、十维资本、伽利略资本、鼎萃资本、黄浦江资本、容铭资本、PreAngel USD等多个天使基金品牌，共管理10亿人民币。\r\nPreAngel系天使基金的LP（有限合伙人）包括松禾资本厉伟、美图科技蔡文胜、上海联创冯涛、东方富海陈玮、唯品会吴彬、源政资本杨向阳、老鹰基金刘小鹰、360周鸿祎、乐视集团及宁波市创业投资引导基金管理有限公司等。\r\nPreAngel投资的项目代表有九樱天下、医联、天籁K歌、蚁视、亿航、西井、紫燕、晨之科、游友移动、友加、萝卜太辣、超级猩猩、粒子狂热、越疆Dobot、禾赛、氧气、腾保保险、无限智投、嘉赛、盛世方舟、三体科技、心上、收钱吧、铁鞋、股书、联合创业办公社P2、麻省医疗国际、盖盖、樱桃养老、人人飞、职优你、58货运等。');
INSERT INTO `authors` VALUES ('5f5f143a-638d-11e7-910c-14dda97c3051', '迟福林', 'CFL', null, '迟福林，研究员，博士生导师，第十一届、十二届全国政协委员。中国（海南）改革发展研究院院长，兼任中国经济体制改革研究会副会长、中国行政体制改革研究会副会长。国家“十三五”规划专家委员会委员。国家行政学院、中国井冈山干部学院、北京大学、浙江大学、东北大学等多家高等院校的特聘教授。\r\n多年致力于经济转轨理论与实践研究，围绕我国改革开放进程中的重大经济、社会问题，在政府转型和基本公共服务均等化等方面进行深入研究。在上述研究领域，共出版中英文专著四十余部，公开发表学术论文八百余篇，形成研究报告七十余部，提交了大量政策建议报告，在决策和实践层面产生了积极影响。曾获得“五个一工程奖”、“孙冶方经济科学论文奖”、“中国发展研究奖”等奖项。享受国务院特殊津贴专家，2002年被中组部、中宣部、国家人事部和国家科学技术部联合授予“全国杰出专业技术人才”荣誉称号，2009年入选“影响新中国60年经济建设的100位经济学家” ,2015年入选《20世纪中国知名科学家学术成就概览(经济学卷)》。');
INSERT INTO `authors` VALUES ('68cc1e02-638d-11e7-910c-14dda97c3051', '吴军', 'WJ', null, '吴军 ,博士，著名自然语言处理和搜索专家，硅谷风险投资人。他的著作《数学之美》荣获国家图书馆第八届文津图书奖、第五届中华优秀出版物奖，《文明之光》被评为2014年“中国好书”，《浪潮之巅》荣获“蓝狮子2011年十大极佳商业图书”奖。\r\n吴军博士曾经担任Google资深研究员，设计了Google中、日、韩文搜索算法以及Google的自然语言分析器。2010-2012年期间担任腾讯负责搜索和搜索广告等业务的副总裁，后回到Google负责计算机自动问答项目。\r\n吴军博士自2008年开始从事风险投资，并于2014年作为创始合伙人创立了硅谷丰元资本风险投资基金。他也是上海交通大学客座研究员和约翰·霍普金斯大学工学院董事。');
INSERT INTO `authors` VALUES ('6ace92f9-63a1-11e7-910c-14dda97c3051', '胡适', 'HS', null, '胡适（1891-1962）-字适之，安徽绩溪人，20 世纪中国著名的学者、思想家、教育家。在文学、哲学、史学、考据学、教育学、伦理学等领域皆有建树。\r\n童年在家乡接受私塾教育，14 岁到上海求学，开始接触新思想。20 岁考取“庚子赔款”官费赴美留学生，进入康奈尔大学学习农科，后改读文科。25 岁时入哥伦比亚大学研究院，师从哲学家杜威。1917 年回国，受聘于国立北京大学。同年，他因提倡文学革命而成为新文化运动的领袖。后历任*驻美大使、北京大学校长、中央研究院院长等要职。1962年2 月24 日，胡适因心脏病猝发逝世于台湾，享年72 岁。\r\n胡适和是中国自由主义的先驱，是拉开现代中国文明与进步、民主、自由幕布的先哲。');
INSERT INTO `authors` VALUES ('6d8523d6-638d-11e7-910c-14dda97c3051', '郎咸平', 'LYP', null, '郎咸平-著名经济学家，美国沃顿商学院博士，曾任沃顿商学院、密歇根州立大学、俄亥俄州立大学、纽约大学和芝加哥大学教授，香港中文大学金融学讲座教授。在《金融学期刊》等国际*学术杂志发表过大量学术文章。出版的著作主要有郎咸平说系列、财经郎眼系列、郎咸平经典案例系列等，近期出版的作品有《郎咸平说：你的投资机会在哪里》《财经郎眼10：我们离幸福还有多远》。');

-- ----------------------------
-- Table structure for bookdetails
-- ----------------------------
DROP TABLE IF EXISTS `bookdetails`;
CREATE TABLE `bookdetails` (
  `Id` varchar(36) NOT NULL,
  `BookId` varchar(36) NOT NULL,
  `Number` varchar(20) NOT NULL,
  `State` int(11) DEFAULT '1',
  `LibraryId` varchar(36) DEFAULT NULL,
  `CreateTime` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bookdetails
-- ----------------------------
INSERT INTO `bookdetails` VALUES ('015ba875-f6a3-11e7-a2d5-14dda9555c37', 'e7cf6a40-f6a2-11e7-a2d5-14dda9555c37', 'G-18011116365910034', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515656562000');
INSERT INTO `bookdetails` VALUES ('0479d6bd-f6a3-11e7-a2d5-14dda9555c37', 'e7cf6a40-f6a2-11e7-a2d5-14dda9555c37', 'G-18011116365910035', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515656567000');
INSERT INTO `bookdetails` VALUES ('065417b6-a3d2-11e7-85eb-002522cc5ae9', 'fc716667-a384-11e7-9297-002522cc5ae9', 'C-1709280619010001', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515468886000');
INSERT INTO `bookdetails` VALUES ('0a340168-f4ee-11e7-9d97-14dda9555c37', '4fbc2509-f4e8-11e7-9d97-14dda9555c37', 'G18010910013', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515468886000');
INSERT INTO `bookdetails` VALUES ('0db81a24-f4ee-11e7-9d97-14dda9555c37', '4fbc2509-f4e8-11e7-9d97-14dda9555c37', 'G18010910014', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515468892000');
INSERT INTO `bookdetails` VALUES ('0e65b1ea-f6a4-11e7-a2d5-14dda9555c37', '01749d4c-f6a4-11e7-a2d5-14dda9555c37', 'G-18011116365910040', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515657013000');
INSERT INTO `bookdetails` VALUES ('1045ef49-f4ee-11e7-9d97-14dda9555c37', '4fbc2509-f4e8-11e7-9d97-14dda9555c37', 'G18010910015', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515468897000');
INSERT INTO `bookdetails` VALUES ('10f67223-f6a4-11e7-a2d5-14dda9555c37', '01749d4c-f6a4-11e7-a2d5-14dda9555c37', 'G-18011116365910041', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515657018000');
INSERT INTO `bookdetails` VALUES ('12c50bda-f4ee-11e7-9d97-14dda9555c37', '4fbc2509-f4e8-11e7-9d97-14dda9555c37', 'G18010910016', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515468901000');
INSERT INTO `bookdetails` VALUES ('12ca3779-a3d2-11e7-85eb-002522cc5ae9', 'fc716667-a384-11e7-9297-002522cc5ae9', 'C-1709280619010002', '0', '4e32e737-9ed2-11e7-9297-002522cc5ae9', '1515468886000');
INSERT INTO `bookdetails` VALUES ('13e0df51-f6a4-11e7-a2d5-14dda9555c37', '01749d4c-f6a4-11e7-a2d5-14dda9555c37', 'G-18011116365910042', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515657023000');
INSERT INTO `bookdetails` VALUES ('164a629f-f6a4-11e7-a2d5-14dda9555c37', '01749d4c-f6a4-11e7-a2d5-14dda9555c37', 'G-18011116365910043', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515657027000');
INSERT INTO `bookdetails` VALUES ('182b18cd-f693-11e7-a2d5-14dda9555c37', 'effecbd8-f692-11e7-a2d5-14dda9555c37', 'J-18011111403610001', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515649728000');
INSERT INTO `bookdetails` VALUES ('1d47a7b9-f693-11e7-a2d5-14dda9555c37', 'effecbd8-f692-11e7-a2d5-14dda9555c37', 'J-18011111403610002', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515649737000');
INSERT INTO `bookdetails` VALUES ('20665d5e-f693-11e7-a2d5-14dda9555c37', 'effecbd8-f692-11e7-a2d5-14dda9555c37', 'J-18011111403610003', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515649742000');
INSERT INTO `bookdetails` VALUES ('2260f3b1-f4ee-11e7-9d97-14dda9555c37', '6a61ea51-f4ec-11e7-9d97-14dda9555c37', 'J18010910017', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515468927000');
INSERT INTO `bookdetails` VALUES ('23906bde-f693-11e7-a2d5-14dda9555c37', 'effecbd8-f692-11e7-a2d5-14dda9555c37', 'J-18011111403610004', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515649747000');
INSERT INTO `bookdetails` VALUES ('250713c2-f4ee-11e7-9d97-14dda9555c37', '6a61ea51-f4ec-11e7-9d97-14dda9555c37', 'J18010910018', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515468931000');
INSERT INTO `bookdetails` VALUES ('28204328-f4ee-11e7-9d97-14dda9555c37', '6a61ea51-f4ec-11e7-9d97-14dda9555c37', 'J18010910019', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515468937000');
INSERT INTO `bookdetails` VALUES ('2b489157-f69a-11e7-a2d5-14dda9555c37', '1ef3b360-f69a-11e7-a2d5-14dda9555c37', 'G-18011114365910004', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515652767000');
INSERT INTO `bookdetails` VALUES ('2b578efe-f4ee-11e7-9d97-14dda9555c37', '6a61ea51-f4ec-11e7-9d97-14dda9555c37', 'J18010910020', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515468942000');
INSERT INTO `bookdetails` VALUES ('2dd78383-f4ee-11e7-9d97-14dda9555c37', '6a61ea51-f4ec-11e7-9d97-14dda9555c37', 'J18010910021', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515468946000');
INSERT INTO `bookdetails` VALUES ('34bc42a7-f69b-11e7-a2d5-14dda9555c37', '2702a075-f69b-11e7-a2d5-14dda9555c37', 'G-18011114365910013', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515653212000');
INSERT INTO `bookdetails` VALUES ('3719bd33-f69b-11e7-a2d5-14dda9555c37', '2702a075-f69b-11e7-a2d5-14dda9555c37', 'G-18011114365910014', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515653216000');
INSERT INTO `bookdetails` VALUES ('39a802f5-f69b-11e7-a2d5-14dda9555c37', '2702a075-f69b-11e7-a2d5-14dda9555c37', 'G-18011114365910015', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515653220000');
INSERT INTO `bookdetails` VALUES ('3a10005b-f69e-11e7-a2d5-14dda9555c37', '2cbff34f-f69e-11e7-a2d5-14dda9555c37', 'G-18011114365910020', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515654510000');
INSERT INTO `bookdetails` VALUES ('3c0b17b4-f4ee-11e7-9d97-14dda9555c37', '9ddc2972-f4e8-11e7-9d97-14dda9555c37', 'J18010910022', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515468970000');
INSERT INTO `bookdetails` VALUES ('3d33c4c9-f69e-11e7-a2d5-14dda9555c37', '2cbff34f-f69e-11e7-a2d5-14dda9555c37', 'G-18011114365910021', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515654515000');
INSERT INTO `bookdetails` VALUES ('3def4cb1-a3d1-11e7-85eb-002522cc5ae9', '3156e11d-a384-11e7-9297-002522cc5ae9', 'C-1709280101010001', '0', '125a1f6b-9ed2-11e7-9297-002522cc5ae9', '1515468886000');
INSERT INTO `bookdetails` VALUES ('3ea078cc-f4ee-11e7-9d97-14dda9555c37', '9ddc2972-f4e8-11e7-9d97-14dda9555c37', 'J18010910023', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515468974000');
INSERT INTO `bookdetails` VALUES ('3ff67a74-f69e-11e7-a2d5-14dda9555c37', '2cbff34f-f69e-11e7-a2d5-14dda9555c37', 'G-18011114365910022', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515654520000');
INSERT INTO `bookdetails` VALUES ('41610a5a-f4ee-11e7-9d97-14dda9555c37', '9ddc2972-f4e8-11e7-9d97-14dda9555c37', 'J18010910024', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515468979000');
INSERT INTO `bookdetails` VALUES ('49f7633f-f69a-11e7-a2d5-14dda9555c37', '1ef3b360-f69a-11e7-a2d5-14dda9555c37', 'G-18011114365910005', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515652818000');
INSERT INTO `bookdetails` VALUES ('4d2ceda3-f69a-11e7-a2d5-14dda9555c37', '1ef3b360-f69a-11e7-a2d5-14dda9555c37', 'G-18011114365910006', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515652824000');
INSERT INTO `bookdetails` VALUES ('4e056c5f-f4ee-11e7-9d97-14dda9555c37', 'b67df8f4-f475-11e7-84b2-54e1adda4205', 'J18010910025', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515469000000');
INSERT INTO `bookdetails` VALUES ('4e89180b-a3d1-11e7-85eb-002522cc5ae9', '3156e11d-a384-11e7-9297-002522cc5ae9', 'C-1709280101010002', '0', '125a1f6b-9ed2-11e7-9297-002522cc5ae9', '1515468886000');
INSERT INTO `bookdetails` VALUES ('50652586-f4ee-11e7-9d97-14dda9555c37', 'b67df8f4-f475-11e7-84b2-54e1adda4205', 'J18010910026', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515469004000');
INSERT INTO `bookdetails` VALUES ('527aa0b5-f4ee-11e7-9d97-14dda9555c37', 'b67df8f4-f475-11e7-84b2-54e1adda4205', 'J18010910027', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515469008000');
INSERT INTO `bookdetails` VALUES ('54c1441d-f4ee-11e7-9d97-14dda9555c37', 'b67df8f4-f475-11e7-84b2-54e1adda4205', 'J18010910028', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515469012000');
INSERT INTO `bookdetails` VALUES ('6614e09e-f694-11e7-a2d5-14dda9555c37', '4fbc2509-f4e8-11e7-9d97-14dda9555c37', 'E-18011011403610001', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515650288000');
INSERT INTO `bookdetails` VALUES ('661b720a-f4ed-11e7-9d97-14dda9555c37', '06f4a2a0-f470-11e7-b1c3-54e1adda4205', 'J18010910001', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515468611000');
INSERT INTO `bookdetails` VALUES ('688ccd4a-f694-11e7-a2d5-14dda9555c37', '4fbc2509-f4e8-11e7-9d97-14dda9555c37', 'E-18011011403610002', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515650293000');
INSERT INTO `bookdetails` VALUES ('6aee5d8d-f694-11e7-a2d5-14dda9555c37', '4fbc2509-f4e8-11e7-9d97-14dda9555c37', 'E-18011011403610003', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515650297000');
INSERT INTO `bookdetails` VALUES ('6d3bce97-f694-11e7-a2d5-14dda9555c37', '4fbc2509-f4e8-11e7-9d97-14dda9555c37', 'E-18011011403610004', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515650300000');
INSERT INTO `bookdetails` VALUES ('6f444152-f4ee-11e7-9d97-14dda9555c37', 'b936c389-f473-11e7-84b2-54e1adda4205', 'J18010910029', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515469056000');
INSERT INTO `bookdetails` VALUES ('701d5351-f4ed-11e7-9d97-14dda9555c37', '06f4a2a0-f470-11e7-b1c3-54e1adda4205', 'J18010910002', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515468628000');
INSERT INTO `bookdetails` VALUES ('727978db-f4ee-11e7-9d97-14dda9555c37', 'b936c389-f473-11e7-84b2-54e1adda4205', 'J18010910030', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515469061000');
INSERT INTO `bookdetails` VALUES ('744b2963-f4ed-11e7-9d97-14dda9555c37', '06f4a2a0-f470-11e7-b1c3-54e1adda4205', 'J18010910003', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515468635000');
INSERT INTO `bookdetails` VALUES ('74fac212-f4ee-11e7-9d97-14dda9555c37', 'b936c389-f473-11e7-84b2-54e1adda4205', 'J18010910031', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515469066000');
INSERT INTO `bookdetails` VALUES ('77cf9a47-f4ee-11e7-9d97-14dda9555c37', 'b936c389-f473-11e7-84b2-54e1adda4205', 'J18010910032', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515469070000');
INSERT INTO `bookdetails` VALUES ('7b2d7f14-f6a4-11e7-a2d5-14dda9555c37', '6eaa9540-f6a4-11e7-a2d5-14dda9555c37', 'G-18011116365910044', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515657196000');
INSERT INTO `bookdetails` VALUES ('7d9e5019-f6a4-11e7-a2d5-14dda9555c37', '6eaa9540-f6a4-11e7-a2d5-14dda9555c37', 'G-18011116365910045', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515657200000');
INSERT INTO `bookdetails` VALUES ('7fb42da5-a383-11e7-9297-002522cc5ae9', '80d8e571-a385-11e7-9297-002522cc5ae9', 'G-1709280620590001', '0', '90d21b27-9ed2-11e7-9297-002522cc5ae9', '1515468886000');
INSERT INTO `bookdetails` VALUES ('80117d2e-f6a4-11e7-a2d5-14dda9555c37', '6eaa9540-f6a4-11e7-a2d5-14dda9555c37', 'G-18011116365910046', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515657204000');
INSERT INTO `bookdetails` VALUES ('85f5a3dd-f4ee-11e7-9d97-14dda9555c37', 'eac2979c-f4e7-11e7-9d97-14dda9555c37', 'G18010910033', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515469094000');
INSERT INTO `bookdetails` VALUES ('874ed749-a3d1-11e7-85eb-002522cc5ae9', '3156e11d-a384-11e7-9297-002522cc5ae9', 'C-1709280101010003', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515468886000');
INSERT INTO `bookdetails` VALUES ('88dc93e0-f4ee-11e7-9d97-14dda9555c37', 'eac2979c-f4e7-11e7-9d97-14dda9555c37', 'G18010910034', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515469099000');
INSERT INTO `bookdetails` VALUES ('88e866cb-f69b-11e7-a2d5-14dda9555c37', '7a0634c0-f69b-11e7-a2d5-14dda9555c37', 'G-18011114365910016', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515653353000');
INSERT INTO `bookdetails` VALUES ('8b2a98c4-f4ee-11e7-9d97-14dda9555c37', 'eac2979c-f4e7-11e7-9d97-14dda9555c37', 'G18010910035', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515469103000');
INSERT INTO `bookdetails` VALUES ('8ce6488f-f69b-11e7-a2d5-14dda9555c37', '7a0634c0-f69b-11e7-a2d5-14dda9555c37', 'G-18011114365910017', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515653360000');
INSERT INTO `bookdetails` VALUES ('901cf1ec-f4ed-11e7-9d97-14dda9555c37', '2b060062-f4e9-11e7-9d97-14dda9555c37', 'J18010910004', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515468682000');
INSERT INTO `bookdetails` VALUES ('90290da4-f69b-11e7-a2d5-14dda9555c37', '7a0634c0-f69b-11e7-a2d5-14dda9555c37', 'G-18011114365910018', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515653366000');
INSERT INTO `bookdetails` VALUES ('93b06632-f69b-11e7-a2d5-14dda9555c37', '7a0634c0-f69b-11e7-a2d5-14dda9555c37', 'G-18011114365910019', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515653372000');
INSERT INTO `bookdetails` VALUES ('94318550-f4ed-11e7-9d97-14dda9555c37', '2b060062-f4e9-11e7-9d97-14dda9555c37', 'J18010910005', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515468688000');
INSERT INTO `bookdetails` VALUES ('96df2f53-f4ed-11e7-9d97-14dda9555c37', '2b060062-f4e9-11e7-9d97-14dda9555c37', 'J18010910006', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515468693000');
INSERT INTO `bookdetails` VALUES ('9780f6df-f4ee-11e7-9d97-14dda9555c37', 'eaead583-f474-11e7-84b2-54e1adda4205', 'G18010910036', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515469124000');
INSERT INTO `bookdetails` VALUES ('9996bf3f-f4ed-11e7-9d97-14dda9555c37', '2b060062-f4e9-11e7-9d97-14dda9555c37', 'J18010910007', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515468698000');
INSERT INTO `bookdetails` VALUES ('99dae409-f693-11e7-a2d5-14dda9555c37', '80fea0a8-f693-11e7-a2d5-14dda9555c37', 'J-18011011403610005', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515649946000');
INSERT INTO `bookdetails` VALUES ('9a4dc8d3-f4ee-11e7-9d97-14dda9555c37', 'eaead583-f474-11e7-84b2-54e1adda4205', 'G18010910037', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515469128000');
INSERT INTO `bookdetails` VALUES ('9b94bbe2-f6a2-11e7-a2d5-14dda9555c37', '8c3070dc-f6a2-11e7-a2d5-14dda9555c37', 'G-18011114365910027', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515656391000');
INSERT INTO `bookdetails` VALUES ('9dc4d69d-f693-11e7-a2d5-14dda9555c37', '80fea0a8-f693-11e7-a2d5-14dda9555c37', 'J-18011011403610006', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515649952000');
INSERT INTO `bookdetails` VALUES ('9df769e6-f4ee-11e7-9d97-14dda9555c37', 'eaead583-f474-11e7-84b2-54e1adda4205', 'G18010910038', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515469134000');
INSERT INTO `bookdetails` VALUES ('9ebc564f-f6a3-11e7-a2d5-14dda9555c37', '907b3999-f6a3-11e7-a2d5-14dda9555c37', 'G-18011116365910036', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515656826000');
INSERT INTO `bookdetails` VALUES ('9f48c51d-f6a2-11e7-a2d5-14dda9555c37', '8c3070dc-f6a2-11e7-a2d5-14dda9555c37', 'G-18011114365910028', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515656397000');
INSERT INTO `bookdetails` VALUES ('9fa79e94-f696-11e7-a2d5-14dda9555c37', '50005a32-f694-11e7-a2d5-14dda9555c37', 'E-18011011403610008', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515651244000');
INSERT INTO `bookdetails` VALUES ('a0a89326-f693-11e7-a2d5-14dda9555c37', '80fea0a8-f693-11e7-a2d5-14dda9555c37', 'J-18011011403610007', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515649957000');
INSERT INTO `bookdetails` VALUES ('a2588980-f6a2-11e7-a2d5-14dda9555c37', '8c3070dc-f6a2-11e7-a2d5-14dda9555c37', 'G-18011114365910029', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515656403000');
INSERT INTO `bookdetails` VALUES ('a2c6f80a-f6a3-11e7-a2d5-14dda9555c37', '907b3999-f6a3-11e7-a2d5-14dda9555c37', 'G-18011116365910037', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515656833000');
INSERT INTO `bookdetails` VALUES ('a2f9f22e-f696-11e7-a2d5-14dda9555c37', '50005a32-f694-11e7-a2d5-14dda9555c37', 'E-18011011403610009', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515651250000');
INSERT INTO `bookdetails` VALUES ('a5e9a3b6-f6a3-11e7-a2d5-14dda9555c37', '907b3999-f6a3-11e7-a2d5-14dda9555c37', 'G-18011116365910038', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515656838000');
INSERT INTO `bookdetails` VALUES ('a76c7ac3-f69a-11e7-a2d5-14dda9555c37', '9926128d-f69a-11e7-a2d5-14dda9555c37', 'G-18011114365910007', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515652975000');
INSERT INTO `bookdetails` VALUES ('aa3041d6-f69a-11e7-a2d5-14dda9555c37', '9926128d-f69a-11e7-a2d5-14dda9555c37', 'G-18011114365910008', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515652980000');
INSERT INTO `bookdetails` VALUES ('aa3346fb-f4ee-11e7-9d97-14dda9555c37', 'ede9b689-f4eb-11e7-9d97-14dda9555c37', 'J18010910039', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515469155000');
INSERT INTO `bookdetails` VALUES ('aa88a926-f695-11e7-a2d5-14dda9555c37', '7364d4e4-f695-11e7-a2d5-14dda9555c37', 'E-18011011403610005', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515650833000');
INSERT INTO `bookdetails` VALUES ('ac71a07c-f69a-11e7-a2d5-14dda9555c37', '9926128d-f69a-11e7-a2d5-14dda9555c37', 'G-18011114365910009', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515652984000');
INSERT INTO `bookdetails` VALUES ('ad909d4d-f4ee-11e7-9d97-14dda9555c37', 'ede9b689-f4eb-11e7-9d97-14dda9555c37', 'J18010910040', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515469161000');
INSERT INTO `bookdetails` VALUES ('afa0b6a7-f695-11e7-a2d5-14dda9555c37', '7364d4e4-f695-11e7-a2d5-14dda9555c37', 'E-18011011403610006', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515650841000');
INSERT INTO `bookdetails` VALUES ('afc9fa0f-f4ee-11e7-9d97-14dda9555c37', 'ede9b689-f4eb-11e7-9d97-14dda9555c37', 'J18010910041', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515469164000');
INSERT INTO `bookdetails` VALUES ('b2aeb1a1-f695-11e7-a2d5-14dda9555c37', '7364d4e4-f695-11e7-a2d5-14dda9555c37', 'E-18011011403610007', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515650846000');
INSERT INTO `bookdetails` VALUES ('b2e3abab-f4ee-11e7-9d97-14dda9555c37', 'ede9b689-f4eb-11e7-9d97-14dda9555c37', 'J18010910042', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515469169000');
INSERT INTO `bookdetails` VALUES ('c0d61ea8-f4ed-11e7-9d97-14dda9555c37', '433d306f-f475-11e7-84b2-54e1adda4205', 'G18010910008', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515468763000');
INSERT INTO `bookdetails` VALUES ('c16eb7e1-f69e-11e7-a2d5-14dda9555c37', 'b3db3b23-f69e-11e7-a2d5-14dda9555c37', 'G-18011114365910023', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515654737000');
INSERT INTO `bookdetails` VALUES ('c235f729-f4ed-11e7-9d97-14dda9555c37', '433d306f-f475-11e7-84b2-54e1adda4205', 'G18010910008', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515468766000');
INSERT INTO `bookdetails` VALUES ('c26299e9-f698-11e7-a2d5-14dda9555c37', 'ac00ecc7-f698-11e7-a2d5-14dda9555c37', 'J-18011011403610021', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515652161000');
INSERT INTO `bookdetails` VALUES ('c4c3da4e-f69e-11e7-a2d5-14dda9555c37', 'b3db3b23-f69e-11e7-a2d5-14dda9555c37', 'G-18011114365910024', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515654742000');
INSERT INTO `bookdetails` VALUES ('c5309885-f698-11e7-a2d5-14dda9555c37', 'ac00ecc7-f698-11e7-a2d5-14dda9555c37', 'J-18011011403610022', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515652166000');
INSERT INTO `bookdetails` VALUES ('c6f2feca-f69e-11e7-a2d5-14dda9555c37', 'b3db3b23-f69e-11e7-a2d5-14dda9555c37', 'G-18011114365910025', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515654746000');
INSERT INTO `bookdetails` VALUES ('c812609b-f698-11e7-a2d5-14dda9555c37', 'ac00ecc7-f698-11e7-a2d5-14dda9555c37', 'J-18011011403610023', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515652171000');
INSERT INTO `bookdetails` VALUES ('c9502408-f69e-11e7-a2d5-14dda9555c37', 'b3db3b23-f69e-11e7-a2d5-14dda9555c37', 'G-18011114365910026', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515654750000');
INSERT INTO `bookdetails` VALUES ('ca2b1645-f698-11e7-a2d5-14dda9555c37', 'ac00ecc7-f698-11e7-a2d5-14dda9555c37', 'J-18011011403610024', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515652174000');
INSERT INTO `bookdetails` VALUES ('cc535c0e-f699-11e7-a2d5-14dda9555c37', '8ef3ed46-f699-11e7-a2d5-14dda9555c37', 'G-18011114365910001', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515652608000');
INSERT INTO `bookdetails` VALUES ('cf25f0d0-f699-11e7-a2d5-14dda9555c37', '8ef3ed46-f699-11e7-a2d5-14dda9555c37', 'G-18011114365910002', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515652612000');
INSERT INTO `bookdetails` VALUES ('d18e4277-f699-11e7-a2d5-14dda9555c37', '8ef3ed46-f699-11e7-a2d5-14dda9555c37', 'G-18011114365910003', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515652616000');
INSERT INTO `bookdetails` VALUES ('db4a203b-f6a4-11e7-a2d5-14dda9555c37', 'cd5d1b24-f6a4-11e7-a2d5-14dda9555c37', 'G-18011116365910047', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515657357000');
INSERT INTO `bookdetails` VALUES ('ded76074-f6a4-11e7-a2d5-14dda9555c37', 'cd5d1b24-f6a4-11e7-a2d5-14dda9555c37', 'G-18011116365910048', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515657363000');
INSERT INTO `bookdetails` VALUES ('e3319b4d-f6a4-11e7-a2d5-14dda9555c37', 'cd5d1b24-f6a4-11e7-a2d5-14dda9555c37', 'G-18011116365910049', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515657370000');
INSERT INTO `bookdetails` VALUES ('e5ac2d21-f4ed-11e7-9d97-14dda9555c37', '4dca648b-f474-11e7-84b2-54e1adda4205', 'J18010910010', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515468825000');
INSERT INTO `bookdetails` VALUES ('e84a4f87-f4ed-11e7-9d97-14dda9555c37', '4dca648b-f474-11e7-84b2-54e1adda4205', 'J18010910011', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515468830000');
INSERT INTO `bookdetails` VALUES ('e947755a-f4ee-11e7-9d97-14dda9555c37', '7fb42da5-a383-11e7-9297-002522cc5ae9', 'G18010911403610042', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515469261000');
INSERT INTO `bookdetails` VALUES ('eaaf5da5-f4ed-11e7-9d97-14dda9555c37', '4dca648b-f474-11e7-84b2-54e1adda4205', 'J18010910012', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515468834000');
INSERT INTO `bookdetails` VALUES ('ecbb5d46-f4ee-11e7-9d97-14dda9555c37', '7fb42da5-a383-11e7-9297-002522cc5ae9', 'G18010911403610043', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515469267000');
INSERT INTO `bookdetails` VALUES ('eed3366b-f4ee-11e7-9d97-14dda9555c37', '7fb42da5-a383-11e7-9297-002522cc5ae9', 'G18010911403610044', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515469270000');
INSERT INTO `bookdetails` VALUES ('ef9bcde2-f69a-11e7-a2d5-14dda9555c37', 'e3cca274-f69a-11e7-a2d5-14dda9555c37', 'G-18011114365910010', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515653096000');
INSERT INTO `bookdetails` VALUES ('f13a6181-f4ee-11e7-9d97-14dda9555c37', '7fb42da5-a383-11e7-9297-002522cc5ae9', 'G18010911403610045', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515469274000');
INSERT INTO `bookdetails` VALUES ('f13bac21-f693-11e7-a2d5-14dda9555c37', 'e23e99fa-f693-11e7-a2d5-14dda9555c37', 'J-18011011403610008', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515650092000');
INSERT INTO `bookdetails` VALUES ('f24043e2-f69a-11e7-a2d5-14dda9555c37', 'e3cca274-f69a-11e7-a2d5-14dda9555c37', 'G-18011114365910011', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515653101000');
INSERT INTO `bookdetails` VALUES ('f32b102e-f4ee-11e7-9d97-14dda9555c37', '7fb42da5-a383-11e7-9297-002522cc5ae9', 'G18010911403610046', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515469277000');
INSERT INTO `bookdetails` VALUES ('f44b4cd0-f69a-11e7-a2d5-14dda9555c37', 'e3cca274-f69a-11e7-a2d5-14dda9555c37', 'G-18011114365910012', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515653104000');
INSERT INTO `bookdetails` VALUES ('f483c50e-f693-11e7-a2d5-14dda9555c37', 'e23e99fa-f693-11e7-a2d5-14dda9555c37', 'J-18011011403610009', '0', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515650098000');
INSERT INTO `bookdetails` VALUES ('f7ce9aa6-f6a2-11e7-a2d5-14dda9555c37', 'e7cf6a40-f6a2-11e7-a2d5-14dda9555c37', 'G-18011116365910030', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515656546000');
INSERT INTO `bookdetails` VALUES ('fb3edf9e-f6a2-11e7-a2d5-14dda9555c37', 'e7cf6a40-f6a2-11e7-a2d5-14dda9555c37', 'G-18011116365910031', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515656552000');
INSERT INTO `bookdetails` VALUES ('fe45c36a-f6a2-11e7-a2d5-14dda9555c37', 'e7cf6a40-f6a2-11e7-a2d5-14dda9555c37', 'G-18011116365910032', '1', '2778563a-9ed3-11e7-9297-002522cc5ae9', '1515656557000');

-- ----------------------------
-- Table structure for bookinsections
-- ----------------------------
DROP TABLE IF EXISTS `bookinsections`;
CREATE TABLE `bookinsections` (
  `Id` varchar(36) NOT NULL,
  `SectionId` varchar(36) NOT NULL,
  `BookId` varchar(36) NOT NULL,
  `Priority` int(36) NOT NULL DEFAULT '100',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bookinsections
-- ----------------------------
INSERT INTO `bookinsections` VALUES ('01aa6e40-f4dd-11e7-9d97-14dda9555c37', '65f0cd39-f4dc-11e7-9d97-14dda9555c37', 'fc716667-a384-11e7-9297-002522cc5ae9', '100');
INSERT INTO `bookinsections` VALUES ('01b8835d-f4dd-11e7-9d97-14dda9555c37', '65f0cd39-f4dc-11e7-9d97-14dda9555c37', 'eaead583-f474-11e7-84b2-54e1adda4205', '99');
INSERT INTO `bookinsections` VALUES ('01cefe09-f4dd-11e7-9d97-14dda9555c37', '65f0cd39-f4dc-11e7-9d97-14dda9555c37', '3156e11d-a384-11e7-9297-002522cc5ae9', '98');
INSERT INTO `bookinsections` VALUES ('01d89366-f4dd-11e7-9d97-14dda9555c37', '65f0cd39-f4dc-11e7-9d97-14dda9555c37', 'b936c389-f473-11e7-84b2-54e1adda4205', '97');
INSERT INTO `bookinsections` VALUES ('01e3bdd0-f4dd-11e7-9d97-14dda9555c37', '65f0cd39-f4dc-11e7-9d97-14dda9555c37', '06f4a2a0-f470-11e7-b1c3-54e1adda4205', '96');
INSERT INTO `bookinsections` VALUES ('01ee2b12-f4dd-11e7-9d97-14dda9555c37', '65f0cd39-f4dc-11e7-9d97-14dda9555c37', 'b67df8f4-f475-11e7-84b2-54e1adda4205', '95');
INSERT INTO `bookinsections` VALUES ('bd2a8aa5-f4dc-11e7-9d97-14dda9555c37', '65dcc36c-f4dc-11e7-9d97-14dda9555c37', '06f4a2a0-f470-11e7-b1c3-54e1adda4205', '100');
INSERT INTO `bookinsections` VALUES ('bd39d280-f4dc-11e7-9d97-14dda9555c37', '65dcc36c-f4dc-11e7-9d97-14dda9555c37', '3156e11d-a384-11e7-9297-002522cc5ae9', '99');
INSERT INTO `bookinsections` VALUES ('bd43abc3-f4dc-11e7-9d97-14dda9555c37', '65dcc36c-f4dc-11e7-9d97-14dda9555c37', '433d306f-f475-11e7-84b2-54e1adda4205', '98');
INSERT INTO `bookinsections` VALUES ('bd5194eb-f4dc-11e7-9d97-14dda9555c37', '65dcc36c-f4dc-11e7-9d97-14dda9555c37', '4dca648b-f474-11e7-84b2-54e1adda4205', '97');
INSERT INTO `bookinsections` VALUES ('bd5c760b-f4dc-11e7-9d97-14dda9555c37', '65dcc36c-f4dc-11e7-9d97-14dda9555c37', '7fb42da5-a383-11e7-9297-002522cc5ae9', '96');
INSERT INTO `bookinsections` VALUES ('bd674425-f4dc-11e7-9d97-14dda9555c37', '65dcc36c-f4dc-11e7-9d97-14dda9555c37', '80d8e571-a385-11e7-9297-002522cc5ae9', '95');
INSERT INTO `bookinsections` VALUES ('c0ac5981-f69f-11e7-a2d5-14dda9555c37', '58f4bfc4-f69f-11e7-a2d5-14dda9555c37', '2cbff34f-f69e-11e7-a2d5-14dda9555c37', '100');
INSERT INTO `bookinsections` VALUES ('c0b7283b-f69f-11e7-a2d5-14dda9555c37', '58f4bfc4-f69f-11e7-a2d5-14dda9555c37', '50005a32-f694-11e7-a2d5-14dda9555c37', '99');
INSERT INTO `bookinsections` VALUES ('c0c44d9e-f69f-11e7-a2d5-14dda9555c37', '58f4bfc4-f69f-11e7-a2d5-14dda9555c37', '7a0634c0-f69b-11e7-a2d5-14dda9555c37', '98');
INSERT INTO `bookinsections` VALUES ('c0ce1d5c-f69f-11e7-a2d5-14dda9555c37', '58f4bfc4-f69f-11e7-a2d5-14dda9555c37', '7364d4e4-f695-11e7-a2d5-14dda9555c37', '97');
INSERT INTO `bookinsections` VALUES ('c0db3769-f69f-11e7-a2d5-14dda9555c37', '58f4bfc4-f69f-11e7-a2d5-14dda9555c37', '9926128d-f69a-11e7-a2d5-14dda9555c37', '96');
INSERT INTO `bookinsections` VALUES ('c0e3255e-f69f-11e7-a2d5-14dda9555c37', '58f4bfc4-f69f-11e7-a2d5-14dda9555c37', 'b3db3b23-f69e-11e7-a2d5-14dda9555c37', '95');

-- ----------------------------
-- Table structure for books
-- ----------------------------
DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `Id` varchar(36) NOT NULL,
  `ISBN` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Pinyin` varchar(50) DEFAULT NULL,
  `PublishDate` varchar(20) NOT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Introduce` varchar(1024) DEFAULT NULL,
  `CategoryId` varchar(36) DEFAULT NULL,
  `PublisherId` varchar(36) DEFAULT NULL,
  `AuthorId` varchar(36) DEFAULT NULL,
  `Amount` int(11) DEFAULT '0',
  `State` int(11) DEFAULT '1',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of books
-- ----------------------------
INSERT INTO `books` VALUES ('01749d4c-f6a4-11e7-a2d5-14dda9555c37', '9787302071976', '敏捷软件开发 ', 'MJRJKF', '2003-01-01', 'd05a5a6b-f6a3-11e7-a2d5-14dda9555c37.jpg', '敏捷软件开发：原则模式与实践》由享誉全球的软件开发专家和软件工程大师Robert C.Martin将向您展示如何解决软件开发人员、项目经理及软件项目领导们所面临的zui棘手的问题。这本综合性、实用性的敏捷开发和极限编程方面的指南，是由敏捷开发的创始人之一所撰写的。1.讲述在预算和实践要求下，软件开发人员和项目经理如何使用敏捷开发完成项目；2.使用真实案例讲解如何用极限编程来设计、测试、重构和结对编程；3.包含了极具价值的可多次使用的C++和JAVA源代码；4.重点讲述了如何使用UML和设计模式解决面向客户系统的问题。', 'e6266400-9ed3-11e7-9297-002522cc5ae9', '9e459984-9ed3-11e7-9297-002522cc5ae9', '5f5f143a-638d-11e7-910c-14dda97c3051', '4', '0');
INSERT INTO `books` VALUES ('06f4a2a0-f470-11e7-b1c3-54e1adda4205', '9787511337542', '论语全书', 'LYQS', '2013-09-01', 'cbf2b2a3-f46e-11e7-b1c3-54e1adda4205.jpg', '论语》是我国古代儒家经典著作之一，记录了孔子及其弟子言行，集中体现了孔子的政治主张、伦理思想、道德观念及教育原则。作为中华文化的源典，其蕴涵的深刻哲理浸透到中国两千多年的政教体制、社会习俗、心理习惯和行为方式中。“半部《论语》治天下”，自古至今，无论在士人当中还是在老百姓中间，《论语》一书都是中国人的一部不能逾越的圣典。 作为一部优秀的语录体散文集，《论语》中所记孔子循循善诱的教诲之言，或简单应答，点到即止；或启发论辩，侃侃而谈；或富于变化，娓娓动人。全书语言简洁精练，含义深刻，其中有许多言论至今仍被世人视为至理。《论语》的智慧具有广泛普适性，它不仅是一部哲学经典，更是一部世俗生活的指导书，所以，它能够跨越时空，到今天仍可以给我们的心灵注入鲜活的生命力。本书是现代读者领悟《论语》智慧的理想读本，参考了大量和孔子有关的资料，以确保全书的严谨性、专业性。', 'e639715a-9ed3-11e7-9297-002522cc5ae9', '9e696bd8-9ed3-11e7-9297-002522cc5ae9', '0af4c56b-637e-11e7-910c-14dda97c3051', '3', '0');
INSERT INTO `books` VALUES ('1ef3b360-f69a-11e7-a2d5-14dda9555c37', '9787111514428', 'HTML 5与CSS 3权威指南', 'HTMLYCSSQWZN', '2016-05-01', 'e7b7f249-f699-11e7-a2d5-14dda9555c37.jpg', '全书是HTML 5与CSS 3领域公认的标杆之作，被读者誉为“系统学习HTML 5与CSS 3的著作”和“Web前端工程师案头必备图书之一”。', 'e6266400-9ed3-11e7-9297-002522cc5ae9', '9e459984-9ed3-11e7-9297-002522cc5ae9', '5f5f143a-638d-11e7-910c-14dda97c3051', '3', '0');
INSERT INTO `books` VALUES ('2702a075-f69b-11e7-a2d5-14dda9555c37', '9787115464293', 'JavaScript框架设计', 'JAVASCRIPTKJSJ', '2017-09-01', '0102bf80-f69b-11e7-a2d5-14dda9555c37.jpg', '本书全面讲解了JavaScript框架设计及相关的知识，主要内容包括种子模块、语言模块、浏览器嗅探与特征侦测、类工厂、选择器引擎、节点模块、数据缓存模块、样式模块、属性模块、PC端和移动端的事件系统、jQuery的事件系统、异步模型、数据交互模块、动画引擎、MVVM、前端模板（静态模板）、MVVM的动态模板、性能墙与复杂墙、组件、jQuery时代的组件方案、avalon2的组件方案、react的组件方案等。', 'e6266400-9ed3-11e7-9297-002522cc5ae9', '9e459984-9ed3-11e7-9297-002522cc5ae9', '5f5f143a-638d-11e7-910c-14dda97c3051', '3', '0');
INSERT INTO `books` VALUES ('2b060062-f4e9-11e7-9d97-14dda9555c37', '11681676', '中华上下五千年', 'ZHSXWJN', '2014-10-01', 'cbfc2754-f4e8-11e7-9d97-14dda9555c37.jpg', '中华民族是一个具有悠久历史和灿烂文化的民族。了解祖国的过去，才能更加热爱祖国的现在和将来。在漫长的历史进程中，我国发生过无数轰轰烈烈的事件，也涌现出许多叱咤风云的人物。把这些历史事件和风云人物介绍给读者，可以开拓读者的视野，提高读者的文化素养，增强读者的民族自尊心和爱国热情。', 'e639715a-9ed3-11e7-9297-002522cc5ae9', '9e58efc5-9ed3-11e7-9297-002522cc5ae9', '6d8523d6-638d-11e7-910c-14dda97c3051', '4', '0');
INSERT INTO `books` VALUES ('2cbff34f-f69e-11e7-a2d5-14dda9555c37', '9787115416940', 'CSS揭秘', 'CSSJM', '2016-04-01', '0ba45193-f69c-11e7-a2d5-14dda9555c37.jpg', '本书是一本注重实践的教程，作者为我们揭示了47个鲜为人知的CSS技巧，主要内容包括背景与边框、形状、视觉效果、字体排印、用户体验、结构与布局、过渡与动画等。本书将带领读者循序渐进地探寻更优雅的解决方案，攻克每天都会遇到的各种网页样式难题。', 'e6266400-9ed3-11e7-9297-002522cc5ae9', '9e459984-9ed3-11e7-9297-002522cc5ae9', '5f5f143a-638d-11e7-910c-14dda97c3051', '3', '0');
INSERT INTO `books` VALUES ('3156e11d-a384-11e7-9297-002522cc5ae9', '9787512502369', '周恩来传', 'ZELZ', '2011-11-10', '3156e140-a384-11e7-9297-002522cc5ae9.jpg', '《周恩来传》是2011年7月1日国际文化出版公司出版的一本图书，作者是（英）迪克·威尔逊。[1]  该书是由外国知名学者迪克·威尔逊撰写的周恩来传记，是周恩来传记中最全面、生动和畅销的版本之一', 'e60e2126-9ed3-11e7-9297-002522cc5ae9', '9e5287a7-9ed3-11e7-9297-002522cc5ae9', '0836a269-63a2-11e7-910c-14dda97c3051', '3', '0');
INSERT INTO `books` VALUES ('433d306f-f475-11e7-84b2-54e1adda4205', '9787121300479', 'Learning TypeScript', 'LT', '2016-10-01', 'fe6b7ad2-f474-11e7-84b2-54e1adda4205.jpg', '本书首先介绍了TypeScript 的基本语法和基本的自动化工作流配置方法，然后从面向对象入手，着重介绍了面向对象的概念和它的一些*佳实践，并结合例子讲解了如何基于TypeScript 的类型系统应用这些*佳实践。随后剖析了TypeScript 在编译后的运行时行为，并从性能与测试的角度讲解了如何编写健壮的TypeScript 代码，所以书中还包括了性能分析与测试相关的内容。*后介绍了如何使用TypeScript 结合面向对象、MVC 等概念，结合本书前面提到的自动化的工作流、面向对象*佳实践、性能优化和测试等内容实现一个单页应用（SPA）框架，并用这个框架构建了一个单页应用。', 'e6266400-9ed3-11e7-9297-002522cc5ae9', '9e8fb2e0-9ed3-11e7-9297-002522cc5ae9', '0af4c56b-637e-11e7-910c-14dda97c3051', '2', '0');
INSERT INTO `books` VALUES ('4dca648b-f474-11e7-84b2-54e1adda4205', '9787101077377', '周易', 'ZY', '2011-03-01', 'dacddff5-f473-11e7-84b2-54e1adda4205.jpg', '《周易》被称为“群经之首”，由“经”、“传”两部分组成。“经”称《易经》，包括六十四卦，每卦都有卦象、卦辞、爻辞，是《周易》的主体；“传”由《彖》、《象》、《系辞》、《文言》、《序卦》、《说卦》、《杂卦》共七种十篇构成，称“十翼”，又自成体系而为“易传”。本书以《十三经注疏》中的《周易正义》为底本，采取逐段逐爻注释、翻译、评析的方式，释读文本，详析义理，是兼及《周易》普及与研读的文本。', 'e639715a-9ed3-11e7-9297-002522cc5ae9', '9e58efc5-9ed3-11e7-9297-002522cc5ae9', '6d8523d6-638d-11e7-910c-14dda97c3051', '3', '0');
INSERT INTO `books` VALUES ('4fbc2509-f4e8-11e7-9d97-14dda9555c37', '9787115437303', '深入React技术栈', 'SRRJSZ', '2016-11-01', '079ce81b-f4e8-11e7-9d97-14dda9555c37.jpg', '本书从几个维度去介绍 React。一是作为 View 库，它怎么实现组件化，以及它背后的实现原理。二是扩展到 Flux 应用架构及重要的衍生品 Redux，它们怎么与 React 结合做应用开发。三是对 React 与 server 的碰撞产生的一些思考。四是讲述它在可视化方面的优势与劣势。', 'e6266400-9ed3-11e7-9297-002522cc5ae9', '9e459984-9ed3-11e7-9297-002522cc5ae9', '0af4c56b-637e-11e7-910c-14dda97c3051', '8', '0');
INSERT INTO `books` VALUES ('50005a32-f694-11e7-a2d5-14dda9555c37', '9787807659136', '佛陀传', 'FTZ', '2014-03-01', '11843b3d-f694-11e7-a2d5-14dda9555c37.jpg', '世人似乎是从本书中发现，佛陀从来不是神，而是一个人。他没有任何神通，和我们一样会困惑和痛苦，他也有家人，有妻子和儿子，只是他离开了他们，独自走上了修行成佛，拯救众生的道路。', 'e619cc47-9ed3-11e7-9297-002522cc5ae9', '9e58efc5-9ed3-11e7-9297-002522cc5ae9', '5f5f143a-638d-11e7-910c-14dda97c3051', '2', '0');
INSERT INTO `books` VALUES ('6a61ea51-f4ec-11e7-9d97-14dda9555c37', '9787550273733', '资治通鉴', 'ZZTJ', '2016-05-01', '244df2c9-f4ec-11e7-9d97-14dda9555c37.jpg', '《资治通鉴》，简称“通鉴”，是北宋司马光主编的编年体史书，全书共294卷。它以时间为纲，事件为目，从周威烈王二十三年（公元前403年）写到五代后周世宗显德六年（公元959年），是我国一部编年体通史，也是我国编年史中包含时间很长的一部巨著。', 'e619cc47-9ed3-11e7-9297-002522cc5ae9', '9e58efc5-9ed3-11e7-9297-002522cc5ae9', '0836a269-63a2-11e7-910c-14dda97c3051', '5', '0');
INSERT INTO `books` VALUES ('6eaa9540-f6a4-11e7-a2d5-14dda9555c37', '9787115396860', 'JavaScript设计模式', 'JAVASCRIPTSJMS', '2015-05-01', '2b261306-f6a4-11e7-a2d5-14dda9555c37.jpg', '《JavaScript设计模式》共分六篇四十章，首先讨论了几种函数的编写方式，体会JavaScript在编程中的灵活性；然后讲解了面向对象编程的知识，其中讨论了类的创建、数据的封装以及类之间的继承；最后探讨了各种模式的技术，如简单工厂模式，包括工厂方法模式、抽象工厂模式、建造者模式、原型模式、单例模式，以及外观模式，包括适配器模式。本书还讲解了几种适配器、代理模式、装饰者模式和MVC模式，讨论了如何实现对数据、视图、控制器的分离。在讲解MVP模式时，讨论了如何解决数据与视图之间的耦合，并实现了一个模板生成器；讲解MVVM模式时，讨论了双向绑定对MVC的模式演化。本书几乎包含了关于JavaScript设计模式的全部知识，是进行JavaScript高效编程必备的学习手册。', 'e6266400-9ed3-11e7-9297-002522cc5ae9', '9e459984-9ed3-11e7-9297-002522cc5ae9', '5f5f143a-638d-11e7-910c-14dda97c3051', '3', '0');
INSERT INTO `books` VALUES ('7364d4e4-f695-11e7-a2d5-14dda9555c37', '9787552705065', '图说金刚经', 'TSJGJ', '2015-03-01', '84fef2cd-f694-11e7-a2d5-14dda9555c37.jpg', '本书以鸠摩罗什法师所译《金刚经》为原文，进行通俗易懂的白话文通解，让你轻松理解千余年历久弥新的大智慧。作为国学经典，《金刚经》穷极宇宙，又关怀日常。文中将经文要义与现实生活相联系，进行深入浅出的演说，引发对现实生活的理性思考，给你能断一切执念的智慧。', 'e619cc47-9ed3-11e7-9297-002522cc5ae9', '9e58efc5-9ed3-11e7-9297-002522cc5ae9', '5f5f143a-638d-11e7-910c-14dda97c3051', '3', '0');
INSERT INTO `books` VALUES ('7a0634c0-f69b-11e7-a2d5-14dda9555c37', '9787115335500', '深入浅出Node.js', 'SRQCNODEJS', '2016-09-01', '5802661d-f69b-11e7-a2d5-14dda9555c37.jpg', '《深入浅出Node.js》从不同的视角介绍了 Node 内在的特点和结构。由首章Node 介绍为索引，涉及Node 的各个方面，主要内容包含模块机制的揭示、异步I/O 实现原理的展现、异步编程的探讨、内存控制的介绍、二进制数据Buffer 的细节、Node 中的网络编程基础、Node 中的Web 开发、进程间的消息传递、Node 测试以及通过Node 构建产品需要的注意事项。附录介绍了Node 的安装、调试、编码规范和NPM 仓库等事宜。', 'e6266400-9ed3-11e7-9297-002522cc5ae9', '9e459984-9ed3-11e7-9297-002522cc5ae9', '5f5f143a-638d-11e7-910c-14dda97c3051', '4', '0');
INSERT INTO `books` VALUES ('7fb42da5-a383-11e7-9297-002522cc5ae9', '9787115275790', 'Javascript高级程序设计', 'JAVASCRIPTGJCXSJ', '2012-12-10', '7fb42dc9-a383-11e7-9297-002522cc5ae9.jpg', '作为JavaScript技术经典名著，《JavaScript高级程序设计（第3版）》承继了之前版本全面深入、贴近实战的特点，在详细讲解了JavaScript语言的核心之后，条分缕析地为读者展示了现有规范及实现为开发Web应用提供的各种支持和特性。', 'e6266400-9ed3-11e7-9297-002522cc5ae9', '9e459984-9ed3-11e7-9297-002522cc5ae9', '10166ede-637e-11e7-910c-14dda97c3051', '4', '0');
INSERT INTO `books` VALUES ('80d8e571-a385-11e7-9297-002522cc5ae9', '9787530215593', '活着', 'HZ', '2017-06-01', '80d8e59d-a385-11e7-9297-002522cc5ae9.jpg', '《活着》讲述了人如何去承受巨大的苦难；讲述了眼泪的宽广和丰富；讲述了绝望的不存在；讲述了人是为了活着本身而活着的，而不是为了活着之外的任何事物而活着。', 'e60e2126-9ed3-11e7-9297-002522cc5ae9', '9eb6da0c-9ed3-11e7-9297-002522cc5ae9', '0af4c56b-637e-11e7-910c-14dda97c3051', '1', '0');
INSERT INTO `books` VALUES ('80fea0a8-f693-11e7-a2d5-14dda9555c37', '9787122289407', '孩子爱吃的花式营养早餐', 'HZACDHSYYZC', '2015-12-01', '3315fb49-f693-11e7-a2d5-14dda9555c37.jpg', '本书作者既是一位营养师，又是一位非常有心的妈妈，在儿童早餐营养搭配、菜肴造型、烹饪技巧等方面颇有心得。书中共介绍了60款创意早餐的搭配方案，其中包括60余种花样主食、60余种汤粥饮品、40余种爽口拌菜、30余种热菜小炒、20余种水果拼盘的做法。每道套餐，不仅制作方法非常详尽，还有大量作者亲自总结的小贴士。希望本书能助您省时、省力地做出孩子爱吃的花式营养早餐。', 'e639715a-9ed3-11e7-9297-002522cc5ae9', '9e58efc5-9ed3-11e7-9297-002522cc5ae9', '5f5f143a-638d-11e7-910c-14dda97c3051', '3', '0');
INSERT INTO `books` VALUES ('8c3070dc-f6a2-11e7-a2d5-14dda9555c37', '9787121198854', '高性能MySQL', 'GXNMYSQL', '2013-04-01', '3c05bea7-f6a2-11e7-a2d5-14dda9555c37.jpg', '高性能MySQL（第3版）》是MySQL 领域的经典之作，拥有广泛的影响力。第3 版更新了大量的内容，不但涵盖了MySQL5.5版本的新特性，也讲述了关于固态盘、高可扩展性设计和云计算环境下的数据库相关的新内容，原有的基准测试和性能优化部分也做了大量的扩展和补充。全书共分为16章和6 个附录，内容涵盖MySQL架构和历史，基准测试和性能剖析，数据库软硬件性能优化，复制、备份和恢复，高可用与高可扩展性，以及云端的MySQL和MySQL相关工具等方面的内容。每一章都是相对独立的主题，读者可以有选择性地单独阅读。', 'e6266400-9ed3-11e7-9297-002522cc5ae9', '9e459984-9ed3-11e7-9297-002522cc5ae9', '5f5f143a-638d-11e7-910c-14dda97c3051', '3', '0');
INSERT INTO `books` VALUES ('8ef3ed46-f699-11e7-a2d5-14dda9555c37', '9787115350657', 'HTML5与CSS3基础教程', 'HTMLYCSSJCJC', '2014-05-01', '48f037d2-f699-11e7-a2d5-14dda9555c37.jpg', '《HTML5与CSS3基础教程(第8版)》自第1版至今，一直是讲解HTML和CSS入门知识的经典畅销书，全面系统地阐述HTML5和CSS3基础知识以及实际运用技术，通过大量实例深入浅出地分析了网页制作的方方面面。全新第8版不仅介绍了文本、图像、链接、列表、表格、表单等网页元素，还介绍了如何为网页设计布局、添加动态效果等，另外还涉及调试和发布。《HTML5与CSS3基础教程(第8版)》提供了一个强大的配套网站，上面列出了书中的完整代码示例以及更多优秀实例及进阶参考资料，以供读者参考学习。', 'e6266400-9ed3-11e7-9297-002522cc5ae9', '9e459984-9ed3-11e7-9297-002522cc5ae9', '5f5f143a-638d-11e7-910c-14dda97c3051', '3', '0');
INSERT INTO `books` VALUES ('907b3999-f6a3-11e7-a2d5-14dda9555c37', '9787115216878', '代码整洁之道 ', 'DMZJZD', '2010-01-01', '2244e6d9-f6a3-11e7-a2d5-14dda9555c37.jpg', '软件质量，不但依赖于架构及项目管理，而且与代码质量紧密相关。这一点，无论是敏捷开发流派还是传统开发流派，都不得不承认。《代码整洁之道》提出一种观念：代码质量与其整洁度成正比。干净的代码，既在质量上较为可靠，也为后期维护、升级奠定了良好基础。作为编程领域的佼佼者，《代码整洁之道》作者给出了一系列行之有效的整洁代码操作实践。这些实践在《代码整洁之道》中体现为一条条规则(或称“启示”)，并辅以来自现实项目的正、反两面的范例。只要遵循这些规则，就能编写出干净的代码，从而有效提升代码质量。', 'e6266400-9ed3-11e7-9297-002522cc5ae9', '9e459984-9ed3-11e7-9297-002522cc5ae9', '5f5f143a-638d-11e7-910c-14dda97c3051', '3', '0');
INSERT INTO `books` VALUES ('9926128d-f69a-11e7-a2d5-14dda9555c37', '9787115249999', 'JavaScript DOM编程艺术', 'JAVASCRIPTDOMBCYS', '2011-04-01', '5ba9d14c-f69a-11e7-a2d5-14dda9555c37.jpg', '《JavaScript DOM编程艺术（第2版）》在简洁明快地讲述JavaScript和DOM的基本知识之后，通过几个实例演示了专业水准的网页开发技术，透彻阐述了平稳退化等一批至关重要的JavaScript编程原则和实践，并全面探讨了HTML5以及jQuery等JavaScript库。读者将看到JavaScript、HTML5和CSS如何协作来创建易用的、与标准兼容的Web设计，掌握使用JavaScript和DOM通过客户端动态效果和用户控制的动画来加强Web页面的必备技术；同时，还将对如何利用库提高开发效率有全面深入的理解。', 'e6266400-9ed3-11e7-9297-002522cc5ae9', '9e459984-9ed3-11e7-9297-002522cc5ae9', '5f5f143a-638d-11e7-910c-14dda97c3051', '3', '0');
INSERT INTO `books` VALUES ('9ddc2972-f4e8-11e7-9d97-14dda9555c37', '9787121310683', 'Vue2实践揭秘', 'VSJJM', '2014-04-01', '68ecb4fc-f4e8-11e7-9d97-14dda9555c37.jpg', '本书以Vue2的实践应用为根基，从实际示例入手，详细讲解Vue2的基础理论应用及高级组件开发，通过简明易懂的实例代码，生动地让读者快速、全方位地掌握Vue2的各种入门技巧以及一些在实际项目中的宝贵经验。本书除了全面、细致地讲述Vue2的生态结构、实际编程技巧和一些从实践中得到的经验，还重点介绍如何以组件化编程思想为指导，以前端工程化方法为实现手段来实践Vue2，通过组件的单元测试和E2E测试来保证工程质量。', 'e6266400-9ed3-11e7-9297-002522cc5ae9', '9e8fb2e0-9ed3-11e7-9297-002522cc5ae9', '0af4c56b-637e-11e7-910c-14dda97c3051', '3', '0');
INSERT INTO `books` VALUES ('ac00ecc7-f698-11e7-a2d5-14dda9555c37', '9787807616412', '史记', 'SJ', '2012-10-01', '63ba9724-f698-11e7-a2d5-14dda9555c37.jpg', '《史记》是由司马迁撰写的中国第1部纪传体通史。《史记》最初没有固定书名，或称“太史公书”，或称“太史公传”，也省称“太史公”。“史记”本是古代史书通称，从三国时期开始，“史记”由史书的通称逐渐成为“太史公书”的专称。该书记载了上自上古传说中的黄帝时代，下至汉武帝元狩元年间共3000多年的历史。与后来的《汉书》、《后汉书》、《三国志》合称“前四史”。《史记》参考了众多典籍，如《左传》、《国语》、《世本》、《战国策》、《楚汉春秋》和诸子百家等，同时参考档案、民间古文书籍。司马迁还亲自采访，进行实地调查。', 'e639715a-9ed3-11e7-9297-002522cc5ae9', '9e58efc5-9ed3-11e7-9297-002522cc5ae9', '5f5f143a-638d-11e7-910c-14dda97c3051', '4', '0');
INSERT INTO `books` VALUES ('b3db3b23-f69e-11e7-a2d5-14dda9555c37', '9787115226266', '鸟哥的Linux私房菜', 'NGDLINUXSFC', '2010-07-01', '7bf4ece5-f69e-11e7-a2d5-14dda9555c37.jpg', '《鸟哥的Linux私房菜 （基础学习篇 第三版）》内容丰富全面，基本概念的讲解非常细致，深入浅出。各种功能和命令的介绍，都配以大量的实例操作和详尽的解析。本书是初学者学习Linux不可多得的一本入门好书', 'e6266400-9ed3-11e7-9297-002522cc5ae9', '9e459984-9ed3-11e7-9297-002522cc5ae9', '5f5f143a-638d-11e7-910c-14dda97c3051', '4', '0');
INSERT INTO `books` VALUES ('b67df8f4-f475-11e7-84b2-54e1adda4205', '9787121324758', 'ES6标准入门', 'ESBZRM', '2017-09-01', '858c1b26-f475-11e7-84b2-54e1adda4205.jpg', 'ES6是下一代JavaScript语言标准的统称，每年6月发布一次修订版，迄今为止已经发布了3个版本，分别是ES2015、ES2016、ES2017。《ES6标准入门（第3版）》根据ES2017标准，详尽介绍了所有新增的语法，对基本概念、设计目的和用法进行了清晰的讲解，给出了大量简单易懂的示例。《ES6标准入门（第3版）》为中级难度，适合那些已经对JavaScript语言有一定了解的读者，可以作为学习这门语言全新进展的工具书，也可以作为参考手册供大家随时查阅新语法。 第3版增加了超过30%的内容，完全覆盖了ES2017标准，相比第2版介绍了更多的语法点，还调整了原有章节的文字表达，充实了示例，论述更准确，更易懂易学。', 'e6266400-9ed3-11e7-9297-002522cc5ae9', '9e8fb2e0-9ed3-11e7-9297-002522cc5ae9', '0af4c56b-637e-11e7-910c-14dda97c3051', '4', '0');
INSERT INTO `books` VALUES ('b936c389-f473-11e7-84b2-54e1adda4205', '9787101107401', '孟子', 'MZ', '2015-02-01', '4998d979-f473-11e7-84b2-54e1adda4205.jpg', '孟子是儒家学派主要的代表人物之一，他继承和发展了孔子的学说，被后人尊封为“亚圣”，与孔子合称“孔孟”。所著《孟子》七篇十四卷，为《四书》之一，内容丰富，涉及政治、哲学、伦理、经济、教育、文艺等多个方面，对后世影响深远。本次出版以中华书局《诸子集成》所收焦循的《孟子正义》为底本，约请专家充分借鉴吸收了前人和今人的全新研究成果，注释疑难词句及典故名物；逐篇翻译；每章都作题解，概述该章主旨。在校对文字、注释及作品辨伪、评析方面尽可能汲取先贤时彦的全新研究成果。', 'e639715a-9ed3-11e7-9297-002522cc5ae9', '9e58efc5-9ed3-11e7-9297-002522cc5ae9', '6ace92f9-63a1-11e7-910c-14dda97c3051', '4', '0');
INSERT INTO `books` VALUES ('cd5d1b24-f6a4-11e7-a2d5-14dda9555c37', '9787111550327', '软件测试价值提升之路', 'RJCSJZTSZT', '2016-12-01', 'aa081b32-f6a4-11e7-a2d5-14dda9555c37.jpg', '本书作者根据自己多年测试、研发与实战经验总结了软件测试的实现价值，提出了主要遇到的问题和关键技术。主要内容包括三个部分：第壹部分“引出问题”介绍为何研发、测试自身对测试的价值产生的质疑，以及实践中的测试价值，介绍google、微软、腾讯、华为的测试团队职责，引出测试挑战和价值实现的思路。第二部分“基础价值”介绍测试必须具备的价值，即测试应该有的价值，如发现缺陷、给出性能指标、建设团队的测试能力等。这是进一步拓展测试价值的基础。第三部分“拓展价值”介绍测试可以实现的价值，即测试有条件做到的那些价值，如改善研发过程质量、提升交付效率等。原有的能力加上新的能力和责任，形成值得测试去拓展的、新的价值外延。', 'e6266400-9ed3-11e7-9297-002522cc5ae9', '9e459984-9ed3-11e7-9297-002522cc5ae9', '5f5f143a-638d-11e7-910c-14dda97c3051', '3', '0');
INSERT INTO `books` VALUES ('e23e99fa-f693-11e7-a2d5-14dda9555c37', '9787518400775', '一碗好汤', 'YWHT', '2016-05-01', 'b43a40bd-f693-11e7-a2d5-14dda9555c37.jpg', '对养生而言，喝汤进补益处多。可汤的世界岂止如此，煲汤作为有家庭感的暖胃美食，煲出来的不仅是一碗热汤，同时包含了生活态度，夫妻相处之道，还有亲情的传递。', 'e639715a-9ed3-11e7-9297-002522cc5ae9', '9e58efc5-9ed3-11e7-9297-002522cc5ae9', '5f5f143a-638d-11e7-910c-14dda97c3051', '2', '0');
INSERT INTO `books` VALUES ('e3cca274-f69a-11e7-a2d5-14dda9555c37', '9787115385734', '你不知道的JavaScript', 'NBZDDJAVASCRIPT', '2015-04-01', 'b643b454-f69a-11e7-a2d5-14dda9555c37.jpg', '很多人对JavaScript这门语言的印象都是简单易学，很容易上手。虽然JavaScript语言本身有很多复杂的概念，但语言的使用者不必深入理解这些概念就可以编写出功能全面的应用。殊不知，这些复杂精妙的概念才是语言的精髓，即使是经验丰富的JavaScript开发人员，如果没有认真学习的话也法真正理解它们。在《图灵程序设计丛书：你不知道的JavaScript（上卷）》中，我们要直面当前JavaScript开发者“不求甚解”的大趋势，深入理解语言内部的机制。', 'e6266400-9ed3-11e7-9297-002522cc5ae9', '9e459984-9ed3-11e7-9297-002522cc5ae9', '5f5f143a-638d-11e7-910c-14dda97c3051', '3', '0');
INSERT INTO `books` VALUES ('e7cf6a40-f6a2-11e7-a2d5-14dda9555c37', '9787111213826', 'Java编程思想', 'GXNMYSQL', '2007-04-01', 'b217781a-f6a2-11e7-a2d5-14dda9555c37.jpg', '《计算机科学丛书：Java编程思想（第4版）》赢得了全球程序员的广泛赞誉，即使是晦涩的概念，在BruceEckel的文字亲和力和小而直接的编程示例面前也会化解于无形。从Java的基础语法到高级特性（深入的面向对象概念、多线程、自动项目构建、单元测试和调试等），本书都能逐步指导你轻松掌握。', 'e6266400-9ed3-11e7-9297-002522cc5ae9', '9e459984-9ed3-11e7-9297-002522cc5ae9', '5f5f143a-638d-11e7-910c-14dda97c3051', '5', '0');
INSERT INTO `books` VALUES ('eac2979c-f4e7-11e7-9d97-14dda9555c37', '9787121266775', '高性能JavaScript', 'GXNJS', '2015-08-01', '6d0df67a-f4e7-11e7-9d97-14dda9555c37.jpg', '如果你使用 JavaScript 构建交互丰富的 Web 应用，那么 JavaScript 代码可能是造成你的Web应用速度变慢的主要原因。本书揭示的技术和策略能帮助你在开发过程中消除性能瓶颈。你将会了解如何提升各方面的性能，包括代码的加载、运行、DOM 交互、页面生存周期等。雅虎的前端工程师 Nicholas C. Zakas 和其他五位 JavaScript 专家介绍了页面代码加载的优佳方法和编程技巧，来帮助你编写更为高效和快速的代码。你还会了解到构建和部署文件到生产环境的优佳实践，以及有助于定位线上问题的工具。', 'e6266400-9ed3-11e7-9297-002522cc5ae9', '9ee374d4-9ed3-11e7-9297-002522cc5ae9', '0af4c56b-637e-11e7-910c-14dda97c3051', '3', '0');
INSERT INTO `books` VALUES ('eaead583-f474-11e7-84b2-54e1adda4205', '9787115451583', 'Angular权威教程', 'AQWZN', '22017-03-01', '64dc33d6-f474-11e7-84b2-54e1adda4205.jpg', '本书堪称Angular领域的里程碑式著作，涵盖了关于Angular的几乎所有内容。对于没有经验的人，本书平实、通俗的讲解，递进、严密的组织，可以让人毫无压力地登堂入室，迅速领悟新一代Web应用开发的精髓。如果你有相关经验，那本书对Angular概念和技术细节的全面剖析，以及引人入胜、切中肯綮的讲解，将帮助你彻底掌握这个框架，在自己职业技术修炼之路上更进一步。', 'e6266400-9ed3-11e7-9297-002522cc5ae9', '9e459984-9ed3-11e7-9297-002522cc5ae9', '0af4c56b-637e-11e7-910c-14dda97c3051', '3', '0');
INSERT INTO `books` VALUES ('ede9b689-f4eb-11e7-9d97-14dda9555c37', '9787538693003', '道德经', 'DDJ', '2015-03-01', 'a690900e-f4eb-11e7-9d97-14dda9555c37.jpg', '《道德经》仅五千余言，但文约意丰、博大精深，涵盖哲学、伦理学、政治学、军事学等诸多学科，不仅对中国古老的哲学、科学、政治、宗教等产生了深刻的影响，而且对中华民族的性格铸成、政治的统一与稳定，都起着不可估量的作用。《道德经》做为中国历史上一部完整的哲学著作，被誉为“万经之王”。', 'e619cc47-9ed3-11e7-9297-002522cc5ae9', '9e58efc5-9ed3-11e7-9297-002522cc5ae9', '0836a269-63a2-11e7-910c-14dda97c3051', '4', '0');
INSERT INTO `books` VALUES ('effecbd8-f692-11e7-a2d5-14dda9555c37', '9787122217936', '新编百姓最爱家常菜', 'XBBXZAJCC', '2015-01-01', '9b84ea06-f692-11e7-a2d5-14dda9555c37.jpg', '本书精选百姓很爱吃的美味家常菜、滋补汤煲、花样家常主食，每道菜均配精美成品大图，配以步骤图详解，详细介绍每道家常菜的具体做法，并对每个菜的口味、烹饪难度、操作时间进行贴心提示。本书按照蔬菜类、菌菇类、豆类及豆制品、肉类、海鲜类、蛋奶类分类排序，方便读者使用检索。随书赠送超长120分钟VCD光盘，看大厨演绎美味佳肴！', 'e639715a-9ed3-11e7-9297-002522cc5ae9', '9e58efc5-9ed3-11e7-9297-002522cc5ae9', '0836a269-63a2-11e7-910c-14dda97c3051', '4', '0');
INSERT INTO `books` VALUES ('fc716667-a384-11e7-9297-002522cc5ae9', '9787020008728', '三国演义', 'SGYY', '2006-03-01', 'fc71668b-a384-11e7-9297-002522cc5ae9.jpg', '《三国演义（套装上下册）》是罗贯中在民间传说和有关话本、戏曲的基础上改编而成的。作者通过集中描绘三国时代各封建统治集团之间的政治、军事、外交斗争，揭示了东汉末年社会的动荡和黑暗，谴责了封建统治者的暴虐，反映了民众的苦难和他们呼唤明君、呼唤安定的强烈愿望。 小说塑造了大量栩栩如生的人物，宽厚仁爱的刘备，残暴奸诈的曹操，一身正气的关羽，粗中有细的张飞，还有头戴纶巾、手摇羽扇的诸葛亮，以计谋见长的周瑜和司马懿。他们斗智斗勇的故事早已给人们留下了深刻的印象', 'e60e2126-9ed3-11e7-9297-002522cc5ae9', '9e4c3378-9ed3-11e7-9297-002522cc5ae9', '6d8523d6-638d-11e7-910c-14dda97c3051', '2', '0');

-- ----------------------------
-- Table structure for bookshelves
-- ----------------------------
DROP TABLE IF EXISTS `bookshelves`;
CREATE TABLE `bookshelves` (
  `Id` varchar(36) NOT NULL,
  `BookId` varchar(36) NOT NULL,
  `MemberId` varchar(36) NOT NULL,
  `CreateTime` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bookshelves
-- ----------------------------
INSERT INTO `bookshelves` VALUES ('50d7804d-2540-4755-94e2-cea2d2fae0b6', '907b3999-f6a3-11e7-a2d5-14dda9555c37', 'fe8bad53-93a9-4212-a789-42198908c61d', '1516736046568');
INSERT INTO `bookshelves` VALUES ('6e38e332-0e07-4ab2-a853-e594b227d3fd', '1ef3b360-f69a-11e7-a2d5-14dda9555c37', 'fbb5092a-9a28-4369-87c3-e382cbd3ef51', '1516716175202');
INSERT INTO `bookshelves` VALUES ('8a66063b-30d0-4835-8b39-f8bbd0baf033', '6eaa9540-f6a4-11e7-a2d5-14dda9555c37', 'fbb5092a-9a28-4369-87c3-e382cbd3ef51', '1516716163986');
INSERT INTO `bookshelves` VALUES ('8fc1e19f-0945-4a03-8b6c-6315eed84db1', 'b3db3b23-f69e-11e7-a2d5-14dda9555c37', 'fe8bad53-93a9-4212-a789-42198908c61d', '1516736094460');
INSERT INTO `bookshelves` VALUES ('e1dc3bca-38a3-4b4b-97f9-e6eda1bc5a9e', '8c3070dc-f6a2-11e7-a2d5-14dda9555c37', 'fe8bad53-93a9-4212-a789-42198908c61d', '1516736116128');

-- ----------------------------
-- Table structure for borrowrecords
-- ----------------------------
DROP TABLE IF EXISTS `borrowrecords`;
CREATE TABLE `borrowrecords` (
  `Id` varchar(36) NOT NULL,
  `BorrowNumber` varchar(50) NOT NULL,
  `BookId` varchar(36) NOT NULL,
  `BookNumber` varchar(50) DEFAULT NULL,
  `MemberId` varchar(36) DEFAULT NULL,
  `CreateTime` bigint(20) DEFAULT NULL,
  `SendTime` bigint(20) DEFAULT NULL,
  `ReceiveTime` bigint(20) DEFAULT NULL,
  `State` int(11) DEFAULT NULL COMMENT '0 代表取消,1代表已提交,2代表已配送,3代表已到达分馆，4代表已领取，5代表未领取图书已恢复原始状态',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of borrowrecords
-- ----------------------------
INSERT INTO `borrowrecords` VALUES ('01508b0d-0908-4e12-b2b9-88642a65e6ca', '20180123211354958', '80fea0a8-f693-11e7-a2d5-14dda9555c37', 'J-18011011403610006', '63f5b53d-a8ff-48d0-a6ae-a489130f0f7b', '1516742034958', '1516742121538', null, '4');
INSERT INTO `borrowrecords` VALUES ('02c7c7f2-d1d5-462b-8e5c-2c4a0b2904e4', '201801231854360034', '7fb42da5-a383-11e7-9297-002522cc5ae9', 'G18010911403610042', 'c156031b-164b-486b-b9d0-c941d3a52eaa', '1516733676034', null, null, '0');
INSERT INTO `borrowrecords` VALUES ('4242868d-091b-4456-aa59-8e46104becbd', '20180123133032106', '7fb42da5-a383-11e7-9297-002522cc5ae9', 'G18010911403610042', 'c01a4b9c-306f-46e8-9e29-e62cb223fefc', '1516714232106', '1516714289598', null, '4');
INSERT INTO `borrowrecords` VALUES ('42a27ea6-d982-47e0-acd3-1c7b29b71fd8', '20180123133057377', 'b936c389-f473-11e7-84b2-54e1adda4205', 'J18010910031', '79d658f4-6c0f-4d92-b881-727a8102e46c', '1516714257377', null, null, '0');
INSERT INTO `borrowrecords` VALUES ('4478894d-374c-4529-b529-e6d8cf913992', '20180123212329554', '8ef3ed46-f699-11e7-a2d5-14dda9555c37', 'G-18011114365910003', '6d1d227f-b35e-4790-b3e3-83e1ba3c054d', '1516742609554', '1516742867380', null, '4');
INSERT INTO `borrowrecords` VALUES ('490b6aab-9d9e-4223-9256-d4f3018b8808', '20180123201349690', '1ef3b360-f69a-11e7-a2d5-14dda9555c37', 'G-18011114365910006', '8cb8e945-7c64-44d1-9f98-8e93106d9b6c', '1516738429690', '1516738623957', null, '4');
INSERT INTO `borrowrecords` VALUES ('503f8210-dc2a-4d2e-9e99-a3fcac44c726', '201801231854360034', '8c3070dc-f6a2-11e7-a2d5-14dda9555c37', 'G-18011114365910028', 'c156031b-164b-486b-b9d0-c941d3a52eaa', '1516733676034', null, null, '0');
INSERT INTO `borrowrecords` VALUES ('5a7b369b-9006-4d56-a625-e2e936397aa5', '20180123204710870', '6eaa9540-f6a4-11e7-a2d5-14dda9555c37', 'G-18011116365910044', '8cad2b92-49ec-4461-80b5-b5f6db8bdf00', '1516740430870', null, null, '1');
INSERT INTO `borrowrecords` VALUES ('7780e74a-2442-4f20-8d3d-72bc27f4d74b', '20180123201349690', '8c3070dc-f6a2-11e7-a2d5-14dda9555c37', 'G-18011114365910028', '8cb8e945-7c64-44d1-9f98-8e93106d9b6c', '1516738429690', '1516738624753', null, '2');
INSERT INTO `borrowrecords` VALUES ('7e8aa0d6-1406-4ce8-aee5-724c70df1ba1', '20180123182701386', 'b3db3b23-f69e-11e7-a2d5-14dda9555c37', 'G-18011114365910024', '64166aae-9db6-447a-85f3-a9cbc9743b59', '1516732021386', null, null, '0');
INSERT INTO `borrowrecords` VALUES ('96dfc802-52da-4003-91c5-3a5d73bfdccc', '20180123204710870', '8c3070dc-f6a2-11e7-a2d5-14dda9555c37', 'G-18011114365910029', '8cad2b92-49ec-4461-80b5-b5f6db8bdf00', '1516740430870', '1517064118173', null, '2');
INSERT INTO `borrowrecords` VALUES ('aba5a676-6a5a-4afa-ade1-4845ab6c97a3', '20180123180634257', '6a61ea51-f4ec-11e7-9d97-14dda9555c37', 'J18010910018', '1106582b-49a8-43ae-8c0d-23a7ff8da6d2', '1516730794257', null, null, '0');
INSERT INTO `borrowrecords` VALUES ('b33c9198-82d6-451f-9d5a-a6acc19ea647', '20180123133116331', '2702a075-f69b-11e7-a2d5-14dda9555c37', 'G-18011114365910015', 'fbb5092a-9a28-4369-87c3-e382cbd3ef51', '1516714276331', null, null, '0');
INSERT INTO `borrowrecords` VALUES ('becdff4c-d8f9-4685-bea0-ee10f0bfc5d2', '20180123140018528', '7fb42da5-a383-11e7-9297-002522cc5ae9', 'G18010911403610045', 'fbb5092a-9a28-4369-87c3-e382cbd3ef51', '1516716018528', null, null, '1');
INSERT INTO `borrowrecords` VALUES ('c93d1814-2bd5-46c7-9f80-5559ddf8387a', '20180123211354958', '4fbc2509-f4e8-11e7-9d97-14dda9555c37', 'G18010910015', '63f5b53d-a8ff-48d0-a6ae-a489130f0f7b', '1516742034958', '1516742123582', null, '4');
INSERT INTO `borrowrecords` VALUES ('c9a49a3e-2e5b-457f-90c9-6b1f151b7294', '20180123180432358', '907b3999-f6a3-11e7-a2d5-14dda9555c37', 'G-18011116365910036', 'fe8bad53-93a9-4212-a789-42198908c61d', '1516730672358', '1516730739017', null, '4');
INSERT INTO `borrowrecords` VALUES ('d0c57766-c319-4221-af80-85b170b049c0', '20180123133057377', '50005a32-f694-11e7-a2d5-14dda9555c37', 'E-18011011403610008', '79d658f4-6c0f-4d92-b881-727a8102e46c', '1516714257377', null, null, '1');
INSERT INTO `borrowrecords` VALUES ('d90ed64e-6448-4a31-b642-7e0324c9b8c8', '20180123180634257', '7364d4e4-f695-11e7-a2d5-14dda9555c37', 'E-18011011403610005', '1106582b-49a8-43ae-8c0d-23a7ff8da6d2', '1516730794257', null, null, '1');
INSERT INTO `borrowrecords` VALUES ('d91b2bcb-b750-4d7b-8541-54c3dc6597c4', '20180123180644537', '7fb42da5-a383-11e7-9297-002522cc5ae9', 'G18010911403610042', '1106582b-49a8-43ae-8c0d-23a7ff8da6d2', '1516730804537', '1516730878591', null, '4');
INSERT INTO `borrowrecords` VALUES ('da634e2f-8f0c-4d8a-b189-ddcab1a0b9ad', '201801231804370069', 'b3db3b23-f69e-11e7-a2d5-14dda9555c37', 'G-18011114365910024', 'fe8bad53-93a9-4212-a789-42198908c61d', '1516730677069', '1516730738315', null, '4');
INSERT INTO `borrowrecords` VALUES ('db51e94b-fd96-423c-b1fd-63f460075a9b', '201801231854360034', '4fbc2509-f4e8-11e7-9d97-14dda9555c37', 'G18010910015', 'c156031b-164b-486b-b9d0-c941d3a52eaa', '1516733676034', '1516734007223', null, '4');
INSERT INTO `borrowrecords` VALUES ('de95ac2e-7aa4-453e-b6a3-44ed5b77af69', '20180123132950398', 'e7cf6a40-f6a2-11e7-a2d5-14dda9555c37', 'G-18011116365910034', '81deef02-dd23-4f2a-b796-6f73d27a8df1', '1516714190398', '1516716155954', null, '4');
INSERT INTO `borrowrecords` VALUES ('e325794e-dda8-4fb4-b5af-4ff458a43cef', '20180123201349690', '2702a075-f69b-11e7-a2d5-14dda9555c37', 'G-18011114365910015', '8cb8e945-7c64-44d1-9f98-8e93106d9b6c', '1516738429690', null, null, '1');
INSERT INTO `borrowrecords` VALUES ('e69faae7-607f-4640-8e8f-d2da23ed3a3f', '20180123211729115', 'ede9b689-f4eb-11e7-9d97-14dda9555c37', 'J18010910040', '63f5b53d-a8ff-48d0-a6ae-a489130f0f7b', '1516742249115', null, null, '0');
INSERT INTO `borrowrecords` VALUES ('eb07a012-42ba-493b-acd5-ae1ea5fb1164', '20180127144007148', 'b3db3b23-f69e-11e7-a2d5-14dda9555c37', 'G-18011114365910024', 'ed7a0239-0b96-4dbc-8020-f7b732ed4bd9', '1517064007148', null, null, '0');
INSERT INTO `borrowrecords` VALUES ('eb7dfcac-008d-43f9-98b9-5ad26743b2a2', '20180123133032106', 'b3db3b23-f69e-11e7-a2d5-14dda9555c37', 'G-18011114365910024', 'c01a4b9c-306f-46e8-9e29-e62cb223fefc', '1516714232106', null, null, '0');
INSERT INTO `borrowrecords` VALUES ('f8723eda-5c0d-4944-b2d5-cef594803795', '20180123180426149', '8c3070dc-f6a2-11e7-a2d5-14dda9555c37', 'G-18011114365910028', 'fe8bad53-93a9-4212-a789-42198908c61d', '1516730666149', '1516730739563', null, '4');
INSERT INTO `borrowrecords` VALUES ('f88904cb-736d-4df1-94e1-2adedfda28ca', '20180123182701386', '7fb42da5-a383-11e7-9297-002522cc5ae9', 'G18010911403610042', '64166aae-9db6-447a-85f3-a9cbc9743b59', '1516732021386', '1516732566030', null, '4');

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `Id` varchar(36) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Icon` varchar(255) DEFAULT NULL,
  `Tag` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('e602f602-9ed3-11e7-9297-002522cc5ae9', '军事/政治', '273b8001-9c3b-47a1-b514-f8192741e578.png', 'A');
INSERT INTO `categories` VALUES ('e6080c60-9ed3-11e7-9297-002522cc5ae9', '经济', 'cbb6d81c-0701-4dd7-8903-227700ab6b35.png', 'B');
INSERT INTO `categories` VALUES ('e60e2126-9ed3-11e7-9297-002522cc5ae9', '文学', 'db330a5c-3e5b-4204-98fe-6c88d96b64ce.png', 'C');
INSERT INTO `categories` VALUES ('e6142834-9ed3-11e7-9297-002522cc5ae9', '艺术', '6aa4d167-9669-4426-b016-bcc1f1493745.png', 'D');
INSERT INTO `categories` VALUES ('e619cc47-9ed3-11e7-9297-002522cc5ae9', '哲学/宗教', '400a7f50-d2b6-4a14-b2d3-5954841ad5f6.png', 'E');
INSERT INTO `categories` VALUES ('e61fdfe9-9ed3-11e7-9297-002522cc5ae9', '少儿', '6ad826b4-abad-46ff-b712-050451b6638b.png', 'F');
INSERT INTO `categories` VALUES ('e6266400-9ed3-11e7-9297-002522cc5ae9', '计算机技术', 'd9d25680-bb05-407e-acfd-e82342af8b36.png', 'G');
INSERT INTO `categories` VALUES ('e62d2c99-9ed3-11e7-9297-002522cc5ae9', '医药/卫生', '3633f5af-ac34-445a-b2cf-dccf4d93904f.png', 'H');
INSERT INTO `categories` VALUES ('e632d795-9ed3-11e7-9297-002522cc5ae9', '数理化', '35ff3585-44e9-43fe-9ebe-bd673d19c6bc.png', 'I');
INSERT INTO `categories` VALUES ('e639715a-9ed3-11e7-9297-002522cc5ae9', '其它', '0c37edf3-815a-4fff-8c82-b899fc8f59da.png', 'J');

-- ----------------------------
-- Table structure for libraries
-- ----------------------------
DROP TABLE IF EXISTS `libraries`;
CREATE TABLE `libraries` (
  `Id` varchar(36) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Images` varchar(1024) DEFAULT NULL,
  `Address` varchar(255) NOT NULL,
  `ContactPhone` varchar(50) NOT NULL,
  `Introduce` varchar(1024) DEFAULT NULL,
  `Longitude` decimal(10,0) DEFAULT NULL,
  `Latitude` decimal(10,0) DEFAULT NULL,
  `RegionId` int(11) DEFAULT NULL,
  `OperatorId` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of libraries
-- ----------------------------
INSERT INTO `libraries` VALUES ('125a1f6b-9ed2-11e7-9297-002522cc5ae9', '新浒分馆', null, '高新区浒墅关镇新浒花园一区浒墅关镇教育文体中心一楼', '0512-65368829', '新浒分馆于2011年12月8日开馆，馆内设有成人阅览区、少儿阅览区和电子阅览区。馆藏图书8600余册，其中少儿图书近2300册，音像资料近800盘，报刊100种，供读者免费使用的电脑10台。开放时间为：周一上午闭馆，下午13：00—16：30，周二至周日8：30—16：30。', null, null, '1', null);
INSERT INTO `libraries` VALUES ('2778563a-9ed3-11e7-9297-002522cc5ae9', '文正分馆', null, '吴中区吴中大道1188号苏州大学文正学院学生活动中心一楼108室', '0512-66516412', '苏州图书馆第75家分馆——文正分馆于2016年9月10日正式开馆。该馆位于吴中区吴中大道1188号苏州大学文正学院学生活动中心一楼108室，馆内设有阅览坐席40余个，馆藏图书5000余册。苏州图书馆文正分馆不仅服务于校内广大师生，还服务于周边居民，居民读者进入文正学院可以向保安出示苏州图书馆读者证或身份证或市民卡，并做好相关登记工作。文正分馆对周边居民开放时间为：周一13:00——16:30；周二至周日10:00——16:30。对校内师生开放时间为:周一：13:00——21：00；周二至周日10:00——21:00。', null, null, '4', null);
INSERT INTO `libraries` VALUES ('3a220cfd-4167-4381-9305-f1b1bac4dee5', '测试数据', null, '测试地址', '0512-65566662', '测试简介', '0', '0', '3', '::1');
INSERT INTO `libraries` VALUES ('4e32e737-9ed2-11e7-9297-002522cc5ae9', '白洋湾分馆', null, '城北西路富强新苑白洋湾街道社区服务中心一楼', '0512-69321216', '白洋湾分馆于2009年9月20日开馆，馆藏图书1万多册，报刊100余种，光盘600余片。馆内阅览室座位44个，电子阅览座位10个。该馆设有成人阅览区、电子阅览区和少儿阅读区，馆藏资源丰富多样，阅览环境温馨舒适，开放时间为：周一上午闭馆，下午13:00—17:00；周二至周日9:00—17:00。', null, null, '2', null);
INSERT INTO `libraries` VALUES ('7200253b-9ed2-11e7-9297-002522cc5ae9', '工人文化宫分馆', null, '人民路43号工人文化宫内', '0512-69152802', '工人文化宫分馆于2008年6月18日开馆，馆藏图书8千余册，报刊100种，光盘5百余片。馆内有阅览室座位40个，电子阅览座位10个。该馆设有成人阅览区、电子阅览区，馆藏资源丰富多样，阅览环境温馨舒适，开放时间为：周二至周日9:00-17:00。', null, null, '2', null);
INSERT INTO `libraries` VALUES ('90d21b27-9ed2-11e7-9297-002522cc5ae9', '彩香分馆', null, '彩香二村北社区服务中心二楼', '0512-65707025', '彩香分馆于2012年9月26日开馆，位于彩香二村北社区服务中心二楼，馆内设有成人阅览区、少儿阅览区、公共电子阅览区，是社区居民阅读的好去处。馆藏资源包括图书9千余册，其中少儿图书2千余册，丰富的音像资料，报刊100种，供读者免费使用的电脑10台。开放时间为：周一上午闭馆，下午13：00—17:00，周二至周日9:00—17:00。', null, null, '2', null);
INSERT INTO `libraries` VALUES ('d6953ca5-9ed2-11e7-9297-002522cc5ae9', '相城分馆', null, '相城区采莲路相城区市民活动中心二楼', '0512-65794761', '相城分馆于2009年5月1日开馆，馆藏图书近9万册，报刊300种，光盘4000余片。馆内有成人阅览座位80个，少儿阅览座位118个，影视欣赏厅座位24个，电子阅览座位24个。该馆设有成人阅览区、电子阅览区和少儿阅读区，馆藏资源丰富多样，阅览环境温馨舒适，成人阅览室：周一上午闭馆, 下午13:00—18:00，周二至周日9:00—18:00。少儿阅览室：周一上午闭馆, 下午13:00—18:00，周二至周五 12:00—18:00，周六、周日9:00—18:00。', null, null, '3', null);
INSERT INTO `libraries` VALUES ('da02cb94-9ed1-11e7-9297-002522cc5ae9', '科技城分馆', null, '高新区科创路生活新空间三楼', '0512-66891738', '科技城分馆于2013年7月28日开馆，馆藏图书8300余册，其中少儿书籍2100余册，报刊100种，以及丰富的音像资料等，供读者使用的电脑10台。开放时间为：周一上午闭馆，下午13:00—17:00；周二至周日9:00—17:00。', null, null, '1', null);
INSERT INTO `libraries` VALUES ('fcabf2b7-9ed2-11e7-9297-002522cc5ae9', '阳澄湖分馆', null, '阳澄湖镇文体中心三楼', '0512-66103076', '2014年10月20日，苏州图书馆阳澄湖分馆正式对外开放，这也是苏州图书馆的第66个分馆。馆内设有成人阅览区、少儿阅览区和公共电子阅览区。馆藏图书8000余册，其中少儿图书2000余册，报刊100种，音像资料800余片，以及供读者免费使用的电脑10台。开放时间为：周一上午闭馆，下午13：00-17：00，周二至周日9：00-17：00。', null, null, '3', null);

-- ----------------------------
-- Table structure for members
-- ----------------------------
DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `Id` varchar(36) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `CardId` varchar(18) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `State` int(11) DEFAULT '1',
  `Header` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of members
-- ----------------------------
INSERT INTO `members` VALUES ('1106582b-49a8-43ae-8c0d-23a7ff8da6d2', '18852921997', '*A4B6157319038724E3560894F7F932C8886EBFCF', '卫永健', null, null, '1', null);
INSERT INTO `members` VALUES ('1a464d9d-a53e-42fb-bd69-b3bee48453e2', '18860888219', '*50986C64EC99FF59348B0270C173328F2D8068FE', '汤童阳', null, null, '1', null);
INSERT INTO `members` VALUES ('1e677b65-c29f-4acc-9af5-9d78ce87aefb', '18852923032', '*A4B6157319038724E3560894F7F932C8886EBFCF', '蒋松桓', null, null, '1', null);
INSERT INTO `members` VALUES ('2bc7d115-c1ea-4dc6-9a42-17cd276bc689', '18351251231', '*A4B6157319038724E3560894F7F932C8886EBFCF', '单正鑫', null, null, '1', null);
INSERT INTO `members` VALUES ('3483e683-df1c-4c76-8a61-31befa90e3fe', '18860887855', '*50986C64EC99FF59348B0270C173328F2D8068FE', '李义', null, null, '1', null);
INSERT INTO `members` VALUES ('3a22b942-177a-435b-8458-afa3e4d812ad', '18852676232', '*1D789860557106C6739D9815490F463AAE3101D5', '季巧遇', null, null, '1', null);
INSERT INTO `members` VALUES ('5b2a6294-3282-4d58-b404-b35cd9ac7b4f', '18262739673', '*D142A988197D6E8B1D3D0945283450811637B73F', '孙建强', null, null, '1', null);
INSERT INTO `members` VALUES ('626065fe-ab83-46be-93f5-6183e0863686', '18856167898', '*100F0982DD124C0E7F824C7846BF506C514A45FF', '王星星', null, null, '1', null);
INSERT INTO `members` VALUES ('63f5b53d-a8ff-48d0-a6ae-a489130f0f7b', '13912216738', '*5153F2EB963A0419821A49272B27853A2A4AA748', '纪重阳', null, null, '1', null);
INSERT INTO `members` VALUES ('64166aae-9db6-447a-85f3-a9cbc9743b59', '18852923007', '*3A2B68CC64C95A65747DFE97E08958470E66E211', '曹锡梅', null, null, '1', null);
INSERT INTO `members` VALUES ('6d1d227f-b35e-4790-b3e3-83e1ba3c054d', '18852921836', '*C05C68552A6E2FC59ECC2FF0C50D51BB930F47FC', '黎文浩', null, null, '1', null);
INSERT INTO `members` VALUES ('79d658f4-6c0f-4d92-b881-727a8102e46c', '15250309134', '*3516FF22C40603F4714EAD4516E3254D2AEEBC2D', '黄仪人', null, null, '1', null);
INSERT INTO `members` VALUES ('7b0bf093-c6ed-42eb-843b-4bbb02200411', '15190200582', '*147539D1C58BEC00B930DA2687D29E6082B91A3B', '费善超', null, null, '1', null);
INSERT INTO `members` VALUES ('81deef02-dd23-4f2a-b796-6f73d27a8df1', '18852676219', '*AC82F5D92D29647A10EBCF2FF04AC98A1747AB59', '乔修畅', null, null, '1', null);
INSERT INTO `members` VALUES ('8c95705e-a9fc-43c9-aa72-ec592512a146', '18852676201', '*34E1C14A16EA6095B480B98B7D232179AB37E4A8', '蔡星伟', null, null, '1', null);
INSERT INTO `members` VALUES ('8cad2b92-49ec-4461-80b5-b5f6db8bdf00', '18852923009', '*A4B6157319038724E3560894F7F932C8886EBFCF', '马超', null, null, '1', null);
INSERT INTO `members` VALUES ('8cb8e945-7c64-44d1-9f98-8e93106d9b6c', '18852921870', '*887346B03C5208BADF6FD5DCE70EAA4B67A2BA02', '吕鑫', null, null, '1', null);
INSERT INTO `members` VALUES ('8d54cac5-14e9-450a-a753-7693bc3d8110', '18852676237', '*A4B6157319038724E3560894F7F932C8886EBFCF', '陆盈盈', null, null, '1', null);
INSERT INTO `members` VALUES ('a54a65ac-76d0-47e6-9b95-3ba8fe7c8013', '18550839198', '*FFA17CEAC4DE9A222E779FFAD5F08D12DD457534', '朱仲凯', null, null, '1', null);
INSERT INTO `members` VALUES ('a58aaee6-5028-4e04-8708-8c99d8debdbf', '18852676056', '*F987EC318AD43FCAFD7BBBBD89D6A30600A0E7DD', '包敏雅', null, null, '1', null);
INSERT INTO `members` VALUES ('b68b53a9-6ff6-4d99-979c-6c0ce26b973f', '18852921901', '*88DF90A36BE189069858E2E5D703ADDD8B965C86', '王梦婷', null, null, '1', null);
INSERT INTO `members` VALUES ('c01a4b9c-306f-46e8-9e29-e62cb223fefc', '15250575165', '*A60F7E6730E26AD6B0927B73FB3F1EEC56E8E0FD', '谢贝尔', null, null, '1', null);
INSERT INTO `members` VALUES ('c146797c-d985-4be4-b1ef-d209207868b6', '18852676213', '*2A016EDF18413DA29F0B16903FE304BF6FB53CA8', '张睿', null, null, '1', null);
INSERT INTO `members` VALUES ('c156031b-164b-486b-b9d0-c941d3a52eaa', '18852921771', '*63A7F817CD0A5D5E5DB9DDF20A71AC8B7C412367', '汤秋瑶', null, null, '1', null);
INSERT INTO `members` VALUES ('c857efa2-11af-4f95-b931-e2a59a146cfb', '18860887990', '*B09C53CBB2DC21142A81CB191FE7989D2B64F34B', '黄买银', null, null, '1', null);
INSERT INTO `members` VALUES ('dfc43499-321f-4892-9c6f-d0f3c9528c74', '18362790211', '*AC7522C93FEDC81C2D15E2A94816C45A62248361', '张迪雅', null, null, '1', null);
INSERT INTO `members` VALUES ('e3383f91-04fe-4882-8bc1-247d4fccd827', '18251162021', '*25AE76C66D9817468BD074E861A5A8A2403F36C9', '刘晔玲', null, null, '1', null);
INSERT INTO `members` VALUES ('ed7a0239-0b96-4dbc-8020-f7b732ed4bd9', '13962368183', '*A4B6157319038724E3560894F7F932C8886EBFCF', '吴怡婷', null, null, '1', null);
INSERT INTO `members` VALUES ('fbb5092a-9a28-4369-87c3-e382cbd3ef51', '18852676220', '*30EA8285C8F41CEB8D5648A57C9723628E3366F3', '陈锁', null, null, '1', null);
INSERT INTO `members` VALUES ('fe8bad53-93a9-4212-a789-42198908c61d', '18852921939', '*7CF961FABB9581FA5A482662B2F934686310E985', '冯佳', null, null, '1', null);

-- ----------------------------
-- Table structure for publishers
-- ----------------------------
DROP TABLE IF EXISTS `publishers`;
CREATE TABLE `publishers` (
  `Id` varchar(36) NOT NULL,
  `Name` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of publishers
-- ----------------------------
INSERT INTO `publishers` VALUES ('9e345528-9ed3-11e7-9297-002522cc5ae9', '接力出版社');
INSERT INTO `publishers` VALUES ('9e3abae6-9ed3-11e7-9297-002522cc5ae9', '科学出版社');
INSERT INTO `publishers` VALUES ('9e4022de-9ed3-11e7-9297-002522cc5ae9', '清华大学出版社');
INSERT INTO `publishers` VALUES ('9e459984-9ed3-11e7-9297-002522cc5ae9', '人民邮电出版社');
INSERT INTO `publishers` VALUES ('9e4c3378-9ed3-11e7-9297-002522cc5ae9', '商务印书馆');
INSERT INTO `publishers` VALUES ('9e5287a7-9ed3-11e7-9297-002522cc5ae9', '人民文学出版社');
INSERT INTO `publishers` VALUES ('9e58efc5-9ed3-11e7-9297-002522cc5ae9', '中华书局');
INSERT INTO `publishers` VALUES ('9e60d854-9ed3-11e7-9297-002522cc5ae9', '三辰影库音像出版社');
INSERT INTO `publishers` VALUES ('9e696bd8-9ed3-11e7-9297-002522cc5ae9', '现代出版社');
INSERT INTO `publishers` VALUES ('9e6fdbbc-9ed3-11e7-9297-002522cc5ae9', '广东人民出版社');
INSERT INTO `publishers` VALUES ('9e76335e-9ed3-11e7-9297-002522cc5ae9', '民主与建设出版社');
INSERT INTO `publishers` VALUES ('9e7c8817-9ed3-11e7-9297-002522cc5ae9', '江西教育出版社');
INSERT INTO `publishers` VALUES ('9e82f069-9ed3-11e7-9297-002522cc5ae9', '长江文艺出版社');
INSERT INTO `publishers` VALUES ('9e8972c1-9ed3-11e7-9297-002522cc5ae9', '北京联合出版有限公司');
INSERT INTO `publishers` VALUES ('9e8fb2e0-9ed3-11e7-9297-002522cc5ae9', '机械工业出版社');
INSERT INTO `publishers` VALUES ('9e971e85-9ed3-11e7-9297-002522cc5ae9', '工人出版社');
INSERT INTO `publishers` VALUES ('9e9c3bac-9ed3-11e7-9297-002522cc5ae9', '中信出版社');
INSERT INTO `publishers` VALUES ('9ea2934f-9ed3-11e7-9297-002522cc5ae9', '东方出版社');
INSERT INTO `publishers` VALUES ('9ea9bc4c-9ed3-11e7-9297-002522cc5ae9', '中国友谊出版公司');
INSERT INTO `publishers` VALUES ('9eaf6d82-9ed3-11e7-9297-002522cc5ae9', '湖南科技出版社');
INSERT INTO `publishers` VALUES ('9eb6da0c-9ed3-11e7-9297-002522cc5ae9', '华东师范大学出版社');
INSERT INTO `publishers` VALUES ('9ebcfb20-9ed3-11e7-9297-002522cc5ae9', '人民出版社');
INSERT INTO `publishers` VALUES ('9ec2524a-9ed3-11e7-9297-002522cc5ae9', '北京时代华文书局');
INSERT INTO `publishers` VALUES ('9ecb737b-9ed3-11e7-9297-002522cc5ae9', '上海文艺出版社');
INSERT INTO `publishers` VALUES ('9ed1a0dd-9ed3-11e7-9297-002522cc5ae9', '湖南文艺出版社');
INSERT INTO `publishers` VALUES ('9ed6c18c-9ed3-11e7-9297-002522cc5ae9', '四川文艺出版社');
INSERT INTO `publishers` VALUES ('9edd359e-9ed3-11e7-9297-002522cc5ae9', '九州出版社');
INSERT INTO `publishers` VALUES ('9ee374d4-9ed3-11e7-9297-002522cc5ae9', '电子工业出版社');

-- ----------------------------
-- Table structure for sections
-- ----------------------------
DROP TABLE IF EXISTS `sections`;
CREATE TABLE `sections` (
  `Id` varchar(36) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Priority` int(11) NOT NULL DEFAULT '100',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sections
-- ----------------------------
INSERT INTO `sections` VALUES ('58f4bfc4-f69f-11e7-a2d5-14dda9555c37', '图书排行榜', '98');
INSERT INTO `sections` VALUES ('65dcc36c-f4dc-11e7-9d97-14dda9555c37', '馆长推荐', '100');
INSERT INTO `sections` VALUES ('65f0cd39-f4dc-11e7-9d97-14dda9555c37', '新书推荐', '99');
