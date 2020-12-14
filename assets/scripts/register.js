const inputEmail = document.querySelector('#registration_form_email')
const inputName = document.querySelector('#registration_form_name')
const inputPassword = document.querySelector('#registration_form_plainPassword')
const inputAgree = document.querySelector('#registration_form_agreeTerms')
const inputSubmit = document.querySelector('#register_submit')


inputEmail.addEventListener('input', testInput)
inputName.addEventListener('input', testInput)
inputPassword.addEventListener('input', testInput)
inputAgree.addEventListener('input', testInput)


function testInput() {
    if(
        inputAgree.checked &&
        inputPassword.value.length > 0 &&
        inputName.value.length > 0 &&
        inputEmail.value.length > 0
    )
    {
        inputSubmit.disabled = false
    }
    else
    {
        inputSubmit.disabled = true
    }
}
