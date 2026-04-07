import { createRouter, createWebHistory } from 'vue-router';
import BlogView from '../views/BlogView.vue';
import DashboardView from '../views/DashboardView.vue';
import FeaturesView from '../views/FeaturesView.vue';
import HomeView from '../views/HomeView.vue';
import LoginView from '../views/LoginView.vue';
import TransactionsView from '../views/TransactionsView.vue';

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView,
    meta: { layout: 'marketing' },
  },
  {
    path: '/features',
    name: 'features',
    component: FeaturesView,
    meta: { layout: 'marketing' },
  },
  {
    path: '/blog',
    name: 'blog',
    component: BlogView,
    meta: { layout: 'marketing' },
  },
  {
    path: '/login',
    name: 'login',
    component: LoginView,
    meta: { layout: 'auth' },
  },
  {
    path: '/app',
    name: 'dashboard',
    component: DashboardView,
    meta: { layout: 'app', title: 'Bang dieu khien' },
  },
  {
    path: '/app/transactions',
    name: 'transactions',
    component: TransactionsView,
    meta: { layout: 'app', title: 'So giao dich' },
  },
  {
    path: '/:pathMatch(.*)*',
    redirect: '/',
  },
];

export default createRouter({
  history: createWebHistory(),
  routes,
});