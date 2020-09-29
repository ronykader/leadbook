<template>
    <div>
        <a href="#" v-if="isFavorited" @click.prevent="unFavorite(company)">
            <i  class="fa fa-heart is-size-2"></i>
        </a>
        <a href="#" v-else @click.prevent="favorite(company)">
            <i  class="fa fa-heart-o is-size-2"></i>
        </a>
    </div>
</template>

<script>
import axios from 'axios'
    export default {

        props: ['company', 'favorited'],

        data: function() {
            return {
                isFavorited: '',
            }
        },

        mounted() {
            this.isFavorited = this.isFavorite ? true : false;
        },

        computed: {
            isFavorite() {
                return this.favorited;
            },
        },

        methods: {
            async favorite(company) {
                await axios.post('/favorite/'+company).then(() => {
                    this.isFavorited = true
                }) 
            },

            async unFavorite(company) {
                await axios.post('/unfavorite/'+company).then(() => {
                    this.isFavorited = false
                })
            }
        }
    }
</script>