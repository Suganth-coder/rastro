FROM ubuntu:latest
# Setting the ubuntu env to non-interactive
ARG DEBIAN_FRONTEND=noninteractive

# Setting up the ubuntu Environment
RUN apt-get update -y && apt-get upgrade -y
RUN apt-get install nano build-essential python3 php7.4 apache2 -y
RUN bash -c "$(curl -fsSL https://raw.githubusercontent.com/ohmybash/oh-my-bash/master/tools/install.sh)"
# Setting up Apache2 server
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN service apache2 start

WORKDIR /var/www/html
RUN mkdir rastro

CMD tail -f /dev/null