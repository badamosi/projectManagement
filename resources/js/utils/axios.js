import axios from 'axios'

import store from '../store'

const Api = axios.create({
  baseURL: `/api/v1/`
})

Api.interceptors.request.use(
  req => {
    let Token = store.state.access_token || JSON.parse(localStorage.getItem('user'))?.access_token
    // intercept request...
    req.headers.Accept =  'application/json'
    req.headers.Authorization =  'Bearer ' + Token
    return req
  },
  error => {
    // intercept errors
    return Promise.reject(error)
  }
)

export { Api }
