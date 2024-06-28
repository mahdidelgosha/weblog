const btns = document.querySelectorAll('#showPass');
const inputs = document.querySelectorAll('#fieldPass');


btns.forEach((btn, btnId) => {
    btn.innerHTML = `
        <i class="fas fa-eye"></i>
    `;
    btn.addEventListener('click', () => {
        inputs.forEach((input, inputId) => {
            if(btnId === inputId) {
                if (input.type === 'text') {
                    input.type = 'password';
                    btn.innerHTML = `
                        <i class="fas fa-eye"></i>
                    `;
                } else {
                    input.type = 'text';
                    btn.innerHTML = `
                        <i class="fas fa-eye-slash"></i>
                    `;
                };
            }
        });
    });
});