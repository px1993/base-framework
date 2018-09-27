<?php
/**
 * Created by PhpStorm.
 * User: panxin
 * Date: 2018/9/26 0026
 * Time: 18:22
 */
create table if not exists `goods` (
    `goods_id` int(10) unsigned  not null auto_increment,
    `goods_name` varchar(200) not null default '',
    primary key (`goods_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品表';

insert into `goods` (`goods_name`) values ('测试商品');