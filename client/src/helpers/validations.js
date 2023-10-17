export const validatePhone = (phoneNumber) => {
    if (phoneNumber && !/\d+$/.test(phoneNumber)) {
      return 'Номер телефона должен содержать только цифры';
    }
    return '';
};
  
export const validateFormRequired = (firstName, lastName, email, password) => {
    if (!firstName || !lastName || !email || !password) {
      return 'Заполните все обязательные поля';
    }
    return '';
};

export const validateFormLength = (firstName, lastName, email, password) => {
    if (firstName.length < 3 || lastName.length < 3  || email.length < 6  || password.length < 6 ) {
        return 'Too short, need more than 6 symbols!';
      }
    return '';
};

export const validateForm = (firstName, lastName, email, password, phoneNumber) => {
    console.log("firstName",firstName)
    const phoneError = validatePhone(phoneNumber)
    const requiredError = validateFormRequired(firstName, lastName, email, password)
    const lengthError = validateFormLength(firstName, lastName, email, password)

    if (requiredError) {
        return requiredError
    } else if (lengthError) {
        return lengthError
    } else if (phoneError) {
        return phoneError;
    }

    return '';
};

export const validateFormLogin = (email, password) => {
    if (email.length < 6  || password.length < 6 ) {
        return 'Enter correct info';
      }
    return '';
};