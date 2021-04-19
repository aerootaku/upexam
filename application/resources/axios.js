import axios from 'axios'

const domain = ""
const service = axios.create({
    baseURL: process.env.BASE_API,
    timeout: 30 * 1000
})
const pending = {}
const CancelToken = axios.CancelToken
const removePending = (config, f) => {
    const url = config.url.replace(config.baseURL, '/')
    const flagUrl = url + '&'
        + config.method + '&'
        + JSON.stringify(config.params)
    if (flagUrl in pending) {
        if (f) {
            f()
        } else {
            delete pending[flagUrl]
        }
    } else {
        if (f) {
            pending[flagUrl] = f
        }
    }
}
service.interceptors.request.use(config => {
    config.cancelToken = new CancelToken((c) => {
        removePending(config, c)
    })
    return config
}, error => {
    Promise.reject(error)
})
service.interceptors.response.use(
    response => {
        removePending(response.config)
        return response.data
    },
    error => {
        removePending(error.config)

        if (!axios.isCancel(error)) {
            return Promise.reject(error)
        } else {
            return Promise.resolve({})
        }
    }
)
export default axios.create({
    domain
})