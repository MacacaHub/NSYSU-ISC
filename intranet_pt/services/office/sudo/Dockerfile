From ubuntu:18.04

RUN apt-get update -y 
RUN apt-get upgrade -y

RUN apt-get install -y openssh-server && \
    mkdir /var/run/sshd && \
    sed -i 's/#PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config && \
    sed -i 's/#PasswordAuthentication yes/PasswordAuthentication yes/' /etc/ssh/sshd_config && \
    sed -i 's/UsePAM yes/UsePAM no/g' /etc/ssh/sshd_config

RUN apt-get install -y sudo less man python perl

RUN echo 'root:whatASecurePasswd' | chpasswd && \
    useradd -m macaca -s /bin/bash && \
    echo 'macaca:mhub' | chpasswd

RUN echo "macaca ALL=(root) /usr/bin/less, /usr/bin/man, /usr/bin/python, /usr/bin/perl" >> /etc/sudoers

RUN echo "MacacaHub{sudo-privilege-bf614797197ac53ee9785ee8c22a7d38}" >> /root/flag

EXPOSE 22

ENTRYPOINT ["/usr/sbin/sshd", "-D"]
