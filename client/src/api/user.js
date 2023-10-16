import {http} from './index'
import { LOGIN, LOG_OUT, REGISTRATION, USER_CREATE, USER_DELETE, USER_EDIT, USER_INDEX, USER_INFO } from './endpoints'

export const registration = async ({ first_name, last_name, email, password, phone_number, role }) => {
    return await http("login").put(REGISTRATION, { first_name, last_name, email, password, phone_number, role })
}

export const login = async ({ email, password }) => {
    return await http("login").post(LOGIN, { email, password })
}

export const log_out = async () => {
    return await http().post(LOG_OUT)
}

export const user_index = async (id) => {
    return await http().get(`${USER_INDEX}${id}`)
}

export const user_info = async () => {
    return await http().get(USER_INFO)
}

export const user_create = async ({ first_name, last_name, email, password, phone_number, role }) => {
    return await http().put(USER_CREATE, { first_name, last_name, email, password, phone_number, role })
}

export const user_edit = async ({ first_name, last_name, email, password, phone_number, role }) => {
    return await http().put(USER_EDIT, { first_name, last_name, email, password, phone_number, role })
}

export const user_delete = async ({ first_name, last_name, email, password, phone_number, role }) => {
    return await http().delete(USER_DELETE, { first_name, last_name, email, password, phone_number, role })
}


export default {
    registration,
    login,
    log_out,
    user_index,
    user_info,
    user_create,
    user_edit,
    user_delete,
}