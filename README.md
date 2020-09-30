# Leadbook
## Techonology Used
##### API - Laravel & JWT 
##### Database - MySql
##### Frontend/Clients - VueJs, Vuex, Vue-Router, Axios, Tost notification, Bulma Css 


## Project Setup (API)
--------------------------------------------------------------------------
##### 1. Need to go api directory and composer update
##### 2. Need to set Database information in .env file
##### 3. Need to add client/frontend project's Home & Login URL like: 
      FRONTEND_HOME_URL=http://leadbook.w3zones.com
      FRONTEND_LOGIN_URL=http://leadbook.w3zones.com/login
##### 4. Then run php artisan config:cache
##### 5. Need to run php artisan migrate command for create essentials table.
##### 6. For random company generated need to run php artisan db:seed command


## Project Setup (Clients/Frontend)
--------------------------------------------------------------------------
##### 1. Need to change api base url in clients/src/main.js like: 
         axios.defaults.baseURL = 'http://leadbook.w3zones.com/api/api'
##### 2. Need to go Clients directory and run npm run serve or if you want build just need to npm run build
