/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : yy

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2017-06-02 14:53:41
*/

SET FOREIGN_KEY_CHECKS=0;

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

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
  `much` varchar(20) NOT NULL COMMENT '现价',
  `zkou` varchar(20) NOT NULL COMMENT '折扣',
  `location` varchar(200) NOT NULL COMMENT '发货地',
  `minute` varchar(1000) NOT NULL COMMENT '商品介绍',
  `spec` varchar(20) NOT NULL COMMENT '规格',
  `stock` varchar(10) NOT NULL COMMENT '库存',
  `nowamout` varchar(10) NOT NULL COMMENT '库存',
  `xphoto` varchar(100) NOT NULL COMMENT '缩略图',
  `kmuch` varchar(15) NOT NULL COMMENT '快递费',
  `pingjia` varchar(255) NOT NULL COMMENT '评价',
  `xl` varchar(20) NOT NULL COMMENT '销量',
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_goods
-- ----------------------------
INSERT INTO `db_goods` VALUES ('1', '精品羊肉', '36', '1493087666', 'data/20170425/58feb5b2ea57e.jpg', '20', '', '黑龙江哈尔滨', '肉质鲜美，口感特别', '', '100', '19', '', '10', '', '');
INSERT INTO `db_goods` VALUES ('2', '羊排', '40', '1496382558', '', '35', '', '黑龙江哈尔滨', '肉质鲜美特别好吃', '', '100', '87', '', '10', '', '');
INSERT INTO `db_goods` VALUES ('3', '一分钱', '0.4', '1496381822', '', '1', '', '', '', '', '', '-8', '', '0.1', '', '100');

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
INSERT INTO `db_gy` VALUES ('1', '云联金阳', '这是云联金阳的一些介绍内容', 'data/20170505/590bcfba8d149.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_ht
-- ----------------------------
INSERT INTO `db_ht` VALUES ('1', '1', '李四', 'data/20170517/591bbbabae7a6.jpg', '这是合同', '', '1494989739', '0', '0');
INSERT INTO `db_ht` VALUES ('4', '11', '', '', '合同标题', '222', '1494989758', '51', '1');
INSERT INTO `db_ht` VALUES ('6', '11', '', 'data/20170517/591bb5f119e61.jpg', '新合同', '', '1494988273', '52', '1');
INSERT INTO `db_ht` VALUES ('7', '11', '', 'data/20170517/591bb5f119e61.jpg', '标题', '', '', '53', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

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
INSERT INTO `db_lbt` VALUES ('2', 'data/20170510/591288b231709.jpg');
INSERT INTO `db_lbt` VALUES ('3', 'data/20170510/5912b5eeeeecd.jpg');
INSERT INTO `db_lbt` VALUES ('4', 'data/20170510/5912b5f66f664.jpg');

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
  `order_money` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `status` int(5) NOT NULL,
  `buyer_status` int(5) NOT NULL,
  `vid` int(11) NOT NULL,
  `del` int(1) NOT NULL,
  `number` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `g_style` int(2) NOT NULL,
  `remark` varchar(2000) NOT NULL,
  `gid` int(11) NOT NULL,
  `ftime` varchar(50) NOT NULL COMMENT '到期日期',
  `goods_pj` varchar(255) NOT NULL COMMENT '商品评价',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

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
INSERT INTO `db_order` VALUES ('26', '2017060235523', '吴凤霞', '哈尔滨市香坊区民生路', '', '0', '0', '1496382283', '2', '0', '1', '1', '1', '0.1', '0', '无', '3', '', '');
INSERT INTO `db_order` VALUES ('27', '2017060292669', '林博文', '哈尔滨香坊区', '', '0', '0', '1496384209', '2', '0', '5', '1', '1', '0.1', '0', '无', '3', '', '');
INSERT INTO `db_order` VALUES ('28', '2017060263726', '吴凤霞', '哈尔滨市香坊区民生路', '', '0', '0', '1496384471', '2', '0', '1', '1', '1', '0.1', '0', '无', '3', '', '');
INSERT INTO `db_order` VALUES ('29', '2017060226619', '吴凤霞', '哈尔滨市香坊区民生路', '', '0', '30', '1496384607', '2', '0', '1', '1', '1', '20', '0', '无', '1', '', '');
INSERT INTO `db_order` VALUES ('30', '2017060289125', '吴凤霞', '哈尔滨市香坊区民生路', '', '0', '45', '1496384645', '2', '0', '1', '1', '1', '35', '0', '无', '2', '', '');
INSERT INTO `db_order` VALUES ('31', '2017060218589', '吴凤霞', '哈尔滨市香坊区民生路', '', '0', '0', '1496384738', '2', '0', '1', '1', '1', '0.4', '0', '无', '3', '', '');
INSERT INTO `db_order` VALUES ('32', '2017060286379', '吴凤霞', '哈尔滨市香坊区民生路', '', '0', '20', '1496384771', '2', '0', '1', '1', '1', '20', '0', '无', '3', '', '');
INSERT INTO `db_order` VALUES ('33', '2017060249967', '吴凤霞', '哈尔滨市香坊区民生路', '', '0', '1', '1496384808', '2', '0', '1', '1', '1', '1', '0', '无', '3', '', '');
INSERT INTO `db_order` VALUES ('34', '2017060276862', '吴凤霞', '哈尔滨市香坊区民生路', '', '0', '1', '1496384925', '2', '0', '1', '1', '1', '1', '0', '无', '3', '', '');
INSERT INTO `db_order` VALUES ('35', '2017060264431', '吴凤霞', '哈尔滨市香坊区民生路', '', '0', '1', '1496384983', '2', '0', '1', '1', '1', '1', '0', '无', '3', '', '');
INSERT INTO `db_order` VALUES ('36', '2017060248392', '于静', '哈尔滨', '', '0', '30', '1496385190', '2', '0', '6', '1', '1', '20', '0', '无', '1', '', '');
INSERT INTO `db_order` VALUES ('37', '2017060214020', '于静', '哈尔滨', '', '0', '30', '1496385428', '2', '0', '6', '1', '1', '20', '0', '无', '1', '', '');

-- ----------------------------
-- Table structure for `db_product`
-- ----------------------------
DROP TABLE IF EXISTS `db_product`;
CREATE TABLE `db_product` (
  `pid` int(5) NOT NULL AUTO_INCREMENT,
  `pname` varchar(100) NOT NULL COMMENT '产品名称',
  `pmuch` varchar(100) NOT NULL COMMENT '产品价格',
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
INSERT INTO `db_product` VALUES ('1', '乌珠穆沁羊', '1000', '24', '10', '1493798172', '1556001552', '720', '12%', '4', '', '4', '92', '强壮有力量，好养活，收益大');
INSERT INTO `db_product` VALUES ('2', '大黑羊', '5000', '12', '15', '1493798172', '1556001552', '', '20%', '12', '', '12', '97', '非常好看的一只羊');

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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_user_info
-- ----------------------------
INSERT INTO `db_user_info` VALUES ('1', '超级管理员', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '1', '13567890123', '1477375093', '1');
INSERT INTO `db_user_info` VALUES ('30', '贾达', 'jiada', '670b14728ad9902aecba32e22fa4f6bd', '2', '13567890123', '1477914807', '1');
INSERT INTO `db_user_info` VALUES ('31', '王佳', 'wangjia', 'e10adc3949ba59abbe56e057f20f883e', '1', '13567890123', '1478165822', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_video
-- ----------------------------
INSERT INTO `db_video` VALUES ('1', '视频1', '', '');
INSERT INTO `db_video` VALUES ('3', '视频二', '222222222', '1494469686');

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
  `money` varchar(20) NOT NULL COMMENT '余额',
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_vip
-- ----------------------------
INSERT INTO `db_vip` VALUES ('1', 'e10adc3949ba59abbe56e057f20f883e', '吴凤霞', 'http://wx.qlogo.cn/mmopen/DZk5icbPvaRdwBLqpchAyUXESMYnOwAhHAOsPPsgUsCxBU11Jdibd8Apn5hBadwuvDicQibAxw9UpYlKRxhBOP1CDpXE5Ag8r11P/0', '', null, '505588612@qq.com', '230623199211201242', 'A 吴总、', '7410', '98990', 'ocfeOvzY7TCmWGdyXExBI7hEhjHo', '', '', 'e10adc3949ba59abbe56e057f20f883e', '6221502600012977670', '', '哈尔滨市香坊区民生路', '0', '', '0', 'data/20170522/59229e95d1b51.JPG', '4506', null, '2');
INSERT INTO `db_vip` VALUES ('2', 'e10adc3949ba59abbe56e057f20f883e', '林伯温', 'http://wx.qlogo.cn/mmopen/zhrA19sGHlNSVBRXxZsqtlMMsP7WxIof5eick3yAxDFU71crXoRT0HRKzJf2eShJ8gmdpvp5aUVwk5tLGXjunSCb8JejRrQgC/0', '', '15124518257', '', '*****', '', '7277', '96999', '', '', '123456', 'e10adc3949ba59abbe56e057f20f883e', '', '', '哈尔滨市香坊区民生路', '0', '', '0', '', '', '4506', '0');
INSERT INTO `db_vip` VALUES ('4', '', '', 'http://wx.qlogo.cn/mmopen/hS63v5B1iaohGqDQrP95m4pMxa1CnficRHaVVHMphRytJyfWrBzT1IGDxeqkHicVTibicKGd51vnWPLpN3XvNFpD0gc11FAsWBvH7/0', '', null, '', '', '捕蚊高手', '3711', '', 'ocfeOvzIUmuOZA_TCY8Y6fv4yBsU', '', '', '', '', '', '', '0', '', '', '', '', null, '2');
INSERT INTO `db_vip` VALUES ('5', '', '林博文', 'http://wx.qlogo.cn/mmopen/zhrA19sGHlNSVBRXxZsqtlMMsP7WxIof5eick3yAxDFU71crXoRT0HRKzJf2eShJ8gmdpvp5aUVwk5tLGXjunSCb8JejRrQgC/0', '', null, '', '********', 'linBW', '9623', '', 'ocfeOvyCjSqKqp8DZVaYSnuvoW00', '', '', '', '', '', '哈尔滨香坊区', '0', '', '0', '', '', null, '1');
INSERT INTO `db_vip` VALUES ('6', '', '于静', 'http://wx.qlogo.cn/mmopen/zhrA19sGHlPyH3Jk9DjwpXpLVrL1ia3R2D4Fzz4qtiaibcr76bDL0D6ibZow7dGpyJuPZdbqdQaRIN9rKAh4NN64NH3V5c10HIR8/0', '', null, '', '', '高贵的西瓜皮', '3816', '99999', 'ocfeOv0WE728oUg_qB7TbPFA6BzM', '', '', '', '', '', '哈尔滨', '0', '', '', '', '', null, '0');
INSERT INTO `db_vip` VALUES ('7', '', '经理', 'http://wx.qlogo.cn/mmopen/hS63v5B1iaohk5k2SIZhoicbRIUBdhLyzFZBQsSDYBHeWfFQZn8XKfYAyvbvZuibYXAmGB0sgVGXGW0bVBLeqwjncvqVsuibZQqr/0', '', '', '', '*****', '童安源', '4393', '', 'ocfeOv0rxgUk1xKqPB9aws-FvLIY', '', '', '', '', '', '哈尔滨', '0', '', '0', '', '', null, '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_vip_record
-- ----------------------------
INSERT INTO `db_vip_record` VALUES ('1', '1', '1', '1', '1000', '乌珠穆沁羊', '1495441619', '1');
INSERT INTO `db_vip_record` VALUES ('2', '2', '1', '1', '1000', '乌珠穆沁羊', '1495530191', '1');
INSERT INTO `db_vip_record` VALUES ('3', '2', '1', '1', '1000', '乌珠穆沁羊', '1495530236', '1');
INSERT INTO `db_vip_record` VALUES ('4', '2', '1', '1', '1000', '乌珠穆沁羊', '1495530303', '1');
INSERT INTO `db_vip_record` VALUES ('5', '1', '1', '1', '30', '精品羊肉', '1495761914', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of db_zx
-- ----------------------------
INSERT INTO `db_zx` VALUES ('1', '新的一期金羊开抢，速速来看', '这是云联金阳的一些介绍内容', 'data/20170505/590bcf7104fb9.jpg', 'data/20170424/58fd4b801c303.jpg');
INSERT INTO `db_zx` VALUES ('2', '新的一期金羊开抢，速速来看！', '虽然冰球是冬奥会的一个常规运动项目，但是对于冰球运动员来说能打上北美冰球职业联盟（NHL），才是既能证明自己实力又能挣上大钱的地方。因为冬奥会上冰球运动项目的赛程，往往会和NHL常规赛发生冲突，往届冬奥会都会给参加冬奥会的NHL球员一大笔钱（索契冬奥会时是1400万美元），以弥补中断赛程给NHL各大老板造成的损失。', 'data/20170425/58feb5b2ea57e.jpg', '');
