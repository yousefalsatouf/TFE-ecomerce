let checker = document.getElementById('check-me');
let accept = document.getElementById('accept');
document.getElementById('registerBtn').disabled = true;
document.getElementById('registerBtn').style.cursor = 'not-allowed';
accept.disabled = true;
document.getElementById('accept').style.cursor = 'not-allowed';

// when unchecked or checked, run the function
checker.onchange = function() {
    if (this.checked)
    {
        accept.disabled = false;
        document.getElementById('accept').style.cursor = 'pointer';
    }
};

accept.onclick = function ()
{
    document.getElementById('registerBtn').disabled = false;
    document.getElementById('registerBtn').style.cursor = 'pointer';
};
