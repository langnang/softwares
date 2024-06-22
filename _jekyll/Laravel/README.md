# Laravel 8.x



## Basic

### Intro

### Install

```sh
composer create-project --prefer-dist laravel/laravel blog
```

### Usage

```sh

```

```sh
laravel
├─.github     
│  └─workflows
├─app					# 包含你的程序的核心代码。我们很快会详细地研究这个目录；不管怎样，应用程序中几乎所有的类都将位于此目录中。
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
├─bootstrap				# 包含了框架的启动文件 app.php 。该目录还包含 cache 目录，其中包含用于性能优化的框架生成的文件，例如路由和服务缓存文件。
│  └─cache
├─config				# 包含应用程序的所有配置文件。最好把这些文件都浏览一遍，并熟悉所有可用的选项。
├─database				# 包含 数据库迁移，模型工厂和 种子生成器 文件。如果你喜欢，你还可以把它作为 SQLite 数据库存放目录。
│  ├─factories
│  ├─migrations
│  ├─schema
│  └─seeders
├─node_modules				# 包含你的 Node 依赖。
├─public				# 包含 index.php 文件，它是进入应用程序的所有请求的入口，并配置自动加载。该目录还包含您的资源，如图像、JavaScript 脚本和 CSS 样式。
├─resources				# 包含了视图和未编译的资源文件（如 LESS、SASS 或 JavaScript）。此目录还包含你所有的语言文件。
├─routes				# 包含应用程序的所有路由定义。
│  ├─api.php				# 该文件包含 RouteServiceProvider 放置在 api 中间件组中的路由，后者提供速率限制。这些路由是无状态的，因此通过这些路由进入应用程序的请求将通过令牌进行身份验证，并且不能访问会话状态。
│  ├─console.php			# 该文件是您可以定义所有基于闭包的控制台命令的地方。每个闭包都绑定到一个命令实例，允许使用一种简单的方法与每个命令的进行 IO 交互。尽管这个文件没有定义 HTTP 路由，但是它定义了应用程序中基于控制台的入口点（路由）。
│  ├─channels.php			# 该文件是您可以注册应用程序支持的所有事件广播频道的位置。
│  └─web.php				# 该文件包含 RouteServiceProvider 放置在 web 中间件组中的路由，后者提供会话状态、CSRF 保护和 cookie 加密。如果您的应用程序不提供无状态的 RESTful API，那么您的所有路由都很可能在 web.php 文件。
├─storage				# 包含由 Blade 框架生成的基于目录的模板、文件和缓存。
│  ├─app				# 可用于存储应用程序生成的任何文件。
│  │  └─public				# 用来存储用户生成的文件，例如应该公开访问的用户头像。
│  ├─framework				# 用于存储框架生成的文件和缓存。
│  └─logs				# 包含应用程序的日志文件。包含应用程序的日志文件。
├─tests					# 包含自动化测试类。
├─vendor				# 包含你的 Composer 依赖。
```



## Extensions

### Swagger-UI

```sh

```



### Dact-Admin

安装 `dcat-admin`

```sh
composer require dcat/laravel-admin
```

发布资源

```sh
php artisan admin:publish
```



### WebStack

```sh

```





