# Leadbook
## Techonology Used
##### API - Laravel & JWT 
##### Database - MySql
##### Frontend/Clients - VueJs, Vuex, Vue-Router, Axios, Toast notification, Bulma Css 


## Project Setup (API)
--------------------------------------------------------------------------
##### 1. Need to go api directory and composer update
      composer update
##### 2. Need to set Database information in .env file like:
      DB_DATABASE=api_vue
      DB_USERNAME=*****
      DB_PASSWORD=*****
##### 3. Need to add client/frontend project's Home URL like: 
      FRONTEND_HOME_URL=http://leadbook.w3zones.com
##### 4. Need to add mail server/SMTP info like: 
      MAIL_MAILER=smtp
      MAIL_HOST=smtp.mailtrap.io
      MAIL_PORT=2525
      MAIL_USERNAME=****************
      MAIL_PASSWORD=****************
      MAIL_ENCRYPTION=tls
      MAIL_FROM_ADDRESS="no-replay@leadbook.com"
##### 5. Then run php artisan config:cache like:
      php artisan config:cache
##### 6. Need to run php artisan migrate command for create essentials table. like: 
      php artisan migrate
##### 7. For random company generated need to run php artisan db:seed command like:
      php artisan db:seed


## Project Setup (Clients/Frontend)
--------------------------------------------------------------------------
##### 1. Need to change api base url in clients/src/main.js like: 
         axios.defaults.baseURL = 'http://leadbook.w3zones.com/api/api'
##### 2. Need to go Clients directory and run npm run serve or if you want build just need to npm run build like:
      npm run serve
      or
      npm run build
