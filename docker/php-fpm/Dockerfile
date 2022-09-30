FROM centos:7

RUN yum install -y yum-utils epel-release https://rpms.remirepo.net/enterprise/remi-release-7.rpm && \
    yum-config-manager --disable epel

RUN yum install -y --enablerepo=epel,remi-php74 \
    make \
    git \
    zip \
    unzip \
    php-pecl-zip \
    php \
    php-fpm \
    php-mbstring \
    php-mcrypt \
    php-pear \
    php-devel \
    php-cli \
    php-json \
    php-pdo \
    php-xml \
    postgresql \
    pdo-pgsql \
    php-pgsql \
    php-bcmath

# php-fpmのpidファイルがこのパスに作成される (このディレクトリがないとPIDファイルを作成できずエラーになる)
RUN mkdir /run/php-fpm

# php-fpmの設定ファイルをコピー
# HACK 頻繁に変えるならここでコピーしないで、composeで指定した方がbuildをしなくて済む
COPY www.conf /etc/php-fpm.d/www.conf

# php-fpmをフォアグラウンドで開始
ENTRYPOINT ["/usr/sbin/php-fpm", "-F"]
