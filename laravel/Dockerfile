# 使用官方 PHP 镜像作为基础镜像
FROM php:7.4-fpm


# 安装 Nginx
RUN apt-get update && apt-get install -y nginx


# 拷贝项目文件到容器
COPY . /var/www


# 配置 Nginx
COPY nginx.conf /etc/nginx/nginx.conf


# 配置 PHP
COPY php.ini /usr/local/etc/php/conf.d/docker.conf


# 指定工作目录
WORKDIR /var/www


# 暴露端口
EXPOSE 80


# 启动命令
CMD ["php-fpm"]