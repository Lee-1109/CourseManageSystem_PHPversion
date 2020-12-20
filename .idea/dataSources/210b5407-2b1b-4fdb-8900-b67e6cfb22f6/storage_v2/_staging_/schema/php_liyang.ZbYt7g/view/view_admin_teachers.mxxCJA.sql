create view view_admin_teachers as
select `d`.`Did` AS `Did`, ``d`.`Dname` AS `Dname`, `t`.`Tid` AS `Tid`, `t`.`Tname` AS `Tname`, `t`.`Salary` AS `Salary`
from `php_liyang`.`teachers` `t`
         join `php_liyang`.`departments` `d`
where (`t`.`Did` = `d`.`Did`);

