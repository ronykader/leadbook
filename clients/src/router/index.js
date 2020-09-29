import Vue from 'vue'
import VueRouter from 'vue-router'
import Registration from '../views/Registration.vue'
import Login from '../views/Login.vue'
import Forgotpassword from '../views/ForgotPassword.vue'
import ResetPasswordForm from '../views/ResetPasswordForm.vue'
import Myfavorites from '../views/MyFavorite.vue'
import Dashboard from '../views/Dashboard.vue'
import store from '@/store'

Vue.use(VueRouter)

const routes = [
	{
		path: '/',
		name: 'home',
		component: Login
	},
	{
		path: '/registration',
		name: 'registration',
		component: Registration
	},
	{
		path: '/login',
		name: 'login',
		component: Login
	},
	{
		path: '/forgot-password',
		name: 'forgot-password',
		component: Forgotpassword
	},
	{
		path: '/reset-password/:token',
		name: 'reset-password-form',
		component: ResetPasswordForm
	},
	{
		path: '/my-favorites',
		name: 'myfavorites',
		component: Myfavorites,
		beforeEnter:( to, from, next) => {
		if( !store.getters['auth/authenticated']) {
			return next({
			name: 'login'
			})
		}
		next()
		} 
	},
	{
		path: '/dashboard',
		name: 'dashboard',
		component: Dashboard,
		beforeEnter:( to, from, next) => {
		if( !store.getters['auth/authenticated']) {
			return next({
			name: 'login'
			})
		}
		next()
		} 
	}
]

const router = new VueRouter({
	mode: 'history',
	base: process.env.BASE_URL,
	routes
})

export default router
