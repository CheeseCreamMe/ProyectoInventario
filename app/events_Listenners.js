document.getElementById('showFormButton').addEventListener('click', function() {
    var form = document.querySelector('#formAdd');
    if (form.style.display === 'none' || form.style.display === '') {
        form.style.display = 'block';
    } else {
        form.style.display = 'none';
    }
});
document.getElementById('closeFormButton').addEventListener('click', function() {
    var form = document.querySelector('#formAdd');
    if (form.style.display === 'none' || form.style.display === '') {
        form.style.display = 'flex';
    } else {
        form.style.display = 'none';
    }
});