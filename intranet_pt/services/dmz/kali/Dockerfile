From debian

RUN apt-get update && \
    apt-get install -y openssh-server && \
    mkdir /var/run/sshd && \
    sed -i 's/#PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config && \
    sed -i 's/#PasswordAuthentication yes/PasswordAuthentication yes/' /etc/ssh/sshd_config && \
    sed -ri 's/UsePAM yes/#UsePAM yes/g' /etc/ssh/sshd_config

RUN echo 'root:WhatASecurityPassword' | chpasswd && \
    useradd -m guest -s /bin/bash && \
    echo 'guest:isclab_K4L1_nc47' | chpasswd

RUN apt-get install -y ncat

EXPOSE 22

CMD ["/usr/sbin/sshd", "-D"]
