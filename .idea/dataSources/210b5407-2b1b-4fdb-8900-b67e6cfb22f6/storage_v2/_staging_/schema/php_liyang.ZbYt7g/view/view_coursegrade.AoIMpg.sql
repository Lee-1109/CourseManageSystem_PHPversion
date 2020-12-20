create view view_coursegrade as
select `c`.`courseID`    AS `courseID`,
       `c`.`courseName`  AS `courseName`,
        `t`.`teacherID` as `teacherID`,
       `t`.`teacherName` as `teacherName`,
        `s`.`classID`      AS `classID`,
       `s`.`studentID`   AS `studentID`,
       `s`.`studentName` AS `studentName`,
       `g`.`grade`       AS `grade`

from `php_liyang`.`courses` `c`
         join `php_liyang`.`grades` `g`
         join `php_liyang`.`students` `s`
        join `php_liyang`.`teachers` `t`
where ((`c`.`courseID` = `g`.`courseID`) and (`g`.`studentID` = `s`.`studentID`) and `t`.teacherID=``);

