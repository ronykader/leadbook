<template>
  <div id="app">
    <div v-if="authenticated">
    <MainNavigation/>
    </div>
    <router-view/>
  </div>
</template>

<script>
	import MainNavigation from '@/components/MainNavigation.vue'
	import {mapGetters} from 'vuex'
	export default {
		components: {MainNavigation},
		computed: {
			...mapGetters({
				authenticated: 'auth/authenticated',
				user: 'auth/user'
			})
		}	
	}
</script>