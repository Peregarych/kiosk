/*
Navicat PGSQL Data Transfer

Source Server         : kiosk
Source Server Version : 100500
Source Host           : localhost:5432
Source Database       : kiosk
Source Schema         : public

Target Server Type    : PGSQL
Target Server Version : 100500
File Encoding         : 65001

Date: 2018-12-03 15:55:57
*/


-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS "public"."menu";
CREATE TABLE "public"."menu" (
"id" int4 DEFAULT nextval('menu_id_seq'::regclass) NOT NULL,
"name" varchar(255) COLLATE "default" NOT NULL,
"sort" int4 NOT NULL,
"uri" varchar(255) COLLATE "default",
"level" int4 NOT NULL,
"parentId" int4 NOT NULL,
"show" bool NOT NULL,
"image" varchar(255) COLLATE "default",
"fontawesom" varchar(5) COLLATE "default"
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO "public"."menu" VALUES ('1', 'Раздел "О Вузе"', '1', '/about', '1', '0', 't', 'university.svg', null);
INSERT INTO "public"."menu" VALUES ('2', '3D-экскурсия по основным объектам и учебно-материальной базе Филиала', '2', '/3d', '1', '0', 't', '3d.svg', null);
INSERT INTO "public"."menu" VALUES ('3', 'Информация для кандидатов на обучение', '3', '/candidate', '1', '0', 't', 'student.svg', null);
INSERT INTO "public"."menu" VALUES ('4', 'Порядок обращения граждан в Рязанский филиал МосУ МВД России имени В.Я. Кикотя', '4', '/appeals', '1', '0', 't', 'information.svg', null);
INSERT INTO "public"."menu" VALUES ('5', 'Информация для курсантов и слушателей', '5', '/for_cadet', '1', '0', 't', 'calendar.svg', null);
INSERT INTO "public"."menu" VALUES ('6', 'Информация об учредительных и правоустанавливающих документах', '6', '/documents_organization', '1', '0', 't', 'document.svg', null);
INSERT INTO "public"."menu" VALUES ('7', 'История филиала', '1', '/about/history', '2', '1', 't', null, null);
INSERT INTO "public"."menu" VALUES ('8', 'Руководство', '2', '/about/employee', '2', '1', 't', null, null);
INSERT INTO "public"."menu" VALUES ('9', 'Лучшие преподаватели и обучающиеся', '3', '/about/best', '2', '1', 't', null, null);
INSERT INTO "public"."menu" VALUES ('10', 'Свидетельства об ГА', '1', '/documents_organization/ga', '2', '6', 't', null, null);
INSERT INTO "public"."menu" VALUES ('11', 'Фото лицензий', '2', '/documents_organization/license', '2', '6', 't', null, null);
INSERT INTO "public"."menu" VALUES ('12', 'Устав', '3', '/documents_organization/charter', '2', '6', 't', null, null);
INSERT INTO "public"."menu" VALUES ('13', 'Положение', '4', '/documents_organization/statement', '2', '6', 't', null, null);
INSERT INTO "public"."menu" VALUES ('14', 'Общая информация для кандидатов на поступление', '1', '/candidate/general_information', '2', '3', 't', null, null);
INSERT INTO "public"."menu" VALUES ('15', 'Правила приёма и программы ВИ и видеоматериалы', '2', '/candidate/admission_rules', '2', '3', 't', null, null);
INSERT INTO "public"."menu" VALUES ('16', 'Контактная информация комиссии, территориальных органов и горячих линий', '3', '/candidate/contacs', '2', '3', 't', null, null);
INSERT INTO "public"."menu" VALUES ('17', 'План комплектования и расписание вступительных испытаний', '4', '/candidate/picking_plan', '2', '3', 't', null, null);
INSERT INTO "public"."menu" VALUES ('18', 'Объявление результатов экзаменов', '5', '/candidate/result', '2', '3', 't', null, null);
INSERT INTO "public"."menu" VALUES ('25', 'Календарный учебный график', '1', '/for_cadet/training_schedule', '2', '5', 't', null, null);
INSERT INTO "public"."menu" VALUES ('26', 'Сводный график консультаций по кафедрам', '2', '/for_cadet/consolidated_schedule_of_consultations', '2', '5', 't', null, null);
INSERT INTO "public"."menu" VALUES ('27', 'Расписание очной формы обучения', '3', '/for_cadet/full-time_study_schedule', '2', '5', 't', null, null);
INSERT INTO "public"."menu" VALUES ('28', 'Электронный журнал', '4', '/for_cadet/electronic_journal', '2', '5', 't', null, null);
INSERT INTO "public"."menu" VALUES ('29', 'Перечень письменных работ по взводам на семестр/заезд', '5', '/for_cadet/list_of_written_works_on_platoons', '2', '5', 't', null, null);
INSERT INTO "public"."menu" VALUES ('30', 'Расписание заочной формы обучения', '6', '/for_cadet/correspondence_schedule', '2', '5', 't', null, null);

-- ----------------------------
-- Alter Sequences Owned By 
-- ----------------------------

-- ----------------------------
-- Primary Key structure for table menu
-- ----------------------------
ALTER TABLE "public"."menu" ADD PRIMARY KEY ("id");
