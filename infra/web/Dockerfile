FROM nginx:1.15.11-alpine
COPY nginx.conf /etc/nginx/nginx.conf

ENV NODE_VERSION 10.15.1
ENV YARN_VERSION 1.13.0

# 環境によって取得先をかえる
COPY meditan /var/www/meditan
WORKDIR /var/www/meditan

# Install Node.js
RUN apk add nodejs

# Install Yarn
RUN apk add yarn

RUN yarn install
RUN yarn run production
