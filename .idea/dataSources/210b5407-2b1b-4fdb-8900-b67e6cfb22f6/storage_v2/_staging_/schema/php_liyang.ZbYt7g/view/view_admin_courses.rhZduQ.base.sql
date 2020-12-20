create definer = root@localhost view view_admin_courses as
select `php_liyang`.`courses`.`Cid`    AS `Cid`,
       `php_liyang`.`courses`.`Cname`  AS `Cname`,
       `php_liyang`.`courses`.`Credit` AS `Credit`,
       `php_liyang`.`courses`.`Ctime`  AS `Ctime`
from `php_liyang`.`courses`;

