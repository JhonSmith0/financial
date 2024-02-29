FROM nginx:1.25
COPY ./docker/nginx/entrypoint.sh /docker-entrypoint.d
COPY --chown=nginx:nginx ./docker/nginx/nginx.conf /etc/nginx
COPY --chown=nginx:nginx ./docker/nginx/sites /etc/nginx/conf.d
