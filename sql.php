<?php
$sql_query[]="/*
Navicat MySQL Data Transfer

Source Server         : zz
Source Server Version : 50517
Source Host           : localhost:3306
Source Database       : testinstall

Target Server Type    : MYSQL
Target Server Version : 50517
File Encoding         : 65001

Date: 2013-05-11 13:03:25
*/

SET FOREIGN_KEY_CHECKS=0";
$sql_query[]="

-- ----------------------------
-- Table structure for `zz_begincourse`
-- ----------------------------
DROP TABLE IF EXISTS `zz_begincourse`";
$sql_query[]="
CREATE TABLE `zz_begincourse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classid` int(11) DEFAULT NULL COMMENT '开课班级',
  `teacherid` int(11) DEFAULT NULL COMMENT '开课老师',
  `courseid` int(11) DEFAULT NULL COMMENT '开课课程',
  `term` int(11) DEFAULT NULL COMMENT '开课学期',
  `college` int(11) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8";
$sql_query[]="

-- ----------------------------
-- Records of zz_begincourse
-- ----------------------------
INSERT INTO `zz_begincourse` VALUES ('1', '1', '5', '1', '1', '1', '1', null)";
$sql_query[]="
INSERT INTO `zz_begincourse` VALUES ('2', '1', '6', '2', '1', '1', '1', null)";
$sql_query[]="
INSERT INTO `zz_begincourse` VALUES ('3', '5', '7', '4', '1', '1', '1', null)";
$sql_query[]="
INSERT INTO `zz_begincourse` VALUES ('4', '1', '5', '5', '1', '1', '1', null)";
$sql_query[]="

-- ----------------------------
-- Table structure for `zz_class`
-- ----------------------------
DROP TABLE IF EXISTS `zz_class`";
$sql_query[]="
CREATE TABLE `zz_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classno` varchar(255) NOT NULL COMMENT '班级编号',
  `classname` varchar(255) NOT NULL COMMENT '班级名称',
  `count` int(11) DEFAULT NULL,
  `term` tinyint(4) DEFAULT NULL COMMENT '学期',
  `class` int(11) DEFAULT NULL,
  `college` tinyint(4) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL COMMENT '班级的类型  1 是自然班  2 教学班',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8";
$sql_query[]="

-- ----------------------------
-- Records of zz_class
-- ----------------------------
INSERT INTO `zz_class` VALUES ('1', '201005', '2010级5班', '48', '1', '2010', '1', '1')";
$sql_query[]="
INSERT INTO `zz_class` VALUES ('2', '201004', '2010级4班', '47', '1', '2010', '1', '1')";
$sql_query[]="
INSERT INTO `zz_class` VALUES ('3', '201003', '2010级3班', '47', '1', '2010', '1', '1')";
$sql_query[]="
INSERT INTO `zz_class` VALUES ('4', '201001', '2010级1班', '45', '1', '2010', '1', '1')";
$sql_query[]="
INSERT INTO `zz_class` VALUES ('5', 'b3', '物联网兴趣班', '28', '2', '2010', '1', '2')";
$sql_query[]="
INSERT INTO `zz_class` VALUES ('6', '201006', '2010级6班', '45', '1', '2010', '1', '1')";
$sql_query[]="
INSERT INTO `zz_class` VALUES ('7', '1324201105', '2011级5班', '35', '1', '2011', '1', '1')";
$sql_query[]="
INSERT INTO `zz_class` VALUES ('8', '1324201106', '2011级6班', '35', '1', '2011', '1', '1')";
$sql_query[]="
INSERT INTO `zz_class` VALUES ('9', '1324201107', '2011级7班', '35', '1', '2011', '1', '1')";
$sql_query[]="
INSERT INTO `zz_class` VALUES ('10', 'jsj_01', ' 数字电路班', '100', '2', '2011', '1', '2')";
$sql_query[]="
INSERT INTO `zz_class` VALUES ('11', 'jsj_02', '第二班', '100', '2', '2010', '1', '2')";
$sql_query[]="

-- ----------------------------
-- Table structure for `zz_classstu`
-- ----------------------------
DROP TABLE IF EXISTS `zz_classstu`";
$sql_query[]="
CREATE TABLE `zz_classstu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classid` tinyint(4) DEFAULT NULL COMMENT '班级id',
  `stuid` int(11) DEFAULT NULL COMMENT '学生id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8";
$sql_query[]="

-- ----------------------------
-- Records of zz_classstu
-- ----------------------------
INSERT INTO `zz_classstu` VALUES ('1', '5', '3')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('2', '5', '2')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('3', '5', '1')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('4', '5', '10')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('5', '5', '11')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('6', '5', '9')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('7', '5', '8')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('8', '5', '7')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('9', '5', '170')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('10', '5', '169')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('11', '5', '168')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('12', '5', '167')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('13', '5', '166')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('14', '5', '165')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('15', '5', '164')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('16', '5', '163')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('17', '5', '162')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('18', '5', '161')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('19', '5', '160')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('20', '5', '159')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('21', '5', '158')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('22', '5', '157')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('23', '5', '156')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('24', '5', '155')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('25', '5', '154')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('26', '5', '153')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('27', '5', '152')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('28', '5', '151')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('29', '5', '150')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('30', '5', '149')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('31', '5', '148')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('32', '5', '147')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('33', '5', '146')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('34', '5', '145')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('35', '5', '144')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('36', '5', '143')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('37', '5', '142')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('38', '5', '141')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('39', '5', '140')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('40', '5', '139')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('41', '5', '138')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('42', '5', '137')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('43', '5', '136')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('44', '5', '135')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('45', '5', '134')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('46', '5', '133')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('47', '5', '132')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('48', '10', '247')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('49', '10', '246')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('50', '10', '245')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('51', '10', '244')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('52', '10', '243')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('53', '10', '242')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('54', '10', '241')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('55', '10', '240')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('56', '10', '239')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('57', '10', '238')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('58', '10', '237')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('59', '10', '236')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('60', '10', '235')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('61', '10', '234')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('62', '10', '233')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('63', '10', '232')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('64', '10', '231')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('65', '10', '230')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('66', '10', '229')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('67', '10', '228')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('68', '10', '227')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('69', '10', '226')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('70', '10', '225')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('71', '10', '224')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('72', '10', '223')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('73', '10', '222')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('74', '10', '221')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('75', '10', '220')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('76', '10', '219')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('77', '10', '218')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('78', '10', '217')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('79', '10', '216')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('80', '10', '215')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('81', '10', '214')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('82', '10', '213')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('83', '10', '212')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('84', '10', '211')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('85', '10', '210')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('86', '10', '6')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('87', '10', '5')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('88', '11', '1')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('89', '11', '2')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('90', '11', '3')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('91', '11', '10')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('92', '11', '6')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('93', '11', '4')";
$sql_query[]="
INSERT INTO `zz_classstu` VALUES ('94', '11', '5')";
$sql_query[]="

-- ----------------------------
-- Table structure for `zz_college`
-- ----------------------------
DROP TABLE IF EXISTS `zz_college`";
$sql_query[]="
CREATE TABLE `zz_college` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `collegeno` varchar(255) DEFAULT NULL,
  `collegename` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8";
$sql_query[]="

-- ----------------------------
-- Records of zz_college
-- ----------------------------
INSERT INTO `zz_college` VALUES ('1', '1001', '计算机学院')";
$sql_query[]="

-- ----------------------------
-- Table structure for `zz_conf`
-- ----------------------------
DROP TABLE IF EXISTS `zz_conf`";
$sql_query[]="
CREATE TABLE `zz_conf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `conf_name` varchar(255) DEFAULT NULL,
  `conf_value` varchar(255) DEFAULT NULL,
  `conf_title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8";
$sql_query[]="

-- ----------------------------
-- Records of zz_conf
-- ----------------------------
INSERT INTO `zz_conf` VALUES ('1', 'PAGECOUNT', '10', '每页显示数量')";
$sql_query[]="
INSERT INTO `zz_conf` VALUES ('2', 'COUNT', '1', '审核人数标准')";
$sql_query[]="
INSERT INTO `zz_conf` VALUES ('3', 'MAXDAY', '10', '最大预约日期')";
$sql_query[]="
INSERT INTO `zz_conf` VALUES ('4', 'MINDAY', '3', '最早预约日期')";
$sql_query[]="
INSERT INTO `zz_conf` VALUES ('5', 'SUB_SIZE', '5', '显示多少个分页')";
$sql_query[]="
INSERT INTO `zz_conf` VALUES ('6', 'THEME', 'theme3', '当前主题')";
$sql_query[]="
INSERT INTO `zz_conf` VALUES ('7', 'MAX_COUNT', '2', '最大预约人数')";
$sql_query[]="

-- ----------------------------
-- Table structure for `zz_consumable`
-- ----------------------------
DROP TABLE IF EXISTS `zz_consumable`";
$sql_query[]="
CREATE TABLE `zz_consumable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL COMMENT '对应耗材id',
  `reserve` int(11) DEFAULT '0' COMMENT '库存',
  `sum` int(11) DEFAULT '0' COMMENT '总数',
  `lab` int(11) DEFAULT NULL COMMENT ' 实验室id 或场所id',
  `duty` int(11) DEFAULT NULL COMMENT '负责人  id',
  `college` tinyint(4) DEFAULT NULL,
  `state` tinyint(4) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8";
$sql_query[]="

-- ----------------------------
-- Records of zz_consumable
-- ----------------------------
INSERT INTO `zz_consumable` VALUES ('1', '1', '90', '99', '1', '1', '1', '1', null)";
$sql_query[]="
INSERT INTO `zz_consumable` VALUES ('5', '2', '5', '5', '2', '1', '1', '1', null)";
$sql_query[]="

-- ----------------------------
-- Table structure for `zz_consumablenote`
-- ----------------------------
DROP TABLE IF EXISTS `zz_consumablenote`";
$sql_query[]="
CREATE TABLE `zz_consumablenote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `conid` int(11) DEFAULT NULL COMMENT '耗材id',
  `amount` int(11) DEFAULT NULL COMMENT '本次数量',
  `duty` int(11) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL COMMENT '操作类型  入库 or  出库',
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8";
$sql_query[]="

-- ----------------------------
-- Records of zz_consumablenote
-- ----------------------------
INSERT INTO `zz_consumablenote` VALUES ('1', '1', '45', '1', '2013-03-25 15:20:56', '1', '1')";
$sql_query[]="
INSERT INTO `zz_consumablenote` VALUES ('2', '1', '14', '1', '0000-00-00 00:00:00', '1', null)";
$sql_query[]="
INSERT INTO `zz_consumablenote` VALUES ('3', '1', '11', '1', '0000-00-00 00:00:00', '2', null)";
$sql_query[]="
INSERT INTO `zz_consumablenote` VALUES ('4', '1', '10', '1', '0000-00-00 00:00:00', '1', '没有..')";
$sql_query[]="
INSERT INTO `zz_consumablenote` VALUES ('5', '1', '2', '1', '0000-00-00 00:00:00', '2', 'c')";
$sql_query[]="
INSERT INTO `zz_consumablenote` VALUES ('6', '1', '3', '1', '2013-03-25 03:03:27', '2', 'c')";
$sql_query[]="
INSERT INTO `zz_consumablenote` VALUES ('7', '1', '5', '1', '2013-03-25 03:03:55', '1', 'r')";
$sql_query[]="
INSERT INTO `zz_consumablenote` VALUES ('8', '1', '7', '1', '2013-03-25 04:03:00', '1', 't')";
$sql_query[]="
INSERT INTO `zz_consumablenote` VALUES ('9', '1', '9', '1', '2013-03-25 04:03:35', '1', 'y')";
$sql_query[]="
INSERT INTO `zz_consumablenote` VALUES ('10', '1', '1', '3', '2013-03-25 04:03:34', '2', '2')";
$sql_query[]="
INSERT INTO `zz_consumablenote` VALUES ('11', '1', '6', '1', '2013-03-25 04:03:45', '2', '3')";
$sql_query[]="
INSERT INTO `zz_consumablenote` VALUES ('12', '1', '12', '1', '2013-03-25 04:03:26', '2', '')";
$sql_query[]="
INSERT INTO `zz_consumablenote` VALUES ('13', '1', '78', '1', '2013-03-25 04:03:45', '1', '')";
$sql_query[]="
INSERT INTO `zz_consumablenote` VALUES ('14', '5', '5', '3', '2013-03-25 04:03:38', '1', '1')";
$sql_query[]="
INSERT INTO `zz_consumablenote` VALUES ('15', '1', '12', '1', '2013-05-10 04:05:20', '1', '12')";
$sql_query[]="

-- ----------------------------
-- Table structure for `zz_consuminfo`
-- ----------------------------
DROP TABLE IF EXISTS `zz_consuminfo`";
$sql_query[]="
CREATE TABLE `zz_consuminfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cno` varchar(255) DEFAULT NULL COMMENT '耗材编号',
  `cname` varchar(255) DEFAULT NULL COMMENT '耗材名称',
  `prickle` varchar(255) DEFAULT NULL COMMENT '单位',
  `brand` varchar(255) DEFAULT NULL COMMENT '品牌',
  `type` int(11) DEFAULT NULL COMMENT '类型',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8";
$sql_query[]="

-- ----------------------------
-- Records of zz_consuminfo
-- ----------------------------
INSERT INTO `zz_consuminfo` VALUES ('1', '7701', '内存条', '根', '金士顿', '1')";
$sql_query[]="
INSERT INTO `zz_consuminfo` VALUES ('2', '7702', '打印纸', '袋', '熊猫', '1')";
$sql_query[]="
INSERT INTO `zz_consuminfo` VALUES ('3', '7703', '网线', '箱', '水星', '1')";
$sql_query[]="

-- ----------------------------
-- Table structure for `zz_counter`
-- ----------------------------
DROP TABLE IF EXISTS `zz_counter`";
$sql_query[]="
CREATE TABLE `zz_counter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(50) NOT NULL COMMENT 'IP地址',
  `counts` varchar(50) NOT NULL COMMENT '统计访问次数',
  `date` datetime NOT NULL COMMENT '访问时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8";
$sql_query[]="

-- ----------------------------
-- Records of zz_counter
-- ----------------------------
INSERT INTO `zz_counter` VALUES ('1', '127.0.0.1', '10030', '2012-12-20 10:12:13')";
$sql_query[]="
INSERT INTO `zz_counter` VALUES ('2', '10.67.153.123', '1', '2012-12-20 10:12:45')";
$sql_query[]="

-- ----------------------------
-- Table structure for `zz_course`
-- ----------------------------
DROP TABLE IF EXISTS `zz_course`";
$sql_query[]="
CREATE TABLE `zz_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `courseno` varchar(255) NOT NULL,
  `coursename` varchar(255) NOT NULL,
  `major` tinyint(11) DEFAULT NULL,
  `properties` int(11) DEFAULT NULL,
  `college` tinyint(4) DEFAULT NULL,
  `classhour` int(11) DEFAULT NULL,
  `state` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8";
$sql_query[]="

-- ----------------------------
-- Records of zz_course
-- ----------------------------
INSERT INTO `zz_course` VALUES ('1', '2201', '数据结构', '1', '1', '1', '40', '1')";
$sql_query[]="
INSERT INTO `zz_course` VALUES ('2', '2202', '计算机操作系统', '1', '2', '1', '60', '1')";
$sql_query[]="
INSERT INTO `zz_course` VALUES ('3', '2203', 'c语言程序设计', '1', '2', '1', '40', '1')";
$sql_query[]="
INSERT INTO `zz_course` VALUES ('4', 'w011', '物联网与生活', '1', '2', '1', '20', '1')";
$sql_query[]="
INSERT INTO `zz_course` VALUES ('5', 'x002', '算法分析与设计', '1', '2', '1', '60', '1')";
$sql_query[]="
INSERT INTO `zz_course` VALUES ('9', 'sx222', '模拟电路', '2', '1', '1', '54', '1')";
$sql_query[]="

-- ----------------------------
-- Table structure for `zz_coursetype`
-- ----------------------------
DROP TABLE IF EXISTS `zz_coursetype`";
$sql_query[]="
CREATE TABLE `zz_coursetype` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `typename` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8";
$sql_query[]="

-- ----------------------------
-- Records of zz_coursetype
-- ----------------------------
INSERT INTO `zz_coursetype` VALUES ('1', '专业必修')";
$sql_query[]="
INSERT INTO `zz_coursetype` VALUES ('2', '专业选修')";
$sql_query[]="
INSERT INTO `zz_coursetype` VALUES ('3', '公共选修')";
$sql_query[]="
INSERT INTO `zz_coursetype` VALUES ('4', '公共必修')";
$sql_query[]="

-- ----------------------------
-- Table structure for `zz_equip`
-- ----------------------------
DROP TABLE IF EXISTS `zz_equip`";
$sql_query[]="
CREATE TABLE `zz_equip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eno` varchar(255) NOT NULL COMMENT '设备编号',
  `ename` varchar(255) NOT NULL COMMENT '设备编号',
  `brand` varchar(255) DEFAULT NULL COMMENT '品牌',
  `model` varchar(255) DEFAULT NULL COMMENT '型号',
  `serialno` varchar(255) DEFAULT NULL COMMENT '序列号',
  `type` tinyint(4) DEFAULT NULL COMMENT '设备类型',
  `buytime` datetime DEFAULT NULL COMMENT '购买时间',
  `buytype` varchar(4) DEFAULT NULL COMMENT '购买方式',
  `money` double DEFAULT NULL COMMENT '购买金额',
  `lab` tinyint(4) DEFAULT NULL COMMENT '所属实验室',
  `location` varchar(255) DEFAULT NULL COMMENT '保存位置',
  `usingtype` tinyint(4) DEFAULT NULL COMMENT '使用方式',
  `duty` tinyint(4) DEFAULT NULL COMMENT '负责人',
  `college` tinyint(4) DEFAULT NULL COMMENT '学院',
  `state` tinyint(4) DEFAULT NULL COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8";
$sql_query[]="

-- ----------------------------
-- Records of zz_equip
-- ----------------------------
INSERT INTO `zz_equip` VALUES ('1', 's001', '服务器', '联想', 'Y480', '111111', '1', '2013-04-08 17:24:09', '1', '0', '2', '412实验室', '1', '1', '1', '3')";
$sql_query[]="
INSERT INTO `zz_equip` VALUES ('3', 's002', '交换机', '水星', 'XT112', '22222', '2', '2013-03-06 00:00:00', '1', '458.4', '1', '大学生实验室', '2', '1', '1', '1')";
$sql_query[]="
INSERT INTO `zz_equip` VALUES ('4', 's003', '路由器', '水星', 'DA-S455', '', '2', '2013-03-06 00:00:00', '2', '0', '1', '', '1', '1', '1', '13')";
$sql_query[]="
INSERT INTO `zz_equip` VALUES ('5', 's004', '兼容机', '联想', 'X-7845i', '1211452', '2', '2013-03-13 00:00:00', '2', '0', '1', '大学生创新实验室', '1', '1', '1', '4')";
$sql_query[]="

-- ----------------------------
-- Table structure for `zz_equipbuytype`
-- ----------------------------
DROP TABLE IF EXISTS `zz_equipbuytype`";
$sql_query[]="
CREATE TABLE `zz_equipbuytype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `buytypename` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8";
$sql_query[]="

-- ----------------------------
-- Records of zz_equipbuytype
-- ----------------------------
INSERT INTO `zz_equipbuytype` VALUES ('1', '购买')";
$sql_query[]="
INSERT INTO `zz_equipbuytype` VALUES ('2', '赠送')";
$sql_query[]="

-- ----------------------------
-- Table structure for `zz_equipfail`
-- ----------------------------
DROP TABLE IF EXISTS `zz_equipfail`";
$sql_query[]="
CREATE TABLE `zz_equipfail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eid` int(11) DEFAULT NULL COMMENT '设备id',
  `phenomenon` varchar(255) DEFAULT NULL COMMENT '故障现象',
  `firstreason` varchar(255) DEFAULT NULL COMMENT '初步原因',
  `failtime` datetime DEFAULT NULL COMMENT '故障时间',
  `discoverperson` varchar(255) DEFAULT NULL COMMENT '故障发现者',
  `failreason` varchar(255) DEFAULT NULL COMMENT '故障原因',
  `state` tinyint(4) DEFAULT NULL COMMENT '故障设备状态 1 未送修   2  送修中  3 修回',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8";
$sql_query[]="

-- ----------------------------
-- Records of zz_equipfail
-- ----------------------------
INSERT INTO `zz_equipfail` VALUES ('1', '1', ' 蓝屏', ' 硬盘有坏道', '2013-03-19 00:00:00', ' 祝君', ' ', '7')";
$sql_query[]="
INSERT INTO `zz_equipfail` VALUES ('2', '1', ' 第二次蓝屏', ' 没修好', '2013-03-27 00:00:00', ' 张三', ' ', '7')";
$sql_query[]="
INSERT INTO `zz_equipfail` VALUES ('3', '1', ' 蓝屏，而且有噪声', ' 主板烧了', '2013-03-27 00:00:00', ' 张三', ' ', '7')";
$sql_query[]="
INSERT INTO `zz_equipfail` VALUES ('4', '5', ' 无法显示图像', ' 显卡有问题', '2013-03-27 00:00:00', ' 祝君', ' 显卡烧毁', '6')";
$sql_query[]="

-- ----------------------------
-- Table structure for `zz_equiploan`
-- ----------------------------
DROP TABLE IF EXISTS `zz_equiploan`";
$sql_query[]="
CREATE TABLE `zz_equiploan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eid` int(11) NOT NULL COMMENT '设备id',
  `loantarget` varchar(255) NOT NULL COMMENT '借用人',
  `loanreason` varchar(255) DEFAULT NULL COMMENT '借用事由',
  `loantime` datetime DEFAULT NULL COMMENT '借出时间',
  `duty` int(11) NOT NULL COMMENT '经手人',
  `agreetime` datetime DEFAULT NULL COMMENT '约定归还时间',
  `returntime` datetime DEFAULT NULL COMMENT '实际返回时间',
  `returnperson` varchar(255) DEFAULT NULL COMMENT '归还人',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `state` tinyint(4) DEFAULT NULL COMMENT ' 状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8";
$sql_query[]="

-- ----------------------------
-- Records of zz_equiploan
-- ----------------------------
INSERT INTO `zz_equiploan` VALUES ('1', '5', ' 物电学院', ' 研究单片机', '2013-03-19 00:00:00', '1', '2013-03-27 00:00:00', '2013-03-26 00:00:00', '张四', '', '15')";
$sql_query[]="
INSERT INTO `zz_equiploan` VALUES ('2', '3', ' 外国语学院', '创建物联网', '2013-03-19 00:00:00', '1', '2013-03-20 00:00:00', '2013-03-27 00:00:00', ' 小黑', ' 呵呵', '15')";
$sql_query[]="
INSERT INTO `zz_equiploan` VALUES ('3', '4', ' qwe', ' qwe', '2013-05-09 00:00:00', '3', '2013-05-10 00:00:00', null, null, ' qweqwe', '14')";
$sql_query[]="

-- ----------------------------
-- Table structure for `zz_equiprepair`
-- ----------------------------
DROP TABLE IF EXISTS `zz_equiprepair`";
$sql_query[]="
CREATE TABLE `zz_equiprepair` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fid` int(11) NOT NULL COMMENT '故障编号',
  `sendtime` datetime NOT NULL COMMENT '送修时间',
  `sendperson` varchar(255) NOT NULL COMMENT '送修人员',
  `returntime` datetime DEFAULT NULL COMMENT '修回时间',
  `state` int(11) DEFAULT NULL COMMENT '维修状态',
  `returnperson` varchar(255) DEFAULT NULL COMMENT '修回人员',
  `flag` tinyint(2) DEFAULT NULL COMMENT '是否修回的状态',
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8";
$sql_query[]="

-- ----------------------------
-- Records of zz_equiprepair
-- ----------------------------
INSERT INTO `zz_equiprepair` VALUES ('1', '1', '2013-03-01 00:00:00', ' 张三', '2013-03-26 00:00:00', '9', '张三', null, ' ')";
$sql_query[]="
INSERT INTO `zz_equiprepair` VALUES ('2', '2', '2013-03-26 00:00:00', ' 张三', '2013-03-26 00:00:00', '10', '张三', null, ' ')";
$sql_query[]="
INSERT INTO `zz_equiprepair` VALUES ('3', '3', '2013-03-27 00:00:00', ' 李四', '2013-03-28 00:00:00', '11', '李四', null, ' ')";
$sql_query[]="
INSERT INTO `zz_equiprepair` VALUES ('4', '4', '2013-05-16 00:00:00', ' qwe', null, '8', null, null, ' qwe')";
$sql_query[]="

-- ----------------------------
-- Table structure for `zz_equipstate`
-- ----------------------------
DROP TABLE IF EXISTS `zz_equipstate`";
$sql_query[]="
CREATE TABLE `zz_equipstate` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `statename` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8";
$sql_query[]="

-- ----------------------------
-- Records of zz_equipstate
-- ----------------------------
INSERT INTO `zz_equipstate` VALUES ('1', '正常')";
$sql_query[]="
INSERT INTO `zz_equipstate` VALUES ('2', '故障')";
$sql_query[]="
INSERT INTO `zz_equipstate` VALUES ('3', '损坏')";
$sql_query[]="
INSERT INTO `zz_equipstate` VALUES ('4', '维修中')";
$sql_query[]="
INSERT INTO `zz_equipstate` VALUES ('5', '未送修')";
$sql_query[]="
INSERT INTO `zz_equipstate` VALUES ('6', '已送修')";
$sql_query[]="
INSERT INTO `zz_equipstate` VALUES ('7', '已修回')";
$sql_query[]="
INSERT INTO `zz_equipstate` VALUES ('8', '未修回')";
$sql_query[]="
INSERT INTO `zz_equipstate` VALUES ('9', '完全修好')";
$sql_query[]="
INSERT INTO `zz_equipstate` VALUES ('10', '部分修好')";
$sql_query[]="
INSERT INTO `zz_equipstate` VALUES ('11', '无法修好')";
$sql_query[]="
INSERT INTO `zz_equipstate` VALUES ('12', '报废')";
$sql_query[]="
INSERT INTO `zz_equipstate` VALUES ('13', '已借出')";
$sql_query[]="
INSERT INTO `zz_equipstate` VALUES ('14', '未归还')";
$sql_query[]="
INSERT INTO `zz_equipstate` VALUES ('15', '已归还')";
$sql_query[]="

-- ----------------------------
-- Table structure for `zz_equiptype`
-- ----------------------------
DROP TABLE IF EXISTS `zz_equiptype`";
$sql_query[]="
CREATE TABLE `zz_equiptype` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `typename` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8";
$sql_query[]="

-- ----------------------------
-- Records of zz_equiptype
-- ----------------------------
INSERT INTO `zz_equiptype` VALUES ('1', '大型设备')";
$sql_query[]="
INSERT INTO `zz_equiptype` VALUES ('2', '小型设备')";
$sql_query[]="

-- ----------------------------
-- Table structure for `zz_equipusetype`
-- ----------------------------
DROP TABLE IF EXISTS `zz_equipusetype`";
$sql_query[]="
CREATE TABLE `zz_equipusetype` (
  `id` tinyint(4) NOT NULL,
  `usetypename` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8";
$sql_query[]="

-- ----------------------------
-- Records of zz_equipusetype
-- ----------------------------
INSERT INTO `zz_equipusetype` VALUES ('1', '科研')";
$sql_query[]="
INSERT INTO `zz_equipusetype` VALUES ('2', '教学')";
$sql_query[]="

-- ----------------------------
-- Table structure for `zz_expitem`
-- ----------------------------
DROP TABLE IF EXISTS `zz_expitem`";
$sql_query[]="
CREATE TABLE `zz_expitem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `courseid` tinyint(4) NOT NULL,
  `expname` varchar(255) NOT NULL COMMENT '实验名称',
  `guide` text NOT NULL COMMENT '实验指导  包含 目的 原理  内容 ',
  `type` tinyint(4) DEFAULT NULL COMMENT '实验类型',
  `exphour` tinyint(4) DEFAULT NULL COMMENT '学时',
  `guidefile` varchar(255) DEFAULT NULL COMMENT '实验指导的文件',
  `college` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8";
$sql_query[]="

-- ----------------------------
-- Records of zz_expitem
-- ----------------------------
INSERT INTO `zz_expitem` VALUES ('1', '1', '递归算法', '指导', '1', '10', null, '1')";
$sql_query[]="
INSERT INTO `zz_expitem` VALUES ('2', '2', '做一个简单的操作系统', '做一个简单的操作系统', '2', '10', null, '1')";
$sql_query[]="
INSERT INTO `zz_expitem` VALUES ('5', '3', 'c语言循环', '循环测试', '2', '10', '12700120130324230248BNz.doc?title=经费预算.doc', '1')";
$sql_query[]="
INSERT INTO `zz_expitem` VALUES ('6', '1', '最优二叉树求解', '最优二叉树求解最优二叉树求解', '3', '1', null, '1')";
$sql_query[]="
INSERT INTO `zz_expitem` VALUES ('7', '1', '图的遍历', '图的遍历图的遍历图的遍历图的遍历', '3', '10', '12700120130324230248BNz.doc?title=经费预算.doc', '1')";
$sql_query[]="
INSERT INTO `zz_expitem` VALUES ('8', '4', '用手机控制你的电灯', '用手机控制你的电灯用手机控制你的电灯', '1', '10', '12700120130327135012OBa.doc?title=三好学生申请表.doc', '1')";
$sql_query[]="
INSERT INTO `zz_expitem` VALUES ('9', '5', '矩阵的乘法', '矩阵的乘法矩阵的乘法', '3', '10', '12700120130327131346kVA.doc?title=学生实验1递归算法.doc', '1')";
$sql_query[]="
INSERT INTO `zz_expitem` VALUES ('10', '5', '八皇后问题', '八皇后问题八皇后问题八皇后问题八皇后问题', '2', '1', '12700120130328125118qoh.doc?title=生科院.doc', '1')";
$sql_query[]="

-- ----------------------------
-- Table structure for `zz_expreport`
-- ----------------------------
DROP TABLE IF EXISTS `zz_expreport`";
$sql_query[]="
CREATE TABLE `zz_expreport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `beginid` int(11) NOT NULL COMMENT '开课id',
  `expid` int(11) NOT NULL COMMENT '开课的课程的实验项目 id',
  `stuid` int(11) NOT NULL,
  `reportfile` varchar(255) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `state` tinyint(4) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8";
$sql_query[]="

-- ----------------------------
-- Records of zz_expreport
-- ----------------------------
INSERT INTO `zz_expreport` VALUES ('1', '1', '1', '1', '12700120130324225957bEI.docx?title=安装的软件.docx', '78', '1', '还不够完善')";
$sql_query[]="
INSERT INTO `zz_expreport` VALUES ('2', '1', '6', '1', '12700120130324230248BNz.doc?title=经费预算.doc', '79', '1', 'ok')";
$sql_query[]="
INSERT INTO `zz_expreport` VALUES ('3', '1', '7', '1', '12700120130327131346kVA.doc?title=学生实验1递归算法.doc', null, '1', null)";
$sql_query[]="
INSERT INTO `zz_expreport` VALUES ('4', '3', '8', '1', '12700120130327135054Trx.doc?title=英语四级议论文模版及范文.doc', null, '1', null)";
$sql_query[]="
INSERT INTO `zz_expreport` VALUES ('5', '2', '2', '1', '12700120130327135235mzs.docx?title=简易Blog系统UML设计.docx', '89', '1', '不错')";
$sql_query[]="
INSERT INTO `zz_expreport` VALUES ('6', '4', '9', '1', '12700120130327142643Drn.doc?title=国家助学金申请表.doc', '99', '1', 'ok')";
$sql_query[]="

-- ----------------------------
-- Table structure for `zz_exptype`
-- ----------------------------
DROP TABLE IF EXISTS `zz_exptype`";
$sql_query[]="
CREATE TABLE `zz_exptype` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `typename` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8";
$sql_query[]="

-- ----------------------------
-- Records of zz_exptype
-- ----------------------------
INSERT INTO `zz_exptype` VALUES ('1', '演示型实验')";
$sql_query[]="
INSERT INTO `zz_exptype` VALUES ('2', '验证型实验')";
$sql_query[]="
INSERT INTO `zz_exptype` VALUES ('3', '证明型实验')";
$sql_query[]="

-- ----------------------------
-- Table structure for `zz_job`
-- ----------------------------
DROP TABLE IF EXISTS `zz_job`";
$sql_query[]="
CREATE TABLE `zz_job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jobname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8";
$sql_query[]="

-- ----------------------------
-- Records of zz_job
-- ----------------------------
INSERT INTO `zz_job` VALUES ('1', '教师')";
$sql_query[]="
INSERT INTO `zz_job` VALUES ('2', '行政')";
$sql_query[]="

-- ----------------------------
-- Table structure for `zz_lab`
-- ----------------------------
DROP TABLE IF EXISTS `zz_lab`";
$sql_query[]="
CREATE TABLE `zz_lab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `labno` varchar(255) DEFAULT NULL COMMENT '实验室编号',
  `labname` varchar(255) DEFAULT NULL COMMENT '实验室名称',
  `college` int(11) DEFAULT NULL,
  `labinfo` varchar(255) DEFAULT NULL COMMENT '描述',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8";
$sql_query[]="

-- ----------------------------
-- Records of zz_lab
-- ----------------------------
INSERT INTO `zz_lab` VALUES ('1', '9001', '大学生创新实验室', '1', '计算机学院为同学设立的实验室')";
$sql_query[]="
INSERT INTO `zz_lab` VALUES ('2', '9002', '图形处理实验室', '1', '研究生进行图形图像处理的实验室')";
$sql_query[]="
INSERT INTO `zz_lab` VALUES ('3', '9003', '412机房', '1', '机房重地')";
$sql_query[]="

-- ----------------------------
-- Table structure for `zz_major`
-- ----------------------------
DROP TABLE IF EXISTS `zz_major`";
$sql_query[]="
CREATE TABLE `zz_major` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `majorno` varchar(255) DEFAULT NULL COMMENT '专业编号',
  `majorname` varchar(255) DEFAULT NULL COMMENT ' 专业名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8";
$sql_query[]="

-- ----------------------------
-- Records of zz_major
-- ----------------------------
INSERT INTO `zz_major` VALUES ('1', '4001', '软件工程')";
$sql_query[]="
INSERT INTO `zz_major` VALUES ('2', '4002', '通信工程')";
$sql_query[]="
INSERT INTO `zz_major` VALUES ('3', '0012', ' 物联网')";
$sql_query[]="

-- ----------------------------
-- Table structure for `zz_md5file`
-- ----------------------------
DROP TABLE IF EXISTS `zz_md5file`";
$sql_query[]="
CREATE TABLE `zz_md5file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `md5` varchar(255) DEFAULT NULL COMMENT '文件的MD5值',
  `filename` varchar(255) DEFAULT NULL COMMENT '文件保存的名字',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8";
$sql_query[]="

-- ----------------------------
-- Records of zz_md5file
-- ----------------------------
INSERT INTO `zz_md5file` VALUES ('1', '8969288f4245120e7c3870287cce0ff3', '12700120130324132430Txv.jpg')";
$sql_query[]="
INSERT INTO `zz_md5file` VALUES ('2', '1bcb3234136a87d88a9ac74573577f45', '12700120130324225957bEI.docx')";
$sql_query[]="
INSERT INTO `zz_md5file` VALUES ('3', '01a5799216f35148b6924efa2e954d39', '12700120130324230248BNz.doc')";
$sql_query[]="
INSERT INTO `zz_md5file` VALUES ('4', 'f7167681a4a35bd66339c991bfa7563d', '12700120130327131346kVA.doc')";
$sql_query[]="
INSERT INTO `zz_md5file` VALUES ('5', '1170ecbc5ee55549d67b716669592043', '12700120130327135012OBa.doc')";
$sql_query[]="
INSERT INTO `zz_md5file` VALUES ('6', 'b964605372185a78f0021c64425fa61d', '12700120130327135054Trx.doc')";
$sql_query[]="
INSERT INTO `zz_md5file` VALUES ('7', '3cd27c6692fdee05f0dad1fb1181cb14', '12700120130327135235mzs.docx')";
$sql_query[]="
INSERT INTO `zz_md5file` VALUES ('8', 'f2e4a8e643049805cbfcb57ff3b42c3c', '12700120130327142643Drn.doc')";
$sql_query[]="
INSERT INTO `zz_md5file` VALUES ('9', '0de6d0f41752e8c4eef73f1091579142', '12700120130327151202Urb.doc')";
$sql_query[]="
INSERT INTO `zz_md5file` VALUES ('10', '3232db69e9171cf7f1dba49f35c98f44', '12700120130328125118qoh.doc')";
$sql_query[]="
INSERT INTO `zz_md5file` VALUES ('11', 'cb0d26c8c6fd5a634ebcb74155297464', '12700120130331131140swy.xls')";
$sql_query[]="
INSERT INTO `zz_md5file` VALUES ('12', 'd143afc093286f255a1911e8fd79610d', '12700120130510145150Sjv.jpg')";
$sql_query[]="
INSERT INTO `zz_md5file` VALUES ('13', '53e0cea2e29de767b1178a8eac49c072', '12700120130510164031jSM.xls')";
$sql_query[]="
INSERT INTO `zz_md5file` VALUES ('14', 'db41a45bd7d2048c70e0e5c722baee54', '12700120130511111136RJY.xls')";
$sql_query[]="

-- ----------------------------
-- Table structure for `zz_notice`
-- ----------------------------
DROP TABLE IF EXISTS `zz_notice`";
$sql_query[]="
CREATE TABLE `zz_notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `type` tinyint(4) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `college` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8";
$sql_query[]="

-- ----------------------------
-- Records of zz_notice
-- ----------------------------
INSERT INTO `zz_notice` VALUES ('1', '测试公告', '测试而已', '1', '2013-03-24 21:21:23', '1')";
$sql_query[]="
INSERT INTO `zz_notice` VALUES ('2', '433', '2222', '1', '2013-03-20 00:00:00', '1')";
$sql_query[]="
INSERT INTO `zz_notice` VALUES ('3', '快速开发网站', '快速开发网站', '1', '2013-03-26 00:00:00', '1')";
$sql_query[]="

-- ----------------------------
-- Table structure for `zz_role`
-- ----------------------------
DROP TABLE IF EXISTS `zz_role`";
$sql_query[]="
CREATE TABLE `zz_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rolename` varchar(255) DEFAULT NULL COMMENT '角色名称',
  `limit` tinyint(4) DEFAULT NULL COMMENT '权限',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8";
$sql_query[]="

-- ----------------------------
-- Records of zz_role
-- ----------------------------
INSERT INTO `zz_role` VALUES ('1', '系统管理员', '1')";
$sql_query[]="
INSERT INTO `zz_role` VALUES ('2', '实验指导老师', '1')";
$sql_query[]="
INSERT INTO `zz_role` VALUES ('3', '实验室工作人员', '1')";
$sql_query[]="
INSERT INTO `zz_role` VALUES ('4', '实验教学管理员', '1')";
$sql_query[]="
INSERT INTO `zz_role` VALUES ('5', '分管领导', '1')";
$sql_query[]="

-- ----------------------------
-- Table structure for `zz_sex`
-- ----------------------------
DROP TABLE IF EXISTS `zz_sex`";
$sql_query[]="
CREATE TABLE `zz_sex` (
  `id` tinyint(4) NOT NULL,
  `sexname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8";
$sql_query[]="

-- ----------------------------
-- Records of zz_sex
-- ----------------------------
INSERT INTO `zz_sex` VALUES ('1', '男')";
$sql_query[]="
INSERT INTO `zz_sex` VALUES ('2', '女')";
$sql_query[]="

-- ----------------------------
-- Table structure for `zz_staff`
-- ----------------------------
DROP TABLE IF EXISTS `zz_staff`";
$sql_query[]="
CREATE TABLE `zz_staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no` varchar(255) DEFAULT NULL COMMENT ' 编号',
  `name` varchar(255) DEFAULT NULL COMMENT '姓名',
  `sex` tinyint(1) DEFAULT NULL,
  `birth` datetime DEFAULT NULL COMMENT '生日',
  `title` int(11) DEFAULT NULL COMMENT '职称',
  `job` int(11) DEFAULT NULL COMMENT '工作',
  `major` int(11) DEFAULT NULL COMMENT '专业',
  `college` int(11) DEFAULT NULL COMMENT '学院',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8";
$sql_query[]="

-- ----------------------------
-- Records of zz_staff
-- ----------------------------
INSERT INTO `zz_staff` VALUES ('1', '7001', '潘伟', '1', '2013-03-01 00:00:00', '2', '1', '1', '1')";
$sql_query[]="
INSERT INTO `zz_staff` VALUES ('3', '7003', '赖晓枫', '1', '2013-03-01 00:00:00', '2', '1', '1', '1')";
$sql_query[]="
INSERT INTO `zz_staff` VALUES ('4', '7004', '贺春林', '1', '2013-03-01 00:00:00', '3', '1', '1', '1')";
$sql_query[]="
INSERT INTO `zz_staff` VALUES ('5', '7005', '张老师', '1', '2013-03-05 00:00:00', '1', '1', '1', '1')";
$sql_query[]="
INSERT INTO `zz_staff` VALUES ('6', '7006', '陈华月', '2', '2013-03-01 00:00:00', '1', '1', '1', '1')";
$sql_query[]="
INSERT INTO `zz_staff` VALUES ('7', 's007', '蒲斌', '1', '2013-03-06 00:00:00', '1', '1', '1', '1')";
$sql_query[]="
INSERT INTO `zz_staff` VALUES ('8', 's008', '李薇', '2', '2013-03-07 00:00:00', '1', '1', '1', '1')";
$sql_query[]="

-- ----------------------------
-- Table structure for `zz_stu`
-- ----------------------------
DROP TABLE IF EXISTS `zz_stu`";
$sql_query[]="
CREATE TABLE `zz_stu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stuno` varchar(255) NOT NULL COMMENT '学号',
  `stuname` varchar(255) NOT NULL COMMENT '学生姓名',
  `password` varchar(255) DEFAULT NULL COMMENT '密码',
  `sex` tinyint(2) DEFAULT NULL COMMENT '性别',
  `birth` datetime DEFAULT NULL COMMENT '出生日期',
  `idcard` varchar(20) NOT NULL COMMENT '身份证号',
  `classno` varchar(20) NOT NULL COMMENT '班级  形式如201005  201004 201003',
  `college` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=248 DEFAULT CHARSET=utf8";
$sql_query[]="

-- ----------------------------
-- Records of zz_stu
-- ----------------------------
INSERT INTO `zz_stu` VALUES ('1', '201013340549', '祝君', '670b14728ad9902aecba32e22fa4f6bd', '1', '2013-03-25 13:04:29', '513401199201286431', '201005', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('2', '201013340501', '陈敏', '670b14728ad9902aecba32e22fa4f6bd', '1', '2013-03-01 00:00:00', '513401199201015568', '201005', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('3', '201013340502', '陈珊珊', '670b14728ad9902aecba32e22fa4f6bd', '2', '2013-03-01 00:00:00', '513401199201386411', '201005', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('4', '201013340401', '熊国柱', '670b14728ad9902aecba32e22fa4f6bd', '1', '1992-01-01 00:00:00', '51340119920111111', '201004', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('5', '201013340402', '毕嘉生', '670b14728ad9902aecba32e22fa4f6bd', '1', '2013-03-06 00:00:00', '51340111111', '201004', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('6', '201013340403', '聪聪', '670b14728ad9902aecba32e22fa4f6bd', '1', '2013-03-08 00:00:00', '513401199201286488', '201004', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('7', '201013340301', '尹启超', '670b14728ad9902aecba32e22fa4f6bd', '1', '2013-03-13 00:00:00', '5134000000', '201003', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('8', '201013340302', '书圣', '670b14728ad9902aecba32e22fa4f6bd', '1', '2013-03-07 00:00:00', '513400000', '201003', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('9', '201013340303', '黄晓丽', '670b14728ad9902aecba32e22fa4f6bd', '2', '2013-03-06 00:00:00', '51340000000', '201003', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('10', '2010133405010', '胡建梅', '670b14728ad9902aecba32e22fa4f6bd', '2', '2013-03-06 00:00:00', '513400000', '201005', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('11', '201013340649', '杨超', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '513401199201286431', '201006', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('12', '201013340648', '李薇', '670b14728ad9902aecba32e22fa4f6bd', '2', null, '513401199201286431', '201006', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('13', '201013340647', '梅梅', '670b14728ad9902aecba32e22fa4f6bd', '2', null, '513401199201286431', '201006', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('14', '201013340646', '张伟', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '513401199201286431', '201006', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('15', '201013340645', '李南洋', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '513401199201286431', '201006', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('132', '201113240601 ', '陈柳霖 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201106', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('133', '201113240602 ', '陈牧 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201106', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('134', '201113240603 ', '陈秋琦 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201106', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('135', '201113240604 ', '陈志婷 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201106', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('136', '201113240605 ', '邓敏 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201106', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('137', '201113240606 ', '邓小蓉 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201106', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('138', '201113240607 ', '杜连星 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201106', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('139', '201113240608 ', '段伟 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201106', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('140', '201113240609 ', '韩霄 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201106', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('141', '201113240610 ', '何启泠 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201106', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('142', '201113240611 ', '何颖 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201106', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('143', '201113240614 ', '胡陆连 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201106', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('144', '201113240615 ', '黄健松 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201106', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('145', '201113240616 ', '黄静 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201106', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('146', '201113240618 ', '吉差阿衣 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201106', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('147', '201113240619 ', '姜昀欣 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201106', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('148', '201113240620 ', '李联均 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201106', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('149', '201113240621 ', '李旗 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201106', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('150', '201113240622 ', '李晓宇 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201106', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('151', '201113240625 ', '廖雪 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201106', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('152', '201113240626 ', '刘秋菊 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201106', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('153', '201113240627 ', '马云 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201106', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('154', '201113240628 ', '彭怀 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201106', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('155', '201113240629 ', '宋祥 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201106', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('156', '201113240630 ', '苏正华 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201106', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('157', '201113240631 ', '王庆庆 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201106', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('158', '201113240633 ', '熊梅 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201106', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('159', '201113240634 ', '徐齐宏 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201106', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('160', '201113240635 ', '徐雅兰 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201106', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('161', '201113240636 ', '严永秀 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201106', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('162', '201113240637 ', '杨阳 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201106', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('163', '201113240638 ', '雍松 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201106', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('164', '201113240639 ', '张晓玲 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201106', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('165', '201113240640 ', '张雪莲 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201106', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('166', '201113240641 ', '赵得志 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201106', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('167', '201113240642 ', '赵圳 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201106', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('168', '201113240643 ', '周娟 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201106', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('169', '201108341118 ', '廖飞云 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201106', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('170', '201109240601 ', '陈棵 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201106', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('171', '201113240501 ', '陈华 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201105', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('172', '201113240502 ', '陈烨杰 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201105', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('173', '201113240503 ', '程羽雕 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201105', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('174', '201113240504 ', '邓燕 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201105', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('175', '201113240506 ', '范冬梅 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201105', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('176', '201113240507 ', '伏廷伟 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201105', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('177', '201113240508 ', '傅婷 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201105', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('178', '201113240510 ', '黄家友 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201105', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('179', '201113240511 ', '黄旭 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201105', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('180', '201113240512 ', '蒋雷 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201105', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('181', '201113240513 ', '赖健 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201105', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('182', '201113240514 ', '李倩宇 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201105', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('183', '201113240515 ', '廖春梅 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201105', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('184', '201113240516 ', '刘洁 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201105', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('185', '201113240518 ', '刘婷 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201105', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('186', '201113240519 ', '刘燕 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201105', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('187', '201113240520 ', '牟晓楠 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201105', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('188', '201113240521 ', '苏明香 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201105', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('189', '201113240522 ', '苏杨 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201105', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('190', '201113240523 ', '孙臣枢 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201105', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('191', '201113240524 ', '唐龙 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201105', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('192', '201113240525 ', '陶茂林 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201105', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('193', '201113240526 ', '滕得阳 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201105', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('194', '201113240527 ', '王杰 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201105', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('195', '201113240528 ', '肖雷 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201105', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('196', '201113240529 ', '熊绍楠 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201105', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('197', '201113240530 ', '熊栩 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201105', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('198', '201113240531 ', '薛帅宁 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201105', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('199', '201113240532 ', '闫登卫 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201105', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('200', '201113240533 ', '尹娇 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201105', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('201', '201113240534 ', '游蕾 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201105', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('202', '201113240535 ', '余骁 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201105', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('203', '201113240536 ', '曾祥 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201105', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('204', '201113240538 ', '张筱彤 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201105', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('205', '201113240539 ', '张颖 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201105', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('206', '201113240540 ', '郑月 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201105', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('207', '201113240541 ', '周佳 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201105', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('208', '201113240542 ', '周腊梅 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201105', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('209', '201113240543 ', '周婷 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201105', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('210', '201113340414 ', '李平 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201107', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('211', '201113140222 ', '王博生 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201107', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('212', '201113440701 ', '曹欢 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201107', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('213', '201113440702 ', '陈浩 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201107', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('214', '201113440703 ', '陈静 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201107', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('215', '201113440704 ', '陈宇洋 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201107', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('216', '201113440705 ', '陈雨佳 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201107', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('217', '201113440706 ', '邓燚 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201107', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('218', '201113440707 ', '段汶伯 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201107', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('219', '201113440708 ', '樊政国 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201107', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('220', '201113440709 ', '龚琪琳 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201107', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('221', '201113440710 ', '郭孟坤 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201107', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('222', '201113440711 ', '何茂琼 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201107', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('223', '201113440713 ', '雷小武 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201107', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('224', '201113440714 ', '李强 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201107', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('225', '201113440715 ', '李小刚 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201107', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('226', '201113440716 ', '连泽湖 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201107', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('227', '201113440717 ', '刘星 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201107', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('228', '201113440718 ', '卢林 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201107', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('229', '201113440719 ', '孙涛 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201107', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('230', '201113440720 ', '汪婷婷 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201107', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('231', '201113440721 ', '王婷 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201107', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('232', '201113440722 ', '温荣超 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201107', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('233', '201113440723 ', '文强 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201107', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('234', '201113440724 ', '向红梅 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201107', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('235', '201113440725 ', '肖淇 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201107', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('236', '201113440726 ', '许彩灵 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201107', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('237', '201113440727 ', '晏世凯 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201107', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('238', '201113440728 ', '杨涵 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201107', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('239', '201113440729 ', '杨杰 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201107', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('240', '201113440730 ', '袁霞 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201107', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('241', '201113440731 ', '曾浩 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201107', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('242', '201113440732 ', '张开林 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201107', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('243', '201113440734 ', '张人仁 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201107', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('244', '201113440735 ', '张睿 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201107', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('245', '201113440736 ', '赵思思 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201107', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('246', '201113440739 ', '周欣 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201107', '1')";
$sql_query[]="
INSERT INTO `zz_stu` VALUES ('247', '201113440740 ', '朱玲玉 ', '670b14728ad9902aecba32e22fa4f6bd', '1', null, '512928199000000000', '1324201107', '1')";
$sql_query[]="

-- ----------------------------
-- Table structure for `zz_term`
-- ----------------------------
DROP TABLE IF EXISTS `zz_term`";
$sql_query[]="
CREATE TABLE `zz_term` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `termname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8";
$sql_query[]="

-- ----------------------------
-- Records of zz_term
-- ----------------------------
INSERT INTO `zz_term` VALUES ('1', '无')";
$sql_query[]="
INSERT INTO `zz_term` VALUES ('2', '2013/2104 上学期')";
$sql_query[]="
INSERT INTO `zz_term` VALUES ('3', '2013/2104 下学期')";
$sql_query[]="
INSERT INTO `zz_term` VALUES ('4', '2014/2015 上学期')";
$sql_query[]="
INSERT INTO `zz_term` VALUES ('5', '2014/2015 下学期')";
$sql_query[]="
INSERT INTO `zz_term` VALUES ('6', '2015/2016 上学期')";
$sql_query[]="
INSERT INTO `zz_term` VALUES ('7', '2015/2016 下学期')";
$sql_query[]="
INSERT INTO `zz_term` VALUES ('8', '2016/2017 上学期')";
$sql_query[]="
INSERT INTO `zz_term` VALUES ('9', '2016/2017 下学期')";
$sql_query[]="
INSERT INTO `zz_term` VALUES ('10', '2017/2018 上学期')";
$sql_query[]="

-- ----------------------------
-- Table structure for `zz_title`
-- ----------------------------
DROP TABLE IF EXISTS `zz_title`";
$sql_query[]="
CREATE TABLE `zz_title` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titlename` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8";
$sql_query[]="

-- ----------------------------
-- Records of zz_title
-- ----------------------------
INSERT INTO `zz_title` VALUES ('1', '讲师')";
$sql_query[]="
INSERT INTO `zz_title` VALUES ('2', '教授')";
$sql_query[]="
INSERT INTO `zz_title` VALUES ('3', '副教授')";
$sql_query[]="

-- ----------------------------
-- Table structure for `zz_user`
-- ----------------------------
DROP TABLE IF EXISTS `zz_user`";
$sql_query[]="
CREATE TABLE `zz_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staffid` int(11) NOT NULL COMMENT 'staff中对应得id',
  `username` varchar(255) NOT NULL COMMENT '登陆系统的用户名',
  `userpass` varchar(255) NOT NULL COMMENT '登陆系统的密码',
  `state` tinyint(4) NOT NULL COMMENT '账号的状态',
  `role` tinyint(4) NOT NULL COMMENT '账户的角色',
  `coumt` int(11) DEFAULT NULL COMMENT '登陆次数',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8";
$sql_query[]="

-- ----------------------------
-- Records of zz_user
-- ----------------------------
INSERT INTO `zz_user` VALUES ('1', '1', 'pan', 'e10adc3949ba59abbe56e057f20f883e', '1', '1', '1')";
$sql_query[]="
INSERT INTO `zz_user` VALUES ('2', '3', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '1', '1', '1')";
$sql_query[]="
INSERT INTO `zz_user` VALUES ('3', '4', 'hechun', 'e10adc3949ba59abbe56e057f20f883e', '1', '4', '1')";
$sql_query[]="
INSERT INTO `zz_user` VALUES ('4', '5', 'zhang', 'e10adc3949ba59abbe56e057f20f883e', '1', '3', '1')";
$sql_query[]="
INSERT INTO `zz_user` VALUES ('5', '6', 'chenhuayue', 'e10adc3949ba59abbe56e057f20f883e', '1', '2', null)";
$sql_query[]="
INSERT INTO `zz_user` VALUES ('6', '7', 'pu', 'e10adc3949ba59abbe56e057f20f883e', '1', '2', null)";
$sql_query[]="
INSERT INTO `zz_user` VALUES ('7', '8', 'liwei', 'e10adc3949ba59abbe56e057f20f883e', '1', '2', null)";
$sql_query[]="
";
?>
