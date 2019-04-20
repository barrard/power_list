import Home from './components/Home'
import Lists from './components/Lists'
import ListItems from './components/ListItems'
import Account from './components/Account'


export default {
  mode:'history',
  routes:[
    {
      path:'/home', 
      component:Home
    },
    {
      path:'/lists', 
      component: Lists
    },
    {
        path: '/list_items',
        component: ListItems
    },
    {
        path: '/account',
        component: Account
    }
  ]
}