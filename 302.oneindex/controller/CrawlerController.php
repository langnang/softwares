<?php
define('VIEW_PATH', ROOT . 'view/admin/');

use QL\QueryList;


class CrawlerModel
{
  public $name;
  public $slug;
  public $domains = [];
  public $scan_urls = [];
  public $collect_scan_urls_num = 0;
  public $collected_scan_urls_num = 0;
  public $list_url_regexes = [];
  public $collect_list_urls_num = 0;
  public $collected_list_urls_num = 0;
  public $content_url_regexes = [];
  public $collect_content_urls_num = 0;
  public $collected_content_urls_num = 0;
  public $download_url_regexes = [];
  // public $collect_download_urls = [];
  public $collect_download_urls_num = 0;
  public $collected_download_urls_num = 0;
  public $collected_fields_urls_num = 0;
  public $fields = [];
  function __construct($vars = [])
  {
    $this->name = (string)trim($vars['name']);
    $this->slug = (string)trim($vars['slug']);
    $this->domains = (array)$vars['domains'];
    $this->scan_urls = (array)$vars['scan_urls'];
    $this->collect_scan_urls_num = sizeof($this->scan_urls);
    $this->collected_scan_urls_num = (int)$vars['collected_scan_urls_num'];
    $this->list_url_regexes = is_string($vars['list_url_regexes']) ? explode("\n", $vars['list_url_regexes']) : $vars['list_url_regexes'];
    $this->collect_list_urls_num = (int)$vars['collect_list_urls_num'];
    $this->collected_list_urls_num = (int)$vars['collected_list_urls_num'];
    $this->content_url_regexes = is_string($vars['content_url_regexes']) ? explode("\n", $vars['content_url_regexes']) : $vars['content_url_regexes'];
    $this->collect_content_urls_num = (int)$vars['collect_content_urls_num'];
    $this->collected_content_urls_num = (int)$vars['collected_content_urls_num'];
    $this->download_url_regexes = is_string($vars['download_url_regexes']) ? explode("\n", $vars['download_url_regexes']) : $vars['download_url_regexes'];
    $this->collect_download_urls_num = (int)$vars['collect_download_urls_num'];
    $this->collected_download_urls_num = (int)$vars['collected_download_urls_num'];
    $this->collected_fields_urls_num = (int)$vars['collected_fields_urls_num'];
    $fields = [];
    foreach (array_map(function ($item) {
      return substr($item, strlen('field_name_'));
    }, array_filter(array_keys($vars), function ($name) {
      return stripos($name, 'field_name') === 0;
    })) as $i) {
      array_push($fields, [
        "name" => $vars['field_name_' . $i],
        "label" => $vars['field_label_' . $i],
        "find" => $vars['field_find_' . $i],
        "func" => $vars['field_func_' . $i],
        "args" => $vars['field_args_' . $i],
        "down" => $vars['field_down_' . $i]
      ]);
    }
    // $this->fields = array_map(function ($item) {
    //   return new CrawlerFieldModel($item);
    // }, array_merge((array)$vars['fields'], $fields));
  }
  function is_domain_url($url)
  {
    // 字符串
    if (!is_string($url)) return false;
    $url_parse = parse_url($url);
    // 协议
    if (!empty($url_parse['scheme']) && !in_array($url_parse['scheme'], ['http', 'https'])) return false;
    // 域名为空
    if (empty($url_parse['host'])) {
      return true;
    }
    return in_array(parse_url($url)['host'], $this->domains);
  }
  function is_list_url($url, $collect_list_urls = [])
  {
    if (!is_string($url)) return false;
    foreach ($this->list_url_regexes as $list_url_regex) {
      $list_url_regex_parse = parse_url($list_url_regex);
      $list_url_regex = "/^" . $list_url_regex_parse["scheme"] . ":\/\/" . preg_quote($list_url_regex_parse["host"]) . "\\" . $list_url_regex_parse["path"] . "$/";
      if (preg_match($list_url_regex, $url) && !in_array($url, $collect_list_urls)) {
        return true;
      }
    }
    return false;
  }
  function is_content_url($url, $collect_content_urls = [])
  {
    if (!is_string($url)) return false;
    foreach ($this->content_url_regexes as $content_url_regex) {
      $content_url_regex_parse = parse_url($content_url_regex);
      $content_url_regex = "/" . $content_url_regex_parse["scheme"] . ":\/\/" . preg_quote($content_url_regex_parse["host"]) . "\\" . $content_url_regex_parse["path"] . "/";
      if (preg_match($content_url_regex, $url) && !in_array($url, $collect_content_urls)) {
        return true;
      }
    }
    return false;
  }
  function get_html($url)
  {
    global $filesystem;
    $path = "/upload/.crawler/{$this->slug}/html/" . parse_url($url)['path'];
    try {
      if ($filesystem->fileExists($path)) {
        echo "<script>console.log('[Cache] {$path}');</script>";
        flush();
        $html = QueryList::html($filesystem->read($path));
      } else {
        echo "<script>console.log('[Request] {$url}');</script>";
        flush();
        $html = QueryList::get($url);
        $filesystem->write($path, $html->getHtml());
      }
    } catch (Exception $e) {
      echo "<script>console.warn('[Fail Request] '+{$e->getMessage()});</script>";
      flush();
      return false;
    }

    return $html;
  }
  function get_content_fields($html)
  {
    // 
    if (empty($html)) return false;
    $content = [];
    try {
      foreach ($this->fields as $field) {
        if (!empty($field->find)) {
          if (!empty($field->args)) {
            $value = $html->find($field->find)->{$field->func}($field->args);
          } else {
            $value = $html->find($field->find)->{$field->func}();
          }
          // 适用下载URL正则
          // if (!empty($field->down)) {
          //   foreach ($this->info->download_url_regexes as $download_url_regex) {
          //     $download_url_regexes = parse_url($download_url_regex);
          //     $download_url_regex = "/" . $download_url_regexes["scheme"] . ":\/\/" . preg_quote($download_url_regexes["host"]) . "\\" . $download_url_regexes["path"] . "/";
          //     if (is_array($value) || is_object($value)) {
          //       foreach (array_values($value) as $item) {
          //         $this->match_download_url($item);
          //       }
          //     } else {
          //       $this->match_download_url($value);
          //     }
          //   }
          // }
          $content[$field->name] = $value;
        }
      }
    } catch (Exception $e) {
      return false;
    }
    return $content;
  }
}
class CrawlerFieldModel
{
  public $name;
  public $label;
  public $find;
  public $func;
  public $args;
  public $is_download;
  function __construct($vars = [])
  {
    $this->name = (string)$vars['name'];
    $this->label = (string)$vars['label'];
    $this->find = (string)$vars['find'];
    $this->func = (string)$vars['func'];
    $this->args = (string)$vars['args'];
    $this->is_download = (bool)$vars['is_download'];
  }
}
class CrawlerController
{
  // 单项任务
  private $info;
  // 激活的任务
  private $active;
  // 任务列表
  private $list = [];
  // 缓存文件保存目录
  private $path = "/upload/.crawler";
  // 缓存页面保存目录
  private $path_collected_content = "/collected_contents";

  // 已请求的入口URL
  private $file_collected_scan = "collected_scan_urls.txt";
  // public $collect_scan_urls = [];

  // 匹配的列表URL
  private $file_collect_list = "collect_list_urls.txt";
  // 已请求的列表URL
  private $file_collected_list = "collected_list_urls.txt";
  // public $collect_list_urls = [];

  // 匹配的内容URL
  private $file_collect_content = "collect_content_urls.txt";
  // 已请求的内容URL
  private $file_collected_content = "collected_content_urls.txt";
  // public $collect_content_urls = [];

  // 已抽取的数据保存文件
  private $file_collected_field = "collected_content_fields.csv";
  // public $collected_fields_urls = [];

  // 匹配的下载URL
  private $file_collect_download = "collect_download_urls";
  // 已请求的下载URL
  private $file_collected_download = "collected_download_urls";

  function __construct($slug = null)
  {
    $list = (array)config('@crawler');
    $this->list = array_reduce($list, function ($total, $item) use ($list) {
      $slug = $item['slug'];
      $total[$slug] = new CrawlerModel($list[$slug]);
      return $total;
    }, []);
    if (!empty($slug) && isset($this->list[$slug])) {
      $this->info = $this->list[$slug];
      $this->info->slug = $slug;
    }
  }
  // 页面
  function index()
  {
    var_dump($_POST);
    $item = [];
    global $filesystem;
    // 新增任务
    if (!empty($_POST['add_task'])) {
      $this->info = new CrawlerModel();
      var_dump($this->info);
    }
    // 删除任务 
    else if (!empty($_POST['delete_task'])) {
      unset($this->list[$_POST['delete_task']]);
      config('@crawler', json_decode(json_encode($this->list), true));
    }
    // 编辑任务 
    else if (!empty($_POST['edit_task'])) {
      $this->__construct($_POST['edit_task']);
    }
    // 保存规则：新增、编辑 
    else if (!empty($_POST['save_task'])) {
      if (empty(trim($_POST['name']))) {
        $message = "任务名称不可为空";
        $_POST['add_task'] = $_POST['add_task'];
        $_POST['edit_task'] = $_POST['edit_task'];
        $this->info = new CrawlerModel($_POST);
      } else if (!preg_match('/^[0-9a-zA-Z_-]+$/', trim($_POST['slug']))) {
        $message = "任务缩略名不可为空，且只能输入数字、字母、下划线";
        $_POST['add_task'] = $_POST['add_task'];
        $_POST['edit_task'] = $_POST['edit_task'];
        $this->info = new CrawlerModel($_POST);
      } else {
        $this->info = new CrawlerModel($_POST);
        // 检验旧的缩略名，有则删除，已便于替换成保存的
        if (isset($_POST['old_slug']) && $_POST['old_slug'] != $_POST['slug']) {
          unset($this->list[$_POST['old_slug']]);
        }
        $this->list[$_POST['slug']] = $this->info;
        $this->info = [];
        config('@crawler', json_decode(json_encode($this->list), true));
      }
    }
    // 新增规则
    else if (!empty($_POST['add_field'])) {
      $this->info = new CrawlerModel($_POST);
      array_push($this->info->fields, new CrawlerFieldModel());
    }
    // 删除规则 
    else if (isset($_POST['delete_field'])) {
      unset($_POST['field_name_' . $_POST['delete_field']]);
      unset($_POST['field_label_' . $_POST['delete_field']]);
      unset($_POST['field_find_' . $_POST['delete_field']]);
      unset($_POST['field_func_' . $_POST['delete_field']]);
      unset($_POST['field_args_' . $_POST['delete_field']]);
      unset($_POST['field_down_' . $_POST['delete_field']]);
      $this->info = new CrawlerModel($_POST);
    }
    // 删除所有缓存文件
    else if (!empty($_POST['empty_task'])) {
      try {
        $filesystem->deleteDirectory($this->path . "/{$_POST['empty_task']}");
        $this->list[$_POST['empty_task']]->collected_scan_urls_num = 0;
        $this->list[$_POST['empty_task']]->collect_list_urls_num = 0;
        $this->list[$_POST['empty_task']]->collected_list_urls_num = 0;
        $this->list[$_POST['empty_task']]->collect_content_urls_num = 0;
        $this->list[$_POST['empty_task']]->collected_content_urls_num = 0;
        $this->list[$_POST['empty_task']]->collected_fields_urls_num = 0;
        $this->save_config();
      } catch (Exception $e) {
        $message = $e->getMessage();
      }
    }
    // 清除缓存文件：已请求的入口页URL
    else if (!empty($_POST['empty_collected_scan'])) {
      try {
        $this->list[$_POST['empty_collected_scan']]->collected_scan_urls_num = 0;
        $filesystem->delete($this->path . "/{$_POST['empty_collected_scan']}/{$this->file_collected_scan}");
        $this->save_config();
      } catch (Exception $e) {
        $message = $e->getMessage();
      }
    }
    // 清除缓存文件：已请求的列表页URL
    else if (!empty($_POST['empty_collected_list'])) {
      try {
        $this->list[$_POST['empty_collected_list']]->collected_list_urls_num = 0;
        $filesystem->delete($this->path . "/{$_POST['empty_collected_list']}/{$this->file_collected_list}");
        $this->save_config();
      } catch (Exception $e) {
        $message = $e->getMessage();
      }
    }
    // 清除缓存文件：已请求的内容页URL
    else if (!empty($_POST['empty_collected_content'])) {
      try {
        $this->list[$_POST['empty_collected_content']]->collected_content_urls_num = 0;
        $filesystem->delete($this->path . "/{$_POST['empty_collected_content']}/{$this->file_collected_content}");
        $this->save_config();
      } catch (Exception $e) {
        $message = $e->getMessage();
      }
    }
    // 清除缓存文件：已抽取的规则数据
    else if (!empty($_POST['empty_collected_fields'])) {
      try {
        $filesystem->delete($this->path . "/{$_POST['empty_collected_fields']}/{$this->file_collected_field}");
      } catch (Exception $e) {
        $message = $e->getMessage();
      }
    } else {
      // 获取所有任务详情
      // foreach ($this->list as $slug => $details) {
      //   $this->list[$slug] = $this->get_details($slug);
      // }
    }
    return view::load('crawler')->with('list', $this->list)->with('info', $this->info)->with('message', $message);
  }

  function convert_received_data($data = null)
  {
    if (empty($data)) $data = $_POST;
  }
  // 获取任务详情
  private function get_details($slug)
  {
    // 校验缩略名
    if (!isset($this->list[$slug])) return;
    global $filesystem;
    $details = [];
    $info = $this->list[$slug];
    $details['path'] = $this->path . "/$slug";
    // 检测文件夹是否存在，不存在则创建
    if (!$filesystem->fileExists($details['path'])) {
      $filesystem->createDirectory($details['path']);
    }
    if (!$filesystem->fileExists($details['path'] . "/html")) {
      $filesystem->createDirectory($details['path'] . "/html");
    }
    $details['collect_scan_urls'] = $info->scan_urls;

    // 待请求列表页的 url
    $details['collect_list_urls'] = [];
    if ($filesystem->fileExists($details['path'] . "/collect_list_urls.txt")) {
      $details['collect_list_urls'] = explode("\n", $filesystem->read($details['path'] . "/collect_list_urls.txt"));
    }

    // 待请求内容页的 url
    $details['collect_content_urls'] = [];
    if ($filesystem->fileExists($details['path'] . "/collect_content_urls.txt")) {
      $details['collect_content_urls'] = explode("\n", $filesystem->read($details['path'] . "/collect_content_urls.txt"));
    }
    $details['collected_content_urls_num'] = 0;
    if ($filesystem->fileExists($details['path'] . "/collected_content_urls.txt")) {
      $details['collected_content_urls'] = explode("\n", $filesystem->read($details['path'] . "/collected_content_urls.txt"));
    }
    // 已抽取内容页
    $details['collected_content_fields'] = [];
    if ($filesystem->fileExists($details['path'] . "/collected_content_fields.json")) {
      $details['collected_content_fields'] = json_decode($filesystem->read($details['path'] . "/collected_content_fields.json"), true);
    }
    // $this->info->collected_fields_urls_num = sizeof($details['collected_content_fields']);
    // // 可下载链接
    // $details['collect_download_urls'] = [];
    // if (file_exists(__DIR__ . $details['path'] . "/" . $this->file_collect_download)) {
    //   $details['collect_download_urls'] = explode("\n", file_get_contents(__DIR__ . $details['path'] . "/" . $this->file_collect_download));
    // }
    $this->save_config($details);
    return $details;
  }
  /**
   * 保存文件
   */
  function save_config($details = null)
  {
    if (!empty($details)) {
      global $filesystem;
      // collected_scan_urls
      $filesystem->write("{$details['path']}/collected_scan_urls.txt", implode("\n", array_slice($details['collect_scan_urls'], 0, $this->info->collected_scan_urls_num)));
      echo "<script>$('[name=collected_scan_urls][task-name={$this->info->slug}]').text(" . ($this->info->collected_scan_urls_num) . ")</script>";
      // collect_list_urls
      $this->info->collect_list_urls_num = sizeof($details['collect_list_urls']);
      $filesystem->write("{$details['path']}/collect_list_urls.txt", implode("\n", $details['collect_list_urls']));
      echo "<script>$('[name=collect_list_urls][task-name={$this->info->slug}]').text({$this->info->collect_list_urls_num})</script>";
      // collected_list_urls
      $filesystem->write("{$details['path']}/collected_list_urls.txt", implode("\n", array_slice($details['collect_list_urls'], 0, $this->info->collected_list_urls_num)));
      echo "<script>$('[name=collected_list_urls][task-name={$this->info->slug}]').text({$this->info->collected_list_urls_num})</script>";
      // collect_content_urls
      $this->info->collect_content_urls_num = sizeof($details['collect_content_urls']);
      $filesystem->write("{$details['path']}/collect_content_urls.txt", implode("\n", $details['collect_content_urls']));
      echo "<script>$('[name=collect_content_urls][task-name={$this->info->slug}]').text({$this->info->collect_content_urls_num})</script>";
      // collected_content_urls
      $filesystem->write("{$details['path']}/collected_content_urls.txt", implode("\n", array_slice($details['collect_content_urls'], 0, $this->info->collected_content_urls_num)));
      echo "<script>$('[name=collected_content_urls][task-name={$this->info->slug}]').text({$this->info->collected_content_urls_num})</script>";
      // collected_content_fields
      $this->info->collected_content_fields_num = sizeof($details['collected_content_fields']);
      $filesystem->write("{$details['path']}/collected_content_fields.json", json_encode($details['collected_content_fields'], true));
      echo "<script>$('[name=collected_content_fields][task-name={$this->info->slug}]').text(" . $this->info->collected_content_fields_num . ")</script>";

      // 
      flush();
    }
    if (!empty($this->info)) {
      $this->list[$this->info->slug] = $this->info;
    }
    config('@crawler', json_decode(json_encode($this->list, JSON_UNESCAPED_UNICODE), true));
  }
  /**
   * 启动爬虫任务
   * @param slug 任务缩略名
   */
  function start($slug)
  {
    // var_dump($slug);
    if (!isset($this->list[$slug])) return;
    $this->info = $this->list[$slug];
    // var_dump($this->info);

    require_once __DIR__ . '/PhpSpider.php';
    $spider = new PhpSpider((array)$this->info);
    // var_dump($spider);

    $spider->on_status_code = function ($status_code, $url, $content, $spider) {
      // var_dump([
      //   "collect_urls_num" => $spider::$collect_urls_num,
      //   "collected_urls_num" => $spider::$collected_urls_num,
      //   "collect_scan_urls_num" => $spider::$collect_scan_urls_num,
      //   "collected_scan_urls_num" => $spider::$collected_scan_urls_num,
      //   "collect_list_urls_num" => $spider::$collect_list_urls_num,
      //   "collected_list_urls_num" => $spider::$collected_list_urls_num,
      //   "collect_content_urls_num" => $spider::$collect_content_urls_num,
      //   "collected_content_urls_num" => $spider::$collected_content_urls_num,
      //   "fields_num" => $spider::$fields_num,
      // ]);

      echo "<script>$('[name=collected_scan_urls][task-name={$this->info->slug}]').text({$spider::$collected_scan_urls_num})</script>";
      // collect_list_urls
      echo "<script>$('[name=collect_list_urls][task-name={$this->info->slug}]').text({$spider::$collect_list_urls_num})</script>";
      // collected_list_urls
      echo "<script>$('[name=collected_list_urls][task-name={$this->info->slug}]').text({$spider::$collected_list_urls_num})</script>";
      // collect_content_urls
      echo "<script>$('[name=collect_content_urls][task-name={$this->info->slug}]').text({$spider::$collect_content_urls_num})</script>";
      // collected_content_urls
      echo "<script>$('[name=collected_content_urls][task-name={$this->info->slug}]').text({$spider::$collected_content_urls_num})</script>";
      // collected_content_fields
      echo "<script>$('[name=collected_content_fields][task-name={$this->info->slug}]').text({$spider::$fields_num})</script>";
    };
    $spider->on_download_page = function ($page, $spider) {
      global $filesystem;
      $url_parse = parse_url($page['url']);
      $path = "/upload/.crawler/{$this->info->slug}/html/" . preg_replace("/\//", "_", $url_parse['host'] . $url_parse['path']);
      $filesystem->write($path, $page['raw']);
      return $page;
    };
    $spider->on_extract_page = function ($page, $data) {
      var_dump("on_extract_page");
      var_dump($data);
      return $data;
    };
    $spider->start();
    // var_dump($spider::$collect_urls_num);
    // (new PhpSpider((array)$this->info))->start();
    // var_dump($spider);
    // // 获取任务详情
    // $details = $this->get_details($this->info->slug);
    // var_dump($details);
    // // 隐藏页面启动按钮
    // echo "<script>$('[name=start_crawler_task][task-name={$this->info->slug}]').toggle()</script>";
    // echo "<script>console.group('[Crawler Task] {$slug}');</script>";
    // flush();
    // // 入口页
    // while ($this->info->collected_scan_urls_num < $this->info->collect_scan_urls_num) {
    //   $url = $details['collect_scan_urls'][$this->info->collected_scan_urls_num];
    //   echo "<script>console.group('[Scan Urls][{$this->info->collected_scan_urls_num}] {$url}');</script>";
    //   flush();
    //   $this->query_scan_url($url, $details);
    //   $this->info->collected_scan_urls_num++;
    //   $this->save_config($details);
    //   echo "<script>console.groupEnd();</script>";
    //   flush();
    // }

    // // 列表页
    // while ($this->info->collected_list_urls_num < $this->info->collect_list_urls_num) {
    //   $url = $details['collect_list_urls'][$this->info->collected_list_urls_num];
    //   echo "<script>console.group('[List Urls][{$this->info->collected_list_urls_num}] {$url}');</script>";
    //   flush();
    //   $this->query_scan_url($url, $details);
    //   $this->info->collected_list_urls_num++;
    //   $this->save_config($details);
    //   echo "<script>console.groupEnd();</script>";
    //   flush();
    // }
    // // 内容页
    // while ($this->info->collected_content_urls_num < $this->info->collect_content_urls_num) {
    //   $url = $details['collect_content_urls'][$this->info->collected_content_urls_num];
    //   echo "<script>console.group('[Content Urls][{$this->info->collected_content_urls_num}] {$url}');</script>";
    //   flush();
    //   $html = $this->query_scan_url($url, $details);
    //   $this->info->collected_content_urls_num++;
    //   if (!empty($html)) {
    //     $this->query_content_fields($html, $details);
    //   }
    //   $this->save_config($details);
    //   echo "<script>console.groupEnd();</script>";
    //   flush();
    // }
    // echo "<script>$('[name=start_crawler_task][task-name={$this->info->slug}]').toggle()</script>";
    // echo "<script>$('[name=stop_task][task-name={$this->info->slug}]').toggle()</script>";
    flush();
  }

  function query_scan_url($url, &$details)
  {
    $url_parse = parse_url($url);
    // 提取页面所有超链接地址
    $html = $this->info->get_html($url);
    if (empty($html)) return $html;
    $links = $html->find('a')->attrs('href')->all();
    // 过滤并重构不规范地址
    foreach ($links as $link) {
      $link_parse = parse_url($link);
      if (empty($link_parse['path'])) continue;
      // 匹配域名: 存在域名且域名不在域名数组中，结束本次循环
      if (!$this->info->is_domain_url($link)) continue;
      // if (isset($link_parse['host']) && !in_array($link_parse['host'], $this->info->domains)) return $total;
      // var_dump($link_parse);
      $link_parse["scheme"] = isset($link_parse["scheme"]) ? $link_parse["scheme"] : $url_parse['scheme'];
      $link_parse["host"] = isset($link_parse["host"]) ? $link_parse["host"] : $url_parse['host'];
      if (substr($link_parse['path'], 0, 1) !== '/') {
        $link_parse["path"] = '/' . $link_parse["path"];
      }
      $link = $link_parse["scheme"] . "://" . $link_parse["host"] . $link_parse["path"];

      if ($this->info->is_list_url($link, $details['collect_list_urls'])) {
        array_push($details['collect_list_urls'], $link);
        echo "<script>console.log('[Add List Url] {$link}');</script>";
        flush();
      }
      if ($this->info->is_content_url($link, $details['collect_content_urls'])) {
        array_push($details['collect_content_urls'], $link);
        echo "<script>console.log('[Add Contet Url] {$link}');</script>";
        flush();
      }
    }

    $details['collect_list_urls'] = array_unique($details['collect_list_urls']);
    $details['collect_content_urls'] = array_unique($details['collect_content_urls']);
    return $html;
  }
  // 匹配下载URL正则
  private function match_download_url($link)
  {
    $details = $this->info;
    foreach ($this->info->download_url_regexes as $download_url_regex) {
      $download_url_regexes = parse_url($download_url_regex);
      $download_url_regex = "/" . $download_url_regexes["scheme"] . ":\/\/" . preg_quote($download_url_regexes["host"]) . "\\" . $download_url_regexes["path"] . "/";
      if (preg_match($download_url_regex, $link) && !in_array($link, $details['collect_download_urls'])) {
        array_push($details['collect_download_urls'], $link);

        $fp = fopen(__DIR__ . "{$details['path']}/" . $this->file_collect_download, 'a'); //opens file in append mode  
        fwrite($fp, $link . "\n");
        fclose($fp);
        flush();
        break;
      }
    }
  }
  // 根据规则提取页面数据
  function query_content_fields($html, &$details)
  {
    if (empty($html)) return false;
    $content = [];
    try {
      foreach ($this->info->fields as $field) {
        if (!empty($field->find)) {
          if (!empty($field->args)) {
            $value = $html->find($field->find)->{$field->func}($field->args);
          } else {
            $value = $html->find($field->find)->{$field->func}();
          }
          // 适用下载URL正则
          // if (!empty($field->down)) {
          //   foreach ($this->info->download_url_regexes as $download_url_regex) {
          //     $download_url_regexes = parse_url($download_url_regex);
          //     $download_url_regex = "/" . $download_url_regexes["scheme"] . ":\/\/" . preg_quote($download_url_regexes["host"]) . "\\" . $download_url_regexes["path"] . "/";
          //     if (is_array($value) || is_object($value)) {
          //       foreach (array_values($value) as $item) {
          //         $this->match_download_url($item);
          //       }
          //     } else {
          //       $this->match_download_url($value);
          //     }
          //   }
          // }
          $content[$field->name] = $value;
        }
      }
    } catch (Exception $e) {
      return false;
    }
    array_push($details['collected_content_fields'], $content);
  }
}
