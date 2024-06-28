# Laravel CheatSheet

---



## Directory Structure 文件夹结构

```sh
Laravel
  ├─.github     
  │  └─workflows
  ├─app                     # 包含你的程序的核心代码。我们很快会详细地研究这个目录；不管怎样，应用程序中几乎所有的类都将位于此目录中。
  │  ├─Admin                #
  │  ├─Broadcasting         # 包含应用程序的所有广播频道类，这些类都是通过 make:channel 命令生成的
  │  ├─Console              # 包含应用所有自定义的 Artisan 命令， 这些类通过 make:command 命令生成
  │  ├─Events               # 该目录默认不存在，但可以通过 event:generate 和 make:event 命令创建。Events 目录用于存放 事件类。事件类用于告知应用其他部分某个事件发生情况并提供灵活的、解耦的处理机制。
  │  ├─Exceptions           # 包含应用的异常处理器，同时还是处理应用抛出的任何异常的好地方。如果你想要自定义异常如何记录或渲染，需要编辑该目录下的 Handler 类.
  │  ├─Helpers              #
  │  ├─Http                 # 包含了控制器、中间件以及表单请求等，几乎所有通过 Web 进入应用的请求处理都在这里进行。
  │  │  ├─Controllers       #
  │  │  └─Middleware        #
  │  ├─Jobs                 # 该目录默认不存在，但可以通过执行 make:job 命令生产，Jobs 目录用于存放 队列任务，应用中的任务可以被推送至队列，也可以在当前请求生命周期内同步执行。同步执行的任务有时也被看作是命令，因为它们实现了 命令模式。
  │  ├─Listeners            # 此目录默认不存在，但如果你执行 event:generate 或 make:listener Artisan 命令时，会自动生成。Listeners 目录包含所有处理事件的类。在事件触发后，事件侦听器接收事件实例并执行处理逻辑。例如，UserRegistered 事件被 SendWelcomeEmail 监听器所处理。
  │  ├─Mail                 # 默认情况下，此目录不存在，但如果你执行 make:mail Artisan 命令时，会自动生成。Mail 目录包含应用程序所有表示发送的电子邮件的类。Mail 对象允许您将构建电子邮件的所有逻辑封装在一个简单的类中，该类可以使用 Mail::send 方式发送。
  │  ├─Models               # 包含所有 Eloquent 模型类。
  │  ├─Notifications        # 默认情况下，此目录不存在，但如果你执行 make:notification Artisan 命令时会自动生成。Notifications 目录包含所有你发送给应用程序的「事务性」通知。例如关于应用程序内发生的事件的简单通知。Laravel 的通知功能抽象了通过各种驱动程序发送的通知，如电子邮件通知、Slack 信息、SMS 短信通知或数据库存储。
  │  ├─Policies             # 默认情况下，此目录不存在，但如果您执行 make:policy Artisan 命令会生成。Policies 目录包含应用程序的授权策略类。这些类用于确定用户是否可以对资源执行给定的操作。
  │  ├─Providers            # 包含程序中所有的的 服务提供者。
  │  └─Rules                # 默认情况下，此目录不存在，但如果您执行 make:rule Artisan 命令后会生成。Rules 目录包含应用程序用户自定义的验证规则。这些验证规则用于将复杂的验证逻辑封装在一个简单的对象中。
  ├─bootstrap               # 包含了框架的启动文件 app.php 。该目录还包含 cache 目录，其中包含用于性能优化的框架生成的文件，例如路由和服务缓存文件。
  │  ├─cache                # 包含用于性能优化的框架生成的文件
  │  └─app.php              # 框架的启动文件
  ├─config                  # 包含应用程序的所有配置文件。最好把这些文件都浏览一遍，并熟悉所有可用的选项。
  ├─database                # 包含数据库迁移，模型工厂和 种子生成器 文件。如果你喜欢，你还可以把它作为 SQLite 数据库存放目录。
  │  ├─factories            #
  │  ├─migrations           #
  │  ├─schema               #
  │  └─seeders              #
  ├─node_modules            # Node 依赖。
  ├─public                  # 包含 index.php 文件，它是进入应用程序的所有请求的入口，并配置自动加载。该目录还包含您的资源，如图像、JavaScript 脚本和 CSS 样式。
  │  ├─assests              #  
  │  ├─js                   #
  │  ├─css                  #
  │  └─index.php            #
  ├─resources               # 包含了视图和未编译的资源文件（如 LESS、SASS 或 JavaScript）。此目录还包含你所有的语言文件。
  ├─routes                  # 包含应用程序的所有路由定义。
  │  ├─api.php              # 该文件包含 RouteServiceProvider 放置在 api 中间件组中的路由，后者提供速率限制。这些路由是无状态的，因此通过这些路由进入应用程序的请求将通过令牌进行身份验证，并且不能访问会话状态。
  │  ├─console.php          # 该文件是您可以定义所有基于闭包的控制台命令的地方。每个闭包都绑定到一个命令实例，允许使用一种简单的方法与每个命令的进行 IO 交互。尽管这个文件没有定义 HTTP 路由，但是它定义了应用程序中基于控制台的入口点（路由）。
  │  ├─channels.php         # 该文件是您可以注册应用程序支持的所有事件广播频道的位置。
  │  └─web.php              # 该文件包含 RouteServiceProvider 放置在 web 中间件组中的路由，后者提供会话状态、CSRF 保护和 cookie 加密。如果您的应用程序不提供无状态的 RESTful API，那么您的所有路由都很可能在 web.php 文件。
  ├─storage                 # 包含由 Blade 框架生成的基于目录的模板、文件和缓存。
  │  ├─app                  # 可用于存储应用程序生成的任何文件。
  │  │  └─public            # 用来存储用户生成的文件，例如应该公开访问的用户头像。
  │  ├─framework            # 用于存储框架生成的文件和缓存。
  │  └─logs                 # 包含应用程序的日志文件。包含应用程序的日志文件。
  ├─tests                   # 包含自动化测试类。
  ├─vendor                  # Composer 依赖。
  ├─.env                    # 
  └─serve.php               # 
```



<div class="waterfall">




<div class="waterfall-item">



## Artisan



### Usage

```sh
php artisan [options] [arguments]
```

### Options

```sh
php artisan -h            
php artisan --help            
# Display help for the given command. When no command is given display help for the list command
# 针对命令显示帮助信息
php artisan -q
php artisan --quiet           
# Do not output any message
# 抑制输出信息
php artisan -V
php artisan --version         
# Display this application version
php artisan --ansi
php artisan --no-ansi      
# Force (or disable --no-ansi) ANSI output
php artisan -n
php artisan --no-interaction  
# Do not ask any interactive question
php artisan --env[=ENV]           
# The environment the command should run under
php artisan -v
php artisan -vv
php artisan -vvv
php artisan --verbose  
# Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
```

### Available commands

```
php artisan admin                  
# List all admin commands
php artisan clear-compiled         
# Remove the compiled class file
php artisan completion             
# Dump the shell completion script
php artisan db                     
# Start a new database CLI session
php artisan down                   
# Put the application into maintenance / demo mode
php artisan env                    
# Display the current framework environment
php artisan help                   
# Display help for a command
php artisan inspire                
# Display an inspiring quote
php artisan list                   
# List commands
php artisan migrate                
# Run the database migrations
php artisan optimize               
# Cache the framework bootstrap files
php artisan serve                  
# Serve the application on the PHP development server
php artisan test                   
# Run the application tests
php artisan tinker                 
# Interact with your application
php artisan up                     
# Bring the application out of maintenance mode
```

#### admin

> dcat-admin

```
php artisan admin:action           # Make a admin action
php artisan admin:app              # Create new application
php artisan admin:create-user      # Create a admin user
php artisan admin:dev:link
php artisan admin:export-seed      # Export seed a dcat-admin database tables menu, roles and permissions
php artisan admin:extend           # Build a dcat-admin extension
php artisan admin:form             # Make admin form widget
php artisan admin:ide-helper       # Create the ide-helper file
php artisan admin:import           # Import a dcat-admin extension
php artisan admin:install          # Install the admin package
php artisan admin:menu-cache       # Flush the menu cache
php artisan admin:minify           # Minify the CSS and JS
php artisan admin:publish          # Re-publish dcat-admin's assets, configuration, language and migration files. If you want overwrite the existing files, you can add the `--force` option
php artisan admin:reset-password   # Reset password for a specific admin user
php artisan admin:uninstall        # Uninstall the admin package
```

#### auth

```
php artisan auth:clear-resets      # Flush expired password reset tokens
```

#### cache

```
php artisan cache:clear            # Flush the application cache
php artisan cache:forget           # Remove an item from the cache
php artisan cache:table            # Create a migration for the cache database table
```

#### config

```
php artisan config:cache           # Create a cache file for faster configuration loading
php artisan config:clear           # Remove the configuration cache file
```

#### db

```
php artisan db:seed                # Seed the database with records
php artisan db:wipe                # Drop all tables, views, and types
```

#### event

```
php artisan event:cache            # Discover and cache the application's events and listeners
php artisan event:clear            # Clear all cached events and listeners
php artisan event:generate         # Generate the missing events and listeners based on registration
php artisan event:list             # List the application's events and listeners
```

#### key

```
php artisan key:generate           # Set the application key
```

#### l5-swagger

> l5-swagger

```
php artisan l5-swagger:generate    # Regenerate docs
```

#### make

```sh
php artisan make:cast              # Create a new custom Eloquent cast class
php artisan make:channel           # Create a new channel class
php artisan make:command           # Create a new Artisan command
php artisan make:component         # Create a new view component class
php artisan make:controller        # Create a new controller class
php artisan make:event             # Create a new event class
php artisan make:exception         # Create a new custom exception class
php artisan make:factory           # Create a new model factory
php artisan make:job               # # Create a new job class
php artisan make:listener          # Create a new event listener class
php artisan make:mail              # Create a new email class
php artisan make:middleware        # Create a new middleware class
php artisan make:migration         # Create a new migration file
php artisan make:model             # Create a new Eloquent model class
php artisan make:notification      # Create a new notification class
php artisan make:observer          # Create a new observer class
php artisan make:policy            # Create a new policy class
php artisan make:provider          # Create a new service provider class
php artisan make:request           # Create a new form request class
php artisan make:resource          # Create a new resource
php artisan make:rule              # Create a new validation rule
php artisan make:seeder            # Create a new seeder class
php artisan make:test              # Create a new test class
```

#### migrate

```
php artisan migrate
php artisan migrate:fresh          Drop all tables and re-run all migrations
php artisan migrate:install        Create the migration repository
php artisan migrate:refresh        Reset and re-run all migrations
php artisan migrate:reset          Rollback all database migrations
php artisan migrate:rollback       Rollback the last database migration
php artisan migrate:status         Show the status of each migration
```

#### model

```
php artisan model:prune            Prune models that are no longer needed
```

#### notifications

```
php artisan notifications:table    Create a migration for the notifications table
```

#### optimize

```
php artisan optimize:clear         Remove the cached bootstrap files
```

#### package

```
php artisan package:discover       Rebuild the cached package manifest
```

#### queue

```
php artisan queue:batches-table    Create a migration for the batches database table
php artisan queue:clear            Delete all of the jobs from the specified queue
php artisan queue:failed           List all of the failed queue jobs
php artisan queue:failed-table     Create a migration for the failed queue jobs database table
php artisan queue:flush            Flush all of the failed queue jobs
php artisan queue:forget           Delete a failed queue job
php artisan queue:listen           Listen to a given queue
php artisan queue:monitor          Monitor the size of the specified queues
php artisan queue:prune-batches    Prune stale entries from the batches database
php artisan queue:prune-failed     Prune stale entries from the failed jobs table
php artisan queue:restart          Restart queue worker daemons after their current job
php artisan queue:retry            Retry a failed queue job
php artisan queue:retry-batch      Retry the failed jobs for a batch
php artisan queue:table            Create a migration for the queue jobs database table
php artisan queue:work             Start processing jobs on the queue as a daemon
```

#### route

```
php artisan route:cache            Create a route cache file for faster route registration
php artisan route:clear            Remove the route cache file
php artisan route:list             List all registered routes
```

#### sail

```
php artisan sail:install           Install Laravel Sail's default Docker Compose file
php artisan sail:publish           Publish the Laravel Sail Docker files
```

#### sanctum

```
php artisan sanctum:prune-expired  Prune tokens expired for more than specified number of hours.
```

#### schedule

```
php artisan schedule:clear-cache   Delete the cached mutex files created by scheduler
php artisan schedule:list          List the scheduled commands
php artisan schedule:run           Run the scheduled commands
php artisan schedule:test          Run a scheduled command
php artisan schedule:work          Start the schedule worker
```

#### schema

```
php artisan schema:dump            Dump the given database schema
```

#### session

```
php artisan session:table          Create a migration for the session database table
```

#### storage

```
php artisan storage:link           Create the symbolic links configured for the application
```

#### stub

```
php artisan stub:publish           Publish all stubs that are available for customization
```

#### vendor

```
php artisan vendor:publish         Publish any publishable assets from vendor packages
```

#### view

```
php artisan view:cache             Compile all of the application's Blade templates
php artisan view:clear             Clear all compiled view files
```

```
// 针对命令显示帮助信息
php artisan --help OR -h
// 抑制输出信息
php artisan --quiet OR -q
// 打印 Laravel 的版本信息
php artisan --version OR -V
// 不询问任何交互性的问题
php artisan --no-interaction OR -n
// 强制输出 ANSI 格式
php artisan --ansi
// 禁止输出 ANSI 格式
php artisan --no-ansi
// 显示当前命令行运行的环境
php artisan --env
// -v|vv|vvv 通过增加 v 的个数来控制命令行输出内容的详尽情况: 1 个代表正常输出, 2 个代表输出更多消息, 3 个代表调试
php artisan --verbose
// 移除编译优化过的文件 (storage/frameworks/compiled.php)
php artisan clear-compiled
// 显示当前框架运行的环境
php artisan env
// 显示某个命令的帮助信息
php artisan help
// 显示所有可用的命令
php artisan list
// 进入应用交互模式
php artisan tinker
// 配合 dump() 函数调试数据
php artisan dump-server
// 进入维护模式
php artisan down
// 退出维护模式
php artisan up
// 优化框架性能
 // --force    强制编译已写入文件 (storage/frameworks/compiled.php)
 // --psr      不对 Composer 的 dump-autoload 进行优化
php artisan optimize [--force] [--psr]
// 更改前端预设
// type_name (可以是 none, bootstrap, vue, react)
php artisan preset [options] [--] type_name
// 启动内置服务器
php artisan serve
// 更改默认端口
php artisan serve --port 8080
// 使其在本地服务器外也可正常工作
php artisan serve --host 0.0.0.0
// 更改应用命名空间
php artisan app:name namespace
// 清除过期的密码重置令牌
php artisan auth:clear-resets

// 清空应用缓存
php artisan cache:clear
// 移除 key_name 对应的缓存
php artisan cache:forget key_name [<store>]
// 创建缓存数据库表 migration
php artisan cache:table

// 合并所有的配置信息为一个，提高加载速度
php artisan config:cache
// 移除配置缓存文件
php artisan config:clear

// 程序内部调用 Artisan 命令
$exitCode = Artisan::call('config:cache');
// 运行所有的 seed 假数据生成类
 // --class      可以指定运行的类，默认是: "DatabaseSeeder"
 // --database   可以指定数据库
 // --force      当处于生产环境时强制执行操作
php artisan db:seed [--class[="..."]] [--database[="..."]] [--force]

// 基于注册的信息，生成遗漏的 events 和 handlers
php artisan event:generate
// 罗列所有事件和监听器
php artisan event:list
// 缓存事件和监听器
php artisan event:cache
// 清除事件和监听器缓存
php artisan event:clear

// 生成新的处理器类
 // --command      需要处理器处理的命令类名字
php artisan handler:command [--command="..."] name
// 创建一个新的时间处理器类
 // --event        需要处理器处理的事件类名字
 // --queued       需要处理器使用队列话处理的事件类名字
php artisan handler:event [--event="..."] [--queued] name

// 生成应用的 key（会覆盖）
php artisan key:generate

// 发布本地化翻译文件到 resources 文件下
// locales: 逗号分隔，如 zh_CN,tk,th [默认是: "all"]
php artisan lang:publish [options] [--] [<locales>]

// 创建用户认证脚手架
php artisan make:auth
// 创建 Channel 类
php artisan make:channel name
// 在默认情况下, 这将创建未加入队列的自处理命令
 // 通过 --handler 标识来生成一个处理器, 用 --queued 来使其入队列.
php artisan make:command [--handler] [--queued] name
// 创建一个新的 Artisan 命令
 //  --command     命令被调用的名称。 (默认为: "command:name")
php artisan make:console [--command[="..."]] name
// 创建一个新的资源控制器
 // --plain      生成一个空白的控制器类
php artisan make:controller [--plain] name
php artisan make:controller App\\Admin\\Http\\Controllers\\DashboardController
// 创建一个新的事件类
php artisan make:event name
// 创建异常类
php artisan make:exception name
// 创建模型工厂类
php artisan make:factory name
// 创建一个队列任务文件
php artisan make:job 
// 创建一个监听者类
php artisan make:listener name
// 创建一个新的邮件类
php artisan make:mail name
// 创建一个新的中间件类
php artisan make:middleware name
// 创建一个新的迁移文件
 // --create     将被创建的数据表.
 // --table      将被迁移的数据表.
php artisan make:migration [--create[="..."]] [--table[="..."]] name
// 创建一个新的 Eloquent 模型类
php artisan make:model User
php artisan make:model Models/User
// 新建一个消息通知类
php artisan make:notification TopicRepliedNotification
// 新建一个模型观察者类
php artisan make:observer UserObserver
// 创建授权策略
php artisan make:policy PostPolicy
// 创建一个新的服务提供者类
php artisan make:provider name
// 创建一个新的表单请求类
php artisan make:request name
// 创建一个 API 资源类
php artisan make:resource name
// 新建验证规则类
php artisan make:rule name
// 创建模型脚手架
// <name> 模型名称，如 Post
// -s, --schema=SCHEMA 表结构如：--schema="title:string"
// -a, --validator[=VALIDATOR] 表单验证，如：--validator="title:required"
// -l, --localization[=LOCALIZATION] 设置本地化信息，如：--localization="key:value"
// -b, --lang[=LANG] 设置本地化语言 --lang="en"
// -f, --form[=FORM] 使用 Illumintate/Html Form 来生成表单选项，默认为 false
// -p, --prefix[=PREFIX] 表结构前缀，默认 false
php artisan make:scaffold  [options] [--] <name>
// 生成数据填充类
php artisan make:seeder
// 生成测试类
php artisan make:test

// 数据库迁移
 // --database   指定数据库连接（下同）
 // --force      当处于生产环境时强制执行，不询问（下同）
 // --path       指定单独迁移文件地址
 // --pretend    把将要运行的 SQL 语句打印出来（下同）
 // --seed       Seed 任务是否需要被重新运行（下同）
php artisan migrate [--database[="..."]] [--force] [--path[="..."]] [--pretend] [--seed]
// 创建迁移数据库表
php artisan migrate:install [--database[="..."]]
// Drop 所有数据表并重新运行 Migration
php artisan migrate:fresh
// 重置并重新运行所有的 migrations
 // --seeder     指定主 Seeder 的类名
php artisan migrate:refresh [--database[="..."]] [--force] [--seed] [--seeder[="..."]]
// 回滚所有的数据库迁移
php artisan migrate:reset [--database[="..."]] [--force] [--pretend]
// 回滚最最近一次运行的迁移任务
php artisan migrate:rollback [--database[="..."]] [--force] [--pretend]
// migrations 数据库表信息
php artisan migrate:status

// 为数据库消息通知创建一个表迁移类
php artisan notifications:table
// 清除缓存的 bootstrap 文件
php artisan optimize:clear
// 扩展包自动发现
php artisan package:discover

// 为队列数据库表创建一个新的迁移
php artisan queue:table
// 监听指定的队列
 // --queue      被监听的队列
 // --delay      给执行失败的任务设置延时时间 (默认为零: 0)
 // --memory     内存限制大小，单位为 MB (默认为: 128)
 // --timeout    指定任务运行超时秒数 (默认为: 60)
 // --sleep      等待检查队列任务的秒数 (默认为: 3)
 // --tries      任务记录失败重试次数 (默认为: 0)
php artisan queue:listen [--queue[="..."]] [--delay[="..."]] [--memory[="..."]] [--timeout[="..."]] [--sleep[="..."]] [--tries[="..."]] [connection]
// 查看所有执行失败的队列任务
php artisan queue:failed
// 为执行失败的数据表任务创建一个迁移
php artisan queue:failed-table
// 清除所有执行失败的队列任务
php artisan queue:flush
// 删除一个执行失败的队列任务
php artisan queue:forget
// 在当前的队列任务执行完毕后, 重启队列的守护进程
php artisan queue:restart
// 对指定 id 的执行失败的队列任务进行重试(id: 失败队列任务的 ID)
php artisan queue:retry id
// 指定订阅 Iron.io 队列的链接
 // queue: Iron.io 的队列名称.
 // url: 将被订阅的 URL.
 // --type       指定队列的推送类型.
php artisan queue:subscribe [--type[="..."]] queue url
// 处理下一个队列任务
 // --queue      被监听的队列
 // --daemon     在后台模式运行
 // --delay      给执行失败的任务设置延时时间 (默认为零: 0)
 // --force      强制在「维护模式下」运行
 // --memory     内存限制大小，单位为 MB (默认为: 128)
 // --sleep      当没有任务处于有效状态时, 设置其进入休眠的秒数 (默认为: 3)
 // --tries      任务记录失败重试次数 (默认为: 0)
php artisan queue:work [--queue[="..."]] [--daemon] [--delay[="..."]] [--force] [--memory[="..."]] [--sleep[="..."]] [--tries[="..."]] [connection]

// 生成路由缓存文件来提升路由效率
php artisan route:cache
// 移除路由缓存文件
php artisan route:clear
// 显示已注册过的路由
php artisan route:list

// 运行计划命令
php artisan schedule:run

// 为 session 数据表生成迁移文件
php artisan session:table
// 创建 "public/storage" 到 "storage/app/public" 的软链接
php artisan storage:link

// 从 vendor 的扩展包中发布任何可发布的资源
 // --force        重写所有已存在的文件
 // --provider     指定你想要发布资源文件的服务提供者
 // --tag          指定你想要发布标记资源.
php artisan vendor:publish [--force] [--provider[="..."]] [--tag[="..."]]
php artisan tail [--path[="..."]] [--lines[="..."]] [connection]

// 缓存视图文件以提高效率
php artisan view:cache
// 清除视图文件缓存
php artisan view:clear
```

</div ><div class="waterfall-item">

## Pagination

```
// 自动处理分页逻辑
Model::paginate(15);
Model::where('cars', 2)->paginate(15);
// 使用简单模板 - 只有 "上一页" 或 "下一页" 链接
Model::where('cars', 2)->simplePaginate(15);
// 手动分页
Paginator::make($items, $totalItems, $perPage);
// 在页面打印分页导航栏
$variable->links();

// 获取当前页数据数量。
$results->count()
// 获取当前页页码。
$results->currentPage()
// 获取结果集中第一条数据的结果编号。
$results->firstItem()
// 获取分页器选项。
$results->getOptions()
// 创建分页 URL 范围。
$results->getUrlRange($start, $end)
// 是否有多页。
$results->hasMorePages()
// 获取结果集中最后一条数据的结果编号。
$results->lastItem()
// 获取最后一页的页码（在 `simplePaginate` 中无效）。
$results->lastPage()
// 获取下一页的 URL 。
$results->nextPageUrl()
// 当前而是否为第一页。
$results->onFirstPage()
// 每页的数据条数。
$results->perPage()
// 获取前一页的 URL。
$results->previousPageUrl()
// 数据总数（在 `simplePaginate` 无效）。
$results->total()
// 获取指定页的 URL。
$results->url($page)
```



</div ><div class="waterfall-item">

## Lang

```
App::setLocale('en');
Lang::get('messages.welcome');
Lang::get('messages.welcome', array('foo' => 'Bar'));
Lang::has('messages.welcome');
Lang::choice('messages.apples', 10);
// Lang::get 的别名
trans('messages.welcome');
// Lang::choice 的别名
trans_choice('messages.apples',  10)
// 辅助函数
__('messages.welcome')
```

</div ><div class="waterfall-item">

## File

```
File::exists($path);
File::get($path, $lock = false);
// 加锁读取文件内容
File::sharedGet($path);
// 获取文件内容，不存在会抛出 FileNotFoundException 异常
File::getRequire($path);
// 获取文件内容, 仅能引入一次
File::requireOnce($file);
// 生成文件路径的 MD5 哈希
File::hash($path);
// 将内容写入文件
File::put($path, $contents, $lock = false);
// 写入文件，存在的话覆盖写入
File::replace($path, $content);
// 将内容添加在文件原内容前面
File::prepend($path, $data);
// 将内容添加在文件原内容后
File::append($path, $data);
// 修改路径权限
File::chmod($path, $mode = null);
// 通过给定的路径来删除文件
File::delete($paths);
// 将文件移动到新目录下
File::move($path, $target);
// 将文件复制到新目录下
File::copy($path, $target);
// 创建硬连接
File::link($target, $link);
// 从文件路径中提取文件名，不包含后缀
File::name($path);
// 从文件路径中提取文件名，包含后缀
File::basename($path);
// 获取文件路径名称
File::dirname($path);
// 从文件的路径地址提取文件的扩展
File::extension($path);
// 获取文件类型
File::type($path);
// 获取文件 MIME 类型
File::mimeType($path);
// 获取文件大小
File::size($path);
// 获取文件的最后修改时间
File::lastModified($path);
// 判断给定的路径是否是文件目录
File::isDirectory($directory);
// 判断给定的路径是否是可读取
File::isReadable($path);
// 判断给定的路径是否是可写入的
File::isWritable($path);
// 判断给定的路径是否是文件
File::isFile($file);
// 查找能被匹配到的路径名
File::glob($pattern, $flags = 0);
// 获取一个目录下的所有文件, 以数组类型返回
File::files($directory, $hidden = false);
// 获取一个目录下的所有文件 (递归).
File::allFiles($directory, $hidden = false);
// 获取一个目录内的目录
File::directories($directory);
// 创建一个目录
File::makeDirectory($path, $mode = 0755, $recursive = false, $force = false);
// 移动目录
File::moveDirectory($from, $to, $overwrite = false);
// 将文件夹从一个目录复制到另一个目录下
File::copyDirectory($directory, $destination, $options = null);
// 删除目录
File::deleteDirectory($directory, $preserve = false);
// 递归式删除目录
File::deleteDirectories($directory);
// 清空指定目录的所有文件和文件夹
File::cleanDirectory($directory);
```

</div ><div class="waterfall-item">

## Schema

```
// 创建指定数据表
 Schema::create('table', function($table)
{
  $table->increments('id');
});
// 指定一个连接
 Schema::connection('foo')->create('table', function($table){});
// 通过给定的名称来重命名数据表
 Schema::rename($from, $to);
// 移除指定数据表
 Schema::drop('table');
// 当数据表存在时, 将指定数据表移除
 Schema::dropIfExists('table');
// 判断数据表是否存在
 Schema::hasTable('table');
// 判断数据表是否有该列
 Schema::hasColumn('table', 'column');
// 获取数据表字段列表
 Schema::getColumnListing('table');
// 更新一个已存在的数据表
 Schema::table('table', function($table){});
// 重命名数据表的列
$table->renameColumn('from', 'to');
// 移除指定的数据表列
$table->dropColumn(string|array);
// 指定数据表使用的存储引擎
$table->engine = 'InnoDB';
// 字段顺序，只能在 MySQL 中才能用
$table->string('name')->after('email');
```

### 索引

```
$table->string('column')->unique();
$table->primary('column');
// 创建一个双主键
$table->primary(array('first', 'last'));
$table->unique('column');
$table->unique('column', 'key_name');
// 创建一个双唯一性索引
$table->unique(array('first', 'last'));
$table->unique(array('first', 'last'), 'key_name');
$table->index('column');
$table->index('column', 'key_name');
// 创建一个双索引
$table->index(array('first', 'last'));
$table->index(array('first', 'last'), 'key_name');
$table->dropPrimary(array('column'));
$table->dropPrimary('table_column_primary');
$table->dropUnique(array('column'));
$table->dropUnique('table_column_unique');
$table->dropIndex(array('column'));
$table->dropIndex('table_column_index');
```

### 外键

```
$table->foreign('user_id')->references('id')->on('users');
$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'|'restrict'|'set null'|'no action');
$table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade'|'restrict'|'set null'|'no action');
$table->dropForeign(array('user_id'));
$table->dropForeign('posts_user_id_foreign');
```

### 字段类型

```
// 自增
$table->increments('id');
$table->bigIncrements('id');

// 数字
$table->integer('votes');
$table->tinyInteger('votes');
$table->smallInteger('votes');
$table->mediumInteger('votes');
$table->bigInteger('votes');
$table->float('amount');
$table->double('column', 15, 8);
$table->decimal('amount', 5, 2);

// 字符串和文本
$table->char('name', 4);
$table->string('email');
$table->string('name', 100);
$table->text('description');
$table->mediumText('description');
$table->longText('description');

// 日期和时间
$table->date('created_at');
$table->dateTime('created_at');
$table->time('sunrise');
$table->timestamp('added_on');
// Adds created_at and updated_at columns
 // 添加 created_at 和 updated_at 行
$table->timestamps();
$table->nullableTimestamps();

// 其它类型
$table->binary('data');
$table->boolean('confirmed');
// 为软删除添加 deleted_at 字段
$table->softDeletes();
$table->enum('choices', array('foo', 'bar'));
// 添加 remember_token 为 VARCHAR(100) NULL
$table->rememberToken();
// 添加整型的 parent_id 和字符串类型的 parent_type
$table->morphs('parent');
->nullable()
->default($value)
->unsigned()
->comment()
```

</div ><div class="waterfall-item">

## Auth

### 用户认证

```
// 获取 Auth 对象，等同于 Auth Facade
auth();
// 判断当前用户是否已认证（是否已登录）
Auth::check();
// 判断当前用户是否未登录，与 check() 相反
Auth::guest();
// 自定义看守器 默认为 `web`
Auth::guard();
// 获取当前的认证用户
Auth::user();
// 获取当前的认证用户的 ID（未登录情况下会报错）
Auth::id();
// 通过给定的信息来尝试对用户进行认证（成功后会自动启动会话）
Auth::attempt(['email' => $email, 'password' => $password]);
// 通过 Auth::attempt() 传入 true 值来开启 '记住我' 功能
Auth::attempt($credentials, true);
// 注册尝试登录的事件监听器
Auth::attempting($callback);
// 只针对一次的请求来认证用户
Auth::once($credentials);
// 使用 ID 登录，无 Cookie 和会话登录
Auth::onceUsingId($id);
// 登录一个指定用户到应用上
Auth::login(User::find(1), $remember = false);
// 检测是否记住了登录
Auth::viaRemember();
// 登录指定用户 ID 的用户到应用上
Auth::loginUsingId(1, $remember = false);
// 使用户退出登录（清除会话）
Auth::logout();
// 清除当前用户的其他会话
Auth::logoutOtherDevices('password', $attribute = 'password');
// 验证用户凭证
Auth::validate($credentials);
// 使用 HTTP 的基本认证方式来认证
Auth::basic('username');
// 执行「HTTP Basic」登录尝试，只认证一次
Auth::onceBasic();
// 发送密码重置提示给用户
Password::remind($credentials, function($message, $user){});
```

### 用户授权

```
// 定义权限
Gate::define('update-post', 'Class@method');
Gate::define('update-post', function ($user, $post) {...});
// 传递多个参数
Gate::define('delete-comment', function ($user, $post, $comment) {});
// 一次性的定义多个 Gate 方法
Gate::resource('posts',  'App\Policies\PostPolicy');
// 检测权限是否被定义
Gate::has('update-post');

// 检查权限
Gate::denies('update-post', $post);
Gate::allows('update-post', $post);
Gate::check('update-post', $post);
// 指定用户进行检查
Gate::forUser($user)->allows('update-post', $post);
// 在 User 模型下，使用 Authorizable trait
User::find(1)->can('update-post', $post);
User::find(1)->cannot('update-post', $post);
User::find(1)->cant('update-post', $post);

// 拦截所有检查，返回 bool
Gate::before(function ($user, $ability) {});
// 设置每一次验证的回调
Gate::after(function ($user, $ability, $result, $arguments) {});

// Blade 模板语法
@can('update-post', $post)
@endcan
// 支持 else 表达式
@can('update-post', $post)
@else
@endcan
// 无权限判断
@cannot
@endcannot

// 生成一个新的策略
php artisan make:policy PostPolicy
php artisan make:policy PostPolicy --model=Post
// `policy` 帮助函数
policy($post)->update($user, $post)

// 控制器授权
$this->authorize('update', $post);
// 指定用户 $user 授权
$this->authorizeForUser($user, 'update', $post);
// 控制器的 __construct 中授权资源控制器
$this->authorizeResource(Post::class,  'post');

// AuthServiceProvider->boot() 里修改策略自动发现的逻辑
Gate::guessPolicyNamesUsing(function ($modelClass) {
    // 返回模型对应的策略名称，如：// 'App\Model\User' => 'App\Policies\UserPolicy',
    return 'App\Policies\\'.class_basename($modelClass).'Policy';
});

// 中间件指定模型实例
Route::put('/post/{post}',  function  (Post $post)  { ... })->middleware('can:update,post');
// 中间件未指定模型实例
Route::post('/post',  function  ()  { ... })->middleware('can:create,App\Post');
```

</div ><div class="waterfall-item">

## Helper

注：数组和字符串函数将在 5.9 全面废弃，推荐使用 Arr 和 Str Facade

### 数组 & 对象

```
// 如果给定的键不存在于该数组，Arr::add 函数将给定的键值对加到数组中
Arr::add(['name' => 'Desk'], 'price', 100); 
// >>> ['name' => 'Desk', 'price' => 100]
// 将数组的每一个数组折成单一数组
Arr::collapse([[1, 2, 3], [4, 5, 6]]);  
// >>> [1, 2, 3, 4, 5, 6]
// 函数返回两个数组，一个包含原本数组的键，另一个包含原本数组的值
Arr::divide(['key1' => 'val1', 'key2' =>'val2'])
// >>> [["key1","key2"],["val1","val2"]]
// 把多维数组扁平化成一维数组，并用「点」式语法表示深度
Arr::dot($array);
// 从数组移除给定的键值对
Arr::except($array, array('key'));
// 返回数组中第一个通过真值测试的元素
Arr::first($array, function($value, $key){}, $default);
// 将多维数组扁平化成一维
 // ['Joe', 'PHP', 'Ruby'];
Arr::flatten(['name' => 'Joe', 'languages' => ['PHP', 'Ruby']]);
// 以「点」式语法从深度嵌套数组移除给定的键值对
Arr::forget($array, 'foo');
Arr::forget($array, 'foo.bar');
// 使用「点」式语法从深度嵌套数组取回给定的值
Arr::get($array, 'foo', 'default');
Arr::get($array, 'foo.bar', 'default');
// 使用「点」式语法检查给定的项目是否存在于数组中
Arr::has($array, 'products.desk');
// 从数组返回给定的键值对
Arr::only($array, array('key'));
// 从数组拉出一列给定的键值对
Arr::pluck($array, 'key');
// 从数组移除并返回给定的键值对
Arr::pull($array, 'key');
// 使用「点」式语法在深度嵌套数组中写入值
Arr::set($array, 'key', 'value');
Arr::set($array, 'key.subkey', 'value');
// 借由给定闭包结果排序数组
Arr::sort($array, function(){});
// 使用 sort 函数递归排序数组
Arr::sortRecursive();
// 使用给定的闭包过滤数组
Arr::where();
// 数组"洗牌"
Arr::shuffle($array,'I-AM-GROOT');
// 数组包裹(如果不是数组，就变成数组，如果是空的，返回[],否则返回原数据）
Arr::wrap($array);
// 返回给定数组的第一个元素
head($array);
// 返回给定数组的最后一个元素
last($array);
```

### 路径

```
// 取得 app 文件夹的完整路径
app_path();
// 取得项目根目录的完整路径
base_path();
// 取得应用配置目录的完整路径
config_path();
// 取得应用数据库目录的完整路径
database_path();
// 取得加上版本号的 Elixir 文件路径
elixir();
// 取得 public 目录的完整路径
public_path();
// 取得 storage 目录的完整路径
storage_path();
```

### 字符串

```
// 将给定的字符串转换成 驼峰式命名
Str::camel($value);
// 返回不包含命名空间的类名称
class_basename($class);
class_basename($object);
// 对给定字符串运行 htmlentities
e('<html>');
// 判断字符串开头是否为给定内容
Str::startsWith('Foo bar.', 'Foo');
// 判断给定字符串结尾是否为指定内容
Str::endsWith('Foo bar.', 'bar.');
// 将给定的字符串转换成 蛇形命名
Str::snake('fooBar');
// 将给定字符串转换成「首字大写命名」: FooBar
Str::studly('foo_bar');
// 根据你的本地化文件翻译给定的语句
trans('foo.bar');
// 根据后缀变化翻译给定的语句
trans_choice('foo.bar', $count);
```

### URLs and Links

```
// 产生给定控制器行为网址
action('FooController@method', $parameters);
// 根据目前请求的协定（HTTP 或 HTTPS）产生资源文件网址
asset('img/photo.jpg', $title, $attributes);
// 根据 HTTPS 产生资源文件网址
secure_asset('img/photo.jpg', $title, $attributes);
// 产生给定路由名称网址
route($route, $parameters, $absolute = true);
// 产生给定路径的完整网址
url('path', $parameters = array(), $secure = null);
```

### 其他

```
// 返回一个认证器实例。你可以使用它取代 Auth facade
auth()->user();
// 产生一个重定向回应让用户回到之前的位置
back();
// 使用 Bcrypt 哈希给定的数值。你可以使用它替代 Hash facade
bcrypt('my-secret-password');
// 从给定的项目产生集合实例
collect(['taylor', 'abigail']);
// 取得设置选项的设置值
config('app.timezone', $default);
// 产生包含 CSRF 令牌内容的 HTML 表单隐藏字段
{!! csrf_field() !!} 
// 5.7+用这个
@csrf
// 取得当前 CSRF 令牌的内容
$token = csrf_token();
// 输出给定变量并结束脚本运行
dd($value);
// var_dump缩写（如果用dump-server,var_dump可能无效）
dump($value);
// 取得环境变量值或返回默认值
$env = env('APP_ENV');
$env = env('APP_ENV', 'production');
// 配送给定事件到所属的侦听器
event(new UserRegistered($user));
// 根据给定类、名称以及总数产生模型工厂建构器
$user = factory(App\User::class)->make();
// 产生拟造 HTTP 表单动作内容的 HTML 表单隐藏字段
{!! method_field('delete') !!}
// 5.7+
@method('delete')
// 取得快闪到 session 的旧有输入数值
$value = old('value');
$value = old('value', 'default');
// 返回重定向器实例以进行 重定向
 return redirect('/home');
// 取得目前的请求实例或输入的项目
$value = request('key', $default = null)
// 创建一个回应实例或获取一个回应工厂实例
return response('Hello World', 200, $headers);
// 可被用于取得或设置单一 session 内容
$value = session('key');
// 在没有传递参数时，将返回 session 实例
$value = session()->get('key');
session()->put('key', $value);
// 返回给定数值
value(function(){ return 'bar'; });
// 取得视图 实例
return view('auth.login');
// 返回给定的数值
$value = with(new Foo)->work();
```

</div ><div class="waterfall-item">

## Composer

```
composer create-project laravel/laravel folder_name
composer create-project laravel/laravel folder_name --prefer-dist "5.8.*"
composer install
composer install --prefer-dist
composer update
composer update package/name
composer dump-autoload [--optimize]
composer self-update
composer require [options] [--] [vendor/packages]...
// 全局安装
composer require global vendor/packages
// 罗列所有扩展包括版本信息
composer show
```

</div ><div class="waterfall-item">

## Environment

```
$environment = app()->environment();
$environment = App::environment();
// 判断当环境是否为 local
if (app()->environment('local')){}
// 判断当环境是否为 local 或 staging...
if (app()->environment(['local', 'staging'])){}
```

</div ><div class="waterfall-item">

## Log

```
// 记录器提供了 7 种在 RFC 5424 标准内定义的记录等级:
// debug, info, notice, warning, error, critical, and alert.
Log::info('info');
Log::info('info',array('context'=>'additional info'));
Log::error('error');
Log::warning('warning');
// 获取 monolog 实例
Log::getMonolog();
// 添加监听器
Log::listen(function($level, $message, $context) {});
```

### 记录 SQL 查询语句

```
// 开启 log
DB::connection()->enableQueryLog();
// 获取已执行的查询数组
DB::getQueryLog();
```

</div ><div class="waterfall-item">

## URL

```
URL::full();
URL::current();
URL::previous();
URL::to('foo/bar', $parameters, $secure);
URL::action('NewsController@item', ['id'=>123]);
// 需要在适当的命名空间内
URL::action('Auth\AuthController@logout');
URL::action('FooController@method', $parameters, $absolute);
URL::route('foo', $parameters, $absolute);
URL::secure('foo/bar', $parameters);
URL::asset('css/foo.css', $secure);
URL::secureAsset('css/foo.css');
URL::isValidUrl('http://example.com');
URL::getRequest();
URL::setRequest($request);
```

</div ><div class="waterfall-item">

## Event

```
// 1. EventServiceProvider 类里的 $listen 属性
protected $listen =['App\Events\OrderShipped' => ['App\Listeners\SendShipmentNotification']];
// 2. 生成监听类
php artisan event:generate

// 触发命令
Event::dispatch($event, $payload = [], $halt = false);
event($event, $payload = [], $halt = false);
// 触发命令并等待
Event::until($event, $payload = []);
// 注册一个事件监听器.
// void listen(string|array $events, mixed $listener, int $priority)
Event::listen('App\Events\UserSignup', function($bar){});
Event::listen('event.*', function($bar){}); // 通配符监听器
Event::listen('foo.bar', 'FooHandler', 10);
Event::listen('foo.bar', 'BarHandler', 5);
// 你可以直接在处理逻辑中返回 false 来停止一个事件的传播.
Event::listen('foor.bar', function($event){ return false; });
Event::subscribe('UserEventHandler');
// 获取所有监听者
Event::getListeners($eventName);
// 移除事件及其对应的监听者
Event::forget($event);
// 将事件推入堆栈中等待执行
Event::push($event, $payload = []);
// 移除指定的堆栈事件
Event::flush($event);
// 移除所有堆栈中的事件
Event::forgetPushed();
```

</div ><div class="waterfall-item">

## DB

### 基本使用

```
DB::connection('connection_name');
// 运行数据库查询语句
$results = DB::select('select * from users where id = ?', [1]);
$results = DB::select('select * from users where id = :id', ['id' => 1]);
// 运行普通语句
DB::statement('drop table users');
// 监听查询事件
DB::listen(function($sql, $bindings, $time) { code_here; });
// 数据库事务处理
DB::transaction(function() {
    DB::table('users')->update(['votes' => 1]);
    DB::table('posts')->delete();
});
DB::beginTransaction();
DB::rollBack();
DB::commit();

// 获取表前缀
DB::getTablePrefix()
```

### 查询语句构造器 

```
// 取得数据表的所有行
DB::table('name')->get();
// 取数据表的部分数据
DB::table('users')->chunk(100, function($users) {
  foreach ($users as $user) {
      //
  }
});
// 取回数据表的第一条数据
$user = DB::table('users')->where('name', 'John')->first();
DB::table('name')->first();
// 从单行中取出单列数据
$name = DB::table('users')->where('name', 'John')->pluck('name');
DB::table('name')->pluck('column');
// 取多行数据的「列数据」数组
$roles = DB::table('roles')->lists('title');
$roles = DB::table('roles')->lists('title', 'name');
// 指定一个选择字段
$users = DB::table('users')->select('name', 'email')->get();
$users = DB::table('users')->distinct()->get();
$users = DB::table('users')->select('name as user_name')->get();
// 添加一个选择字段到一个已存在的查询语句中
$query = DB::table('users')->select('name');
$users = $query->addSelect('age')->get();
// 使用 Where 运算符
$users = DB::table('users')->where('votes', '>', 100)->get();
$users = DB::table('users')
              ->where('votes', '>', 100)
              ->orWhere('name', 'John')
              ->get();
$users = DB::table('users')
      ->whereBetween('votes', [1, 100])->get();
$users = DB::table('users')
      ->whereNotBetween('votes', [1, 100])->get();
$users = DB::table('users')
      ->whereIn('id', [1, 2, 3])->get();
$users = DB::table('users')
      ->whereNotIn('id', [1, 2, 3])->get();
$users = DB::table('users')
      ->whereNull('updated_at')->get();
DB::table('name')->whereNotNull('column')->get();
// 动态的 Where 字段
$admin = DB::table('users')->whereId(1)->first();
$john = DB::table('users')
      ->whereIdAndEmail(2, 'john@doe.com')
      ->first();
$jane = DB::table('users')
      ->whereNameOrAge('Jane', 22)
      ->first();
// Order By, Group By, 和 Having
$users = DB::table('users')
      ->orderBy('name', 'desc')
      ->groupBy('count')
      ->having('count', '>', 100)
      ->get();
DB::table('name')->orderBy('column')->get();
DB::table('name')->orderBy('column','desc')->get();
DB::table('name')->having('count', '>', 100)->get();
// 偏移 & 限制
$users = DB::table('users')->skip(10)->take(5)->get();
```

### Joins 

```
// 基本的 Join 声明语句
DB::table('users')
    ->join('contacts', 'users.id', '=', 'contacts.user_id')
    ->join('orders', 'users.id', '=', 'orders.user_id')
    ->select('users.id', 'contacts.phone', 'orders.price')
    ->get();
// Left Join 声明语句
DB::table('users')
->leftJoin('posts', 'users.id', '=', 'posts.user_id')
->get();
// select * from users where name = 'John' or (votes > 100 and title <> 'Admin')
DB::table('users')
    ->where('name', '=', 'John')
    ->orWhere(function($query) {
        $query->where('votes', '>', 100)
              ->where('title', '<>', 'Admin');
    })
    ->get();
```

### 聚合 

```
$users = DB::table('users')->count();
$price = DB::table('orders')->max('price');
$price = DB::table('orders')->min('price');
$price = DB::table('orders')->avg('price');
$total = DB::table('users')->sum('votes');
```

### 原始表达句

```
$users = DB::table('users')
                   ->select(DB::raw('count(*) as user_count, status'))
                   ->where('status', '<>', 1)
                   ->groupBy('status')
                   ->get();
// 返回行
DB::select('select * from users where id = ?', array('value'));
DB::insert('insert into foo set bar=2');
DB::update('update foo set bar=2');
DB::delete('delete from bar');
// 返回 void
DB::statement('update foo set bar=2');
// 在声明语句中加入原始的表达式
DB::table('name')->select(DB::raw('count(*) as count, column2'))->get();
```

### Inserts / Updates / Deletes / Unions / Pessimistic Locking

```
// 插入
DB::table('users')->insert(
  ['email' => 'john@example.com', 'votes' => 0]
);
$id = DB::table('users')->insertGetId(
  ['email' => 'john@example.com', 'votes' => 0]
);
DB::table('users')->insert([
  ['email' => 'taylor@example.com', 'votes' => 0],
  ['email' => 'dayle@example.com', 'votes' => 0]
]);
// 更新
DB::table('users')
          ->where('id', 1)
          ->update(['votes' => 1]);
DB::table('users')->increment('votes');
DB::table('users')->increment('votes', 5);
DB::table('users')->decrement('votes');
DB::table('users')->decrement('votes', 5);
DB::table('users')->increment('votes', 1, ['name' => 'John']);
// 删除
DB::table('users')->where('votes', '<', 100)->delete();
DB::table('users')->delete();
DB::table('users')->truncate();
// 集合
 // unionAll() 方法也是可供使用的，调用方式与 union 相似
$first = DB::table('users')->whereNull('first_name');
$users = DB::table('users')->whereNull('last_name')->union($first)->get();
// 消极锁
DB::table('users')->where('votes', '>', 100)->sharedLock()->get();
DB::table('users')->where('votes', '>', 100)->lockForUpdate()->get();
```

</div ><div class="waterfall-item">

## UnitTest

### 安装和运行

```
// 将其加入到 composer.json 并更新:
composer require "phpunit/phpunit:4.0.*"
// 运行测试 (在项目根目录下运行)
./vendor/bin/phpunit
```

### 断言

```
$this->assertTrue(true);
$this->assertEquals('foo', $bar);
$this->assertCount(1,$times);
$this->assertResponseOk();
$this->assertResponseStatus(403);
$this->assertRedirectedTo('foo');
$this->assertRedirectedToRoute('route.name');
$this->assertRedirectedToAction('Controller@method');
$this->assertViewHas('name');
$this->assertViewHas('age', $value);
$this->assertSessionHasErrors();
// 由单个 key 值来假定 session 有错误...
$this->assertSessionHasErrors('name');
// 由多个 key 值来假定 session 有错误...
$this->assertSessionHasErrors(array('name', 'age'));
$this->assertHasOldInput();
```

### 访问路由

```
$response = $this->call($method, $uri, $parameters, $files, $server, $content);
$response = $this->callSecure('GET', 'foo/bar');
$this->session(['foo' => 'bar']);
$this->flushSession();
$this->seed();
$this->seed($connection);
```

## Input

```
Input::get('key');
// 指定默认值
Input::get('key', 'default');
Input::has('key');
Input::all();
// 只取回 'foo' 和 'bar'，返回数组
Input::only('foo', 'bar');
// 取除了 'foo' 的所有用户输入数组
Input::except('foo');
Input::flush();
// 字段 'key' 是否有值，返回 boolean
Input::filled('key');
```

### 会话周期内 Input

```
// 清除会话周期内的输入
Input::flash();
// 清除会话周期内的指定输入
Input::flashOnly('foo', 'bar');
// 清除会话周期内的除了指定的其他输入
Input::flashExcept('foo', 'baz');
// 取回一个旧的输入条目
Input::old('key','default_value');
```

### Files

```
// 使用一个已上传的文件
Input::file('filename');
// 判断文件是否已上传
Input::hasFile('filename');
// 获取文件属性
Input::file('name')->getRealPath();
Input::file('name')->getClientOriginalName();
Input::file('name')->getClientOriginalExtension();
Input::file('name')->getSize();
Input::file('name')->getMimeType();
// 移动一个已上传的文件
Input::file('name')->move($destinationPath);
// 移动一个已上传的文件，并设置新的名字
Input::file('name')->move($destinationPath, $fileName);
```

## Session

```
Session::get('key');
// 从会话中读取一个条目
 Session::get('key', 'default');
Session::get('key', function(){ return 'default'; });
// 获取 session 的 ID
Session::getId();
// 增加一个会话键值数据
Session::put('key', 'value');
// 将一个值加入到 session 的数组中
Session::push('foo.bar','value');
// 返回 session 的所有条目
Session::all();
// 检查 session 里是否有此条目
Session::has('key');
// 从 session 中移除一个条目
Session::forget('key');
// 从 session 中移除所有条目
Session::flush();
// 生成一个新的 session 标识符
Session::regenerate();
// 把一条数据暂存到 session 中
Session::flash('key', 'value');
// 清空所有的暂存数据
Session::reflash();
// 重新暂存当前暂存数据的子集
Session::keep(array('key1', 'key2'));
```

## Response

```
return Response::make($contents);
return Response::make($contents, 200);
return Response::json(array('key' => 'value'));
return Response::json(array('key' => 'value'))
->setCallback(Input::get('callback'));
return Response::download($filepath);
return Response::download($filepath, $filename, $headers);
// 创建一个回应且修改其头部信息的值
$response = Response::make($contents, 200);
$response->header('Content-Type', 'application/json');
return $response;
// 为回应附加上 cookie
return Response::make($content)
->withCookie(Cookie::make('key', 'value'));
```

## Container

```
App::bind('foo', function($app){ return new Foo; });
App::make('foo');
// 如果存在此类, 则返回
App::make('FooBar');
// 单例模式实例到服务容器中
App::singleton('foo', function(){ return new Foo; });
// 将已实例化的对象注册到服务容器中
App::instance('foo', new Foo);
// 注册绑定规则到服务容器中
App::bind('FooRepositoryInterface', 'BarRepository');
// 绑定基本值
App::when('App\Http\Controllers\UserController')->needs('$variableName')->give($value);
// 标记
$this->app->tag(['SpeedReport',  'MemoryReport'],  'reports');
// 给应用注册一个服务提供者
App::register('FooServiceProvider');
// 监听容器对某个对象的解析
App::resolving(function($object){});
resolve('HelpSpot\API');
```

## Security

### 哈希

```
Hash::make('secretpassword');
Hash::check('secretpassword', $hashedPassword);
Hash::needsRehash($hashedPassword);
```

### 加密解密

```
Crypt::encrypt('secretstring');
Crypt::decrypt($encryptedString);
Crypt::setMode('ctr');
Crypt::setCipher($cipher);
```

## Queue

```
Queue::push('SendMail', array('message' => $message));
Queue::push('SendEmail@send', array('message' => $message));
Queue::push(function($job) use $id {});
// 在多个 workers 中使用相同的负载
 Queue::bulk(array('SendEmail', 'NotifyUser'), $payload);
// 开启队列监听器
php artisan queue:listen
php artisan queue:listen connection
php artisan queue:listen --timeout=60
// 只处理第一个队列任务
php artisan queue:work
// 在后台模式启动一个队列 worker
php artisan queue:work --daemon
// 为失败的任务创建 migration 文件
php artisan queue:failed-table
// 监听失败任务
php artisan queue:failed
// 通过 id 删除失败的任务
php artisan queue:forget 5
// 删除所有失败任务
php artisan queue:flush
// 因为队列不会默认使用 PHP memory 参数，需要在队列指定(单位默认mb)
php artisan queue:work --memory=50
```

## Validation

```
Validator::make(
array('key' => 'Foo'),
array('key' => 'required|in:Foo')
);
Validator::extend('foo', function($attribute, $value, $params){});
Validator::extend('foo', 'FooValidator@validate');
Validator::resolver(function($translator, $data, $rules, $msgs)
{
return new FooValidator($translator, $data, $rules, $msgs);
});
```

### 验证规则

```
accepted // 待验证字段必须是 yes ， on ，1 或 true 

active_url

after:YYYY-MM-DD // 待验证字段必须是给定的日期之后的值对应的日期。

// 待验证字段必须是给定的日期之前的值对应的日期。
before:YYYY-MM-DD

alpha // 待验证字段只能由字母组成。

alpha_dash // 待验证字段可能包含字母、数字，短破折号（-）和下划线（_）。

alpha_num // 待验证字段只能由字母和数字组成。

array // 待验证字段必须是有效的 PHP 数组。

between:1,10 // 验证字段的大小必须在给定的 min 和 max 之间。字符串、数字、数组和文件的计算方式都使用size方法

confirmed // 验证字段必须具有匹配字段 foo_confirmation 

date // 根据 PHP strtotime 函数，验证的字段必须是有效的日期。

date_format:YYYY-MM-DD // 验证字段必须匹配给定的日期格式。

different:fieldname // 验证的字段值必须与字段 field 的值不同。

digits:value // 验证的字段必须为 numeric ，并且必须具有确切长度 _value_。

digits_between:min,max // 验证中的字段必须为数字，并且长度必须在给定的 min 和 max 之间。

boolean // 验证的字段必须可以转换为 Boolean 类型。

email // 验证的字段必须符合 e-mail 地址格式。

// 验证的字段必须存在于给定的数据库表中。
exists:table,column


image // 验证的文件必须是图片 (jpeg, png, bmp, gif, svg, or webp)

in:foo,bar,... // 验证字段必须包含在给定的值列表中。
not_in:foo,bar,... // 验证字段不能包含在给定的值的列表中

integer // 验证的字段必须是整数。
numeric // 验证字段必须为数值。
ip // 验证的字段必须是 IP 地址。
max:value // 验证中的字段必须小于或等于 value。字符串、数字、数组或是文件大小的计算方式都用 size规则。
min:value // 验证中的字段必须小于或等于 value。同 max
mimes:jpeg,png // 验证的文件必须具有与列出的其中一个扩展名相对应的 MIME 类型。
regex:[0-9] // 验证字段必须与给定的正则表达式匹配。

required // 验证的字段必须存在于输入数据中，而不是空。
required_if:field,value
required_with:foo,bar,...
required_with_all:foo,bar,...
required_without:foo,bar,...
required_without_all:foo,bar,...

same:field // 验证字段的值必须与给定字段的值相同。
size:value // 验证字段必须与给定值的大小一致。字符串(字符数),数字(数值),数组(count),文件(kb)

timezone // 验证字段必须为符合 timezone_identifiers_list 所定义的有效时区标识。
unique:table,column,except,idColumn // 验证字段在给定的数据库表中必须是唯一的。
url // 验证的字段必须是有效的 URL。
```

## Config

```
// config/app.php 里的 timezone 配置项
Config::get('app.timezone')
Config::get('app.timezone', 'default');
Config::set('database.default', 'sqlite');
// config() 等同于 Config Facade
config()->get('app.timezone');
config('app.timezone', 'default');   // get
config(['database.default' => 'sqlite']); // set
```

## Route

```
Route::get('foo', function(){});
Route::get('foo', 'ControllerName@function');
Route::controller('foo', 'FooController');
```

### 资源路由 

```
Route::resource('posts','PostsController');
// 资源路由器只允许指定动作通过
Route::resource('photo', 'PhotoController',['only' => ['index', 'show']]);
Route::resource('photo', 'PhotoController',['except' => ['update', 'destroy']]);
// 批量注册资源路由
Route::resources(['foo' => 'FooController', 'bar' => 'BarController'])
Route::resources(['foo' => 'FooController', 'bar' => 'BarController'], ['only' => ['index', 'show']])
Route::resources(['foo' => 'FooController', 'bar' => 'BarController'], ['except' => ['update', 'destroy']])
```

### 触发错误 

```
App::abort(404);
$handler->missing(...) in ErrorServiceProvider::boot();
throw new NotFoundHttpException;
```

### 路由参数 

```
Route::get('foo/{bar}', function($bar){});
Route::get('foo/{bar?}', function($bar = 'bar'){});
```

### HTTP 请求方式

```
Route::any('foo', function(){});
Route::post('foo', function(){});
Route::put('foo', function(){});
Route::patch('foo', function(){});
Route::delete('foo', function(){});
// RESTful 资源控制器
Route::resource('foo', 'FooController');
// 为一个路由注册多种请求方式
Route::match(['get', 'post'], '/', function(){});
```

### 安全路由 (TBD)

```
Route::get('foo', array('https', function(){}));
```

### 路由约束

```
Route::get('foo/{bar}', function($bar){})
        ->where('bar', '[0-9]+');
Route::get('foo/{bar}/{baz}', function($bar, $baz){})
        ->where(array('bar' => '[0-9]+', 'baz' => '[A-Za-z]'))

// 设置一个可跨路由使用的模式
 Route::pattern('bar', '[0-9]+')
```

### HTTP 中间件 

```
// 为路由指定 Middleware
Route::get('admin/profile', ['middleware' => 'auth', function(){}]);
Route::get('admin/profile', function(){})->middleware('auth');
```

### 命名路由

```
Route::currentRouteName();
Route::get('foo/bar', array('as' => 'foobar', function(){}));
Route::get('user/profile', [
    'as' => 'profile', 'uses' => 'UserController@showProfile'
]);
Route::get('user/profile', 'UserController@showProfile')->name('profile');
$url = route('profile');
$redirect = redirect()->route('profile');
```

### 路由前缀

```
Route::group(['prefix' => 'admin'], function()
{
    Route::get('users', function(){
        return 'Matches The "/admin/users" URL';
    });
});
```

### 路由命名空间

```
// 此路由组将会传送 'Foo\Bar' 命名空间
Route::group(array('namespace' => 'Foo\Bar'), function(){})
```

### 子域名路由

```
// {sub} 将在闭包中被忽略
Route::group(array('domain' => '{sub}.example.com'), function(){});
```

## Model

### 基础使用

```
// 定义一个 Eloquent 模型
class User extends Model {}
// 生成一个 Eloquent 模型
php artisan make:model User
// 生成一个 Eloquent 模型的时候，顺便生成迁移文件
php artisan make:model User --migration OR -m
// 生成一个 Eloquent 模型的时候，顺便生成迁移文件、控制器（或资源控制器）
php artisan make:model User -mc[r]
// 指定一个自定义的数据表名称
class User extends Model {
  protected $table = 'my_users';
}
```

### More

```
//新增一条新数据
Model::create(array('key' => 'value'));
// 通过属性找到第一条相匹配的数据或创造一条新数据
Model::firstOrCreate(array('key' => 'value'));
// 通过属性找到第一条相匹配的数据或实例化一条新数据
Model::firstOrNew(array('key' => 'value'));
// 通过属性找到相匹配的数据并更新，如果不存在即创建
Model::updateOrCreate(array('search_key' => 'search_value'), array('key' => 'value'));
// 使用属性的数组来填充一个模型, 用的时候要小心「Mass Assignment」安全问题 !
Model::fill($attributes);
Model::destroy(1);
Model::all();
Model::find(1);
// 使用双主键进行查找
Model::find(array('first', 'last'));
// 查找失败时抛出异常
Model::findOrFail(1);
// 使用双主键进行查找, 失败时抛出异常
Model::findOrFail(array('first', 'last'));
Model::where('foo', '=', 'bar')->get();
Model::where('foo', '=', 'bar')->first();
Model::where('foo', '=', 'bar')->exists();
// 动态属性查找
Model::whereFoo('bar')->first();
// 查找失败时抛出异常
Model::where('foo', '=', 'bar')->firstOrFail();
Model::where('foo', '=', 'bar')->count();
Model::where('foo', '=', 'bar')->delete();
// 输出原始的查询语句
Model::where('foo', '=', 'bar')->toSql();
Model::whereRaw('foo = bar and cars = 2', array(20))->get();
Model::on('connection-name')->find(1);
Model::with('relation')->get();
Model::all()->take(10);
Model::all()->skip(10);
// 默认的 Eloquent 排序是上升排序
Model::all()->sortBy('column');
Model::all()->sortDesc('column');

// 查询 json 数据
Model::where('options->language', 'en')->get(); # 字段是字符串
Model::whereJsonContains('options->languages', 'en')->get(); # 字段是数组
Model::whereJsonLength('options->languages', 0)->get(); # 字段长度为 0
Model::whereJsonDoesntContain('options->languages', 'en')->get(); # 字段是数组, 不包含
```

### 软删除

```
Model::withTrashed()->where('cars', 2)->get();
// 在查询结果中包括带被软删除的模型
Model::withTrashed()->where('cars', 2)->restore();
Model::where('cars', 2)->forceDelete();
// 查找只带有软删除的模型
Model::onlyTrashed()->where('cars', 2)->get();
```

### 模型关联

```
// 一对一 - User::phone()
return $this->hasOne('App\Phone', 'foreign_key', 'local_key');
// 一对一 - Phone::user(), 定义相对的关联
return $this->belongsTo('App\User', 'foreign_key', 'other_key');

// 一对多 - Post::comments()
return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
//  一对多 - Comment::post()
return $this->belongsTo('App\Post', 'foreign_key', 'other_key');

// 多对多 - User::roles();
return $this->belongsToMany('App\Role', 'user_roles', 'user_id', 'role_id');
// 多对多 - Role::users();
return $this->belongsToMany('App\User');
// 多对多 - Retrieving Intermediate Table Columns
$role->pivot->created_at;
// 多对多 - 中介表字段
return $this->belongsToMany('App\Role')->withPivot('column1', 'column2');
// 多对多 - 自动维护 created_at 和 updated_at 时间戳
return $this->belongsToMany('App\Role')->withTimestamps();

// 远层一对多 - Country::posts(), 一个 Country 模型可能通过中介的 Users
// 模型关联到多个 Posts 模型(User::country_id)
return $this->hasManyThrough('App\Post', 'App\User', 'country_id', 'user_id');

// 多态关联 - Photo::imageable()
return $this->morphTo();
// 多态关联 - Staff::photos()
return $this->morphMany('App\Photo', 'imageable');
// 多态关联 - Product::photos()
return $this->morphMany('App\Photo', 'imageable');
// 多态关联 - 在 AppServiceProvider 中注册你的「多态对照表」
Relation::morphMap([
    'Post' => App\Post::class,
    'Comment' => App\Comment::class,
]);

// 多态多对多关联 - 涉及数据库表: posts,videos,tags,taggables
// Post::tags()
return $this->morphToMany('App\Tag', 'taggable');
// Video::tags()
return $this->morphToMany('App\Tag', 'taggable');
// Tag::posts()
return $this->morphedByMany('App\Post', 'taggable');
// Tag::videos()
return $this->morphedByMany('App\Video', 'taggable');

// 查找关联
$user->posts()->where('active', 1)->get();
// 获取所有至少有一篇评论的文章...
$posts = App\Post::has('comments')->get();
// 获取所有至少有三篇评论的文章...
$posts = Post::has('comments', '>=', 3)->get();
// 获取所有至少有一篇评论被评分的文章...
$posts = Post::has('comments.votes')->get();
// 获取所有至少有一篇评论相似于 foo% 的文章
$posts = Post::whereHas('comments', function ($query) {
    $query->where('content', 'like', 'foo%');
})->get();

// 预加载
$books = App\Book::with('author')->get();
$books = App\Book::with('author', 'publisher')->get();
$books = App\Book::with('author.contacts')->get();

// 延迟预加载
$books->load('author', 'publisher');

// 写入关联模型
$comment = new App\Comment(['message' => 'A new comment.']);
$post->comments()->save($comment);
// Save 与多对多关联
$post->comments()->saveMany([
    new App\Comment(['message' => 'A new comment.']),
    new App\Comment(['message' => 'Another comment.']),
]);
$post->comments()->create(['message' => 'A new comment.']);

// 更新「从属」关联
$user->account()->associate($account);
$user->save();
$user->account()->dissociate();
$user->save();

// 附加多对多关系
$user->roles()->attach($roleId);
$user->roles()->attach($roleId, ['expires' => $expires]);
// 从用户上移除单一身份...
$user->roles()->detach($roleId);
// 从用户上移除所有身份...
$user->roles()->detach();
$user->roles()->detach([1, 2, 3]);
$user->roles()->attach([1 => ['expires' => $expires], 2, 3]);

// 任何不在给定数组中的 IDs 将会从中介表中被删除。
$user->roles()->sync([1, 2, 3]);
// 你也可以传递中介表上该 IDs 额外的值：
$user->roles()->sync([1 => ['expires' => true], 2, 3]);
```

### 事件

```
Model::retrieved(function($model){});
Model::creating(function($model){});
Model::created(function($model){});
Model::updating(function($model){});
Model::updated(function($model){});
Model::saving(function($model){});
Model::saved(function($model){});
Model::deleting(function($model){});
Model::deleted(function($model){});
Model::restoring(function($model){});
Model::restored(function($model){});
Model::observe(new FooObserver);
```

### Eloquent 配置信息

```
// 关闭模型插入或更新操作引发的 「mass assignment」异常
Eloquent::unguard();
// 重新开启「mass assignment」异常抛出功能
Eloquent::reguard();
```

## Cache

```
// 获取缓存对象，约等于 Cache
cache()
// 注意 5.8 缓存单位为「秒」，之前版本为「分」
Cache::put('key', 'value', $seconds);
// 未设置过期时间将永久有效
Cache::put('key',  'value'); 
Cache::add('key', 'value', $seconds);
Cache::forever('key', 'value');
Cache::sear('key', function(){ return 'value' });
Cache::remember('key', $seconds, function(){ return 'value' });
Cache::rememberForever('key', function(){ return 'value' });
Cache::forget('key');
Cache::has('key');
Cache::get('key');
Cache::get('key', 'default');
Cache::get('key', function(){ return 'default'; });
// 取到数据之后再删除它
Cache::pull('key'); 
// 清空所有缓存
Cache::flush();
Cache::increment('key');
Cache::increment('key', $amount);
Cache::decrement('key');
Cache::decrement('key', $amount);
Cache::tags('my-tag')->put('key','value', $seconds);
Cache::tags('my-tag')->has('key');
Cache::tags('my-tag')->get('key');
Cache::tags(['people',  'artists'])->put('John',  $john,  $seconds);
Cache::tags('my-tag')->forget('key');
Cache::tags('my-tag')->flush();
Cache::tags(['people',  'authors'])->flush();
Cache::section('group')->put('key', $value);
Cache::section('group')->get('key');
Cache::section('group')->flush();
Cache::tags(['people',  'artists'])->put('John',  $john,  $seconds);
// 辅助函数
cache('key');
cache(['key' => 'value'], $seconds);
cache(['key' => 'value'], now()->addMinutes(10));
cache()->remember('users',  $seconds,  function() { return  User::all(); });
// 指定缓存存储
Cache::store('file')->get('foo');
Cache::store('redis')->put('name',  'Jack',  600);  // 10 分钟
// 事件
'Illuminate\Cache\Events\CacheHit' => ['App\Listeners\LogCacheHit',],
'Illuminate\Cache\Events\CacheMissed' => ['App\Listeners\LogCacheMissed',],
'Illuminate\Cache\Events\KeyForgotten' => ['App\Listeners\LogKeyForgotten',],
'Illuminate\Cache\Events\KeyWritten' => ['App\Listeners\LogKeyWritten',],
```

## Cookie

```
// 等于 Cookie
cookie();
request()->cookie('name');
Cookie::get('key');
Cookie::get('key', 'default');
// 创建一个永久有效的 cookie
Cookie::forever('key', 'value');
// 创建一个 N 分钟有效的 cookie
Cookie::make('key', 'value', 'minutes');
cookie('key', 'value', 'minutes');
// 在回应之前先积累 cookie，回应时统一返回
Cookie::queue('key', 'value', 'minutes');
// 移除 Cookie
Cookie::forget('key');
// 从 response 发送一个 cookie
$response = Response::make('Hello World');
$response->withCookie(Cookie::make('name', 'value', $minutes));
// 设置未加密 Cookie app/Http/Middleware/EncryptCookies.php
EncryptCookies->except = ['cookie_name_1'];
```

## Request

```
//获取请求参数 form-data 与 raw 请求类型
request()->input();
// url: http://xx.com/aa/bb
Request::url();
// 路径: /aa/bb
Request::path();
// 获取请求 Uri: /aa/bb/?c=d
Request::getRequestUri();
// 返回用户的 IP
Request::ip();
// 获取 Uri: http://xx.com/aa/bb/?c=d
Request::getUri();
// 获取查询字符串: c=d
Request::getQueryString();
// 获取请求端口 (例如 80, 443 等等)
Request::getPort();
// 判断当前请求的 URI 是否可被匹配
Request::is('foo/*');
// 获取 URI 的分段值 (索引从 1 开始)
Request::segment(1);
// 从请求中取回头部信息
Request::header('Content-Type');
// 从请求中取回服务器变量
Request::server('PATH_INFO');
// 判断请求是否是 AJAX 请求
Request::ajax();
// 判断请求是否使用 HTTPS
Request::secure();
// 获取请求方法
Request::method();
// 判断请求方法是否是指定类型的
Request::isMethod('post');
// 获取原始的 POST 数据
Request::instance()->getContent();
// 获取请求要求返回的格式
Request::format();
// 判断 HTTP Content-Type 头部信息是否包含 */json
Request::isJson();
// 判断 HTTP Accept 头部信息是否为 application/json
Request::wantsJson();
```

## Redirect

```
return Redirect::to('foo/bar');
return Redirect::to('foo/bar')->with('key', 'value');
return Redirect::to('foo/bar')->withInput(Input::get());
return Redirect::to('foo/bar')->withInput(Input::except('password'));
return Redirect::to('foo/bar')->withErrors($validator);
// 重定向到之前的请求
return Redirect::back();
// 重定向到命名路由（根据命名路由算出 URL）
return Redirect::route('foobar');
return Redirect::route('foobar', array('value'));
return Redirect::route('foobar', array('key' => 'value'));
// 重定向到控制器动作（根据控制器动作算出 URL）
return Redirect::action('FooController@index');
return Redirect::action('FooController@baz', array('value'));
return Redirect::action('FooController@baz', array('key' => 'value'));
// 跳转到目的地址，如果没有设置则使用默认值 foo/bar
return Redirect::intended('foo/bar');
```

## Mail

```
Mail::send('email.view', $data, function($message){});
Mail::send(array('html.view', 'text.view'), $data, $callback);
Mail::queue('email.view', $data, function($message){});
Mail::queueOn('queue-name', 'email.view', $data, $callback);
Mail::later(5, 'email.view', $data, function($message){});
// 临时将发送邮件请求写入 log，方便测试
 Mail::pretend();
```

### 消息

```
// 这些都能在 $message 实例中使用, 并可传入到 Mail::send() 或 Mail::queue()
$message->from('email@example.com', 'Mr. Example');
$message->sender('email@example.com', 'Mr. Example');
$message->returnPath('email@example.com');
$message->to('email@example.com', 'Mr. Example');
$message->cc('email@example.com', 'Mr. Example');
$message->bcc('email@example.com', 'Mr. Example');
$message->replyTo('email@example.com', 'Mr. Example');
$message->subject('Welcome to the Jungle');
$message->priority(2);
$message->attach('foo\bar.txt', $options);
// 使用内存数据作为附件
$message->attachData('bar', 'Data Name', $options);
// 附带文件，并返回 CID
$message->embed('foo\bar.txt');
$message->embedData('foo', 'Data Name', $options);
// 获取底层的 Swift Message 对象
$message->getSwiftMessage();
```

## View

```
View::make('path/to/view');
View::make('foo/bar')->with('key', 'value');
View::make('foo/bar')->withKey('value');
View::make('foo/bar', array('key' => 'value'));
View::exists('foo/bar');
// 跨视图共享变量
View::share('key', 'value');
// 视图嵌套
View::make('foo/bar')->nest('name', 'foo/baz', $data);
// 注册一个视图构造器
View::composer('viewname', function($view){});
// 注册多个视图到一个视图构造器中
View::composer(array('view1', 'view2'), function($view){});
// 注册一个视图构造器类
View::composer('viewname', 'FooComposer');
View::creator('viewname', function($view){});
```

## Blade

```
// 输出内容，被转义过的
{\{ $var }}
// 输出未转义内容
{!! $var !!}
{\{-- Blade 注释，不会被输出到页面中 --}}
// 三元表达式的简写，以下相当于「isset($name) ? $name : 'Default'」
{\{ $name ?? 'Default' }}
// 等同 echo json_encode($array);
@json($array);
// 禁用 HTML 实体双重编码
Blade::withoutDoubleEncoding();
// 书写 PHP 代码
@php 
@endphp
@csrf // CSRF 域
@method('PUT') // HTML 表单伪造方法 _method
// 服务容器注入，后调用 {\{ $metrics->monthlyRevenue() }}
@inject('metrics', 'App\Services\MetricsService')
```

### 包含和继承

```
// 扩展布局模板
@extends('layout.name')
// 区块占位
@yield('name')
// 第一种、直接填入扩展内容
@section('title',  'Page Title')
// 第二种、实现命名为 name 的区块（yield 占位的地方）
@section('sidebar')
    // 继承父模板内容
    @parent
@endsection
// 可继承内容区块
@section('sidebar')
@show
// 继承父模板内容（@show 的区块内容）
@parent
// 包含子视图
@include('view.name')
// 包含子视图，并传参
@include('view.name', ['key' => 'value']);
@includeIf('view.name',  ['some'  =>  'data'])
@includeWhen($boolean,  'view.name',  ['some'  =>  'data'])
// 包含给定视图数组中第一个存在的视图
@includeFirst(['custom.admin',  'admin'],  ['some'  =>  'data'])
// 加载本地化语句
@lang('messages.name')
@choice('messages.name', 1);
// 检查片断是否存在
@hasSection('navigation')
        @yield('navigation')
@endif
// 迭代 jobs 数组并包含
@each('view.name',  $jobs,  'job')
@each('view.name',  $jobs,  'job',  'view.empty')
// 堆栈
@stack('scripts')
@push('scripts')
    <script src="/example.js"></script>
@endpush
// 栈顶插入
@prepend('scripts')
@endprepend
// 组件
@component('alert', ['foo' => 'bar'])
    @slot('title')
    @endslot
@endcomponent
// 注册别名 @alert(['type' => 'danger'])...@endalert
Blade::component('components.alert',  'alert');
```

### 条件语句

```
@if (count($records) === 1)
@elseif  (count($records) > 1)
@else
@endif
// 登录情况下
@unless (Auth::check())
@endunless
// $records 被定义且不是  null...
@isset($records)
@endisset
// $records 为空...
@empty($records)
@endempty
// 此用户身份已验证...
@auth // 或 @auth('admin')
@endauth
// 此用户身份未验证...
@guest // 或 @guest('admin')
@endguest
@switch($i)
    @case(1)
        @break
    @default
        // 默认
@endswitch
```

### 循环

```
// for 循环
@for ($i = 0; $i < 10; $i++)
@endfor
// foreach 迭代
@foreach ($users as $user)
@endforeach
// 迭代如果为空的话
@forelse ($users as $user)
@empty
@endforelse
// while 循环
@while (true)
@endwhile
// 终结循环
@continue
@continue($user->type  ==  1) // 带条件
// 跳过本次迭代
@break
@break($user->number  ==  5) // 带条件
// 循环变量
$loop->index        // 当前迭代的索引（从 0 开始计数）。
$loop->iteration    // 当前循环迭代 (从 1 开始计算）。
$loop->remaining    // 循环中剩余迭代的数量。
$loop->count        // 被迭代的数组元素的总数。
$loop->first        // 是否为循环的第一次迭代。
$loop->last         // 是否为循环的最后一次迭代。
$loop->depth        // 当前迭代的嵌套深度级数。
$loop->parent       // 嵌套循环中，父循环的循环变量
```

### JavaScript 代码

```
// JS 框架，保留双大括号，以下会编译为 {\{ name }}
@{\{ name }}
// 大段 JavaScript 变量，verbatim 里模板引擎将不解析
@verbatim
        Hello, {\{ javascriptVariableName }}.
@endverbatim
```

## String

```
// 将 UTF-8 的值直译为 ASCII 类型的值
Str::ascii($value)
Str::camel($value)
Str::contains($haystack, $needle)
Str::endsWith($haystack, $needles)
Str::finish($value, $cap)
Str::is($pattern, $value)
Str::length($value)
Str::limit($value, $limit = 100, $end = '...')
Str::lower($value)
Str::words($value, $words = 100, $end = '...')
Str::plural($value, $count = 2)
// 生成更加真实的 "随机" 字母数字字符串.
Str::random($length = 16)
// 生成一个 "随机" 字母数字字符串.
Str::quickRandom($length = 16)
Str::upper($value)
Str::title($value)
Str::singular($value)
Str::slug($title, $separator = '-')
Str::snake($value, $delimiter = '_')
Str::startsWith($haystack, $needles)
Str::studly($value)
Str::macro($name, $macro)
```

## Collection

```
// 创建集合
collect([1, 2, 3]);
// 返回该集合所代表的底层数组：
$collection->all();
// 返回集合中所有项目的平均值：
collect([1, 1, 2, 4])->avg() // 2
$collection->average();
// 将集合拆成多个给定大小的较小集合：
collect([1, 2, 3, 4, 5])->chunk(2); // [[1,2], [3,4], [5]]
// 将多个数组组成的集合折成单一数组集合：
collect([[1],  [4,  5]])->collapse(); // [1, 4, 5]
// 将一个集合的值作为键，再将另一个集合作为值合并成一个集合
collect(['name', 'age'])->combine(['George', 29]);
// 将给定的 数组 或集合值追加到集合的末尾
collect(['PHP'])->concat(['Laravel']); // ['PHP', 'Laravel']
// 用来判断该集合是否含有指定的项目：
collect(['name' => 'Desk'])->contains('Desk'); // true
collect(['name' => 'Desk'])->contains('name',  'Desk'); // true
// 返回该集合内的项目总数：
$collection->count();
// 交叉连接指定数组或集合的值，返回所有可能排列的笛卡尔积
collect([1, 2])->crossJoin(['a', 'b']); // [[1, 'a'],[1, 'b'],[2, 'a'],[2, 'b']]
// dd($collection) 的另一个写法
collect(['John Doe', 'Jane Doe'])->dd();
// 返回原集合中存在而指定集合中不存在的值
collect([1,  2,  3])->diff([2, 4]); // [1, 3]
// 返回原集合不存在与指定集合的键 / 值对
collect(['color' => 'orange', 'remain' =>  6])->diffAssoc(['color' => 'yellow', 'remain' => 6, 'used' => 6]);  // ['color' => 'orange']
// 返回原集合中存在而指定集合中不存在键所对应的键 / 值对
collect(['one' => 10, 'two' => 20])->diffKeys(['two' => 2, 'four' => 4]); // ['one' => 10]
// 类似于 dd() 方法，但是不会中断
collect(['John Doe', 'Jane Doe'])->dump();
// 遍历集合中的项目，并将之传入给定的回调函数：
$collection = $collection->each(function ($item, $key) {});
// 验证集合中的每一个元素是否通过指定的条件测试
collect([1,  2])->every(function  ($value,  $key)  { return $value > 1; }); // false
// 返回集合中排除指定键的所有项目：
$collection->except(['price', 'discount']);
// 以给定的回调函数筛选集合，只留下那些通过判断测试的项目：
$filtered = $collection->filter(function ($item) {
    return $item > 2;
});
// 返回集合中，第一个通过给定测试的元素：
collect([1, 2, 3, 4])->first(function ($key, $value) {
    return $value > 2;
});
// 将多维集合转为一维集合：
$flattened = $collection->flatten();
// 将集合中的键和对应的数值进行互换：
$flipped = $collection->flip();
// 以键自集合移除掉一个项目：
$collection->forget('name');
// 返回含有可以用来在给定页码显示项目的新集合：
$chunk = $collection->forPage(2, 3);
// 返回给定键的项目。如果该键不存在，则返回 null：
$value = $collection->get('name');
// 根据给定的键替集合内的项目分组：
$grouped = $collection->groupBy('account_id');
// 用来确认集合中是否含有给定的键：
$collection->has('email');
// 用来连接集合中的项目
$collection->implode('product', ', ');
// 移除任何给定数组或集合内所没有的数值：
$intersect = $collection->intersect(['Desk', 'Chair', 'Bookcase']);
// 假如集合是空的，isEmpty 方法会返回 true：
collect([])->isEmpty();
// 以给定键的值作为集合项目的键：
$keyed = $collection->keyBy('product_id');
// 传入回调函数，该函数会返回集合的键的值：
$keyed = $collection->keyBy(function ($item) {
    return strtoupper($item['product_id']);
});
// 返回该集合所有的键：
$keys = $collection->keys();
// 返回集合中，最后一个通过给定测试的元素：
$collection->last();
// 遍历整个集合并将每一个数值传入给定的回调函数：
$multiplied = $collection->map(function ($item, $key) {
    return $item * 2;
});
// 返回给定键的最大值：
$max = collect([['foo' => 10], ['foo' => 20]])->max('foo');
$max = collect([1, 2, 3, 4, 5])->max();
// 将合并指定的数组或集合到原集合：
$merged = $collection->merge(['price' => 100, 'discount' => false]);
// 返回给定键的最小值：
$min = collect([['foo' => 10], ['foo' => 20]])->min('foo');
$min = collect([1, 2, 3, 4, 5])->min();
// 返回集合中指定键的所有项目：
$filtered = $collection->only(['product_id', 'name']);
// 获取所有集合中给定键的值：
$plucked = $collection->pluck('name');
// 移除并返回集合最后一个项目：
$collection->pop();
// 在集合前面增加一个项目：
$collection->prepend(0);
// 传递第二个参数来设置前置项目的键：
$collection->prepend(0, 'zero');
// 以键从集合中移除并返回一个项目：
$collection->pull('name');
// 附加一个项目到集合后面：
$collection->push(5);
// put 在集合内设置一个给定键和数值：
$collection->put('price', 100);
// 从集合中随机返回一个项目：
$collection->random();
// 传入一个整数到 random。如果该整数大于 1，则会返回一个集合：
$random = $collection->random(3);
// 会将每次迭代的结果传入到下一次迭代：
$total = $collection->reduce(function ($carry, $item) {
    return $carry + $item;
});
// 以给定的回调函数筛选集合：
$filtered = $collection->reject(function ($item) {
    return $item > 2;
});
// 反转集合内项目的顺序：
$reversed = $collection->reverse();
// 在集合内搜索给定的数值并返回找到的键：
$collection->search(4);
// 移除并返回集合的第一个项目：
$collection->shift();
// 随机排序集合的项目：
$shuffled = $collection->shuffle();
// 返回集合从给定索引开始的一部分切片：
$slice = $collection->slice(4);
// 对集合排序：
$sorted = $collection->sort();
// 以给定的键排序集合：
$sorted = $collection->sortBy('price');
// 移除并返回从指定的索引开始的一小切片项目：
$chunk = $collection->splice(2);
// 返回集合内所有项目的总和：
collect([1, 2, 3, 4, 5])->sum();
// 返回有着指定数量项目的集合：
$chunk = $collection->take(3);
// 将集合转换成纯 PHP 数组：
$collection->toArray();
// 将集合转换成 JSON：
$collection->toJson();
// 遍历集合并对集合内每一个项目调用给定的回调函数：
$collection->transform(function ($item, $key) {
    return $item * 2;
});
// 返回集合中所有唯一的项目：
$unique = $collection->unique();
// 返回键重设为连续整数的的新集合：
$values = $collection->values();
// 以一对给定的键／数值筛选集合：
$filtered = $collection->where('price', 100);
// 将集合与给定数组同样索引的值合并在一起：
$zipped = $collection->zip([100, 200]);
//把集合放到回调参数中并返回回调的结果:
collect([1, 2, 3])->pipe(function ($collection) {
    return $collection->sum();
});//6
```

## Storage

```
// 写入文件
Storage::put('avatars/1', $fileContents);
// 指定磁盘
Storage::disk('local')->put('file.txt', 'Contents');
Storage::get('file.jpg');
Storage::exists('file.jpg');
Storage::download('file.jpg',  $name,  $headers);
Storage::url('file.jpg');
Storage::temporaryUrl('file.jpg', now()->addMinutes(5));
Storage::size('file.jpg');
Storage::lastModified('file.jpg');
// 自动为文件名生成唯一的ID...  
Storage::putFile('photos',  new  File('/path/to/photo'));
// 手动指定文件名...  
Storage::putFileAs('photos', new  File('/path/to/photo'), 'photo.jpg');
Storage::prepend('file.log', 'Prepended Text');
Storage::append('file.log', 'Appended Text');
Storage::copy('old/file.jpg', 'new/file.jpg');
Storage::move('old/file.jpg', 'new/file.jpg');
Storage::putFileAs('avatars', $request->file('avatar'), Auth::id());
// 「可见性」是对多个平台的文件权限的抽象
Storage::getVisibility('file.jpg');
Storage::setVisibility('file.jpg',  'public')
Storage::delete('file.jpg');
Storage::delete(['file.jpg',  'file2.jpg']);
// 获取目录下的所有的文件
Storage::files($directory);
Storage::allFiles($directory);
// 获取目录下的所有目录
Storage::directories($directory);
Storage::allDirectories($directory);
// 创建目录
Storage::makeDirectory($directory);
// 删除目录
Storage::deleteDirectory($directory);
```





</div >