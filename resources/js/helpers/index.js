import axios from 'axios'

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

export {
    axios
}