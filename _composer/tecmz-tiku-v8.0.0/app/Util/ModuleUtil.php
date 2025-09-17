<?php
/**
 * ------------------------ 
 *  版权所有  www.tecmz.com
 *  商业版本请购买正版授权使用
 * ------------------------
*/ namespace App\Util; use Module\Paper\Util\PaperExamUtil; use Module\Question\Util\QuestionUtil; use Module\VipArticle\Util\VipArticleUtil; class ModuleUtil { public static function searchItems() { goto UxQdM; UxQdM: $NShrk = array(); goto BdVMG; Xu3uT: if (VipArticleUtil::isEnable()) { $NShrk[] = '付费内容'; } goto laBgu; BdVMG: if (QuestionUtil::isEnable()) { $NShrk[] = '题目'; } goto z50sH; z50sH: if (PaperExamUtil::isEnable()) { $NShrk[] = '试卷'; } goto Xu3uT; laBgu: return $NShrk; goto URAWY; URAWY: } }