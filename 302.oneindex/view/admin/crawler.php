<?php view::layout('layout') ?>
<?php view::begin('content'); ?>
<?php
//防止执行超时
set_time_limit(0);
//清空并关闭输出缓存
ob_end_clean();
?>
<div class="mdui-container-fluid">

  <div class="mdui-typo">
    <h1> 爬虫管理 <small>抽取网页数据，可用于文件下载，临时文件保存于/upload/.crawler/目录下</small></h1>
  </div>
  <?php if (empty($info)) : ?>
    <style>
      .mdui-table td .mdui-btn[name^=empty_collected] {
        display: none;
      }

      .mdui-table td:hover .mdui-btn[name^=empty_collected] {
        display: block;
      }

      .mdui-dialog {

        max-width: unset;
        max-height: unset;
        width: 95%;
        height: 95%;

      }
    </style>
    <div class="mdui-table-fluid">
      <form action="" method="post">
        <table class="mdui-table">
          <thead>
            <tr>
              <th>名称</th>
              <th>缩略名</th>
              <th>入口页</th>
              <th>列表页</th>
              <th>内容页</th>
              <th>抽取页</th>
              <th>状态</th>
              <th style="width: 191px;">操作
                <button name="add_task" class="mdui-btn mdui-btn-icon mdui-color-light-blue mdui-ripple mdui-btn-dense mdui-float-right" type="submit" value="1" mdui-tooltip="{content: '新增'}">
                  <i class="mdui-icon material-icons">&#xe145;</i>
                </button>
              </th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($list as $slug => $item) : ?>
              <tr>
                <td><?php echo $item->name; ?></td>
                <td><?php echo $slug; ?></td>
                <td>
                  <span name="collected_scan_urls" task-name="<?php echo $slug ?>"><?php echo $item->collected_scan_urls_num ?></span>
                  /
                  <span name="collect_scan_urls" task-name="<?php echo $slug ?>"><?php echo $item->collect_scan_urls_num ?></span>
                  <button name="empty_collected_scan" class="mdui-btn mdui-btn-icon mdui-color-red mdui-ripple mdui-btn-dense mdui-float-right" type="submit" value="<?php echo $slug ?>" mdui-tooltip="{content: '清空'}" style="min-width: 24px;width:24px;height:24px;">
                    <i class="mdui-icon material-icons" style="font-size: 16px;">&#xe872;</i>
                  </button>
                </td>
                <td>
                  <span name="collected_list_urls" task-name="<?php echo $slug ?>"><?php echo $item->collected_list_urls_num ?></span>
                  /
                  <span name="collect_list_urls" task-name="<?php echo $slug ?>"><?php echo $item->collect_list_urls_num ?></span>
                  <button name="empty_collected_list" class="mdui-btn mdui-btn-icon mdui-color-red mdui-ripple mdui-btn-dense mdui-float-right" type="submit" value="<?php echo $slug ?>" mdui-tooltip="{content: '清空'}" style="min-width: 24px;width:24px;height:24px;">
                    <i class="mdui-icon material-icons" style="font-size: 16px;">&#xe872;</i>
                  </button>
                </td>
                <td>
                  <span name="collected_content_urls" task-name="<?php echo $slug ?>"><?php echo $item->collected_content_urls_num ?></span>
                  /
                  <span name="collect_content_urls" task-name="<?php echo $slug ?>"><?php echo $item->collect_content_urls_num ?></span>
                  <button name="empty_collected_content" class="mdui-btn mdui-btn-icon mdui-color-red mdui-ripple mdui-btn-dense mdui-float-right" type="submit" value="<?php echo $slug ?>" mdui-tooltip="{content: '清空'}" style="min-width: 24px;width:24px;height:24px;">
                    <i class="mdui-icon material-icons" style="font-size: 16px;">&#xe872;</i>
                  </button>
                </td>
                <td>
                  <span name="collected_content_fields" task-name="<?php echo $slug ?>"><?php echo $item->collected_fields_urls_num ?></span>
                  <button name="empty_collected_fields" class="mdui-btn mdui-btn-icon mdui-color-red mdui-ripple mdui-btn-dense mdui-float-right" type="submit" value="<?php echo $slug ?>" mdui-tooltip="{content: '清空'}" style="min-width: 24px;width:24px;height:24px;">
                    <i class="mdui-icon material-icons" style="font-size: 16px;">&#xe872;</i>
                  </button>
                </td>
                <td>
                  <?php if ($_POST['start_crawler_task'] == $slug) : ?>
                    运行中
                  <?php else : ?>
                    停止
                  <?php endif; ?>
                </td>
                <td>
                  <button name="start_crawler_task" task-name="<?php echo $slug ?>" class="mdui-btn mdui-btn-icon mdui-color-light-blue mdui-ripple mdui-btn-dense" type="submit" value="<?php echo $slug ?>" mdui-tooltip="{content: '启动'}">
                    <i class="mdui-icon material-icons">&#xe037;</i>
                  </button>
                  <?php if ($_POST['start_crawler_task'] == $slug) : ?>
                    <button name="stop_task" task-name="<?php echo $slug ?>" class="mdui-btn mdui-btn-icon mdui-color-light-blue mdui-ripple mdui-btn-dense" type="submit" value="<?php echo $slug ?>" mdui-tooltip="{content: '停止'}">
                      <i class="mdui-icon material-icons">&#xe047;</i>
                    </button>
                  <?php endif; ?>
                  <button name="edit_task" class="mdui-btn mdui-btn-icon mdui-color-amber mdui-ripple mdui-btn-dense" type="submit" value="<?php echo $slug ?>" mdui-tooltip="{content: '编辑'}">
                    <i class="mdui-icon material-icons">&#xe3c9;</i>
                  </button>
                  <button name="empty_task" class="mdui-btn mdui-btn-icon mdui-color-red mdui-ripple mdui-btn-dense" type="submit" value="<?php echo $slug ?>" mdui-tooltip="{content: '清空'}">
                    <i class="mdui-icon material-icons">&#xe872;</i>
                  </button>
                  <button name="delete_task" class="mdui-btn mdui-btn-icon mdui-color-red mdui-ripple mdui-btn-dense" type="submit" value="<?php echo $slug ?>" mdui-tooltip="{content: '删除'}">
                    <i class="mdui-icon material-icons">&#xe5cd;</i>
                  </button>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </form>
    </div>
    <?php if (!empty($_POST['start_crawler_task'])) : ?>
      <div class="mdui-dialog" id="task-console-dialog">
        <div class="mdui-dialog-title">Are you sure?</div>
        <div class="mdui-dialog-content">
          <div class="mdui-container-fluid">
            <div class="mdui-row">
              <div class="mdui-col-xs-4">
                <div class="mdui-card">
                  <div class="mdui-card-header">
                    <h4>
                      Scan Urls <small>0 / 0</small>
                    </h4>
                  </div>
                  <div class="mdui-card-media">
                    <ul class="mdui-list">
                      <li class="mdui-list-item mdui-ripple">
                        <div class="mdui-list-item-content">Inbox</div>
                        <i class="mdui-list-item-icon mdui-icon material-icons">move_to_inbox</i>
                      </li>
                      <li class="mdui-list-item mdui-ripple">
                        <div class="mdui-list-item-content">Outbox</div>
                        <i class="mdui-list-item-icon mdui-icon material-icons">send</i>
                      </li>
                      <li class="mdui-list-item mdui-ripple">
                        <div class="mdui-list-item-content">Trash</div>
                        <i class="mdui-list-item-icon mdui-icon material-icons">delete</i>
                      </li>
                      <li class="mdui-list-item mdui-ripple">
                        <div class="mdui-list-item-content">Spam</div>
                        <i class="mdui-list-item-icon mdui-icon material-icons">error</i>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="mdui-col-xs-4">
                <div class="mdui-card">
                  <div class="mdui-card-header">
                    <h4>
                      List Urls <small>0 / 0</small>
                    </h4>
                  </div>
                  <div class="mdui-card-media">
                    <ul class="mdui-list">
                      <li class="mdui-list-item mdui-ripple">
                        <div class="mdui-list-item-content">Inbox</div>
                        <i class="mdui-list-item-icon mdui-icon material-icons">move_to_inbox</i>
                      </li>
                      <li class="mdui-list-item mdui-ripple">
                        <div class="mdui-list-item-content">Outbox</div>
                        <i class="mdui-list-item-icon mdui-icon material-icons">send</i>
                      </li>
                      <li class="mdui-list-item mdui-ripple">
                        <div class="mdui-list-item-content">Trash</div>
                        <i class="mdui-list-item-icon mdui-icon material-icons">delete</i>
                      </li>
                      <li class="mdui-list-item mdui-ripple">
                        <div class="mdui-list-item-content">Spam</div>
                        <i class="mdui-list-item-icon mdui-icon material-icons">error</i>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="mdui-col-xs-4">
                <div class="mdui-card">
                  <div class="mdui-card-header">
                    <h4>
                      Content Urls <small>0 / 0</small>
                    </h4>
                  </div>
                  <div class="mdui-card-media">
                    <ul class="mdui-list">
                      <li class="mdui-list-item mdui-ripple">
                        <div class="mdui-list-item-content">Inbox</div>
                        <i class="mdui-list-item-icon mdui-icon material-icons">move_to_inbox</i>
                      </li>
                      <li class="mdui-list-item mdui-ripple">
                        <div class="mdui-list-item-content">Outbox</div>
                        <i class="mdui-list-item-icon mdui-icon material-icons">send</i>
                      </li>
                      <li class="mdui-list-item mdui-ripple">
                        <div class="mdui-list-item-content">Trash</div>
                        <i class="mdui-list-item-icon mdui-icon material-icons">delete</i>
                      </li>
                      <li class="mdui-list-item mdui-ripple">
                        <div class="mdui-list-item-content">Spam</div>
                        <i class="mdui-list-item-icon mdui-icon material-icons">error</i>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="mdui-col-xs-12">
                <div class="mdui-panel" mdui-panel>
                  <div class="mdui-panel-item">
                    <div class="mdui-panel-item -header">
                      <div class="mdui-panel-item-title">Trip name</div>
                      <div class="mdui-panel-item-summary">Carribean cruise</div>
                      <i class="mdui-panel-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
                    </div>
                    <div class="mdui-panel-item-body">
                      <p>First content</p>
                      <p>First content</p>
                      <p>First content</p>
                      <p>First content</p>
                      <p>First content</p>
                      <p>First content</p>
                      <div class="mdui-panel-item-actions">
                        <button class="mdui-btn mdui-ripple" mdui-panel-item-close>cancel</button>
                        <button class="mdui-btn mdui-ripple">save</button>
                      </div>
                    </div>
                  </div>

                  <div class="mdui-panel-item">
                    <div class="mdui-panel-item-header">
                      <div class="mdui-panel-item-title">Location</div>
                      <i class="mdui-panel-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
                    </div>
                    <div class="mdui-panel-item-body">
                      <p>Second content</p>
                      <p>Second content</p>
                      <p>Second content</p>
                      <p>Second content</p>
                      <p>Second content</p>
                      <p>Second content</p>
                      <div class="mdui-panel-item-actions">
                        <button class="mdui-btn mdui-ripple" mdui-panel-item-close>cancel</button>
                        <button class="mdui-btn mdui-ripple">save</button>
                      </div>
                    </div>
                  </div>

                  <div class="mdui-panel-item">
                    <div class="mdui-panel-item-header">
                      <div class="mdui-panel-item-title">Start and end dates</div>
                      <div class="mdui-panel-item-summary">Start date: Feb 29, 2016</div>
                      <div class="mdui-panel-item-summary">End date: Not set</div>
                      <i class="mdui-panel-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
                    </div>
                    <div class="mdui-panel-item-body">
                      <p>Third content</p>
                      <p>Third content</p>
                      <p>Third content</p>
                      <p>Third content</p>
                      <p>Third content</p>
                      <p>Third content</p>
                      <div class="mdui-panel-item-actions">
                        <button class="mdui-btn mdui-ripple" mdui-panel-item-close>cancel</button>
                        <button class="mdui-btn mdui-ripple">save</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="mdui-dialog-actions">
          <button class="mdui-btn mdui-ripple">cancel</button>
          <button class="mdui-btn mdui-ripple">erase</button>
        </div>
      </div>
      <!-- <script>
        var inst = new mdui.Dialog('#task-console-dialog');
        inst.open();
      </script> -->
    <?php endif; ?>
  <?php else : ?>
    <form action="" method="post">
      <div class="mdui-textfield">
        <h4>任务名称 <small><i class="mdui-icon material-icons mdui-text-color-red" style="bottom: unset;padding: 0;font-size: 12px;">&#xeb3b;</i></small></h4>
        <input class="mdui-textfield-input" type="text" name="name" value="<?php echo $info->name ?>" />
      </div>
      <div class="mdui-textfield">
        <h4>任务缩略名 <small><i class="mdui-icon material-icons mdui-text-color-red" style="bottom: unset;padding: 0;font-size: 12px;">&#xeb3b;</i></small></h4>
        <input class="mdui-textfield-input" type="text" name="slug" value="<?php echo $info->slug ?>" />
        <small>任务缩略名缩略名用于创建友好的目录地址, 建议使用字母, 数字, 下划线和横杠.</small>
      </div>
      <?php if (isset($_POST['edit_task'])) : ?>
        <input type="hidden" name="old_slug" value="<?php echo $info->slug ?>" />
      <?php endif ?>
      <div class="mdui-textfield">
        <h4>域名 <small>(一行一个)</small></h4>
        <textarea class="mdui-textfield-input" placeholder="输入后回车换行" name="domains"><?php echo implode("\n", $info->domains) ?></textarea>
        <small>定义爬虫爬取哪些域名下的网页, 非域名下的url会被忽略以提高爬取速度</small>
      </div>
      <div class="mdui-textfield">
        <h4>入口链接 <small>(一行一个)</small></h4>
        <textarea class="mdui-textfield-input" placeholder="输入后回车换行" name="scan_urls"><?php echo implode("\n", $info->scan_urls) ?></textarea>
        <small>定义爬虫的入口链接, 爬虫从这些链接开始爬取,同时这些链接也是监控爬虫所要监控的链接</small>
      </div>
      <div class="mdui-textfield">
        <h4>列表页规则 <small>(一行一个)</small></h4>
        <textarea class="mdui-textfield-input" placeholder="输入后回车换行" name="list_url_regexes"><?php echo implode("\n", $info->list_url_regexes) ?></textarea>
        <small>定义列表页url的规则，对于有列表页的网站, 使用此配置可以大幅提高爬虫的爬取速率</small>
      </div>
      <div class="mdui-textfield">
        <h4>内容页规则 <small>(一行一个)</small></h4>
        <textarea class="mdui-textfield-input" placeholder="输入后回车换行" name="content_url_regexes"><?php echo implode("\n", $info->content_url_regexes) ?></textarea>
        <small>定义内容页url的规则，内容页是指包含要爬取内容的网页</small>
      </div>
      <div class="mdui-textfield">
        <h4>下载链接规则 <small>(一行一个)</small></h4>
        <textarea class="mdui-textfield-input" placeholder="输入后回车换行" name="download_url_regexes"><?php echo implode("\n", $info->download_url_regexes) ?></textarea>
        <small>定义下载链接url的规则，该链接配合检索对应抽取数据</small>
      </div>
      <div class="mdui-textfield">
        <h4>内容页抽取规则 <small>参考: <a href="http://querylist.cc/docs/api/v4/Elements-introduce">Querylist\Dom\Elements</a></small></h4>
        <table class="mdui-table">
          <thead>
            <tr>
              <th>编码</th>
              <th>名称</th>
              <th>元素</th>
              <th>方法</th>
              <th>属性</th>
              <th>下载</th>
              <th>操作
                <button class="mdui-btn mdui-btn-icon mdui-color-light-blue mdui-ripple mdui-float-right" name="add_field" value="1" mdui-tooltip="{content: '新增'}">
                  <i class="mdui-icon material-icons" style="top: 33%;left: 33%;">&#xe145;</i>
                </button>
              </th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ((array)$info->fields as $index => $field) : ?>
              <tr>
                <td>
                  <div class="mdui-textfield" style="padding: 0;">
                    <input class="mdui-textfield-input" type="text" name="field_name_<? echo $index ?>" value="<?php echo $field->name; ?>" />
                  </div>
                </td>
                <td>
                  <div class="mdui-textfield" style="padding: 0;">
                    <input class="mdui-textfield-input" type="text" name="field_label_<? echo $index ?>" value="<?php echo $field->label; ?>" />
                  </div>
                </td>
                <td>
                  <div class="mdui-textfield" style="padding: 0;">
                    <input class="mdui-textfield-input" type="text" name="field_find_<? echo $index ?>" value="<?php echo $field->find; ?>" />
                  </div>
                </td>
                <td>
                  <select class="mdui-select" name="field_func_<? echo $index ?>">
                    <?php
                    foreach (['attr', 'html', 'text', 'attrs', 'htmls', 'texts'] as $type) :
                    ?>
                      <option value="<?php echo $type; ?>" <?php echo ($type == $field->func) ? 'selected' : ''; ?>><?php echo $type; ?></option>
                    <?php endforeach; ?>
                  </select>
                </td>
                <td>
                  <div class="mdui-textfield" style="padding: 0;">
                    <input class="mdui-textfield-input" type="text" name="field_args_<? echo $index ?>" value="<?php echo $field->args; ?>" />
                  </div>
                </td>
                <td>
                  <label class="mdui-switch">
                    <input type="checkbox" name="field_down_<? echo $index ?>" value="1" <?php echo !empty($field->down) ? 'checked' : ''; ?> />
                    <i class="mdui-switch-icon"></i>
                  </label>
                </td>
                <td>
                  <button class="mdui-btn mdui-btn-icon mdui-color-red mdui-ripple mdui-float-right" name="delete_field" value="<?php echo $index ?>" mdui-tooltip="{content: '删除'}">
                    <i class="mdui-icon material-icons" style="top: 33%;left: 33%;">&#xe872;</i>
                  </button>
                </td>
              <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <button type="submit" class="mdui-btn mdui-color-theme-accent mdui-ripple mdui-float-right" name="save_task" value="1">
        <i class="mdui-icon material-icons">&#xe161;</i> 保存
      </button>
    </form>
  <?php endif; ?>
</div>
<script>
  $('button[name=refresh]').on('click', function() {
    $('center').html('正在重建缓存，请耐心等待...');
  });
</script>
<?php view::end('content'); ?>