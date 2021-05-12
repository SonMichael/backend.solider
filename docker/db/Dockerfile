FROM mysql:8.0
COPY my.cnf /etc/mysql/conf.d/
RUN chmod 644 /etc/mysql/conf.d/my.cnf
RUN chmod 770 /var/lib/mysql
RUN  apt update \
     && apt upgrade -y \
     && apt install vim -y \
     && apt install htop \
     && apt-get update \
     && apt-get install --reinstall systemd -y \
     && apt-get install -y procps