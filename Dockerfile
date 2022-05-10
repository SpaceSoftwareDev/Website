FROM node:18-alpine as build
WORKDIR /app
COPY . .
RUN npm i -g @antfu/ni
RUN ni && nr build

FROM nginx:alpine as deployment
WORKDIR /usr/share/nginx/html
RUN rm -rf ./*
COPY --from=build /app/dist .
EXPOSE 80
ENTRYPOINT ["nginx", "-g", "daemon off;"]