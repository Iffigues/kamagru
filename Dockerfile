from debian:latest

RUN apt-get update -y \
	&& apt-get upgrade -y \
	&& apt-get install -y -f apache2 php php-mysql php-mail default-mysql-server php-gd vim
WORKDIR /var/www/html
RUN service mysql start	\
	&& mysql -e "CREATE USER 'iffigues'@localhost IDENTIFIED BY 'Marie1426';" \
	&& mysql -e "GRANT ALL PRIVILEGES ON *.* TO 'iffigues'@'localhost';"
RUN rm index.html
RUN apt-get install  -y  mailutils libssl-dev sendmail \
	&&  yes 'y' | /usr/sbin/sendmailconfig \
	&& rm -rf /var/lib/apt/lists/*
COPY ./kamagru/ .
workdir /etc/php/7.0/cli/
COPY php.ini .
WORKDIR /
COPY test.php .
COPY start.sh .
WORKDIR /var/www/html/
