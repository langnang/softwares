---
title: Laravel
---

- 前言
  - 发行说明
  - 升级说明
  - 贡献导引
- 入门指南
  - 安装
  - 配置信息
  - [文件夹结构（structure）](./structure.md)
  - Homestead
  - Valet
  - 部署
- 核心架构
  - 请求周期
  - 服务容器
  - 服务提供者
  - Facades
  - Contracts
- 基础功能
  - 路由
  - 中间件
  - CSRF 保护
  - 控制器
  - 请求
  - 响应
  - 视图
  - 生成 URL
  - Session
  - 表单验证
  - 错误
  - 日志
- 前端开发
  - Blade 模板
  - 本地化
  - 前端脚手架
  - 编辑资源 Mix
- 安全相关
  - 用户认证
  - 用户授权
  - Email 认证
  - 加密解密
  - 哈希
  - 重置密码
- 综合话题
  - Artisan 命令行
  - 广播系统
  - 缓存系统
  - 集合
  - 事件系统
  - 文件存储
  - 辅助函数
  - HTTP 客户端
  - 邮件发送
  - 消息通知
  - 扩展包开发
  - 队列
  - 任务调度
- 数据库
  - 快速入门
  - 查询构造器
  - 分页
  - 数据库迁移
  - 数据填充
  - Redis
- Eloquent ORM
  - 快速入门
  - 模型关联
  - Eloquent 集合
  - 修改器
  - API 资源
  - 序列化
- 测试相关
  - 快速入门
  - HTTP 测试
  - 命令行测试
  - Dusk 浏览器测试
  - 数据库测试
  - 测试模拟器 Mocking
- 官方扩展包
  - Envoy 部署工具
  - Horizon 队列管理
  - Passport OAuth 认证
  - Sanctum 认证
  - Scout 全文搜索
  - Socialite 社会化登录
  - Telescope 调试工具
  - Laravel Sail

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
