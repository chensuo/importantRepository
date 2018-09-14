/*
Navicat MySQL Data Transfer

Source Server         : cs
Source Server Version : 50557
Source Host           : 192.168.12.120:3306
Source Database       : frontierdb

Target Server Type    : MYSQL
Target Server Version : 50557
File Encoding         : 65001

Date: 2018-03-15 16:58:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `Id` varchar(36) NOT NULL,
  `Phone` varchar(36) NOT NULL,
  `Name` varchar(36) NOT NULL,
  `Password` varchar(36) NOT NULL,
  `Header` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('2ea7f688-24f7-11e8-84b0-14dda97c5664', '18852676220', 'Mr.chen', '6220', '972a1879-2125-11e8-8cc7-14dda97c5664.jpg');

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `Id` varchar(36) NOT NULL,
  `NoteId` varchar(36) NOT NULL,
  `MemberId` varchar(36) NOT NULL,
  `Content` text,
  `Image` varchar(255) DEFAULT '',
  `Time` varchar(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comments
-- ----------------------------
INSERT INTO `comments` VALUES ('1ce285d8-2137-11e8-8cc7-14dda97c5664', 'b27a39cc-2103-11e8-8cc7-14dda97c5664', '4c08ed72-20ff-11e8-8cc7-14dda97c5664', '', '14bff9e3-2137-11e8-8cc7-14dda97c5664.jpg', '1520338122');
INSERT INTO `comments` VALUES ('1e8ff999-234c-11e8-b40d-14dda97c5664', 'b27a39cc-2103-11e8-8cc7-14dda97c5664', '0a623fe9-2043-11e8-9c83-14dda97c5664', '123', '', '1520567047');
INSERT INTO `comments` VALUES ('22dcce0a-2353-11e8-b40d-14dda97c5664', '6c9a09e0-21b8-11e8-add4-14dda97c5664', '0a623fe9-2043-11e8-9c83-14dda97c5664', '我要回复', '', '1520570061');
INSERT INTO `comments` VALUES ('2bad2c2e-2362-11e8-b40d-14dda97c5664', '741c0ed5-2103-11e8-8cc7-14dda97c5664', '0a623fe9-2043-11e8-9c83-14dda97c5664', '付汇11', '', '1520576518');
INSERT INTO `comments` VALUES ('2e70a349-234d-11e8-b40d-14dda97c5664', 'f100b941-2103-11e8-8cc7-14dda97c5664', '0a623fe9-2043-11e8-9c83-14dda97c5664', '1234', '', '1520567503');
INSERT INTO `comments` VALUES ('30c62457-234c-11e8-b40d-14dda97c5664', 'b27a39cc-2103-11e8-8cc7-14dda97c5664', '0a623fe9-2043-11e8-9c83-14dda97c5664', '22222', '', '1520567077');
INSERT INTO `comments` VALUES ('320e3c2a-235f-11e8-b40d-14dda97c5664', '2f6bc11b-2103-11e8-8cc7-14dda97c5664', '0a623fe9-2043-11e8-9c83-14dda97c5664', '回复', '', '1520575240');
INSERT INTO `comments` VALUES ('3638207c-234d-11e8-b40d-14dda97c5664', 'f100b941-2103-11e8-8cc7-14dda97c5664', '0a623fe9-2043-11e8-9c83-14dda97c5664', '试验发帖', '', '1520567516');
INSERT INTO `comments` VALUES ('38f6c8cc-2362-11e8-b40d-14dda97c5664', 'b2f7e7f3-2102-11e8-8cc7-14dda97c5664', '0a623fe9-2043-11e8-9c83-14dda97c5664', '回帖', '', '1520576540');
INSERT INTO `comments` VALUES ('3a37e8ac-235f-11e8-b40d-14dda97c5664', '7144625f-2102-11e8-8cc7-14dda97c5664', '0a623fe9-2043-11e8-9c83-14dda97c5664', '牛', '', '1520575254');
INSERT INTO `comments` VALUES ('42db57ad-234d-11e8-b40d-14dda97c5664', 'f100b941-2103-11e8-8cc7-14dda97c5664', '0a623fe9-2043-11e8-9c83-14dda97c5664', '试验发帖2', '', '1520567537');
INSERT INTO `comments` VALUES ('46acdfc1-235f-11e8-b40d-14dda97c5664', '7144625f-2102-11e8-8cc7-14dda97c5664', '0a623fe9-2043-11e8-9c83-14dda97c5664', '真的牛', '', '1520575275');
INSERT INTO `comments` VALUES ('602b1d0b-234e-11e8-b40d-14dda97c5664', 'f100b941-2103-11e8-8cc7-14dda97c5664', '0a623fe9-2043-11e8-9c83-14dda97c5664', '123', '', '1520568016');
INSERT INTO `comments` VALUES ('627761f3-234e-11e8-b40d-14dda97c5664', 'f100b941-2103-11e8-8cc7-14dda97c5664', '0a623fe9-2043-11e8-9c83-14dda97c5664', '222', '', '1520568020');
INSERT INTO `comments` VALUES ('6ec2808d-234b-11e8-b40d-14dda97c5664', 'b27a39cc-2103-11e8-8cc7-14dda97c5664', '0a623fe9-2043-11e8-9c83-14dda97c5664', '', '', '1520566752');
INSERT INTO `comments` VALUES ('73065074-234c-11e8-b40d-14dda97c5664', 'b27a39cc-2103-11e8-8cc7-14dda97c5664', '0a623fe9-2043-11e8-9c83-14dda97c5664', '3333', '', '1520567188');
INSERT INTO `comments` VALUES ('79ce326d-234d-11e8-b40d-14dda97c5664', 'f100b941-2103-11e8-8cc7-14dda97c5664', '0a623fe9-2043-11e8-9c83-14dda97c5664', '试验发帖3', '', '1520567629');
INSERT INTO `comments` VALUES ('7a33c546-234b-11e8-b40d-14dda97c5664', 'b27a39cc-2103-11e8-8cc7-14dda97c5664', '0a623fe9-2043-11e8-9c83-14dda97c5664', '', '', '1520566771');
INSERT INTO `comments` VALUES ('7f8169ae-234d-11e8-b40d-14dda97c5664', 'f100b941-2103-11e8-8cc7-14dda97c5664', '0a623fe9-2043-11e8-9c83-14dda97c5664', '试验发帖4', '', '1520567639');
INSERT INTO `comments` VALUES ('8405156f-234d-11e8-b40d-14dda97c5664', 'f100b941-2103-11e8-8cc7-14dda97c5664', '0a623fe9-2043-11e8-9c83-14dda97c5664', '试验发帖5', '', '1520567647');
INSERT INTO `comments` VALUES ('86b17a20-234c-11e8-b40d-14dda97c5664', 'f100b941-2103-11e8-8cc7-14dda97c5664', '0a623fe9-2043-11e8-9c83-14dda97c5664', '没有问题', '', '1520567221');
INSERT INTO `comments` VALUES ('88107df3-234b-11e8-b40d-14dda97c5664', 'b27a39cc-2103-11e8-8cc7-14dda97c5664', '0a623fe9-2043-11e8-9c83-14dda97c5664', '', '', '1520566794');
INSERT INTO `comments` VALUES ('883fa876-234d-11e8-b40d-14dda97c5664', 'f100b941-2103-11e8-8cc7-14dda97c5664', '0a623fe9-2043-11e8-9c83-14dda97c5664', '试验发帖6', '', '1520567654');
INSERT INTO `comments` VALUES ('8c8e56b1-234d-11e8-b40d-14dda97c5664', 'f100b941-2103-11e8-8cc7-14dda97c5664', '0a623fe9-2043-11e8-9c83-14dda97c5664', '实验法', '', '1520567661');
INSERT INTO `comments` VALUES ('8d920810-2361-11e8-b40d-14dda97c5664', '6c9a09e0-21b8-11e8-add4-14dda97c5664', '0a623fe9-2043-11e8-9c83-14dda97c5664', '回帖', '', '1520576253');
INSERT INTO `comments` VALUES ('8e67843f-27ef-11e8-b623-14dda97c5664', '', '', '', '', '1521077047');
INSERT INTO `comments` VALUES ('8ec9bfe9-27ef-11e8-b623-14dda97c5664', '', '', '', '', '1521077048');
INSERT INTO `comments` VALUES ('9107f38b-2391-11e8-b40d-14dda97c5664', '2f6bc11b-2103-11e8-8cc7-14dda97c5664', '0a623fe9-2043-11e8-9c83-14dda97c5664', '帅气', '', '1520596874');
INSERT INTO `comments` VALUES ('9dad5d94-235f-11e8-b40d-14dda97c5664', '6ae861ae-21b6-11e8-add4-14dda97c5664', '0a623fe9-2043-11e8-9c83-14dda97c5664', '看不懂', '', '1520575421');
INSERT INTO `comments` VALUES ('9f19b850-27fc-11e8-b623-14dda97c5664', '1cb8a7f6-27fc-11e8-b623-14dda97c5664', '4bf05fe5-20ff-11e8-8cc7-14dda97c5664', '评论你', '', '1521082659');
INSERT INTO `comments` VALUES ('a2696256-2136-11e8-8cc7-14dda97c5664', 'b27a39cc-2103-11e8-8cc7-14dda97c5664', '4c08ed72-20ff-11e8-8cc7-14dda97c5664', '', '8317c58b-2136-11e8-8cc7-14dda97c5664.jpg', '1520337917');
INSERT INTO `comments` VALUES ('a7cac8c3-2394-11e8-b40d-14dda97c5664', '6c9a09e0-21b8-11e8-add4-14dda97c5664', 'c60a8631-21b3-11e8-add4-14dda97c5664', '不错不错', '', '1520598201');
INSERT INTO `comments` VALUES ('abd7f4ff-234d-11e8-b40d-14dda97c5664', '741c0ed5-2103-11e8-8cc7-14dda97c5664', '0a623fe9-2043-11e8-9c83-14dda97c5664', '楼主发帖效果', '', '1520567713');
INSERT INTO `comments` VALUES ('af70a455-2394-11e8-b40d-14dda97c5664', '6ae861ae-21b6-11e8-add4-14dda97c5664', 'c60a8631-21b3-11e8-add4-14dda97c5664', '很帅', '', '1520598214');
INSERT INTO `comments` VALUES ('baf39ece-235f-11e8-b40d-14dda97c5664', '6c9a09e0-21b8-11e8-add4-14dda97c5664', '0a623fe9-2043-11e8-9c83-14dda97c5664', '真心求学', '', '1520575470');
INSERT INTO `comments` VALUES ('bccdf7d7-2132-11e8-8cc7-14dda97c5664', 'b27a39cc-2103-11e8-8cc7-14dda97c5664', '4bfe31a1-20ff-11e8-8cc7-14dda97c5664', '这是真的帅！\r\n可是我没有钱！', '', '1520336243');
INSERT INTO `comments` VALUES ('bea08502-2132-11e8-8cc7-14dda97c5664', 'b27a39cc-2103-11e8-8cc7-14dda97c5664', '4c08ed72-20ff-11e8-8cc7-14dda97c5664', '', 'ab290e4b-2132-11e8-8cc7-14dda97c5664.jpg', '1520336246');
INSERT INTO `comments` VALUES ('c1c5085f-269d-11e8-8126-14dda97c5664', '80104427-2392-11e8-b40d-14dda97c5664', '0a623fe9-2043-11e8-9c83-14dda97c5664', '1111', '', '1520931964');
INSERT INTO `comments` VALUES ('c6bdb768-235f-11e8-b40d-14dda97c5664', '741c0ed5-2103-11e8-8cc7-14dda97c5664', '0a623fe9-2043-11e8-9c83-14dda97c5664', '我是老大', '', '1520575489');
INSERT INTO `comments` VALUES ('c91c6f8a-269b-11e8-8126-14dda97c5664', '80104427-2392-11e8-b40d-14dda97c5664', '0a623fe9-2043-11e8-9c83-14dda97c5664', '123', '', '1520931117');
INSERT INTO `comments` VALUES ('d6832c0c-2821-11e8-b623-14dda97c5664', '1cb8a7f6-27fc-11e8-b623-14dda97c5664', '0a623fe9-2043-11e8-9c83-14dda97c5664', '我是楼主', '', '1521098643');
INSERT INTO `comments` VALUES ('dab4bb22-2352-11e8-b40d-14dda97c5664', '6ae861ae-21b6-11e8-add4-14dda97c5664', '0a623fe9-2043-11e8-9c83-14dda97c5664', '123', '', '1520569939');
INSERT INTO `comments` VALUES ('dd6a32e1-2821-11e8-b623-14dda97c5664', '1cb8a7f6-27fc-11e8-b623-14dda97c5664', '0a623fe9-2043-11e8-9c83-14dda97c5664', '我是老大', '', '1521098655');
INSERT INTO `comments` VALUES ('f0db4804-2356-11e8-b40d-14dda97c5664', '6c9a09e0-21b8-11e8-add4-14dda97c5664', '0a623fe9-2043-11e8-9c83-14dda97c5664', '回复测试', '', '1520571695');
INSERT INTO `comments` VALUES ('ff277094-2136-11e8-8cc7-14dda97c5664', 'b27a39cc-2103-11e8-8cc7-14dda97c5664', '4c08ed72-20ff-11e8-8cc7-14dda97c5664', '', 'f9473344-2136-11e8-8cc7-14dda97c5664.jpg', '1520338073');

-- ----------------------------
-- Table structure for floors
-- ----------------------------
DROP TABLE IF EXISTS `floors`;
CREATE TABLE `floors` (
  `Id` varchar(36) NOT NULL,
  `FloorId` varchar(36) NOT NULL,
  `MemberId` varchar(36) NOT NULL,
  `Content` varchar(5000) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of floors
-- ----------------------------

-- ----------------------------
-- Table structure for members
-- ----------------------------
DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `Id` varchar(36) NOT NULL,
  `Phone` varchar(11) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Header` varchar(255) DEFAULT '',
  `Time` varchar(255) DEFAULT '1520336243',
  `Sex` enum('女','男') DEFAULT '男',
  `Email` varchar(255) DEFAULT NULL,
  `Sign` varchar(30) DEFAULT NULL,
  `Star` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Id`,`Phone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of members
-- ----------------------------
INSERT INTO `members` VALUES ('0a623fe9-2043-11e8-9c83-14dda97c5664', '18852676220', '6220', '陈锁', 'http://101.200.58.3/OSSWebsite/res/c0e0ea8c-bb31-4f59-a205-7caf8663fa0e.jpg', null, '男', 'cs912143816@163.com', '我爱敲代码1', '白羊座');
INSERT INTO `members` VALUES ('1d7104af-2269-11e8-a8dc-14dda97c5664', '18852676230', '6220', '沙悟净', '', '1520469549', '男', null, null, null);
INSERT INTO `members` VALUES ('34b86b5d-21b4-11e8-add4-14dda97c5664', '18852676228', '1595', '唐三藏', 'http://101.200.58.3/OSSWebsite/res/01e2dbba-38da-480c-a7ae-7ddc122536ea.png', '1520391849', '男', '1512143816@163.com', '', '');
INSERT INTO `members` VALUES ('425b75c8-2144-11e8-8cc7-14dda97c5664', '18852676225', '6220', '李白', 'http://101.200.58.3/OSSWebsite/res/67671813-98d6-45b8-871a-e30f94812f65.png', '1520336243', '男', null, '', '');
INSERT INTO `members` VALUES ('4bf05fe5-20ff-11e8-8cc7-14dda97c5664', '18852676221', '6220', 'cs不是onlie', 'http://101.200.58.3/OSSWebsite/res/1697fe12-c34f-4efd-8479-1781a06712fc.jpg', null, '男', '912143816@qq.com', '习惯坚持就不觉得累！', '天蝎座');
INSERT INTO `members` VALUES ('4bfe31a1-20ff-11e8-8cc7-14dda97c5664', '18852676222', '6220', '小蹦蹦', 'http://101.200.58.3/OSSWebsite/res/5cfce7f1-0158-4405-b5ad-a3122fd46cc5.jpg', null, '男', 'cs1461728654@qq.com', '', '');
INSERT INTO `members` VALUES ('4c02fff7-20ff-11e8-8cc7-14dda97c5664', '18852676223', '6220', '哒哒哒', 'http://101.200.58.3/OSSWebsite/res/a128667d-8bf0-456b-95bb-770ab2db4a00.jpg', null, '女', '', '我爱敲代码!', '巨蟹座');
INSERT INTO `members` VALUES ('4c08ed72-20ff-11e8-8cc7-14dda97c5664', '18852676224', '6220', '张三丰', 'http://101.200.58.3/OSSWebsite/res/7fbc84a6-806f-401d-81cc-e5fc6dad2397.png', null, '男', null, '', '');
INSERT INTO `members` VALUES ('54bb10d5-21b4-11e8-add4-14dda97c5664', '18852676229', '6220', '孙悟空', 'http://101.200.58.3/OSSWebsite/res/5a59125e-8040-49e7-8634-43f78ce07e45.png', '1520391903', '男', null, '', '');
INSERT INTO `members` VALUES ('c60a8631-21b3-11e8-add4-14dda97c5664', '18852676226', '6220', '杜甫', 'http://101.200.58.3/OSSWebsite/res/356c6589-1076-416f-8bd3-d9d67d48ff84.png', '1520336243', '男', null, '', '');
INSERT INTO `members` VALUES ('dfd72e7d-2208-11e8-a7fd-14dda97c5664', '18852676201', '6220', 'caixingwei', '', '1520428214', '男', null, null, null);
INSERT INTO `members` VALUES ('f3f5ed76-21b3-11e8-add4-14dda97c5664', '18852676227', '6220', '杜牧', 'http://101.200.58.3/OSSWebsite/res/f802a28d-2e6a-496d-8996-72a4616093cb.jpg', '1520336243', '女', null, '', '天秤座');

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `PositionId` int(11) NOT NULL AUTO_INCREMENT,
  `Id` varchar(36) NOT NULL,
  `SectionId` varchar(36) NOT NULL,
  `Title` varchar(40) NOT NULL,
  `Intro` varchar(1024) NOT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Content` text NOT NULL,
  `Time` varchar(20) NOT NULL,
  `FlowerNum` int(11) DEFAULT '0',
  `EggNum` int(11) DEFAULT '0',
  `ReadNum` int(255) DEFAULT '0',
  `Image1` varchar(255) DEFAULT NULL,
  `Image2` varchar(255) DEFAULT NULL,
  `Image3` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`PositionId`,`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('1', '8d3bd806-206f-11e8-9c83-14dda97c5664', '87c8a518-204a-11e8-9c83-14dda97c5664', '太阳能电池的发展历史与特点', '太阳能电池是一种近年发展起来的新型的电池。太阳能电池是利用光电转换原理使太阳的辐射光通过半导体物质转变为电能的一种器件，这种光电转换过程通常叫做“光生伏打效应”，因此太阳能电池又称为“光伏电池”，用于 ...', null, '太阳能电池是一种近年发展起来的新型的电池。太阳能电池是利用光电转换原理使太阳的辐射光通过半导体物质转变为电能的一种器件，这种光电转换过程通常叫做“光生伏打效应”，因此太阳能电池又称为“光伏电池”，用于太阳能电池的半导体材料是一种介于导体和绝缘体之间的特殊物质，即半导体材料。1962年就开始有带有太阳能电池的电子产品出现。现在，低成本太阳能电池的开发已列入许多国家的开发计划，美国能源部、日本通产省和澳大利亚都制定了阳光计划以对高效率低成本太阳能电池进行技术开发。人类很早以前就已梦想能直接从太阳光得到所需的能量，而太阳能利用的现代科学研究则始于1845年，一位奥地利人C.Gunter发明了由许多镜片组成的太阳能锅炉。', '1520252414', '0', '0', '83', null, null, null);
INSERT INTO `news` VALUES ('2', '99a0cc1f-205c-11e8-9c83-14dda97c5664', '87c8a518-204a-11e8-9c83-14dda97c5664', '太阳能电池板', '太阳能电池板，从图片上看，这个楼顶瓦好象是专门为入神款太阳能电池板设计的。', 'd2f3cb32-205a-11e8-9c83-14dda97c5664.jpg', '太阳能电池板，从图片上看，这个楼顶瓦好象是专门为入神款太阳能电池板设计的。', '1520244274', '0', '0', '20', null, null, null);
INSERT INTO `news` VALUES ('3', '9c1f7644-205c-11e8-9c83-14dda97c5664', '87c8a518-204a-11e8-9c83-14dda97c5664', '在以色列的未来太阳能动力树', '第一个太阳能电站的设计看起来像一棵树，为用户提供免费的Wi-Fi充电站，座位和凉爽的饮用水。eTree将在以色列的其他城市上市，计划将在全球发布。eTree于2014年10月在以色列Ramat Hanadiv的可持续发展花园成功推出。 ...', '776c3004-205b-11e8-9c83-14dda97c5664.jpg', '第一个太阳能电站的设计看起来像一棵树，为用户提供免费的Wi-Fi充电站，座位和凉爽的饮用水。eTree将在以色列的其他城市上市，计划将在全球发布。eTree于2014年10月在以色列Ramat Hanadiv的可持续发展花园成功推出。', '1520244279', '0', '0', '27', '8bd28eef-205b-11e8-9c83-14dda97c5664.jpg', '9d79ecdc-205b-11e8-9c83-14dda97c5664.jpg', 'b27965cf-205b-11e8-9c83-14dda97c5664.jpg');
INSERT INTO `news` VALUES ('4', '9dff80f3-205c-11e8-9c83-14dda97c5664', '87c8a518-204a-11e8-9c83-14dda97c5664', '太阳电池板是如何固定安装的', '让我们来看看太阳能电池板固定安装 大多数太阳电池板采用固定安装，为了获得较强的太阳光辐射，由电池组件组成的电池板应向南方倾斜（北半球），用支架支撑固定，与地面角度为本地纬度值最好，对于在屋顶安装，也要 ...', '05c20a0d-205c-11e8-9c83-14dda97c5664.jpg', '让我们来看看太阳能电池板固定安装\r\n大多数太阳电池板采用固定安装，为了获得较强的太阳光辐射，由电池组件组成的电池板应向南方倾斜（北半球），用支架支撑固定，与地面角度为本地纬度值最好，对于在屋顶安装，也要尽量满足这个要求。 \r\n图1是常用的地面太阳电池板固定安装方式示意图，采用双排立柱（支架）固定电池板。', '1520244282', '0', '0', '27', '1493201d-205c-11e8-9c83-14dda97c5664.jpg', '1ed08c77-205c-11e8-9c83-14dda97c5664.jpg', null);
INSERT INTO `news` VALUES ('5', 'b8b4aaaa-205c-11e8-9c83-14dda97c5664', '87c8a518-204a-11e8-9c83-14dda97c5664', '这太阳能风能动力可以让您住在世界任何地方', '如果你的幻想是在世界任何地方完全脱离电网，那么这个梦想就更接近现实了。尼斯建筑师刚刚公布了他们令人难以置信的蛋形Ecocapsule家的第一张照片 - 而这个小小的太阳能和风力发电住宅将在今年晚些时候出售。他们已 ...', 'cdf687cb-2054-11e8-9c83-14dda97c5664.jpg', '如果你的幻想是在世界任何地方完全脱离电网，那么这个梦想就更接近现实了。尼斯建筑师刚刚公布了他们令人难以置信的蛋形Ecocapsule家的第一张照片 - 而这个小小的太阳能和风力发电住宅将在今年晚些时候出售。他们已经完成了一个原型，他们计划在2016年春季之前将第一批出货。\r\nEcocapsule是一个微型收容所， 超便携式房子是由太阳能和风能提供动力，还包括雨水收集和过滤。', '1520244327', '0', '0', '37', '0b7ee632-2055-11e8-9c83-14dda97c5664.jpg', '27d66320-2055-11e8-9c83-14dda97c5664.jpg', '3b61b17d-2055-11e8-9c83-14dda97c5664.jpg');
INSERT INTO `news` VALUES ('6', '80511cb3-20db-11e8-8cc7-14dda97c5664', '186e391d-204b-11e8-9c83-14dda97c5664', '马卡尼电力公司的比传统性能提高了50％机载风力发电机', '今天的环境条件要求我们转向替代的能源模式，如太阳能或风能。今天，许多公司正在致力于创新各种机制，以利用环保且具成本效益的这些能源。风能也是自然资源的一个来源，可以证明是生态友好的和能源生产的一个巨大来 ...', '34d4cc28-20db-11e8-8cc7-14dda97c5664.jpg', '今天的环境条件要求我们转向替代的能源模式，如太阳能或风能。今天，许多公司正在致力于创新各种机制，以利用环保且具成本效益的这些能源。风能也是自然资源的一个来源，可以证明是生态友好的和能源生产的一个巨大来源。传统上，风力发电机被放置在地面上，但是Makani Power已经创新并设计了一种能够通过在空中飞行来产生能量的风力涡轮机。\r\n根据风筝的技术，这个风力涡轮机可以飞行在地面之上800和1950英尺之间。这意味着它可以保持在正常和商业航空飞行范围之下。然而，它仍然飞行在高于大多数鸟类的高度范围。在这个宽涡轮飞行的高度，风是坚强和一致的。我们的本性需要更多这样的产品的创新，这有助于拯救地球和节能。\r\n这种风车涉及较低的环境影响，并在深水边界上飞行。空中宽功率产生的能量是常规风力发电厂的一半。与传统的风力涡轮机相比，这也不需要额外的空间。随着通过使用合成动力生产机制增加的环境危害，该空中风车也将有助于节省成本并提供积极的环境效益。（google 翻译）', '1520298775', '0', '0', '28', '5e8052dc-20db-11e8-8cc7-14dda97c5664.jpg', '6ecf2eb5-20db-11e8-8cc7-14dda97c5664.jpg', null);
INSERT INTO `news` VALUES ('7', '2b9829db-20de-11e8-8cc7-14dda97c5664', '186e391d-204b-11e8-9c83-14dda97c5664', '2,250英尺塔生产足够的清洁能源替换发电厂？', '坐落在加利福尼亚州，亚利桑那州和墨西哥的交叉点，你会发现一个社区，接受更多的阳光，比任何其他在美国。正是在这里，白天的平均时间持续11个小时。而且，它在这里，在附近的一个位于圣路易斯，亚利桑那州的一个地 ...', 'f2e3e95d-20dd-11e8-8cc7-14dda97c5664.jpg', '坐落在加利福尼亚州，亚利桑那州和墨西哥的交叉点，你会发现一个社区，接受更多的阳光，比任何其他在美国。正是在这里，白天的平均时间持续11个小时。而且，它在这里，在附近的一个位于圣路易斯，亚利桑那州的一个地方，该地区的几乎全年干旱的气候可能有一天被利用，以帮助生产清洁能源，丰富，它将竞争传统电厂。\r\n马里兰州的太阳能风力发电机希望直立的发电机是雄心勃勃的。从远方来看，太阳风塔将看起来像一个巨大的烟囱，安装在一个风力涡轮机的顶部。它将需要25亿加仑的水，在2,250英尺的高度，将是国家的最高的塔。然而，所有这些都是必要的，以便实现具有产生每天每小时约435兆瓦小时的电输出的潜力的过程。他们说，足够为100万居民提供电力。\r\n这种结构的想法已经被踢了几十年，洛克希德飞机公司的科学家菲利普·卡尔森（Phillip Carlson）是1975年的技术的第一个专利。为了产生所谓的下降气流，水首先被泵送到顶部，在那里它作为细雾喷雾。当塔内的空气冷却和下沉时，吃水被汇入具有足够力的一系列风洞中以转动容纳在其内的风力涡轮机。然后将底部捕获的水泵回到顶部以保持循环连续。原则上，系统将是完全自供电的，在整个白天以及晚上操作，尽管效率随着外部温度下降而下降。\r\n虽然它在纸上听起来很有希望，但是这个概念还没有达到一个甚至类似于工作原型的东西。有很好的理由。为了展示活力，塔需要至少高出一公里。一般来说，你会很难找到投资者，他们对项目不感兴趣，这个项目不仅没有得到证实，而且涉及到建造几乎是帝国大厦高度两倍的似乎不可能的任务。\r\n太阳能风能公司首席执行官Ronald Pickett解释说：“即使你做了数学，它表明它只是工作，最长时间的问题是没有建设技术建造高高的结构。 “但自那以后，建筑业在如何泵送混凝土和其他建筑材料的高度方面取得了巨大的进步。', '1520299922', '0', '0', '33', '125215ec-20de-11e8-8cc7-14dda97c5664.jpg', '1bc4719b-20de-11e8-8cc7-14dda97c5664.jpg', null);
INSERT INTO `news` VALUES ('8', 'e5d15ddb-20de-11e8-8cc7-14dda97c5664', '186e391d-204b-11e8-9c83-14dda97c5664', '风力发电机制作', '风力发电机制作', null, '风力发电机制作', '1520300234', '0', '0', '14', 'ccc5a971-20de-11e8-8cc7-14dda97c5664.jpg', null, null);
INSERT INTO `news` VALUES ('10', '23a822ad-20e0-11e8-8cc7-14dda97c5664', '18723972-204b-11e8-9c83-14dda97c5664', '寻找平衡(于子源制作简易陀螺仪)---设计狂人', '简易陀螺仪的制作　　———于子源　　在制作遥控模型以及机器人上面陀螺仪是一个不可缺少的重要部件，但其昂贵的价格一直影响着爱好者们的进展。在这里我给大家介绍一种简易的陀螺制作，制作简单也不需要多少钱就可 ...', 'e20953b6-20df-11e8-8cc7-14dda97c5664.jpg', '简易陀螺仪的制作\r\n　　———于子源\r\n　　在制作遥控模型以及机器人上面陀螺仪是一个不可缺少的重要部件，但其昂贵的价格一直影响着爱好者们的进展。在这里我给大家介绍一种简易的陀螺制作，制作简单也不需要多少钱就可实现陀螺仪的基本功能了，当然会有一些缺点由于是采用检测液面高低得到数据所以剧烈抖动就会影响精度….不过其投入少，效果满意还是值得一试的！\r\n陀螺仪主要功能就是检测角度，角速度，例如：飞机在航行中就是靠角度来维持平衡的对于步行机器人平衡移动更是一个重要的数据。我是怎样想出这样的办法制作呢，是在建筑用的平衡尺中得到灵感的，平衡尺有一个玻璃管里面有个水泡，如果地面角度不平水泡就会左右偏，另外我在用杯子喝水的时候也发现同样的现象，这时我突然想到水是导电的而角度会影响水的高低，如果用铁棒分别在周围探测液面与金属棒的接触面积不就可以测到角度了吗？于是就初步规划了一下，再加上网上也找到类似的资料也就动手做了起来，没想到还真成了！下面我就给大家看一下我的制作过程：首先要准备容器，我是用尼龙棒车床加工出一个合适的容器，如果没有条件可以用试管或者玻璃瓶做：这就是尼龙棒了一种常用材料可以加工齿轮其稳定性和光滑性甚至可以做轴套等等。', '1520300767', '0', '0', '2', null, null, null);
INSERT INTO `news` VALUES ('12', '227d0668-20e1-11e8-8cc7-14dda97c5664', '18723972-204b-11e8-9c83-14dda97c5664', '12伏卫生间自动水箱制作电路', '作者：边12V的泵池 冯一电路在行动 冯2中的电路板和传感器 原理图 介绍阿冲洗厕所的东西，大多数城市居民认为理所当然，但它可以为那些谁远离生活用水和豪华实用电力。该电路控制一个12伏的 ...', '651268af-20e0-11e8-8cc7-14dda97c5664.jpg', '原理图 \r\n介绍阿冲洗厕所的东西，大多数城市居民认为理所当然，但它可以为那些谁远离生活用水和豪华实用电力。该电路控制一个12伏的小泵，是用来填补厕所坦克从外部雨水收集池。汽车挡风玻璃雨刮器泵的工作很好地在此应用程序。在我的12伏特的应用动力来自于小型太阳能发电系统，也可以提供一个合适的墙疣直流电源。水窖是位于下方的水箱，泵水移动起来上厕所的水箱。该泵开启时，厕所水箱是空的，它被关闭时，坦克已经填补。 \r\n规格\r\n额定工作电压：12V\r\n空闲电流：\r\n理论松下霍尔效应传感器是系统的核心。霍尔效应传感器的输出拉向地面时，在存在一个相对强大的磁场。当磁铁拉从霍尔效应传感器以外，输出变为通过10公里高的上拉电阻。这打开了IRFZ34N MOSFET的晶体管，它拉了12V的负导致地面泵，打开泵。该LED也打开了。 \r\n该1N4004二极管怠慢从马达潜在尖峰和1000uF电容整个马达消除了直流电动机接线刷噪音。 100uF的电容滤波器的噪声从12V电源。如同所有的电气电路，重要的是有一个保险丝并在与电源系列开关，它不会显示在原理图。 \r\n在10安培的硅二极管是用在撬棍电路。其目的是保护极性反向直流电路上电源端子。反向极性导致保险丝打击。 \r\n该电路将与最短暂的行动（非闭锁）霍尔效应传感器，您可能要进行实验的传感器和磁铁找到两个部分最敏感的方向。 \r\n施工冯一本内有电路版的所有部件上厕所。事实证明，这是一个坏主意，因为水泼董事会和电解腐蚀的电气连接。 \r\n冯2宗分为两部分，霍尔效应的电路传感器装配，以及电子休息。霍尔效应传感器被焊接到电路板的小片，这是当时拧上了管道带一块。整个传感器大会是然后在环氧树脂胶涂层，使防水。一个100nF电容器连接从引脚1-3霍尔效应传感器并与环氧树脂覆盖，它降低了传感器的机会拿起流浪无线电信号。 \r\n电路的其余部分是建立在另一个电路板，这是安装在一个标准的4“X4”的电器盒盖板。电线从盒子连接到传感器，电机和泵在12V电源。 \r\n磁铁被连接到用胶带厕所水箱浮动。一个更好的磁山一定可以塑造，但这项安排已举行为多年。有时它是必要的欺骗时，在外地工作。磁铁被删除从旧微型扬声器。音圈的差距周围的磁铁的磁极片充满了硅酮密封胶防止生锈。在潮湿的热带地区的人们可能要大衣整个磁铁有机硅与环氧树脂涂料或考克。 \r\n泵的进口连接到阀门，减速机装配在底部该池池。该泵出口穿过短节管道，进入大楼，并把水箱通过弯曲件铜管。该泵入口应靠近底部的供应坦克，它是一个好主意，贯穿了一个过滤水源 PVC管中的某些金属屏幕，以防止堵塞泵的碎片。铜管材在厕所水箱产量应高于油箱的满水的水平，这样可以防止备份流失。 \r\n泵的输出管和布线是建立与连接器，使泵可拆除建筑物时，无人居住。一个更永久安装可以通过安装在一个金属箱的侧面泵建设。 \r\n对准弯曲的金属表带的认为，霍尔效应传感器的电路板等传感器上方的磁铁。调整PC板的高度，以该电路关断时所需的水位。 \r\n使用冲水厕所，红色LED会亮起，并会动议泵水进入水箱。只要水位即将到达除此之外，该泵将关闭。就像在城市。如果你想在一个地方使用的温度得到这个装置零度以下，供水，水泵，水管道将需要被安装在一个地区，也不会冻结，如地下。该电路已沿用多年，它肯定跳动拖桶水从雨水收集系统。 \r\n失效模式我已经历了若干不同的泵，主要是由于操作在低于水的冰点的温度。运用权力，将导致一个冷冻泵泵电机烧坏。电路的其余部分仍能屹立不滥用，妥善大中型保险丝可以保护这个问题的马达。一个有用的修订这条赛道将是包括切断电路防止电机运行时，室外温度降至低于冻结。此问题已大大减少了室内移动泵对泵的位置并没有冻结。冻结供应管仍然是一个问题。 \r\n如果再次失败，可能会发生的水缸枯竭。在这种情况下，该泵连续运行，电机换向器，最终磨损。这个问题可以通过添加纠正压力切换到水线，或添加一个计时器，切断马达权力运作后几分钟。', '1520301195', '0', '0', '28', '96be4723-20e0-11e8-8cc7-14dda97c5664.jpg', 'a286d90a-20e0-11e8-8cc7-14dda97c5664.jpg', 'b0499a3b-20e0-11e8-8cc7-14dda97c5664.jpg');
INSERT INTO `news` VALUES ('13', '8db50ede-20e1-11e8-8cc7-14dda97c5664', '18723972-204b-11e8-9c83-14dda97c5664', 'DIY业余电火花', '看到科技论坛的bdya高的电火花机，口水流了一地。瞎搞一段时间，我的脉冲电源初见成效，第一次体验电火花，也是第一次体验脉冲电源。成功地在白钢上打了个直径3mm约12mm深的通孔，耗时约90分钟。值得高兴的是电源部 ...', '6b321277-20e1-11e8-8cc7-14dda97c5664.jpg', '看到科技论坛的bdya高的电火花机，口水流了一地。瞎搞一段时间，我的脉冲电源初见成效，第一次体验电火花，也是第一次体验脉冲电源。成功地在白钢上打了个直径3mm约12mm深的通孔，耗时约90分钟。值得高兴的是电源部分是黑白电视机的变压器全波整流滤波加脉冲控制输出。火花连续不易断火·短路·断路。\r\n但--------不会贴图啊~！咋弄的呢', '1520301375', '0', '0', '50', '8102d658-20e1-11e8-8cc7-14dda97c5664.jpg', null, null);
INSERT INTO `news` VALUES ('14', 'e7c0a4bb-20e1-11e8-8cc7-14dda97c5664', '18761830-204b-11e8-9c83-14dda97c5664', '博物馆中的气动车展品', '以前研制的气动车由于“气压低”主要在轨道车上用。所以背着大气罐。就是不能推广应用的主要原因。现在不同。我上篇介绍的美国明年推出的气动汽车用纳米材料做气罐。（合成材料，碳纤，纳米等）压力大大提高。加一次 ...', 'cf84c796-20e1-11e8-8cc7-14dda97c5664.jpg', '以前研制的气动车由于“气压低”主要在轨道车上用。所以背着大气罐。就是不能推广应用的主要原因。现在不同。我上篇介绍的美国明年推出的气动汽车用纳米材料做气罐。（合成材料，碳纤，纳米等）压力大大提高。加一次气。18元。可跑1000哩。与当年，不可同日而语！', '1520301526', '0', '0', '8', 'd8e7cda4-20e1-11e8-8cc7-14dda97c5664.jpg', null, null);
INSERT INTO `news` VALUES ('16', '7f733e0b-20e3-11e8-8cc7-14dda97c5664', '18761830-204b-11e8-9c83-14dda97c5664', '对\"几个儿童DIY的最环保的气动汽车\" 资料的补充', '这个原帖子.我找不到.是不是改版时搞丢了?(两年前的帖子) 补充的是他们施工中的图片.和过程. 这几个儿童都是十二岁.上小学的年纪.说明美国对儿童的教育.特别注重小孩子的动手能力.以便将来对国家和社会准备有用 ...', '3d77c2ab-20e3-11e8-8cc7-14dda97c5664.jpg', '补充的是他们施工中的图片.和过程.\r\n\r\n这几个儿童都是十二岁.上小学的年纪.说明美国对儿童的教育.特别注重小孩子的动手能力.以便将来对国家和社会准备有用之才.并且培养他们对科技的兴趣!\r\n\r\n再看看咱们中国十二岁的儿童.还再撒妈娇!.上网玩偷菜.', '1520302210', '0', '0', '9', '4f9b01f8-20e3-11e8-8cc7-14dda97c5664.jpg', '5cf53b83-20e3-11e8-8cc7-14dda97c5664.jpg', '701951f9-20e3-11e8-8cc7-14dda97c5664.jpg');
INSERT INTO `news` VALUES ('17', '3e5fbf52-20e4-11e8-8cc7-14dda97c5664', '187b28f2-204b-11e8-9c83-14dda97c5664', '陀螺仪的安装及设定', '陀螺仪在模型直升机上扮演着相当重要的角色，尾舵的安定与否，就全看它的表现。随着科技的进步，从机械式陀螺仪、压电式陀螺仪，一直演进到目前最流行的机头锁定(Heading Lock)压电式陀螺仪。虽然设定的方法，因品牌 ...', null, '\r\n\r\n陀螺仪在模型直升机上扮演着相当重要的角色，尾舵的安定与否，就全看它的表现。随着科技的进步，从机械式陀螺仪、压电式陀螺仪，一直演进到目前最流行的机头锁定(Heading Lock)压电式陀螺仪。虽然设定的方法，因品牌及型号的不同而有所差异，但其基本的观念都是一样的。所以只要观念正确，无论是使用哪一种陀螺仪，应该都可轻松上手。 \r\n一、陀螺仪的种类 \r\n     1.由构造来区分 \r\n     机械式：感测器采用马达高速运转来产生陀螺效应，再利用电磁感应器来侦测偏向速度。优点是价格低廉，缺点是反应慢、准确度低、耗电、寿命短、重量大、怕振动。(例如Futaba 153 BB) \r\n     压电式：感测器采用压电晶体。优点是反应快、准确度高、耗电小、寿命长、重量轻，缺点是价格贵。但近年来价格有愈来愈低廉的趋势。温度是压电式陀螺仪的致命伤，会导致中立点偏移，所幸压电式陀螺仪内部都有温度自动修正的设计。(例如JR NEJ-900、JR NEJ-3000、Futaba G-301、Futaba G-501) \r\n     锁定式：最新式的陀螺仪。强调能使尾舵保持稳定不会偏向，没有\"风标效应\"(Weathercock Effect)。适合3D花式特技使用，但却不适合F3C的飞行动作。(例如JR 550T、JR 5000T、Futaba GY-501、CSM 360、CSM 540) \r\n     2.由感度来区分 \r\n     单段式：只能设定一种感度，由控制盒上的旋纽来调整感度值。优点是价格低廉，缺点是只有一种感度、无法同时适合静态飞行及上空飞行。(例如JR G-400、GWS PG-01、CSM 180) \r\n     二段式：能设定二种感度，您的遥控器必须具备切换感度的功能。依调整感度值的方式不同，又可分为以下二种。 \r\n     由控制盒上的旋纽来调整感度值。H(high)旋纽控制高感度值，L(low)旋纽控制低感度值。(例如Futaba G-501) \r\n     控制盒无调整感度的旋纽，必须由遥控器来调整感度值，所以您的遥控器必须具备设定感度的功能。(例如JR G-450、JR NEJ-900、JR NEJ-3000) \r\n     机械式陀螺仪目前看来已到了日暮西山的地步，若您正准备买陀螺仪，劝您买压电式的，而且要买二段式感度的陀螺仪。单段式感度的陀螺仪，除了能练练停悬以外，好像没有多大的用处。高级压电式陀螺仪因为反应快，所以要配合高速伺服机（如JR 2700G、8700G，Futaba 9203、9205）才能发挥最佳效能。 \r\n     以下的安装及设定步骤，是以二段式感度的陀螺仪(非锁定式)为范例。 \r\n    二、安装 \r\n    将陀螺仪用双面胶贴在机体预留的陀螺仪座，或振动较小的地方。有人说将陀螺仪安装在离主轴愈近的位置愈好，这个观念其实并不很正确，因为陀螺仪只会侦测机体自转的角速度，所以不论将陀螺仪安装在机体的任何位置，所侦测到的角速度都是一样的。反倒是一般说来离主轴较近的地方，振动会比较小。\r\n    将陀螺仪的Rx Rud接在接收机的尾舵插座，Rx Aux接在控制感度的频道插座(依遥控器厂牌及型号而有不同，请叁阅您的遥控器说明书)，将尾舵伺服机接在陀螺仪的Sv Rud插座。 \r\n若您的遥控器具备调整感度的功能，请将陀螺仪控制盒上的H旋纽调到100%的位置，L旋纽调到\r\n0%的位置。否则请将H旋纽调到70%的位置，L旋纽调到50%的位置。 \r\n     三、设定 \r\n      打开遥控器的电源开关，将尾舵ATV设为140~150%，设定尾舵大小动作比例(Dual Rate)，静态飞行为70%，上空飞行为100%。尾舵微调及上下跟轴归零。 \r\n打开接收机的电源开关。 \r\n      \r\n检查尾舵伺服机的正逆转方向。将尾舵摇杆打右舵，尾舵伺服机的摆臂应朝机头的方向摆动。若伺服机转动的方向错误，请由遥控器设定尾舵伺服机的正逆转方向。 \r\n检查陀螺仪的正逆转方向。抬起直升机将机头往左摆动，此时尾舵伺服机的摆臂应朝机头的方向摆动。\r\n若伺服机转动的方向错误，请切换陀螺仪控制盒上的正逆转开关。 \r\n     检查尾舵伺服机的摆臂长度，先叁考陀螺仪说明书内的建议长度，一般在15　左右。高级的陀螺仪有限制尾舵伺服机行程量的旋纽，可分别调整尾舵伺服机左右方向的最大行程量。若尾舵ATV设为140~150%，会超出尾旋翼螺距滑套的活动范围，不用担心，因为陀螺仪会抑制遥控器所发出的尾舵指令，虽然在地面测试时会超出尾旋翼螺距滑套的活动范围，但在实际飞行时，除非将陀螺仪的感度调到很小很小，否则是不会超过的。\r\n      检查遥控器的感度切换开关，确定飞行模式Normal是高感度，飞行模式Idle-up 1及Idle-up 2是低感度。\r\n \r\n    若您使用的遥控器具备调整感度的功能，请将高感度设为70%，低感度设为50%。 \r\n    四、试飞及调整 \r\n     发动引擎，将直升机起飞并且保持在停悬的位置。 \r\n      调整油门曲线及螺距曲线，使停悬时油门摇杆正好在50%的位置。 \r\n      若停悬时机头会偏左，则调短尾舵连杆的长度，若机头会偏右，则调长尾舵连杆的长度。\r\n      先将直升机保持在停悬的位置，并且确认尾舵不会偏向任何一方，然後加油门使直升机垂直爬升，若爬升的过程中机头会偏左，则增加\"上跟轴\"的数值，若机头会偏右，则减少\"上跟轴\"的数值。反覆地测试，直到爬升的过程中机头不会偏向任何一方。\r\n      先将直升机停悬在安全的高度，并且确认尾舵不会偏向任何一方，然後收油门使直升机垂直下降，若下降的过程中机头会偏右，则增加\"下跟轴\"的数值，若机头会偏左，则减少\"下跟轴\"的数值。反覆地测试，直到下降的过程中机头不会偏向任何一方。\r\n      将飞行模式切到Idle-up 1，油门全开作高速直线飞行，调整Idle-up 1的\"上跟轴\"数值，直到机头不会偏向任何一方。 \r\n    \r\n作内筋斗或540°失速倒转，调整\"下跟轴\"的数值，直到机头不会偏向任何一方。 \r\n    五、重点提示 \r\n      在不会产生追踪现象的前提下，要尽可能将陀螺仪的感度调大，静态飞行时的感度约为70~90%，上空飞行时的感度约为50~70%。若低於此感度范围即有追踪现象，则调短尾舵伺服机的摆臂长度。若高於此感度范围仍无追踪现象，则加大尾舵伺服机的摆臂长度。 \r\n     \r\n尾舵的行程量(ATV)要设为140~150%，若觉得机体旋转速度过快，则降低尾舵大小动作比例(Dual Rate)，直到符合您的需求。请勿用增加或减少感度的方式来调整机体的旋转速度。 \r\n     \r\n    若使用反应速度较慢的尾舵伺服机，可能比较容易产生追踪现象', '1520302530', '0', '0', '4', null, null, null);
INSERT INTO `news` VALUES ('18', '6aba5b8b-20e4-11e8-8cc7-14dda97c5664', '187b28f2-204b-11e8-9c83-14dda97c5664', '螺旋桨的计算公式', '螺旋桨的计算公式功率（W） 直径（D） 螺距（P） 转/分（N） 功率（W）=（D/10）的4次方*（P/10）*（N/1000）的3次方*0.45 速度（SP）km/h=（P/10）*（N/1000）*15.24 静止推力（Th）g=(D/10)的3次方*（P/10）*（N/1 ...', null, '功率（W） 直径（D） 螺距（P） 转/分（N） \r\n\r\n功率（W）=（D/10）的4次方*（P/10）*（N/1000）的3次方*0.45 \r\n速度（SP）km/h=（P/10）*（N/1000）*15.24 \r\n静止推力（Th）g=(D/10)的3次方*（P/10）*（N/1000）的2次方*22 \r\n以上得出的是理论数距', '1520302605', '0', '0', '1', null, null, null);
INSERT INTO `news` VALUES ('19', '65280106-20e5-11e8-8cc7-14dda97c5664', '187b28f2-204b-11e8-9c83-14dda97c5664', '模型火箭的受力', '模型火箭的受力 原图片取自：NASA Glenn Research Center, Learning Technology Project 模型火箭对学生来说是一个较安全与不昂贵的方法来学习力学原理与火箭受到外力时的反应。最早由牛顿的三大运动定律描述了力的 ...', '4652988e-20e5-11e8-8cc7-14dda97c5664.jpg', '模型火箭对学生来说是一个较安全与不昂贵的方法来学习力学原理与火箭受到外力时的反应。最早由牛顿的三大运动定律描述了力的作用。力是具有大小与方向的向量。当考虑作用力时，必须同时考虑力的方向与大小。如同飞机一样，模型火箭在飞行时受到四种力：重力，推力，阻力，升力。但这些作用力，在有动力的飞机与火箭上的时候还是有些不同，\r\n原图片取自：NASA Glenn Research Center, Learning Technology Project \r\n1. 在飞机上，升力（与飞行方向垂直的空气作用力）用来克服飞机的重力。在模型火箭上，则是用推力来克服火箭的重力。升力反而用来稳定与控制火箭的飞行方向。\r\n2. 在飞机上，大部分的空气作用力由主翼与尾翼翼面產生。在模型火箭上，空气作用力由安定片，鼻锥，与箭身產生。不管是飞机或火箭，空气作用力皆作用在风压中心（图中黑色中心的黄点），重力则是作用在重心（图中的黄点）上。\r\n3. 当大部分的飞机有著高的升阻比，在火箭上阻力却往往比升力大的多。\r\n4. 对飞机来说，各种力的大小与方向通常维持几乎不变，通常火箭上的作用力在飞行过程中，大小与方向却常常有戏剧性的变化。\r\n有不同的文章来介绍火箭上在各个阶段：发射，动力飞行，惯性飞行（上升与下降），以及降落伞回收时的作用力。如同任何飞行的物体，模型火箭飞行时也以重心（重量的平均位置）為旋转中心。决定模型火箭的重心比决定飞机的重心来的容易。因為模型火箭的零件较少，并且模型火箭的外型也比飞机来的简单。\r\n参考资料：NASA Glenn Research Center, Learning Technology Project.', '1520303025', '0', '0', '11', null, null, null);
INSERT INTO `news` VALUES ('66', 'ac04c3f8-26b7-11e8-8126-14dda97c5664', '93650318-2050-11e8-9c83-14dda97c5664', '123', '123', null, '<p>123</p>', '1520943094', '0', '0', '0', null, null, null);
INSERT INTO `news` VALUES ('76', '68b910bb-26bf-11e8-8126-14dda97c5664', '87c8a518-204a-11e8-9c83-14dda97c5664', '内容有图', '内', null, '<p><img src=\"http://192.168.12.120:9091/myDesignSec/image/47ba899b9d84343ad52716aaa3468490.png\" style=\"max-width:100%;\"><br></p>', '1520946417', '0', '0', '0', null, null, null);
INSERT INTO `news` VALUES ('77', '8877070a-26bf-11e8-8126-14dda97c5664', '18723972-204b-11e8-9c83-14dda97c5664', '内容无图', '内容无图', null, '<p>111</p>', '1520946471', '0', '0', '0', null, null, null);
INSERT INTO `news` VALUES ('78', 'eb5ab18d-26bf-11e8-8126-14dda97c5664', '87c8a518-204a-11e8-9c83-14dda97c5664', '无图测试2', '无图', null, '<p>无图</p>', '1520946637', '0', '0', '0', null, null, null);
INSERT INTO `news` VALUES ('79', 'f35e1be7-26bf-11e8-8126-14dda97c5664', '187b28f2-204b-11e8-9c83-14dda97c5664', '有图测试2', '有图测试', null, '<p><img src=\"http://192.168.12.120:9091/myDesignSec/image/99772980bdd29a890123301005af458b.jpg\" style=\"max-width:100%;\"><br></p>', '1520946650', '0', '0', '0', null, null, null);
INSERT INTO `news` VALUES ('80', '0fd09a27-26c0-11e8-8126-14dda97c5664', '87c8a518-204a-11e8-9c83-14dda97c5664', '有图，标题有图标，无图，标题无图标', '这里美图', null, '<p>没图</p>', '1520946698', '0', '0', '0', null, null, null);
INSERT INTO `news` VALUES ('81', '1909c6fd-26c0-11e8-8126-14dda97c5664', '87c8a518-204a-11e8-9c83-14dda97c5664', '数据都为真的，请不要乱删！', '不要乱删 谢谢', null, '<p>谢谢</p>', '1520946713', '0', '0', '1', null, null, null);
INSERT INTO `news` VALUES ('82', '29375e0f-26c0-11e8-8126-14dda97c5664', '87c8a518-204a-11e8-9c83-14dda97c5664', '要删除请删除我，我是专门给删除用的', '请删除我', null, '<p>请删除我</p>', '1520946740', '0', '0', '1', null, null, null);
INSERT INTO `news` VALUES ('83', '3e303577-26c0-11e8-8126-14dda97c5664', '87c8a518-204a-11e8-9c83-14dda97c5664', '要删除请删除我！', '删除我', null, '<p>删除我</p>', '1520946776', '0', '0', '1', null, null, null);
INSERT INTO `news` VALUES ('84', '47bbe0d3-26c0-11e8-8126-14dda97c5664', '18761830-204b-11e8-9c83-14dda97c5664', '专业测试删除', '专业测试删除', null, '<p>专业测试删除</p>', '1520946792', '0', '0', '0', null, null, null);
INSERT INTO `news` VALUES ('85', '4ffbf03c-26c0-11e8-8126-14dda97c5664', '187b28f2-204b-11e8-9c83-14dda97c5664', '祖传测试删除', '请删除我大哥', null, '<p>删我</p>', '1520946805', '0', '0', '0', null, null, null);
INSERT INTO `news` VALUES ('89', 'e86abec1-2783-11e8-9844-14dda97c5664', '87c8a518-204a-11e8-9c83-14dda97c5664', '123', '123', null, '<p>123</p>', '1521030813', '0', '0', '1', null, null, null);
INSERT INTO `news` VALUES ('90', '344a0ee6-2784-11e8-9844-14dda97c5664', 'de72c0fa-2783-11e8-9844-14dda97c5664', '123', '1231', null, '<p>111</p>', '1521030940', '0', '0', '1', null, null, null);
INSERT INTO `news` VALUES ('91', '54b1758f-2784-11e8-9844-14dda97c5664', 'de72c0fa-2783-11e8-9844-14dda97c5664', '12312', '1111', null, '<p>111</p>', '1521030994', '0', '0', '1', null, null, null);
INSERT INTO `news` VALUES ('92', '71f67eea-2784-11e8-9844-14dda97c5664', '4a80c35a-2784-11e8-9844-14dda97c5664', '123123', '123123', null, '<p>123123</p>', '1521031044', '0', '0', '2', null, null, null);
INSERT INTO `news` VALUES ('93', 'c35388ce-2784-11e8-9844-14dda97c5664', 'b02f276c-2784-11e8-9844-14dda97c5664', '123123', '123123', null, '<p>123123</p>', '1521031180', '0', '0', '1', null, null, null);
INSERT INTO `news` VALUES ('94', '4202fce0-2785-11e8-9844-14dda97c5664', '87c8a518-204a-11e8-9c83-14dda97c5664', '1233', '3333', null, '<p><img src=\"http://192.168.12.120:9091/myDesignSec/image/68344a1510a868478b4d4101967e8753.jpg\" style=\"max-width:100%;\"><br></p>', '1521031393', '0', '0', '3', null, null, null);
INSERT INTO `news` VALUES ('95', '6cc06f9c-2785-11e8-9844-14dda97c5664', '87c8a518-204a-11e8-9c83-14dda97c5664', '测试图片', '123', null, '<p><img src=\"http://192.168.12.120:9091/myDesignSec/image/d47c6435bfa8b0a805dbb0a4ec7bbf9b.jpg\" style=\"max-width:100%;\"><br></p>', '1521031464', '0', '0', '8', null, null, null);
INSERT INTO `news` VALUES ('96', 'e9347ea1-27fb-11e8-b623-14dda97c5664', '87c8a518-204a-11e8-9c83-14dda97c5664', '新新闻', '新新闻', null, '<p>新新闻图片</p><p><img src=\"http://192.168.12.120:9091/myDesignSec/image/9c8040de1543c42b8892bb0d29b4496c.png\" style=\"max-width:100%;\"><br></p>', '1521082353', '0', '0', '1', null, null, null);

-- ----------------------------
-- Table structure for newssection
-- ----------------------------
DROP TABLE IF EXISTS `newssection`;
CREATE TABLE `newssection` (
  `Id` varchar(36) NOT NULL,
  `SectionName` varchar(20) NOT NULL,
  `Priority` int(11) DEFAULT '100',
  `Image` varchar(255) NOT NULL DEFAULT 'http://101.200.58.3/OSSWebsite/res/4ad5dbb4-8363-481f-bde5-52f7f84678d6.jpg',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of newssection
-- ----------------------------
INSERT INTO `newssection` VALUES ('186e391d-204b-11e8-9c83-14dda97c5664', '风力发电', '104', 'http://101.200.58.3/OSSWebsite/res/18313f5c-6720-4a28-bb37-3853bf5ac013.jpg');
INSERT INTO `newssection` VALUES ('18723972-204b-11e8-9c83-14dda97c5664', '机械制造', '103', 'http://101.200.58.3/OSSWebsite/res/655b1e25-1454-4847-980a-ee85c5f26a7f.jpg');
INSERT INTO `newssection` VALUES ('18761830-204b-11e8-9c83-14dda97c5664', '发动机制造', '102', 'http://101.200.58.3/OSSWebsite/res/f9fde98a-adfc-4f3b-8fd5-0912f397ec6c.jpg');
INSERT INTO `newssection` VALUES ('187b28f2-204b-11e8-9c83-14dda97c5664', '遥控模型技术', '101', 'http://101.200.58.3/OSSWebsite/res/13f27b4d-e574-4cce-8bb9-dca109f9d1bb.jpg');
INSERT INTO `newssection` VALUES ('87c8a518-204a-11e8-9c83-14dda97c5664', '太阳能', '105', 'http://101.200.58.3/OSSWebsite/res/ef0ec822-5416-40d5-ad05-55a78503fb5d.jpg');

-- ----------------------------
-- Table structure for notes
-- ----------------------------
DROP TABLE IF EXISTS `notes`;
CREATE TABLE `notes` (
  `Id` varchar(36) NOT NULL,
  `SectionId` varchar(36) NOT NULL,
  `Title` varchar(40) NOT NULL,
  `Content` text NOT NULL,
  `Image` varchar(255) DEFAULT '',
  `MemberId` varchar(36) NOT NULL,
  `Time` varchar(20) NOT NULL,
  `State` int(11) DEFAULT '0',
  `Image1` varchar(255) DEFAULT NULL,
  `Image2` varchar(255) DEFAULT NULL,
  `Image3` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of notes
-- ----------------------------
INSERT INTO `notes` VALUES ('2f6bc11b-2103-11e8-8cc7-14dda97c5664', 'e8afad21-2050-11e8-9c83-14dda97c5664', '本田正在制造一个真正奇怪的豪华引擎喷气机', '对于大多数人来说，只知道本田是摩托车的制造者，没有人知道把本田作为未来喷气式飞机的制造商。\r\n日本汽车巨头自20世纪80年代后期以来一直在悄悄研究小型喷气式飞机，十多年前，HondaJet作为一个价值数百万美元的实验首次亮相。六座子弹巡航速度为420节 - 约0.63马赫，与通用电气合资开发的一对特别设计的涡轮风扇。\r\n是什么让HondaJet变得非同寻常，除了它是由同一家公司制造的这个事实之外，还有一个独特的发动机支架，使飞机具有商标外观。大多数这种尺寸的喷气发动机安装在机身后部的两侧，本田喷气机的HF120涡扇发动机安装在从机翼升起的底座上。本田指出，这种配置的优点是可以在机舱内部腾出更多的空间。\r\n本田刚刚在本周宣布，第一批量产HondaJet正在进行总装。通向这一点的道路并不是一件容易的事情 - 高科技运输工具迟迟未能到位，最近由于发动机在测试过程中出现故障，但公司表示，它正在追踪2015年第一季度的FAA认证。\r\n飞机将在售出时约450万美元。', '0050a548-2103-11e8-8cc7-14dda97c5664.jpg', '4c02fff7-20ff-11e8-8cc7-14dda97c5664', '1520315820', '1', '193a1d65-2103-11e8-8cc7-14dda97c5664.jpg', '21853f22-2103-11e8-8cc7-14dda97c5664.jpg', null);
INSERT INTO `notes` VALUES ('4b23ba64-233b-11e8-b40d-14dda97c5664', '93650318-2050-11e8-9c83-14dda97c5664', '禽畜取暖：太阳能禽畜房屋手册', '这90页的书都经过太阳101课程，然后再接着盖的设计和多种类型的太阳能集热器尺寸，然后给出11个太阳能集热器的例子相当详细的说明。 \r\n虽然它主要针对公司的太阳能应用，许多人的想法有趣的和可能适用于其他太阳能加热情况。', null, '0a623fe9-2043-11e8-9c83-14dda97c5664', '1520559820', '1', null, null, null);
INSERT INTO `notes` VALUES ('61b8c160-2101-11e8-8cc7-14dda97c5664', '93650318-2050-11e8-9c83-14dda97c5664', '太阳能蒸汽发动机工作原理', 'Gordon mode is the full expansion mode, available in ported and unported slam valve motor types. Gordon mode is maximum efficiency, but still features torque control if so equipped.  Ported motors (bearing the port shown in the illustration) also feature higher power density Thomas and Henry modes.  Some feature the regenerative braking mode Percy as well.\r\nThe motor starts out with the piston just below top dead center, pressure inside the cylinder at exhaust pressure, piston still going up', '30cb661f-2101-11e8-8cc7-14dda97c5664.jpg', '0a623fe9-2043-11e8-9c83-14dda97c5664', '1520315045', '1', '4cf1b616-2101-11e8-8cc7-14dda97c5664.jpg', null, null);
INSERT INTO `notes` VALUES ('6ae861ae-21b6-11e8-add4-14dda97c5664', 'e8bb1efe-2050-11e8-9c83-14dda97c5664', '美国密歇根州威廉姆斯研究所制造的WR24-7-2型发动机', '威廉斯研究WR24-7-2\r\n我再次有机会获得美国密歇根州威廉姆斯研究所制造的WR24-7-2型发动机。诺斯罗普公司选择了发动机来驱动他们的MQM-74C Chukar II型空中目标无人机（即他们唯一的目的是为了在......艰难的生活中被射击）;-)。 然而，这个电厂也被用于其他制造商生产的侦察机的测试，即使它后来还没有实现。 我得到的引擎起源于后面的应用程序之一。\r\nWR24-7-2的主要特点是：', '4faee5fe-21b6-11e8-add4-14dda97c5664.jpg', '34b86b5d-21b4-11e8-add4-14dda97c5664', '1520392799', '1', '5eaee2ee-21b6-11e8-add4-14dda97c5664.jpg', null, null);
INSERT INTO `notes` VALUES ('6c9a09e0-21b8-11e8-add4-14dda97c5664', 'e8c13ff0-2050-11e8-9c83-14dda97c5664', ' 急求电机型号，大虾们', '我做了一个空机是650g的，预计总重会达1kg，求电机型号啊，急急急！大虾们，求解\r\n', null, 'c60a8631-21b3-11e8-add4-14dda97c5664', '1520393661', '1', null, null, null);
INSERT INTO `notes` VALUES ('7144625f-2102-11e8-8cc7-14dda97c5664', '93650318-2050-11e8-9c83-14dda97c5664', '圆锥型太阳灶', '圆锥型太阳灶:\r\nMy first solar cooker was this cone solar cooker. Some might call it a funnel solar cooker but there seems to be a specific design to most of these on the web that looks quite different so I tend to refer to it as a cone solar cooker. You can find complete videos on the design and construction of this solar cooker here.\r\nMy cone solar cooker.\'<br />\'Look at the above photos and you\'ll see that I specifically chose the width of each cone segment to be around the width of the cooking jar. That way all the light gets directed to the jar and not passed it. Each segment is simply cardboard with aluminium foil glued to it.\r\nThe first thing I cooked was long grain brown rice. I put 1/4 cup rice in 1 1/4 cup water. It was 3C (38F) outside. I watched it every 10 minutes up to the first hour. Then I checked it after one and a half hours cooking time and then at two hours. Sometime in between one and a half and two hours of cooking time it had started boiling and became fluffy like in the photo below.\r\nNote the well known trick of leaving a portion of the glass unpainted so you can see inside.\r\nLong grain brown rice - cooked in between 1.5 and 2 hours with no insulation. ', '1a49813e-2102-11e8-8cc7-14dda97c5664.jpg', '4bf05fe5-20ff-11e8-8cc7-14dda97c5664', '1520315501', '1', '391460ac-2102-11e8-8cc7-14dda97c5664.jpg', '5104a7c9-2102-11e8-8cc7-14dda97c5664.jpg', '5a62618a-2102-11e8-8cc7-14dda97c5664.jpg');
INSERT INTO `notes` VALUES ('741c0ed5-2103-11e8-8cc7-14dda97c5664', 'e8afad21-2050-11e8-9c83-14dda97c5664', '垂直和超短起飞和降落飞机翼型', '这款飞机的翼型是由俄罗斯设计可短距离起降的机翼翼型。', '5723c4e5-2103-11e8-8cc7-14dda97c5664.jpg', '0a623fe9-2043-11e8-9c83-14dda97c5664', '1520315935', '1', '62dbdca4-2103-11e8-8cc7-14dda97c5664.jpg', '6a29b171-2103-11e8-8cc7-14dda97c5664.jpg', null);
INSERT INTO `notes` VALUES ('80104427-2392-11e8-b40d-14dda97c5664', '93650318-2050-11e8-9c83-14dda97c5664', '利用太阳能制取蒸馏水', '<p>这个图片是关于用<a href=\"http://www.tech-domain.com/forum-25-1.html\" target=\"_blank\">太阳能</a>制取蒸馏水的，不用说明相信大家都能看懂的 。</p><p><img src=\"http://192.168.12.120:9091/myDesign/image/7e2ebc606fd7847ab756c52735846da9.jpg\" style=\"max-width: 100%;\"> <br></p>', '', '4c02fff7-20ff-11e8-8cc7-14dda97c5664', '1520597275', '1', null, null, null);
INSERT INTO `notes` VALUES ('b008a69a-2100-11e8-8cc7-14dda97c5664', '93650318-2050-11e8-9c83-14dda97c5664', '反射太阳能炉灶', '\r\n罗杰伯纳德提供一个新的紧凑型反射锅设计 \r\n\r\nI have been very impressed to read, in SBJ #17, that the solar panel cooker (SPC) idea, as publicized by Barbara Kerr and myself in the preceding issue, had met with an abundant response.我一直非常深刻的印象看，在超声速喷气公务机＃17，是太阳能板炊具（SPC）的主意，因为公布的芭芭拉克尔和我前面的问题，会见了雄厚的反应。 Even negative results can be of interest when we seek to understand them.即使是负面的结果可有兴趣当我们试图了解他们。 For instance, in the comment, \"I used a \"turkey -size\" oven cooking bag and a dark ceramic teapot. Nothing!\", there are two interesting clues.例如，在注释中，“我使用了”火鸡大小的“微波炉烹饪袋，一个黑暗的陶瓷茶壶。没有！”，有两个有趣的线索。 First the ceramic teapot was not a good choice because ceramic can be a bad conductor of heat [depending on its density, Ed.].首先，陶瓷茶壶，不是一种好的选择，因为陶瓷可以是热不良导体[取决于它的密度，埃德。]。 Food can remain lukewarm, even if the pot is very hot on the outside.食品可以保持不冷不热，即使是在锅外热。 And secondly, a turkey is an enormous bird, and using a bag appropriate to hold it may mean that the quantity of food could have been too big for the cooker.其次，火鸡是一个巨大的鸟，用一个袋子适时举行，可能意味着食物的数量可能是过于锅大。 \r\nLet us not forget that the SPC was designed as a substitute for the traditional box for small quantities of food.让我们不要忘记，最高人民法院是作为食物中少量取代传统设计。 The dimensions given for my prototype in SBJ #16 are appropriate only when cooking for one person.我在超声速喷气公务机＃16原型给予适当的尺寸只有当一个人做饭。 \r\nDuring the 1994 summer, I somewhat improved the SPCs convenience and efficiency by introducing two changes: a new system for creating the greenhouse effect and a more compact design.在1994年的夏天，我有所改善引入两个变化：一个用于创建，温室效应和更紧凑的设计新系统的最高人民法院的便利和效率。 \r\nUndoubtedly, oven bags are unbeatable for their lightness, but in my city (Lyon, 500,000 inhabitants) there are no oven bags available in the supermarkets.毫无疑问，烤箱袋无与伦比他们一线希望，但在我的城市（里昂，50万居民）没有在超级市场提供烤箱袋。 On the other hand, Pyrex salad bowls are very easy to find everywhere in France--even in small towns.另一方面，高硼硅沙拉碗很容易找到无处不在法国-即使是在小城镇。 Their price (about $4 US) is ten times the price on an oven bag, but they can be used hundreds of times for solar cooking as well as for other purposes in the kitchen.他们的价格（约400美元）的10倍，烤箱袋价格，但它们可以使用以及在厨房的其他用途的太阳能烹饪数百次。 For traveling, however, they are relatively heavy and cumbersome.是旅游，但是，它们相对沉重和累赘。 ', '7f8ef708-2100-11e8-8cc7-14dda97c5664.jpg', '0a623fe9-2043-11e8-9c83-14dda97c5664', '1520314747', '1', null, null, null);
INSERT INTO `notes` VALUES ('b27a39cc-2103-11e8-8cc7-14dda97c5664', 'e8afad21-2050-11e8-9c83-14dda97c5664', '水上概念飞行器设计', '这款飞行器设计既是水翼船，又是一架飞行器，也许设计是可以在空中悬停，应该属于多功能的那种，可以垂直起降水上飞行器。', '9610c464-2103-11e8-8cc7-14dda97c5664.jpg', '4c08ed72-20ff-11e8-8cc7-14dda97c5664', '1520316039', '1', '9ee03230-2103-11e8-8cc7-14dda97c5664.jpg', 'a82744fa-2103-11e8-8cc7-14dda97c5664.jpg', null);
INSERT INTO `notes` VALUES ('b2f7e7f3-2102-11e8-8cc7-14dda97c5664', '93650318-2050-11e8-9c83-14dda97c5664', '利用太阳能提取海水为淡水 海水淡化', '一个很简单的装置就可以利用太阳能提取海水为淡水，利用太阳能热使海水蒸发，经过冷却后收集淡水。海水淡化', 'a0a379e9-2102-11e8-8cc7-14dda97c5664.jpg', '4bfe31a1-20ff-11e8-8cc7-14dda97c5664', '1520315611', '1', null, null, null);
INSERT INTO `notes` VALUES ('b648b079-2101-11e8-8cc7-14dda97c5664', '93650318-2050-11e8-9c83-14dda97c5664', '通天塔太阳热能风力发电系统', ' 主要结构就是一个啤酒桶状烟囱内安装风机发电。原理是太阳晒热烟囱内的空气后，热空气上升推动风力机发电。\r\n   全球变暖，环境堪忧，在环境灾难面前，你就是创造的千百亿的财富也会顷刻间灰飞烟灭的！ 1000米高的通天塔发电系统，总投资500万，装机容量可以达到12万千瓦。它每小时可以发电12万度，一天发电268万度。如今风电上网电价在0.9-1.6元，我们按照1元计算，因为风力发电政府减免税收，用工也只有20人左右，发电不需要任何燃料，也不需要销售人员。所以它的运营成本很低。每天可以盈利268万，一年按350天计算，可以高达9.384亿元。去掉运营成本，一年赢利9亿元，投资500万，运营2天就可以收回投资成本！\r\n要达到12万千瓦的装机容量，火电厂需要投资5亿元，每月燃煤600万元。现在的风力发电需要投资11亿元，每年发电时间按2200小时，发电量只有26400万度，除去运营成本，每年盈利2亿。太阳能光伏发电需要投资按照每一万千瓦投资1.7亿计算要投资20.4亿元，每年发电时间为1700小时，发电量为20400万度，除去运营成本，每年盈利1.7亿左右。\r\n   通过以上的投资、发电量和盈利对比，我们就可以发现太阳能通天塔发电系统的投资和盈利的巨大优势！500万的投资，就相当于火电厂5亿、风力发电11亿和光伏发电20.4亿的投资规模。其盈利也是他们的3-5倍！\r\n  太阳能通天塔发电系统正常运营一个月，就可以盈利7000万左右，利用这些钱我们还可以扩大规模投资，把通天塔增高到2000米，只需要投资200万，把进风通道延长1000米，需要投资200万，投资100万在通天塔周围安装太阳能反射镜，再增加88万千瓦的发电机，投资在5000万左右。从而使通天塔的发电规模提高到100万千瓦的装机容量，每天盈利高达2400万，全年收入达到80亿！80亿元可以修建5座3000米高的通天塔，装机容量可以高达3000千瓦，年盈利2000亿元！', 'a008ccaf-2101-11e8-8cc7-14dda97c5664.jpg', '0a623fe9-2043-11e8-9c83-14dda97c5664', '1520315187', '1', null, null, null);
INSERT INTO `notes` VALUES ('dde790ff-2339-11e8-b40d-14dda97c5664', '93650318-2050-11e8-9c83-14dda97c5664', '抛物面太阳能加热器', '抛物面太阳能加热器，直接加热水进行热能发电：', 'b7bac649-2339-11e8-b40d-14dda97c5664.jpg', '0a623fe9-2043-11e8-9c83-14dda97c5664', '1520559207', '1', 'c484173a-2339-11e8-b40d-14dda97c5664.jpg', 'cba0a6f7-2339-11e8-b40d-14dda97c5664.jpg', 'd511619d-2339-11e8-b40d-14dda97c5664.jpg');
INSERT INTO `notes` VALUES ('f100b941-2103-11e8-8cc7-14dda97c5664', 'e8afad21-2050-11e8-9c83-14dda97c5664', '谁能给我看看这个发动机凸轮动画是不是有问题', '我不管怎么看都是三冲程 看看视频吧 是做动画的时候搞错了还是我没看懂  还有里面的REi=6：1是什么意思  还有它的凸轮如果是5缸和9缸应该是都是凸轮 我是小白 不要见怪啊', null, '4bfe31a1-20ff-11e8-8cc7-14dda97c5664', '1520316144', '1', null, null, null);

-- ----------------------------
-- Table structure for notessection
-- ----------------------------
DROP TABLE IF EXISTS `notessection`;
CREATE TABLE `notessection` (
  `Id` varchar(36) NOT NULL,
  `SectionName` varchar(20) NOT NULL,
  `Priority` int(11) DEFAULT '100',
  `Image` varchar(255) DEFAULT 'default.jpg',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of notessection
-- ----------------------------
INSERT INTO `notessection` VALUES ('93650318-2050-11e8-9c83-14dda97c5664', '能源制造', '105', 'http://101.200.58.3/OSSWebsite/res/9c472588-3a0b-479a-a682-12c389f781ed.png');
INSERT INTO `notessection` VALUES ('e8afad21-2050-11e8-9c83-14dda97c5664', '航空航天制造', '104', 'http://101.200.58.3/OSSWebsite/res/fa441ee6-5201-496f-8ea7-01d6457657d5.png');
INSERT INTO `notessection` VALUES ('e8bb1efe-2050-11e8-9c83-14dda97c5664', '科技科学', '101', 'http://101.200.58.3/OSSWebsite/res/89a8cbf7-ff8d-40bf-a7ad-3b27631c9f5d.png');
INSERT INTO `notessection` VALUES ('e8c13ff0-2050-11e8-9c83-14dda97c5664', '模型技术', '100', 'http://101.200.58.3/OSSWebsite/res/e952324e-9d11-438a-b3db-111fbf4bf646.png');
