FROM node:18-bullseye

RUN mkdir /app
WORKDIR /app

RUN npm install -g create-vite


RUN apt-get update && apt-get install -y --no-install-recommends supervisor
RUN mkdir -p /var/log/supervisor

COPY ../ /app/
COPY /supervisord/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

EXPOSE 5174

STOPSIGNAL SIGQUIT

CMD ["/usr/bin/supervisord"]