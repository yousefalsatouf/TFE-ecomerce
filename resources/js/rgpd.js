let checker = document.getElementById('check-me');
let accept = document.getElementById('accept');
let register = document.getElementById('registerBtn');


if (accept && register)
{
    accept.disabled = true;
    accept.style.cursor = 'not-allowed';
    register.disabled = true;
    register.style.cursor = 'not-allowed'

    // when unchecked or checked, run the function
    checker.onchange = function() 
    {
        if (this.checked)
        {
            accept.disabled = false;
            accept.style.cursor = 'pointer';
        }
    };

    accept.onclick = function ()
    {
        register.disabled = false;
        register.style.cursor = 'pointer';
    };

}
