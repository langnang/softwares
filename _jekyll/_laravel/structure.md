---
title: 文件夹结构（structure） - Laravel
---

```sh
laravel
├─.github     
│  └─workflows
├─app     # 包含你的程序的核心代码。我们很快会详细地研究这个目录；不管怎样，应用程序中几乎所有的类都将位于此目录中。
│  ├─Admin
│  │  ├─Controllers
│  │  └─Metrics
│  │      └─Examples
│  ├─Console
│  ├─Exceptions    
│  ├─Helpers       
│  ├─Http
│  │  ├─Controllers
│  │  └─Middleware
│  ├─Models
│  └─Providers
├─bootstrap    # 包含了框架的启动文件 app.php 。该目录还包含 cache 目录，其中包含用于性能优化的框架生成的文件，例如路由和服务缓存文件。
│  └─cache
├─config    # 包含应用程序的所有配置文件。最好把这些文件都浏览一遍，并熟悉所有可用的选项。
├─database    # 包含 数据库迁移，模型工厂和 种子生成器 文件。如果你喜欢，你还可以把它作为 SQLite 数据库存放目录。
│  ├─factories
│  ├─migrations
│  ├─schema
│  └─seeders
├─node_modules    # 包含你的 Node 依赖。
├─public    # 包含 index.php 文件，它是进入应用程序的所有请求的入口，并配置自动加载。该目录还包含您的资源，如图像、JavaScript 脚本和 CSS 样式。
├─resources    # 包含了视图和未编译的资源文件（如 LESS、SASS 或 JavaScript）。此目录还包含你所有的语言文件。
├─routes    # 包含应用程序的所有路由定义。
│  ├─api.php    # 该文件包含 RouteServiceProvider 放置在 api 中间件组中的路由，后者提供速率限制。这些路由是无状态的，因此通过这些路由进入应用程序的请求将通过令牌进行身份验证，并且不能访问会话状态。
│  ├─console.php   # 该文件是您可以定义所有基于闭包的控制台命令的地方。每个闭包都绑定到一个命令实例，允许使用一种简单的方法与每个命令的进行 IO 交互。尽管这个文件没有定义 HTTP 路由，但是它定义了应用程序中基于控制台的入口点（路由）。
│  ├─channels.php   # 该文件是您可以注册应用程序支持的所有事件广播频道的位置。
│  └─web.php    # 该文件包含 RouteServiceProvider 放置在 web 中间件组中的路由，后者提供会话状态、CSRF 保护和 cookie 加密。如果您的应用程序不提供无状态的 RESTful API，那么您的所有路由都很可能在 web.php 文件。
├─storage    # 包含由 Blade 框架生成的基于目录的模板、文件和缓存。
│  ├─app    # 可用于存储应用程序生成的任何文件。
│  │  └─public    # 用来存储用户生成的文件，例如应该公开访问的用户头像。
│  ├─framework    # 用于存储框架生成的文件和缓存。
│  └─logs    # 包含应用程序的日志文件。包含应用程序的日志文件。
├─tests     # 包含自动化测试类。
├─vendor    # 包含你的 Composer 依赖。
```

## 介绍

默认的 Laravel 应用程序结构旨在为大型和小型应用程序提供一个良好的起点。但是你可以自由地组织你的应用程序。只要 Composer 可以自动加载类，Laravel 几乎不限制任何给定类的位置。

## 根目录

#### App 目录

`app` 包含你的程序的核心代码。我们很快会详细地研究这个目录；不管怎样，应用程序中几乎所有的类都将位于此目录中。

#### Bootstrap 目录

`bootstrap` 目录包含了框架的启动文件 `app.php` 。该目录还包含 `cache` 目录，其中包含用于性能优化的框架生成的文件，例如路由和服务缓存文件。

#### Config 目录

顾名思义，`config` 目录包含应用程序的所有配置文件。最好把这些文件都浏览一遍，并熟悉所有可用的选项。

#### Database 目录

`database` 目录包含 数据库迁移，模型工厂和 种子生成器 文件。如果你喜欢，你还可以把它作为 SQLite 数据库存放目录。

#### Public 目录

`public` 包含 `index.php` 文件，它是进入应用程序的所有请求的入口，并配置自动加载。该目录还包含您的资源，如图像、JavaScript 脚本和 CSS 样式。

#### Resources 目录

`resources` 目录包含了视图和未编译的资源文件（如 LESS、SASS 或 JavaScript）。此目录还包含你所有的语言文件。

#### Routes 目录

`routes` 目录包含应用程序的所有路由定义。默认情况下，Laravel 包含几个路由文件：`web.php`, `api.php`, `console.php` 以及 `channels.php`。

`web.php` 文件包含 `RouteServiceProvider` 放置在 `web` 中间件组中的路由，后者提供会话状态、CSRF 保护和 cookie 加密。如果您的应用程序不提供无状态的 RESTful API，那么您的所有路由都很可能在 `web.php` 文件。

`api.php` 文件包含 `RouteServiceProvider` 放置在 `api` 中间件组中的路由，后者提供速率限制。这些路由是无状态的，因此通过这些路由进入应用程序的请求将通过令牌进行身份验证，并且不能访问会话状态。

`console.php` 文件是您可以定义所有基于闭包的控制台命令的地方。每个闭包都绑定到一个命令实例，允许使用一种简单的方法与每个命令的进行 IO 交互。尽管这个文件没有定义 HTTP 路由，但是它定义了应用程序中基于控制台的入口点（路由）。

`channels.php` 文件是您可以注册应用程序支持的所有事件广播频道的位置。

#### Storage 目录

`storage` 包含由 Blade 框架生成的基于目录的模板、文件和缓存。这个目录分成 `app`、`framework` 和 `logs` 目录。`app` 目录可用于存储应用程序生成的任何文件。`framework` 目录用于存储框架生成的文件和缓存。最后，`logs` 目录包含应用程序的日志文件。

`storage/app/public` 目录用来存储用户生成的文件，例如应该公开访问的用户头像。你可能创建一个指向到这个目录软链接 `public/storage` ， 你可以通过这个命令 `php artisan storage:link` 。

#### Tests 目录

`tests` 目录包含自动化测试类。 目录提供了一个测试示例 [PHPUnit](https://phpunit.de/) 。 每个测试类都应该用单词 `Test` 作为后缀。您可以使用 `phpunit` 或 `php vendor/bin/phpunit` 命令运行测试。

#### Vendor 目录

`vendor` 目录包含你的 [Composer](https://getcomposer.org/) 依赖。

## App 目录

应用程序的大部分都位于 `app` 目录中。默认情况下，此目录的名称空间在 `App` 下，并由 Composer 使用 [PSR-4 自动加载](https://www.php-fig.org/psr/psr-4/)。

`app` 目录包含各种目录，如 `Console`、`Http` 和 `Providers`。可以将 `Console` 和 `Http` 目录看作是为应用程序的核心提供了一个 API。HTTP 协议和 CLI 都是与应用程序交互的机制，但实际上并不包含应用程序逻辑。换句话说，它们是向应用程序发出命令的两种方式。`Console` 目录包含所有 Artisan 命令，而 `Http` 目录包含控制器、中间件和请求。

当您使用 `make` Artisan 命令生成类时，将在 `app` 目录内生成各种目录。因此，例如 当你执行 `make:job` 命令生成队列任务时，将会生成 `app/Jobs` 目录。

> 技巧：`app` 目录中的许多类可以由 Artisan 通过命令生成。要查看可用的命令，请在终端中运行 `php artisan list make` 命令。

#### Broadcasting 目录

`Broadcasting` 目录包含应用程序的所有广播频道类，这些类都是通过 `make:channel` 命令生成的。这个目录默认是不存在的，但是当你创建第一个广播频道类时候时它会自动生成。要了解有关频道的更多信息，请查看 [广播系统](https://learnku.com/docs/laravel/8.x/broadcasting)。

#### Console 目录

`Console` 目录包含应用所有自定义的 Artisan 命令， 这些类通过 `make:command` 命令生成。 此目录也安置了控制台内核，在其中你可以注册自定义的 Artisan 命令，并定义 [计划任务](https://learnku.com/docs/laravel/8.x/scheduling)。

#### Events 目录

该目录默认不存在，但可以通过 `event:generate` 和 `make:event` 命令创建。`Events` 目录用于存放 [事件类](https://learnku.com/docs/laravel/8.x/events)。事件类用于告知应用其他部分某个事件发生情况并提供灵活的、解耦的处理机制。

#### Exceptions 目录

`Exceptions` 目录包含应用的异常处理器，同时还是处理应用抛出的任何异常的好地方。如果你想要自定义异常如何记录或渲染，需要编辑该目录下的 `Handler` 类.

#### Http 目录

`Http` 目录包含了控制器、中间件以及表单请求等，几乎所有通过 Web 进入应用的请求处理都在这里进行。

#### Jobs 目录

该目录默认不存在，但可以通过执行 `make:job` 命令生产，`Jobs` 目录用于存放 [队列任务](https://learnku.com/docs/laravel/8.x/queues)，应用中的任务可以被推送至队列，也可以在当前请求生命周期内同步执行。同步执行的任务有时也被看作是命令，因为它们实现了 [命令模式](https://en.wikipedia.org/wiki/Command_pattern)。

#### Listeners 目录

默认情况下，此目录不存在，但如果你执行 `event:generate` 或 `make:listener` Artisan 命令时，会自动生成。`Listeners` 目录包含所有处理[事件](https://learnku.com/docs/laravel/8.x/events)的类。在事件触发后，事件侦听器接收事件实例并执行处理逻辑。例如，`UserRegistered` 事件被 `SendWelcomeEmail` 监听器所处理。

#### Mail 目录

默认情况下，此目录不存在，但如果你执行 `make:mail` Artisan 命令时，会自动生成。`Mail` 目录包含应用程序所有表示发送的电子邮件的类。Mail 对象允许您将构建电子邮件的所有逻辑封装在一个简单的类中，该类可以使用 `Mail::send` 方式发送。

#### Models 目录

`Models` 目录包含所有 Eloquent 模型类。Laravel 附带的 Eloquent ORM 为处理数据库提供了一个漂亮、简单的 ActiveRecord 实现。每个数据库表都有一个对应的「模型」，用于与该表进行交互。每个数据库表都有一个对应的 `Model`，用于与该表进行交互。模型允许您查询表中的数据，以及向表中插入新记录。  

#### Notifications 目录

默认情况下，此目录不存在，但如果你执行 `make:notification` Artisan 命令时会自动生成。`Notifications` 目录包含所有你发送给应用程序的「事务性」通知。例如关于应用程序内发生的事件的简单通知。Laravel 的通知功能抽象了通过各种驱动程序发送的通知，如电子邮件通知、Slack 信息、SMS 短信通知或数据库存储。

#### Policies 目录

默认情况下，此目录不存在，但如果您执行 `make:policy` Artisan 命令会生成。`Policies` 目录包含应用程序的授权策略类。这些类用于确定用户是否可以对资源执行给定的操作。有关更多信息，请查看 [授权文档](https://learnku.com/docs/laravel/8.x/authorization)。

#### Providers 目录

`Providers` 目录包含程序中所有的 [服务提供者](https://learnku.com/docs/laravel/8.x/providers)。服务提供者通过在服务容器中绑定服务、注册事件或执行任何其他任务来引导应用程序以应对传入请求。

在一个新的 Laravel 应用程序中，这个目录已经包含了几个提供者。您可以根据需要将自己的提供程序添加到此目录。

#### Rules 目录

默认情况下，此目录不存在，但如果您执行 `make:rule` Artisan 命令后会生成。`Rules` 目录包含应用程序用户自定义的验证规则。这些验证规则用于将复杂的验证逻辑封装在一个简单的对象中。有关更多信息，请查看 [表单验证](https://learnku.com/docs/laravel/8.x/validation)。
