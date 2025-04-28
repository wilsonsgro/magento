FROM mariadb
USER root
ENV http_proxy http://proxy.reply.it:8080
RUN mkdir /root/.ssh
COPY ./ssh/authorized_keys /root/.ssh/authorized_keys
COPY ./ssh/containers /root/.ssh/containers
COPY ./ssh/containers.pub /root/.ssh/containers.pub
RUN chmod 600 /root/.ssh/containers
COPY ./scripts/dumptable.sh /home/dumptable.sh
RUN chmod +x /home/dumptable.sh
RUN apt update
RUN apt install openssh-server -y
CMD ["mysqld"]
