import Vue from 'vue';
import dateIndex from './dateIndex';
import dateShow from './dateShow';

Vue.filter('dateIndex', dateIndex);
Vue.filter('dateShow', dateShow);