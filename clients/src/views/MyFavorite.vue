<template>
  <div>
      <div class="container">
            
            <h2 class="title mt-5">Favorite Company List</h2>

            <nav class="panel">
                <div class="panel-block" v-for="(company, index) in companyList" :key="index">
                    <div class="column is-6">
                        <div class=""><b>Name: </b>{{ company.name }}</div>
                        <div class=""><b>Phone Number: </b>{{ company.phone_number }}</div>
                        <div class=""><b>Address: </b>{{ company.address }}</div>
                    </div>
                    <div class="column is-6 has-text-right">
                        <Favorite :company="company.id" :favorited="company.favorited"></Favorite>
                    </div>
                </div>
            </nav>
      </div>
  </div>
</template>

<script>

    import Favorite from '@/components/Favorite.vue'
    import axios from 'axios'
    import {mapGetters} from 'vuex'

    export default {
        name: 'myfavorites',
        components: {
            Favorite
        },
        computed: {
            ...mapGetters({
                authenticated: 'auth/authenticated',
                user: 'auth/user'
            }), 
        },
        data() {
            return {
                companyList: []
            }
        },
        created() {
            this.companies()
        },
        methods: {
            async companies() {
                let response = await axios.get('/my-favorites');
                this.companyList = response.data.data
          
            },
            // search company List
            async searchCompany() {
                let response = await axios.get('/company/search?q='+this.search);
                this.companyList = response.data.data

            }
        }
    }

</script>
