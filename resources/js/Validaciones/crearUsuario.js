const formulario = document.getElementById('form__registerUser');
const inputs = document.querySelectorAll('#form__registerUser input');

const expresiones = {
    id: /^[0-9]{10,12}$/,
    nombre: /^[a-zA-ZÀ-ÿ\s]{3,40}$/,
    apellido: /^[a-zA-ZÀ-ÿ\s]{3,40}$/,
    email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    contacto: /^.{10}$/,
    password: /^.{8,12}$/
}

const campos = {
    id: false,
    nombre: false,
    apellido: false,
    email: false,
    contacto: false,
    password: false
}

const validarFormulario = (e) => {
    switch (e.target.name) {
        case "id":
            validarCampo(expresiones.id, e.target, 'id');
            break;
        case "nombre":
            validarCampo(expresiones.nombre, e.target, 'nombre');
            break;
        case "apellido":
            validarCampo(expresiones.apellido, e.target, 'apellido');
            break;
            case "email":
            validarCampo(expresiones.email, e.target, 'email');
            break;
            case "contacto":
            validarCampo(expresiones.contacto, e.target, 'contacto');
            break;
            case "password":
                validarCampo(expresiones.password, e.target, 'password');
                validarPasswordConfirmation();
                break;
            case "password_confirmation":
                validarPasswordConfirmation();
                break;

                
    }
}

const validarCampo = (expresion, input, campo) => {
    const grupo = document.getElementById(`grupo__${campo}`);
    const icono = grupo.querySelector('.formulario__validacion-estado');
    const errorTexto = grupo.querySelector('.formulario__input-error');

    if (expresion.test(input.value)) {
        grupo.classList.remove('formulario__grupo-incorrecto');
        grupo.classList.add('formulario__grupo-correcto');
        icono.classList.add('fa-check-circle');
        icono.classList.remove('fa-times-circle');
        errorTexto.classList.add('hidden');
        campos[campo] = true;
    } else {
        grupo.classList.add('formulario__grupo-incorrecto');
        grupo.classList.remove('formulario__grupo-correcto');
        icono.classList.add('fa-times-circle');
        icono.classList.remove('fa-check-circle');
        errorTexto.classList.remove('hidden');
        campos[campo] = false;
    }
}

const validarPasswordConfirmation = () => {
    const inputPassword = document.getElementById('password');
    const inputPasswordConfirmation = document.getElementById('password_confirmation');

    if (inputPassword.value !== inputPasswordConfirmation.value) {
        document.getElementById(`grupo__password_confirmation`).classList.add('formulario__grupo-incorrecto');
        document.getElementById(`grupo__password_confirmation`).classList.remove('formulario__grupo-correcto');
        document.querySelector(`#grupo__password_confirmation i`).classList.add('fa-times-circle');
        document.querySelector(`#grupo__password_confirmation i`).classList.remove('fa-check-circle');
        document.querySelector(`#grupo__password_confirmation .formulario__input-error`).classList.remove('hidden');
        campos['password'] = false;
    } else {
        document.getElementById(`grupo__password_confirmation`).classList.remove('formulario__grupo-incorrecto');
        document.getElementById(`grupo__password_confirmation`).classList.add('formulario__grupo-correcto');
        document.querySelector(`#grupo__password_confirmation i`).classList.remove('fa-times-circle');
        document.querySelector(`#grupo__password_confirmation i`).classList.add('fa-check-circle');
        document.querySelector(`#grupo__password_confirmation .formulario__input-error`).classList.add('hidden');
        campos['password'] = true;
    }
};


inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
});

document.getElementById('form__registerUser').addEventListener('submit', (e) => {
    if (!Object.values(campos).every((campo) => campo)) {
        e.preventDefault();
        alert('Por favor, completa todos los campos correctamente.');
    } else {

        document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
        
        setTimeout(() => {
            document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
        }, 5000);

    }
});




