import {http} from './index'
import { COMPANY_INDEX, COMPANY_INFO, COMPANY_CREATE, COMPANY_UPDATE, COMPANY_DELETE } from './endpoints'

export const companies_index = async () => {
    return await http().get(`${COMPANY_INDEX}`)
}

export const companies_info = async () => {
    return await http().get(COMPANY_INFO)
}

export const companies_create = async ({  }) => {
    return await http().post(COMPANY_CREATE, { })
}

export const companies_edit = async ({ id }) => {
    return await http().put(`${COMPANY_UPDATE}/${id}`, {  })
}

export const companies_delete = async ({ id }) => {
    return await http().delete(`${COMPANY_DELETE}/${id}`, {  })
}


export default {
    companies_index,
    companies_info,
    companies_create,
    companies_edit,
    companies_delete,
}