/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : yunlianjinyang

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2017-06-23 17:49:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `db_access`
-- ----------------------------
DROP TABLE IF EXISTS `db_access`;
CREATE TABLE `db_access` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `photo` varchar(100) NOT NULL,
  `access` varchar(255) NOT NULL COMMENT '链接',
  `time` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of db_access
-- ----------------------------
INSERT INTO `db_access` VALUES ('4', 'data/20170621/5949d9e32f37e.jpg', 'http://www.baidu.com', '1498113122');
INSERT INTO `db_access` VALUES ('5', 'data/20170622/594b648677cd9.jpg', '', '1498113158');

-- ----------------------------
-- Table structure for `db_auth_group`
-- ----------------------------
DROP TABLE IF EXISTS `db_auth_group`;
CREATE TABLE `db_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` varchar(2000) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_auth_group
-- ----------------------------
INSERT INTO `db_auth_group` VALUES ('1', '超级管理员', '1', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31');
INSERT INTO `db_auth_group` VALUES ('2', '新手', '1', '1');
INSERT INTO `db_auth_group` VALUES ('3', '部门查看', '1', '1,2,3,4,5,6,7');
INSERT INTO `db_auth_group` VALUES ('5', '操作员', '1', '2,3,4');

-- ----------------------------
-- Table structure for `db_auth_group_access`
-- ----------------------------
DROP TABLE IF EXISTS `db_auth_group_access`;
CREATE TABLE `db_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_auth_group_access
-- ----------------------------
INSERT INTO `db_auth_group_access` VALUES ('1', '1');
INSERT INTO `db_auth_group_access` VALUES ('1', '2');
INSERT INTO `db_auth_group_access` VALUES ('1', '3');

-- ----------------------------
-- Table structure for `db_auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `db_auth_rule`;
CREATE TABLE `db_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_auth_rule
-- ----------------------------
INSERT INTO `db_auth_rule` VALUES ('1', 'Home/Index/index', '默认', '1', '1', '');
INSERT INTO `db_auth_rule` VALUES ('2', 'Home/Product/index', '理财产品列表', '1', '1', '');
INSERT INTO `db_auth_rule` VALUES ('3', 'Home/Product/details', '理财产品详情', '1', '1', '');
INSERT INTO `db_auth_rule` VALUES ('4', 'Home/Product/add', '理财产品添加', '1', '1', '');
INSERT INTO `db_auth_rule` VALUES ('5', 'Home/Product/save', '理财产品修改', '1', '1', '');
INSERT INTO `db_auth_rule` VALUES ('6', 'Home/Product/delete', '理财产品删除', '1', '1', '');
INSERT INTO `db_auth_rule` VALUES ('7', 'Home/Goods/index', '商品列表', '1', '1', '');
INSERT INTO `db_auth_rule` VALUES ('8', 'Home/Goods/add', '商品添加', '1', '1', '');
INSERT INTO `db_auth_rule` VALUES ('9', 'Home/Goods/delete', '商品删除', '1', '1', '');
INSERT INTO `db_auth_rule` VALUES ('10', 'Home/Goods/save', '商品修改', '1', '1', '');
INSERT INTO `db_auth_rule` VALUES ('11', 'Home/Job/del', '岗位删除', '1', '1', '');
INSERT INTO `db_auth_rule` VALUES ('12', 'Home/Vip/index', '会员列表', '1', '1', '');
INSERT INTO `db_auth_rule` VALUES ('13', 'Home/Vip/details', '会员详情', '1', '1', '');
INSERT INTO `db_auth_rule` VALUES ('14', 'Home/Vip/add', '会员添加', '1', '1', '');
INSERT INTO `db_auth_rule` VALUES ('15', 'Home/Vip/save', '会员修改', '1', '1', '');
INSERT INTO `db_auth_rule` VALUES ('16', 'Home/Vip/delete', '会员删除', '1', '1', '');
INSERT INTO `db_auth_rule` VALUES ('17', 'Home/AuthRule/index', '权限管理', '1', '1', '');
INSERT INTO `db_auth_rule` VALUES ('18', 'Home/AuthGroup/index', '权限组管理', '1', '1', '');
INSERT INTO `db_auth_rule` VALUES ('19', 'Home/AuthGroup/edit', '权限组修改', '1', '1', '');
INSERT INTO `db_auth_rule` VALUES ('20', 'Home/AuthRule/edit', '权限修改', '1', '1', '');

-- ----------------------------
-- Table structure for `db_dcht`
-- ----------------------------
DROP TABLE IF EXISTS `db_dcht`;
CREATE TABLE `db_dcht` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `order_id` int(10) NOT NULL,
  `jname` varchar(50) NOT NULL COMMENT '甲方名字',
  `yname` varchar(100) NOT NULL COMMENT '乙方名字',
  `idnumber` varchar(50) NOT NULL COMMENT '身份证号',
  `phone` varchar(20) NOT NULL COMMENT '手机号',
  `number` int(10) NOT NULL COMMENT '购买数量',
  `cycle` varchar(5) NOT NULL COMMENT '期数',
  `money` varchar(10) NOT NULL COMMENT '金额',
  `earnings` varchar(10) NOT NULL COMMENT '收益',
  `order_sn` varchar(50) NOT NULL COMMENT '订单编号',
  `ynumber` varchar(50) NOT NULL COMMENT '羊耳朵号',
  `bnumber` varchar(50) NOT NULL COMMENT '保险单号',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=178 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_dcht
-- ----------------------------
INSERT INTO `db_dcht` VALUES ('4', '0', '黑龙江政兴农业有限公司', '林林', '*****', '', '0', '4', '3000', '360', '2017051998748', '', '');
INSERT INTO `db_dcht` VALUES ('5', '0', '黑龙江政兴农业有限公司', '林林', '12345678945612222', '18800439028', '2', '4', '2000', '240', '2017051972240', '', '');
INSERT INTO `db_dcht` VALUES ('6', '0', '黑龙江政兴农业有限公司', '林林', '12345678945612222', '18800439028', '3', '12', '15000', '3000', '2017051999207', '', '');
INSERT INTO `db_dcht` VALUES ('7', '0', '黑龙江政兴农业有限公司', '就是我', '5555555555555', '15621453698', '1', '4', '1000', '120', '2017051982928', '', '');
INSERT INTO `db_dcht` VALUES ('8', '0', '黑龙江政兴农业有限公司', '王五', '2222222222222', '15901236123', '3', '4', '3000', '360', '2017051946876', '', '');
INSERT INTO `db_dcht` VALUES ('9', '0', '黑龙江政兴农业有限公司', '王五', '2222222222222', '15901236123', '1', '4', '1000', '120', '2017051937603', '', '');
INSERT INTO `db_dcht` VALUES ('10', '0', '黑龙江政兴农业有限公司', '张三', '22222222222222', '13500000000', '1', '12', '5000', '1000', '2017051979409', '', '');
INSERT INTO `db_dcht` VALUES ('11', '0', '黑龙江政兴农业有限公司', '林博文', '230321199504284617', '18503696064', '1', '4', '1000', '120', '2017052227317', '', '');
INSERT INTO `db_dcht` VALUES ('12', '0', '黑龙江政兴农业有限公司', '吴凤霞', '8384858585858', '', '1', '12', '5000', '1000', '2017052287283', '', '');
INSERT INTO `db_dcht` VALUES ('13', '0', '黑龙江政兴农业有限公司', '吴凤霞', '230623199211201242', '15124518257', '1', '4', '1000', '120', '2017052235166', '', '');
INSERT INTO `db_dcht` VALUES ('14', '0', '黑龙江政兴农业有限公司', '林伯温', '', '15124518257', '1', '4', '1000', '120', '2017052375202', '', '');
INSERT INTO `db_dcht` VALUES ('15', '0', '黑龙江政兴农业有限公司', '林伯温', '', '15124518257', '1', '4', '1000', '120', '2017052354661', '', '');
INSERT INTO `db_dcht` VALUES ('16', '0', '黑龙江政兴农业有限公司', '林伯温', '', '15124518257', '1', '4', '1000', '120', '2017052389529', '', '');
INSERT INTO `db_dcht` VALUES ('17', '0', '黑龙江政兴农业有限公司', '于静', '', '', '1', '4', '1000', '120', '2017060159806', '', '');
INSERT INTO `db_dcht` VALUES ('18', '0', '黑龙江政兴农业有限公司', '于静', '', '', '1', '4', '1000', '120', '2017060177442', '', '');
INSERT INTO `db_dcht` VALUES ('19', '0', '黑龙江政兴农业有限公司', '于静', '', '', '1', '12', '5000', '1000', '2017060166274', '', '');
INSERT INTO `db_dcht` VALUES ('20', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '1000', '120', '2017060276419', '', '');
INSERT INTO `db_dcht` VALUES ('21', '0', '黑龙江政兴农业有限公司', '经理', '*****', '', '1', '12', '5000', '1000', '2017060231061', '', '');
INSERT INTO `db_dcht` VALUES ('22', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '12', '5000', '1000', '2017060293227', '', '');
INSERT INTO `db_dcht` VALUES ('23', '0', '黑龙江政兴农业有限公司', '吴凤霞', '230623199211201242', '18612336366', '1', '4', '1000', '120', '2017060205230', '', '');
INSERT INTO `db_dcht` VALUES ('24', '0', '黑龙江政兴农业有限公司', '吴凤霞', '230623199211201242', '18612336366', '1', '12', '5000', '1000', '2017060246016', '', '');
INSERT INTO `db_dcht` VALUES ('25', '0', '黑龙江政兴农业有限公司', '吴凤霞', '230623199211201242', '18612336366', '1', '12', '5000', '1000', '2017060282697', '', '');
INSERT INTO `db_dcht` VALUES ('26', '0', '黑龙江政兴农业有限公司', '吴凤霞', '230623199211201242', '18612336366', '1', '12', '5000', '1000', '2017060213079', '', '');
INSERT INTO `db_dcht` VALUES ('27', '0', '黑龙江政兴农业有限公司', '吴凤霞', '230623199211201242', '18612336366', '1', '12', '5000', '1000', '2017060281312', '', '');
INSERT INTO `db_dcht` VALUES ('28', '0', '黑龙江政兴农业有限公司', '吴凤霞', '230623199211201242', '18612336366', '1', '12', '5000', '1000', '2017060218482', '', '');
INSERT INTO `db_dcht` VALUES ('29', '0', '黑龙江政兴农业有限公司', '吴凤霞', '230623199211201242', '18612336366', '1', '12', '5000', '1000', '2017060222892', '', '');
INSERT INTO `db_dcht` VALUES ('30', '0', '黑龙江政兴农业有限公司', '吴凤霞', '230623199211201242', '', '1', '12', '5000', '1000', '2017060519382', '', '');
INSERT INTO `db_dcht` VALUES ('31', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '1000', '120', '2017061686722', '', '');
INSERT INTO `db_dcht` VALUES ('32', '0', '黑龙江政兴农业有限公司', '吴凤霞', '230623199211201242', '18612336366', '1', '12', '5000', '1000', '2017061637151', '', '');
INSERT INTO `db_dcht` VALUES ('33', '0', '黑龙江政兴农业有限公司', '吴凤霞', '230623199211201242', '18612336366', '1', '12', '5000', '1000', '2017061655680', '', '');
INSERT INTO `db_dcht` VALUES ('34', '0', '黑龙江政兴农业有限公司', '吴凤霞', '230623199211201242', '18612336366', '1', '12', '5000', '1000', '2017061646904', '', '');
INSERT INTO `db_dcht` VALUES ('35', '0', '黑龙江政兴农业有限公司', '吴凤霞', '230623199211201242', '18612336366', '1', '12', '5000', '1000', '2017061640663', '', '');
INSERT INTO `db_dcht` VALUES ('36', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '12', '5000', '1000', '2017061858049', '', '');
INSERT INTO `db_dcht` VALUES ('37', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '12', '5000', '1000', '2017061872414', '', '');
INSERT INTO `db_dcht` VALUES ('38', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '1000', '120', '2017061836368', '', '');
INSERT INTO `db_dcht` VALUES ('39', '0', '黑龙江政兴农业有限公司', '', '', '18204601880', '0', '12', '0', '0', '2017061951099', '', '');
INSERT INTO `db_dcht` VALUES ('40', '0', '黑龙江政兴农业有限公司', '阿里郎', '*****', '18612336366', '1', '12', '1', '0.2', '2017061927400', '', '');
INSERT INTO `db_dcht` VALUES ('41', '0', '黑龙江政兴农业有限公司', '冯宇彬', '230521', '18045054625', '1', '12', '1', '0.2', '2017061977728', '', '');
INSERT INTO `db_dcht` VALUES ('42', '0', '黑龙江政兴农业有限公司', '冯宇彬', '230521', '18045054625', '1', '12', '1', '0.2', '2017061923786', '', '');
INSERT INTO `db_dcht` VALUES ('43', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '12', '1', '0.2', '2017061932890', '', '');
INSERT INTO `db_dcht` VALUES ('44', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '12', '1', '0.2', '2017061921143', '', '');
INSERT INTO `db_dcht` VALUES ('45', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '12', '1', '0.2', '2017061979119', '', '');
INSERT INTO `db_dcht` VALUES ('46', '0', '黑龙江政兴农业有限公司', '冯宇彬', '230521', '18045054625', '1', '12', '1', '0.2', '2017061946628', '', '');
INSERT INTO `db_dcht` VALUES ('47', '0', '黑龙江政兴农业有限公司', '冯宇彬', '230521', '18045054625', '1', '12', '1', '0.2', '2017061979998', '', '');
INSERT INTO `db_dcht` VALUES ('48', '0', '黑龙江政兴农业有限公司', '冯宇彬', '230521', '18045054625', '1', '12', '1', '0.2', '2017061902819', '', '');
INSERT INTO `db_dcht` VALUES ('49', '0', '黑龙江政兴农业有限公司', '冯宇彬', '230521', '18045054625', '1', '12', '1', '0.2', '2017061905422', '', '');
INSERT INTO `db_dcht` VALUES ('50', '0', '黑龙江政兴农业有限公司', '', '*****', '', '1', '12', '1', '0.2', '2017061953406', '', '');
INSERT INTO `db_dcht` VALUES ('51', '0', '黑龙江政兴农业有限公司', '', '*****', '', '1', '12', '1', '0.2', '2017061903553', '', '');
INSERT INTO `db_dcht` VALUES ('52', '0', '黑龙江政兴农业有限公司', '', '*****', '', '1', '12', '1', '0.2', '2017061985327', '', '');
INSERT INTO `db_dcht` VALUES ('53', '0', '黑龙江政兴农业有限公司', '', '*****', '', '1', '4', '1000', '120', '2017061993494', '', '');
INSERT INTO `db_dcht` VALUES ('54', '0', '黑龙江政兴农业有限公司', '', '*****', '', '1', '12', '1', '0.2', '2017061984980', '', '');
INSERT INTO `db_dcht` VALUES ('55', '0', '黑龙江政兴农业有限公司', '', '*****', '', '1', '12', '5000', '0.2', '2017061994543', '', '');
INSERT INTO `db_dcht` VALUES ('56', '0', '黑龙江政兴农业有限公司', '', '*****', '', '1', '12', '1', '0.2', '2017061932414', '', '');
INSERT INTO `db_dcht` VALUES ('57', '0', '黑龙江政兴农业有限公司', '', '*****', '', '1', '12', '1', '0.2', '2017061909380', '', '');
INSERT INTO `db_dcht` VALUES ('58', '0', '黑龙江政兴农业有限公司', '', '*****', '', '1', '12', '1', '0.2', '2017061983775', '', '');
INSERT INTO `db_dcht` VALUES ('59', '0', '黑龙江政兴农业有限公司', '', '*****', '', '1', '12', '1', '0.2', '2017061966857', '', '');
INSERT INTO `db_dcht` VALUES ('60', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '12', '1', '0.2', '2017061926782', '', '');
INSERT INTO `db_dcht` VALUES ('61', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '12', '1', '0.2', '2017062017944', '', '');
INSERT INTO `db_dcht` VALUES ('62', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '12', '1', '0.2', '2017062063122', '', '');
INSERT INTO `db_dcht` VALUES ('63', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '12', '1', '0.2', '2017062023121', '', '');
INSERT INTO `db_dcht` VALUES ('64', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '1000', '120', '2017062063135', '', '');
INSERT INTO `db_dcht` VALUES ('65', '0', '黑龙江政兴农业有限公司', '', '*****', '', '1', '12', '1', '0.2', '2017062087744', '', '');
INSERT INTO `db_dcht` VALUES ('66', '0', '黑龙江政兴农业有限公司', '', '*****', '', '1', '12', '1', '0.2', '2017062019688', '', '');
INSERT INTO `db_dcht` VALUES ('67', '0', '黑龙江政兴农业有限公司', '阿里郎', '*****', '18612336366', '1', '12', '1', '0.2', '2017062048847', '', '');
INSERT INTO `db_dcht` VALUES ('68', '0', '黑龙江政兴农业有限公司', '', '*****', '', '1', '12', '1', '0.2', '2017062021930', '', '');
INSERT INTO `db_dcht` VALUES ('69', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '12', '1', '0.2', '2017062064069', '', '');
INSERT INTO `db_dcht` VALUES ('70', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '12', '1', '0.2', '2017062014609', '', '');
INSERT INTO `db_dcht` VALUES ('71', '0', '黑龙江政兴农业有限公司', '阿里郎', '*****', '18612336366', '1', '4', '1000', '120', '2017062003208', '', '');
INSERT INTO `db_dcht` VALUES ('72', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '12', '1', '0.2', '2017062061544', '', '');
INSERT INTO `db_dcht` VALUES ('73', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '12', '1', '0.2', '2017062001111', '', '');
INSERT INTO `db_dcht` VALUES ('74', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '12', '1', '0.2', '2017062079486', '', '');
INSERT INTO `db_dcht` VALUES ('75', '0', '黑龙江政兴农业有限公司', '', '*****', '', '1', '12', '1', '0.2', '2017062061313', '', '');
INSERT INTO `db_dcht` VALUES ('76', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '12', '1', '0.2', '2017062086607', '', '');
INSERT INTO `db_dcht` VALUES ('77', '0', '黑龙江政兴农业有限公司', '', '', '13206941018', '1', '12', '1', '0.2', '2017062079108', '', '');
INSERT INTO `db_dcht` VALUES ('78', '0', '黑龙江政兴农业有限公司', '', '', '13206941018', '1', '12', '1', '0.2', '2017062060473', '', '');
INSERT INTO `db_dcht` VALUES ('79', '0', '黑龙江政兴农业有限公司', '', '', '13206941018', '1', '12', '1', '0.2', '2017062065190', '', '');
INSERT INTO `db_dcht` VALUES ('80', '0', '黑龙江政兴农业有限公司', '', '', '13206941018', '1', '12', '1', '0.2', '2017062071494', '', '');
INSERT INTO `db_dcht` VALUES ('81', '0', '黑龙江政兴农业有限公司', '', '', '13206941018', '1', '12', '1', '0.2', '2017062059560', '', '');
INSERT INTO `db_dcht` VALUES ('82', '0', '黑龙江政兴农业有限公司', '冯宇彬', '230521', '18045054625', '1', '12', '1', '0.2', '2017062043953', '', '');
INSERT INTO `db_dcht` VALUES ('83', '0', '黑龙江政兴农业有限公司', '冯宇彬', '230521', '18045054625', '1', '12', '1', '0.2', '2017062052900', '', '');
INSERT INTO `db_dcht` VALUES ('84', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '12', '1', '0.2', '2017062059624', '', '');
INSERT INTO `db_dcht` VALUES ('85', '0', '黑龙江政兴农业有限公司', '阿里郎', '*****', '18612336366', '1', '12', '1', '0.2', '2017062077481', '', '');
INSERT INTO `db_dcht` VALUES ('86', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '12', '1', '0.2', '2017062085937', '', '');
INSERT INTO `db_dcht` VALUES ('87', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '12', '1', '0.2', '2017062060256', '', '');
INSERT INTO `db_dcht` VALUES ('88', '0', '黑龙江政兴农业有限公司', '', '********', '', '1', '12', '1', '0.2', '2017062096066', '', '');
INSERT INTO `db_dcht` VALUES ('89', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '12', '1', '0.2', '2017062035834', '', '');
INSERT INTO `db_dcht` VALUES ('90', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '1000', '120', '2017062077777', '', '');
INSERT INTO `db_dcht` VALUES ('91', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '1000', '120', '2017062096158', '', '');
INSERT INTO `db_dcht` VALUES ('92', '0', '黑龙江政兴农业有限公司', '', '', '18503696064', '1', '4', '3000', '390', '2017062078621', '', '');
INSERT INTO `db_dcht` VALUES ('93', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062047584', '', '');
INSERT INTO `db_dcht` VALUES ('94', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062048925', '', '');
INSERT INTO `db_dcht` VALUES ('95', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062092294', '', '');
INSERT INTO `db_dcht` VALUES ('96', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062067528', '', '');
INSERT INTO `db_dcht` VALUES ('97', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062026053', '', '');
INSERT INTO `db_dcht` VALUES ('98', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062052387', '', '');
INSERT INTO `db_dcht` VALUES ('99', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062025295', '', '');
INSERT INTO `db_dcht` VALUES ('100', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062058177', '', '');
INSERT INTO `db_dcht` VALUES ('101', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062059780', '', '');
INSERT INTO `db_dcht` VALUES ('102', '0', '黑龙江政兴农业有限公司', '冯宇彬', '230521', '18045054625', '1', '4', '3000', '390', '2017062018657', '', '');
INSERT INTO `db_dcht` VALUES ('103', '0', '黑龙江政兴农业有限公司', '冯宇彬', '230521', '18045054625', '1', '4', '3000', '390', '2017062010576', '', '');
INSERT INTO `db_dcht` VALUES ('104', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062060495', '', '');
INSERT INTO `db_dcht` VALUES ('105', '0', '黑龙江政兴农业有限公司', '冯宇彬', '230521', '18045054625', '1', '4', '3000', '390', '2017062012159', '', '');
INSERT INTO `db_dcht` VALUES ('106', '0', '黑龙江政兴农业有限公司', '冯宇彬', '230521', '18045054625', '1', '4', '3000', '390', '2017062059752', '', '');
INSERT INTO `db_dcht` VALUES ('107', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062086510', '', '');
INSERT INTO `db_dcht` VALUES ('108', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062052602', '', '');
INSERT INTO `db_dcht` VALUES ('109', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062079467', '', '');
INSERT INTO `db_dcht` VALUES ('110', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062083164', '', '');
INSERT INTO `db_dcht` VALUES ('111', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062090872', '', '');
INSERT INTO `db_dcht` VALUES ('112', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062049969', '', '');
INSERT INTO `db_dcht` VALUES ('113', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062044283', '', '');
INSERT INTO `db_dcht` VALUES ('114', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062053173', '', '');
INSERT INTO `db_dcht` VALUES ('115', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062055954', '', '');
INSERT INTO `db_dcht` VALUES ('116', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062052468', '', '');
INSERT INTO `db_dcht` VALUES ('117', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062090681', '', '');
INSERT INTO `db_dcht` VALUES ('118', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062028813', '', '');
INSERT INTO `db_dcht` VALUES ('119', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062091920', '', '');
INSERT INTO `db_dcht` VALUES ('120', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062047234', '', '');
INSERT INTO `db_dcht` VALUES ('121', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062099123', '', '');
INSERT INTO `db_dcht` VALUES ('122', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062047480', '', '');
INSERT INTO `db_dcht` VALUES ('123', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062021220', '', '');
INSERT INTO `db_dcht` VALUES ('124', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062047023', '', '');
INSERT INTO `db_dcht` VALUES ('125', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062065183', '', '');
INSERT INTO `db_dcht` VALUES ('126', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062034221', '', '');
INSERT INTO `db_dcht` VALUES ('127', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062028029', '', '');
INSERT INTO `db_dcht` VALUES ('128', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062074913', '', '');
INSERT INTO `db_dcht` VALUES ('129', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062065963', '', '');
INSERT INTO `db_dcht` VALUES ('130', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062005853', '', '');
INSERT INTO `db_dcht` VALUES ('131', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062013233', '', '');
INSERT INTO `db_dcht` VALUES ('132', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062019276', '', '');
INSERT INTO `db_dcht` VALUES ('133', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062077150', '', '');
INSERT INTO `db_dcht` VALUES ('134', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062065128', '', '');
INSERT INTO `db_dcht` VALUES ('135', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062060156', '', '');
INSERT INTO `db_dcht` VALUES ('136', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062014798', '', '');
INSERT INTO `db_dcht` VALUES ('137', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062035109', '', '');
INSERT INTO `db_dcht` VALUES ('138', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062043184', '', '');
INSERT INTO `db_dcht` VALUES ('139', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062082473', '', '');
INSERT INTO `db_dcht` VALUES ('140', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062000327', '', '');
INSERT INTO `db_dcht` VALUES ('141', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062085165', '', '');
INSERT INTO `db_dcht` VALUES ('142', '0', '黑龙江政兴农业有限公司', '', '', '18503696064', '1', '4', '3000', '390', '2017062028307', '', '');
INSERT INTO `db_dcht` VALUES ('143', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062091801', '', '');
INSERT INTO `db_dcht` VALUES ('144', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062078332', '', '');
INSERT INTO `db_dcht` VALUES ('145', '0', '黑龙江政兴农业有限公司', '', '', '18045054625', '1', '4', '2000', '260', '2017062193240', '', '');
INSERT INTO `db_dcht` VALUES ('146', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '2000', '260', '2017062154572', '', '');
INSERT INTO `db_dcht` VALUES ('147', '0', '黑龙江政兴农业有限公司', '', '', '18045054625', '1', '4', '2000', '260', '2017062173120', '', '');
INSERT INTO `db_dcht` VALUES ('148', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '2000', '260', '2017062109417', '', '');
INSERT INTO `db_dcht` VALUES ('149', '0', '黑龙江政兴农业有限公司', '', '', '18503696064', '1', '4', '2000', '260', '2017062133520', '', '');
INSERT INTO `db_dcht` VALUES ('150', '0', '黑龙江政兴农业有限公司', '', '', '18503696064', '1', '4', '2000', '260', '2017062164505', '', '');
INSERT INTO `db_dcht` VALUES ('151', '0', '黑龙江政兴农业有限公司', '', '', '18045054625', '1', '4', '2000', '260', '2017062188371', '', '');
INSERT INTO `db_dcht` VALUES ('152', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '2000', '260', '2017062177629', '', '');
INSERT INTO `db_dcht` VALUES ('153', '0', '黑龙江政兴农业有限公司', '', '', '', '0', '4', '0', '0', '2017062125265', '', '');
INSERT INTO `db_dcht` VALUES ('154', '0', '黑龙江政兴农业有限公司', '', '', '', '0', '4', '0', '0', '2017062199122', '', '');
INSERT INTO `db_dcht` VALUES ('155', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '2000', '260', '2017062201096', '', '');
INSERT INTO `db_dcht` VALUES ('156', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '2000', '260', '2017062215051', '', '');
INSERT INTO `db_dcht` VALUES ('157', '0', '黑龙江政兴农业有限公司', '吴', '738383839393“ek', '18612336366', '1', '4', '3000', '390', '2017062286486', '', '');
INSERT INTO `db_dcht` VALUES ('158', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062228516', '', '');
INSERT INTO `db_dcht` VALUES ('159', '0', '黑龙江政兴农业有限公司', '啊啊啊', '********', '18045054625', '1', '4', '3000', '390', '2017062297483', '', '');
INSERT INTO `db_dcht` VALUES ('160', '0', '黑龙江政兴农业有限公司', '啊啊啊', '********', '18045054625', '1', '4', '3000', '390', '2017062273278', '', '');
INSERT INTO `db_dcht` VALUES ('161', '0', '黑龙江政兴农业有限公司', '啊啊啊', '********', '18045054625', '1', '4', '3000', '390', '2017062270635', '', '');
INSERT INTO `db_dcht` VALUES ('162', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062253258', '', '');
INSERT INTO `db_dcht` VALUES ('163', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062210593', '', '');
INSERT INTO `db_dcht` VALUES ('164', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062298041', '', '');
INSERT INTO `db_dcht` VALUES ('165', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062280008', '', '');
INSERT INTO `db_dcht` VALUES ('166', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062213949', '', '');
INSERT INTO `db_dcht` VALUES ('167', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062206326', '', '');
INSERT INTO `db_dcht` VALUES ('168', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062237375', '', '');
INSERT INTO `db_dcht` VALUES ('169', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062329994', '', '');
INSERT INTO `db_dcht` VALUES ('170', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062314584', '', '');
INSERT INTO `db_dcht` VALUES ('171', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062324771', '', '');
INSERT INTO `db_dcht` VALUES ('172', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062320357', '', '');
INSERT INTO `db_dcht` VALUES ('173', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062336632', '', '');
INSERT INTO `db_dcht` VALUES ('174', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062371318', '', '');
INSERT INTO `db_dcht` VALUES ('175', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062364023', '', '');
INSERT INTO `db_dcht` VALUES ('176', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062383498', '', '');
INSERT INTO `db_dcht` VALUES ('177', '0', '黑龙江政兴农业有限公司', '', '', '', '1', '4', '3000', '390', '2017062340574', '', '');

-- ----------------------------
-- Table structure for `db_goods`
-- ----------------------------
DROP TABLE IF EXISTS `db_goods`;
CREATE TABLE `db_goods` (
  `gid` int(5) NOT NULL AUTO_INCREMENT,
  `gname` varchar(100) NOT NULL,
  `gmuch` varchar(20) NOT NULL COMMENT '原价',
  `time` int(10) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `much` double(20,0) NOT NULL COMMENT '现价',
  `zkou` varchar(20) NOT NULL COMMENT '折扣',
  `location` varchar(200) NOT NULL COMMENT '发货地',
  `minute` varchar(1000) NOT NULL COMMENT '商品介绍',
  `spec` varchar(20) NOT NULL COMMENT '规格',
  `stock` varchar(10) NOT NULL COMMENT '库存',
  `nowamout` varchar(10) NOT NULL COMMENT '库存',
  `xphoto` varchar(100) NOT NULL COMMENT '缩略图',
  `kmuch` double(15,0) NOT NULL COMMENT '快递费',
  `pingjia` varchar(255) NOT NULL COMMENT '评价',
  `xl` int(10) NOT NULL COMMENT '销量',
  `kd` varchar(30) DEFAULT NULL COMMENT '快递方式',
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_goods
-- ----------------------------
INSERT INTO `db_goods` VALUES ('4', '杜泊羔羊肉卷5斤 内蒙新鲜羊肉卷 火锅食材 涮锅生羊肉', '289', '1498012237', 'data/20170620/5948e7b7dccf7.jpg', '289', '', '', '6月龄鲜嫩杜泊羔羊，精选杜泊羔羊肉', '', '', '9999', '', '24', '', '325', '顺丰');
INSERT INTO `db_goods` VALUES ('5', '精品方砖5斤 内蒙新鲜羊肉卷 火锅食材羊肉片涮锅生羊肉', '223', '1498011798', 'data/20170620/5948ebce268c8.jpg', '223', '', '', '精品方砖5斤 内蒙新鲜羊肉卷 火锅食材羊肉片涮锅生羊肉', '', '', '999', '', '24', '', '75', '顺丰');
INSERT INTO `db_goods` VALUES ('8', '羊排2.2斤内蒙古呼伦贝尔新鲜羊肉烧烤火锅食材 羊肋排 ', '106', '1498011688', 'data/20170620/5948ecb5176fa.jpg', '106', '', '', '羊排2.2斤内蒙古呼伦贝尔新鲜羊肉烧烤火锅食材 羊肋排 ', '', '', '955', '', '24', '', '125', '顺丰');
INSERT INTO `db_goods` VALUES ('9', '羊肉串200gx6袋 内蒙草原新鲜生羊肉串 烧烤食材鲜羊肉  ', '158', '1498011672', 'data/20170620/5948ed437c206.jpg', '158', '', '', '羊肉串200gx6袋 内蒙草原新鲜生羊肉串 烧烤食材鲜羊肉  ', '', '', '998', '', '24', '', '95', '顺丰');
INSERT INTO `db_goods` VALUES ('10', '羊肉卷5斤 内蒙新鲜羊肉卷 火锅食材 羊肉片涮锅生羊肉 ', '218', '1498011657', 'data/20170620/5948ee73db1bb.jpg', '218', '', '', '羊肉卷5斤 内蒙新鲜羊肉卷 火锅食材 羊肉片涮锅生羊肉 ', '', '', '1000', '', '24', '', '99', '顺丰');
INSERT INTO `db_goods` VALUES ('11', '羊腿2.2斤内蒙古呼伦贝尔清真生羊肉 羊肉新鲜 生羊腿肉 ', '99', '1498011533', 'data/20170620/5948ee5b19a1d.jpg', '99', '', '', '羊腿2.2斤内蒙古呼伦贝尔清真生羊肉 羊肉新鲜 生羊腿肉 ', '', '', '975', '', '24', '', '67', '顺丰');
INSERT INTO `db_goods` VALUES ('12', '羊腿3斤内蒙古清真生羊肉 羊肉新鲜 烧烤羊腿食材生羊腿 ', '143', '1498011516', 'data/20170620/5948eed50602d.jpg', '143', '', '', '羊腿3斤内蒙古清真生羊肉 羊肉新鲜 烧烤羊腿食材生羊腿 ', '', '', '1000', '', '24', '', '751', '顺丰');

-- ----------------------------
-- Table structure for `db_goods_style`
-- ----------------------------
DROP TABLE IF EXISTS `db_goods_style`;
CREATE TABLE `db_goods_style` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `gid` int(10) DEFAULT NULL,
  `photo_thumb` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `create_time` int(30) DEFAULT NULL,
  `del` int(10) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_goods_style
-- ----------------------------
INSERT INTO `db_goods_style` VALUES ('47', '1', 'Uploads/20170510/59127b33a938d_thumb.jpg', 'Uploads/20170510/59127b33a938d.jpg', '1494383412', '1');
INSERT INTO `db_goods_style` VALUES ('48', '1', 'Uploads/20170510/59127b7a93420_thumb.jpg', 'Uploads/20170510/59127b7a93420.jpg', '1494383482', '1');
INSERT INTO `db_goods_style` VALUES ('49', '1', 'Uploads/20170510/59127b836bbe8_thumb.jpg', 'Uploads/20170510/59127b836bbe8.jpg', '1494383491', '1');

-- ----------------------------
-- Table structure for `db_gy`
-- ----------------------------
DROP TABLE IF EXISTS `db_gy`;
CREATE TABLE `db_gy` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `page` varchar(1000) NOT NULL,
  `photo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_gy
-- ----------------------------
INSERT INTO `db_gy` VALUES ('1', '云联金阳', '政兴农业有限公司推出的 “云联金阳” 牧场是移动端的一款产品，致力于通过移动互联网金融平台来帮助畜牧业发展。 云联金阳与来自全国各地的牧场进行合作， 统一售卖新型羊种并寄托养殖，同时售卖其附加产品 （羊肉、羊毛等）。', 'data/20170505/590bcfba8d149.jpg');

-- ----------------------------
-- Table structure for `db_ht`
-- ----------------------------
DROP TABLE IF EXISTS `db_ht`;
CREATE TABLE `db_ht` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `vid` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `count` varchar(100) NOT NULL COMMENT '合同内容',
  `time` varchar(20) NOT NULL,
  `order_id` int(10) NOT NULL,
  `pid` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_ht
-- ----------------------------
INSERT INTO `db_ht` VALUES ('1', '1', '李四', 'data/20170616/594372147aacd.jpg', 'wufengxia', '', '1497592340', '0', '0');
INSERT INTO `db_ht` VALUES ('4', '11', '', '', '合同标题', '222', '1494989758', '51', '1');
INSERT INTO `db_ht` VALUES ('6', '11', '', 'data/20170517/591bb5f119e61.jpg', '新合同', '', '1494988273', '52', '1');
INSERT INTO `db_ht` VALUES ('7', '11', '', 'data/20170517/591bb5f119e61.jpg', '标题', '', '', '53', '1');
INSERT INTO `db_ht` VALUES ('8', '37', '', 'data/20170622/594b3bf0a6f75.jpg', '啊啊啊', '', '1498102768', '0', '0');

-- ----------------------------
-- Table structure for `db_indent`
-- ----------------------------
DROP TABLE IF EXISTS `db_indent`;
CREATE TABLE `db_indent` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `number` varchar(30) NOT NULL,
  `str` varchar(5) NOT NULL,
  `type` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_indent
-- ----------------------------

-- ----------------------------
-- Table structure for `db_infomation`
-- ----------------------------
DROP TABLE IF EXISTS `db_infomation`;
CREATE TABLE `db_infomation` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `vid` int(10) NOT NULL,
  `count` varchar(255) NOT NULL,
  `time` varchar(50) NOT NULL,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_infomation
-- ----------------------------
INSERT INTO `db_infomation` VALUES ('1', '1', '444444', '1494988986', '');
INSERT INTO `db_infomation` VALUES ('4', '3', '222', '1494065952', '');
INSERT INTO `db_infomation` VALUES ('5', '1', '555555', '', '');
INSERT INTO `db_infomation` VALUES ('6', '4', '这是老李的消息', '1494225116', '');
INSERT INTO `db_infomation` VALUES ('7', '4', '333', '1494295478', '');
INSERT INTO `db_infomation` VALUES ('8', '11', '3333', '1494482261', '');
INSERT INTO `db_infomation` VALUES ('9', '11', '提现成功，请查收', '1494960813', '');
INSERT INTO `db_infomation` VALUES ('10', '24', '提现成功，请查收', '1495099002', '');
INSERT INTO `db_infomation` VALUES ('11', '24', '提现成功，请查收', '1495099127', '');
INSERT INTO `db_infomation` VALUES ('12', '24', '提现成功，请查收', '1495099138', '');
INSERT INTO `db_infomation` VALUES ('13', '1', '提现成功，请查收', '1497791773', '');

-- ----------------------------
-- Table structure for `db_lbt`
-- ----------------------------
DROP TABLE IF EXISTS `db_lbt`;
CREATE TABLE `db_lbt` (
  `bid` int(2) NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_lbt
-- ----------------------------
INSERT INTO `db_lbt` VALUES ('2', 'data/20170621/5949d5ad320b2.jpg');
INSERT INTO `db_lbt` VALUES ('3', 'data/20170621/5949d5c078428.jpg');
INSERT INTO `db_lbt` VALUES ('4', 'data/20170621/5949d5cab5aa1.jpg');

-- ----------------------------
-- Table structure for `db_mlist`
-- ----------------------------
DROP TABLE IF EXISTS `db_mlist`;
CREATE TABLE `db_mlist` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `money1` double(10,2) NOT NULL,
  `money2` double(10,2) NOT NULL,
  `money3` double(10,2) NOT NULL,
  `money4` double(10,2) NOT NULL,
  `money5` double(10,2) NOT NULL,
  `money6` double(10,2) NOT NULL,
  `money7` double(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_mlist
-- ----------------------------
INSERT INTO `db_mlist` VALUES ('1', '50.00', '100.00', '300.00', '500.00', '1000.00', '2000.00', '3000.00');

-- ----------------------------
-- Table structure for `db_order`
-- ----------------------------
DROP TABLE IF EXISTS `db_order`;
CREATE TABLE `db_order` (
  `order_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `order_sn` varchar(20) NOT NULL,
  `buyer_name` varchar(255) NOT NULL,
  `adds` varchar(500) NOT NULL,
  `tel` varchar(12) NOT NULL,
  `pid` int(11) NOT NULL,
  `order_money` double(11,0) NOT NULL,
  `create_time` int(11) NOT NULL,
  `status` int(5) NOT NULL,
  `buyer_status` int(5) NOT NULL,
  `vid` int(11) NOT NULL,
  `del` int(1) NOT NULL,
  `number` varchar(20) NOT NULL,
  `price` double(20,0) NOT NULL,
  `g_style` int(2) NOT NULL,
  `remark` varchar(2000) NOT NULL,
  `gid` int(11) NOT NULL,
  `ftime` varchar(50) NOT NULL COMMENT '到期日期',
  `goods_pj` varchar(255) NOT NULL COMMENT '商品评价',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=285 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_order
-- ----------------------------
INSERT INTO `db_order` VALUES ('1', '2017052235166', '吴凤霞', '哈尔滨市香坊区民生路', '15124518257', '1', '1000', '1495441600', '0', '1', '1', '0', '1', '1000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('2', '2017052375202', '林伯温', '哈尔滨市香坊区民生路', '15124518257', '1', '1000', '1495530177', '0', '1', '2', '0', '1', '1000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('3', '2017052354661', '林伯温', '哈尔滨市香坊区民生路', '15124518257', '1', '1000', '1495530216', '0', '1', '2', '0', '1', '1000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('4', '2017052389529', '林伯温', '哈尔滨市香坊区民生路', '15124518257', '1', '1000', '1495530292', '0', '1', '2', '0', '1', '1000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('5', '2017052694879', '吴凤霞', '哈尔滨市香坊区民生路', '', '0', '30', '1495758582', '2', '0', '1', '1', '1', '20', '0', '无', '1', '', '');
INSERT INTO `db_order` VALUES ('6', '2017052615601', '吴凤霞', '哈尔滨市香坊区民生路', '18612336366', '0', '30', '1495760418', '2', '0', '1', '1', '1', '20', '0', '无', '1', '', '');
INSERT INTO `db_order` VALUES ('7', '2017052655597', '吴凤霞', '哈尔滨市香坊区民生路', '18612336366', '0', '30', '1495760562', '2', '0', '1', '1', '1', '20', '0', '无', '1', '', '');
INSERT INTO `db_order` VALUES ('8', '2017052606314', '吴凤霞', '哈尔滨市香坊区民生路', '18612336366', '0', '30', '1495761203', '2', '0', '1', '1', '1', '20', '0', '无', '1', '', '');
INSERT INTO `db_order` VALUES ('9', '2017052695248', '吴凤霞', '哈尔滨市香坊区民生路', '18612336366', '0', '30', '1495761903', '2', '1', '1', '1', '1', '20', '0', '无', '1', '', '');
INSERT INTO `db_order` VALUES ('10', '2017052655473', '林博文', '哈尔滨香坊区', '18345183823', '0', '30', '1495767041', '2', '0', '5', '1', '1', '20', '0', '无', '1', '', '');
INSERT INTO `db_order` VALUES ('11', '2017060106005', '林博文', '哈尔滨香坊区', '18345183823', '0', '30', '1496294608', '2', '0', '5', '1', '1', '20', '0', '无', '1', '', '');
INSERT INTO `db_order` VALUES ('12', '2017060198906', '吴凤霞', '哈尔滨市香坊区民生路', '', '0', '30', '1496300332', '2', '0', '1', '1', '1', '20', '0', '无', '1', '', '');
INSERT INTO `db_order` VALUES ('13', '2017060165351', '吴凤霞', '哈尔滨市香坊区民生路', '', '0', '30', '1496300468', '2', '0', '1', '1', '1', '20', '0', '无', '1', '', '');
INSERT INTO `db_order` VALUES ('14', '2017060107639', '林博文', '哈尔滨香坊区', '18345183823', '0', '30', '1496300522', '2', '0', '5', '1', '1', '20', '0', '无', '1', '', '');
INSERT INTO `db_order` VALUES ('15', '2017060172992', '林博文', '哈尔滨香坊区', '', '0', '30', '1496300606', '2', '0', '5', '1', '1', '20', '0', '无', '1', '', '');
INSERT INTO `db_order` VALUES ('16', '2017060199317', '吴凤霞', '哈尔滨市香坊区民生路', '', '0', '30', '1496301460', '2', '0', '1', '1', '1', '20', '0', '无', '1', '', '');
INSERT INTO `db_order` VALUES ('17', '2017060199635', '吴凤霞', '哈尔滨市香坊区民生路', '', '0', '30', '1496301816', '2', '0', '1', '1', '1', '20', '0', '无', '1', '', '');
INSERT INTO `db_order` VALUES ('18', '2017060159806', '于静', '哈尔滨', '', '1', '1000', '1496302288', '0', '0', '6', '0', '1', '1000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('19', '2017060177442', '于静', '哈尔滨', '', '1', '1000', '1496304827', '0', '0', '6', '0', '1', '1000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('20', '2017060166274', '于静', '哈尔滨', '', '2', '5000', '1496306407', '0', '0', '6', '0', '1', '5000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('21', '2017060178372', '吴凤霞', '哈尔滨市香坊区民生路', '', '0', '30', '1496306705', '2', '0', '1', '1', '1', '20', '0', '无', '1', '', '');
INSERT INTO `db_order` VALUES ('22', '2017060239035', '吴凤霞', '哈尔滨市香坊区民生路', '', '0', '30', '1496360906', '2', '0', '1', '1', '1', '20', '0', '无', '1', '', '');
INSERT INTO `db_order` VALUES ('23', '2017060276419', '', '', '', '1', '1000', '1496370585', '0', '0', '0', '0', '1', '1000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('24', '2017060257064', '经理', '哈尔滨', '', '0', '30', '1496380715', '2', '0', '7', '1', '1', '20', '0', '无', '1', '', '');
INSERT INTO `db_order` VALUES ('25', '2017060231061', '经理', '哈尔滨', '', '2', '5000', '1496380814', '0', '0', '7', '0', '1', '5000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('26', '2017060235523', '吴凤霞', '哈尔滨市香坊区民生路', '', '0', '0', '1496382283', '2', '0', '1', '1', '1', '0', '0', '无', '3', '', '');
INSERT INTO `db_order` VALUES ('27', '2017060292669', '林博文', '哈尔滨香坊区', '', '0', '0', '1496384209', '2', '1', '5', '1', '1', '0', '0', '无', '3', '', '');
INSERT INTO `db_order` VALUES ('28', '2017060263726', '吴凤霞', '哈尔滨市香坊区民生路', '', '0', '0', '1496384471', '2', '0', '1', '1', '1', '0', '0', '无', '3', '', '');
INSERT INTO `db_order` VALUES ('29', '2017060226619', '吴凤霞', '哈尔滨市香坊区民生路', '', '0', '30', '1496384607', '2', '0', '1', '1', '1', '20', '0', '无', '1', '', '');
INSERT INTO `db_order` VALUES ('30', '2017060289125', '吴凤霞', '哈尔滨市香坊区民生路', '', '0', '45', '1496384645', '2', '0', '1', '1', '1', '35', '0', '无', '2', '', '');
INSERT INTO `db_order` VALUES ('31', '2017060218589', '吴凤霞', '哈尔滨市香坊区民生路', '', '0', '0', '1496384738', '2', '0', '1', '1', '1', '0', '0', '无', '3', '', '');
INSERT INTO `db_order` VALUES ('32', '2017060286379', '吴凤霞', '哈尔滨市香坊区民生路', '', '0', '20', '1496384771', '2', '0', '1', '1', '1', '20', '0', '无', '3', '', '');
INSERT INTO `db_order` VALUES ('33', '2017060249967', '吴凤霞', '哈尔滨市香坊区民生路', '', '0', '1', '1496384808', '2', '0', '1', '1', '1', '1', '0', '无', '3', '', '');
INSERT INTO `db_order` VALUES ('34', '2017060276862', '吴凤霞', '哈尔滨市香坊区民生路', '', '0', '1', '1496384925', '2', '0', '1', '1', '1', '1', '0', '无', '3', '', '');
INSERT INTO `db_order` VALUES ('35', '2017060264431', '吴凤霞', '哈尔滨市香坊区民生路', '', '0', '1', '1496384983', '2', '0', '1', '1', '1', '1', '0', '无', '3', '', '');
INSERT INTO `db_order` VALUES ('36', '2017060248392', '于静', '哈尔滨', '', '0', '30', '1496385190', '2', '0', '6', '1', '1', '20', '0', '无', '1', '', '');
INSERT INTO `db_order` VALUES ('37', '2017060214020', '于静', '哈尔滨', '', '0', '30', '1496385428', '2', '0', '6', '1', '1', '20', '0', '无', '1', '', '');
INSERT INTO `db_order` VALUES ('38', '2017060293227', '', '', '', '2', '5000', '1496389837', '0', '0', '0', '0', '1', '5000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('39', '2017060205230', '吴凤霞', '哈尔滨市香坊区民生路', '18612336366', '1', '1000', '1496389914', '0', '0', '1', '0', '1', '1000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('40', '2017060246016', '吴凤霞', '哈尔滨市香坊区民生路', '18612336366', '2', '5000', '1496390012', '0', '0', '1', '0', '1', '5000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('41', '2017060282697', '吴凤霞', '哈尔滨市香坊区民生路', '18612336366', '2', '5000', '1496390389', '0', '0', '1', '0', '1', '5000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('42', '2017060213079', '吴凤霞', '哈尔滨市香坊区民生路', '18612336366', '2', '5000', '1496390414', '0', '0', '1', '0', '1', '5000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('43', '2017060281312', '吴凤霞', '哈尔滨市香坊区民生路', '18612336366', '2', '5000', '1496390466', '0', '0', '1', '0', '1', '5000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('44', '2017060218482', '吴凤霞', '哈尔滨市香坊区民生路', '18612336366', '2', '5000', '1496390558', '0', '1', '1', '0', '1', '5000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('45', '2017060222892', '吴凤霞', '哈尔滨市香坊区民生路', '18612336366', '2', '5000', '1496390589', '0', '0', '1', '0', '1', '5000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('46', '2017060297858', '吴凤霞', '哈尔滨市香坊区民生路', '18612336366', '0', '1', '1496390644', '2', '0', '1', '1', '1', '1', '0', '无', '3', '', '');
INSERT INTO `db_order` VALUES ('47', '2017060260554', '吴凤霞', '哈尔滨市香坊区民生路', '18612336366', '0', '1', '1496390890', '2', '0', '1', '1', '1', '1', '0', '无', '3', '', '');
INSERT INTO `db_order` VALUES ('48', '2017060290500', '吴凤霞', '哈尔滨市香坊区民生路', '18612336366', '0', '1', '1496391003', '2', '0', '1', '1', '1', '1', '0', '无', '3', '', '');
INSERT INTO `db_order` VALUES ('49', '2017060519382', '吴凤霞', '哈尔滨市香坊区民生路', '', '2', '5000', '1496617426', '0', '0', '1', '0', '1', '5000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('50', '2017061574288', '刘天俊', '哈尔滨，，', '15245987650', '0', '1', '1497508607', '2', '0', '8', '1', '1', '1', '0', '无', '3', '', '');
INSERT INTO `db_order` VALUES ('51', '2017061509681', '刘天俊', '哈尔滨，，', '15245987650', '0', '1', '1497509106', '2', '0', '8', '1', '1', '1', '0', '无', '3', '', '');
INSERT INTO `db_order` VALUES ('52', '2017061564002', '刘天俊', '哈尔滨，，', '15245987650', '0', '1', '1497509302', '2', '1', '8', '1', '1', '1', '0', '无', '3', '', '');
INSERT INTO `db_order` VALUES ('53', '2017061525375', '刘天俊', '哈尔滨，，', '15245987650', '0', '1', '1497509492', '2', '1', '8', '1', '1', '1', '0', '无', '3', '', '');
INSERT INTO `db_order` VALUES ('54', '2017061502057', '吴凤霞', '哈尔滨市香坊区民生路', '18612336366', '0', '1', '1497509645', '2', '0', '1', '1', '1', '1', '0', '无', '3', '', '');
INSERT INTO `db_order` VALUES ('55', '2017061503489', '吴凤霞', '哈尔滨市香坊区民生路', '18612336366', '0', '1', '1497509917', '2', '1', '1', '1', '1', '1', '0', '无', '3', '', '');
INSERT INTO `db_order` VALUES ('56', '2017061510784', '吴凤霞', '哈尔滨市香坊区民生路', '18612336366', '0', '1', '1497512020', '2', '1', '1', '1', '1', '1', '0', '无', '3', '', '');
INSERT INTO `db_order` VALUES ('57', '2017061618050', '吴凤霞', '哈尔滨市香坊区民生路', '18612336366', '0', '1', '1497546608', '2', '1', '1', '1', '1', '1', '0', '无', '3', '', '真心不错啊。');
INSERT INTO `db_order` VALUES ('58', '2017061601848', '刘天俊', '哈尔滨，，', '15245987650', '0', '1', '1497573052', '2', '1', '8', '1', '1', '1', '0', '无', '3', '', '');
INSERT INTO `db_order` VALUES ('59', '2017061686722', '', '', '', '1', '1000', '1497587324', '0', '0', '0', '0', '1', '1000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('60', '2017061637151', '吴凤霞', '哈尔滨市香坊区民生路', '18612336366', '2', '5000', '1497604305', '0', '0', '1', '0', '1', '5000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('61', '2017061655680', '吴凤霞', '哈尔滨市香坊区民生路', '18612336366', '2', '5000', '1497604410', '0', '0', '1', '0', '1', '5000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('62', '2017061646904', '吴凤霞', '哈尔滨市香坊区民生路', '18612336366', '2', '5000', '1497605029', '0', '0', '1', '0', '1', '5000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('63', '2017061640663', '吴凤霞', '哈尔滨市香坊区民生路', '18612336366', '2', '5000', '1497605085', '0', '0', '1', '0', '1', '5000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('64', '2017061858049', '', '', '', '2', '5000', '1497764677', '0', '0', '0', '0', '1', '5000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('65', '2017061872414', '', '', '', '2', '5000', '1497764692', '0', '0', '0', '0', '1', '5000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('66', '2017061836368', '', '', '', '1', '1000', '1497764700', '0', '0', '0', '0', '1', '1000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('67', '2017061951099', '', '', '18204601880', '2', '0', '1497849842', '0', '0', '14', '0', '', '5000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('68', '2017061927400', '阿里郎', '哈尔滨市香坊区民生路', '18612336366', '2', '1', '1497851656', '0', '1', '1', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('69', '2017061977728', '冯宇彬', '哈尔滨', '18045054625', '2', '1', '1497851825', '0', '0', '15', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('70', '2017061923786', '冯宇彬', '哈尔滨', '18045054625', '2', '1', '1497852275', '0', '0', '15', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('71', '2017061932890', '', '', '', '2', '1', '1497852496', '0', '0', '0', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('72', '2017061921143', '', '', '', '2', '1', '1497852497', '0', '0', '0', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('73', '2017061979119', '', '', '', '2', '1', '1497852539', '0', '0', '0', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('74', '2017061946628', '冯宇彬', '哈尔滨', '18045054625', '2', '1', '1497852806', '0', '0', '15', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('75', '2017061979998', '冯宇彬', '哈尔滨', '18045054625', '2', '1', '1497853190', '0', '0', '15', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('76', '2017061902819', '冯宇彬', '哈尔滨', '18045054625', '2', '1', '1497853402', '0', '0', '15', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('77', '2017061905422', '冯宇彬', '哈尔滨', '18045054625', '2', '1', '1497853567', '0', '0', '15', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('78', '2017061953406', '', '', '', '2', '1', '1497856114', '0', '1', '16', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('79', '2017061903553', '', '', '', '2', '1', '1497859002', '0', '1', '16', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('80', '2017061985327', '', '', '', '2', '1', '1497859049', '0', '1', '16', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('81', '2017061939602', '冯宇彬', '哈尔滨', '18045054625', '0', '45', '1497859694', '2', '0', '15', '1', '1', '35', '0', '无', '2', '', '');
INSERT INTO `db_order` VALUES ('82', '2017061993494', '', '', '', '1', '1000', '1497865360', '0', '1', '16', '0', '1', '1000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('83', '2017061984980', '', '', '', '2', '1', '1497876628', '0', '0', '16', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('84', '2017061994543', '', '', '', '2', '5000', '1497876907', '0', '0', '16', '0', '1', '5000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('85', '2017061932414', '', '', '', '2', '1', '1497877043', '0', '1', '16', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('86', '2017061909380', '', '', '', '2', '1', '1497877336', '0', '1', '16', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('87', '2017061983775', '', '', '', '2', '1', '1497878023', '0', '1', '16', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('88', '2017061966857', '', '', '', '2', '1', '1497878192', '0', '1', '16', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('89', '2017061967691', '阿里郎', '哈尔滨市香坊区民生路', '18612336366', '0', '1', '1497878482', '2', '0', '1', '1', '1', '1', '0', '无', '3', '', '');
INSERT INTO `db_order` VALUES ('90', '2017061926782', '', '', '', '2', '1', '1497881838', '0', '0', '0', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('91', '2017062017944', '', '', '', '2', '1', '1497914805', '0', '0', '0', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('92', '2017062063122', '', '', '', '2', '1', '1497914824', '0', '0', '0', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('93', '2017062023121', '', '', '', '2', '1', '1497914839', '0', '0', '0', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('94', '2017062063135', '', '', '', '1', '1000', '1497914979', '0', '0', '0', '0', '1', '1000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('95', '2017062087744', '', '', '', '2', '1', '1497915113', '0', '1', '16', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('96', '2017062019688', '', '', '', '2', '1', '1497915254', '0', '0', '16', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('97', '2017062048847', '阿里郎', '哈尔滨市香坊区民生路', '18612336366', '2', '1', '1497915554', '0', '0', '1', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('98', '2017062021930', '', '', '', '2', '1', '1497915827', '0', '1', '16', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('99', '2017062064069', '', '', '', '2', '1', '1497916064', '0', '1', '17', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('100', '2017062014609', '', '', '', '2', '1', '1497916157', '0', '0', '17', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('101', '2017062003208', '阿里郎', '哈尔滨市香坊区民生路', '18612336366', '1', '1000', '1497916538', '0', '1', '1', '0', '1', '1000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('102', '2017062061544', '', '', '', '2', '1', '1497916594', '0', '0', '0', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('103', '2017062001111', '', '', '', '2', '1', '1497916644', '0', '0', '0', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('104', '2017062079486', '', '', '', '2', '1', '1497916647', '0', '0', '0', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('105', '2017062061313', '', '', '', '2', '1', '1497916818', '0', '1', '16', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('106', '2017062086607', '', '', '', '2', '1', '1497916896', '0', '0', '0', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('107', '2017062079108', '', '', '13206941018', '2', '1', '1497917093', '0', '0', '18', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('108', '2017062060473', '', '', '13206941018', '2', '1', '1497917128', '0', '0', '18', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('109', '2017062065190', '', '', '13206941018', '2', '1', '1497917159', '0', '0', '18', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('110', '2017062071494', '', '', '13206941018', '2', '1', '1497917232', '0', '0', '18', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('111', '2017062059560', '', '', '13206941018', '2', '1', '1497917242', '0', '0', '18', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('112', '2017062043953', '冯宇彬', '哈尔滨', '18045054625', '2', '1', '1497917357', '0', '0', '15', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('113', '2017062052900', '冯宇彬', '哈尔滨', '18045054625', '2', '1', '1497917389', '0', '0', '15', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('114', '2017062059624', '', '', '', '2', '1', '1497918488', '0', '1', '19', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('115', '2017062077481', '阿里郎', '哈尔滨市香坊区民生路', '18612336366', '2', '1', '1497918756', '0', '1', '1', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('116', '2017062085937', '', '', '', '2', '1', '1497919325', '0', '0', '19', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('117', '2017062060256', '', '', '', '2', '1', '1497919460', '0', '1', '19', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('118', '2017062008789', '阿里郎', '哈尔滨市香坊区民生路', '18612336366', '0', '1', '1497920194', '2', '1', '1', '1', '1', '1', '0', '无', '3', '', '');
INSERT INTO `db_order` VALUES ('119', '2017062096066', '', '', '', '2', '1', '1497921227', '0', '0', '16', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('120', '2017062035834', '', '', '', '2', '1', '1497922414', '0', '0', '0', '0', '1', '1', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('121', '2017062077777', '', '', '', '1', '1000', '1497922517', '0', '0', '0', '0', '1', '1000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('122', '2017062096158', '', '', '', '1', '1000', '1497922574', '0', '0', '0', '0', '1', '1000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('123', '2017062075878', '阿里郎', '哈尔滨市香坊区民生路', '18612336366', '0', '1', '1497927275', '2', '0', '1', '1', '1', '1', '0', '无', '3', '', '');
INSERT INTO `db_order` VALUES ('124', '2017062065779', '阿里郎', '哈尔滨市香坊区民生路', '18612336366', '0', '1', '1497927301', '2', '1', '1', '1', '1', '1', '0', '无', '3', '', '');
INSERT INTO `db_order` VALUES ('125', '2017062078621', '', '', '18503696064', '1', '3000', '1497937716', '0', '0', '22', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('126', '2017062047584', '', '', '', '1', '3000', '1497941567', '0', '1', '21', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('127', '2017062048925', '', '', '', '1', '3000', '1497941832', '0', '1', '21', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('128', '2017062092294', '', '', '', '1', '3000', '1497943858', '0', '1', '20', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('129', '2017062067528', '', '', '', '1', '3000', '1497944738', '0', '1', '21', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('130', '2017062026053', '', '', '', '1', '3000', '1497944948', '0', '1', '21', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('131', '2017062052387', '', '', '', '1', '3000', '1497945669', '0', '1', '24', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('132', '2017062025295', '', '', '', '1', '3000', '1497945676', '0', '1', '21', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('133', '2017062058177', '', '', '', '1', '3000', '1497945715', '0', '0', '24', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('134', '2017062059780', '', '', '', '1', '3000', '1497945771', '0', '0', '21', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('135', '2017062018657', '冯宇彬', '', '18045054625', '1', '3000', '1497945797', '0', '0', '23', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('136', '2017062010576', '冯宇彬', '', '18045054625', '1', '3000', '1497945817', '0', '0', '23', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('137', '2017062060495', '', '', '', '1', '3000', '1497945924', '0', '1', '20', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('138', '2017062012159', '冯宇彬', '', '18045054625', '1', '3000', '1497946012', '0', '0', '23', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('139', '2017062059752', '冯宇彬', '', '18045054625', '1', '3000', '1497946038', '0', '0', '23', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('140', '2017062086510', '', '', '', '1', '3000', '1497946065', '0', '1', '20', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('141', '2017062052602', '', '', '', '1', '3000', '1497946148', '0', '1', '20', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('142', '2017062079467', '', '', '', '1', '3000', '1497946579', '0', '0', '20', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('143', '2017062083164', '', '', '', '1', '3000', '1497946623', '0', '1', '20', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('144', '2017062090872', '', '', '', '1', '3000', '1497946673', '0', '1', '20', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('145', '2017062049969', '', '', '', '1', '3000', '1497946776', '0', '1', '20', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('146', '2017062044283', '', '', '', '1', '3000', '1497947695', '0', '0', '24', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('147', '2017062053173', '', '', '', '1', '3000', '1497947737', '0', '0', '24', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('148', '2017062055954', '', '', '', '1', '3000', '1497947951', '0', '1', '24', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('149', '2017062052468', '', '', '', '1', '3000', '1497948789', '0', '1', '24', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('150', '2017062090681', '', '', '', '1', '3000', '1497948937', '0', '1', '24', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('151', '2017062028813', '', '', '', '1', '3000', '1497949076', '0', '0', '24', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('152', '2017062091920', '', '', '', '1', '3000', '1497949134', '0', '1', '24', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('153', '2017062047234', '', '', '', '1', '3000', '1497952116', '0', '1', '24', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('154', '2017062099123', '', '', '', '1', '3000', '1497953074', '0', '1', '28', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('155', '2017062047480', '', '', '', '1', '3000', '1497953103', '0', '1', '28', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('156', '2017062021220', '', '', '', '1', '3000', '1497953247', '0', '1', '28', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('157', '2017062047023', '', '', '', '1', '3000', '1497953554', '0', '1', '28', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('158', '2017062065183', '', '', '', '1', '3000', '1497953668', '0', '1', '33', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('159', '2017062034221', '', '', '', '1', '3000', '1497953736', '0', '0', '0', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('160', '2017062028029', '', '', '', '1', '3000', '1497953739', '0', '0', '0', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('161', '2017062074913', '', '', '', '1', '3000', '1497953747', '0', '0', '0', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('162', '2017062065963', '', '', '', '1', '3000', '1497954165', '0', '1', '33', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('163', '2017062005853', '', '', '', '1', '3000', '1497955404', '0', '1', '24', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('164', '2017062013233', '', '', '', '1', '3000', '1497957035', '0', '1', '33', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('165', '2017062019276', '', '', '', '1', '3000', '1497957095', '0', '0', '24', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('166', '2017062077150', '', '', '', '1', '3000', '1497957773', '0', '1', '24', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('167', '2017062065128', '', '', '', '1', '3000', '1497957887', '0', '1', '24', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('168', '2017062060156', '', '', '', '1', '3000', '1497958042', '0', '0', '34', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('169', '2017062014798', '', '', '', '1', '3000', '1497961396', '0', '0', '0', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('170', '2017062035109', '', '', '', '1', '3000', '1497961397', '0', '0', '0', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('171', '2017062043184', '', '', '', '1', '3000', '1497961400', '0', '0', '0', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('172', '2017062082473', '', '', '', '1', '3000', '1497961404', '0', '0', '0', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('173', '2017062000327', '', '', '', '1', '3000', '1497962613', '0', '0', '0', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('174', '2017062085165', '', '', '', '1', '3000', '1497962642', '0', '1', '34', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('175', '2017062028307', '', '', '18503696064', '1', '3000', '1497963273', '0', '0', '36', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('176', '2017062091801', '', '', '', '1', '3000', '1497970813', '0', '1', '33', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('177', '2017062078332', '', '', '', '1', '3000', '1497970846', '0', '1', '33', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('178', '2017062145459', '吴', 'ha er bin', '18612336366', '0', '123', '1498013954', '2', '0', '33', '1', '1', '99', '0', '无', '11', '', '');
INSERT INTO `db_order` VALUES ('179', '2017062121871', '吴', 'ha er bin', '18612336366', '0', '123', '1498014670', '2', '0', '33', '1', '1', '99', '0', '无', '11', '', '');
INSERT INTO `db_order` VALUES ('180', '2017062193240', '', '', '18045054625', '1', '2000', '1498015082', '0', '0', '37', '0', '1', '2000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('181', '2017062154572', '', '', '', '1', '2000', '1498015120', '0', '0', '23', '0', '1', '2000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('182', '2017062173120', '', '', '18045054625', '1', '2000', '1498015149', '0', '0', '37', '0', '1', '2000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('183', '2017062109417', '', '', '', '1', '2000', '1498015250', '0', '0', '23', '0', '1', '2000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('184', '2017062133520', '', '', '18503696064', '1', '2000', '1498022978', '0', '0', '36', '0', '1', '2000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('185', '2017062164505', '', '', '18503696064', '1', '2000', '1498023377', '0', '0', '36', '0', '1', '2000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('186', '2017062151880', 'linlin', 'haerb', '18503696064', '0', '182', '1498024741', '2', '0', '36', '1', '1', '158', '0', '无', '9', '', '');
INSERT INTO `db_order` VALUES ('187', '2017062188371', '', '', '18045054625', '1', '2000', '1498030087', '0', '0', '37', '0', '1', '2000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('188', '2017062180659', '啊啊啊', '啊啊啊', '18045054625', '0', '313', '1498031051', '2', '0', '37', '1', '1', '289', '0', '无', '4', '', '');
INSERT INTO `db_order` VALUES ('189', '2017062177629', '', '', '', '1', '2000', '1498034725', '0', '0', '34', '0', '1', '2000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('190', '2017062125265', '', '', '', '1', '0', '1498037971', '0', '0', '0', '0', '', '2000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('191', '2017062199122', '', '', '', '1', '0', '1498037975', '0', '0', '0', '0', '', '2000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('192', '2017062201096', '', '', '', '1', '2000', '1498108475', '0', '0', '0', '0', '1', '2000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('193', '2017062215051', '', '', '', '1', '2000', '1498108560', '0', '0', '0', '0', '1', '2000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('194', '2017062200694', 'linlin', 'haerb', '18503696064', '0', '130', '1498115482', '2', '1', '36', '1', '1', '106', '0', '无', '8', '', '2222222222');
INSERT INTO `db_order` VALUES ('195', '2017062279580', '吴', 'ha er bin', '18612336366', '0', '123', '1498115995', '2', '0', '33', '1', '1', '99', '0', '无', '11', '', '');
INSERT INTO `db_order` VALUES ('196', '2017062248201', '吴', 'ha er bin', '18612336366', '0', '123', '1498115998', '2', '0', '33', '1', '1', '99', '0', '无', '11', '', '');
INSERT INTO `db_order` VALUES ('197', '2017062286760', '吴', 'ha er bin', '18612336366', '0', '123', '1498115999', '2', '0', '33', '1', '1', '99', '0', '无', '11', '', '');
INSERT INTO `db_order` VALUES ('198', '2017062217678', '吴', 'ha er bin', '18612336366', '0', '123', '1498116001', '2', '0', '33', '1', '1', '99', '0', '无', '11', '', '');
INSERT INTO `db_order` VALUES ('199', '2017062266563', '吴', 'ha er bin', '18612336366', '0', '123', '1498116002', '2', '0', '33', '1', '1', '99', '0', '无', '11', '', '');
INSERT INTO `db_order` VALUES ('200', '2017062209232', '吴', 'ha er bin', '18612336366', '0', '123', '1498116003', '2', '0', '33', '1', '1', '99', '0', '无', '11', '', '');
INSERT INTO `db_order` VALUES ('201', '2017062215442', '吴', 'ha er bin', '18612336366', '0', '123', '1498116004', '2', '0', '33', '1', '1', '99', '0', '无', '11', '', '');
INSERT INTO `db_order` VALUES ('202', '2017062200885', '吴', 'ha er bin', '18612336366', '0', '123', '1498116005', '2', '0', '33', '1', '1', '99', '0', '无', '11', '', '');
INSERT INTO `db_order` VALUES ('203', '2017062266321', '吴', 'ha er bin', '18612336366', '0', '123', '1498116007', '2', '0', '33', '1', '1', '99', '0', '无', '11', '', '');
INSERT INTO `db_order` VALUES ('204', '2017062203049', '吴', 'ha er bin', '18612336366', '0', '123', '1498116008', '2', '0', '33', '1', '1', '99', '0', '无', '11', '', '');
INSERT INTO `db_order` VALUES ('205', '2017062200419', '吴', 'ha er bin', '18612336366', '0', '123', '1498116009', '2', '0', '33', '1', '1', '99', '0', '无', '11', '', '');
INSERT INTO `db_order` VALUES ('206', '2017062204034', '吴', 'ha er bin', '18612336366', '0', '123', '1498116011', '2', '0', '33', '1', '1', '99', '0', '无', '11', '', '');
INSERT INTO `db_order` VALUES ('207', '2017062256633', '吴', 'ha er bin', '18612336366', '0', '123', '1498116012', '2', '0', '33', '1', '1', '99', '0', '无', '11', '', '');
INSERT INTO `db_order` VALUES ('208', '2017062297430', '吴', 'ha er bin', '18612336366', '0', '123', '1498116013', '2', '0', '33', '1', '1', '99', '0', '无', '11', '', '');
INSERT INTO `db_order` VALUES ('209', '2017062294074', '吴', 'ha er bin', '18612336366', '0', '123', '1498116014', '2', '0', '33', '1', '1', '99', '0', '无', '11', '', '');
INSERT INTO `db_order` VALUES ('210', '2017062209972', '吴', 'ha er bin', '18612336366', '0', '123', '1498116015', '2', '0', '33', '1', '1', '99', '0', '无', '11', '', '');
INSERT INTO `db_order` VALUES ('211', '2017062233721', '吴', 'ha er bin', '18612336366', '0', '123', '1498116017', '2', '0', '33', '1', '1', '99', '0', '无', '11', '', '');
INSERT INTO `db_order` VALUES ('212', '2017062222659', '吴', 'ha er bin', '18612336366', '0', '123', '1498116018', '2', '0', '33', '1', '1', '99', '0', '无', '11', '', '');
INSERT INTO `db_order` VALUES ('213', '2017062235958', '吴', 'ha er bin', '18612336366', '0', '123', '1498116019', '2', '0', '33', '1', '1', '99', '0', '无', '11', '', '');
INSERT INTO `db_order` VALUES ('214', '2017062217352', '吴', 'ha er bin', '18612336366', '0', '123', '1498116020', '2', '0', '33', '1', '1', '99', '0', '无', '11', '', '');
INSERT INTO `db_order` VALUES ('215', '2017062274286', '吴', 'ha er bin', '18612336366', '0', '123', '1498116022', '2', '0', '33', '1', '1', '99', '0', '无', '11', '', '');
INSERT INTO `db_order` VALUES ('216', '2017062291935', '吴', 'ha er bin', '18612336366', '0', '123', '1498116023', '2', '0', '33', '1', '1', '99', '0', '无', '11', '', '');
INSERT INTO `db_order` VALUES ('217', '2017062291010', '吴', 'ha er bin', '18612336366', '0', '123', '1498116024', '2', '1', '33', '1', '1', '99', '0', '无', '11', '', '');
INSERT INTO `db_order` VALUES ('218', '2017062286486', '吴', 'ha er bin', '18612336366', '1', '3000', '1498116311', '0', '0', '33', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('219', '2017062259454', 'linlin', 'haerb', '18503696064', '0', '182', '1498116324', '2', '1', '36', '1', '1', '158', '0', '无', '9', '', '');
INSERT INTO `db_order` VALUES ('220', '2017062210638', '啊啊啊', '啊啊啊', '18045054625', '0', '130', '1498116387', '2', '0', '37', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('221', '2017062214819', '吴', 'ha er bin', '18612336366', '0', '247', '1498116394', '2', '1', '33', '1', '1', '223', '0', '无', '5', '', '');
INSERT INTO `db_order` VALUES ('222', '2017062270353', '啊啊啊', '啊啊啊', '18045054625', '0', '130', '1498116395', '2', '0', '37', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('223', '2017062248113', '吴', 'ha er bin', '18612336366', '0', '130', '1498117081', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('224', '2017062228516', '', '', '', '1', '3000', '1498117083', '0', '0', '34', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('225', '2017062297483', '啊啊啊', '啊啊啊', '18045054625', '1', '3000', '1498121055', '0', '0', '37', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('226', '2017062273278', '啊啊啊', '啊啊啊', '18045054625', '1', '3000', '1498121338', '0', '0', '37', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('227', '2017062270635', '啊啊啊', '啊啊啊', '18045054625', '1', '3000', '1498122088', '0', '0', '37', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('228', '2017062253258', '', '', '', '1', '3000', '1498124159', '0', '0', '34', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('229', '2017062210593', '', '', '', '1', '3000', '1498138064', '0', '0', '34', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('230', '2017062298041', '', '', '', '1', '3000', '1498138066', '0', '0', '34', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('231', '2017062280008', '', '', '', '1', '3000', '1498141562', '0', '0', '0', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('232', '2017062213949', '', '', '', '1', '3000', '1498141564', '0', '0', '0', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('233', '2017062206326', '', '', '', '1', '3000', '1498141622', '0', '0', '34', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('234', '2017062237375', '', '', '', '1', '3000', '1498141624', '0', '0', '34', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('235', '2017062327685', '吴', 'ha er bin', '18612336366', '0', '130', '1498180581', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('236', '2017062389580', '吴', 'ha er bin', '18612336366', '0', '130', '1498180584', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('237', '2017062300895', '吴', 'ha er bin', '18612336366', '0', '130', '1498180586', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('238', '2017062305752', '吴', 'ha er bin', '18612336366', '0', '130', '1498180587', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('239', '2017062367300', '吴', 'ha er bin', '18612336366', '0', '130', '1498180589', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('240', '2017062347196', '吴', 'ha er bin', '18612336366', '0', '130', '1498180590', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('241', '2017062342614', '吴', 'ha er bin', '18612336366', '0', '130', '1498180591', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('242', '2017062311832', '吴', 'ha er bin', '18612336366', '0', '130', '1498180592', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('243', '2017062352655', '吴', 'ha er bin', '18612336366', '0', '130', '1498180593', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('244', '2017062381201', '吴', 'ha er bin', '18612336366', '0', '130', '1498180595', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('245', '2017062389252', '吴', 'ha er bin', '18612336366', '0', '130', '1498180596', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('246', '2017062315586', '吴', 'ha er bin', '18612336366', '0', '130', '1498180597', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('247', '2017062312942', '吴', 'ha er bin', '18612336366', '0', '130', '1498180598', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('248', '2017062354476', '吴', 'ha er bin', '18612336366', '0', '130', '1498180599', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('249', '2017062312762', '吴', 'ha er bin', '18612336366', '0', '130', '1498180601', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('250', '2017062388047', '吴', 'ha er bin', '18612336366', '0', '130', '1498180602', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('251', '2017062356417', '吴', 'ha er bin', '18612336366', '0', '130', '1498180603', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('252', '2017062370512', '吴', 'ha er bin', '18612336366', '0', '130', '1498180604', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('253', '2017062345898', '吴', 'ha er bin', '18612336366', '0', '130', '1498180605', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('254', '2017062389726', '吴', 'ha er bin', '18612336366', '0', '130', '1498180607', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('255', '2017062387097', '吴', 'ha er bin', '18612336366', '0', '130', '1498180608', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('256', '2017062343710', '吴', 'ha er bin', '18612336366', '0', '130', '1498180609', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('257', '2017062327886', '吴', 'ha er bin', '18612336366', '0', '130', '1498180610', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('258', '2017062300394', '吴', 'ha er bin', '18612336366', '0', '130', '1498180612', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('259', '2017062389900', '吴', 'ha er bin', '18612336366', '0', '130', '1498180613', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('260', '2017062315665', '吴', 'ha er bin', '18612336366', '0', '130', '1498180614', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('261', '2017062316645', '吴', 'ha er bin', '18612336366', '0', '130', '1498180615', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('262', '2017062302009', '吴', 'ha er bin', '18612336366', '0', '130', '1498180616', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('263', '2017062382159', '吴', 'ha er bin', '18612336366', '0', '130', '1498180618', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('264', '2017062361521', '吴', 'ha er bin', '18612336366', '0', '130', '1498180619', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('265', '2017062392247', '吴', 'ha er bin', '18612336366', '0', '130', '1498180620', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('266', '2017062342778', '吴', 'ha er bin', '18612336366', '0', '130', '1498180621', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('267', '2017062342511', '吴', 'ha er bin', '18612336366', '0', '130', '1498180622', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('268', '2017062392940', '吴', 'ha er bin', '18612336366', '0', '130', '1498180624', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('269', '2017062324118', '吴', 'ha er bin', '18612336366', '0', '130', '1498180625', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('270', '2017062303950', '吴', 'ha er bin', '18612336366', '0', '130', '1498180626', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('271', '2017062311093', '吴', 'ha er bin', '18612336366', '0', '130', '1498180627', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('272', '2017062351370', '吴', 'ha er bin', '18612336366', '0', '130', '1498180631', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('273', '2017062397818', '吴', 'ha er bin', '18612336366', '0', '130', '1498180632', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('274', '2017062370212', '吴', 'ha er bin', '18612336366', '0', '130', '1498183098', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('275', '2017062342380', '吴', 'ha er bin', '18612336366', '0', '130', '1498183100', '2', '0', '33', '1', '1', '106', '0', '无', '8', '', '');
INSERT INTO `db_order` VALUES ('276', '2017062329994', '', '', '', '1', '3000', '1498204245', '0', '0', '34', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('277', '2017062314584', '', '', '', '1', '3000', '1498204247', '0', '0', '34', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('278', '2017062324771', '', '', '', '1', '3000', '1498204525', '0', '0', '34', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('279', '2017062320357', '', '', '', '1', '3000', '1498204526', '0', '0', '34', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('280', '2017062336632', '', '', '', '1', '3000', '1498210843', '0', '0', '0', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('281', '2017062371318', '', '', '', '1', '3000', '1498210845', '0', '0', '0', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('282', '2017062364023', '', '', '', '1', '3000', '1498210847', '0', '0', '0', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('283', '2017062383498', '', '', '', '1', '3000', '1498210848', '0', '0', '0', '0', '1', '3000', '0', '无', '0', '', '');
INSERT INTO `db_order` VALUES ('284', '2017062340574', '', '', '', '1', '3000', '1498210849', '0', '0', '0', '0', '1', '3000', '0', '无', '0', '', '');

-- ----------------------------
-- Table structure for `db_product`
-- ----------------------------
DROP TABLE IF EXISTS `db_product`;
CREATE TABLE `db_product` (
  `pid` int(5) NOT NULL AUTO_INCREMENT,
  `pname` varchar(100) NOT NULL COMMENT '产品名称',
  `pmuch` double(100,0) NOT NULL COMMENT '产品价格',
  `pnumber` varchar(5) NOT NULL COMMENT '产品期数',
  `pamout` int(5) NOT NULL COMMENT '产品数量',
  `createtime` varchar(30) NOT NULL COMMENT '发布时间',
  `time` varchar(30) NOT NULL COMMENT '结束时间',
  `nowtime` varchar(30) NOT NULL COMMENT '下架剩余时间',
  `income` varchar(10) NOT NULL COMMENT '年化收益',
  `cycle` varchar(20) NOT NULL COMMENT '养殖周期',
  `photo` varchar(100) NOT NULL,
  `ztime` varchar(20) NOT NULL COMMENT '分红周期',
  `nowamout` varchar(20) NOT NULL COMMENT '产品剩余数量',
  `count` varchar(255) NOT NULL COMMENT '简介',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_product
-- ----------------------------
INSERT INTO `db_product` VALUES ('1', '杜泊羊育肥羊', '3000', '1', '300', '1498115248', '1556001552', '720', '13%', '4', '', '1', '0', '强壮有力量，好养活，收益大');
INSERT INTO `db_product` VALUES ('2', '啦啦啦', '111', '0', '2222', '1498178445', '1498178445', '', '', '', '', '', '2222', '');

-- ----------------------------
-- Table structure for `db_product_ht`
-- ----------------------------
DROP TABLE IF EXISTS `db_product_ht`;
CREATE TABLE `db_product_ht` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `order_id` int(5) NOT NULL,
  `idcord` varchar(50) NOT NULL COMMENT '身份证号',
  `mobile` varchar(11) NOT NULL COMMENT '手机号',
  `number` int(5) NOT NULL COMMENT '购买数量',
  `cycle` varchar(20) NOT NULL COMMENT '产品期数',
  `money` varchar(50) NOT NULL COMMENT '金额',
  `symoney` varchar(50) NOT NULL COMMENT '收益',
  `bianhao` varchar(30) NOT NULL COMMENT '订单编号',
  `yehao` varchar(30) NOT NULL COMMENT '羊耳号',
  `bx` varchar(50) NOT NULL COMMENT '保险单号',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_product_ht
-- ----------------------------

-- ----------------------------
-- Table structure for `db_product_photo`
-- ----------------------------
DROP TABLE IF EXISTS `db_product_photo`;
CREATE TABLE `db_product_photo` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) NOT NULL,
  `access` varchar(255) NOT NULL COMMENT '链接',
  `time` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_product_photo
-- ----------------------------
INSERT INTO `db_product_photo` VALUES ('2', 'data/20170622/594b61c604ed3.jpg', 'http://www.baidu.com', '1498112722');

-- ----------------------------
-- Table structure for `db_token`
-- ----------------------------
DROP TABLE IF EXISTS `db_token`;
CREATE TABLE `db_token` (
  `token` varchar(255) DEFAULT NULL,
  `time` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_token
-- ----------------------------
INSERT INTO `db_token` VALUES ('123', '123');

-- ----------------------------
-- Table structure for `db_user_info`
-- ----------------------------
DROP TABLE IF EXISTS `db_user_info`;
CREATE TABLE `db_user_info` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '员工姓名',
  `accounts` varchar(255) DEFAULT NULL COMMENT '登录账号',
  `pwd` varchar(255) DEFAULT NULL COMMENT '密码',
  `sex` smallint(10) DEFAULT NULL COMMENT '性别',
  `tel` char(255) DEFAULT NULL COMMENT '电话',
  `create_time` int(20) DEFAULT NULL COMMENT '创建时间',
  `del` char(20) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_user_info
-- ----------------------------
INSERT INTO `db_user_info` VALUES ('1', '超级管理员', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '1', '13567890123', '1477375093', '1');
INSERT INTO `db_user_info` VALUES ('30', '贾达', 'jiada', '670b14728ad9902aecba32e22fa4f6bd', '2', '13567890123', '1477914807', '1');
INSERT INTO `db_user_info` VALUES ('31', '王佳', 'wangjia', 'e10adc3949ba59abbe56e057f20f883e', '1', '13567890123', '1478165822', '1');
INSERT INTO `db_user_info` VALUES ('32', 'fyb', 'fyb', 'e10adc3949ba59abbe56e057f20f883e', null, null, null, '1');
INSERT INTO `db_user_info` VALUES ('33', 'fyb2', 'fyb2', 'e10adc3949ba59abbe56e057f20f883e', null, null, null, '1');
INSERT INTO `db_user_info` VALUES ('34', 'fyb3', 'fyb3', 'e10adc3949ba59abbe56e057f20f883e', null, null, null, '1');

-- ----------------------------
-- Table structure for `db_video`
-- ----------------------------
DROP TABLE IF EXISTS `db_video`;
CREATE TABLE `db_video` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `vname` varchar(50) NOT NULL,
  `link` varchar(255) NOT NULL COMMENT '链接',
  `time` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_video
-- ----------------------------
INSERT INTO `db_video` VALUES ('1', '视频1', 'http://www.papiquan.com', '');
INSERT INTO `db_video` VALUES ('3', '视频二', '222222222', '1494469686');
INSERT INTO `db_video` VALUES ('4', 'a3', 'www.baidu.com', '1497832616');

-- ----------------------------
-- Table structure for `db_vip`
-- ----------------------------
DROP TABLE IF EXISTS `db_vip`;
CREATE TABLE `db_vip` (
  `vid` int(5) NOT NULL AUTO_INCREMENT,
  `pwd` varchar(50) NOT NULL COMMENT '登录密码',
  `name` varchar(30) NOT NULL COMMENT '真实姓名',
  `idphoto` varchar(255) NOT NULL COMMENT '头像',
  `hetong` varchar(100) NOT NULL COMMENT '合同',
  `mobile` varchar(11) DEFAULT NULL COMMENT '手机号（登录账号）',
  `email` varchar(30) NOT NULL COMMENT '邮箱',
  `idnumber` varchar(18) NOT NULL COMMENT '身份证号',
  `nickname` varchar(30) NOT NULL COMMENT '昵称',
  `scode` varchar(255) NOT NULL COMMENT '短信验证码',
  `money` double(20,0) NOT NULL COMMENT '余额',
  `openid` varchar(255) NOT NULL COMMENT '微信',
  `headimgurl` varchar(255) NOT NULL COMMENT '微信头像',
  `pwdd` varchar(255) NOT NULL COMMENT '重复密码',
  `password` varchar(100) NOT NULL COMMENT '余额支付密码',
  `bank` varchar(100) NOT NULL COMMENT '银行卡',
  `idcard` varchar(100) NOT NULL COMMENT '身份证照片',
  `adds` varchar(255) NOT NULL COMMENT '收货地址',
  `xing` int(1) NOT NULL COMMENT '星星',
  `yijian` varchar(255) NOT NULL COMMENT '意见',
  `sfrz` varchar(1) NOT NULL COMMENT '0未验证1等待验证2通过验证',
  `icphoto` varchar(100) NOT NULL COMMENT '身份证照片',
  `code` varchar(20) NOT NULL COMMENT '自己的推广码',
  `othercode` varchar(20) DEFAULT NULL COMMENT 'b别人的推广码',
  `sex` int(2) DEFAULT '0' COMMENT '性别',
  PRIMARY KEY (`vid`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_vip
-- ----------------------------
INSERT INTO `db_vip` VALUES ('33', 'e10adc3949ba59abbe56e057f20f883e', '吴', 'http://wx.qlogo.cn/mmopen/DZk5icbPvaRdwBLqpchAyUXESMYnOwAhHAOsPPsgUsCxBU11Jdibd8Apn5hBadwuvDicQibAxw9UpYlKRxhBOP1CDpXE5Ag8r11P/0', '', '18612336366', '505588612@qq.com', '738383839393“ek', 'A 吴总、', '4677', '89898619', 'ocfeOvzY7TCmWGdyXExBI7hEhjHo', '', '', 'e10adc3949ba59abbe56e057f20f883e', '', '', 'ha er bin', '0', '', '0', '', '', null, '2');
INSERT INTO `db_vip` VALUES ('34', '', '', 'http://wx.qlogo.cn/mmopen/Q3auHgzwzM5XeNskIhwkjgBPYs69w3BVjOPZ9wJg1VFXbEdKpdf1icWZIQruEB9ORL0ibs9Rwku0bXpSVWs3e1v6Bp5nL7MMvBfwUJ2Qpichiaw/0', '', null, '', '', '户外BBQ', '4157', '0', 'ocfeOvwUbUIk_Fu5U-0L9Kafmqjc', '', '', '', '', '', '', '0', '', '', '', '', null, '2');
INSERT INTO `db_vip` VALUES ('36', 'e10adc3949ba59abbe56e057f20f883e', 'linlin', 'data/20170622/594b6a172c67d.jpg', '', '18503696064', '', '********', 'lin', '4590', '9898677', '', '', '123456', 'e10adc3949ba59abbe56e057f20f883e', '', '', 'haerb', '0', '', '0', '', '', '', '0');
INSERT INTO `db_vip` VALUES ('37', 'a3fe5019c56195c39a56ff52c603fcd9', '啊啊啊', 'data/20170622/594b6ac6c53c2.jpg', '', '18045054625', '', '********', '啊啊啊', '8766', '0', '', '', 'f1311569', '', '', '', '啊啊啊', '0', '', '0', '', '', '', '0');
INSERT INTO `db_vip` VALUES ('39', 'd41d8cd98f00b204e9800998ecf8427e', '', 'data/2017-06-22/594b28adaa1e8.jpg', 'data/2017-06-22/594b28adaa1e8.jpg', '3333', '', '', '', '', '0', '', '', '', '', '', '', '', '0', '', '', '', '', null, '0');
INSERT INTO `db_vip` VALUES ('40', '', '', 'http://wx.qlogo.cn/mmopen/hS63v5B1iaohGqDQrP95m4qLAicFdUkbGUib0BmTHr1dZXf4xickHz5LNNicm2wiaKddScOicuf60p0W1tEZo4haEzNrMHiaSoXdHEJD/0', '', null, '', '', '秋夕寒', '7582', '0', 'ocfeOv33LLWBjZdmB9OnWpfO2DqE', '', '', '', '', '', '', '0', '', '', '', '', null, '1');
INSERT INTO `db_vip` VALUES ('41', '', '', 'http://wx.qlogo.cn/mmopen/Q3auHgzwzM6ftXZGzypibTUdLJjcHeaKEeagOqGTqI6icd7gxjYVaySbg94PhU3pdrJ34TicaNmQN5GfZhTUKsEOECRUaAnhfGbyhmWb7w52Qo/0', '', null, '', '', '蓝色', '9676', '0', 'ocfeOv7Llew-PQVeuo9AG5dPDoLo', '', '', '', '', '', '', '0', '', '', '', '', null, '2');
INSERT INTO `db_vip` VALUES ('42', '', '', 'http://wx.qlogo.cn/mmopen/LSnfkoRDjic4TCmcHqDbBRorBqvbZkWzIhiaZe6vlNCpmficCNegcBMx4Qm3daUPZaSAYKWsX4HRkuaOk3thZSLs4T6kq32ApCy/0', '', null, '', '', 'null', '7904', '0', 'ocfeOv4kA0bFItq-VKi1LzysQ1GI', '', '', '', '', '', '', '0', '', '', '', '', null, '1');

-- ----------------------------
-- Table structure for `db_vip_record`
-- ----------------------------
DROP TABLE IF EXISTS `db_vip_record`;
CREATE TABLE `db_vip_record` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `vid` int(10) NOT NULL,
  `type` varchar(5) NOT NULL COMMENT '类型（1消费2充值3提现）',
  `mode` varchar(5) NOT NULL COMMENT '1余额2微信3支付宝',
  `money` varchar(30) NOT NULL COMMENT '额度',
  `xname` varchar(50) NOT NULL COMMENT '消费名称',
  `time` varchar(50) NOT NULL,
  `number` int(10) NOT NULL COMMENT '数量',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_vip_record
-- ----------------------------
INSERT INTO `db_vip_record` VALUES ('1', '1', '1', '1', '1000', '乌珠穆沁羊', '1495441619', '1');
INSERT INTO `db_vip_record` VALUES ('2', '2', '1', '1', '1000', '乌珠穆沁羊', '1495530191', '1');
INSERT INTO `db_vip_record` VALUES ('3', '2', '1', '1', '1000', '乌珠穆沁羊', '1495530236', '1');
INSERT INTO `db_vip_record` VALUES ('4', '2', '1', '1', '1000', '乌珠穆沁羊', '1495530303', '1');
INSERT INTO `db_vip_record` VALUES ('5', '1', '1', '1', '30', '精品羊肉', '1495761914', '1');
INSERT INTO `db_vip_record` VALUES ('6', '8', '1', '1', '1', '一分钱', '1497509318', '1');
INSERT INTO `db_vip_record` VALUES ('7', '5', '1', '1', '1', '一分钱', '1497572865', '1');
INSERT INTO `db_vip_record` VALUES ('8', '8', '1', '1', '1', '一分钱', '1497573064', '1');
INSERT INTO `db_vip_record` VALUES ('9', '1', '3', '1', '10000', '提现', '1497791640', '1');
INSERT INTO `db_vip_record` VALUES ('13', '10', '2', '2', '1', '充值', '1497795660', '1');
INSERT INTO `db_vip_record` VALUES ('19', '10', '2', '2', '1', '充值', '1497796891', '1');
INSERT INTO `db_vip_record` VALUES ('21', '5', '2', '2', '1', '充值', '1497797015', '1');
INSERT INTO `db_vip_record` VALUES ('22', '5', '2', '2', '1', '充值', '1497797072', '1');
INSERT INTO `db_vip_record` VALUES ('23', '5', '2', '2', '2', '充值', '1497797114', '1');
INSERT INTO `db_vip_record` VALUES ('25', '5', '2', '2', '1', '充值', '1497797395', '1');
INSERT INTO `db_vip_record` VALUES ('26', '11', '2', '2', '1', '充值', '1497797724', '1');
INSERT INTO `db_vip_record` VALUES ('27', '1', '1', '1', '1', '大黑羊', '1497852363', '1');
INSERT INTO `db_vip_record` VALUES ('28', '36', '1', '1', '130', '羊排2.2斤内蒙古呼伦贝尔新鲜羊肉烧烤火锅食材 羊肋排 ', '1498115840', '1');
INSERT INTO `db_vip_record` VALUES ('29', '36', '1', '1', '182', '羊肉串200gx6袋 内蒙草原新鲜生羊肉串 烧烤食材鲜羊肉  ', '1498116340', '1');
INSERT INTO `db_vip_record` VALUES ('30', '33', '1', '1', '247', '精品方砖5斤 内蒙新鲜羊肉卷 火锅食材羊肉片涮锅生羊肉', '1498116512', '1');
INSERT INTO `db_vip_record` VALUES ('31', '33', '1', '1', '123', '羊腿2.2斤内蒙古呼伦贝尔清真生羊肉 羊肉新鲜 生羊腿肉 ', '1498116540', '1');
INSERT INTO `db_vip_record` VALUES ('32', '0', '2', '2', '1', '充值', '1498187864', '1');
INSERT INTO `db_vip_record` VALUES ('33', '0', '2', '2', '1', '充值', '1498187874', '1');

-- ----------------------------
-- Table structure for `db_zx`
-- ----------------------------
DROP TABLE IF EXISTS `db_zx`;
CREATE TABLE `db_zx` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `page` varchar(2000) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `po` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_zx
-- ----------------------------
INSERT INTO `db_zx` VALUES ('3', '荣昌举行现代畜牧业发展论坛 探讨现代畜牧业融合发展', '6月17日-18日,由中国林牧渔业经济学会饲料经济专业委员会、重庆市畜牧科学院联合举办的“现代畜牧产业发展论坛暨畜牧高新产业招商洽谈会”在中国畜牧科技城——重庆荣昌成功召开。来自全国产业化龙头企业、知名农业企业，重庆市及荣昌区相关畜牧部门、西南大学、重庆市畜牧科学院的领导、专家及企业负责人等300余人参会。17日上午，在重庆市畜牧科学院学术报告厅举行了隆重的开幕式，开幕式由中国林牧渔业经济学会饲料经济委员会理事长、生物饲料开发国家工程研究中心主任蔡辉益博士主持。', 'data/20170622/594b498864add.jpg', '');
INSERT INTO `db_zx` VALUES ('4', '赤峰农牧业产品推介会在京举行', '央广网北京6月21日消息（记者杨泽柱）6月20日下午，由中共赤峰市委宣传部主办，人民网舆情监测室承办的赤峰农牧业产品推介会在人民网演播厅举行。赤峰市委书记段志强、人民网总编辑余清楚以及国务院参事、清华大学公共管理学院区域与城市发展研究中心主任施祖麟等领导、学者出席了此次推介会。 　　据了解，赤峰地处蒙东、冀北、辽西交界处，是一个以蒙古族、汉族为主的多民族城市。当地风景壮丽、土地富饶、气候宜人、历史悠久，不仅拥有丰富的旅游资源，还是现代生态农牧业发展的重要产区之一。近年来，赤峰市积极推动农牧业的绿色化、品牌化建设，大力实施农畜产品生产过程管控，积极推广标准化示范建设，严格执行农畜产品产地准出制度。如今，赤峰的蔬菜产业、杂粮产业、畜禽产业，以及以中药材、绒毛、笤帚苗子、沙棘、杏仁、马鹿、果品等为主的特色产业正蓬勃发展，深受广大消费者的欢迎和喜爱。未来，赤峰还将进一步扩大优质农畜产品的国内外知名度和竞争力，有力地推进赤峰实施农牧业品牌战略，做大做强区域特色农畜产品品牌，促进现代生态农牧业持续快速发展。 　　在推介会上，同时还举办了“赤峰，一座放飞心灵的城市”——赤峰城市品牌VI体系发布暨夏季旅游产品推介会。赤峰市委书记段志强在致辞中表示，我国已进入旅游快速发展的黄金期，赤峰这几年旅游接待人数的高速增长正在印证这个黄金期的到来。赤峰一定要抓住这一重大机遇，把观光旅游和深度休闲度假旅游紧密结合，培育旅游业成为国民经济新的支柱产业，力争到2020年实现旅游人次超2000万、收入超500亿的目标，为内蒙古旅游业大发展书写出赤峰浓墨重彩的篇章。　　除了优质农畜产品享誉中外，赤峰还是中国北方草原文化旅游的佳境圣地，被誉为“内蒙古的名片”、“自治区的缩影”和“距北京最近最美的草原”。为进一步加快旅游业转型升级，近年来，赤峰市依托资源优势不断加大工作力度，着力打造赤峰精品景区、特色旅游线路以及城市形象品牌。 　　如今，赤峰已形成十大精品线路和十种深度玩法。在夏季，游客可以选择草原生态观光游、大漠风光体验游、文化探秘修学游、地质奇观科考游、温泉养生度假游等多种玩法。除此以外，游客还可以享受丰盛的草原节日盛宴，观赏蒙古民族弯弓跃马、纵横驰骋的精彩表演；领略蒙古族服饰、饮食、蒙古包、勒勒车、婚俗、祭祀、歌舞的迷人魅力；欣赏祭敖包、那达慕、红山文化旅游节、王府文化节、蒙古汉汗庭文化节等民族文化旅游节庆活动。 　　推介会现场气氛活跃，独具民族特色的《牧歌》、《赤峰迎宾曲》等歌曲表演以及《万马奔腾》马头琴演奏给嘉宾带来了丰富的视听体验，生动展示了赤峰当地的秀美河山、人文精髓与赤峰人的热情友善。', 'data/20170622/594b4a26688ec.jpg', '');
INSERT INTO `db_zx` VALUES ('5', '理财是什么', '“理财”一词，最早见诸于20世纪90年代初期的报端。随着中国股票债券市场的扩容，商业银行、零售业务的日趋丰富和市民总体收入的逐年上升，“理财”概念逐渐走俏。个人理财（658）品种大致可以分为个人资产品种和个人负债品种，共同基金、股票、债券、存款、人寿保险、黄金等属于个人资产品种；而个人住房抵押贷款、个人消费信贷则属于个人负债品种。赚钱--收入 1. 一生的收入包含运用个人资源所产生的工作收入，及运用金钱资源所产生的理财收入；工作收入是以人赚钱，理财收入是以钱赚钱， 2．理财收入：包括利息收入、房租收入、股利、资本利得等。 用钱--支出 一生的支出包括个人及家庭由出生至终老的生活支出，及因投资与信贷运用所产生的理财支出。有人就有支出，有家就有负担，赚钱的主要目的是要支应个人及家庭的开销。包含：生活支出：包括衣食住行育乐医疗等家庭开销。理财支出：包括贷款利息支出、保障型保险保费支出、投资手续费用支出等。 存钱--资产 当期的收入超过支出时会有储蓄产生，而每期累积下来的储蓄就是资产，也就是可以帮你钱滚钱，产生投资收益的本金。年老时当人的资源无法继续工作产生收入时，就要靠钱的资源产生理财收入或变现资产来支应晚年所需。包含： 1．紧急预备金：保有一笔现金以备失业或不时之需。 2．投资：可用来滋生理财收入的投资工具组合。 3．置产：购置自用房屋，自用车等提供使用价值的资产。 借钱--负债 当现金收入无法支应现金支出时就要借钱。借钱的原因可能是暂时性的入不敷出、购置可长期使用的房地产或汽车家电，以及拿来扩充信用的投资。 借钱没有马上偿还会累积成负债要根据负债余额支付利息、因此在贷款还清前，每期的支出除了生活消费外，还有财务上的本金利息摊还支出。包含： 1．消费负债：如信用卡循环信用、现金卡余额、分期付款等。 2．投资负债：如融资融券保证金、发挥财务杠杆的借钱投资。 3．自用资产负债：如购置自用资产所需房屋贷款与汽车贷款。 省钱--节约 在现代社会中，不是所有的收入都可用来支应支出，有所得要缴所得税、出售财产要缴财产税、财产移转要 消费饼图 消费饼图 缴赠与税或遗产税，因此在现金流量规划中如何合法节省所得税，在财产移转规划中如何合法节省赠与税或遗产税，也成为理财中重要的一环，对高收入的个人更成为理财首要考虑。包括： 1．所得税节税规划； 2．财产税节税规划； 3．财产移转节税规划（该项境外较多采用）。 护钱--保信 护钱的重点在风险管理，在指预先做保险或信托安排，使人力资源或已有财产得到保护，或当发生损失时可以获得理财来弥补损失。 保险的功能为当发生事故使家庭现金收入无法支应当时或以后的支出时，仍能有一笔金钱或收益可弥补缺口，降低人生旅程中意料外收支失衡时产生的冲击。 为得到弥补人或物损失的寿险与产险保障，必须支付一定比率的保费，一旦保险事故发生时，理赔金所产生的理财收入可取代中断的工作收入，来应付家庭或遗族的生活支出，或以理赔金偿还负债来降低理财利息支出。此外，信托安排可以将信托财产独立于其他私有财产之外，不受债权人的追索，有保护已有财产免于流失的功能。包括： 1．人寿保险：寿险、医疗险、意外险、失能险、养老险。 2．产物保险：火险、责任险。 3．信托 4．基金定投', 'data/20170622/594b4ac9b73f3.jpg', '');
INSERT INTO `db_zx` VALUES ('6', '理财的一些小知识', '理财的目标：不同的经济条件决定了不同的理财目标。 没钱理财的目的就是让你积攒点钱可以以备不时之需。月光族，能攒出200到500元。到时候可以出去旅行一趟或者换个手机。 1000元，理财的目的也很简单，积攒进行消费。可以积攒出一台二手车或者便宜的小车 10000元，积攒投资。股票或者货币基金。 10万或者100万可以考虑进行投资。股票或者货币基金。中国人尤其热衷于房地产。 所以思考自己理财的方向和目标是理财的第一步，钱财积累并不是数字累积越多越好而是做自己想做的事。 理财的一些小知识 投资简单分类，每种理财方式都有其特点，所以没有所谓最好的理财方式，而是说最合适的理财组合：比如 保险，投资收益不高。但是起到分摊风险的作用。一部分小钱放在保险上是合理的。尤其是家庭理财长期投资的方式。  银行存款：以前大家常用的积累钱的方式，适用于每月积累的钱比较少的人群。  货币基金：现在流行的互联网理财方式，高收益和及时取用的两个优势。 理财的一些小知识 投资：当资金积累到一定程度，人们往往会关注股票和一切固定资产投资，比如说购置房产。这就涉及到投资了。 理财的一些小知识   合理：理财的目的是让生活更好所以根据自身抵御风险的能力，选择风险不同的投资。 本身开销非常紧凑，那自然是选择攒一分是一分的投资模式。而且方便及时取用，银行存款和。 当资产多到可以概括成财富，那么这个时候资产是可以增殖的。所以这个时候大多数人会选择回报率更高的投资。   多种组合分摊风险。理财的方式一般是多种组合合理搭配就像配菜一样。这样可以减少风险的程度。', 'data/20170622/594b4be1141db.jpg', '');
