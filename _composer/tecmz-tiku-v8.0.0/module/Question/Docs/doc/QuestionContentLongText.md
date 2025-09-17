# 题库系统遇到内容或答案超长自动截断调整

---

题库系统中问题内容使用的是 MySQL 的 varchar(2000) 字段存储，该字段最多会存储 2000 个字符（汉字占三个字符）。

在遇到问题或答案超长时，会自动截断调整。可通过以下 MySQL 来调整字段类型来适应更多的字符。

```sql
## 问题
ALTER TABLE `question` MODIFY `question` TEXT;
## 答案
ALTER TABLE `question_answer` MODIFY `answer` TEXT;
## 答案解析
ALTER TABLE `question_analysis` MODIFY `analysis` TEXT;
```
