import Vue from 'vue'
import store from '~/store'
import router from '~/router'
import i18n from '~/plugins/i18n'
import App from '~/components/App'
import Buefy from 'buefy'

import '~/plugins'
import '~/components'

Vue.config.productionTip = false
Vue.use(Buefy)

/* eslint-disable no-new */
new Vue({
  i18n,
  store,
  router,
  ...App
})
